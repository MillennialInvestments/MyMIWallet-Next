<?php

declare(strict_types=1);

namespace App\Commands\Research;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

abstract class BaseResearchTaskCommand extends SafeBaseCommand
{

    protected $taskKey = '';

    public function run(array $params)
    {

        if ($this->taskKey === '') {

            CLI::error('No taskKey defined for ' . static::class);
            return;
        }

        CLI::write("Running research task: {$this->taskKey}", 'yellow');

        try {

            $service = service('researchService');

            $result = $service->runTask($this->taskKey);

            CLI::write('Task complete.', 'green');

            CLI::write(json_encode($result, JSON_PRETTY_PRINT));

        } catch (\Throwable $e) {

            CLI::error($e->getMessage());

            log_message('error', 'Research command failed: {error}', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
}
