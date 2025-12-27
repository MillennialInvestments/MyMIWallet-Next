<?php namespace App\Commands;

use App\Libraries\MyMIExchange;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class OverledgerHealth extends BaseCommand
{
    protected $group       = 'Overledger';
    protected $name        = 'overledger:health';
    protected $description = 'Perform an Overledger health check via API connector.';

    public function run(array $params)
    {
        $exchange   = new MyMIExchange();
        $requestId  = 'cli_' . bin2hex(random_bytes(6));
        $result     = $exchange->overledgerHealthCheck(['request_id' => $requestId]);

        CLI::write("Request ID: {$requestId}", 'yellow');
        CLI::write('Environment: ' . ($result['data']['environment'] ?? 'n/a'));
        CLI::write('Status Code: ' . ($result['status'] ?? 'n/a'));
        CLI::write('Latency: ' . ($result['latency_ms'] ?? 'n/a') . ' ms');

        if (!empty($result['success'])) {
            CLI::write('Health: success', 'green');
            CLI::write(json_encode($result['data'] ?? [], JSON_PRETTY_PRINT));
        } else {
            CLI::error('Health check failed: ' . ($result['error'] ?? 'unknown error'));
        }
    }
}
