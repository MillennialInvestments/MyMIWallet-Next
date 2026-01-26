<?php

namespace App\Commands\Health;

use App\Commands\SafeBaseCommand;
use App\Services\Triage\CommandRunner;
use App\Services\Triage\HostingModeDetector;
use CodeIgniter\CLI\CLI;

class Services extends SafeBaseCommand
{
    protected string $group = 'health';
    protected string $name = 'health:services';
    protected $description = 'Detect web server + PHP handler status without systemctl.';

    public function run(array $params)
    {
        log_message('info', '[spark:health:services] Started', ['params' => $params]);
        CLI::write('Running service health checks...', 'yellow');

        $runner = new CommandRunner();
        $detector = new HostingModeDetector($runner);
        $status = $detector->detect();

        CLI::newLine();
        CLI::write('web_server=' . ($status['web_server'] ?? 'unknown'));
        CLI::write('php_mode=' . ($status['php_mode'] ?? 'unknown'));
        CLI::write('php_workers=' . (string) ($status['php_workers'] ?? 0));
        CLI::write('fastcgi_upstream=' . ($status['fastcgi_upstream'] ?? 'n/a'));
        CLI::write('ports_listening=' . implode(',', $status['ports'] ?? []));
        CLI::write('hosting_mode=' . ($status['hosting_mode'] ?? 'UNKNOWN'));
        CLI::write('overall=' . ($status['overall'] ?? 'WARN'));

        log_message('info', '[spark:health:services] Completed', [
            'web_server' => $status['web_server'] ?? 'unknown',
            'php_mode' => $status['php_mode'] ?? 'unknown',
            'php_workers' => $status['php_workers'] ?? 0,
            'fastcgi_upstream' => $status['fastcgi_upstream'] ?? null,
            'ports' => $status['ports'] ?? [],
            'hosting_mode' => $status['hosting_mode'] ?? 'UNKNOWN',
            'overall' => $status['overall'] ?? 'WARN',
        ]);

        return ($status['overall'] ?? 'WARN') === 'PASS' ? EXIT_SUCCESS : EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }

}
