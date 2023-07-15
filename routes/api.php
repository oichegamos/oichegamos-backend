<?php

use App\Http\Controllers\AboutUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OurStatusViewController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SocialNetworkController;

/*
 * Routes without authentication
 */
Route::post('auth/sign-in', [AuthController::class, 'login']);
Route::get('about-us', [AboutUsController::class, 'index']);
Route::get('categories', [CategoryController::class, 'index']);
Route::get('checkins', [CheckinController::class, 'index']);
Route::get('images', [ImageController::class, 'index']);
Route::get('our-status', [OurStatusViewController::class, 'index']);
Route::get('posts', [PostController::class, 'index']);
Route::get('posts/slug/{slug}', [PostController::class, 'getPostBySlug']);
Route::get('social-networks', [SocialNetworkController::class, 'index']);

Route::middleware('api')->group(function () {
    Route::post('auth/sign-up', [AuthController::class, 'register']);

    Route::put('about-us', [AboutUsController::class, 'update']);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('checkins', CheckinController::class);
    Route::apiResource('images', ImageController::class);
    Route::post('images/rotate/{id}', [ImageController::class, 'rotate']);
    Route::apiResource('posts', PostController::class);
    Route::apiResource('social-networks', SocialNetworkController::class);
});