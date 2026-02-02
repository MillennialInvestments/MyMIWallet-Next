<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class AutomationAudit extends SafeBaseCommand
{
    protected $group       = 'marketing';
    protected $name        = 'marketing:automation-audit';
    protected $description = 'Verify marketing automations, cron hooks, and API usage expectations.';
    protected $usage       = 'marketing:automation-audit [--emit=docs] [--out=path] [--dry-run] [--approve]';
    protected $options     = [
        '--emit' => 'Output mode: docs (default: docs).',
        '--out' => 'Override artifact directory (must be inside docs/aiops/artifacts).',
        '--dry-run' => 'Generate a report without mutating state.',
        '--approve' => 'Acknowledge execution (required for mutating commands).',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $emit = ArtifactHelper::parseOptionValue($params, 'emit') ?: 'docs';
        $outOverride = ArtifactHelper::parseOptionValue($params, 'out');

        $resolved = ArtifactHelper::resolveArtifactDirs($this->name, $outOverride);
        if (isset($resolved['error'])) {
            CLI::error($resolved['error']);
            return EXIT_ERROR;
        }

        $cronDoc = ROOTPATH . 'docs/CRON.md';
        $cronDocExists = is_file($cronDoc);
        $cronEntries = 0;
        $sparkEntries = 0;

        if ($cronDocExists) {
            $lines = file($cronDoc, FILE_IGNORE_NEW_LINES) ?: [];
            foreach ($lines as $line) {
                if (trim($line) === '' || str_starts_with(trim($line), '#')) {
                    continue;
                }
                $cronEntries++;
                if (stripos($line, 'spark') !== false) {
                    $sparkEntries++;
                }
            }
        }

        $report = [
            'command' => $this->name,
            'timestamp' => $resolved['timestamp'],
            'dry_run' => $dryRun,
            'emit' => $emit,
            'cron_doc_exists' => $cronDocExists,
            'cron_entries' => $cronEntries,
            'spark_entries' => $sparkEntries,
        ];

        $summaryLines = [
            '# Marketing Automation Audit',
            '',
            '- Timestamp: ' . $resolved['timestamp'],
            '- Dry run: ' . ($dryRun ? 'yes' : 'no'),
            '- CRON doc exists: ' . ($cronDocExists ? 'yes' : 'no'),
            '- Cron entries: ' . $cronEntries,
            '- Spark entries: ' . $sparkEntries,
        ];

        $summary = implode(PHP_EOL, $summaryLines) . PHP_EOL;

        if (! ArtifactHelper::writeArtifacts($resolved['dir'], $summary, $report)) {
            return EXIT_ERROR;
        }

        CLI::write('Marketing automation audit artifacts written.', 'green');
        CLI::write('Artifacts: ' . $resolved['dir']);

        return EXIT_SUCCESS;
    }
}
