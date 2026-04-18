<?php

namespace App\Controllers;

use App\Services\AuthAuditService;
use CodeIgniter\HTTP\ResponseInterface;

class Debug extends BaseController
{
    public function whoami(): ResponseInterface
    {
        $data = $this->commonData();
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        $isAuth = $this->safeAuthCheck();
        $user   = $this->safeAuthUser();

        $uid = null;
        if ($user) {
            if (isset($user->id)) {
                $uid = (int) $user->id;
            } elseif (method_exists($user, 'getId')) {
                $uid = (int) $user->getId();
            }
        }

        if ($uid === null && isset($data['cuID'])) {
            $uid = $data['cuID'];
        }

        $rawRoles = [];
        if ($user) {
            if (method_exists($user, 'getRoles')) {
                $rawRoles = $user->getRoles();
            } elseif (isset($user->roles)) {
                $rawRoles = $user->roles;
            }
        }

        $roles = [];
        foreach ((array) $rawRoles as $role) {
            if (is_string($role)) {
                $roles[] = $role;
            } elseif (is_object($role) && isset($role->name)) {
                $roles[] = $role->name;
            } elseif (is_array($role) && isset($role['name'])) {
                $roles[] = $role['name'];
            }
        }

        return $this->response->setJSON([
            'isAuth'     => $isAuth,
            'uid'        => $uid !== null ? (int) $uid : null,
            'cuID'       => $data['cuID'] ?? null,
            'roles'      => array_values(array_unique($roles)),
            'session_id' => session_id(),
            'headers'    => function_exists('getallheaders') ? getallheaders() : [],
        ]);
    }

    public function authAuditCacheSelfTest(): ResponseInterface
    {
        if (ENVIRONMENT === 'production') {
            return $this->response->setStatusCode(404);
        }

        $email        = (string) $this->request->getGet('email');
        $ip           = (string) ($this->request->getGet('ip') ?? $this->request->getIPAddress());
        $auditService = service('authAuditService');

        if (! $auditService instanceof AuthAuditService) {
            return $this->response->setJSON([
                'cache_available' => false,
                'error'           => 'AuthAuditService unavailable',
            ]);
        }

        $result = $auditService->debugCacheRoundTrip($email, $ip);

        return $this->response->setJSON($result);
    }
}