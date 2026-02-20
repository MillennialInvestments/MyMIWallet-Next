<?php

namespace App\Commands\Runtime;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class Triage extends SafeBaseCommand
{
    protected $group       = 'runtime';
    protected $name        = 'runtime:triage';
    protected $description = 'Consolidate runtime diagnostics into a single report.';
    protected $usage       = 'runtime:triage [--emit=docs] [--out=path] [--dry-run] [--approve]';
    protected $options     = [
        '--emit' => 'Output mode: docs (default: docs).',
        '--out' => 'Override artifact directory (must be inside docs/aiops/artifacts).',
        '--dry-run' => 'Generate a report without mutating state.',
        '--approve' => 'Acknowledge execution (required for mutating commands).',
    ];

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $emit = ArtifactHelper::parseOptionValue($params, 'emit') ?: 'docs';
        $outOverride = ArtifactHelper::parseOptionValue($params, 'out');

        $resolved = ArtifactHelper::resolveArtifactDirs($this->name, $outOverride);
        if (isset($resolved['error'])) {
            CLI::error($resolved['error']);
            return EXIT_ERROR;
        }

        $checks = [
            'php_version' => PHP_VERSION,
            'ci_environment' => env('CI') ? 'ci' : 'local',
            'writable_path' => WRITEPATH,
            'writable_is_dir' => is_dir(WRITEPATH),
            'writable_is_writable' => is_writable(WRITEPATH),
            'cache_dir_exists' => is_dir(WRITEPATH . 'cache'),
            'logs_dir_exists' => is_dir(WRITEPATH . 'logs'),
            'public_index_exists' => is_file(FCPATH . 'index.php'),
            'disk_free_mb' => round((float) (disk_free_space(ROOTPATH) ?: 0) / 1024 / 1024, 2),
        ];

        $report = [
            'command' => $this->name,
            'timestamp' => $resolved['timestamp'],
            'dry_run' => $dryRun,
            'emit' => $emit,
            'checks' => $checks,
        ];

        $summaryLines = [
            '# Runtime Triage',
            '',
            '- Timestamp: ' . $resolved['timestamp'],
            '- Dry run: ' . ($dryRun ? 'yes' : 'no'),
            '- Emit: ' . $emit,
            '',
            '## Checks',
        ];

        foreach ($checks as $label => $value) {
            $summaryLines[] = '- ' . $label . ': ' . (is_bool($value) ? ($value ? 'true' : 'false') : (string) $value);
        }

        $summary = implode(PHP_EOL, $summaryLines) . PHP_EOL;

        if (! ArtifactHelper::writeArtifacts($resolved['dir'], $summary, $report)) {
            return EXIT_ERROR;
        }

        CLI::write('Runtime triage artifacts written.', 'green');
        CLI::write('Artifacts: ' . $resolved['dir']);

        return EXIT_SUCCESS;
    }
}
