<?php

declare(strict_types=1);

namespace App\Libraries\Investment;

use CodeIgniter\HTTP\CURLRequest;
use Config\Services;

class StockResearchService
{
    protected CURLRequest $client;
    protected string $apiKey;
    protected string $baseUrl = 'https://www.alphavantage.co/query';

    public function __construct()
    {
        $this->client = Services::curlrequest([
            'timeout' => 30,
            'http_errors' => false,
        ]);

        $this->apiKey = (string) (config('APISettings')->alphaVantageApiKey ?? env('ALPHAVANTAGE_API_KEY') ?? '');
    }

    protected function request(array $params): array
    {
        if ($this->apiKey === '') {
            return ['_error' => 'Missing Alpha Vantage API key'];
        }

        $params['apikey'] = $this->apiKey;

        try {
            $response = $this->client->get($this->baseUrl, ['query' => $params]);
            $body     = (string) $response->getBody();
            $json     = json_decode($body, true);

            if (! is_array($json)) {
                return ['_error' => 'Invalid JSON response', '_raw' => $body];
            }

            if (isset($json['Note'])) {
                return ['_error' => 'API throttle/note', '_note' => $json['Note']];
            }

            if (isset($json['Information'])) {
                return ['_error' => 'API information', '_info' => $json['Information']];
            }

            if (isset($json['Error Message'])) {
                return ['_error' => 'API error', '_message' => $json['Error Message']];
            }

            return $json;
        } catch (\Throwable $e) {
            log_message('error', 'StockResearchService request failed: {message}', [
                'message' => $e->getMessage(),
            ]);

            return ['_error' => $e->getMessage()];
        }
    }

    public function buildReport(string $symbol): array
    {
        $symbol = strtoupper(trim($symbol));

        $overview = $this->request(['function' => 'OVERVIEW', 'symbol' => $symbol]);
        $quote    = $this->request(['function' => 'GLOBAL_QUOTE', 'symbol' => $symbol]);
        $daily    = $this->request(['function' => 'TIME_SERIES_DAILY_ADJUSTED', 'symbol' => $symbol, 'outputsize' => 'compact']);

        $income   = $this->request(['function' => 'INCOME_STATEMENT', 'symbol' => $symbol]);
        $balance  = $this->request(['function' => 'BALANCE_SHEET', 'symbol' => $symbol]);
        $cashFlow = $this->request(['function' => 'CASH_FLOW', 'symbol' => $symbol]);
        $earnings = $this->request(['function' => 'EARNINGS', 'symbol' => $symbol]);
        $news     = $this->request(['function' => 'NEWS_SENTIMENT', 'tickers' => $symbol, 'limit' => 10]);

        $sma20 = $this->request([
            'function' => 'SMA',
            'symbol' => $symbol,
            'interval' => 'daily',
            'time_period' => 20,
            'series_type' => 'close',
        ]);
        $sma50 = $this->request([
            'function' => 'SMA',
            'symbol' => $symbol,
            'interval' => 'daily',
            'time_period' => 50,
            'series_type' => 'close',
        ]);
        $rsi14 = $this->request([
            'function' => 'RSI',
            'symbol' => $symbol,
            'interval' => 'daily',
            'time_period' => 14,
            'series_type' => 'close',
        ]);
        $macd = $this->request([
            'function' => 'MACD',
            'symbol' => $symbol,
            'interval' => 'daily',
            'series_type' => 'close',
        ]);

        return $this->normalizeReport(
            $symbol,
            $overview,
            $quote,
            $daily,
            $income,
            $balance,
            $cashFlow,
            $earnings,
            $news,
            $sma20,
            $sma50,
            $rsi14,
            $macd
        );
    }

    protected function latestIndicatorValue(array $payload, string $seriesKey): ?array
    {
        if (! isset($payload[$seriesKey]) || ! is_array($payload[$seriesKey])) {
            return null;
        }

        $rows = $payload[$seriesKey];
        krsort($rows);
        $date = array_key_first($rows);

        return [
            'date' => $date,
            'values' => $date !== null ? ($rows[$date] ?? null) : null,
        ];
    }

