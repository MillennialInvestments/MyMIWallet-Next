<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class CspFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // no-op
        // Disabled
        return;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // // Apply only to HTML responses (not JSON/API)
        // if (strpos((string) $response->getHeaderLine('Content-Type'), 'text/html') !== false) {
        //     $csp = "default-src 'self'; ".
        //            "script-src 'self' 'unsafe-inline' https://cdn.plaid.com; ".
        //            "worker-src 'self' blob:; child-src blob:; ".
        //            "connect-src 'self' https://production.plaid.com https://cdn.plaid.com https://*.plaid.com; ".
        //            "frame-src 'self' https://cdn.plaid.com https://*.plaid.com; ".
        //            "img-src 'self' data: https:; ".
        //            "style-src 'self' 'unsafe-inline' https:; ".
        //            "font-src 'self' data: https:";
        //     $response->setHeader('Content-Security-Policy', $csp);
        // }
        // Disabled
        return;
    }
}
