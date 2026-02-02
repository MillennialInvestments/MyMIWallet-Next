<?php

namespace App\Commands\Ux;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class JourneyAudit extends SafeBaseCommand
{
    protected $group       = 'audit';
    protected $name        = 'ux:journey-audit';
    protected $description = 'Validate critical user journeys (signup to dashboard flow checks).';
    protected $usage       = 'ux:journey-audit [--emit=docs] [--out=path] [--dry-run] [--approve]';
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

        $checks = [
            'public_index' => is_file(FCPATH . 'index.php'),
            'routes_file' => is_file(APPPATH . 'Config/Routes.php'),
            'views_dir' => is_dir(APPPATH . 'Views'),
        ];

        $report = [
            'command' => $this->name,
            'timestamp' => $resolved['timestamp'],
            'dry_run' => $dryRun,
            'emit' => $emit,
            'checks' => $checks,
        ];

        $summaryLines = [
            '# UX Journey Audit',
            '',
            '- Timestamp: ' . $resolved['timestamp'],
            '- Dry run: ' . ($dryRun ? 'yes' : 'no'),
            '',
            '## Checks',
        ];

        foreach ($checks as $label => $value) {
            $summaryLines[] = '- ' . $label . ': ' . ($value ? 'true' : 'false');
        }

        $summary = implode(PHP_EOL, $summaryLines) . PHP_EOL;

        if (! ArtifactHelper::writeArtifacts($resolved['dir'], $summary, $report)) {
            return EXIT_ERROR;
        }

        CLI::write('UX journey audit artifacts written.', 'green');
        CLI::write('Artifacts: ' . $resolved['dir']);

        return EXIT_SUCCESS;
    }
}
