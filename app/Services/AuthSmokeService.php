<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\AuthHealthRunModel;
use Config\Database;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel as MythUserModel;
use Throwable;

class AuthSmokeService
{
    public const TEST_EMAIL = 'auth_smoke@mymiwallet.local';
    public const TEST_PASSWORD = 'TestPassword123!';
    public const TEST_USERNAME = 'auth_smoke_user';

    public function run(?int $runByUserId = null): array
    {
        $startedAt = microtime(true);
        $steps = [];
        $db = null;
        $dbOk = false;

        try {
            $db = Database::connect();
            $db->initialize();
            $db->query('SELECT 1');
            $dbOk = true;
            $this->addStep($steps, 'db_connection', true, 'Connected');
        } catch (Throwable $e) {
            $this->addStep($steps, 'db_connection', false, 'Connection failed: ' . $e->getMessage());
        }

        $user = null;
        if ($dbOk) {
            $userResult = $this->ensureTestUser();
            $user = $userResult['user'];
            $this->addStep($steps, 'test_user', $userResult['ok'], $userResult['message']);
        } else {
            $this->addStep($steps, 'test_user', false, 'Skipped: database unavailable');
        }

        $authOk = false;
        $authMessage = 'Skipped: test user not available';
        if ($user) {
            $auth = service('authentication');
            $credentials = [
                'email' => self::TEST_EMAIL,
                'password' => self::TEST_PASSWORD,
            ];

            if ($auth && method_exists($auth, 'attempt') && $auth->attempt($credentials, false)) {
                $authOk = $auth->check();
                $authMessage = $authOk ? 'attempt() ok' : 'attempt() ok but auth check failed';
            } else {
                $authMessage = $auth && method_exists($auth, 'error') ? (string) $auth->error() : 'attempt() failed';
            }
        }
        $this->addStep($steps, 'auth_login', $authOk, $authMessage);

        $sessionOk = false;
        $sessionMessage = 'Skipped: login failed';
        if ($authOk) {
            $session = service('session');
            if ($session && method_exists($session, 'start')) {
                $session->start();
            }
            $oldId = session_id();
            $session->regenerate(true);
            $newId = session_id();
            $sessionOk = $newId !== '';
            $sessionMessage = $sessionOk ? 'session regenerated' : 'session id missing after regeneration';
        }
        $this->addStep($steps, 'session_regen', $sessionOk, $sessionMessage);

        $resetOk = false;
        $resetMessage = 'Skipped: login failed';
        if ($authOk) {
            $users = model(MythUserModel::class);
            $record = $users->where('email', self::TEST_EMAIL)->first();
            if ($record) {
                $record->generateResetHash();
                $users->save($record);
                $resetOk = ! empty($record->reset_hash);
                $resetMessage = $resetOk ? 'token created' : 'reset hash missing';
                if ($resetOk) {
                    $record->reset_hash = null;
                    $record->reset_at = date('Y-m-d H:i:s');
                    $record->reset_expires = null;
                    $users->save($record);
                }
            } else {
                $resetMessage = 'test user not found';
            }
        }
        $this->addStep($steps, 'reset_token', $resetOk, $resetMessage);

        $failedKeys = $this->collectFailures($steps);
        $score = $this->calculateScore($steps);
        $status = empty($failedKeys) ? 'PASS' : 'FAIL';
        $summary = empty($failedKeys)
            ? 'All checks passed.'
            : 'Failed steps: ' . implode(', ', $failedKeys) . '.';

        $details = ['steps' => $steps];
        $durationMs = (int) round((microtime(true) - $startedAt) * 1000);
        $runPayload = [
            'run_at' => date('Y-m-d H:i:s'),
            'status' => $status,
            'score' => $score,
            'summary' => $summary,
            'details_json' => json_encode($details, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'duration_ms' => $durationMs,
            'server' => $this->resolveServerName(),
            'build_tag' => $this->resolveBuildTag(),
        ];

        $runId = null;
        try {
            $model = new AuthHealthRunModel();
            $runId = (int) $model->insert($runPayload, true);
        } catch (Throwable $e) {
            log_message('error', '[AUTH_SMOKE] Failed to record run', [
                'summary' => $summary,
                'error' => $e->getMessage(),
            ]);
        }

        if ($status === 'FAIL') {
            log_message('error', '[AUTH_SMOKE] FAIL', [
                'run_id' => $runId,
                'summary' => $summary,
                'details' => $details,
            ]);
        }

        if ($authOk) {
            $auth = service('authentication');
            if ($auth && method_exists($auth, 'logout')) {
                $auth->logout();
            }
        }

        return [
            'status' => $status,
            'score' => $score,
            'summary' => $summary,
            'details' => $details,
            'duration_ms' => $durationMs,
            'run_id' => $runId,
            'server' => $runPayload['server'],
            'build_tag' => $runPayload['build_tag'],
        ];
    }

    private function ensureTestUser(): array
    {
        try {
            $users = model(MythUserModel::class);
            $existing = $users->where('email', self::TEST_EMAIL)->first();

            $data = [
                'email' => self::TEST_EMAIL,
                'username' => $this->resolveUsername($users),
                'password' => self::TEST_PASSWORD,
                'active' => 1,
                'force_pass_reset' => 0,
            ];

            if ($existing) {
                $existing->fill($data);
                $existing->activate();
                $users->save($existing);
                return [
                    'ok' => true,
                    'user' => $existing,
                    'message' => 'User exists id=' . (int) $existing->id,
                ];
            }

            $user = new User($data);
            $user->activate();
            $users->save($user);

            return [
                'ok' => true,
                'user' => $user,
                'message' => 'User created id=' . (int) $user->id,
            ];
        } catch (Throwable $e) {
            return [
                'ok' => false,
                'user' => null,
                'message' => 'User provisioning failed: ' . $e->getMessage(),
            ];
        }
    }

    private function resolveUsername(MythUserModel $users): string
    {
        $existing = $users->where('email', self::TEST_EMAIL)->first();
        if ($existing && ! empty($existing->username)) {
            return (string) $existing->username;
        }

        $username = self::TEST_USERNAME;
        $collision = $users->where('username', $username)->first();
        if (! $collision) {
            return $username;
        }

        return self::TEST_USERNAME . '_' . date('His');
    }

    private function addStep(array &$steps, string $key, bool $ok, string $message): void
    {
        $steps[] = [
            'key' => $key,
            'status' => $ok ? 'PASS' : 'FAIL',
            'message' => $message,
        ];
    }

    private function collectFailures(array $steps): array
    {
        $failed = [];
        foreach ($steps as $step) {
            if (($step['status'] ?? '') !== 'PASS') {
                $failed[] = (string) ($step['key'] ?? 'unknown');
            }
        }

        return $failed;
    }

    private function calculateScore(array $steps): int
    {
        $total = count($steps);
        if ($total === 0) {
            return 0;
        }

        $pass = 0;
        foreach ($steps as $step) {
            if (($step['status'] ?? '') === 'PASS') {
                $pass++;
            }
        }

        return (int) round(($pass / $total) * 100);
    }

    private function resolveServerName(): string
    {
        $hostname = gethostname();
        if ($hostname !== false && $hostname !== '') {
            return $hostname;
        }

        return php_uname('n');
    }

    private function resolveBuildTag(): ?string
    {
        $tag = env('BUILD_TAG');
        if ($tag !== null && $tag !== '') {
            return (string) $tag;
        }

        $hash = trim((string) shell_exec('git rev-parse --short HEAD 2>/dev/null'));
        return $hash !== '' ? $hash : null;
    }
}
