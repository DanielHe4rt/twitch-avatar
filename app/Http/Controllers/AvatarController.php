<?php

namespace App\Http\Controllers;

use App\Services\AvatarService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AvatarController extends Controller
{
    public function __construct(public AvatarService $avatarService)
    {
    }

    public function getAvatar(string $username): BinaryFileResponse
    {
        $cacheKey = sprintf('avatar-file-%s', $username);
        $ttl = 60 * 10;
        Cache::remember(
            $cacheKey,
            $ttl,
            fn() => $this->avatarService->downloadAvatarImage($username)
        );

        $pathToServe = storage_path("app/avatars/$username.png");
        return response()->file($pathToServe);
    }

    public function redirectToAvatar(string $username): RedirectResponse
    {
        $cacheKey = sprintf('avatar-url-%s', $username);
        $ttl = 60 * 10;

        $url = Cache::remember(
            $cacheKey,
            $ttl,
            fn() => $this->avatarService->fetchAvatarUrl($username)
        );

        return response()->redirectTo($url);
    }
}
