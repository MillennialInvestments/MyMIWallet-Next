<?php

declare(strict_types=1);

namespace App\Commands\Master;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class RunAll extends SafeBaseCommand
{
    protected $group = 'master';
    protected $name = 'master:run-all';
    protected $description = 'Run the master docs, graph, and health pipeline.';

    public function run(array $params)
    {
        CLI::write('Running master pipeline...', 'yellow');

        $commands = [
            'docs:inventory',
            'docs:audit',
            'docs:readme:build',
            'master:knowledge-graph:build',
            'master:health:routes',
            'master:health:controllers',
            'master:health:services',
            'master:health:models',
            'master:health:docs',
            'master:health:logs',
            'master:health:views',
            'master:health:commands',
            'master:health:dependencies',
        ];

        foreach ($commands as $command) {
            CLI::write('> ' . $command, 'cyan');

            try {
                command($command);
            } catch (\Throwable $e) {
                CLI::error($command . ' failed: ' . $e->getMessage());

                log_message('error', 'Master pipeline subcommand failed: {command} => {message}', [
                    'command' => $command,
                    'message' => $e->getMessage(),
                ]);
            }
        }

        CLI::write('Master pipeline complete.', 'green');
    }
}