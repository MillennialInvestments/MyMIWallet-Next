<?php

namespace App\Commands\Growth;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class RetentionWatch extends SafeBaseCommand
{
    protected $group       = 'audit';
    protected $name        = 'growth:retention-watch';
    protected $description = 'Detect retention anomalies from engagement signals.';
    protected $usage       = 'growth:retention-watch [--emit=docs] [--out=path] [--dry-run] [--approve]';
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

        $signals = [
            'notes' => 'No data sources configured yet. This command emits placeholders until metrics are wired.',
        ];

        $report = [
            'command' => $this->name,
            'timestamp' => $resolved['timestamp'],
            'dry_run' => $dryRun,
            'emit' => $emit,
            'signals' => $signals,
        ];

        $summaryLines = [
            '# Growth Retention Watch',
            '',
            '- Timestamp: ' . $resolved['timestamp'],
            '- Dry run: ' . ($dryRun ? 'yes' : 'no'),
            '',
            '## Signals',
            '- ' . $signals['notes'],
        ];

        $summary = implode(PHP_EOL, $summaryLines) . PHP_EOL;

        if (! ArtifactHelper::writeArtifacts($resolved['dir'], $summary, $report)) {
            return EXIT_ERROR;
        }

        CLI::write('Retention watch artifacts written.', 'green');
        CLI::write('Artifacts: ' . $resolved['dir']);

        return EXIT_SUCCESS;
    }
}
