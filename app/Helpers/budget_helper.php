<?php

if (!function_exists('budget_normalize_money')) {
    function budget_normalize_money(float|int|string $value, int $scale = 2): float
    {
        if (is_string($value)) {
            $value = preg_replace('/[^0-9.\-]/', '', $value);
        }

        $number = is_numeric($value) ? (float) $value : 0.0;

        return round($number, $scale);
    }
}

if (!function_exists('budget_normalize_date')) {
    function budget_normalize_date(?string $value, string $timezone = 'America/Chicago'): \DateTimeImmutable
    {
        $tz = new \DateTimeZone($timezone);

        if (is_string($value) && trim($value) !== '') {
            $candidate = date_create_immutable(trim($value), $tz);
            if ($candidate instanceof \DateTimeImmutable) {
                return $candidate->setTime(0, 0);
            }

            $formats = ['Y-m-d', 'm/d/Y', 'n/j/Y'];
            foreach ($formats as $format) {
                $dt = \DateTimeImmutable::createFromFormat($format, trim($value), $tz);
                if ($dt instanceof \DateTimeImmutable) {
                    return $dt->setTime(0, 0);
                }
            }
        }

        return new \DateTimeImmutable('now', $tz);
    }
}