<?php
namespace App\Services;

use App\Libraries\{BaseLoader, MyMIMarketing};
use App\Models\{MarketingModel, SocialGeneratedPostModel, SocialPlatformModel, SocialPostTemplateModel};
use App\Services\SocialPostFormatter;
use GuzzleHttp\Client;
use Config\Database;

class MarketingService
{

    protected $MyMIMarketing;
    protected $marketingModel;
    protected $httpClient;
    protected $postFormatter;
    protected $socialPlatformModel;
    protected $socialTemplateModel;
    protected $socialGeneratedPostModel;

    public function __construct()
    {
        $this->MyMIMarketing = new MyMIMarketing();
        $this->marketingModel = new MarketingModel();
        $this->postFormatter = new SocialPostFormatter();
        $this->socialPlatformModel = new SocialPlatformModel();
        $this->socialTemplateModel = new SocialPostTemplateModel();
        $this->socialGeneratedPostModel = new SocialGeneratedPostModel();

        // ✅ Set up memory-safe Guzzle client
        $this->httpClient = new Client([
            'timeout' => 5,              // Prevents long hangs
            'stream' => true,            // Streams response to reduce memory
            'http_errors' => false,      // Avoid exceptions on bad responses
            'headers' => [
                'User-Agent' => 'MyMI Content Bot',
                'Accept-Encoding' => 'gzip, deflate, br',
            ]
        ]);
    }

    protected function getMyMIMarketing(): MyMIMarketing
    {
        if (!$this->MyMIMarketing instanceof MyMIMarketing) {
            $this->MyMIMarketing = new MyMIMarketing();
        }

        return $this->MyMIMarketing;
    }

    public function distributeContent($platform, $message)
    {
        if (empty($message)) {
            return false;
        }
        switch ($platform) {
            case 'discord':
                return $this->sendToDiscordWebhook($message);
            case 'facebook':
                return $this->sendToZapier('facebook', $message);
            case 'linkedin':
                return $this->sendToZapier('linkedin', $message);
            case 'stocktwits':
                return $this->sendToZapier('stocktwits', $message);
            case 'email':
                return $this->sendToZapier('email', $message);
            default:
                return false;
        }
    }

    public function extractTopKeywords($summary) {
        return $this->getMyMIMarketing()->extractKeywords($summary['summary']);
    }

    public function fetchUnprocessedEmailSummaries() {
        return $this->getMyMIMarketing()->getEmailSummariesForReview();
    }
    
    public function getEmailRecordById($id)
    {
        return $this->marketingModel->getEmailRecordById($id);
    }
    
    // Method to fetch MyMI Services & All Of Their Features: 
    public function getFeatures() {
        $getFeatures = $this->getMyMIMarketing()->getFeatures(); 
        return $getFeatures; 
    }

    public function gatherKeywordBasedContent($keywords) {
        $allContent = [];
        foreach ($keywords as $keyword) {
            $secData = $this->getMyMIMarketing()->scrapeGoogleSearch("SEC filings {$keyword}");
            $alphaVantageData = $this->getMyMIMarketing()->scrapeGoogleSearch("AlphaVantage {$keyword}");
            $googleData = $this->getMyMIMarketing()->scrapeGoogleSearch($keyword, $this->httpClient);
            $internalData = $this->getMyMIMarketing()->getScrapesByKeyword($keyword); // Custom internal method
    
            $allContent[] = array_merge([$secData], [$alphaVantageData], [$googleData], $internalData);
        }
        return $allContent;
    }

    // REPLACE existing method in MarketingService.php
    public function generateContentFromPost($title, $content, $tags)
    {
        $summaryData = $this->getMyMIMarketing()->summarizeContent($content);
        if (empty($summaryData) || empty($summaryData['summary'])) {
            log_message('error', 'generateContentFromPost() failed to generate summary.');
            return null;
        }

        return $this->getMyMIMarketing()->generatePlatformContent($summaryData['summary'], $tags);
    }
    
