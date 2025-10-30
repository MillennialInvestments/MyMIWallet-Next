<?php namespace App\Services;

use Config\Infura;

class InfuraService
{
    protected Infura $cfg;

    public function __construct(?Infura $cfg = null)
    {
        $this->cfg = $cfg ?? config('Infura');
    }

    protected function http()
    {
        return \Config\Services::curlrequest();
    }

    protected function request(array $payload, int $attempts = 3)
    {
        $url = rtrim($this->cfg->base, '/').'/'.$this->cfg->projectId;
        for ($i = 0; $i < $attempts; $i++) {
            $resp = $this->http()->post($url, [
                'timeout' => $this->cfg->timeout,
                'json'    => $payload
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

    public function rpc(string $method, array $params = []): array
    {
        $payload = [
            'jsonrpc' => '2.0',
            'id'      => 1,
            'method'  => $method,
            'params'  => $params
        ];
        return $this->request($payload);
    }

    public function getBalance(string $address): array
    {
        return $this->rpc('eth_getBalance', [$address, 'latest']);
    }
}
?>