<?php

namespace App\Libraries;

use App\Config\{SiteSettings, SocialMedia};
use App\Libraries\{BaseLoader, FRED, MyMIAlphaVantage, MyMICoinGecko, MyMIInvestments};
use App\Libraries\Traits\TextProcessor;
use App\Models\{AnalyticalModel, MarketingModel};
use App\Services\{EmailService, MarketingService, SolanaService};
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Log\LoggerInterface;
use CodeIgniter\Session\Session;
use Myth\Auth\Authorization\GroupModel;
use \DateTime;                    // <-- Import PHP's native DateTime
use Exception;
use HTMLPurifier;
use HTMLPurifier_Config;
use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\FeatureExtraction\TokenCountVectorizer as PhpmlTokenCountVectorizer;
use Phpml\Tokenization\WhitespaceTokenizer;
use NlpTools\Tokenizers\WhitespaceTokenizer as NlpWhitespaceTokenizer;
use NlpTools\Similarity\CosineSimilarity;
use Facebook\Facebook;
use Abraham\TwitterOAuth\TwitterOAuth;
use Happyr\LinkedIn\LinkedIn;
use Discord\Discord;
use Discord\Parts\Channel\Message;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Pscrape\Pscrape\Scrape as PscrapeScraper;
use Symfony\Component\DomCrawler\Crawler;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;
use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\SsmlVoiceGender;
use Google\Cloud\TextToSpeech\V1\AudioEncoding;
use Google\Cloud\TextToSpeech\V1\SynthesizeSpeechRequest;
use Google\Cloud\TextToSpeech\V1\Client\TextToSpeechClient;


#[\AllowDynamicProperties]
class MyMIMarketing
{

    use TextProcessor;
    protected $auth;
    protected $client;
    protected $cuID;
    protected $data;
    protected $debug;
    protected $logger;
    protected $request;
    protected $session;
    protected $uri;
    protected $APIs;
    protected $emailService;
    protected $solanaService;
    protected $siteSettings;
    protected $marketingModel;
    protected $analyticalModel;
    protected $socialMedia;
    protected $facebook;
    protected $twitter;
    protected $linkedin;
    protected $discord;
    protected $scrapemax;
    protected $pscrape;
    // protected $initializeServices;

    public function __construct()
    {
        $this->auth = service('authentication');
        $this->client = \Config\Services::curlrequest(); // ✅ Add this
        $this->logger = service('logger');
        $this->request = service('request');
        $this->session = service('session');
        $this->uri = $this->request->getUri();
        $this->APIs = config('APISettings');
        $this->socialMedia = config('SocialMedia');
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug;
        $this->socialMedia = config('SocialMedia');
        $this->marketingModel = new MarketingModel();
        $this->analyticalModel = new AnalyticalModel();
        $this->emailService = service('email');
        $this->solanaService = new SolanaService();
        try {
            $this->alphaVantage = new MyMIAlphaVantage();
        } catch (\Throwable $e) {
            log_message('error', 'MyMIMarketing::ctor failed to initialize AlphaVantage helper: ' . $e->getMessage());
            $this->alphaVantage = null;
        }

        try {
            $this->coinGecko = new MyMICoinGecko();
        } catch (\Throwable $e) {
            log_message('error', 'MyMIMarketing::ctor failed to initialize CoinGecko helper: ' . $e->getMessage());
            $this->coinGecko = null;
        }

        try {
            $this->fred = new FRED();
        } catch (\Throwable $e) {
            log_message('error', 'MyMIMarketing::ctor failed to initialize FRED helper: ' . $e->getMessage());
            $this->fred = null;
        }
        // $this->twitter = new TwitterOAuth(
        //     API_KEY, 
        //     API_SECRET, 
        //     ACCESS_TOKEN, 
        //     ACCESS_SECRET
        // );
        // $this->initializeServices();
        
        // Initialize Scrapemax and Pscrape clients
        $smBase = getenv('SCRAPEMAX_BASE') ?: 'https://api.scrapemax.com';
        $smKey  = getenv('SCRAPEMAX_API_KEY') ?: null;

        // Scrapemax HTTP client (optional)
        if ($smKey) {
            // Keep both for backwards compatibility with old code
            $this->scrapemax = new \App\Libraries\ScrapemaxClient($smBase, $smKey);
            $this->scrape    = $this->scrapemax;
        } else {
            log_message('warning', 'MyMIMarketing: SCRAPEMAX_API_KEY missing; disabling email alerts');
            $this->scrapemax = null;
            $this->scrape    = null;
        }

        // Pscrape client (optional)
        if (class_exists(\Pscrape\Pscrape\Scrape::class)) {
            try {
                $this->pscrape = new PscrapeScraper();
            } catch (\Throwable $e) {
                log_message(
                    'warning',
                    'MyMIMarketing: failed to initialize PscrapeScraper: ' . $e->getMessage()
                );
                $this->pscrape = null;
            }
        } else {
            log_message(
                'info',
                'MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.'
            );
            $this->pscrape = null;
        }

        // Facebook Configuration

        // $fbConfig = config('Facebook');
        // $this->facebook = new Facebook([
        //     'app_id' => $fbConfig->app_id,
        //     'app_secret' => $fbConfig->app_secret,
        //     'default_graph_version' => $fbConfig->default_graph_version,
        // ]);

        // $this->twitter = new TwitterOAuth(
        //     $this->socialMedia->twitter_api_key,
        //     $this->socialMedia->twitter_api_secret_key,
        //     $this->socialMedia->twitter_access_token,
        //     $this->socialMedia->twitter_access_token_secret
        // );

        // $this->linkedin = new LinkedIn(
        //     $this->socialMedia->linkedin_client_id,
        //     $this->socialMedia->linkedin_client_secret
        // );

        // $this->discord = new Discord([
        //     'token' => $twitterConfig->discord_bot_token
        // ]);
    }

    public function marketing()
    {
        $department = $this->department();
        $links = $this->social_media();
        return ['links' => $links, 'department' => $department];
    }

    public function assignMarketingTask($task_info)
    {
        
        $data = [
            'status' => 'Pending',
            'group' => 'Marketing',
            'task' => $task_info['task'],
            'title' => $task_info['title'],
            'description' => 'Complete SEO for ' . $task_info['url'],
            'url' => site_url('/Management/Marketing/Page-SEO/' . $task_info['seo_id']),
        ];

        $this->marketingModel->insertManagementTask($data);
    }

    public function assignTopicsToArticles($articleGroup)
    {
        try {
            $ldaModel = new \App\Libraries\LDA(); // You can later customize this
            return $ldaModel->assignTopics($articleGroup);
        } catch (\Throwable $e) {
            log_message('error', '❌ assignTopicsToArticles() failed: ' . $e->getMessage());
            return [];
        }
    }

    public function autoDistributeHighRelevanceSummaries($minScore = 75)
    {
        $posts = $this->marketingModel->getRecentPosts(10); // Or fetch from buffer
    
        foreach ($posts as $post) {
            $summary = $post['summary'] ?? '';
            $title   = $post['title'] ?? 'Untitled';
        
            if (($post['score'] ?? 0) >= $minScore && !empty($summary)) {
                $message = "**{$title}**\n\n" . word_limiter(strip_tags($summary), 60);
                $this->sendToDiscordNotification($message);
            }
        }
        
    }
    
    public function autoSendToZapier($minScore = 75)
    {
        $posts = $this->marketingModel->getRecentPosts(10);
    
        foreach ($posts as $post) {
            if (($post['score'] ?? 0) >= $minScore) {
                $this->sendToZapier('facebook', $post['summary']); // or 'linkedin', etc.
            }
        }
    }
      
    public function backfillMissingSummaries($limit = 20)
    {
        $missingRecords = $this->marketingModel->getRecordsMissingSummaryOrTitle($limit);
        log_message('debug', '� Found ' . count($missingRecords) . ' records to backfill.');
        
        foreach ($missingRecords as $record) {
            try {
                $cleaned = $this->sanitizeRawEmailContent($record['content'] ?? '');
                $summaryData = $this->summarizeContent($cleaned);
                if (!is_array($summaryData) || empty($summaryData['summary'])) {
                    log_message('warning', "⚠️ No valid summary for ID {$record['id']}");
                    continue;
                }
    
                $title = word_limiter(strip_tags($record['title'] ?? $summaryData['summary']), 12);
                $keywords = implode(',', $summaryData['keywords'] ?? []);
                $summary = $summaryData['summary'];
    
                $this->marketingModel->updateSummaryFallback($record['id'], $title, $summary, $keywords);
                log_message('info', "✅ Updated ID {$record['id']} with summary and title.");
            } catch (\Throwable $e) {
                log_message('error', '❌ Error backfilling record ID ' . $record['id'] . ': ' . $e->getMessage());
            }
        }
    }

    
    protected function buildSummaryToCharLimit(array $sentences, array $topIndexes, int $charLimit = 280): string
    {
        $summary = '';
        foreach ($topIndexes as $index) {
            if (!isset($sentences[$index])) {
                log_message('error', "buildSummaryToCharLimit(): ❌ Sentence index $index not found.");
                continue;
            }
    
            $nextSentence = $sentences[$index];
            if (strlen($summary . ' ' . $nextSentence) > $charLimit) {
                break;
            }
    
            $summary .= $nextSentence . ' ';
        }
    
        return trim($summary);
    }
    
    private function buildSimilarityMatrix($sentences, $wordFrequencies)
    {
        $matrix = [];
        $sentenceLength = count($sentences);
    
        for ($i = 0; $i < $sentenceLength; $i++) {
            for ($j = 0; $j < $sentenceLength; $j++) {
                if ($i !== $j) {
                    $sentenceI = $sentences[$i] ?? null;
                    $sentenceJ = $sentences[$j] ?? null;
    
                    if (empty($sentenceI) || empty($sentenceJ)) {
                        log_message('error', "buildSimilarityMatrix(): Missing sentence at index {$i} or {$j}.");
                        continue;
                    }
    
                    $matrix[$i][$j] = $this->calculateSimilarity($sentenceI, $sentenceJ, $wordFrequencies);
                }
            }
        }
    
        return $matrix;
    }

