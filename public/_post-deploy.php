<?php

function extractVendorZip() {
    $path = '../';

    $vendorZip = $path . 'vendor.zip';

    if (file_exists($vendorZip)) {
        $zip = new ZipArchive;

        if ($zip->open($vendorZip) === TRUE) {
            $zip->extractTo($path);
            $zip->close();

            unlink($vendorZip);
        }
    }
}

extractVendorZip();
