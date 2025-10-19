<?php namespace App\Services;

use Config\Etherscan;

class EtherscanService
{
    protected Etherscan $cfg;

    public function __construct(?Etherscan $cfg = null)
    {
        $this->cfg = $cfg ?? config('Etherscan');
    }

    protected function http()
    {
        return \Config\Services::curlrequest();
    }

    protected function request(array $params, int $attempts = 3)
    {
        $url = rtrim($this->cfg->base, '/');
        $params['apikey'] = $this->cfg->apiKey ?? '';
        for ($i = 0; $i < $attempts; $i++) {
            $resp = $this->http()->get($url, [
                'timeout' => $this->cfg->timeout,
                'query'   => $params
            ]);
            $code = $resp->getStatusCode();
            if ($code >= 200 && $code < 300) {
                return json_decode((string) $resp->getBody(), true) ?? [];
            }
            if ($code === 429 || $code >= 500) {
                sleep((int) pow(2, $i));
                continue;
            }
            break;
        }
        return [];
    }

    public function gasPrice(): array
    {
        $cache = cache();
        $key = sanitizeCacheKey('etherscan_gas');
        if ($cached = $cache->get($key)) {
            return $cached;
        }
        $res = $this->request(['module' => 'gastracker', 'action' => 'gasoracle']);
        $cache->save($key, $res, 60);
        return $res;
    }

    public function txStatus(string $txhash): array
    {
        return $this->request(['module' => 'transaction', 'action' => 'getstatus', 'txhash' => $txhash]);
    }
}
?>