<?php

declare(strict_types=1);

namespace App\Commands\Gtm;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class HealthSnapshot extends SafeBaseCommand
{
    protected $group = 'GTM';
    protected $name = 'gtm:health:snapshot';
    protected $description = 'Generate deterministic GTM daily health snapshot markdown report.';

    public function run(array $params)
    {
        $outputPath = ROOTPATH . 'docs/launch/daily_health_snapshot.md';
        $generatedAt = date('Y-m-d H:i:s T');

        [$routeList, $routeError] = $this->collectRoutes();
        $filterSummary = $this->collectFilters();
        $cacheDriver = $this->collectCacheDriver();
        $loggerHandlers = $this->collectLoggerHandlers();
        $envFlags = $this->collectEnvironmentFlags();
        $externalApiSummary = $this->collectExternalApiPolicySummary();

        $lines = [
            '# Daily Health Snapshot',
            '',
            '- Generated: ' . $generatedAt,
            '- Command: `php spark gtm:health:snapshot`',
            '',
            '## Environment Flags',
        ];

        foreach ($envFlags as $k => $v) {
            $lines[] = '- ' . $k . ': `' . (string) $v . '`';
        }

        $lines[] = '';
        $lines[] = '## Cache Driver';
        $lines[] = '- Active handler: `' . $cacheDriver . '`';

        $lines[] = '';
        $lines[] = '## Logger Handlers In Use';
        if ($loggerHandlers === []) {
            $lines[] = '- none detected';
        } else {
            foreach ($loggerHandlers as $handler => $meta) {
                $handles = $meta['handles'];
                $lines[] = '- `' . $handler . '` handles: ' . ($handles === [] ? '[none]' : implode(', ', $handles));
            }
        }

        $lines[] = '';
        $lines[] = '## Filter Summary';
        $lines[] = '- Aliases: ' . (string) $filterSummary['alias_count'];
        $lines[] = '- Global before filters: ' . (string) $filterSummary['global_before_count'];
        $lines[] = '- Global after filters: ' . (string) $filterSummary['global_after_count'];
        $lines[] = '- Route-specific filter entries: ' . (string) $filterSummary['route_filter_count'];
        $lines[] = '';
        $lines[] = '### Global Before';
        foreach ($filterSummary['global_before'] as $entry) {
            $lines[] = '- ' . $entry;
        }
        $lines[] = '';
        $lines[] = '### Global After';
        foreach ($filterSummary['global_after'] as $entry) {
            $lines[] = '- ' . $entry;
        }

        $lines[] = '';
        $lines[] = '## Route Count + List';
        if ($routeError !== null) {
            $lines[] = '- Route collection unavailable: `' . $routeError . '`';
        }
        $lines[] = '- Route count: ' . (string) count($routeList);
        $lines[] = '';
        foreach ($routeList as $route) {
            $lines[] = '- ' . $route;
        }

        $lines[] = '';
        $lines[] = '## External API Policy Summary';
        if ($externalApiSummary === []) {
            $lines[] = '- No explicit policy keys detected in API config objects.';
        } else {
            foreach ($externalApiSummary as $key => $value) {
                $lines[] = '- ' . $key . ': `' . $value . '`';
            }
        }

        $dir = dirname($outputPath);
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        file_put_contents($outputPath, implode(PHP_EOL, $lines) . PHP_EOL);
        CLI::write('Daily health snapshot written: ' . $outputPath, 'green');

        return EXIT_SUCCESS;
    }

    private function collectRoutes(): array
    {
        $routesFile = ROOTPATH . 'app/Config/Routes.php';
        if (! is_file($routesFile)) {
            return [[], 'Routes.php not found'];
        }

        $lines = file($routesFile, FILE_IGNORE_NEW_LINES) ?: [];
        $found = [];

        foreach ($lines as $line) {
            $trim = trim($line);
            if ($trim === '' || str_starts_with($trim, '//')) {
                continue;
            }

            if (preg_match('/\$routes->(get|post|put|delete|patch|options|cli|match)\((.+)\);/i', $trim, $m) === 1) {
                $method = strtoupper($m[1]);
                $args = $m[2];

                if (preg_match('/^[\'"]([^\'"]+)[\'"]\s*,\s*[\'"]([^\'"]+)[\'"]/', $args, $a) === 1) {
                    $found[] = $method . ' ' . $a[1] . ' => ' . $a[2];
                } else {
                    $found[] = $method . ' ' . $this->stringify($args);
                }
            }
        }

        $found = array_values(array_unique($found));
        sort($found);

        return [$found, null];
    }

