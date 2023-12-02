<?php

namespace App\Http\Controllers;

use App\Services\AvatarService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AvatarController extends Controller
{
    public function __construct(public AvatarService $avatarService)
    {
    }

    public function getAvatar(string $username): BinaryFileResponse
    {
        $cacheKey = sprintf('avatar-%s', $username);
        $ttl = 60 * 10;
        Cache::remember(
            $cacheKey,
            $ttl,
            fn() => $this->avatarService->downloadAvatarImage($username)
        );

        $pathToServe = storage_path("app/avatars/$username.png");
        return response()->file($pathToServe);
    }
}
