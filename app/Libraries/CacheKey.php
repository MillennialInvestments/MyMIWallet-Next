<?php

namespace App\Libraries;

class CacheKey
{
    private const PREFIX = 'mymiwallet';
    private const HASH_LENGTH = 12;

    public static function user(string $module, string $feature, int $userId, array $params = []): string
    {
        return self::build('uid', (string) $userId, $module, $feature, $params);
    }

    public static function global(string $module, string $feature, array $params = []): string
    {
        return self::build('global', 'global', $module, $feature, $params);
    }

    public static function guest(string $module, string $feature, array $params = []): string
    {
        return self::build('guest', 'guest', $module, $feature, $params);
    }

    public static function environment(): string
    {
        $env = env('CI_ENVIRONMENT') ?: (defined('ENVIRONMENT') ? ENVIRONMENT : 'production');
        $env = strtolower((string) $env);

        return $env !== '' ? $env : 'production';
    }

    private static function build(string $scopeKey, string $scopeValue, string $module, string $feature, array $params): string
    {
        $raw = implode(':', [
            self::PREFIX,
            self::environment(),
            self::sanitizeSegment($module),
            self::sanitizeSegment($feature),
            self::sanitizeSegment($scopeKey),
            self::sanitizeSegment($scopeValue),
            self::paramHash($params),
        ]);

        if (function_exists('sanitize_cache_key')) {
            return sanitize_cache_key($raw);
        }

        return preg_replace('/[^A-Za-z0-9_\-:]/', '_', $raw) ?: 'cache_key';
    }

    private static function paramHash(array $params): string
    {
        $normalized = self::normalizeParams($params);
        $json = json_encode($normalized, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $hash = sha1($json !== false ? $json : '');

        return substr($hash, 0, self::HASH_LENGTH);
    }

    private static function normalizeParams(array $params): array
    {
        $normalized = [];
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                $normalized[$key] = self::normalizeParams($value);
            } elseif (is_object($value)) {
                $normalized[$key] = self::normalizeParams((array) $value);
            } else {
                $normalized[$key] = $value;
            }
        }

        if (! array_is_list($normalized)) {
            ksort($normalized);
        }

        return $normalized;
    }

    private static function sanitizeSegment(string $value): string
    {
        $value = strtolower(trim($value));
        $value = preg_replace('/[^a-z0-9_\-]+/i', '', $value);

        return $value !== '' ? $value : 'na';
    }
}
