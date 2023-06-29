<?php

define('LARAVEL_PATH', '../');

function extractVendorZip() {
    $vendorZip = LARAVEL_PATH . 'vendor.zip';
    $vendorFolder = LARAVEL_PATH . 'vendor';

    if (file_exists($vendorZip)) {
        deleteFolder($vendorFolder);

        $zip = new ZipArchive;

        if ($zip->open($vendorZip) === TRUE) {
            $zip->extractTo(LARAVEL_PATH);
            $zip->close();
            unlink($vendorZip);

            // echo 'done!';
        }
    }
}

function deleteFolder($directory) {
    if (is_dir($directory)) {
        $contents = scandir($directory);
    
        foreach ($contents as $item) {
            if ($item != "." && $item != "..") {
                $itemPath = $directory . "/" . $item;
                if (is_dir($itemPath)) {
                    deleteFolder($itemPath);
                } else {
                    unlink($itemPath);
                }
            }
        }

        rmdir($directory);
    }
}

function optimizeLaravel() {
    // Apaga todos os arquivos do diretório storage/framework/cache
    $cache_dir = LARAVEL_PATH . '/storage/framework/cache';
    $files = glob($cache_dir . '/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }

    // Apaga todos os arquivos do diretório storage/framework/sessions
    $sessions_dir = LARAVEL_PATH . '/storage/framework/sessions';
    $files = glob($sessions_dir . '/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }

    // Apaga todos os arquivos do diretório storage/framework/views
    $views_dir = LARAVEL_PATH . '/storage/framework/views';
    $files = glob($views_dir . '/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }

    // Apaga todos os arquivos do diretório bootstrap/cache
    $bootstrap_cache_dir = LARAVEL_PATH . '/bootstrap/cache';
    $files = glob($bootstrap_cache_dir . '/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
}

function createSymbolicLink() {
    $publicDir = LARAVEL_PATH . 'public';
    $storageDir = LARAVEL_PATH . 'storage/app/public';

    if (!file_exists($publicDir . '/storage')) {
        symlink($storageDir, $publicDir . '/storage');
    }
}

extractVendorZip();
optimizeLaravel();
echo 'done!';