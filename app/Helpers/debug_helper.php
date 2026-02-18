<?php

/**
 * CI4 Logger - Settings
 * Audited: 2026-02-18
 * Purpose: Provides a helper wrapper that conditionally forwards debug messages to log_message().
 */


if (!function_exists('debugLog')) {
    function debugLog($message)
    {
        $config = config('SiteSettings'); // Load site config
        if ($config->debug === 1) { // Only log if debug mode is enabled
            log_message('debug', $message);
        }
    }
}
