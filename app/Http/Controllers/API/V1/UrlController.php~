<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Url;

class UrlController extends Controller
{
    // Shorten a URL
    public function shortenUrl(Request $request): \Illuminate\Http\JsonResponse
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized access. Please log in.'], 401);
        }

        $request->validate([
            'long_url' => 'required|url',
        ]);

        $user = Auth::user();
        $longUrl = $request->input('long_url');

        // Check if the long URL already exists for this user
        $existingUrl = Url::where('user_id', $user->id)->where('long_url', $longUrl)->first();
        if ($existingUrl) {
            return response()->json([
                'short_url' => url($existingUrl->short_url) // Make the URL clickable
            ], 200);
        }

        // Generate a unique short URL code
        do {
            $shortUrlCode = Str::random(6);
        } while (Url::where('short_url', $shortUrlCode)->exists());

        // Store the new shortened URL
        $url = Url::create([
            'user_id' => $user->id,
            'long_url' => $longUrl,
            'short_url' => $shortUrlCode
        ]);

        return response()->json([
            'short_url' => url($url->short_url) // Make the URL clickable
        ], 201);
    }

    // List URLs registered by the authenticated user
    public function listUrls(): \Illuminate\Http\JsonResponse
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized access. Please log in.'], 401);
        }

        $user = Auth::user();

        // Retrieve URLs for the authenticated user
        $urls = Url::where('user_id', $user->id)->get(['long_url', 'short_url']);

        // Add user information to each URL record
        $urlsWithUserData = $urls->map(function ($url) use ($user) {
            return [
                'long_url' => $url->long_url,
                'short_url' => url($url->short_url), // Make the URL clickable
                'user_name' => $user->name, // User's name
                'user_id' => $user->id      // User's ID
            ];
        });

        return response()->json($urlsWithUserData, 200);
    }
}
