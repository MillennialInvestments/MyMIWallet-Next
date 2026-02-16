<?php

namespace App\Commands\Audit;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class All extends BaseCommand
{
    protected $group = 'Audit';
    protected $name = 'audit:all';
    protected $description = 'Full system visibility audit';

    public function run(array $params)
    {
        CLI::write('=== CI DEBUG ===');
        CLI::write(defined('CI_DEBUG') ? (CI_DEBUG ? 'ON' : 'OFF') : 'Undefined');

        CLI::write("\n=== Writable Check ===");
        CLI::write(is_writable(WRITEPATH) ? 'Writable OK' : 'Writable NOT writable');

        CLI::write("\n=== PHP Memory Limit ===");
        CLI::write(ini_get('memory_limit'));

        CLI::write("\n=== OPCache ===");
        CLI::write(function_exists('opcache_get_status') ? 'Enabled' : 'Not enabled');

        CLI::write("\n=== DB Connection ===");
        try {
            $db = \Config\Database::connect();
            $db->query('SELECT 1');
            CLI::write('DB OK');
        } catch (\Throwable $e) {
            CLI::error('DB ERROR: ' . $e->getMessage());
        }

        CLI::write("\n=== Redis Check ===");
        if (class_exists(\Redis::class)) {
            try {
                $redis = new \Redis();
                $redis->connect('127.0.0.1', 6379);
                CLI::write('Redis OK');
            } catch (\Throwable $e) {
                CLI::error('Redis ERROR');
            }
        } else {
            CLI::write('Redis extension not installed');
        }

        CLI::write("\n=== Apache Error Log Tail ===");
        $errorLog = '/home/mymiteam/logs/mymiwallet.com/https/error.log';

        if (file_exists($errorLog)) {
            $lines = array_slice(file($errorLog), -10);
            foreach ($lines as $line) {
                CLI::write(trim($line));
            }
        } else {
            CLI::write('Server error log not found');
        }

        CLI::write("\n=== PHPUnit ===");
        exec(ROOTPATH . 'vendor/bin/phpunit 2>&1', $output);
        foreach ($output as $line) {
            CLI::write($line);
        }

        CLI::write("\n=== AUDIT COMPLETE ===");
    }
}
