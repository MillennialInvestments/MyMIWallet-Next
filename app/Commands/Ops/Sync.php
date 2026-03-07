<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

final class Sync extends SafeBaseCommand
{
    protected $group       = 'Ops';
    protected $name        = 'ops:sync';
    protected $description = 'Runs an ops sync pipeline: git guard/pull + routes docs + launch audit + repo health.';
    protected $usage       = 'ops:sync';

    public function run(array $params)
    {
        CLI::write('Running ops:sync pipeline...', 'yellow');

        $commands = [
            ['git:workspace:guard', []],
            ['git:pull:safe', []],
            ['routes:docs', ['--mode=all']],
            ['gtm:launch:audit', []],
            ['repo:health', []],
        ];

        $runner = service('commands');

        foreach ($commands as [$command, $args]) {

            CLI::write("\n> php spark {$command} " . implode(' ', $args), 'cyan');

            try {

                $result = $runner->run($command, $args);

                if ($result !== EXIT_SUCCESS) {
                    CLI::error("Command returned non-zero status: {$command}");
                }

            } catch (\Throwable $e) {

                CLI::error("Command failed: {$command}");
                CLI::error($e->getMessage());

            }
        }

        CLI::write("\nops:sync complete.", 'green');
    }
}