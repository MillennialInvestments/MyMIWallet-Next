<?php

declare(strict_types=1);

namespace App\Commands\Routes;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\Router\DefinedRouteCollector;

/**
 * Fails when a route points at a controller (or method) that does not exist.
 *
 * Known gaps are listed in tests/baseline/route-handler-gaps.txt so the check can
 * ratchet: a new broken handler fails the build, and a baseline entry that has been
 * fixed must be removed from the file (so the list only ever shrinks).
 */
class VerifyHandlers extends SafeBaseCommand
{
    protected $group       = 'Routes';
    protected $name        = 'routes:verify-handlers';
    protected $description = 'Fail when a route targets a missing controller or method (GTM-022).';
    protected $usage       = 'routes:verify-handlers [--baseline=path] [--write-baseline]';
    protected $options     = [
        '--baseline'       => 'Baseline file of known gaps (default tests/baseline/route-handler-gaps.txt)',
        '--write-baseline' => 'Rewrite the baseline with the current gaps and exit 0',
    ];

    public function run(array $params)
    {
        $baselinePath = (string) (CLI::getOption('baseline') ?: ROOTPATH . 'tests/baseline/route-handler-gaps.txt');

        $collection = service('routes')->loadRoutes();

        $gaps = [];
        foreach ((new DefinedRouteCollector($collection))->collect() as $route) {
            $handler = $route['handler'] ?? null;
            if (! is_string($handler) || ! str_contains($handler, '::')) {
                continue;
            }
            [$class, $method] = explode('::', $handler, 2);
            $class  = ltrim($class, '\\');
            $method = (string) preg_replace('#/.*$#', '', $method);

            $problem = null;
            if (! class_exists($class)) {
                $problem = 'missing-class';
            } elseif (! method_exists($class, $method) && ! method_exists($class, '_remap')) {
                $problem = 'missing-method';
            }
            if ($problem !== null) {
                $gaps[$class . '::' . $method] = $problem;
            }
        }
        ksort($gaps);

        if (CLI::getOption('write-baseline')) {
            $lines = ['# Known route handler gaps (GTM-022..026). Remove a line once it is fixed.'];
            foreach ($gaps as $key => $problem) {
                $lines[] = $key;
            }
            file_put_contents($baselinePath, implode("\n", $lines) . "\n");
            CLI::write(sprintf('Wrote %d gaps to %s', count($gaps), $baselinePath), 'yellow');

            return EXIT_SUCCESS;
        }

        $baseline = [];
        if (is_file($baselinePath)) {
            foreach (file($baselinePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
                $line = trim($line);
                if ($line !== '' && $line[0] !== '#') {
                    $baseline[$line] = true;
                }
            }
        }

        $new   = array_diff_key($gaps, $baseline);
        $fixed = array_diff_key($baseline, $gaps);

        CLI::write(sprintf('Route handlers: %d known gaps, %d new, %d fixed but still in baseline.', count($gaps) - count($new), count($new), count($fixed)));

        foreach ($new as $key => $problem) {
            CLI::error("NEW {$problem}: {$key}");
        }
        foreach ($fixed as $key => $_) {
            CLI::error("FIXED, remove from baseline: {$key}");
        }

        return ($new === [] && $fixed === []) ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
