<?php

declare(strict_types=1);

namespace App\Controllers\ShieldAuth;

use App\Controllers\BaseController;

class Register extends BaseController
{
    public function index()
    {
        $config = config('Auth');

        return view($config->shieldViews['register'] ?? 'Auth/register', ['config' => $config]);
    }

    public function attempt()
    {
        $users = auth()->getProvider();

        $data = [
            'username' => (string) $this->request->getPost('username'),
            'email' => (string) $this->request->getPost('email'),
            'password' => (string) $this->request->getPost('password'),
        ];

        $users->save($data);

        return redirect()->to('/login-shield')->with('message', 'Registration created with Shield.');
    }
}
