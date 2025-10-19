<?php namespace App\Services;

use Config\CoinGecko;

class CoinGeckoService
{
    protected CoinGecko $cfg;

    public function __construct(?CoinGecko $cfg = null)
    {
        $this->cfg = $cfg ?? config('CoinGecko');
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

    public function simplePrice(array $ids, array $vs): array
    {
        $url = rtrim($this->cfg->base, '/').'/simple/price';
        $key = 'cg_simple_'.md5(implode(',', $ids).'_'.implode(',', $vs));
        $keySanitized = sanitizeCacheKey($key);
        $cache = cache();
        if ($cached = $cache->get($keySanitized)) {
            return $cached;
        }
        $res = $this->request('get', $url, [
            'headers' => ['Accept' => 'application/json'],
            'query' => [
                'ids' => implode(',', $ids),
                'vs_currencies' => implode(',', $vs)
            ]
        ]);
        $cache->save($keySanitized, $res, 300);
        return $res;
    }

    public function coinInfo(string $id): array
    {
        $url = rtrim($this->cfg->base, '/').'/coins/'.rawurlencode($id);
        $key = 'cg_coin_'.$id;
        $keySanitized = sanitizeCacheKey($key);
        $cache = cache();
        if ($cached = $cache->get($keySanitized)) {
            return $cached;
        }
        $res = $this->request('get', $url, ['headers' => ['Accept' => 'application/json']]);
        $cache->save($keySanitized, $res, 3600);
        return $res;
    }
}
?>