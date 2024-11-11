<?php

use App\Http\Controllers\API\V1\RedirectController;

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});



// Redirect a shortened URL to the actual URL

oute::get('/{short_Url}', RedirectController::class)->name('shortenUrl');
