<?php
namespace App\Models;

use CodeIgniter\Model;
use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\Tokenization\WhitespaceTokenizer;

#[\AllowDynamicProperties]
class MarketingModel extends Model
{
    protected $table = 'bf_marketing_scraper';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        // General fields (used in multiple sections)
        'title', 'description', 'created_on', 'modified_on', 'status', 'type', 'source_id', 'source_type', 'source', 'symbols',
    
        // Fields for minimal footprint and specific queries
        'day', 'time', 'activity', 'link', 'url', 'summary', 'content', 
        'email_identifier', 'email_date', 'email_sender', 'email_subject', 'email_body',
        'email_attachments', 'keywords', 'scraped_at', 'links', 'images', 'videos',
        'metadata', 'structured_data', 'url', 'date_scraped', 'meta_json', 'hash', 'platforms',
    
        // Fields for marketing content
        'sched_id', 'escalated', 'audience_type', 'stage', 'name', 'assigned_on', 
        'assigned_to', 'completed_on', 'scheduled_at', 'primary_content', 'secondary_content',
        'html_content', 'voice_script', 'shared', 'shared_users', 'blog', 'in_app', 
        'email', 'discord', 'facebook', 'linkedin', 'telegram', 'twitter', 'website',
        'promotional_links', 'facebook_message', 'linkedin_message', 'discord_message',
        'stocktwits_message', 'tiktok_message', 'youtube_message', 'email_message',
        'additional_info',
    
