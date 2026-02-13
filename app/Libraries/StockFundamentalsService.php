<?php

declare(strict_types=1);

namespace App\Libraries;

use App\Models\StockFundamentalsModel;
use Config\Services;

class StockFundamentalsService
{
    protected string $alphaKey;
    protected \CodeIgniter\HTTP\CURLRequest $http;
    protected \CodeIgniter\Cache\CacheInterface $cache;
    protected StockFundamentalsModel $model;

    public function __construct()
    {
        $this->alphaKey = (string) env('alphaVantage.apiKey', env('ALPHAVANTAGE_API_KEY', ''));
        $this->http = Services::curlrequest();
        $this->cache = cache();
        $this->model = new StockFundamentalsModel();
    }

    public function analyze(string $symbol): array
    {
        $symbol = strtoupper(trim($symbol));
        if ($symbol === '') {
            return ['status' => 'error', 'message' => 'Ticker is required.'];
        }

        $cacheKey = $this->cacheKey($symbol);
        $cached = $this->cache->get($cacheKey);
        if (is_array($cached) && ! empty($cached)) {
            return array_merge(['source' => 'cache'], $cached);
        }

        $edgar = $this->fetchEdgarFinancials($symbol);
        $alpha = $this->fetchAlphaVantageFundamentals($symbol);

        $normalized = $this->normalizeData($edgar, $alpha);
        $score = $this->calculateScore($normalized);

        $payload = [
            'symbol' => $symbol,
            'normalized' => $normalized,
            'score' => $score,
            'fetched_at' => date('c'),
        ];

        $this->cache->save($cacheKey, $payload, 86400);
        $this->saveToDb($symbol, $payload);

        return array_merge(['source' => 'fresh'], $payload);
    }

    public function fetchEdgarFinancials($symbol): array
    {
        $ticker = strtolower((string) $symbol);
        $headers = [
            'User-Agent' => 'MyMI Wallet (admin@mymiwallet.com)',
            'Accept' => 'application/json',
        ];

        try {
            $mapResponse = $this->http->get('https://www.sec.gov/files/company_tickers.json', ['headers' => $headers]);
            $tickerMap = json_decode((string) $mapResponse->getBody(), true, 512, JSON_THROW_ON_ERROR);
        } catch (\Throwable $e) {
            log_message('error', 'StockFundamentalsService SEC ticker map failed: {msg}', ['msg' => $e->getMessage()]);
            return [];
        }

        $cik = null;
        foreach ($tickerMap as $entry) {
            if (strtolower((string) ($entry['ticker'] ?? '')) === $ticker) {
                $cik = str_pad((string) ($entry['cik_str'] ?? ''), 10, '0', STR_PAD_LEFT);
                break;
            }
        }

        if (! $cik) {
            return [];
        }

        try {
            $factsResponse = $this->http->get("https://data.sec.gov/api/xbrl/companyfacts/CIK{$cik}.json", ['headers' => $headers]);
            return json_decode((string) $factsResponse->getBody(), true, 512, JSON_THROW_ON_ERROR);
        } catch (\Throwable $e) {
            log_message('error', 'StockFundamentalsService SEC facts failed: {msg}', ['msg' => $e->getMessage()]);
            return [];
        }
    }

    public function fetchAlphaVantageFundamentals($symbol): array
    {
        if ($this->alphaKey === '') {
            return [];
        }

        $functions = ['OVERVIEW', 'INCOME_STATEMENT', 'BALANCE_SHEET', 'CASH_FLOW', 'EARNINGS'];
        $results = [];

        foreach ($functions as $function) {
            $url = 'https://www.alphavantage.co/query?' . http_build_query([
                'function' => $function,
                'symbol' => $symbol,
                'apikey' => $this->alphaKey,
            ]);

            try {
                $response = $this->http->get($url);
                $results[$function] = json_decode((string) $response->getBody(), true, 512, JSON_THROW_ON_ERROR);
            } catch (\Throwable $e) {
                log_message('warning', 'StockFundamentalsService AlphaVantage {function} failed: {msg}', [
                    'function' => $function,
                    'msg' => $e->getMessage(),
                ]);
                $results[$function] = [];
            }
        }

        return $results;
    }

