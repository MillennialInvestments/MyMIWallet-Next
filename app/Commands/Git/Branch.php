<?php

declare(strict_types=1);

namespace App\Commands\Git;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class Branch extends SafeBaseCommand
{
    protected $group = 'Git';
    protected $name = 'git:branch';
    protected $description = 'Create and switch to a new feature branch.';
    protected $usage = 'git:branch feature/x';
    protected $arguments = [
        'name' => 'New branch name. Defaults to feature/auto.',
    ];

    public function run(array $params)
    {
        try {
            [$args] = $this->parseParams($params);
            $name = $args[0] ?? 'feature/auto';

            CLI::write(service('git')->createBranch($name));

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            log_message('error', '[spark:git:branch] ' . $e->getMessage());
            CLI::error($e->getMessage());

            return EXIT_ERROR;
        }
    }
}

