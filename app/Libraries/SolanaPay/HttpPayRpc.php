<?php

declare(strict_types=1);

namespace App\Libraries\SolanaPay;

use Config\Services;

/**
 * Tries each RPC endpoint in order until one answers, so one provider being
 * down does not stop checkout (no single outside dependency).
 */
final class HttpPayRpc implements PayRpc
{
    /** @param list<string> $urls */
    public function __construct(private array $urls, private int $timeout = 10)
    {
    }

    public function call(string $method, array $params): mixed
    {
        $body = json_encode(['jsonrpc' => '2.0', 'id' => 1, 'method' => $method, 'params' => $params], JSON_UNESCAPED_SLASHES);
        foreach ($this->urls as $url) {
            try {
                $res = Services::curlrequest(['timeout' => $this->timeout, 'http_errors' => false])
                    ->post($url, ['headers' => ['Content-Type' => 'application/json'], 'body' => $body]);
                $json = json_decode((string) $res->getBody(), true);
            } catch (\Throwable $e) {
                log_message('warning', 'Solana RPC {method} failed on {host}: {m}', ['method' => $method, 'host' => parse_url($url, PHP_URL_HOST), 'm' => $e->getMessage()]);
                continue;
            }
            if (is_array($json) && array_key_exists('result', $json)) {
                return $json['result'];
            }
            log_message('warning', 'Solana RPC {method} error on {host}', ['method' => $method, 'host' => parse_url($url, PHP_URL_HOST)]);
        }
        return null;
    }

    public function getTransaction(string $signature): ?array
    {
        $r = $this->call('getTransaction', [$signature, ['encoding' => 'jsonParsed', 'commitment' => 'confirmed', 'maxSupportedTransactionVersion' => 0]]);
        return is_array($r) ? $r : null;
    }
}
