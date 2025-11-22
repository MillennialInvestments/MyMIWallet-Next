<?php namespace App\Modules\APIs\Controllers;

use App\Config\ApiKeys;
use App\Support\Http;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;   // ⬅️ ADD THIS
use App\Libraries\{
    BaseLoader,
    MyMIAlerts,
    MyMIAlphaVantage,
    MyMIInvestments,
    MyMIMarketing,
    MyMIMarketAux,
    MyMIRobinhood,
    MyMISEC
};
use App\Models\AlertsModel;
use App\Tasks\ProcessTradeAlertChanges;
use DateTime;

// Steps to Add a Public API Endpoint for Alerts
// Add API Routes: Open your app/Config/Routes.php file and add the following entries to enable public access to the newly created methods:

// php
// Copy
// Edit
// $routes->group('API/Alerts', ['namespace' => 'App\Modules\APIs\Controllers'], function ($routes) {
//     $routes->get('fetchEmailAlerts', 'AlertsController::fetchEmailAlerts');
//     $routes->get('updateTradeAlerts', 'AlertsController::updateTradeAlerts');
//     $routes->get('processAlerts', 'AlertsController::processAlerts');
// });
// Access the API URLs: After adding these routes, the following URLs will be available:

// Fetch Email Alerts: https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
// Update Trade Alerts: https://www.mymiwallet.com/index.php/API/Alerts/updateTradeAlerts
// Process Alerts (Combined): https://www.mymiwallet.com/index.php/API/Alerts/processAlerts
// Test the API Manually: Use a browser, curl, or a tool like Postman to verify the API endpoints:

// bash
// Copy
// Edit
// curl -X GET https://www.mymiwallet.com/index.php/API/Alerts/processAlerts
// Update CRON to Use the API Endpoint: Replace your previous CRON job with the following entry to trigger the processAlerts endpoint every 15 minutes:
// curl -s https://www.mymiwallet.com/index.php/API/Alerts/processAlerts >> /home/mymiteam/cron_logs/alerts.log 2>&1

#[\AllowDynamicProperties]
class AlertsController extends ResourceController
{
    use ResponseTrait;
    use BaseLoader;
    protected $cache;
    protected $alertManager;
    protected $MyMIAlerts;
    protected $MyMIAlphaVantage;
    protected $MyMIInvestments;
    protected $MyMIMarketing;
    protected $MyMIRobinhood;
    protected $MyMISEC;
    protected $alertsModel;
    protected bool $stringAsHtml = true;

    public function __construct()
    {
        $this->alertManager = new MyMIAlerts();
        $this->alertsModel = new AlertsModel(); 
//         $this->MyMIAlphaVantage = new MyMIAlphaVantage(); // replaced by BaseController getter
//         $this->MyMIInvestments = new MyMIInvestments(); // replaced by BaseController getter
//         $this->MyMIMarketing = new MyMIMarketing(); // replaced by BaseController getter
//         $this->MyMISEC = new MyMISEC(); // replaced by BaseController getter 
    }
    
    public function addTradeAlert()
    {
        $post = $this->request->getPost();
        $formMode = $post['formMode'] ?? 'Add';
        log_message('info', 'API/AlertsController L62 - $post Array: ' . (print_r($post, true)));  
        // ✅ Validate required fields
        if (!isset($post['user_id'])) {
            return $this->respond([
                'status'  => 'error',
                'message' => 'Missing required user_id',
            ], 400);
        }
    
        $userId = intval($post['user_id']);
        $tradeID = intval($post['trade_id']);
        $symbol = strtoupper(trim($post['symbol'] ?? $post['ticker'] ?? ''));
        $entryPrice = floatval($post['entry_price'] ?? 0.00);
        $orderStatus = strtoupper($post['order_status'] ?? 'OPENING');
        $trailingStop = floatval($post['trailing_stop_percent'] ?? 1.0);
        
        // Categorize Status Classification based on the following criteria
        if ($post['category'] === 'Pending Entry') {
            $status = 'Pending Entry'; 
            $tradeType = 'Pending'; 
        } elseif ($post['category'] === 'Active Buy Alert') {
            $status = 'Active Buy'; 
            $tradeType = 'Active Buy'; 
        } elseif ($post['category'] === 'Active Sell Alert') {
            $status = 'Active Sell'; 
            $tradeType = 'Active Sell'; 
        } else {
            $status = 'Pending'; 
            $tradeType = 'Pending'; 
        }
        // 🧠 Calculate target stop at 3% gain if entryPrice is valid
        if ($entryPrice > 0) {
            $post['trailing_stock_target'] = round($entryPrice * 1.03, 2); // 3% target
            $post['locked_profit_stop'] = $post['target_price'];  // use for trailing
        }
    
        // 🧠 Fetch EMA data
        if (!empty($symbol)) {
            try {
                $emaData = $this->getMyMIAlphaVantage()->fetchEMAs($symbol);
                $post = array_merge($post, $emaData);
                log_message('info', 'API/AlertsController L104 - $emaData Array: ' . (print_r($emaData, true))); 
            } catch (\Throwable $e) {
                log_message('error', 'EMA Fetch Failed for ' . $symbol . ': ' . $e->getMessage());
            }
        }
        log_message('info', 'API/AlertsController L108 - $post after EMA Data Array Merge: ' . (print_r($post, true))); 
        // Define Symbol/Ticker Alert Occurence/Count: 
        $occurrencesCount   = $this->alertsModel->getAlertOccurrencesBySymbol($symbol);
        $alertCount         = $this->alertsModel->getAlertsCreatedBySymbol($symbol);
        $alertSentCount     = $this->alertsModel->getAlertsSentBySymbol($symbol);
        
        // 🛠️ Prepare alert data aligned with bf_investment_trade_alerts
        $data = [
            'active'                 => 1, 
            'status'                 => $status,
            'occurrences'            => $occurrencesCount,
            'alert_count'            => $alertCount,
            'distributed_count'      => $alertSentCount,
            'created_on'             => date('Y-m-d H:i:s'),
            'created_by'             => $userId,
            'updated_at'             => date('Y-m-d H:i:s'),
            'alert_created'          => 1,
            'send_alert'             => 0,
            'alert_sent'             => 0,
            'ticker'                 => strtoupper($symbol),
            'exchange'               => strtoupper(trim($post['exchange'] ?? '')),
            'company'                => $post['company'] ?? null,
            'price'                  => floatval($post['price'] ?? $entryPrice),
            'open'                   => $post['open'] ?? null,
            'high'                   => $post['high'] ?? null,
            'low'                    => $post['low'] ?? null,
            'volume'                 => $post['volume'] ?? null,
            'market_cap'             => $post['market_cap'] ?? null,
            'trailing_stop_percent' => $trailingStop,
            'locked_profit_stop'     => $post['locked_profit_stop'] ?? null,
            'stop_loss'              => $post['stop_loss'] ?? null,
            'max_entry'              => $post['max_entry'] ?? null,
            'current_price'          => $post['price'],
            'entry_price'            => $post['entry_price'],
            'potential_price'        => $post['target_price'] ?? null,
            'target_price'           => $post['target_price'] ?? null,
            'market_sentiment'       => $post['market_sentiment'] ?? 'Neutral',
            'trade_type'             => $post['trade_type'] ?? 'N/A',
            'category'               => $post['category'] ?? 'Other',
            'alert_priority'         => $post['alert_priority'] ?? 'Normal',
            'trade_description'      => $post['trade_description'] ?? '',
            'financial_news'         => $post['financial_news'] ?? '',
            'analysis_summary'       => $post['analysis_summary'] ?? '',
            'tv_chart_type'          => $post['chart_type'] ?? null,
            'tv_chart'               => $post['chart_data'] ?? null,
            'display'                => 'Yes',
            'status'                 => ($orderStatus === 'OPENING') ? 'Opened' : 'Closed',
            'notification_sent'      => 0,
            'submitted_date'         => date('Y-m-d'),
            'last_updated'           => date('Y-m-d'),
            'last_updated_time'      => date('H:i:s'),
            // ✅ Include EMA values as used in your existing schema
            'ema_9'                  => $post['ema_9'] ?? null,
            'ema_21'                 => $post['ema_21'] ?? null,
            'ema_34'                 => $post['ema_34'] ?? null,
            'ema_48'                 => $post['ema_48'] ?? null,
            'ema_100'                => $post['ema_100'] ?? null,
            'ema_200'                => $post['ema_200'] ?? null,
        ];    
    
        // ✅ Log snapshot in bf_investment_alert_history        
        $historyData = [
            'trade_id'             => $tradeID,
            'ticker'               => $data['ticker'],
            'price'                => $data['price'],
            'entry_price'          => $data['entry_price'],
            'volume'               => $data['volume'],
            'exchange'             => $data['exchange'],
            'company'              => $data['company'],
            'category'             => $data['category'],
            'alerted_on'           => date('Y-m-d H:i:s'),
            'status'               => $data['status'],
            'created_on'           => $data['created_on'],
            'submitted_date'       => $data['submitted_date'],
            'alert_created'        => 1,
            'alert_sent'           => 0,
            'send_alert'           => 0,
        
            // ✅ Technical Indicators from merged $post (from $emaData)
            'ema_3'                => $post['ema_3'] ?? null,
            'ema_8'                => $post['ema_8'] ?? null,
            'ema_13'               => $post['ema_13'] ?? null,
            'sma_50'               => $post['sma_50'] ?? null,
            'sma_200'              => $post['sma_200'] ?? null,
            'macd'                 => $post['macd'] ?? null,
            'rsi'                  => $post['rsi'] ?? null,
            'ema_9'                => $post['ema_9'] ?? null,
            'ema_21'               => $post['ema_21'] ?? null,
            'ema_34'               => $post['ema_34'] ?? null,
            'ema_48'               => $post['ema_48'] ?? null,
            'ema_100'              => $post['ema_100'] ?? null,
            'ema_200'              => $post['ema_200'] ?? null,
        ];

        // ✅ Save alert
        log_message('info', 'API/AlertsController L197 - $post Adjusted Array: ' . (print_r($post, true))); 
        if ($formMode === 'Update') {
            // ✅ Check if an existing alert already exists
            $existing = $this->alertsModel->getNonActiveTradeAlertsBySymbol($symbol);

            if (!empty($existing)) {
                log_message('info', 'API/AlertsController L203 - $existing Array: ' . (print_r($existing, true)));
           
                $this->alertsModel->updateTrade($tradeID, $data, true);
                $this->alertsModel->updateExchangeForTicker($existing['ticker'], $post['exchange']);
                $this->alertsModel->updateAlertHistory($tradeID, $historyData);
                log_message('info', 'API/AlertsController L215 - Updated existing manual alert: ' . $symbol . ' | tradeID: ' . $tradeID);
            } else {
                log_message('error', 'API/AlertsController L217 - Update failed. Falling back to inserting new record for: ' . $symbol);
                $tradeID = $this->alertsModel->insertTradeAlert($data);
                $this->alertsModel->storeAlertHistory($historyData); 
            }
        } else {
            log_message('error', 'API/AlertsController L221 - Existing Record does not exist. Falling back to inserting new record for: ' . $symbol . ' | tradeID: ' . $tradeID);
            $tradeID = $this->alertsModel->insertTradeAlert($data);
            $this->alertsModel->storeAlertHistory($historyData); 
        }        
    
        return $this->respond([
            'status'  => 'success',
            'message' => '✅ Trade alert submitted successfully for TradeID: ' . $tradeID . ' | Symbol: ' . $historyData['ticker'],
            'data'    => $data
        ]);
    }    
    
