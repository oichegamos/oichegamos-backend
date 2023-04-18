<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SocialNetworkController;

Route::post('auth/signIn', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('auth/signUp', [AuthController::class, 'register']);

    Route::apiResource('images', ImageController::class);
    Route::post('images/rotate/{id}', [ImageController::class, 'rotate']);

    Route::apiResource('social-networks', SocialNetworkController::class);
    Route::apiResource('categories', CategoryController::class);

    
});

Route::get('phpinfo', function () {
    phpinfo();
});