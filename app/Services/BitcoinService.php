<?php namespace App\Services;

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
        $url = rtrim($this->cfg->base, '/').$uri;
        for ($i = 0; $i < $attempts; $i++) {
            $resp = $this->http()->request($method, $url, $options + ['timeout' => $this->cfg->timeout]);
            $code = $resp->getStatusCode();
            if ($code >= 200 && $code < 300) {
                return json_decode((string)$resp->getBody(), true) ?? [];
            }
            if ($code === 429 || $code >= 500) {
                sleep((int) pow(2, $i));
                continue;
            }
            break;
        }
        return [];
    }

    public function isValidAddress(string $addr): bool
    {
        return is_string($addr) && strlen($addr) >= 26 && strlen($addr) <= 62;
    }

    public function getBalance(string $address): array
    {
        return $this->request('get', "/address/{$address}");
    }

    public function getUtxos(string $address): array
    {
        return $this->request('get', "/address/{$address}/utxo");
    }

    public function broadcast(string $rawHex): array
    {
        return $this->request('post', '/tx', ['body' => $rawHex, 'headers' => ['Content-Type' => 'text/plain']]);
    }

    /**
     * Build a base64 PSBT (no secrets).
     * @param array $inputs   Each: { txid, vout, ... plus either witnessUtxo or nonWitnessUtxo }
     * @param array $outputs  Each: { address, value } (sats)
     */
    public function buildUnsignedPsbt(array $inputs, array $outputs, string $network = 'mainnet'): string
    {
        // TODO: Implement with your UTXO/indexer source.
        throw new \RuntimeException('PSBT builder not implemented yet.');
    }

    /**
     * Broadcast a signed raw tx hex via your node/RPC.
     * Return the txid string on success.
     */
    public function broadcastRawTransaction(string $hex, string $network = 'mainnet'): string
    {
        // TODO: Implement with your RPC client (mempool.space/bitcoind/provider).
        throw new \RuntimeException('Broadcast not implemented yet.');
    }
}
?>