    public function backfillCategories()
    {
        try {
            $model = new \App\Modules\Management\Models\AlertsModel();
            $result = $model->backfillCategoriesFromScraper(15);
            return Http::jsonSuccess(['status' => 'success', 'result' => $result]);
        } catch (\Throwable $e) {
            log_message('error', 'backfillCategories error: ' . $e->getMessage());
            return Http::jsonError($e->getMessage(), 500);
        }
    }

    private function calculateCurrentRatio($currentAssets, $currentLiabilities)
    {
        return $currentLiabilities != 0 ? round($currentAssets / $currentLiabilities, 2) : null;
    }

    private function calculateDebtToEquity($totalDebt, $totalEquity)
    {
        return $totalEquity != 0 ? round($totalDebt / $totalEquity, 2) : null;
    }

    private function calculateEPSGrowth($epsCurrent, $epsPrevious)
    {
        return $epsPrevious != 0 ? round((($epsCurrent - $epsPrevious) / $epsPrevious) * 100, 2) : null;
    }    

    private function calculateFreeCashFlow($cashFromOperations, $capitalExpenditures)
    {
        return round($cashFromOperations - $capitalExpenditures, 2);
    }

    private function calculateQuickRatio($currentAssets, $inventory)
    {
        return $inventory != 0 ? round(($currentAssets - $inventory) / $currentAssets, 2) : null;
    }

    private function cleanText($text)
    {
        if (is_null($text)) return '';
        if (is_array($text)) $text = implode(' ', $text);
    
        // Remove BOM and non-printable characters
        $text = preg_replace('/[\x00-\x1F\x7F\xC2\xA0]/u', '', $text);
        
        // Normalize encoding
        $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');
    
        // Decode HTML entities
        $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    
        // Remove multi-byte emojis or control characters
        $text = preg_replace('/[\x{1F600}-\x{1F64F}]/u', '', $text); // Emoticons
        $text = preg_replace('/[\x{2700}-\x{27BF}]/u', '', $text);   // Dingbats
        $text = preg_replace('/[\x{1F300}-\x{1F5FF}]/u', '', $text); // Misc symbols
    
        return trim($text);
    }    

    public function exportCapCutJson($userId)
    {
        $media = $this->advisorService->generateAdvisorMediaPackage($userId);

        if (!$media || empty($media['voiceover_url'])) {
            return $this->fail('Media generation failed.');
        }

        $jsonUrl = $this->advisorService->exportCapCutJsonTemplate($media);
        return $this->respond(['status' => 'success', 'capcut_json_url' => $jsonUrl]);
    }

    // Public API to trigger the fetching of email alerts
    /**
     * API endpoint to manually fetch emails
     */
    public function fetchEmailAlerts()
    {
        if ($response = $this->enforceCronKey()) {
            return $response;
        }
        log_message('info', '⚡ fetchEmailAlerts - Started.');
        try {
            $this->alertManager->fetchAndStoreAlertsEmails();
            log_message('info', '✅ fetchEmailAlerts - Completed.');
            return $this->respond(["status" => "success", "message" => "Emails fetched successfully."]);
        } catch (\Exception $e) {
            log_message('error', '❌ fetchEmailAlerts - Error: ' . $e->getMessage());
            return $this->respond(["status" => "error", "message" => $e->getMessage()], 500);
        }
    }   

