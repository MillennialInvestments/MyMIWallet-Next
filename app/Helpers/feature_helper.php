<?php

declare(strict_types=1);

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

if (! function_exists('feature_enabled')) {
    function feature_enabled(string $key): bool
    {
        return (bool) config('Features')->enabled($key);
    }
}

if (! function_exists('feature_guard')) {
    /**
     * @param array<string,mixed> $context
     */
    function feature_guard(string $key, array $context = []): ResponseInterface|RedirectResponse|null
    {
        if (feature_enabled($key)) {
            return null;
        }

        $request = service('request');
        $response = service('response');

        $accept = strtolower((string) $request->getHeaderLine('Accept'));
        $requestedWith = strtolower((string) $request->getHeaderLine('X-Requested-With'));
        $expectsJson = $request->isAJAX() || str_contains($accept, 'application/json') || $requestedWith === 'xmlhttprequest';

        $logContext = [
            'feature' => $key,
            'uri' => '/' . ltrim((string) $request->getUri()->getPath(), '/'),
            'method' => strtoupper($request->getMethod()),
            'expects_json' => $expectsJson,
            'context' => $context,
        ];

        log_message('warning', 'Feature guard blocked request: {feature} {method} {uri}', $logContext);

        if ($expectsJson) {
            return $response
                ->setStatusCode(503)
                ->setJSON([
                    'status' => 'error',
                    'message' => 'Temporarily disabled',
                    'feature' => $key,
                ]);
        }

        $payload = [
            'feature' => $key,
            'supportUrl' => site_url('Support'),
            'context' => $context,
        ];

        return $response
            ->setStatusCode(503)
            ->setBody(view('errors/feature_disabled', $payload));
    }
}
