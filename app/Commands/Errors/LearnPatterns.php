<?php

namespace App\Commands\Errors;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Services\Observability\ErrorPatternLearnerService;

class LearnPatterns extends SafeBaseCommand
{
    protected $group = 'App - Logging';
    protected $name = 'app:errors:learn';
    protected $description = 'AI-assisted learning of consolidated error patterns into bf_error_patterns.';
    protected $usage = 'app:errors:learn [--limit=50]';

    public function run(array $params)
    {
        $limit = 50;
        foreach ($params as $p) {
            if (str_starts_with($p, '--limit=')) $limit = (int) substr($p, 8);
        }

        $svc = new ErrorPatternLearnerService();
        $stats = $svc->run($limit);

        CLI::write('Pattern learning complete', 'green');
        CLI::write(json_encode($stats, JSON_PRETTY_PRINT));
    }
}