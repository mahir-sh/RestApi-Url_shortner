<?php

use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});

// Route to handle URL redirection and increment count
Route::get('/{shortUrl}', [RedirectController::class, 'redirectToLongUrl']);
