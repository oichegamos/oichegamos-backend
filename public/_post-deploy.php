<?php

function extractVendorZip() {
    $vendorZip = 'vendor.zip';

    if (file_exists($vendorZip)) {
        $zip = new ZipArchive;

        if ($zip->open($vendorZip) === TRUE) {
            $zip->extractTo('./');
            $zip->close();

            unlink($vendorZip);
        }
    }
}

extractVendorZip();
