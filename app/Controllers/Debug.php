<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

class Debug extends BaseController
{
    public function whoami(): ResponseInterface
    {
        $data = $this->commonData();
        if ($data instanceof ResponseInterface) {
            return $data;
        }
        $auth   = service('authentication');
        $isAuth = $auth && method_exists($auth, 'check') ? (bool) $auth->check() : false;
        $user   = $isAuth && method_exists($auth, 'user') ? $auth->user() : null;
        $uid    = null;
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
                continue;
            }
            if (is_object($role) && isset($role->name)) {
                $roles[] = $role->name;
                continue;
            }
            if (is_array($role) && isset($role['name'])) {
                $roles[] = $role['name'];
            }
        }

        return $this->response->setJSON([
            'isAuth'    => $isAuth,
            'uid'       => $uid !== null ? (int) $uid : null,
            'cuID'      => $data['cuID'] ?? null,
            'roles'     => array_values(array_unique($roles)),
            'session_id'=> session_id(),
            'headers'   => function_exists('getallheaders') ? getallheaders() : [],
        ]);
    }
}