    public function fetchEmailsOnly()
    {
        if ($response = $this->enforceCronKey()) {
            return $response;
        }
        log_message('info', '⚡ fetchEmailsOnly - Started.');
        try {
            $this->alertManager->fetchAndStoreAlertsEmails(); // Pulls and saves email content only
            log_message('info', '✅ fetchEmailsOnly - Completed.');
            return $this->respond([
                'status' => 'success',
                'message' => 'Emails fetched and saved to scraper.'
            ]);
        } catch (\Exception $e) {
            log_message('error', '❌ fetchEmailsOnly - Error: ' . $e->getMessage());
            return $this->respond([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function fetchMarketAuxNews($symbol)
    {
        helper('text'); // For character_limiter()
    
        $apiKey = getenv('MARKETAUX_API_KEY'); // Store in .env or Config
        $url = "https://api.marketaux.com/v1/news/all?symbols={$symbol}&filter_entities=true&limit=5&language=en&api_token={$apiKey}";
    
        try {
            $client = \Config\Services::curlrequest();
            $response = $client->get($url);
            $data = json_decode($response->getBody(), true);
    
            if (!isset($data['data'])) {
                return Http::jsonError('No news found.');
            }
    
            $news = array_map(function ($item) {
                return [
                    'title' => character_limiter($item['title'], 100),
                    'summary' => character_limiter(strip_tags($item['description'] ?? ''), 160),
                    'url' => $item['url'],
                    'published_at' => date('Y-m-d H:i', strtotime($item['published_at']))
                ];
            }, $data['data']);
    
            return Http::jsonSuccess(['status' => 'success', 'news' => $news]);
        } catch (\Throwable $e) {
            log_message('error', 'MarketAux Fetch Error: ' . $e->getMessage());
            return Http::jsonError('Failed to fetch news.');
        }
    }
    
    private function fetchSecFilings($symbol)
    {
        $cik = $this->getCikFromSymbol($symbol);
        if (!$cik) {
            log_message('error', "❌ No CIK found for {$symbol}");
            return [];
        }

        $url="https://www.sec.gov/Archives/edgar/data/{$cik}/index.json";
        log_message('info', "📡 Fetching SEC filings for {$symbol} using CIK: {$cik}");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['User-Agent: MyMIWallet (support@mymiwallet.com)']);
        $response = curl_exec($ch);
        curl_close($ch);

        if (!$response) {
            log_message('error', "❌ Failed to fetch SEC data for {$symbol}");
            return [];
        }

        $data = json_decode($response, true);
        return $this->parseFilings($data);
    } 

    /**
     * Force fetch new emails and process them into trade alerts.
     */
    public function forceFetchEmails()
    {
        try {
            log_message('info', '⚡ forceFetchEmails - Triggered.');
            $fetchSuccess = $this->alertManager->fetchAndStoreEmails();
    
            if ($fetchSuccess) {
                log_message('info', '✅ Emails fetched and processed successfully.');
                return $this->respond(['status' => 'success', 'message' => 'Emails fetched and processed successfully']);
            } else {
                log_message('info', '⚠️ No new emails found in the inbox.');
                return $this->respond(['status' => 'error', 'message' => 'No new emails found'], 200);
            }
    
        } catch (\Exception $e) {
            log_message('error', '❌ forceFetchEmails - Error: ' . $e->getMessage());
            return $this->respond(['status' => 'error', 'message' => 'Error fetching emails: ' . $e->getMessage()], 500);
        }
    }    
    
    public function forceFetchTickers()
    {
        try {
            log_message('info', '⚡ forceFetchTickers - Triggered.');
    
            // 🚀 Limit to 200 tickers per execution to prevent overload
            $scrapedRecords = $this->alertsModel->getPendingScraperRecords(200);
    
            if (empty($scrapedRecords)) {
                log_message('info', '✅ No new tickers found in scraper data.');
                return $this->respond(['status' => 'error', 'message' => 'No new tickers found.'], 200);
            }
    
            foreach ($scrapedRecords as $record) {
                $symbols = $this->alertsModel->extractSymbolsFromText($record['email_subject'] . ' ' . $record['email_body']);
    
                if (empty($symbols)) {
                    log_message('warning', "⚠️ No valid symbols found in email ID: {$record['id']}. Skipping.");
                    continue;
                }
    
                foreach ($symbols as $symbol) {
                    if (!$this->alertsModel->tickerExists($symbol)) {
                        // 🚀 Only fetch market data if the ticker is NEW
                        $marketData = $this->alertsModel->fetchMarketData($symbol);
    
                        // 🚀 Insert the ticker even if market data is missing
                        $this->alertsModel->insertTicker($symbol, $marketData);
                    }
                }
    
                // 🚀 Mark processed only if tickers were inserted
                $this->alertsModel->markScraperRecordProcessed($record['id']);
            }
    
            log_message('info', '✅ Successfully processed tickers from scraper.');
            return $this->respond(['status' => 'success', 'message' => 'Tickers processed successfully.']);
    
        } catch (\Exception $e) {
            log_message('error', '❌ forceFetchTickers - Error: ' . $e->getMessage());
            return $this->respond(['status' => 'error', 'message' => 'Error processing tickers: ' . $e->getMessage()], 500);
        }
    }

    public function generateRankedMarketingContent()
    {
        $this->getMyMIMarketing()->generateRankedMarketingContent();

        return $this->respond(['status' => 'success', 'message' => 'Ranked content generated.']);
    }

    public function generateAdvisorVoiceover($userId)
    {
        try {
            $package = $this->getMyMIAdvisor()->prepareAdvisorMediaPackage($userId);
            $package['voiceover_url'] = $this->getMyMIAdvisor()->generateVoiceoverAudio($package['script'], "advisor_notes_user_{$userId}");
            
            // Optionally cache/save this in a DB table or temp file

            return Http::jsonSuccess([
                'status' => 'success',
                'url'    => $package['voiceover_url'],
                'script' => $package['script']
            ]);
        } catch (\Throwable $e) {
            log_message('critical', 'Error generating voiceover: ' . $e->getMessage());
            return Http::jsonSuccess([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
    
    public function generateAdvisorMediaFromAlert($alertId = null)
    {
        try {
            $alertId = (int)($alertId ?? $this->request->getPost('alert_id'));
            if ($alertId <= 0) {
                return Http::jsonSuccess([
                    'status'  => 'error',
                    'message' => 'Missing or invalid alert_id.'
                ], 400);
            }

            // Use the same model you use for management
            $model = new \App\Modules\Management\Models\AlertsModel();
            $alert = $model->db->table('bf_investment_trade_alerts')->where('id', $alertId)->get()->getRowArray();

            if (!$alert) {
                return Http::jsonSuccess([
                    'status'  => 'error',
                    'message' => 'Alert not found.'
                ], 404);
            }

            // Optionally enforce "confirmed" (not status = 'Opened')
            if (strcasecmp($alert['status'] ?? '', 'Opened') === 0) {
                return Http::jsonSuccess([
                    'status'  => 'error',
                    'message' => 'This alert is pending. Confirm it before generating media.'
                ], 400);
            }

            // Build a compact payload for the advisor library (extend as needed)
            $payload = [
                'id'             => $alert['id'],
                'ticker'         => $alert['ticker'],
                'exchange'       => $alert['exchange'] ?? 'UNKNOWN',
                'category'       => $alert['category'] ?? '',
                'current_price'  => $alert['price'] ?? null,
                'entry_price'    => $alert['entry_price'] ?? null,
                'target_price'   => $alert['target_price'] ?? null,
                'stop_loss'      => $alert['stop_loss'] ?? null,
                'details'        => $alert['details'] ?? '',
                'tv_title'       => $alert['tv_title'] ?? '',
                'tv_description' => $alert['tv_description'] ?? '',
                'chart_link'     => $alert['chart_link'] ?? '',
                'chart_image'    => $alert['chart_image'] ?? '',
                'submitted_date' => $alert['submitted_date'] ?? $alert['created_on'] ?? null,
            ];

            // Generate media (customize inside your library as needed)
            $advisor = new \App\Libraries\MyMIAdvisor();
            $media = $advisor->generateMediaFromAlert($payload) ?? [];

            // Optional: also export CapCut JSON and zip bundle
            $media['capcut_json_url'] = $advisor->exportCapCutJsonTemplate($media) ?? '';
            $media['zip_url']         = $advisor->packageAdvisorMediaAsZip($media) ?? '';

            return Http::jsonSuccess([
                'status' => 'success',
                'media'  => $media
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'generateAdvisorMediaFromAlert error: ' . $e->getMessage());
            return Http::jsonSuccess([
                'status'  => 'error',
                'message' => 'Server error'
            ], 500);
        }
    }

    public function generateAndStoreVoiceover()
    {
        $tradeId = $this->request->getGet('id');

        if (!$tradeId) {
            return $this->respond(['status' => 'error', 'message' => 'Missing tradeId parameter.'], 400);
        }

        // $alert = $this->alertsModel->getAlertById($tradeId);
        $alertHistory = $this->alertsModel->getAlertHistoryById($tradeId);
        if (!$alertHistory || empty($alertHistory['voiceover_script'])) {
            return $this->respond(['status' => 'error', 'message' => 'Voiceover script not found.'], 404);
        }
        $scriptText = $alertHistory['voiceover_script'];


        try {
            $filename = $alertHistory['ticker'] . '-' . date('Ymd-His') . '.mp3';
            $audioUrl = $this->getMyMIMarketing()->generateVoiceoverAudio($scriptText, $filename);

            return $this->respond([
                'status' => 'success',
                'audio_url' => $audioUrl,
                'filename' => $filename
            ]);
        } catch (\Exception $e) {
            log_message('error', '❌ Voiceover Generation Failed: ' . $e->getMessage());
            return $this->respond(['status' => 'error', 'message' => 'Voiceover generation failed.'], 500);
        }
    }

    public function generateSocialMediaPosts()
    {
        $tradeAlerts = $this->alertsModel->getFilteredTradeAlerts(['start' => date('Y-m-d 00:00:00'), 'end' => date('Y-m-d 23:59:59')])->get()->getResultArray();
    
        if (empty($tradeAlerts)) {
            return $this->respond(['status' => 'error', 'message' => 'No trade alerts found for today.'], 404);
        }
    
        $twitterPost = "� **Stock Market Breakout!** �\n";
        $linkedinPost = "� **Today's Top Stock Gainers!** �\n";
        $facebookPost = "� **Today's Stock Market Heat Check!** �\n";
        $discordPost = "� **TRADE ALERTS UPDATE!** �\n";
    
        foreach ($tradeAlerts as $alert) {
            $postLine = "**{$alert['ticker']} ({$alert['company']})** up **{$alert['change']}%**! � Current price: \${$alert['price']}\n";
    
            $twitterPost .= $postLine;
            $linkedinPost .= $postLine;
            $facebookPost .= $postLine;
            $discordPost .= $postLine;
        }
    
        return $this->respond([
            'status' => 'success',
            'social_media' => [
                'twitter' => $twitterPost,
                'linkedin' => $linkedinPost,
                'facebook' => $facebookPost,
                'discord' => $discordPost
            ]
        ]);
    }   

    /**
     * Generate Trade Alert Summary & Video Content
     */
    public function generateTradeAlertSummary()
    {
        $symbol   = $this->request->getPost('symbol');
        $exchange = $this->request->getPost('exchange');
    
        if (!$symbol) {
            log_message('error', 'API/AlertsController L421::Missing symbol in POST request');
            return $this->fail("Missing symbol in request.");
        }
    
        $alert = $this->alertsModel->getAlertBySymbol($symbol);
    
        if (!$alert || !isset($alert['ticker'])) {
            log_message('error', "API/AlertsController L549 - No alert found for symbol: {$symbol}");
            return $this->fail("No alert found for symbol: {$symbol}");
        }
    
        // 🔍 Log POST fields
        log_message('debug', 'Incoming POST - symbol: ' . $symbol);
        log_message('debug', 'Received POST exchange: ' . $exchange);
        log_message('debug', 'Incoming POST - strategy: ' . $this->request->getPost('strategy'));
        log_message('debug', 'Incoming POST - note: ' . $this->request->getPost('note'));
        log_message('debug', 'Incoming POST - chart: ' . $this->request->getPost('chart'));
        log_message('debug', 'Incoming POST - trade_summary: ' . $this->request->getPost('trade_summary'));
    
        // ✅ Initial merging of POST fields
        $alert['entry_price']        = $this->request->getPost('entry_price') ?? 'N/A';
        $alert['target_price']       = $this->request->getPost('target_price') ?? 'N/A';
        $alert['stop_loss']          = $this->request->getPost('stop_loss') ?? 'N/A';
        $alert['chart_link']         = $this->request->getPost('chart') ?? '';
        $alert['trade_chart_link']   = $alert['chart_link'];
        $alert['strategy']           = $this->request->getPost('strategy') ?? '';
        $alert['note']               = $this->request->getPost('note') ?? '';
        $alert['trade_summary']      = $this->request->getPost('trade_summary') ?? ($alert['trade_summary'] ?? '');
        $alert['ticker']             = $this->request->getPost('symbol') ?? $alert['ticker'];
        $alert['symbol']             = $alert['ticker'];
        $alert['exchange']           = $exchange ?? ($alert['exchange'] ?? '');
        $alert['company']            = $this->request->getPost('company') ?? ($alert['company'] ?? '');
        $alert['category']           = $this->request->getPost('category') ?? ($alert['category'] ?? 'Unknown');
        $alert['market_sentiment']   = $this->request->getPost('market_sentiment') ?? ($alert['market_sentiment'] ?? 'N/A');
        $alert['trade_type']         = $this->request->getPost('trade_type') ?? ($alert['trade_type'] ?? 'Stock');
        $alert['alert_priority']     = $this->request->getPost('alert_priority') ?? ($alert['alert_priority'] ?? 'Normal');
        $alert['gptTradeTemplate']   = $this->sanitizeText($this->request->getPost('gptTradeTemplate')) ?? ($alert['trade_summary'] ?? '');
    
        // ✅ Ensure all text is clean UTF-8
        foreach (['strategy', 'note', 'trade_summary', 'gptTradeTemplate'] as $key) {
            $alert[$key] = mb_convert_encoding($alert[$key], 'UTF-8', 'UTF-8');
        }
    
        // 📰 Scrape TradingView data
        $tvData = $this->scrapeTradingViewContent($alert['symbol'], $alert['exchange']);
        log_message('debug', 'API/AlertsController L488 - TradingView Data: ' . (print_r($tvData, true)));
    
        $alert['tv_financials'] = $tvData['financials'] ?? '';
        $alert['tv_news']       = $tvData['news'] ?? '';
        $alert['tv_technicals'] = $tvData['technicals'] ?? '';
        $alert['tv_options']    = $tvData['options'] ?? '';
    
        // 📈 AlphaVantage Quote
        try {
            $quote = $this->getMyMIAlphaVantage()->getQuote($symbol);
            if ($quote && is_array($quote)) {
                $alert['av_price']       = $quote['price'] ?? null;
                $alert['av_open']        = $quote['open'] ?? null;
                $alert['av_high']        = $quote['high'] ?? null;
                $alert['av_low']         = $quote['low'] ?? null;
                $alert['av_volume']      = $quote['volume'] ?? null;
                $alert['av_prev_close']  = $quote['previous_close'] ?? null;
                $alert['av_change']      = $quote['change'] ?? null;
                $alert['av_change_pct']  = $quote['change_percent'] ?? null;
    
                log_message('debug', '📊 AlphaVantage Quote: ' . print_r($quote, true));
            } else {
                log_message('warning', "⚠️ No AlphaVantage data for symbol: {$symbol}");
            }
        } catch (\Throwable $e) {
            log_message('error', "🚨 AlphaVantage Exception: {$e->getMessage()}");
        }
    
        // 🧽 Final clean pass
        foreach ([
            'entry_price', 'target_price', 'stop_loss', 'chart_link',
            'strategy', 'note', 'trade_summary', 'gptTradeTemplate',
            'company', 'category', 'market_sentiment', 'trade_type', 'alert_priority'
        ] as $field) {
            $alert[$field] = $this->cleanText($alert[$field] ?? '');
        }
    
        $alert['symbol']   = strtoupper($symbol);
        $alert['exchange'] = strtoupper($exchange ?? $alert['exchange']);
    
        // 🧠 NLP Summary
        try {
            log_message('debug', '🧠 Running NLP Summarization...');
            $summary = $this->MyMIMarketing->generateSummaryFromAlert($alert);
            if (!mb_check_encoding($summary, 'UTF-8')) {
                log_message('error', '❌ Invalid UTF-8 in summary!');
                return $this->fail("Invalid UTF-8 characters in summary.");
            }
    
            $response = [
                'status' => 'success',
                'summary' => $summary,
                'template' => [
                    'ticker'   => $alert['ticker'],
                    'strategy' => $alert['strategy'],
                    'summary'  => $summary,
                    'note'     => $alert['note'],
                    'chart'    => $alert['chart_link'],
                ],
                'alphaVantage' => $quote ?? [],
                'tradingView' => $tvData ?? []
            ];
    
            // 💾 (Optional) Store enrichment snapshot
            // $this->alertsModel->storeEnrichment([...]);
    
            return Http::jsonSuccess($response, false)->setStatusCode(200, 'OK');
        } catch (\Throwable $e) {
            log_message('error', 'generateTradeAlertSummary() Exception: ' . $e->getMessage());
            return $this->fail("Internal error: " . $e->getMessage());
        }
    }

    public function generateTradeAlertVideos()
    {
        $tradeAlerts = $this->alertsModel->getFilteredTradeAlerts(['start' => date('Y-m-d 00:00:00'), 'end' => date('Y-m-d 23:59:59')])->get()->getResultArray();
        if (empty($tradeAlerts)) {
            return $this->respond(['status' => 'error', 'message' => 'No trade alerts found for today.'], 404);
        }

        foreach ($tradeAlerts as $alert) {
            $videoURL = $this->getMyMIMarketing()->generateTradeAlertVideo($alert);
            $this->alertsModel->updateTradeAlert($alert['id'], ['video_url' => $videoURL]);
            log_message('info', "✅ Video generated for {$alert['ticker']} - URL: {$videoURL}");
        }

        return $this->respond(["status" => "success", "message" => "Trade alert videos generated successfully."]);
    }
    
    public function generateVoiceoverAndMarketingContent($tradeId)
    {
        $tradeAlert = $this->alertsModel->getAlertById((int) $tradeId);
        if (!$tradeAlert) {
            return ['status' => 'error', 'message' => 'No trade alert found for ID: ' . $tradeId];
        }

        $script = "🎙️ **MyMI Trade Alert Breakdown - {$tradeAlert['ticker']}**\n\n";
        $script .= "📈 Company: {$tradeAlert['company']}\n";
        $script .= "Price: \${$tradeAlert['price']}\n";
        $script .= "Market Sentiment: {$tradeAlert['market_sentiment']}\n";
        $script .= "Change: {$tradeAlert['change']}% | Volume: {$tradeAlert['volume']}M\n";
        $script .= "📊 High: \${$tradeAlert['high']} | Low: \${$tradeAlert['low']}\n\n";
        $script .= "{$tradeAlert['details']}\n\n";
        $script .= "✅ Stay tuned for more insights with MyMI Alerts!";

        $marketingContent = $this->getMyMIMarketing()->generateEnhancedContent($script);

        return [
            'status' => 'success',
            'voice_script' => $script,
            'marketing_content' => $marketingContent
        ];
    }

    public function generateVoiceoverScript()
    {
        $tradeAlerts = $this->alertsModel->getFilteredTradeAlerts(['start' => date('Y-m-d 00:00:00'), 'end' => date('Y-m-d 23:59:59')])->get()->getResultArray();

        if (empty($tradeAlerts)) {
            return $this->respond(['status' => 'error', 'message' => 'No trade alerts found for today.'], 404);
        }

        $script = "**Voiceover Script: MyMI Trade Alerts - Top Stock Movers**\n\n[INTRO]\n";
        $script .= "Welcome to today’s MyMI Trade Alerts! We’re breaking down the hottest stocks in the market based on momentum, volume, and breakout potential. Let’s jump right in!\n\n";

        foreach ($tradeAlerts as $alert) {
            $script .= "**[{$alert['ticker']} - {$alert['company']}]**\n";
            $script .= "**Price:** \${$alert['price']}  |  **% Change:** {$alert['change']}%  |  **Volume:** {$alert['volume']}M\n";
            $script .= "� 52-Week High: \${$alert['high']}  |  � 52-Week Low: \${$alert['low']}\n";
            $script .= "Market Cap: {$alert['market_cap']}\n\n";
        }

        $script .= "[OUTRO]\nThat’s it for today’s MyMI Trade Alerts! Don’t forget to like, subscribe, and stay tuned for more market insights. Drop your thoughts in the comments—what’s your top stock pick today? See you in the next update!\n";

        return $this->respond(['status' => 'success', 'script' => $script]);
    }
    
    protected function getAlertBySymbol(array $alerts, string $symbol): ?array
    {
        foreach ($alerts as $alert) {
            if (strtoupper($alert['ticker']) === strtoupper($symbol)) {
                return $alert;
            }
        }
        return null;
    }

    public function getCachedTradeAlerts()
    {
        $cacheKey = sanitizeCacheKey('trade_alerts_list');
        $cachedAlerts = $this->cache->get($cacheKey);
    
        if ($cachedAlerts) {
            return json_decode($cachedAlerts, true);
        }
    
        // Fetch alerts from DB and store in Redis
        $alerts = $this->alertsModel->getFilteredTradeAlerts();
        $this->cache->save($cacheKey, json_encode($alerts), 300); // Cache for 5 mins
    
        return $alerts;
    }

    private function getCikFromSymbol($symbol)
    {
        // Check if the CIK exists in the database (Optional: Can be stored in a tickers table)
        $tickerInfo = $this->alertsModel->getTickerBySymbol($symbol);
        if ($tickerInfo && !empty($tickerInfo->cik)) {
            return str_pad($tickerInfo->cik, 10, '0', STR_PAD_LEFT);
        }

        // If not found, fetch from SEC API (CIK Lookup)
        $searchUrl = "https://www.sec.gov/cgi-bin/browse-edgar?CIK={$symbol}&count=1&output=json";
        $response = file_get_contents($searchUrl);
        $json = json_decode($response, true);

        if (!empty($json['companyFilings'])) {
            return str_pad($json['companyFilings'][0]['CIK'], 10, '0', STR_PAD_LEFT);
        }

        return null;
    }
        
    /**
     * Generate a date range array based on a timeRange string.
     *
     * @param string $timeRange
     * @return array|null
     */
    private function getDateRange(string $timeRange): ?array
    {
        $now = new DateTime();
        $start = null;
        $end = null;

        switch ($timeRange) {
            case 'today':
                $start = $now->format('Y-m-d 00:00:00');
                $end = $now->format('Y-m-d 23:59:59');
                break;

            case 'yesterday':
                $now->modify('-1 day');
                $start = $now->format('Y-m-d 00:00:00');
                $end = $now->format('Y-m-d 23:59:59');
                break;

            case 'this_week':
                $start = (clone $now)->modify('monday this week')->format('Y-m-d 00:00:00');
                $end = (clone $now)->modify('sunday this week')->format('Y-m-d 23:59:59');
                break;

            case 'last_week':
                $start = (clone $now)->modify('monday last week')->format('Y-m-d 00:00:00');
                $end = (clone $now)->modify('sunday last week')->format('Y-m-d 23:59:59');
                break;

            case 'this_month':
                $start = $now->format('Y-m-01 00:00:00');
                $end = $now->format('Y-m-t 23:59:59');
                break;

            case 'last_month':
                $start = (clone $now)->modify('first day of last month')->format('Y-m-d 00:00:00');
                $end = (clone $now)->modify('last day of last month')->format('Y-m-d 23:59:59');
                break;

            case 'this_quarter':
                $month = (int) $now->format('n');
                $quarterStartMonth = 3 * (ceil($month / 3) - 1) + 1;
                $start = (new DateTime("first day of $quarterStartMonth month this year"))->format('Y-m-d 00:00:00');
                $end = (new DateTime("last day of $quarterStartMonth month +2 months this year"))->format('Y-m-d 23:59:59');
                break;

            case 'last_quarter':
                $month = (int) $now->format('n');
                $lastQuarterStartMonth = 3 * (ceil($month / 3) - 2);
                $start = (new DateTime("first day of $lastQuarterStartMonth month this year"))->modify('-3 months')->format('Y-m-d 00:00:00');
                $end = (new DateTime("last day of $lastQuarterStartMonth month +2 months this year"))->modify('-3 months')->format('Y-m-d 23:59:59');
                break;

            case 'this_year':
                $start = $now->format('Y-01-01 00:00:00');
                $end = $now->format('Y-12-31 23:59:59');
                break;

            case 'last_year':
                $year = (int) $now->format('Y') - 1;
                $start = "$year-01-01 00:00:00";
                $end = "$year-12-31 23:59:59";
                break;

            default:
                log_message('error', "❌ getDateRange - Invalid timeRange received: {$timeRange}");
                return null;
        }

        //log_message('info', "✅ getDateRange - Returning range for {$timeRange}: Start={$start}, End={$end}");
        return ['start' => $start, 'end' => $end];
    }  
    
    private function getDateRangeFromTimeRange($timeRange)
    {
        $now = new DateTime();
        $start = null;
        $end = null;
    
        switch ($timeRange) {
            case 'today':
                $start = $now->format('Y-m-d 00:00:00');
                $end = $now->format('Y-m-d 23:59:59');
                break;
    
            case 'yesterday':
                $start = $now->modify('-1 day')->format('Y-m-d 00:00:00');
                $end = $now->format('Y-m-d 23:59:59');
                break;
    
            case 'this_week':
                $start = $now->modify('last Sunday')->format('Y-m-d 00:00:00');
                $end = $now->modify('next Saturday')->format('Y-m-d 23:59:59');
                break;
    
            case 'last_week':
                $start = $now->modify('last Sunday -7 days')->format('Y-m-d 00:00:00');
                $end = $now->modify('next Saturday -7 days')->format('Y-m-d 23:59:59');
                break;
    
            case 'this_month':
                $start = $now->format('Y-m-01 00:00:00');
                $end = $now->format('Y-m-t 23:59:59');
                break;
    
            case 'last_month':
                $start = $now->modify('first day of last month')->format('Y-m-d 00:00:00');
                $end = $now->modify('last day of last month')->format('Y-m-d 23:59:59');
                break;
    
            case 'this_quarter':
                $month = (int) $now->format('n');
                $quarterStartMonth = 3 * (ceil($month / 3) - 1) + 1;
                $start = (new DateTime("first day of $quarterStartMonth month this year"))->format('Y-m-d 00:00:00');
                $end = (new DateTime("last day of $quarterStartMonth month +2 months this year"))->format('Y-m-d 23:59:59');
                break;
    
            case 'last_quarter':
                $month = (int) $now->format('n');
                $lastQuarterStartMonth = 3 * (ceil($month / 3) - 2);
                $start = (new DateTime("first day of $lastQuarterStartMonth month this year"))->modify('-3 months')->format('Y-m-d 00:00:00');
                $end = (new DateTime("last day of $lastQuarterStartMonth month +2 months this year"))->modify('-3 months')->format('Y-m-d 23:59:59');
                break;
    
            case 'this_year':
                $start = $now->format('Y-01-01 00:00:00');
                $end = $now->format('Y-12-31 23:59:59');
                break;
    
            case 'last_year':
                $year = (int) $now->format('Y') - 1;
                $start = "$year-01-01 00:00:00";
                $end = "$year-12-31 23:59:59";
                break;
    
            default:
                return null;
        }
    
        return ['start' => $start, 'end' => $end];
    }   

    public function getEmaComparison($symbol)
    {
        try {
            $result = $this->alertsModel->fetchAlphaMetrics($symbol); // Your internal logic here

            return Http::jsonSuccess([
                'status' => 'success',
                'data' => $result
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'getEmaComparison() error: ' . $e->getMessage());
            return Http::jsonSuccess([
                'status' => 'error',
                'message' => 'Could not retrieve EMA metrics.'
            ]);
        }
    }

    public function getEmaDataForSymbol()
    {
        $symbol = $this->request->getPost('symbol');
        $exchange = $this->request->getPost('exchange');
    
        if (!$symbol || !$exchange) {
            return $this->failValidationError('Symbol and Exchange are required.');
        }
    
        $emaData = $this->alertsModel->getLatestEmaData($symbol, $exchange); // You'll build this method
    
        return $this->respond([
            'status' => 'success',
            'data' => $emaData
        ]);
    }
    
    public function getEnrichmentHistory($alertId)
    {
        $records = $this->alertsModel->getEnrichmentHistory($alertId); 
    
        return Http::jsonSuccess([
            'status' => 'success',
            'data'   => $records
        ]);
    }    

    /**
     * Process scraped records -> then return DataTables-ready JSON.
     * Honors start/length/order/search and separates totals.
     */
    public function getFilteredAlerts()
    {
        log_message('debug', '⚡ getFilteredAlerts - Request received.');

        if (!$this->alertsModel) {
            log_message('error', '❌ getFilteredAlerts - $this->alertsModel is not initialized.');
            return $this->respond(['error' => 'Internal Server Error: AlertsModel not initialized'], 500);
        }

        $postData    = $this->request->getPost();
        $draw        = (int)($postData['draw'] ?? 1);
        $search      = $this->request->getPost('search');
        $searchValue = is_array($search) ? ($search['value'] ?? '') : '';
        $timeRange   = $this->request->getPost('timeRange') ?? 'today';

        // DataTables paging
        $start       = isset($postData['start'])  ? (int)$postData['start']  : 0;
        $length      = isset($postData['length']) ? (int)$postData['length'] : 50;
        if ($length < 1)  { $length = 10; }
        if ($length > 100){ $length = 100; }

        // DataTables ordering
        $orderInput  = $postData['order'][0] ?? ['column' => 0, 'dir' => 'desc'];
        $orderColIdx = (int)($orderInput['column'] ?? 0);
        $orderDir    = strtolower($orderInput['dir'] ?? 'desc');
        $orderDir    = in_array($orderDir, ['asc','desc'], true) ? $orderDir : 'desc';

        // Filters
        // $timeRange   = $postData['timeRange'] ?? 'today';
        $dateRange   = $this->getDateRange($timeRange);
        if (!$dateRange) {
            log_message('error', "❌ getFilteredAlerts - Invalid date range for timeRange: {$timeRange}");
            return $this->respond(['error' => 'Invalid time range'], 400);
        }

        // $searchValue = $postData['search']['value'] ?? '';          // DataTables global search
        $q           = trim($postData['q'] ?? $searchValue);         // your extra ?q= from the form
        $category    = trim($postData['category'] ?? '');
        $alertCreated = isset($postData['alert_created']) ? (int)$postData['alert_created'] : null; // 1 confirmed, 0 pending

        // Map columns index -> DB field (adjust if your schema differs)
        $columns = [
            0  => 'id',
            1  => 'created_on',
            2  => 'ticker',
            3  => 'exchange',
            4  => 'category',
            5  => 'price',
            6  => 'current_price',          // entry_price alias
            7  => 'id',                     // Δ/% is client derived; keep stable sort
            8  => 'potential_price',        // target
            9  => 'locked_profit_stop',
            10 => 'trailing_stop_percent',
            11 => 'ema_3_8',
            12 => 'ema_8_13',
            13 => 'ema_13_34',
            14 => 'ema_34_48',
            15 => 'ema_consensus',
            16 => 'chart_link',
            17 => 'id'
        ];
        $orderBy = $columns[$orderColIdx] ?? 'created_on';

        // Options for the model
        $opts = [
            'q'             => $q,
            'category'      => $category,
            'alert_created' => $alertCreated,       // can be 0 or 1 or null
            'orderBy'       => $orderBy,
            'orderDir'      => $orderDir,
            'limit'         => $length,
            'offset'        => $start,
        ];

        try {
            // The model returns: data, recordsTotal, recordsFiltered
            $result = $this->alertsModel->getFilteredTradeAlertsServerSide($dateRange, $opts);

            return Http::jsonSuccess([
                'draw'            => $draw,
                'recordsTotal'    => (int)$result['recordsTotal'],
                'recordsFiltered' => (int)$result['recordsFiltered'],
                'data'            => $result['data'],
            ]);
        } catch (\Throwable $e) {
            log_message('error', '❌ getFilteredAlerts - Model error: ' . $e->getMessage());
            return $this->respond(['error' => 'Database error: ' . $e->getMessage()], 500);
        }
    }
    
    public function getFullMetrics()
    {
        $symbol = $this->request->getPost('symbol');
        $exchange = $this->request->getPost('exchange');

        if (!$symbol || !$exchange) {
            return $this->fail("Missing symbol or exchange.");
        }

        $cacheKey = sanitizeCacheKey("av_metrics_{$symbol}_{$exchange}");
        $cache = \Config\Services::cache();

        if ($cache->get($cacheKey)) {
            return $this->respond([
                'status' => 'cached',
                'data' => $cache->get($cacheKey),
            ]);
        }

        try {
            // Core data
            $priceData = $this->getMyMIAlphaVantage()->getCurrentPrice($symbol);
            $emas = $this->getMyMIAlphaVantage()->fetchEMAs($symbol);
            $smas = $this->getMyMIAlphaVantage()->fetchSMAs($symbol);
            $cross = $this->getMyMIAlphaVantage()->detectGoldenCross($symbol);
            $ath = $this->getMyMIAlphaVantage()->getAllTimeHigh($symbol);

            // Indicators (MACD, RSI, BB, ADX, Stoch, etc.)
            $indicators = $this->getMyMIAlphaVantage()->getAllTechnicalIndicators($symbol);

            // MarketAux News Summary
            $news = $this->getMyMIMarketing()->fetchRecentFinancialNews($symbol);

            // Timeframe Stack
            $multiTf = $this->getMyMIAlphaVantage()->getMovingAveragesByTimeframe($symbol);

            $mergedData = array_merge(
                $priceData,
                $emas,
                $smas,
                $indicators,
                [
                    'golden_cross_status' => $cross,
                    'all_time_high' => $ath,
                    'financial_news' => $news['summary'] ?? '',
                    'market_sentiment' => $news['sentiment'] ?? 'Neutral',
                    'multi_timeframe_data' => $multiTf,
                ]
            );

            $cache->save($cacheKey, $mergedData, 3600);

            return $this->respond([
                'status' => 'success',
                'data'   => $mergedData
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'getFullMetrics Error: ' . $e->getMessage());
            return $this->failServerError('Failed to fetch metrics.');
        }
    }

    // API/AlertsController.php
    public function getLatestPrices()
    {
        log_message('debug', 'getLatestPrices - Starting price refresh');

        helper('array');
        $alpha = $this->getMyMIAlphaVantage(); // Use AlphaVantage for market data (not MarketAux)
        $alertsModel = $this->alertsModel;

        $activeAlerts = $alertsModel->getFilteredTradeAlerts();
        if (empty($activeAlerts)) {
            log_message('warning', 'getLatestPrices - No active trade alerts found.');
            return $this->fail('No active trade alerts to process.');
        }

        $symbols = array_unique(array_map('trim', array_column($activeAlerts, 'ticker')));
        $excludedSymbols = ['US', 'USD', 'BTC', 'ETH', ''];
        $symbols = array_values(array_filter($symbols, fn($s) => !in_array(strtoupper($s), $excludedSymbols)));
        $symbols = array_map('strtoupper', $symbols);

        $validUpdates = [];
        $skipped = [];

        // Fetch prices in batch from AlphaVantage
        $batchPrices = $this->getMyMIAlphaVantage()->getBatchPrices($symbols);

        foreach ($symbols as $symbol) {
            $price = $batchPrices[$symbol] ?? null;

            if (empty($price) || !is_numeric($price)) {
                log_message('warning', "getLatestPrices - Skipping {$symbol}, invalid price: {$price}");
                $this->alertsModel->trackFailedTicker($symbol, 'Invalid or missing price returned from AlphaVantage');
                $skipped[] = $symbol;
                continue;
            }
            
            $alert = $this->getAlertBySymbol($activeAlerts, $symbol);
            if (!$alert || !isset($alert['id']) || !is_numeric($alert['id'])) {
                log_message('warning', "getLatestPrices - Skipping update for {$symbol}, missing alert ID.");
                $skipped[] = $symbol;
                continue;
            }

            // Optionally fetch technical indicators and news
            $indicators = $alpha->getAllTechnicalIndicators($symbol);
            $metrics = $alpha->getTechnicalMetrics($symbol)['data'] ?? [];

            $data = [
                'id'     => $alert['id'],
                'price'  => $price,
                'open'   => $metrics['open'] ?? null,
                'high'   => $metrics['high'] ?? null,
                'low'    => $metrics['low'] ?? null,
                'volume' => $metrics['volume'] ?? null,
            ];

            // Append indicators (if available)
            if (is_array($indicators)) {
                foreach ($indicators as $k => $v) {
                    $data[$k] = $v;
                }
            }

            // Append EMAs, SMAs, etc.
            foreach ($metrics as $k => $v) {
                if (!isset($data[$k])) {
                    $data[$k] = $v;
                }
            }

            $validUpdates[] = $data;
        }

        if (empty($validUpdates)) {
            log_message('critical', 'getLatestPrices - No valid data to update after filtering. Skipped: ' . implode(', ', $skipped));
            return $this->respond([
                'status'  => 'warning',
                'updated' => 0,
                'skipped' => $skipped,
                'data'    => []
            ]);
        }

        if (!method_exists($alertsModel, 'updateAlertPrices')) {
            log_message('critical', 'getLatestPrices - Method updateAlertPrices missing in AlertsModel');
            return $this->failServerError('Internal server error: update method missing.');
        }

        $updateCount = $alertsModel->updateAlertPrices($validUpdates);
        log_message('debug', "getLatestPrices - Updated {$updateCount} alerts. Skipped: " . implode(', ', $skipped));

        return $this->respond([
            'status'  => 'success',
            'updated' => $updateCount,
            'skipped' => $skipped,
            'data'    => $validUpdates
        ]);
    }

    // public function getFilteredAlerts()
    // {
    //     log_message('debug', '⚡ getFilteredAlerts - Request received.');
    
    //     $postData = $this->request->getPost();
    //     $timeRange = $postData['timeRange'] ?? 'today';
    
    //     // ✅ Get date range for filtering
    //     $dateRange = $this->getDateRange($timeRange);
    //     if (!$dateRange) {
    //         return Http::jsonSuccess(['error' => 'Invalid time range'])->setStatusCode(400);
    //     }
    
    //     // ✅ Use **pagination** & fetch only necessary columns
    //     $builder = $this->alertsModel->getFilteredTradeAlerts($dateRange)
    //         ->select('id, created_on, ticker, price, details, tv_chart')
    //         ->limit(100); // 🚀 Only fetch 100 at a time
    
    //     // ✅ Order results
    //     $orderColumn = $postData['order'][0]['column'] ?? 'id';
    //     $orderDirection = $postData['order'][0]['dir'] ?? 'desc';
    //     $builder->orderBy($orderColumn, $orderDirection);
    
    //     // ✅ Pagination controls
    //     $start = isset($postData['start']) ? (int)$postData['start'] : 0;
    //     $length = isset($postData['length']) ? (int)$postData['length'] : 100;
    //     $builder->limit($length, $start);
    
    //     // ✅ Fetch results
    //     $data = $builder->get()->getResultArray();
    
    //     return Http::jsonSuccess([
    //         'draw' => $postData['draw'] ?? 1,
    //         'recordsTotal' => $this->alertsModel->countAllResults(),
    //         'recordsFiltered' => count($data),
    //         'data' => $data
    //     ]);
    // }

    /**
     * Fetch SEC filings for a symbol
     */
    public function getSecFilings()
    {
        $symbol = $this->request->getGet("symbol");

        if (!$symbol) {
            return $this->fail("Missing ticker symbol", 400);
        }

        $filings = $this->alertsModel->getFilingsBySymbol($symbol);
        return $this->respond(["status" => "success", "filings" => $filings]);
    }

    public function getTechnicalIndicators()
    {
        $symbol   = $this->request->getPost('symbol');
        $exchange = $this->request->getPost('exchange');
        log_message('info', 'API/AlertsController::getTechnicalIndicators L1069 - $symbol | $exchange: ' . $symbol . ' | ' . $exchange); 
        if (!$symbol || !$exchange) {
            return $this->failValidationError('Symbol and exchange are required.');
        }
        $indicators = $this->getMyMIAlphaVantage()->getTechnicalIndicators($symbol, $exchange);
    
        log_message('info', 'API/AlertsController::getTechnicalIndicators L1069 - $indicators Array: ' . (print_r($indicators, true))); 
        if (!$indicators || !is_array($indicators)) {
            return $this->failServerError('Could not fetch indicators.');
        }
    
        return $this->respond([
            'status' => 'success',
            'data'   => $indicators
        ]);
    }
    
    public function getTopKeywordChart($id)
    {
        try {
            $keywords = $this->marketingModel->getTopKeywordScores($id); // Validate method exists
            return Http::jsonSuccess(['success' => true, 'keywords' => $keywords]);
        } catch (\Throwable $e) {
            log_message('error', 'getTopKeywordChart failed: ' . $e->getMessage());
            return Http::jsonSuccess([
                'success' => false,
                'message' => 'Failed to load keyword data.',
                'error' => $e->getMessage()
            ])->setStatusCode(500);
        }
    }

    /**
     * Fetch Trade Alert Details for a given trade ID.
     */
    public function getTradeAlertDetails()
    {
        $tradeId = $this->request->getPost('tradeId');
        if (!$tradeId) {
            return $this->respond(['status' => 'error', 'message' => 'Trade ID is required'], 400);
        }

        $tradeAlert = $this->alertsModel->getAlertById($tradeId);
        if (!$tradeAlert) {
            return $this->respond(['status' => 'error', 'message' => 'Trade alert not found'], 404);
        }

        return $this->respond(['status' => 'success', 'data' => $tradeAlert]);
    }   

    public function hideTradeAlert()
    {
        $alertId = $this->request->getPost('alert_id');

        if (!$alertId) {
            return $this->respond(['status' => 'error', 'message' => 'Invalid trade alert ID'], 400);
        }

        $updated = $this->alertsModel->hideTradeAlert($alertId);

        if ($updated) {
            return $this->respond(['status' => 'success', 'message' => 'Trade alert hidden successfully.']);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'Failed to hide trade alert.'], 500);
        }
    }
    
    /**
     * API endpoint to generate randomized marketing content for a trade alert.
     * Expects a trade alert ID via GET or POST parameter "trade_id".
     * This endpoint ONLY returns the generated content and does not store it.
     */
    public function manageTradeAlert()
    {
        log_message('debug', 'CSRF Token Debug - Incoming Request: ' . print_r($this->request->getPost(), true));
    
        $tradeId = $this->request->getGet('trade_id') ?? $this->request->getPost('trade_id');
        if (!$tradeId) {
            return $this->fail('Trade ID is required', 400);
        }
    
        $tradeAlert = $this->alertsModel->getAlertById($tradeId);
        if (!$tradeAlert) {
            return $this->failNotFound("Trade alert not found for ID: {$tradeId}");
        }
    
        // Fetch existing content if it exists
        $existingContent = $this->alertsModel->getMarketingContentByTradeId((int)$tradeId);
    
        // Generate new marketing content
        $socialContent = $this->getMyMIMarketing()->generateRandomMarketingContent((array)$tradeAlert);
        $emailContent = $this->getMyMIMarketing()->generateTradeAlertEmailContent((array)$tradeAlert);
        $blogContent = $this->getMyMIMarketing()->generateTradeAlertBlogContent((array)$tradeAlert);
        $voiceoverScript = $this->getMyMIMarketing()->generateTradeAlertVoiceoverScriptContent((array)$tradeAlert);
    
        $response = [
            'status' => 'success',
            'social_media' => [
                'twitter'  => $socialContent['twitter'] ?? '',
                'facebook' => $socialContent['facebook'] ?? '',
                'linkedin' => $socialContent['linkedin'] ?? '',
                'discord'  => $socialContent['discord'] ?? '',
            ],
            'email_content'    => $emailContent ?? '',
            'blog_content'     => $blogContent ?? '',
            'voiceover_script' => $voiceoverScript ?? '',
            'details'          => $tradeAlert['trade_description'] ?? '',
        ];
    
        log_message('debug', '✅ Returning API Response: ' . print_r($response, true));
    
        return $this->respond($response);
    }
 

    /**
     * 🔥 Step 7: Mark alert as sent and trigger email notification
     * ✅ Called from Zapier
     */
    public function markAlertAsSentAndSendEmail($tradeId)
    {
        log_message('info', '⚡ markAlertAsSentAndSendEmail() - Initiated.');
        log_message('info', '⚡ $tradeId(): ' . $tradeId);

        // $tradeId = $this->request->getPost('trade_id');
        if (!$tradeId) {
            log_message('error', '❌ markAlertAsSentAndSendEmail() - Trade ID is required.');
            return $this->respond(['status' => 'error', 'message' => 'Trade ID is required'], 400);
        }

        // Fetch latest alert history record
        $alertHistory = $this->alertsModel->getLatestAlertHistory($tradeId);
        if (!$alertHistory) {
            log_message('error', "❌ markAlertAsSentAndSendEmail() - No alert history found for Trade ID: {$tradeId}");
            return $this->respond(['status' => 'error', 'message' => "No alert history found for Trade ID: {$tradeId}"], 404);
        }

        // Update the alert history to mark as sent
        $updateData = [
            'email_sent' => 1,
            'sent_on' => date('Y-m-d H:i:s')
        ];
        $updated = $this->alertsModel->updateAlertHistory($alertHistory['id'], $updateData);

        if ($updated) {
            log_message('info', "✅ markAlertAsSentAndSendEmail() - Alert marked as sent. Trade ID: {$tradeId}");

            // 🚀 Trigger email sending process
            $this->sendTradeAlertEmail($tradeId);

            return $this->respond(['status' => 'success', 'message' => 'Trade alert marked as sent and email process initiated.']);
        } else {
            log_message('error', "❌ markAlertAsSentAndSendEmail() - Failed to update email_sent for Trade ID: {$tradeId}");
            return $this->failServerError('Failed to update email_sent.');
        }
    }

    public function postMarketingContentToSocials()
    {
        $response = $this->generateVoiceoverAndMarketingContent();
    
        if (!isset($response['status']) || $response['status'] !== 'success') {
            return $this->respond(['status' => 'error', 'message' => 'Failed to generate content'], 500);
        }
    
//         $this->MyMIMarketing = new MyMIMarketing(); // replaced by BaseController getter
        $result = $this->getMyMIMarketing()->distributeContentToSocialMedia($response['marketing_content']);
    
        return $this->respond([
            'status' => 'success',
            'message' => 'Content posted successfully!',
            'social_media' => $result
        ]);
    }  

    private function parseFilings($data)
    {
        $filings = [];
        if (!isset($data['filings']['recent'])) {
            return [];
        }

        $recentFilings = $data['filings']['recent'];
        for ($i = 0; $i < count($recentFilings['accessionNumber']); $i++) {
            $filings[] = [
                'symbol' => $data['tickers'][0] ?? null,
                'cik' => $data['cik'],
                'accession_number' => $recentFilings['accessionNumber'][$i],
                'filing_date' => $recentFilings['filingDate'][$i],
                'form_type' => $recentFilings['form'][$i],
                'document_url' => "https://www.sec.gov/Archives/edgar/data/{$data['cik']}/{$recentFilings['accessionNumber'][$i]}/{$recentFilings['primaryDocument'][$i]}",
                'created_on' => date("Y-m-d H:i:s"),
            ];
        }

        return $filings;
    }

    public function previewAdvisorVoiceover($userId)
    {
        $media = $this->advisorService->generateAdvisorMediaPackage($userId);

        if (!$media || empty($media['summary'])) {
            return $this->renderTheme('advisor/voiceover_preview', [
                'summary' => 'No advisor summary available.',
                'script' => '',
                'audio' => ''
            ]);
        }

        return $this->renderTheme('advisor/voiceover_preview', [
            'summary' => $media['summary'],
            'script' => $media['script'],
            'audio' => $media['voiceover_url']
        ]);
    }

    /**
     * Process SEC filings for all active tickers
     */
    public function processActiveSecFilings()
    {
        $this->alertManager->processSecFilingsForActiveTickers();
        return $this->respond(["status" => "success", "message" => "SEC filings processed successfully."]);
    }

    /**
     * Centralized function to process alerts (called by API & Scheduler)
     */
    public function processAlerts()
    {
        try {
            log_message('info', '⚡ processAlerts - Initiated.');
    
            // Prevent multiple executions with a lock file
            $lockFile = WRITEPATH . 'cron_locks/processAlerts.lock';
            if (file_exists($lockFile) && (time() - filemtime($lockFile)) < 60) {
                log_message('info', '⏳ Skipping execution. Another process is running.');
                return $this->respond(["status" => "pending", "message" => "Another process is running."], 202);
            }
            file_put_contents($lockFile, time());
    
            log_message('info', '📩 Fetching and storing email alerts...');
            $this->alertManager->fetchAndStoreAlertsEmails();
    
            log_message('info', '📊 Processing trade alerts in batches...');
            $batchSize = 25; // Reduce batch size to optimize memory usage
            $this->alertManager->processTradeAlertsInBatches($batchSize);
    
            log_message('info', '📈 Updating alerts with the latest market data...');
            $this->alertManager->updateAlerts();
    
            unlink($lockFile); // Remove lock file after completion
            log_message('info', '✅ processAlerts - Successfully processed alerts.');
    
            return $this->respond(["status" => "success", "message" => "Alerts processed successfully."]);
    
        } catch (\Exception $e) {
            log_message('error', '❌ processAlerts - Error: ' . $e->getMessage());
    
            if (file_exists($lockFile)) {
                unlink($lockFile);
            }
    
            return $this->respond(["status" => "error", "message" => $e->getMessage()], 500);
        }
    }

     // public function processAlerts()
    // {
    //     try {
    //         log_message('info', '⚡ processAlerts - Initiated.');
    
    //         // Check if another process is already running
    //         $lockFile = WRITEPATH . 'cron_locks/processAlerts.lock';
    //         if (file_exists($lockFile) && (time() - filemtime($lockFile)) < 60) {
    //             log_message('info', '⏳ processAlerts - Skipping execution. Another process is running.');
    //             return $this->respond(["status" => "pending", "message" => "Another process is currently running."], 202);
    //         }
    
    //         // Create lock file to prevent multiple executions
    //         file_put_contents($lockFile, time());
    
    //         // Fetch new alerts from email and queue them
    //         log_message('info', '📩 Fetching and storing email alerts...');
    //         $this->alertManager->fetchAndStoreAlertsEmails();
    
    //         // Process trade alerts in batches (LIMIT API CALLS)
    //         log_message('info', '📊 Processing trade alerts in batches...');
    //         $batchSize = 50; // Adjust to manage API limits
    //         $this->alertManager->processTradeAlertsInBatches($batchSize);
    
    //         // Update alerts with market data
    //         log_message('info', '📈 Updating alerts with latest market data...');
    //         $this->alertManager->updateAlerts();
    
    //         // Remove lock file after execution
    //         unlink($lockFile);
    
    //         log_message('info', '✅ processAlerts - Successfully processed alerts.');
    //         return $this->respond(["status" => "success", "message" => "Alerts processed successfully."]);
    //     } catch (\Exception $e) {
    //         log_message('error', '❌ processAlerts - Error: ' . $e->getMessage());
    
    //         // Ensure lock file is removed even if an error occurs
    //         if (file_exists($lockFile)) {
    //             unlink($lockFile);
    //         }
    
    //         return $this->respond(["status" => "error", "message" => $e->getMessage()], 500);
    //     }
    // }

    public function processEmailAlerts()
    {
        log_message('info', '⚡ processEmailAlerts - Started.');
        try {
            $this->alertsModel->processScrapedSymbols(); // Pulls from bf_investment_scraper and processes alerts
            log_message('info', '✅ processEmailAlerts - Completed.');
            return $this->respond([
                'status' => 'success',
                'message' => 'Trade alerts processed from email data.'
            ]);
        } catch (\Exception $e) {
            log_message('error', '❌ processEmailAlerts - Error: ' . $e->getMessage());
            return $this->respond([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Process the CSV file and save fundamentals in the database
    private function processFundamentals($filePath)
    {
        $csv = array_map('str_getcsv', file($filePath));
        array_shift($csv); // Remove headers
        
        foreach ($csv as $row) {
            $tradeId = $this->matchTradeToFundamentals($row[0]);
            if ($tradeId) {
                $peRatio = $this->calculatePERatio($row[1], $row[2]);
                $pbRatio = $this->calculatePBRatio($row[1], $row[3]);
                $roe = $this->calculateROE($row[1], $row[4]);
                $profitMargin = $this->calculateProfitMargin($row[1], $row[5]);
                $debtToEquity = $this->calculateDebtToEquity($row[6], $row[7]);
                $currentRatio = $this->calculateCurrentRatio($row[8], $row[9]);
                $quickRatio = $this->calculateQuickRatio($row[8], $row[10]);
                $epsGrowth = $this->calculateEPSGrowth($row[11], $row[12]);
                $freeCashFlow = $this->calculateFreeCashFlow($row[13], $row[14]);
    
                $data = [
                    'trade_id' => $tradeId,
                    'metric' => $row[0],
                    'current_value' => $row[1],
                    'yoy_change' => $row[2],
                    'year_2020' => $row[3],
                    'year_2021' => $row[4],
                    'year_2022' => $row[5],
                    'year_2023' => $row[6],
                    'year_2024' => $row[7],
                    'pe_ratio' => $peRatio,
                    'pb_ratio' => $pbRatio,
                    'roe' => $roe,
                    'profit_margin' => $profitMargin,
                    'debt_to_equity' => $debtToEquity,
                    'current_ratio' => $currentRatio,
                    'quick_ratio' => $quickRatio,
                    'eps_growth' => $epsGrowth,
                    'free_cash_flow' => $freeCashFlow
                ];
                $this->AlertsModel->insertFundamentalData($data);
            }
        }
    }

    public function processSecFilings($symbol)
    {
        log_message('info', "Checking SEC filings for {$symbol}");

        // Check if filings already exist
        $existingFilings = $this->alertsModel->getFilingsBySymbol($symbol);
        if (!empty($existingFilings)) {
            log_message('info', "SEC filings already exist for {$symbol}. Skipping fetch.");
            return;
        }

        // Fetch CIK
        $cik = $this->MyMISEC->getCikFromSymbol($symbol);
        if (!$cik) {
            log_message('error', "No CIK found for {$symbol}");
            return;
        }

        // Fetch Filings
        $filingsData = $this->MyMISEC->getSecFilingsByCik($cik);
        $filings = $this->MyMISEC->parseFilings($filingsData);

        // Store Filings
        foreach ($filings as $filing) {
            $this->alertsModel->insertFiling($filing);
            log_message('info', "Stored new SEC filing: {$filing['form_type']} on {$filing['filing_date']} for {$symbol}");
        }
    }

    public function processTradeAlerts()
    {
        log_message('info', "⚡ processTradeAlerts - Initiating batch processing.");
    
        // Fetch the last processed alert timestamp
        $lastProcessed = $this->db->table('bf_investment_alert_history')
            ->select('last_alert_processed')
            ->orderBy('last_alert_processed', 'DESC')
            ->limit(1)
            ->get()
            ->getRow();
    
        $lastTimestamp = $lastProcessed ? $lastProcessed->last_alert_processed : '1970-01-01 00:00:00';
    
        // Process only alerts newer than the last processed timestamp
        $alerts = $this->db->table('bf_investment_trade_alerts')
            ->where('created_on >', $lastTimestamp)
            ->where('status', 'In Review')
            ->limit(50)  // 🚀 Process only 50 at a time
            ->get()
            ->getResultArray();
    
        if (empty($alerts)) {
            log_message('info', "✅ No new trade alerts found.");
            return;
        }
    
        foreach ($alerts as $alert) {
            log_message('info', "📊 Processing alert for {$alert['ticker']}");
    
            // Update the alert status
            $this->db->table('bf_investment_trade_alerts')
                ->where('id', $alert['id'])
                ->update(['status' => 'Processed']);
    
            // ✅ Store progress in history table
            $this->db->table('bf_investment_alert_history')->insert([
                'ticker' => $alert['ticker'],
                'alerted_on' => date('Y-m-d H:i:s'),
                'last_alert_processed' => date('Y-m-d H:i:s'),
                'processing_status' => 'Completed'
            ]);
        }
    
        log_message('info', "✅ processTradeAlerts - Completed batch processing.");
    }    
    
    public function processTradeBatch()
    {
        $offset = (int) $this->request->getPost('offset');
        $limit = (int) $this->request->getPost('batchSize');

        $batch = $this->alertsModel->getBatchTradeAlerts($offset, $limit);

        if (empty($batch)) {
            return Http::jsonSuccess(['status' => 'done', 'reachedEnd' => true]);
        }

        $this->alertsModel->fetchBatchMarketData($batch);
        return Http::jsonSuccess(['status' => 'processed', 'reachedEnd' => false]);
    }
    
    private function sanitizeText(?string $text): string
    {
        $text = $text ?? '';
        $text = strip_tags($text);
        $text = preg_replace('/[^\PC\s]/u', '', $text); // remove emoji/unicode
        return mb_convert_encoding($text, 'UTF-8', 'UTF-8');
    }
    
    protected function scrapeTradingViewContent(string $symbol, string $exchange): array
    {
        helper(['text']);
        $baseUrl = "https://www.tradingview.com/symbols/{$exchange}-{$symbol}";
        $endpoints = [
            'financials'  => "{$baseUrl}/financials-overview/",
            'news'        => "{$baseUrl}/news/",
            'technicals'  => "{$baseUrl}/technicals/",
            'options'     => "{$baseUrl}/options/"
        ];
    
        $results = [];
    
        foreach ($endpoints as $type => $url) {
            try {
                log_message('debug', "🔍 Scraping TradingView: {$url}");
                $html = @file_get_contents($url);
                if ($html === false) {
                    throw new \Exception("Unable to fetch URL: {$url}");
                }
    
                // Extract readable text (remove script/style/html tags)
                $doc = new \DOMDocument();
                libxml_use_internal_errors(true);
                $doc->loadHTML($html);
                libxml_clear_errors();
                $text = strip_tags($doc->textContent ?? '');
                $cleaned = trim(str_replace(["\r", "\n", "\t"], ' ', $text));
                $results[$type] = word_limiter($cleaned, 150, '...');
            } catch (\Throwable $e) {
                log_message('error', "❌ Failed to scrape {$type}: " . $e->getMessage());
                $results[$type] = "[Error] {$e->getMessage()}";
            }
        }
    
        return $results;
    }
    
    public function sendAdvisorMediaToZapier($userId)
    {
        $media = $this->advisorService->generateAdvisorMediaPackage($userId);
        if (!$media) {
            return $this->fail('Advisor media package not available.');
        }

        $sent = $this->advisorService->sendMediaToZapier($media);
        return $sent
            ? $this->respond(['status' => 'success', 'message' => 'Media sent to Zapier.'])
            : $this->fail('Failed to send media to Zapier.');
    }

    /**
     * Distribute Trade Alert - All Channels
     */
    public function sendAlert() {
        log_message('info','⚡ sendAlert() - Initiated.');
        $tradeId = $this->request->getPost('trade_id');
        
        if (!$tradeId) {
            log_message('error','❌ sendAlert() - Trade ID is required.');
            return $this->respond(['status'=>'error','message'=>'Trade ID is required'], 400);
        }
    
        $alertHistory = $this->alertsModel->getLatestAlertHistory($tradeId);
        if (!$alertHistory) {
            log_message('error',"❌ sendAlert() - No alert history found for Trade ID: {$tradeId}");
            return $this->respond(['status'=>'error','message'=>"No alert history found for Trade ID: {$tradeId}"], 404);
        }
    
        $updateData = ['send_alert' => 1, 'sent_on' => date('Y-m-d H:i:s')];
        $updated = $this->alertsModel->updateAlertHistory($alertHistory['id'], $updateData);
    
        if ($updated) {
            log_message('info',"✅ sendAlert() - Alert marked for sending. Trade ID: {$tradeId}");
            return $this->respond(['status'=>'success','message'=>'Trade alert marked for distribution.']);
        } else {
            log_message('error',"❌ sendAlert() - Failed to update send_alert for Trade ID: {$tradeId}");
            return $this->failServerError('Failed to update send_alert.');
        }
    }

    public function sendDiscordAlerts() {
        if ($response = $this->enforceCronKey()) {
            return $response;
        }
        $alerts = $this->alertsModel->getAlertsWithNewTVChart();
        if (empty($alerts)) {
            return $this->respond(["status" => "error", "message" => "No new alerts to send."], 400);
        }
        foreach ($alerts as $alert) {
            $this->alertManager->sendDiscordNotification($alert);
        }
        return $this->respond(["status" => "success", "message" => "Discord notifications sent!"]);
    }
    
    public function sendDiscordAlertsBySymbol($symbol)
    {
        if ($response = $this->enforceCronKey()) {
            return $response;
        }
        // Fetch alert details based on the symbol
        $alert = $this->alertsModel->getAlertBySymbolExt($symbol);
    
        if (!$alert) {
            return $this->respond(["status" => "error", "message" => "No alert found for symbol: $symbol"], 404);
        }
    
        // Send the Discord notification
        $this->alertManager->sendDiscordNotification($alert);
    
        return $this->respond(["status" => "success", "message" => "Discord notification sent for symbol: $symbol"]);
    }

    private function enforceCronKey(): ?ResponseInterface
    {
        $cfg = config(ApiKeys::class);
        $key = $this->request->getHeaderLine($cfg->cronHeader) ?: $this->request->getGet('cronKey');

        if ($cfg->alertsCronKey === '' || $key === '' || !hash_equals($cfg->alertsCronKey, (string) $key)) {
            log_message('warning', '🚫 AlertsController cron endpoint blocked - invalid or missing token.');
            return $this->response->setStatusCode(403)->setJSON([
                'status' => 'error',
                'message' => 'Forbidden',
            ]);
        }

        return null;
    }

    private function sendEmailToList($email, $tradeAlert, $tier) {
        $emailService = service('email');
        $chartLink = $this->getChartImage($tradeAlert, $tier);
    
        $emailService->setTo($email);
        $emailService->setSubject("🚀 Trade Alert - {$tradeAlert['ticker']} ({$tier} Alert)");
        $emailService->setMessage("
            🔹 **Ticker:** {$tradeAlert['ticker']}
            🔹 **Price:** {$tradeAlert['price']}
            🔹 **Sentiment:** {$tradeAlert['market_sentiment']}
            📊 **Chart:** <a href='{$chartLink}'>View Here</a>
        ");
        $emailService->send();
    }    
    
    /**
     * Distribute Trade Alert Emails
     */


    /**
     * 📩 Sends trade alert email
     */
    private function sendTradeAlertEmail($tradeId)
    {
        log_message('info', "\ud83d\udce8 Sending trade alert email for Trade ID: {$tradeId}");

        // Fetch trade alert details
        $tradeAlert = $this->alertsModel->getAlertById($tradeId);
        if (!$tradeAlert) {
            log_message('error', "\u274c sendTradeAlertEmail() - Trade alert not found for Trade ID: {$tradeId}");
            return false;
        }

        // Fetch proper CodeIgniter email service
        $emailService = \Config\Services::email();

        // Set email parameters correctly using setFrom()
        $emailService->setFrom('alerts@mymiwallet.com', 'MyMI Wallet Alerts');
        $recipients = $this->alertsModel->getSubscribedUserEmails();
        $emails = array_column($recipients, 'email');
        $emailService->setTo(array_shift($emails));
        if (!empty($emails)) {
            $emailService->setBCC($emails);
        }

        $emailService->setSubject("\ud83d\ude80 Trade Alert - {$tradeAlert['ticker']} Buy Signal!");

        // Compose message body
        $messageBody = "
            <p>\ud83d\udd39 <strong>Ticker:</strong> {$tradeAlert['ticker']}</p>
            <p>\ud83d\udd39 <strong>Price:</strong> \${$tradeAlert['price']}</p>
            <p>\ud83d\udd39 <strong>Sentiment:</strong> {$tradeAlert['market_sentiment']}</p>
            <p>\ud83d\udcca <strong>Preview:</strong><br><img src='{$tradeAlert['trade_chart_link']}' alt='{$tradeAlert['ticker']} Chart Preview' style='max-width: 100%; height: auto;' /></p>
            <p>\ud83d\udcca <strong>Chart:</strong> <a href='{$tradeAlert['trade_chart_link']}'>View Here</a></p>
            <hr>
            <p><strong>Details:</strong><br>{$tradeAlert['email_content']}</p>
        ";

        $emailService->setMessage($messageBody);
        $emailService->setMailType('html');

        if ($emailService->send()) {
            log_message('info', "\u2705 sendTradeAlertEmail() - Trade alert email sent for Trade ID: {$tradeId}");
            return true;
        } else {
            log_message('error', "\u274c sendTradeAlertEmail() - Failed to send email for Trade ID: {$tradeId}. Debug: " . print_r($emailService->printDebugger(['headers', 'subject', 'body']), true));
            return false;
        }
    }
    
     // public function sendTradeAlertEmails()
    // {
    //     $tradeAlerts = $this->alertsModel->getPendingTradeAlerts();
    //     foreach ($tradeAlerts as $alert) {
    //         $emailService = service('email');
    //         $emailService->setTo('subscribers@mymiwallet.com');
    //         $emailService->setSubject("🚀 Trade Alert - {$alert['ticker']} Buy Signal!");
    //         $emailService->setMessage("
    //             {$alert['ticker']} trade alert detected. \n
    //             📊 Price: {$alert['price']} | % Change: {$alert['change']}% \n
    //             🔗 Read full analysis here: https://www.mymiwallet.com/trade-alerts
    //         ");
    //         $emailService->send();
    //         log_message('info', "✅ Trade Alert Email Sent for {$alert['ticker']}");
    //     }

    //     return $this->respond(["status" => "success", "message" => "Trade alert emails sent successfully."]);
    // }

    /**
     * API endpoint to store marketing content for a trade alert.
     * This method expects a trade alert ID via POST (and optionally the content fields).
     * If the content fields are not provided (or are empty), the method will generate the content.
     */
    public function storeMarketingContent()
    {
        log_message('debug', '🚀 Incoming Request Data: ' . print_r($this->request->getPost(), true));
    
        $tradeId = trim($this->request->getPost('trade_id') ?? '');
        if ($tradeId === '') {
            log_message('error', '❌ Trade ID is missing!');
            return $this->fail('Trade ID is required', 400);
        }
    
        $tradeAlert = $this->alertsModel->getAlertById($tradeId);
        if (!$tradeAlert) {
            log_message('error', "❌ Trade alert not found for ID: {$tradeId}");
            return $this->failNotFound("Trade alert not found for ID: {$tradeId}");
        }
    
        // 📌 Extract relevant data
        $ticker = strtoupper(trim($tradeAlert['ticker'] ?? 'N/A'));
        // 📉 Save TradingView Chart Image (if available)
        $chartFile = null;
        $chartUrl = trim($tradeAlert['tv_chart'] ?? $tradeAlert['tv_chart_link'] ?? '');
        if (!empty($chartUrl)) {
            $chartFile = $this->getMyMIMarketing()->saveTradingViewChart($chartUrl, $tradeAlert['ticker']);
            log_message('info', $chartFile ? "✅ Chart image saved: {$chartFile}" : "❌ Chart image save failed");
        }
    
        // 🔽 Prepare Data for Storage
        $data = [
            'trade_id'         => $tradeId,
            'ticker'           => $ticker,
            'social_twitter'   => trim($this->request->getPost('social_twitter') ?? ''),
            'social_facebook'  => trim($this->request->getPost('social_facebook') ?? ''),
            'social_linkedin'  => trim($this->request->getPost('social_linkedin') ?? ''),
            'social_discord'   => trim($this->request->getPost('social_discord') ?? ''),
            'email_content'    => trim($this->request->getPost('email_content') ?? ''),
            'blog_content'     => trim($this->request->getPost('blog_content') ?? ''),
            'voiceover_script' => trim($this->request->getPost('voiceover_script') ?? ''),
            'details'          => trim($this->request->getPost('override_details') ?? ''),
            'chart_image'      => $chartFile,  // 🔹 Store image filename instead of URL
            'created_on'       => date("Y-m-d H:i:s"),
            'updated_on'       => date("Y-m-d H:i:s")
        ];
    
        // 🛑 Log if any critical field is missing
        foreach ($data as $key => $value) {
            if ($key !== 'details' && empty($value)) {
                log_message('warning', "⚠️ Missing field: '$key' is empty.");
            }
        }
    
        log_message('debug', '📥 Final Data to Store: ' . print_r($data, true));
    
        // 🗄️ Insert into database and handle errors
        $result = $this->alertsModel->storeAlertHistory($data);
    
        if ($result) {
            log_message('info', "✅ Marketing content stored successfully for Trade ID: {$tradeId}");
            return $this->respond([
                'status'  => 'success',
                'message' => 'Marketing content stored successfully.'
            ]);
        } else {
            log_message('error', '❌ Failed to store marketing content.');
            return $this->failServerError('Failed to store marketing content.');
        }
    }
    
    /**
     * Store a new Trade Alert in the system.
     */
    public function submitTradeAlert()
    {
        $data = $this->request->getPost();
        if (empty($data['symbol']) || empty($data['category']) || empty($data['market_session'])) {
            return $this->respond(['status' => 'error', 'message' => 'Required fields missing'], 400);
        }

        $alertData = [
            'symbol'          => strtoupper($data['symbol']),
            'description'     => $data['company'] ?? '',
            'category'        => $data['category'],
            'market_session'  => $data['market_session'],
            'price'           => $data['price'] ?? null,
            'volume'          => $data['volume'] ?? null,
            'quote_trend'     => $data['quote_trend'] ?? '',
            'net_change'      => $data['net_change'] ?? '',
            'created_on'      => date('Y-m-d H:i:s'),
            'status'          => 'Opened'
        ];

        $insertId = $this->alertsModel->insertTradeAlert($alertData);
        if ($insertId) {
            return $this->respond(['status' => 'success', 'message' => 'Trade alert created successfully']);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'Failed to create trade alert'], 500);
        }
    }
    
    public function updateBatchPrices()
    {
        try {
            log_message('info', '🚀 Starting batch price update from AlphaVantage.');
            $updated = $this->getMyMIAlphaVantage()->fetchBatchMarketData();
            return $this->respond(['status' => 'success', 'updated' => $updated]);
        } catch (\Throwable $e) {
            log_message('critical', '❌ updateBatchPrices() failed: ' . $e->getMessage());
            return $this->failServerError('Batch update failed.');
        }
    }
    
    public function updateChartOverride()
    {
        $postData = $this->request->getPost();
        $file = $this->request->getFile("chart_file");
        $symbol = strtoupper(trim($postData["ticker"] ?? ""));
        
        if (!$symbol) {
            return Http::jsonError('Invalid ticker.');
        }
    
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/assets/Charts', $newName);
            $chartType = "file";
            $chartData = "/public/assets/Charts/" . $newName;
        } else {
            $chartType = $postData["chart_type"] ?? "";
            $chartData = $postData["chart_data"] ?? "";
            if (!$chartData) {
                return Http::jsonError('Invalid chart data.');
            }
        }
    
        // ✅ Store in database
        $updated = $this->alertsModel->updateTradeAlertWithChart($symbol, $chartType, $chartData);
    
        if ($updated) {
            return Http::jsonSuccess([
                "status" => "success",
                "chart_type" => $chartType,
                "chart_data" => $chartData
            ]);
        } else {
            return Http::jsonError('Failed to save chart override.');
        }
    }       
    
    public function updateExchange()
    {
        $ticker = $this->request->getPost('ticker');
        $exchange = $this->request->getPost('exchange');

        if (empty($ticker) || empty($exchange)) {
            return Http::jsonError('Invalid parameters.', 400);
        }

        try {
            $updated = $this->alertsModel->updateExchangeForTicker($ticker, $exchange);

            if ($updated) {
                // ✅ Update CSRF Token after successful update
                $csrfName = csrf_token();
                $csrfHash = csrf_hash();

                return Http::jsonSuccess([
                    'status' => 'success',
                    'message' => "Exchange updated to {$exchange} for {$ticker}.",
                    'csrfName' => $csrfName,
                    'csrfHash' => $csrfHash
                ]);
            } else {
                return Http::jsonError('Failed to update exchange.', 500);
            }
        } catch (\Exception $e) {
            log_message('error', "❌ updateExchange - Exception: " . $e->getMessage());
            return Http::jsonError('An unexpected error occurred.', 500);
        }
    }

    // In AlertsController.php: Add a method to handle fundamentals file upload
    public function uploadFundamentals()
    {
        if ($this->request->getMethod() == 'post') {
            $file = $this->request->getFile('fundamentals_file');
            
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads/', $newName);
                
                // Parse the uploaded file and store data
                $this->processFundamentals(WRITEPATH . 'uploads/' . $newName);
            }
        }
        return Http::redirectTo('/manageTradeAlert');
    }

    /**
     * API endpoint to manually update trade alerts
     */
    public function updateTradeAlerts()
    {
        try {
            log_message('info', '⚡ updateTradeAlerts - Triggered.');
            
            $this->alertManager->updateAlerts();
            
            log_message('info', '✅ updateTradeAlerts - Trade alerts updated successfully.');
            
            return Http::jsonSuccess(["status" => "success", "message" => "Trade alerts updated successfully."]); 
        } catch (\Exception $e) {
            log_message('error', '❌ updateTradeAlerts - Error: ' . $e->getMessage());
            return $this->respond(["status" => "error", "message" => $e->getMessage()], 500);
        }
    }  

    /**
     * Fetch Market Data & Update Trade Alerts
     */
    public function updateTradeAlertsWithMarketData()
    {
        log_message('info', '⚡ updateTradeAlertsWithMarketData - Triggered.');

        $alerts = $this->alertsModel->getPendingTradeAlerts();
        foreach ($alerts as $alert) {
            $marketData = $this->alertsModel->fetchMarketData($alert['ticker']);
            if ($marketData) {
                $this->alertsModel->updateTradeAlert($alert['id'], [
                    'price' => $marketData['price'],
                    'volume' => $marketData['volume'],
                    'high' => $marketData['high'],
                    'low' => $marketData['low'],
                    'market_cap' => $marketData['market_cap']
                ]);
                log_message('info', "✅ Market data updated for {$alert['ticker']}");
            }
        }
        return $this->respond(["status" => "success", "message" => "Trade alerts updated with market data."]);
    }
    
    public function validateSymbol()
    {
        $symbol = strtoupper($this->request->getPost('symbol'));
        $exchange = strtoupper($this->request->getPost('exchange'));
    
        $ticker = $this->alertsModel->getTickerBySymbol($symbol);
    
        if ($ticker) {
            return Http::jsonSuccess(['status' => 'success', 'exists' => true, 'ticker' => $ticker]);
        }
    
        // Optionally fetch and store via ensureTickerExists()
        $this->alertsModel->ensureTickerExists($symbol);
        $ticker = $this->alertsModel->getTickerBySymbol($symbol);
    
        return Http::jsonSuccess([
            'status' => $ticker ? 'success' : 'error',
            'exists' => (bool)$ticker,
            'ticker' => $ticker,
        ]);
    }

    // ROBINHOOD API KEY: 
    public function genKeys(): ResponseInterface
    {
        try {
            $signer = new MyMIRobinhood();      // <— correct namespace
            $pair = $signer->generateKeyPair();
            return Http::jsonSuccess(['status' => 'success', 'data' => $pair]);
        } catch (\Throwable $e) {
            log_message('error', 'genKeys error: {msg}', ['msg' => $e->getMessage()]);
            return Http::jsonError('Key generation failed', 500);
        }
    }

    /**
     * POST JSON:
     * {
     *   "api_key": "...",
     *   "path": "/api/v1/crypto/trading/orders/",
     *   "method": "POST",
     *   "timestamp": "1698708981"   // or current time()
     *   "body": "{\"client_order_id\":\"...\",\"side\":\"buy\",...}", // minified or "" for GET
     *   "private_key_b64": "base64Seed32"
     * }
     */
    public function sign(): ResponseInterface
    {
        try {
            $data = $this->request->getJSON(true) ?? [];

            $apiKey = trim($data['api_key'] ?? '');
            $path   = trim($data['path'] ?? '');
            $method = strtoupper(trim($data['method'] ?? 'GET'));
            $ts     = trim($data['timestamp'] ?? '');
            $body   = $data['body'] ?? null; // minified string or null
            $pkB64  = trim($data['private_key_b64'] ?? '');

            if (!$apiKey || !$path || !$method || !$ts || !$pkB64) {
                return Http::jsonError('Missing required fields', 400);
            }

            $signer  = new MyMIRobinhood();
            $message = $signer->buildMessage($apiKey, $ts, $path, $method, $body ?: null);
            $sigB64  = $signer->sign($pkB64, $message);
            $headers = $signer->headers($apiKey, $ts, $sigB64);

            return Http::jsonSuccess([
                'status' => 'success',
                'data'   => [
                    'message'   => $message,
                    'signature' => $sigB64,
                    'headers'   => $headers,
                ],
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'sign error: {msg}', ['msg' => $e->getMessage()]);
            return Http::jsonError('Signing failed', 500);
        }
    }
}
?>
