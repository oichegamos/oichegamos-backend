<?php

function extractVendorZip() {
    $path = '../';
    $vendorZip = $path . 'vendor.zip';
    $vendorFolder = $path . 'vendor';

    if (file_exists($vendorZip)) {
        deleteFolder($vendorFolder);

        echo '> extracting vendor.zip';

        $zip = new ZipArchive;

        if ($zip->open($vendorZip) === TRUE) {
            $zip->extractTo($path);
            $zip->close();

            echo 'deleting vendor.zip';
            unlink($vendorZip);
        }
    }
}

function deleteFolder($directory) {
    echo "> deleting $directory folder<br>";

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

extractVendorZip();
