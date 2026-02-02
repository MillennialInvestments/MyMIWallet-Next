<?php

namespace App\Commands\Runtime;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class SparkDoctorRuntime extends SafeBaseCommand
{
    protected $group       = 'runtime';
    protected $name        = 'runtime:spark-doctor';
    protected $description = 'Validate Spark command discovery and CI4 compatibility (runtime scope).';
    protected $usage       = 'runtime:spark-doctor [--emit=docs] [--out=path] [--dry-run] [--approve]';
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

        $scanScript = ROOTPATH . 'tools/spark_scan_commands.php';
        $output = [];
        $code = null;

        if (is_file($scanScript)) {
            exec(PHP_BINARY . ' ' . escapeshellarg($scanScript), $output, $code);
        } else {
            $output[] = 'spark_scan_commands.php not found.';
            $code = 1;
        }

        $report = [
            'command' => $this->name,
            'timestamp' => $resolved['timestamp'],
            'dry_run' => $dryRun,
            'emit' => $emit,
            'scan_script' => $scanScript,
            'exit_code' => $code,
            'output' => $output,
        ];

        $summaryLines = [
            '# Runtime Spark Doctor',
            '',
            '- Timestamp: ' . $resolved['timestamp'],
            '- Dry run: ' . ($dryRun ? 'yes' : 'no'),
            '- Exit code: ' . (string) $code,
            '',
            '## Output',
        ];

        foreach ($output as $line) {
            $summaryLines[] = '- ' . $line;
        }

        $summary = implode(PHP_EOL, $summaryLines) . PHP_EOL;

        if (! ArtifactHelper::writeArtifacts($resolved['dir'], $summary, $report)) {
            return EXIT_ERROR;
        }

        CLI::write('Runtime spark doctor artifacts written.', 'green');
        CLI::write('Artifacts: ' . $resolved['dir']);

        return $code === 0 ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
