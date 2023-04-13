<?php

function extractVendorZip() {

    // $path = './';

    echo('------- ./');
    printFolderFiles('./');

    echo('------- ././');
    printFolderFiles('././');

    echo('------- ./././');
    printFolderFiles('./././');


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
    $dir = dir($path);

    while ($file = $dir->read()) {
        echo "found file: " . $file;
    }

    $dir->close();
}

extractVendorZip();
