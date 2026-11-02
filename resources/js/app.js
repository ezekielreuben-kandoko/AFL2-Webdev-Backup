document.querySelectorAll('.nav').forEach((navigation) => {
    const toggle = navigation.querySelector('.nav__toggle');
    const menu = navigation.querySelector('.nav__menu');

    if (!toggle || !menu) {
        return;
    }

    toggle.addEventListener('click', () => {
        const isExpanded = toggle.getAttribute('aria-expanded') === 'true';

        toggle.setAttribute('aria-expanded', String(!isExpanded));
        toggle.setAttribute('aria-label', isExpanded ? 'Buka menu navigasi' : 'Tutup menu navigasi');
        menu.classList.toggle('is-open', !isExpanded);
    });

    menu.addEventListener('click', (event) => {
        if (event.target instanceof HTMLAnchorElement) {
            toggle.setAttribute('aria-expanded', 'false');
            toggle.setAttribute('aria-label', 'Buka menu navigasi');
            menu.classList.remove('is-open');
        }
    });
});

document.querySelectorAll('.home-hero').forEach((hero) => {
    const track = hero.querySelector('.home-hero-track');
    const slides = [...hero.querySelectorAll('.home-hero-slide')];
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    let activeSlide = 1;
    let startX = null;
    let autoAdvance;
    let loopResetTimeout;

    if (!track || slides.length === 0) {
        return;
    }

    const createClone = (slide) => {
        const clone = slide.cloneNode(true);

        clone.setAttribute('aria-hidden', 'true');
        clone.querySelectorAll('img').forEach((image) => {
            image.alt = '';
            image.removeAttribute('fetchpriority');
        });

        return clone;
    };

    track.prepend(createClone(slides[slides.length - 1]));
    track.append(createClone(slides[0]));
    track.style.setProperty('--home-slide-index', activeSlide);

    const resetToRealSlide = () => {
        if (activeSlide !== 0 && activeSlide !== slides.length + 1) {
            return;
        }

        window.clearTimeout(loopResetTimeout);
        activeSlide = activeSlide === 0 ? slides.length : 1;
        track.style.transition = 'none';
        track.style.setProperty('--home-slide-index', activeSlide);
        void track.offsetWidth;
        track.style.transition = '';
    };

    const showSlide = (index) => {
        window.clearTimeout(loopResetTimeout);
        activeSlide = index;
        track.style.setProperty('--home-slide-index', activeSlide);

        if (reducedMotion) {
            resetToRealSlide();
        } else if (activeSlide === 0 || activeSlide === slides.length + 1) {
            loopResetTimeout = window.setTimeout(resetToRealSlide, 1200);
        }
    };

    track.addEventListener('transitionend', (event) => {
        if (event.target === track && event.propertyName === 'transform') {
            resetToRealSlide();
        }
    });

    const restartAutoAdvance = () => {
        window.clearInterval(autoAdvance);

        if (!reducedMotion) {
            autoAdvance = window.setInterval(() => {
                if (!document.hidden) {
                    showSlide(activeSlide + 1);
                }
            }, 5000);
        }
    };

    hero.addEventListener('pointerdown', (event) => {
        if (event.target.closest('button, a')) {
            return;
        }

        startX = event.clientX;
    });

    hero.addEventListener('pointerup', (event) => {
        if (startX === null) {
            return;
        }

        const distance = event.clientX - startX;
        startX = null;

        if (Math.abs(distance) > 48) {
            showSlide(activeSlide + (distance < 0 ? 1 : -1));
            restartAutoAdvance();
        }
    });

    hero.addEventListener('pointercancel', () => {
        startX = null;
    });

    restartAutoAdvance();
});

