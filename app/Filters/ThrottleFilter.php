<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class ThrottleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $path = strtolower(trim($request->getUri()->getPath(), '/'));
        if (! str_starts_with($path, 'api/')) {
            return null;
        }

        $key   = 'req_' . $request->getIPAddress();
        $limit = cache()->get($key) ?? 0;

        if ($limit > 100) {
            return service('response')->setStatusCode(429);
        }

        cache()->save($key, $limit + 1, 60);

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }
}