    private function collectFilters(): array
    {
        $cfg = config('Filters');
        $aliases = $cfg->aliases ?? [];
        $globals = $cfg->globals ?? [];
        $routeFilters = $cfg->filters ?? [];

        $globalBefore = $this->normalizeFilterEntries($globals['before'] ?? []);
        $globalAfter = $this->normalizeFilterEntries($globals['after'] ?? []);

        return [
            'alias_count' => count($aliases),
            'global_before_count' => count($globalBefore),
            'global_after_count' => count($globalAfter),
            'route_filter_count' => count($routeFilters),
            'global_before' => $globalBefore,
            'global_after' => $globalAfter,
        ];
    }

    /** @return list<string> */
    private function normalizeFilterEntries(array $entries): array
    {
        $out = [];

        foreach ($entries as $key => $value) {
            if (is_int($key)) {
                $out[] = (string) $value;
            } else {
                $out[] = (string) $key;
            }
        }

        return $out;
    }

    private function collectCacheDriver(): string
    {
        try {
            return (string) (config('Cache')->handler ?? 'unknown');
        } catch (Throwable $e) {
            return 'unavailable: ' . $e->getMessage();
        }
    }

    private function collectLoggerHandlers(): array
    {
        try {
            $handlers = config('Logger')->handlers ?? [];
            $result = [];
            foreach ($handlers as $handlerClass => $meta) {
                if (! is_array($meta)) {
                    continue;
                }

                $result[$handlerClass] = [
                    'handles' => array_map(static fn($v): string => (string) $v, (array) ($meta['handles'] ?? [])),
                ];
            }
            return $result;
        } catch (Throwable $e) {
            return ['unavailable' => ['handles' => ['error: ' . $e->getMessage()]]];
        }
    }

    private function collectEnvironmentFlags(): array
    {
        return [
            'APP_ENV' => (string) (getenv('APP_ENV') ?: 'unset'),
            'CI_ENVIRONMENT' => (string) (getenv('CI_ENVIRONMENT') ?: (defined('ENVIRONMENT') ? ENVIRONMENT : 'unset')),
            'ENVIRONMENT_CONSTANT' => (string) (defined('ENVIRONMENT') ? ENVIRONMENT : 'unset'),
        ];
    }

    private function collectExternalApiPolicySummary(): array
    {
        $summary = [];

        try {
            $policy = config('ExternalApiPolicy');
            if (is_object($policy)) {
                $caps = (array) ($policy->providerCaps ?? []);
                ksort($caps);
                foreach ($caps as $provider => $cap) {
                    $summary['ExternalApiPolicy.providerCaps.' . $provider] = (string) $cap;
                }

                $summary['ExternalApiPolicy.enableBackoff'] = ($policy->enableBackoff ?? false) ? 'true' : 'false';
                $summary['ExternalApiPolicy.microSleepBackoffUs'] = (string) ($policy->microSleepBackoffUs ?? 0);
            }
        } catch (Throwable $e) {
            $summary['ExternalApiPolicy.__error'] = $e->getMessage();
        }

        foreach (['APISettings', 'APIs'] as $target) {
            try {
                $cfg = config($target);
                if (! is_object($cfg)) {
                    continue;
                }

                foreach (get_object_vars($cfg) as $key => $value) {
                    if (! preg_match('/limit|rate|throttle|cap|timeout|retry|backoff/i', (string) $key)) {
                        continue;
                    }

                    $summary[$target . '.' . $key] = $this->stringify($value);
                }
            } catch (Throwable $e) {
                $summary[$target . '.__error'] = $e->getMessage();
            }
        }

        ksort($summary);

        return $summary;
    }

    private function stringify($value): string
    {
        if (is_scalar($value) || $value === null) {
            return (string) $value;
        }

        if (is_array($value)) {
            return json_encode($value, JSON_UNESCAPED_SLASHES) ?: '[array]';
        }

        if (is_object($value)) {
            return 'object(' . get_class($value) . ')';
        }

        return '[' . gettype($value) . ']';
    }
}
