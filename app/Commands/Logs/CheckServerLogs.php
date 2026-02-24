<?php

namespace App\Commands\Logs;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class CheckServerLogs extends SafeBaseCommand
{
    protected $group = 'App - Logging';
    protected $name = 'app:logs:check-server';
    protected $description = 'Check external Apache/Nginx error.log';

    public function run(array $params)
    {
        $path = rtrim($_SERVER['HOME'] ?? getenv('HOME'), '/') . '/logs/mymiwallet.com/https/error.log';

        if (!file_exists($path)) {
            CLI::error('Server error.log not found.');
            return;
        }

        $lines = array_slice(file($path), -50);

        foreach ($lines as $line) {
            CLI::write(trim($line));
        }
    }
}