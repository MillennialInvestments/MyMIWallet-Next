<?php
namespace App\Libraries;

use App\Libraries\{BaseLoader, MyMIFinnhub};
use App\Modules\APIs\Models\MarketingNewsContentModel;
use CodeIgniter\HTTP\CURLRequest;
use Config\Services;
use App\Config\APISettings;

#[\AllowDynamicProperties]
class MyMINews {

    private $newsApiKey;
    private $request;
    private $marketingModel;
    private MarketingNewsContentModel $newsContentModel;
    private $finnhub;

    public function __construct() {
        // Load necessary services, models, and configurations
        $this->request = Services::request();
        $this->marketingModel = model('App\Models\MarketingModel');
        $this->newsContentModel = model(MarketingNewsContentModel::class);

        helper(['date', 'url']);

        /** @var APISettings $config */
        $config = config('APISettings');
        $this->newsApiKey = getenv('NEWSAPI_ORG_API_KEY')
            ?: getenv('NEWSAPI_AI_KEY')
            ?: ($config->newsapiOrgApiKey ?? '');
        $this->finnhub = service('myMIFinnhub');
    }

    public function fetchPreMarketNews() {
        $fromTime = date('Y-m-d\TH:i:s\Z', strtotime('yesterday 15:01:00 CST'));
        $toTime = date('Y-m-d\TH:i:s\Z', strtotime('today 08:30:00 CST'));

        $newsApiData = $this->fetchNewsApiData($fromTime, $toTime);

        $this->saveNewsArticles($newsApiData, $fromTime, $toTime);

        return $newsApiData;
    }

    public function fetchMarketCloseNews() {
        $fromTime = date('Y-m-d\TH:i:s\Z', strtotime('today 08:31:00 CST'));
        $toTime = date('Y-m-d\TH:i:s\Z', strtotime('today 15:00:00 CST'));

        $newsApiData = $this->fetchNewsApiData($fromTime, $toTime);

        $this->saveNewsArticles($newsApiData, $fromTime, $toTime);

        return $newsApiData;
    }

    private function fetchNewsApiData($fromTime, $toTime) {
        $url = "https://newsapi.org/v2/everything?q=corporate+finance+OR+corporate+news+OR+financial+stock+OR+crypto+OR+stock+market&from=$fromTime&to=$toTime&pageSize=100&apiKey={$this->newsApiKey}";
    
        $client = \Config\Services::curlrequest();
        $response = $client->get($url)->getBody();

        if (empty($response)) {
            $logger->error('API returned an empty response or failed to connect.');
            return [];
        }

        $data = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $logger->error('json_decode error: ' . json_last_error_msg());
            return [];
        }

        if (!isset($data['articles'])) {
            $logger->error('The key "articles" does not exist in the API response.');
            return [];
        }

        return $data['articles'];
    }   
     
    public function fetchTopMarketAuxNews($limit = 10)
    {
        $apiKey = getenv('MARKETAUX_API_KEY'); // Make sure this is set in App\Config\APIs
        $url = "https://api.marketaux.com/v1/news/all?countries=us&limit={$limit}&api_token={$apiKey}";
    
        $client = \Config\Services::curlrequest();
        try {
            $response = $client->get($url)->getBody();
            $data = json_decode($response, true);
    
            if (isset($data['data'])) {
                log_message('info', '✅ Fetched '.count($data['data']).' MarketAux headlines.');
                return $data['data'];
            } else {
                log_message('error', '❌ Invalid MarketAux response: ' . json_encode($data));
                return [];
            }
        } catch (\Exception $e) {
            log_message('error', '❌ MarketAux API error: ' . $e->getMessage());
            return [];
        }
    }
    
    private function saveNewsArticles($articles, $fromTime, $toTime) {
        $data = [
            'fetch_date' => date('Y-m-d'),
            'fetch_time' => date('H:i:s'),
            'source_link' => "https://newsapi.org/v2/everything?from=$fromTime&to=$toTime",
            'articles_json' => json_encode($articles),
            'is_processed' => 0
        ];

        $this->marketingModel->saveNewsArticles($data);
    }

    /**
     * Aggregate crypto headlines for given symbols.
     */
    public function headlinesForSymbols(array $symbols, int $limit = 20): array
    {
        $all = $this->finnhub->latestCryptoNews($limit);
        return array_values(array_filter($all, function ($item) use ($symbols) {
            return !empty(array_intersect($symbols, $item['tickers']));
        }));
    }

    /**
     * Headlines grouped by chains (placeholder: uses symbols only).
     */
    public function headlinesForChains(array $chains, int $limit = 20): array
    {
        return $this->finnhub->latestCryptoNews($limit);
    }

    public function isNewsAlertEmail(string $subject): bool
    {
        $normalized = strtolower(trim($subject));
        return str_contains($normalized, 'news alert for all symbols');
    }

    protected function parseProviderAndHeadline(string $line): array
    {
        $provider = null;
        $headline = $line;

        if (str_contains($line, ':')) {
            [$providerPart, $headlinePart] = explode(':', $line, 2);
            $provider = trim($providerPart);
            $headline = trim($headlinePart);
        }

        return [$provider, $headline];
    }

    public function storeNewsEmail(
        string $subject,
        string $rawBody,
        ?string $fromEmail,
        ?string $messageId,
        ?string $receivedAt
    ): void {
        try {
            $lines = preg_split('/\r\n|\r|\n/', trim($rawBody));
            $lines = array_values(array_filter($lines, static fn($l) => strlen(trim((string) $l)) > 0));
            $topLine = $lines[0] ?? '';

            [$provider, $headline] = $this->parseProviderAndHeadline($topLine);

            $this->newsContentModel->insert([
                'source_email' => $fromEmail,
                'provider'     => $provider,
                'headline'     => $headline,
                'subject'      => $subject,
                'body'         => $rawBody,
                'category'     => 'news',
                'status'       => 'new',
                'received_at'  => $receivedAt,
            ]);

            log_message(
                'info',
                'MyMINews: stored news email {subject} from {from}',
                ['subject' => $subject, 'from' => $fromEmail]
            );
        } catch (\Throwable $e) {
            log_message(
                'error',
                'MyMINews::storeNewsEmail failed: {msg}',
                ['msg' => $e->getMessage()]
            );
        }
    }
}
?>
