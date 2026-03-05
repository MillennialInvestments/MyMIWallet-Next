<?php

declare(strict_types=1);

namespace App\Commands\Repo;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

final class Health extends SafeBaseCommand
{
    protected $group       = 'DevOps';
    protected $name        = 'repo:health';
    protected $description = 'Runs lightweight repository health checks for GTM readiness.';
    protected $usage       = 'repo:health';

    public function run(array $params)
    {
        $checks = [];

        $checks[] = $this->checkPath('writable', is_dir(WRITEPATH));
        $checks[] = $this->checkPath('writable/logs', is_dir(WRITEPATH . 'logs'));
        $checks[] = $this->checkPath('docs/launch/launch_readiness_audit.md', file_exists(ROOTPATH . 'docs/launch/launch_readiness_audit.md'));
        $checks[] = $this->checkPath('docs/routes/routes.md', file_exists(ROOTPATH . 'docs/routes/routes.md'));

        // migrations presence (basic)
        $migDir = ROOTPATH . 'app/Database/Migrations';
        $checks[] = $this->checkPath('app/Database/Migrations', is_dir($migDir));
        if (is_dir($migDir)) {
            $files = glob($migDir . '/*.php') ?: [];
            $checks[] = $this->checkPath('migrations count >= 1', count($files) >= 1);
        }

        $fail = false;
        CLI::write('Repo Health', 'yellow');
        foreach ($checks as $c) {
            CLI::write(($c['ok'] ? 'PASS' : 'FAIL') . ' - ' . $c['label'], $c['ok'] ? 'green' : 'red');
            if (!$c['ok']) {
                $fail = true;
            }
        }

        if ($fail) {
            CLI::write("\nOne or more checks failed. Fix these before GTM smoke runs.", 'red');
            return;
        }

        CLI::write("\nAll checks passed.", 'green');
    }

    private function checkPath(string $label, bool $ok): array
    {
        return ['label' => $label, 'ok' => $ok];
    }
}