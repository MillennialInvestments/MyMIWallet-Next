<?php

declare(strict_types=1);

namespace App\Commands\Routes;

use App\Commands\SafeBaseCommand;
use App\Services\Routes\RouteRepairService;
use CodeIgniter\CLI\CLI;

final class Repair extends SafeBaseCommand
{
    protected $group       = 'Routes';
    protected $name        = 'routes:repair';
    protected $description = 'Repair invalid route handlers, resolve namespaces, and remove exact duplicate route definitions.';
    protected $usage       = 'routes:repair [--apply=0|1] [--report=docs/routes/routes_repair_report.md] [--paths=app/Config/Routes.php,app/Config/Routes]';

    public function run(array $params)
    {
        $apply = $this->getOptionValue($params, '--apply', '0') === '1';
        $report = $this->getOptionValue($params, '--report', 'docs/routes/routes_repair_report.md');
        $pathsRaw = $this->getOptionValue($params, '--paths', 'app/Config/Routes.php,app/Config/Routes');

        $service = new RouteRepairService();

        $paths = array_values(array_filter(array_map('trim', explode(',', $pathsRaw))));
        $result = $service->repair($paths, $apply);

        $reportPath = ROOTPATH . ltrim($report, '/\\');
        $dir = dirname($reportPath);
        if (! is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }

        $md = [];
        $md[] = '# Routes Repair Report';
        $md[] = '';
        $md[] = '- Generated (UTC): `' . gmdate('Y-m-d\TH:i:s\Z') . '`';
        $md[] = '- Apply mode: `' . ($apply ? '1' : '0') . '`';
        $md[] = '- Files scanned: `' . count($result['files']) . '`';
        $md[] = '- Invalid handlers fixed: `' . $result['summary']['invalid_fixed'] . '`';
        $md[] = '- Namespace repairs applied: `' . $result['summary']['namespace_fixed'] . '`';
        $md[] = '- Exact duplicates removed: `' . $result['summary']['duplicates_removed'] . '`';
        $md[] = '- Manual review required: `' . count($result['manual_review']) . '`';
        $md[] = '';

        $md[] = '## Files';
        foreach ($result['files'] as $file) {
            $md[] = '- `' . $file . '`';
        }

        $md[] = '';
        $md[] = '## Applied Changes';
        if ($result['changes'] === []) {
            $md[] = '- None';
        } else {
            foreach ($result['changes'] as $change) {
                $md[] = '- `' . $change['file'] . '` line `' . $change['line'] . '` — ' . $change['message'];
            }
        }

        $md[] = '';
        $md[] = '## Manual Review';
        if ($result['manual_review'] === []) {
            $md[] = '- None';
        } else {
            foreach ($result['manual_review'] as $issue) {
                $md[] = '- `' . $issue['file'] . '` line `' . $issue['line'] . '` — ' . $issue['message'];
            }
        }

        file_put_contents($reportPath, implode("\n", $md) . "\n");

        CLI::write('Routes repair complete.', 'green');
        CLI::write('Report: ' . $reportPath, 'green');
        CLI::write('Invalid handlers fixed: ' . $result['summary']['invalid_fixed'], 'yellow');
        CLI::write('Namespace repairs: ' . $result['summary']['namespace_fixed'], 'yellow');
        CLI::write('Exact duplicates removed: ' . $result['summary']['duplicates_removed'], 'yellow');
        CLI::write('Manual review items: ' . count($result['manual_review']), count($result['manual_review']) ? 'red' : 'green');
    }

    private function getOptionValue(array $params, string $key, string $default): string
    {
        foreach ($params as $p) {
            if (is_string($p) && strpos($p, $key . '=') === 0) {
                return (string) substr($p, strlen($key) + 1);
            }
        }

        return $default;
    }
}