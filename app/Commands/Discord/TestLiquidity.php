<?php namespace App\Commands\Discord;

use App\Libraries\MyMIDiscord;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class TestLiquidity extends SafeBaseCommand
{
    protected $group       = 'Discord';
    protected $name        = 'discord:test-liquidity';
    protected $description = 'Send a test Liquidity Scan alert to alerts.liquidity channel';
    protected $arguments   = [
        'ticker' => 'Optional ticker symbol (default TEST).',
    ];
    protected $options     = [
        '--dry-run' => 'Preview actions without sending Discord alerts',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:discord:test-liquidity] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        if ($dryRun) {
            CLI::write('Dry-run enabled. No Discord alert will be sent.', 'yellow');
            log_message('info', '[spark:discord:test-liquidity] Completed', ['dry_run' => true]);
            return EXIT_SUCCESS;
        }

        $discord = new MyMIDiscord();

        $ok = $discord->notifyLiquidityScan([
            'ticker'       => $args[0] ?? 'TEST',
            'scanner'      => '0001 - EMA Liquidity 1Hr',
            'timeframe'    => '1h',
            'price'        => 12.34,
            'triggered_at' => date('Y-m-d H:i:s'),
            'notes'        => 'Manual test liquidity scan from CLI',
        ]);

        if ($ok) {
            CLI::write('Liquidity scan event dispatched. Now run your queue worker.', 'green');
            log_message('info', '[spark:discord:test-liquidity] Completed', ['queued' => true]);
            return EXIT_SUCCESS;
        } else {
            CLI::write('Failed to dispatch liquidity scan event.', 'red');
            log_message('error', '[spark:discord:test-liquidity] Failed', ['reason' => 'Discord enqueue failed']);
            return EXIT_ERROR;
        }
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
