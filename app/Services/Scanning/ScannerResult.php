<?php

declare(strict_types=1);

namespace App\Services\Scanning;

final class ScannerResult
{
    public function __construct(
        public readonly string $symbol,
        public readonly string $timeframe,
        public readonly string $signal,
        public readonly string $direction,
        public readonly ?float $price,
        public readonly ?float $vwap,
        public readonly ?float $ema8,
        public readonly ?float $ema13,
        public readonly ?float $ema55,
        public readonly ?float $lastLiqHigh,
        public readonly ?float $lastLiqLow,
        public readonly ?float $volume,
        public readonly ?float $volSma20,
        public readonly ?float $atr14,
        public readonly string $occurredOn,
        public readonly array $payload,
    ) {
    }

    public static function fromScannerRow(array $row): self
    {
        return new self(
            strtoupper((string) ($row['symbol'] ?? '')),
            (string) ($row['timeframe'] ?? '1day'),
            strtoupper((string) ($row['signal'] ?? '')),
            strtoupper((string) ($row['direction'] ?? '')),
            isset($row['price']) ? (float) $row['price'] : null,
            isset($row['vwap']) ? (float) $row['vwap'] : null,
            isset($row['ema8']) ? (float) $row['ema8'] : null,
            isset($row['ema13']) ? (float) $row['ema13'] : null,
            isset($row['ema55']) ? (float) $row['ema55'] : null,
            isset($row['last_liq_high']) ? (float) $row['last_liq_high'] : null,
            isset($row['last_liq_low']) ? (float) $row['last_liq_low'] : null,
            isset($row['volume']) ? (float) $row['volume'] : null,
            isset($row['vol_sma20']) ? (float) $row['vol_sma20'] : null,
            isset($row['atr14']) ? (float) $row['atr14'] : null,
            (string) ($row['occurred_on'] ?? date('Y-m-d H:i:s')),
            self::decodePayload($row['payload_json'] ?? null),
        );
    }

    private static function decodePayload(mixed $payload): array
    {
        if (is_array($payload)) {
            return $payload;
        }

        if (is_string($payload) && $payload !== '') {
            $decoded = json_decode($payload, true);
            if (is_array($decoded)) {
                return $decoded;
            }
        }

        return [];
    }
}
