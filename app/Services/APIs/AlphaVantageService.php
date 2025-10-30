<?php

namespace App\Services\APIs;

use CodeIgniter\HTTP\CURLRequest;
use Psr\Log\LoggerInterface;
use CodeIgniter\Cache\CacheInterface;

class AlphaVantageService
{
    protected $alphavantageKey;
    protected $curlRequest;
    protected $logger;
    protected $cache;

    public function __construct(
        CURLRequest $curlRequest,
        LoggerInterface $logger,
        CacheInterface $cache,
        $alphavantageKey
    ) {
        $this->alphavantageKey = $alphavantageKey;  // Alpha Vantage API key from config
        $this->curlRequest = $curlRequest;
        $this->logger = $logger;
        $this->cache = $cache;
    }

    // General method to make API calls to Alpha Vantage
    public function makeAlphaVantageAPICall($params)
    {
        $url = "https://www.alphavantage.co/query?{$params}&apikey={$this->alphavantageKey}";
        $cacheKey = md5($url); // Cache the results to avoid repeated API calls
        $cacheKeySanitized = sanitizedCacheKey($cacheKey);

        // Check if cached data exists
        $cachedData = $this->cache->get($cacheKeySanitized);
        if ($cachedData !== null) {
            return $cachedData;
        }

        // Make the API call if no cache exists
        try {
            $response = $this->curlRequest->get($url);
            if ($response->getStatusCode() !== 200) {
                throw new \RuntimeException("API call failed with status " . $response->getStatusCode());
            }

            $data = json_decode($response->getBody(), true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \RuntimeException("API returned invalid JSON");
            }

            // Cache the data for future use
            $this->cache->save($cacheKeySanitized, $data, 3600); // Cache for 1 hour

            return $data;

        } catch (\Exception $e) {
            $this->logger->error('AlphaVantage API Error: ' . $e->getMessage());
            return ['error' => $e->getMessage()];
        }
    }

    // Fetch stock data (Daily Time Series)
    public function getStockData($symbol)
    {
        $params = "function=TIME_SERIES_DAILY&symbol={$symbol}";
        return $this->makeAlphaVantageAPICall($params);
    }

    // Fetch crypto data
    public function getCryptoData($symbol)
    {
        $params = "function=DIGITAL_CURRENCY_DAILY&symbol={$symbol}&market=USD";
        return $this->makeAlphaVantageAPICall($params);
    }

    // Fetch Forex data
    public function getForexData($fromCurrency, $toCurrency)
    {
        $params = "function=CURRENCY_EXCHANGE_RATE&from_currency={$fromCurrency}&to_currency={$toCurrency}";
        return $this->makeAlphaVantageAPICall($params);
    }

    // Fetch mutual fund data
    public function getMutualFundData($symbol)
    {
        $params = "function=TIME_SERIES_DAILY&symbol={$symbol}";
        return $this->makeAlphaVantageAPICall($params);
    }

    // Additional methods for specific API endpoints (if needed)
    public function getETFs($symbol)
    {
        $params = "function=TIME_SERIES_DAILY&symbol={$symbol}";
        return $this->makeAlphaVantageAPICall($params);
    }
    
    public function searchSymbols($keywords)
    {
        $params = "function=SYMBOL_SEARCH&keywords=" . urlencode($keywords);
        return $this->makeAlphaVantageAPICall($params);
    }
}
