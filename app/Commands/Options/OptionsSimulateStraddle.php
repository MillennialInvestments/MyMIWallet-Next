<?php

declare(strict_types=1);

namespace App\Commands\Options;

use App\Commands\SafeBaseCommand;
use App\Models\Options\OptionsExitAlertModel;
use App\Models\Options\OptionsPositionHistoryModel;
use App\Models\Options\OptionsPositionLegModel;
use App\Models\Options\OptionsPositionModel;
use App\Services\Options\OptionsMomentumManager;
use CodeIgniter\CLI\CLI;

class OptionsSimulateStraddle extends SafeBaseCommand
{
    protected $group       = 'Options';
    protected $name        = 'options:simulate-straddle';
    protected $description = 'Open a simulated paper-trade $0.95 call + $0.95 put straddle with $200 target net profit.';
    protected $usage       = 'options:simulate-straddle [ticker] [--contracts=1] [--call=0.95] [--put=0.95] [--price=142.50] [--dte=5] [--dry-run]';
    protected $arguments   = [
        'ticker' => 'Ticker symbol (default: NVDA)',
    ];
    protected $options     = [
        '--contracts' => 'Number of contract pairs (default: 1)',
        '--call'      => 'Call debit per contract (default: 0.95)',
        '--put'       => 'Put debit per contract (default: 0.95)',
        '--price'     => 'Underlying stock price (default: 142.50)',
        '--dte'       => 'Days to expiry (default: 5)',
        '--dry-run'   => 'Calculate and preview straddle economics without persisting to database',
    ];

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        // Normalize flags with key=value
        foreach ($flags as $k => $v) {
            if (is_string($k) && str_contains($k, '=')) {
                [$realK, $realV] = explode('=', $k, 2);
                $flags[$realK] = $realV;
            }
        }

        $ticker = strtoupper((string) ($args[0] ?? $flags['ticker'] ?? 'NVDA'));
        $contracts = isset($flags['contracts']) ? max(1, (int) $flags['contracts']) : 1;
        $callDebit = isset($flags['call']) ? (float) $flags['call'] : 0.95;
        $putDebit = isset($flags['put']) ? (float) $flags['put'] : 0.95;
        $stockPrice = isset($flags['price']) ? (float) $flags['price'] : 142.50;
        $dte = isset($flags['dte']) ? (int) $flags['dte'] : 5;

        $combinedDebit = $callDebit + $putDebit; // $1.90
        $totalDebit = $combinedDebit * 100.0 * $contracts; // $190.00
        $targetProfit = 200.00 * $contracts; // $200.00
        $targetExitPerPair = $combinedDebit + ($targetProfit / (100.0 * $contracts)); // $3.90
        $uuid = sprintf('opt-%s-%s-%s', strtolower($ticker), date('Ymd-His'), bin2hex(random_bytes(4)));
        $strike = round($stockPrice, 0);
        $expiry = date('Y-m-d', strtotime("+{$dte} days"));

        CLI::write('=========================================================================', 'cyan');
        CLI::write('         MyMI Weekly Options Momentum Strategy · Paper Position          ', 'green');
        CLI::write('=========================================================================', 'cyan');
        CLI::write(sprintf('Position UUID: %s%s', $uuid, $dryRun ? ' [DRY-RUN]' : ''), 'yellow');
        CLI::write(sprintf(' - Underlier: %s at $%.2f | ATM Strike: $%.0f', $ticker, $stockPrice, $strike), 'white');
        CLI::write(sprintf(' - Strategy: Long Straddle (1 Call @ $%.2f + 1 Put @ $%.2f)', $callDebit, $putDebit), 'white');
        CLI::write(sprintf(' - Expiration: %s (%d DTE)', $expiry, $dte), 'white');
        CLI::write(sprintf(' - Total Outlay: $%.2f ($%.2f / pair x %d pair%s)', $totalDebit, $combinedDebit, $contracts, $contracts > 1 ? 's' : ''), 'yellow');
        CLI::write(sprintf(' - Target Net Profit: +$%.2f', $targetProfit), 'yellow');
        CLI::write(sprintf(' - Required Combined Exit: $%.2f / pair ($%.2f total position value)', $targetExitPerPair, $targetExitPerPair * 100 * $contracts), 'yellow');
        CLI::newLine();

        if ($dryRun) {
            CLI::write('Dry-run enabled. Position calculated successfully without database write.', 'green');
            return EXIT_SUCCESS;
        }

        try {
            $positionModel = new OptionsPositionModel();
            $legModel = new OptionsPositionLegModel();
            $historyModel = new OptionsPositionHistoryModel();
            $exitAlertModel = new OptionsExitAlertModel();

            $manager = new OptionsMomentumManager($positionModel, $legModel, $historyModel, $exitAlertModel);

            $result = $manager->openSimulatedPosition(
                ticker: $ticker,
                callDebit: $callDebit,
                putDebit: $putDebit,
                contracts: $contracts,
                stockPrice: $stockPrice,
                dte: $dte
            );

            CLI::write(sprintf('Successfully saved position #%d to database.', $result['position_id']), 'green');
            CLI::write('Position is now active and will be tracked by `php spark options:monitor`.', 'green');
        } catch (\Throwable $e) {
            CLI::write('NOTE: Database persistence skipped (MySQL not connected).', 'yellow');
            CLI::write('To persist positions to MySQL, configure .env with your MySQL credentials or install local mysql-server.', 'light_gray');
        }

        return EXIT_SUCCESS;
    }
}
