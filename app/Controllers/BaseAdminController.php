<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class BaseAdminController extends BaseUserController
{
    protected bool $isAdminUser = false;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->isAdminUser = $this->auth !== null && method_exists($this->auth, 'inGroup')
            ? (bool) $this->auth->inGroup('admin')
            : false;

        $this->data['isAdminUser'] = $this->isAdminUser;
    }

    protected function requireAdminAccess(): ?ResponseInterface
    {
        if ($this->isAdminUser) {
            return null;
        }

        return redirect()->to('/login')->with('error', 'Admin access required.');
    }
}
