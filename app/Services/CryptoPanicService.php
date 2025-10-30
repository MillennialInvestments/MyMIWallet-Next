<?php namespace App\Services;

use Config\CryptoPanic;

class CryptoPanicService
{
    protected CryptoPanic $cfg;

    public function __construct(?CryptoPanic $cfg = null)
    {
        $this->cfg = $cfg ?? config('CryptoPanic');
    }

    protected function http()
    {
        return \Config\Services::curlrequest();
    }

    protected function request(string $url, array $params = [], int $attempts = 3)
    {
        for ($i = 0; $i < $attempts; $i++) {
            $resp = $this->http()->get($url, [
                'headers' => $this->headers(),
                'timeout' => $this->cfg->timeout,
                'query'   => $params,
            ]);
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

    protected function headers(): array
    {
        return ['Accept' => 'application/json'];
    }

    public function latest(array $params = []): array
    {
        $url = rtrim($this->cfg->base, '/').'/posts/';
        if (!empty($this->cfg->apiKey)) {
            $params['auth_token'] = $this->cfg->apiKey;
        }
        $cacheKey = 'cp_latest_'.md5(json_encode($params));
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        $cache = cache();
        if ($cached = $cache->get($cacheKeySanitized)) {
            return $cached;
        }
        $res = $this->request($url, $params);
        $cache->save($cacheKeySanitized, $res, 300);
        return $res;
    }
}
?>