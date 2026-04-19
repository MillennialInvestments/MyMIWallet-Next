<?php

namespace App\Auth;

use Myth\Auth\Authentication\AuthenticatorInterface;

class CompatAuthAdapter
{
    protected AuthenticatorInterface $authentication;

    public function __construct(AuthenticatorInterface $authentication)
    {
        $this->authentication = $authentication;
    }

    public function check(): bool
    {
        return $this->authentication->check();
    }

    public function user()
    {
        return $this->authentication->user();
    }

    public function id()
    {
        $user = $this->authentication->user();
        return $user->id ?? null;
    }

    public function loggedIn(): bool
    {
        return $this->authentication->check();
    }

    public function __call($method, $args)
    {
        return $this->authentication->{$method}(...$args);
    }
}