    protected function normalizeReport(
        string $symbol,
        array $overview,
        array $quote,
        array $daily,
        array $income,
        array $balance,
        array $cashFlow,
        array $earnings,
        array $news,
        array $sma20,
        array $sma50,
        array $rsi14,
        array $macd
    ): array {
        $quoteData = $quote['Global Quote'] ?? [];
        $dailyData = $daily['Time Series (Daily)'] ?? [];

        if (is_array($dailyData)) {
            krsort($dailyData);
        }

        $latestDate = is_array($dailyData) ? array_key_first($dailyData) : null;
        $latestBar  = $latestDate ? ($dailyData[$latestDate] ?? []) : [];

        $latestSma20 = $this->latestIndicatorValue($sma20, 'Technical Analysis: SMA');
        $latestSma50 = $this->latestIndicatorValue($sma50, 'Technical Analysis: SMA');
        $latestRsi14 = $this->latestIndicatorValue($rsi14, 'Technical Analysis: RSI');
        $latestMacd  = $this->latestIndicatorValue($macd, 'Technical Analysis: MACD');

        $annualIncome   = $income['annualReports'][0] ?? [];
        $annualBalance  = $balance['annualReports'][0] ?? [];
        $annualCashFlow = $cashFlow['annualReports'][0] ?? [];
        $quarterlyEPS   = $earnings['quarterlyEarnings'][0] ?? [];

        $newsItems = [];
        if (! empty($news['feed']) && is_array($news['feed'])) {
            foreach (array_slice($news['feed'], 0, 5) as $item) {
                $newsItems[] = [
                    'title' => $item['title'] ?? null,
                    'summary' => $item['summary'] ?? null,
                    'source' => $item['source'] ?? null,
                    'time_published' => $item['time_published'] ?? null,
                    'overall_sentiment_score' => $item['overall_sentiment_score'] ?? null,
                    'overall_sentiment_label' => $item['overall_sentiment_label'] ?? null,
                    'url' => $item['url'] ?? null,
                ];
            }
        }

        $technicalBias = 'Neutral';
        $price = (float) ($quoteData['05. price'] ?? $latestBar['4. close'] ?? 0);
        $rsi = (float) ($latestRsi14['values']['RSI'] ?? 0);
        $s20 = (float) ($latestSma20['values']['SMA'] ?? 0);
        $s50 = (float) ($latestSma50['values']['SMA'] ?? 0);
        $macdValue = (float) ($latestMacd['values']['MACD'] ?? 0);
        $macdSignal = (float) ($latestMacd['values']['MACD_Signal'] ?? 0);

        if ($price > 0 && $s20 > 0 && $s50 > 0) {
            if ($price > $s20 && $s20 > $s50 && $rsi >= 55 && $macdValue >= $macdSignal) {
                $technicalBias = 'Bullish';
            } elseif ($price < $s20 && $s20 < $s50 && $rsi <= 45 && $macdValue <= $macdSignal) {
                $technicalBias = 'Bearish';
            }
        }

        $report = [
            'symbol' => $symbol,
            'generated_at' => date('Y-m-d H:i:s'),
            'source' => 'AlphaVantage',
            'company' => [
                'name' => $overview['Name'] ?? null,
                'exchange' => $overview['Exchange'] ?? null,
                'sector' => $overview['Sector'] ?? null,
                'industry' => $overview['Industry'] ?? null,
                'market_cap' => $overview['MarketCapitalization'] ?? null,
                'pe_ratio' => $overview['PERatio'] ?? null,
                'peg_ratio' => $overview['PEGRatio'] ?? null,
                'dividend_yield' => $overview['DividendYield'] ?? null,
                'eps' => $overview['EPS'] ?? null,
                'beta' => $overview['Beta'] ?? null,
                'profit_margin' => $overview['ProfitMargin'] ?? null,
                'analyst_target_price' => $overview['AnalystTargetPrice'] ?? null,
                'description' => $overview['Description'] ?? null,
            ],
            'market' => [
                'price' => $quoteData['05. price'] ?? $latestBar['4. close'] ?? null,
                'open' => $quoteData['02. open'] ?? $latestBar['1. open'] ?? null,
                'high' => $quoteData['03. high'] ?? $latestBar['2. high'] ?? null,
                'low' => $quoteData['04. low'] ?? $latestBar['3. low'] ?? null,
                'volume' => $quoteData['06. volume'] ?? $latestBar['6. volume'] ?? null,
                'latest_trading_day' => $quoteData['07. latest trading day'] ?? $latestDate,
                'previous_close' => $quoteData['08. previous close'] ?? null,
                'change' => $quoteData['09. change'] ?? null,
                'change_percent' => $quoteData['10. change percent'] ?? null,
            ],
            'technical' => [
                'sma20' => $latestSma20,
                'sma50' => $latestSma50,
                'rsi14' => $latestRsi14,
                'macd' => $latestMacd,
                'bias' => $technicalBias,
            ],
            'fundamental_snapshot' => [
                'revenue_ttm' => $overview['RevenueTTM'] ?? null,
                'gross_profit_ttm' => $overview['GrossProfitTTM'] ?? null,
                'ebitda' => $overview['EBITDA'] ?? null,
                'operating_margin_ttm' => $overview['OperatingMarginTTM'] ?? null,
                'return_on_assets_ttm' => $overview['ReturnOnAssetsTTM'] ?? null,
                'return_on_equity_ttm' => $overview['ReturnOnEquityTTM'] ?? null,
            ],
            'financials' => [
                'latest_annual_income_statement' => $annualIncome,
                'latest_annual_balance_sheet' => $annualBalance,
                'latest_annual_cash_flow' => $annualCashFlow,
                'latest_quarterly_earnings' => $quarterlyEPS,
            ],
            'news' => $newsItems,
        ];

        $report['summary_text'] = $this->buildSummaryText($report);

        return $report;
    }