    public function generateFinalContentFromTemp()
    {
        $records = $this->marketingModel->getTopTempRecords(5);
    
        foreach ($records as $record) {
            if (empty($record['title']) || empty($record['content'])) continue;
    
            $summary = $this->summarizeContent($record['content']);
            $socialMediaPost = $this->generateSocialPost($summary);
    
            $final = [
                'title'       => $record['title'],
                'content'     => $summary,
                'post_text'   => $socialMediaPost,
                'source'      => 'email',
                'created_at'  => date('Y-m-d H:i:s'),
            ];
    
            $this->marketingModel->insertFinalScraper($final);
        }
    }
    
    // public function generateFromTempScraper($limit = 5)
    // {
    //     $records = $this->marketingModel->getLatestTempRecords($limit);
    
    //     if (empty($records)) {
    //         log_message('info', 'No temp scraper records found to process.');
    //         return;
    //     }
    
    //     foreach ($records as $record) {
    //         try {
    //             log_message('debug', '🧪 Processing record ID ' . $record['id']);
    //             $summary = $this->getMyMIMarketing()->generateContentFromRaw($record); // ✅ Fixed: Pass the full record array
    //             if ($summary) {
    //                 $this->marketingModel->insertFinalScraper($record, $summary);
    //                 $this->marketingModel->markTempScraperProcessed($record['id']);
    //                 log_message('info', '✅ Processed and stored content for record ID ' . $record['id']);
    //             } else {
    //                 log_message('warning', '⚠️ Summary was null/empty for record ID ' . $record['id']);
    //             }
    //         } catch (\Throwable $e) {
    //             log_message('error', '❌ Error generating content for record ID ' . $record['id'] . ': ' . $e->getMessage());
    //         }
    //     }
    // }      
    
    public function generatePlatformPosts($content) {
        $summaryText = implode(" ", array_column($content, 'content'));
        return $this->getMyMIMarketing()->generateContentFromLargeText($summaryText, []);
    }

    public function getManagementTeam() {
        $getManagementTeam = $this->getMyMIMarketing()->getManagementTeam(); 
        return $getManagementTeam;
    }

    public function getMarketingData($accountid, $category, $platform)
    {
        $data = [];

        // Scrape and generate marketing content
        if ($category && $accountid) {
            $scrapedData = $this->getMyMIMarketing()->scrapeTokenContentByAccountId($accountid);
            if ($scrapedData) {
                $data['generatedData'] = $this->getMyMIMarketing()->generateContentFromScrapedData($scrapedData, $platform);
            } else {
                $data['generatedData'] = [];
            }
        }

        return $data;
    }

    // Method to fetch promotional banners for the user
    public function getPromotionalBanners($userId)
    {
        // You may add your logic here to fetch promotional banners.
        // Assuming `MyMIMarketing` has a method to retrieve banners based on userId.
        return $this->getMyMIMarketing()->fetchPromotionalBanners($userId);
    }
    
    public function regeneratePostsFromEmailId($id)
    {
        $record = $this->getEmailRecordById($id);
        if (!$record || empty($record['content'])) {
            log_message('error', "❌ Email record not found or empty for ID: $id");
            return null;
        }
    
        $processed = $this->getMyMIMarketing()->generateContentFromRaw($record);
        if ($processed) {
            $this->marketingModel->insertFinalScraper($record, $processed);
            $this->marketingModel->markEmailsAsProcessed([$id]);
            return $processed;
        }
    
        return null;
    }
    
    public function sanitizeAndSummarize($content) {
        $cleanedBody = $this->marketingModel->cleanHtmlEmailContent($content);
        return $this->getMyMIMarketing()->summarizeContent($cleanedBody);
    }

    // public function scrapeAndStoreEmailsToTemp()
    // {
    //     $emails = $this->marketingModel->getNewEmails();
    
    //     foreach ($emails as $email) {
    //         if (!isset($email['content']) || empty($email['content'])) continue;
    
    //         $data = [
    //             'source'      => 'email',
    //             'title'       => $this->extractTitle($email['content']),
    //             'content'     => $this->sanitizeHtml($email['content']),
    //             'created_at'  => date('Y-m-d H:i:s'),
    //         ];
    
    //         $this->marketingModel->insertTempScraper($data);
    //     }
    // }    

    // public function scrapeInboxAndStore()
    // {
    //     $emails = $this->getMyMIMarketing()->fetchAndStoreEmails('news');
    
