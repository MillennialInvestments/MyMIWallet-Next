<?php

declare(strict_types=1);

namespace App\Controllers\Api;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;

class InternalApiController extends Controller
{
    protected function jsonOk($data, array $meta = [], int $http = 200): ResponseInterface
    {
        return $this->response->setStatusCode($http)->setJSON([
            'status' => 'ok',
            'data' => $data,
            'error' => null,
            'meta' => array_merge(['ts' => date('c')], $meta),
        ]);
    }

    protected function jsonError(string $code, string $message, int $http = 400, array $meta = []): ResponseInterface
    {
        return $this->response->setStatusCode($http)->setJSON([
            'status' => 'error',
            'data' => null,
            'error' => [
                'code' => $code,
                'message' => $message,
            ],
            'meta' => array_merge(['ts' => date('c')], $meta),
        ]);
    }
}
