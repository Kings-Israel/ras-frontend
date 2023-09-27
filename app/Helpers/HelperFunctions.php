<?php

namespace App\Helpers;

class HelperFunctions {
    public static function formatBytes($size, $precision = 2) {
        $base = log($size, 1024);
        $suffixes = array('', 'K', 'M', 'G', 'T');

        return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    }
}