    private function cacheScrapedLink($link, $content)
    {
        $this->marketingModel->cacheScrapedLink([
            'url' => $link,
            'content' => $content,
            'last_enriched_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function calculateCosineSimilarity($text1, $text2)
    {
        $tokenizer = new NlpWhitespaceTokenizer();
        $cosine = new CosineSimilarity();
        $set1 = $tokenizer->tokenize($text1);
        $set2 = $tokenizer->tokenize($text2);
        $similarity = $cosine->similarity($set1, $set2);
        $this->logger->debug('Cosine Similarity: ' . $similarity);
        return $similarity;
    }

    private function calculateFeatureScore($sentence, $features)
    {
        $score = 0;
        $words = explode(" ", strtolower($sentence));
        foreach ($words as $word) {
            $score += $features[$word] ?? 0.1; // Default score if feature not found
        }
        return $score;
    }

    private function calculateKeywordScore($sentence, $tokens)
    {
        $score = 0;
        foreach ($tokens as $token) {
            if (strpos(strtolower($sentence), strtolower($token)) !== false) {
                $score++;
            }
        }
        $this->logger->debug('Keyword Score for sentence: ' . $score);
        return $score;
    }

    private function calculateSemanticDiversity($sentence, $summary, $tokens)
    {
        $diversityScore = 0;
        foreach ($summary as $summarizedSentence) {
            if ($this->isSemanticallyDifferent($sentence, $summarizedSentence, $tokens)) {
                $diversityScore++;
            }
        }
        $this->logger->debug('Semantic Diversity Score for sentence: ' . $diversityScore);
        return $diversityScore;
    }
    
    private function calculateSimilarity($sentence1, $sentence2, $wordFrequencies)
    {
        $sentence1 = is_string($sentence1) ? strtolower($sentence1) : '';
        $sentence2 = is_string($sentence2) ? strtolower($sentence2) : '';
    
        $words1 = array_unique(str_word_count($sentence1, 1));
        $words2 = array_unique(str_word_count($sentence2, 1));
        $commonWords = array_intersect($words1, $words2);
    
        $score = 0;
        foreach ($commonWords as $word) {
            $score += (float) ($wordFrequencies[$word] ?? 0);
        }
    
        $logWordCount1 = count($words1) > 0 ? log(count($words1)) : 0;
        $logWordCount2 = count($words2) > 0 ? log(count($words2)) : 0;
    
        if ($logWordCount1 + $logWordCount2 == 0) {
            return 0;
        }
    
        return $score / ($logWordCount1 + $logWordCount2);
    }    
    
    private function calculateWordFrequencies($content, $stopWords)
    {
        $frequencies = [];
        $words = preg_split('/\s+/', strtolower($content));
        foreach ($words as $word) {
            if (!in_array($word, $stopWords) && strlen($word) > 1) {
                $frequencies[$word] = ($frequencies[$word] ?? 0) + 1;
            }
        }
        arsort($frequencies);
        return $frequencies;
    }
    
    public function checkPlagiarismRisk(string $sourceText, string $generatedText): array
    {
        $cosine = $this->calculateCosineSimilarity($sourceText, $generatedText);
        $overlap = similar_text(strip_tags($sourceText), strip_tags($generatedText), $percent);
        $sourceTextSentences = $this->splitIntoSentences($sourceText); 
        $generatedTextSentences = $this->splitIntoSentences($generatedText); 
        $keywordMatch = count(array_intersect(
            $this->extractKeywords($sourceTextSentences),
            $this->extractKeywords($generatedTextSentences)
        ));
        
        return [
            'cosine_similarity' => round($cosine, 3),
            'textual_overlap_percent' => round($percent, 2),
            'shared_keywords' => $keywordMatch,
            'is_risky' => ($cosine > 0.85 || $percent > 75 || $keywordMatch >= 7)
        ];
    }
    
    public function cleanHtmlSummaryPreview($text)
    {
        return preg_replace(['/=3D/', '/=20/', '/=E2=80=94/', '/=E2=80=99/', '/=E2=80=A6/'], ['=', ' ', '—', '’', '...'], $text);
    }
    
    private function cleanText($text) {
        $text = $this->decodeSpecialCharacters($text);
        $text = $this->sanitizeRawEmailContent($text);
        return $this->normalizeUtf8(strip_tags($text));
    }    

    public function cleanTitle(string $rawTitle): string
    {
        $clean = $rawTitle;
        $clean = str_replace(['_', '-'], ' ', $clean);          // Replace underscores and dashes with space
        $clean = preg_replace('/\s+/', ' ', $clean);             // Collapse multiple spaces
        $clean = html_entity_decode($clean, ENT_QUOTES | ENT_HTML5, 'UTF-8'); // Decode HTML entities
        $clean = preg_replace('/[^\w\s.,!?\'"()-]/u', '', $clean); // Remove weird characters except punctuation
        $clean = trim($clean);
    
        // Capitalize properly if it got smashed
        if (strlen($clean) < 150 && !preg_match('/[a-z]\s[A-Z]/', $clean)) {
            $clean = ucwords(strtolower($clean));
        }
    
        return $clean;
    }
    
    private function combineScores($featureScore, $keywordScore, $pageRankScore, $semanticDiversityScore)
    {
        $featureScore = is_numeric($featureScore) ? (float)$featureScore : 0.0;
        $keywordScore = is_numeric($keywordScore) ? (float)$keywordScore : 0.0;
        $pageRankScore = is_numeric($pageRankScore) ? (float)$pageRankScore : 0.0;
        $semanticDiversityScore = is_numeric($semanticDiversityScore) ? (float)$semanticDiversityScore : 0.0;
    
        $combinedScore = 0.4 * $featureScore + 0.2 * $keywordScore + 0.3 * $pageRankScore + 0.1 * $semanticDiversityScore;
        $this->logger->debug('✅ Combined Score for sentence: ' . $combinedScore);
        return $combinedScore;
    }   
    
    private function compressEmailBody($body)
    {
        // Replace multiple whitespaces (tabs, newlines) with a single space
        $body = preg_replace('/\s+/', ' ', $body);
        return trim($body);
    }

    public function convertToUtf8($content)
    {
        $encoding = mb_detect_encoding($content, "UTF-8, ISO-8859-1, GBK", true);
        return ($encoding == "UTF-8") ? $content : mb_convert_encoding($content, "UTF-8", $encoding);
    }
    
    public function convertUrlsToLinks($text)
    {
        $urlPattern = '/\bhttps?:\/\/\S+/i';
        return preg_replace($urlPattern, '<a href="$0" target="_blank">$0</a>', $text);
    }
     

    public function decodeMimeHeaderSafe($string)
    {
        try {
            return mb_decode_mimeheader($string);
        } catch (\Throwable $e) {
            log_message('error', 'decodeMimeHeaderSafe() failed: '.$e->getMessage());
            return $string;
        }
    }

    public function debugTopKeywords($id)
    {
        $record = $this->marketingModel->find($id);
        if (!$record) {
            return $this->respond(['status' => 'error', 'message' => 'Record not found'], 404);
        }
    
        $keywords = $this->getTopKeywordScores($record['summary'] ?? $record['content']);
        return $this->respond([
            'status' => 'success',
            'keywords' => $keywords
        ]);
    }
    
    private function decodeSpecialCharacters($text)
    {
        return html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
    
    public function department()
    {
        
        $activeCampaigns = $this->marketingModel->getActiveCampaigns();
        $totalActiveCampaigns = $activeCampaigns['num_rows'];
        $activePriorityCampaigns = $this->marketingModel->getActivePriorityCampaigns();
        $totalActivePriorityCampaigns = $activePriorityCampaigns['num_rows'];
        return [
            'getActiveCampaigns' => $activeCampaigns['result'],
            'totalActiveCampaigns' => $totalActiveCampaigns,
            'getActivePriorityCampaigns' => $activePriorityCampaigns['result'],
            'totalActivePriorityCampaigns' => $totalActivePriorityCampaigns,
        ];
    }

    public function distributeGroupedContent(int $campaignId)
    {
        $campaign = $this->marketingModel->getCampaignById($campaignId)[0] ?? null;
        if (!$campaign) {
            log_message('error', "Campaign ID {$campaignId} not found.");
            return;
        }
    
        $message = $campaign['email_message'] ?? $campaign['summary'] ?? 'MyMI Digest';
    
        $platforms = json_decode($campaign['platforms'] ?? '{}', true);
    
        if ($platforms['discord'] ?? false) {
            $this->postToDiscord($message);
        }
    
        if ($platforms['linkedin'] ?? false) {
            $this->postToLinkedIn($message);
        }
    
        if ($platforms['email'] ?? false) {
            $this->emailService->setTo('newsletter@mymiwallet.com');
            $this->emailService->setSubject('📬 MyMI Daily Digest');
            $this->emailService->setMessage(nl2br($message));
            $this->emailService->send();
        }
    
        // ✅ Optional: Send to Zapier
        $payload = [
            'title' => $campaign['name'],
            'message' => $message,
            'platforms' => array_keys(array_filter($platforms)),
            'campaign_id' => $campaignId,
            'link' => site_url('Blog/View/' . url_title($campaign['name'], '-', true)),
        ];
        $this->sendToZapier('grouped_digest', $payload);
    }
    
    public function distributeTradeAlert($alert, $action = 'BUY')
    {
        $message = $this->generateTradeAlertMessage($alert, $action);
    
        // Post to each platform
        $this->postToDiscord($message);
        $this->postToTwitter($message);
        $this->postToFacebook($message);
        $this->postToLinkedIn($message);
    }

    public function enqueueEmailJob($emailData)
    {
        
        $data = ['type' => 'email_processing', 'data' => json_encode($emailData)];
        $this->marketingModel->insertJobQueue($data);
    }
    
    public function enrichTradeAlertsBySymbol(string $symbol): bool
    {
        helper(['text']);
    
        $model = new \App\Models\MarketingModel();
    
        // Step 1: Pull trade alert
        $alert = $model->getLatestAlertBySymbol($symbol);
        if (empty($alert)) {
            log_message('warning', "📉 No trade alert found for symbol: {$symbol}");
            return false;
        }
    
        // Step 2: Build base text from alert
        $baseText = implode(' ', array_filter([
            $alert['symbol'],
            $alert['summary'],
            $alert['category'],
            $alert['market_sentiment'],
            $alert['strategy'],
            $alert['note']
        ]));
    
        // Step 3: Keyword extract and search
        $keywords = $this->extractKeywords($baseText);
        $query = implode(' ', $keywords);
        $topLinks = $this->getTopLinks($query);
    
        foreach ($topLinks as $url) {
            $cached = $model->getCachedLink($url);
            if ($cached && strtotime($cached['last_enriched_at']) > strtotime('-1 day')) {
                $baseText .= ' ' . $cached['content'];
                continue;
            }
    
            $scraped = $this->scrapeUrlContent($url);
            if ($scraped) {
                $baseText .= ' ' . $scraped;
                $model->cacheScrapedLink($url, $scraped);
            }
        }
    
        $summary = $this->summarizeText($baseText);
        $hashtags = $this->extractHashtags($baseText);
    
        // Step 4: Voice script regeneration
        $voiceScript = "Trade Alert Summary for {$symbol}: {$summary}";
    
        // Step 5: Save enriched post
        return $model->insertGeneratedContent([
            'alert_id' => $alert['id'],
            'title' => "Enriched Trade Alert: {$symbol}",
            'description' => $alert['summary'],
            'platform' => 'multi',
            'voice_script' => $voiceScript,
            'facebook_message' => $summary,
            'linkedin_message' => $summary,
            'discord_message' => $summary,
            'email_message' => $summary,
            'stocktwits_message' => $summary,
            'tiktok_message' => $summary,
            'youtube_message' => $summary,
            'hashtags' => $hashtags,
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function exportCapCutJsonTemplate($mediaPackage)
    {
        $template = [
            'title' => 'MyMI Advisor Notes',
            'subtitle' => 'AI-Powered Financial Briefing',
            'audio_url' => $mediaPackage['voiceover_url'],
            'text_overlays' => [
                [
                    'text' => $mediaPackage['script'],
                    'start' => 0,
                    'duration' => 15,
                    'position' => 'bottom',
                    'font' => 'Roboto',
                    'size' => 24
                ]
            ],
            'background_chart' => base_url('static/sample_chart.jpg'), // Replace with generated chart
            'created_at' => date('c')
        ];

        $filename = WRITEPATH . 'capcut_templates/advisor_' . $mediaPackage['user_id'] . '.json';
        file_put_contents($filename, json_encode($template, JSON_PRETTY_PRINT));

        return base_url('writable/capcut_templates/' . basename($filename));
    }

    public function exportVisualPackage($id): string
    {
        $record = $this->marketingModel->getStoryboardRecord($id);
        $package = [
            'title' => $record['title'],
            'voiceover' => $record['voiceover_text'],
            'slides' => json_decode($record['storyboard_json'], true),
            'keywords' => explode(',', $record['keywords']),
            'platforms' => explode(',', $record['platforms']),
        ];
        return json_encode($package, JSON_PRETTY_PRINT);
    }    
    
    public function extractFeaturesWithPhpMl($content)
    {
        $vectorizer = new PhpmlTokenCountVectorizer(new WhitespaceTokenizer());
        $samples = [$content];
        $vectorizer->fit($samples);
        $vectorizer->transform($samples);
    
        $features = $vectorizer->getVocabulary();
        $vectorCounts = $samples[0] ?? [];
        $filteredFeatures = [];
    
        foreach ($features as $feature => $index) {
            $score = $vectorCounts[$index] ?? 0;
            if ($score >= 2) {
                $filteredFeatures[$feature] = $score;
            }
        }
    
        $this->logger->debug('MyMIMarketing L751 - Filtered Feature Vectors (Score ≥ 2): ' . print_r($filteredFeatures, true));
        return $filteredFeatures;
    }    

    /**
     * Dynamically extract top hashtags from content
     */
    public function extractHashtags(string $text): string
    {
        $words = str_word_count(strtolower(strip_tags($text)), 1);
        $wordFreq = array_count_values($words);
    
        $filtered = array_filter($wordFreq, fn($freq, $word) => strlen($word) > 3 && $freq > 1 && preg_match('/^[a-z]+$/i', $word), ARRAY_FILTER_USE_BOTH);
        arsort($filtered);
    
        $topWords = array_slice(array_keys($filtered), 0, 5);
        $hashtags = array_map(fn($word) => '#' . ucfirst($word), $topWords);
    
        // Final filter to ensure no weird hashtags like "#-"
        $cleanHashtags = array_filter($hashtags, fn($tag) => strlen($tag) > 2 && preg_match('/^#[a-zA-Z]+$/', $tag));
        return implode(' ', $cleanHashtags);
    }

    private function extractTopSentences($sentences, $scores, $topN = 5)
    {
        https://www.xnxx.com/porn-maker/familystrokesasort($scores, SORT_NUMERIC);
        $topSentenceIndexes = array_keys(array_slice($scores, -$topN, $topN, true));
        $summary = [];
        foreach ($topSentenceIndexes as $index) {
            $summary[] = trim($sentences[$index]);
        }
        return $summary;
    }
    
    public function extractKeywords(array $sentences, array $fallback = [], array $alertContext = []): array
    {
        // 🔄 If a string was passed (by accident or fallback), auto-convert
        if (is_string($sentences)) {
            $sentences = $this->splitIntoSentences($sentences);
        }

        if (!is_array($sentences)) {
            log_message('error', '⚠️ extractKeywords() received invalid sentence format.');
            return $fallback;
        }

        if (empty($sentences) && !empty($alertContext['summary'])) {
            $sentences = $this->splitIntoSentences($alertContext['summary']);
        }
        // 1️⃣ Force context into TF-IDF if sentence data is too weak
        $forcedDocs = array_filter([
            strtolower($alertContext['ticker'] ?? ''),
            strtolower($alertContext['symbol'] ?? ''),
            strtolower($alertContext['exchange'] ?? ''),
            strtolower($alertContext['market_sentiment'] ?? ''),
            strtolower($alertContext['category'] ?? ''),
            strtolower($alertContext['company'] ?? ''),
            strtolower($alertContext['trade_type'] ?? ''),
        ], fn($val) => !empty($val) && $val !== 'n/a' && $val !== 'unknown alert type');
    
        // Break company name into words
        if (!empty($alertContext['company'])) {
            foreach (explode(' ', strtolower($alertContext['company'])) as $word) {
                if (ctype_alpha($word) && strlen($word) >= 4) {
                    $forcedDocs[] = $word;
                }
            }
        }
    
        // 2️⃣ Sanitize sentence input
        $documents = array_map(function ($doc) {
            $clean = mb_convert_encoding($doc, 'UTF-8', 'UTF-8');
            $clean = preg_replace('/[^\PC\s]/u', '', $clean); // remove control characters
            return strtolower(trim($clean));
        }, $sentences);
    
        $documents = array_filter($documents, fn($doc) => strlen($doc) > 10);
    
        // 3️⃣ Merge forced context into documents
        $documents = array_merge($forcedDocs, $documents);
        log_message('debug', '📊 extractKeywords(): Total document count: ' . count($documents));
    
        $topKeywords = [];
    
        try {
            if (count($documents) >= 2) {
                $tokenizer = new \Phpml\Tokenization\WhitespaceTokenizer();
                $vectorizer = new \Phpml\FeatureExtraction\TokenCountVectorizer($tokenizer);
                $tfidf = new \Phpml\FeatureExtraction\TfIdfTransformer();
    
                // Build vector space
                $vectorizer->fit($documents);
                $vectorizer->transform($documents);
                $tfidf->fit($documents);
                $tfidf->transform($documents);
    
                $vocabulary = $vectorizer->getVocabulary(); // [word => index]
                $keywordScores = [];
    
                foreach ($documents as $doc) {
                    if (!is_array($doc)) continue;
                    foreach ($doc as $index => $score) {
                        $word = array_search($index, $vocabulary, true);
                        if ($word !== false && !is_numeric($word) && strlen($word) > 2) {
                            $keywordScores[$word] = ($keywordScores[$word] ?? 0) + (float)$score;
                        }
                    }
                }
    
                arsort($keywordScores);
                $topKeywords = array_keys(array_slice($keywordScores, 0, 10, true));
            } else {
                log_message('warning', '⚠️ extractKeywords(): Too few documents for TF-IDF. Using fallback.');
            }
        } catch (\Throwable $e) {
            log_message('error', '❌ extractKeywords() Exception: ' . $e->getMessage());
        }
    
        // 4️⃣ Combine and finalize output
        $finalKeywords = array_unique(array_merge($topKeywords, $fallback, $forcedDocs));
        $finalKeywords = array_filter($finalKeywords, fn($kw) => strlen($kw) >= 3);
    
        log_message('debug', '📈 Final Keywords for Summary/Hashtags: ' . json_encode($finalKeywords));
        return array_slice($finalKeywords, 0, 10);
    }    
    
    private function fallbackKeywordExtraction(string $text): array
    {
        $words = str_word_count(strtolower($text), 1);
        $wordFreq = array_count_values($words);
        arsort($wordFreq);
    
        $filtered = array_filter(array_keys($wordFreq), function ($word) {
            return strlen($word) > 3 && preg_match('/^[a-z]+$/', $word); // Avoid symbols, numbers
        });
    
        $topFallback = array_slice($filtered, 0, 5);
        log_message('debug', '🪂 Fallback Keywords Used: ' . print_r($topFallback, true));
        return $topFallback;
    }  
    
    // public function extractKeywords($content, $maxKeywords = 5)
    // {
    //     if (!is_string($content)) {
    //         log_message('error', 'MyMIMarketing::extractKeywords() - Content must be a string.');
    //         return [];
    //     }
    
    //     $content = $this->normalizeUtf8($content);
    //     $sentences = $this->splitIntoSentences($content);
    
    //     if (empty($sentences)) {
    //         log_message('error', 'MyMIMarketing::extractKeywords() - No valid sentences to process.');
    //         return [];
    //     }
    
    //     $tfIdf = new TfIdfTransformer();
    //     $tokenized = [];
    
    //     foreach ($sentences as $i => $sentence) {
    //         $cleaned = strtolower($this->normalizeUtf8(trim($sentence)));
    //         $tokens = array_filter(explode(' ', $cleaned), fn($w) => strlen($w) > 1);
    //         if (!empty($tokens)) {
    //             $tokenized[] = $tokens;
    //         }
    //     }
    
    //     if (empty($tokenized) || !is_array($tokenized[0]) || empty($tokenized[0])) {
    //         log_message('error', '❌ extractKeywords() - Invalid or empty tokenized input: ' . json_encode($tokenized));
    //         return [];
    //     }
    
    //     try {
    //         $tfIdf->fit($tokenized);
    //         $tfIdf->transform($tokenized);
    //     } catch (\Throwable $e) {
    //         log_message('error', '❌ extractKeywords() - TF-IDF error: ' . $e->getMessage());
    //         return [];
    //     }
    
    //     $scores = [];
    //     foreach ($tokenized as $docIndex => $tokens) {
    //         foreach ($tokens as $token) {
    //             if (!is_string($token)) continue;
    //             $scores[$token] = ($scores[$token] ?? 0) + 1.0;
    //         }
    //     }
    
    //     if (empty($scores)) {
    //         log_message('error', '❌ extractKeywords() - No keyword scores generated.');
    //         return [];
    //     }
    
    //     arsort($scores);
    //     return array_slice(array_keys($scores), 0, $maxKeywords);
    // }
    
    public function extractSubtopics(string $text): array
    {
        $sentences = explode('.', $text);
        $chunks = array_chunk($sentences, 2); // Every 2 sentences = 1 subtopic
        $subtopics = [];
    
        foreach ($chunks as $chunk) {
            $summary = implode('. ', $chunk);
            $subtopics[] = trim($summary);
        }
    
        return $subtopics;
    }    

    public function fetchAndStoreEmails($emailType)
    {
        log_message('info', "MyMIMarketing fetchAndStoreEmails L865: Starting to fetch and store emails of type: {$emailType}");
    
        
        $emailCredentials = [
            'hostname' => '{imap.dreamhost.com:993/imap/ssl}INBOX',
            'username' => $emailType . '@mymiwallet.com',
            'password' => $this->APIs->emailPassword,
        ];
    
        $inbox = $this->retry(function () use ($emailCredentials) {
            return @imap_open(
                $emailCredentials['hostname'],
                $emailCredentials['username'],
                $emailCredentials['password']
            );
        });
    
        if (!$inbox) {
            $this->logger->error('MyMIMarketing fetchAndStoreEmails L865: Cannot connect to email server: ' . imap_last_error());
            return false;
        }
    
        try {
            $since = date("d-M-Y", strtotime("-1 days"));
            $emails = imap_search($inbox, 'SINCE "' . $since . '"');
            $this->logger->debug('Emails fetched: ' . print_r($emails, true));
    
            // 🚀 Fast Mode: Preload today's processed email identifiers
            $processedEmailsToday = $this->marketingModel->getProcessedEmails(date('Y-m-d'));
            $processedIdentifiers = array_column($processedEmailsToday, 'email_identifier');
    
            if ($emails) {
                $config = \HTMLPurifier_Config::createDefault();
                $purifier = new \HTMLPurifier($config);
    
                foreach ($emails as $email_number) {
                    $overview = imap_fetch_overview($inbox, $email_number, 0);
                    $subject = $this->convertToUtf8($overview[0]->subject ?? '');
                    $date = date("Y-m-d H:i:s", strtotime($overview[0]->date));
                    $sender = $overview[0]->from ?? '';
                    $emailIdentifier = md5($subject . $date . $sender);
                    if ($this->isEmailAlreadyHandled($emailIdentifier)) {
                        log_message('info', "MyMIMarketing fetchAndStoreEmails L907 - � Skipping duplicate email: {$emailIdentifier}");
                        continue;
                    }                    
    
                    $emailBody = imap_fetchbody($inbox, $email_number, 1);
                    if (empty(trim($emailBody))) {
                        log_message('error', "Email body is empty for email #{$email_number}");
                        continue;
                    }
    
                    $decodedMessage = $this->decodeSpecialCharacters($emailBody);
                    $sanitizedBody = $purifier->purify($decodedMessage);
                    $compressedBody = $this->compressEmailBody($sanitizedBody);
                    $compressedBody = mb_substr($compressedBody, 0, 60000); // Truncate to 60K chars
    
                    $textOnlyContent = $this->stripHtmlTags($sanitizedBody);
                    $summaryArray = $this->summarizeContent($textOnlyContent);
    
                    if (is_array($summaryArray)) {
                        $summaryString = $summaryArray['summary'] ?? implode('. ', array_map('strval', $summaryArray));
                        $features = $summaryArray['features'] ?? [];
                        $tokens = $summaryArray['tokens'] ?? [];
                        $sentences = $summaryArray['sentences'] ?? [];
                    } else {
                        $summaryString = strval($summaryArray);
                        $features = $tokens = $sentences = [];
                    }
    
                    // ANALYTICS: Calculate and log feature, keyword, and diversity scores
                    $featureScore = $this->calculateFeatureScore($summaryString, $features);
                    $keywordScore = $this->calculateKeywordScore($summaryString, $tokens);
                    $semanticDiversityScore = $this->calculateSemanticDiversity($summaryString, $sentences, $tokens);
                    log_message('info', "MyMIMarketing fetchAndStoreEmails L939 - Analytics: FeatureScore={$featureScore}, KeywordScore={$keywordScore}, SemanticDiversity={$semanticDiversityScore}");
    
                    // 🛠️ Add fallback title and URL before insert
                    $fallbackTitle = !empty($subject) ? $subject : 'Untitled Email';
                    $fallbackUrl            = $this->generateEmailFallbackUrl($subject, $emailIdentifier);

                    $email_data             = [
                        'status'            => 'In Review',
                        'type'              => $emailType === 'alerts' ? 'Trade Alerts' : 'Email/Newsletters',
                        'summary'           => $summaryString,
                        'content'           => $textOnlyContent,
                        'email_date'        => $date,
                        'email_subject'     => $subject,
                        'email_body'        => $compressedBody,
                        'email_sender'      => $sender,
                        'created_on'        => date("Y-m-d H:i:s"),
                        'modified_on'       => date("Y-m-d H:i:s"),
                        'email_identifier'  => $emailIdentifier,
                        'scraped_at'        => date("Y-m-d H:i:s"),
                        'title'             => $fallbackTitle,
                        'url'               => $fallbackUrl, // 👈 inject URL here
                    ];

                    $this->marketingModel->storeEmail($email_data);
    
                    // Store analytics for categorization
                    $analyticsData = [
                        'email_identifier' => $emailIdentifier,
                        'feature_score' => $featureScore,
                        'keyword_score' => $keywordScore,
                        'semantic_diversity_score' => $semanticDiversityScore,
                        'created_on' => date("Y-m-d H:i:s")
                    ];
                    $this->marketingModel->storeContentAnalytics([
                        'source_type'               => 'email',
                        'source_identifier'         => $emailIdentifier,
                        'feature_score'             => $featureScore,
                        'keyword_score'             => $keywordScore,
                        'semantic_diversity_score'  => $semanticDiversityScore,
                        'created_on'                => date("Y-m-d H:i:s")
                    ]);                    
    
                    log_message('info', "MyMIMarketing fetchAndStoreEmails L981 - Stored email and analytics: {$emailIdentifier}");
                }
            } else {
                log_message('info', 'MyMIMarketing fetchAndStoreEmails L984 - No new emails found.');
            }
        } catch (\Exception $e) {
            log_message('error', 'MyMIMarketing fetchAndStoreEmails L987 - Exception occurred: ' . $e->getMessage());
            $this->notifyAdminOnError('Email Fetch Exception - MyMIMarketing fetchAndStoreEmails L988', $e->getMessage());
        } finally {
            imap_close($inbox);
        }
    }
    
    private function fetchGoogleResults(string $query): array
    {
        $encoded = urlencode($query);
        $url = "https://www.google.com/search?q={$encoded}";
        $client = new Client([
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
            ],
            'verify' => false,
            'timeout' => 5.0,
        ]);
    
        try {
            $response = $client->get($url);
            $html = $response->getBody()->getContents();
    
            preg_match_all('/<a href="\/url\?q=([^"]+)&amp;/', $html, $matches);
            $links = array_slice(array_unique($matches[1]), 0, 5);
            return $links;
        } catch (RequestException $e) {
            log_message('error', '❌ Google fetch error: ' . $e->getMessage());
            return [];
        }
    }
    
    public function fetchRecentFinancialNews(string $symbol): array
    {
        $apiKey = getenv('MARKETAUX_API_KEY') ?: $this->APIs->marketAuxApiKey;
        if (empty($apiKey)) {
            log_message('critical', 'fetchRecentFinancialNews - Missing MARKETAUX_API_KEY');
            return ['summary' => 'News unavailable.', 'sentiment' => 'Neutral'];
        }
        
        $endpoint = 'https://api.marketaux.com/v1/news/all';

        try {
            $response = $this->client->get($endpoint, [
                'query' => [
                    'symbols' => $symbol,
                    'filter_entities' => 'true',
                    'language' => 'en',
                    'page_size' => 5,
                    'api_token' => $apiKey
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            if (empty($data['data'])) {
                return ['summary' => 'No news found.', 'sentiment' => 'Neutral'];
            }

            // Use the top article to summarize + sentiment
            $topArticle = $data['data'][0];
            $summary = $topArticle['description'] ?? $topArticle['title'] ?? 'News available.';
            $sentiment = $topArticle['sentiment'] ?? 'Neutral'; // Some APIs include this

            return [
                'summary' => strip_tags($summary),
                'sentiment' => ucfirst($sentiment),
                'url' => $topArticle['url'] ?? null,
                'headline' => $topArticle['title'] ?? null,
            ];
        } catch (\Throwable $e) {
            log_message('error', 'fetchRecentFinancialNews failed: ' . $e->getMessage());
            return ['summary' => 'News unavailable.', 'sentiment' => 'Neutral'];
        }
    }

    public function formatBlogPost(string $headline, string $summary): string
    {
        return <<<HTML
    <h2>{$headline}</h2>
    <p>{$summary}</p>
    <p>Get the full breakdown inside your MyMI Wallet dashboard, where investing meets innovation.</p>
    HTML;
    }
    
    public function formatEmailBlast(string $headline, string $summary): string
    {
        return <<<EMAIL
    Subject: {$headline}
    
    {$summary}
    
    Explore more at https://www.mymiwallet.com
    EMAIL;
    }
    
    public function formatSocialPost(string $headline, string $summary, string $platform = 'generic'): string
    {
        $hashtags = '#MyMIWallet #InvestSmarter #FinancialFreedom';
        switch ($platform) {
            case 'facebook':
            case 'linkedin':
                return "{$headline}\n\n{$summary}\n\nStart your journey: https://www.mymiwallet.com\n\n{$hashtags}";
            case 'twitter':
            case 'x':
                $shortSummary = substr($summary, 0, 180);
                return "{$headline} — {$shortSummary}...\nhttps://www.mymiwallet.com\n{$hashtags}";
            default:
                return "{$headline}\n\n{$summary}\nhttps://www.mymiwallet.com";
        }
    }
    
    public function formatDiscordPost(string $headline, string $summary): string
    {
        return "**{$headline}**\n\n{$summary}\n\n👉 <https://www.mymiwallet.com>";
    }
    
    // private function normalizeUtf8($text)
    // {
    //     return is_string($text) ? mb_convert_encoding($text, 'UTF-8', 'UTF-8') : '';
    // }

    private function normalizeUtf8($text)
    {
        return mb_convert_encoding($text, 'UTF-8', mb_detect_encoding($text, 'UTF-8, ISO-8859-1', true));
    }

    private function notifyAdminOnError($subject, $message)
    {
        $this->emailService->setFrom('no-reply@mymiwallet.com', 'MyMI Wallet');
        $this->emailService->setTo('team@mymiwallet.com');
        $this->emailService->setSubject($subject);
        $this->emailService->setMessage($message);

        if (!$this->emailService->send()) {
            $this->logger->error('Failed to send error notification email: ' . print_r($this->emailService->printDebugger(), true));
        }
    }

    public function notifyModerators(array $post)
    {
        $platforms = json_decode($post['platforms'] ?? '{}', true);
        $used = implode(', ', array_keys(array_filter($platforms)));
    
        $subject = "📢 Buffer Post Promoted: {$post['keyword']}";
        $message = "✅ Post ID: {$post['id']}\n\n"
                 . "Summary: " . wordwrap($post['summary'], 80) . "\n\n"
                 . "Promoted Platforms: {$used}\n\n"
                 . site_url('Marketing/PreviewGeneratedPost/' . $post['id']);
    
        $email = \Config\Services::email();
        $email->setTo('moderators@mymiwallet.com');
        $email->setSubject($subject);
        $email->setMessage($message);
        $email->send();
    
        log_message('info', "📬 Sent moderator alert for Buffer ID {$post['id']}");
    }
    
    public function reprocessIncompleteEmails()
    {
        $incompleteRecords = $this->marketingModel->getEmailsMissingTitleOrUrl(20); // Add this method to model
        log_message('debug', '📋 MyMIMarketing L986 - Incomplete records fetched: ' . count($incompleteRecords));
        foreach ($incompleteRecords as $record) {
            try {
                $emailId = $record['message_id'] ?? null;
                $content = $record['content'] ?? '';
                $title = $record['title'] ?? '';
                $url = $record['url'] ?? $this->generateEmailFallbackUrl($subject, $emailIdentifier) ?? '';
    
                if (!$emailId) continue;
    
                $email = $this->fetchEmailByMessageId($emailId); // You can define a helper that uses IMAP
                if ($email) {
                    $content = $email['body'] ?? $content;
                    $title = $email['subject'] ?? $title;
                    $url = $email['link'] ?? $url;
                }
    
                // Use fallback if missing
                $title = $title ?: 'Untitled Email - ' . date('Y-m-d H:i');
                $url = $url ?: 'https://mymiwallet.com/news/fallback';
    
                $this->marketingModel->updateEmailFields($record['id'], $title, $url, $content);
            } catch (\Throwable $e) {
                log_message('error', '❌ Error backfilling email ID ' . $record['id'] . ': ' . $e->getMessage());
            }
        }
    }
    
    private function retry($function, $attempts = 3, $delay = 2000)
    {
        $attempt = 0;
        while ($attempt < $attempts) {
            try {
                return $function();
            } catch (Exception $e) {
                $attempt++;
                if ($attempt >= $attempts) {
                    throw $e;
                }
                sleep($delay / 1000);
            }
        }
    }
    
    protected function safeGetSentence(array $sentences, int $index): string
    {
        if (isset($sentences[$index])) {
            return $sentences[$index];
        } else {
            log_message('error', "safeGetSentence(): Index $index not found in sentence list.");
            return '';
        }
    }
    
    private function sanitizeContent($content)
    {
        // Remove script tags and their content
        $content = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $content);

        // Remove noscript tags and their content
        $content = preg_replace('#<noscript(.*?)>(.*?)</noscript>#is', '', $content);

        // Strip remaining HTML tags
        $content = strip_tags($content) ?? '';

        // Ensure space between sentences
        $content = preg_replace('/\.\s*/', '. ', $content);

        return $content;
    }

    /**
     * Sanitize email content and decode quoted-printable UTF-8 characters, emojis, and artifacts.
     */
    public function sanitizeRawEmailContent($content)
    {
        if (!is_string($content) || empty(trim($content))) {
            return '';
        }
        $content = preg_replace('/(unsubscribe|privacy policy|contact us|view in browser|email was sent to).*/is', '', $content);
        // Remove unwanted control characters and excessive equals signs
        $cleaned = preg_replace('/[\x00-\x1F\x7F]/u', '', $content);
        $cleaned = preg_replace('/=3D/', '=', $cleaned); // decode broken encoding
        $cleaned = quoted_printable_decode($cleaned);
        $cleaned = html_entity_decode($cleaned, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    
        // Remove style/script tags and body artifacts
        $cleaned = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $cleaned);
        $cleaned = preg_replace('#<style(.*?)>(.*?)</style>#is', '', $cleaned);
        $cleaned = preg_replace('#<[^>]+>#', ' ', $cleaned); // strip all HTML
        $cleaned = preg_replace('/\s+/', ' ', $cleaned);
    
        return trim($cleaned);
    }
    
    public function sanitizeSummary($summary)
    {
        $summary = strip_tags($summary);
        $summary = html_entity_decode($summary, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $summary = mb_convert_encoding($summary, 'UTF-8', 'auto');
        $summary = preg_replace('/[^\PC\s]/u', '', $summary); // Remove non-printable characters
        return trim($summary);
    }

    private function sanitizeText(string $text): string
    {
        return strip_tags(html_entity_decode($text));
    }

    public function saveTemporaryScrapedData($data) {
        $marketingModel = new \App\Models\MarketingModel();
        return $this->marketingModel->insertTemporaryData($data);
    }

    public function saveTradingViewChart($chartUrl, $ticker)
    {
        // Ensure the directory exists
        $saveDir = FCPATH . 'assets/images/Alerts/Charts/';
        if (!is_dir($saveDir)) {
            mkdir($saveDir, 0777, true);
        }
    
        // Define the filename based on the ticker and timestamp
        $timestamp = time();
        $filename = "{$ticker}_chart_{$timestamp}.jpg";
        $savePath = $saveDir . $filename;
    
        // Use cURL to download the image
        $ch = curl_init($chartUrl);
        $fp = fopen($savePath, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    
        // Check if the file was saved successfully
        if (file_exists($savePath)) {
            // Store only the filename in the database
            return $filename;
        } else {
            return null;
        }
    }
    
    /**
     * Scan the writable/MyMI-Media repository for newly created Markdown or
     * text files. When new files are found they will be summarized and inserted
     * into the marketing buffer, then moderators are notified for review.
     */
    public function scanMediaRepoForNewFiles(): void
    {
        $dir = WRITEPATH . 'MyMI-Media/Campaigns/';
        $mdFiles = glob($dir . '*/*.{md,txt}', GLOB_BRACE) ?: [];
        $processed = $this->marketingModel->getAllKnownFilePaths();

        foreach ($mdFiles as $file) {
            if (in_array($file, $processed)) {
                continue;
            }

            $content = file_get_contents($file);
            $summaryResult = $this->summarizeContent($content);
            $summary = is_array($summaryResult) ? ($summaryResult['summary'] ?? '') : $summaryResult;

            $recordId = $this->marketingModel->insertFinalScraper(
                ['id' => 0, 'title' => basename($file), 'file_path' => $file],
                ['summary' => $summary]
            );

            if ($recordId) {
                $this->notifyModerators([
                    'id' => $recordId,
                    'summary' => $summary,
                    'keyword' => basename($file),
                    'platforms' => json_encode([])
                ]);
            }
        }
    }

    public function scoreKeywordRelevance(string $keyword, string $summary): int
    {
        $keyword = strtolower($keyword);
        $summaryText = strtolower(strip_tags($summary));
        
        $totalWords = str_word_count($summaryText);
        if ($totalWords === 0) return 0;
    
        $matches = substr_count($summaryText, $keyword);
        $score = min(100, round(($matches / $totalWords) * 500)); // scale relevance to 100 max
    
        return $score;
    }
    
    public function scrapeAndGenerateContent($accountid, $category, $platform = null)
    {
        $generatedData = [];

        // Fetch token information based on category
        if ($category === 'Solana') {
            $this->solanaModel = new SolanaModel();
            $tokenInfo = $this->solanaModel->getTokenInfoByID($accountid);
        } else {
            $tokenInfo = [];
        }

        // Proceed if token information is available
        if (!empty($tokenInfo)) {
            $scrapedData = [];

            try {
                // Scrape content from token's website and social media
                log_message('debug', 'Attempting to scrape token content.');
                $scrapedData = $this->scrapeTokenContent($tokenInfo);
                log_message('debug', 'Scraped Data: ' . print_r($scrapedData, true));
            } catch (\GuzzleHttp\Exception\ClientException $e) {
                if ($e->getResponse()->getStatusCode() == 403) {
                    log_message('critical', '403 Forbidden encountered while scraping website: ' . $e->getMessage());
                } else {
                    log_message('critical', 'ClientException: ' . $e->getMessage());
                }
            } catch (\Exception $e) {
                log_message('critical', 'An error occurred while scraping token content: ' . $e->getMessage());
            }

            try {
                // Generate content from the scraped data
                if (!empty($scrapedData)) {
                    log_message('debug', 'Attempting to generate content from scraped data.');
                    $generatedData = $this->generateContentFromScrapedData($scrapedData, $platform);
                    log_message('debug', 'Generated Data: ' . print_r($generatedData, true));
                } else {
                    log_message('debug', 'Scraped data is empty.');
                }
            } catch (\Exception $e) {
                log_message('critical', 'An error occurred while generating content: ' . $e->getMessage());
            }
        } else {
            log_message('debug', 'Token information is empty.');
        }

        return $generatedData;
    }
    
    public function scrapeTokenContent($tokenInfo)
    {
        $scrapedData = [];
        foreach ($tokenInfo as $token) {
            if (!empty($token['website'])) {
                log_message('debug', 'MyMIMarketing L101 - $token[website]: ' . $token['website']);
                $websiteData = $this->scrapeWebsite($token['website']);
                log_message('debug', 'MyMIMarketing L103 - $websiteData: ' . print_r($websiteData, true));
                $this->storeTemporaryData($websiteData);
                $scrapedData[] = $websiteData;
            }
            if (!empty($token['facebook'])) {
                log_message('debug', 'MyMIMarketing L109 - $token[facebook]: ' . $token['facebook']);
                $facebookData = $this->scrapeFacebook($token['facebook']);
                log_message('debug', 'MyMIMarketing L111 - $facebookData: ' . print_r($facebookData, true));
                $this->storeTemporaryData($facebookData);
                $scrapedData[] = $facebookData;
            }
            if (!empty($token['twitter'])) {
                log_message('debug', 'MyMIMarketing L117 - $token[twitter]: ' . $token['twitter']);
                $twitterData = $this->scrapeTwitter($token['twitter']);
                log_message('debug', 'MyMIMarketing L119 - $twitterData: ' . print_r($twitterData, true));
                $this->storeTemporaryData($twitterData);
                $scrapedData[] = $twitterData;
            }
            log_message('debug', 'MyMIMarketing L117 - $token[symbol] $token[name]: ' . $token['symbol'] . ' ' . $token['coin_name']);
            $googleData = $this->scrapeGoogleSearch($token['symbol'] . ' ' . $token['coin_name']);
            $this->storeTemporaryData($googleData);
            $scrapedData[] = $googleData;
        }
        return $scrapedData;
    }

    private function scrapeUrlContent(string $url): ?string
    {
        $client = new Client([
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
            ],
            'verify' => false,
            'timeout' => 8.0,
        ]);
    
        try {
            $response = $client->get($url);
            $html = $response->getBody()->getContents();
            $cleanText = strip_tags($html);
    
            // Limit text to avoid overload
            return substr($cleanText, 0, 5000);
        } catch (RequestException $e) {
            log_message('error', '❌ Scrape error for ' . $url . ': ' . $e->getMessage());
            return null;
        }
    }
    
    private function scrapeWebsite($url)
    {
        try {
            $client = new Client();
            $response = $client->get($url);
            if ($response->getStatusCode() == 200) {
                $html = $response->getBody()->getContents();
                $crawler = new \Symfony\Component\DomCrawler\Crawler($html);
                return [
                    'title' => $crawler->filter('title')->text(),
                    'content' => $this->sanitizeContent($crawler->filter('body')->html()),
                ];
            }
        } catch (RequestException $e) {
            $this->logger->error('Error scraping website: ' . $e->getMessage());
        }
        return [];
    }

    private function scrapeFacebook($url)
    {
        return $this->scrapeWithRetries('facebook', $url, function($content) {
            return [
                'title' => $content['page_title'] ?? 'No title',
                'content' => $this->sanitizeContent($content['posts'] ?? 'No posts'),
            ];
        });
    }

    private function scrapeTwitter($url)
    {
        return $this->scrapeWithRetries('twitter', $url, function($content) {
            return [
                'title' => $content['profile'] ?? 'No title',
                'content' => $this->sanitizeContent($content['tweets'] ?? 'No tweets'),
            ];
        });
    }

    private function scrapeWithRetries($type, $url, $transform, $retries = 3) {
        $backoff = 1;
        for ($i = 0; $i < $retries; $i++) {
            try {
                $response = $this->scrapemax->scrape(['target_url' => $url, 'type' => 'data', 'js_enabled' => 1, 'base64_encoded' => 0]);
                $content = json_decode($response->getBody()->getContents(), true);
                if (empty($content)) {
                    throw new \Exception("No content returned");
                }
                return $transform($content);
            } catch (ServerException $e) {
                if ($i < $retries - 1) {
                    sleep($backoff);
                    $backoff *= 2;
                    continue;
                }
                $this->logger->error("Error scraping $type: " . $e->getMessage());
            } catch (RequestException $e) {
                $this->logger->error("Error scraping $type: " . $e->getMessage());
                break;
            } catch (\Exception $e) {
                $this->logger->error("General error scraping $type: " . $e->getMessage());
                break;
            }
        }
        return ['title' => 'No title', 'content' => 'No content'];
    }    

    private function scrapeGoogleSearch($query)
    {
        // 1) Prefer Pscrape backend if it is available
        if ($this->pscrape) {
            try {
                $results     = $this->pscrape->rollingCurl('rollingCurl');
                $results->request('https://www.google.com/search?q=' . urlencode($query));
                $content     = '';
                $resultsData = $results->execute();

                if (!is_array($resultsData)) {
                    throw new \Exception("Google search did not return an array");
                }

                foreach ($resultsData as $result) {
                    // Defensive guards for unexpected structure
                    $title = $result['title'] ?? '';
                    $link  = $result['link']  ?? '';
                    $content .= trim($title . ' ' . $link) . ' ';
                }

                return [
                    'title'   => 'Google Search Results for ' . $query,
                    'content' => $this->sanitizeContent($content),
                ];
            } catch (\Throwable $e) {
                $this->logger->error('Error scraping Google Search via Pscrape: ' . $e->getMessage());
                // fall through to fallback below
            }
        }

        // 2) Fallback: simple link list using existing Guzzle-based helper
        try {
            $links = $this->fetchGoogleResults($query); // already defined earlier in this class

            if (empty($links)) {
                return [];
            }

            $content = implode(' ', $links);

            return [
                'title'   => 'Google Search Links for ' . $query,
                'content' => $this->sanitizeContent($content),
            ];
        } catch (\Throwable $e) {
            $this->logger->error('Error scraping Google Search fallback: ' . $e->getMessage());
            return [];
        }
    }


    public function sendMediaToZapier($media)
    {
        $webhook = config('Zapier')->advisorMediaWebhook;

        $payload = [
            'user_id' => $media['user_id'],
            'summary' => $media['summary'],
            'audio' => $media['voiceover_url'],
            'score' => $media['score'],
            'risk_rating' => $media['risk_rating'],
            'capcut_json_url' => $this->exportCapCutJsonTemplate($media),
            'platform' => 'Discord' // or 'TikTok', etc.
        ];

        try {
            $client = \Config\Services::curlrequest();
            $client->post($webhook, ['json' => $payload]);
            return true;
        } catch (\Throwable $e) {
            log_message('error', 'Zapier webhook failed: ' . $e->getMessage());
            return false;
        }
    }

    public function sendScheduledPosts()
    {
        $posts = $this->marketingModel->getScheduledPosts(now());
        foreach ($posts as $post) {
            $this->sendToZapier($post->id);
            $this->marketingModel->markAsPublished($post->id);
        }
    }

    public function sendWalkthroughInviteToActiveUsers()
    {
        $userModel = new \App\Models\UserModel();
        $users = $userModel->getActiveUsersForWalkthrough();

        helper('email');

        foreach ($users as $user) {
            $email = \Config\Services::email();
            $email->setTo($user['email']);
            $email->setSubject('� Need a Walkthrough of MyMI Wallet?');
            $message = view('emails/Marketing/active_walkthrough_invite', ['user' => $user]);
            $email->setMessage($message);
            $email->setMailType('html');
            $email->send();
        }
    }
    
    public function sendZapierTradeAlert($tradeAlert) {
        $zapierWebhookUrl = "YOUR_ZAPIER_WEBHOOK_URL";
    
        $payload = json_encode([
            'ticker' => $tradeAlert['ticker'],
            'price' => $tradeAlert['price'],
            'sentiment' => $tradeAlert['market_sentiment'],
            'chart_link' => $tradeAlert['link'],
            'created_on' => $tradeAlert['created_on']
        ]);
    
        $ch = curl_init($zapierWebhookUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
    
        return $response;
    }
    
    public function smartSearchWithThrottle(string $query): array
    {
        $model = new \App\Models\MarketingModel();
        $bingCooldown = 864;   // seconds
        $googleCooldown = 864; // seconds
    
        $now = time();
        $lastBing = strtotime($model->getLastSearchTimestamp('bing') ?? '2000-01-01');
        $lastGoogle = strtotime($model->getLastSearchTimestamp('google') ?? '2000-01-01');
    
        $useBing = ($now - $lastBing) > $bingCooldown;
        $useGoogle = ($now - $lastGoogle) > $googleCooldown;
    
        $results = [];
    
        if ($useBing) {
            try {
                $apiKey = getenv('BING_API_KEY');
                $url = 'https://api.bing.microsoft.com/v7.0/search?q=' . urlencode($query);
                $client = \Config\Services::curlrequest();
                $response = $client->get($url, [
                    'headers' => ['Ocp-Apim-Subscription-Key' => $apiKey]
                ]);
                $data = json_decode($response->getBody(), true);
                $results = array_map(function ($item) {
                    return [
                        'title' => $item['name'] ?? '',
                        'snippet' => $item['snippet'] ?? '',
                        'thumbnail' => $item['thumbnailUrl'] ?? '',
                        'url' => $item['url'] ?? ''
                    ];
                }, $data['webPages']['value'] ?? []);
    
                $model->logSearchApiRequest($query, 'bing', true, $response->getStatusCode());
                return $results;
            } catch (\Throwable $e) {
                log_message('error', '[BING FAILOVER] ' . $e->getMessage());
                $model->logSearchApiRequest($query, 'bing', false);
            }
        }
    
        if ($useGoogle) {
            try {
                $apiKey = getenv('GOOGLE_API_KEY');
                $cx = getenv('GOOGLE_SEARCH_ENGINE_ID');
                $url = "https://www.googleapis.com/customsearch/v1?q=" . urlencode($query) . "&key={$apiKey}&cx={$cx}";
                $client = \Config\Services::curlrequest();
                $response = $client->get($url);
                $data = json_decode($response->getBody(), true);
                $results = array_map(function ($item) {
                    return [
                        'title' => $item['title'] ?? '',
                        'snippet' => $item['snippet'] ?? '',
                        'thumbnail' => $item['pagemap']['cse_thumbnail'][0]['src'] ?? '',
                        'url' => $item['link'] ?? ''
                    ];
                }, $data['items'] ?? []);
    
                $model->logSearchApiRequest($query, 'google', true, $response->getStatusCode());
                return $results;
            } catch (\Throwable $e) {
                log_message('error', '[GOOGLE FAIL] ' . $e->getMessage());
                $model->logSearchApiRequest($query, 'google', false);
            }
        }
    
        return []; // All fallback exhausted
    }
    
    public function standaloneScrapeWebsite($url) {
        try {
            $client = new Client();
            $response = $client->get($url);
            if ($response->getStatusCode() == 200) {
                $html = $response->getBody()->getContents();
                $crawler = new Crawler($html);

                $content = $crawler->filter('body')->each(function ($node) {
                    return $node->text();
                });

                $content = array_filter($content, function ($text) {
                    return !str_contains($text, 'footer') && !str_contains($text, 'head');
                });

                $data = [
                    'url' => $url,
                    'content' => implode(' ', $content),
                    'scraped_at' => date('Y-m-d H:i:s')
                ];

                $this->saveTemporaryScrapedData($data);
                return $data;
            } else {
                log_message('error', 'Failed to scrape website. HTTP status code: ' . $response->getStatusCode());
            }
        } catch (RequestException $e) {
            log_message('error', 'RequestException while scraping website: ' . $e->getMessage());
        } catch (\Throwable $th) {
            log_message('error', 'Throwable error while scraping website: ' . $th->getMessage());
        }
        return false;
    }
    
    private function storeTemporaryData($data)
    {
        
        if (!empty($data)) {
            $this->marketingModel->insertTemporaryData($data);
        } else {
            $this->logger->warning('Attempted to store empty data.');
        }
    }
    
    private function selectSummarySentences($sentences, $scores, $topN = 5)
    {
        arsort($scores, SORT_NUMERIC);
        $topSentenceIndexes = array_keys(array_slice($scores, 0, $topN, true));
        $summary = array_intersect_key($sentences, array_flip($topSentenceIndexes));
        usort($summary, function ($a, $b) use ($sentences) {
            return array_search($a, $sentences) - array_search($b, $sentences);
        });
        return $summary;
    }

    public function spellCheckAndRefine(string $text): string
    {
        // 1. Sanitize HTML tags and excess whitespace
        $text = strip_tags($text);
        $text = preg_replace('/\s+/', ' ', $text);
        $text = trim($text);

        // 2. Normalize repeated punctuation
        $text = preg_replace('/[.!?]{2,}/', '.', $text);
        $text = preg_replace('/,+/', ',', $text);
        $text = preg_replace('/\s+([.,!?;:])/', '$1', $text); // remove space before punctuation
        $text = preg_replace('/([.,!?;:])(?=[^\s])/', '$1 ', $text); // ensure space after punctuation

        // 3. Capitalize first letter of sentences
        $text = preg_replace_callback('/(?:^|[.!?]\s+)([a-z])/', function ($matches) {
            return strtoupper($matches[0]);
        }, $text);

        // 4. Spell check using pspell (requires PHP pspell extension)
        if (function_exists('pspell_new')) {
            $pspell = pspell_new("en");

            $words = explode(' ', $text);
            foreach ($words as &$word) {
                // Remove punctuation temporarily
                $cleanWord = preg_replace('/[^a-zA-Z\']/', '', $word);

                if (!empty($cleanWord) && !pspell_check($pspell, $cleanWord)) {
                    $suggestions = pspell_suggest($pspell, $cleanWord);
                    if (!empty($suggestions)) {
                        // Replace only if suggestion is reasonable
                        $word = str_replace($cleanWord, $suggestions[0], $word);
                    }
                }
            }

            $text = implode(' ', $words);
        } else {
            log_message('warning', 'pspell extension not available. Skipping spell check.');
        }

        // 5. Final trim and return
        return trim($text);
    }

    public function splitIntoSentences(string $content): array
    {
        $content = trim(strip_tags($content));
        $content = preg_replace('/\s+/', ' ', $content); // normalize whitespace
    
        // 💡 Force UTF-8 clean-up
        $content = mb_convert_encoding($content, 'UTF-8', 'UTF-8');
    
        // Remove common emoji/unicode artifacts that break splitting
        $content = preg_replace('/[^\PC\s]/u', '', $content); // remove non-printable unicode
    
        // Try sentence splitting
        $sentences = preg_split('/(?<=[.?!])\s+(?=[A-Z])/', $content, -1, PREG_SPLIT_NO_EMPTY);
    
        // Fallback if not enough clean sentences
        if (count($sentences) < 2) {
            $sentences = preg_split('/[\r\n••▪️‣→⇒➤\-]+/', $content);
        }
    
        // Final cleanup: discard anything too short or not alphanumeric
        $valid = array_filter($sentences, function ($line) {
            $trimmed = trim($line);
            return strlen($trimmed) > 20 && preg_match('/[a-zA-Z0-9]/', $trimmed);
        });
    
        $result = array_values($valid);
        log_message('debug', '🧪 splitIntoSentences(): Extracted ' . count($result) . ' valid sentences.');
        return $result;
    }    
    
    // public function splitIntoSentences($content)
    // {
    //     try {
    //         // Decode HTML and normalize line breaks/spaces
    //         $decoded = html_entity_decode(quoted_printable_decode($content), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    //         $normalized = preg_replace('/\s+/', ' ', trim($decoded)); // collapse whitespace
    
    //         // Robust punctuation-based sentence segmentation
    //         $sentences = preg_split('/(?<=[.!?])\s+(?=[A-Z])/', $normalized, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
            
    //         if (count($sentences) < 2) {
    //             log_message('warning', '⚠️ Not enough sentences in summary input.');
    //             return "Trade Alert Summary for {$symbol}:\nPlease include trade strategy or news to generate an analysis.";
    //         }
            
    //         // Clean and filter: ensure sentence is string, contains at least one word, and is longer than 10 characters
    //         $filtered = array_filter($sentences, function ($s) {
    //             return is_string($s) && strlen(trim($s)) > 10 && preg_match('/[a-zA-Z]{3,}/', $s);
    //         });
    
    //         $cleaned = array_values(array_map('trim', $filtered));
    
    //         log_message('debug', '🧪 splitIntoSentences(): Extracted ' . count($cleaned) . ' valid sentences.');
    //         return $cleaned;
    
    //     } catch (\Throwable $e) {
    //         log_message('error', '❌ splitIntoSentences() Exception: ' . $e->getMessage());
    //         return [];
    //     }
    // }    
    
    public function summarize($text, $method = 'textrank', $charLimit = 500)
    {
        $text = $this->cleanText($text);
        if ($method === 'tfidf') {
            return $this->summarizeText($text);
        } else {
            return $this->summarizeContent($text, $charLimit);
        }
    }    
    
    public function summarizeContent($content, $minLength = 300, $maxLength = 100000, $depth = 0)
    {
        if ($depth > 2) {
            log_message('error', '❌ summarizeContent: Max retry depth reached. Breaking potential infinite loop.');
            return null;
        }

        if (empty($content) || strlen(strip_tags($content)) < $minLength) {
            log_message('debug', '⚠️ summarizeContent: Skipped short or empty content.');
            return null;
        }

        $cleaned = $this->sanitizeRawEmailContent($content);
        $cleanedLength = strlen($cleaned);

        if ($cleanedLength > $maxLength) {
            log_message('warning', "⚠️ summarizeContent: Content too large to process. Size: {$cleanedLength}");
            $cleaned = mb_substr($cleaned, 0, $maxLength); // Trim to limit
        }

        log_message('debug', "🧪 summarizeContent: Cleaned size = {$cleanedLength}");

        $summary = $this->summarizeText($cleaned);
        if (
            empty($summary) ||
            (is_string($summary) && strlen($summary) < 100) ||
            (is_array($summary) && strlen(implode(' ', $summary)) < 100)
        ) {
            log_message('warning', "⚠️ summarizeContent: Summary too short or invalid at depth {$depth}. Retrying...");
            sleep(1); // Throttle to avoid infinite loops
            return $this->summarizeContent($cleaned, $minLength, $maxLength, $depth + 1);
        }

        return $summary;
    }

    public function summarizeContentByKeyword(string $keyword): array
    {
        return $this->marketingModel->getRecentSummariesByKeyword($keyword);
    }
    
    public function summarizeContentFromHtml($html)
    {
        try {
            if (empty($html)) {
                log_message('warning', 'MyMIMarketing::summarizeContentFromHtml(): Empty input.');
                return null;
            }

            $content = is_array($html) ? implode(' ', array_map('strip_tags', $html)) : $html;
            $clean = $this->sanitizeRawEmailContent($content);
            $clean = preg_replace('/[^[:print:]]/', '', $clean);

            if (strlen($clean) < 100 || str_word_count($clean) < 10) {
                log_message('warning', 'summarizeContentFromHtml(): Cleaned content too short. Using fallback.');
                return [
                    'summary'   => mb_substr($clean, 0, 300) . '...',
                    'keywords'  => $this->extractKeywords($clean),
                    'sentences' => $this->splitIntoSentences($clean),
                ];
            }

            $sentences = $this->splitIntoSentences($clean);

            if (count($sentences) < 2) {
                log_message('error', 'summarizeContentFromHtml(): Too few sentences to build summary.');
                return [
                    'summary'   => implode(' ', $sentences),
                    'keywords'  => $this->extractKeywords($clean),
                    'sentences' => $sentences,
                ];
            }

            $summary = $this->summarizeText(implode(' ', $sentences));

            if (empty($summary) || strlen($summary) < 50) {
                log_message('warning', 'summarizeContentFromHtml(): Summary failed — using fallback.');
                return [
                    'summary'   => implode(' ', array_slice($sentences, 0, 3)),
                    'keywords'  => $this->extractKeywords($clean),
                    'sentences' => $sentences,
                ];
            }

            return [
                'summary'   => $summary,
                'keywords'  => $this->extractKeywords($clean),
                'sentences' => $sentences,
            ];
        } catch (\Throwable $e) {
            log_message('error', '❌ summarizeContentFromHtml() Exception: ' . $e->getMessage());
            return null;
        }
    }

    // public function summarizeContentFromHtml($html)
    // {
    //     try {
    //         if (empty($html)) {
    //             log_message('warning', 'MyMIMarketing L1166 - summarizeContentFromHtml(): Empty input.');
    //             return null;
    //         }
    
    //         // Clean and sanitize HTML content
    //         $content = $html;
    //         if (is_array($content)) $content = implode(' ', array_map('strip_tags', $content));
    //         $clean = $this->sanitizeRawEmailContent($content); // already exists
    //         $clean = preg_replace('/[^[:print:]]/', '', $clean); // non-printable cleanup
            
    //         if(strlen($clean) < 100 || str_word_count($clean) < 10) {
    //             log_message('warning', "summarizeContentFromHtml(): Weak cleaned content. Using fallback summary. Preview: ".substr($clean, 0, 120));
    //             return [
    //                 'summary' => substr($clean, 0, 300) . '...',
    //                 'keywords' => $this->extractKeywords($clean),
    //                 'sentences' => $this->splitIntoSentences($clean)
    //             ];
    //         }
            
    //         $cleanText = $clean;

    //         // Extract and validate sentences
    //         $sentences = $this->splitIntoSentences($cleanText);
    //         log_message('debug', 'summarizeContentFromHtml(): Sentences extracted: ' . print_r($sentences, true));
            
    //         if (count($sentences) < 2) {
    //             log_message('error', 'summarizeContentFromHtml(): Too few valid sentences to build similarity matrix.');
    //             return [
    //                 'summary' => implode(' ', $sentences),
    //                 'keywords' => $this->extractKeywords($cleanText),
    //                 'sentences' => $sentences
    //             ];
    //         }            
    
    //         if (!is_string($cleanText) || strlen($cleanText) < 100 || substr_count($cleanText, ' ') < 10) {
    //             log_message('warning', 'MyMIMarketing L1174 - summarizeContentFromHtml(): Cleaned content too short or malformed.');
    //             return null;
    //         }
    
    //         // Try TF-IDF summarization
    //         $summary = $this->summarizeText(implode(' ', $sentences));
    //         if (empty($summary) || strlen($summary) < 100) {
    //             log_message('warning', 'MyMIMarketing L1181 - summarizeContentFromHtml(): TF-IDF summary too short — trying TextRank fallback.');
    //             $summary = $this->summarizeContent($cleanText);
    //         }
    
    //         if (empty($summary) || strlen($summary) < 50) {
    //             log_message('warning', 'MyMIMarketing L1186 - summarizeContentFromHtml(): Summary failed even after fallback.');
    //             return null;
    //         }
            
    //         if (!isset($summary['summary']) || strlen(trim($summary['summary'])) < 15) {
    //             log_message('warning', '⚠️ summarizeContentFromHtml(): Fallback triggered — summarizer returned invalid or short result.');
    //             return null;
    //         }
                     
    //         return $summary;
    //     } catch (\Throwable $e) {
    //         log_message('error', 'MyMIMarketing L1196 - summarizeContentFromHtml() Exception: ' . $e->getMessage());
    //         return null;
    //     }
    // }  
    
    public function summarizeContentTextRank($content)
    {
        $sentences = $this->splitIntoSentences($content);
        $wordFrequencies = $this->calculateWordFrequencies(implode(' ', $sentences), $this->getStopWords());
        $similarityMatrix = $this->buildSimilarityMatrix($sentences, $wordFrequencies);
        $scores = $this->pageRank($similarityMatrix);
        return $this->extractTopSentences($sentences, $scores);
    }

    public function summarizeText($text)
    {
        try {
            if (empty($text) || !is_string($text)) {
                log_message('error', '❌ summarizeText(): Invalid or empty text input.');
                return '';
            }
    
            $cleanText = strip_tags($text);
            $sentences = $this->splitIntoSentences($cleanText);
            log_message('debug', '🧠 summarizeText(): Sentence count before filtering: ' . count($sentences));
    
            $documents = array_map(fn($s) => mb_substr(trim($s), 0, 3000), $sentences);
            $documents = array_filter($documents, fn($d) => strlen($d) > 30);
    
            log_message('debug', '🧪 summarizeText(): Filtered document count: ' . count($documents));
    
            if (count($documents) < 2) {
                log_message('warning', '⚠️ summarizeText(): Not enough valid documents for TF-IDF. Skipping.');
                return implode(' ', $documents); // Fallback
            }
    
            $vectorizer = new \Phpml\FeatureExtraction\TokenCountVectorizer(new \Phpml\Tokenization\WhitespaceTokenizer());
            $tfidf = new \Phpml\FeatureExtraction\TfIdfTransformer();
    
            $vectorizer->fit($documents);
            $vectorizer->transform($documents);
            $tfidf->fit($documents);
            $tfidf->transform($documents);
    
            $sentenceScores = [];
            foreach ($documents as $i => $doc) {
                $score = 0.0;
                foreach ($doc as $token => $weight) {
                    $score += floatval($weight);
                }
                $sentenceScores[$i] = $score;
            }
    
            arsort($sentenceScores);
            $topSentences = array_slice(array_keys($sentenceScores), 0, 3);
    
            $summary = '';
            foreach ($topSentences as $i) {
                if (isset($sentences[$i])) {
                    $summary .= $sentences[$i] . ' ';
                }
            }
    
            log_message('debug', '✅ summarizeText(): Final summary: ' . $summary);
            return trim($summary);
        } catch (\Throwable $e) {
            log_message('error', '❌ summarizeText() Exception: ' . $e->getMessage());
            return '';
        }
    }
    
    public function summarizeTradingViewFinancials($url)
    {
        $html = @file_get_contents($url);
    
        if (!$html) {
            throw new \Exception('Failed to load TradingView financials page.');
        }
    
        $cleaned = $this->sanitizeRawEmailContent($html);  // or custom cleaning
        $summary = $this->summarizeContent($cleaned);
    
        return $summary;
    }
    
    // public function summarizeText($text, $numSentences = 3)
    // {
    //     log_message('debug', 'summarizeText() Input Sample: ' . substr($text, 0, 300));
    
    //     if (empty($text) || !is_string($text)) {
    //         log_message('warning', 'MyMIMarketing::summarizeText() - Invalid or empty input.');
    //         return '';
    //     }
    
    //     $text = $this->normalizeUtf8($text);
    //     $sentences = $this->splitIntoSentences($text);
    
    //     if (count($sentences) < 2) {
    //         log_message('debug', 'MyMIMarketing::summarizeText() - Not enough sentences to summarize.');
    //         return $text;
    //     }
    
    //     $documents = array_filter(array_map(function ($sentence) {
    //         $tokens = $this->tokenizeWithNlpTools($this->normalizeUtf8($sentence));
    //         return is_array($tokens) && count($tokens) > 0 ? $tokens : null;
    //     }, $sentences));
    
    //     if (empty($documents) || !is_array($documents[0]) || empty($documents[0])) {
    //         log_message('warning', '❌ summarizeText() - Token documents malformed: ' . json_encode($documents));
    //         return '';
    //     }
    
    //     try {
    //         $tfIdf = new TfIdfTransformer();
    //         $tfIdf->fit($documents);
    //         $tfIdf->transform($documents);
    //     } catch (\Throwable $e) {
    //         log_message('error', 'MyMIMarketing::summarizeText() - TF-IDF error: ' . $e->getMessage());
    //         return '';
    //     }
    
    //     $scores = [];
    //     foreach ($documents as $i => $tokens) {
    //         $score = 0.0;
    //         foreach ($tokens as $token) {
    //             $score += is_string($token) ? (strlen($token) > 3 ? 1.2 : 0.8) : 0.0;
    //         }
    //         $scores[$i] = $score;
    //     }
    
    //     arsort($scores);
    //     $topIndexes = array_slice(array_keys($scores), 0, $numSentences);
    //     sort($topIndexes);
    
    //     $summary = implode(' ', array_intersect_key($sentences, array_flip($topIndexes)));
    //     log_message('info', 'MyMIMarketing::summarizeText() - Final summary generated.');
    //     return $this->normalizeUtf8($summary);
    // }

    /**
     * Generate Blog post content.
     */
    public function generateBlogContent(array $tradeAlert): string
    {
        $ticker = strtoupper(trim($tradeAlert['ticker'] ?? 'N/A'));
        $company = $tradeAlert['company'] ?? 'Unknown Company';
        $price = number_format($tradeAlert['price'] ?? 0, 2);
        $tradeDesc = $tradeAlert['trade_description'] ?? '';
        $news = $tradeAlert['financial_news'] ?? '';
        $details = $tradeAlert['details'] ?? '';
        $content = "Blog Post: In-depth Market Analysis on {$ticker} ({$company})\n\n"
                 . "Current Price: \${$price}\n\n"
                 . "Trade Analysis: {$tradeDesc}\n\n"
                 . "Financial News: {$news}\n\n"
                 . "Detailed Analysis: {$details}\n\n"
                 . "Stay tuned for more insights!";
        return $content;
    }
    
    /**
     * Generate Email content.
     */
    public function generateEmailContent(array $tradeAlert): string
    {
        $ticker = strtoupper(trim($tradeAlert['ticker'] ?? 'N/A'));
        $company = $tradeAlert['company'] ?? 'Unknown Company';
        $price = number_format($tradeAlert['price'] ?? 0, 2);
        $tradeDesc = $tradeAlert['trade_description'] ?? '';
        $news = $tradeAlert['financial_news'] ?? '';
        $details = $tradeAlert['details'] ?? '';
        $content = "Email Alert for {$ticker} ({$company}):\n"
                 . "Current Price: \${$price}\n"
                 . "Trade Signal: {$tradeDesc}\n"
                 . "Latest News: {$news}\n"
                 . "Analysis Details: {$details}\n"
                 . "For more information, visit our website.";
        return $content;
    }

    private function generateEmailFallbackUrl(string $subject, string $emailIdentifier): string
    {
        $safeSubject = urlencode(substr($subject, 0, 50));
        return site_url('Management/Marketing/Email/' . $safeSubject . '/' . md5($emailIdentifier));
    }    
    
    public function generateGroupedBlogAndEmailDrafts(array $groupedLabeledSummaries): array
    {
        $blog = '';
        $email = '';
    
        foreach ($groupedLabeledSummaries as $group) {
            $label = $group['label'] ?? 'Market Update';
            $blog .= "<h2>{$label}</h2>\n";
            $email .= strtoupper($label) . "\n\n";
    
            foreach ($group['items'] as $item) {
                $title = $item['title'] ?? '(Untitled)';
                $summary = strip_tags($item['summary'] ?? '');
                $blog .= "<h4>{$title}</h4><p>{$summary}</p>\n";
                $email .= "- {$title}: {$summary}\n\n";
            }
    
            $blog .= "<hr/>\n";
            $email .= str_repeat('-', 40) . "\n\n";
        }
    
        $blog .= "<p>Visit <a href='https://www.mymiwallet.com'>MyMI Wallet</a> to explore more.</p>";
        $email .= "Explore more at https://www.mymiwallet.com";
    
        return [
            'blog' => $blog,
            'email' => $email
        ];
    }
    
    public function generateGroupLabelsFromTFIDF(array $groupedSummaries): array
    {
        $labeledGroups = [];
    
        foreach ($groupedSummaries as $index => $group) {
            $combinedText = implode(' ', array_map(function ($record) {
                return strip_tags($record['summary'] ?? '') . ' ' . ($record['title'] ?? '');
            }, $group));
    
            $topKeywords = $this->getTopKeywordScores($combinedText, 3); // most relevant terms
            $label = implode(' ', array_map('ucfirst', array_slice($topKeywords, 0, 3)));
    
            $labeledGroups[] = [
                'label' => $label ?: 'General Insight',
                'items' => $group
            ];
        }
    
        return $labeledGroups;
    }
    
    /**
     * Generate randomized marketing content for a trade alert.
     *
     * @param array $tradeAlert A record from bf_investment_trade_alerts.
     * @return array Associative array with keys for each social platform.
     */
    public function generateRandomMarketingContent(array $tradeAlert): array
    {
        // 🔥 Diverse intros for engagement
        $intros = [
            "🚨 Breaking Market Update!",
            "📢 Urgent Trade Alert!",
            "🔥 High-Momentum Stock Pick!",
            "🚀 Skyrocketing Stocks!",
            "💰 Smart Money Moves!",
            "⚡ Quick Market Insight!",
            "📈 Bullish Breakout Alert!",
            "📊 Technical Setup Unfolding!",
            "🧐 Deep Market Analysis!",
            "💡 Pro-Level Trading Insight!"
        ];
    
        // 🎭 Emoticons to boost visibility
        $emoticons = ['🚀', '🔥', '💰', '📈', '📊', '⚡', '✅', '🤖', '🎯', '🔍'];
    
        // 🏆 CTAs with strong call-to-action
        $outros = [
            "📊 Stay ahead of the markets!",
            "⏳ Don't miss this setup!",
            "💰 Trade smart & maximize gains!",
            "🚀 Follow for more trade alerts!",
            "📈 Watch this ticker closely!",
            "🔥 This could be the next big mover!",
            "💡 Insights that matter. Stay tuned!",
            "💎 Precision trading at its best!",
            "⚡ More insights coming soon!",
            "📢 Tap in for more premium setups!"
        ];
    
        // 🎯 Randomly select elements
        $intro = $intros[array_rand($intros)];
        $outro = $outros[array_rand($outros)];
        $emote1 = $emoticons[array_rand($emoticons)];
        $emote2 = $emoticons[array_rand($emoticons)];
    
        // 📌 Extract core trade details
        $ticker = strtoupper(trim($tradeAlert['ticker'] ?? 'N/A'));
        $company = $tradeAlert['company'] ?? 'Unknown Company';
        $tradeDesc = trim($tradeAlert['trade_description'] ?? '');
        $news = trim($tradeAlert['financial_news'] ?? '');
        $details = trim($tradeAlert['details'] ?? '');
        $price = number_format($tradeAlert['price'] ?? 0, 2);
        $link = trim($tradeAlert['tv_chart'] ?? $tradeAlert['tv_chart_link'] ?? '');
    
        // 📊 Prepare chart link text (if available)
        $chartText = (!empty($link)) ? "📉 Chart: [View Here]({$link})\n" : '';
    
        // 🧮 Calculate space used by fixed elements
        $fixedLength = strlen($intro) + strlen($outro) + strlen($emote1) + strlen($emote2) + strlen($chartText) + 12; // Buffer spacing
    
        // 📏 Set max allowed length for trade message
        $maxMessageLength = 2000 - $fixedLength;
    
        // ✍️ Construct the trade alert message
        $coreMessage = "Trade Alert for **{$ticker}** ({$company}):\n"
                     . "Price: \${$price}\n"
                     . "Signal: {$tradeDesc}\n"
                     . "News: {$news}\n"
                     . "Details: {$details}\n"
                     . $chartText;
    
        // 🔪 Trim if it exceeds max allowed length
        if (strlen($coreMessage) > $maxMessageLength) {
            $coreMessage = substr($coreMessage, 0, $maxMessageLength - 3) . "...";
        }
    
        // 🏁 Final assembly with intros, outros, and chart link
        $finalMessage = "{$emote1} {$intro}\n{$coreMessage}\n{$outro} {$emote2}";
    
        // 📲 Return platform-specific formats
        return [
            'twitter'  => substr($finalMessage, 0, 280),   // Twitter (X) limit
            'facebook' => substr($finalMessage, 0, 2000),  // Facebook limit
            'linkedin' => substr($finalMessage, 0, 2000),  // LinkedIn limit
            'discord'  => substr($finalMessage, 0, 2000)   // Discord limit
        ];
    }

    public function generateTimelineData($articles)
    {
        $timeline = [];
        foreach ($articles as $article) {
            $date = date('Y-m-d', strtotime($article['scraped_at'] ?? $article['created_at'] ?? 'now'));
            $timeline[$date][] = $article;
        }
    
        ksort($timeline); // Chronological order
        return $timeline;
    }
    
    public function generateStoryboardFromSummary(array $summary): array
    {
        $title = $this->decodeMimeHeaderSafe($summary['title'] ?? 'Untitled');
        $cleanSummary = $this->sanitizeSummary($summary['summary']);
        $sentences = $this->splitIntoSentences($cleanSummary);
        $keywords = $this->extractKeywords($cleanSummary);
    
        $storyboard = [];
        foreach ($sentences as $index => $sentence) {
            $storyboard[] = [
                'slide'      => $index + 1,
                'caption'    => $sentence,
                'visual_tip' => $this->suggestVisualScene($sentence),
                'keywords'   => implode(', ', $keywords),
            ];
        }
    
        return $storyboard;
    }

    public function generateVoiceoverMp3FromText($text)
    {
        try {
            putenv('GOOGLE_CLOUD_DISABLE_GRPC=true');
            putenv('GOOGLE_APPLICATION_CREDENTIALS=' . '/home/mymiteam/mymiwallet/credentials/mymi-gcloud-key.json');

            $client = new \Google\Cloud\TextToSpeech\V1\Client\TextToSpeechClient(['transport' => 'rest']);
            $input = new \Google\Cloud\TextToSpeech\V1\SynthesisInput();
            $input->setText($text);

            $voice = new \Google\Cloud\TextToSpeech\V1\VoiceSelectionParams();
            $voice->setLanguageCode('en-US');
            $voice->setSsmlGender(SsmlVoiceGender::MALE); // ✅ FIXED

            $audioConfig = new \Google\Cloud\TextToSpeech\V1\AudioConfig();
            $audioConfig->setAudioEncoding(AudioEncoding::MP3); // ✅ FIXED

            $response = $client->synthesizeSpeech($input, $voice, $audioConfig);
            $audioContent = $response->getAudioContent();

            $timestamp = date('Ymd_His');
            $filename = "{$symbol}_{$timestamp}.mp3";
            $filePath = WRITEPATH . 'uploads/voiceovers/voiceover_' . time() . '.mp3';
            file_put_contents($filePath, $audioContent);

            return base_url("uploads/voiceovers/' . basename($filePath)");
        } catch (\Throwable $e) {
            log_message('error', 'generateVoiceoverMp3FromText() failed: ' . $e->getMessage());
            return null;
        }
    }
    
    /**
     * Generate a Voiceover Script for Video.
     */
    public function generateVoiceoverScript()
    {
        $tradeAlerts = $this->alertsModel->getFilteredTradeAlerts([
            'start' => date('Y-m-d 00:00:00'),
            'end' => date('Y-m-d 23:59:59'),
        ])->get()->getResultArray();
    
        if (empty($tradeAlerts)) {
            return ['status' => 'error', 'message' => 'No trade alerts found for today.'];
        }
    
        $script = "**Voiceover Script: MyMI Trade Alerts - Top Stock Movers**\n\n[INTRO]\n";
        $script .= "Welcome to today’s MyMI Trade Alerts! We’re breaking down the hottest stocks in the market...\n\n";
    
        foreach ($tradeAlerts as $alert) {
            $script .= "**[{$alert['ticker']} - {$alert['company']}]**\n";
            $script .= "**Price:** \${$alert['price']} | **% Change:** {$alert['change']}% | **Volume:** {$alert['volume']}M\n";
            $script .= "📈 52-Week High: \${$alert['high']} | 📉 52-Week Low: \${$alert['low']}\n";
            $script .= "Market Cap: {$alert['market_cap']}\n\n";
        }
    
        $script .= "[OUTRO]\nThat’s it for today’s alerts. Stay tuned and happy trading!\n";
    
        return ['status' => 'success', 'script' => $script];
    }
    
    public function generateVoiceoverScriptFromSummary(string $summary): string
    {
        if (empty($summary)) {
            return 'No summary available for voiceover.';
        }
    
        $summary = strip_tags($summary);
        $sentences = $this->splitIntoSentences($summary);
        $hook = $sentences[0] ?? 'Here’s your market update:';
        $script = "**Voiceover Preview**\n\n";
        $script .= "[INTRO]\n{$hook}\n\n";
    
        foreach (array_slice($sentences, 1, 3) as $line) {
            $script .= "{$line}\n";
        }
    
        $script .= "\n[OUTRO]\nLearn more inside your MyMI Wallet.\n";
        return $script;
    }
    
    /**
     * Generate Email Content using a template with dynamic placeholders.
     *
     * @param array $tradeAlert
     * @return string
     */
    public function generateTradeAlertEmailContent(array $tradeAlert): string
    {
        // Define a default email template (this could also be stored in a DB for flexibility)
        $defaultTemplate = <<<EOT
        Hello,

        {intro}

        Check out our latest trade alert on {ticker} from {company}!
        Current Price: \${price}
        Trade Signal: {trade_description}
        Latest News: {financial_news}
        For more details, view the full analysis here: {trade_chart_link}

        {outro}
        EOT;
        // Randomized intros and outros for variation:
        $intros = [
            "Heads up, traders!",
            "Breaking news from the market!",
            "Your daily trade update is here!",
            "Hot off the press!",
            "Market alert!"
        ];
        $outros = [
            "Happy trading!",
            "Stay tuned for more insights.",
            "Trade smart and prosper!",
            "Keep your eyes on the market!",
            "Have a great trading day!"
        ];
        $intro = $intros[array_rand($intros)];
        $outro = $outros[array_rand($outros)];

        // Build the replacement map. Use defaults if a field is missing.
        $replacements = [
            '{ticker}'            => strtoupper(trim($tradeAlert['ticker'] ?? 'N/A')),
            '{company}'           => $tradeAlert['company'] ?? 'Unknown Company',
            '{price}'             => number_format($tradeAlert['price'] ?? 0, 2),
            '{trade_description}' => $tradeAlert['trade_description'] ?? 'No trade signal available.',
            '{financial_news}'    => $tradeAlert['financial_news'] ?? 'No news available.',
            '{trade_chart_link}'  => $tradeAlert['trade_chart_link'] ?? 'https://www.mymiwallet.com/trade-overview?ticker=' . urlencode($tradeAlert['ticker'] ?? ''),
            '{intro}'             => $intro,
            '{outro}'             => $outro
        ];

        // Replace all placeholders in the template.
        $content = str_replace(array_keys($replacements), array_values($replacements), $defaultTemplate);
        return $content;
    }

    /**
     * Generate Blog Content using a template.
     *
     * @param array $tradeAlert
     * @return string
     */
    public function generateTradeAlertBlogContent(array $tradeAlert): string
    {
        $defaultTemplate = <<<EOT
        Blog Post: Market Analysis on {ticker} ({company})

        **Current Price:** \${price}

        **Trade Analysis:**
        {trade_description}

        **Financial News Update:**
        {financial_news}

        For a detailed review, visit our website.
        EOT;

        $replacements = [
            '{ticker}'            => strtoupper(trim($tradeAlert['ticker'] ?? 'N/A')),
            '{company}'           => $tradeAlert['company'] ?? 'Unknown Company',
            '{price}'             => number_format($tradeAlert['price'] ?? 0, 2),
            '{trade_description}' => $tradeAlert['trade_description'] ?? 'No trade signal available.',
            '{financial_news}'    => $tradeAlert['financial_news'] ?? 'No news available.'
        ];

        $content = str_replace(array_keys($replacements), array_values($replacements), $defaultTemplate);
        return $content;
    }

    /**
     * Generate Voiceover Script Content using a template.
     *
     * @param array $tradeAlert
     * @return string
     */
    public function generateTradeAlertVoiceoverScriptContent(array $tradeAlert): string
    {
        $defaultTemplate = <<<EOT
        Voiceover Script for {ticker}:

        "Welcome to today’s market update. Our focus is on {ticker} from {company}. 
        Currently, it is trading at \${price}. 
        Trade insight: {trade_description}. 
        Stay tuned for further updates and in-depth analysis."

        Thank you for watching!
        EOT;

        $replacements = [
            '{ticker}'            => strtoupper(trim($tradeAlert['ticker'] ?? 'N/A')),
            '{company}'           => $tradeAlert['company'] ?? 'Unknown Company',
            '{price}'             => number_format($tradeAlert['price'] ?? 0, 2),
            '{trade_description}' => $tradeAlert['trade_description'] ?? 'No trade signal available.'
        ];

        $content = str_replace(array_keys($replacements), array_values($replacements), $defaultTemplate);
        return $content;
    }

    /**
     * Example method to generate randomized social media content.
     * (This method already exists in your codebase.)
     *
     * @param array $tradeAlert
     * @return array
     */
    public function generateTradeAlertRandomMarketingContent(array $tradeAlert): array
    {
        $intros = [
            "Heads up, traders!",
            "🔥 Hot Trade Alert!",
            "🚀 Ready for a breakout?",
            "Attention: Market Movers!",
            "⚡ Quick update:"
        ];
        $emoticons = ['🚀', '🔥', '💰', '📈', '📊', '⚡', '✅', '🤖'];
        $outros = [
            "Stay tuned for more!",
            "Don't miss out!",
            "Trade smart and prosper!",
            "Keep your eyes on the market!",
            "Happy trading!"
        ];
        $intro = $intros[array_rand($intros)];
        $emote = $emoticons[array_rand($emoticons)];
        $outro = $outros[array_rand($outros)];
        $ticker = strtoupper(trim($tradeAlert['ticker'] ?? 'N/A'));
        $company = $tradeAlert['company'] ?? 'Unknown Company';
        $tradeDesc = trim($tradeAlert['trade_description'] ?? '');
        $news = trim($tradeAlert['financial_news'] ?? '');
        $details = trim($tradeAlert['details'] ?? '');
        $price = number_format($tradeAlert['price'] ?? 0, 2);
        
        $baseMessage = "{$emote} {$intro}\n" .
            "Trade Alert for **{$ticker}** ({$company}):\n" .
            "Price: \${$price}\n" .
            "Signal: {$tradeDesc}\n" .
            "News: {$news}\n" .
            "Details: {$details}\n" .
            "{$outro} {$emote}";
        
        $socialContent = [
            'twitter'  => substr($baseMessage, 0, 280),
            'facebook' => $baseMessage,
            'linkedin' => $baseMessage,
            'discord'  => $baseMessage
        ];
        
        return $socialContent;
    }

    public function getBlogPosts()
    {
         
        $getBlogPosts = $this->marketingModel->getBlogPosts();
        return ['getBlogPosts' => $getBlogPosts];
    }

    // public function getCampaignsBySchedId($accountid) {
    //     
    //     $campaigns = $this->marketingModel->getCampaignsBySchedId($accountid); 
    //     return $campaigns; 
    // } 

    public function getCampaigns() {
        
        $getMarketingCampaigns = $this->marketingModel->getActiveCampaigns(); 
        return $getMarketingCampaigns; 
    }

    public function getCampaignByID($campaignID) { 
        
        $campaignInfo = $this->marketingModel->getCampaignById($campaignID); 
        return $campaignInfo; 
    }

    public function getCampaignsBySchedId($sched_id) {
        
        $campaigns = $this->marketingModel->getCampaignsBySchedId($sched_id); 
        if ($campaigns) {
            foreach ($campaigns as &$campaign) {
                $campaign['primary_content'] = $this->generateSchedPrimaryContent($campaign['id']);
                $campaign['social_media_content'] = $this->generateSchedSocialMediaContent($campaign['id']);
            }
        } else {
            $campaigns = []; // Ensure campaigns is an array
        }
        log_message('debug', 'MyMIMarketing::getCampaignsBySchedId - $campaigns: ' . print_r($campaigns, true));
        return $campaigns;
    }  

    public function getDripCampaignInfo() {
        $dripCampaigns = $this->marketingModel->getActiveDripCampaigns(); 
        $dripCampaignSteps = $this->marketingModel->getActiveDripCampaignSteps();
        $dripCampaignInfo = [
            'dripCampaigns' => $dripCampaigns,
            'dripCampaignSteps' => $dripCampaignSteps,
        ];
        return $dripCampaignInfo; 
    }

    public function getFeatures() {
        
        $getFeatures                        = $this->marketingModel->getFeatures(); 
        if ($this->debug === 1) {
            // log_message('debug', 'MyMIDashboard L113 - $getFeatures: ' . (print_r($getFeatures, true)));
        }
        return $getFeatures; 
    }

    public function getKeywordCandidates(): array
    {
        $watchlist = $this->getMyMIInvestments()->getUserWatchlist($this->cuID); 
        
        // Option 2: Hardcoded fallback
        $default = ['Apple', 'Tesla', 'Inflation', 'Ethereum', 'Interest Rates'];
    
        $symbols = array_map(fn($row) => $row['symbol'], $watchlist);
        return array_unique(array_merge($symbols, $default));
    }
    
    public function getManagementTeam() {
        
        $getManagementTeam                 = $this->marketingModel->getMarketingTeam(); 
        if ($this->debug === 1) {
            // log_message('debug', 'MyMIDashboard L121 - $getManagementTeam: ' . (print_r($getManagementTeam, true)));
        }
        return $getManagementTeam; 
    }
    
    public function generateCTA($summary)
    {
        return "💡 Learn more inside MyMI Wallet — your financial edge starts here.";
    }
    
    public function generateContentAndInsert(array $record)
    {
        $recordId = $record['id'] ?? null;
        if (!$recordId || empty($record['content'])) {
            log_message('error', "❌ generateContentAndInsert() - Invalid record ID or missing content.");
            return null;
        }
    
        // Clean and normalize content
        $rawContent = $record['content'];
        $cleanContent = $this->sanitizeRawEmailContent($rawContent);
        if (strlen($cleanContent) < 300 || substr_count($cleanContent, ' ') < 20) {
            log_message('warning', "⚠️ generateContentAndInsert() - Skipping record ID {$recordId} due to insufficient cleaned content.");
            $cleanContent = $this->generateFallbackSummary($cleanedContent ?? $rawContent);
            return null;
        }
    
        // Run summarization pipeline
        $summaryData = $this->summarizeContent($cleanContent);
        if (!is_array($summaryData) || empty($summaryData['summary'])) {
            log_message('warning', "⚠️ generateContentAndInsert() - No summary generated for record ID {$recordId}");
            return null;
        }
    
        // Build headline and post content
        $headline = $this->generateHeadline($summaryData['summary']);
        if (is_string($summaryData['summary']) && strlen($summaryData['summary']) > 10) {
            $keywords = $summaryData['keywords'] ?? $this->extractKeywords($summaryData['summary']);
            log_message('debug', "🧠 TF-IDF Keywords for record ID {$recordId}: ".print_r($keywords, true));
        }        
        
        $posts = $summaryData['posts'] ?? $this->generatePlatformContent($summaryData['summary'], $keywords);

    
        // Prepare and insert into final table
        $insertData = [
            'source_id'   => $recordId,
            'title'       => $headline,
            'summary'     => $summaryData['summary'],
            'keywords'    => implode(',', $keywords),
            'posts'       => json_encode($posts),
            'platforms'   => json_encode(array_keys($posts)),
            'status'      => 'ready',
            'created_at'  => date('Y-m-d H:i:s'),
        ];
    
        $result = $this->marketingModel->insert($insertData);
        if ($result) {
            log_message('info', "✅ generateContentAndInsert() - Inserted final content for record ID {$recordId}");
            return $insertData;
        } else {
            log_message('error', "❌ generateContentAndInsert() - Failed DB insert for record ID {$recordId}");
            return null;
        }
    }
    
    /**
     * Process a batch of scraped records and save generated content.
     * (This method was originally referencing $record/ $existingRecord without defining them.)
     */
    public function generateContentForAllScrapedRecords(array $records)
    {
        foreach ($records as $record)
        {
            // Make sure $record is defined here:
            // e.g. $record is each element from bf_marketing_temp_scraper, including ['id'], ['content'], etc.

            // Check if an “existing record” already has generated content:
            $existingRecord = $this->marketingModel->find($record['id']);
            if ($existingRecord)
            {
                // If something exists, maybe update, skip, or merge:
                $this->logger->debug("Existing generated record found for ID {$record['id']}. Skipping.");
                continue;
            }

            // Assuming we have valid content in $record['content']:
            $cleaned = $this->sanitizeRawEmailContent($record['content']);
            if (strlen(trim($cleaned)) < 100)
            {
                // too short to generate content
                $this->logger->warning("Content too short for record ID {$record['id']}.");
                continue;
            }

            // Generate summary, keywords, etc.
            $summary  = $this->summarizeContent($cleaned);
            $keywords = $this->extractKeywords($cleaned);

            // Use PHP’s native DateTime (not App\Libraries\DateTime):
            $now      = new DateTime();
            $timestamp = $now->format('Y-m-d H:i:s');

            // Prepare data to insert into bf_marketing_scraper:
            $payload = [
                'source_id'   => $record['id'],
                'title'       => $record['title'] ?? null,
                'summary'     => $summary,
                'keywords'    => implode(',', $keywords),
                'date_generated' => $timestamp,
            ];

            // Insert into database:
            $this->marketingModel->insert($payload);
            $this->logger->info("Generated content inserted for record ID {$record['id']}.");
        }
    }

    public function generateContentForZapier($platform, $contentData)
    {
        $payload = [
            'platform' => $platform,
            'content' => $contentData['content'],
            'media_url' => $contentData['media_url'] ?? null,
        ];

        return json_encode($payload);
    } 
    
    public function generateContentFromRaw(array $emailRecord)
    {
        if (!isset($emailRecord['content']) || strlen(trim($emailRecord['content'])) < 1000) {
            log_message('error', 'generateContentFromRaw(): Invalid or too short content.');
            return null;
        }

        if (isset($emailRecord['summary']) && is_array($emailRecord['summary'])) {
            $emailRecord['summary'] = implode(' ', $emailRecord['summary']);
        }

        $rawText = $emailRecord['content'];

        // Handle arrays
        if (is_array($rawText)) {
            log_message('error', 'generateContentFromRaw(): content is array — flattening.');
            $rawText = implode(' ', array_map('strip_tags', $rawText));
        }

        if (empty($rawText)) {
            log_message('error', 'generateContentFromRaw(): Content after flattening is empty.');
            return null;
        }
        $cleaned = $this->sanitizeRawEmailContent(strip_tags($rawText));

        // PATCH: UTF-8 + length validation before NLP
        if (!mb_check_encoding($cleaned, 'UTF-8') || strlen(trim($cleaned)) < 25) {
            log_message('error', '❌ Invalid or too short summary! Skipping record.');
            return null;
        }

        // Sanitize and validate
        $cleanContent = $this->sanitizeRawEmailContent($cleaned);
        $cleanContent = preg_replace('/[^[:print:]]/', '', $cleanContent);

        if (strlen($cleanContent) < 500 || substr_count($cleanContent, ' ') < 10) {
            log_message('error', 'generateContentFromRaw(): Cleaned content too short.');
            return null;
        }

        $summary = $this->summarizeContent($cleanContent);        
        $sentences = $this->splitIntoSentences($cleanContent ?? '');
        $keywords = $this->extractKeywords($sentences);

        log_message('debug', "🧠 Extracted TF-IDF Keywords: " . print_r($keywords, true));

        $summaryText = is_array($summary) ? implode(' ', $summary) : $summary;
        log_message('debug', "🧠 Extracted SummaryText: " . print_r($summaryText, true));

        // Optional logic: skip if similarity too high (only if both values are set)
        if (!empty($emailRecord['email_date'])) {
            $similarity = $this->calculateCosineSimilarity($cleanContent, $summaryText ?? '');
            if ($similarity > 0.9) {
                log_message('warning', '⚠️ High similarity between content and summary detected.');
            }
        }

        // Optional plagiarism detection
        $plagiarismCheck = $this->checkPlagiarismRisk($cleanContent, $summaryText);
        if (!empty($plagiarismCheck['is_risky'])) {
            log_message('warning', "⚠️ High similarity detected in generated content. Risk of plagiarism. Details: " . json_encode($plagiarismCheck));
        }

        return [
            'summary'   => $summaryText,
            'keywords'  => $keywords,
            'posts'     => $this->generatePlatformContent($summary, $keywords),
            'category'  => 'News',
            'headline'  => $this->generateHeadline($summary),
        ];
    }

    public function generateHeadline($input)
    {
        try {
            // ✅ Step 1: Validate and Normalize Input
            if (empty($input)) {
                log_message('error', '❌ generateHeadline(): Input is empty.');
                return 'Breaking Financial News';
            }
    
            // 🔃 Step 2: If array or object, flatten it
            if (is_array($input)) {
                $input = implode(' ', array_map(function ($v) {
                    return is_string($v) ? $v : '';
                }, array_filter($input)));
            } elseif (is_object($input)) {
                $input = json_encode($input);
            }
    
            // 🧼 Step 3: Clean the text
            $cleaned = strip_tags(html_entity_decode($input));
            $cleaned = preg_replace('/\s+/', ' ', trim($cleaned));
    
            if (strlen($cleaned) < 20) {
                log_message('warning', '⚠️ generateHeadline(): Cleaned input too short.');
                return ucfirst(trim($cleaned)) ?: 'Market Update';
            }
    
            // 🧠 Step 4: Attempt to extract the first strong sentence
            $sentences = $this->splitIntoSentences($cleaned);
            foreach ($sentences as $sentence) {
                $trimmed = trim($sentence);
                if (strlen($trimmed) >= 40 && strlen($trimmed) <= 150) {
                    return ucfirst($trimmed);
                }
            }
    
            // 🧰 Step 5: Fallback to first ~12 words
            $words = explode(' ', $cleaned);
            $fallback = implode(' ', array_slice($words, 0, 12)) . '...';
            return ucfirst(trim($fallback));
        } catch (\Throwable $e) {
            log_message('error', '❌ generateHeadline() Exception: ' . $e->getMessage());
            return 'Market Insight';
        }
    }
    
    private function generateSchedPrimaryContent($campaignId) {
        // Logic to generate primary content
        return 'Primary content for campaign ID ' . $campaignId;
    }
    
    private function generateSchedSocialMediaContent($campaignId) {
        // Logic to generate social media content
        return [
            'facebook' => 'Facebook content for campaign ID ' . $campaignId,
            'twitter' => 'Twitter content for campaign ID ' . $campaignId,
        ];
    }

    private function generateSentimentTag($line): string
    {
        $tags = [];

        if (stripos($line, 'momentum') !== false || stripos($line, 'breakout') !== false) {
            $tags[] = '📈 Strong Momentum';
        }

        if (stripos($line, 'risk') !== false || stripos($line, 'uncertain') !== false) {
            $tags[] = '⚠️ High Risk';
        }

        if (stripos($line, 'MACD') !== false || stripos($line, 'reversal') !== false) {
            $tags[] = '🔄 MACD Reversal';
        }

        return count($tags) ? '[' . implode(' | ', $tags) . ']' : '';
    }

    private function parseNumericValue($value): ?float
    {
        if (is_numeric($value)) {
            return (float) $value;
        }

        if (is_string($value)) {
            $clean = trim($value);
            if ($clean === '' || $clean === '.' || stripos($clean, 'nan') !== false) {
                return null;
            }

            if (is_numeric($clean)) {
                return (float) $clean;
            }
        }

        return null;
    }

    private function formatPercent(?float $value, int $precision = 2): string
    {
        if ($value === null) {
            return 'n/a';
        }

        $sign = $value > 0 ? '+' : '';
        return $sign . number_format($value, $precision) . '%';
    }

    private function formatCurrency(?float $value, string $currency = 'USD'): string
    {
        if ($value === null) {
            return 'n/a';
        }

        $symbol = $currency === 'USD' ? '$' : '';
        return $symbol . number_format($value, 2);
    }

    private function formatIndicatorValue(string $label, ?float $value): string
    {
        if ($value === null) {
            return 'n/a';
        }

        $percentHints = ['rate', 'yield', 'inflation', 'unemployment'];
        foreach ($percentHints as $hint) {
            if (stripos($label, $hint) !== false) {
                return $this->formatPercent($value);
            }
        }

        return number_format($value, 2);
    }

    private function buildHashtagFallback(array $keywords): string
    {
        $hashtags = [];
        foreach (array_slice($keywords, 0, 6) as $keyword) {
            $clean = preg_replace('/[^A-Za-z0-9]+/', '', (string) $keyword);
            if ($clean === '') {
                continue;
            }
            $hashtags[] = '#' . ucfirst(strtolower($clean));
        }

        return implode(' ', array_values(array_unique(array_filter($hashtags))));
    }

    public function collectDailyCampaignData(array $options = []): array
    {
        $symbolInput = $options['symbols'] ?? ['SPY', 'QQQ', 'DIA'];
        $symbols = array_values(array_unique(array_filter(array_map(static function ($symbol) {
            $symbol = strtoupper(trim((string) $symbol));
            return preg_match('/^[A-Z0-9\.\-]+$/', $symbol) ? $symbol : null;
        }, (array) $symbolInput))));
        if (empty($symbols)) {
            $symbols = ['SPY', 'QQQ', 'DIA'];
        }

        $cryptoInput = $options['crypto'] ?? ['bitcoin', 'ethereum', 'solana'];
        $cryptoMap = [];
        foreach ((array) $cryptoInput as $key => $value) {
            if (is_string($key) && !is_numeric($key)) {
                $id = strtolower(trim($key));
                $label = is_string($value) && $value !== '' ? $value : ucwords(str_replace('-', ' ', $id));
            } else {
                $id = strtolower(trim((string) $value));
                $label = ucwords(str_replace('-', ' ', $id));
            }

            if ($id !== '') {
                $cryptoMap[$id] = $label;
            }
        }
        if (empty($cryptoMap)) {
            $cryptoMap = ['bitcoin' => 'Bitcoin', 'ethereum' => 'Ethereum'];
        }

        $economicDefaults = [
            'CPIAUCSL' => 'Consumer Price Index',
            'UNRATE'   => 'Unemployment Rate',
            'DGS10'    => '10-Year Treasury Yield',
        ];
        $economicInput = $options['economic'] ?? $economicDefaults;
        $economicSeries = [];
        foreach ((array) $economicInput as $key => $value) {
            if (is_string($key) && !is_numeric($key)) {
                $seriesId = strtoupper(trim($key));
                $label = is_string($value) && $value !== '' ? $value : ($economicDefaults[$seriesId] ?? $seriesId);
            } else {
                $seriesId = strtoupper(trim((string) $value));
                $label = $economicDefaults[$seriesId] ?? $seriesId;
            }

            if ($seriesId !== '') {
                $economicSeries[$seriesId] = $label;
            }
        }
        if (empty($economicSeries)) {
            $economicSeries = $economicDefaults;
        }

        $stocks = [];
        foreach ($symbols as $symbol) {
            $quote = [];
            if ($this->alphaVantage instanceof MyMIAlphaVantage) {
                try {
                    $quote = $this->alphaVantage->getGlobalQuoteDetailed($symbol);
                } catch (\Throwable $e) {
                    log_message('error', 'MyMIMarketing::collectDailyCampaignData AlphaVantage error: ' . $e->getMessage());
                }

                if (empty($quote)) {
                    try {
                        $priceOnly = $this->alphaVantage->getCurrentPrice($symbol);
                        $quote = array_merge(['symbol' => $symbol], $priceOnly);
                    } catch (\Throwable $e) {
                        log_message('error', 'MyMIMarketing::collectDailyCampaignData AlphaVantage fallback error: ' . $e->getMessage());
                    }
                }
            }

            $news = $this->fetchRecentFinancialNews($symbol);

            $stocks[] = [
                'symbol'             => $symbol,
                'price'              => $this->parseNumericValue($quote['price'] ?? null),
                'change'             => $this->parseNumericValue($quote['change'] ?? null),
                'change_percent'     => $this->parseNumericValue($quote['change_percent'] ?? null),
                'volume'             => isset($quote['volume']) ? (int) $quote['volume'] : null,
                'latest_trading_day' => $quote['latest_trading_day'] ?? null,
                'news'               => $news,
                'source'             => $quote ? ($quote['source'] ?? 'alphavantage') : null,
            ];
        }

        $cryptoData = [];
        foreach ($cryptoMap as $id => $label) {
            $info = [];
            if ($this->coinGecko instanceof MyMICoinGecko) {
                try {
                    $info = $this->coinGecko->getCoinInfo($id);
                } catch (\Throwable $e) {
                    log_message('error', 'MyMIMarketing::collectDailyCampaignData CoinGecko error: ' . $e->getMessage());
                }
            }

            $price = $info['market_data']['current_price']['usd'] ?? null;
            if ($price === null && $this->coinGecko instanceof MyMICoinGecko) {
                try {
                    $price = $this->coinGecko->getPrice($id);
                } catch (\Throwable $e) {
                    log_message('error', 'MyMIMarketing::collectDailyCampaignData CoinGecko price error: ' . $e->getMessage());
                }
            }

            $change24 = $info['market_data']['price_change_percentage_24h'] ?? null;
            if (is_array($change24)) {
                $change24 = $change24['usd'] ?? null;
            }

            $cryptoData[] = [
                'id'             => $id,
                'name'           => $info['name'] ?? $label,
                'label'          => $label,
                'symbol'         => strtoupper($info['symbol'] ?? substr($id, 0, 5)),
                'price'          => $this->parseNumericValue($price),
                'change_percent' => $this->parseNumericValue($change24),
                'market_cap'     => $this->parseNumericValue($info['market_data']['market_cap']['usd'] ?? null),
                'source'         => 'coingecko',
            ];
        }

        $economicData = [];
        foreach ($economicSeries as $seriesId => $label) {
            $seriesData = [];
            if ($this->fred instanceof FRED) {
                try {
                    $seriesData = $this->fred->fetchData($seriesId);
                } catch (\Throwable $e) {
                    log_message('error', 'MyMIMarketing::collectDailyCampaignData FRED error: ' . $e->getMessage());
                }
            }

            $latest = null;
            $previous = null;
            if (is_array($seriesData)) {
                foreach (array_reverse($seriesData) as $observation) {
                    $value = $this->parseNumericValue($observation['value'] ?? null);
                    if ($value === null) {
                        continue;
                    }

                    if ($latest === null) {
                        $latest = ['date' => $observation['date'] ?? null, 'value' => $value];
                    } elseif ($previous === null) {
                        $previous = ['date' => $observation['date'] ?? null, 'value' => $value];
                        break;
                    }
                }
            }

            $change = null;
            $changePercent = null;
            if ($latest && $previous) {
                $change = $latest['value'] - $previous['value'];
                if ($previous['value'] != 0.0) {
                    $changePercent = ($change / abs($previous['value'])) * 100;
                }
            }

            $economicData[] = [
                'series_id'       => $seriesId,
                'label'           => $label,
                'latest_value'    => $latest['value'] ?? null,
                'latest_date'     => $latest['date'] ?? null,
                'previous_value'  => $previous['value'] ?? null,
                'previous_date'   => $previous['date'] ?? null,
                'change'          => $change,
                'change_percent'  => $changePercent,
                'source'          => 'fred',
            ];
        }

        return [
            'timestamp'        => date('c'),
            'symbols'          => $symbols,
            'crypto_labels'    => $cryptoMap,
            'economic_series'  => $economicSeries,
            'stocks'           => $stocks,
            'crypto'           => $cryptoData,
            'economic'         => $economicData,
            'sources'          => [
                'equities' => 'Alpha Vantage GLOBAL_QUOTE',
                'crypto'   => 'CoinGecko public API',
                'economic' => 'FRED /fred/series/observations',
                'news'     => 'MarketAux /v1/news/all',
            ],
        ];
    }

    public function buildDailyCampaignPlaybook(array $data, array $options = []): array
    {
        $timestamp = $data['timestamp'] ?? date('c');
        $campaignName = $options['campaign_name'] ?? sprintf('Daily Market Pulse — %s', date('F j, Y', strtotime($timestamp)));
        $headline = $options['headline'] ?? $campaignName;

        $stocks = $data['stocks'] ?? [];
        $crypto = $data['crypto'] ?? [];
        $economic = $data['economic'] ?? [];
        $cryptoLabels = $data['crypto_labels'] ?? [];
        $economicLabels = $data['economic_series'] ?? [];

        $stockSummaryParts = array_filter(array_map(function ($stock) {
            $symbol = $stock['symbol'] ?? '';
            if ($symbol === '') {
                return null;
            }

            $price = $this->formatCurrency($this->parseNumericValue($stock['price'] ?? null));
            $change = $this->formatPercent($this->parseNumericValue($stock['change_percent'] ?? null));
            return trim(sprintf('%s %s (%s)', $symbol, $price, $change));
        }, $stocks));
        $stockSummary = $stockSummaryParts ? 'Equities: ' . implode(', ', $stockSummaryParts) . '.' : 'Equities data unavailable.';

        $cryptoSummaryParts = array_filter(array_map(function ($coin) {
            $symbol = $coin['symbol'] ?? ($coin['id'] ?? '');
            if ($symbol === '') {
                return null;
            }

            $price = $this->formatCurrency($this->parseNumericValue($coin['price'] ?? null));
            $change = $this->formatPercent($this->parseNumericValue($coin['change_percent'] ?? null));
            return trim(sprintf('%s %s (%s)', strtoupper($symbol), $price, $change));
        }, $crypto));
        $cryptoSummary = $cryptoSummaryParts ? 'Crypto: ' . implode(', ', $cryptoSummaryParts) . '.' : 'Crypto majors steady.';

        $economicSummaryParts = [];
        foreach ($economic as $indicator) {
            $label = $indicator['label'] ?? ($indicator['series_id'] ?? '');
            if ($label === '') {
                continue;
            }

            $value = $this->formatIndicatorValue($label, $this->parseNumericValue($indicator['latest_value'] ?? null));
            $changePercent = $this->parseNumericValue($indicator['change_percent'] ?? null);
            $changeRaw = $this->parseNumericValue($indicator['change'] ?? null);
            $date = $indicator['latest_date'] ?? '';

            $changeText = null;
            if ($changePercent !== null) {
                $changeText = $this->formatPercent($changePercent);
            } elseif ($changeRaw !== null) {
                $sign = $changeRaw > 0 ? '+' : '';
                $changeText = $sign . number_format($changeRaw, 2);
            }

            $snippet = sprintf(
                '%s %s%s%s',
                $label,
                $value,
                $changeText ? ' (' . $changeText . ')' : '',
                $date ? ' as of ' . $date : ''
            );
            $economicSummaryParts[] = trim($snippet);
        }
        $economicSummary = $economicSummaryParts ? 'Economic: ' . implode('; ', $economicSummaryParts) . '.' : 'Economic indicators pending next release.';

        $primarySummary = trim($stockSummary . ' ' . $cryptoSummary . ' ' . $economicSummary);

        $keywords = array_values(array_unique(array_filter(array_merge(
            $data['symbols'] ?? array_column($stocks, 'symbol'),
            array_map(static function ($coin) {
                return strtoupper($coin['symbol'] ?? ($coin['id'] ?? ''));
            }, $crypto),
            array_map(static function ($indicator) {
                return preg_replace('/[^A-Za-z0-9 ]+/', '', $indicator['label'] ?? $indicator['series_id'] ?? '');
            }, $economic)
        ))));

        $platformPosts = $this->generateUnifiedSocialPosts($primarySummary, $keywords);
        $hashtags = trim($this->extractHashtags($primarySummary));
        if ($hashtags === '') {
            $hashtags = $this->buildHashtagFallback($keywords);
        }

        $avgChange = null;
        $changes = array_filter(array_map(function ($stock) {
            return $this->parseNumericValue($stock['change_percent'] ?? null);
        }, $stocks), static fn($value) => $value !== null);
        if (!empty($changes)) {
            $avgChange = array_sum($changes) / count($changes);
        }

        $mood = 'mixed';
        if ($avgChange !== null) {
            if ($avgChange >= 0.5) {
                $mood = 'bullish';
            } elseif ($avgChange <= -0.5) {
                $mood = 'bearish';
            } elseif ($avgChange > 0.1) {
                $mood = 'risk-on';
            } elseif ($avgChange < -0.1) {
                $mood = 'risk-off';
            }
        }

        $voiceover = sprintf(
            'Here is your Daily Market Pulse for %s. %s Stay informed with MyMI Wallet.',
            date('F j, Y', strtotime($timestamp)),
            $primarySummary
        );

        $dashboardRequirements = [
            [
                'type'        => 'equities',
                'provider'    => 'Alpha Vantage',
                'endpoint'    => 'https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={symbol}',
                'environment' => 'ALPHA_VANTAGE_API_KEY or ALPHA_VANTAGE_API_KEYS',
                'notes'       => 'Free tier: 5 requests per minute. Rotate keys for higher throughput.',
            ],
            [
                'type'        => 'crypto',
                'provider'    => 'CoinGecko',
                'endpoint'    => 'https://api.coingecko.com/api/v3/coins/{id}',
                'environment' => 'No API key required.',
                'notes'       => 'Respect public rate limits (approx. 50 calls/min). Cache responses for dashboards.',
            ],
            [
                'type'        => 'economic',
                'provider'    => 'FRED',
                'endpoint'    => 'https://api.stlouisfed.org/fred/series/observations?series_id={series_id}&file_type=json',
                'environment' => 'FRED_API_KEY',
                'notes'       => 'Free access up to 1200 requests/day. Refresh data after official releases.',
            ],
            [
                'type'        => 'news',
                'provider'    => 'MarketAux',
                'endpoint'    => 'https://api.marketaux.com/v1/news/all?symbols={symbol}',
                'environment' => 'MARKETAUX_API_KEY',
                'notes'       => 'Use for equity headlines and sentiment. Developer tier suited for automation.',
            ],
        ];

        $campaign = [
            'name'                   => $campaignName,
            'headline'               => $headline,
            'summary'                => $primarySummary,
            'hashtags'               => $hashtags,
            'voiceover'              => $voiceover,
            'platform_messages'      => $platformPosts,
            'generated_at'           => $timestamp,
            'mood'                   => $mood,
            'sources'                => $data['sources'] ?? [],
            'dashboard_requirements' => $dashboardRequirements,
        ];

        $overviewNode = [
            'type'              => 'market_overview',
            'title'             => $headline,
            'summary'           => $primarySummary,
            'platform_messages' => $platformPosts,
            'voiceover_script'  => $voiceover,
            'email_template'    => $this->formatEmailBlast($headline, $primarySummary),
            'blog_template'     => $this->formatBlogPost($headline, $primarySummary),
            'hashtags'          => $hashtags,
            'data_points'       => ['stocks' => $stocks, 'crypto' => $crypto, 'economic' => $economic],
            'sources'           => $data['sources'] ?? [],
            'cta'               => 'Open your MyMI Wallet dashboard to explore watchlists, alerts, and budgeting tools.',
            'zapier_payload'    => [
                'event'    => 'daily_market_campaign',
                'segment'  => 'market_overview',
                'campaign' => $campaignName,
                'generated'=> $timestamp,
                'mood'     => $mood,
            ],
        ];

        $stockNarratives = array_filter(array_map(function ($stock) {
            $symbol = $stock['symbol'] ?? '';
            if ($symbol === '') {
                return null;
            }
            $change = $this->formatPercent($this->parseNumericValue($stock['change_percent'] ?? null));
            $price = $this->formatCurrency($this->parseNumericValue($stock['price'] ?? null));
            $headline = $stock['news']['headline'] ?? null;
            $snippet = sprintf('%s %s to %s', $symbol, $change, $price);
            if ($headline) {
                $snippet .= ' — ' . $headline;
            }
            return $snippet;
        }, $stocks));
        $stockDetails = $stockNarratives ? implode('; ', $stockNarratives) . '.' : 'No notable equity catalysts detected today.';
        $stockPosts = $this->generateUnifiedSocialPosts($stockDetails, array_merge($data['symbols'] ?? [], ['stocks', 'marketpulse']));
        $stockNode = [
            'type'              => 'stock_highlights',
            'title'             => 'Equity Highlights',
            'summary'           => $stockDetails,
            'platform_messages' => $stockPosts,
            'voiceover_script'  => 'Top equity movers: ' . $stockDetails,
            'email_template'    => $this->formatEmailBlast('Equity Highlights', $stockDetails),
            'blog_template'     => $this->formatBlogPost('Equity Highlights', $stockDetails),
            'hashtags'          => $this->buildHashtagFallback(array_merge($data['symbols'] ?? [], ['stocks'])),
            'data_points'       => ['stocks' => $stocks],
            'sources'           => $data['sources'] ?? [],
            'cta'               => 'Review your portfolio allocations inside MyMI Wallet and adjust planned trades.',
            'zapier_payload'    => [
                'event'   => 'daily_market_campaign',
                'segment' => 'stock_highlights',
                'symbols' => $data['symbols'] ?? [],
            ],
        ];

        $cryptoNarratives = array_filter(array_map(function ($coin) {
            $name = $coin['name'] ?? $coin['label'] ?? $coin['id'] ?? '';
            if ($name === '') {
                return null;
            }
            $price = $this->formatCurrency($this->parseNumericValue($coin['price'] ?? null));
            $change = $this->formatPercent($this->parseNumericValue($coin['change_percent'] ?? null));
            return sprintf('%s at %s (%s)', $name, $price, $change);
        }, $crypto));
        $cryptoDetails = $cryptoNarratives ? implode('; ', $cryptoNarratives) . '.' : 'Digital assets traded sideways on light volume.';
        $cryptoKeywords = array_values(array_unique(array_merge(array_keys($cryptoLabels), array_map(static function ($coin) {
            return $coin['symbol'] ?? $coin['id'] ?? '';
        }, $crypto))));
        $cryptoPosts = $this->generateUnifiedSocialPosts($cryptoDetails, array_merge($cryptoKeywords, ['crypto', 'defi']));
        $cryptoNode = [
            'type'              => 'crypto_watch',
            'title'             => 'Crypto Watchlist',
            'summary'           => $cryptoDetails,
            'platform_messages' => $cryptoPosts,
            'voiceover_script'  => 'Crypto update: ' . $cryptoDetails,
            'email_template'    => $this->formatEmailBlast('Crypto Watchlist', $cryptoDetails),
            'blog_template'     => $this->formatBlogPost('Crypto Watchlist', $cryptoDetails),
            'hashtags'          => $this->buildHashtagFallback(array_merge($cryptoKeywords, ['crypto'])),
            'data_points'       => ['crypto' => $crypto],
            'sources'           => $data['sources'] ?? [],
            'cta'               => 'Track token-specific alerts and treasury balances within the MyMI Wallet dashboard.',
            'zapier_payload'    => [
                'event'  => 'daily_market_campaign',
                'segment'=> 'crypto_watch',
                'assets' => $cryptoKeywords,
            ],
        ];

        $economicNarratives = [];
        foreach ($economic as $indicator) {
            $label = $indicator['label'] ?? ($indicator['series_id'] ?? '');
            if ($label === '') {
                continue;
            }
            $value = $this->formatIndicatorValue($label, $this->parseNumericValue($indicator['latest_value'] ?? null));
            $changePercent = $this->parseNumericValue($indicator['change_percent'] ?? null);
            $changeRaw = $this->parseNumericValue($indicator['change'] ?? null);
            $date = $indicator['latest_date'] ?? '';

            $changeText = null;
            if ($changePercent !== null) {
                $changeText = $this->formatPercent($changePercent);
            } elseif ($changeRaw !== null) {
                $sign = $changeRaw > 0 ? '+' : '';
                $changeText = $sign . number_format($changeRaw, 2);
            }

            $economicNarratives[] = trim(sprintf(
                '%s at %s%s%s',
                $label,
                $value,
                $changeText ? ' (' . $changeText . ')' : '',
                $date ? ' as of ' . $date : ''
            ));
        }
        $economicDetails = $economicNarratives ? implode('; ', $economicNarratives) . '.' : 'Awaiting the next macro data release from FRED.';
        $economicKeywords = array_values(array_unique(array_merge(array_keys($economicLabels), array_map(static function ($indicator) {
            return $indicator['label'] ?? $indicator['series_id'] ?? '';
        }, $economic))));
        $economicPosts = $this->generateUnifiedSocialPosts($economicDetails, array_merge($economicKeywords, ['macro', 'economy']));
        $economicNode = [
            'type'              => 'economic_radar',
            'title'             => 'Economic Dashboard',
            'summary'           => $economicDetails,
            'platform_messages' => $economicPosts,
            'voiceover_script'  => 'Macro dashboard: ' . $economicDetails,
            'email_template'    => $this->formatEmailBlast('Economic Dashboard', $economicDetails),
            'blog_template'     => $this->formatBlogPost('Economic Dashboard', $economicDetails),
            'hashtags'          => $this->buildHashtagFallback(array_merge($economicKeywords, ['macro'])),
            'data_points'       => ['economic' => $economic],
            'sources'           => $data['sources'] ?? [],
            'cta'               => 'Use the economic dashboard inside MyMI Wallet to plan allocation and risk scenarios.',
            'zapier_payload'    => [
                'event'  => 'daily_market_campaign',
                'segment'=> 'economic_radar',
                'series' => array_keys($economicLabels),
            ],
        ];

        return [
            'campaign'      => $campaign,
            'sub_campaigns' => [$overviewNode, $stockNode, $cryptoNode, $economicNode],
        ];
    }

    protected function persistCampaignNode(array $campaignMeta, array $node): ?int
    {
        $platforms = $node['platform_messages'] ?? [];
        $videoScript = $node['video_script'] ?? ($node['voiceover_script'] ?? '');

        $insert = [
            'campaign_id'        => $campaignMeta['id'] ?? 0,
            'title'              => $node['title'] ?? ($campaignMeta['name'] ?? 'Daily Campaign'),
            'description'        => $node['summary'] ?? '',
            'platform'           => 'multi',
            'post_text'          => $platforms['facebook'] ?? $platforms['linkedin'] ?? $platforms['twitter'] ?? ($node['summary'] ?? ''),
            'voice_script'       => $node['voiceover_script'] ?? '',
            'facebook_message'   => $platforms['facebook'] ?? '',
            'linkedin_message'   => $platforms['linkedin'] ?? '',
            'discord_message'    => $platforms['discord'] ?? '',
            'stocktwits_message' => $platforms['twitter'] ?? '',
            'tiktok_message'     => $videoScript,
            'youtube_message'    => $videoScript,
            'email_message'      => $node['email_template'] ?? '',
            'hashtags'           => $node['hashtags'] ?? '',
            'metadata'           => json_encode([
                'type'        => $node['type'] ?? 'daily_campaign',
                'sources'     => $node['sources'] ?? ($campaignMeta['sources'] ?? []),
                'data_points' => $node['data_points'] ?? [],
                'cta'         => $node['cta'] ?? null,
                'campaign'    => $campaignMeta['name'] ?? null,
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'status'             => $node['status'] ?? 'pending',
            'created_at'         => date('Y-m-d H:i:s'),
            'updated_at'         => date('Y-m-d H:i:s'),
        ];

        if (!empty($node['zapier_payload'])) {
            $insert['additional_info'] = json_encode($node['zapier_payload'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }

        try {
            $saved = $this->marketingModel->insertGeneratedContent($insert);
            if ($saved) {
                return (int) $this->marketingModel->getInsertID();
            }
        } catch (\Throwable $e) {
            log_message('error', 'MyMIMarketing::persistCampaignNode failed: ' . $e->getMessage());
        }

        return null;
    }

    public function generateDailyCampaignPackage(array $options = []): array
    {
        $data = $this->collectDailyCampaignData($options);
        $playbook = $this->buildDailyCampaignPlaybook($data, $options);

        $saved = [];
        foreach ($playbook['sub_campaigns'] as $node) {
            $id = $this->persistCampaignNode($playbook['campaign'], $node);
            if ($id) {
                $saved[] = $id;
            }
        }

        $playbook['saved_nodes'] = $saved;
        $playbook['data'] = $data;

        return $playbook;
    }

    public function generateUnifiedSocialPosts(string $summary, array $keywords = [], array $platforms = []): array
    {
        if (is_array($summary)) {
            $summary = implode(' ', $summary);
        }
        $hashtags = implode(' ', array_map(fn($k) => '#'.ucfirst(trim($k)), array_slice($keywords, 0, 5)));
        $postContent = [];
    
        if (empty($platforms) || ($platforms['twitter'] ?? true)) {
            $postContent['twitter'] = substr("{$summary} {$hashtags}", 0, 280);
        }
    
        if (empty($platforms) || ($platforms['facebook'] ?? true)) {
            $postContent['facebook'] = "{$summary}\n\n{$hashtags}";
        }
    
        if (empty($platforms) || ($platforms['linkedin'] ?? true)) {
            $postContent['linkedin'] = "{$summary}\n\n#StayInformed {$hashtags}";
        }
    
        if (empty($platforms) || ($platforms['discord'] ?? true)) {
            $postContent['discord'] = "**News Summary:**\n{$summary}\n\n{$hashtags}";
        }
    
        if (empty($platforms) || ($platforms['email'] ?? true)) {
            $postContent['email'] = "Subject: Your Market Update\n\n{$summary}\n\n{$hashtags}";
        }
    
        if (empty($platforms) || ($platforms['blog'] ?? true)) {
            $postContent['blog'] = "<h2>Market Insight</h2><p>{$summary}</p><p>{$hashtags}</p>";
        }
    
        return $postContent;
    }
    
    private function generateTradeAlertMessage($alert, $action)
    {
        return "**🚀 TRADE ALERT! 🚀**\n"
            . "**Symbol:** {$alert['ticker']}\n"
            . "**Company:** {$alert['company']}\n"
            . "**Type:** {$action}\n"
            . "**Price:** \${$alert['price']}\n"
            . "**Target:** \${$alert['target_price']}\n"
            . "**Stop Loss:** \${$alert['stop_loss']}\n"
            . "[📊 View Chart]({$alert['tv_chart']})";
    } 

    public function getFinalizedContent($limit = 10)
    {
        return $this->marketingModel
            ->where('status', 'ready')
            ->where('title IS NOT NULL')
            ->where('summary IS NOT NULL')
            ->orderBy('created_on', 'DESC')
            ->limit($limit)
            ->findAll();
    }
    
    public function getScrapesByKeyword($keyword) {
        return $this->marketingModel->getScrapesByKeyword($keyword); // assumes this method exists in model
    }

    private function getStopWords()
    {
        return [
            'the', 'and', 'that', 'have', 'for', 'not', 'with', 'you', 'this', 'but',
            'his', 'from', 'they', 'she', 'which', 'will', 'would', 'there', 'their',
            'what', 'about', 'could', 'your', 'than', 'them', 'can', 'only', 'other',
            'new', 'some', 'time', 'these', 'two', 'may', 'then', 'do', 'any', 'each',
            'many', 'so', 'more', 'has', 'been', 'was', 'were', 'are', 'as', 'on', 'in', 'at'
        ];
        // return [
        //     "a", "the", "and", "of", "in", "to", "is", "you", "that", "it", "he", "was", "for", "on", "are", "as", "with", "his", "they", "I", "at", "be", "this", "have", "from", "or", "one", "had", "by", "word", "but", "not", "what", "all", "were", "we", "when", "your", "can", "said", "there", "use", "an", "each", "which", "she", "do", "how", "their", "if", "will", "up", "other", "about", "out", "many", "then", "them", "these", "so", "some", "her", "would", "make", "like", "him", "into", "time", "has", "look", "two", "more", "write", "go", "see", "number", "no", "way", "could", "people", "my", "than", "first", "water", "been", "call", "who", "oil", "its", "now", "find", "long", "down", "day", "did", "get", "come", "made", "may", "part"
        // ];
    }

    public function getTimelineGroupedByTopic()
    {
        $allArticles = $this->marketingModel->getAllFinalizedArticles();
    
        $groupedByTopic = [];
        foreach ($allArticles as $article) {
            $topic = $article['topic'] ?? 'General';
            $groupedByTopic[$topic][] = $article;
        }
    
        // Apply timeline grouping to each topic group
        $finalTimeline = [];
        foreach ($groupedByTopic as $topic => $articles) {
            $finalTimeline[$topic] = $this->generateTimelineData($articles);
        }
    
        return $finalTimeline;
    }

    public function getTopKeywordScores($content, $max = 10)
    {
        if (!is_string($content)) {
            log_message('error', 'getTopKeywordScores(): Content must be a string');
            return [];
        }
    
        $content = $this->normalizeUtf8($content);
        $sentences = $this->splitIntoSentences($content);
    
        if (empty($sentences)) {
            log_message('error', 'getTopKeywordScores(): No valid sentences to process');
            return [];
        }
    
        $tokenized = array_values(array_filter(array_map(function ($sentence) {
            $cleaned = strtolower($this->normalizeUtf8(trim($sentence)));
            $tokens = preg_split('/\W+/', $cleaned, -1, PREG_SPLIT_NO_EMPTY);
            return array_filter($tokens, fn($w) => strlen($w) > 2);
        }, $sentences)));
    
        if (empty($tokenized) || !isset($tokenized[0]) || !is_array($tokenized[0])) {
            log_message('error', 'getTopKeywordScores(): Tokenized input invalid. Tokenized: ' . json_encode($tokenized));
            return [];
        }
    
        try {
            $vectorizer = new TokenCountVectorizer(new WhitespaceTokenizer());
            $vectorizer->fit($tokenized);
            $vectorizer->transform($tokenized);
    
            $vocab = $vectorizer->getVocabulary();
            $invertedVocab = array_flip($vocab);
    
            $tfIdf = new TfIdfTransformer();
            $tfIdf->fit($tokenized);
            $tfIdf->transform($tokenized);
        } catch (\Throwable $e) {
            log_message('error', 'getTopKeywordScores(): TF-IDF processing failed — ' . $e->getMessage());
            return [];
        }
    
        $scores = [];
        foreach ($tokenized as $doc) {
            foreach ($doc as $index => $value) {
                if (!isset($invertedVocab[$index]) || !is_numeric($value)) {
                    continue;
                }
    
                $word = $invertedVocab[$index];
                $scores[$word] = ($scores[$word] ?? 0.0) + (float) $value;
            }
        }
    
        if (empty($scores)) {
            log_message('error', 'getTopKeywordScores(): No TF-IDF scores generated after transformation.');
            return [];
        }
    
        arsort($scores);
        return array_keys(array_slice($scores, 0, $max, true));
    }

    private function getTopLinks(string $query): array
    {
        $model = new \App\Models\MarketingModel();
    
        // 🔍 Try Bing first
        $results = $this->searchWithBing($query);
    
        if (!empty($results)) {
            $model->logSearchEngineUsage('bing', $query, count($results));
            return array_slice($results, 0, 5);
        }
    
        // 🔁 Fall back to Google
        log_message('debug', '🔁 Bing empty, falling back to Google...');
        $results = $this->searchWithGoogle($query);
    
        if (!empty($results)) {
            $model->logSearchEngineUsage('google', $query, count($results));
        }
    
        return array_slice($results, 0, 5);
    }    
    
    /**
     * Groups summaries by basic cosine similarity logic.
     *
     * @param array $summaries Each summary must have a 'summary' key.
     * @return array Grouped array of summaries.
     */
    public function groupSimilarSummariesByCosine(array $summaries): array
    {
        if (empty($summaries)) {
            log_message('debug', '🧪 groupSimilarSummariesByCosine() called with empty summaries.');
            return [];
        }

        // If only 1 item, just return it grouped alone
        if (count($summaries) === 1) {
            return [ $summaries ];
        }

        $groups = [];
        $used = [];

        for ($i = 0; $i < count($summaries); $i++) {
            if (isset($used[$i])) continue;

            $current = $summaries[$i];
            $group = [ $current ];
            $used[$i] = true;

            for ($j = $i + 1; $j < count($summaries); $j++) {
                if (isset($used[$j])) continue;

                $cosSim = $this->getCosineSimilarity(
                    $this->splitIntoWords($current['summary'] ?? ''),
                    $this->splitIntoWords($summaries[$j]['summary'] ?? '')
                );

                if ($cosSim >= 0.75) {
                    $group[] = $summaries[$j];
                    $used[$j] = true;
                }
            }

            $groups[] = $group;
        }

        return $groups;
    }

    /**
     * Basic cosine similarity between two word arrays.
     */
    private function getCosineSimilarity(array $words1, array $words2): float
    {
        $allWords = array_unique(array_merge($words1, $words2));
        $vec1 = array_fill_keys($allWords, 0);
        $vec2 = $vec1;

        foreach ($words1 as $word) {
            $vec1[$word]++;
        }

        foreach ($words2 as $word) {
            $vec2[$word]++;
        }

        $dot = 0;
        $mag1 = 0;
        $mag2 = 0;

        foreach ($allWords as $word) {
            $dot += $vec1[$word] * $vec2[$word];
            $mag1 += pow($vec1[$word], 2);
            $mag2 += pow($vec2[$word], 2);
        }

        if ($mag1 == 0 || $mag2 == 0) {
            return 0.0;
        }

        return $dot / (sqrt($mag1) * sqrt($mag2));
    }

    /**
     * Determine if a given timestamp is on a different calendar day than today.
     *
     * If your code actually needs to compare two arbitrary dates, 
     * you can expand this to accept two arguments. 
     *
     * @param string|DateTime $dateString A timestamp string (e.g. '2025-05-29 12:34:56') or a DateTime object.
     * @return bool  True if $dateString’s Y-m-d does NOT match today’s Y-m-d. False if it is the same day.
     */
    public function isDifferentDay($dateString): bool
    {
        try {
            // If $dateString is already a DateTime, use it; otherwise parse it.
            if ($dateString instanceof DateTime) {
                $recordDt = clone $dateString;
            } else {
                $recordDt = new DateTime($dateString);
            }
        } catch (Exception $e) {
            // If parsing fails for any reason, log and default to true (so we don’t block generation).
            log_message('error', "MyMIMarketing::isDifferentDay(): invalid date '$dateString' - " . $e->getMessage());
            return true;
        }

        // Format just the date portion (YYYY-MM-DD)
        $recordDateOnly = $recordDt->format('Y-m-d');
        $todayDateOnly  = (new DateTime())->format('Y-m-d');

        // If they differ, return true; otherwise false
        return ($recordDateOnly !== $todayDateOnly);
    }
    
    public function insertFinalScraper($record, $summary)
    {
        $model = new MarketingModel();
    
        if (!isset($record['id']) || !$summary) {
            log_message('error', '❌ Missing record ID or summary when calling insertFinalScraper()');
            return false;
        }
    
        // ✅ Prevent duplicate inserts
        $existing = $model->where('source_id', $record['id'])->first();
        if ($existing) {
            log_message('info', "⚠️ Final scrape already exists for source_id: {$record['id']}");
            return false;
        }
        $summary = $this->sanitizeSummary($summary['summary']);
        // ✅ Ensure encoding is safe
        $cleanSummary = mb_convert_encoding($summary, 'UTF-8', 'UTF-8');
    
        // ✅ Strip emojis and special characters from title
        $cleanTitle = isset($record['title']) ? $record['title'] : word_limiter($cleanSummary, 12);

        // Decode malformed MIME headers
        if (stripos($cleanTitle, 'utf-8q') !== false || stripos($cleanTitle, '=?utf-8') !== false) {
            $cleanTitle = $this->decodeMimeHeaderSafe($cleanTitle);
        }
        
        $cleanTitle = preg_replace('/[^\p{L}\p{N}\s:;\-]/u', '', $cleanTitle);

        $cta = $this->generateCTA($summary['summary']);
        $data = [
            'source_id' => $record['id'],
            'title' => trim($cleanTitle),
            'summary' => trim($cleanSummary),
            'keywords' => isset($summary['keywords']) ? implode(',', $summary['keywords']) : '',
            'cta' => $cta, // <-- ✅ ADD THIS
            'date_created' => date('Y-m-d H:i:s'),
        ];
    
        $result = $model->insert($data);
        if ($result) {
            log_message('info', "✅ Final scraped content inserted for source_id: {$record['id']}");
        } else {
            log_message('error', "❌ Failed to insert final scrape for source_id: {$record['id']}");
        }
    
        return $result;
    }

    /**
     * Prevent duplicate processing by checking if email_identifier already exists
     */
    public function isEmailAlreadyHandled(string $identifier): bool
    {
        $existing = $this->marketingModel
            ->where('email_identifier', $identifier)
            ->first();
        return !empty($existing);
    }

    private function isSemanticallyDifferent($sentence1, $sentence2, $tokens)
    {
        $tokens1 = array_intersect($tokens, str_word_count(strtolower($sentence1), 1));
        $tokens2 = array_intersect($tokens, str_word_count(strtolower($sentence2), 1));
        $overlap = count(array_intersect($tokens1, $tokens2));
        $threshold = 2;
        return $overlap < $threshold;
    }

    private function pageRank($matrix, $dampingFactor = 0.85, $maxIterations = 100, $tolerance = 1e-6)
    {
        $numSentences = count($matrix);
        if ($numSentences == 0) {
            return [];
        }

        $pagerank = array_fill(0, $numSentences, 1 / $numSentences);
        $tempRank = array_fill(0, $numSentences, 0);

        for ($iter = 0; $iter < $maxIterations; $iter++) {
            for ($i = 0; $i < $numSentences; $i++) {
                $tempRank[$i] = (1 - $dampingFactor) / $numSentences;
                for ($j = 0; $j < $numSentences; $j++) {
                    if ($i != $j && isset($matrix[$j][$i])) {
                        $matrixRowSum = array_sum($matrix[$j]);
                        if ($matrixRowSum != 0) {
                            $tempRank[$i] += $dampingFactor * ($matrix[$j][$i] * $pagerank[$j] / $matrixRowSum);
                        }
                    }
                }
            }

            $diff = 0;
            for ($i = 0; $i < $numSentences; $i++) {
                $diff += abs($tempRank[$i] - $pagerank[$i]);
            }

            if ($diff < $tolerance) {
                break;
            }
            $pagerank = $tempRank;
        }
        return $pagerank;
    }

    /**
     * 🔍 Search Bing API
     */
    public function searchWithBing(string $query): array
    {
        $apiKey = getenv('BING_API_KEY');
        $url = 'https://api.bing.microsoft.com/v7.0/search?q=' . urlencode($query);

        try {
            $client = \Config\Services::curlrequest();
            $response = $client->get($url, [
                'headers' => ['Ocp-Apim-Subscription-Key' => $apiKey]
            ]);

            $data = json_decode($response->getBody(), true);

            // Log usage
            $model = new \App\Models\MarketingModel();
            $model->logSearchEngineUsage('bing');

            return array_column($data['webPages']['value'] ?? [], 'url');
        } catch (\Throwable $e) {
            log_message('error', '[BING] Search error: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * 🔍 Search Google Custom Search API
     */
    public function searchWithGoogle(string $query): array
    {
        $apiKey = getenv('GOOGLE_API_KEY');
        $cx = getenv('GOOGLE_SEARCH_ENGINE_ID');
        $url = "https://www.googleapis.com/customsearch/v1?q=" . urlencode($query) . "&key={$apiKey}&cx={$cx}";

        try {
            $client = \Config\Services::curlrequest();
            $response = $client->get($url);
            $data = json_decode($response->getBody(), true);

            // Log usage
            $model = new \App\Models\MarketingModel();
            $model->logSearchEngineUsage('google');

            return array_column($data['items'] ?? [], 'link');
        } catch (\Throwable $e) {
            log_message('error', '[GOOGLE] Search error: ' . $e->getMessage());
            return [];
        }
    }

    public function seoCheck()
    {
        
        $uri_string = $this->request->getUri()->getPath();
        $query = $this->marketingModel->where('url', $uri_string)->first();

        if (!$query) {
            $data = [
                'url' => $uri_string,
                'title' => str_replace(['_', '/'], [' ', ' - '], $uri_string),
                'description' => "Experience the future of personal finance with MyMI Wallet. We provide advanced budgeting and investment portfolio management solutions, empowering individuals to better manage their finances. Streamline your financial journey with our intuitive online fintech application and service.",
                'image' => base_url('/assets/images/Company/MyMI-Wallet-White.png'),
            ];

            $this->marketingModel->insert($data);
            $insert_id = $this->marketingModel->getInsertID();

            $task_info = [
                'task' => 'Page SEO Edit',
                'title' => str_replace(['_', '/'], [' ', ' - '], $uri_string),
                'seo_id' => $insert_id,
                'url' => $uri_string,
            ];

            $this->assignMarketingTask($task_info);
        }
    }

    public function social_media()
    {
        return [
            'discord' => $this->socialMedia->discord,
            'facebook_page' => $this->socialMedia->facebook_page,
            'facebook_group' => $this->socialMedia->facebook_group,
            'linkedin' => $this->socialMedia->linkedin,
            'twitter' => $this->socialMedia->twitter,
            'youtube' => $this->socialMedia->youtube,
        ];
    }

    /**
     * Tokenize a summary string into lowercase words (basic).
     */
    private function splitIntoWords(string $text): array
    {
        $text = strtolower(strip_tags($text));
        $text = preg_replace('/[^a-z0-9\s]/', '', $text);
        return array_filter(explode(' ', $text));
    }
    
    private function stripHtmlTags($htmlContent)
    {
        return strip_tags($htmlContent);
    }

    private function suggestVisualScene(string $sentence): string
    {
        // Simple logic; expand with GPT or external services later
        if (stripos($sentence, 'crypto') !== false) return 'Show crypto exchange or blockchain animation';
        if (stripos($sentence, 'budget') !== false) return 'Show pie chart of budget vs expenses';
        if (stripos($sentence, 'investment') !== false) return 'Show bar chart of portfolio growth';
        return 'Use abstract animation or text visual with branding';
    }
    
    public function testMarketingSummarizer($limit = 10)
    {
        $records = $this->marketingModel->getRecentTempScraperRecords($limit);
    
        if (empty($records)) {
            log_message('info', 'testMarketingSummarizer(): No temp records found to test.');
            return;
        }
    
        foreach ($records as $record) {
            $id = $record['id'] ?? 'N/A';
            $html = $record['content'] ?? '';
            log_message('debug', "🧪 Testing summarization for record ID $id");
    
            $summary = $this->summarizeContentFromHtml($html);
            $this->generateUnifiedSocialPosts(is_array($summary) ? implode(' ', $summary) : $summary); // Fails if $summary is array
            
            log_message('debug', '🧪 Sentence output: ' . print_r($this->splitIntoSentences($html), true));

            if ($summary) {
                log_message('info', "✅ Record ID $id summary: " . substr($summary, 0, 150));
            } else {
                log_message('error', "❌ Record ID $id failed to summarize.");
            }
        }
    }
    
    private function tokenizeSmart($text, $method = 'nlp') {
        return $method === 'nlp' 
            ? $this->tokenizeWithNlpTools($text) 
            : $this->tokenizeText($text);
    }
    
    private function tokenizeText($text)
    {
        $text = strtolower(strip_tags($text));
        return preg_split('/\W+/', $text, -1, PREG_SPLIT_NO_EMPTY);
    }
       
    public function tokenizeWithNlpTools($content)
    {
        $tokenizer = new NlpWhitespaceTokenizer();
        $tokens = $tokenizer->tokenize($content);
        $this->logger->debug('Tokens: ' . print_r($tokens, true));
        return $tokens;
    }

    public function getPageHeaders()
    {
        
        $getPageSEO = $this->marketingModel->getMarketingPageSeo();
        $pageSEOData = [];
        foreach ($getPageSEO as $pageSEO) {
            $pageSEOData[] = [
                'page_id' => $pageSEO['id'],
                'page_name' => $pageSEO['page_name'],
                'page_title' => $pageSEO['page_title'],
                'page_url' => $pageSEO['page_url'],
                'page_sitemap_url' => $pageSEO['page_sitemap_url'],
                'page_internal_url' => $pageSEO['page_internal_url'],
                'page_controller' => $pageSEO['page_controller'],
                'page_controller_url' => $pageSEO['page_controller_url'],
                'page_controller_directory' => $pageSEO['page_controller_directory'],
                'page_file_directory' => $pageSEO['page_file_directory'],
                'page_image' => $pageSEO['page_image'],
                'page_description' => $pageSEO['page_description'],
                'page_address' => $pageSEO['page_address'],
                'page_city' => $pageSEO['page_city'],
                'page_state' => $pageSEO['page_state'],
                'page_country' => $pageSEO['page_country'],
                'page_zipcode' => $pageSEO['page_zipcode'],
                'page_facebook' => $pageSEO['page_facebook'],
                'linked' => $pageSEO['linked'],
                'functionality' => $pageSEO['functionality'],
                'design' => $pageSEO['design'],
                'seo' => $pageSEO['seo'],
                'ext_links' => $pageSEO['ext_links'],
                'grammar' => $pageSEO['grammar'],
                'd_optimize' => $pageSEO['d_optimize'],
                'load_perf' => $pageSEO['load_perf'],
                'additional_notes' => $pageSEO['additional_notes'],
            ];
        }
        return $pageSEOData;
    }

    public function getPageHeadersByName($pageName)
    {
        
        $getPageSEO = $this->marketingModel->getMarketingPageSeoByName($pageName);
        $pageSEOData = [];
        foreach ($getPageSEO as $pageSEO) {
            $pageSEOData[] = [
                'page_id' => $pageSEO['id'],
                'page_name' => $pageSEO['page_name'],
                'page_title' => $pageSEO['page_title'],
                'page_url' => $pageSEO['page_url'],
                'page_sitemap_url' => $pageSEO['page_sitemap_url'],
                'page_internal_url' => $pageSEO['page_internal_url'],
                'page_controller' => $pageSEO['page_controller'],
                'page_controller_url' => $pageSEO['page_controller_url'],
                'page_controller_directory' => $pageSEO['page_controller_directory'],
                'page_file_directory' => $pageSEO['page_file_directory'],
                'page_image' => $pageSEO['page_image'],
                'page_description' => $pageSEO['page_description'],
                'page_address' => $pageSEO['page_address'],
                'page_city' => $pageSEO['page_city'],
                'page_state' => $pageSEO['page_state'],
                'page_country' => $pageSEO['page_country'],
                'page_zipcode' => $pageSEO['page_zipcode'],
                'page_facebook' => $pageSEO['page_facebook'],
                'linked' => $pageSEO['linked'],
                'functionality' => $pageSEO['functionality'],
                'design' => $pageSEO['design'],
                'seo' => $pageSEO['seo'],
                'ext_links' => $pageSEO['ext_links'],
                'grammar' => $pageSEO['grammar'],
                'd_optimize' => $pageSEO['d_optimize'],
                'load_perf' => $pageSEO['load_perf'],
                'additional_notes' => $pageSEO['additional_notes'],
            ];
        }
        return $pageSEOData;
    }
    
    public function postToDiscord($message)
    {
        $discordWebhookUrl = getenv('DISCORD_WEBHOOK_URL');
    
        // ✅ Ensure the message is within the 2000 character limit
        if (strlen($message) > 2000) {
            $message = substr($message, 0, 1997) . "..."; // Truncate and add "..."
        }
    
        $payload = json_encode(["content" => $message]);
    
        $ch = curl_init($discordWebhookUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
    
        return $response;
    }
    
    public function postToFacebookPage($pageId, $message)
    {
        try {
            $response = $this->facebook->post("/{$pageId}/feed", [
                'message' => $message,
            ], $this->facebook->getAccessToken());

            return $response->getGraphNode();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            log_message('error', 'Graph returned an error: ' . $e->getMessage());
            return false;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            log_message('error', 'Facebook SDK returned an error: ' . $e->getMessage());
            return false;
        }
    }

    public function postToFacebookGroup($groupId, $message)
    {
        try {
            $response = $this->facebook->post("/{$groupId}/feed", [
                'message' => $message,
            ], $this->facebook->getAccessToken());

            return $response->getGraphNode();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            log_message('error', 'Graph returned an error: ' . $e->getMessage());
            return false;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            log_message('error', 'Facebook SDK returned an error: ' . $e->getMessage());
            return false;
        }
    }

    public function sendNotification($type, $viewPath, $data, $targetGroup = null, $socialMedia = [])
    {
        
        $userModel = new UserModel();
        if ($targetGroup) {
            $users = $userModel->where('group', $targetGroup)->findAll();
        } else {
            $users = $userModel->findAll();
        }

        $viewContent = view($viewPath, $data);

        $notoCount = 0;
        $emailNotoCount = 0;

        if (in_array('in-app', $type)) {
            foreach ($users as $user) {
                $this->sendInAppNotification($user, $viewContent);
                $notoCount++;
            }
        }

        if (in_array('email', $type)) {
            foreach ($users as $user) {
                $this->sendEmailNotification($user, $viewContent);
                $emailNotoCount++;
            }
        }

        foreach ($socialMedia as $platform) {
            switch ($platform) {
                case 'facebook':
                    $this->postToFacebook($data['message']);
                    break;
                case 'twitter':
                    $this->postToTwitter($data['message']);
                    break;
                case 'linkedin':
                    $this->postToLinkedIn($data['message']);
                    break;
                case 'discord':
                    $this->postToDiscord($data['message']);
                    break;
            }
        }

        $notificationData = [
            'active' => 1,
            'message' => $viewContent,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => session('user_id'),
            'noto_count' => $notoCount,
            'email_noto_count' => $emailNotoCount,
        ];
        $this->marketingModel->storeNotification($notificationData);
    }

    private function sendInAppNotification($user, $content)
    {
        $db = \Config\Database::connect();
        $db->table('user_notifications')->insert([
            'user_id' => $user->id,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    private function sendEmailNotification($user, $content)
    {
        $email = \Config\Services::email();
        $email->setTo($user->email);
        $email->setSubject('Notification');
        $email->setMessage($content);
        $email->send();
    }

    public function postToSocialMedia($content)
    {
        try {
            $this->postToFacebook($content);
            $this->postToTwitter($content);
            $this->postToLinkedIn($content);
            // Add more integrations if needed
        } catch (\Throwable $e) {
            $this->logger->error('❌ postToSocialMedia() failed: ' . $e->getMessage());
        }
    }
    

    private function postToFacebook($message)
    {
        try {
            $response = $this->facebook->post('/me/feed', ['message' => $message], $this->socialMedia->facebook_access_token);
            return $response->getGraphNode();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            $this->logger->error('Facebook Graph returned an error: ' . $e->getMessage());
            return false;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            $this->logger->error('Facebook SDK returned an error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Fetch tweets based on a specific hashtag or query.
     */
    public function fetchTweets($query, $count = 100) {
        
        try {
            $tweets = $this->twitter->get('search/tweets', [
                'q' => $query,
                'count' => $count
            ]);

            if ($this->twitter->getLastHttpCode() === 200) {
                $processedTweets = [];
                foreach ($tweets->statuses as $tweet) {
                    $processedTweets[] = [
                        'tweet_id' => $tweet->id_str,
                        'content' => $tweet->text,
                        'author' => $tweet->user->screen_name,
                        'created_at' => $tweet->created_at,
                        'url' => "https://twitter.com/{$tweet->user->screen_name}/status/{$tweet->id_str}"
                    ];
                }

                // Store in database
                foreach ($processedTweets as $tweetData) {
                    $this->marketingModel->storeScrapedContent([
                        'title' => $tweetData['content'],
                        'url' => $tweetData['url'],
                        'content' => $tweetData['content'],
                        'keywords' => json_encode([$tweetData['author']]),
                        'scraped_at' => date('Y-m-d H:i:s')
                    ]);
                }

                return $processedTweets;
            } else {
                throw new \Exception('Failed to fetch tweets: ' . $this->twitter->getLastBody());
            }
        } catch (\Throwable $th) {
            log_message('error', 'Error fetching tweets: ' . $th->getMessage());
            return [];
        }
    }

    /**
     * Generate content from tweets.
     */
    public function generateContentFromTweets($tweets) {
        $summary = $this->summarizeText(implode(' ', array_column($tweets, 'content')));
        if (empty(trim($summary)) || strlen($summary) < 30) {
            log_message('warning', '⚠️ Summary too short or missing for record ID ' . $record['id'] . ' | $summary array: ' . print_r($summary, true));
            return false; // skip this record
        }
        if (is_string($summary) && strlen($summary) > 10) {
            $keywords = $this->extractKeywords($summary);
        }
        
        if (empty($keywords)) {
            log_message('warning', '⚠️ Keywords not working for record ID ' . $record['id'] . ' | $keywords array: ' . print_r($keywords, true));
            return false; // skip this record
        }

        return [
            'summary' => $summary ?? '',
            'keywords' => $keywords ?? '',
            'platform_content' => $this->generatePlatformContent($summary, $keywords)
        ];
    }

    private function generateFallbackKeywords($text)
    {
        $words = preg_split('/\W+/', strtolower($text), -1, PREG_SPLIT_NO_EMPTY);
        $freq = array_count_values(array_filter($words, fn($w) => strlen($w) > 4));
        arsort($freq);
        return array_keys(array_slice($freq, 0, 10));
    }
    
    public function generateFallbackSummary(string $content): ?string
    {
        $sentences = $this->splitIntoSentences($content);
        if (empty($sentences)) {
            log_message('warning', '⚠️ No valid sentences found in fallback summary generation.');
            return null;
        }
    
        $summary = implode(' ', array_slice($sentences, 0, 3));
        return strip_tags(trim($summary));
    }
    
    public function generateFromTempScraper($limit = 5)
    {
        $records = $this->marketingModel->getLatestTempRecords($limit);
    
        if (empty($records)) {
            log_message('info', 'No temp scraper records found to process.');
            return;
        }
    
        foreach ($records as $record) {
            try {
                log_message('debug', '🧪 Processing record ID ' . $record['id']);
                $summary = $this->generateContentFromRaw($record); // ✅ Fixed: Pass the full record array
                if ($summary) {
                    // $this->marketingModel->insertFinalScraper($record, $summary);
                    $this->marketingModel->markTempScraperProcessed($record['id']);
                    log_message('info', '✅ Processed and stored content for record ID ' . $record['id']);
                } else {
                    log_message('warning', '⚠️ Summary was null/empty for record ID ' . $record['id']);
                }
            } catch (\Throwable $e) {
                log_message('error', '❌ Error generating content for record ID ' . $record['id'] . ': ' . $e->getMessage());
            }
        }
    }    
    
    /**
     * Post content to Twitter.
     */
    public function postToTwitter($content) {
        try {
            $response = $this->twitter->post('statuses/update', ['status' => $content]);
            if ($this->twitter->getLastHttpCode() === 200) {
                log_message('info', 'Successfully posted to Twitter: ' . $content);
                return $response;
            } else {
                throw new \Exception('Failed to post to Twitter: ' . json_encode($response));
            }
        } catch (\Throwable $th) {
            log_message('error', 'Error posting to Twitter: ' . $th->getMessage());
            return false;
        }
    }

    private function postToLinkedIn($message)
    {
        try {
            $response = $this->linkedin->post('/people/~/shares', [
                'comment' => $message,
                'visibility' => [
                    'code' => 'anyone'
                ]
            ], $this->socialMedia->linkedin_access_token);
            return $response;
        } catch (Exception $e) {
            $this->logger->error('LinkedIn API returned an error: ' . $e->getMessage());
            return false;
        }
    }

    private function postToBlog($content)
    {
        // Assuming you're using WordPress for blogging
        $client = new Client([
            'base_uri' => $this->siteSettings->wordpress_site_url,
        ]);

        try {
            $response = $client->post('/wp-json/wp/v2/posts', [
                'auth' => [$this->siteSettings->wordpress_username, $this->siteSettings->wordpress_password],
                'json' => [
                    'title' => substr($content, 0, 50),
                    'content' => $content,
                    'status' => 'publish',
                ],
            ]);

            if ($response->getStatusCode() == 201) {
                $this->logger->info('Posted to blog: ' . $content);
                return json_decode($response->getBody(), true);
            } else {
                $this->logger->error('Failed to post to blog: ' . $response->getBody());
                return false;
            }
        } catch (RequestException $e) {
            $this->logger->error('Blog post request error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Distribute a single piece of content to the specified platform.
     */
    public function distributeContent(string $platform, string $message)
    {
        switch ($platform) {
            case 'discord':
                return $this->postToDiscord($message);
            case 'linkedin':
                return $this->postToLinkedIn($message);
            case 'sora':
                return $this->generateSoraVideoFromScript($message);
            case 'email':
                $this->emailService->setTo('newsletter@mymiwallet.com');
                $this->emailService->setSubject('New Marketing Content');
                $this->emailService->setMessage(nl2br($message));
                return $this->emailService->send();
            default:
                return false;
        }
    }

    public function distributeContentToSocialMedia($content)
    {
        $twitterPost = "� **Stock Market Highlights** �\n";
        $facebookPost = "� **Market Movers Update** �\n";
        $linkedinPost = "� **Today's Market Summary** �\n";
        $discordPost = "� **TRADE ALERTS UPDATE!** �\n";

        foreach ($content['expandedContent'] as $post) {
            $twitterPost .= $post . "\n";
            $facebookPost .= $post . "\n";
            $linkedinPost .= $post . "\n";
            $discordPost .= $post . "\n";
        }

        // Post to Twitter (example using API)
        $this->postToTwitter($twitterPost);
        $this->postToFacebook($facebookPost);
        $this->postToLinkedIn($linkedinPost);
        $this->postToDiscord($discordPost);

        return [
            'twitter' => $twitterPost,
            'facebook' => $facebookPost,
            'linkedin' => $linkedinPost,
            'discord' => $discordPost
        ];
    }
    
    public function generateAdvisorMediaPackage($userId)
    {
        $advisor = $this->generateAdvisorNotes($userId);
        $summary = $advisor['summary'];
        $script = $this->generateVoiceoverScriptFromSummary($summary);

        $filename = "advisor_notes_user_{$userId}";
        $voiceoverUrl = $this->generateVoiceoverAudio($script, $filename);

        return [
            'user_id' => $userId,
            'summary' => $summary,
            'script' => $script,
            'voiceover_url' => $voiceoverUrl,
            'risk_rating' => $advisor['risk_rating'],
            'score' => $advisor['score'],
            'flag_opportunity' => $advisor['flag_opportunity']
        ];
    }

    public function generateAndPostContent()
    {
        
        $emailSummaries = $this->marketingModel->getEmailSummariesForReview();
        foreach ($emailSummaries as $summary) {
            log_message('info', 'Generating content for email summary: ' . $summary['email_subject']);

            $content = $this->generateMarketingContent($summary['summary']);
            log_message('debug', 'Generated content: ' . print_r($content, true));

            $this->postToSocialMedia($content);
            $this->postToBlog($content);

            $this->marketingModel->updateEmailStatus($summary['email_identifier'], 'Posted');
            log_message('info', 'Updated email status to Posted for: ' . $summary['email_subject']);
        }
    }

    // private function generateMarketingContent($summary)
    // {
    //     $prompt = "Create a marketing post based on the following summary:\n\n" . $summary;
    //     $response = $this->openAI->complete([
    //         'prompt' => $prompt,
    //         'max_tokens' => 150,
    //     ]);

    //     return $response->choices[0]->text;
    // }


    /**
     * Generate content for each platform and save for publishing
     */
    public function generateMarketingContent(): void
    {
        $topStories = $this->marketingModel->getTopStories(10); // Existing call to get pending items
    
        $count = 0;
    
        foreach ($topStories as $story) {
            // ✅ Skip if title is empty
            if (empty(trim($story['title'] ?? ''))) {
                log_message('debug', '⏭ Skipped record ID '.$story['id'].' - no title provided.');
                continue;
            }
    
            // ✅ Break once top 5 valid entries found
            if ($count >= 5) {
                break;
            }
    
            $headline = $story['title'];
            $url = $story['source_url'] ?? '#';
            $summary = $this->generateSummary($story);
            $hashtags = $this->extractHashtags($story['title'].' '.$story['email_body']);
    
            $platformPosts = [
                'discord'  => "**{$headline}**\n{$summary}\n🔗 {$url}\n{$hashtags}",
                'twitter'  => "{$headline} {$url} {$hashtags}",
                'linkedin' => "{$headline}\n{$summary}\nRead more: {$url} {$hashtags}",
                'facebook' => "{$headline}\n{$summary}\n{$url} {$hashtags}",
                'email'    => [
                    'subject' => $headline,
                    'body'    => "{$summary}\n\nRead More: {$url}\n{$hashtags}",
                ],
            ];
    
            $this->marketingModel->storeGeneratedContent($story['id'], $platformPosts);
            $count++;
        }
    }    

    public function logContentError($recordId, $reason)
    {
        $message = "🪓 Skipped record ID {$recordId}: {$reason}";
        log_message('debug', $message);
    
        // Insert into bf_error_logs
        helper(['text']);
        $this->db->table('bf_error_logs')->insert([
            'level'      => 'ERROR',
            'message'    => $message,
            'context'    => 'MyMIMarketing::generateContentFromRaw',
            'file'       => 'MyMIMarketing.php',
            'line'       => __LINE__,
            'ip_address' => service('request')->getIPAddress(),
            'user_agent' => service('request')->getUserAgent()->getAgentString(),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    
        // Also insert a stub into bf_marketing_scraper
        $this->db->table('bf_marketing_scraper')->insert([
            'source_id'   => $recordId,
            'title'       => 'Error Summary',
            'summary'     => $reason,
            'category'    => 'Error',
            'status'      => 'skipped',
            'created_on'  => date('Y-m-d H:i:s'),
        ]);
    }
    
    private function logScrapeError($url, $error)
    {
        log_message('error', "Scraping failed for URL: $url, Error: $error");
    }

    public function generateContentFromData($title, $content, $tags)
    {
        // Process the content, summarize, or apply any NLP techniques.
        $summary = $this->summarizeContent($content); // Example NLP method

        // Generate the final content
        return $title . " - " . $summary . " Tags: " . implode(', ', $tags);
    }

    public function generateContentFromScrapedData($scrapedData, $platform = null)
    {
        if (empty($scrapedData) || !is_array($scrapedData)) {
            log_message('error', '❌ generateContentFromScrapedData() called with empty or invalid $scrapedData');
            return [];
        }
    
        $cleanedSummaries = [];
    
        foreach ($scrapedData as $record) {
            $rawContent = $record['content'] ?? '';
            $cleaned = $this->sanitizeRawEmailContent($rawContent);
    
            if (strlen($cleaned) < 300 || substr_count($cleaned, ' ') < 20) {
                log_message('warning', '[MyMIMarketing] Skipped record due to short or unstructured content (Title: ' . ($record['title'] ?? 'Untitled') . ')');
                continue;
            }
    
            try {
                $summaryData = $this->summarizeContent($cleaned);
    
                if (!is_array($summaryData) || empty($summaryData['summary'])) {
                    log_message('warning', '⚠️ generateContentFromScrapedData(): Summary was null/empty for record title: ' . ($record['title'] ?? 'Untitled'));
                    continue;
                }
                
                if (is_array($summary)) {
                    log_message('warning', 'generateContentFromScraper(): $summary is array — flattening.');
                    $summary = implode(' ', array_map('strip_tags', $summary));
                }
                $headline = $this->generateHeadline($summaryData['summary']);
                $platformPosts = $this->generatePlatformContent($summaryData['summary'], $summaryData['tokens'] ?? []);
    
                $payload = [
                    'title' => $record['title'] ?? $headline,
                    'source' => $record['url'] ?? 'unknown',
                    'summary' => $summaryData['summary'],
                    'keywords' => $summaryData['tokens'] ?? [],
                    'headline' => $headline,
                    'platform_content' => $platformPosts,
                    'platform' => $platform,
                    'created_on' => date("Y-m-d H:i:s"),
                ];
    
                $this->marketingModel->storeGeneratedContent($record['id'] ?? null, $platformPosts);
                $cleanedSummaries[] = $payload;
            } catch (\Throwable $e) {
                log_message('error', '❌ Exception in generateContentFromScrapedData(): ' . $e->getMessage());
            }
        }
    
        return $cleanedSummaries;
    }
    
    public function generateContentFromSummary(array $summary)
    {
        if (empty($summary['summary']) || strlen($summary['summary']) < 20) {
            $this->logger->warning("⛔ Skipping malformed summary ID {$summary['id']}");
            return null;
        }
    
        $hashtags = $this->extractHashtags($summary['summary']);
        $callToAction = "💼 Ready to invest smarter? Start with MyMI Wallet. #MyMIMovement";
        $postText = "{$summary['summary']}\n\n🔑 Keywords: {$summary['keywords']}\n📣 {$callToAction}\n{$hashtags}";
    
        $this->marketingModel->storeGeneratedPost([
            'summary_id' => $summary['id'],
            'post_text' => $postText,
            'platform' => 'multi',
            'score' => rand(75, 100), // For now, simulate score
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    
        return $postText;
    }
    
    public function generateContentFromLargeText($content, $tags)
    {
        if (empty($content)) {
            log_message('error', 'Content is empty in generateContentFromLargeText.');
            return [
                'summary' => '',
                'keywords' => [],
                'platforms_content' => [],
            ];
        }
    
        $tokenizer = new WhitespaceTokenizer();
        $samples = [$tokenizer->tokenize($content)];
    
        log_message('debug', 'Tokenized samples: ' . print_r($samples, true));
    
        if (
            empty($samples) ||
            !isset($samples[0]) ||
            !is_array($samples[0]) ||
            empty($samples[0])
        ) {
            log_message('error', '🚫 Empty or malformed document array before TF-IDF.');
            return [
                'summary' => '',
                'keywords' => [],
                'platforms_content' => [],
            ];
        }
    
        try {
            $tfidf = new TfIdfTransformer();
            $tfidf->fit($samples);
            $tfidf->transform($samples);
            log_message('debug', 'TfIdf transformation successful.');
        } catch (\Exception $e) {
            log_message('error', 'TfIdfTransformer failed: ' . $e->getMessage());
            return [
                'summary' => '',
                'keywords' => [],
                'platforms_content' => [],
            ];
        }
    
        $summary = $this->summarizeText($content);
        if (is_string($content) && strlen($content) > 10) {
            $keywords = $this->extractKeywords($content);
        }
        $platforms_content = $this->generatePlatformContent($summary, $keywords);
    
        return [
            'summary' => $summary,
            'keywords' => $keywords,
            'platforms_content' => $platforms_content,
        ];
    }
    
    public function generateCampaignContent(array $campaign): array
    {
        helper(['text', 'security']);
    
        $rawContent = '';
        $generated = [];
    
        $fieldsToConcat = ['name', 'description', 'audience_tags', 'priority', 'trigger_event'];
        foreach ($fieldsToConcat as $field) {
            if (!empty($campaign[$field])) {
                $rawContent .= strip_tags($campaign[$field]) . ' ';
            }
        }
    
        $rawContent = trim($rawContent);
        log_message('debug', '🧪 [generateCampaignContent] Raw input: ' . $rawContent);
    
        // if (strlen($rawContent) < 50) {
        //     log_message('error', '🛑 generateCampaignContent: Insufficient content to summarize.');
        //     return [];
        // }
    
        // 🧠 Enhance using prior generated content
        $model = new \App\Models\MarketingModel();
        $campaignId = $campaign['id'] ?? null;
        $previousContent = $model->getLatestGeneratedByCampaignId($campaignId);
    
        $baseText = $rawContent;
        if (!empty($previousContent)) {
            $baseText .= ' ' . strip_tags(implode(' ', [
                $previousContent['voice_script'] ?? '',
                $previousContent['facebook_message'] ?? '',
                $previousContent['linkedin_message'] ?? '',
                $previousContent['hashtags'] ?? '',
                $previousContent['discord_message'] ?? '',
                $previousContent['youtube_message'] ?? '',
                $previousContent['stocktwits_message'] ?? '',
                $previousContent['email_message'] ?? '',
            ]));
        }
    
        // 🔍 Enrich with external Google search & scraping
        $keywords = $this->extractKeywords($baseText);
        $searchTerms = implode(' ', $keywords);
        $topLinks = $this->getTopLinks($searchTerms);  // Fetch using helper
        
        foreach ($topLinks as $link) {
            $cached = $this->marketingModel->getCachedLink($link);
            if ($cached && strtotime($cached['last_enriched_at']) > strtotime('-1 day')) {
                $baseText .= ' ' . strip_tags($cached['content']);
                continue;
            }
        
            $scraped = $this->scrapeUrlContent($link);
            if ($scraped) {
                $baseText .= ' ' . strip_tags($scraped);
                $this->marketingModel->cacheScrapedLink($link, $scraped);
            }
        }
        
    
        // ✂️ Summarize & extract
        $summary  = $this->summarizeText($baseText);
        $hashtags = $this->extractHashtags($baseText);
    
        $generated = [
            'voice_script' => "Introducing MyMI Wallet: $summary Join now and take control of your financial future.",
            'facebook_message' => "$summary\n\n🚀 Get started today with MyMI Wallet.\n👉 " . site_url("register") . "\n\n$hashtags",
            'linkedin_message' => "$summary\n\nExplore MyMI’s smart finance tools for budgeting, investing, and crypto.\nJoin the revolution: " . site_url("LinkedIn/register"),
            'discord_message' => "💬 Join the conversation in the MyMI Discord!\n$summary\n" . site_url("Discord/join"),
            'email_message' => "Subject: Your Journey to Financial Independence Starts Here\n\n$summary\n\nReady to take action? Click below:\n" . site_url("Email/register"),
            'stocktwits_message' => "💹 $summary #MyMIWallet #Fintech",
            'tiktok_message' => "🎥 Start fresh in 2025! MyMI Wallet helps you master money and investing.\n$hashtags\n👉 " . site_url("TikTok/register"),
            'youtube_message' => "📺 New on YouTube: How MyMI Wallet Changes the Game!\n$summary\n🔔 Subscribe now!",
            'hashtags' => $hashtags
        ];
    
        $model->insertGeneratedContent([
            'campaign_id'        => $campaignId,
            'title'              => $campaign['name'] ?? null,
            'description'        => $campaign['description'] ?? null,
            'platform'           => 'multi',
            'post_text'          => $generated['facebook_message'],
            'voice_script'       => $generated['voice_script'],
            'facebook_message'   => $generated['facebook_message'],
            'linkedin_message'   => $generated['linkedin_message'],
            'discord_message'    => $generated['discord_message'],
            'email_message'      => $generated['email_message'],
            'stocktwits_message' => $generated['stocktwits_message'],
            'tiktok_message'     => $generated['tiktok_message'],
            'youtube_message'    => $generated['youtube_message'],
            'hashtags'           => $generated['hashtags'],
            'status'             => 'pending',
            'created_at'         => date('Y-m-d H:i:s'),
            'updated_at'         => date('Y-m-d H:i:s')
        ]);
    
        return $generated;
    }
    
    public function generateCampaignStepContent(array $step): array
    {
        helper(['text', 'security']);
    
        $rawContent = '';
        $generated = [];
    
        // Fields from the step to include in base input
        $fieldsToConcat = ['name', 'title', 'description', 'view_file'];
        foreach ($fieldsToConcat as $field) {
            if (!empty($step[$field])) {
                $rawContent .= strip_tags($step[$field]) . ' ';
            }
        }
    
        $rawContent = trim($rawContent);
        log_message('debug', '🧪 [generateCampaignStepContent] Raw input: ' . $rawContent);
    
        if (strlen($rawContent) < 16) {
            log_message('error', '🛑 generateCampaignStepContent: Insufficient content to summarize.');
            return [];
        }
    
        // 🧠 Enhance with previous generated content (if any)
        $model = new \App\Models\MarketingModel();
        $stepId = $step['id'] ?? null;
        $campaignId = $step['campaign_id'] ?? null;
        $previousContent = $model->getLastGeneratedStepContentByStepId($stepId);
    
        $baseText = $rawContent;
        if (!empty($previousContent)) {
            $baseText .= ' ' . strip_tags(implode(' ', [
                $previousContent['campaign_name'] ?? '',
                $previousContent['voice_script'] ?? '',
                $previousContent['facebook_message'] ?? '',
                $previousContent['linkedin_message'] ?? '',
                $previousContent['hashtags'] ?? '',
                $previousContent['discord_message'] ?? '',
                $previousContent['youtube_message'] ?? '',
                $previousContent['stocktwits_message'] ?? '',
                $previousContent['email_message'] ?? '',
            ]));
        }
    
        // 🔍 Pull enrichment from keyword search
        $keywords = $this->extractKeywords($baseText);
        $searchTerms = implode(' ', $keywords);
        $topLinks = $this->getTopLinks($searchTerms);
    
        foreach ($topLinks as $link) {
            $cached = $this->marketingModel->getCachedLink($link);
            if ($cached && strtotime($cached['last_enriched_at']) > strtotime('-1 day')) {
                $baseText .= ' ' . strip_tags($cached['content']);
                continue;
            }
    
            $scraped = $this->scrapeUrlContent($link);
            if ($scraped) {
                $baseText .= ' ' . strip_tags($scraped);
                $this->marketingModel->cacheScrapedLink($link, $scraped);
            }
        }
    
        // ✂️ Summarize and generate post content
        $summary  = $this->summarizeText($baseText);
        $hashtags = $this->extractHashtags($baseText);
    
        $generated = [
            'voice_script' => "🎯 Drip Step: {$step['name']} — {$summary}",
            'facebook_message' => "{$summary}\n\n📩 This message is part of your drip campaign journey.",
            'linkedin_message' => "{$summary}\n\nBoost engagement and automate your outreach with MyMI Wallet steps.",
            'discord_message' => "🔔 New drip step alert: {$step['name']} → {$summary}",
            'email_message' => "Subject: Next Step in Your Series\n\n{$summary}\n\nStay tuned for more.",
            'stocktwits_message' => "📊 {$summary} #MyMIWallet #DripStep",
            'tiktok_message' => "🎥 Step: {$step['name']} — Quick update\n{$hashtags}",
            'youtube_message' => "🎬 Next Step Preview: {$summary}",
            'hashtags' => $hashtags
        ];
    
        // 💾 Store it
        $model->insertGeneratedStepContent([
            'step_id'            => $stepId,
            'campaign_id'        => $campaignId,
            'title'              => $step['name'] ?? null,
            'description'        => $step['description'] ?? null,
            'platform'           => 'multi',
            'post_text'          => $generated['facebook_message'],
            'voice_script'       => $generated['voice_script'],
            'facebook_message'   => $generated['facebook_message'],
            'linkedin_message'   => $generated['linkedin_message'],
            'discord_message'    => $generated['discord_message'],
            'email_message'      => $generated['email_message'],
            'stocktwits_message' => $generated['stocktwits_message'],
            'tiktok_message'     => $generated['tiktok_message'],
            'youtube_message'    => $generated['youtube_message'],
            'hashtags'           => $generated['hashtags'],
            'status'             => 'pending',
            'created_at'         => date('Y-m-d H:i:s'),
            'updated_at'         => date('Y-m-d H:i:s')
        ]);
    
        return $generated;
    }
    
    public function generateCanvaVideo()
    {
        $scriptResponse = $this->generateVoiceoverScript();
        if (!$scriptResponse['status'] === 'success') {
            return $this->respond(['status' => 'error', 'message' => 'Voiceover script not found'], 404);
        }
    
        $scriptText = $scriptResponse['script'];
    
        $canvaApiUrl = "https://api.canva.com/v1/projects";
        $headers = [
            'Authorization: Bearer YOUR_CANVA_API_KEY',
            'Content-Type: application/json'
        ];
    
        $payload = [
            'title' => 'MyMI Trade Alerts Video',
            'template' => 'YOUR_CANVA_TEMPLATE_ID',
            'elements' => [
                'text' => $scriptText,
                'voiceover' => base_url('uploads/voiceover.mp3')
            ]
        ];
    
        $ch = curl_init($canvaApiUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
    
        return $this->respond(['status' => 'success', 'message' => 'Video generated', 'video_url' => json_decode($response)->video_url]);
    }

    public function generateEnhancedContent($voiceScript)
    {
        if (is_array($voiceScript)) {
            $voiceScript = implode(' ', $voiceScript);
        }
        if (!is_string($voiceScript) || strlen(trim($voiceScript)) < 100) {
            log_message('warning', 'generateEnhancedContent(): Skipping due to short or invalid input.');
            return [
                'summary' => $voiceScript,
                'checkedContent' => $voiceScript,
                'expandedContent' => [$voiceScript],
            ];
        }

        // Step 1: Summarize the voice script into a structured format
        $summary = $this->summarizeContent($voiceScript);

        // Step 2: Perform spelling & grammar check using an external API (Grammarly alternative)
        $checkedContent = $this->spellCheckAndRefine($summary);

        // Step 3: Generate additional content using MyMIMarketing::contentGenerator
        $expandedContent = $this->generateEnhancedContent($checkedContent);

        return [
            'summary' => $summary,
            'checkedContent' => $checkedContent,
            'expandedContent' => $expandedContent
        ];
    }
    
    public function generatePostsFromSummaryAuto(string $summary, array $keywords)
    {
        $hashtags = $this->extractHashtags($summary);
        $model = new \App\Models\MarketingModel();
    
        $postData = [
            'title' => substr($summary, 0, 70) . '...',
            'summary' => $summary,
            'keywords' => implode(',', $keywords),
            'platform_content' => json_encode([
                'facebook' => $summary . "\n\n" . site_url('register') . "\n" . $hashtags,
                'discord' => $summary,
                'youtube' => "🎥 $summary",
            ]),
            'status' => 'pending',
        ];
    
        $model->insertGeneratedPost($postData);
    }
    
    private function generatePrimaryContent($scrapedData)
    {
        // Generate the primary content based on the scraped data
        $content = "";
        foreach ($scrapedData as $data) {
            $content .= "Source: {$data['source']}\n";
            $content .= "Title: {$data['title']}\n";
            $content .= "Content: " . substr($data['content'], 0, 200) . "...\n";
            $content .= "Link: " . ($data['url'] ?? 'N/A') . "\n\n";
        }
        return $content;
    }
    
    // ✅ Redirect legacy method to unified generator
    public function generatePlatformContent($summary, $keywords, $platforms = [])
    {
        $this->generateUnifiedSocialPosts(is_array($summary) ? implode(' ', $summary) : $summary, $keywords, $platforms); // Fails if $summary is array
        // return $this->generateUnifiedSocialPosts($summary, $keywords, $platforms);
    }  

    // ✅ Redirect legacy method to unified generator
    public function generateSocialPost(array $summary): array
    {
        $text = $summary['summary'] ?? '';
        $keywords = is_array($summary['keywords']) ? $summary['keywords'] : explode(',', $summary['keywords'] ?? '');

        // return $this->generateUnifiedSocialPosts($text, $keywords);
        $this->generateUnifiedSocialPosts(is_array($text) ? implode(' ', $text) : $text, $keywords, $platforms); // Fails if $summary is array
    }

    private function generateSocialMediaContent($scrapedData)
    {
        // Generate social media content for each platform based on the scraped data
        $facebookContent = "Facebook: ";
        $twitterContent = "Twitter: ";
        $linkedinContent = "LinkedIn: ";

        foreach ($scrapedData as $data) {
            $facebookContent .= $data['title'] . " " . ($data['url'] ?? '') . "\n";
            $twitterContent .= $data['title'] . " " . ($data['url'] ?? '') . "\n";
            $linkedinContent .= $data['title'] . " " . ($data['url'] ?? '') . "\n";
        }

        return [
            'Facebook' => $facebookContent,
            'Twitter' => $twitterContent,
            'LinkedIn' => $linkedinContent,
        ];
    }

    /**
     * Placeholder for Sora video generation. Given a script, call the Sora API
     * and return the generated video URL when available.
     */
    private function generateSoraVideoFromScript(string $script)
    {
        // In a real implementation this would call the Sora API.
        $this->logger->debug('Sora video generation stub invoked.');
        return false;
    }

    /**
     * Basic summary (could be replaced with AI summary)
     */
    protected function generateSummary(array $story): string
    {
        return substr(strip_tags($story['email_body'] ?? ''), 0, 250) . '...';
    }
    
    public function generateSummaryFromAlert(array $alert): string
    {
        log_message('info', 'MyMIMarketing L4323 - $alert Array: ' . (print_r($alert, true)));
        // Core data
        $symbol     = strtoupper($alert['ticker'] ?? 'N/A');
        $company    = $alert['company'] ?? '';
        $exchange   = strtoupper($alert['exchange'] ?? 'Unknown Exchange');
        $strategy   = trim($alert['strategy'] ?? '');
        $note       = trim($alert['trade_analysis'] ?? '');
        $news       = trim($alert['financial_news'] ?? '');
        $chart      = $alert['chart_link'] ?? '';
        $summaryTxt = trim($alert['gptTradeTemplate'] ?? '');
        $price      = $alert['price'] ?? '';
        $entry      = $alert['entry_price'] ?? '';
        $target     = $alert['target_price'] ?? '';
        $stop       = $alert['stop_loss'] ?? '';
        $sentiment  = $alert['market_sentiment'] ?? 'Neutral';
        $category   = $alert['category'] ?? '';
        $type       = $alert['trade_type'] ?? 'Unknown Trade Type';
    
        // Compile raw context
        // $rawText = "{$strategy}\n{$note}\n{$news}\n{$summaryTxt}";
        $rawText = "{$note}\n{$news}\n{$summaryTxt}";
        if (empty(trim($rawText))) {
            $rawText = implode("\n", array_filter([
                $alert['strategy'] ?? '',
                $alert['note'] ?? '',
                $alert['gptTradeTemplate'] ?? '',
            ]));
        }
        
        $sentences = $this->splitIntoSentences($rawText);
        log_message('debug', '🧪 splitIntoSentences(): Extracted ' . count($sentences) . ' valid sentences.');
    
        // Keyword extraction with fallback
        $keywords = [];
        if (count($sentences) >= 1) {
            $keywords = $this->extractKeywords($sentences);
            log_message('debug', '📊 extractKeywords(): Found keywords - ' . print_r($keywords, true));
        } else {
            log_message('warning', '⚠️ Not enough valid input to generate summary.');
            $keywords = array_filter(array_unique(array_map('strtolower', array_merge(
                [$symbol, $type, $category, $sentiment],
                explode(' ', strtolower($company))
            ))));
            log_message('debug', '📈 Fallback Keywords Generated: ' . print_r($keywords, true));
        }
    
        // Primary summary text
        $baseSummary = count($sentences) > 1
            ? implode(' ', array_slice($sentences, 0, 2)) . '…'
            : "This alert highlights potential based on the following context:\n"
            . "• Exchange: {$exchange}\n"
            . ($price !== '' ? "• Current Price: \${$price}\n" : '')
            . (!empty($keywords) ? '• Key Focus Areas: ' . implode(', ', array_slice($keywords, 0, 5)) . "\n" : '')
            . ($strategy ? "• Strategy: {$strategy}\n" : "• Strategy: General Opportunity\n");
    
        // Final formatted summary
        $summary = <<<EOT
        📌 **{$symbol} Trade Setup**
        This alert for **{$symbol}** {$company} on the **{$exchange}** exchange highlights a potential {$sentiment} opportunity.
        
        📊 **Trade Levels**
        - Entry: \${$entry}
        - Target: \${$target}
        - Stop Loss: \${$stop}
        
        🚀 **Strategy Insight**
        {$baseSummary}
        
        📺 **Chart Reference**
        {$chart}
        
        🧠 **Hashtags**
        #{$symbol} #{$exchange} #{$type} #{$sentiment} #{$category}
        EOT;
    
        return trim($summary);
    }
    
    public function generateTikTokScript($summary, $keywords, $mediaAssets = [])
    {
        $hook = "Did you know?";
        $cta = "Follow us for more updates!";
    
        // Optionally include media references (if provided)
        $mediaInclusion = !empty($mediaAssets) ? "Include these images/videos: " . implode(", ", $mediaAssets) : "";
    
        // TikTok video script generation
        return "TikTok Video Script:\n1. Hook: \"{$hook}\"\n2. Summary: {$summary}\n3. Media: {$mediaInclusion}\n4. CTA: {$cta}";
    }
    
    public function generateYouTubeScript($summary, $keywords, $mediaAssets = [])
    {
        $hook = "Breaking news in the world of finance...";
        $cta = "Like, subscribe, and share for more updates!";
    
        // Optionally include media references (if provided)
        $mediaInclusion = !empty($mediaAssets) ? "Include these images/videos: " . implode(", ", $mediaAssets) : "";
    
        // YouTube video script generation
        return "YouTube Video Script:\n1. Hook: \"{$hook}\"\n2. Detailed Summary: {$summary}\n3. Media: {$mediaInclusion}\n4. CTA: {$cta}";
    }

    public function generateVoiceoverAudio($text, $filename) {
        putenv('GOOGLE_CLOUD_DISABLE_GRPC=true');
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . '/home/mymiteam/mymiwallet/credentials/mymi-gcloud-key.json');

        $client = new \Google\Cloud\TextToSpeech\V1\Client\TextToSpeechClient(['transport' => 'rest']);

        $input = new SynthesisInput();
        $input->setText($text);

        $voice = new VoiceSelectionParams();
        $voice->setLanguageCode('en-US');
        $voice->setSsmlGender(SsmlVoiceGender::MALE);

        $audioConfig = new AudioConfig();
        $audioConfig->setAudioEncoding(AudioEncoding::MP3);

        // ✅ Construct the proper request object
        $request = new SynthesizeSpeechRequest();
        $request->setInput($input);
        $request->setVoice($voice);
        $request->setAudioConfig($audioConfig);

        $response = $client->synthesizeSpeech($request);
        $audioContent = $response->getAudioContent();

        $timestamp = date('Ymd_His');
        $sanitized = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $filename); // Safe filename
        $filename = "{$sanitized}_{$timestamp}.mp3";

        $filePath = WRITEPATH . "uploads/voiceovers/{$filename}";
        file_put_contents($filePath, $audioContent);

        // return base_url("writable/uploads/{$filename}");
        return site_url('API/Marketing/downloadVoiceover/' . basename($filePath));
    }

    public function generateStockInformation($cuID)
    {
        $MyMIInvestments = new MyMIInvestments();
        // Fetch investment dashboard data
        $investmentData = $MyMIInvestments->getInvestmentDashboard($cuID);

        // Dynamically determine asset types (stocks, ETFs, crypto)
        $symbols = $this->getSymbolsByAssetType($investmentData['getSymbols']);

        $forecastData = [];
        $riskData = [];

        // Process each asset type
        foreach ($symbols as $type => $symbolList) {
            switch ($type) {
                case 'stocks':
                    $forecastData['stocks'] = $MyMIInvestments->performARIMAForecast($symbolList);
                    $riskData['stocks'] = $MyMIInvestments->generateRiskManagementTools($cuID, 'stocks');
                    break;
                case 'etfs':
                    $forecastData['etfs'] = $MyMIInvestments->performARIMAForecast($symbolList);
                    $riskData['etfs'] = $MyMIInvestments->generateRiskManagementTools($cuID, 'etfs');
                    break;
                case 'crypto':
                    $forecastData['crypto'] = $MyMIInvestments->performARIMAForecast($symbolList);
                    $riskData['crypto'] = $MyMIInvestments->generateRiskManagementTools($cuID, 'crypto');
                    break;
            }
        }

        // Generate content based on the data
        $content = $this->generateContent($forecastData, $riskData);

        return $content;
    }

    private function getSymbolsByAssetType($symbols)
    {
        // Assuming we can identify the asset type by the symbol
        // This is just a placeholder logic and should be replaced with actual identification logic
        $result = [
            'stocks' => [],
            'etfs' => [],
            'crypto' => []
        ];

        foreach ($symbols as $symbol) {
            if (preg_match('/^[A-Z]{1,5}$/', $symbol)) {
                $result['stocks'][] = $symbol;
            } elseif (preg_match('/^[A-Z]{1,5}$/', $symbol)) {
                $result['etfs'][] = $symbol;
            } else {
                $result['crypto'][] = $symbol;
            }
        }

        return $result;
    }

    private function generateContent($forecastData, $riskData)
    {
        $content = "";

        // Stocks Content
        if (!empty($forecastData['stocks'])) {
            $content .= "### Stock Investment Forecast\n";
            foreach ($forecastData['stocks'] as $symbol => $forecast) {
                $content .= "- **{$symbol}**: " . json_encode($forecast) . "\n";
            }
        }

        // ETFs Content
        if (!empty($forecastData['etfs'])) {
            $content .= "### ETF Investment Forecast\n";
            foreach ($forecastData['etfs'] as $symbol => $forecast) {
                $content .= "- **{$symbol}**: " . json_encode($forecast) . "\n";
            }
        }

        // Crypto Content
        if (!empty($forecastData['crypto'])) {
            $content .= "### Crypto Investment Forecast\n";
            foreach ($forecastData['crypto'] as $symbol => $forecast) {
                $content .= "- **{$symbol}**: " . json_encode($forecast) . "\n";
            }
        }

        // Risk Management Insights
        $content .= "\n### Risk Management Insights\n";
        foreach ($riskData as $type => $riskMetrics) {
            $content .= "#### " . ucfirst($type) . " Risks\n";
            foreach ($riskMetrics as $riskMetric => $details) {
                $content .= "- **{$riskMetric}**: " . json_encode($details) . "\n";
            }
        }

        return $content;
    }

    public function getRecentPosts($limit = 5)
    {
        // $marketingModel = new \App\Models\MarketingModel();
        return $this->marketingModel->getRecentPosts($limit);
    }
    
    /**
     * Pull news from MarketAux API (hourly)
     */
    public function pullFinancialNews(): void
    {
        
        $response = $this->client->get('https://www.marketaux.com/api/v1/news/all', [
            'query' => [
                'api_token' => getenv('MARKETAUX_API_KEY'),
                'language'  => 'en',
                'country'   => 'us',
                'published_after' => date('Y-m-d\TH:i:s\Z', strtotime('-1 hour')),
                'limit'     => 50,
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        if (isset($data['data'])) {
            foreach ($data['data'] as $story) {
                $this->marketingModel->saveNews($story);
            }
        }
    }

    public function rankBufferCandidates()
    {
        $buffer = $this->marketingModel->fetchBufferPostsForScoring();
        foreach ($buffer as $post) {
            if (is_string($post['summary']) && strlen($post['summary']) > 10) {
                $keywords = $this->extractKeywords($post['summary']);
            }
            
            $scoreData = $this->getTopKeywordScores($post['summary']);
            log_message('debug', "🔎 TF-IDF Scores for Post ID {$post['id']}: ".print_r($scoreData, true));
            
            $score = $scoreData['score'] ?? 0;
            $tagScore = min($score / 10, 10);
            
    
            $this->marketingModel->updateBufferItem($post['id'], [
                'tag_score' => $tagScore
            ]);
        }
    }
    
    /**
     * Score and tag scraped news dynamically based on content
     */
    public function rankNewsArticles(): void
    {
        $unrankedNews = $this->marketingModel->getUnrankedNews();

        foreach ($unrankedNews as $news) {
            $content = strtolower(($news['title'] ?? '') . ' ' . ($news['email_subject'] ?? '') . ' ' . ($news['email_body'] ?? ''));
            $words = str_word_count(strip_tags($content), 1);
            $wordFreq = array_count_values($words);

            $filtered = array_filter($wordFreq, fn($freq, $word) => strlen($word) > 3 && $freq > 1, ARRAY_FILTER_USE_BOTH);
            arsort($filtered);

            $score = array_sum(array_values($filtered));
            $topKeywords = array_slice(array_keys($filtered), 0, 5);

            $this->marketingModel->updateRankedNews($news['id'], $score, implode(',', $topKeywords));
        }
    }

    private function shouldSkipScrape(string $url): bool
    {
        $db = \Config\Database::connect();
        $builder = $db->table('bf_content_enrichment_cache');
        $builder->where('url', $url);
        $row = $builder->get()->getRowArray();
    
        if (!$row) return false;
    
        $lastUpdated = strtotime($row['last_enriched_at']);
        return (time() - $lastUpdated) < 86400; // 1-day cooldown
    }

    public function summarizeMultipleArticles(array $articles): string
    {
        $allContent = '';
    
        foreach ($articles as $article) {
            $content = $article['content'] ?? '';
            $allContent .= strip_tags($content) . ' ';
        }
    
        if (empty(trim($allContent))) {
            log_message('error', 'summarizeMultipleArticles() received empty content.');
            return 'No content available to summarize.';
        }
    
        $summaryData = $this->summarizeContent($allContent);
        return is_array($summaryData) && isset($summaryData['summary']) ? $summaryData['summary'] : substr($allContent, 0, 300) . '...';
    }

    /*
     * ---------------------------------------------------------------------
     * Platform Library Helpers
     * ---------------------------------------------------------------------
     */

    /**
     * Build a posting plan from stored rules and taxonomy data.
     */
    public function getPostingPlan(string $platformKey, string $contentType, array $tickers = [], array $keywords = []): array
    {
        $platform   = $this->marketingModel->getPlatformByKey($platformKey);
        $platformId = $platform['id'] ?? null;

        // Merge rules (global + platform specific)
        $rules = [];
        foreach (array_merge(
            $this->marketingModel->getPlatformRules(null),
            $this->marketingModel->getPlatformRules($platformId)
        ) as $rule) {
            $rules[$rule['rule_key']] = $rule['rule_value'];
        }

        // Gather taxonomy tags
        $tagFilters = static fn(string $type) => [
            'platform_id'  => $platformId,
            'content_type' => $contentType,
            'tag_type'     => $type,
        ];

        $hashtags = array_merge(
            $this->marketingModel->searchTaxonomy($tagFilters('hashtag')),
            $this->marketingModel->searchTaxonomy(array_merge($tagFilters('hashtag'), ['platform_id' => null]))
        );

        $keywordsLib = array_merge(
            $this->marketingModel->searchTaxonomy($tagFilters('keyword')),
            $this->marketingModel->searchTaxonomy(array_merge($tagFilters('keyword'), ['platform_id' => null]))
        );

        // Rank tags: defaults first then by weight
        $rankTags = static function (array $tags, int $limit) {
            usort($tags, static function ($a, $b) {
                return [$b['is_default'] ?? 0, $b['weight'] ?? 0] <=> [$a['is_default'] ?? 0, $a['weight'] ?? 0];
            });
            $unique = [];
            foreach ($tags as $tag) {
                $text = $tag['tag'];
                if (!in_array($text, $unique, true)) {
                    $unique[] = $text;
                }
                if (count($unique) >= $limit) {
                    break;
                }
            }
            return $unique;
        };

        $maxTags   = (int) ($rules['max_hashtags'] ?? 3);
        $hashtags  = $rankTags($hashtags, $maxTags);
        $keywordsR = $rankTags($keywordsLib, $maxTags);

        // Suggestions / tips
        $tips = array_column(array_merge(
            $this->marketingModel->listSuggestions($platformId, $contentType),
            $this->marketingModel->listSuggestions(null, $contentType)
        ), 'text');

        // Format tickers according to rule
        $formattedTickers = [];
        $style = $rules['ticker_style'] ?? '$';
        foreach ($tickers as $t) {
            $t = strtoupper($t);
            switch ($style) {
                case '#':
                    $formattedTickers[] = '#' . $t;
                    break;
                case 'plain':
                    $formattedTickers[] = $t;
                    break;
                default:
                    $formattedTickers[] = '$' . $t;
                    break;
            }
        }

        return [
            'rules'    => $rules,
            'hashtags' => $hashtags,
            'keywords' => $keywordsR,
            'tips'     => $tips,
            'tickers'  => $formattedTickers,
        ];
    }

    /**
     * Compose a final post using stored library data.
     */
    public function composePost(string $platformKey, string $contentType, string $baseCopy, array $tickers = [], array $topicKeywords = []): array
    {
        $plan = $this->getPostingPlan($platformKey, $contentType, $tickers, $topicKeywords);

        $text = trim($baseCopy);

        // Strip links when rule set to no_links
        if (!empty($plan['rules']['no_links']) && $plan['rules']['no_links']) {
            $text = preg_replace('/https?:\/\/\S+/', '', $text);
        }

        // Append tickers
        if (!empty($plan['tickers'])) {
            $text .= ' ' . implode(' ', $plan['tickers']);
        }

        // Append hashtags and keywords respecting limits
        $allTags = array_merge($plan['hashtags'], $plan['keywords']);
        if (!empty($allTags)) {
            $text .= ' ' . implode(' ', $allTags);
        }

        $text = trim(preg_replace('/\s+/', ' ', $text));

        return ['text' => $text, 'meta' => $plan];
    }
    
}
?>
