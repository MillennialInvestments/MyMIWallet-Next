<?php

namespace App\Commands\GitHub;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SyncSafe extends SafeBaseCommand
{
    protected $group       = 'Git';
    protected $name        = 'git:sync-safe';
    protected $description = 'Safely sync repository with origin/main with automatic stash handling';

    protected $stashCreated = false;

    public function run(array $params)
    {
        CLI::write('Checking repository state...', 'yellow');

        $status = trim(shell_exec('git status --porcelain'));

        if (!$status) {
            CLI::write('Working tree clean. Pulling latest changes...', 'green');
            $this->pull();
            return;
        }

        $lines = explode("\n", $status);

        $trackedChanges = [];
        $logOnlyChanges = true;

        foreach ($lines as $line) {

            $file = trim(substr($line, 3));

            if (str_starts_with($file, 'writable/logs/')) {
                continue;
            }

            $logOnlyChanges = false;
            $trackedChanges[] = $file;
        }

        if ($logOnlyChanges) {
            CLI::write('Only log files modified. Resetting logs...', 'yellow');
            shell_exec('git restore writable/logs');
            $this->pull();
            return;
        }

        CLI::write('Modified files detected:', 'yellow');

        foreach ($trackedChanges as $file) {
            CLI::write(" - $file");
        }

        if (CLI::prompt('Create temporary stash before pull? (y/n)', ['y','n']) === 'y') {

            CLI::write('Creating stash...', 'yellow');
            shell_exec('git stash push -u -m "spark-sync-safe"');
            $this->stashCreated = true;
        }

        $this->pull();

        if ($this->stashCreated) {

            CLI::write('Restoring stash...', 'yellow');

            $result = shell_exec('git stash pop');

            CLI::write($result);
        }

        CLI::write('Repository sync complete.', 'green');
    }

    protected function pull()
    {
        CLI::write('Running git pull --rebase origin main', 'yellow');

        $result = shell_exec('git pull --rebase origin main 2>&1');

        CLI::write($result);

        if (str_contains($result, 'CONFLICT')) {
            CLI::error('Merge conflicts detected. Resolve manually.');
        }
    }
}