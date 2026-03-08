<?php

namespace App\Commands\Research;

use App\Commands\SafeBaseCommand;
use Config\Database;

class MarketDataCompile extends SafeBaseCommand
{
    protected $group = 'research';
    protected $name = 'research:data:compile';

    public function run(array $params)
    {

        $db = Database::connect();

        $tickers = [
            'SPY',
            'QQQ',
            'DXY',
            'VIX',
            'BTC',
            'ETH'
        ];

        foreach ($tickers as $symbol) {

            $url = "https://query1.finance.yahoo.com/v7/finance/quote?symbols=$symbol";

            $data = json_decode(file_get_contents($url), true);

            $price = $data['quoteResponse']['result'][0]['regularMarketPrice'] ?? null;

            $db->table('bf_market_snapshots')->insert([
                'symbol' => $symbol,
                'price' => $price,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

    }
}