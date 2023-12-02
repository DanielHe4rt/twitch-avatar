<?php

namespace App\Services;

use App\Clients\TwitchClient;
use App\Clients\TwitchException;
use Illuminate\Support\Facades\Storage;

class AvatarService
{
    public function __construct(private TwitchClient $client)
    {

    }

    public function downloadAvatarImage(string $username): void
    {
        $twitchUserResponse = $this->client->getUsers([$username]);
        $twitchUserJson = $twitchUserResponse->json()['data'][0] ?? null;


        if (!$twitchUserJson) {
            throw TwitchException::userNotFound($username);
        }

        $storagePath = sprintf('avatars/' . $username . '.png');
        $avatarUrl = $twitchUserJson['profile_image_url'];
        Storage::put($storagePath, file_get_contents($avatarUrl));
    }
}
