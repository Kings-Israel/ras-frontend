<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class HelperFunctions {
    public static function formatBytes($size, $precision = 2)
    {
        $base = log($size, 1024);
        $suffixes = array('', 'K', 'M', 'G', 'T');

        return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    }

    public static function deleteFile($disk, $folder, $filePath)
    {
        $file = collect(explode('/', $filePath));
        Storage::disk($disk)->delete($folder.'/'.$file->last());
    }
}
