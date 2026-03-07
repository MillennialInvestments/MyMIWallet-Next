<?php

declare(strict_types=1);

namespace App\Commands\Routes;

use App\Commands\SafeBaseCommand;
use App\Services\Routes\RouteReconcileService;
use CodeIgniter\CLI\CLI;

final class Reconcile extends SafeBaseCommand
{
    protected $group = 'Routes';
    protected $name = 'routes:reconcile';
    protected $description = 'Reconcile route handlers against actual controllers and methods.';
    protected $usage = 'routes:reconcile [--out=docs/routes/routes_reconcile.md]';

    public function run(array $params)
    {
        $out = $this->getOptionValue($params, '--out', 'docs/routes/routes_reconcile.md');

        $service = new RouteReconcileService();
        $result = $service->run();

        $fullOut = ROOTPATH . ltrim($out, '/\\');
        $jsonOut = preg_replace('/\.md$/', '.json', $fullOut) ?: ($fullOut . '.json');

        $dir = dirname($fullOut);
        if (! is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }

        $md = [];
        $md[] = '# Routes Reconcile Report';
        $md[] = '';
        $md[] = '- Generated: `' . gmdate('Y-m-d\TH:i:s\Z') . '`';
        $md[] = '- Total scanned: `' . $result['summary']['scanned'] . '`';
        $md[] = '- Missing class: `' . $result['summary']['missing_class'] . '`';
        $md[] = '- Missing method: `' . $result['summary']['missing_method'] . '`';
        $md[] = '- Invalid handler: `' . $result['summary']['invalid_handler'] . '`';
        $md[] = '';

        $md[] = '## Issues';
        foreach ($result['issues'] as $row) {
            $md[] = '- `' . $row['method'] . ' ' . $row['route'] . '` => `' . $row['handler'] . '` [' . $row['issue'] . ']';
            if (! empty($row['suggestion'])) {
                $md[] = '  - Suggestion: `' . $row['suggestion'] . '`';
            }
        }

        file_put_contents($fullOut, implode("\n", $md) . "\n");
        file_put_contents($jsonOut, json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n");

        CLI::write('Wrote reconcile report: ' . $fullOut, 'green');
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