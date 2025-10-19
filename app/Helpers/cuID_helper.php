<?php
use Config\Services;
if (!function_exists('getCuID')) {
    function getCuID() {
        $auth = service('authentication');
        $cuID = session('user_id') ?? $auth->id();
    
        if (empty($cuID)) {
            // Prevent log flooding
            static $logged = false;
            if (!$logged) {
                log_message('error', 'getCuID() failed: No user ID from session or authentication.');
                $logged = true;
            }
            return null;
        }
        return $cuID;
    }
    
} 