    //     if (empty($emails) || !is_array($emails)) {
    //         log_message('warning', '⚠️ No valid emails retrieved for scraping.');
    //         return;
    //     }
    
    //     foreach ($emails as $email) {
    //         try {
    //             $this->marketingModel->insertIntoTempScraper([
    //                 'type'         => 'Email/Newsletters',
    //                 'content'      => $email['body'] ?? '',
    //                 'title'        => $email['subject'] ?? '(No Subject)',
    //                 'email_date'   => $email['date'] ?? date('Y-m-d H:i:s'),
    //                 'email_sender' => $email['from'] ?? 'Unknown',
    //                 'status'       => 'In Review',
    //             ]);
    //             log_message('info', '✅ Stored email into temp scraper: ' . ($email['subject'] ?? 'No Subject'));
    //         } catch (\Throwable $e) {
    //             log_message('error', '❌ Error inserting email into temp scraper: ' . $e->getMessage());
    //         }
    //     }
    // }    
    
    public function storeGeneratedPostsForDashboard($posts) {
        $this->getMyMIMarketing()->storeGeneratedContent([
            'primary_content' => $posts['summary'],
            'social_media_content' => json_encode($posts['platforms_content']),
            'status' => 'Generated',
            'created_on' => date('Y-m-d H:i:s'),
        ]);
    }

    protected function sendToDiscordWebhook($message)
    {
        $discord = new \App\Libraries\MyMIDiscord();
        return $discord->enqueuePlain('marketing', $message, [
            'dedupe_key' => hash('sha256', $message),
        ]);
    }

    public function sendWalkthroughInviteToActiveUsers()
    {
        return $this->getMyMIMarketing()->sendWalkthroughInviteToActiveUsers();
    }
    
    protected function sendToZapier($platform, $message)
    {
        $zapierHooks = [
            'facebook' => env('ZAPIER_FACEBOOK_WEBHOOK'),
            'linkedin' => env('ZAPIER_LINKEDIN_WEBHOOK'),
            'stocktwits' => env('ZAPIER_STOCKTWITS_WEBHOOK'),
            'email' => env('ZAPIER_EMAIL_WEBHOOK'),
        ];
    
        $hook = $zapierHooks[$platform] ?? null;
        if (!$hook) return false;
    
        $client = \Config\Services::curlrequest();
        $payload = ['message' => $message, 'platform' => $platform];
    
        $response = $client->post($hook, ['json' => $payload]);
        return $response->getStatusCode() === 200;
    }
    
    public function storeScrapedContent($content) {
        foreach ($content as $data) {
            $this->getMyMIMarketing()->storeTempScrapedData([
                'title' => $data['title'],
                'content' => $data['content'],
                'scraped_at' => date('Y-m-d H:i:s'),
                'type' => 'keyword_summary',
            ]);
        }
    }

    public function generateDailyMarketCampaign(array $options = []): array
    {
        return $this->getMyMIMarketing()->generateDailyCampaignPackage($options);
    }

    public function generatePlatformPostPackFromSummary(int $summaryId): array
    {
        $db = Database::connect();
        $summary = $db->table('bf_marketing_scraper')->where('id', $summaryId)->get()->getRowArray();
        if (! $summary) {
            return [];
        }

        $platforms = $this->seedDefaultPlatforms();
        $generated = [];
        $tickers = $this->extractTickersFromSummary($summary);
        $links = $this->extractLinksFromSummary($summary);

        foreach ($platforms as $platform) {
            $templates = $this->socialTemplateModel->findByPlatform((int) $platform['id']);
            foreach ($templates as $template) {
                $payload = [
                    'hook'        => $summary['title'] ?? 'Daily summary',
                    'value'       => $summary['summary'] ?? ($summary['content'] ?? ''),
                    'cta'         => 'Join Discord for the full breakdown',
                    'links'       => $links,
                    'hashtags'    => $this->extractHashtagsFromSummary($summary),
                    'tickers'     => $tickers,
                    'template_key'=> $template['template_key'],
                    'constraints' => [
                        'max_chars'     => $template['max_chars'],
                        'hashtag_limit' => $template['hashtag_limit'],
                    ],
                ];

                $formatted = $this->postFormatter->format($platform['platform_key'], $payload);
                $this->socialGeneratedPostModel->insert([
                    'source_type'  => 'marketing_scraper',
                    'source_id'    => $summaryId,
                    'platform_id'  => $platform['id'],
                    'community_id' => null,
                    'template_id'  => $template['id'],
                    'post_title'   => $formatted['post_title'],
                    'post_body'    => $formatted['post_body'],
                    'hashtags'     => $formatted['hashtags'],
                    'tickers'      => $formatted['tickers'],
                    'cta_link'     => $formatted['cta_link'],
                    'status'       => 'draft',
                ]);

                $generated[] = [
                    'platform' => $platform['platform_key'],
                    'template' => $template['template_key'],
                    'post_id'  => $this->socialGeneratedPostModel->getInsertID(),
                ];
            }
        }

        return $generated;
    }

