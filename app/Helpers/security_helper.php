<?php
// app/Helpers/security_helper.php

if (!function_exists('mask_sensitive_fields')) {
    /**
     * Mask sensitive fields in an input array.
     *
     * @param array $data
     * @return array
     */
    function mask_sensitive_fields(array $data): array
    {
        // Define the keys that contain sensitive information.
        $sensitiveKeys = ['password', 'pass_confirm', 'secret', 'token', 'bank_account', 'routing_number', 'account_number'];

        foreach ($data as $key => $value) {
            if (in_array($key, $sensitiveKeys)) {
                // Replace the sensitive value with a fixed mask.
                $data[$key] = str_repeat('*', 8);
            }
        }
        return $data;
    }
}
?>