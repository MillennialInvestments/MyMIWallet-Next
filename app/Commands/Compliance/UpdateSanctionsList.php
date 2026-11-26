<?php

declare(strict_types=1);

namespace App\Commands\Compliance;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

/**
 * OFAC SDN crypto sanctions address list updater.
 *
 * Fetches updated sanctions lists from configured mirrors, verifies cryptographic SHA256 hashes,
 * atomically updates writable/compliance/sanctions-addresses.txt, and falls back to offline/seed
 * lists if the remote source is unreachable.
 */
class UpdateSanctionsList extends SafeBaseCommand
{
    protected $group = 'Compliance';
    protected $name = 'compliance:update-sanctions';
    protected $description = 'Fetch, hash-verify, and atomically update the OFAC SDN crypto sanctions address list.';
    protected $usage = 'compliance:update-sanctions [--source=URL] [--expected-hash=SHA256] [--force]';
    protected $options = [
        '--source'        => 'Custom URL to download sanctions list from.',
        '--expected-hash' => 'Expected SHA256 hash for strict integrity verification.',
        '--force'         => 'Force write even if remote hash matches current file.',
    ];

    public const DEFAULT_MIRROR = 'https://raw.githubusercontent.com/0xB10C/ofac-sanctioned-digital-currency-addresses/lists/sanctioned_addresses_All.txt';

    public function run(array $params)
    {
        $given = [];
        foreach (array_merge(CLI::getOptions(), $params) as $k => $v) {
            if (is_string($k) && str_contains($k, '=')) {
                [$k, $v] = explode('=', $k, 2);
            }
            if (is_string($k) && $v !== null && $v !== '') {
                $given[ltrim($k, '-')] = (string) $v;
            }
        }
        $opt = static fn (string $k, string $d = ''): string => $given[$k] ?? $d;

        $sourceUrl = $opt('source') ?: (env('SANCTIONS_LIST_URL') ?: self::DEFAULT_MIRROR);
        $expectedHash = strtolower($opt('expected-hash'));
        $force = isset($given['force']);

        $complianceDir = WRITEPATH . 'compliance';
        if (! is_dir($complianceDir)) {
            mkdir($complianceDir, 0755, true);
        }

        $targetFile = $complianceDir . '/sanctions-addresses.txt';
        $manifestFile = $complianceDir . '/sanctions-manifest.json';
        $seedFile = APPPATH . 'Config/compliance/sanctions-seed.txt';

        CLI::write("Fetching sanctions list from: {$sourceUrl}...");

        $content = $this->fetchUrl($sourceUrl);

        if ($content === null) {
            CLI::write("Remote fetch failed; engaging offline fallback...", 'yellow');
            if (is_file($targetFile)) {
                CLI::write("SEMANTIC_RESULT=PASS ACTION=offline_fallback_retained_existing");
                return 0;
            }
            if (is_file($seedFile)) {
                copy($seedFile, $targetFile);
                CLI::write("SEMANTIC_RESULT=PASS ACTION=offline_fallback_copied_seed");
                return 0;
            }
            CLI::write("SEMANTIC_RESULT=FAILED REASON=no_remote_or_offline_source", 'red');
            return 1;
        }

        $actualHash = hash('sha256', $content);

        if ($expectedHash !== '' && $actualHash !== $expectedHash) {
            CLI::write("SEMANTIC_RESULT=FAILED REASON=hash_mismatch EXPECTED={$expectedHash} ACTUAL={$actualHash}", 'red');
            return 2;
        }

        // Validate content is not HTML error page
        if (str_contains(strtolower($content), '<html') || str_contains(strtolower($content), '<!doctype')) {
            CLI::write("SEMANTIC_RESULT=FAILED REASON=invalid_content_html", 'red');
            return 3;
        }

        // Count valid addresses
        $lines = explode("\n", $content);
        $addressCount = 0;
        foreach ($lines as $line) {
            $trimmed = trim($line);
            if ($trimmed !== '' && ! str_starts_with($trimmed, '#')) {
                $addressCount++;
            }
        }

        // Atomic write
        $tmpFile = $targetFile . '.tmp-' . getmypid();
        file_put_contents($tmpFile, $content);
        rename($tmpFile, $targetFile);

        $manifest = [
            'updated_at_utc' => gmdate('Y-m-d\TH:i:s\Z'),
            'source_url'     => $sourceUrl,
            'sha256'         => $actualHash,
            'address_count'  => $addressCount,
        ];
        file_put_contents($manifestFile, json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        CLI::write("SEMANTIC_RESULT=PASS UPDATED=true HASH={$actualHash} COUNT={$addressCount}", 'green');
        return 0;
    }

    protected function fetchUrl(string $url): ?string
    {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT        => 10,
            CURLOPT_USERAGENT      => 'MyMIWallet-Compliance/1.0',
        ]);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($response === false || $httpCode < 200 || $httpCode >= 300) {
            return null;
        }

        return (string) $response;
    }
}
