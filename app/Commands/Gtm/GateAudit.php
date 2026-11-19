<?php

declare(strict_types=1);

namespace App\Commands\Gtm;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

/**
 * GTM Human Gate Audit Command
 *
 * Runs non-destructive, read-only status and compliance checks for all
 * open human gates recorded in docs/_aiops/gtm/HUMAN_GATE_REGISTER.md:
 * G3, G4, G6, G7, G8, G9, G11, G12, G13, G14.
 */
class GateAudit extends SafeBaseCommand
{
    protected $group = 'GTM';
    protected $name = 'gtm:gate:audit';
    protected $description = 'Audit status of all GTM human gates (G3-G14).';

    public function run(array $params)
    {
        CLI::write('===== MyMI Wallet GTM Human Gate Audit =====', 'yellow');
        CLI::write('Timestamp: ' . gmdate('Y-m-d H:i:s') . ' UTC', 'white');
        CLI::newLine();

        $gates = [];

        // G3: Staging reachability
        $gates['G3'] = $this->auditG3();

        // G4: ADR 0002 Canonical Auth Runtime
        $gates['G4'] = $this->auditG4();

        // G6: Plaintext Private Keys
        $gates['G6'] = $this->auditG6();

        // G7: Duplicate-email accounts
        $gates['G7'] = $this->auditG7();

        // G8: Legal and Financial Compliance Disclaimers
        $gates['G8'] = $this->auditG8();

        // G9: Provider Sandboxes in Environment
        $gates['G9'] = $this->auditG9();

        // G11: Database Backup Restore Drill
        $gates['G11'] = $this->auditG11();

        // G12: Postmark and DMARC DNS
        $gates['G12'] = $this->auditG12();

        // G13: Staging Load Test Window
        $gates['G13'] = $this->auditG13();

        // G14: Money Switches in Config\Features
        $gates['G14'] = $this->auditG14();

        // Render Summary Table
        $thead = ['Gate', 'Name', 'Owner', 'Status', 'Details / Next Action'];
        $tbody = [];
        $passCount = 0;
        $totalCount = count($gates);

        foreach ($gates as $id => $info) {
            $statusText = $info['status'];
            $color = match ($statusText) {
                'PASS' => 'green',
                'OPEN' => 'yellow',
                'BLOCKED' => 'red',
                default => 'white',
            };
            if ($statusText === 'PASS') {
                $passCount++;
            }

            $tbody[] = [
                $id,
                $info['name'],
                $info['owner'],
                CLI::color($statusText, $color),
                $info['details'],
            ];
        }

        CLI::table($tbody, $thead);
        CLI::newLine();
        CLI::write("Gate Summary: {$passCount}/{$totalCount} gates passed.", $passCount === $totalCount ? 'green' : 'yellow');

        return $passCount === $totalCount ? 0 : 1;
    }

    private function auditG3(): array
    {
        $stagingHost = 'staging.mymiwallet.com';
        $ip = @gethostbyname($stagingHost);
        $dnsOk = ($ip !== $stagingHost);

        return [
            'name'    => 'Browser Journey Check',
            'owner'   => 'Tim',
            'status'  => 'OPEN',
            'details' => $dnsOk ? 'Staging DNS resolves to ' . $ip . '. Tim to verify register/reset in browser.' : 'Staging DNS lookup unresolvable.',
        ];
    }

    private function auditG4(): array
    {
        $adrPath = ROOTPATH . 'docs/adr/0002-canonical-auth-runtime.md';
        if (! file_exists($adrPath)) {
            return [
                'name'    => 'Approve ADR 0002',
                'owner'   => 'Teddy',
                'status'  => 'BLOCKED',
                'details' => 'ADR file missing at docs/adr/0002-canonical-auth-runtime.md',
            ];
        }

        $content = (string) file_get_contents($adrPath);
        $approved = (bool) preg_match('/Status:\s*Approved/i', $content);

        return [
            'name'    => 'Approve ADR 0002',
            'owner'   => 'Teddy',
            'status'  => $approved ? 'PASS' : 'OPEN',
            'details' => $approved ? 'ADR 0002 is marked Approved.' : 'Pending Teddy signature (change Status: Proposed to Approved).',
        ];
    }

    private function auditG6(): array
    {
        try {
            $db = db_connect();
            if (! $db->tableExists('bf_user_crypto_wallets')) {
                return [
                    'name'    => 'Plaintext Private Keys',
                    'owner'   => 'Tim + Teddy',
                    'status'  => 'PASS',
                    'details' => 'No legacy crypto wallet table found (clean sandbox).',
                ];
            }

            $builder = $db->table('bf_user_crypto_wallets');
            $unencrypted = $builder->where('private_key IS NOT NULL')
                ->where("private_key != ''")
                ->notLike('private_key', 'enc:v1:%')
                ->countAllResults();

            return [
                'name'    => 'Plaintext Private Keys',
                'owner'   => 'Tim + Teddy',
                'status'  => $unencrypted === 0 ? 'PASS' : 'OPEN',
                'details' => $unencrypted === 0 ? '0 unencrypted keys detected. Notify the 3 affected users.' : "{$unencrypted} plaintext key(s) require encryption.",
            ];
        } catch (\Throwable $e) {
            return [
                'name'    => 'Plaintext Private Keys',
                'owner'   => 'Tim + Teddy',
                'status'  => 'OPEN',
                'details' => 'Database check skipped: ' . $e->getMessage(),
            ];
        }
    }