    protected function buildSummaryText(array $report): string
    {
        $company = $report['company'] ?? [];
        $market = $report['market'] ?? [];
        $technical = $report['technical'] ?? [];
        $news = $report['news'] ?? [];

        $lines = [];
        $lines[] = 'Stock Research Report';
        $lines[] = 'Symbol: ' . ($report['symbol'] ?? 'N/A');
        $lines[] = 'Generated: ' . ($report['generated_at'] ?? 'N/A');
        $lines[] = '';
        $lines[] = 'Company';
        $lines[] = '- Name: ' . ($company['name'] ?? 'N/A');
        $lines[] = '- Exchange: ' . ($company['exchange'] ?? 'N/A');
        $lines[] = '- Sector: ' . ($company['sector'] ?? 'N/A');
        $lines[] = '- Industry: ' . ($company['industry'] ?? 'N/A');
        $lines[] = '- Market Cap: ' . ($company['market_cap'] ?? 'N/A');
        $lines[] = '- PE Ratio: ' . ($company['pe_ratio'] ?? 'N/A');
        $lines[] = '- EPS: ' . ($company['eps'] ?? 'N/A');
        $lines[] = '';
        $lines[] = 'Market';
        $lines[] = '- Price: ' . ($market['price'] ?? 'N/A');
        $lines[] = '- Open: ' . ($market['open'] ?? 'N/A');
        $lines[] = '- High: ' . ($market['high'] ?? 'N/A');
        $lines[] = '- Low: ' . ($market['low'] ?? 'N/A');
        $lines[] = '- Volume: ' . ($market['volume'] ?? 'N/A');
        $lines[] = '- Change: ' . ($market['change'] ?? 'N/A') . ' (' . ($market['change_percent'] ?? 'N/A') . ')';
        $lines[] = '';
        $lines[] = 'Technical';
        $lines[] = '- Bias: ' . ($technical['bias'] ?? 'Neutral');
        $lines[] = '- RSI14: ' . ($technical['rsi14']['values']['RSI'] ?? 'N/A');
        $lines[] = '- SMA20: ' . ($technical['sma20']['values']['SMA'] ?? 'N/A');
        $lines[] = '- SMA50: ' . ($technical['sma50']['values']['SMA'] ?? 'N/A');
        $lines[] = '- MACD: ' . ($technical['macd']['values']['MACD'] ?? 'N/A');
        $lines[] = '- MACD Signal: ' . ($technical['macd']['values']['MACD_Signal'] ?? 'N/A');
        $lines[] = '';

        if (! empty($news)) {
            $lines[] = 'Recent News';
            foreach ($news as $item) {
                $lines[] = '- ' . ($item['title'] ?? 'Untitled') . ' [' . ($item['overall_sentiment_label'] ?? 'N/A') . ']';
            }
        }

        return implode(PHP_EOL, $lines);
    }
}
