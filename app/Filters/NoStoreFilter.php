<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class NoStoreFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return $response
            ->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0, private')
            ->setHeader('Pragma', 'no-cache')
            ->setHeader('Expires', '0');
    }
}
