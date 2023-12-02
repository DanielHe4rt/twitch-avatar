<?php

namespace App\Clients;

use http\Client\Response;
use Illuminate\Support\Facades\Http;

class TwitchClient
{
    public function authenticate()
    {
        return Http::post('https://id.twitch.tv/oauth2/token', [
            'client_id' => config('sentinel.twitch.client_id'),
            'client_secret' => config('sentinel.twitch.client_secret'),
            'grant_type' => 'client_credentials',
            'redirect_uri' => config('sentinel.twitch.redirect_uri')
        ]);
    }

    public function getStreams(string $page = null)
    {
        $query = [
            'type' => 'live',
            'after' => $page,
            'first' => 100
        ];

        return Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.twitch.token'),
            'Client-Id' => config('services.twitch.key'),
        ])->get('https://api.twitch.tv/helix/streams', $query);
    }

    public function getStreamsByCategory(string $category, string $page = null)
    {
        $query = [
            'type' => 'live',
            'after' => $page,
            'game_id' => $category,
            'first' => 100
        ];

        return Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.twitch.token'),
            'Client-Id' => config('sentinel.twitch.client_id'),
        ])->get('https://api.twitch.tv/helix/streams', $query);
    }

    public function getUsers(array $usernames)
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.twitch.token'),
            'Client-Id' => config('services.twitch.key'),
        ])->get('https://api.twitch.tv/helix/users', [
            'login' => $usernames
        ]);
    }
}
