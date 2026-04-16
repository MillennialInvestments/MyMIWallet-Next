<?php

namespace App\Services;

class AuthProviderResolver
{
    public function current(): string
    {
        return (string) env('auth.driver', 'myth');
    }

    public function isShield(): bool
    {
        return $this->current() === 'shield';
    }

    public function isMyth(): bool
    {
        return $this->current() === 'myth';
    }
}