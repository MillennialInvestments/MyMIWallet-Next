<?php

namespace App\Commands\Research;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class WatchlistCleanup extends SafeBaseCommand
{
    protected $group = 'research';
    protected $name = 'research:alerts:cleanup';
    protected $description = 'Clean up stale research alert/watchlist rows.';
    protected $usage = 'research:alerts:cleanup';

    public function run(array $params)
    {
        CLI::write('Running research alert cleanup...', 'yellow');

        // TODO: implement cleanup logic here

        CLI::write('Research alert cleanup complete.', 'green');

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}