document.querySelectorAll('.video-page').forEach((videoPage) => {
    const theater = videoPage.querySelector('[data-video-theater]');
    const theaterPanel = theater?.querySelector('.video-theater-panel');
    const theaterVideo = theater?.querySelector('[data-theater-video]');
    const theaterTitle = theater?.querySelector('[data-theater-title]');
    const theaterLocation = theater?.querySelector('[data-theater-location]');
    const nextButton = theater?.querySelector('[data-theater-next]');
    const closeButton = theater?.querySelector('[data-theater-close]');
    const filmCards = [...videoPage.querySelectorAll('[data-film-card]')];
    const filters = [...videoPage.querySelectorAll('[data-film-filter]')];
    const emptyFilter = videoPage.querySelector('.video-empty-filter');
    const ambientVideo = videoPage.querySelector('.video-hero-ambient');
    const ambientSoundButton = videoPage.querySelector('[data-ambient-sound]');
    let activeFilmIndex = 0;
    let previousFocus = null;

    const playFilm = (index) => {
        const film = filmCards[index];

        if (!film || !theater || !theaterVideo || !theaterTitle || !theaterLocation) {
            return;
        }

        activeFilmIndex = index;
        theaterTitle.textContent = film.dataset.filmTitle;
        theaterLocation.textContent = film.dataset.filmLocation;
        theaterVideo.poster = film.dataset.filmPoster || '';
        theaterVideo.src = film.dataset.filmSrc;
        theater.hidden = false;
        theater.setAttribute('aria-hidden', 'false');
        document.body.classList.add('video-theater-open');
        closeButton?.focus();
        theaterVideo.load();
        theaterVideo.play().catch(() => {
            theaterVideo.controls = true;
        });

        if (nextButton) {
            nextButton.hidden = filmCards.length < 2;
        }
    };

    const closeTheater = () => {
        if (!theater || !theaterVideo) {
            return;
        }

        theaterVideo.pause();
        theaterVideo.removeAttribute('src');
        theaterVideo.load();
        theater.hidden = true;
        theater.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('video-theater-open');
        previousFocus?.focus();
    };

    videoPage.querySelectorAll('[data-film-open]').forEach((trigger) => {
        trigger.addEventListener('click', () => {
            previousFocus = trigger;
            playFilm(Number(trigger.dataset.filmIndex));
        });
    });

    closeButton?.addEventListener('click', closeTheater);

    theater?.addEventListener('click', (event) => {
        if (event.target === theater) {
            closeTheater();
        }
    });

    nextButton?.addEventListener('click', () => {
        if (filmCards.length > 1) {
            playFilm((activeFilmIndex + 1) % filmCards.length);
        }
    });

    document.addEventListener('keydown', (event) => {
        if (!theater || theater.hidden) {
            return;
        }

        if (event.key === 'Escape') {
            closeTheater();
            return;
        }

        if (event.key === 'Tab' && theaterPanel) {
            const focusableElements = [...theaterPanel.querySelectorAll('button:not([hidden]), a[href], video[controls]')];
            const firstElement = focusableElements[0];
            const lastElement = focusableElements[focusableElements.length - 1];

            if (event.shiftKey && document.activeElement === firstElement) {
                event.preventDefault();
                lastElement?.focus();
            } else if (!event.shiftKey && document.activeElement === lastElement) {
                event.preventDefault();
                firstElement?.focus();
            }
        }
    });

    filters.forEach((filter) => {
        filter.addEventListener('click', () => {
            filters.forEach((button) => {
                button.setAttribute('aria-pressed', String(button === filter));
            });

            let visibleCount = 0;

            filmCards.forEach((card) => {
                const isVisible = filter.dataset.filmFilter === 'all'
                    || card.dataset.filmCategory === filter.dataset.filmFilter;

                card.hidden = !isVisible;
                visibleCount += Number(isVisible);
            });

            if (emptyFilter) {
                emptyFilter.hidden = visibleCount > 0;
            }
        });
    });

    ambientSoundButton?.addEventListener('click', () => {
        if (!ambientVideo || !ambientSoundButton) {
            return;
        }

        const soundEnabled = ambientSoundButton.getAttribute('aria-pressed') !== 'true';
        ambientVideo.muted = !soundEnabled;
        ambientSoundButton.setAttribute('aria-pressed', String(soundEnabled));
        ambientSoundButton.innerHTML = `<span aria-hidden="true">◖</span> Sound ${soundEnabled ? 'On' : 'Off'}`;

        if (soundEnabled) {
            if (!ambientVideo.src) {
                ambientVideo.src = ambientVideo.dataset.ambientSrc;
                ambientVideo.load();
            }

            ambientVideo.play().catch(() => {
                ambientSoundButton.setAttribute('aria-pressed', 'false');
                ambientSoundButton.innerHTML = '<span aria-hidden="true">◖</span> Sound unavailable';
            });
        } else {
            ambientVideo.pause();
        }
    });
});

const parallaxFrames = [...document.querySelectorAll('[data-parallax]')];
const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (parallaxFrames.length && !prefersReducedMotion) {
    let parallaxFrameRequested = false;

    const updateParallax = () => {
        parallaxFrames.forEach((frame) => {
            const bounds = frame.getBoundingClientRect();
            const speed = Number(frame.dataset.parallax);
            const offset = Math.max(-28, Math.min(28, (window.innerHeight / 2 - bounds.top - bounds.height / 2) * speed));

            frame.style.transform = `translate3d(0, ${offset}px, 0)`;
        });

        parallaxFrameRequested = false;
    };

    const requestParallaxUpdate = () => {
        if (!parallaxFrameRequested) {
            window.requestAnimationFrame(updateParallax);
            parallaxFrameRequested = true;
        }
    };

    window.addEventListener('scroll', requestParallaxUpdate, { passive: true });
    window.addEventListener('resize', requestParallaxUpdate);
    requestParallaxUpdate();
}

document.querySelectorAll('.inquiry-form').forEach((form) => {
    const number = form.dataset.whatsappNumber;

    if (!number) {
        return;
    }

    const getValue = (name) => form.elements[name]?.value?.trim() ?? '';

    const getPillLabels = (name) => [...form.querySelectorAll(`input[name="${name}"]`)]
        .filter((input) => input.checked)
        .map((input) => input.nextElementSibling?.textContent.trim() || input.value);

    const formatDate = (value) => {
        if (!value) {
            return '';
        }

        const [year, month, day] = value.split('-').map(Number);

        if (!year || !month || !day) {
            return value;
        }

        return new Date(year, month - 1, day).toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric',
        });
    };

    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const vision = getValue('vision');
        const lines = ['Halo, saya ingin melakukan inquiry.', ''];

        const addLine = (label, value) => {
            if (value) {
                lines.push(`${label}: ${value}`);
            }
        };

        addLine('Nama', getValue('name'));
        addLine('Partner / Brand', getValue('partner_or_brand'));
        addLine('Email', getValue('email'));
        addLine('WhatsApp', getValue('whatsapp'));
        addLine('Instagram', getValue('instagram'));
        addLine('Jenis Session', getPillLabels('session_type[]').join(', '));
        addLine('Tanggal Shoot', formatDate(getValue('shoot_date')));
        addLine('Lokasi', getValue('location'));
        addLine('Budget', getPillLabels('budget')[0] ?? '');

        if (vision) {
            lines.push('', 'Cerita / moodboard:', vision);
        }

        const url = `https://wa.me/${number}?text=${encodeURIComponent(lines.join('\n'))}`;
        const opened = window.open(url, '_blank');

        if (opened) {
            opened.opener = null;
        } else {
            window.location.href = url;
        }
    });
});