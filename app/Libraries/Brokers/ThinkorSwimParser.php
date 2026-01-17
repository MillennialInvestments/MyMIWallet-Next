<?php

namespace App\Libraries\Brokers;

use DateTimeImmutable;
use DateTimeZone;

class ThinkorSwimParser implements BrokerParserInterface
{
    private const SOURCE = 'thinkorswim';

    public function canParse(string $subject, string $content): bool
    {
        $haystack = strtolower($subject . ' ' . $content);
        return str_contains($haystack, 'thinkorswim')
            || str_contains($haystack, 'td ameritrade')
            || str_contains($haystack, 'order filled')
            || str_contains($haystack, 'order fill');
    }

    public function parse(string $subject, string $content): ?array
    {
        $text = $this->sanitizeContent($subject . "\n" . $content);

        if (! preg_match('/order\s+fill(?:ed)?/i', $text)) {
            log_message('info', 'ThinkorSwimParser: skipped because Order Filled token not present.');
            return null;
        }

        $side = $this->matchSide($text);
        $symbol = $this->matchSymbol($text, $side);
        $qty = $this->matchQuantity($text);
        $price = $this->matchPrice($text);
        $filledAt = $this->matchFilledAt($text);
        $orderId = $this->matchOrderId($text);
        $accountType = $this->detectAccountType($text);

        $missing = [];
        foreach ([
            'side' => $side,
            'symbol' => $symbol,
            'filled_qty' => $qty,
            'filled_price' => $price,
            'filled_at' => $filledAt,
        ] as $key => $value) {
            if ($value === null || $value === '') {
                $missing[] = $key;
            }
        }

        if ($missing !== []) {
            log_message('warning', 'ThinkorSwimParser: missing required fields: ' . implode(', ', $missing));
            return null;
        }

        $executionSource = implode('|', [
            self::SOURCE,
            $accountType,
            $symbol,
            $side,
            $qty,
            $price,
            $filledAt,
            $orderId ?? '',
        ]);

        return [
            'source' => self::SOURCE,
            'account_type' => $accountType,
            'symbol' => $symbol,
            'side' => $side,
            'filled_qty' => $qty,
            'filled_price' => $price,
            'filled_at' => $filledAt,
            'broker_order_id' => $orderId,
            'execution_id' => hash('sha256', $executionSource),
        ];
    }

    private function sanitizeContent(string $content): string
    {
        $decoded = html_entity_decode($content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $stripped = strip_tags($decoded);
        $cleaned = preg_replace('/\s+/', ' ', $stripped ?? '');
        return trim($cleaned ?? '');
    }

    private function matchSide(string $text): ?string
    {
        if (preg_match('/\b(BUY|SELL)\b/i', $text, $match)) {
            return strtoupper($match[1]);
        }

        return null;
    }

    private function matchSymbol(string $text, ?string $side): ?string
    {
        $patterns = [
            '/\bSymbol\s*[:\-]?\s*([A-Z]{1,6})\b/i',
            '/\bUnderlying\s*[:\-]?\s*([A-Z]{1,6})\b/i',
            '/\b([A-Z]{1,6})\b\s+Order\s+Fill/i',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $text, $match)) {
                return strtoupper($match[1]);
            }
        }

        if ($side && preg_match('/\b' . $side . '\b\s+[0-9,.]+\s+([A-Z]{1,6})\b/i', $text, $match)) {
            return strtoupper($match[1]);
        }

        return null;
    }

    private function matchQuantity(string $text): ?string
    {
        $patterns = [
            '/\b(?:Filled\s+Qty|Filled\s+Quantity|Qty|Quantity)\s*[:\-]?\s*([0-9,.]+)/i',
            '/\b(BUY|SELL)\b\s+([0-9,.]+)\s+[A-Z]{1,6}\b/i',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $text, $match)) {
                $value = $match[count($match) - 1] ?? null;
                return $value !== null ? $this->normalizeNumber($value) : null;
            }
        }

        return null;
    }

    private function matchPrice(string $text): ?string
    {
        $patterns = [
            '/\b(?:Filled\s+Price|Fill\s+Price|Avg\.?\s+Price|Price)\s*[:\-]?\s*\$?([0-9,.]+)/i',
            '/@\s*\$?([0-9,.]+)/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $text, $match)) {
                $value = $match[1] ?? null;
                return $value !== null ? $this->normalizeNumber($value) : null;
            }
        }

        return null;
    }

    private function matchFilledAt(string $text): ?string
    {
        $patterns = [
            '/\b(?:Filled\s+At|Filled\s+Time|Executed\s+At|Execution\s+Time|Time)\s*[:\-]?\s*([^\|]+?)(?:\s+Order\b|\s+Status\b|\s+Account\b|$)/i',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $text, $match)) {
                $raw = trim($match[1] ?? '');
                $parsed = $this->parseDateTime($raw);
                if ($parsed !== null) {
                    return $parsed;
                }
            }
        }

        return null;
    }

    private function matchOrderId(string $text): ?string
    {
        if (preg_match('/\b(?:Order\s+ID|Order\s+#)\s*[:\-]?\s*([A-Z0-9\-]+)/i', $text, $match)) {
            return trim($match[1]);
        }

        return null;
    }

    private function detectAccountType(string $text): string
    {
        $lower = strtolower($text);
        if (str_contains($lower, 'live') || str_contains($lower, 'real money')) {
            return 'live';
        }

        if (str_contains($lower, 'paper') || str_contains($lower, 'papermoney') || str_contains($lower, 'simulated')) {
            return 'paper';
        }

        return 'paper';
    }

    private function normalizeNumber(string $value): ?string
    {
        $clean = str_replace([',', '$'], '', $value);
        $clean = trim($clean);
        if ($clean === '') {
            return null;
        }

        return $clean;
    }

    private function parseDateTime(string $value): ?string
    {
        $clean = trim(preg_replace('/\s+/', ' ', $value) ?? '');
        if ($clean === '') {
            return null;
        }

        $timezone = $this->resolveTimezone($clean);
        $clean = preg_replace('/\b(ET|EST|EDT|CT|CST|CDT|MT|MST|MDT|PT|PST|PDT|UTC)\b/', '', $clean);
        $clean = trim($clean ?? '');

        try {
            $dt = new DateTimeImmutable($clean, $timezone);
        } catch (\Throwable $e) {
            log_message('warning', 'ThinkorSwimParser: unable to parse datetime: ' . $value);
            return null;
        }

        $serverTz = new DateTimeZone(date_default_timezone_get());
        return $dt->setTimezone($serverTz)->format('Y-m-d H:i:s');
    }

    private function resolveTimezone(string $value): DateTimeZone
    {
        $upper = strtoupper($value);
        $map = [
            'ET' => 'America/New_York',
            'EST' => 'America/New_York',
            'EDT' => 'America/New_York',
            'CT' => 'America/Chicago',
            'CST' => 'America/Chicago',
            'CDT' => 'America/Chicago',
            'MT' => 'America/Denver',
            'MST' => 'America/Denver',
            'MDT' => 'America/Denver',
            'PT' => 'America/Los_Angeles',
            'PST' => 'America/Los_Angeles',
            'PDT' => 'America/Los_Angeles',
            'UTC' => 'UTC',
        ];

        foreach ($map as $token => $tzName) {
            if (str_contains($upper, $token)) {
                return new DateTimeZone($tzName);
            }
        }

        return new DateTimeZone(date_default_timezone_get());
    }
}
