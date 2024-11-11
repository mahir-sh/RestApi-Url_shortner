<?php

use App\Http\Controllers\API\V1\UrList;
use App\Http\Controllers\API\V1\LoginController;
use App\Http\Controllers\API\V1\RegistrationController;
use App\Http\Controllers\API\V1\UrlController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::post('/register', [RegistrationController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');
});

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::post('/shorten-url', [UrlController::class, 'shortenUrl']);
    Route::get('/list-urls', [UrlController::class, 'listUrls']);
});
