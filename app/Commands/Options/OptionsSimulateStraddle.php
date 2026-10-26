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
    protected $usage       = 'options:simulate-straddle [ticker] [--contracts=1] [--call=0.95] [--put=0.95] [--price=142.50] [--dte=5]';
    protected $arguments   = [
        'ticker' => 'Ticker symbol (default: NVDA)',
    ];
    protected $options     = [
        '--contracts' => 'Number of contract pairs (default: 1)',
        '--call'      => 'Call debit per contract (default: 0.95)',
        '--put'       => 'Put debit per contract (default: 0.95)',
        '--price'     => 'Underlying stock price (default: 142.50)',
        '--dte'       => 'Days to expiry (default: 5)',
    ];

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);

        $ticker = strtoupper((string) ($args[0] ?? $flags['ticker'] ?? 'NVDA'));
        $contracts = isset($flags['contracts']) ? max(1, (int) $flags['contracts']) : 1;
        $callDebit = isset($flags['call']) ? (float) $flags['call'] : 0.95;
        $putDebit = isset($flags['put']) ? (float) $flags['put'] : 0.95;
        $stockPrice = isset($flags['price']) ? (float) $flags['price'] : 142.50;
        $dte = isset($flags['dte']) ? (int) $flags['dte'] : 5;

        CLI::write('=========================================================================', 'cyan');
        CLI::write('         MyMI Weekly Options Momentum Strategy · Paper Position          ', 'green');
        CLI::write('=========================================================================', 'cyan');

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

        CLI::write(sprintf('Successfully created position #%d (%s):', $result['position_id'], $result['trade_uuid']), 'green');
        CLI::write(sprintf(' - Underlier: %s at $%.2f | Strike: $%.0f', $result['ticker'], $stockPrice, $result['strike']), 'white');
        CLI::write(sprintf(' - Strategy: Long Straddle (1 Call @ $%.2f + 1 Put @ $%.2f)', $callDebit, $putDebit), 'white');
        CLI::write(sprintf(' - Expiry: %s (%d DTE)', $result['expiry'], $dte), 'white');
        CLI::write(sprintf(' - Total Debit: $%.2f ($%.2f / pair x %d pair%s)', $result['total_debit'], $result['combined_debit'], $contracts, $contracts > 1 ? 's' : ''), 'yellow');
        CLI::write(sprintf(' - Target Net Profit: +$%.2f', $result['target_profit']), 'yellow');
        CLI::write(sprintf(' - Required Combined Exit: $%.2f / pair ($%.2f total position value)', $result['target_exit_per_pair'], $result['target_exit_per_pair'] * 100 * $contracts), 'yellow');
        CLI::newLine();
        CLI::write('Position is now active and will be monitored by `php spark options:monitor`.', 'green');

        return EXIT_SUCCESS;
    }
}
