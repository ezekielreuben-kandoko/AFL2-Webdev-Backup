<nav aria-label="Jenis galeri">
    <a href="{{ route('gallery') }}">Semua</a>
    <a href="{{ route('gallery.photos') }}" @if (isset($active) && $active == 'photos') aria-current="page" @endif>Photo</a>
    <a href="{{ route('gallery.videos') }}" @if (isset($active) && $active == 'videos') aria-current="page" @endif>Video</a>
</nav>
