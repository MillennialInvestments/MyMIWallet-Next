<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class ObservabilityFilter implements FilterInterface
{
    /**
     * Simple per-request store for timing/correlation metadata.
     *
     * @var array<int, array{rid:string,start:float}>
     */
    private static array $context = [];

    public function before(RequestInterface $request, $arguments = null)
    {
        $rid = trim($request->getHeaderLine('X-Request-Id'));
        if ($rid === '') {
            $rid = $this->generateRequestId();
        }

        $key = spl_object_id($request);
        self::$context[$key] = [
            'rid'   => $rid,
            'start' => microtime(true),
        ];

        // Do not block.
        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $key     = spl_object_id($request);
        $context = self::$context[$key] ?? ['rid' => trim($request->getHeaderLine('X-Request-Id')), 'start' => null];
        unset(self::$context[$key]);

        $rid = $context['rid'] ?: $this->generateRequestId();
        $response->setHeader('X-Request-Id', $rid);

        $durationMs = null;
        if ($context['start'] !== null) {
            $durationMs = (microtime(true) - $context['start']) * 1000;
            if ($this->expectsJson($request)) {
                $response->setHeader('X-Response-Time-ms', sprintf('%.2f', $durationMs));
            }
        }

        if ($this->shouldLog()) {
            $path    = $request->getUri()->getPath();
            $method  = strtoupper($request->getMethod());
            $message = sprintf('[Observability] %s %s rid=%s', $method, $path, $rid);
            if ($durationMs !== null) {
                $message .= sprintf(' duration=%.2fms', $durationMs);
            }

            log_message('debug', $message);
        }

        return null;
    }

    private function generateRequestId(): string
    {
        return bin2hex(random_bytes(16));
    }

    private function expectsJson(RequestInterface $request): bool
    {
        $accepts = strtolower($request->getHeaderLine('Accept'));
        $content = strtolower($request->getHeaderLine('Content-Type'));

        return str_contains($accepts, 'application/json')
            || str_contains($content, 'application/json')
            || method_exists($request, 'isAJAX') && $request->isAJAX();
    }

    private function shouldLog(): bool
    {
        $obsLogEnabled = filter_var(env('OBS_LOG', false), FILTER_VALIDATE_BOOLEAN);
        return $obsLogEnabled || (defined('ENVIRONMENT') && ENVIRONMENT !== 'production');
    }
}
