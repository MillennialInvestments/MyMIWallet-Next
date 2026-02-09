<?php

namespace App\Services\Auth;

use Throwable;

class AuthLogger
{
    public function logLoginAttempt(string $emailOrUsername, string $ip, string $userAgent): void
    {
        if (! $this->isVerboseEnabled()) {
            return;
        }

        log_message('info', '[AUTH] Login attempt captured', [
            'login' => $this->maskLogin($emailOrUsername),
            'ip' => $ip,
            'ua' => $this->maskUserAgent($userAgent),
        ]);
    }

    public function logLoginFailure(string $reason, array $context = []): void
    {
        $level = $this->isVerboseEnabled() ? 'notice' : 'warning';
        $context['reason'] = $reason;

        if (isset($context['login'])) {
            $context['login'] = $this->maskLogin((string) $context['login']);
        }

        if (isset($context['user_agent'])) {
            $context['user_agent'] = $this->maskUserAgent((string) $context['user_agent']);
        }

        log_message($level, '[AUTH] Login failure', $context);
    }

    public function logAuthException(Throwable $e, array $context = []): void
    {
        if (isset($context['login'])) {
            $context['login'] = $this->maskLogin((string) $context['login']);
        }

        $context['exception'] = [
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
        ];

        log_message('error', '[AUTH] Login exception', $context);
    }

    private function isVerboseEnabled(): bool
    {
        return filter_var(env('AUTH_DEBUG_LOGGING', false), FILTER_VALIDATE_BOOLEAN);
    }

    private function maskLogin(string $login): string
    {
        if (! str_contains($login, '@')) {
            return substr($login, 0, 2) . str_repeat('*', max(0, strlen($login) - 2));
        }

        [$name, $domain] = explode('@', $login, 2);
        return substr($name, 0, 2) . '***@' . $domain;
    }

    private function maskUserAgent(string $userAgent): string
    {
        return mb_substr($userAgent, 0, 160);
    }
}
