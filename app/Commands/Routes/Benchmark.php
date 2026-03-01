<?php

declare(strict_types=1);

namespace App\Commands\Routes;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Benchmark extends SafeBaseCommand
{
    protected $group = 'System';
    protected $name = 'system:route-count-baseline';
    protected $description = 'Capture current route declaration baseline for guardrails.';

    public function run(array $params)
    {
        $file = ROOTPATH . 'app/Config/Routes.php';
        $count = 0;

        if (is_file($file)) {
            $lines = file($file, FILE_IGNORE_NEW_LINES) ?: [];
            foreach ($lines as $line) {
                $trim = trim($line);
                if ($trim === '' || str_starts_with($trim, '//')) {
                    continue;
                }

                if (preg_match('/\$routes->(get|post|put|delete|patch|options|cli|match)\(/i', $trim) === 1) {
                    $count++;
                }
            }
        }

        $baseline = [
            'generated_at_utc' => gmdate('c'),
            'source' => 'app/Config/Routes.php',
            'declared_route_count' => $count,
            'guard' => [
                'min_expected' => max(1, $count - 25),
                'message' => 'Fail CI if declared route count drops unexpectedly below min_expected.',
            ],
        ];

        $path = ROOTPATH . 'docs/architecture/route_baseline.json';
        if (! is_dir(dirname($path))) {
            mkdir(dirname($path), 0775, true);
        }

        file_put_contents($path, json_encode($baseline, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);

        CLI::write('Route baseline saved: ' . $path, 'green');
        CLI::write('Declared route count: ' . $count, 'yellow');

        return EXIT_SUCCESS;
    }
}
