<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class RateLimitFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $path = strtolower(trim($request->getUri()->getPath(), '/'));

        if ($this->isNoisePath($path) && ! $this->isAuthenticated()) {
            return Services::response()
                ->setStatusCode(ResponseInterface::HTTP_NOT_FOUND)
                ->setBody('Not Found');
        }

        if (! $this->isAuthenticated() && $this->isBot($request)) {
            $cache = cache();
            $key = sanitizeCacheKey('ratelimit:bot:' . sha1($request->getIPAddress() . '|' . $request->getHeaderLine('User-Agent')));
            $attempts = (int) ($cache->get($key) ?? 0);
            $attempts++;
            $cache->save($key, $attempts, 60);

            if ($attempts > 60) {
                return Services::response()
                    ->setStatusCode(ResponseInterface::HTTP_TOO_MANY_REQUESTS)
                    ->setBody('Too Many Requests');
            }
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }

    private function isAuthenticated(): bool
    {
        $session = function_exists('session') ? session() : null;
        if ($session && $session->has('user_id')) {
            return true;
        }

        if (function_exists('auth')) {
            $auth = auth();
            if ($auth && method_exists($auth, 'loggedIn') && $auth->loggedIn()) {
                return true;
            }
        }

        return false;
    }

    private function isBot(RequestInterface $request): bool
    {
        $ua = strtolower($request->getHeaderLine('User-Agent'));
        if ($ua === '') {
            return true;
        }

        return (bool) preg_match('/bot|crawler|spider|scrapy|curl|wget|python|httpclient|httpclient|feed|scanner/i', $ua);
    }

    private function isNoisePath(string $path): bool
    {
        return str_starts_with($path, 'wp-includes/')
            || str_starts_with($path, 'wp-admin/')
            || str_starts_with($path, 'wp-content/')
            || $path === 'wp-login.php'
            || $path === 'xmlrpc.php';
    }
}
