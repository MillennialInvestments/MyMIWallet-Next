<?php

declare(strict_types=1);

namespace App\Libraries\Trades;

use DateTimeImmutable;

/**
 * Standard OCC (Options Clearing Corporation) Option Symbology Parser & Normalizer.
 *
 * Supports:
 * 1. Standard 21-character OCC string: e.g. "IREN  261120C00015000"
 * 2. Schwab / ThinkorSwim human-readable format: e.g. "IREN 11/20/2026 15.00 C"
 * 3. TD Ameritrade / Broker descriptive export format: e.g. "SPY Sep 17 2021 449.0 Put"
 */
class OCCSymbolParser
{
    /**
     * Parse arbitrary option contract description or OCC symbol.
     *
     * @param string $raw
     * @return array{
     *   is_option: bool,
     *   underlying: string,
     *   expiration: string,
     *   option_type: string,
     *   strike: float,
     *   multiplier: int,
     *   occ_symbol: string
     * }|null
     */
    public static function parse(string $raw): ?array
    {
        $raw = trim($raw);
        if ($raw === '') {
            return null;
        }

        // 1. Check compact OCC 21-char format (e.g. "IREN  261120C00015000" or "NVDA  261120P00140000")
        if (preg_match('/^([A-Z]{1,6})\s*([0-9]{2})([0-9]{2})([0-9]{2})([CP])([0-9]{8})$/i', $raw, $m)) {
            $underlying = strtoupper(trim($m[1]));
            $year = 2000 + (int) $m[2];
            $month = str_pad($m[3], 2, '0', STR_PAD_LEFT);
            $day = str_pad($m[4], 2, '0', STR_PAD_LEFT);
            $expiration = sprintf('%04d-%s-%s', $year, $month, $day);
            $type = strtoupper($m[5]) === 'C' ? 'CALL' : 'PUT';
            $strike = ((int) $m[6]) / 1000.0;

            return [
                'is_option'   => true,
                'underlying'  => $underlying,
                'expiration'  => $expiration,
                'option_type' => $type,
                'strike'      => $strike,
                'multiplier'  => 100,
                'occ_symbol'  => self::formatOcc($underlying, $expiration, $type, $strike),
            ];
        }

        // 2. Check Schwab format: "IREN 11/20/2026 15.00 C" or "MARA 11/20/2026 22.00 Put"
        if (preg_match('/^([A-Z]{1,6})\s+([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})\s+([0-9]+(?:\.[0-9]+)?)\s+(C|CALL|P|PUT)$/i', $raw, $m)) {
            $underlying = strtoupper(trim($m[1]));
            $month = str_pad($m[2], 2, '0', STR_PAD_LEFT);
            $day = str_pad($m[3], 2, '0', STR_PAD_LEFT);
            $year = (int) $m[4];
            $expiration = sprintf('%04d-%s-%s', $year, $month, $day);
            $strike = (float) $m[5];
            $type = str_starts_with(strtoupper($m[6]), 'C') ? 'CALL' : 'PUT';

            return [
                'is_option'   => true,
                'underlying'  => $underlying,
                'expiration'  => $expiration,
                'option_type' => $type,
                'strike'      => $strike,
                'multiplier'  => 100,
                'occ_symbol'  => self::formatOcc($underlying, $expiration, $type, $strike),
            ];
        }

        // 3. Check legacy Broker format: "SPY Sep 17 2021 449.0 Put" or "ROOT Oct 15 2021 7.5 Call"
        if (preg_match('/^([A-Z]{1,6})\s+([A-Za-z]{3})\s+([0-9]{1,2})\s+([0-9]{4})\s+([0-9]+(?:\.[0-9]+)?)\s+(Call|Put)$/i', $raw, $m)) {
            $underlying = strtoupper(trim($m[1]));
            $dt = DateTimeImmutable::createFromFormat('M d Y', "{$m[2]} {$m[3]} {$m[4]}");
            $expiration = $dt ? $dt->format('Y-m-d') : date('Y-m-d');
            $strike = (float) $m[5];
            $type = strtoupper($m[6]);

            return [
                'is_option'   => true,
                'underlying'  => $underlying,
                'expiration'  => $expiration,
                'option_type' => $type,
                'strike'      => $strike,
                'multiplier'  => 100,
                'occ_symbol'  => self::formatOcc($underlying, $expiration, $type, $strike),
            ];
        }

        return null;
    }

    /**
     * Canonical 21-character OCC formatting.
     */
    public static function formatOcc(string $underlying, string $expirationYmd, string $type, float $strike): string
    {
        $root = str_pad(substr(strtoupper(trim($underlying)), 0, 6), 6, ' ', STR_PAD_RIGHT);
        $dt = new DateTimeImmutable($expirationYmd);
        $exp = $dt->format('ymd');
        $callPut = str_starts_with(strtoupper(trim($type)), 'C') ? 'C' : 'P';
        $strikeInt = (int) round($strike * 1000.0);
        $strikeFormatted = str_pad((string) $strikeInt, 8, '0', STR_PAD_LEFT);

        return $root . $exp . $callPut . $strikeFormatted;
    }
}
