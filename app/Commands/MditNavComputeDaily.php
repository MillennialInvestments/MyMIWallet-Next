<?php

namespace App\Commands;

use App\Services\MDIT\MditNavService;
use CodeIgniter\CLI\CLI;

class MditNavComputeDaily extends SafeBaseCommand
{
    protected $group = 'mdit';
    protected $name = 'mdit:nav:compute_daily';
    protected $description = 'Compute and snapshot the daily MDIT NAV.';
    protected $usage = 'mdit:nav:compute_daily [cash_value] [equities_value]';
    protected $arguments = [
        'cash_value' => 'Optional cash value override (default 0).',
        'equities_value' => 'Optional equities value override (default 0).',
    ];

    public function run(array $params)
    {
        $db = \Config\Database::connect();
        $requiredTables = ['bf_mdit_token_ledger', 'bf_mdit_nav_snapshots'];
        foreach ($requiredTables as $table) {
            if (! $db->tableExists($table)) {
                CLI::error(sprintf('Required table `%s` is missing. Run `php spark migrate` before `mdit:nav:compute_daily`.', $table));
                return EXIT_ERROR;
            }
        }

        [$args] = $this->parseParams($params);
        $cashValue = isset($args[0]) ? (float) $args[0] : 0.0;
        $equitiesValue = isset($args[1]) ? (float) $args[1] : 0.0;
        $asOfDate = date('Y-m-d');

        $service = new MditNavService();
        $snapshot = $service->computeDailyNav($asOfDate, $cashValue, $equitiesValue);

        CLI::write('MDIT NAV snapshot created for ' . $asOfDate, 'green');
        CLI::write('NAV per unit: ' . $snapshot['nav_per_unit']);

        return EXIT_SUCCESS;
    }
}
