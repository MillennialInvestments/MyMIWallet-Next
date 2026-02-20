<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class CiPrepare extends SafeBaseCommand
{
    protected $group = 'ops';
    protected $name = 'ops:ci:prepare';
    protected $description = 'Prepare deterministic writable/artifact directories for CI runs.';
    protected $usage = 'ops:ci:prepare';

    public function run(array $params)
    {
        $this->parseParams($params);

        $paths = [
            WRITEPATH . 'logs',
            WRITEPATH . 'cache',
            WRITEPATH . 'ci',
            ROOTPATH . 'docs/_aiops',
        ];

        $created = [];
        foreach ($paths as $path) {
            if (! is_dir($path)) {
                @mkdir($path, 0775, true);
            }
            $created[] = [
                'path' => $path,
                'exists' => is_dir($path),
                'writable' => is_writable($path),
            ];
        }

        $factoryCachePattern = WRITEPATH . 'cache/FactoriesCache*';
        foreach (glob($factoryCachePattern) ?: [] as $cacheFile) {
            if (is_file($cacheFile)) {
                @unlink($cacheFile);
            }
        }

        $report = [
            'timestamp' => date('c'),
            'ci' => strtolower((string) env('CI')) === 'true',
            'ci_environment' => env('CI_ENVIRONMENT') ?: null,
            'environment' => env('ENVIRONMENT') ?: null,
            'paths' => $created,
            'factory_cache_cleared' => true,
            'php_version' => PHP_VERSION,
        ];

        $path = ROOTPATH . 'ci/ci_bootstrap.json';
        @mkdir(dirname($path), 0775, true);
        file_put_contents($path, json_encode($report, JSON_PRETTY_PRINT));
        CLI::write('CI directories prepared.', 'green');
        CLI::write(json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
