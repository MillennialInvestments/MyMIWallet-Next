<?php

namespace App\Commands\Codex;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Libraries\AuditState;

class Gate extends SafeBaseCommand
{
    protected $group = 'Codex';
    protected $name = 'codex:gate';
    protected $description = 'Fail build if high severity issues exist';

    public function run(array $params)
    {
        $state = new AuditState();
        $data = $state->get();

        if ($data['high_issues'] > 0) {
            CLI::error('Build failed. High severity issues detected.');
            exit(1);
        }

        CLI::write('Gate passed. No high severity issues.');
    }
}
