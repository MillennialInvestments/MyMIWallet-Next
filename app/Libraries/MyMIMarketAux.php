<?php

namespace App\Libraries;

use CodeIgniter\HTTP\CURLRequest;

#[\AllowDynamicProperties]
class MyMIMarketAux
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = \Config\Services::curlrequest();
        $this->apiKey = getenv('MARKETAUX_API_KEY');
    }

    protected function makeRequest(string $function, string $symbol)
    {
        try {
            $endpoint = 'https://api.marketaux.com/v1/news/all';

            $response = $this->client->get($endpoint, [
                'query' => [
                    'symbols' => $symbol,
                    'filter_entities' => 'true',
                    'language' => 'en',
                    'page_size' => 1,
                    'api_token' => $this->apiKey
                ]
            ]);

            $body = json_decode($response->getBody(), true);
            return $body['data'][0] ?? null;

        } catch (\Throwable $e) {
            log_message('error', "MyMIMarketAux::makeRequest failed for {$function} on {$symbol}: " . $e->getMessage());
            return null;
        }
    }

    public function fetchMarketData(string $symbol): ?array
    {
        try {
            $url = 'https://www.alphavantage.co/query';
            $response = $this->client->get($url, [
                'query' => [
                    'function' => 'GLOBAL_QUOTE',
                    'symbol' => strtoupper($symbol),
                    'apikey' => $this->apiKey
                ]
            ]);

            $body = json_decode($response->getBody(), true);

            if (!isset($body['Global Quote']) || empty($body['Global Quote'])) {
                log_message('error', "MyMIMarketAux::fetchMarketData - No data for symbol: {$symbol}");
                return null;
            }

            $quote = $body['Global Quote'];
            return [
                'symbol' => $symbol,
                'price' => floatval($quote['05. price'] ?? 0),
                'open' => floatval($quote['02. open'] ?? 0),
                'high' => floatval($quote['03. high'] ?? 0),
                'low'  => floatval($quote['04. low'] ?? 0),
                'volume' => intval($quote['06. volume'] ?? 0)
            ];
        } catch (\Throwable $e) {
            log_message('error', "MyMIMarketAux::fetchMarketData failed for {$symbol}: " . $e->getMessage());
            return null;
        }
    }
    
    public function fetchTechnicalMetric(string $symbol, string $metric): ?float
    {
        $data = $this->makeRequest($metric, $symbol);

        if (!$data || !isset($data[$metric])) {
            log_message('error', "MyMIMarketAux: No technical data returned for {$metric} of {$symbol}.");
            return null;
        }

        return floatval($data[$metric]);
    }

    public function fetchCCI(string $symbol): ?float { return $this->fetchTechnicalMetric($symbol, 'CCI'); }
    public function fetchOBV(string $symbol): ?float { return $this->fetchTechnicalMetric($symbol, 'OBV'); }
    public function fetchADX(string $symbol): ?float { return $this->fetchTechnicalMetric($symbol, 'ADX'); }
    public function fetchWILLR(string $symbol): ?float { return $this->fetchTechnicalMetric($symbol, 'WILLR'); }
    public function fetchMFI(string $symbol): ?float { return $this->fetchTechnicalMetric($symbol, 'MFI'); }
    public function fetchMOM(string $symbol): ?float { return $this->fetchTechnicalMetric($symbol, 'MOM'); }
    public function fetchROC(string $symbol): ?float { return $this->fetchTechnicalMetric($symbol, 'ROC'); }
    public function fetchSTOCH(string $symbol): ?float { return $this->fetchTechnicalMetric($symbol, 'STOCH'); }
}
