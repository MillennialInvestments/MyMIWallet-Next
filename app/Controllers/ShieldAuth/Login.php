<?php

declare(strict_types=1);

namespace App\Controllers\ShieldAuth;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $config = config('Auth');

        return view($config->shieldViews['login'] ?? 'Auth/login', ['config' => $config]);
    }

    public function attempt()
    {
        $credentials = [
            'email' => (string) $this->request->getPost('login'),
            'password' => (string) $this->request->getPost('password'),
        ];

        $result = auth()->attempt($credentials);

        if (is_object($result) && method_exists($result, 'isOK') && $result->isOK()) {
            return redirect()->to('/Dashboard');
        }

        if ($result === true) {
            return redirect()->to('/Dashboard');
        }

        return redirect()->back()->withInput()->with('error', 'Shield login failed.');
    }
}
