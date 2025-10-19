<?php

namespace App\Modules\APIs\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Services\BitcoinService;

class BitcoinController extends ResourceController
{
    protected $format = 'json';

    /**
     * POST /API/Bitcoin/buildUnsignedPsbt
     * Body: { "network":"mainnet|testnet", "inputs":[...], "outputs":[...] }
     * Returns: { status:"success", psbt:"<base64>" }
     */
    public function buildUnsignedPsbt()
    {
        $payload = $this->request->getJSON(true) ?? [];
        $net     = $payload['network'] ?? 'mainnet';
        $inputs  = $payload['inputs'] ?? [];
        $outputs = $payload['outputs'] ?? [];

        try {
            /** @var BitcoinService $svc */
            $svc     = service('BitcoinService') ?? new BitcoinService();
            $psbtB64 = $svc->buildUnsignedPsbt($inputs, $outputs, $net);
            return $this->respond(['status' => 'success', 'psbt' => $psbtB64]);
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
        $payload = $this->request->getJSON(true) ?? [];
        $hex     = $payload['hex'] ?? null;
        $net     = $payload['network'] ?? 'mainnet';

        if (!$hex) {
            return $this->failValidationErrors('Missing tx hex.');
        }

        try {
            /** @var BitcoinService $svc */
            $svc  = service('BitcoinService') ?? new BitcoinService();
            $txid = $svc->broadcastRawTransaction($hex, $net);
            return $this->respond(['status' => 'success', 'txid' => $txid]);
        } catch (\Throwable $e) {
            log_message('error', 'broadcastSignedTx failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->fail('Broadcast failed.');
        }
    }
}
?>
