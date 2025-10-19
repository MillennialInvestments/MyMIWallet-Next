<?php

declare(strict_types=1);

namespace App\Services;

use App\Libraries\MyMIAlerts;
use App\Libraries\Queue\Queue;
use App\Models\AlertsModel;
use App\Models\MarketingModel;
use Throwable;

class AlphaVantagePipelineService
{
    public function __construct(
        private AlertsModel $alertsModel = new AlertsModel(),
        private MarketingModel $marketingModel = new MarketingModel(),
        private ?MyMIAlerts $alertsLibrary = null
    ) {
        $this->alertsLibrary = $this->alertsLibrary ?? new MyMIAlerts();
    }

    /**
     * Queue the pipeline for async processing.
     */
    public function enqueue(array $symbols = [], ?string $apiKey = null): int
    {
        $symbols = $symbols ?: $this->collectDefaultSymbols();

        return Queue::push('alpha_vantage', [
            'type' => 'alpha_vantage.pipeline',
            'data' => [
                'symbols' => $symbols,
                'apiKey'  => $apiKey,
            ],
        ]);
    }

    /**
     * Execute the pipeline synchronously. Used by queue workers.
     */
    public function run(array $symbols = [], ?string $apiKey = null): array
    {
        $symbols = $symbols ?: $this->collectDefaultSymbols();
        $apiKey  = $apiKey ?? getenv('ALPHA_VANTAGE_KEY') ?: '';

        $results = [
            'processed' => [],
            'errors'    => [],
        ];

        foreach ($symbols as $symbol) {
            try {
                $this->processSymbol($symbol, $apiKey);
                $results['processed'][] = $symbol;
            } catch (Throwable $e) {
                $results['errors'][$symbol] = $e->getMessage();
                log_message('error', 'AlphaVantage pipeline failed for {symbol}: {message}', [
                    'symbol'  => $symbol,
                    'message' => $e->getMessage(),
                ]);
            }
        }

        return $results;
    }

    private function collectDefaultSymbols(): array
    {
        $rows = $this->alertsModel->getTopWatchlistSymbols();
        $symbols = [];
        foreach ($rows as $row) {
            $candidate = is_array($row) ? ($row['symbol'] ?? null) : $row;
            if (! $candidate) {
                continue;
            }
            $symbols[] = strtoupper((string) $candidate);
        }

        return array_values(array_unique($symbols));
    }

    private function processSymbol(string $symbol, string $apiKey): void
    {
        // Fresh news for alerts
        $newsItems = $this->alertsLibrary->fetchAlphaVantageNews($symbol);
        foreach ($newsItems as $news) {
            $this->marketingModel->insertNewsContent($news, $symbol);
        }

        if ($apiKey === '') {
            log_message('notice', 'AlphaVantage pipeline skipped fundamentals for {symbol}: missing API key', [
                'symbol' => $symbol,
            ]);
            return;
        }

        // Fundamentals fetch (cache or warm upstream)
        $this->fetchEndpoint('OVERVIEW', $symbol, $apiKey);
        $this->fetchEndpoint('INCOME_STATEMENT', $symbol, $apiKey);
    }

    private function fetchEndpoint(string $function, string $symbol, string $apiKey): void
    {
        $url = sprintf(
            'https://www.alphavantage.co/query?function=%s&symbol=%s&apikey=%s',
            urlencode($function),
            urlencode($symbol),
            urlencode($apiKey)
        );

        $context = stream_context_create([
            'http' => [
                'timeout' => 15,
            ],
        ]);

        $response = @file_get_contents($url, false, $context);
        if ($response === false) {
            throw new \RuntimeException(sprintf('Failed to fetch %s for %s', $function, $symbol));
        }

        // Basic validation to ensure JSON payload is sane.
        $json = json_decode($response, true);
        if (! is_array($json)) {
            throw new \RuntimeException(sprintf('Invalid JSON for %s on %s', $function, $symbol));
        }

        log_message('debug', 'AlphaVantage pipeline fetched {fn} for {symbol}', [
            'fn'     => $function,
            'symbol' => $symbol,
        ]);
    }
}
