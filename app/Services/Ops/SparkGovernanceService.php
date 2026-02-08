<?php

declare(strict_types=1);

namespace App\Services\Ops;

use App\Commands\Ops\Support\CommandRulesScanner;

class SparkGovernanceService
{
    /**
     * @return array<string, mixed>
     */
    public function audit(): array
    {
        $runner = new SparkRunnerService();
        $auditResult = $runner->run('ops:commands:audit');

        $scanner = new CommandRulesScanner();
        $violations = $scanner->scan(ROOTPATH . 'app/Commands');

        return [
            'violations' => $violations,
            'ran_audit' => $auditResult['ok'] ?? false,
            'audit_command' => $auditResult,
        ];
    }
}