        // New field for image uploads
        'image_paths' // Stores paths to uploaded images
    ];
    
    protected $useTimestamps = true;
    protected $createdField = 'created_on';
    protected $updatedField = 'modified_on';

    public function addLinkToCampaign($campaignId, $newLink)
    {
        $builder = $this->db->table('bf_marketing_generated_content');
        $builder->where('id', $campaignId);
    
        $current = $builder->select('promotional_links')->get()->getRowArray();
        $links = json_decode($current['promotional_links'] ?? '[]', true);
    
        if (!is_array($links)) {
            $links = [];
        }
    
        if (!in_array($newLink, $links)) {
            $links[] = $newLink;
        }
    
        return $builder->update(['promotional_links' => json_encode($links)]);
    }
    

    // Add a marketing campaign to the database
    public function addMarketingCampaign($campaignData) {
        log_message('debug', 'MarketingModel L206 - $marketingData: ' . (print_r($campaignData, true))); 
        $dbData = [
            'beta' => $campaignData['beta'],
            'config_mode' => $campaignData['config_mode'],
            'form_mode' => $campaignData['form_mode'],
            'escalated' => $campaignData['escalated'],
            'created_by' => $campaignData['user_id'], 
            'user_id' => $campaignData['user_id'],
            'user_email' => $campaignData['user_email'],
            'username' => $campaignData['username'],
            'assigned_to' => $campaignData['assigned_to'],
            'assigned_on' => $campaignData['date'] . ' - ' . $campaignData['time'],
            'name' => $campaignData['campaign_name'],
            'promotional_links' => $campaignData['promotionalLinks'],
            'overall_campaign_description' => $campaignData['overall_campaign_description'],
            'voice_script' => $campaignData['voice_script'],
            'facebook_message' => $campaignData['facebookMessage'], 
            'linkedin_message' => $campaignData['linkedinMessage'], 
            'discord_message' => $campaignData['discordMessage'], 
            'stocktwits_message' => $campaignData['stocktwitsMessage'], 
            'tiktok_message' => $campaignData['tiktokMessage'], 
            'youtube_message' => $campaignData['youtubeMessage'], 
            'email_message' => $campaignData['emailMessage'], 
            'additional_info' => $campaignData['additionalInfo'], 
            'hashtags' => $campaignData['hashtags'], 
        ];
        log_message('debug', 'MarketingModel L206 - $marketingData: ' . (print_r($dbData, true))); 
        if ($this->db->table('bf_marketing_campaigns')->insert($dbData)) {
            log_message('info', 'Campaign created successfully.');
            return $this->getInsertID();
        } else {
            log_message('error', 'DB Insert Error: ' . json_encode($this->errors()));
            return false;
        }
    }

    public function addMarketingSchedule($data) {
        $data['zapier_webhook_url'] = $data['zapier_webhook_url'] ?? null;
        $data['post_status'] = 'pending';
        $this->db->table('bf_marketing_schedule')->insert($data);
        return $this->db->insertID();
    }

    // Add a subscriber to the database
    public function addSubscriber($subscriberData) {
        if ($this->db->table('bf_users_subscribers')->insert($subscriberData)) {
            log_message('info', 'Subscriber added successfully.');
            return true;
        } else {
            log_message('error', 'DB Insert Error: ' . json_encode($this->errors()));
            return false;
        }
    }

    public function autoResummarizeIfMissing($id, $MyMIMarketing)
    {
        $record = $this->find($id);

        if ($record && empty(trim($record['summary'])) && !empty(trim($record['content']))) {
            $generated = $MyMIMarketing->processInboundMessage($record['content']);
            if (!empty($generated)) {
                $this->update($id, ['summary' => $generated]);
                log_message('info', "✅ autoResummarizeIfMissing: Summary generated for ID {$id}");
            } else {
                log_message('warning', "⚠️ autoResummarizeIfMissing: Summary generation failed for ID {$id}");
            }

            // 🧠 Refetch updated record to return the fresh summary
            $record = $this->find($id);
        }

        return $record;
    }

    public function cacheScrapedLink(string $url, string $content): bool
    {
        $data = [
            'url'              => $url,
            'content'          => $content,
            'last_enriched_at' => date('Y-m-d H:i:s'),
        ];
    
        return $this->db->table('bf_marketing_content_enrichment_cache')->replace($data);
    }
    
    public function cacheScrapedLinkWithKeyword(string $url, string $content, string $keyword): void
    {
        $this->db
            ->table('bf_marketing_content_enrichment_cache')
            ->replace([
                'url' => $url,
                'content' => $content,
                'source_keywords' => $keyword,
                'last_enriched_at' => date('Y-m-d H:i:s'),
            ]);
    }

    public function cleanHtmlEmailContent($raw): string
    {
        // Ensure $raw is always a string and not null
        $raw = is_string($raw) ? $raw : '';
    
        $decoded = quoted_printable_decode($raw);
        $decoded = is_string($decoded) ? $decoded : ''; // Some decoders return null
    
        $text = strip_tags($decoded);
        $text = preg_replace('/\s+/', ' ', str_replace(["\r", "\n", "\t", '&nbsp;'], ' ', $text));
    
        return trim(substr($text, 0, 5000));
    }
    /**
     * Sanitize text before sending to AI services
     */
    public function cleanTextForAI($text)
    {
        $text = html_entity_decode($text);
        $text = preg_replace('/\s{2,}/', ' ', $text);
        $text = str_replace('=', '', $text);
        $text = strip_tags($text);
        return trim($text);
    }

    // Copy an existing marketing campaign
    public function copyMarketingCampaign($marketingData)
    {
        unset($marketingData['id']);
        if ($this->insert($marketingData)) {
            log_message('info', 'Campaign copied successfully.');
            return $this->getInsertID();
        } else {
            log_message('error', 'DB Insert Error: ' . json_encode($this->errors()));
            return false;
        }
    }

    public function countBlogs() {
        return $this->db->table('bf_marketing_blog_posts')->countAllResults();
    } 
    
    public function countNewlyInsertedToday(): int
    {
        return $this->where('DATE(scraped_at)', date('Y-m-d'))
                    ->countAllResults();
    }
    
    public function createSlug($title)
    {
        $slug = url_title($title, '-', true);
        $existing = $this->db->table('bf_marketing_blog_posts')->where('slug', $slug)->countAllResults();
    
        return $existing ? $slug . '-' . uniqid() : $slug;
    }
    
    // Delete a marketing campaign
    public function deleteMarketingCampaign($id)
    {
        if ($this->delete($id)) {
            log_message('info', 'Campaign deleted successfully.');
            return true;
        } else {
            log_message('error', 'DB Delete Error: ' . json_encode($this->errors()));
            return false;
        }
    }

    public function deleteSchedule($id) {
        return $this->db->table('bf_marketing_schedule')->where('id', $id)->delete();
    }

    // Edit an existing marketing campaign
    public function editMarketingCampaign($marketingData)
    {
        if ($this->update($marketingData['id'], $marketingData)) {
            log_message('info', 'Campaign updated successfully.');
            return true;
        } else {
            log_message('error', 'DB Update Error: ' . json_encode($this->errors()));
            return false;
        }
    }

    // Extract keywords from text using TF-IDF
    public function extractKeywords($text)
    {
        if (empty($text) || strlen(trim($text)) < 50) {
            return []; // skip short or invalid input
        }        

        $tokenizer = new WhitespaceTokenizer();
        $tokens = array_filter($tokenizer->tokenize($text));

        if (empty($tokens)) {
            return [];
        }

        $documents = [$tokens];
        $tfidf = new TfIdfTransformer();
        try {
            $tfidf->transform($documents);
        } catch (\Exception $e) {
            log_message('error', 'TfIdfTransformer failed: ' . $e->getMessage());
            return [];
        }

        $keywordScores = [];
        foreach ($documents[0] as $word => $score) {
            $keywordScores[$word] = $score;
        }
        arsort($keywordScores);
        return array_slice(array_keys($keywordScores), 0, 10);
    }

    public function fetchBufferPaginated($page = 1, $limit = 20)
    {
        $offset = ($page - 1) * $limit;
    
        $builder = $this->db->table('bf_marketing_buffer')
            ->where('status !=', 'promoted')
            ->orderBy('tag_score', 'DESC')
            ->limit($limit, $offset);
    
        $results = $builder->get()->getResultArray();
    
        $total = $this->db->table('bf_marketing_buffer')
            ->where('status !=', 'promoted')
            ->countAllResults();
    
        return [
            'data' => $results,
            'pagination' => [
                'page'  => $page,
                'pages' => ceil($total / $limit),
            ]
        ];
    }
    
    public function fetchBufferPaginatedWithFilters(array $params = [])
    {
        $page          = $params['page'] ?? 1;
        $limit         = $params['limit'] ?? 20;
        $offset        = ($page - 1) * $limit;
        $keyword       = $params['keyword'] ?? null;
        $category      = $params['category'] ?? null;
        $minTagScore   = $params['min_tag_score'] ?? 0;
        $onlySuggested = $params['only_suggested'] ?? false;
    
        $builder = $this->db->table('bf_marketing_buffer')->where('status !=', 'promoted');
    
        if (!empty($keyword)) {
            $builder->like('keyword', $keyword);
        }
    
        if (!empty($category)) {
            $builder->where('category', $category);
        }
    
        if (!empty($minTagScore)) {
            $builder->where('tag_score >=', $minTagScore);
        }
    
        if ($onlySuggested) {
            $builder->where('auto_suggest', 1);
        }
    
        $totalQuery = clone $builder;
        $total      = $totalQuery->countAllResults(false);
    
        $results = $builder
            ->orderBy('tag_score', 'DESC')
            ->limit($limit, $offset)
            ->get()
            ->getResultArray();
    
        return [
            'data' => $results,
            'pagination' => [
                'page'  => $page,
                'limit' => $limit,
                'pages' => ceil($total / $limit),
                'total' => $total,
            ],
        ];
    }

    public function fetchBufferPostsForReview($limit = 25)
    {
        return $this->db->table('bf_marketing_buffer')
            ->orderBy('created_on', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    
    public function fetchBufferPostsForScoring()
    {
        return $this->db->table('bf_marketing_scraper')
            ->select('id, title, summary, keywords, status, created_at')
            ->where('status', 'buffered')
            ->orderBy('created_at', 'DESC')
            ->limit(100)
            ->get()
            ->getResultArray();
    }
    
    public function findBufferItem($id)
    {
        return $this->db->table('bf_marketing_buffer')->where('id', $id)->get()->getRowArray();
    }

    public function findFinalizedById($id)
    {
        return $this->db->table('bf_marketing_scraper')
            ->where('id', $id)
            ->get()
            ->getRowArray();
    }
    
    public function getBufferItem($id)
    {
        return $this->db->table('bf_marketing_buffer')->where('id', $id)->get()->getRowArray();
    }

    public function getIncompleteSummaries($limit = 50)
    {
        return $this->db->table('bf_marketing_scraper')
            ->where("(title IS NULL OR title = '' OR summary IS NULL OR summary = '')", null, false)
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    
    // Get all active campaigns
    public function getActiveCampaigns()
    {
        // Start query builder
        $builder = $this->db->table('bf_marketing_campaigns');

        // Count active campaigns without executing the query
        $num_rows = $builder->where('status', 1)->countAllResults(false);

        // Get the result as an array
        $result = $builder->where('status', 1)->get()->getResultArray();

        return ['result' => $result, 'num_rows' => $num_rows];
    }
    
    // Get all active drip campaigns
    public function getActiveDripCampaigns()
    {
        // Start query builder
        $builder = $this->db->table('bf_email_drip_campaigns');

        // Count active campaigns without executing the query
        $num_rows = $builder->where('is_active', 1)->countAllResults(false);

        // Get the result as an array
        $result = $builder->where('is_active', 1)->get()->getResultArray();

        return ['result' => $result, 'num_rows' => $num_rows];
    }
    
    // Get all active drip campaigns
    public function getActiveDripCampaignByID($campaignID)
    {
        // Start query builder
        $builder = $this->db->table('bf_email_drip_campaigns');

        // Count active campaigns without executing the query
        $num_rows = $builder->where('is_active', 1)->countAllResults(false);

        // Get the result as an array
        $result = $builder->where('is_active', 1)->get()->getResultArray();
        $campaignSteps = $this->getActiveDripCampaignStepByCampaignID($campaignID); 
        return ['result' => $result, 'num_rows' => $num_rows];
    }

    public function getDailyNews(int $limit = 20, int $offset = 0): array
    {
        // NOTE: select only lightweight columns to avoid fetching huge HTML blobs
        $builder = $this->db->table('bf_marketing_scraper')
            ->select('id, title, summary, source, keywords, created_on, status')
            ->where('status', 'published')
            ->where('created_on >=', date('Y-m-d 00:00:00'))
            ->orderBy('created_on', 'DESC')
            ->limit($limit, $offset);

        // Optional: hard per-query timeout on MySQL 5.7+; harmless if unsupported
        $this->db->simpleQuery('SET SESSION MAX_EXECUTION_TIME=40000'); // 40s cap

        return $builder->get()->getResultArray();
    }
    
    // Get all active drip campaigns
    public function getDripCampaignById($campaignID)
    {
        // Start query builder
        $builder = $this->db->table('bf_email_drip_campaigns');

        // Count active campaigns without executing the query
        $num_rows = $builder->countAllResults(false);

        // Get the result as an array
        $result = $builder->get()->getResultArray();
        $campaignSteps = $this->getActiveDripCampaignStepByCampaignID($campaignID); 
        return ['result' => $result, 'num_rows' => $num_rows];
    }
    
    // Get all active drip campaigns
    public function getDripCampaignStepsById($stepID)
    {
        // Start query builder
        $builder = $this->db->table('bf_email_drip_campaign_steps');

        // Count active campaigns without executing the query
        $num_rows = $builder->where('id', $stepID)->countAllResults(false);

        // Get the result as an array
        $result = $builder->where('id', $stepID)->get()->getResultArray();
        return ['result' => 
        $result, 'num_rows' => $num_rows];
    }

    public function getDripCampaignStepsByCampaignId($campaignID)
    {
        // Start query builder
        $builder = $this->db->table('bf_email_drip_campaign_steps');

        // Count active campaigns without executing the query
        $num_rows = $builder->where('campaign_id', $campaignID)->countAllResults(false);

        // Get the result as an array
        $result = $builder->where('campaign_id', $campaignID)->get()->getResultArray();
        return ['result' => $result, 'num_rows' => $num_rows];
    }
    
    // Get all active drip campaigns
    public function getActiveDripCampaignSteps()
    {
        // Start query builder
        $builder = $this->db->table('bf_email_drip_campaign_steps');

        // Count active campaigns without executing the query
        $num_rows = $builder->where('is_active', 1)->countAllResults(false);

        // Get the result as an array
        $result = $builder->where('is_active', 1)->get()->getResultArray();

        return ['result' => $result, 'num_rows' => $num_rows];
    }
    
    // Get all active drip campaigns
    public function getActiveDripCampaignStepByCampaignID($campaignID)
    {
        // Start query builder
        $builder = $this->db->table('bf_email_drip_campaign_steps');

        // Count active campaigns without executing the query
        $num_rows = $builder->where('is_active', 1)->where('campaign_id', $campaignID)->countAllResults(false);

        // Get the result as an array
        $result = $builder->where('is_active', 1)->where('campaign_id', $campaignID)->get()->getResultArray();

        return ['campaignID' => $campaignID, 'result' => $result, 'num_rows' => $num_rows];
    }

    public function getActiveIdeas()
    {
        return $this->db->table('bf_marketing_ideas')->where('status !=', 'approved')->get()->getResultArray();
    }

    // Get all active priority campaigns
    public function getActivePriorityCampaigns()
    {
        // Start query builder
        $builder = $this->db->table('bf_marketing_campaigns');

        // Count active campaigns without executing the query
        $num_rows = $builder->where('status', 1)->where('escalated', 1)->countAllResults(false);

        // Get the result as an array
        $result = $builder->where('status', 1)->where('escalated', 1)->get()->getResultArray();

        return ['result' => $result, 'num_rows' => $num_rows];
    }
    
    public function getActiveSymbols(): array
    {
        return $this->db
            ->table('bf_investment_trade_alerts')
            ->select('DISTINCT ticker')
            ->whereIn('status', ['In Review', 'Opened'])
            ->whereNotIn('ticker', ['SPAM', 'TEST']) // Optional: filter out junk symbols
            ->orderBy('created_on', 'DESC')
            ->limit(100)
            ->get()
            ->getResultArray();
    }
    
    public function getAllBufferItems()
    {
        return $this->db->table('bf_marketing_scraper')
            ->orderBy('created_on', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getAllFinalizedArticles()
    {
        return $this->db->table('bf_marketing_scraper')
            ->where('status', 'ready')
            ->orderBy('scraped_at', 'desc')
            ->get()
            ->getResultArray();
    }

    /**
     * Return an array of file paths that have already been imported from the
     * media repository. This helps avoid reprocessing the same Markdown files
     * multiple times.
     */
    public function getAllKnownFilePaths(): array
    {
        return array_column(
            $this->db->table('bf_marketing_scraper')
                ->select('file_path')
                ->where('file_path IS NOT NULL')
                ->get()
                ->getResultArray(),
            'file_path'
        );
    }
    
    public function getApprovedBufferWithoutSchedule()
    {
        return $this->db->table('bf_marketing_buffer')
            ->where('status', 'approved')
            ->where('scheduled_at IS NULL', null, false)
            ->where('schedule_interval >', 0)
            ->orderBy('tag_score', 'DESC')
            ->limit(10)
            ->get()
            ->getResultArray();
    }
    
    public function getApprovedLogos()
    {
        return $this->db->table('bf_company_logos')->get()->getResultArray();
    }
    
    public function getBlogPostBySlug($slug) {
        return $this->db->table('bf_marketing_blog_posts')
            ->where('slug', $slug)
            ->get()
            ->getRow();
    }

    // Retrieve details of a specific blog post
    public function getBlogPostDetails($id)
    {
        return $this->find($id);
    }

    // Retrieve blog posts for newsletters
    public function getBlogPosts()
    {
        return $this->where('type', 'Email/Newsletters')
                    ->limit(50) // Limit the results to prevent memory overload
                    ->get()
                    ->getResultArray();
    }

    public function getBlogs() {
        return $this->db->table('bf_marketing_blog_posts')
            ->orderBy('created_on', 'DESC')
            ->get()
            ->getResult();
    }
    
    public function getBufferItems($limit = 50)
    {
        return $this->builder()
            ->where('status', 'pending')
            ->orderBy('score', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    
    public function getCachedLink(string $url): ?array
    {
        return $this->db
            ->table('bf_marketing_content_enrichment_cache')
            ->where('url', $url)
            ->get()
            ->getRowArray();
    }
    
    public function getCampaignById($campaign_id) {
        return $this->db->table('bf_marketing_campaigns')
                        ->where('id', $campaign_id)
                        ->get()
                        ->getResultArray();
    }

    public function getCampaignsBySchedId($accountid) {
        return $this->db->table('bf_marketing_campaigns')
                        ->where('sched_id', $accountid)
                        ->get()
                        ->getResultArray();
    }
    
    public function getContentPerformance()
    {
        return $this->db->table('bf_marketing_generated_content gc')
            ->select('gc.id, gc.title, gc.keywords, gc.score, gc.shared_discord, gc.shared_linkedin, gc.shared_x, gc.shared_email')
            ->select('(SELECT COUNT(*) FROM bf_users_link_clicks lc WHERE lc.redirect_id = rl.id) AS clicks_estimated', false)
            ->select('(
                IFNULL(gc.shared_discord, 0) +
                IFNULL(gc.shared_linkedin, 0) +
                IFNULL(gc.shared_x, 0) +
                IFNULL(gc.shared_email, 0)
            ) AS engagement_score', false)
            ->join('bf_redirect_links rl', 'rl.post_id = gc.id', 'left')
            ->orderBy('gc.created_at', 'DESC')
            ->get()
            ->getResultArray();
    }    
    
    public function getDailyLogsByDate($date)
    {
        return $this->db->table('bf_marketing_scraper')
            ->where('DATE(created_on)', $date)
            ->get()
            ->getResult();
    }

    public function getEmailRecordById($id)
    {
        return $this->db->table('bf_marketing_temp_scraper')
                        ->where('id', $id)
                        ->get()
                        ->getRowArray();
    }
    
    public function getEmailByMessageId($messageId)
    {
        return $this->db->table('bf_marketing_temp_scraper')
            ->where('email_identifier', $messageId)
            ->get()
            ->getRowArray();
    }
    
    // Retrieve email contents that are not yet included in newsletters
    public function getEmailContentsForNewsletter() {
        return $this->where('include_newsletter', false)
                    ->limit(50) // Limit the results to prevent memory overload
                    ->get()
                    ->getResultArray();
    }

    public function getEmailsMissingTitleOrUrl($limit = 20)
    {
        return $this->db->table('bf_marketing_temp_scraper')
            ->where('(title IS NULL OR title = "" OR url IS NULL OR url = "")', null, false)
            ->orderBy('date_scraped', 'DESC') // Or whatever is the actual timestamp field used
            ->limit($limit)
            ->get()->getResultArray();
    }

    // Retrieve email summaries for review
    public function getEmailSummariesForReview()
    {
        return $this->where('status', 'In Review')->limit(50)->get()->getResultArray(); // Limit the results to prevent memory overload
    }

    // Fetch a single exchange token by its ID
    public function getExchangeTokenById($id)
    {
        return $this->db->table('bf_exchanges_assets')->where('id', $id)->get()->getRowArray();
    }
    
    public function getExistingLogoBySymbol($symbol)
    {
        return $this->db->table('bf_company_logos')->where('symbol', $symbol)->get()->getRow();
    }
    
    // Get MyMI Services & Features
    public function getFeatures() {
        return $this->db->table('bf_users_memberships')->where('active', 1)->orderBy('feature_level', 'ASC')->orderBy('feature_name', 'ASC')->get()->getResultArray(); 
    }

    public function getFinalizedMarketingContent($limit = 10)
    {
        return $this->db->table('bf_marketing_scraper')
            ->where('status', 'finalized')
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    
    public function getFinalizedPosts($limit = 20)
    {
        return $this->db->table('bf_marketing_scraper')
            ->where('status', 'finalized')
            ->orderBy('created_on', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    
    public function getGeneratedContent($postId) {
        return $this->db->table('bf_marketing_campaigns')
                        ->where('sched_id', $postId)
                        ->get()
                        ->getRowArray();
    }

    public function getGeneratedContentByCampaign($campaignId)
    {
        log_message('info', 'MarketingModel L653 - getGeneratedContentByCampaign ID: ' . $campaignId); 
        $builder = $this->db->table('bf_marketing_generated_content')
                    ->where('campaign_id', $campaignId)
                    ->orderBy('created_at', 'desc')
                    ->get()
                    ->getResultArray();
        log_message('info', 'MarketingModel L653 - getGeneratedContentByCampaign ID: ' . (print_r($builder, true))); 
        return $builder;
    }

    public function getGeneratedContentByStep($campaignId)
    {
        return $this->db->table('bf_marketing_generated_content')
                    ->where('step_id', $campaignId)
                    ->orderBy('created_at', 'desc')
                    ->get()
                    ->getResultArray();
    }

    public function getGeneratedPost($id)
    {
        return $this->db->table('bf_marketing_generated_content')->where('id', $id)->get()->getRowArray();
    }
    
    public function getGeneratedPostById($id)
    {
        $row = $this->db->table('bf_marketing_scraper')->where('id', $id)->get()->getRowArray();
        if (!$row || empty($row['platforms'])) return [];
    
        $decoded = json_decode($row['platforms'], true);
        if (!is_array($decoded)) return [];
    
        return $decoded;
    }

    public function getGeneratedPostsBySourceId($id)
    {
        $row = $this->db->table('bf_marketing_scraper')->where('source_id', $id)->get()->getRowArray();
        if (!$row || empty($row['platforms'])) return [];
    
        $decoded = json_decode($row['platforms'], true);
        if (!is_array($decoded)) return [];
    
        return $decoded;
    }
    
    public function getLastGeneratedContentByCampaignId($campaignId)
    {
        return $this->db->table('bf_marketing_generated_content')
            ->where('campaign_id', $campaignId)
            ->orderBy('created_at', 'DESC')
            ->limit(1)
            ->get()
            ->getRowArray();
    }
    
    public function getLastGeneratedStepContentByStepId($stepId)
    {
        return $this->db->table('bf_marketing_generated_content')
            ->where('step_id', $stepId)
            ->orderBy('created_at', 'DESC')
            ->limit(1)
            ->get()
            ->getRowArray();
    }
    
    public function insertGeneratedStepContent(array $data)
    {
        return $this->db->table('bf_marketing_generated_content')->insert($data);
    }
    
    public function insertStoryboard(array $data): int
    {
        return $this->db->table('bf_marketing_visuals')
            ->insert([
                'summary_id'     => $data['summary_id'],
                'storyboard_json'=> json_encode($data['storyboard']),
                'title'          => $data['title'],
                'keywords'       => implode(',', $data['keywords']),
                'created_at'     => date('Y-m-d H:i:s'),
            ]);
    }
    
    public function getLastSearchTimestamp(string $source): ?string
    {
        return $this->db->table('bf_marketing_search_api_log')
            ->select('created_at')
            ->where('source', $source)
            ->orderBy('created_at', 'DESC')
            ->limit(1)
            ->get()
            ->getRow('created_at');
    }

    public function getLatestAlertBySymbol(string $symbol): ?array
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', strtoupper($symbol))
            ->orderBy('date', 'DESC')
            ->limit(1)
            ->get()
            ->getRowArray();
    }
    
    public function getLatestGeneratedByCampaignId($campaignId)
    {
        if (empty($campaignId)) {
            return null;
        }
    
        return $this->db->table('bf_marketing_generated_content')
                    ->where('campaign_id', $campaignId)
                    ->orderBy('created_at', 'DESC')
                    ->limit(1)
                    ->get()
                    ->getRowArray();
    }
    
    public function getLatestGeneratedSummaries($limit = 25)
    {
        return $this->db->table('bf_marketing_scraper')
            ->orderBy('created_on', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    
    // Retrieve the latest newsletter draft
    public function getLatestNewsletterDraft() {
        return $this->db->table('bf_marketing_newsletters')
                        ->orderBy('created_at', 'DESC')
                        ->first();
    }

    public function getLatestScrapedByKeyword(string $keyword): ?array
    {
        return $this->db
            ->table('bf_marketing_content_enrichment_cache')
            ->like('source_keywords', $keyword)
            ->orderBy('last_enriched_at', 'DESC')
            ->limit(1)
            ->get()
            ->getRowArray();
    }

    public function getLatestTempRecords($limit = 5)
    {
        return $this->db->table('bf_marketing_temp_scraper')
            ->where('status', 'In Review')
            ->orderBy('created_on', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function getLatestUnprocessedEmails($limit = 10)
    {
        return $this->db->table('bf_marketing_temp_scraper')
            ->where('status', 'In Review')
            ->orderBy('scraped_at', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    
    public function getMarketingBuffer($status = 'Pending')
    {
        return $this->builder()
            ->where('status', $status)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResultArray();
    }
    
    // Get SEO information by page name
    public function getMarketingPageSeoByName($pageTitle) {
        return $this->where('page_name', $pageTitle)->get()->getResultArray();
    }

    public function getMarketingTeam() {
        $result = $this->db->table('bf_management_positions')
                           ->where('department', 'Marketing')
                           ->get()
                           ->getResultArray();

        return $result; 
    }

    // Retrieve news articles
    public function getNewsArticles()
    {
        $result = $this->select('articles_json')->first();
        return json_decode($result->articles_json ?? '[]', true);
    }


    public function getNewEmails()
    {
        return $this->db->table('bf_marketing_raw_emails')
            ->where('status', 'unprocessed')
            ->get()
            ->getResultArray();
    }
    
    // Retrieve news posts
    public function getNewsPosts()
    {
        return $this->where('type', 'news_post')
                    ->limit(50) // Limit the results to prevent memory overload
                    ->get()
                    ->getResultArray();
    }
    
    public function getNewsUpdates($limit = 5)
    {
        return $this->db->table('bf_marketing_scraper')
            ->where('category', 'News')
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    
    public function getNextScheduledPost()
    {
        return $this->db->table('bf_marketing_buffer')
            ->where('status', 'approved')
            ->where('tag_score >=', 7.0)
            ->orderBy('tag_score', 'DESC')
            ->limit(1)
            ->get()
            ->getRowArray();
    }
    
    public function getPaginatedGeneratedPosts($page, $limit)
    {
        $builder = $this->db->table('bf_marketing_generated_content')
            ->select('*')
            ->orderBy('score', 'DESC')
            ->orderBy('created_at', 'DESC');
    
        $total = $builder->countAllResults(false);
        $results = $builder->limit($limit, ($page - 1) * $limit)->get()->getResultArray();
    
        return [
            'data' => $results,
            'pagination' => [
                'page' => $page,
                'limit' => $limit,
                'total' => $total,
                'pages' => ceil($total / $limit),
            ]
        ];
    }

    public function getPendingAutoSuggested($limit = 5)
    {
        return $this->db->table('bf_marketing_buffer')
            ->where('status', 'pending')
            ->where('auto_suggest', 1)
            ->orderBy('tfidf_score', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    
    public function getPendingBufferItems()
    {
        return $this->db->table('bf_marketing_scraper')
            ->where('status', 'pending')
            ->orderBy('created_on', 'DESC')
            ->limit(100)
            ->get()
            ->getResultArray();
    }

    public function getPendingScheduledPosts($currentTimestamp)
    {
        return $this->db->table('bf_marketing_schedule')
            ->where('post_time <=', $currentTimestamp)
            ->where('post_status', 'pending')
            ->get()
            ->getResult();
    }

    public function getPendingScraperSummaries($limit = 10)
    {
        return $this->db->table('bf_marketing_scraper')
            ->where('status', null)
            ->orWhere('status', '')
            ->orderBy('created_on', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function getProcessedEmails($date = null)
    {
        $builder = $this->select('email_identifier');

        if ($date) {
            $builder->where('DATE(email_date)', $date);
        }

        $results = $builder->get()->getResultArray();

        $identifiers = [];
        foreach ($results as $row) {
            if (!empty($row->email_identifier)) {
                $identifiers[] = $row->email_identifier;
            }
        }

        return $identifiers;
    }
    
    public function getQueuedEmails($limit = 25)
    {
        return $this->db->table('bf_marketing_email_queue')
            ->where('status', 'queued')
            ->where('retry_count <', 3)
            ->orderBy('scheduled_at', 'ASC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function getRecentGeneratedContent($limit = 10)
    {
        return $this->db->table('bf_marketing_scraper')
            ->orderBy('created_on', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    
    public function getRecentTempScraperRecords($limit = 10)
    {
        return $this->db->table('bf_marketing_temp_scraper')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    
    public function getRecentPosts($limit = 5)
    {
        $results = $this->db->table('bf_marketing_scraper')
            ->select("id, title, category, created_at, blog_content, summary, keywords")
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    
        foreach ($results as &$r) {
            $hasSummary = !empty(trim($r['summary'] ?? ''));
            $hasContent = !empty(trim($r['blog_content'] ?? ''));
    
            if (!$hasSummary && $hasContent) {
                $text = strip_tags($r['blog_content']);
                $summary = substr($text, 0, 150);
                $r['summary'] = rtrim($summary, '. ') . '...';
            }
    
            // Append keyword tags (if available)
            if (!empty($r['keywords'])) {
                $keywords = is_array($r['keywords']) ? $r['keywords'] : explode(',', $r['keywords']);
                $tags = array_map(fn($k) => '#' . ucfirst(trim($k)), array_slice($keywords, 0, 5));
                $r['tags'] = implode(' ', $tags);
            } else {
                $r['tags'] = '';
            }
        }
    
        return $results;
    }
    
    public function getRecentScrapes()
    {
        return $this->db->table('bf_marketing_temp_scraper')
            ->orderBy('scraped_at', 'DESC')
            ->limit(25)
            ->get()
            ->getResult();
    }

    public function getRecentSummaries($limit = 5)
    {
        return $this->db->table('bf_marketing_scraper')
            ->select('id, title, summary, keywords, scraped_at')
            ->where("CHAR_LENGTH(summary) >=", 100)
            ->where("summary LIKE", '% % % % % % % % % %') // At least 10 spaces
            ->orderBy('created_on', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    
    public function getRecentSummariesByKeyword(string $keyword): array
    {
        return $this->db->table('bf_marketing_generated_content')
            ->select('*')
            ->like('keywords', $keyword)
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->get()
            ->getResultArray();
    }
    
    public function getRecentUnprocessedTempEmails($limit = 5)
    {
        return $this->db->table('bf_marketing_temp_scraper')
            ->where('status', 'In Review')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function getScheduledBufferPosts($timestamp)
    {
        return $this->db->table('bf_marketing_buffer')
            ->where('status', 'approved')
            ->where('scheduled_at <=', $timestamp)
            ->orderBy('scheduled_at', 'ASC')
            ->limit(3)
            ->get()
            ->getResultArray();
    }
    
    // Get scheduled campaigns
    public function getScheduledCampaigns() {
        return $this->db->table('bf_marketing_newsletters')
                        ->where('status', 'scheduled')
                        ->where('scheduled_date <=', date('Y-m-d H:i:s'))
                        ->get()
                        ->getResultArray();
    }

    // Get the schedule of activities by day
    public function getScheduleByDay($day) {
        return $this->db->table('bf_marketing_calendar')
                        ->where('day', ucfirst($day))
                        ->get()->getResultArray();
    }

    public function getScheduleById($id) {
        return $this->db->table('bf_marketing_schedule')->where('id', $id)->get()->getRow();
    }

    public function getScrapesByDate($date)
    {
        return $this->db->table('bf_marketing_temp_scraper')
            ->where('DATE(scraped_at)', $date)  // Fix here
            ->orderBy('scraped_at', 'DESC');

            if ($limit) {
                $builder->limit($limit);
            }

            return $builder->get()->getResultArray();
    }   

    // In App\Models\MarketingModel.php
    public function getScrapesByKeyword($keyword)
    {
        return $this->db
            ->table('bf_marketing_scraper')
            ->like('summary', $keyword)
            ->orLike('keywords', $keyword)
            ->orderBy('created_on', 'DESC')
            ->limit(10)
            ->get()
            ->getResultArray();
    }

    public function getSummariesToGroup(): array
    {
        return $this->db->table('bf_marketing_scraper')
        ->select('id, summary') // ✅ No 'name'
        ->where('status', 'Finalized')
        ->where('grouped', 0)
        ->orderBy('created_at', 'DESC')
        ->limit(25)
        ->get()
        ->getResultArray();    
    }
    
    public function getSymbolsToEnrich(): array
    {
        return array_column(
            $this->db
                ->table('bf_investment_trade_alerts')
                ->select('ticker')
                ->where('status', 'Opened')
                ->groupBy('ticker')
                ->get()
                ->getResultArray(),
            'ticker'
        );
    }
    
    public function getTodaysNewsContent($limit = 10)
    {
        $builder = $this->db
            ->table('bf_marketing_temp_scraper')
            ->where('DATE(scraped_at)', date('Y-m-d'))
            ->where('type !=', 'todays_story')
            ->orderBy('scraped_at', 'DESC')
            ->limit($limit);
    
        $query = $builder->get();
        $results = $query->getResultArray();
    
        if (empty($results)) {
            log_message('info', 'No scraped content found for today.');
        }
    
        return $results;
    }    

    public function getTodaysScrapedContent()
    {
        return $this->db
            ->table('bf_marketing_temp_scraper')  // ✅ Make sure this is your temp table
            ->where('DATE(scraped_at)', date('Y-m-d'))
            ->orderBy('feature_score', 'DESC')    // Optional: sort by relevance
            ->get()
            ->getResultArray();
    }    
        
    public function getTodaysStory()
    {
        return $this->db->table('bf_marketing_temp_scraper')
            ->where('DATE(created_on)', date('Y-m-d'))
            ->orderBy('created_on', 'desc') // Fix here
            ->get()
            ->getResultArray();
    }    
        
    public function getTopKeywordCounts(int $limit = 20): array
    {
        return $this->db->table('bf_marketing_generated_content')
            ->select("keywords, COUNT(*) as count")
            ->where('keywords IS NOT NULL')
            ->groupBy('keywords')
            ->orderBy('count', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    
    public function getTopKeywordsFromContent(int $limit = 10): array
    {
        return $this->db
            ->table('bf_marketing_generated_content')
            ->select('hashtags')
            ->orderBy('created_at', 'DESC')
            ->limit($limit * 2)
            ->get()
            ->getResultArray();
    }

    public function getTopKeywordScores($id)
    {
        $record = $this->find($id);
        if (!$record || empty($record['content'])) {
            return [];
        }

        $content = $record['content'];

        // Example TF-IDF-like keyword extraction logic
        $words = str_word_count(strtolower(strip_tags($content)), 1);
        $frequencies = array_count_values($words);

        // Remove stop words and short tokens
        $stopWords = ['the', 'and', 'is', 'in', 'of', 'to', 'a', 'it', 'for', 'on', 'with', 'as', 'this'];
        $keywords = [];

        foreach ($frequencies as $word => $count) {
            if (strlen($word) > 3 && !in_array($word, $stopWords)) {
                $keywords[] = ['keyword' => $word, 'score' => $count];
            }
        }

        // Sort descending by score
        usort($keywords, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        // Return top 10
        return array_slice($keywords, 0, 10);
    }

    public function getTopKeywordsWithStats(int $limit = 25): array
    {
        return $this->db->table('bf_marketing_content_enrichment_cache')
            ->select('keyword, COUNT(*) as uses, MAX(last_enriched_at) as last_enriched_at')
            ->where('CHAR_LENGTH(keyword) >', 2)
            ->groupBy('keyword')
            ->orderBy('uses', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    
    public function getTodaysGeneratedSummaries() {
        $todaysStory = $this->db->table('bf_marketing_temp_scraper')
                            ->where('DATE(scraped_at)', date('Y-m-d'))
                            ->where('status', 'ready')
                            ->orderBy('created_on', 'DESC')
                            ->limit(10)
                            ->get()
                            ->getResultArray();
        return $todaysStory; 
    }

    public function getTopBufferPosts($limit = 5, $minTagScore = 7.5)
    {
        return $this->builder('bf_marketing_buffer')
            ->where('status', 'approved')
            ->where('tag_score >=', $minTagScore)
            ->orderBy('tag_score', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    
    public function getTopGeneratedPosts($limit = 5)
    {
        return $this->db->table('bf_marketing_generated_content')
            ->select('id, preview_headline, score')
            ->where('status', 'pending')
            ->orderBy('score', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    
    public function getTopStories($limit = 10)
    {
        return $this->db->table('bf_marketing_scraper')
            ->where('status', 'pending')
            ->where('title IS NOT NULL')
            ->where('title !=', '')
            ->orderBy('feature_score', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function getTopTempRecords($limit = 5)
    {
        return $this->db->table('bf_marketing_temp_scraper')
            ->where('title IS NOT NULL')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    // Retrieve Upcoming Daily Marketing Campaigns
    public function getUpcomingSchedule() {
        return $this->db->table('bf_marketing_schedule')
                        ->select('id, post_date, completed, GROUP_CONCAT(DISTINCT platform ORDER BY platform ASC SEPARATOR ", ") as platforms, MIN(content_subject) as subjects, MIN(content_description) as descriptions')
                        ->where('post_date >=', date('Y-m-d')) // Fetch records with post_date from today onwards
                        ->groupBy('post_date')
                        ->orderBy('post_date', 'ASC') // Order by the post date
                        ->get()
                        ->getResultArray(); 
    
    }

    public function getUpcomingEarnings()
    {
        $builder = $this->db->where('bf_investment_calendar')
                        ->where('date >=', date('Y-m-d'))
                        ->where('event_type', 'Earnings')
                        ->orderBy('date', 'ASC')
                        ->get()
                        ->getResultArray();
        log_message('debug', 'MarketingModel L211 - getUpcomingEvents $builder Array: ' . (print_r($builder, true)));
        return $builder; 
    }



    /**
     * Return deduplicated scraped summaries from both scraper tables
     */
    public function getValidScrapedSummaries($limit = 10)
    {
        // Fetch more rows than needed for deduplication
        $scraperRows = $this->db->table('bf_marketing_scraper')
            ->select('title, summary, keywords, url, "scraper" as source')
            ->where('status', 'ready')
            ->orderBy('created_on', 'DESC')
            ->limit($limit * 2)
            ->get()
            ->getResultArray();

        $tempRows = $this->db->table('bf_marketing_temp_scraper')
            ->select('title, content as summary, keywords, url, "temp" as source')
            ->where('status', 'In Review')
            ->orderBy('scraped_at', 'DESC')
            ->limit($limit * 2)
            ->get()
            ->getResultArray();

        $rows = array_merge($scraperRows, $tempRows);
        $seen = [];
        $clean = [];

        foreach ($rows as $row) {
            $title   = $this->cleanTextForAI($row['title'] ?? '');
            $summary = $this->cleanTextForAI($row['summary'] ?? '');
            $url     = trim($row['url'] ?? '');

            if ($title === '' || $summary === '') {
                continue;
            }

            $key = strtolower($title) . '|' . strtolower($url);
            if (isset($seen[$key])) {
                continue;
            }

            $seen[$key] = true;
            $clean[] = [
                'title'    => $title,
                'summary'  => $summary,
                'keywords' => $row['keywords'],
                'url'      => $url,
                'source'   => $row['source']
            ];

            if (count($clean) >= $limit) {
                break;
            }
        }

        return $clean;
    }
    
    public function getValidUnprocessedEmails($limit = 10)
    {
        $builder = $this->db->table('bf_marketing_temp_scraper');
        $builder->where('processed', 0);
        $builder->limit($limit * 2); // fetch more than needed for filtering
    
        $query = $builder->get();
        $results = $query->getResultArray();
    
        $valid = [];
    
        foreach ($results as $row) {
            $id = $row['id'];
    
            // Skip if no title
            if (empty($row['title'])) {
                log_message('debug', "🪓 Skipping record ID {$id} — Missing title.");
                continue;
            }
    
            // Skip if content is empty or too short
            if (empty($row['content']) || strlen(strip_tags($row['content'])) < 100) {
                log_message('debug', "🪓 Skipping record ID {$id} — Content empty or too short.");
                continue;
            }
    
            // Skip if it's mostly HTML tags
            $textContent = strip_tags($row['content']);
            $htmlRatio = strlen($textContent) / strlen($row['content'] ?? '');
            if ($htmlRatio < 0.3) {
                log_message('debug', "🪓 Skipping record ID {$id} — HTML-dominant content ({$htmlRatio}).");
                continue;
            }
    
            // If all passes, keep it
            $valid[] = $row;
    
            // Stop early if we hit limit
            if (count($valid) >= $limit) {
                break;
            }
        }
    
        return $valid;
    }    
    
    public function getValidUnprocessedEmailsFromToday($limit = 10)
    {
        return $this->db->table('bf_marketing_temp_scraper')
            ->where('DATE(scraped_at)', date('Y-m-d'))
            ->where('content IS NOT NULL', null, false)
            ->where('title IS NOT NULL', null, false)
            ->where('CHAR_LENGTH(content) >', 250)
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    
    public function getYesterdaysStory()
    {
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        return $this->db->table('bf_marketing_temp_scraper')
            ->where('DATE(created_on)', $yesterday)
            ->orderBy('created_on', 'desc') // Fix here
            ->get()
            ->getResultArray();
    }    

    public function incrementRetry($emailId)
    {
        return $this->db->table('bf_marketing_email_queue')
            ->set('retry_count', 'retry_count + 1', false)
            ->set('updated_at', date('Y-m-d H:i:s'))
            ->where('id', $emailId)
            ->update();
    }

    public function incrementRetryCount($id)
    {
        return $this->db->table('bf_marketing_schedule')
            ->where('id', $id)
            ->set('retry_count', 'retry_count + 1', false)
            ->update(['last_attempt_at' => date('Y-m-d H:i:s')]);
    }
    
    public function insertBufferItem(array $summary)
    {
        $MyMIMarketing = new \App\Libraries\MyMIMarketing();
        $scoreData = $MyMIMarketing->getTopKeywordScores($summary['summary']);
        $threshold = getenv('MARKETING_TFIDF_THRESHOLD') ?: 7.5;

        $bufferRecord = [
            'keyword'      => $scoreData['top_keyword'] ?? 'general',
            'summary'      => $summary['summary'],
            'score'        => $scoreData['score'] ?? 0,
            'tag_score'    => $scoreData['tag_score'] ?? 0,
            'category'     => $scoreData['category'] ?? 'Uncategorized',
            'status'       => 'pending',
            'tfidf_score'  => $scoreData['tfidf_score'] ?? 0,
            'auto_suggest' => ($scoreData['tfidf_score'] ?? 0) >= $threshold ? 1 : 0,
            'platforms'    => json_encode([
                'discord'  => true,
                'linkedin' => true,
                'x'        => false,
                'email'    => false,
            ]),
            'created_at'   => date('Y-m-d H:i:s'),
        ];
    
        return $this->insert($bufferRecord);
    }
    
    public function insertEnrichedTradeAlertSummary(array $data): bool
    {
        $this->db->table('bf_investment_trade_alert_enrichment')
            ->where('symbol', $data['symbol'])
            ->delete(); // ensure only latest retained
    
        return $this->db->table('bf_trade_alert_enrichment')->insert([
            'symbol' => $data['symbol'],
            'summary' => $data['summary'],
            'keywords' => $data['keywords'],
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
    

    public function insertFinalScraper(array $record, array $summary)
    {
        // Generate hash based on title + summary for uniqueness
        $title = trim($record['title'] ?? '');
        $summaryText = trim($summary['summary'] ?? '');
    
        // Guard against malformed records
        if (empty($title) || empty($summaryText)) {
            log_message('error', "❌ insertFinalScraper: Missing title or summary for source_id {$record['id']}");
            return false;
        }
    
        $hash = md5($title . $summaryText);
    
        // Check for existing hash
        $existing = $this->db->table('bf_marketing_scraper')->where('hash', $hash)->get()->getRowArray();
        if ($existing) {
            log_message('debug', "🛑 insertFinalScraper skipped — duplicate hash for source_id {$record['id']} (existing ID: {$existing['id']})");
            return false;
        }
    
        $data = [
            'source_id'   => $record['id'],
            'title'       => $title,
            'summary'     => $summaryText,
            'keywords'    => json_encode($summary['keywords'] ?? []),
            'platforms'   => json_encode($summary['posts'] ?? []),
            'category'    => $summary['category'] ?? 'News',
            'voiceover_url' => $summary['voiceover_url'] ?? null,
            'status'      => 'ready',
            'hash'        => $hash,
            'created_on'  => date('Y-m-d H:i:s'),
        ];
    
        try {
            $this->db->table('bf_marketing_scraper')->insert($data);
            log_message('info', "✅ insertFinalScraper: Inserted summary for source_id {$record['id']}");
            return true;
        } catch (\Exception $e) {
            log_message('error', "❌ insertFinalScraper: DB insert failed — " . $e->getMessage());
            return false;
        }
    }

    public function insertNewsItem(array $data): bool
    {
        $title       = trim($data['title'] ?? '');
        $summaryText = trim(is_array($data['summary'] ?? null) ? ($data['summary']['summary'] ?? '') : ($data['summary'] ?? ''));

        if ($title === '' || $summaryText === '') {
            log_message('error', '❌ insertNewsItem: title or summary missing.');
            return false;
        }

        $hash = md5(strtolower($title . $summaryText));
        $existing = $this->db->table('bf_marketing_scraper')->where('hash', $hash)->get()->getRowArray();
        if ($existing) {
            log_message('debug', "🛑 insertNewsItem skipped duplicate hash {$hash} (existing ID {$existing['id']}).");
            return false;
        }

        $keywords = $data['keywords'] ?? [];
        $keywordString = is_array($keywords) ? implode(',', $keywords) : $keywords;

        $payload = [
            'source_id'    => $data['source_id'] ?? null,
            'source_type'  => $data['source_type'] ?? 'investment_scraper',
            'title'        => $title,
            'summary'      => $summaryText,
            'content'      => $data['content'] ?? null,
            'keywords'     => $keywordString,
            'url'          => $data['url'] ?? null,
            'symbols'      => $data['symbols'] ?? null,
            'source'       => $data['source'] ?? null,
            'date_scraped' => $data['date_scraped'] ?? date('Y-m-d H:i:s'),
            'meta_json'    => $data['meta_json'] ?? null,
            'hash'         => $hash,
            'status'       => $data['status'] ?? 'ready',
            'created_on'   => $data['created_on'] ?? date('Y-m-d H:i:s'),
        ];

        try {
            return (bool) $this->db->table('bf_marketing_scraper')->insert($payload);
        } catch (\Throwable $e) {
            log_message('error', '❌ insertNewsItem failed: ' . $e->getMessage());
            return false;
        }
    }
    
    public function insertGeneratedContent(array $data): bool
    {
        if (!empty($data['campaign_id'])) {
            $data['step_id']  = 0;
            $data['alert_id'] = 0;
        } elseif (!empty($data['step_id'])) {
            $data['campaign_id'] = 0;
            $data['alert_id']    = 0;
        } elseif (!empty($data['alert_id'])) {
            $data['campaign_id'] = 0;
            $data['step_id']     = 0;
        }
        return $this->db->table('bf_marketing_generated_content')->insert($data);
    }
    
    public function insertGeneratedPost(array $data): bool
    {
        return $this->db->table('bf_marketing_generated_posts')->insert([
            'title' => $data['title'],
            'summary' => $data['summary'],
            'keywords' => $data['keywords'],
            'platform_content' => $data['platform_content'],
            'status' => $data['status'],
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
    
    public function insertNewsContent(array $newsItem, string $ticker)
    {
        $data = [
            'title'         => $newsItem['title'] ?? '',
            'summary'       => $newsItem['summary'] ?? '',
            'content'       => $newsItem['content'] ?? '',
            'type'          => 'financial_news',
            'status'        => 'Published',
            'created_on'    => date('Y-m-d H:i:s'),
            'modified_on'   => date('Y-m-d H:i:s'),
            'scraped_at'    => date('Y-m-d H:i:s'),
            'keywords'      => json_encode($newsItem['keywords'] ?? []),
            'links'         => json_encode($newsItem['links'] ?? []),
            'audience_type' => 'investor',
            'activity'      => $ticker,
        ];
        return $this->db->table('bf_marketing_scraper')->insert($data);
    }
    
    public function insertTempScraper($data)
    {
        return $this->db->table('bf_marketing_temp_scraper')->insert($data);
    }

    // Fetch emails from the server and store them
    public function idleFetchEmails()
    {
        $config = config('NewsEmailServer');
        $connectionString = "{$config->host}:{$config->port}/imap/{$config->encryption}";

        $inbox = @imap_open($connectionString, $config->username, $config->password);
        if (!$inbox) {
            log_message('error', 'Cannot connect to email server: ' . imap_last_error());
            return;
        }

        try {
            while (true) {
                if (function_exists('imap_idle')) {
                    $status = imap_idle($inbox);
                } else {
                    log_message('warning', '📭 imap_idle not supported on this server. Falling back to polling.');
                    sleep(30); // Polling fallback
                    continue;
                }
                
                $status = imap_idle($inbox);
                if ($status) {
                    $emails = imap_search($inbox, 'ALL');
                    if ($emails) {
                        foreach ($emails as $email_number) {
                            $overview = imap_fetch_overview($inbox, $email_number, 0)[0];
                            $sender = $overview->from;
                            $subject = $overview->subject;
                            $body = imap_fetchbody($inbox, $email_number, 1);
                            $data = [
                                'status' => 'In Review',
                                'type' => 'Email/Newsletters',
                                'email_identifier' => md5($subject . $sender . $overview->date),
                                'email_date' => date('Y-m-d H:i:s', strtotime($overview->date)),
                                'email_sender' => $sender,
                                'email_subject' => $subject,
                                'email_body' => $body,
                                'created_on' => date('Y-m-d H:i:s'),
                                'modified_on' => date('Y-m-d H:i:s'),
                            ];

                            if ($this->isEmailProcessed($data['email_identifier'])) {
                                log_message('debug', 'Email already processed: ' . $data['email_identifier']);
                            } else {
                                $this->storeEmailContent($data);
                            }
                        }
                    } else {
                        log_message('debug', 'No new emails found or imap_search returned false');
                    }
                }
                sleep(30);  // Sleep for 30 seconds before checking again
            }
        } catch (\Exception $e) {
            log_message('error', 'An exception occurred during email fetching: ' . $e->getMessage());
        } finally {
            imap_close($inbox);
        }
    }

    // Check if an email has already been processed
    public function isEmailProcessed($emailIdentifier)
    {
        return $this->where('email_identifier', $emailIdentifier)->countAllResults() > 0;
    }

    // Helper function to map keywords to contextual hashtags
    private function mapToContextualHashtags($keywords)
    {
        // Example implementation for mapping keywords to hashtags
        return array_map(fn($keyword) => '#' . preg_replace('/\s+/', '', ucfirst($keyword)), $keywords);
    }

    public function logSearchApiRequest(string $query, string $source, bool $success, ?int $responseCode = null): bool
    {
        return $this->db->table('bf_marketing_search_api_log')->insert([
            'query'         => $query,
            'source'        => $source,
            'response_code' => $responseCode,
            'success'       => $success,
            'ip_address'    => service('request')->getIPAddress(),
            'created_at'    => date('Y-m-d H:i:s'),
        ]);
    }

    public function logSearchEngineUsage(string $engine, string $query = null, int $resultCount = null): void
    {
        $this->db->table('bf_marketing_search_engine_usage')->insert([
            'engine' => $engine,
            'query' => $query,
            'result_count' => $resultCount,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
    
    public function markAsApproved($id)
    {
        return $this->db->table('bf_marketing_scraper')
            ->where('id', $id)
            ->update(['status' => 'Approved', 'scheduled_at' => date('Y-m-d H:i:s', strtotime('+10 minutes'))]);
    }
    
    public function markAsSkipped($id)
    {
        return $this->db->table('bf_marketing_temp_scraper')
            ->where('id', $id)
            ->update([
                'status' => 'skipped',
                'summary' => null,
                'updated_on' => date('Y-m-d H:i:s'),
            ]);
    }
    
    public function markEmailAsBounced(string $email, string $errorMsg = ''): bool
    {
        $timestamp = date('Y-m-d H:i:s');
    
        // Track in users_subscribers
        $this->db->table('bf_users_subscribers')
            ->where('email', $email)
            ->update([
                'status' => 'bounced',
                'delivery_error' => substr($errorMsg, 0, 255),
                'updated_at' => $timestamp
            ]);
    
        // Track in email_list_members
        $this->db->table('bf_email_list_members')
            ->where('email', $email)
            ->update([
                'status' => 'bounced',
                'unsubscribed_at' => $timestamp
            ]);
    
        return true;
    }
    
    public function markEmailAsFailed($emailId)
    {
        return $this->db->table('bf_marketing_email_queue')
            ->set(['status' => 'failed', 'updated_at' => date('Y-m-d H:i:s')])
            ->where('id', $emailId)
            ->update();
    }

    public function markEmailAsSent($emailId)
    {
        return $this->db->table('bf_marketing_email_queue')
            ->set(['status' => 'sent', 'sent_at' => date('Y-m-d H:i:s')])
            ->where('id', $emailId)
            ->update();
    }

    public function markEmailAsUndeliverable($email, $errorMessage = '')
    {
        return $this->db->table('bf_users_subscribers') // <-- Corrected table name
            ->set('status', 'undeliverable')
            ->set('delivery_error', substr($errorMessage, 0, 500))
            ->set('updated_at', date('Y-m-d H:i:s'))
            ->where('email', $email)
            ->update();
    }    
    
    public function markEmailsAsProcessed($ids = [])
    {
        if (!empty($ids)) {
            return $this->db->table('bf_marketing_temp_scraper')
                ->whereIn('id', $ids)
                ->update(['status' => 'Processed']);
        }
        return false;
    }   
    
    public function markTempRecordAsProcessed($id)
    {
        return $this->db->table('bf_marketing_temp_scraper')
            ->where('id', $id)
            ->update(['status' => 'Processed', 'updated_at' => date('Y-m-d H:i:s')]);
    }

    public function markTempScraperProcessed($id)
    {
        $this->db->table('bf_marketing_temp_scraper')
            ->where('id', $id)
            ->update(['status' => 'Processed']);
    }
    
    // Process email body text into summarized content and hashtags
    public function processText($emailBody)
    {
        $summary = $this->summarizeText($emailBody);
        $keywords = $this->extractKeywords($emailBody);
        $hashtags = $this->mapToContextualHashtags($keywords);

        if (empty($summary) || empty($hashtags)) {
            log_message('error', 'Text processing failed');
            return false;
        }

        return $summary . ' ' . implode(' ', $hashtags);
    }
    
    public function queueEmail(array $data): bool
    {
        try {
            return $this->db->table('bf_marketing_email_queue')->insert([
                'user_id'      => $data['user_id']      ?? null,
                'email'        => $data['email'],
                'subject'      => $data['subject'],
                'content'      => $data['content'],
                'type'         => $data['type']         ?? 'general',
                'status'       => $data['status']       ?? 'queued',
                'priority'     => $data['priority']     ?? 'normal',
                'retry_count'  => 0,
                'scheduled_at' => $data['scheduled_at'] ?? date('Y-m-d H:i:s'),
                'created_at'   => $data['created_at']   ?? date('Y-m-d H:i:s'),
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'queueEmail() failed: '.$e->getMessage());
            return false;
        }
    }
    
    public function saveApprovedLogo($symbol, $imageUrl)
    {
        $symbol = strtoupper(trim($symbol)); // Ensure symbol is uppercase and trimmed of whitespace
    
        $data = [
            'symbol' => $symbol,
            'image_url' => $imageUrl,
            'approved_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    
        try {
            // Check if the symbol already exists in bf_company_logos
            $existingLogo = $this->db->table('bf_company_logos')->where('symbol', $symbol)->get()->getRow();
    
            if ($existingLogo) {
                // Update the existing record only if the image_url is different or other changes are necessary
                if ($existingLogo->image_url !== $imageUrl) {
                    $this->db->table('bf_company_logos')->where('symbol', $symbol)->update($data);
                    log_message('info', "Logo for symbol {$symbol} updated in bf_company_logos.");
                } else {
                    log_message('info', "Logo for symbol {$symbol} already exists and is up to date.");
                }
            } else {
                // Insert a new record
                $this->db->table('bf_company_logos')->insert($data);
                log_message('info', "Logo for symbol {$symbol} added to bf_company_logos.");
            }
        } catch (\Exception $e) {
            log_message('error', "Failed to save or update logo for symbol {$symbol}: " . $e->getMessage());
        }
    }    
    
    public function saveDailyLog($data)
    {
        return $this->db->table('bf_marketing_scraper')->insert($data);
    }
    
    public function saveLogo($data)
    {
        $symbol = strtoupper(trim($data['symbol']));
        $existing = $this->db->table('bf_company_logos')->where('symbol', $symbol)->get()->getRow();
    
        $data['symbol'] = $symbol;
        $data['updated_at'] = date('Y-m-d H:i:s');
    
        if ($existing) {
            $this->db->table('bf_company_logos')->where('symbol', $symbol)->update($data);
            log_message('info', "Logo for symbol {$symbol} updated in bf_company_logos.");
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->table('bf_company_logos')->insert($data);
            log_message('info', "Logo for symbol {$symbol} added to bf_company_logos.");
        }
    }
        
    // Schedule a newsletter campaign
    public function scheduleNewsletterCampaign($data) {
        return $this->db->table('bf_marketing_newsletters')->insert($data);
    }
    
    public function storeContentAnalytics(array $data)
    {
        return $this->db->table('bf_marketing_analysis')->insert($data);
    }    
    
    /**
     * Attempt to insert a new “temp_scraper” record.
     * If the email_identifier already exists, log a warning and skip.
     *
     * @param array $data  Associative array of column => value
     * @return int|false   Insert ID if successful, false if duplicate (or failure)
     * @throws \Exception  For any other database errors
     */
    public function storeEmail(array $data)
    {
        // 1) Grab the identifier from the $data
        $identifier = $data['email_identifier'] ?? null;

        if (empty($identifier)) {
            // If somehow no identifier was provided, bail out
            log_message('error', "MarketingModel::storeEmail(): no email_identifier in data");
            return false;
        }

        // 2) Check if that identifier already exists
        //    NOTE: use the same builder/connection or $this->builder()
        //    to get a fresh query against bf_marketing_temp_scraper.
        $exists = $this->where('email_identifier', $identifier)
                       ->countAllResults();

        if ($exists > 0) {
            // 3) If it’s a duplicate, skip the insert and log a warning
            log_message('warning', "MarketingModel::storeEmail(): Duplicate email_identifier '{$identifier}' skipped.");
            return false;
        }

        // 4) Otherwise, proceed with the normal insert
        try {
            $insertId = $this->insert($data);
            return $insertId;
        } catch (DatabaseException $e) {
            // If ANY other DB error occurs (very unlikely now that we checked above),
            // re-throw or log. But in many setups, you can catch it here and handle.
            log_message('error', "MarketingModel::storeEmail(): DatabaseException: " . $e->getMessage());
            throw $e;
        }
    }
    
    // Store email content in the database
    public function storeEmailContent($data) {
        return $this->insert($data);
    }

    public function storeFinalMarketingContent($data)
    {
        return $this->db->table('bf_marketing_scraper')->insert($data);
    }

    public function storeGeneratedPost(array $data)
    {
        return $this->db->table('bf_marketing_generated_content')->insert($data);
    }
    
    public function storeGroupedContentDrafts(array $groupedLabels, array $drafts): int
    {
        $campaign = [
            'name'             => 'Auto-Grouped Digest - ' . date('M j, Y'),
            'summary'          => strip_tags($drafts['email']),
            'blog_content'     => $drafts['blog'],
            'email_message'    => $drafts['email'],
            'discord_message'  => strip_tags($drafts['email']),
            'linkedin_message' => strip_tags($drafts['email']),
            'assigned_to'      => 'system',
            'assigned_on'      => date('Y-m-d H:i:s'),
            'status'           => 1,
            'stage'            => 'Draft',
            'platforms'        => json_encode([
                'email'    => true,
                'discord'  => true,
                'linkedin' => true
            ]),
            'primary_content'  => json_encode($groupedLabels),
            'created_on'       => date('Y-m-d H:i:s'),
        ];
    
        if ($this->db->table('bf_marketing_campaigns')->insert($campaign)) {
            return $this->db->insertID();
        } else {
            log_message('error', '❌ storeGroupedContentDrafts() failed: ' . json_encode($this->db->error()));
            return 0;
        }
    }
    
    public function storeLargeContent(array $data)
    {
        return $this->insert($data);
    }

    public function storeTodaysStory($title, $content)
    {
        $data = [
            'title'       => $title,
            'content'     => $content,
            'links'       => json_encode([]),
            'url'         => '',
            'type'        => 'todays_story',
            'scraped_at'  => date('Y-m-d H:i:s'),  // Set scraped_at
            'created_on'  => date('Y-m-d H:i:s'),
            'modified_on' => date('Y-m-d H:i:s'),
        ];
        return $this->db->table('bf_marketing_temp_scraper')->insert($data);
    }

    // Store a newsletter draft in the database
    public function storeNewsletterDraft($data) {
        return $this->db->table('bf_marketing_newsletters')->insert($data);
    }
    
    // Store promotional notification data
    public function storeNotification($data)
    {
        return $this->db->table('bf_users_promotional_messages')->insert($data);
    }

    public function storeScrapedContent($data) {
        return $this->db->table('bf_marketing_temp_scraper')->insert($data);
    }

    // Store scraped data temporarily
    public function storeTempScrapedData($data)
    {
        return $this->db->table('bf_marketing_temp_scraper')->insert($data);
    }
    
    public function submitCampaignContent($data) {
        // Convert promotional links array to JSON for storage
        if (isset($data['promotional_links']) && is_array($data['promotional_links'])) {
            $data['promotional_links'] = json_encode($data['promotional_links']);
        }

        // Add default values for missing fields if needed
        $data['status'] = $data['status'] ?? 1; // Default status
        $data['stage'] = $data['stage'] ?? 'draft';
        $data['created_on'] = date('Y-m-d H:i:s'); // Timestamp of creation
        
        return $this->save($data);
    }
    
    public function suggestSEOTitle(string $summary): string
    {
        $sentences = $this->splitIntoSentences($summary);
        $primary = $sentences[0] ?? 'Latest Investment News';
    
        $keywords = implode(', ', array_slice($this->extractKeywords($sentences), 0, 3));
        return trim("{$primary} | Keywords: {$keywords}");
    }   

    // Summarize text using TF-IDF
    public function summarizeText($text)
    {
        if (empty($text)) {
            return '';
        }

        $sentences = explode('.', $text);
        if (count($sentences) <= 1) {
            return substr($text, 0, 200);
        }

        $tokenizer = new WhitespaceTokenizer();
        $documents = array_map([$tokenizer, 'tokenize'], $sentences);
        $documents = array_filter($documents);

        if (empty($documents)) {
            return '';
        }

        $tfidf = new TfIdfTransformer();
        try {
            $tfidf->transform($documents);
        } catch (\Exception $e) {
            log_message('error', 'TfIdfTransformer failed: ' . $e->getMessage());
            return '';
        }

        $sentenceScores = [];
        foreach ($documents as $index => $document) {
            $sentenceScores[$index] = array_sum($document);
        }

        arsort($sentenceScores);
        $numSentences = min(5, count($sentenceScores));
        $summarySentences = array_slice(array_keys($sentenceScores), 0, $numSentences);
        return implode('. ', array_intersect_key($sentences, array_flip($summarySentences)));
    }

    public function syncUnsubscribeToken(string $email): bool
    {
        $token = $this->generateUnsubscribeToken($email);
    
        // Update both tables
        $this->db->table('bf_email_list_members')
            ->where('email', $email)
            ->update(['unsubscribe_token' => $token]);
    
        $this->db->table('bf_users_subscribers')
            ->where('email', $email)
            ->update(['unsubscribe_token' => $token]);
    
        return true;
    }
    
    public function updateBufferItem($id, $data)
    {
        return $this->db->table('bf_marketing_buffer')->where('id', $id)->update($data);
    }
    
    public function updateBufferStatus($id, $status = 'Approved')
    {
        return $this->db->table('bf_marketing_scraper')
            ->where('id', $id)
            ->update(['status' => $status, 'updated_at' => date('Y-m-d H:i:s')]);
    }    

    public function updateCampaignGeneratedMessage($campaignId, $field, $value)
    {
        return $this->db->table('bf_marketing_generated_content')
            ->where('campaign_id', $campaignId)
            ->set($field, $value)
            ->update();
    }
    
    // Update the status of a campaign
    public function updateCampaignStatus($id, $status) {
        return $this->db->table('bf_marketing_newsletters')
                        ->where('id', $id)
                        ->update(['status' => $status]);
    }

    public function updateEmailFields($id, $title, $url, $content = null)
    {
        $data = ['title' => $title, 'url' => $url];
        if (!empty($content)) {
            $data['content'] = $content;
        }
    
        return $this->db->table('bf_marketing_temp_scraper')
            ->where('id', $id)
            ->update($data);
    }
    
    // Update exchange token data
    public function updateExchangeToken($id, $data)
    {
        return $this->update($id, $data);
    }

    public function updateGeneratedPost($id, array $data)
    {
        return $this->db->table('bf_marketing_generated_content')->where('id', $id)->update($data);
    }

    // Update promotional notification data
    public function updateNotification($data)
    {
        return $this->db->table('bf_users_promotional_messages')->update($data);
    }

    public function updateSchedule($id, $data) {
        return $this->db->table('bf_marketing_schedule')->where('id', $id)->update($data);
    }

    public function updateSummary($id, $summary)
    {
        return $this->update($id, ['summary' => $summary]);
    }

    public function updatePostStatus($id, $status)
    {
        return $this->db->table('bf_marketing_schedule')
            ->where('id', $id)
            ->update(['post_status' => $status, 'last_attempt_at' => date('Y-m-d H:i:s')]);
    }

    /**
     * Fetch approved marketing summaries that haven't been posted to Zapier.
     *
     * @return array
     */
    public function getApprovedUnpostedSummaries(): array
    {
        return $this->db->table('bf_marketing_scraper')
            ->where('approved', 1)
            ->where('posted', 0)
            ->orderBy('created_on', 'ASC')
            ->get()
            ->getResultArray();
    }

    /**
     * Mark a marketing record as posted and append the Zapier response to the status log.
     */
    public function markAsPosted(int $id, ?string $response = null): bool
    {
        $message = 'Sent to Zapier';

        if ($response) {
            $message .= ': ' . substr($response, 0, 200);
        }

        return $this->appendStatusLog($id, $message, [
            'posted'    => 1,
            'posted_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function logDistributionIssue(int $id, string $message): bool
    {
        $message = substr($message, 0, 200);

        return $this->appendStatusLog($id, 'Distribution note: ' . $message);
    }

    protected function appendStatusLog(int $id, string $message, array $additionalData = []): bool
    {
        $currentLog = $this->db->table('bf_marketing_scraper')
            ->select('status_log')
            ->where('id', $id)
            ->get()
            ->getRow('status_log');

        $entry = '[' . date('Y-m-d H:i:s') . '] ' . $message;
        $newLog = trim(trim($currentLog ?? '') . "\n" . $entry);

        $data = array_merge($additionalData, [
            'status_log' => $newLog,
        ]);

        return (bool) $this->db->table('bf_marketing_scraper')
            ->where('id', $id)
            ->update($data);
    }

    /*
     * ------------------------------------------------------------------------
     * Platform Library Helpers
     * ------------------------------------------------------------------------
     */

    /**
     * Fetch all active platforms.
     */
    public function getPlatforms(bool $includeInactive = false): array
    {
        $cacheKey = 'marketing:platforms:' . ($includeInactive ? 'all' : 'active');

        return cache()->remember($cacheKey, 300, function () use ($includeInactive) {
            $builder = $this->db->table('bf_marketing_platforms');
            if (! $includeInactive) {
                $builder->where('is_active', 1);
            }
            return $builder->get()->getResultArray();
        });
    }

    /**
     * Fetch a platform by its unique key.
     */
    public function getPlatformByKey(string $key): ?array
    {
        $cacheKey = 'marketing:platform:' . $key;

        return cache()->remember($cacheKey, 300, function () use ($key) {
            return $this->db->table('bf_marketing_platforms')
                ->where(['platform_key' => $key, 'is_active' => 1])
                ->get()
                ->getRowArray();
        });
    }

    /**
     * Create a new platform record.
     */
    public function createPlatform(array $data): int
    {
        $data['is_active'] = $data['is_active'] ?? 1;
        $this->db->table('bf_marketing_platforms')->insert($data);
        cache()->deleteMatching('marketing:platform*');
        return (int) $this->db->insertID();
    }

    /** Update an existing platform record */
    public function updatePlatform(int $id, array $data): bool
    {
        $result = $this->db->table('bf_marketing_platforms')->where('id', $id)->update($data);
        cache()->deleteMatching('marketing:platform*');
        return $result;
    }

    /** Soft delete a platform */
    public function deletePlatform(int $id): bool
    {
        $result = $this->db->table('bf_marketing_platforms')->where('id', $id)->update(['is_active' => 0]);
        cache()->deleteMatching('marketing:platform*');
        return $result;
    }

    /**
     * Retrieve platform rules. When platformId is null, global rules are returned.
     */
    public function getPlatformRules(?int $platformId = null): array
    {
        $cacheKey = 'marketing:rules:' . ($platformId ?? 'global');

        return cache()->remember($cacheKey, 300, function () use ($platformId) {
            $builder = $this->db->table('bf_marketing_platform_rules');
            if ($platformId !== null) {
                $builder->where('platform_id', $platformId);
            } else {
                $builder->where('platform_id', null);
            }
            $builder->where('is_active', 1);
            return $builder->get()->getResultArray();
        });
    }

    /**
     * Insert or update a rule for a platform.
     */
    public function upsertRule(?int $platformId, string $ruleKey, $ruleValue, ?string $description = null): bool
    {
        $data = [
            'platform_id' => $platformId,
            'rule_key'    => $ruleKey,
            'rule_value'  => $ruleValue,
            'description' => $description,
            'is_active'   => 1,
        ];

        $result = $this->db->table('bf_marketing_platform_rules')->replace($data);
        cache()->deleteMatching('marketing:rules:*');
        return $result;
    }

    /** Soft delete a rule */
    public function deleteRule(int $id): bool
    {
        $result = $this->db->table('bf_marketing_platform_rules')->where('id', $id)->update(['is_active' => 0]);
        cache()->deleteMatching('marketing:rules:*');
        return $result;
    }

    /**
     * Search taxonomy records with optional filters and pagination.
     */
    public function searchTaxonomy(array $filters): array
    {
        $builder = $this->db->table('bf_marketing_taxonomy')->where('is_active', 1);

        foreach (['platform_id', 'content_type', 'tag_type'] as $field) {
            if (isset($filters[$field]) && $filters[$field] !== null) {
                $builder->where($field, $filters[$field]);
            }
        }

        if (!empty($filters['search'])) {
            $builder->like('tag', $filters['search']);
        }

        $page    = (int) ($filters['page'] ?? 1);
        $perPage = (int) ($filters['perPage'] ?? 25);
        $offset  = ($page - 1) * $perPage;

        return $builder->orderBy('weight', 'DESC')
            ->limit($perPage, $offset)
            ->get()
            ->getResultArray();
    }

    /** Create taxonomy tag */
    public function createTaxonomy(array $data): int
    {
        $data['is_active'] = $data['is_active'] ?? 1;
        $this->db->table('bf_marketing_taxonomy')->insert($data);
        return (int) $this->db->insertID();
    }

    /** Update taxonomy tag */
    public function updateTaxonomy(int $id, array $data): bool
    {
        return $this->db->table('bf_marketing_taxonomy')->where('id', $id)->update($data);
    }

    /** Soft delete taxonomy tag */
    public function deleteTaxonomy(int $id): bool
    {
        return $this->db->table('bf_marketing_taxonomy')->where('id', $id)->update(['is_active' => 0]);
    }

    /** List suggestions */
    public function listSuggestions(?int $platformId = null, string $contentType = 'both'): array
    {
        $builder = $this->db->table('bf_marketing_suggestions')->where('is_active', 1);

        if ($platformId !== null) {
            $builder->where('platform_id', $platformId);
        }

        if ($contentType !== 'both') {
            $builder->where('content_type', $contentType);
        }

        return $builder->get()->getResultArray();
    }

    /** Create suggestion */
    public function createSuggestion(array $data): int
    {
        $data['is_active'] = $data['is_active'] ?? 1;
        $this->db->table('bf_marketing_suggestions')->insert($data);
        return (int) $this->db->insertID();
    }

    /** Update suggestion */
    public function updateSuggestion(int $id, array $data): bool
    {
        return $this->db->table('bf_marketing_suggestions')->where('id', $id)->update($data);
    }

    /** Soft delete suggestion */
    public function deleteSuggestion(int $id): bool
    {
        return $this->db->table('bf_marketing_suggestions')->where('id', $id)->update(['is_active' => 0]);
    }

    public function getDailyDashboardNews(int $userId, int $limit = 5): array
    {
        $start = date('Y-m-d 00:00:00');
        $end   = date('Y-m-d 23:59:59');

        $rows = $this->db->table('bf_marketing_scraper')
            ->select('id,title,summary,keywords,url,source,symbols,date_scraped,created_on,meta_json')
            ->where('date_scraped >=', $start)
            ->where('date_scraped <=', $end)
            ->orderBy('date_scraped', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();

        return array_map(static function (array $row) {
            $publishedAt = $row['date_scraped'] ?? $row['created_on'] ?? date('Y-m-d H:i:s');
            $title       = $row['title'] ?? '';

            return [
                'id'                 => (int) ($row['id'] ?? 0),
                'title'              => $title,
                'short_title'        => mb_strimwidth($title, 0, 80, '…'),
                'source'             => $row['source'] ?? 'Press Release',
                'symbols'            => $row['symbols'] ?? '',
                'published_at'       => $publishedAt,
                'published_at_human' => function_exists('time_elapsed_string') ? time_elapsed_string($publishedAt) : $publishedAt,
                'url'                => $row['url'] ?? null,
            ];
        }, $rows);
    }

}
?>
