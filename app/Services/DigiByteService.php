<?php

declare(strict_types=1);

namespace App\Services;

use Config\DigiByte;

class DigiByteService
{
    protected DigiByte $cfg;

    public function __construct(?DigiByte $cfg = null)
    {
        $this->cfg = $cfg ?? config('DigiByte');
    }

    protected function http()
    {
        return \Config\Services::curlrequest();
    }

    protected function request(string $method, string $url, array $options = [], int $attempts = 3)
    {
        for ($i = 0; $i < $attempts; $i++) {
            try {
                $resp = $this->http()->request($method, $url, $options + [
                    'timeout'     => $this->cfg->timeout,
                    'http_errors' => false,
                ]);
                $code = $resp->getStatusCode();
                if ($code >= 200 && $code < 300) {
                    return json_decode((string) $resp->getBody(), true) ?? [];
                }
                if ($code === 429 || $code >= 500) {
                    sleep((int) pow(2, $i));
                    continue;
                }
            } catch (\Throwable $e) {
                log_message('warning', 'DigiByteService request failed: {msg}', ['msg' => $e->getMessage()]);
                break;
            }
            break;
        }
        return [];
    }

    protected function base(): string
    {
        return rtrim($this->cfg->base, '/');
    }

    public function isValidAddress(string $addr): bool
    {
        $addr = trim($addr);
        if ($addr === '' || strlen($addr) < 26 || strlen($addr) > 62) {
            return false;
        }

        // DigiByte Legacy P2PKH (D...), Script P2SH (S...), and SegWit Bech32 (dgb1...)
        return (bool) preg_match('/^(dgb1[ac-hj-np-z02-9]{11,71}|[DS][a-km-zA-HJ-NP-Z1-9]{25,34})$/', $addr);
    }

    public function getBalance(string $address): array
    {
        $url = $this->base() . "/get_address_balance/DGB/{$address}";
        $key = 'dgb_balance_' . $address;
        $keySanitized = sanitizeCacheKey($key);
        $cache = cache();
        if ($cached = $cache->get($keySanitized)) {
            return $cached;
        }
        $res = $this->request('get', $url);
        $cache->save($keySanitized, $res, 60);
        return $res;
    }

    public function getUtxos(string $address): array
    {
        $url = $this->base() . "/get_tx_unspent/DGB/{$address}";
        return $this->request('get', $url);
    }

    public function guardMainnetAction(string $action, ?string $network = null): array
    {
        $network = strtolower($network ?: ($this->cfg->network ?? 'mainnet'));
        $action = strtolower($action);
        $isMainnet = str_contains($network, 'mainnet');

        if (! $isMainnet) {
            return ['allowed' => true, 'success' => true, 'network' => $network, 'action' => $action];
        }

        $envAllow = env('DIGIBYTE_ALLOW_MAINNET_BROADCAST') === 'true';
        $configAllow = (bool) ($this->cfg->allowMainnetBroadcast ?? false);

        if ($envAllow || $configAllow) {
            return ['allowed' => true, 'success' => true, 'network' => 'mainnet', 'action' => $action];
        }

        return [
            'allowed' => false,
            'success' => false,
            'status'  => 'blocked',
            'network' => 'mainnet',
            'action'  => $action,
            'message' => 'Mainnet DigiByte ' . $action . ' is disabled by safety guardrails.',
        ];
    }

    public function broadcast(string $rawHex): array
    {
        $guard = $this->guardMainnetAction('broadcast');
        if (! $guard['allowed'] || ($this->cfg->defaultDryRun ?? true)) {
            return [
                'status'    => 'dry_run',
                'broadcast' => false,
                'dry_run'   => true,
                'message'   => 'DigiByte broadcast disabled by configuration or dry-run is active.',
                'tx_hex'    => substr($rawHex, 0, 16) . '...',
            ];
        }

        $url = $this->base() . '/send_tx/DGB';
        return $this->request('post', $url, ['json' => ['tx_hex' => $rawHex]]);
    }
}
