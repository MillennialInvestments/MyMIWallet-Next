<?php
use Config\Services;
if (!function_exists('getCuID')) {
    function getCuID(): ?int
    {
        static $cached = null;
        if ($cached !== null) {
            return $cached;
        }

        $session = Services::session();
        if ($session) {
            foreach (['cuID', 'user_id', 'userId', 'id', 'currentUserID', 'currentUserId'] as $key) {
                if ($session->has($key)) {
                    $value = $session->get($key);
                    if (is_numeric($value) && (int) $value > 0) {
                        $cached = (int) $value;
                        return $cached;
                    }
                }
            }
        }

        try {
            if (function_exists('user_id')) {
                $value = user_id();
                if (is_numeric($value) && (int) $value > 0) {
                    $cached = (int) $value;
                    return $cached;
                }
            }
        } catch (\Throwable $e) {
            log_message('debug', 'getCuID() user_id() lookup failed: ' . $e->getMessage());
        }

        try {
            if (function_exists('auth')) {
                $authHelper = auth();
                if ($authHelper && method_exists($authHelper, 'id')) {
                    $value = $authHelper->id();
                    if (is_numeric($value) && (int) $value > 0) {
                        $cached = (int) $value;
                        return $cached;
                    }
                }
                if ($authHelper && method_exists($authHelper, 'user')) {
                    $user = $authHelper->user();
                    $value = $user->id ?? null;
                    if (is_numeric($value) && (int) $value > 0) {
                        $cached = (int) $value;
                        return $cached;
                    }
                }
            }
        } catch (\Throwable $e) {
            log_message('debug', 'getCuID() auth() lookup failed: ' . $e->getMessage());
        }

        try {
            $authService = service('authentication');
            if ($authService && method_exists($authService, 'id')) {
                $value = $authService->id();
                if (is_numeric($value) && (int) $value > 0) {
                    $cached = (int) $value;
                    return $cached;
                }
            }
            if ($authService && method_exists($authService, 'user')) {
                $user = $authService->user();
                $value = $user->id ?? null;
                if (is_numeric($value) && (int) $value > 0) {
                    $cached = (int) $value;
                    return $cached;
                }
            }
        } catch (\Throwable $e) {
            log_message('debug', 'getCuID() service("authentication") lookup failed: ' . $e->getMessage());
        }

        // Prevent log flooding when genuinely unauthenticated
        static $logged = false;
        if (! $logged) {
            log_message('error', 'getCuID() failed: No user ID from session or authentication.');
            $logged = true;
        }

        return null;
    }
}