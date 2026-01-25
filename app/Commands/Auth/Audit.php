<?php

namespace App\Commands\Auth;

use App\Services\Spark\AuthAuditRunner;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Audit extends SafeBaseCommand
{
    protected $group       = 'auth';
    protected $name        = 'auth:audit';
    protected $description = 'Audit Myth:Auth authentication and account lifecycle flows end-to-end, including registration, login, and reset flows.';

    protected $arguments = [];
    protected $options = [
        '--dry-run' => 'Preview actions without writing data',
    ];

    private const MAX_FAILURES = 25;

    public function run(array $params)
    {
        log_message('info', '[spark:auth:audit] Started', ['params' => $params]);
        CLI::write('Starting auth:audit', 'yellow');

        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        if ($dryRun) {
            CLI::write('Dry-run enabled. Running audit without writing changes.', 'yellow');
            CLI::write('Planned actions: create test users, validate login/logout flows, write audit report.');
        }

        $service = new AuthAuditRunner();
        $result = $service->run($dryRun);
        $summary = $result['summary'] ?? [];

        CLI::newLine();
        CLI::write('========================================');
        CLI::write('MyMI Wallet — Myth/Auth Audit Report');
        CLI::write('========================================');
        CLI::write('');
        CLI::write('SECTION 1: TEST COUNTS');
        CLI::write('Tests executed: ' . ($summary['total'] ?? 0));
        CLI::write('Passed: ' . ($summary['passed'] ?? 0));
        CLI::write('Failed: ' . ($summary['failed'] ?? 0));
        CLI::write('Warnings: ' . ($summary['warnings'] ?? 0));
        CLI::write('Info: ' . ($summary['infos'] ?? 0));
        CLI::write('');
        CLI::write('SECTION 2: FAILURES (MAX 25)');

        $issues = $result['issues'] ?? [];
        if ($issues === []) {
            CLI::write('None.');
        } else {
            $listed = 0;
            foreach ($issues as $issue) {
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
        CLI::write('Score: ' . ($summary['score'] ?? 0) . '%');
        CLI::write('Status: ' . ($summary['health'] ?? 'UNKNOWN'));
        CLI::write('');
        CLI::write('Runtime: ' . round((float) ($summary['duration'] ?? 0), 2) . 's');
        CLI::write('Memory: ' . number_format(((float) ($summary['memory_end'] ?? 0)) / 1024 / 1024, 2) . ' MB');

        log_message('info', '[spark:auth:audit] Completed', [
            'score'   => $summary['score'] ?? 0,
            'health'  => $summary['health'] ?? 'UNKNOWN',
            'failed'  => $summary['failed'] ?? 0,
            'warnings'=> $summary['warnings'] ?? 0,
            'dry_run' => $dryRun,
        ]);

        if ($dryRun) {
            return EXIT_SUCCESS;
        }

        return ($summary['health'] ?? '') === 'PASS' ? EXIT_SUCCESS : EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
