<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class NoCacheFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Replace rather than merge: the framework's default noCache() value is
        // already present, and setHeader() would otherwise append duplicate
        // directives ("no-store, max-age=0, no-cache, no-store, ...").
        return $response
            ->removeHeader('Cache-Control')
            ->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->setHeader('Pragma', 'no-cache')
            ->setHeader('Expires', '0');
    }
}
