<?php

namespace App\Commands;

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
        CLI::write('ROOT: ' . (getcwd() ?: ROOTPATH));
        CLI::write('MUTATION_ALLOWED: false');
        CLI::newLine();
        CLI::write('This MyMI repo does not include the newer TBI operator state machine.');
        CLI::write('Use repo-native validation and GitHub PR checks for this lane.');
        CLI::newLine();
        CLI::write('NEXT COMMANDS:', 'yellow');
        CLI::write('git status --short');
        CLI::write('git diff --check');
        CLI::write('gh pr view 530 --json number,title,state,isDraft,mergeStateStatus,url');
        CLI::write('gh pr checks 530');
    }
}
