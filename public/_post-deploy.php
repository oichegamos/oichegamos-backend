<?php
// require_once __DIR__ . '../../vendor/autoload.php';
// use Symfony\Component\Process\Process;

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

// function callArtisan($command) {
//     // exec($command, $output, $return_var);

//     // if ($return_var !== 0) {
//     //     echo 'Erro ao executar rotina artisan';
//     // }
//     $process = new Process(['php', 'artisan', $command]);
//     $process->run();

//     if (!$process->isSuccessful()) {
//         var_dump($process);
//         echo 'Erro ao executar rotina artisan';
//     }
// }

function optimizeLaravel() {
    // callArtisan("cache:clear");
    // callArtisan("route:clear");
    // callArtisan("config:clear");
    // callArtisan("optimize");


    // Diretório raiz do seu projeto Laravel
    $path = '../';

    // Apaga todos os arquivos do diretório storage/framework/cache
    $cache_dir = $path . '/storage/framework/cache';
    $files = glob($cache_dir . '/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }

    // Apaga todos os arquivos do diretório storage/framework/sessions
    $sessions_dir = $path . '/storage/framework/sessions';
    $files = glob($sessions_dir . '/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }

    // Apaga todos os arquivos do diretório storage/framework/views
    $views_dir = $path . '/storage/framework/views';
    $files = glob($views_dir . '/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }

    // Apaga todos os arquivos do diretório bootstrap/cache
    $bootstrap_cache_dir = $path . '/bootstrap/cache';
    $files = glob($bootstrap_cache_dir . '/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
}

extractVendorZip();
optimizeLaravel();
echo 'done!';