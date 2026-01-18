<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CspOff implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // no-op
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $response->removeHeader('Content-Security-Policy');
        $response->removeHeader('Content-Security-Policy-Report-Only');
    }
}
