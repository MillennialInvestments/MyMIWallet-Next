<?php

namespace App\Config;

use CodeIgniter\Config\BaseConfig;

class APIsOld extends BaseConfig
{
    // Email Settings
    public string $emailPassword;

    // Alpaca API
    public string $alpacaApiKey;
    public string $alpacaApiSecret;
    public string $alpacaApiUrl;

    // Alpha Vantage API Keys
    public string $alphaVantageApiKey;
    public string $alphaVantageApiKeyB;
    public string $alphaVantageApiKeyC;
    public string $alphaVantageApiKeyD;
    public string $alphaVantageApiKeyE;

    // CoinAPI
    public string $coinapiApiKey;

    // EOD Historical Data
    public string $eodhdApiKey;

    // Explorium API
    public string $exploriumApiKey;

    // Finazon API
    public string $finazonApiKey;

    // Finnhub API
    public string $finnhubAPIKey;

    // IEX Cloud API
    public string $iexcloudApiKey;

    // MarketStack API
    public string $marketstackApiKey;

    // Polygon API
    public string $polygonApiKey;

    // Twelve Data API
    public string $twelveDataApiKey;

    // NewsAPI.org
    public string $newsapiOrgApiKey;

    // MediaStack API
    public string $mediastackApiKey;

    // Scrapemax API
    public string $scrapemaxApiKey;

    public function __construct()
    {
        // Load Environment Variables
        $this->emailPassword = getenv('EMAIL_PASSWORD');

        // Alpaca API
        $this->alpacaApiKey = env('ALPACA_API_KEY');
        $this->alpacaApiSecret = env('ALPACA_API_SECRET');
        $this->alpacaApiUrl = env('ALPACA_API_URL');

        // Alpha Vantage API
        $this->alphaVantageApiKey = env('ALPHA_VANTAGE_API_KEY');
        $this->alphaVantageApiKeyB = env('ALPHA_VANTAGE_API_KEY_B');
        $this->alphaVantageApiKeyC = env('ALPHA_VANTAGE_API_KEY_C');
        $this->alphaVantageApiKeyD = env('ALPHA_VANTAGE_API_KEY_D');
        $this->alphaVantageApiKeyE = env('ALPHA_VANTAGE_API_KEY_E');

        // Other APIs
        $this->coinapiApiKey = env('COINAPI_API_KEY');
        $this->eodhdApiKey = env('EODHD_API_KEY');
        $this->exploriumApiKey = env('EXPLORIUM_API_KEY');
        $this->finazonApiKey = env('FINAZON_API_KEY');
        $this->finnhubAPIKey = env('FINNHUB_API_KEY');
        $this->iexcloudApiKey = env('IEXCLOUD_API_KEY');
        $this->marketstackApiKey = env('MARKETSTACK_API_KEY');
        $this->polygonApiKey = env('POLYGON_API_KEY');
        $this->twelveDataApiKey = env('TWELVEDATA_API_KEY');
        $this->newsapiOrgApiKey = env('NEWSAPIORG_API_KEY');
        $this->mediastackApiKey = env('MEDIASTACK_API_KEY');
        $this->scrapemaxApiKey = env('SCRAPEMAX_API_KEY');
    }

    public function getAlphaVantageApiKey()
    {
        // List of available AlphaVantage API keys
        $apiKeys = array_filter([
            $this->alphaVantageApiKey,
            $this->alphaVantageApiKeyB,
            $this->alphaVantageApiKeyC,
            $this->alphaVantageApiKeyD,
            $this->alphaVantageApiKeyE,
        ]);

        // If no API keys are available, log an error
        if (empty($apiKeys)) {
            log_message('error', "🚨 No AlphaVantage API key is available!");
            return null;
        }

        // Shuffle and return a random API key
        shuffle($apiKeys);
        return $apiKeys[0];
    }
}
?>
