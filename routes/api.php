<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/foo', function () {
    return ['message' => 'working!'];
});

Route::post('auth/signIn', [AuthController::class, 'login']);
Route::post('auth/signUp', [AuthController::class, 'register']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
