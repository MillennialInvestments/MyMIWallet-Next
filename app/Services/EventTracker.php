<?php

namespace App\Services;

use CodeIgniter\Database\ConnectionInterface;
use DateTimeImmutable;
use Myth\Auth\Models\UserModel;

class EventTracker
{
    private ConnectionInterface $db;

    public function __construct(?ConnectionInterface $db = null)
    {
        $this->db = $db ?? db_connect();
    }

    public function track(string $eventKey, array $meta = [], ?int $userId = null, ?string $group = null): void
    {
        if (! $this->db->tableExists('bf_user_events')) {
            return;
        }

        $request = service('request');
        $session = service('session');

        $resolvedUserId = $userId ?? (int) ($session->get('user_id') ?? $session->get('cuID') ?? 0);
        if ($resolvedUserId <= 0) {
            $auth = service('authentication');
            if (method_exists($auth, 'id')) {
                $resolvedUserId = (int) ($auth->id() ?? 0);
            }
        }

        $eventGroup = $group ?? $this->inferGroup($eventKey);
        $referralCode = $this->resolveReferralCode($resolvedUserId, $session);

        if ($eventGroup === 'referral' && $referralCode === null) {
            return;
        }

        $safeMeta = $this->sanitizeMeta($meta);
        $payload = [
            'user_id'       => $resolvedUserId > 0 ? $resolvedUserId : null,
            'event_key'     => $eventKey,
            'event_group'   => $eventGroup,
            'referral_code' => $referralCode,
            'ip'            => $request->getIPAddress(),
            'user_agent'    => $this->truncate((string) $request->getUserAgent()->getAgentString(), 255),
            'meta_json'     => $safeMeta !== [] ? json_encode($safeMeta, JSON_UNESCAPED_SLASHES) : null,
            'created_at'    => (new DateTimeImmutable('now'))->format('Y-m-d H:i:s'),
        ];

        $this->db->table('bf_user_events')->insert($payload);

        if (defined('ENVIRONMENT') && ENVIRONMENT === 'development') {
            log_message('debug', 'EventTracker logged {event}', [
                'event' => $eventKey,
                'user'  => $payload['user_id'],
            ]);
        }
    }

    private function inferGroup(string $eventKey): string
    {
        $prefix = strtolower(strtok($eventKey, '.'));
        return match ($prefix) {
            'auth' => 'auth',
            'setup', 'onboarding' => 'onboarding',
            'referral' => 'referral',
            default => 'auth',
        };
    }

    private function resolveReferralCode(int $userId, $session): ?string
    {
        $sessionCode = trim((string) ($session->get('referral_code') ?? ''));

        if ($userId <= 0) {
            return $sessionCode !== '' ? $sessionCode : null;
        }

        $user = model(UserModel::class)->find($userId);

        if (! $user) {
            return $sessionCode !== '' ? $sessionCode : null;
        }

        // Myth\Auth user is an Entity, not an array
        $userCode = is_string($user->referral_code ?? null)
            ? trim($user->referral_code)
            : null;

        if ($userCode !== '') {
            return $userCode;
        }

        return $sessionCode !== '' ? $sessionCode : null;
    }

    private function sanitizeMeta(array $meta): array
    {
        $forbidden = ['password', 'pass', 'token', 'secret', 'hash'];
        $clean = [];

        foreach ($meta as $key => $value) {
            $keyString = strtolower((string) $key);
            $blocked = false;
            foreach ($forbidden as $needle) {
                if (str_contains($keyString, $needle)) {
                    $blocked = true;
                    break;
                }
            }
            if ($blocked) {
                continue;
            }

            $clean[$key] = $value;
        }

        return $clean;
    }

    private function truncate(string $value, int $limit): string
    {
        if (mb_strlen($value) <= $limit) {
            return $value;
        }

        return mb_substr($value, 0, $limit);
    }
}
