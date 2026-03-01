<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class DriftScan extends SafeBaseCommand
{
    protected $group = 'Ops';
    protected $name = 'ops:drift:scan';
    protected $description = 'Scan critical services for production drift.';

    private array $criticalFiles = [
        'app/Services/WalletService.php',
        'app/Services/MyMIMarketing.php',
        'app/Modules/APIs/Controllers/ManagementController.php',
        'app/Modules/APIs/Controllers/AlertsController.php',
    ];

    public function run(array $params)
    {
        CLI::write("Scanning for production drift...", 'yellow');

        foreach ($this->criticalFiles as $file) {
            if (! is_file(ROOTPATH . $file)) {
                CLI::error("Missing critical file: {$file}");
                continue;
            }

            $hash = hash_file('sha256', ROOTPATH . $file);
            CLI::write("{$file} => {$hash}");
        }

        CLI::write("Drift scan complete.", 'green');
    }
}