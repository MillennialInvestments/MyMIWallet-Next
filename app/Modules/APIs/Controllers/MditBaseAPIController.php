<?php

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;

use CodeIgniter\HTTP\ResponseInterface;

#[\AllowDynamicProperties]
class MditBaseAPIController extends BaseAPIController
{
    protected $format = 'json';

    /** @var \Myth\Auth\Authentication\AuthenticationInterface|\CodeIgniter\Shield\Authentication\Authentication|null */
    protected $auth;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->auth = service('authentication');
        helper(['text']);
    }

    protected function currentUserId(): ?int
    {
        try {
            if ($this->auth && method_exists($this->auth, 'id')) {
                $id = $this->auth->id();
                if ($id) {
                    return (int) $id;
                }
            }
        } catch (\Throwable $e) {
        }

        if (function_exists('user_id')) {
            $id = user_id();
            if ($id) {
                return (int) $id;
            }
        }

        $user = $this->auth?->user();
        if ($user && isset($user->id)) {
            return (int) $user->id;
        }

        $sid = session('user_id') ?? session('id') ?? session('cuID');
        return $sid ? (int) $sid : null;
    }

    protected function requireUserId(): int|ResponseInterface
    {
        $userId = $this->currentUserId();
        if (! $userId) {
            return $this->failUnauthorized('Authentication required.');
        }

        return $userId;
    }
}