    public function normalizeData($edgarJson, $avJson): array
    {
        $usGaap = $edgarJson['facts']['us-gaap'] ?? [];

        $latestEdgar = static function (array $item): ?float {
            $units = $item['units'] ?? [];
            foreach (['USD', 'shares'] as $unit) {
                if (! isset($units[$unit]) || ! is_array($units[$unit])) {
                    continue;
                }
                $rows = $units[$unit];
                usort($rows, static fn ($a, $b) => strcmp((string) ($b['end'] ?? ''), (string) ($a['end'] ?? '')));
                foreach ($rows as $row) {
                    if (isset($row['val']) && is_numeric($row['val'])) {
                        return (float) $row['val'];
                    }
                }
            }
            return null;
        };

        $overview = $avJson['OVERVIEW'] ?? [];
        $balance = $avJson['BALANCE_SHEET']['annualReports'][0] ?? [];
        $cashFlow = $avJson['CASH_FLOW']['annualReports'][0] ?? [];

        $revenue = $latestEdgar($usGaap['Revenues'] ?? []) ?? (float) ($overview['RevenueTTM'] ?? 0);
        $assets = $latestEdgar($usGaap['Assets'] ?? []) ?? (float) ($balance['totalAssets'] ?? 0);
        $liabilities = $latestEdgar($usGaap['Liabilities'] ?? []) ?? (float) ($balance['totalLiabilities'] ?? 0);
        $shares = $latestEdgar($usGaap['CommonStockSharesOutstanding'] ?? []) ?? (float) ($overview['SharesOutstanding'] ?? 0);
        $operatingCashFlow = $latestEdgar($usGaap['NetCashProvidedByUsedInOperatingActivities'] ?? [])
            ?? (float) ($cashFlow['operatingCashflow'] ?? 0);

        $netIncome = $latestEdgar($usGaap['NetIncomeLoss'] ?? []) ?? (float) ($overview['EPS'] ?? 0) * max($shares, 0);

        $toMillions = static fn (?float $value): ?float => $value === null ? null : round($value / 1_000_000, 2);

        return [
            'revenue_m' => $toMillions($revenue),
            'net_income_m' => $toMillions($netIncome),
            'assets_m' => $toMillions($assets),
            'liabilities_m' => $toMillions($liabilities),
            'shares_outstanding_m' => $toMillions($shares),
            'operating_cash_flow_m' => $toMillions($operatingCashFlow),
            'pe_ratio' => isset($overview['PERatio']) ? (float) $overview['PERatio'] : null,
            'eps' => isset($overview['EPS']) ? (float) $overview['EPS'] : null,
            'profit_margin' => isset($overview['ProfitMargin']) ? (float) $overview['ProfitMargin'] : null,
            'return_on_equity' => isset($overview['ReturnOnEquityTTM']) ? (float) $overview['ReturnOnEquityTTM'] : null,
            'quick_ratio' => isset($overview['QuickRatio']) ? (float) $overview['QuickRatio'] : null,
            'source_completeness' => [
                'edgar_available' => ! empty($edgarJson),
                'alphavantage_available' => ! empty($avJson),
            ],
        ];
    }

    public function calculateScore($normalizedData): array
    {
        $pe = (float) ($normalizedData['pe_ratio'] ?? 0);
        $profitability = (float) ($normalizedData['profit_margin'] ?? 0);
        $liquidity = (float) ($normalizedData['quick_ratio'] ?? 0);
        $cashFlow = (float) ($normalizedData['operating_cash_flow_m'] ?? 0);

        $assets = (float) ($normalizedData['assets_m'] ?? 0);
        $liabilities = (float) ($normalizedData['liabilities_m'] ?? 0);
        $equity = max($assets - $liabilities, 0.01);
        $growth = (float) ($normalizedData['net_income_m'] ?? 0) / $equity;

        $scorePe = $pe > 0 ? max(0, min(100, 100 - ($pe * 2))) : 50;
        $scoreGrowth = max(0, min(100, ($growth + 0.2) * 250));
        $scoreProfit = max(0, min(100, $profitability * 1000));
        $scoreLiquidity = max(0, min(100, $liquidity * 50));
        $scoreCashFlow = $cashFlow > 0 ? max(0, min(100, 50 + ($cashFlow / 10))) : 25;

        $weighted =
            ($scorePe * 0.20) +
            ($scoreGrowth * 0.20) +
            ($scoreProfit * 0.20) +
            ($scoreLiquidity * 0.20) +
            ($scoreCashFlow * 0.20);

        $finalScore = (int) round($weighted);
        $grade = match (true) {
            $finalScore >= 90 => 'A+',
            $finalScore >= 80 => 'A',
            $finalScore >= 70 => 'B',
            $finalScore >= 60 => 'C',
            $finalScore >= 50 => 'D',
            default => 'F',
        };

        return [
            'score' => $finalScore,
            'grade' => $grade,
            'weights' => [
                'pe_ratio' => 0.20,
                'growth' => 0.20,
                'profitability' => 0.20,
                'liquidity' => 0.20,
                'cash_flow' => 0.20,
            ],
        ];
    }

    public function cacheKey($symbol): string
    {
        return 'fundamental_' . strtoupper((string) $symbol);
    }

    public function saveToDb($symbol, $data): void
    {
        $ticker = strtoupper((string) $symbol);
        $existing = $this->model->where('ticker', $ticker)->first();
        $now = date('Y-m-d H:i:s');
        $payload = [
            'ticker' => $ticker,
            'data' => json_encode($data, JSON_UNESCAPED_SLASHES),
            'last_refreshed' => $now,
        ];

        if ($existing) {
            $this->model->update((int) $existing['id'], $payload);
            return;
        }

        $payload['created_on'] = $now;
        $this->model->insert($payload);
    }
}
