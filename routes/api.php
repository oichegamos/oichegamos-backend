<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return json_encode(['message' => 'its working']);
});

Artisan::command('optimize', function () {
    // $this->info("Sending email to: {$user}!");
    return json_encode(['message' => 'optimized']);
});
