<?php

declare(strict_types=1);

namespace App\Commands\Investments;

use App\Commands\SafeBaseCommand;
use App\Libraries\Investment\StockResearchService;
use App\Models\AlertsModel;
use CodeIgniter\CLI\CLI;

class BuildStockReport extends SafeBaseCommand
{
    protected $group = 'investments';
    protected $name = 'investments:stock-report';
    protected $description = 'Build and store a technical/fundamental/news report for an existing trade alert symbol.';

    public function run(array $params)
    {
        [$args] = $this->parseParams($params);

        $symbol = strtoupper(trim($args[0] ?? ''));
        if ($symbol === '') {
            CLI::error('Missing symbol. Example: php spark investments:stock-report AAPL --print');
            return EXIT_ERROR;
        }

        $alertsModel = new AlertsModel();
        $existing = $alertsModel->getTradeAlertByTicker($symbol);

        if (! $existing) {
            CLI::error("No existing bf_investment_trade_alerts record found for {$symbol}.");
            CLI::write('Create/import the alert first, then run this command again.', 'yellow');
            return EXIT_ERROR;
        }

        CLI::write("Building stock report for {$symbol}...", 'yellow');

        $service = new StockResearchService();
        $report = $service->buildReport($symbol);

        if (($report['_error'] ?? null) !== null) {
            CLI::error('Report generation failed: ' . (string) $report['_error']);
            return EXIT_ERROR;
        }

        if (empty($report['symbol'])) {
            CLI::error('Report generation failed: no symbol returned.');
            return EXIT_ERROR;
        }

        $saved = $alertsModel->updateTradeAlertResearchByTicker($symbol, $report);
        if (! $saved) {
            CLI::error("Failed to update bf_investment_trade_alerts for {$symbol}.");
            return EXIT_ERROR;
        }

        CLI::write("Report saved successfully for {$symbol}.", 'green');

        if (CLI::getOption('print')) {
            CLI::newLine();
            CLI::write($report['summary_text'] ?? 'No summary generated.');
        }

        return EXIT_SUCCESS;
    }
}
