<?php

namespace App\Commands\Codex;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Libraries\AuditState;

class Status extends SafeBaseCommand
{
    protected $group = 'Codex';
    protected $name = 'codex:status';
    protected $description = 'Show audit status';

    public function run(array $params)
    {
        $state = new AuditState();
        $data = $state->get();

        CLI::write('Status: ' . $data['status']);
        CLI::write('Progress: ' . $data['current_index'] . '/' . $data['total_files']);
        CLI::write('High Issues: ' . $data['high_issues']);
        CLI::write('Medium Issues: ' . $data['medium_issues']);
        CLI::write('Last File: ' . $data['last_file']);
    }
}
