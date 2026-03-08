<?php

namespace App\Commands\Research;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class WeeklyMarketReport extends SafeBaseCommand
{
    protected $group = 'research';
    protected $name = 'research:reports:weekly';
    protected $description = 'Generate weekly market research report';

    public function run(array $params)
    {
        $db = Database::connect();

        $news = $db->table('bf_financial_news')
            ->where('created_at >=', date('Y-m-d', strtotime('-7 days')))
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResultArray();

        $alerts = $db->table('bf_investment_trade_alerts')
            ->where('created_at >=', date('Y-m-d', strtotime('-7 days')))
            ->get()
            ->getResultArray();

        $report = "# Weekly Market Research\n\n";
        $report .= "Week Ending: " . date('Y-m-d') . "\n\n";

        $report .= "## Key News\n\n";

        foreach ($news as $item) {
            $report .= "- {$item['title']}\n";
        }

        $report .= "\n## Trade Alerts This Week\n\n";

        foreach ($alerts as $alert) {
            $report .= "- {$alert['symbol']} ({$alert['source']})\n";
        }

        $dir = ROOTPATH . "docs/reports/";

        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        file_put_contents(
            $dir . "weekly_market_report.md",
            $report
        );

        CLI::write("Weekly report generated.", "green");
    }
}