<?php

namespace App\Http\Controllers\API\V2;

use App\Http\Controllers\Controller;
use App\Models\Url;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    public function Visitor(): \Illuminate\Http\JsonResponse
    {

        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized access. Please log in.'], 401);
        }

        $user = Auth::user();

        // Retrieve URLs for the authenticated user
        $urls = Url::where('user_id', $user->id)->get(['long_url', 'short_url', 'count']);


        // Add user information to each URL record
        $urlsWithUserData = $urls->map(function ($url) use ($user) {
            return [
                'long_url' => $url->long_url,
                'short_url' => url($url->short_url), // Make the URL clickable
                'user_name' => $user->name, // User's name
                'user_id' => $user->id,
                'count' => $url->count, //Visit count
            ];
        });

        return response()->json($urlsWithUserData, 200);
    }

}
