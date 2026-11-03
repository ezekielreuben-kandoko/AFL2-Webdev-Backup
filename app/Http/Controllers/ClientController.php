<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Contracts\View\View;

class ClientController extends Controller
{
    public function gallery(): View
    {
        return $this->listClients(
            'gallery',
            'gallery.index',
            'gallery.detail',
            'Belum ada klien galeri.'
        );
    }

    public function photobooth(): View
    {
        return $this->listClients(
            'photobooth',
            'photobooth',
            'photobooth.detail',
            'Belum ada klien photobooth.'
        );
    }

    public function lumenara(): View
    {
        return $this->listClients(
            'lumenara',
            'lumenara',
            'lumenara.detail',
            'Belum ada klien lumenara.'
        );
    }

    public function livestreaming(): View
    {
        return $this->listClients(
            'livestream',
            'livestreaming',
            'livestreaming.detail',
            'Belum ada klien livestream.'
        );
    }

    public function galleryDetail(Client $client): View
    {
        return $this->showClient('gallery', $client, 'gallerydetail', 'gallery');
    }

    public function photoboothDetail(Client $client): View
    {
        return $this->showClient('photobooth', $client, 'photoboothdetail', 'photobooth');
    }

    public function lumenaraDetail(Client $client): View
    {
        return $this->showClient('lumenara', $client, 'lumenaradetail', 'lumenara');
    }

    public function livestreamDetail(Client $client): View
    {
        return $this->showClient('livestream', $client, 'livestreamdetail', 'livestreaming');
    }

    private function listClients(string $type, string $view, string $detailRoute, string $emptyMessage): View
    {
        $clients = Client::query()
            ->where('client_type', $type)
            ->latest()
            ->get();

        return view($view, [
            'active' => $type,
            'clients' => $clients,
            'detailRoute' => $detailRoute,
            'emptyMessage' => $emptyMessage,
        ]);
    }

    private function showClient(string $type, Client $client, string $view, string $active): View
    {
        abort_unless($client->client_type === $type, 404);

        $client->load(['videos', 'photos']);

        return view($view, [
            'active' => $active,
            'client' => $client,
        ]);
    }
}
