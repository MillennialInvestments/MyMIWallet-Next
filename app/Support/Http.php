<?php

declare(strict_types=1);

namespace App\Support;

use CodeIgniter\HTTP\ResponseInterface;

class Http
{
    public static function get(string $url, array $options = [])
    {
        unset($options);

        return file_get_contents($url);
    }

    public static function post(string $url, array $data = [])
    {
        $context = stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($data),
            ],
        ]);

        return file_get_contents($url, false, $context);
    }

    public static function jsonSuccess(array $payload = [], bool $wrapData = true): ResponseInterface
    {
        $response = service('response');

        $body = $wrapData
            ? ['status' => 'success', 'data' => $payload]
            : $payload;

        return $response->setJSON($body);
    }

    public static function jsonError(string $message, int $statusCode = 500, array $extra = []): ResponseInterface
    {
        $response = service('response');

        return $response
            ->setStatusCode($statusCode)
            ->setJSON(array_merge([
                'status'  => 'error',
                'message' => $message,
            ], $extra));
    }
}
