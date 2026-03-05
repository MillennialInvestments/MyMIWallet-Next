<?php

namespace App\Commands\GitHub;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class WorkspaceRepair extends SafeBaseCommand
{
    protected $group       = 'DevOps';
    protected $name        = 'git:workspace:repair';
    protected $description = 'Repairs git workspace when generated files block pull operations.';

    public function run(array $params)
    {
        CLI::write('Checking Git workspace...', 'yellow');

        $status = shell_exec('git status --porcelain');

        if (empty(trim($status))) {
            CLI::write('Workspace clean.', 'green');
            return;
        }

        CLI::write('Detected modified files:', 'yellow');
        CLI::write($status);

        $generated = [
            'docs/routes/routes.json',
            'docs/routes/routes.md',
        ];

        foreach ($generated as $file) {
            if (file_exists($file)) {
                CLI::write("Resetting generated file: $file", 'cyan');
                shell_exec("git restore $file");
            }
        }

        CLI::write('Attempting safe pull...', 'yellow');

        $result = shell_exec('git pull --tags origin main');

        CLI::write($result);

        CLI::write('Workspace repair complete.', 'green');
    }
}