<?php

function extractVendorZip() {

    $path = '../';

    echo('-------' . $path);
    printFolderFiles($path);


    // $vendorZip = './vendor.zip';

    // if (file_exists($vendorZip)) {
    //     $zip = new ZipArchive;

    //     if ($zip->open($vendorZip) === TRUE) {
    //         $zip->extractTo('./');
    //         $zip->close();

    //         unlink($vendorZip);
    //     }
    // }
}

function printFolderFiles($folder) {
    $dir = dir($folder);

    while ($file = $dir->read()) {
        echo "found file: " . $file. '<br>';
    }

    $dir->close();
}

extractVendorZip();
