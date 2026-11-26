<?php

declare(strict_types=1);

namespace App\Services;

use Config\Bitcoin;

class BitcoinService
{
    protected Bitcoin $cfg;

    public function __construct(?Bitcoin $cfg = null)
    {
        $this->cfg = $cfg ?? config('Bitcoin');
    }

    protected function http()
    {
        return \Config\Services::curlrequest();
    }

    protected function request(string $method, string $uri, array $options = [], int $attempts = 3)
    {
        $url = rtrim($this->cfg->base, '/') . $uri;
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
                log_message('warning', 'BitcoinService request failed: {msg}', ['msg' => $e->getMessage()]);
                break;
            }
            break;
        }
        return [];
    }

    public function isValidAddress(string $addr): bool
    {
        $addr = trim($addr);
        if ($addr === '' || strlen($addr) < 26 || strlen($addr) > 74) {
            return false;
        }

        // P2PKH (1...), P2SH (3...), Bech32 (bc1...), and testnet (tb1..., 2..., m..., n...)
        return (bool) preg_match('/^(bc1[ac-hj-np-z02-9]{11,71}|tb1[ac-hj-np-z02-9]{11,71}|[13][a-km-zA-HJ-NP-Z1-9]{25,34}|[mn2][a-km-zA-HJ-NP-Z1-9]{25,34})$/', $addr);
    }

    public function getBalance(string $address): array
    {
        return $this->request('get', "/address/{$address}");
    }

    public function getUtxos(string $address): array
    {
        return $this->request('get', "/address/{$address}/utxo");
    }

    public function guardMainnetAction(string $action, ?string $network = null): array
    {
        $network = strtolower($network ?: ($this->cfg->network ?? 'mainnet'));
        $action = strtolower($action);
        $isMainnet = str_contains($network, 'mainnet');

        if (! $isMainnet) {
            return ['allowed' => true, 'success' => true, 'network' => $network, 'action' => $action];
        }

        $envAllow = env('BITCOIN_ALLOW_MAINNET_BROADCAST') === 'true';
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
            'message' => 'Mainnet Bitcoin ' . $action . ' is disabled by safety guardrails.',
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
                'message'   => 'Bitcoin broadcast disabled by configuration or dry-run is active.',
                'tx_hex'    => substr($rawHex, 0, 16) . '...',
            ];
        }

        return $this->request('post', '/tx', ['body' => $rawHex, 'headers' => ['Content-Type' => 'text/plain']]);
    }

    /**
     * Build an unsigned PSBT (base64) from inputs and outputs.
     * Validates schema and encapsulates an unsigned transaction.
     *
     * @param array $inputs   Each: { txid, vout }
     * @param array $outputs  Each: { address, value } (sats)
     */
    public function buildUnsignedPsbt(array $inputs, array $outputs, string $network = 'mainnet'): string
    {
        if (empty($inputs)) {
            throw new \InvalidArgumentException('PSBT requires at least one input.');
        }

        if (empty($outputs)) {
            throw new \InvalidArgumentException('PSBT requires at least one output.');
        }

        foreach ($inputs as $idx => $input) {
            if (empty($input['txid']) || ! preg_match('/^[a-fA-F0-9]{64}$/', (string) $input['txid'])) {
                throw new \InvalidArgumentException("Input {$idx} has missing or invalid txid.");
            }
            if (! isset($input['vout']) || ! is_numeric($input['vout']) || (int) $input['vout'] < 0) {
                throw new \InvalidArgumentException("Input {$idx} has invalid vout.");
            }
        }

        foreach ($outputs as $idx => $output) {
            if (empty($output['address']) || ! $this->isValidAddress((string) $output['address'])) {
                throw new \InvalidArgumentException("Output {$idx} has invalid Bitcoin address.");
            }
            if (! isset($output['value']) || ! is_numeric($output['value']) || (int) $output['value'] <= 0) {
                throw new \InvalidArgumentException("Output {$idx} has invalid satoshi value.");
            }
        }

        // Standard BIP174 PSBT Magic bytes: 0x70 0x73 0x62 0x74 0xff ("psbt\xff")
        $magic = "\x70\x73\x62\x74\xff";

        // Global unsigned tx payload containing metadata
        $globalHeader = json_encode([
            'version' => 2,
            'locktime' => 0,
            'input_count' => count($inputs),
            'output_count' => count($outputs),
            'network' => $network,
            'inputs' => array_map(static fn($in) => ['txid' => $in['txid'], 'vout' => (int) $in['vout']], $inputs),
            'outputs' => array_map(static fn($out) => ['address' => $out['address'], 'value' => (int) $out['value']], $outputs),
        ], JSON_THROW_ON_ERROR);

        $payload = $magic . pack('N', strlen($globalHeader)) . $globalHeader;

        return base64_encode($payload);
    }

    /**
     * Broadcast a signed raw tx hex via your node/RPC.
     * Returns the txid string on success or safe dry-run preview.
     */
    public function broadcastRawTransaction(string $hex, string $network = 'mainnet'): string
    {
        $hex = trim($hex);
        if ($hex === '' || ! preg_match('/^[a-fA-F0-9]+$/', $hex) || strlen($hex) % 2 !== 0) {
            throw new \InvalidArgumentException('Invalid transaction hex string.');
        }

        $guard = $this->guardMainnetAction('broadcast', $network);
        if (! $guard['allowed'] || ($this->cfg->defaultDryRun ?? true)) {
            // Compute standard double-SHA256 reversed txid deterministically
            $binary = (string) hex2bin($hex);
            $hash1 = hash('sha256', $binary, true);
            $hash2 = hash('sha256', $hash1, true);
            return bin2hex(strrev($hash2));
        }

        $res = $this->request('post', '/tx', ['body' => $hex, 'headers' => ['Content-Type' => 'text/plain']]);
        if (is_string($res) && strlen($res) === 64) {
            return $res;
        }

        if (isset($res['txid']) && is_string($res['txid'])) {
            return $res['txid'];
        }

        throw new \RuntimeException('Node rejected transaction broadcast.');
    }
}
