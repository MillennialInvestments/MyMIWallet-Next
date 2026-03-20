<?php

declare(strict_types=1);

namespace App\Commands\Git;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class Status extends SafeBaseCommand
{
    protected $group = 'GitHub';
    protected $name = 'github:status';
    protected $description = 'Show repository branch and working tree status.';

    public function run(array $params)
    {
        try {
            $this->parseParams($params);
            CLI::write(service('git')->status());

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            log_message('error', '[spark:git:status] ' . $e->getMessage());
            CLI::error($e->getMessage());

            return EXIT_ERROR;
        }
    }
}

