<?php

declare(strict_types=1);

namespace App\Libraries\CryptoPay;

use Config\Services;

final class CurlHttp implements Http
{
    public function __construct(private int $timeout = 10)
    {
    }

    public function postJson(string $url, array $body): ?array
    {
        try {
            $res = Services::curlrequest(['timeout' => $this->timeout, 'http_errors' => false])
                ->post($url, ['headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'], 'body' => json_encode($body, JSON_UNESCAPED_SLASHES)]);
        } catch (\Throwable $e) {
            log_message('warning', 'Crypto checkout POST to {host} failed: {m}', ['host' => parse_url($url, PHP_URL_HOST), 'm' => $e->getMessage()]);
            return null;
        }
        if ($res->getStatusCode() !== 200) {
            log_message('warning', 'Crypto checkout POST to {host} returned {code}', ['host' => parse_url($url, PHP_URL_HOST), 'code' => $res->getStatusCode()]);
            return null;
        }
        $json = json_decode((string) $res->getBody(), true);
        return is_array($json) ? $json : null;
    }

    public function get(string $url): ?string
    {
        try {
            $res = Services::curlrequest(['timeout' => $this->timeout, 'http_errors' => false])
                ->get($url, ['headers' => ['Accept' => 'application/json']]);
        } catch (\Throwable $e) {
            log_message('warning', 'Crypto checkout GET {host} failed: {m}', ['host' => parse_url($url, PHP_URL_HOST), 'm' => $e->getMessage()]);
            return null;
        }
        return $res->getStatusCode() === 200 ? (string) $res->getBody() : null;
    }
}
