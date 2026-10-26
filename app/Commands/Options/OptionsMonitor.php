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

class OptionsMonitor extends SafeBaseCommand
{
    protected $group       = 'Options';
    protected $name        = 'options:monitor';
    protected $description = 'Evaluate open options momentum positions, track combined P&L, and emit exit/warning alerts.';
    protected $usage       = 'options:monitor [--dry-run]';
    protected $options     = [
        '--dry-run' => 'Preview evaluations without persisting status or alerts',
    ];

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        CLI::write('=========================================================================', 'cyan');
        CLI::write('        MyMI Options Position & Trade Momentum Manager · Live Monitor     ', 'green');
        CLI::write('=========================================================================', 'cyan');

        $positionModel = new OptionsPositionModel();
        $legModel = new OptionsPositionLegModel();
        $historyModel = new OptionsPositionHistoryModel();
        $exitAlertModel = new OptionsExitAlertModel();

        $manager = new OptionsMomentumManager($positionModel, $legModel, $historyModel, $exitAlertModel);
        $summary = $manager->evaluateActivePositions();

        CLI::write(sprintf('Evaluated %d active positions | %d alerts generated', $summary['active_count'], $summary['alerts_generated']), 'yellow');
        CLI::newLine();

        if (empty($summary['positions'])) {
            CLI::write('No active positions to monitor. Use `php spark options:simulate-straddle NVDA` to open a paper test.', 'white');
            return EXIT_SUCCESS;
        }

        $headers = ['Pos ID', 'Ticker', 'Strategy', 'Combined Bid', 'Unrealized P&L', 'Peak P&L', 'Status', 'Alerts'];
        $tableRows = [];

        foreach ($summary['positions'] as $p) {
            $tableRows[] = [
                $p['position_id'],
                $p['ticker'],
                $p['strategy'],
                sprintf('$%.2f', $p['combined_bid']),
                sprintf('%s$%.2f', $p['unrealized_pnl'] >= 0 ? '+' : '', $p['unrealized_pnl']),
                sprintf('+$%.2f', $p['peak_pnl']),
                $p['status'],
                count($p['alerts']) > 0 ? sprintf('%d ALERT(S)', count($p['alerts'])) : 'None',
            ];
        }

        CLI::table($tableRows, $headers);
        CLI::newLine();

        return EXIT_SUCCESS;
    }
}
