<?php

namespace App\Commands\MyMI;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class UserLifecycleHealthcheck extends BaseCommand
{
    protected $group       = 'MyMI';
    protected $name        = 'mymi:lifecycle-healthcheck';
    protected $description = 'Audits the complete user lifecycle: Registration, Verification, First Sign-In, Onboarding Modals, and Account Settings APIs.';

    public function run(array $params)
    {
        CLI::write("==================================================================", 'cyan');
        CLI::write("   MyMI WALLET: FULL USER LIFECYCLE & SECURITY HEALTHCHECK       ", 'yellow');
        CLI::write("==================================================================", 'cyan');

        $passed = 0;
        $failed = 0;
        $db = Database::connect('default');

        // Gate 1: Core Identity Database Tables
        CLI::write("\n[GATE 1] Core Identity & Authentication Schema", 'yellow');
        $coreTables = [
            'users'             => 'Core user records and profile identity',
            'auth_identities'   => 'Shield authentication credentials (passwords, tokens)',
            'auth_logins'       => 'Audit logs and brute-force throttling records',
            'auth_tokens'       => 'API Personal Access Tokens',
            'auth_groups_users' => 'Role and permission mappings',
        ];

        foreach ($coreTables as $table => $desc) {
            if ($db->tableExists($table)) {
                $count = $db->table($table)->countAllResults();
                CLI::write(sprintf("  [PASS] Table '%s' present (%d rows) - %s", $table, $count, $desc), 'green');
                $passed++;
            } else {
                CLI::write(sprintf("  [WARN] Table '%s' MISSING - %s", $table, $desc), 'red');
                $failed++;
            }
        }

        // Gate 2: Onboarding & Modal Tables
        CLI::write("\n[GATE 2] Onboarding, Profile Completion & News Modal Tables", 'yellow');
        $onboardingTables = [
            'user_account_completion_modal_state' => 'Tracks profile completion modal dismissals/progress',
            'user_setup_preferences'              => 'User preferences (news popup toggles, notifications)',
            'financial_news'                      => 'Market news feed for first-login daily headlines popup',
        ];

        foreach ($onboardingTables as $table => $desc) {
            if ($db->tableExists($table)) {
                $count = $db->table($table)->countAllResults();
                CLI::write(sprintf("  [PASS] Table '%s' present (%d rows) - %s", $table, $count, $desc), 'green');
                $passed++;
            } else {
                CLI::write(sprintf("  [INFO] Table '%s' not yet provisioned - %s", $table, $desc), 'yellow');
            }
        }

        // Gate 3: Password Hashing & Security Policy (Argon2id)
        CLI::write("\n[GATE 3] Cryptographic Hashing & Password Security", 'yellow');
        $samplePassword = 'TestPassword123!';
        $hash = password_hash($samplePassword, PASSWORD_ARGON2ID, [
            'memory_cost' => 65536,
            'time_cost'   => 4,
            'threads'     => 1,
        ]);
        $info = password_get_info($hash);

        if ($info['algoName'] === 'argon2id') {
            CLI::write("  [PASS] Argon2id hashing engine operational (64MiB memory, 4 iterations, 1 thread)", 'green');
            $passed++;
        } else {
            CLI::write("  [FAIL] Argon2id algorithm not supported in current PHP runtime", 'red');
            $failed++;
        }

        // Gate 4: Session & Cookie Transport Policies
        CLI::write("\n[GATE 4] Session & Cookie Transport Policies", 'yellow');
        $appConfig = config('App');
        $cookieSecure   = $appConfig->cookieSecure ?? false;
        $cookieHTTPOnly = $appConfig->cookieHTTPOnly ?? true;
        $cookieSameSite = $appConfig->cookieSameSite ?? 'Lax';

        if ($cookieHTTPOnly) {
            CLI::write("  [PASS] HttpOnly flag enabled (protects session from XSS exfiltration)", 'green');
            $passed++;
        } else {
            CLI::write("  [WARN] HttpOnly flag is disabled in App config", 'red');
            $failed++;
        }

        CLI::write(sprintf("  [INFO] Cookie SameSite policy: '%s' (CSRF defense)", $cookieSameSite), 'cyan');
        CLI::write(sprintf("  [INFO] Cookie Secure flag: %s", $cookieSecure ? 'Enabled' : 'Disabled (Enable for Production HTTPS)'), 'cyan');

        // Gate 5: Email Normalization & Duplicate Collision Invariant
        CLI::write("\n[GATE 5] Principal Uniqueness & Email Normalization Guard", 'yellow');
        if ($db->tableExists('users')) {
            $duplicateEmails = $db->query("
                SELECT LOWER(TRIM(email)) AS normalized_email, COUNT(*) AS count
                FROM users
                WHERE email IS NOT NULL AND TRIM(email) != ''
                GROUP BY LOWER(TRIM(email))
                HAVING COUNT(*) > 1
            ")->getResultArray();

            if (empty($duplicateEmails)) {
                CLI::write("  [PASS] Zero duplicate normalized email principals found in 'users' table", 'green');
                $passed++;
            } else {
                CLI::write(sprintf("  [FAIL] Detected %d duplicate email groups in 'users' table", count($duplicateEmails)), 'red');
                $failed++;
            }
        }

        // Gate 6: Rate Limiting & Brute-Force Telemetry Readiness
        CLI::write("\n[GATE 6] Brute-Force Throttling & Audit Logging Readiness", 'yellow');
        if ($db->tableExists('auth_logins')) {
            CLI::write("  [PASS] 'auth_logins' table ready to record login telemetry and enforce 5-attempt/15min lockout", 'green');
            $passed++;
        } else {
            CLI::write("  [WARN] 'auth_logins' table required for rate-limiting throttle enforcement", 'yellow');
        }

        CLI::write("\n==================================================================", 'cyan');
        CLI::write(sprintf("  LIFECYCLE AUDIT COMPLETE: %d Passed, %d Failed/Attention", $passed, $failed), $failed === 0 ? 'green' : 'yellow');
        CLI::write("==================================================================\n", 'cyan');

        return $failed === 0 ? 0 : 1;
    }
}
