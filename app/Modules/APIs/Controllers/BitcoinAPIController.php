<?php

declare(strict_types=1);

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;
use App\Services\BitcoinService;

class BitcoinAPIController extends BaseAPIController
{
    protected $format = 'json';

    /**
     * POST /API/Bitcoin/buildUnsignedPsbt
     * Body: { "network":"mainnet|testnet", "inputs":[...], "outputs":[...] }
     * Returns: { status:"success", psbt:"<base64>" }
     */
    public function buildUnsignedPsbt()
    {
        $payload = $this->request->getJSON(true) ?: $this->request->getPost() ?: [];
        $net     = $payload['network'] ?? 'mainnet';
        $inputs  = $payload['inputs'] ?? [];
        $outputs = $payload['outputs'] ?? [];

        if (empty($inputs) || ! is_array($inputs)) {
            return $this->failValidationErrors('Inputs must be a non-empty array.');
        }

        if (empty($outputs) || ! is_array($outputs)) {
            return $this->failValidationErrors('Outputs must be a non-empty array.');
        }

        try {
            /** @var BitcoinService $svc */
            $svc     = service('BitcoinService') ?? new BitcoinService();
            $psbtB64 = $svc->buildUnsignedPsbt($inputs, $outputs, (string) $net);
            return $this->respond([
                'status'  => 'success',
                'psbt'    => $psbtB64,
                'network' => $net,
                'dry_run' => true,
            ]);
        } catch (\InvalidArgumentException $e) {
            return $this->failValidationErrors($e->getMessage());
        } catch (\Throwable $e) {
            log_message('error', 'buildUnsignedPsbt failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->fail('Unable to build PSBT.');
        }
    }

    /**
     * POST /API/Bitcoin/broadcastSignedTx
     * Body: { "network":"mainnet|testnet", "hex":"<signed_tx_hex>" }
     * Returns: { status:"success", txid:"<txid>" }
     */
    public function broadcastSignedTx()
    {
        $payload = $this->request->getJSON(true) ?: $this->request->getPost() ?: [];
        $hex     = $payload['hex'] ?? null;
        $net     = $payload['network'] ?? 'mainnet';

        if (! $hex || ! is_string($hex)) {
            return $this->failValidationErrors('Missing or invalid tx hex.');
        }

        // Rejection of private keys
        $blocked = ['private_key', 'privateKey', 'secret', 'secret_key', 'seed', 'mnemonic'];
        foreach ($blocked as $key) {
            if (isset($payload[$key])) {
                return $this->failForbidden('Private key submission is strictly disabled.');
            }
        }

        try {
            /** @var BitcoinService $svc */
            $svc  = service('BitcoinService') ?? new BitcoinService();
            $txid = $svc->broadcastRawTransaction($hex, (string) $net);
            return $this->respond([
                'status'  => 'success',
                'txid'    => $txid,
                'network' => $net,
                'dry_run' => true,
            ]);
        } catch (\InvalidArgumentException $e) {
            return $this->failValidationErrors($e->getMessage());
        } catch (\Throwable $e) {
            log_message('error', 'broadcastSignedTx failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->fail('Broadcast failed.');
        }
    }
}
