<?php

declare(strict_types=1);

namespace App\Auth;

use Myth\Auth\Authentication\AuthenticationInterface;
use Myth\Auth\Models\UserModel;

/**
 * Adapter so calls to auth() remain safe while Myth/Auth is the active runtime.
 */
class CompatAuthAdapter
{
    public function __construct(private AuthenticationInterface $authentication)
    {
    }

    public function attempt(array $credentials, bool $remember = false): bool
    {
        return (bool) $this->authentication->attempt($credentials, $remember);
    }

    public function check(): bool
    {
        return (bool) $this->authentication->check();
    }

    public function loggedIn(): bool
    {
        return $this->check();
    }

    public function id(): ?int
    {
        $id = $this->authentication->id();
        return $id === null ? null : (int) $id;
    }

    public function user(): ?object
    {
        $id = $this->id();
        if (! $id) {
            return null;
        }

        /** @var UserModel $users */
        $users = model(UserModel::class);

        return $users->find($id);
    }

    public function error(): ?string
    {
        if (method_exists($this->authentication, 'error')) {
            return $this->authentication->error();
        }

        return null;
    }

    public function getProvider(): UserModel
    {
        /** @var UserModel $users */
        $users = model(UserModel::class);
        return $users;
    }

    public function __call(string $name, array $arguments)
    {
        return $this->authentication->{$name}(...$arguments);
    }
}
