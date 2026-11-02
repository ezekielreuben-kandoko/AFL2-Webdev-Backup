<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        return view('about', [
            'active' => 'about',
            'photographers' => [
                [
                    'portrait' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=900&h=1200&q=85',
                    'work' => 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=900&h=1200&q=85',
                    'work_alt' => 'A candid wedding moment photographed in soft light',
                    'offset' => false,
                    'link_text' => 'View Name portfolio',
                    'portrait_lazy' => false,
                ],
                [
                    'portrait' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=900&h=1200&q=85',
                    'work' => 'https://images.unsplash.com/photo-1537633552985-df8429e8048b?auto=format&fit=crop&w=900&h=1200&q=85',
                    'work_alt' => 'An intimate portrait in a natural setting',
                    'offset' => true,
                    'link_text' => 'View Name’s portfolio',
                    'portrait_lazy' => true,
                ],
                [
                    'portrait' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=900&h=1200&q=85',
                    'work' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=900&h=1200&q=85',
                    'work_alt' => 'A joyful moment between two people',
                    'offset' => false,
                    'link_text' => 'View Name’s portfolio',
                    'portrait_lazy' => true,
                ],
            ],
            'directors' => [
                [
                    'portrait' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=1000&h=1300&q=85',
                    'work' => 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&h=800&q=85',
                    'work_alt' => 'A cinematic wedding film still',
                    'offset' => false,
                ],
                [
                    'portrait' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=1000&h=1300&q=85',
                    'work' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1200&h=800&q=85',
                    'work_alt' => 'An unscripted moment from a wedding film',
                    'offset' => true,
                ],
                [
                    'portrait' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=1000&h=1300&q=85',
                    'work' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1200&h=800&q=85',
                    'work_alt' => 'An unscripted moment from a wedding film',
                    'offset' => false,
                ],
            ],
        ]);
    }
}
