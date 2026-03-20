<?php

declare(strict_types=1);

namespace App\Commands\Git;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class Commit extends SafeBaseCommand
{
    protected $group = 'Git';
    protected $name = 'git:commit';
    protected $description = 'Stage tracked changes and create a git commit.';
    protected $usage = 'git:commit "message"';
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

