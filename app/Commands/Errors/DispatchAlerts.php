<?php

namespace App\Commands\Errors;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Services\Observability\ErrorAlertService;

class DispatchAlerts extends SafeBaseCommand
{
    protected $group = 'App - Logging';
    protected $name = 'app:errors:dispatch';
    protected $description = 'Evaluate alert rules and send notifications.';
    protected $usage = 'errors:alerts:dispatch';

    public function run(array $params)
    {
        $svc = new ErrorAlertService();
        $out = $svc->dispatch();
        CLI::write('Alert dispatch complete', 'green');
        CLI::write(json_encode($out, JSON_PRETTY_PRINT));
    }
}