<?php

if (! function_exists('cachekey_user')) {
    function cachekey_user(string $baseKey, ?int $userId): string
    {
        $uid = $userId ? (string) $userId : 'guest';

        return $baseKey . ':uid:' . $uid;
    }
}
