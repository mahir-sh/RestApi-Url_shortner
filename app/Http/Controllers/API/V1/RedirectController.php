<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Url;

class RedirectController extends Controller
{
    public function __invoke(Url $short_Url)
    {
//        $url->update([
//            'visitorCount' => ++$url->visitorCount
//        ]);
        return redirect($short_Url->longUrl);
    }
}
