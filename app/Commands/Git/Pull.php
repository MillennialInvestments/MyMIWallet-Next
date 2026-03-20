<?php

declare(strict_types=1);

namespace App\Commands\Git;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class Pull extends SafeBaseCommand
{
    protected $group = 'Git';
    protected $name = 'git:pull';
    protected $description = 'Pull the current branch from origin with rebase.';
    protected $usage = 'git:pull [branch]';
    protected $arguments = [
        'branch' => 'Optional branch override. Defaults to the current branch.',
    ];

    public function run(array $params)
    {
        try {
            [$args] = $this->parseParams($params);
            $branch = $args[0] ?? null;

            CLI::write(service('git')->pull($branch));

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            log_message('error', '[spark:git:pull] ' . $e->getMessage());
            CLI::error($e->getMessage());

            return EXIT_ERROR;
        }
    }
}

