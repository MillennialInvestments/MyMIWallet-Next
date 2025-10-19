<?php namespace App\Libraries;

use App\Libraries\{BaseLoader};
use CodeIgniter\HTTP\CURLRequest;
use Config\Services;

#[\AllowDynamicProperties]
class MyMISEC {

    protected string $baseUrl = 'https://data.sec.gov';
    protected string $userAgent = 'MyMIWallet (support@mymiwallet.com)';
    protected $cache;

    public function __construct() {
        helper(['url']);
        $this->cache = Services::cache();
    }

    /**
     * Retrieve recent SEC filings for a ticker symbol.
     *
     * @return array<int,array{id:string,title:string,url:string,source:string,published_at:?string,tickers:array,summary:?string}>
     */
    public function filings(string $ticker, int $limit = 20): array
    {
        $ticker = strtoupper($ticker);
        $limit = max(1, $limit);
        $cacheKey = 'sec_filings_' . $ticker . '_' . $limit;
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        if ($cached = $this->cache->get($cacheKeySanitized)) {
            return $cached;
        }
        $cikData = $this->request('/files/company_tickers.json');
        if (!$cikData) {
            return [];
        }
        $cik = null;
        foreach ($cikData as $c) {
            if (isset($c['ticker']) && strtoupper($c['ticker']) === $ticker) {
                $cik = str_pad($c['cik_str'], 10, '0', STR_PAD_LEFT);
                break;
            }
        }
        if (!$cik) {
            return [];
        }
        $submissions = $this->request('/submissions/CIK' . $cik . '.json');
        if (!$submissions || !isset($submissions['filings']['recent'])) {
            return [];
        }
        $recent = $submissions['filings']['recent'];
        $count = min($limit, count($recent['accessionNumber']));
        $items = [];
        for ($i = 0; $i < $count; $i++) {
            $items[] = [
                'id'           => $recent['accessionNumber'][$i],
                'title'        => $recent['form'][$i] ?? 'Filing',
                'url'          => 'https://www.sec.gov/Archives/edgar/data/' . $submissions['cik'] . '/' . $recent['accessionNumber'][$i] . '/' . $recent['primaryDocument'][$i],
                'source'       => 'SEC',
                'published_at' => $recent['filingDate'][$i] ?? null,
                'tickers'      => [$ticker],
                'summary'      => null,
            ];
        }
        $this->cache->save($cacheKeySanitized, $items, 600);
        return $items;
    }

    /**
     * Internal helper with retries/backoff.
     */
    protected function request(string $endpoint): ?array
    {
        $client = Services::curlrequest(['baseURI' => $this->baseUrl, 'headers' => ['User-Agent' => $this->userAgent], 'timeout' => 10]);
        $delay = 1;
        for ($i = 0; $i < 3; $i++) {
            try {
                $resp = $client->get($endpoint);
                if ($resp->getStatusCode() === 200) {
                    return json_decode($resp->getBody(), true);
                }
                log_message('warning', 'MyMISEC non-200 response {code} for {endpoint}', ['code' => $resp->getStatusCode(), 'endpoint' => $endpoint]);
            } catch (\Throwable $e) {
                log_message('warning', 'MyMISEC request error: {msg}', ['msg' => $e->getMessage()]);
            }
            sleep($delay);
            $delay *= 2;
        }
        return null;
    }

    private function makeRequest($endpoint) {
        log_message('info', "📡 SEC API Request: {$this->baseUrl}{$endpoint}");
    
        $curl = Services::curlrequest();
        try {
            $response = $curl->get($this->baseUrl . $endpoint, [
                "headers" => ["User-Agent" => $this->userAgent]
            ]);
    
            if ($response->getStatusCode() === 404) {
                log_message('warning', "⚠️ SEC API returned 404 for: {$endpoint}");
                return null;
            }
    
            if ($response->getStatusCode() !== 200) {
                log_message('error', "❌ SEC API Request Failed: {$endpoint} | Status Code: " . $response->getStatusCode());
                return null;
            }
    
            log_message('info', "✅ SEC API Response Successful: {$endpoint}");
            return json_decode($response->getBody(), true);
    
        } catch (\Exception $e) {
            log_message('error', "❌ Exception during SEC API request: " . $e->getMessage());
            return null;
        }
    } 

    private function makeRequestFromExternal($url) {
        log_message('info', "📡 External API Request: {$url}");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // Disable SSL verification (only if needed)
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "User-Agent: MyMIWallet (support@mymiwallet.com)", // ✅ SEC requires User-Agent
            "Accept: application/json"
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($httpCode !== 200 || !$response) {
            log_message('error', "❌ Failed to fetch data from {$url}. HTTP Code: {$httpCode}. CURL Error: {$error}");
            return null;
        }

        return json_decode($response, true);
    }

