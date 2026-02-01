<?php

declare(strict_types=1);

namespace App\Services\Ops;

use App\Commands\Ops\Support\CommandRulesScanner;
use CodeIgniter\CLI\Commands;

class SparkGovernanceService
{
    /**
     * @return array{
     *   violations: list<array<string, mixed>>,
     *   ran_audit: bool
     * }
     */
    public function audit(): array
    {
        Commands::run('ops:commands:audit');

        $scanner = new CommandRulesScanner();
        $violations = $scanner->scan(ROOTPATH . 'app/Commands');

        return [
            'violations' => $violations,
            'ran_audit' => true,
        ];
    }
}
