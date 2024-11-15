<?php
namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirectToLongUrl($shortUrl)
    {
        // Find the URL record by the short URL code
        $urlRecord = Url::where('short_url', $shortUrl)->first();

        if ($urlRecord) {
            // Increment the count by 1
            $urlRecord->increment('count', 1);

            // Update the URL record with the new count
            $urlRecord->update([
                'count' => $urlRecord->count

            ]);


            // Redirect to the original long URL
            return redirect()->away($urlRecord->long_url);
        }

        // If the URL is not found, return a 404 error
        abort(404, 'URL not found');
    }
}