    public function generateDailyCommunityPosts(int $limit = 5): array
    {
        $db = Database::connect();
        $rows = $db->table('bf_marketing_scraper')
            ->where('DATE(created_on)', date('Y-m-d'))
            ->orderBy('feature_score', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();

        $batch = [];
        foreach ($rows as $row) {
            $batch[] = $this->generatePlatformPostPackFromSummary((int) $row['id']);
        }
        return $batch;
    }

    protected function seedDefaultPlatforms(): array
    {
        $configPlatforms = config('SocialPlatforms')->platforms;
        $existing = $this->socialPlatformModel->findAll(20);
        $existingKeys = array_column($existing, 'platform_key');

        foreach ($configPlatforms as $key => $meta) {
            if (in_array($key, $existingKeys, true)) {
                continue;
            }
            $this->socialPlatformModel->insert(array_merge(['platform_key' => $key], $meta));
        }

        $platforms = $this->socialPlatformModel->findAll(20);
        foreach ($platforms as $platform) {
            $defaults = config('SocialPlatforms')->defaultTemplates;
            $existingTemplates = $this->socialTemplateModel->findByPlatform((int) $platform['id']);
            $existingKeys = array_column($existingTemplates, 'template_key');
            foreach ($defaults as $key => $body) {
                if (in_array($key, $existingKeys, true)) {
                    continue;
                }
                $this->socialTemplateModel->insert([
                    'platform_id'    => $platform['id'],
                    'template_key'   => $key,
                    'title'          => ucfirst(str_replace('_', ' ', $key)),
                    'max_chars'      => null,
                    'hashtag_limit'  => 5,
                    'supports_links' => 1,
                    'supports_mentions' => 1,
                    'supports_tickers' => 1,
                    'body_template'  => $body,
                    'rules_json'     => json_encode(['auto_seeded' => true]),
                ]);
            }
        }

        return $this->socialPlatformModel->findAll(20);
    }

    protected function extractTickersFromSummary(array $summary): array
    {
        $tickers = [];
        $payload = $summary['keywords'] ?? $summary['summary'] ?? '';
        if (is_string($payload)) {
            preg_match_all('/\\b[A-Z]{2,5}\\b/', $payload, $matches);
            $tickers = $matches[0] ?? [];
        } elseif (is_array($payload)) {
            foreach ($payload as $item) {
                if (is_string($item)) {
                    preg_match_all('/\\b[A-Z]{2,5}\\b/', $item, $matches);
                    $tickers = array_merge($tickers, $matches[0] ?? []);
                }
            }
        }
        return array_values(array_unique($tickers));
    }

    protected function extractLinksFromSummary(array $summary): array
    {
        $links = [];
        if (! empty($summary['links'])) {
            $links = is_array($summary['links'])
                ? $summary['links']
                : (json_decode($summary['links'], true) ?: []);
        }
        if (! empty($summary['url'])) {
            $links[] = $summary['url'];
        }
        return array_values(array_unique(array_filter($links)));
    }

    protected function extractHashtagsFromSummary(array $summary): array
    {
        $keywords = [];
        if (! empty($summary['keywords'])) {
            $keywords = is_array($summary['keywords']) ? $summary['keywords'] : (json_decode($summary['keywords'], true) ?: []);
        }
        return array_map(static fn ($k) => preg_replace('/\\s+/', '', strtolower((string) $k)), array_slice($keywords, 0, 6));
    }
}
?>