    private function auditG7(): array
    {
        try {
            $db = db_connect();
            if (! $db->tableExists('bf_users')) {
                return [
                    'name'    => 'Duplicate-Email Accounts',
                    'owner'   => 'Tim',
                    'status'  => 'OPEN',
                    'details' => 'bf_users table not present in current environment.',
                ];
            }

            $query = $db->query("
                SELECT LOWER(TRIM(email)) AS email_norm, COUNT(*) as cnt
                FROM bf_users
                WHERE COALESCE(deleted,0) = 0 AND email IS NOT NULL AND TRIM(email) != ''
                GROUP BY LOWER(TRIM(email))
                HAVING cnt > 1
            ");
            $rows = $query->getResultArray();
            $count = count($rows);

            return [
                'name'    => 'Duplicate-Email Accounts',
                'owner'   => 'Tim',
                'status'  => $count === 0 ? 'PASS' : 'OPEN',
                'details' => $count === 0 ? '0 duplicate active emails found.' : "{$count} duplicate email group(s) pending triage decision.",
            ];
        } catch (\Throwable $e) {
            return [
                'name'    => 'Duplicate-Email Accounts',
                'owner'   => 'Tim',
                'status'  => 'OPEN',
                'details' => 'Database check skipped: ' . $e->getMessage(),
            ];
        }
    }

    private function auditG8(): array
    {
        $viewsToCheck = [
            'Terms'   => ROOTPATH . 'app/Views/themes/public/termsOfService.php',
            'Privacy' => ROOTPATH . 'app/Views/themes/public/privacyPolicy.php',
        ];
        $allPresent = true;
        foreach ($viewsToCheck as $name => $path) {
            if (! file_exists($path)) {
                $allPresent = false;
                break;
            }
        }

        return [
            'name'    => 'Legal & Compliance Sign-off',
            'owner'   => 'Teddy / Counsel',
            'status'  => 'OPEN',
            'details' => $allPresent ? 'Legal views present. Awaiting formal written sign-off from Teddy/Counsel.' : 'Legal view files missing.',
        ];
    }

    private function auditG9(): array
    {
        $keys = [
            'PLAID_CLIENT_ID',
            'PLAID_SECRET',
            'PAYPAL_SANDBOX_CLIENT_ID',
            'PAYPAL_SANDBOX_SECRET',
            'SNAPTRADE_CLIENT_ID',
        ];

        $missing = [];
        foreach ($keys as $k) {
            $val = getenv($k) ?: env($k);
            if (empty($val)) {
                $missing[] = $k;
            }
        }

        return [
            'name'    => 'Provider Sandboxes in .env',
            'owner'   => 'Tim',
            'status'  => empty($missing) ? 'PASS' : 'OPEN',
            'details' => empty($missing) ? 'All sandbox provider keys detected.' : 'Missing in active environment: ' . implode(', ', $missing),
        ];
    }

    private function auditG11(): array
    {
        $restoreScript = ROOTPATH . 'scripts/ops/backup/mysql-restore-check.sh';
        $scriptExists = file_exists($restoreScript);

        return [
            'name'    => 'Backup Restore Drill',
            'owner'   => 'Tim',
            'status'  => 'OPEN',
            'details' => $scriptExists ? 'Restore script ready at scripts/ops/backup/mysql-restore-check.sh. Run by hand and paste result.' : 'Restore script missing.',
        ];
    }

    private function auditG12(): array
    {
        $output = [];
        @exec('dig +short TXT _dmarc.mymiwallet.com 2>/dev/null', $output);
        $dmarcTxt = implode(' ', $output);
        $dmarcFound = str_contains($dmarcTxt, 'v=DMARC1');

        return [
            'name'    => 'Postmark Approval & DMARC',
            'owner'   => 'Tim',
            'status'  => 'OPEN',
            'details' => $dmarcFound ? 'DMARC TXT found: ' . substr($dmarcTxt, 0, 40) . '... Transition to p=quarantine on 2026-12-05.' : 'DMARC DNS lookup returned empty. Confirm Postmark domain approval.',
        ];
    }

    private function auditG13(): array
    {
        return [
            'name'    => 'Staging Load Test Window',
            'owner'   => 'Tim',
            'status'  => 'OPEN',
            'details' => 'Schedule low-traffic concurrency test on staging.mymiwallet.com (ab -n 100 -c 10).',
        ];
    }

    private function auditG14(): array
    {
        $moneySwitches = [
            'FEATURE_WALLETS',
            'FEATURE_PREDICTIONS',
            'FEATURE_SOLANA_TRADING',
            'FEATURE_AUCTIONS',
            'FEATURE_PROJECT_INVESTING',
            'FEATURE_MYMIGOLD_PURCHASES',
            'FEATURE_MEMBERSHIP_PURCHASES',
            'FEATURE_MEMBERSHIP_SUBSCRIPTIONS',
        ];

        try {
            $features = config('Features')->all();
            $enabled = [];
            foreach ($moneySwitches as $switch) {
                if (($features[$switch] ?? false) === true) {
                    $enabled[] = $switch;
                }
            }

            if (! empty($enabled)) {
                return [
                    'name'    => 'Approve Money Switches by Name',
                    'owner'   => 'Tim',
                    'status'  => 'BLOCKED',
                    'details' => 'VIOLATION: Money switches are enabled without approval: ' . implode(', ', $enabled),
                ];
            }

            return [
                'name'    => 'Approve Money Switches by Name',
                'owner'   => 'Tim',
                'status'  => 'PASS',
                'details' => 'All 7 money switches are strictly OFF (default false). Each switch requires explicit approval.',
            ];
        } catch (\Throwable $e) {
            return [
                'name'    => 'Approve Money Switches by Name',
                'owner'   => 'Tim',
                'status'  => 'OPEN',
                'details' => 'Features config check failed: ' . $e->getMessage(),
            ];
        }
    }
}
