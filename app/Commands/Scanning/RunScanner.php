<?php

declare(strict_types=1);

namespace App\Commands\Scanning;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class RunScanner extends SafeBaseCommand
{
    protected $group = 'scanning';
    protected $name = 'scanning:run';
    protected $description = 'Run MyMI liquidity + momentum scanner';
    protected $usage = 'scanning:run --timeframe=1min --source=watchlist --limit=200';
    protected $options = [
        '--timeframe' => 'Timeframe (1min,5min,15min,1day).',
        '--source' => 'Symbol source (watchlist|universe|manual).',
        '--limit' => 'Max symbol count.',
    ];

    public function run(array $params)
    {
        $timeframe = CLI::getOption('timeframe') ?? '1day';
        $source = CLI::getOption('source') ?? 'universe';
        $limit = (int) (CLI::getOption('limit') ?? 200);

        $result = service('scannerService')->run([
            'timeframe' => $timeframe,
            'source' => $source,
            'limit' => $limit,
        ]);

        CLI::write('Scanner completed: ' . json_encode($result, JSON_UNESCAPED_SLASHES));

        return EXIT_SUCCESS;
    }
}
