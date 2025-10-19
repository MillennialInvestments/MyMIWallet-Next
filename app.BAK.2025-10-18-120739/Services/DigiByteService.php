<?php namespace App\Services;

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

    protected function base(): string
    {
        return rtrim($this->cfg->base, '/');
    }

    public function isValidAddress(string $addr): bool
    {
        return is_string($addr) && strlen($addr) >= 26 && strlen($addr) <= 62;
    }

    public function getBalance(string $address): array
    {
        $url = $this->base()."/get_address_balance/DGB/{$address}";
        $key = 'dgb_balance_'.$address;
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
        $url = $this->base()."/get_tx_unspent/DGB/{$address}";
        return $this->request('get', $url);
    }

    public function broadcast(string $rawHex): array
    {
        $url = $this->base()."/send_tx/DGB";
        return $this->request('post', $url, ['json' => ['tx_hex' => $rawHex]]);
    }
}
?>