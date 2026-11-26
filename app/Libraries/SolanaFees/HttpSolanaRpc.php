<?php

namespace App\Libraries\SolanaFees;

use Config\Services;

final class HttpSolanaRpc implements SolanaRpc
{
    public function __construct(private string $url)
    {
    }

    public function getTransaction(string $signature): ?array
    {
        $body = json_encode(['jsonrpc' => '2.0', 'id' => 1, 'method' => 'getTransaction',
            'params' => [$signature, ['encoding' => 'jsonParsed', 'commitment' => 'confirmed', 'maxSupportedTransactionVersion' => 0]]]);
        try {
            $res = Services::curlrequest(['timeout' => 10, 'http_errors' => false])
                ->post($this->url, ['headers' => ['Content-Type' => 'application/json'], 'body' => $body]);
            $json = json_decode((string) $res->getBody(), true);
        } catch (\Throwable $e) {
            log_message('warning', 'SolanaFees RPC failed: {m}', ['m' => $e->getMessage()]);
            return null;
        }
        return is_array($json['result'] ?? null) ? $json['result'] : null;
    }
}
