<?php

declare(strict_types=1);

namespace App\Commands\GitHub;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class Commit extends SafeBaseCommand
{
    protected $group = 'GitHub';
    protected $name = 'github:commit';
    protected $description = 'Stage tracked changes and create a git commit.';
    protected $usage = 'github:commit "message"';
    protected $arguments = [
        'message' => 'Commit message. Defaults to "auto commit" when omitted.',
    ];

    public function run(array $params)
    {
        try {
            [$args] = $this->parseParams($params);
            $message = $args[0] ?? 'auto commit';

            CLI::write(service('git')->commit($message));

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            log_message('error', '[spark:git:commit] ' . $e->getMessage());
            CLI::error($e->getMessage());

            return EXIT_ERROR;
        }
    }
}

