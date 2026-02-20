<?php

namespace App\Commands\App;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class APIList extends SafeBaseCommand
{
    protected $group = 'App';
    protected $name = 'app:api:list';
    protected $description = 'List complete APIs from latest audit report.';

    public function run(array $params)
    {
        $file = ROOTPATH . 'docs/APIs/api_audit_latest.md';

        if (!file_exists($file)) {
            CLI::write('No audit report found.', 'red');
            return;
        }

        CLI::write('📋 Listing Complete APIs:', 'yellow');

        $lines = file($file);
        foreach ($lines as $line) {
            if (str_starts_with(trim($line), '- GET') ||
                str_starts_with(trim($line), '- POST') ||
                str_starts_with(trim($line), '- PUT') ||
                str_starts_with(trim($line), '- DELETE')) {
                CLI::write(trim($line), 'green');
            }
        }
    }
}
