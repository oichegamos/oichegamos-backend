<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/foo', function () {
    return ['message' => 'working!'];
});
