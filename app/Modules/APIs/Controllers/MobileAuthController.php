<?php

declare(strict_types=1);

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;
use App\Models\UserModel;
use App\Services\MobileAuthContext;
use App\Services\MobileAuthTokenService;

class MobileAuthController extends BaseAPIController
{
    private function payload(): array
    {
        return $this->request->getJSON(true) ?? $this->request->getPost() ?? [];
    }

    public function register()
    {
        $payload = $this->payload();
        $email = strtolower(trim((string) ($payload['email'] ?? '')));
        $username = trim((string) ($payload['username'] ?? ''));
        $password = (string) ($payload['password'] ?? '');

        if ($email === '' || $username === '' || strlen($password) < 8) {
            return $this->error('Email, username, and password (min 8 chars) are required.', 422);
        }

        $users = model(UserModel::class);
        if ($users->where('email', $email)->first() !== null) {
            return $this->error('Email is already registered.', 409);
        }

        $created = $users->insert([
            'email' => $email,
            'username' => $username,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'active' => 1,
            'status' => 'active',
        ]);

        if (! $created) {
            return $this->error('Unable to create account.', 500, ['errors' => $users->errors()]);
        }

        $userId = (int) $created;
        $token = (new MobileAuthTokenService())->issueToken($userId, (string) ($payload['device_name'] ?? 'mobile-app'));

        return $this->success([
            'user' => ['id' => $userId, 'email' => $email, 'username' => $username],
            'token' => $token,
        ], 201);
    }

    public function login()
    {
        $payload = $this->payload();
        $identifier = strtolower(trim((string) ($payload['email'] ?? $payload['login'] ?? '')));
        $password = (string) ($payload['password'] ?? '');

        if ($identifier === '' || $password === '') {
            return $this->error('Email/login and password are required.', 422);
        }

        $users = model(UserModel::class);
        $user = $users->groupStart()->where('email', $identifier)->orWhere('username', $identifier)->groupEnd()->first();

        if (! is_object($user) || ! isset($user->password_hash) || ! password_verify($password, (string) $user->password_hash)) {
            return $this->error('Invalid credentials.', 401);
        }

        $token = (new MobileAuthTokenService())->issueToken((int) $user->id, (string) ($payload['device_name'] ?? 'mobile-app'));

        return $this->success([
            'user' => ['id' => (int) $user->id, 'email' => (string) $user->email, 'username' => (string) $user->username],
            'token' => $token,
        ]);
    }

    public function logout()
    {
        $authHeader = $this->request->getHeaderLine('Authorization');
        $token = trim(str_ireplace('Bearer', '', $authHeader));

        if ($token !== '') {
            (new MobileAuthTokenService())->revokePlainToken($token);
        }

        service('mobileAuthContext')->clear();

        return $this->success(['revoked' => true]);
    }

    public function me()
    {
        $userId = service('mobileAuthContext')->userId();
        if ($userId === null) {
            return $this->error('Authentication required.', 401);
        }

        $user = model(UserModel::class)->find($userId);
        if (! is_object($user)) {
            return $this->error('User not found.', 404);
        }

        return $this->success([
            'id' => (int) $user->id,
            'email' => (string) $user->email,
            'username' => (string) $user->username,
            'active' => (int) ($user->active ?? 0),
        ]);
    }
}
