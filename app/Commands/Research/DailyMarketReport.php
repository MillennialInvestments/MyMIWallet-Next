<?php

namespace App\Commands\Research;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class DailyMarketReport extends SafeBaseCommand
{
    protected $group = 'research';
    protected $name = 'research:reports:daily';
    protected $description = 'Generate daily market research report';

    public function run(array $params)
    {
        $db = Database::connect();

        $news = $db->table('bf_financial_news')
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->get()
            ->getResultArray();

        $alerts = $db->table('bf_investment_trade_alerts')
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->get()
            ->getResultArray();

        $snapshots = $db->table('bf_market_snapshots')
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->get()
            ->getResultArray();

        $report = "# Daily Market Report\n\n";
        $report .= "Generated: " . date('Y-m-d H:i:s') . "\n\n";

        $report .= "## Market Snapshot\n\n";

        foreach ($snapshots as $row) {
            $report .= "- {$row['symbol']} : {$row['price']}\n";
        }

        $report .= "\n## Top Financial News\n\n";

        foreach ($news as $item) {
            $report .= "- [{$item['title']}]({$item['url']})\n";
        }

        $report .= "\n## Recent Trade Alerts\n\n";

        foreach ($alerts as $alert) {
            $report .= "- {$alert['symbol']} ({$alert['source']})\n";
        }

        $dir = ROOTPATH . "docs/reports/";

        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        file_put_contents(
            $dir . "daily_market_report.md",
            $report
        );

        CLI::write("Daily report generated.", "green");
    }
}