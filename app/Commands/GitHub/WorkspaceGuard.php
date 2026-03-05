<?php

declare(strict_types=1);

namespace App\Commands\GitHub;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

final class WorkspaceGuard extends SafeBaseCommand
{
    protected $group       = 'DevOps';
    protected $name        = 'git:workspace:guard';
    protected $description = 'Detects workspace conditions that commonly block pulls/PRs.';
    protected $usage       = 'git:workspace:guard [--json=0|1]';

    public function run(array $params)
    {
        $json = $this->getOptionValue($params, '--json', '0') === '1';

        if (!function_exists('shell_exec')) {
            CLI::error('shell_exec is disabled; cannot inspect git state.');
            return;
        }

        $branch = trim((string) shell_exec('git rev-parse --abbrev-ref HEAD 2>/dev/null'));
        $status = (string) shell_exec('git status --porcelain=v1 -uall 2>/dev/null');

        $lines = array_values(array_filter(array_map('trim', explode("\n", $status))));
        $dirty = count($lines) > 0;

        $generated = [
            'docs/routes/routes.json',
            'docs/routes/routes.md',
            'docs/launch/launch_readiness_audit.md',
        ];

        $generatedDirty = [];
        foreach ($generated as $f) {
            foreach ($lines as $ln) {
                // porcelain line ends with path; handle rename like "R  old -> new" by searching substring
                if (str_contains($ln, $f)) {
                    $generatedDirty[] = $f;
                }
            }
        }

        // common noisy runtime/log dirs you probably don't want committed
        $noisePrefixes = [
            'writable/logs/',
            'aiops/logs/',
            'aiops/n8n.pid',
        ];
        $noiseDirty = [];
        foreach ($noisePrefixes as $p) {
            foreach ($lines as $ln) {
                if (str_contains($ln, $p)) {
                    $noiseDirty[] = $p;
                    break;
                }
            }
        }

        $result = [
            'branch'          => $branch ?: 'unknown',
            'dirty'           => $dirty,
            'changed_count'   => count($lines),
            'generated_dirty' => array_values(array_unique($generatedDirty)),
            'noise_dirty'     => array_values(array_unique($noiseDirty)),
        ];

        if ($json) {
            CLI::write(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            return;
        }

        CLI::write('Git Workspace Guard', 'yellow');
        CLI::write('Branch: ' . ($result['branch'] ?? 'unknown'), 'cyan');
        CLI::write('Dirty: ' . ($dirty ? 'YES' : 'NO'), $dirty ? 'red' : 'green');
        CLI::write('Changed files: ' . $result['changed_count'], 'cyan');

        if (!empty($result['generated_dirty'])) {
            CLI::write('Generated artifacts modified:', 'yellow');
            foreach ($result['generated_dirty'] as $f) {
                CLI::write(' - ' . $f, 'red');
            }
        }

        if (!empty($result['noise_dirty'])) {
            CLI::write('Runtime/log noise detected (usually don’t commit):', 'yellow');
            foreach ($result['noise_dirty'] as $p) {
                CLI::write(' - ' . $p, 'red');
            }
        }

        if ($dirty) {
            CLI::write("\nTip: run `php spark git:pull:safe` (stashes + pulls + restores) or `php spark git:workspace:repair` (resets generated files).", 'green');
        }
    }

    private function getOptionValue(array $params, string $key, string $default): string
    {
        foreach ($params as $p) {
            if (strpos($p, $key . '=') === 0) {
                return (string) substr($p, strlen($key) + 1);
            }
        }
        return $default;
    }
}