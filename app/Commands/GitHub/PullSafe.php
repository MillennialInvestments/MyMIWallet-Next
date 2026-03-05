<?php

declare(strict_types=1);

namespace App\Commands\GitHub;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

final class PullSafe extends SafeBaseCommand
{
    protected $group       = 'DevOps';
    protected $name        = 'git:pull:safe';
    protected $description = 'Safely pull origin/main by stashing local changes and optionally resetting generated artifacts.';
    protected $usage       = 'git:pull:safe [--stash=1] [--reset-generated=1]';

    public function run(array $params)
    {
        $stash = $this->getOptionValue($params, '--stash', '1') === '1';
        $resetGenerated = $this->getOptionValue($params, '--reset-generated', '1') === '1';

        if (!function_exists('shell_exec')) {
            CLI::error('shell_exec is disabled; cannot run git commands.');
            return;
        }

        $generated = [
            'docs/routes/routes.json',
            'docs/routes/routes.md',
            'docs/launch/launch_readiness_audit.md',
        ];

        $status = trim((string) shell_exec('git status --porcelain=v1 -uall 2>/dev/null'));
        $dirty = $status !== '';

        $stashName = 'spark-auto-stash-' . gmdate('Ymd_His');

        if ($dirty && $stash) {
            CLI::write('Stashing local changes...', 'yellow');
            CLI::write((string) shell_exec('git stash push -u -m ' . escapeshellarg($stashName) . ' 2>&1'));
        }

        if ($resetGenerated) {
            CLI::write('Resetting generated artifacts (if present)...', 'yellow');
            foreach ($generated as $file) {
                if (file_exists($file)) {
                    shell_exec('git restore ' . escapeshellarg($file) . ' 2>&1');
                }
            }
        }

        CLI::write('Pulling origin/main...', 'yellow');
        $pull = (string) shell_exec('git pull --tags origin main 2>&1');
        CLI::write($pull);

        if ($dirty && $stash) {
            CLI::write('Restoring stash...', 'yellow');
            $pop = (string) shell_exec('git stash pop 2>&1');
            CLI::write($pop);
        }

        CLI::write('Done. Run `git status` to confirm final state.', 'green');
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