<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class DomainFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $host = $request->getServer('HTTP_HOST');

        if ($host === '67.205.42.220') {
            return redirect()->to('https://www.mymiwallet.com');
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
