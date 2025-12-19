<?php

namespace App\Services;

use App\Models\AuthRegistrationAttemptModel;
use CodeIgniter\HTTP\RequestInterface;
use Config\Services;
use Throwable;

class AuthAuditService
{
    private const STATUS_ATTEMPTED = 'attempted';
    private const STATUS_SUCCESS   = 'success';
    private const STATUS_FAILED    = 'failed';

    private const MAX_ALERTS_PER_WINDOW = 5;
    private const THROTTLE_WINDOW       = 900; // 15 minutes

    private string $supportEmail;
    private string $supportName;

    public function __construct(?string $supportEmail = null, ?string $supportName = null)
    {
        $this->supportEmail = $supportEmail ?? env('support.email', 'support@mymiwallet.com');
        $this->supportName  = $supportName ?? env('support.name', 'MyMI Wallet Support');
    }

    /**
     * Record an incoming registration POST. Returns meta including attemptId and eventId.
     */
    public function notifyRegistrationAttempt(?string $email, ?RequestInterface $request = null): array
    {
        $normalizedEmail = $this->normalizeEmail($email);
        $meta            = $this->buildMeta($request);
        $eventId         = $this->generateEventId();

        $attemptId = $this->persistAttempt([
            'email'        => $normalizedEmail,
            'status'       => self::STATUS_ATTEMPTED,
            'ip_address'   => $meta['ip'],
            'user_agent'   => $meta['user_agent'],
            'uri'          => $meta['uri'],
        ]);

        $meta['event_id'] = $eventId;
        $meta['attempt_id'] = $attemptId;

        if ($this->isThrottled($normalizedEmail, $meta['ip'])) {
            log_message('info', 'Registration attempt alert throttled.', [
                'email'    => $normalizedEmail,
                'ip'       => $meta['ip'],
                'event_id' => $eventId,
            ]);

            return $meta + ['throttled' => true];
        }

        $this->sendSupportEmail('Registration Attempt', $normalizedEmail, self::STATUS_ATTEMPTED, $meta);

        return $meta + ['throttled' => false];
    }

    /**
     * Notify and log the outcome of a registration flow.
     */
    public function notifyRegistrationResult(?string $email, string $status, ?RequestInterface $request = null, ?Throwable $exception = null, ?array $context = null): void
    {
        $normalizedEmail = $this->normalizeEmail($email);
        $meta            = $this->buildMeta($request);
        $eventId         = $context['event_id'] ?? $this->generateEventId();
        $attemptId       = $context['attempt_id'] ?? null;
        $errorMessage    = $this->extractErrorMessage($exception, $context['error'] ?? null);

        $this->updateAttempt($attemptId, $status, $errorMessage);

        $logContext = [
            'email'       => $normalizedEmail,
            'ip'          => $meta['ip'],
            'uri'         => $meta['uri'],
            'user_agent'  => $meta['user_agent'],
            'event_id'    => $eventId,
            'exception'   => $exception ? get_class($exception) : null,
            'message'     => $errorMessage,
            'file'        => $exception?->getFile(),
            'line'        => $exception?->getLine(),
            'post_keys'   => implode(',', $meta['post_keys']),
        ];

        if ($status === self::STATUS_SUCCESS) {
            log_message('info', 'Registration succeeded for {email} (event {event_id})', [
                'email'    => $normalizedEmail,
                'event_id' => $eventId,
            ]);
            // No success email to avoid noise
            return;
        }

        log_message('error', 'Registration failed: {message}', $logContext);

        if ($this->isThrottled($normalizedEmail, $meta['ip'])) {
            log_message('info', 'Registration failure alert throttled.', [
                'email'    => $normalizedEmail,
                'ip'       => $meta['ip'],
                'event_id' => $eventId,
            ]);
            return;
        }

        $meta['event_id']   = $eventId;
        $meta['attempt_id'] = $attemptId;
        $meta['error']      = $errorMessage;
        $meta['exception']  = $exception;

        $this->sendSupportEmail('Registration Failure', $normalizedEmail, $status, $meta);
    }

    private function normalizeEmail(?string $email): string
    {
        return strtolower(trim((string) ($email ?? '')));
    }

    private function generateEventId(): string
    {
        return bin2hex(random_bytes(8));
    }

    private function buildMeta(?RequestInterface $request = null): array
    {
        $request ??= service('request');
        $ip        = $request?->getIPAddress() ?? 'unknown';
        $uri       = $request?->getUri();
        $userAgent = $request?->getUserAgent();

        $postKeys = [];
        if ($request) {
            $postKeys = array_keys((array) ($request->getPost() ?? []));
        }

        return [
            'timestamp'  => date('c'),
            'ip'         => $ip,
            'uri'        => $uri ? $uri->getPath() : 'unknown',
            'method'     => $request?->getMethod() ?? 'unknown',
            'user_agent' => $this->truncate($userAgent?->getAgentString() ?? 'unknown', 255),
            'post_keys'  => $postKeys,
        ];
    }

    private function truncate(string $value, int $length): string
    {
        return mb_strlen($value) > $length ? mb_substr($value, 0, $length) : $value;
    }

