<?php

declare(strict_types=1);

namespace App\Commands;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Services;

class AuditPsr4 extends SafeBaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'audit:psr4';
    protected $description = 'Audit PSR-4 compliance for the app namespace.';
    protected $options     = [
        '--ci' => 'Exit non-zero if violations are detected.',
        '--json' => 'Output JSON instead of CLI formatting.',
        '--dry-run' => 'Preview actions without writing data',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:audit:psr4] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $ciMode = isset($flags['ci']);
        $jsonMode = isset($flags['json']);
        $dryRun = $this->resolveDryRun($flags);

        if ($dryRun) {
            CLI::write('Dry-run enabled. Audit will still run (read-only).', 'yellow');
        }

        $audit = Services::psr4AuditService()->audit();
        $summary = $audit['summary'];
        $violations = (int) ($summary['violations'] ?? 0);

        if ($jsonMode) {
            CLI::write(json_encode($audit, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            if ($violations > 0) {
                log_message('error', '[spark:audit:psr4] Failed', ['reason' => 'Violations detected']);
            }
            log_message('info', '[spark:audit:psr4] Completed', ['violations' => $violations, 'dry_run' => $dryRun]);
            return $violations > 0 ? EXIT_ERROR : EXIT_SUCCESS;
        }

        if ($ciMode) {
            if ($violations > 0) {
                CLI::write('❌ PSR-4 violations detected. Build failed.', 'red');
                log_message('error', '[spark:audit:psr4] Failed', ['reason' => 'Violations detected']);
                return EXIT_ERROR;
            }

            CLI::write('✅ PSR-4 compliance verified.', 'green');
            log_message('info', '[spark:audit:psr4] Completed', ['violations' => $violations, 'dry_run' => $dryRun]);
            return EXIT_SUCCESS;
        }

        $this->renderIssues($audit['issues']);

        CLI::newLine();
        CLI::write('Summary', 'yellow');
        CLI::write('Total classes: ' . (int) $summary['total_classes']);
        CLI::write('PSR-4 OK: ' . (int) $summary['psr4_ok']);
        CLI::write('Violations: ' . $violations);
        CLI::write('Legacy files: ' . (int) $summary['legacy_files']);
        CLI::write('Last scan: ' . ($summary['last_scan'] ?? 'unknown'));

        if ($violations > 0) {
            log_message('error', '[spark:audit:psr4] Failed', ['reason' => 'Violations detected']);
        }

        log_message('info', '[spark:audit:psr4] Completed', [
            'violations' => $violations,
            'dry_run' => $dryRun,
        ]);

        return $violations > 0 ? EXIT_ERROR : EXIT_SUCCESS;
    }

    /**
     * @param array<int, array<string, mixed>> $issues
     */
    private function renderIssues(array $issues): void
    {
        if (empty($issues)) {
            CLI::write('✅ No PSR-4 violations detected.');
            return;
        }

        $grouped = [];
        foreach ($issues as $issue) {
            $class = $issue['class'] ?? $issue['file'] ?? 'unknown';
            $grouped[$class][] = $issue;
        }

        foreach ($grouped as $class => $classIssues) {
            CLI::write('❌ ' . $class, 'red');
            foreach ($classIssues as $issue) {
                $type = $issue['type'] ?? 'issue';
                if ($type === 'filename-mismatch' || $type === 'directory-mismatch') {
                    CLI::write('  Expected: ' . ($issue['expected'] ?? 'n/a'));
                    CLI::write('  Found:    ' . ($issue['found'] ?? 'n/a'));
                    continue;
                }

                if ($type === 'multi-class') {
                    $classes = isset($issue['classes']) ? implode(', ', (array) $issue['classes']) : 'unknown';
                    CLI::write('  Multiple classes: ' . $classes);
                    continue;
                }

                if ($type === 'legacy-suffix') {
                    CLI::write('  Legacy suffix file: ' . ($issue['file'] ?? 'unknown'));
                    continue;
                }

                $message = $issue['message'] ?? 'Issue detected.';
                CLI::write('  ' . $message);
            }

            CLI::newLine();
        }
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
