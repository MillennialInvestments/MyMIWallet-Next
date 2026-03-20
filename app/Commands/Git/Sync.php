<?php

declare(strict_types=1);

namespace App\Commands\Git;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class Sync extends SafeBaseCommand
{
    protected $group = 'Git';
    protected $name = 'git:sync';
    protected $description = 'Commit pending changes when needed, then pull and push the current branch.';
    protected $usage = 'git:sync [message]';
    protected $arguments = [
        'message' => 'Commit message to use when changes exist. Defaults to auto sync.',
    ];

    public function run(array $params)
    {
        try {
            [$args] = $this->parseParams($params);
            $message = $args[0] ?? 'auto sync';

            CLI::write(service('git')->sync($message));

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            log_message('error', '[spark:git:sync] ' . $e->getMessage());
            CLI::error($e->getMessage());

            return EXIT_ERROR;
        }
    }
}

