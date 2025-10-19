<?php 
namespace App\Services;

class AlphaVantageService
{
    protected $apiKey;

    public function __construct()
    {
        $apiKey = getenv('ALPHA_VANTAGE_API_KEY');
    } 

    public function getOverview($symbol)
    {
        $url = "https://www.alphavantage.co/query?function=OVERVIEW&symbol={$symbol}&apikey={$this->apiKey}";
        return $this->call($url);
    }

    public function getQuote($symbol)
    {
        $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey={$this->apiKey}";
        return $this->call($url);
    }

    public function getNewsSentiment($symbol)
    {
        $url = "https://www.alphavantage.co/query?function=NEWS_SENTIMENT&tickers={$symbol}&apikey={$this->apiKey}";
        return $this->call($url);
    }

    private function call($url)
    {
        $client = \Config\Services::curlrequest();
        $response = $client->get($url);
        return json_decode($response->getBody(), true);
    }
}
?>