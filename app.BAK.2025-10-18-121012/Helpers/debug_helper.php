<?php

if (!function_exists('debugLog')) {
    function debugLog($message)
    {
        $config = config('SiteSettings'); // Load site config
        if ($config->debug === 1) { // Only log if debug mode is enabled
            log_message('debug', $message);
        }
    }
}
