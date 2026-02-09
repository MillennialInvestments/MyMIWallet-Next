<?php

declare(strict_types=1);

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class InternalTokenFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (is_cli()) {
            return null;
        }

        $expected = trim((string) getenv('INTERNAL_API_TOKEN'));
        if ($expected === '') {
            $config = config('App');
            $expected = trim((string) ($config->internalApiToken ?? ''));
        }

        $provided = trim((string) $request->getHeaderLine('X-Internal-Token'));

        if ($expected === '' || $provided === '' || ! hash_equals($expected, $provided)) {
            return service('response')
                ->setStatusCode(403)
                ->setJSON([
                    'status' => 'error',
                    'data' => null,
                    'error' => [
                        'code' => 'forbidden',
                        'message' => 'Invalid or missing X-Internal-Token.',
                    ],
                    'meta' => [
                        'ts' => date('c'),
                    ],
                ]);
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }
}
