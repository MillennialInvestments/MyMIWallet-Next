<?php

declare(strict_types=1);

namespace App\Commands\GitHub;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class Health extends SafeBaseCommand
{
    protected $group = 'GitHub';
    protected $name = 'github:health';
    protected $description = 'Show a lightweight repository and remote health summary.';

    public function run(array $params)
    {
        try {
            $this->parseParams($params);
            CLI::write(service('git')->health());

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            log_message('error', '[spark:git:health] ' . $e->getMessage());
            CLI::error($e->getMessage());

            return EXIT_ERROR;
        }
    }
}

