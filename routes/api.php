<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return json_encode(["message" => "API Oi, Chegamos!"]);
});

Route::post('/post-deploy', function () {

    //unpack vendor.zip
    $zip = new ZipArchive;
    if ($zip->open('vendor.zip') === TRUE) {
        $zip->extractTo('./');
        $zip->close();

        http_response_code(200);
        exit;
    }
});
