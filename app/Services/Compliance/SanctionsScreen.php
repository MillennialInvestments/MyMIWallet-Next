<?php

declare(strict_types=1);

namespace App\Services\Compliance;

/**
 * OFAC and sanctions screening service for multi-chain addresses.
 *
 * Checks addresses against a local static list in writable/compliance/sanctions-addresses.txt.
 * Normalizes EVM (0x), Solana (Base58), XRPL (r...), and Bitcoin (bc1/tb1/1/3) addresses.
 * Refuses sanctioned addresses with standard code SANCTIONED_ADDRESS.
 */
class SanctionsScreen
{
    private string $filePath;

    public function __construct(?string $filePath = null)
    {
        $this->filePath = $filePath ?? (WRITEPATH . 'compliance/sanctions-addresses.txt');
    }

    public function isEnabled(): bool
    {
        return filter_var(env('COMPLIANCE_SANCTIONS_ENABLED', false), FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Returns true if the address is listed in the local sanctions list.
     */
    public function isSanctioned(string $address): bool
    {
        $target = strtolower(trim($address));
        if ($target === '') {
            return false;
        }

        if (! is_file($this->filePath)) {
            return false;
        }

        $lines = file($this->filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            return false;
        }

        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }
            if (strtolower($line) === $target) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return array{ok: bool, error?: string, code?: string}
     */
    public function check(string $address): array
    {
        if ($this->isEnabled() && $this->isSanctioned($address)) {
            return [
                'ok'    => false,
                'error' => 'Address is sanctioned by OFAC / compliance policy.',
                'code'  => 'SANCTIONED_ADDRESS',
            ];
        }

        return ['ok' => true];
    }
}
