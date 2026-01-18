<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;
use Config\Services;
use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel as MythUserModel;
use Throwable;

class AuthAudit extends BaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'auth:audit';
    protected $description = 'Audit Myth:Auth authentication and account lifecycle safely.';

    private array $results = [];
    private array $failures = [];
    private array $warnings = [];
    private $db;

    private const MAX_FAILURES = 25;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function run(array $params)
    {
        $startTime   = microtime(true);
        $startedAt   = date('Y-m-d H:i:s');
        $memoryStart = memory_get_usage(true);

        log_message('info', 'auth:audit started', [
            'started_at'   => $startedAt,
            'memory_start' => $memoryStart,
        ]);

        $db = $this->db;
        $authConfig = config('Auth');
        $sessionConfig = config('Session');
        $appConfig = config('App');
        $securityConfig = config('Security');

        $testUser = null;
        $createdUser = false;

        $this->auditConfig($authConfig, $sessionConfig, $appConfig, $securityConfig);

        $this->runTest('Registration: Valid registration', function () use (&$testUser, &$createdUser, $authConfig, $db) {
            $result = $this->createEphemeralTestUser($authConfig);

            if (! $result) {
                $fallback = $this->findFallbackTestUser($db);
                if ($fallback) {
                    $testUser = $fallback;
                    $createdUser = false;
                    return $this->resultWarning('Ephemeral user creation failed; using existing test user.');
                }

                return $this->resultFailure('Unable to create or locate a test user.');
            }

            $testUser = $result;
            $createdUser = true;

            $passwordHash = $testUser['password_hash'] ?? '';
            $plaintext = $testUser['password'] ?? '';

            if ($passwordHash === '' || $plaintext === '' || $passwordHash === $plaintext) {
                return $this->resultFailure('Password hash missing or matches plaintext.');
            }

            if (! password_verify($plaintext, $passwordHash)) {
                return $this->resultFailure('Stored password hash does not verify.');
            }

            if (! empty($authConfig->defaultUserGroup)) {
                $assigned = $this->checkUserGroupAssignment($db, (int) $testUser['id'], $authConfig->defaultUserGroup);
                if (! $assigned) {
                    return $this->resultWarning('Default user group not assigned.');
                }
            }

            if ($authConfig->requireActivation !== null) {
                if (empty($testUser['activate_hash'])) {
                    return $this->resultFailure('Activation required but activation hash missing.');
                }
            }

            return $this->resultPass('User created and validated.');
        });

        $this->runTest('Registration: Missing email', function () {
            $data = [
                'username' => 'test_missing_email',
                'password' => 'StrongPass!123',
                'pass_confirm' => 'StrongPass!123',
            ];

            $validation = $this->validateRegistrationData($data);
            if ($validation['success']) {
                return $this->resultFailure('Validation unexpectedly passed without email.');
            }

            return $this->resultPass('Validation failed as expected.', $validation['errors']);
        });

        $this->runTest('Registration: Invalid email format', function () {
            $data = [
                'username' => 'test_invalid_email',
                'email' => 'invalid-email',
                'password' => 'StrongPass!123',
                'pass_confirm' => 'StrongPass!123',
            ];

            $validation = $this->validateRegistrationData($data);
            if ($validation['success']) {
                return $this->resultFailure('Validation unexpectedly passed with invalid email.');
            }

            return $this->resultPass('Validation failed as expected.', $validation['errors']);
        });

        $this->runTest('Registration: Weak password', function () {
            $data = [
                'username' => 'test_weak_password',
                'email' => 'weak_password@example.test',
                'password' => '123',
                'pass_confirm' => '123',
            ];

            $validation = $this->validateRegistrationData($data);
            if ($validation['success']) {
                return $this->resultFailure('Validation unexpectedly passed for weak password.');
            }

            return $this->resultPass('Validation failed as expected.', $validation['errors']);
        });

        $this->runTest('Registration: Duplicate email', function () use (&$testUser) {
            if (! $testUser) {
                return $this->resultWarning('Skipped: no test user available.');
            }

            $data = [
                'username' => 'duplicate_email',
                'email' => $testUser['email'],
                'password' => 'StrongPass!123',
                'pass_confirm' => 'StrongPass!123',
            ];

            $validation = $this->validateRegistrationData($data);
            if ($validation['success']) {
                return $this->resultFailure('Validation unexpectedly passed for duplicate email.');
            }

            return $this->resultPass('Duplicate email rejected as expected.', $validation['errors']);
        });

        $this->runTest('Registration: CSRF token missing', function () use ($securityConfig) {
            if (empty($securityConfig->csrfProtection)) {
                return $this->resultWarning('CSRF protection disabled; cannot validate missing token behavior.');
            }

            $viewPath = APPPATH . 'Views/Auth/register_form.php';
            if (! is_file($viewPath)) {
                return $this->resultWarning('Registration view not found; cannot confirm CSRF field.');
            }

            $contents = file_get_contents($viewPath);
            if ($contents === false || ! str_contains($contents, 'csrf_field()')) {
                return $this->resultFailure('Registration form missing csrf_field().');
            }

            return $this->resultPass('CSRF field present in registration form.');
        });

        $this->runLoginTests($testUser, $authConfig, $db);
        $this->runLogoutTests($testUser);
        $this->runForgotPasswordTests($testUser, $db);
        $this->runResetPasswordTests($testUser, $db);
        $this->runEmailTests($testUser);

        if ($createdUser && $testUser) {
            $this->runTest('Cleanup: Remove ephemeral test user', function () use ($db, &$testUser) {
                if ($this->deleteTestUser($db, (int) $testUser['id'])) {
                    return $this->resultPass('Ephemeral test user removed.');
                }

                $this->markTestUser($db, (int) $testUser['id']);
                return $this->resultWarning('Failed to delete test user; marked as test-only.');
            });
        }

        $summary = $this->renderSummary($startTime, $memoryStart);
        $this->writeAuditReport($summary);
        $this->insertAuditLog($db, $summary);
    }

    private function auditConfig($authConfig, $sessionConfig, $appConfig, $securityConfig): void
    {
        $this->runTest('Session & Cookie: Config validation', function () use ($authConfig, $sessionConfig, $appConfig, $securityConfig) {
            $issues = [];

            if (! is_bool($appConfig->cookieSecure)) {
                $issues[] = 'Config\App::$cookieSecure is not boolean.';
            }

            if (is_string($appConfig->cookieSecure) && strtolower($appConfig->cookieSecure) === 'auto') {
                $issues[] = 'Config\App::$cookieSecure set to "auto" (unsupported).';
            }

            if (! is_bool($sessionConfig->cookieSecure)) {
                $issues[] = 'Config\Session::$cookieSecure is not boolean.';
            }

            $sameSite = strtolower((string) $appConfig->cookieSameSite);
            if ($sameSite !== '' && ! in_array($sameSite, ['lax', 'strict', 'none'], true)) {
                $issues[] = 'Config\App::$cookieSameSite must be Lax, Strict, or None.';
            }

            $cookiePrefix = $appConfig->cookiePrefix;
            if (! is_string($cookiePrefix)) {
                $issues[] = 'Config\App::$cookiePrefix must be a string.';
            } elseif ($cookiePrefix !== '' && ! preg_match('/^[0-9A-Za-z_]+$/', $cookiePrefix)) {
                $issues[] = 'Config\App::$cookiePrefix must be alphanumeric/underscore only.';
            }

            $cookiePath = $appConfig->cookiePath;
            if (! is_string($cookiePath) || $cookiePath === '' || $cookiePath[0] !== '/') {
                $issues[] = 'Config\App::$cookiePath must start with "/".';
            }

            $cookieDomain = (string) ($appConfig->cookieDomain ?? '');
            if ($cookieDomain !== '' && $cookieDomain !== '.mymiwallet.com') {
                $issues[] = 'Config\App::$cookieDomain should be ".mymiwallet.com".';
            }

            if ($sessionConfig->driver === \CodeIgniter\Session\Handlers\FileHandler::class) {
                $path = $sessionConfig->savePath;
                if ($path === '' || ! is_dir($path) || ! is_writable($path)) {
                    $issues[] = 'Session save path is not writable: ' . ($path ?: '[empty]');
                }
            }

            $baseHost = parse_url($appConfig->baseURL ?? '', PHP_URL_HOST);
            if ($cookieDomain !== '' && $baseHost !== null && $baseHost !== '') {
                $normalizedCookieDomain = ltrim($cookieDomain, '.');
                if (! str_contains($baseHost, $normalizedCookieDomain)) {
                    $issues[] = 'Cookie domain does not match baseURL host.';
                }
            }

            if (! empty($securityConfig->csrfProtection) && empty($securityConfig->tokenName)) {
                $issues[] = 'CSRF protection enabled but tokenName missing.';
            }

            if ($issues !== []) {
                return $this->resultWarning('Config issues detected.', $issues);
            }

            return $this->resultPass('Config values appear valid.');
        });

        $this->runTest('Session & Cookie: Secure cookie alignment', function () use ($appConfig, $sessionConfig) {
            if ($appConfig->cookieSecure === $sessionConfig->cookieSecure) {
                return $this->resultPass('Secure cookie flags aligned.');
            }

            return $this->resultWarning('App/Session secure cookie flags are not aligned.', [
                'app_cookie_secure' => $appConfig->cookieSecure,
                'session_cookie_secure' => $sessionConfig->cookieSecure,
            ]);
        });
    }

    private function runLoginTests(?array $testUser, $authConfig, $db): void
    {
        $this->runTest('Login: Valid login', function () use ($testUser) {
            if (! $testUser) {
                return $this->resultWarning('Skipped: no test user available.');
            }

            if (empty($testUser['password'])) {
                return $this->resultWarning('Skipped: test user password unavailable.');
            }

            $auth = service('authentication');
            $session = session();

            $users = model(MythUserModel::class);
            $userEntity = $users->find($testUser['id']);
            if ($userEntity && config('Auth')->requireActivation !== null && ! $userEntity->active) {
                $userEntity->activate();
                $users->save($userEntity);
            }

            $auth->logout();
            $success = $auth->attempt(['email' => $testUser['email'], 'password' => $testUser['password']]);

            if (! $success || ! $auth->check()) {
                return $this->resultFailure('Valid login failed.');
            }

            if ($session->get('logged_in') === null) {
                return $this->resultWarning('Session missing logged_in flag after login.');
            }

            return $this->resultPass('Login succeeded and session established.');
        });

        $this->runTest('Login: Wrong password', function () use ($testUser, $db) {
            if (! $testUser) {
                return $this->resultWarning('Skipped: no test user available.');
            }

            if (empty($testUser['password'])) {
                return $this->resultWarning('Skipped: test user password unavailable.');
            }

            $auth = service('authentication');
            $before = $this->countLoginAttempts($db, $testUser['email']);
            $success = $auth->attempt(['email' => $testUser['email'], 'password' => 'WrongPass!123']);

            if ($success) {
                return $this->resultFailure('Login unexpectedly succeeded with wrong password.');
            }

            $after = $this->countLoginAttempts($db, $testUser['email']);
            if ($before !== null && $after !== null && $after <= $before) {
                return $this->resultWarning('Failed login attempts not tracked in auth_logins.');
            }

            return $this->resultPass('Wrong password rejected.');
        });

        $this->runTest('Login: Non-existent user', function () {
            $auth = service('authentication');
            $success = $auth->attempt(['email' => 'missing_user@example.test', 'password' => 'AnyPass!123']);

            if ($success) {
                return $this->resultFailure('Login unexpectedly succeeded with non-existent user.');
            }

            return $this->resultPass('Non-existent user rejected.');
        });

        $this->runTest('Login: Remember-me enabled', function () use ($testUser, $authConfig, $db) {
            if (! $testUser) {
                return $this->resultWarning('Skipped: no test user available.');
            }

            if (empty($testUser['password'])) {
                return $this->resultWarning('Skipped: test user password unavailable.');
            }

            if (! $authConfig->allowRemembering) {
                return $this->resultWarning('Remember-me disabled in config.');
            }

            $auth = service('authentication');
            $auth->logout();
            $success = $auth->attempt(['email' => $testUser['email'], 'password' => $testUser['password']], true);

            if (! $success) {
                return $this->resultFailure('Login with remember-me failed.');
            }

            $tokensCount = $this->countRememberTokens($db, (int) $testUser['id']);
            if ($tokensCount === null) {
                return $this->resultWarning('auth_tokens table missing; cannot confirm remember-me token.');
            }

            if ($tokensCount < 1) {
                return $this->resultWarning('Remember-me token not created.');
            }

            return $this->resultPass('Remember-me login succeeded.');
        });

        $this->runTest('Login: Secure cookies enabled (CLI simulation)', function () {
            $appConfig = config('App');

            if ($appConfig->cookieSecure === true) {
                return $this->resultPass('Secure cookies enabled.');
            }

            return $this->resultWarning('Secure cookies disabled in current config.');
        });

        $this->runTest('Login: Secure cookies disabled (CLI simulation)', function () {
            $appConfig = config('App');

            if ($appConfig->cookieSecure === false) {
                return $this->resultPass('Secure cookies disabled as expected.');
            }

            return $this->resultWarning('Secure cookies enabled in current config.');
        });
    }

    private function runLogoutTests(?array $testUser): void
    {
        $this->runTest('Logout: Logout after login', function () use ($testUser) {
            if (! $testUser) {
                return $this->resultWarning('Skipped: no test user available.');
            }

            if (empty($testUser['password'])) {
                return $this->resultWarning('Skipped: test user password unavailable.');
            }

            $auth = service('authentication');
            $auth->logout();
            $auth->attempt(['email' => $testUser['email'], 'password' => $testUser['password']]);
            $auth->logout();

            if ($auth->check()) {
                return $this->resultFailure('Logout did not clear auth state.');
            }

            return $this->resultPass('Logout cleared session.');
        });

        $this->runTest('Logout: Double logout', function () {
            $auth = service('authentication');
            $auth->logout();
            $auth->logout();

            return $this->resultPass('Double logout completed without errors.');
        });

        $this->runTest('Logout: Logout without session', function () {
            $auth = service('authentication');
            $auth->logout();

            return $this->resultPass('Logout without active session succeeded.');
        });
    }

    private function runForgotPasswordTests(?array $testUser, $db): void
    {
        $this->runTest('Forgot Password: Valid email reset request', function () use ($testUser, $db) {
            if (! $testUser) {
                return $this->resultWarning('Skipped: no test user available.');
            }

            $users = model(MythUserModel::class);
            $user = $users->find($testUser['id']);
            if (! $user) {
                return $this->resultFailure('Test user not found.');
            }

            $user->generateResetHash();
            $users->save($user);

            if (empty($user->reset_hash)) {
                return $this->resultFailure('Reset hash not generated.');
            }

            $resetter = service('resetter');
            $sent = $resetter->send($user);

            if (! $sent) {
                return $this->resultWarning('Reset email send failed: ' . ($resetter->error() ?? 'unknown error'));
            }

            $this->logResetAttempt($users, $user->email, $user->reset_hash);

            $collisions = $this->countResetTokenCollisions($db, $user->reset_hash);
            if ($collisions !== null && $collisions > 1) {
                return $this->resultWarning('Reset token collision detected.');
            }

            return $this->resultPass('Reset hash generated and email dispatched.');
        });

        $this->runTest('Forgot Password: Non-existent email', function () use ($db) {
            $users = model(MythUserModel::class);
            $user = $users->where('email', 'missing_reset@example.test')->first();

            if ($user !== null) {
                return $this->resultFailure('Unexpected user found for missing email.');
            }

            $attempts = $this->countResetAttempts($db, 'missing_reset@example.test');
            if ($attempts !== null && $attempts > 0) {
                return $this->resultWarning('Reset attempts logged for non-existent email.');
            }

            return $this->resultPass('Non-existent email handled safely.');
        });

        $this->runTest('Forgot Password: Invalid email format', function () {
            $validation = $this->validateForgotData(['email' => 'invalid-email']);

            if ($validation['success']) {
                return $this->resultFailure('Validation unexpectedly passed for invalid email.');
            }

            return $this->resultPass('Invalid email rejected.', $validation['errors']);
        });

        $this->runTest('Forgot Password: Multiple reset requests', function () use ($testUser, $db) {
            if (! $testUser) {
                return $this->resultWarning('Skipped: no test user available.');
            }

            $users = model(MythUserModel::class);
            $user = $users->find($testUser['id']);
            if (! $user) {
                return $this->resultFailure('Test user not found.');
            }

            $user->generateResetHash();
            $users->save($user);
            $firstHash = $user->reset_hash;

            usleep(200_000);

            $user->generateResetHash();
            $users->save($user);
            $secondHash = $user->reset_hash;

            if ($firstHash === $secondHash) {
                return $this->resultFailure('Reset token reused unexpectedly.');
            }

            $attempts = $this->countRecentResetAttempts($db, $user->email, 60);
            if ($attempts !== null && $attempts > 1) {
                return $this->resultWarning('Multiple reset requests allowed within short window.');
            }

            return $this->resultPass('Multiple reset requests generated unique tokens.');
        });
    }

    private function runResetPasswordTests(?array $testUser, $db): void
    {
        $this->runTest('Reset Password: Valid token reset', function () use ($testUser) {
            if (! $testUser) {
                return $this->resultWarning('Skipped: no test user available.');
            }

            $users = model(MythUserModel::class);
            $user = $users->find($testUser['id']);
            if (! $user) {
                return $this->resultFailure('Test user not found.');
            }

            $user->generateResetHash();
            $users->save($user);
            $token = $user->reset_hash;

            $newPassword = 'Reset!Pass' . bin2hex(random_bytes(3));
            $reset = $this->attemptReset($users, $user->email, $token, $newPassword);

            if (! $reset['success']) {
                return $this->resultFailure('Valid reset failed: ' . $reset['message']);
            }

            $updated = $users->find($testUser['id']);
            if ($updated && ! empty($updated->reset_hash)) {
                return $this->resultFailure('Reset hash not cleared after reset.');
            }

            return $this->resultPass('Password reset succeeded.');
        });

        $this->runTest('Reset Password: Expired token', function () use ($testUser) {
            if (! $testUser) {
                return $this->resultWarning('Skipped: no test user available.');
            }

            $users = model(MythUserModel::class);
            $user = $users->find($testUser['id']);
            if (! $user) {
                return $this->resultFailure('Test user not found.');
            }

            $user->generateResetHash();
            $user->reset_expires = new \CodeIgniter\I18n\Time('-5 minutes');
            $users->save($user);

            $reset = $this->attemptReset($users, $user->email, $user->reset_hash, 'Expired!Pass123');

            if ($reset['success']) {
                return $this->resultFailure('Expired token reset unexpectedly succeeded.');
            }

            return $this->resultPass('Expired token rejected.', [$reset['message']]);
        });

        $this->runTest('Reset Password: Invalid token', function () use ($testUser) {
            if (! $testUser) {
                return $this->resultWarning('Skipped: no test user available.');
            }

            $users = model(MythUserModel::class);
            $user = $users->find($testUser['id']);
            if (! $user) {
                return $this->resultFailure('Test user not found.');
            }

            $user->generateResetHash();
            $users->save($user);

            $reset = $this->attemptReset($users, $user->email, 'invalid_token', 'Invalid!Pass123');

            if ($reset['success']) {
                return $this->resultFailure('Invalid token reset unexpectedly succeeded.');
            }

            return $this->resultPass('Invalid token rejected.', [$reset['message']]);
        });

        $this->runTest('Reset Password: Token reuse attempt', function () use ($testUser) {
            if (! $testUser) {
                return $this->resultWarning('Skipped: no test user available.');
            }

            $users = model(MythUserModel::class);
            $user = $users->find($testUser['id']);
            if (! $user) {
                return $this->resultFailure('Test user not found.');
            }

            $user->generateResetHash();
            $users->save($user);

            $token = $user->reset_hash;
            $first = $this->attemptReset($users, $user->email, $token, 'Reuse!Pass123');
            if (! $first['success']) {
                return $this->resultFailure('Initial reset failed: ' . $first['message']);
            }

            $second = $this->attemptReset($users, $user->email, $token, 'ReuseAgain!Pass123');
            if ($second['success']) {
                return $this->resultFailure('Token reuse unexpectedly succeeded.');
            }

            return $this->resultPass('Token reuse rejected.', [$second['message']]);
        });
    }

    private function runEmailTests(?array $testUser): void
    {
        $this->runTest('Email Delivery: Registration activation', function () use ($testUser) {
            $authConfig = config('Auth');

            if ($authConfig->requireActivation === null) {
                return $this->resultWarning('Activation emails disabled.');
            }

            if (! $testUser) {
                return $this->resultWarning('Skipped: no test user available.');
            }

            $users = model(MythUserModel::class);
            $user = $users->find($testUser['id']);
            if (! $user) {
                return $this->resultFailure('Test user not found.');
            }

            $activator = service('activator');
            $sent = $activator->send($user);

            if (! $sent) {
                return $this->resultWarning('Activation email send failed: ' . ($activator->error() ?? 'unknown error'));
            }

            return $this->resultPass('Activation email sent.');
        });

        $this->runTest('Email Delivery: Reset password', function () use ($testUser) {
            if (! $testUser) {
                return $this->resultWarning('Skipped: no test user available.');
            }

            $users = model(MythUserModel::class);
            $user = $users->find($testUser['id']);
            if (! $user) {
                return $this->resultFailure('Test user not found.');
            }

            $user->generateResetHash();
            $users->save($user);

            $resetter = service('resetter');
            $sent = $resetter->send($user);

            if (! $sent) {
                return $this->resultWarning('Reset email send failed: ' . ($resetter->error() ?? 'unknown error'));
            }

            return $this->resultPass('Reset email sent.');
        });
    }

    private function createEphemeralTestUser($authConfig): ?array
    {
        $suffix = (string) time() . random_int(100, 999);
        $username = substr('testauth_' . $suffix, 0, 30);
        $email = 'testauth_' . $suffix . '@mymiwallet.local';
        $password = 'Test!Auth' . bin2hex(random_bytes(4)) . '1a';

        $validation = $this->validateRegistrationData([
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'pass_confirm' => $password,
        ]);

        if (! $validation['success']) {
            $this->addResult('Registration: Validation before create', 'warning', 'Registration validation failed.', $validation['errors']);
            return null;
        }

        $users = model(MythUserModel::class);
        if (! empty($authConfig->defaultUserGroup)) {
            $users = $users->withGroup($authConfig->defaultUserGroup);
        }

        $user = new User([
            'email' => $email,
            'username' => $username,
            'password' => $password,
        ]);

        if ($authConfig->requireActivation === null) {
            $user->activate();
        } else {
            $user->generateActivateHash();
        }

        if (! $users->save($user)) {
            $this->addResult('Registration: Database insert', 'failure', 'User save failed.', $users->errors());
            return null;
        }

        $insertId = (int) $users->getInsertID();
        if ($insertId === 0) {
            return null;
        }

        $stored = $users->find($insertId);
        if (! $stored) {
            return null;
        }

        return [
            'id' => $insertId,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'password_hash' => $stored->password_hash ?? '',
            'activate_hash' => $stored->activate_hash ?? null,
        ];
    }

    private function findFallbackTestUser($db): ?array
    {
        if (! $db->tableExists('users')) {
            return null;
        }

        $builder = $db->table('users');
        $builder->select('id, email, username, password_hash');
        $builder->like('email', 'test_auth_', 'after');
        $builder->orderBy('id', 'desc');
        $row = $builder->get(1)->getRowArray();

        if ($row) {
            return $row + ['password' => ''];
        }

        if ($db->tableExists('auth_groups') && $db->tableExists('auth_groups_users')) {
            $group = $db->table('auth_groups')->where('name', 'test')->get()->getRowArray();
            if ($group) {
                $userRow = $db->table('auth_groups_users')
                    ->select('users.id, users.email, users.username, users.password_hash')
                    ->join('users', 'users.id = auth_groups_users.user_id', 'inner')
                    ->where('auth_groups_users.group_id', $group['id'])
                    ->get(1)
                    ->getRowArray();

                if ($userRow) {
                    return $userRow + ['password' => ''];
                }
            }
        }

        return null;
    }

    private function deleteTestUser($db, int $userId): bool
    {
        $users = model(MythUserModel::class);
        $email = null;
        $user = $users->find($userId);
        if ($user) {
            $email = $user->email;
        }

        try {
            $users->delete($userId, true);
        } catch (Throwable $e) {
            return false;
        }

        if ($db->tableExists('auth_tokens')) {
            $db->table('auth_tokens')->where('user_id', $userId)->delete();
        }

        if ($db->tableExists('auth_logins')) {
            $db->table('auth_logins')->where('user_id', $userId)->delete();
        }

        if ($db->tableExists('auth_reset_attempts')) {
            if ($email) {
                $db->table('auth_reset_attempts')->where('email', $email)->delete();
            }
        }

        if ($db->tableExists('auth_groups_users')) {
            $db->table('auth_groups_users')->where('user_id', $userId)->delete();
        }

        return true;
    }

    private function markTestUser($db, int $userId): void
    {
        if ($db->tableExists('auth_groups')) {
            $group = $db->table('auth_groups')->where('name', 'test')->get()->getRowArray();
            if ($group) {
                try {
                    $groupModel = model(GroupModel::class);
                    $groupModel->addUserToGroup($userId, $group['id']);
                } catch (Throwable $e) {
                    // ignore
                }
            }
        }
    }

    private function validateRegistrationData(array $data): array
    {
        $validation = Services::validation();
        $rules = config('Validation')->registrationRules ?? [
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
        ];

        if (! $validation->setRules($rules)->run($data)) {
            return ['success' => false, 'errors' => $validation->getErrors()];
        }

        $passwordRules = [
            'password' => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (! $validation->setRules($passwordRules)->run($data)) {
            return ['success' => false, 'errors' => $validation->getErrors()];
        }

        return ['success' => true, 'errors' => []];
    }

    private function validateForgotData(array $data): array
    {
        $validation = Services::validation();
        $rules = [
            'email' => 'required|valid_email',
        ];

        if (! $validation->setRules($rules)->run($data)) {
            return ['success' => false, 'errors' => $validation->getErrors()];
        }

        return ['success' => true, 'errors' => []];
    }

    private function attemptReset(MythUserModel $users, string $email, string $token, string $password): array
    {
        $validation = Services::validation();
        $rules = [
            'token' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        $payload = [
            'token' => $token,
            'email' => $email,
            'password' => $password,
            'pass_confirm' => $password,
        ];

        if (! $validation->setRules($rules)->run($payload)) {
            return ['success' => false, 'message' => 'Validation failed', 'errors' => $validation->getErrors()];
        }

        $user = $users->where('email', $email)->where('reset_hash', $token)->first();
        if (! $user) {
            return ['success' => false, 'message' => 'User/token mismatch'];
        }

        if (! empty($user->reset_expires) && time() > $user->reset_expires->getTimestamp()) {
            return ['success' => false, 'message' => 'Reset token expired'];
        }

        $user->password = $password;
        $user->reset_hash = null;
        $user->reset_at = date('Y-m-d H:i:s');
        $user->reset_expires = null;
        $user->force_pass_reset = false;
        $users->save($user);

        return ['success' => true, 'message' => 'Reset completed'];
    }

    private function runTest(string $name, callable $callback): void
    {
        try {
            $result = $callback();
            if (is_array($result)) {
                $this->results[] = $result + ['name' => $name];
                if ($result['status'] === 'failure') {
                    $this->failures[] = $result + ['name' => $name];
                }
                if ($result['status'] === 'warning') {
                    $this->warnings[] = $result + ['name' => $name];
                }
            }
        } catch (Throwable $e) {
            $this->addResult($name, 'failure', 'Exception thrown.', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
        }
    }

    private function resultPass(string $message, array $details = []): array
    {
        return [
            'status' => 'pass',
            'message' => $message,
            'details' => $details,
        ];
    }

    private function resultWarning(string $message, array $details = []): array
    {
        return [
            'status' => 'warning',
            'message' => $message,
            'details' => $details,
        ];
    }

    private function resultFailure(string $message, array $details = []): array
    {
        return [
            'status' => 'failure',
            'message' => $message,
            'details' => $details,
        ];
    }

    private function addResult(string $name, string $status, string $message, array $details = []): void
    {
        $result = [
            'name' => $name,
            'status' => $status,
            'message' => $message,
            'details' => $details,
        ];

        $this->results[] = $result;

        if ($status === 'failure') {
            $this->failures[] = $result;
        }

        if ($status === 'warning') {
            $this->warnings[] = $result;
        }
    }

    private function renderSummary(float $startTime, int $memoryStart): array
    {
        $total = count($this->results);
        $passed = count(array_filter($this->results, fn ($result) => $result['status'] === 'pass'));
        $failed = count($this->failures);
        $warnings = count($this->warnings);
        $score = $total > 0 ? round(($passed / $total) * 100) : 0;

        $health = 'FAIL';
        if ($score === 100) {
            $health = 'PASS';
        } elseif ($score >= 85) {
            $health = 'WARNING';
        }

        $duration = microtime(true) - $startTime;
        $memoryEnd = memory_get_usage(true);

        CLI::newLine();
        CLI::write('========================================');
        CLI::write('MyMI Wallet — Myth/Auth Audit Report');
        CLI::write('========================================');
        CLI::write('');
        CLI::write('SECTION 1: TEST COUNTS');
        CLI::write("Tests executed: {$total}");
        CLI::write("Passed: {$passed}");
        CLI::write("Failed: {$failed}");
        CLI::write("Warnings: {$warnings}");
        CLI::write('');
        CLI::write('SECTION 2: FAILURES (MAX 25)');

        if ($failed === 0 && $warnings === 0) {
            CLI::write('None.');
        } else {
            $listed = 0;
            foreach (array_merge($this->failures, $this->warnings) as $issue) {
                if ($listed >= self::MAX_FAILURES) {
                    break;
                }
                $listed++;
                $details = $issue['details'] ?? [];
                $detailText = $details !== [] ? json_encode($details) : '';
                CLI::write("{$listed}. {$issue['name']} [{$issue['status']}] - {$issue['message']} {$detailText}");
            }
        }

        CLI::write('');
        CLI::write('SECTION 3: AUTH HEALTH SCORE');
        CLI::write("Score: {$score}%");
        CLI::write("Status: {$health}");
        CLI::write('');
        CLI::write('Runtime: ' . round($duration, 2) . 's');
        CLI::write('Memory: ' . number_format($memoryEnd / 1024 / 1024, 2) . ' MB');

        return [
            'total' => $total,
            'passed' => $passed,
            'failed' => $failed,
            'warnings' => $warnings,
            'score' => $score,
            'health' => $health,
            'duration' => $duration,
            'memory_start' => $memoryStart,
            'memory_end' => $memoryEnd,
        ];
    }

    private function writeAuditReport(array $summary): void
    {
        if ($summary['failed'] === 0 && $summary['warnings'] === 0) {
            return;
        }

        $docDir = ROOTPATH . 'docs/audit';
        if (! is_dir($docDir)) {
            mkdir($docDir, 0775, true);
        }

        $lines = [];
        $lines[] = '# Auth Audit — Last Run';
        $lines[] = '';
        $lines[] = '## Executive summary';
        $lines[] = '- Tests executed: ' . $summary['total'];
        $lines[] = '- Passed: ' . $summary['passed'];
        $lines[] = '- Failed: ' . $summary['failed'];
        $lines[] = '- Warnings: ' . $summary['warnings'];
        $lines[] = '- Health score: ' . $summary['score'] . '% (' . $summary['health'] . ')';
        $lines[] = '';
        $lines[] = '## Failing test cases';

        if ($this->failures === [] && $this->warnings === []) {
            $lines[] = '- None';
        } else {
            foreach (array_merge($this->failures, $this->warnings) as $issue) {
                $lines[] = '- **' . $issue['name'] . '** (' . strtoupper($issue['status']) . '): ' . $issue['message'];
            }
        }

        $lines[] = '';
        $lines[] = '## Error signatures';
        if ($this->failures === [] && $this->warnings === []) {
            $lines[] = '- None';
        } else {
            foreach (array_merge($this->failures, $this->warnings) as $issue) {
                $details = $issue['details'] ?? [];
                $lines[] = '- ' . $issue['name'] . ': ' . ($details !== [] ? json_encode($details) : $issue['message']);
            }
        }

        $lines[] = '';
        $lines[] = '## Root cause analysis';
        if ($this->failures === [] && $this->warnings === []) {
            $lines[] = '- No issues detected.';
        } else {
            $lines[] = '- Review authentication validation, email transport configuration, and session/cookie settings for misalignment.';
            $lines[] = '- Confirm reset token generation and throttling behavior to avoid abuse.';
            $lines[] = '- Verify remember-me token storage and secure cookie expectations.';
        }

        $lines[] = '';
        $lines[] = '## Files/configs to review';
        $lines[] = '- app/Config/Auth.php';
        $lines[] = '- app/Config/Session.php';
        $lines[] = '- app/Config/App.php';
        $lines[] = '- Myth/Auth controllers/models';
        $lines[] = '';
        $lines[] = '## Recommended fixes (INSTRUCTIONS ONLY)';
        $lines[] = '- Resolve the failing test cases listed above before re-running `php spark auth:audit`.';
        $lines[] = '- Address any config warnings (cookie domain, secure flags, SameSite settings, or CSRF settings).';
        $lines[] = '- Validate email transport connectivity and From addresses if delivery tests failed.';
        $lines[] = '- Investigate reset token throttling and remember-me persistence if warnings were reported.';

        file_put_contents($docDir . DIRECTORY_SEPARATOR . 'auth_audit_last_run.md', implode(PHP_EOL, $lines));
    }

    private function insertAuditLog($db, array $summary): void
    {
        if (! $db->tableExists('bf_error_logs')) {
            return;
        }

        $level = ($summary['failed'] > 0 || $summary['warnings'] > 0) ? 'warning' : 'info';
        $message = 'auth:audit completed with ' . $summary['failed'] . ' failures and ' . $summary['warnings'] . ' warnings.';
        $payload = [
            'level' => $level,
            'message' => $message,
            'context' => json_encode([
                'total' => $summary['total'],
                'passed' => $summary['passed'],
                'failed' => $summary['failed'],
                'warnings' => $summary['warnings'],
                'score' => $summary['score'],
                'health' => $summary['health'],
            ]),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        try {
            $columns = $db->getFieldNames('bf_error_logs');
        } catch (Throwable $e) {
            return;
        }

        $available = array_map('strtolower', $columns);
        $filtered = array_intersect_key($payload, array_flip($available));

        if ($filtered === []) {
            return;
        }

        try {
            $db->table('bf_error_logs')->insert($filtered);
        } catch (Throwable $e) {
            log_message('warning', 'auth:audit failed to insert audit log: {error}', ['error' => $e->getMessage()]);
        }
    }

    private function checkUserGroupAssignment($db, int $userId, string $groupName): bool
    {
        if (! $db->tableExists('auth_groups') || ! $db->tableExists('auth_groups_users')) {
            return false;
        }

        $group = $db->table('auth_groups')->where('name', $groupName)->get()->getRowArray();
        if (! $group) {
            return false;
        }

        $row = $db->table('auth_groups_users')
            ->where('user_id', $userId)
            ->where('group_id', $group['id'])
            ->get()
            ->getRowArray();

        return (bool) $row;
    }

    private function countLoginAttempts($db, string $email): ?int
    {
        if (! $db->tableExists('auth_logins')) {
            return null;
        }

        return (int) $db->table('auth_logins')->where('email', $email)->countAllResults();
    }

    private function countRememberTokens($db, int $userId): ?int
    {
        if (! $db->tableExists('auth_tokens')) {
            return null;
        }

        return (int) $db->table('auth_tokens')->where('user_id', $userId)->countAllResults();
    }

    private function countResetTokenCollisions($db, string $token): ?int
    {
        if (! $db->tableExists('users')) {
            return null;
        }

        return (int) $db->table('users')->where('reset_hash', $token)->countAllResults();
    }

    private function countResetAttempts($db, string $email): ?int
    {
        if (! $db->tableExists('auth_reset_attempts')) {
            return null;
        }

        return (int) $db->table('auth_reset_attempts')->where('email', $email)->countAllResults();
    }

    private function countRecentResetAttempts($db, string $email, int $seconds): ?int
    {
        if (! $db->tableExists('auth_reset_attempts')) {
            return null;
        }

        $threshold = date('Y-m-d H:i:s', time() - $seconds);

        return (int) $db->table('auth_reset_attempts')
            ->where('email', $email)
            ->where('created_at >=', $threshold)
            ->countAllResults();
    }

    private function logResetAttempt(MythUserModel $users, string $email, string $token): void
    {
        try {
            $users->logResetAttempt($email, $token, 'CLI', 'auth:audit');
        } catch (Throwable $e) {
            log_message('warning', 'auth:audit failed to log reset attempt: {error}', ['error' => $e->getMessage()]);
        }
    }
}
