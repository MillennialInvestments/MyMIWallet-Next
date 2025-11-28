<?php namespace App\Commands;

use App\Libraries\MyMIDiscord;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class DiscordTestLiquidity extends BaseCommand
{
    protected $group       = 'Discord';
    protected $name        = 'discord:test-liquidity';
    protected $description = 'Send a test Liquidity Scan alert to alerts.liquidity channel';

    public function run(array $params)
    {
        $discord = new MyMIDiscord();

        $ok = $discord->notifyLiquidityScan([
            'ticker'       => $params[0] ?? 'TEST',
            'scanner'      => '0001 - EMA Liquidity 1Hr',
            'timeframe'    => '1h',
            'price'        => 12.34,
            'triggered_at' => date('Y-m-d H:i:s'),
            'notes'        => 'Manual test liquidity scan from CLI',
        ]);

        if ($ok) {
            CLI::write('Liquidity scan event dispatched. Now run your queue worker.', 'green');
        } else {
            CLI::write('Failed to dispatch liquidity scan event.', 'red');
        }
    }
}