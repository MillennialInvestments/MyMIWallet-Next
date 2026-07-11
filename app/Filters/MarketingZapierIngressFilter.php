<?php

declare(strict_types=1);

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Throwable;

final class MarketingZapierIngressFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $config = config('Marketing')->zapierIngress;

        if (! (bool) ($config['enabled'] ?? false)) {
            return $this->reject(
                403,
                'ingress_disabled',
                'Marketing Zapier ingress is disabled.'
            );
        }

        if (strtoupper($request->getMethod()) !== 'POST') {
            return $this->reject(
                405,
                'method_not_allowed',
                'Only POST requests are accepted.'
            );
        }

        $contentType = strtolower(trim(
            explode(';', $request->getHeaderLine('Content-Type'), 2)[0]
        ));

        if ($contentType !== 'application/json') {
            return $this->reject(
                415,
                'unsupported_media_type',
                'Content-Type must be application/json.'
            );
        }

        $body = (string) $request->getBody();
        $maxBytes = max(1024, (int) ($config['max_bytes'] ?? 65536));

        if (strlen($body) > $maxBytes) {
            return $this->reject(
                413,
                'payload_too_large',
                'Request payload exceeds the configured size limit.'
            );
        }

        $source = strtolower(trim(
            $request->getHeaderLine('X-MyMI-Source')
        ));

        if (
            $source === ''
            || strlen($source) > 100
            || preg_match('/^[a-z0-9._:-]+$/', $source) !== 1
        ) {
            return $this->reject(
                400,
                'invalid_source',
                'A valid X-MyMI-Source header is required.'
            );
        }

        $allowedSources = array_map(
            'strtolower',
            (array) ($config['allowed_sources'] ?? [])
        );

        if (
            $allowedSources !== []
            && ! in_array($source, $allowedSources, true)
        ) {
            return $this->reject(
                403,
                'source_not_allowed',
                'The submitted source is not allowed.'
            );
        }

        $idempotencyKey = trim(
            $request->getHeaderLine('Idempotency-Key')
        );

        if (
            strlen($idempotencyKey) < 8
            || strlen($idempotencyKey) > 191
            || preg_match('/^[A-Za-z0-9._:-]+$/', $idempotencyKey) !== 1
        ) {
            return $this->reject(
                400,
                'invalid_idempotency_key',
                'A valid Idempotency-Key header is required.'
            );
        }

        $expectedKey = trim((string) ($config['webhook_key'] ?? ''));
        $providedKey = trim(
            $request->getHeaderLine('X-MyMI-Webhook-Key')
        );

        if (
            $expectedKey === ''
            || $providedKey === ''
            || ! hash_equals($expectedKey, $providedKey)
        ) {
            return $this->reject(
                401,
                'unauthorized',
                'Invalid or missing webhook credentials.'
            );
        }

        $rateLimit = max(1, (int) ($config['rate_limit'] ?? 60));

        try {
            $cache = cache();
            $cacheKey = 'mymi_zapier_ingress_' . sha1(
                $source . '|' . $request->getIPAddress()
            );

            $attempts = (int) ($cache->get($cacheKey) ?? 0) + 1;

            if ($attempts > $rateLimit) {
                return $this->reject(
                    429,
                    'rate_limited',
                    'The ingress request rate limit was exceeded.'
                );
            }

            $cache->save($cacheKey, $attempts, 60);
        } catch (Throwable $e) {
            log_message(
                'warning',
                '[MARKETING_ZAPIER_RATE_LIMIT_UNAVAILABLE] {message}',
                ['message' => $e->getMessage()]
            );

            return $this->reject(
                503,
                'rate_limit_unavailable',
                'Ingress protection is temporarily unavailable.'
            );
        }

        return null;
    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        return $response;
    }

    private function reject(
        int $statusCode,
        string $code,
        string $message
    ): ResponseInterface {
        return Services::response()
            ->setStatusCode($statusCode)
            ->setJSON([
                'status' => 'error',
                'data' => null,
                'error' => [
                    'code' => $code,
                    'message' => $message,
                ],
                'meta' => [
                    'ts' => date('c'),
                ],
            ]);
    }
}
