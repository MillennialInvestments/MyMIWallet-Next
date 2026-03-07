<?php

namespace App\Controllers;

use App\Services\InternalEndpointGuardService;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class BaseAPIController extends BaseController
{
    use ResponseTrait;

    protected InternalEndpointGuardService $internalEndpointGuard;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->internalEndpointGuard = new InternalEndpointGuardService();
    }

    protected function success(array $data = [], int $status = 200): ResponseInterface
    {
        return $this->response->setStatusCode($status)->setJSON([
            'status' => 'success',
            'data'   => $data,
        ]);
    }

    protected function error(string $message, int $status = 400, array $data = []): ResponseInterface
    {
        return $this->response->setStatusCode($status)->setJSON([
            'status'  => 'error',
            'message' => $message,
            'data'    => $data,
        ]);
    }

    protected function authorizeInternalEndpoint(bool $allowAuthenticatedUser = true): ?ResponseInterface
    {
        return $this->internalEndpointGuard->authorize($allowAuthenticatedUser);
    }
}
