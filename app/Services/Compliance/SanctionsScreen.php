<?php

declare(strict_types=1);

namespace App\Services\Compliance;

/**
 * OFAC and sanctions screening service for multi-chain addresses.
 *
 * Checks addresses against writable/compliance/sanctions-addresses.txt,
 * falling back to app/Config/compliance/sanctions-seed.txt when the runtime file
 * is not yet initialized.
 *
 * Performance guarantee: loads addresses into a keyed lookup array for O(1)
 * sub-millisecond screening (< 5 ms per check).
 */
class SanctionsScreen
{
    private string $filePath;
    private string $seedPath;
    /** @var array<string, true>|null Keyed set of sanctioned addresses */
    private ?array $addressSet = null;

    public function __construct(?string $filePath = null)
    {
        $this->filePath = $filePath ?? (WRITEPATH . 'compliance/sanctions-addresses.txt');
        $this->seedPath = APPPATH . 'Config/compliance/sanctions-seed.txt';
    }

    public function isEnabled(): bool
    {
        $features = config('Features');
        if ($features !== null && method_exists($features, 'enabled')) {
            if ($features->enabled('FEATURE_SANCTIONS_SCREENING')) {
                return true;
            }
        }

        $screening = env('FEATURE_SANCTIONS_SCREENING');
        if ($screening !== null && filter_var($screening, FILTER_VALIDATE_BOOLEAN)) {
            return true;
        }

        $compliance = env('COMPLIANCE_SANCTIONS_ENABLED');
        if ($compliance !== null && filter_var($compliance, FILTER_VALIDATE_BOOLEAN)) {
            return true;
        }

        return false;
    }

    /**
     * Fast O(1) lookup of whether an address is sanctioned.
     */
    public function isSanctioned(string $address): bool
    {
        $target = strtolower(trim($address));
        if ($target === '') {
            return false;
        }

        $set = $this->loadSet();
        return isset($set[$target]);
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

    /**
     * Loads addresses into an in-memory hash set for sub-millisecond lookups.
     *
     * @return array<string, true>
     */
    public function loadSet(): array
    {
        if ($this->addressSet !== null) {
            return $this->addressSet;
        }

        $targetFile = is_file($this->filePath) ? $this->filePath : $this->seedPath;
        if (! is_file($targetFile)) {
            $this->addressSet = [];
            return $this->addressSet;
        }

        $lines = file($targetFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            $this->addressSet = [];
            return $this->addressSet;
        }

        $set = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }
            $set[strtolower($line)] = true;
        }

        $this->addressSet = $set;
        return $this->addressSet;
    }

    public function reload(): void
    {
        $this->addressSet = null;
    }
}
