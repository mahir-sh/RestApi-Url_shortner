<?php

use App\Http\Controllers\API\V1\LoginController;
use App\Http\Controllers\API\V1\RegistrationController;
use App\Http\Controllers\API\V1\UrlController;
use App\Http\Controllers\API\V2\VisitorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\API\V2\NewFeatureController; // Assuming the extra feature is in this controller

// User information route
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Version 1 routes
Route::prefix('v1')->group(function () {
    // Auth routes
    Route::post('/register', [RegistrationController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

    // URL shortening routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/shorten-url', [UrlController::class, 'shortenUrl']);
        Route::get('/list-urls', [UrlController::class, 'listUrls']);
    });
});

// Version 2 routes
Route::prefix('v2')->group(function () {
    // Auth routes
    Route::post('/register', [RegistrationController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

    // URL shortening routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/shorten-url', [UrlController::class, 'shortenUrl']);
        Route::get('/list-urls', [UrlController::class, 'listUrls']);
        Route::get('/visitors', [VisitorController::class ,'Visitor']);


    });
});
