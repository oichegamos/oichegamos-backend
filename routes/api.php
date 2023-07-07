<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OurStatusViewController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SocialNetworkController;

Route::post('auth/signIn', [AuthController::class, 'login']);
Route::get('images', [ImageController::class, 'index']);
Route::get('social-networks', [SocialNetworkController::class, 'index']);
Route::get('categories', [CategoryController::class, 'index']);
Route::get('checkins', [CheckinController::class, 'index']);
Route::get('our-status', [OurStatusViewController::class, 'index']);
Route::get('posts', [PostController::class, 'index']);
Route::get('posts/slug/{slug}', [PostController::class, 'getPostBySlug']);

Route::middleware('api')->group(function () {
    Route::post('auth/signUp', [AuthController::class, 'register']);

    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('checkins', CheckinController::class);
    Route::apiResource('images', ImageController::class);
    Route::post('images/rotate/{id}', [ImageController::class, 'rotate']);
    Route::apiResource('social-networks', SocialNetworkController::class);
    Route::apiResource('posts', PostController::class);
});