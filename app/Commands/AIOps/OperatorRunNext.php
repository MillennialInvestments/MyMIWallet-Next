<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class OperatorRunNext extends SafeBaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:operator:run-next';
    protected $description = 'Compatibility command for older MyMI AIOps worktrees.';

    public function run(array $params)
    {
        CLI::write('===== AIOPS OPERATOR RUN NEXT COMPAT =====', 'green');
        CLI::write('STATUS: COMPAT_READY');
        CLI::write('MUTATION_ALLOWED: false');
        CLI::newLine();
        CLI::write('This MyMI lane uses repo-native validation instead of the newer TBI operator state machine.');
        CLI::newLine();
        CLI::write('NEXT COMMANDS:', 'yellow');
        CLI::write('git status --short');
        CLI::write('git diff --check');
        CLI::write('gh pr view 530 --json number,title,state,isDraft,mergeStateStatus,url');
        CLI::write('gh pr checks 530');

        return EXIT_SUCCESS;
    }
}
