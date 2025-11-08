<?php
namespace App\Filters;

use App\Libraries\Observability\Metrics;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Adds correlation IDs and basic latency metrics for every request.
 */
class ObservabilityFilter implements FilterInterface
{
    /** @var string|null */
    private $rid;

    /** @var float|null */
    private $ts;

    public function before(RequestInterface $request, $arguments = null)
    {
        // Generate or forward X-Request-Id
        $this->rid = $request->getHeaderLine('X-Request-Id') ?: bin2hex(random_bytes(8));
        $this->ts  = microtime(true);

        // Expose correlation ID to upstreams immediately (before response object exists)
        header('X-Request-Id: ' . $this->rid);

        $method = strtoupper($request->getMethod());
        $path   = $request->getUri()->getPath() ?: '/';
        log_message('info', 'HTTP start {m} {u}', [
            'm' => $method,
            'u' => $path,
        ]);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $start = $this->ts ?? microtime(true);
        $ms    = (int) round((microtime(true) - $start) * 1000);
        $rid   = $this->rid ?? '';

        // Standard response headers
        $response->setHeader('X-Request-Id', $rid);
        $response->setHeader('X-Response-Time', $ms . 'ms');

        // Request meta
        $method = strtoupper($request->getMethod());
        // Prefer the URI accessor (avoid non-existent getPath() on Request)
        $path   = $request->getUri()->getPath() ?: '/';

        log_message('info', 'HTTP end {m} {u} -> {s} {ms}ms', [
            'm'  => $method,
            'u'  => $path,
            's'  => $response->getStatusCode(),
            'ms' => $ms,
        ]);

        if ($ms >= 5000) {
            log_message('warning', 'HTTP slow request {m} {u} -> {s} {ms}ms', [
                'm'  => $method,
                'u'  => $path,
                's'  => $response->getStatusCode(),
                'ms' => $ms,
            ]);
        }

        if (class_exists(Metrics::class)) {
            Metrics::observe('http_request_ms', $ms, [
                'route'  => $path,
                'code'   => (string) $response->getStatusCode(),
                'method' => $method,
            ]);
        }
    }
}
?>