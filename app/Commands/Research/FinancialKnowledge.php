<?php

namespace App\Commands\Research;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class FinancialKnowledge extends SafeBaseCommand
{
    protected $group = 'research';
    protected $name = 'research:knowledge:build';
    protected $description = 'Build financial knowledge graph';

    public function run(array $params)
    {

        $db = Database::connect();

        $tickers = $db->table('bf_investment_trade_alerts')
            ->select('symbol')
            ->distinct()
            ->get()
            ->getResultArray();

        $graph = [];

        foreach ($tickers as $ticker) {

            $symbol = $ticker['symbol'];

            $news = $db->table('bf_financial_news')
                ->like('title', $symbol)
                ->limit(5)
                ->get()
                ->getResultArray();

            $alerts = $db->table('bf_investment_trade_alerts')
                ->where('symbol', $symbol)
                ->limit(10)
                ->get()
                ->getResultArray();

            $prices = $db->table('bf_market_snapshots')
                ->where('symbol', $symbol)
                ->orderBy('created_at', 'DESC')
                ->limit(5)
                ->get()
                ->getResultArray();

            $graph[$symbol] = [
                'news' => $news,
                'alerts' => $alerts,
                'price_data' => $prices,
                'economic_indicators' => [],
                'sentiment' => null
            ];
        }

        file_put_contents(
            ROOTPATH . 'docs/_financial_knowledge_graph.json',
            json_encode($graph, JSON_PRETTY_PRINT)
        );

        CLI::write("Financial knowledge graph generated.", "green");
    }
}