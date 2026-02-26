<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RequestLifecycleLogger implements FilterInterface
{
    private static array $timers = [];
    private static array $memory = [];

    public function before(RequestInterface $request, $arguments = null)
    {
        $key = spl_object_id($request);
        self::$timers[$key] = microtime(true);
        self::$memory[$key] = memory_get_usage(true);

        $router = service('router');
        $controller = method_exists($router, 'controllerName') ? (string) $router->controllerName() : 'unresolved';
        $method = method_exists($router, 'methodName') ? (string) $router->methodName() : 'unresolved';

        $reqId = $_SERVER['HTTP_X_REQUEST_ID'] ?? 'N/A';
        log_message('debug', '[REQ_ID=' . $reqId . '] [FILTER_BEFORE] ' . ($_SERVER['REQUEST_URI'] ?? (string) $request->getUri()));
        log_message('debug', '[REQ_ID=' . $reqId . '] [ROUTE] Controller=' . $controller . ' Method=' . $method);
        log_message('debug', '[REQ_ID=' . $reqId . '] [LIFECYCLE][START] ' . $request->getMethod() . ' ' . (string) $request->getUri());

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $key = spl_object_id($request);
        $start = self::$timers[$key] ?? microtime(true);
        $startMemory = self::$memory[$key] ?? memory_get_usage(true);

        $end = microtime(true);
        $durationMs = ($end - $start) * 1000;
        $endMemory = memory_get_usage(true);

        unset(self::$timers[$key], self::$memory[$key]);

        $reqId = $_SERVER['HTTP_X_REQUEST_ID'] ?? 'N/A';
        log_message('debug', '[REQ_ID=' . $reqId . '] [FILTER_AFTER]');
        log_message(
            'debug',
            '[REQ_ID=' . $reqId . '] [LIFECYCLE][END] status=' . $response->getStatusCode()
            . ' duration_ms=' . number_format($durationMs, 2)
            . ' memory_delta=' . ($endMemory - $startMemory)
        );

        return $response;
    }
}
