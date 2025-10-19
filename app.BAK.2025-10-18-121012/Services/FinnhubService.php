<?php

namespace App\Services;

use App\Config\{APIs, SiteSettings};
use App\Libraries\{BaseLoader};
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;

class FinnhubService
{

    protected $client;
    protected $apiKey;
    protected $APIs;
    protected $siteSettings;

    public function __construct()
    {
        $this->siteSettings = config('SiteSettings');
        $this->APIs = config('APIs');
        $this->apiKey = $this->APIs->finnhubAPIKey; // Replace with actual Finnhub API key

        // Initialize the custom Finnhub client
        $this->client = new Client([
            'base_uri' => 'https://finnhub.io/api/v1/',
            'headers' => [
                'X-Finnhub-Token' => $this->apiKey,
            ],
        ]);
    }

    /**
     * Send GET request to Finnhub API.
     */
    private function get(string $endpoint, array $query = []): array
    {
        try {
            $response = $this->client->get($endpoint, ['query' => $query]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    // Stock-related functions

    public function getStockCandles(string $symbol, string $resolution, int $from, int $to): array
    {
        return $this->get('stock/candle', [
            'symbol' => $symbol,
            'resolution' => $resolution,
            'from' => $from,
            'to' => $to,
        ]);
    }

    public function getAggregateIndicator(string $symbol, string $resolution): array
    {
        return $this->get('scan/technical-indicator', [
            'symbol' => $symbol,
            'resolution' => $resolution,
        ]);
    }

    public function getBasicFinancials(string $symbol, string $metric = 'all'): array
    {
        return $this->get('stock/metric', [
            'symbol' => $symbol,
            'metric' => $metric,
        ]);
    }

    public function getCompanyEarnings(string $symbol, int $limit = 5): array
    {
        return $this->get('stock/earnings', [
            'symbol' => $symbol,
            'limit' => $limit,
        ]);
    }

    public function getEarningsEstimates(string $symbol, string $frequency = 'quarterly'): array
    {
        return $this->get('stock/eps-estimates', [
            'symbol' => $symbol,
            'freq' => $frequency,
        ]);
    }

    public function getExecutives(string $symbol): array
    {
        return $this->get('stock/executive', [
            'symbol' => $symbol,
        ]);
    }

    public function getCompanyNews(string $symbol, string $from, string $to): array
    {
        return $this->get('company-news', [
            'symbol' => $symbol,
            'from' => $from,
            'to' => $to,
        ]);
    }

    public function getPeers(string $symbol): array
    {
        return $this->get('stock/peers', [
            'symbol' => $symbol,
        ]);
    }

    public function getCompanyProfile(string $symbol): array
    {
        return $this->get('stock/profile2', [
            'symbol' => $symbol,
        ]);
    }

    public function getRevenueEstimates(string $symbol, string $frequency = 'quarterly'): array
    {
        return $this->get('stock/revenue-estimates', [
            'symbol' => $symbol,
            'freq' => $frequency,
        ]);
    }

    // Additional Financial Data

    public function getFinancials(string $symbol, string $statement = 'bs', string $frequency = 'annual'): array
    {
        return $this->get('stock/financials', [
            'symbol' => $symbol,
            'statement' => $statement,
            'freq' => $frequency,
        ]);
    }

    public function getFinancialsReported(string $symbol, string $frequency = 'annual'): array
    {
        return $this->get('stock/financials-reported', [
            'symbol' => $symbol,
            'frequency' => $frequency,
        ]);
    }

    public function getDividends(string $symbol, string $from, string $to): array
    {
        return $this->get('stock/dividend', [
            'symbol' => $symbol,
            'from' => $from,
            'to' => $to,
        ]);
    }

    public function getIpoCalendar(string $from, string $to): array
    {
        return $this->get('calendar/ipo', [
            'from' => $from,
            'to' => $to,
        ]);
    }

    // Sentiment & Estimates

    public function getNewsSentiment(string $symbol): array
    {
        return $this->get('news-sentiment', [
            'symbol' => $symbol,
        ]);
    }

    public function getPriceTarget(string $symbol): array
    {
        return $this->get('stock/price-target', [
            'symbol' => $symbol,
        ]);
    }

    public function getRecommendationTrends(string $symbol): array
    {
        return $this->get('stock/recommendation', [
            'symbol' => $symbol,
        ]);
    }

    public function getSupportResistance(string $symbol, string $resolution): array
    {
        return $this->get('stock/support-resistance', [
            'symbol' => $symbol,
            'resolution' => $resolution,
        ]);
    }

    // Miscellaneous Data

    public function getCovidData(): array
    {
        return $this->get('covid19');
    }

    public function getEconomicData(string $indicator): array
    {
        return $this->get('forex/economic-data', [
            'code' => $indicator,
        ]);
    }

    public function getSocialSentiment(string $symbol): array
    {
        return $this->get('stock/social-sentiment', [
            'symbol' => $symbol,
        ]);
    }

    public function getPatternRecognition(string $symbol, string $resolution): array
    {
        return $this->get('scan/pattern-recognition', [
            'symbol' => $symbol,
            'resolution' => $resolution,
        ]);
    }

    public function getTranscripts(string $symbol): array
    {
        return $this->get('stock/transcripts', [
            'symbol' => $symbol,
        ]);
    }

    public function getTranscriptById(string $id): array
    {
        return $this->get('stock/transcripts', [
            'id' => $id,
        ]);
    }

    public function getUpgradeDowngradeHistory(string $symbol, string $from, string $to): array
    {
        return $this->get('stock/upgrade-downgrade', [
            'symbol' => $symbol,
            'from' => $from,
            'to' => $to,
        ]);
    }
    
    public function getOpenEstimates(string $symbol): array
    {
        return $this->get('stock/open-estimate', [
            'symbol' => $symbol,
        ]);
    }

    // Market Data
    public function getStockTick(string $symbol, string $date, int $limit, int $skip): array
    {
        return $this->get('stock/tick', [
            'symbol' => $symbol,
            'date' => $date,
            'limit' => $limit,
            'skip' => $skip,
        ]);
    }

    public function getQuote(string $symbol): array
    {
        return $this->get('quote', [
            'symbol' => $symbol,
        ]);
    }

    // Indices Data
    public function getIndicesConstituents(string $symbol): array
    {
        return $this->get('index/constituents', [
            'symbol' => $symbol,
        ]);
    }

    public function getIndicesHistoricalConstituents(string $symbol): array
    {
        return $this->get('index/historical-constituents', [
            'symbol' => $symbol,
        ]);
    }

    // Company Data
    public function getRevenueBreakdown(string $symbol): array
    {
        return $this->get('stock/revenue-breakdown', [
            'symbol' => $symbol,
        ]);
    }

    public function getEarningsCalendar(string $from, string $to, ?string $symbol = null): array
    {
        return $this->get('calendar/earnings', [
            'from' => $from,
            'to' => $to,
            'symbol' => $symbol,
        ]);
    }

    public function getPressReleases(string $symbol, string $from, string $to): array
    {
        return $this->get('press-releases', [
            'symbol' => $symbol,
            'from' => $from,
            'to' => $to,
        ]);
    }

    public function getSimilarityIndex(string $symbol): array
    {
        return $this->get('stock/similarity-index', [
            'symbol' => $symbol,
        ]);
    }

    public function getInvestmentThemes(string $theme): array
    {
        return $this->get('investment-themes', [
            'theme' => $theme,
        ]);
    }

    public function getSupplyChainRelationships(string $symbol): array
    {
        return $this->get('stock/supply-chain', [
            'symbol' => $symbol,
        ]);
    }

    public function getInsiderTransactions(string $symbol, string $from, string $to): array
    {
        return $this->get('stock/insider-transactions', [
            'symbol' => $symbol,
            'from' => $from,
            'to' => $to,
        ]);
    }

    public function getInternationalFilings(string $symbol): array
    {
        return $this->get('international-filings', [
            'symbol' => $symbol,
        ]);
    }

    public function getFilingsSentiment(string $id): array
    {
        return $this->get('filings-sentiment', [
            'id' => $id,
        ]);
    }

    public function getCompanyEsgScore(string $symbol): array
    {
        return $this->get('stock/esg', [
            'symbol' => $symbol,
        ]);
    }

    public function getCompanyEarningsQualityScore(string $symbol, string $frequency = 'quarterly'): array
    {
        return $this->get('stock/earnings-quality', [
            'symbol' => $symbol,
            'freq' => $frequency,
        ]);
    }

    public function getCompanyEbitdaEstimates(string $symbol, string $frequency = 'quarterly'): array
    {
        return $this->get('stock/ebitda-estimates', [
            'symbol' => $symbol,
            'freq' => $frequency,
        ]);
    }

    public function getCompanyEbitEstimates(string $symbol, string $frequency = 'quarterly'): array
    {
        return $this->get('stock/ebit-estimates', [
            'symbol' => $symbol,
            'freq' => $frequency,
        ]);
    }

    // Patent and Visa Data
    public function getUsptoPatentData(string $symbol, string $from, string $to): array
    {
        return $this->get('stock/uspto-patent', [
            'symbol' => $symbol,
            'from' => $from,
            'to' => $to,
        ]);
    }

    public function getVisaApplicationData(string $symbol, string $from, string $to): array
    {
        return $this->get('stock/visa-application', [
            'symbol' => $symbol,
            'from' => $from,
            'to' => $to,
        ]);
    }

    // Search Data
    public function symbolSearch(string $query): array
    {
        return $this->get('search', [
            'q' => $query,
        ]);
    }
    /**
     * Get Stock Splits
     * Retrieves historical stock splits for a specified date range.
     */
    public function getStockSplits(string $symbol, string $from, string $to): array
    {
        return $this->get('stock/split', [
            'symbol' => $symbol,
            'from' => $from,
            'to' => $to,
        ]);
    }

    /**
     * Get Technical Indicators
     * Provides technical indicators such as RSI, MACD, etc., for a specified symbol and time period.
     */
    public function getTechnicalIndicators(
        string $symbol,
        string $resolution,
        int $from,
        int $to,
        string $indicator,
        array $indicatorFields = []
    ): array {
        $query = array_merge([
            'symbol' => $symbol,
            'resolution' => $resolution,
            'from' => $from,
            'to' => $to,
            'indicator' => $indicator,
        ], $indicatorFields);

        return $this->get('indicator', $query);
    }

    /**
     * Get Forex Rates
     * Retrieves current forex rates for a given currency.
     */
    public function getForexRates(string $currency): array
    {
        return $this->get('forex/rates', [
            'base' => $currency,
        ]);
    }

    /**
     * Get ETF Country Exposure
     * Provides country-level exposure data for a specified ETF.
     */
    public function getEtfCountryExposure(string $symbol): array
    {
        return $this->get('etf/country', [
            'symbol' => $symbol,
        ]);
    }

    /**
     * Get Mutual Fund Country Exposure
     * Provides country-level exposure data for a specified mutual fund.
     */
    public function getMutualFundCountryExposure(string $symbol): array
    {
        return $this->get('mutual-fund/country', [
            'symbol' => $symbol,
        ]);
    }

    /**
     * Get Crypto Profile
     * Retrieves the profile information of a specific cryptocurrency.
     */
    public function getCryptoProfile(string $symbol): array
    {
        return $this->get('crypto/profile', [
            'symbol' => $symbol,
        ]);
    }
}
?>
