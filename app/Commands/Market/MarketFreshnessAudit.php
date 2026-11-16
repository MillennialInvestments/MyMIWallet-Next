<?php

declare(strict_types=1);

namespace App\Commands\Market;

use App\Commands\SafeBaseCommand;
use App\Services\MarketDataFreshnessService;
use CodeIgniter\CLI\CLI;

class MarketFreshnessAudit extends SafeBaseCommand
{
    protected $group = 'market';
    protected $name = 'market:freshness:audit';
    protected $description = 'Audit market research data freshness, quote snapshots, and API readiness.';
    protected $usage = 'market:freshness:audit [--json] [--symbols=SPY,QQQ,...] [--max-age=3600]';
    protected $options = [
        '--json'    => 'Emit raw JSON summary',
        '--symbols' => 'Comma-separated ticker symbols to audit (default: SPY,QQQ,BTC,ETH,SOL,DXY,VIX)',
        '--max-age' => 'Max allowed quote age in seconds (default: 3600)',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $json = isset($flags['json']) || $this->optBool($flags, 'json');

        $symbolsParam = $this->optString($flags, 'symbols');
        $symbols = $symbolsParam !== ''
            ? array_filter(array_map('trim', explode(',', $symbolsParam)))
            : MarketDataFreshnessService::DEFAULT_SYMBOLS;

        $maxAge = $this->optInt($flags, 'max-age', MarketDataFreshnessService::DEFAULT_QUOTE_MAX_AGE_SECONDS);
        if ($maxAge <= 0) {
            $maxAge = MarketDataFreshnessService::DEFAULT_QUOTE_MAX_AGE_SECONDS;
        }

        $service = new MarketDataFreshnessService();
        $summary = $service->getSystemDataFreshnessSummary($symbols, $maxAge);

        if ($json) {
            CLI::write(json_encode($summary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            return $summary['system_status'] === 'CRITICAL' ? EXIT_ERROR : EXIT_SUCCESS;
        }

        CLI::write('====================================================', 'yellow');
        CLI::write('         MYMI MARKET DATA FRESHNESS AUDIT           ', 'yellow');
        CLI::write('====================================================', 'yellow');

        $statusColor = match ($summary['system_status']) {
            'HEALTHY'  => 'green',
            'DEGRADED' => 'yellow',
            default    => 'red',
        };
        CLI::write("System Status: {$summary['system_status']}", $statusColor);
        CLI::write("Evaluated At:  {$summary['evaluated_at']}");
        CLI::newLine();

        // 1. Quotes Summary
        $q = $summary['quotes'];
        CLI::write("Quotes Freshness (Total: {$q['total_symbols']}, Fresh: {$q['fresh_count']}, Stale: {$q['stale_count']}, Missing: {$q['missing_count']}):", 'white');
        foreach ($q['symbols'] as $sym => $data) {
            $symColor = match ($data['status']) {
                'FRESH' => 'green',
                'STALE' => 'yellow',
                default => 'red',
            };
            $priceStr = $data['price'] !== null ? number_format((float) $data['price'], 2) : 'N/A';
            $ageStr = $data['age_seconds'] !== null ? $data['age_seconds'] . 's' : 'N/A';
            CLI::write(sprintf("  [%s] %-6s Price: %-10s Age: %-8s Source: %s", $data['status'], $sym, $priceStr, $ageStr, $data['source'] ?? 'none'), $symColor);
        }
        CLI::newLine();

        // 2. News Feeds
        $n = $summary['news'];
        CLI::write('News & Research Feeds:', 'white');
        foreach ($n['feeds'] as $table => $feed) {
            $feedColor = match ($feed['status']) {
                'FRESH' => 'green',
                'STALE' => 'yellow',
                default => 'red',
            };
            $latest = $feed['latest_timestamp'] ?? 'None';
            CLI::write(sprintf("  [%s] %-34s Latest: %s", $feed['status'], $table, $latest), $feedColor);
        }
        CLI::newLine();

        // 3. API Key Readiness
        CLI::write('Upstream Market API Credentials Readiness:', 'white');
        foreach ($summary['api_keys'] as $provider => $keyInfo) {
            $keyColor = $keyInfo['configured'] ? 'green' : 'yellow';
            $statusStr = $keyInfo['configured'] ? 'CONFIGURED (' . $keyInfo['source'] . ')' : 'MISSING';
            CLI::write(sprintf("  %-15s %s", $provider . ':', $statusStr), $keyColor);
        }

        CLI::newLine();
        return $summary['system_status'] === 'CRITICAL' ? EXIT_ERROR : EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
