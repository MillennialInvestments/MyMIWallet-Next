<?php

declare(strict_types=1);

namespace App\Commands\GitHub;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class Branch extends SafeBaseCommand
{
    protected $group = 'GitHub';
    protected $name = 'github:branch';
    protected $description = 'Create and switch to a new feature branch.';
    protected $usage = 'github:branch feature/x';
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