    private function isThrottled(string $email, string $ip): bool
    {
        try {
            $cache = service('cache');
            if ($cache === null) {
                return false;
            }

            $cacheKeys = [
                $this->cacheKey('ip', $ip),
                $this->cacheKey('email', $email),
                $this->cacheKey('pair', $email . '|' . $ip),
            ];

            foreach ($cacheKeys as $key) {
                $count = (int) ($cache->get($key) ?? 0);
                $count++;
                $cache->save($key, $count, self::THROTTLE_WINDOW);

                if ($count > self::MAX_ALERTS_PER_WINDOW) {
                    return true;
                }
            }
        } catch (Throwable $e) {
            log_message('error', 'AuthAuditService cache failure: {msg}', ['msg' => $e->getMessage()]);
            return false;
        }

        return false;
    }

    private function cacheKey(string $type, string $value): string
    {
        $normalized = strtolower(trim($value));
        $hash       = hash('sha256', $normalized);

        return "auth_audit_{$type}_{$hash}";
    }

    public function debugCacheRoundTrip(string $email, string $ip): array
    {
        $cache = service('cache');
        $keys  = [
            'ip'    => $this->cacheKey('ip', $ip),
            'email' => $this->cacheKey('email', $email),
            'pair'  => $this->cacheKey('pair', $email . '|' . $ip),
        ];

        $result = [
            'keys'            => $keys,
            'cache_available' => $cache !== null,
            'counts'          => [],
        ];

        if ($cache === null) {
            return $result;
        }

        try {
            foreach ($keys as $label => $key) {
                $before = (int) ($cache->get($key) ?? 0);
                $cache->save($key, $before + 1, 60);
                $after = (int) ($cache->get($key) ?? 0);

                $result['counts'][$label] = [
                    'before' => $before,
                    'after'  => $after,
                ];
            }
        } catch (Throwable $e) {
            $result['error'] = $e->getMessage();
            log_message('error', 'AuthAuditService cache self-test failed: {msg}', ['msg' => $e->getMessage()]);
        }

        return $result;
    }

    private function sendSupportEmail(string $subjectPrefix, string $email, string $status, array $meta): void
    {
        $emailService = Services::email();
        $subject      = sprintf('%s | %s | %s', $subjectPrefix, $status, $meta['event_id'] ?? '');

        $messageLines = [
            sprintf('Status: %s', $status),
            sprintf('Email: %s', $email ?: '(empty)'),
            sprintf('Timestamp: %s', $meta['timestamp'] ?? date('c')),
            sprintf('IP: %s', $meta['ip'] ?? 'unknown'),
            sprintf('URI: %s', $meta['uri'] ?? 'unknown'),
            sprintf('Method: %s', $meta['method'] ?? 'unknown'),
            sprintf('User Agent: %s', $meta['user_agent'] ?? 'unknown'),
            sprintf('Event ID: %s', $meta['event_id'] ?? 'n/a'),
            sprintf('Attempt ID: %s', $meta['attempt_id'] ?? 'n/a'),
            sprintf('POST keys: %s', implode(',', $meta['post_keys'] ?? [])),
        ];

        if (! empty($meta['error'])) {
            $messageLines[] = 'Error: ' . $meta['error'];
        }

        if ($meta['exception'] instanceof Throwable) {
            $messageLines[] = 'Exception: ' . get_class($meta['exception']);
            $messageLines[] = 'File: ' . $meta['exception']->getFile();
            $messageLines[] = 'Line: ' . $meta['exception']->getLine();
        }

        $message = implode("\n", $messageLines);

        try {
            $emailService->setFrom($this->supportEmail, $this->supportName);
            $emailService->setTo($this->supportEmail);
            $emailService->setSubject($subject);
            $emailService->setMessage($message);
            $emailService->setMailType('text');

            if (! $emailService->send()) {
                log_message('warning', 'Registration audit email could not be sent: {reason}', [
                    'reason' => method_exists($emailService, 'printDebugger') ? $emailService->printDebugger(['headers']) : 'unknown',
                ]);
            }
        } catch (Throwable $e) {
            log_message('warning', 'Registration audit email failed to send: {msg}', [
                'msg' => $e->getMessage(),
            ]);
        }
    }

    private function persistAttempt(array $data): ?int
    {
        try {
            $model = new AuthRegistrationAttemptModel();
            $data['email_hash'] = $data['email'] !== '' ? hash('sha256', $data['email']) : null;
            $model->insert($data, true);

            return $model->getInsertID();
        } catch (Throwable $e) {
            log_message('warning', 'Failed to persist registration attempt: {msg}', ['msg' => $e->getMessage()]);
            return null;
        }
    }

    private function updateAttempt(?int $attemptId, string $status, ?string $errorMessage = null): void
    {
        if ($attemptId === null) {
            return;
        }

        try {
            $model = new AuthRegistrationAttemptModel();
            $model->update($attemptId, [
                'status'        => $status,
                'error_message' => $this->truncate((string) ($errorMessage ?? ''), 2000),
            ]);
        } catch (Throwable $e) {
            log_message('warning', 'Failed to update registration attempt: {msg}', ['msg' => $e->getMessage()]);
        }
    }

    private function extractErrorMessage(?Throwable $exception, ?string $fallback): string
    {
        if ($exception !== null) {
            return $exception->getMessage();
        }

        return (string) ($fallback ?? 'Unknown error');
    }
}