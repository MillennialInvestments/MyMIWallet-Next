<?php

namespace App\Commands\Research;

use App\Commands\SafeBaseCommand;
use Config\Database;

class ThinkOrSwimImport extends SafeBaseCommand
{
    protected $group = 'research';
    protected $name = 'research:alerts:watchlist-import';

    public function run(array $params)
    {

        $db = Database::connect();

        $dir = WRITEPATH . 'watchlists';

        $files = glob($dir . '/*.csv');

        foreach ($files as $file) {

            $exists = $db->table('bf_watchlist_imports')
                ->where('file_name', basename($file))
                ->countAllResults();

            if ($exists) {
                continue;
            }

            $rows = array_map('str_getcsv', file($file));

            foreach ($rows as $row) {

                $symbol = $row[0] ?? null;

                if (!$symbol) {
                    continue;
                }

                $db->table('bf_investment_trade_alerts')->insert([
                    'ticker' => $symbol,
                    'source' => 'thinkorswim',
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }

            $db->table('bf_watchlist_imports')->insert([
                'file_name' => basename($file),
                'processed_at' => date('Y-m-d H:i:s')
            ]);
        }

    }
}