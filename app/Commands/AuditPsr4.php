<?php

declare(strict_types=1);

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Services;

class AuditPsr4 extends BaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'audit:psr4';
    protected $description = 'Audit PSR-4 compliance for the app namespace.';

    public function run(array $params)
    {
        $ciMode = in_array('--ci', $params, true);
        $jsonMode = in_array('--json', $params, true);

        $audit = Services::psr4AuditService()->audit();
        $summary = $audit['summary'];
        $violations = (int) ($summary['violations'] ?? 0);

        if ($jsonMode) {
            CLI::write(json_encode($audit, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            return $violations > 0 ? 1 : 0;
        }

        if ($ciMode) {
            if ($violations > 0) {
                CLI::write('❌ PSR-4 violations detected. Build failed.', 'red');
                return 1;
            }

            CLI::write('✅ PSR-4 compliance verified.', 'green');
            return 0;
        }

        $this->renderIssues($audit['issues']);

        CLI::newLine();
        CLI::write('Summary', 'yellow');
        CLI::write('Total classes: ' . (int) $summary['total_classes']);
        CLI::write('PSR-4 OK: ' . (int) $summary['psr4_ok']);
        CLI::write('Violations: ' . $violations);
        CLI::write('Legacy files: ' . (int) $summary['legacy_files']);
        CLI::write('Last scan: ' . ($summary['last_scan'] ?? 'unknown'));

        return $violations > 0 ? 1 : 0;
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
}
