<?php

function extractVendorZip() {
    $path = '../';
    $vendorZip = $path . 'vendor.zip';
    $vendorFolder = $path . 'vendor';

    if (file_exists($vendorZip)) {
        deleteFolder($vendorFolder);

        $zip = new ZipArchive;

        if ($zip->open($vendorZip) === TRUE) {
            $zip->extractTo($path);
            $zip->close();
            unlink($vendorZip);

            echo 'done!';
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

function callArtisan($command) {
    exec($command, $output, $return_var);

    if ($return_var !== 0) {
        echo 'Erro ao executar rotina artisan';
    }
}

function optimizeLaravel() {
    callArtisan("php artisan cache:clear");
    callArtisan("php artisan route:clear");
    callArtisan("php artisan config:clear");
    callArtisan("php artisan optimize");
}

extractVendorZip();
optimizeLaravel();
