<?php

namespace App\Modules\APIs\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController;
use App\Libraries\{MyMIDiscord, MyMIMarketing};
use App\Services\MarketingService;
use App\Models\MarketingModel;
use App\Support\Http;

#[\AllowDynamicProperties]
class MarketingController extends \App\Controllers\BaseController
{
    use ResponseTrait;

    protected MyMIMarketing $MyMIMarketing;
    protected MarketingService $marketingService;
    protected MarketingModel $marketingModel;

    protected function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);

        $this->MyMIMarketing    = new MyMIMarketing();
        $this->marketingModel   = model(MarketingModel::class);
        $this->marketingService = new MarketingService();
    }

    public function approveBufferItem($id)
    {
        $record = $this->marketingModel->findFinalizedById($id);
        if (!$record) {
            return $this->failNotFound("Content not found.");
        }
    
        $this->marketingModel->updateBufferItem($id, ['status' => 'Approved']);
    
        // Generate platform-specific content
        $posts = $this->MyMIMarketing->generateSocialPost($record);
    
        // Distribute to selected platforms (edit as needed)
        if (!empty($posts['discord'])) {
            $this->MyMIMarketing->distributeContent('discord', $posts['discord']);
        }
        if (!empty($posts['linkedin'])) {
            $this->MyMIMarketing->distributeContent('linkedin', $posts['linkedin']);
        }
    
        return Http::jsonSuccess([
            'status' => 'success',
            'message' => "✅ Content #{$id} approved and published to selected platforms."
        ]);
    }
    
    public function autoScheduleNextApproved()
    {
        $post = $this->marketingModel->getNextScheduledPost(); // Top approved + unscheduled
        if (!$post) {
            return Http::jsonSuccess([
                'status' => 'success',
                'message' => '⏳ No eligible posts found for scheduling.'
            ]);
        }
    
        $nextSlot = $this->getNextAvailableSlot();
        $this->marketingModel->updateBufferItem($post['id'], [
            'scheduled_at' => $nextSlot,
            'status' => 'Scheduled'
        ]);
    
        log_message('info', "🧠 Auto-scheduled #{$post['id']} at {$nextSlot}.");
        return Http::jsonSuccess([
            'status' => 'success',
            'message' => "✅ Auto-scheduled post #{$post['id']} for {$nextSlot}."
        ]);
    }
    
    public function cronAnalyzeContent()
    {
        log_message('debug', '🧠 Starting content digest analysis...');
        $this->getMyMIMarketing()->generateFromTempScraper(5);
        return ['status' => 'success', 'message' => 'Content analysis completed.'];
    }

    public function cronAutoPublishGroupedDigest()
    {
        try {
            log_message('info', '🕗 CRON: Starting daily grouped digest auto-publisher...');
    
            // Assuming you fetched summaries beforehand
            $summaries = $this->marketingModel->getSummariesToGroup();
            $grouped = $this->MyMIMarketing->groupSimilarSummariesByCosine($summaries);
            $labeled = $this->getMyMIMarketing()->generateGroupLabelsFromTFIDF($grouped['grouped'] ?? []);
            $drafts = $this->getMyMIMarketing()->generateGroupedBlogAndEmailDrafts($labeled);
    
            $campaignId = $this->marketingModel->storeGroupedContentDrafts($labeled, $drafts);
    
            // Auto distribute
            $this->getMyMIMarketing()->distributeGroupedContent($campaignId);

            // ✅ Notify Moderators
            $labels = implode(', ', array_keys($labeled));
            $summary = strip_tags(substr($drafts['email'], 0, 300));
            $this->getMyMIMarketing()->notifyModerators([
                'id' => $campaignId,
                'keyword' => 'GroupedDigest',
                'summary' => $summary,
                'platforms' => json_encode([
                    'discord' => true,
                    'linkedin' => true,
                    'email' => true
                ])
            ]);

    
            return Http::jsonSuccess([
                'status' => 'success',
                'message' => "✅ Daily digest campaign #{$campaignId} published.",
                'labels' => $labels
            ]);
        } catch (\Throwable $e) {
            log_message('error', '[CRON] ❌ cronAutoPublishGroupedDigest failed: ' . $e->getMessage());
            return $this->failServerError("CRON failure: ".$e->getMessage());
        }
    }
    
    public function cronEnrichTradeAlerts()
    {
        $this->loadHelpers(['text']);
        $alertsModel = new \App\Models\AlertsModel();
        $library = new \App\Libraries\MyMIAlerts();
    
        $symbols = $alertsModel->getSymbolsToEnrich(); // Only those not enriched recently
    
        log_message('info', '🧠 Starting enrichment on ' . count($symbols) . ' symbols');
    
        foreach ($symbols as $symbol) {
            try {
                $library->enrichTradeAlertsBySymbol($symbol);
            } catch (\Throwable $e) {
                log_message('error', "⚠️ Error enriching {$symbol}: " . $e->getMessage());
            }
        }
    
        return Http::jsonSuccess(['status' => 'success', 'message' => 'Trade alert enrichment CRON complete.']);
    }
    
    public function cronFetchAndGenerateNews()
    {
        try {
            $this->MyMIMarketing->cronFetchAndGenerateNews();
            return ['status' => 'success', 'message' => 'News fetched and generated.'];
        } catch (\Throwable $e) {
            return $this->failServerError($e->getMessage());
        }
    }

    public function cronFetchInbox()
    {
        log_message('debug', '📨 Starting inbox scrape...');
    
        try {
            $this->getMyMIMarketing()->fetchAndStoreEmails('news');
            log_message('info', '✅ Inbox scrape completed.');
        } catch (\Throwable $e) {
            log_message('error', '❌ cronFetchInbox() failed: ' . $e->getMessage());
        }
    }    
    
    public function cronFetchMarketingEmails()
    {
        log_message('info', '📬 CRON: Fetching marketing emails via inbox scrape');
        try {
            $result = $this->getMyMIMarketing()->fetchAndStoreEmails('marketing'); // or 'alerts' depending on CRON purpose
            return [
                'status' => 'success',
                'message' => 'Marketing inbox scrape completed.',
                'result' => $result
            ];
        } catch (\Throwable $e) {
            log_message('error', '❌ cronFetchMarketingEmails() failed: ' . $e->getMessage());
            return $this->failServerError('Inbox fetch failed: ' . $e->getMessage());
        }
    }   

    public function cronProcessSMSMarketingIdeas()
    {
        log_message('debug', '📥 Starting SMS-to-Marketing CRON');
    
        try {
            $marketing = new \App\Libraries\MyMIMarketing();
            $allowedNumbers = config('SiteSettings')->getAllowedSenders();
    
            $rawMessages = $marketing->fetchAndStoreEmails('news@MyMIWallet.com', 10);
            if (!is_array($rawMessages)) {
                log_message('warning', 'fetchAndStoreEmails returned null or invalid type');
                return;
            }
            foreach ($rawMessages as $record) {
                $sender = $record['from'] ?? '';
    
                if (!in_array(preg_replace('/[^0-9]/', '', $sender), $allowedNumbers)) {
                    log_message('info', "🚫 Skipped SMS from unauthorized sender: $sender");
                    continue;
                }
    
                // 🔄 Centralized classification/handling
                $success = $marketing->processInboundMessage($record);
                if (!$success) {
                    log_message('warning', '⚠️ Message failed to process for ID: ' . $record['id']);
                }
            }
    
            log_message('info', '✅ SMS-to-Marketing CRON complete');
            return Http::jsonSuccess(['status' => 'success']);
        } catch (\Throwable $e) {
            log_message('error', '❌ cronProcessSMSMarketingIdeas failed: ' . $e->getMessage());
            return $this->failServerError('Unable to process SMS marketing ideas.');
        }
    }

    /**
     * CRON endpoint to push all approved marketing posts to Zapier.
     */
    public function cronDistributeApprovedContent()
    {
        try {
            $service = new \App\Services\ZapierService();
            $service->sendApprovedPostsToZapier();

            return Http::jsonSuccess(['status' => 'success', 'message' => 'Approved posts sent to Zapier']);
        } catch (\Throwable $e) {
            log_message('error', 'cronDistributeApprovedContent failed: ' . $e->getMessage());
            return $this->failServerError('Distribution failed');
        }
    }
    
    public function deleteScrape($id)
    {
        $deleted = $this->marketingModel->delete($id);
        return Http::jsonSuccess(['success' => (bool)$deleted]);
    }
    
    public function distributeHighScoreContent()
    {
        try {
            $this->getMyMIMarketing()->autoSendToZapier(80);
            return ['status' => 'success', 'message' => 'Top scoring posts sent to Zapier'];
        } catch (\Throwable $e) {
            return $this->failServerError($e->getMessage());
        }
    }
    
    public function downloadVoiceover($filename = null)
    {
        if (!$filename || !preg_match('/^[a-zA-Z0-9_\-\.]+$/', $filename)) {
            return $this->fail('Invalid filename requested.', 400);
        }

        $filePath = WRITEPATH . 'uploads/voiceovers/' . $filename;

        if (!file_exists($filePath)) {
            log_message('error', "🔍 File not found: $filePath");
            return $this->failNotFound('The requested audio file does not exist.');
        }

        return $this->response->download($filePath, null);
    }
    
    public function emailPostForApproval($postId)
    {
        $post = $this->marketingModel->getGeneratedPostById($postId);
        if (!$post) return $this->failNotFound();
    
        $email = \Config\Services::email();
        $email->setTo('editor@mymiwallet.com');
        $email->setSubject('Review & Approve: ' . $post->title);
    
        $body = view('emails/Marketing/ReviewPostEmail', ['post' => $post]);
        $email->setMessage($body);
        $email->send();
    
        return Http::jsonSuccess(['status' => 'email sent']);
    }

    // In app/Modules/APIs/Controllers/ManagementController.php
    public function exportBufferPosts()
    {
        helper('text');
        $bufferPosts = $this->marketingModel->fetchBufferPostsForScoring();
        $filename = 'buffer-posts-' . date('Ymd_His') . '.csv';
    
        $csvHeader = ['ID', 'Title', 'Summary', 'Keywords', 'Status', 'Created At'];
        $csvData = [$csvHeader];
    
        foreach ($bufferPosts as $post) {
            $csvData[] = [
                $post['id'],
                $post['title'],
                word_limiter(strip_tags($post['summary']), 15),
                $post['keywords'],
                $post['status'],
                $post['created_at']
            ];
        }
    
        $handle = fopen('php://output', 'w');
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
    
        foreach ($csvData as $line) {
            fputcsv($handle, $line);
        }
    
        fclose($handle);
        exit;
    }

    public function exportGroupedSummariesCSV()
    {
        $groupedData = $this->groupSimilarSummariesByCosine();
    
        if (!is_array($groupedData) || empty($groupedData['grouped'])) {
            return $this->fail('No grouped summaries available for export.');
        }
    
        helper('text');
        $filename = 'grouped_summaries_' . date('Ymd_His') . '.csv';
    
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename=\"$filename\"");
    
        $output = fopen('php://output', 'w');
        fputcsv($output, ['Group #', 'Title', 'Summary', 'Keywords']);
    
        foreach ($groupedData['grouped'] as $groupIndex => $group) {
            foreach ($group as $summary) {
                fputcsv($output, [
                    $groupIndex + 1,
                    word_limiter(strip_tags($summary['title'] ?? ''), 8),
                    word_limiter(strip_tags($summary['summary'] ?? ''), 20),
                    implode(', ', json_decode($summary['keywords'] ?? '[]', true))
                ]);
            }
        }
    
        fclose($output);
        exit;
    }

    private function fetchAndCleanHtml($url)
    {
        try {
            $context = stream_context_create([
                "http" => ["header" => "User-Agent: Mozilla/5.0"]
            ]);
            $html = file_get_contents($url, false, $context);
            $clean = strip_tags($html);
            return preg_replace('/\s+/', ' ', trim($clean));
        } catch (\Throwable $e) {
            log_message('error', "❌ Failed to fetch {$url}: " . $e->getMessage());
            return null;
        }
    }

    public function fetchBufferPaginated()
    {
        $request = service('request');
        $page = (int) $request->getGet('page') ?? 1;
        $limit = (int) $request->getGet('limit') ?? 20;
        $keyword = $request->getGet('keyword');
        $category = $request->getGet('category');
        $minTagScore = $request->getGet('min_tag_score') ?? 0;
        $onlySuggested = (bool) $request->getGet('only_suggested');
    
        $result = $this->marketingModel->fetchBufferPaginatedWithFilters([
            'page'           => $page,
            'limit'          => $limit,
            'keyword'        => $keyword,
            'category'       => $category,
            'min_tag_score'  => $minTagScore,
            'only_suggested' => $onlySuggested
        ]);
    
        return [
            'status'     => 'success',
            'data'       => $result['data'],
            'pagination' => $result['pagination']
        ];
    }    
    
    public function fetchFinalizedContent()
    {
        $content = $this->getMyMIMarketing()->getFinalizedContent(10);
        return $this->renderTheme('ManagementModule\Views\Marketing\resources\finalizedSummaries', ['finalizedContent' => $content]);
    }
    
    // public function fetchGeneratedSummaries()
    // {
    //     try {
    //         $summaries = $this->marketingModel->getRecentPosts(5); // You can change 5 to a config or param
    //         return $this->renderTheme('App\Modules\Management\Views\Marketing\partials\generatedSummaries', [
    //             'summaries' => $summaries,
    //         ]);
    //     } catch (\Throwable $e) {
    //         log_message('error', '❌ fetchGeneratedSummaries Error: ' . $e->getMessage());
    //         return $this->failServerError($e->getMessage());
    //     }
    // }    
    
    public function fetchFinalizedSummariesBlock()
    {
        $finalizedContent = $this->marketingModel->getFinalizedMarketingContent();
        return $this->renderTheme('ManagementModule\Views\Marketing\resources\finalizedSummaries', ['finalizedContent' => $finalizedContent]);
    }

    public function fetchGeneratedSummaries()
    {
        try {
            $summaries = $this->marketingModel->getRecentPosts(5);
            return Http::jsonSuccess(['summaries' => $summaries]);
        } catch (\Throwable $e) {
            log_message('error', '❌ fetchGeneratedSummaries Error: ' . $e->getMessage());
            return Http::jsonError('Failed to load summaries.', 500, ['error' => $e->getMessage()]);
        }
    }
    
    public function fetchGeneratedSummariesBlock()
    {
        try {
            helper('text');
            $siteSettings = config('SiteSettings');

            $viewFileData = [
                'finalizedContent' => $this->marketingModel->getFinalizedMarketingContent(), // if needed
                'todaysStory'      => $this->marketingModel->getTodaysStory(),               // if needed
                'recentMarketingPosts' => $this->marketingModel->getRecentPosts(),           // optional
                'newsUpdates'      => $this->marketingModel->getNewsUpdates(),               // optional
                'getBlogPosts'     => $this->marketingModel->getBlogPosts(),                 // optional
                // Add others if necessary
            ];

            return $this->renderTheme('ManagementModule\Views\Marketing\resources\generatedSummaries', $viewFileData);
        } catch (\Throwable $e) {
            log_message('error', 'fetchGeneratedSummariesBlock failed: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setBody("Error loading block");
        }
    }

    public function fetchGeneratedSummariesJson()
    {
        try {
            $todaysStory = $this->marketingModel->getLatestGeneratedSummaries(20);
    
            if (empty($todaysStory)) {
                return Http::jsonError('No summaries available.', 404);
            }
    
            $summaries = array_map(function($summary) {
                return [
                    'id' => $summary->id,
                    'title' => $summary->title,
                    'summary' => $summary->summary,
                    'keywords' => $summary->keywords,
                    'cta' => $summary->cta ?? null,
                    'created_at' => $summary->created_on,
                ];
            }, $todaysStory);
    
            return Http::jsonSuccess([
                'status' => 'success',
                'summaries' => $summaries,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'fetchGeneratedSummariesJson() failed: '.$e->getMessage());
            return Http::jsonSuccess([
                'status' => 'error',
                'message' => 'Server Error: Unable to fetch summaries.',
            ], 500);
        }
    }    
    
    public function forceGenerateFromTemp($tempId)
    {
        $record = $this->marketingModel->getTempRecordById($tempId);
        $summary = $this->MyMIMarketing->processInboundMessage($record['content']);
        $this->marketingModel->insertFinalScraper($record, $summary, true); // true = force
        return Http::jsonSuccess(['message' => 'Force-generated and inserted.']);
    }
    
    public function generateAdvisorMediaOnDemand($userId = null)
    {
        helper('filesystem');

        $userId = $userId ?? $this->request->getPost('user_id');
        if (!$userId) {
            return $this->fail('Missing user ID.');
        }

        $media = $this->getMyMIAdvisor()->generateAdvisorMediaPackage($userId);

        return Http::jsonSuccess([
            'status' => 'success',
            'media' => $media,
        ]);
    }

    public function generateCampaignContent()
    {
        helper(['text', 'security']);
    
        $campaignId = $this->request->getPost('campaign_id');
        $type = $this->request->getPost('type');
    
        if (!$campaignId) {
            return $this->fail('Missing campaign ID', 400);
        }

        $campaign = null; // define default

        if ($type === 'Campaign') {
            $dripCampaign = $this->marketingModel->getDripCampaignById($campaignId);
            log_message('info', 'L444 - $dripCampaign: ' . print_r($dripCampaign, true));
            $campaign = $dripCampaign['result'][0] ?? null;
        
        } elseif ($type === 'Step') {
            $dripCampaignStep = $this->marketingModel->getDripCampaignStepsById($campaignId);
            log_message('info', 'L446 - $dripCampaignStep: ' . print_r($dripCampaignStep, true));
            $stepInfo = $dripCampaignStep['result'][0] ?? null;
            $campaign = $stepInfo;
            if ($campaign) {
                $dripCampaign = $this->marketingModel->getDripCampaignById($campaign['campaign_id'] ?? null);
                log_message('info', 'L449 - $dripCampaign: ' . print_r($dripCampaign, true));
            }
        }
    
        if (!$campaign) {
            log_message('error', "❌ Campaign not found for ID: {$campaignId}");
            return $this->failNotFound('Campaign not found.');
        }
    
        // Step 1: Fetch the last generated content for this campaign
        $lastContent = $this->marketingModel->getLatestGeneratedByCampaignId($campaignId);
    
        // Step 2: Check if raw summary would duplicate the last summary
        $fieldsToConcat = ['name', 'description', 'audience_tags', 'priority', 'trigger_event'];
        $rawContent = '';
    
        foreach ($fieldsToConcat as $field) {
            if (!empty($campaign[$field])) {
                $rawContent .= strip_tags($campaign[$field] ?? '') . ' ';;
            }
        }
    
        $rawContent = trim($rawContent);
        log_message('debug', '🧪 Raw input: ' . $rawContent);
    
        if (strlen($rawContent) < 16) {
            log_message('error', '🚫 [generateCampaignContent] Not enough data to create marketing content. Please ensure name, description, tags, or trigger event are filled.');
            return [];
        }
        
    
        // Step 3: Generate NEW content, with previous context injected
        $generated = $this->MyMIMarketing->generateCampaignContent($campaign, $lastContent);
    
        if (empty($generated)) {
            return $this->fail('⚠️ No content was generated.', 500);
        }
        if (!isset($campaign['name'])) {
            log_message('error', '❌ $campaign[name] is undefined. Dump: ' . print_r($campaign, true));
        }

        // Step 4: Save it
        $insertData = [
            'campaign_id' => $campaignId,
            'title' => $campaign['name'],
            'description' => $campaign['description'],
            'platform'   => 'multi',
            'voice_script' => $generated['voice_script'],
            'facebook_message' => $generated['facebook_message'],
            'linkedin_message' => $generated['linkedin_message'],
            'discord_message' => $generated['discord_message'],
            'stocktwits_message' => $generated['stocktwits_message'],
            'tiktok_message' => $generated['tiktok_message'],
            'youtube_message' => $generated['youtube_message'],
            'email_message' => $generated['email_message'],
            'hashtags' => $generated['hashtags'],
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    
        $saved = $this->marketingModel->insertGeneratedContent($insertData);
    
        if (!$saved) {
            log_message('error', '❌ Failed to save campaign content.');
            return $this->fail('Failed to save campaign content.', 500);
        }
    
        return Http::jsonSuccess([
            'status' => 'success',
            'message' => 'Campaign content generated successfully.',
            'generated_content' => $generated,
            'csrfHash' => csrf_hash()
        ]);
    }

    public function generateDailyMarketCampaign()
    {
        $symbolsParam = $this->request->getVar('symbols');
        $cryptoParam = $this->request->getVar('crypto');
        $economicParam = $this->request->getVar('economic');
        $campaignName = $this->request->getVar('campaign_name');

        $symbols = [];
        if (!empty($symbolsParam)) {
            $symbols = array_values(array_filter(array_map('trim', explode(',', $symbolsParam))));
        }

        $crypto = [];
        if (!empty($cryptoParam)) {
            $crypto = array_values(array_filter(array_map('trim', explode(',', $cryptoParam))));
        }

        $economicSeries = [];
        if (!empty($economicParam)) {
            $entries = array_filter(array_map('trim', explode(',', $economicParam)));
            foreach ($entries as $entry) {
                if (strpos($entry, ':') !== false) {
                    [$seriesId, $label] = array_map('trim', explode(':', $entry, 2));
                    if ($seriesId !== '') {
                        $economicSeries[$seriesId] = $label !== '' ? $label : $seriesId;
                    }
                } elseif ($entry !== '') {
                    $economicSeries[$entry] = $entry;
                }
            }
        }

        $options = [];
        if (!empty($symbols)) {
            $options['symbols'] = $symbols;
        }
        if (!empty($crypto)) {
            $options['crypto'] = $crypto;
        }
        if (!empty($economicSeries)) {
            $options['economic'] = $economicSeries;
        }
        if (!empty($campaignName)) {
            $options['campaign_name'] = $campaignName;
        }

        try {
            $result = $this->marketingService->generateDailyMarketCampaign($options);
        } catch (\Throwable $e) {
            log_message('error', 'generateDailyMarketCampaign() failed: ' . $e->getMessage());
            return $this->failServerError('Unable to generate the daily market campaign at this time.');
        }

        if (empty($result) || empty($result['sub_campaigns'])) {
            return $this->fail('Campaign generation did not return any content.', 500);
        }

        return Http::jsonSuccess([
            'status'             => 'success',
            'campaign'           => $result['campaign'] ?? [],
            'sub_campaigns'      => $result['sub_campaigns'] ?? [],
            'saved_nodes'        => $result['saved_nodes'] ?? [],
            'dashboard_requirements' => $result['campaign']['dashboard_requirements'] ?? [],
            'raw_data'           => $result['data'] ?? [],
            'csrfHash'           => csrf_hash(),
        ]);
    }
    
    public function generateCampaignStepContent()
    {
        helper(['text', 'security']);
    
        $stepId = $this->request->getPost('campaign_id');
    
        if (!$stepId) {
            return $this->fail('Missing step ID', 400);
        }
    
        // Fetch the step data
        $dripStep = $this->marketingModel->getDripCampaignStepsById($stepId);
        $step = $dripStep['result'][0] ?? null;
    
        if (!$step) {
            log_message('error', "❌ Step not found for ID: {$stepId}");
            return $this->failNotFound('Drip campaign step not found.');
        }
    
        // Step 1: Fetch last content for this step (if needed in future)
        $lastContent = $this->marketingModel->getLastGeneratedStepContentByStepId($stepId);
    
        // Step 2: Prepare raw content
        $fieldsToConcat = ['name', 'subject', 'view_file'];
        $rawContent = '';
    
        foreach ($fieldsToConcat as $field) {
            if (!empty($step[$field])) {
                $rawContent .= strip_tags($step[$field]) . ' ';
            }
        }
    
        $rawContent = trim($rawContent);
        log_message('debug', '🧪 Step Raw input: ' . $rawContent);
    
        if (strlen($rawContent) < 50) {
            return $this->fail('Insufficient content to summarize.', 400);
        }
    
        // Step 3: Generate new content
        $generated = $this->MyMIMarketing->generateCampaignStepContent($step, $lastContent);
    
        if (empty($generated)) {
            return $this->fail('⚠️ No content was generated.', 500);
        }
    
        // Step 4: Save it
        $insertData = [
            'step_id' => $stepId,
            'campaign_id' => $step['campaign_id'],
            'title' => $step['name'],
            'description' => $step['subject'],
            'platform'   => 'multi',
            'voice_script' => $generated['voice_script'],
            'facebook_message' => $generated['facebook_message'],
            'linkedin_message' => $generated['linkedin_message'],
            'discord_message' => $generated['discord_message'],
            'stocktwits_message' => $generated['stocktwits_message'],
            'tiktok_message' => $generated['tiktok_message'],
            'youtube_message' => $generated['youtube_message'],
            'email_message' => $generated['email_message'],
            'hashtags' => $generated['hashtags'],
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    
        $saved = $this->marketingModel->insertGeneratedStepContent($insertData);
    
        if (!$saved) {
            log_message('error', '❌ Failed to save campaign step content.');
            return $this->fail('Failed to save campaign step content.', 500);
        }
    
        return Http::jsonSuccess([
            'status' => 'success',
            'message' => 'Step content generated successfully.',
            'generated_content' => $generated,
            'csrfHash' => csrf_hash()
        ]);
    }
    
    public function generateContentFromScraper()
    {
        $records = $this->marketingModel->getValidUnprocessedEmails(5);
        foreach ($records as $record) {
            try {
                $summary = $this->MyMIMarketing->generateContentFromRaw($record);
                if ($summary) {
                    $this->marketingModel->insertFinalScraper($record, $summary);
                }
            } catch (\Throwable $e) {
                log_message('error', 'generateContentFromScraper(): Error processing record ID ' . ($record['id'] ?? 'unknown') . ' — ' . $e->getMessage());
            }
        }
    }
        
    public function generateContentDigestFromStored()
    {
        $records = $this->marketingModel->getRecentUnprocessedTempEmails(5);
        $processedTitles = [];
    
        foreach ($records as $record) {
            $recordId = $record['id'] ?? 0;
            try {
                if (empty($record['title'])) {
                    $record['title'] = $this->MyMIMarketing->generateHeadline($record['content']);
                }
    
                $insertResult = $this->getMyMIMarketing()->generateContentAndInsert($record);
                if ($insertResult) {
                    $this->marketingModel->markTempScraperProcessed($recordId);
                    $processedTitles[] = $insertResult['title'];
                    log_message('info', "✅ Inserted content for ID {$recordId}");
                } else {
                    log_message('warning', "⚠️ Skipped record ID {$recordId} — summary not stored");
                }
            } catch (\Throwable $e) {
                log_message('error', "❌ Exception on record ID {$recordId}: {$e->getMessage()}");
            }
        }
    
        return Http::jsonSuccess(['status' => 'complete', 'processed_titles' => $processedTitles]);
    }
    
    public function generateDailyContentDigest()
    {
        @ini_set('memory_limit', '768M');
    
        $records = $this->marketingModel->getValidUnprocessedEmails(10);
        $processed = [];
    
        foreach ($records as $record) {
            $recordId = $record['id'] ?? null;
            $content = $record['content'] ?? '';
    
            if (!$recordId || !is_array($record)) {
                log_message('error', '❌ generateDailyContentDigest - Invalid record: ' . print_r($record, true));
                continue;
            }
    
            if (empty($content) || strlen(strip_tags($content)) < 500 || strlen($content) > 150000) {
                log_message('debug', "⏭️ Skipping record ID {$recordId} — content length invalid or bloated. Size: " . strlen($content));
                continue;
            }
    
            try {
                log_message('debug', "🔍 Processing record ID {$recordId} | Size: " . strlen($content));
                log_message('debug', '💾 Memory Before Summary: ' . memory_get_usage(true));
    
                $result = $this->getMyMIMarketing()->generateContentFromRaw($record);
    
                if (!$result || empty($result['summary']) || !is_string($result['summary'])) {
                    log_message('warning', "⚠️ No usable summary generated for ID {$recordId}.");
                    $this->MyMIMarketing->logContentError($recordId, 'generateContentFromRaw() returned null or invalid summary');
                    continue;
                }
    
                // Ensure clean keywords
                if (empty($result['keywords']) || !is_array($result['keywords'])) {
                    log_message('info', "🔁 Re-extracting keywords for ID {$recordId} from raw content.");
                    $result['keywords'] = $this->getMyMIMarketing()->extractKeywords($content);
                }
    
                $inserted = $this->marketingModel->insertFinalScraper($record, [
                    'summary'   => $result['summary'],
                    'keywords'  => $result['keywords'] ?? [],
                    'posts'     => $result['posts'] ?? [],
                    'category'  => $result['category'] ?? 'News',
                ]);
    
                if ($inserted) {
                    $this->marketingModel->markTempScraperProcessed($recordId);
                    $processed[] = $result['headline'] ?? '(untitled)';
                    log_message('info', "✅ Inserted final summary for ID {$recordId}");
                } else {
                    log_message('warning', "⚠️ Duplicate or failed insert for ID {$recordId}");
                }
            } catch (\Throwable $e) {
                log_message('error', "❌ Digest Exception on ID {$recordId}: " . $e->getMessage());
            }
        }
    
        if (empty($processed)) {
            return Http::jsonSuccess(['status' => 'warning', 'message' => 'No summaries were inserted.'], 200);
        }

        $topStories = $this->marketingModel->getTopStories(5);
        $items = [];
        foreach (array_slice($topStories ?? [], 0, 5) as $story) {
            $headline = trim($story['title'] ?? '');
            if ($headline === '') {
                continue;
            }
            $url = $story['source_url'] ?? $story['link'] ?? '#';
            $items[] = [
                'headline' => $headline,
                'url'      => $url,
            ];
        }

        if (!empty($items)) {
            try {
                (new MyMIDiscord())->dispatch('news.daily_digest', ['items' => $items]);
            } catch (\Throwable $e) {
                log_message('error', '❌ Discord daily digest dispatch failed: ' . $e->getMessage());
            }
        }
    
        return Http::jsonSuccess(['status' => 'success', 'inserted' => $processed], 200);
    }
    
    public function generateFromSimilar($tempId)
    {
        $record = $this->marketingModel->getTempRecordById($tempId);
        if (!$record || empty($record['content'])) {
            return $this->fail('No valid content found.');
        }
    
        // Run deduplication logic
        $existing = $this->marketingModel->findSimilarSummary($record['content']);
        $isDuplicate = $existing && $this->MyMIMarketing->isDuplicate($record, $existing);
    
        if ($isDuplicate) {
            return $this->fail('Content is too similar to an existing summary.');
        }
    
        // Generate new summary
        $summary = $this->MyMIMarketing->processInboundMessage($record['content']);
        $this->marketingModel->insertFinalScraper($record, $summary);
    
        return Http::jsonSuccess(['message' => 'Content generated.']);
    }
    
    public function generateLivePreview()
    {
        $data = $this->request->getJSON(true);
        $summary = $data['summary'] ?? '';
        $keywords = array_map('trim', explode(',', $data['keywords'] ?? ''));
    
        if (strlen($summary) < 50) {
            return $this->fail('Summary too short to generate previews.');
        }
    
        try {
            $posts = $this->getMyMIMarketing()->generatePlatformContent($summary, $keywords);
            return Http::jsonSuccess(['status' => 'success', 'posts' => $posts]);
        } catch (\Throwable $e) {
            log_message('error', 'generateLivePreview() error: '.$e->getMessage());
            return $this->failServerError('Failed to generate preview.');
        }
    }
    
    public function generatePostsFromSummary($summaryId = null)
    {
        try {
            $summary = $this->marketingModel->find($summaryId);
            if (!$summary) {
                return $this->failNotFound('Summary not found.');
            }
    
            // ✅ Decode raw content
            $decodedTitleRaw    = $summary['title'] ?? '';
            $decodedSummaryRaw  = $summary['summary'] ?? '';
    
            // ✅ Apply decoding and cleaning
            $decodedTitle       = $this->getMyMIMarketing()->decodeMimeHeaderSafe($decodedTitleRaw);
            $decodedSummary     = quoted_printable_decode($decodedSummaryRaw);
            $cleanedSummary     = html_entity_decode(strip_tags($decodedSummary));
    
            // ✅ Extract keywords & compose post
            $keywords = $this->MyMIMarketing->extractKeywords($cleanedSummary);
            $post     = $this->MyMIMarketing->composePost('twitter', 'marketing', $cleanedSummary, [], $keywords);
            $posts    = ['twitter' => $post];

            // ✅ Save posts back to DB
            $this->marketingModel->update($summaryId, [
                'keywords' => json_encode($keywords),
                'posts'    => json_encode($posts),
            ]);
    
            // ✅ Queue Discord broadcast for approved marketing content
            try {
                (new MyMIDiscord())->dispatch('marketing.post.ready', [
                    'title'   => $decodedTitle ?: ($summary['title'] ?? 'New Content'),
                    'excerpt' => mb_strimwidth($cleanedSummary, 0, 180, '…'),
                    'url'     => $summary['permalink'] ?? $summary['source_url'] ?? $summary['url'] ?? '',
                ]);
            } catch (\Throwable $e) {
                log_message('error', '❌ Discord marketing.post.ready dispatch failed: ' . $e->getMessage());
            }
    
            // ✅ Return both raw and cleaned for comparison/debugging
            return Http::jsonSuccess([
                'status'   => 'success',
                'message'  => 'Content generated and stored successfully.',
                'original' => $summary,
                'cleaned'  => [
                    'title'    => $decodedTitle,
                    'summary'  => $cleanedSummary,
                    'keywords' => $keywords,
                    'posts'    => $posts,
                ],
            ]);
        } catch (\Throwable $e) {
            log_message('error', '❌ generatePostsFromSummary() failed: ' . $e->getMessage());
            return $this->failServerError('Error generating posts.');
        }
    }

    /*
     * ------------------------------------------------------------------
     * Marketing Platform Library Endpoints
     * ------------------------------------------------------------------
     */

    private function logApiError(string $action, string $message, array $context = []): void
    {
        try {
            \Config\Database::connect()->table('bf_error_logs')->insert([
                'action'     => $action,
                'message'    => $message,
                'context'    => json_encode($context),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'Failed to log API error: ' . $e->getMessage());
        }
    }

    public function getPlatforms()
    {
        try {
            return Http::jsonSuccess($this->marketingModel->getPlatforms());
        } catch (\Throwable $e) {
            $this->logApiError('getPlatforms', $e->getMessage());
            return $this->failServerError('Unable to fetch platforms');
        }
    }

    public function savePlatform()
    {
        $data = $this->request->getJSON(true) ?? $this->request->getPost();

        if (empty($data['name']) || empty($data['platform_key'])) {
            return $this->failValidationErrors('Missing platform data');
        }

        try {
            if (!empty($data['id'])) {
                $this->marketingModel->updatePlatform((int) $data['id'], $data);
                $id = (int) $data['id'];
            } else {
                $id = $this->marketingModel->createPlatform($data);
            }

            return Http::jsonSuccess(['id' => $id]);
        } catch (\Throwable $e) {
            $this->logApiError('savePlatform', $e->getMessage(), $data);
            return $this->failServerError('Unable to save platform');
        }
    }

    public function deletePlatform(int $id)
    {
        try {
            $this->marketingModel->deletePlatform($id);
            return $this->respondDeleted(['id' => $id]);
        } catch (\Throwable $e) {
            $this->logApiError('deletePlatform', $e->getMessage(), ['id' => $id]);
            return $this->failServerError('Unable to delete platform');
        }
    }

    public function getPlatformRules(string $platformKey)
    {
        try {
            $platformId = null;
            if ($platformKey !== 'all') {
                $platform = $this->marketingModel->getPlatformByKey($platformKey);
                $platformId = $platform['id'] ?? null;
            }
            return Http::jsonSuccess($this->marketingModel->getPlatformRules($platformId));
        } catch (\Throwable $e) {
            $this->logApiError('getPlatformRules', $e->getMessage(), ['platformKey' => $platformKey]);
            return $this->failServerError('Unable to fetch rules');
        }
    }

    public function upsertPlatformRule()
    {
        $data = $this->request->getJSON(true) ?? $this->request->getPost();

        if (empty($data['rule_key']) || !isset($data['rule_value'])) {
            return $this->failValidationErrors('Missing rule data');
        }

        try {
            $platformId = null;
            if (!empty($data['platform_key'])) {
                $platform = $this->marketingModel->getPlatformByKey($data['platform_key']);
                $platformId = $platform['id'] ?? null;
            }

            $this->marketingModel->upsertRule($platformId, $data['rule_key'], $data['rule_value'], $data['description'] ?? null);
            return Http::jsonSuccess(['status' => 'ok']);
        } catch (\Throwable $e) {
            $this->logApiError('upsertPlatformRule', $e->getMessage(), $data);
            return $this->failServerError('Unable to save rule');
        }
    }

    public function deletePlatformRule(int $id)
    {
        try {
            $this->marketingModel->deleteRule($id);
            return $this->respondDeleted(['id' => $id]);
        } catch (\Throwable $e) {
            $this->logApiError('deletePlatformRule', $e->getMessage(), ['id' => $id]);
            return $this->failServerError('Unable to delete rule');
        }
    }

    public function searchTaxonomy()
    {
        $filters = $this->request->getJSON(true) ?? $this->request->getPost();
        try {
            $results = $this->marketingModel->searchTaxonomy($filters);
            return Http::jsonSuccess($results);
        } catch (\Throwable $e) {
            $this->logApiError('searchTaxonomy', $e->getMessage(), $filters ?? []);
            return $this->failServerError('Unable to search taxonomy');
        }
    }

    public function saveTaxonomy()
    {
        $data = $this->request->getJSON(true) ?? $this->request->getPost();

        if (empty($data['tag']) || empty($data['tag_type'])) {
            return $this->failValidationErrors('Missing taxonomy data');
        }

        try {
            if (!empty($data['id'])) {
                $this->marketingModel->updateTaxonomy((int) $data['id'], $data);
                $id = (int) $data['id'];
            } else {
                $id = $this->marketingModel->createTaxonomy($data);
            }
            return Http::jsonSuccess(['id' => $id]);
        } catch (\Throwable $e) {
            $this->logApiError('saveTaxonomy', $e->getMessage(), $data);
            return $this->failServerError('Unable to save taxonomy');
        }
    }

    public function deleteTaxonomy(int $id)
    {
        try {
            $this->marketingModel->deleteTaxonomy($id);
            return $this->respondDeleted(['id' => $id]);
        } catch (\Throwable $e) {
            $this->logApiError('deleteTaxonomy', $e->getMessage(), ['id' => $id]);
            return $this->failServerError('Unable to delete taxonomy');
        }
    }

    public function listSuggestions(string $platformKey, string $contentType)
    {
        try {
            $platformId = null;
            if ($platformKey !== 'all') {
                $platform = $this->marketingModel->getPlatformByKey($platformKey);
                $platformId = $platform['id'] ?? null;
            }
            return Http::jsonSuccess($this->marketingModel->listSuggestions($platformId, $contentType));
        } catch (\Throwable $e) {
            $this->logApiError('listSuggestions', $e->getMessage(), ['platformKey' => $platformKey]);
            return $this->failServerError('Unable to fetch suggestions');
        }
    }

    public function saveSuggestion()
    {
        $data = $this->request->getJSON(true) ?? $this->request->getPost();

        if (empty($data['text'])) {
            return $this->failValidationErrors('Missing suggestion');
        }

        try {
            if (!empty($data['id'])) {
                $this->marketingModel->updateSuggestion((int) $data['id'], $data);
                $id = (int) $data['id'];
            } else {
                $id = $this->marketingModel->createSuggestion($data);
            }
            return Http::jsonSuccess(['id' => $id]);
        } catch (\Throwable $e) {
            $this->logApiError('saveSuggestion', $e->getMessage(), $data);
            return $this->failServerError('Unable to save suggestion');
        }
    }

    public function deleteSuggestion(int $id)
    {
        try {
            $this->marketingModel->deleteSuggestion($id);
            return $this->respondDeleted(['id' => $id]);
        } catch (\Throwable $e) {
            $this->logApiError('deleteSuggestion', $e->getMessage(), ['id' => $id]);
            return $this->failServerError('Unable to delete suggestion');
        }
    }

    public function getPostingPlan()
    {
        $data = $this->request->getJSON(true) ?? $this->request->getPost();

        try {
            $plan = $this->MyMIMarketing->getPostingPlan(
                $data['platformKey'] ?? 'twitter',
                $data['contentType'] ?? 'marketing',
                $data['tickers'] ?? [],
                $data['keywords'] ?? []
            );
            return Http::jsonSuccess($plan);
        } catch (\Throwable $e) {
            $this->logApiError('getPostingPlan', $e->getMessage(), $data ?? []);
            return $this->failServerError('Unable to build posting plan');
        }
    }

    public function composePost()
    {
        $data = $this->request->getJSON(true) ?? $this->request->getPost();

        if (empty($data['baseCopy'])) {
            return $this->failValidationErrors('Missing base copy');
        }

        try {
            $result = $this->MyMIMarketing->composePost(
                $data['platformKey'] ?? 'twitter',
                $data['contentType'] ?? 'marketing',
                $data['baseCopy'],
                $data['tickers'] ?? [],
                $data['keywords'] ?? []
            );
            return Http::jsonSuccess($result);
        } catch (\Throwable $e) {
            $this->logApiError('composePost', $e->getMessage(), $data ?? []);
            return $this->failServerError('Unable to compose post');
        }
    }
    
    public function generatePostMediaContent()
    {
        helper(['text', 'security']);
    
        $postId = $this->request->getPost('post_id');
        $type = $this->request->getPost('type') ?? 'Post';
        $csrfHash = csrf_hash();
    
        if (!$postId) {
            return $this->fail('Missing post ID', 400);
        }
    
        try {
            $post = $this->marketingModel->findFinalizedById($postId);
            if (!$post) {
                return $this->failNotFound('Post not found.');
            }
    
            // 🧼 Sanitize and clean summary before generation
            $post['summary'] = $this->MyMIMarketing->decodeMimeHeaderSafe($post['summary'] ?? '');
            $post['summary'] = preg_replace('/=\?UTF-8\?Q\?.*?\?=/i', '', $post['summary']); // strip MIME header junk
            $post['summary'] = preg_replace('/\b[a-f0-9]{8,}\??\b/i', '', $post['summary']); // strip hex junk
            $post['summary'] = $this->MyMIMarketing->sanitizeSummary($post['summary']);
    
            $post['content'] = $this->MyMIMarketing->sanitizeSummary($post['content'] ?? '');
    
            // Validate there's meaningful data to work with
            $rawContent = trim(strip_tags(($post['summary'] ?? '') . ' ' . ($post['content'] ?? '')));
            if (strlen($rawContent) < 16) {
                log_message('error', '🚫 Not enough data to generate post media content for ID ' . $postId);
                return $this->fail('Not enough data to generate post media content.', 400);
            }
    
            // 🧠 Generate content block
            $generated = $this->MyMIMarketing->generateContentFromSummary($post);
    
            if (empty($generated)) {
                log_message('error', '❌ generateContentFromSummary returned empty array. Post ID: ' . $postId . ' | Raw: ' . print_r($post, true));
                return $this->fail('⚠️ No content was generated.', 500);
            }
    
            // 💾 Store content
            $insertData = [
                'campaign_id' => $postId,
                'title'       => $post['title'] ?? 'Generated Post',
                'description' => $post['summary'] ?? '',
                'platform'    => 'multi',
                'voice_script'        => $generated['voice_script'] ?? '',
                'facebook_message'    => $generated['facebook_message'] ?? '',
                'linkedin_message'    => $generated['linkedin_message'] ?? '',
                'discord_message'     => $generated['discord_message'] ?? '',
                'stocktwits_message'  => $generated['stocktwits_message'] ?? '',
                'tiktok_message'      => $generated['tiktok_message'] ?? '',
                'youtube_message'     => $generated['youtube_message'] ?? '',
                'email_message'       => $generated['email_message'] ?? '',
                'hashtags'            => $generated['hashtags'] ?? '',
                'status'              => 'pending',
                'created_at'          => date('Y-m-d H:i:s'),
                'updated_at'          => date('Y-m-d H:i:s'),
            ];
    
            $saved = $this->marketingModel->insertGeneratedContent($insertData);
            if (!$saved) {
                log_message('error', '❌ Failed to save post media content for post ID ' . $postId);
                return $this->fail('Failed to save post media content.', 500);
            }
    
            return Http::jsonSuccess([
                'status' => 'success',
                'message' => '✅ Post media content generated successfully.',
                'generated_content' => $generated,
                'csrfHash' => $csrfHash
            ]);
        } catch (\Throwable $e) {
            log_message('error', '❌ generatePostMediaContent() exception: ' . $e->getMessage());
            return $this->failServerError('Internal error generating post media content.');
        }
    }
    
    public function getGeneratedPostsPaginated()
    {
        $page = (int) $this->request->getGet('page') ?: 1;
        $limit = (int) $this->request->getGet('limit') ?: 20;
    
        $results = $this->marketingModel->getPaginatedGeneratedPosts($page, $limit);
        return Http::jsonSuccess($results);
    }

    public function generateScheduledPosts()
    {
        helper('text');
        $marketingModel = new MarketingModel();
        $marketing = new MyMIMarketing();
    
        // Get 3 highest-scoring posts not promoted yet
        $buffer = $marketingModel->getTopBufferPosts(3, 6.5);
    
        if (empty($buffer)) {
            return Http::jsonSuccess(['status' => 'empty', 'message' => 'No queued posts available.']);
        }
    
        foreach ($buffer as $post) {
            $marketingModel->updateBufferItem($post['id'], ['status' => 'promoted']);
            $generated = $marketing->generateSocialPost($post);
    
            if (json_decode($post['platforms'])->discord ?? false) {
                $marketing->distributeContent('discord', $generated['discord']);
            }
    
            if (json_decode($post['platforms'])->linkedin ?? false) {
                $marketing->distributeContent('linkedin', $generated['linkedin']);
            }
    
            $marketing->notifyModerators($post); // ✅ Notifications
        }
    
        return Http::jsonSuccess(['status' => 'success', 'message' => 'Posts published!']);
    }
 
    public function generateSummaryFromGoogleSearch($title, $url = '', $sourceId = null)
    {
        try {
            $query = urlencode($title);
            $googleSearchURL = "https://www.google.com/search?q={$query}";

            // � Scrape the first few links from Google results (via curl)
            $html = file_get_contents($googleSearchURL);
            preg_match_all('/<a href="\/url\?q=(https:\/\/[^&]+)&amp;/', $html, $matches);
            $urls = array_unique($matches[1] ?? []);

            if (empty($urls)) {
                log_message('warning', "❌ No links found for title: {$title}");
                return null;
            }

            $combinedContent = '';

            foreach (array_slice($urls, 0, 5) as $link) {
                $text = $this->fetchAndCleanHtml($link);
                if (!empty($text)) {
                    $combinedContent .= "\n" . $text;
                    if ($this->marketingModel) {
                        $this->marketingModel->insertTempScrape([
                            'source_id' => $sourceId,
                            'title'     => $title,
                            'url'       => $link,
                            'content'   => $text,
                            'summary'   => null,
                        ]);
                    }
                }
            }

            return $this->summarizeContent($combinedContent);

        } catch (\Throwable $e) {
            log_message('error', "❌ Google fallback summary failed: " . $e->getMessage());
            return null;
        }
    }

    public function generateThreadFromSummary($id)
    {
        $post = $this->marketingModel->findFinalizedById($id);
    
        if (!$post || empty($post['summary'])) {
            return $this->failNotFound('Post not found or invalid.');
        }
    
        $summary = strip_tags($post['summary']);
        $sentences = $this->getMyMIMarketing()->splitIntoSentences($summary);
        
        $thread = [];
        $chunk = '';
        foreach ($sentences as $sentence) {
            if (strlen($chunk . ' ' . $sentence) < 250) {
                $chunk .= ' ' . $sentence;
            } else {
                $thread[] = trim($chunk);
                $chunk = $sentence;
            }
        }
        if (!empty($chunk)) {
            $thread[] = trim($chunk);
        }
    
        return Http::jsonSuccess([
            'status' => 'success',
            'thread' => $thread,
            'title' => $post['title'] ?? 'Untitled',
        ]);
    }
    
    public function generateVoiceScriptManually()
    {
        try {
            log_message('info', '🎤 generateVoiceScriptManually() triggered.');

            $marketing = $this->getMyMIMarketing();
            $scriptData = $marketing->generateVoiceoverScript();

            if ($scriptData['status'] !== 'success') {
                throw new \Exception('Voice script generation failed.');
            }

            // Use the first alert title or fallback
            $alerts = $this->getMyMIMarketing()->alertsModel->getFilteredTradeAlerts([
                'start' => date('Y-m-d 00:00:00'),
                'end' => date('Y-m-d 23:59:59')
            ])->get()->getResultArray();

            $filename = !empty($alerts[0]['ticker']) ? $alerts[0]['ticker'] : 'voiceover';

            $downloadUrl = $marketing->generateVoiceoverAudio($scriptData['script'], $filename);

            return Http::jsonSuccess([
                'status' => 'success',
                'script' => $scriptData['script'],
                'download_url' => $downloadUrl
            ]);
        } catch (\Throwable $e) {
            log_message('error', '❌ Error in generateVoiceScriptManually: ' . $e->getMessage());
            return Http::jsonError($e->getMessage());
        }
    }

    public function getCleanedScrapedContent($limit = 10)
    {
        $limit = (int) ($this->request->getGet('limit') ?? $limit);
        $cleaned = $this->marketingModel->getValidScrapedSummaries($limit);

        return Http::jsonSuccess([
            'status' => 'success',
            'data'   => $cleaned,
        ]);
    }

    public function getContentPerformanceAnalytics()
    {
        try {
            $analytics = $this->marketingModel->getContentPerformance();
            return Http::jsonSuccess(['status' => 'success', 'data' => $analytics]);
        } catch (\Throwable $e) {
            log_message('error', '❌ getContentPerformanceAnalytics() failed: ' . $e->getMessage());
            return $this->failServerError('Failed to retrieve analytics.');
        }
    }
    
    protected function getNextAvailableSlot()
    {
        $now = time();
        $base = strtotime('+10 minutes', $now); // First available slot is 10 min from now
        $rounded = ceil($base / 1800) * 1800;    // Round to next 30-min slot
        return date('Y-m-d H:i:s', $rounded);
    }

    public function getScrapeDetails($id)
    {
        $scrape = $this->marketingModel->find($id);
        return Http::jsonSuccess([
            'content' => $scrape['content'] ?? 'No content found.'
        ]);
    }

    public function getStoryboardPackage($summaryId)
    {
        $summary = $this->marketingModel->findFinalizedById($summaryId);
        if (!$summary) return $this->failNotFound('Summary not found');
    
        $storyboard = $this->MyMIMarketing->generateStoryboardFromSummary($summary);
        $package = [
            'title'     => $summary['title'],
            'voiceover' => $summary['summary'],
            'slides'    => $storyboard,
            'keywords'  => $this->MyMIMarketing->extractKeywords($summary['summary']),
        ];
    
        return Http::jsonSuccess($package);
    }
    
    public function getTopGeneratedPosts()
    {
        $posts = $this->marketingModel->getTopGeneratedPosts();
        return Http::jsonSuccess(['posts' => $posts]);
    }
    
    /**
     * GET /API/Marketing/getTopKeywordChart/{summaryId}
     *
     * Returns JSON or chart data for that summary’s top keywords.
     */
    public function getTopKeywordChart($id)
    {
        try {
            $keywords = $this->marketingModel->getTopKeywordScores($id);

            if (empty($keywords)) {
                return Http::jsonError('No keyword data found.', 404);
            }

            return Http::jsonSuccess(['keywords' => $keywords]);
        } catch (\Throwable $e) {
            log_message('error', 'KeywordChart Error: ' . $e->getMessage());
            return Http::jsonError('Internal Server Error', 500, ['error' => $e->getMessage()]);
        }
    }

    
    public function groupSimilarSummariesByCosine($threshold = 0.75)
    {
        try {
            $records = $this->marketingModel->getFinalizedContent(25);
            if (empty($records)) {
                return Http::jsonSuccess(['status' => 'empty', 'message' => 'No finalized summaries found.']);
            }
    
            $tokenizer = new \NlpTools\Tokenizers\WhitespaceTokenizer();
            $cosine = new \NlpTools\Similarity\CosineSimilarity();
    
            $textMap = [];
            $vectorMap = [];
            $groups = [];
    
            // Tokenize and store vectors
            foreach ($records as $record) {
                $id = $record['id'];
                $text = strtolower(strip_tags($record['summary']));
                $tokens = $tokenizer->tokenize($text);
                $textMap[$id] = $text;
                $vectorMap[$id] = array_count_values($tokens);
            }
    
            // Grouping logic
            $visited = [];
            foreach ($records as $record) {
                $id = $record['id'];
                if (isset($visited[$id])) continue;
    
                $group = [$record];
                $visited[$id] = true;
    
                foreach ($records as $other) {
                    $otherId = $other['id'];
                    if ($id === $otherId || isset($visited[$otherId])) continue;
    
                    $sim = $cosine->similarity($vectorMap[$id], $vectorMap[$otherId]);
                    if ($sim >= $threshold) {
                        $group[] = $other;
                        $visited[$otherId] = true;
                    }
                }
    
                $groups[] = $group;
            }
    
            return Http::jsonSuccess(['status' => 'success', 'grouped' => $groups]);
        } catch (\Throwable $e) {
            log_message('error', '❌ groupSimilarSummariesByCosine() failed: ' . $e->getMessage());
            return $this->failServerError("Error grouping summaries: " . $e->getMessage());
        }
    }
    
    public function massResendActivationEmails()
    {
        $userModel = new \App\Models\UserModel();
        $users     = $userModel->getPendingActivationUsers();
        $activator = service('activator');
        $success   = 0;
        $failure   = 0;

        foreach ($users as $user) {
            if ($activator->send($user)) {
                $success++;
            } else {
                $failure++;
            }
        }

        return Http::jsonSuccess([
            'status'  => 'success',
            'message' => "$success emails sent, $failure failed."
        ]);
    }

    public function monitorKeywordsAndScrape()
    {
        log_message('info', '🧠 Keyword Monitor Started');
    
        // Get top keywords from watchlists, tickers, or predefined list
        $keywords = $this->getMyMIMarketing()->getKeywordCandidates();
    
        if (empty($keywords)) {
            return Http::jsonSuccess(['status' => 'no_keywords']);
        }
    
        $results = [];
        foreach ($keywords as $keyword) {
            try {
                $scrapedData = $this->getMyMIMarketing()->scrapeGoogleSearch($keyword);
                if (!empty($scrapedData)) {
                    $summary = $this->getMyMIMarketing()->generateContentFromScrapedData($scrapedData, 'generic');
                    if ($summary) {
                        $score = $this->getMyMIMarketing()->scoreKeywordRelevance($keyword, $summary);
                    
                        $results[] = [
                            'keyword' => $keyword,
                            'summary' => $summary,
                            'score'   => $score
                        ];
                    
                        // Save with score to the database (optional)
                        $this->marketingModel->storeFinalMarketingContent([
                            'source_id' => null,
                            'title'     => "Keyword: $keyword",
                            'summary'   => $summary,
                            'keywords'  => $keyword,
                            'score'     => $score,
                            'created_at'=> date('Y-m-d H:i:s')
                        ]);
                    }
                    
                }
            } catch (\Throwable $e) {
                log_message('error', "❌ Failed keyword scrape for {$keyword}: " . $e->getMessage());
            }
        }
    
        return Http::jsonSuccess(['status' => 'complete', 'processed' => $results]);
    }

    public function processMarketingTempEmails($limit = 5, $mode = 'daily', $id = null)
    {
        try {
            log_message('debug', "🧠 Running unified email processor with mode={$mode}, limit={$limit}, id={$id}");
    
            if ($id) {
                // Single record (like testGenerateFromTempEmail)
                $record = $this->marketingModel->getEmailRecordById($id);
                if (!$record || empty($record['content'])) {
                    return $this->failNotFound("No valid temp email record found for ID {$id}");
                }
    
                $cleanText = strip_tags($record['content']);
                $summary = $this->getMyMIMarketing()->summarizeText($cleanText);
                $keywords = $this->getMyMIMarketing()->extractKeywords($cleanText);
    
                if (empty($summary) || empty($keywords)) {
                    return $this->fail("Failed to generate summary or keywords for record ID {$id}");
                }
    
                $testPosts = [
                    'discord'  => "💬 *{$record['title']}*: {$summary} #".implode(' #', $keywords),
                    'linkedin' => "📢 {$record['title']} — {$summary}",
                    'email'    => "Subject: {$record['title']}\n\n{$summary}",
                    'x'        => substr($summary, 0, 250).'...'
                ];
    
                $generated = [
                    'summary'  => $summary,
                    'keywords' => $keywords,
                    'posts'    => $testPosts
                ];
    
                $this->marketingModel->insertFinalScraper($record, $generated);
                $this->marketingModel->markTempScraperProcessed($id);
    
                return Http::jsonSuccess([
                    'status'   => 'success',
                    'message'  => "✅ Test record stored for ID {$id}",
                    'summary'  => $summary,
                    'keywords' => $keywords,
                    'posts'    => $testPosts
                ]);
            }
    
            // Batch mode (like daily or backfill)
            $records = ($mode === 'backfill')
                ? $this->marketingModel->getOlderUnprocessedEmails($limit)
                : $this->marketingModel->getValidUnprocessedEmails($limit);
    
            $results = [];
            foreach ($records as $record) {
                $recordId = $record['id'] ?? 0;
                if (empty($record['title'])) {
                    $record['title'] = "Fallback Title - ID {$recordId}";
                }
    
                try {
                    $insert = $this->getMyMIMarketing()->generateContentAndInsert($record);
                    if ($insert) {
                        $this->marketingModel->markTempScraperProcessed($recordId);
                        log_message('info', "✅ Inserted record ID {$recordId}");
                        $results[] = $insert['title'];
                    } else {
                        log_message('warning', "⚠️ Skipped ID {$recordId} — No summary generated.");
                    }
                } catch (\Throwable $e) {
                    log_message('error', "❌ Exception on ID {$recordId}: ".$e->getMessage());
                }
            }
    
            return Http::jsonSuccess([
                'status'   => 'success',
                'mode'     => $mode,
                'inserted' => $results
            ]);
        } catch (\Throwable $e) {
            return $this->failServerError("🔥 Unified content processor failed: " . $e->getMessage());
        }
    }

    public function publishGroupedContentDraft()
    {
        try {
            // Assuming you fetched summaries beforehand
            $summaries = $this->marketingModel->getSummariesToGroup();
            $grouped = $this->MyMIMarketing->groupSimilarSummariesByCosine($summaries);

            $labeled = $this->getMyMIMarketing()->generateGroupLabelsFromTFIDF($grouped['grouped'] ?? []);
            $drafts = $this->getMyMIMarketing()->generateGroupedBlogAndEmailDrafts($labeled);
    
            $campaignId = $this->marketingModel->storeGroupedContentDrafts($labeled, $drafts);
    
            // Trigger social media and Zapier publishing
            $this->getMyMIMarketing()->distributeGroupedContent($campaignId);
    
            return Http::jsonSuccess([
                'status' => 'success',
                'message' => "Content campaign #{$campaignId} published and distributed."
            ]);
    
        } catch (\Throwable $e) {
            log_message('error', '❌ publishGroupedContentDraft() failed: ' . $e->getMessage());
            return $this->failServerError("Error publishing grouped content: " . $e->getMessage());
        }
    }

    public function rankBufferPostsDaily()
    {
        $marketingModel = new MarketingModel();
        $marketing = new MyMIMarketing();
        $threshold = getenv('MARKETING_TFIDF_THRESHOLD') ?: 7.5;
    
        $pendingPosts = $marketingModel->getPendingBufferItems();
    
        foreach ($pendingPosts as $post) {
            $scoreData = $this->MyMIMarketing->getTopKeywordScores($post['summary']);
            log_message('debug', "🔎 TF-IDF Scores for Post ID {$post['id']}: ".print_r($scoreData, true));
        
            $update = [
                'score' => $scoreData['score'] ?? 0,
                'tag_score' => $scoreData['tag_score'] ?? 0,
                'tfidf_score' => $scoreData['tfidf_score'] ?? 0,
                'auto_suggest' => ($scoreData['tfidf_score'] ?? 0) >= 7.5 ? 1 : 0,
            ];
            $this->marketingModel->updateBufferItem($post['id'], $update);
        }
        
        return Http::jsonSuccess(['status' => 'success', 'message' => 'Buffer ranks updated.']);
    }
    public function regenerateMissingPostContent()
    {
        helper(['text']);
//         $this->MyMIMarketing = new \App\Libraries\MyMIMarketing(); // replaced by BaseController getter
        $this->marketingModel = new \App\Models\MarketingModel();

        $limit = $this->request->getGet('limit') ?? 50;
        $missingPosts = $this->marketingModel
            ->where("(facebook_message IS NULL OR facebook_message = '')", null, false)
            ->where('summary IS NOT NULL')
            ->where('title IS NOT NULL')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->findAll();

        $regenerated = [];

        foreach ($missingPosts as $post) {
            try {
                $lastContent = $this->marketingModel->getLatestGeneratedByCampaignId($post['id']);
                $generated = $this->MyMIMarketing->generateContentFromSummary($post, $lastContent);

                if (!empty($generated)) {
                    $data = [
                        'campaign_id' => $post['id'],
                        'title' => $post['title'],
                        'description' => $post['summary'],
                        'platform' => 'multi',
                        'voice_script' => $generated['voice_script'] ?? '',
                        'facebook_message' => $generated['facebook_message'] ?? '',
                        'linkedin_message' => $generated['linkedin_message'] ?? '',
                        'discord_message' => $generated['discord_message'] ?? '',
                        'stocktwits_message' => $generated['stocktwits_message'] ?? '',
                        'tiktok_message' => $generated['tiktok_message'] ?? '',
                        'youtube_message' => $generated['youtube_message'] ?? '',
                        'email_message' => $generated['email_message'] ?? '',
                        'hashtags' => $generated['hashtags'] ?? '',
                        'status' => 'pending',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];

                    $this->marketingModel->insertGeneratedContent($data);
                    $regenerated[] = $post['id'];
                    log_message('info', "🔁 Regenerated content for post ID {$post['id']}");
                } else {
                    log_message('warning', "⚠️ No content generated for post ID {$post['id']}");
                }
            } catch (\Throwable $e) {
                log_message('error', "❌ Error regenerating post ID {$post['id']}: " . $e->getMessage());
            }
        }

        return Http::jsonSuccess([
            'status' => 'success',
            'message' => '✅ Regeneration complete.',
            'regenerated_count' => count($regenerated),
            'post_ids' => $regenerated,
        ]);
    }

    public function rejectBufferItem($id)
    {
        $record = $this->marketingModel->findFinalizedById($id);
        if (!$record) {
            return $this->failNotFound("Content not found.");
        }
    
        $this->marketingModel->updateBufferItem($id, ['status' => 'Rejected']);
    
        return Http::jsonSuccess([
            'status' => 'success',
            'message' => "❌ Content #{$id} was rejected and marked accordingly."
        ]);
    }

    public function reprocessIncompleteEmails()
    {
        try {
            log_message('info', '[🔄 Backfill] Starting backfill for unprocessed temp emails...');
            $records = $this->marketingModel->getIncompleteSummaries(50);
            $processed = 0;
    
            foreach ($records as $record) {
                $summary = $this->MyMIMarketing->generateContentFromRaw((array) $record);
                if ($summary && strlen(trim($summary['summary'] ?? '')) > 20) {
                    $this->marketingModel->insertFinalScraper($record, $summary);
                    $processed++;
                }
            }
    
            return Http::jsonSuccess([
                'status' => 'success',
                'processed' => $processed,
                'message' => "✅ Reprocessed {$processed} incomplete summaries."
            ]);
        } catch (\Throwable $e) {
            log_message('error', '❌ reprocessIncompleteEmails() failed: ' . $e->getMessage());
            return $this->failServerError('Reprocessing failed: ' . $e->getMessage());
        }
    }
    
    public function runBackfillForTempEmails()
    {
        try {
            log_message('info', '[🔄 Backfill] Starting backfill for unprocessed temp emails...');
            $unprocessedRecords = $this->marketingModel
                ->where('status', null)
                ->orWhere('status', '')
                ->findAll(25); // Limit for safety; increase for batch
    
            if (empty($unprocessedRecords)) {
                return Http::jsonSuccess(['status' => 'complete', 'message' => 'No unprocessed records found.']);
            }
    
            $processedTitles = [];
            foreach ($unprocessedRecords as $record) {
                try {
                    $result = $this->MyMIMarketing->generateContentAndInsert($record);
                    if ($result) {
                        $this->marketingModel->markTempScraperProcessed($record['id']);
                        $processedTitles[] = $result['title'];
                    }
                } catch (\Throwable $e) {
                    log_message('error', '[❌ Backfill Error] ID '.$record['id'].' — '.$e->getMessage());
                }
            }
    
            return Http::jsonSuccess(['status' => 'success', 'processed' => $processedTitles]);
        } catch (\Throwable $e) {
            return $this->failServerError('[🔥 Backfill Failure] '.$e->getMessage());
        }
    }
    
    public function runContentGenerationBatch()
    {
        helper('text');
        $limit = (int) $this->request->getGet('limit') ?? 10;
        $results = [
            'processed' => 0,
            'skipped'   => 0,
            'errors'    => 0,
            'success'   => 0,
            'ids'       => [],
        ];
    
        log_message('info', "🟢 runContentGenerationBatch() started — limit: {$limit}");
    
        $records = $this->marketingModel->getValidUnprocessedEmails($limit);
    
        if (empty($records)) {
            log_message('info', "📭 No valid unprocessed records found.");
            return Http::jsonSuccess([
                'status' => 'success',
                'message' => 'No valid unprocessed records available.',
                'results' => $results,
            ]);
        }
    
        foreach ($records as $record) {
            $id = $record['id'];
            $results['processed']++;
    
            try {
                $generated = $this->getMyMIMarketing()->generateContentFromRaw($record);
    
                if (!$generated) {
                    $results['skipped']++;
                    log_message('debug', "⚠️ ID {$id} skipped — generateContentFromRaw() returned null.");
                    continue;
                }
    
                $results['success']++;
                $results['ids'][] = $id;
                log_message('info', "✅ ID {$id} processed and finalized.");
            } catch (\Throwable $e) {
                $results['errors']++;
                log_message('error', "❌ Exception while processing ID {$id}: " . $e->getMessage());
                $this->marketingModel->markAsSkipped($id);
            }
        }
    
        log_message('info', "🟢 runContentGenerationBatch() completed. Processed: {$results['processed']}, Success: {$results['success']}, Skipped: {$results['skipped']}, Errors: {$results['errors']}");
    
        return Http::jsonSuccess([
            'status' => 'success',
            'message' => 'Batch content generation complete.',
            'results' => $results,
        ]);
    }
    
    public function runEnrichTradeAlerts()
    {
        $this->logMarker('🧠 Starting trade alert enrichment pass...');
    
        $symbols = $this->alertsModel->getActiveSymbols();
        $results = [];
    
        foreach ($symbols as $symbol) {
            $status = $this->MyMIMarketing->enrichTradeAlertsBySymbol($symbol['ticker']);
            $results[] = ['symbol' => $symbol['ticker'], 'success' => $status];
        }
    
        return Http::jsonSuccess([
            'status' => 'success',
            'message' => 'Enrichment completed for all trade alerts.',
            'results' => $results
        ]);
    }
    
    public function runKeywordBackfillBatch()
    {
        helper('text');
        $limit = (int) $this->request->getGet('limit') ?? 10;
        $triggerWords = ['crypto', 'bitcoin', 'market', 'stocks', 'inflation', 'fed', 'economy']; // ⬅️ Customize this as needed
    
        $results = [
            'retried' => 0,
            'success' => 0,
            'skipped' => 0,
            'errors'  => 0,
            'ids'     => [],
        ];
    
        log_message('info', "🔄 runKeywordBackfillBatch() initiated with limit {$limit}");
    
        $skippedRecords = $this->marketingModel
            ->where('status', 'skipped')
            ->orderBy('updated_on', 'DESC')
            ->limit($limit * 2)
            ->get()
            ->getResultArray();
    
        if (empty($skippedRecords)) {
            log_message('info', "🚫 No skipped records found for keyword retry.");
            return Http::jsonSuccess([
                'status' => 'success',
                'message' => 'No skipped records found.',
                'results' => $results,
            ]);
        }
    
        foreach ($skippedRecords as $record) {
            $id = $record['id'];
            $haystack = strtolower(($record['title'] ?? '') . ' ' . strip_tags($record['content'] ?? ''));
    
            // Basic keyword match
            $matched = false;
            foreach ($triggerWords as $word) {
                if (str_contains($haystack, strtolower($word))) {
                    $matched = true;
                    break;
                }
            }
    
            if (!$matched) {
                $results['skipped']++;
                log_message('debug', "⏭️ ID {$id} skipped — no matching keywords.");
                continue;
            }
    
            $results['retried']++;
    
            try {
                $generated = $this->getMyMIMarketing()->generateContentFromRaw($record);
    
                if ($generated) {
                    $results['success']++;
                    $results['ids'][] = $id;
                    log_message('info', "✅ ID {$id} retried and succeeded on keyword match.");
                } else {
                    $results['skipped']++;
                    log_message('debug', "⚠️ ID {$id} retry failed again.");
                }
            } catch (\Throwable $e) {
                $results['errors']++;
                log_message('error', "❌ Exception retrying ID {$id}: " . $e->getMessage());
            }
    
            if ($results['retried'] >= $limit) break; // Enforce soft cap
        }
    
        return Http::jsonSuccess([
            'status' => 'success',
            'message' => 'Backfill batch completed.',
            'results' => $results,
        ]);
    }
    
    public function runKeywordEnrichment()
    {
        $rotation = new \App\Services\SearchRotationService();
        $rotation->scheduleEnrichmentForKeywords();
        return Http::jsonSuccess(['status' => 'success', 'message' => 'Keyword enrichment task completed.']);
    }
    
    public function runScheduledDistribution()
    {
        $now = date('Y-m-d H:i:s');
        $posts = $this->db->table('bf_marketing_generated_content')
            ->where('status', 'scheduled')
            ->where('scheduled_at <=', $now)
            ->get()->getResultArray();
    
        foreach ($posts as $post) {
            $this->sharePost($post['id'], $post['platform']);
        }
    
        return Http::jsonSuccess(['status' => 'success', 'count' => count($posts)]);
    }

    protected function sanitizeEmailContent(string $content): string
    {
        $decoded = quoted_printable_decode($content);
        $decoded = html_entity_decode($decoded, ENT_QUOTES | ENT_HTML5);
        $decoded = strip_tags($decoded);
        $normalized = preg_replace('/[\r\n\t]+/', ' ', $decoded);
        $clean = preg_replace('/\s{2,}/', ' ', $normalized);
        return trim($clean);
    }
    
    public function scheduleApprovedPost($id)
    {
        $data = $this->request->getJSON(true);
        $manualTime = $data['scheduled_at'] ?? null;

        $item = $this->marketingModel->getBufferItem($id);
        if (!$item || strtolower($item['status']) !== 'approved') {
            return $this->failNotFound("Approved buffer item not found.");
        }

        $nextSlot = $manualTime ?? $this->getNextAvailableSlot();
        $this->marketingModel->updateBufferItem($id, [
            'scheduled_at' => $nextSlot,
            'status' => 'Scheduled'
        ]);

        log_message('info', "📅 Post #{$id} scheduled for {$nextSlot}.");
        return Http::jsonSuccess([
            'status' => 'success',
            'message' => "📆 Post #{$id} scheduled for {$nextSlot}."
        ]);
    }

    public function schedulePost($id, $platform, $datetime)
    {
        $this->marketingModel->updateBufferPostStatus($id, 'scheduled', [
            'platform' => $platform,
            'scheduled_date' => $datetime
        ]);
        return Http::jsonSuccess(['status' => 'success', 'message' => "Scheduled for {$platform} at {$datetime}"]);
    }
    
    private function scrapeWebsiteWithFallback($url) {
        try {
            log_message('debug', 'scrapeWebsiteWithFallback: Scraping URL - ' . $url);
            $scrapedData = $this->scrapeWebsite($url);

            if (empty($scrapedData['content'])) {
                log_message('debug', 'scrapeWebsiteWithFallback: Scraped data is empty, performing Google search fallback');
                $googleSearchResults = $this->scrapeGoogleSearch($url);
                $scrapedLinksData = $this->scrapeLinks($googleSearchResults);
                $scrapedData['google_search_results'] = $scrapedLinksData;
            }

            return $scrapedData;
        } catch (RequestException $e) {
            log_message('error', 'scrapeWebsiteWithFallback: RequestException - ' . $e->getMessage());
            return ['error' => $e->getMessage()];
        } catch (\Exception $e) {
            log_message('error', 'scrapeWebsiteWithFallback: General error - ' . $e->getMessage());
            return ['error' => $e->getMessage()];
        }
    }

    public function sendWalkthroughEmails()
    {
        log_message('info', '� Sending Walkthrough Invites to Active Users...');

        try {
            $this->marketingService->sendWalkthroughInviteToActiveUsers();
            return Http::jsonSuccess(['status' => 'success', 'message' => 'Emails sent']);
        } catch (\Throwable $e) {
            log_message('error', '❌ Walkthrough Invite Failed: ' . $e->getMessage());
            return $this->failServerError('Failed to send walkthrough emails');
        }
    }

    public function shareGroupedSummaries($platform)
    {
        try {
            $grouped = $this->groupSimilarSummariesByCosine();
            if (empty($grouped['grouped'])) {
                return $this->fail('No grouped summaries found for sharing.');
            }
    
            $count = 0;
            foreach ($grouped['grouped'] as $group) {
                if (isset($group[0]['summary'])) {
                    $headline = $group[0]['title'] ?? 'Grouped Summary';
                    $summaryBlock = implode("\n\n", array_map(fn($s) => '• ' . word_limiter(strip_tags($s['summary']), 30), $group));
                    $postText = "**{$headline}**\n\n" . $summaryBlock;
    
                    $this->MyMIMarketing->distributeContent($platform, $postText);
                    $count++;
                }
            }
    
            return Http::jsonSuccess([
                'status' => 'success',
                'message' => "Shared {$count} grouped summaries to {$platform}."
            ]);
        } catch (\Throwable $e) {
            log_message('error', '❌ shareGroupedSummaries failed: ' . $e->getMessage());
            return $this->failServerError("Failed to share summaries.");
        }
    }

    public function sharePost($id, $platform)
    {
        $post = $this->marketingModel->getGeneratedPost($id);
        if (!$post) return $this->failNotFound("Post not found.");
    
        // Example distribution logic — replace with Zapier or Discord/etc.
        log_message('info', "🚀 Simulated share of Post #$id to $platform: " . substr($post['post_text'], 0, 100));
        $timestamp = date('Y-m-d H:i:s');
        $platformColumn = 'shared_' . strtolower($platform);
        $this->marketingModel->updateGeneratedPost($id, [
            'status' => 'posted',
            $platformColumn => $timestamp
        ]);
        
        return Http::jsonSuccess([
            'status' => 'success',
            'message' => "✅ Post #$id shared to $platform!"
        ]);
    }
  
    public function smartSearch()
    {
        $query = $this->request->getGet('q');
        if (!$query) {
            return $this->failValidationErrors('Missing query parameter.');
        }
    
        $results = $this->MyMIMarketing->smartSearchWithThrottle($query);
        return Http::jsonSuccess(['results' => $results]);
    }
    
    public function submitLargeContent()
    {
        try {
            helper(['form', 'url']);

            $subject       = $this->request->getPost('subject');
            $url           = $this->request->getPost('url');
            $largeContent  = $this->request->getPost('large_content');
            $tags          = $this->request->getPost('tags');
            $contentType   = $this->request->getPost('content_type');
            $author        = $this->request->getPost('author_information');
            $datetime      = $this->request->getPost('date_time');

            if (!$subject || !$largeContent || !$author) {
                return Http::jsonError('Required fields are missing.', 400);
            }

            // [Optional] handle uploaded media files
            if ($this->request->getFiles()) {
                foreach ($this->request->getFiles()['media_assets'] as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $file->move(WRITEPATH . 'uploads/marketing_media/', $file->getRandomName());
                    }
                }
            }

            // [Simulate database insert or actual model method]
            $this->marketingModel->insert([
                'subject'       => $subject,
                'url'           => $url,
                'content'       => $largeContent,
                'tags'          => $tags,
                'content_type'  => $contentType,
                'author'        => $author,
                'datetime'      => $datetime,
            ]);

            return Http::jsonSuccess(['message' => 'Content submitted successfully.']);
        } catch (\Throwable $e) {
            log_message('error', '[submitLargeContent] ' . $e->getMessage());
            return Http::jsonError('Server error occurred.', 500, ['error' => $e->getMessage()]);
        }
    }

    public function testGenerateDailyDigest()
    {
        return $this->generateDailyContentDigest(); // simple proxy
    }
    
    public function testGenerateFromTempEmail($id)
    {
        try {
            helper('text');
    
            $record = $this->marketingModel->getEmailRecordById($id);
    
            if (!$record || empty($record['content'])) {
                return $this->failNotFound("No valid temp email record found for ID {$id}");
            }
    
            log_message('info', "🧪 Starting test content generation for temp record ID: {$id}");
    
            // STEP 1: Clean & summarize
            $cleanText = strip_tags($record['content']);
            $summary  = $this->getMyMIMarketing()->summarizeText($cleanText);
            $summary  = quoted_printable_decode($summary);
            $summary  = mb_convert_encoding($summary, 'UTF-8', 'UTF-8');
            $keywords  = $this->getMyMIMarketing()->extractKeywords($cleanText);
    
            if (empty($summary) || empty($keywords)) {
                return $this->fail("Failed to generate summary or keywords for record ID {$id}");
            }
    
            // STEP 2: Generate test content for each platform
            // Decode and sanitize title
            $decodedTitleRaw = $record['title'] ?? '';
            $decodedTitle = $this->getMyMIMarketing()->decodeMimeHeaderSafe($decodedTitleRaw);
            $cleanTitle = preg_replace('/[^\p{L}\p{N}\s:;\-]/u', '', $decodedTitle);

            // Build sanitized post formats
            $testPosts = [
                'discord' => "💬 *{$cleanTitle}*: {$summary} #" . implode(' #', $keywords),
                'linkedin' => "📢 {$cleanTitle} — {$summary}",
                'email' => "Subject: {$cleanTitle}\n\n{$summary}",
                'x' => substr($summary, 0, 250) . '...',
            ];
    
            // STEP 3: Package results
            $generated = [
                'summary'  => $summary,
                'keywords' => $keywords,
                'posts'    => $testPosts
            ];
    
            // STEP 4: Save test result to bf_marketing_scraper
            $this->marketingModel->insertFinalScraper($record, $generated);
            $this->marketingModel->markTempScraperProcessed($id);
    
            log_message('info', "✅ Test record stored in bf_marketing_scraper for temp ID {$id}");
    
            return Http::jsonSuccess([
                'status'   => 'success',
                'message'  => "Content generated and stored successfully.",
                'summary'  => $summary,
                'keywords' => $keywords,
                'posts'    => $testPosts
            ]);
    
        } catch (\Throwable $e) {
            log_message('critical', "❌ testGenerateFromTempEmail({$id}) failed: " . $e->getMessage());
            return $this->failServerError("An error occurred: " . $e->getMessage());
        }
    }
    
    public function testGenerateSummarizerHarness()
    {
        $this->MyMIMarketing->testMarketingSummarizer(10);
        return Http::jsonSuccess(['status' => 'success', 'message' => 'Ran testMarketingSummarizer()']);
    }
    
    public function testTfIdfEdgeCases()
    {
        $cases = [
            'Empty String'     => '',
            'Whitespace Only'  => '     ',
            'Single Word'      => 'Bitcoin',
            'HTML Only'        => '<div><p></p></div>',
            'Malformed UTF-8'  => "\xB1\x31",
            'Link-Only Spam'   => 'http://marketwatch.com https://example.com',
            'Token Noise'      => str_repeat('$$$!!!@@@###', 10),
        ];
    
        $results = [];
    
        foreach ($cases as $label => $input) {
            try {
                log_message('info', "🧪 Running TF-IDF Test Case: $label");
    
                $cleanInput = is_string($input) ? strip_tags(trim($input)) : '';
    
                if (strlen($cleanInput) < 10 || substr_count($cleanInput, ' ') < 2) {
                    log_message('debug', "⚠️ Skipping test: $label — input too short or lacks structure.");
                    $results[$label] = '[Skipped — Too short or unstructured]';
                    continue;
                }
    
                $summary = $this->MyMIMarketing->summarizeText($cleanInput);
                log_message('debug', "Result - Summary: $summary");
                $results[$label] = $summary;
    
            } catch (\Throwable $e) {
                log_message('error', "❌ $label threw error: " . $e->getMessage());
                $results[$label] = '[Error: ' . $e->getMessage() . ']';
            }
        }
    
        return $this->renderTheme('App\Modules\Management\Views\Marketing\debugTfIdfResults', [
            'results' => $results,
        ]);
    }
    
    public function timeline($topic = 'General')
    {
        $timelineView = $this->getMyMIMarketing()->createTimelineView($topic);
        return $this->response->setBody($timelineView);
    }
    
    public function triggerPostAutogenOnEmpty()
    {
        $this->logger->info("Triggering post autogen fallback...");
    
        $existingPosts = $this->marketingModel->getRecentPosts(3);
        if (count($existingPosts) === 0) {
            $this->logger->info("No posts found, generating...");
            $summaries = $this->marketingModel->getLatestGeneratedSummaries(5);
    
            foreach ($summaries as $summary) {
                try {
                    $this->generatePostsFromSummary($summary['id']);
                } catch (\Throwable $e) {
                    log_message('error', '❌ Error generating post from summary ID ' . $summary['id'] . ': ' . $e->getMessage());
                }
            }
    
            return Http::jsonSuccess(['success' => true, 'message' => 'Auto-generated missing posts.']);
        }
    
        return Http::jsonSuccess(['success' => false, 'message' => 'Posts already exist. No generation needed.']);
    }     
    
    public function updateBufferScheduleInterval($id)
    {
        $data = $this->request->getJSON(true);
        $interval = (int) ($data['interval'] ?? 0);
    
        $updated = $this->marketingModel->updateBufferItem($id, [
            'schedule_interval' => $interval,
            'scheduled_at' => null // Reset current time
        ]);
    
        if ($updated) {
            return Http::jsonSuccess(['status' => 'success']);
        } else {
            return $this->fail('Failed to update interval.');
        }
    }
    
    public function updateCampaignLinks()
    {
        $request = $this->request->getPost();
        $campaignId = $request['campaign_id'] ?? null;
        $newLink = $request['new_link'] ?? null;
    
        if (!$campaignId || !$newLink || !filter_var($newLink, FILTER_VALIDATE_URL)) {
            return $this->failValidationError("Invalid campaign ID or link.");
        }
    
        $this->marketingModel = new \App\Models\MarketingModel();
        $updated = $this->marketingModel->addLinkToCampaign($campaignId, $newLink);
    
        if ($updated) {
            return Http::jsonSuccess([
                'status' => 'success',
                'message' => 'Link added',
                'csrfHash' => csrf_hash()
            ]);
        } else {
            return $this->failServerError("Failed to update campaign.");
        }
    }
    
    public function updateCampaignMessageField()
    {
        $campaignId = $this->request->getPost('campaign_id');
        $field = $this->request->getPost('field');
        $newValue = $this->request->getPost('new_value');
    
        if (!$campaignId || !$field) {
            return $this->fail('Missing required fields.');
        }
    
        $allowedFields = [
            'voice_script', 'facebook_message', 'linkedin_message', 'discord_message',
            'stocktwits_message', 'tiktok_message', 'youtube_message', 'email_message', 'hashtags'
        ];
    
        if (!in_array($field, $allowedFields)) {
            return $this->fail('Invalid field update.');
        }
    
        $updated = $this->marketingModel->updateCampaignGeneratedMessage($campaignId, $field, $newValue);
    
        return Http::jsonSuccess([
            'status' => $updated ? 'success' : 'error',
            'csrfHash' => csrf_hash()
        ]);
    }
    
    public function updateInsight()
    {
        $id = $this->request->getPost('id');
        $title = $this->request->getPost('title');
        $summary = $this->request->getPost('summary');
        $cta = $this->request->getPost('cta');
        $keywords = $this->request->getPost('keywords');
    
        if (!$id || !$summary || !$title) {
            return $this->failValidationErrors('Missing required fields.');
        }
    
        try {
            $this->marketingModel->update($id, [
                'title' => strip_tags($title),
                'summary' => strip_tags($summary),
                'cta' => strip_tags($cta),
                'keywords' => $keywords,
                'modified_on' => date('Y-m-d H:i:s'),
            ]);
            return Http::jsonSuccess(['status' => 'success']);
        } catch (\Throwable $e) {
            log_message('error', 'updateInsight() failed: '.$e->getMessage());
            return $this->failServerError('Failed to save.');
        }
    }
    
    public function updatePlatformToggle($id)
    {
        $data = $this->request->getJSON(true);
        $platform = $data['platform'];
        $enabled  = $data['enabled'];
    
        $record = $this->marketingModel->find($id);
        if (!$record) {
            return $this->failNotFound("Record not found.");
        }
    
        $platforms = json_decode($record['platforms'] ?? '{}', true);
        $platforms[$platform] = $enabled;
    
        $this->marketingModel->update($id, ['platforms' => json_encode($platforms)]);
    
        return Http::jsonSuccess(['status' => 'success']);
    }

    public function updatePostSchedule($id)
    {
        $input = $this->request->getJSON(true);
        $datetime = $input['scheduled_at'] ?? null;
    
        if (!$datetime) {
            return $this->failValidationErrors("Missing schedule time.");
        }
    
        $this->marketingModel->updateGeneratedPost($id, [
            'scheduled_at' => $datetime,
            'status' => 'scheduled',
        ]);
    
        return Http::jsonSuccess([
            'status' => 'success',
            'message' => "📅 Post #{$id} scheduled for {$datetime}."
        ]);
    }

    public function viewTimelineGrouped()
    {
        $records = $this->getMyMIMarketing()->getTimelineGroupedByTopic();
        $this->data['timeline'] = $records;
        return $this->renderTheme('ManagementModule\Views\Marketing\resources\timelineGroupedView', $this->data);
    }
    
}
?>
