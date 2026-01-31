<?php

namespace App\Commands\Security;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class SecretsAudit extends SafeBaseCommand
{
    protected $group       = 'security';
    protected $name        = 'security:secrets-audit';
    protected $description = 'Detect sensitive secrets in configs, logs, or docs.';
    protected $usage       = 'security:secrets-audit [--emit=docs|raw|both] [--out=path] [--dry-run] [--approve]';
    protected $options     = [
        '--emit' => 'Output mode: docs, raw, or both (default: both).',
        '--out' => 'Override artifact directory (must be inside docs/aiops/artifacts or writable/aiops/artifacts).',
        '--dry-run' => 'Generate a report without mutating state.',
        '--approve' => 'Acknowledge execution (required for mutating commands).',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $emit = ArtifactHelper::parseOptionValue($params, 'emit') ?: 'both';
        $outOverride = ArtifactHelper::parseOptionValue($params, 'out');

        $resolved = ArtifactHelper::resolveArtifactDirs($this->name, $outOverride);
        if (isset($resolved['error'])) {
            CLI::error($resolved['error']);
            return EXIT_ERROR;
        }

        $writeDocs = in_array($emit, ['docs', 'both'], true);
        $writeRaw = in_array($emit, ['raw', 'both'], true);
        if (! $writeDocs && ! $writeRaw) {
            $writeDocs = true;
            $writeRaw = true;
        }

        $targets = [
            ROOTPATH . '.env',
            ROOTPATH . '.env.example',
        ];

        $findings = [];

        foreach ($targets as $path) {
            if (! is_file($path)) {
                continue;
            }

            $lines = file($path, FILE_IGNORE_NEW_LINES) ?: [];
            foreach ($lines as $line) {
                if (trim($line) === '' || str_starts_with(trim($line), '#')) {
                    continue;
                }

                if (! str_contains($line, '=')) {
                    continue;
                }

                [$key, $value] = array_map('trim', explode('=', $line, 2));
                if ($value === '') {
                    continue;
                }

                if (preg_match('/(SECRET|TOKEN|KEY|PASS|PWD|WEBHOOK|API)/i', $key)) {
                    $findings[] = [
                        'file' => $path,
                        'key' => $key,
                        'value' => $this->redact($value),
                    ];
                }
            }
        }

        $report = [
            'command' => $this->name,
            'timestamp' => $resolved['timestamp'],
            'dry_run' => $dryRun,
            'emit' => $emit,
            'findings' => $findings,
        ];

        $summaryLines = [
            '# Secrets Audit Report',
            '',
            '- Timestamp: ' . $resolved['timestamp'],
            '- Dry run: ' . ($dryRun ? 'yes' : 'no'),
            '- Findings: ' . count($findings),
            '',
            '## Findings',
        ];

        if (empty($findings)) {
            $summaryLines[] = '- none';
        } else {
            foreach ($findings as $finding) {
                $summaryLines[] = '- ' . $finding['key'] . ' in ' . $finding['file'] . ' = ' . $finding['value'];
            }
        }

        $summary = implode(PHP_EOL, $summaryLines) . PHP_EOL;

        if (! ArtifactHelper::writeArtifacts($resolved['docsDir'], $resolved['rawDir'], $summary, $report, $writeDocs, $writeRaw)) {
            return EXIT_ERROR;
        }

        CLI::write('Secrets audit artifacts written.', 'green');
        CLI::write('Docs: ' . $resolved['docsDir']);
        CLI::write('Raw: ' . $resolved['rawDir']);

        return EXIT_SUCCESS;
    }

    private function redact(string $value): string
    {
        $trimmed = trim($value, "\"' ");
        $length = strlen($trimmed);
        if ($length <= 4) {
            return str_repeat('*', $length);
        }

        return substr($trimmed, 0, 2) . str_repeat('*', max(0, $length - 4)) . substr($trimmed, -2);
    }
}
