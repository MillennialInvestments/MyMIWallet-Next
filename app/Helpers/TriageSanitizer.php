<?php

namespace App\Helpers;

class TriageSanitizer
{
    private const REDACTED = '[REDACTED]';

    public static function sanitizeText(string $text): string
    {
        $patterns = [
            '/(DISCORD_[A-Z0-9_]*\s*[:=]\s*)([^\s]+)/i',
            '/(OPENAI_[A-Z0-9_]*\s*[:=]\s*)([^\s]+)/i',
            '/(API_KEY\s*[:=]\s*)([^\s]+)/i',
            '/(TOKEN\s*[:=]\s*)([^\s]+)/i',
            '/(SECRET\s*[:=]\s*)([^\s]+)/i',
        ];

        $sanitized = $text;
        foreach ($patterns as $pattern) {
            $sanitized = preg_replace_callback($pattern, static function (array $matches): string {
                $prefix = $matches[1] ?? '';
                $value = $matches[2] ?? '';
                if ($value === '') {
                    return $prefix . self::REDACTED;
                }

                $hash = substr(sha1($value), 0, 6);
                return $prefix . '[HASH: ' . $hash . ']';
            }, $sanitized) ?? $sanitized;
        }

        return $sanitized;
    }

    /**
     * @param string[] $lines
     * @return string[]
     */
    public static function sanitizeLines(array $lines): array
    {
        return array_map(static fn(string $line): string => self::sanitizeText($line), $lines);
    }
}
