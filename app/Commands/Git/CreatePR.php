<?php

declare(strict_types=1);

namespace App\Commands\Git;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class CreatePR extends SafeBaseCommand
{
    protected $group = 'Git';
    protected $name = 'git:pr:create';
    protected $description = 'Create a GitHub pull request for the current branch.';
    protected $usage = 'git:pr:create "Title" [body]';
    protected $arguments = [
        'title' => 'Pull request title. Defaults to Auto PR.',
        'body' => 'Optional pull request body.',
    ];

    public function run(array $params)
    {
        try {
            [$args] = $this->parseParams($params);
            $title = $args[0] ?? 'Auto PR';
            $body = $args[1] ?? null;

            $git = service('git');
            $github = service('github');

            $branch = $git->currentBranch();
            $pr = $github->createPullRequest($title, $branch, $body);

            CLI::write('PR Created: ' . ($pr['html_url'] ?? '[missing-url]'));

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            log_message('error', '[spark:git:pr:create] ' . $e->getMessage());
            CLI::error($e->getMessage());

            return EXIT_ERROR;
        }
    }
}

