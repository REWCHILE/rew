<?php

namespace App\Http\Controllers;

use App\Services\InstagramFeedService;
use Illuminate\Http\JsonResponse;

class InstagramController extends Controller
{
    public function feed(InstagramFeedService $service): JsonResponse
    {
        $posts = $service->getFeed();

        return response()->json([
            'success' => true,
            'username' => 'rew_chile',
            'profile_url' => 'https://www.instagram.com/rew_chile/',
            'posts' => $posts,
        ]);
    }
}
