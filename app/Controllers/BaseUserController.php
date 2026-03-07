<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class BaseUserController extends UserController
{
    protected ?int $userId = null;
    protected array $userContext = [];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->userId = $this->resolveCurrentUserId();
        $this->userContext = [
            'userId'    => $this->userId,
            'userEmail' => $this->session->get('email') ?? null,
            'isLoggedIn'=> $this->userId !== null,
        ];

        $this->data = array_merge($this->data, $this->userContext);
    }

    protected function requireAuthenticatedUser(): ?ResponseInterface
    {
        if ($this->userId !== null) {
            return null;
        }

        return redirect()->to('/login');
    }
}
