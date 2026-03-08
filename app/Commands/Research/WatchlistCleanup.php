<?php

namespace App\Commands\Research;

use App\Commands\SafeBaseCommand;

class WatchlistCleanup extends SafeBaseCommand
{
    protected $group = 'research';
    protected $name = 'research:alerts:cleanup';

    public function run(array $params)
    {

        $dir = WRITEPATH . 'watchlists';
        $archive = WRITEPATH . 'watchlists_archive';

        $files = glob($dir . '/*.csv');

        foreach ($files as $file) {

            if (filemtime($file) < strtotime('-30 days')) {

                rename($file, $archive . '/' . basename($file));
            }
        }

    }
}