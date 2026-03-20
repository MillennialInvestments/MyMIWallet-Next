<?php

declare(strict_types=1);

namespace App\Commands\GitHub;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class Push extends SafeBaseCommand
{
    protected $group = 'GitHub';
    protected $name = 'github:push';
    protected $description = 'Push the current branch to origin.';
    protected $usage = 'github:push [branch]';
    protected $arguments = [
        'branch' => 'Optional branch override. Defaults to the current branch.',
    ];

    public function run(array $params)
    {
        try {
            [$args] = $this->parseParams($params);
            $branch = $args[0] ?? null;

            CLI::write(service('git')->push($branch));

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            log_message('error', '[spark:git:push] ' . $e->getMessage());
            CLI::error($e->getMessage());

            return EXIT_ERROR;
        }
    }
}

