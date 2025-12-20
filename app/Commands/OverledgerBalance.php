<?php namespace App\Commands;

use App\Libraries\MyMIExchange;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class OverledgerBalance extends BaseCommand
{
    protected $group       = 'Overledger';
    protected $name        = 'overledger:balance';
    protected $description = 'Fetch a balance from Overledger.';
    protected $usage       = 'overledger:balance --network=network --address=address [--asset=asset]';

    public function run(array $params)
    {
        $network = CLI::getOption('network') ?? CLI::prompt('Network');
        $address = CLI::getOption('address') ?? CLI::prompt('Address');
        $asset   = CLI::getOption('asset');

        if (!$network || !$address) {
            CLI::error('Network and address are required.');
            return;
        }

        $exchange  = new MyMIExchange();
        $requestId = 'cli_' . bin2hex(random_bytes(6));
        $result    = $exchange->overledgerGetBalance($network, $address, $asset, ['request_id' => $requestId]);

        CLI::write("Request ID: {$requestId}", 'yellow');
        CLI::write('Status Code: ' . ($result['status'] ?? 'n/a'));
        CLI::write('Latency: ' . ($result['latency_ms'] ?? 'n/a') . ' ms');

        if (!empty($result['success'])) {
            CLI::write('Balance', 'green');
            CLI::write(json_encode($result['data'] ?? [], JSON_PRETTY_PRINT));
        } else {
            CLI::error('Balance fetch failed: ' . ($result['error'] ?? 'unknown error'));
        }
    }
}
