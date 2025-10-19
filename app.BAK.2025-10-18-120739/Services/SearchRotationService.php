<?php namespace App\Services;

use App\Models\MarketingModel;

class SearchRotationService
{
    protected $marketingModel;

    public function __construct()
    {
        $this->marketingModel = new MarketingModel();
    }

    public function getTopLinks(string $keyword): array
    {
        $startTime = microtime(true);
        $results = [];
        $status = 'success';
        $error = null;
        $engine = 'bing';

        try {
            $results = $this->getMyMIMarketing()->searchWithBing($keyword);
            if (empty($results)) {
                throw new \Exception('Empty Bing results');
            }
        } catch (\Throwable $e) {
            $engine = 'google';
            try {
                $results = $this->getMyMIMarketing()->searchWithGoogle($keyword);
                if (empty($results)) {
                    throw new \Exception('Empty Google results');
                }
            } catch (\Throwable $ex) {
                $status = 'failed';
                $error = $ex->getMessage();
            }
        }

        // Log search outcome
        $this->marketingModel->logSearchEngineUsage([
            'keyword' => $keyword,
            'engine_used' => $engine,
            'result_count' => count($results),
            'status' => $status,
            'error_message' => $error,
            'response_time_ms' => (int)((microtime(true) - $startTime) * 1000),
        ]);

        return $results ?? [];
    }

    public function scheduleEnrichmentForKeywords()
    {
        $model = new \App\Models\MarketingModel();
        $keywordsRaw = $model->getTopKeywordsFromContent();
        
        $keywords = [];
        foreach ($keywordsRaw as $row) {
            $hashtags = explode(' ', $row['hashtags']);
            foreach ($hashtags as $tag) {
                $clean = trim(str_replace('#', '', $tag));
                if (strlen($clean) > 2) {
                    $keywords[] = $clean;
                }
            }
        }
    
        $unique = array_unique($keywords);
        foreach (array_slice($unique, 0, 10) as $term) {
            $query = urlencode($term);
            $topLinks = $this->getTopLinks($query);
            foreach ($topLinks as $link) {
                $existing = $model->getLatestScrapedByKeyword($term);
                if ($existing && strtotime($existing['last_enriched_at']) > strtotime('-12 hours')) {
                    continue;
                }
                $scraped = $this->scrapeUrlContent($link);
                if ($scraped) {
                    $model->cacheScrapedLinkWithKeyword($link, $scraped, $term);
                }
            }
        }
    }
    
}