    public function getCikFromSymbol($symbol) {
        log_message('info', "🔎 Fetching CIK for Symbol: {$symbol}");
    
        // Convert the symbol to uppercase
        $symbol = strtoupper($symbol);
    
        // Fetch company tickers JSON from SEC
        $cikLookupUrl = "https://www.sec.gov/files/company_tickers.json";
        $cikData = $this->makeRequestFromExternal($cikLookupUrl);
    
        if (!$cikData) {
            log_message('error', "⚠️ Failed to retrieve company metadata from SEC API.");
            return null;
        }
    
        // SEC API returns an array of companies, loop through it
        foreach ($cikData as $company) {
            if (isset($company['ticker']) && strtoupper($company['ticker']) === $symbol) {
                $cik = str_pad($company['cik_str'], 10, "0", STR_PAD_LEFT); // Format CIK
                log_message('info', "✅ Found CIK for {$symbol}: {$cik}");
                return $cik;
            }
        }
    
        log_message('warning', "⚠️ No matching CIK found for symbol: {$symbol}");
        return null;
    }    

    /**
     * Convenience method to fetch recent SEC filings for a symbol.
     */
    public function getSECData(string $symbol)
    {
        $cik = $this->getCikFromSymbol($symbol);
        if (!$cik) {
            return [];
        }

        $data = $this->getSecFilingsByCik($cik);
        if (!$data) {
            return [];
        }

        return $this->parseFilings($data);
    }

    public function getSecFilingsByCik($cik) {
        log_message('info', "📄 Fetching SEC Filings for CIK: {$cik}");
        $cik = str_pad($cik, 10, "0", STR_PAD_LEFT);
        $endpoint = "/submissions/CIK{$cik}.json";
        return $this->makeRequest($endpoint);
    }

    public function parseFilings($data) {
        if (!isset($data['filings']['recent'])) {
            log_message('warning', "⚠️ No Recent SEC Filings Available");
            return [];
        }

        $filings = [];
        foreach ($data['filings']['recent']['accessionNumber'] as $index => $accessionNumber) {
            $filings[] = [
                "cik" => $data['cik'],
                "accession_number" => $accessionNumber,
                "filing_date" => $data['filings']['recent']['filingDate'][$index] ?? '',
                "form_type" => $data['filings']['recent']['form'][$index] ?? 'Unknown',
                "document_url" => "https://www.sec.gov/Archives/edgar/data/{$data['cik']}/{$accessionNumber}/{$data['filings']['recent']['primaryDocument'][$index]}",
                "created_on" => date("Y-m-d H:i:s"),
            ];
        }

        log_message('info', "✅ Parsed SEC Filings: " . count($filings) . " filings found.");
        return $filings;
    }

    // ✅ New Method: Get Insider Transactions
    public function getInsiderTransactions($cik) {
        log_message('info', "📊 Fetching Insider Transactions for CIK: {$cik}");
        $endpoint = "/cgi-bin/browse-edgar?action=getcompany&CIK={$cik}&type=4";
        return $this->makeRequest($endpoint);
    }

    // ✅ New Method: Get 13F Institutional Ownership
    public function getInstitutionalOwnership($cik) {
        log_message('info', "📈 Fetching Institutional Holdings (13F Filings) for CIK: {$cik}");
        $endpoint = "/submissions/CIK{$cik}.json";
        $data = $this->makeRequest($endpoint);

        if (!isset($data['filings']['recent'])) {
            log_message('warning', "⚠️ No 13F Institutional Filings Available");
            return [];
        }

        return array_filter($data['filings']['recent'], function ($filing) {
            return in_array($filing['form'], ['13F-HR', '13F-NT']);
        });
    }

    // ✅ New Method: Get Financial Reports (10-K, 10-Q, 8-K)
    public function getFinancialReports($cik) {
        log_message('info', "📑 Fetching Financial Reports for CIK: {$cik}");
        $endpoint = "/submissions/CIK{$cik}.json";
        $data = $this->makeRequest($endpoint);

        if (!isset($data['filings']['recent'])) {
            log_message('warning', "⚠️ No Financial Reports Available");
            return [];
        }

        return array_filter($data['filings']['recent'], function ($filing) {
            return in_array($filing['form'], ['10-K', '10-Q', '8-K']);
        });
    }
}
?>
