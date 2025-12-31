<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class CronKeyFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $expected = (string) env('CRON_KEY');
        $provided = trim($request->getHeaderLine('X-Cron-Key'));

        if ($provided === '') {
            $provided = (string) $request->getGet('cron_key');
        }

        if ($expected === '' || $provided !== $expected) {
            return $this->deny($request);
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }

    private function deny(RequestInterface $request): ResponseInterface
    {
        $response = Services::response()->setStatusCode(403);

        if ($this->expectsJson($request)) {
            return $response->setJSON([
                'error'   => 'forbidden',
                'message' => 'Invalid cron key provided.',
            ]);
        }

        return $response->setBody('Forbidden');
    }

    private function expectsJson(RequestInterface $request): bool
    {
        $accepts = strtolower($request->getHeaderLine('Accept'));
        $content = strtolower($request->getHeaderLine('Content-Type'));

        return str_contains($accepts, 'application/json')
            || str_contains($content, 'application/json')
            || method_exists($request, 'isAJAX') && $request->isAJAX();
    }
}
