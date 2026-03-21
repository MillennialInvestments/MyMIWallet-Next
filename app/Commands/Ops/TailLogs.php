<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class TailLogs extends SafeBaseCommand
{
    protected $group = 'Ops-Terminal';
    protected $name = 'ops:tail';
    protected $description = 'Tail CI logs or any file';

    public function run(array $params)
    {
        $file = $params[0] ?? WRITEPATH . 'logs/log-' . date('Y-m-d') . '.php';

        CLI::write("📡 Tailing: {$file}\n");

        passthru("tail -f {$file}");
    }
}