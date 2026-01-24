<?php
namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Modules\APIs\Controllers\MarketingController;
use App\Libraries\{MyMIAlerts, MyMIMarketing, MyMIDiscord, KimiSuggestions};
use App\Models\{AlertsModel, ExchangeModel, IdempotencyModel, MarketingModel, MarketingNewsletterModel, ReferralModel, SupportModel, UserModel, WeeklyStreamWatchlistModel};
use App\Services\{AlphaVantagePipelineService, AuthSmokeService, MarketingService, WeeklyStreamService};
use App\Support\Http;
use CodeIgniter\Log\Handlers\FileHandler;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait; // Import the ResponseTrait
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Database;
use Config\Services;

#[\AllowDynamicProperties]
class ManagementController extends \App\Controllers\BaseController
{
    use ResponseTrait;
    protected MyMIAlerts $alertManager;
    protected MyMIMarketing $MyMIMarketing;
    protected MarketingService $marketingService;
    protected AlertsModel $alertsModel;
    protected ExchangeModel $exchangeModel;
    protected MarketingModel $marketingModel;
    protected MarketingNewsletterModel $newsletterModel;
    protected UserModel $userModel;
    protected ReferralModel $referralModel;
    protected SupportModel $supportModel;
    protected AlphaVantagePipelineService $alphaVantageService;
    protected WeeklyStreamWatchlistModel $weeklyWatchlistModel;
    protected WeeklyStreamService $weeklyStreamService;
    protected IdempotencyModel $idempotencyModel;

    public function _remap($method, ...$params)
    {
        if (! aiKimiEnabled()) {
            return $this->response->setJSON([
                'status'  => 'disabled',
                'message' => 'Kimi AI Services are currently disabled by SiteSettings.',
            ]);
        }

        if (! method_exists($this, $method)) {
            throw PageNotFoundException::forPageNotFound();
        }

        return $this->$method(...$params);
    }

    private function guardAdmin(): ?\CodeIgniter\HTTP\Response
    {
        if (! $this->auth || ! method_exists($this->auth, 'check') || ! $this->auth->check()) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }

        $user = method_exists($this->auth, 'user') ? $this->auth->user() : null;
        $authorizer = service('authorization');
        if ($authorizer && $user && ! ($authorizer->inGroup('admin', $user->id) || $authorizer->inGroup('superadmin', $user->id))) {
            return $this->response->setStatusCode(403)->setJSON(['status' => 'error', 'message' => 'Forbidden']);
        }

        return null;
    }

    public function logHealthcheck()
    {
        $enabled = filter_var((string) env('LOG_HEALTHCHECK_ENABLE', false), FILTER_VALIDATE_BOOLEAN);

        if (! $enabled) {
            return $this->failForbidden('Log healthcheck disabled.');
        }

        $clientIp    = $this->request->getIPAddress();
        $token       = env('LOG_HEALTHCHECK_TOKEN');
        $allowedIps  = array_filter(array_map('trim', explode(',', (string) env('LOG_HEALTHCHECK_ALLOWED_IPS', ''))));
        $tokenAllowed = $this->isHealthcheckAllowed($clientIp, $token, $allowedIps);

        if (! $tokenAllowed) {
            $authGuard = $this->guardAdmin();
            if ($authGuard) {
                return $authGuard;
            }
        }

        $logPath  = $this->resolveLogPath();
        $beforeSz = is_file($logPath) ? filesize($logPath) : 0;
        $marker   = bin2hex(random_bytes(6));

        $context = [
            'marker' => $marker,
            'source' => 'http-log-healthcheck',
            'ip'     => $clientIp,
            'uri'    => (string) $this->request->getUri(),
            'method' => $this->request->getMethod(),
        ];

        log_message('debug', 'Log healthcheck HTTP debug {marker}', $context);
        log_message('info', 'Log healthcheck HTTP info {marker}', $context);
        log_message('error', 'Log healthcheck HTTP error {marker}', $context);

        clearstatcache(false, $logPath);
        $afterSz   = is_file($logPath) ? filesize($logPath) : 0;
        $fileLogOk = is_file($logPath) && $afterSz > $beforeSz;
        $dbLogOk   = $this->dbHealthcheck($marker);

        $status = ($fileLogOk && $dbLogOk) ? 'ok' : 'degraded';

        return $this->response->setJSON([
            'status'       => $status,
            'file_log_ok'  => $fileLogOk,
            'db_log_ok'    => $dbLogOk,
            'marker'       => $marker,
            'timestamp'    => date('c'),
        ]);
    }

    public function getAutoloadHealth(): ResponseInterface
    {
        $authGuard = $this->guardAdmin();
        if ($authGuard) {
            return $authGuard;
        }

        $health = Services::autoloadHealthService()->getStatus();

        return $this->response->setJSON([
            'status' => 'ok',
            'data'   => $health,
        ]);
    }

    public function runAuthSmoke()
    {
        $authGuard = $this->guardAdmin();
        if ($authGuard) {
            return $authGuard;
        }

        $service = new AuthSmokeService();
        $result = $service->run();

        return $this->response->setJSON([
            'status' => $result['status'] ?? 'FAIL',
            'run_id' => $result['run_id'] ?? null,
            'summary' => $result['summary'] ?? 'Auth smoke completed.',
            'details' => $result['details'] ?? null,
            'score' => $result['score'] ?? 0,
            'duration_ms' => $result['duration_ms'] ?? 0,
        ]);
    }

    public function saveSuggestion()
    {
        $authGuard = $this->guardAdmin();
        if ($authGuard) {
            return $authGuard;
        }

        $payload  = $this->request->getJSON(true) ?? $this->request->getPost();
        $title    = trim($payload['title'] ?? '');
        $body     = trim($payload['body'] ?? '');
        $category = trim($payload['category'] ?? '');

        if ($title === '' || $body === '') {
            return $this->response->setStatusCode(422)->setJSON([
                'status'  => 'error',
                'message' => 'Title and body are required.',
            ]);
        }

        $helper = new KimiSuggestions();
        $path   = $helper->saveSuggestion($title, $body, $category ?: null);

        return $this->response->setJSON([
            'status' => 'success',
            'path'   => $path,
        ]);
    }

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);

        $this->alertManager        = new MyMIAlerts();
        $this->MyMIMarketing       = service('MyMIMarketing');
        $this->alertsModel         = model(AlertsModel::class);
        $this->exchangeModel       = model(ExchangeModel::class);
        $this->marketingModel      = model(MarketingModel::class);
        $this->newsletterModel     = model(MarketingNewsletterModel::class);
        $this->referralModel       = model(ReferralModel::class);
        $this->supportModel        = model(SupportModel::class);
        $this->userModel           = model(UserModel::class);
        $this->marketingService    = new MarketingService();
        $this->alphaVantageService = new AlphaVantagePipelineService();
        $this->weeklyWatchlistModel = model(WeeklyStreamWatchlistModel::class);
        $this->weeklyStreamService  = new WeeklyStreamService();
        $this->idempotencyModel     = model(IdempotencyModel::class);
    }

    public function Run_CRON_Tasks()
    {
        $token = $this->request->getHeaderLine('X-CRON-Key') ?: $this->request->getGet('cronKey');
        $expected = env('CRON_SHARED_KEY');

        if (!$expected || ! hash_equals((string) $expected, (string) $token)) {
            log_message('warning', '🚫 ManagementController::Run_CRON_Tasks() blocked - invalid or missing token.');
            return $this->failForbidden('Invalid CRON key.');
        }

        return Http::jsonSuccess($this->executeCronWorkflow());
    }

    public function runCRONTasks()
    {
        return $this->Run_CRON_Tasks();
    }

    private function getRequestIdempotencyKey(): ?string
    {
        $key = $this->request->getHeaderLine('X-Idempotency-Key')
            ?: $this->request->getGet('idempotency_key')
            ?: $this->request->getGet('idempotencyKey');

        return $key !== '' ? $key : null;
    }

    private function isIdempotencyExpired(?string $expiresAt): bool
    {
        return empty($expiresAt) || strtotime($expiresAt) <= time();
    }

    private function reserveIdempotencyKey(string $operation, ?string $incomingKey, int $ttlMinutes = 60): array
    {
        $key       = trim($incomingKey ?: sprintf('%s:%s', $operation, date('Y-m-d-H')));
        $now       = date('Y-m-d H:i:s');
        $expiresAt = date('Y-m-d H:i:s', strtotime("+{$ttlMinutes} minutes"));

        $existing = $this->idempotencyModel->findByKey($key);
        if ($existing && ! $this->isIdempotencyExpired($existing['expires_at'] ?? null)) {
            log_message('notice', sprintf('♻️ %s replay blocked by idempotency key %s', $operation, $key));

            return ['ok' => false, 'key' => $key];
        }

        $payload = [
            'key'           => $key,
            'state'         => $operation,
            'status_code'   => null,
            'response_json' => null,
            'created_at'    => $existing['created_at'] ?? $now,
            'updated_at'    => $now,
            'expires_at'    => $expiresAt,
        ];

        if ($existing) {
            $this->idempotencyModel->update($existing['id'], $payload);
        } else {
            $this->idempotencyModel->insert($payload);
        }

        log_message('info', sprintf('🔐 Reserved idempotency key %s for %s (ttl=%d minutes)', $key, $operation, $ttlMinutes));

        return ['ok' => true, 'key' => $key];
    }

    private function finalizeIdempotencyKey(?string $key, int $statusCode, array $response = []): void
    {
        if (! $key) {
            return;
        }

        $this->idempotencyModel
            ->where('key', $key)
            ->set([
                'status_code'   => $statusCode,
                'response_json' => $response ? json_encode($response) : null,
                'updated_at'    => date('Y-m-d H:i:s'),
            ])
            ->update();
    }

    protected function executeCronWorkflow(): array
    {
        log_message('info', '🛠️ ManagementController::Run_CRON_Tasks() initiated.');

        // Step 1: Fetch and Generate News (MarketAux)
        log_message('info', '📌 Step 1: cronFetchAndGenerateNews()');
        try {
            $this->cronFetchAndGenerateNews();
        } catch (\Throwable $e) {
            log_message('error', '❌ cronFetchAndGenerateNews failed: ' . $e->getMessage());
        }

        // Step 2: (Optional) AlphaVantage News for Trade Alerts
        // log_message('info', '📌 Step 2: fetchAlphaVantageNewsForTradeAlerts()');
        // $this->fetchAlphaVantageNewsForTradeAlerts();

        // Step 3: Generate Today’s News Summary
        log_message('info', '📌 Step 3: generateDailyContentDigest()');
        try {
            $todayNews = $this->marketingModel->getTodaysScrapedContent();
            if (!empty($todayNews)) {
                $this->generateDailyContentDigest();
            } else {
                log_message('info', '🛑 Skipping summary generation — no scraped news available today.');
            }
        } catch (\Throwable $e) {
            log_message('error', '❌ generateDailyContentDigest() failed: ' . $e->getMessage());
        }

        // Step 4: Fetch Inbox Emails
        log_message('info', '📌 Step 4: cronFetchInbox()');
        try {
            $this->cronFetchInbox();
        } catch (\Throwable $e) {
            log_message('error', '❌ cronFetchInbox() failed: ' . $e->getMessage());
        }

        // Step 5: Analyze Inbox Content
        log_message('info', '📌 Step 5: cronAnalyzeContent()');
        try {
            $this->cronAnalyzeContent();
        } catch (\Throwable $e) {
            log_message('error', '❌ cronAnalyzeContent() failed: ' . $e->getMessage());
        }

        // Step 6: Backfill Incomplete Emails
        log_message('info', '📌 Step 6: reprocessIncompleteEmails()');
        try {
            $this->runBackfillForTempEmails();
        } catch (\Throwable $e) {
            log_message('error', '❌ reprocessIncompleteEmails() failed: ' . $e->getMessage());
        }

        // Step 7: Process SMS Text Messages
        log_message('info', '📌 Step 7: cronProcessSMSMarketingIdeas()');
        try {
            $this->cronProcessSMSMarketingIdeas();
        } catch (\Throwable $e) {
            log_message('error', '❌ cronProcessSMSMarketingIdeas() failed: ' . $e->getMessage());
        }

        log_message('info', '✅ ManagementController::Run_CRON_Tasks() completed.');

        return [
            'status' => 'ok',
            'completed_at' => date('c'),
        ];
    }

    public function generateWeeklyStreamData()
    {
        $weekStart = $this->request->getGet('week_start_date');

        try {
            $result = $this->weeklyStreamService->generateWeeklyWatchlistSnapshot($weekStart);
            log_message(
                'info',
                sprintf(
                    '📺 generateWeeklyStreamData completed for %s: %d watchlists, %d records',
                    $result['week_start_date'],
                    $result['total_watchlists'],
                    $result['total_records']
                )
            );

            return Http::jsonSuccess($result);
        } catch (\Throwable $e) {
            log_message(
                'error',
                sprintf(
                    '❌ generateWeeklyStreamData failed for %s: %s',
                    $weekStart ?: '(auto)',
                    $e->getMessage()
                )
            );
            return $this->failServerError('Failed to generate weekly stream data.');
        }
    }

    public function backfillMarketingEmails()
    {
        if ($guard = $this->guardAdmin()) {
            return $guard;
        }

        $daysBack = (int) ($this->request->getVar('days_back') ?? 30);
        $maxEmails = $this->request->getVar('max_emails');
        $maxEmails = $maxEmails !== null ? (int) $maxEmails : null;

        $result = $this->MyMIMarketing->backfillMarketingEmails($daysBack, $maxEmails);

        return Http::jsonSuccess(['summary' => $result]);
    }

    public function runBackfillAlertsEmails()
    {
        $token = $this->request->getHeaderLine('X-CRON-Key') ?: $this->request->getGet('cronKey');
        $expected = env('CRON_SHARED_KEY');

        if (! $expected || ! hash_equals((string) $expected, (string) $token)) {
            log_message('warning', '🚫 runBackfillAlertsEmails blocked - invalid token');
            return $this->failForbidden('Invalid CRON key.');
        }

        $result = $this->alertManager->backfillAlertsEmails(7, 300);
        return Http::jsonSuccess(['summary' => $result]);
    }

    public function runBackfillMarketingEmails()
    {
        $token = $this->request->getHeaderLine('X-CRON-Key') ?: $this->request->getGet('cronKey');
        $expected = env('CRON_SHARED_KEY');

        if (! $expected || ! hash_equals((string) $expected, (string) $token)) {
            log_message('warning', '🚫 runBackfillMarketingEmails blocked - invalid token');
            return $this->failForbidden('Invalid CRON key.');
        }

        $result = $this->MyMIMarketing->backfillMarketingEmails(7, 300);
        return Http::jsonSuccess(['summary' => $result]);
    }

    public function exportWeeklyWatchlistCSV()
    {
        $weekStart = $this->request->getGet('week_start_date');
        if (! $weekStart) {
            $weekStart = $this->weeklyStreamService->getDefaultWeekStart()->format('Y-m-d');
        }

        try {
            $records = $this->weeklyWatchlistModel
                ->where('week_start_date', $weekStart)
                ->orderBy('watchlist_name', 'ASC')
                ->orderBy('score', 'DESC')
                ->findAll();

            $watchlists = array_unique(array_map(static function ($row) {
                return $row['watchlist_name'] ?? 'Stream Watchlist';
            }, $records));

            log_message(
                'info',
                sprintf(
                    '🗂️ exportWeeklyWatchlistCSV for %s with %d symbols across %d watchlists',
                    $weekStart,
                    count($records),
                    count($watchlists)
                )
            );

            $csvHandle = fopen('php://temp', 'r+');
            fputcsv($csvHandle, ['watchlist_name', 'symbol', 'score', 'notes']);

            foreach ($records as $row) {
                fputcsv($csvHandle, [
                    $row['watchlist_name'] ?? '',
                    $row['symbol'] ?? '',
                    $row['score'] ?? '',
                    $row['notes'] ?? '',
                ]);
            }

            rewind($csvHandle);
            $csvContent = stream_get_contents($csvHandle);
            fclose($csvHandle);

            return $this->response
                ->setHeader('Content-Type', 'text/csv')
                ->setHeader('Content-Disposition', 'attachment; filename="weekly-stream-watchlist-' . $weekStart . '.csv"')
                ->setBody($csvContent ?? '');
        } catch (\Throwable $e) {
            log_message(
                'error',
                sprintf('❌ exportWeeklyWatchlistCSV failed for %s: %s', $weekStart, $e->getMessage())
            );
            return $this->failServerError('Failed to export weekly watchlist CSV.');
        }
    }

    public function generateCoffeeAndStocksNewsletter()
    {
        $weekStart = $this->weeklyStreamService->getDefaultWeekStart()->format('Y-m-d');

        try {
            $newsletterData = $this->MyMIMarketing->buildWeeklyWatchlistNewsletter($weekStart);

            $payload = [
                'title'           => $newsletterData['title'],
                'slug'            => $newsletterData['slug'],
                'subject'         => $newsletterData['subject'],
                'body_html'       => $newsletterData['body_html'],
                'status'          => 'draft',
                'week_start_date' => $weekStart,
                'updated_at'      => date('Y-m-d H:i:s'),
            ];

            $existing = $this->newsletterModel
                ->where('week_start_date', $weekStart)
                ->first();

            if ($existing) {
                $this->newsletterModel->update($existing['id'], $payload);
            } else {
                $payload['created_at'] = date('Y-m-d H:i:s');
                $this->newsletterModel->insert($payload);
            }

            $symbolCount = $this->weeklyWatchlistModel
                ->where('week_start_date', $weekStart)
                ->countAllResults();

            $watchlistCount = $this->weeklyWatchlistModel
                ->select('watchlist_name')
                ->where('week_start_date', $weekStart)
                ->groupBy('watchlist_name')
                ->countAllResults();

            log_message(
                'info',
                sprintf(
                    '📧 Coffee & Stocks newsletter drafted for %s with %d symbols across %d watchlists',
                    $weekStart,
                    $symbolCount,
                    $watchlistCount
                )
            );

            return Http::jsonSuccess([
                'week_start_date' => $weekStart,
                'symbol_count'    => $symbolCount,
                'subject'         => $payload['subject'],
                'status'          => $payload['status'],
            ]);
        } catch (\Throwable $e) {
            log_message(
                'error',
                sprintf('❌ generateCoffeeAndStocksNewsletter failed for %s: %s', $weekStart, $e->getMessage())
            );
            return $this->failServerError('Failed to generate newsletter draft.');
        }
    }

    public function fetchCoffeeAndStocksNewsletter()
    {
        $weekStart = $this->request->getGet('week_start_date')
            ?: $this->weeklyStreamService->getDefaultWeekStart()->format('Y-m-d');

        $existing = $this->newsletterModel
            ->where('week_start_date', $weekStart)
            ->first();

        if (! $existing) {
            $existing = $this->MyMIMarketing->buildWeeklyWatchlistNewsletter($weekStart);
            $existing['status'] = 'draft';
        }

        log_message('info', sprintf('📧 fetchCoffeeAndStocksNewsletter for %s', $weekStart));

        return Http::jsonSuccess([
            'week_start_date' => $weekStart,
            'newsletter'      => $existing,
        ]);
    }

    public function saveCoffeeAndStocksNewsletter()
    {
        $weekStart = $this->request->getPost('week_start_date')
            ?: $this->weeklyStreamService->getDefaultWeekStart()->format('Y-m-d');
        $subject   = $this->request->getPost('subject');
        $bodyHtml  = $this->request->getPost('body_html');
        $status    = $this->request->getPost('status') ?? 'draft';

        $payload = [
            'title'           => $this->request->getPost('title') ?: 'Coffee & Stocks Newsletter',
            'slug'            => 'coffee-and-stocks-' . str_replace([' ', '/'], '-', strtolower($weekStart)),
            'subject'         => $subject ?: 'MyMI Wallet Coffee & Stocks – Weekly Watchlist',
            'body_html'       => $bodyHtml ?? '',
            'status'          => $status,
            'week_start_date' => $weekStart,
            'updated_at'      => date('Y-m-d H:i:s'),
        ];

        $existing = $this->newsletterModel
            ->where('week_start_date', $weekStart)
            ->first();

        if ($existing) {
            $this->newsletterModel->update($existing['id'], $payload);
        } else {
            $payload['created_at'] = date('Y-m-d H:i:s');
            $this->newsletterModel->insert($payload);
        }

        log_message(
            'info',
            sprintf('✅ saveCoffeeAndStocksNewsletter stored %s with status %s', $weekStart, $status)
        );

        return Http::jsonSuccess([
            'week_start_date' => $weekStart,
            'status'          => $status,
        ]);
    }
    
    public function ajaxGetActiveUsers()
    {
        log_message('debug', '📥 ajaxGetActiveUsers() called.');
        $request = service('request');
        $post = $request->getPost();
        log_message('debug', '📦 Incoming POST: ' . print_r($post, true));
    
        $start = $post['start'] ?? 0;
        $length = $post['length'] ?? 10;
        $search = $post['search']['value'] ?? '';
    
        $records = $this->userModel->getUsersByStatus(1, $search);
        $totalRecords = count($records);
        $records = array_slice($records, $start, $length);
    
        $data = [];
        foreach ($records as $user) {
            try {
                $actionView = view('ManagementModule\Views\Users\partials\action_buttons', ['user' => $user]);
            } catch (\Throwable $e) {
                log_message('error', '❌ Error rendering action_buttons view for user ID ' . $user['id'] . ': ' . $e->getMessage());
                $actionView = '<span class="text-danger">View Error</span>';
            }
    
            $data[] = [
                'id'            => '<a href="' . site_url('Management/Users/Profile/' . $user['username']) . '">' . $user['id'] . '</a>',
                'type'          => $user['type'],
                'name'          => $user['first_name'] . ' ' . $user['last_name'] . ' ' . $user['name_suffix'],
                'email'         => '<a href="mailto:' . $user['email'] . '">' . $user['email'] . '</a>',
                'location'      => $user['city'] . ', ' . $user['state'],
                'referral_code' => $user['referral_code'],
                'actions'       => $actionView,
            ];
        }
    
        return Http::jsonSuccess([
            'draw'            => intval($post['draw'] ?? 1),
            'recordsTotal'    => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data'            => $data,
        ]);
    }
    
    public function ajaxGetInactiveUsers()
    {
        log_message('debug', '📥 ajaxGetInactiveUsers() called.');
        $request = service('request');
        $post = $request->getPost();
        log_message('debug', '📦 Incoming POST: ' . print_r($post, true));
    
        $start = $post['start'] ?? 0;
        $length = $post['length'] ?? 10;
        $search = $post['search']['value'] ?? '';
    
        $records = $this->userModel->getUsersByStatus(0, $search);
        $totalRecords = count($records);
        $records = array_slice($records, $start, $length);
    
        $data = [];
        foreach ($records as $user) {
            try {
                $actionView = view('ManagementModule\Views\Users\partials\action_buttons', ['user' => $user]);
            } catch (\Throwable $e) {
                log_message('error', '❌ Error rendering action_buttons view for user ID ' . $user['id'] . ': ' . $e->getMessage());
                $actionView = '<span class="text-danger">View Error</span>';
            }
    
            $data[] = [
                'id'            => '<a href="' . site_url('Management/Users/Profile/' . $user['username']) . '">' . $user['id'] . '</a>',
                'type'          => $user['type'],
                'name'          => $user['first_name'] . ' ' . $user['last_name'] . ' ' . $user['name_suffix'],
                'email'         => '<a href="mailto:' . $user['email'] . '">' . $user['email'] . '</a>',
                'location'      => $user['city'] . ', ' . $user['state'],
                'referral_code' => $user['referral_code'],
                'actions'       => $actionView,
            ];
        }
    
        return Http::jsonSuccess([
            'draw'            => intval($post['draw'] ?? 1),
            'recordsTotal'    => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data'            => $data,
        ]);
    }    

    protected function arrayToXml(array $data, \SimpleXMLElement $xml)
    {
        foreach ($data as $key => $value) {
            is_array($value)
                ? $this->arrayToXml($value, $xml->addChild($key))
                : $xml->addChild($key, htmlspecialchars($value));
        }
        return $xml;
    }
    
    public function banUnverifiedUsers()
    {
        $cutoffDate = date('Y-m-d H:i:s', strtotime('-30 days'));
        $userModel  = model(UserModel::class);
    
        $usersToBan = $userModel->where('active', 0)
            ->where('activate_email_resend IS NOT NULL', null, false)
            ->where('activate_hash IS NOT NULL', null, false)
            ->where('activate_email_resend <=', $cutoffDate)
            ->findAll();
    
        if (empty($usersToBan)) {
            log_message('info', 'banUnverifiedUsers: No users to ban.');
            return Http::jsonSuccess(['status' => 'complete', 'banned' => 0]);
        }
    
        $userIds = array_column($usersToBan, 'id');
    
        $userModel->whereIn('id', $userIds)->set(['banned' => 1])->update();
    
        log_message('info', 'banUnverifiedUsers: Banned ' . count($userIds) . ' users.');
        return Http::jsonSuccess(['status' => 'success', 'banned' => count($userIds)]);
    }
    
    public function checkForSpamUsers()
    {
        try {
            $MyMIUser = new \App\Libraries\MyMIUser();
            $spamAccounts = $MyMIUser->findPotentialSpamUsers();

            return Http::jsonSuccess([
                'status' => 'success',
                'message' => count($spamAccounts) . ' spam accounts detected.',
                'data' => $spamAccounts
            ]);
        } catch (\Throwable $e) {
            log_message('error', '❌ Error checking spam users: ' . $e->getMessage());
            return $this->failServerError('Failed to check for spam accounts.');
        }
    }

    public function cronAnalyzeContent()
    {
        log_message('debug', '🧠 Starting content digest analysis...');
        $this->getMyMIMarketing()->generateFromTempScraper(5); // e.g., latest 5
        log_message('debug', '✅ Content digest completed.');
    }

    public function cronFetchAndGenerateNews() {
        try {
            $result = $this->getMyMIMarketing()->cronFetchAndGenerateNews();
            log_message('info', '[CRON] cronFetchAndGenerateNews completed', $result);
            return Http::jsonSuccess([
                'status' => 'success',
                'message' => 'MarketAux news pulled, ranked, and content generated.',
                'result' => $result,
            ]);
        } catch (\Throwable $e) {
            log_message('error', '❌ cronFetchAndGenerateNews failed: ' . $e->getMessage());
            return Http::jsonError($e->getMessage(), 500);
        }
    }
    
    public function cronFetchInbox()
    {
        log_message('debug', '📨 Starting inbox scrape...');
        $this->getMyMIMarketing()->fetchAndStoreEmails();
        log_message('debug', '✅ Inbox scrape completed.');
    }
    
    public function cronFetchMarketingEmails()
    {
        log_message('info', 'CRON: Starting Marketing Email Fetch');
    
        $service = new MarketingService();
        $emailsFetched = $service->fetchAndStoreMarketingEmails();
    
        log_message('info', 'CRON: Fetched ' . $emailsFetched . ' marketing emails');
        return $this->respond(['status' => 'success', 'fetched' => $emailsFetched]);
    }

    public function cronFetchAndStoreEmails()
    {
        try {
            $this->logMessage('📥 [CRON] Started cronFetchAndStoreEmails');
    
            $marketingService = $this->getMarketingService();
            $fetched = $marketingService->fetchAndStoreEmails(); // Already sanitizes & inserts
    
            $this->logMessage("📩 [CRON] Fetched and stored {$fetched} emails into bf_marketing_temp_scraper");
            return $this->respond(['status' => 'success', 'stored' => $fetched]);
    
        } catch (\Throwable $e) {
            log_message('error', '[CRON] Error in cronFetchAndStoreEmails: ' . $e->getMessage());
            return $this->failServerError('Failed to fetch emails');
        }
    }
    
    public function distributeTodaysNewsContent() {
        helper(['text']);

        try {
            $limit = (int) ($this->request->getGet('limit') ?? 5);
            $hours = (int) ($this->request->getGet('hours') ?? 24);

            $items = $this->marketingModel->getTodaysTopNewsSummaries($limit, $hours);

            if (empty($items)) {
                log_message('warning', '📭 distributeTodaysNewsContent found no news items to send.');
                return Http::jsonError('No news items available for distribution.', 404);
            }

            $discord = new MyMIDiscord();
            $webhook = config('Discord')->newsWebhook ?? '';

            $lines = [];
            foreach ($items as $item) {
                $url = $item['url'] ?? $item['source_url'] ?? '';
                $summary = word_limiter(strip_tags($item['summary'] ?? ''), 35);
                $line = '• **' . ($item['title'] ?? 'Untitled') . '**';
                if (!empty($summary)) {
                    $line .= ' — ' . $summary;
                }
                if (!empty($url)) {
                    $line .= " [Read More]({$url})";
                }
                $lines[] = $line;
            }

            $payload = [
                'embeds' => [[
                    'title'       => "Today's Top News",
                    'description' => implode("\n\n", $lines),
                ]],
            ];

            $sent = $discord->sendWebhookMessage($webhook, $payload, 'news_daily_digest');

            if (!$sent) {
                log_message('error', '❌ distributeTodaysNewsContent failed to send Discord payload.');
                return Http::jsonError('Failed to send news to Discord.', 500);
            }

            return Http::jsonSuccess([
                'status'  => 'success',
                'sent'    => count($items),
                'channel' => 'news_daily_digest',
                'items'   => array_map(fn($i) => ['id' => $i['id'] ?? null, 'title' => $i['title'] ?? ''], $items),
            ]);
        } catch (\Throwable $e) {
            log_message('error', '❌ distributeTodaysNewsContent error: ' . $e->getMessage());
            return Http::jsonError($e->getMessage(), 500);
        }
    }
    
    public function exportPostJson($id)
    {
        $post = $this->marketingModel->getGeneratedPostById($id);
    
        if (!$post || empty($post['posts'])) {
            return $this->failNotFound('Post not found.');
        }
    
        $posts = json_decode($post['posts'], true);
    
        $export = [
            'title' => $post['title'],
            'summary' => $post['summary'],
            'cta' => 'Check it out at https://mymiwallet.com',
            'keywords' => explode(',', $post['keywords'] ?? ''),
            'platform_captions' => $posts,
        ];        
    
        return Http::jsonSuccess($export)
            ->setHeader('Content-Type', 'application/json')
            ->setHeader('Content-Disposition', 'attachment; filename="canva_post_' . $id . '.json"');
    }
    
    public function fetchAlphaVantageNewsForTradeAlerts() {
        $alerts = $this->alertsModel->getTradeAlertsWithCreatedFlag();
        log_message('info', '📈 Processing '.count($alerts).' trade alerts.');
    
        foreach ($alerts as $alert) {
            try {
                log_message('info', '🔍 Fetching AlphaVantage news for: '.$alert['ticker']);
                $newsItems = $this->alertManager->fetchAlphaVantageNews($alert['ticker']);
                log_message('info', '📰 '.count($newsItems).' news items fetched for '.$alert['ticker']);
    
                foreach ($newsItems as $news) {
                    $this->marketingModel->insertNewsContent($news, $alert['ticker']);
                }
            } catch (\Throwable $e) {
                log_message('error', '❌ AlphaVantage fetch failed for '.$alert['ticker'].': '.$e->getMessage());
            }
        }
    
        return Http::jsonSuccess(['status'=>'success','message'=>'Financial news processed for alerts.']);
    }    

    public function fetchEmailsToTempScraper()
    {
        try {
            log_message('info', '📥 Starting email scrape to bf_marketing_temp_scraper...');
            $this->getMyMIMarketing()->fetchAndStoreEmails('news'); // This stores in bf_marketing_temp_scraper
            log_message('info', '📬 Number of emails fetched: ' . count($emails));
            return Http::jsonSuccess(['status' => 'success', 'message' => 'Emails stored successfully.']);
        } catch (\Throwable $e) {
            log_message('error', '❌ fetchEmailsToTempScraper error: ' . $e->getMessage());
            return Http::jsonError($e->getMessage(), 500);
        }
    }
    
    public function fetchNewsEmails() {
        log_message('info', '📥 fetchNewsEmails - Started.');
        try {
            $this->getMyMIMarketing()->fetchAndStoreEmails('news');
            return Http::jsonSuccess(['status' => 'success', 'message' => 'News emails fetched successfully.']);
        } catch (\Exception $e) {
            log_message('error', '❌ fetchNewsEmails - Error: ' . $e->getMessage());
            return Http::jsonError($e->getMessage(), 500);
        }
    }

    /**
     * Management Endpoint: Force Fetch Emails
     */
    public function forceFetchEmails()
    {
        try {
            $result = $this->alertManager->fetchAndStoreEmails();
            return Http::jsonSuccess(['status' => 'success', 'message' => 'Emails fetched and processed successfully.']);
        } catch (\Exception $e) {
            return Http::jsonError('Error fetching emails: ' . $e->getMessage(), 500);
        }
    }

    public function generateContentDigestFromStored()
    {
        log_message('info', 'Marketing: Starting summary generation from stored marketing emails.');
    
        $model = new MarketingModel();
        $records = $model->getRecentUnprocessedTempEmails(5);
    
        $results = [];
        foreach ($records as $record) {
            if (empty($record['title']) || empty($record['content']) || strlen($record['content']) < 100) {
                log_message('warning', "⚠️ Skipping malformed or empty record ID {$record['id']} (title/content missing).");
                continue;
            }            
    
            try {
                $summary = $this->getMarketingService()->generateContentFromRaw($record['title'], $record['content']);
    
                $model->storeFinalMarketingContent([
                    'source_id' => $record['id'],
                    'title' => $record['title'],
                    'summary' => $summary,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
    
                $model->markTempRecordAsProcessed($record['id']);
                $results[] = $record['title'];
    
            } catch (\Throwable $e) {
                log_message('error', 'Failed to process record ID ' . $record['id'] . ': ' . $e->getMessage());
            }
        }
    
        return $this->respond(['status' => 'complete', 'processed_titles' => $results]);
    }
    
    public function generateContentFromScraper()
    {
        log_message('debug', '🔁 API::MarketingController::generateContentFromScraper called');
    
        try {
            $limit = $this->request->getGet('limit') ?? 5;
            $records = [];
            $allRecords = $this->marketingModel->getValidUnprocessedEmails($limit); // fetch from model
    
            if (!is_array($allRecords)) {
                log_message('error', '❌ $allRecords is not an array or null. Cannot proceed.');
                return $this->respond(['status' => 'error', 'message' => 'Failed to fetch records.']);
            }
    
            foreach ($allRecords as $record) {
                $titleOk = !empty($record['title']);
                $contentOk = strlen(strip_tags($record['content'] ?? '')) > 1000;
    
                if ($titleOk && $contentOk) {
                    $records[] = $record;
                    if (count($records) >= $limit) break;
                } else {
                    log_message('debug', "⚠️ Skipping invalid record ID {$record['id']} during prefilter (Title or content missing/too short).");
                    $this->marketingModel->markEmailsAsProcessed([$record['id']]);
                }
            }
    
            if (empty($records)) {
                return $this->respond(['status' => 'no_data', 'message' => 'No unprocessed records found.']);
            }
    
            $processedSummaries = [];
    
            foreach ($records as $record) {
                $content = $record['content'] ?? '';
                $title = $record['title'] ?? '';
                $recordId = $record['id'] ?? 0;
    
                if (empty(trim($content)) || strlen($content) < 1000) {
                    log_message('debug', "⏭️ Skipping record ID {$recordId} - content too short or empty.");
                    continue;
                }
    
                if (empty(trim($title))) {
                    log_message('debug', "⏭️ Skipping record ID {$recordId} - missing title.");
                    continue;
                }
    
                if (stripos($content, '<html') !== false && substr_count($content, '<') > 50) {
                    log_message('debug', "⏭️ Skipping record ID {$recordId} - content likely raw HTML.");
                    continue;
                }
    
                try {
                    $processed = $this->getMarketingService()->generateContentFromRaw($record);
    
                    if (!is_array($processed)) {
                        log_message('debug', "⚠️ Skipped record ID {$recordId} - generateContentFromRaw() returned invalid structure.");
                        continue;
                    }
    
                    $this->marketingModel->saveFinalizedMarketingContent($processed);
                    $this->marketingModel->markEmailsAsProcessed([$recordId]);
    
                    $processedSummaries[] = [
                        'id'       => $recordId,
                        'title'    => $processed['headline'] ?? $title,
                        'summary'  => $processed['summary'] ?? '',
                        'keywords' => $processed['keywords'] ?? [],
                    ];
                } catch (\Throwable $e) {
                    log_message('error', "❌ Failed to process record ID {$recordId}: {$e->getMessage()}");
                }
            }
    
            return $this->respond([
                'status'  => 'success',
                'message' => count($processedSummaries) . ' records processed successfully.',
                'data'    => $processedSummaries
            ]);
        } catch (\Throwable $e) {
            log_message('error', '❌ API::generateContentFromScraper error - ' . $e->getMessage());
            return $this->failServerError($e->getMessage());
        }
    }
    
    public function generateDailyContentDigest()
    {
        log_message('debug', '🧠 Start Memory Usage: ' . memory_get_usage(true));
        @ini_set('memory_limit', '768M');

        $idempotency = $this->reserveIdempotencyKey(
            'cron:marketing-daily-digest',
            $this->getRequestIdempotencyKey(),
            90
        );

        if (! $idempotency['ok']) {
            return Http::jsonSuccess([
                'status'          => 'skipped',
                'reason'          => 'idempotency_replay',
                'idempotency_key' => $idempotency['key'],
            ]);
        }

        $limit = 5;
        $summary = [];

        try {
            $records = $this->marketingModel->getValidUnprocessedEmails($limit);

            if (!is_array($records) || empty($records)) {
                log_message('info', '🚫 No valid records returned from getValidUnprocessedEmails().');
                $response = [
                    'status'          => 'no_data',
                    'message'         => 'No valid records to process.',
                    'idempotency_key' => $idempotency['key'],
                ];
                $this->finalizeIdempotencyKey($idempotency['key'], 200, $response);

                return Http::jsonSuccess($response);
            }
    
            foreach ($records as $record) {
                $recordId = $record['id'] ?? 0;
                $title = $record['title'] ?? '';
                $content = $record['content'] ?? '';
                $contentSize = strlen(strip_tags($content));
    
                if (empty(trim($title)) || $contentSize < 1000) {
                    log_message('debug', "⚠️ Skipping record ID {$recordId} — title missing or content too short ({$contentSize} chars).");
                    $this->marketingModel->markEmailsAsProcessed([$recordId]);
                    continue;
                }
    
                if (stripos($content, '<html') !== false && substr_count($content, '<') > 50) {
                    log_message('debug', "⏭️ Skipping record ID {$recordId} — likely raw HTML content.");
                    $this->marketingModel->markEmailsAsProcessed([$recordId]);
                    continue;
                }
    
                try {
                    gc_collect_cycles(); // Helps reduce memory pressure
    
                    $processed = $this->getMarketingService()->generateContentFromRaw($record);
    
                    if (!is_array($processed)) {
                        log_message('warning', "⚠️ Skipped record ID {$recordId} — generateContentFromRaw() returned invalid result.");
                        continue;
                    }
    
                    $this->marketingModel->saveFinalizedMarketingContent($processed);
                    $this->marketingModel->markEmailsAsProcessed([$recordId]);
    
                    $summary[] = [
                        'title' => $processed['headline'] ?? 'Untitled',
                        'summary' => $processed['summary'] ?? '',
                        'subtopics' => $processed['subtopics'] ?? [],
                        'platform_posts' => $processed['posts'] ?? [],
                    ];
                } catch (\Throwable $e) {
                    log_message('error', "❌ Error processing record ID {$recordId}: {$e->getMessage()}");
                }
            }

            log_message('debug', '🏁 Peak Memory Usage: ' . memory_get_peak_usage(true));
            $response = [
                'status'          => 'success',
                'digest'          => $summary,
                'idempotency_key' => $idempotency['key'],
            ];

            $this->finalizeIdempotencyKey($idempotency['key'], 200, $response);

            return Http::jsonSuccess($response);

        } catch (\Throwable $e) {
            $this->finalizeIdempotencyKey($idempotency['key'] ?? null, 500, ['error' => $e->getMessage()]);
            log_message('error', '❌ generateDailyContentDigest fatal error: ' . $e->getMessage());
            return Http::jsonError($e->getMessage(), 500);
        }
    }
    
    public function generateRankedMarketingContent()
    {
        $this->getMyMIMarketing()->generateRankedMarketingContent();

        return Http::jsonSuccess(['status' => 'success', 'message' => 'Ranked content generated.']);
    }
    
    public function getBalanceSheet($symbol, $apikey) {
        $url = "https://www.alphavantage.co/query?function=BALANCE_SHEET&symbol=" . urlencode($symbol) . "&apikey=" . $apikey;
        $json = file_get_contents($url);
        return json_decode($json, true);
    }
    
    public function getCashFlowStatement($symbol, $apikey) {
        $url = "https://www.alphavantage.co/query?function=CASH_FLOW&symbol=" . urlencode($symbol) . "&apikey=" . $apikey;
        $json = file_get_contents($url);
        return json_decode($json, true);
    }

    public function getCompanyOverview($symbol, $apikey) {
        $url = "https://www.alphavantage.co/query?function=OVERVIEW&symbol=" . urlencode($symbol) . "&apikey=" . $apikey;
        $json = file_get_contents($url);
        return json_decode($json, true);
    }
    
    public function getEarningsCalendar($apikey, $horizon = '3month') {
        $url = "https://www.alphavantage.co/query?function=EARNINGS_CALENDAR&horizon=" . $horizon . "&apikey=" . $apikey;
        $csv = file_get_contents($url);
        $lines = explode("\n", trim($csv));
        $data = array_map('str_getcsv', $lines);
        return $data;
    }

    public function getFixedWindowAnalytics($symbols, $rangeStart, $rangeEnd, $calculations, $apikey) {
        $url = "https://alphavantageapi.co/timeseries/analytics?SYMBOLS=" . urlencode($symbols);
        $url .= "&RANGE=" . $rangeStart . "&RANGE=" . $rangeEnd;
        $url .= "&INTERVAL=DAILY&OHLC=close";
        $url .= "&CALCULATIONS=" . urlencode($calculations) . "&apikey=" . $apikey;
    
        $json = file_get_contents($url);
        return json_decode($json, true);
    }

    public function getIncomeStatement($symbol, $apikey) {
        $url = "https://www.alphavantage.co/query?function=INCOME_STATEMENT&symbol=" . urlencode($symbol) . "&apikey=" . $apikey;
        $json = file_get_contents($url);
        return json_decode($json, true);
    }
    
    public function getInsiderTransactions($symbol, $apikey) {
        $url = "https://www.alphavantage.co/query?function=INSIDER_TRANSACTIONS&symbol=" . urlencode($symbol) . "&apikey=" . $apikey;
        $json = file_get_contents($url);
        return json_decode($json, true);
    }
    
    public function getNewsSentiment($apikey, $tickers = '', $topics = '', $time_from = '', $time_to = '', $sort = 'LATEST', $limit = 50) {
        $url = "https://www.alphavantage.co/query?function=NEWS_SENTIMENT";
        $url .= "&tickers=" . urlencode($tickers);
        $url .= "&topics=" . urlencode($topics);
        if ($time_from) $url .= "&time_from=" . $time_from;
        if ($time_to) $url .= "&time_to=" . $time_to;
        $url .= "&sort=" . $sort . "&limit=" . $limit . "&apikey=" . $apikey;
    
        $json = file_get_contents($url);
        return json_decode($json, true);
    }

    public function getSlidingWindowAnalytics($symbols, $range, $windowSize, $calculations, $apikey) {
        $url = "https://alphavantageapi.co/timeseries/running_analytics?SYMBOLS=" . urlencode($symbols);
        $url .= "&RANGE=" . $range . "&INTERVAL=DAILY&OHLC=close";
        $url .= "&WINDOW_SIZE=" . $windowSize;
        $url .= "&CALCULATIONS=" . urlencode($calculations) . "&apikey=" . $apikey;
    
        $json = file_get_contents($url);
        return json_decode($json, true);
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
    
            // ✅ Return both raw and cleaned for comparison/debugging
            return $this->respond([
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
    
    
    public function testTfIdfPipeline()
    {
        $samples = [
            'Short unstructured',
            'This is a valid test document with enough content and structure to process correctly.',
            '     ',
            '<html><body>Broken HTML without substance</body></html>',
            'Here is another test input to validate TF-IDF scoring logic.',
        ];

        foreach ($samples as $i => $text) {
            $summary = $this->MyMIMarketing->summarizeText($text);
            $keywords = $this->MyMIMarketing->extractKeywords($text);
            $scorePreview = $this->MyMIMarketing->getTopKeywordScores($text, 5);

            log_message('debug', "🧪 Test #{$i} | Summary: {$summary}");
            log_message('debug', "🧪 Test #{$i} | Keywords: " . implode(',', $keywords));
            log_message('debug', "📊 Test #{$i} | TF-IDF Scores: " . print_r($scorePreview, true));
        }

        return $this->respond(['status' => 'ok', 'message' => 'TF-IDF test pipeline ran successfully.']);
    }

    // public function generatePostsFromSummary($id)
    // {
    //     try {
    //         $record = $this->marketingModel->findFinalizedById($id);
    //         if (!$record || empty($record['summary'])) {
    //             return $this->failNotFound('Summary not found.');
    //         }
    
    //         $marketing = $this->getMyMIMarketing();
    //         $headline = $record['title'];
    //         $summary = $record['summary'];
    
    //         log_message('debug', "📝 Generating platform posts from summary for ID {$id}");
    
    //         $posts = [
    //             'facebook' => $marketing->formatSocialPost($headline, $summary, 'facebook'),
    //             'linkedin' => $marketing->formatSocialPost($headline, $summary, 'linkedin'),
    //             'twitter'  => $marketing->formatSocialPost($headline, $summary, 'twitter'),
    //             'discord'  => $marketing->formatDiscordPost($headline, $summary),
    //             'email'    => $marketing->formatEmailBlast($headline, $summary),
    //             'blog'     => $marketing->formatBlogPost($headline, $summary),
    //             'video'    => $marketing->formatVideoScript($headline, $summary),
    //         ];
    
    //         $platformsUsed = implode(',', array_keys($posts));
    
    //         $this->marketingModel->saveGeneratedPost([
    //             'source_id' => $record['id'],
    //             'title'     => $headline,
    //             'summary'   => $summary,
    //             'posts'     => json_encode($posts),
    //             'platforms' => $platformsUsed,
    //             'status'    => 'draft',
    //         ]);
    
    //         log_message('info', "✅ Posts generated and saved for summary ID {$id}");
    
    //         return $this->respond([
    //             'status' => 'success',
    //             'message' => 'Generated content saved.',
    //             'posts' => $posts
    //         ]);
    //     } catch (\Throwable $e) {
    //         log_message('error', "[GeneratePosts] Failed for summary ID {$id}: " . $e->getMessage());
    //         return $this->failServerError('Unable to generate posts.');
    //     }
    // }
        
    public function generateTodaysNewsSummary(): array {
        $todayNews = $this->marketingModel->getTodaysTopNewsSummaries(10);

        if (empty($todayNews)) {
            return ['status' => 'error', 'message' => 'No news found for today.', 'content' => null];
        }

        $summary = $this->getMyMIMarketing()->summarizeMultipleArticles($todayNews); // NLP Summarization
        $content = $this->getMyMIMarketing()->generateMarketingContent($summary); // social, blog, video scripts

        return ['status' => 'success', 'summary' => $summary, 'content' => $content];
    }
    
    public function generateTodaysStory()
    {
        ini_set('memory_limit', '1024M');
    
        try {
            log_message('info', '🔍 Starting email scrape for news@mymiwallet.com...');
            $this->getMyMIMarketing()->fetchAndStoreEmails('news');
    
            $today = date('Y-m-d');
            $scrapes = $this->marketingModel->getScrapesByDate($today, 10);
    
            if (empty($scrapes)) {
                log_message('info', 'No scraped emails found for today.');
                return Http::jsonError('No emails found for today.', 404);
            }
    
            $summaries = [];
    
            foreach (array_chunk($scrapes, 10) as $scrapeChunk) {
                foreach ($scrapeChunk as $scrape) {
                    $content = $scrape['email_body'] ?? $scrape['content'] ?? '';
                    log_message('info', 'Content size: ' . strlen($content));
    
                    $cleanedBody = $this->marketingModel->cleanHtmlEmailContent($content);
                    $summary = $this->getMyMIMarketing()->summarizeContent($cleanedBody);
    
                    log_message('debug', 'Memory after summary: ' . memory_get_usage(true));
    
                    if (is_array($summary)) {
                        $summary = $summary['summary'] ?? implode('. ', array_map('strval', $summary));
                    }
    
                    $summaries[] = $summary;
                }
            }
    
            $combinedSummary = implode("\n\n", $summaries);
            if (strlen($combinedSummary) > 500000) {
                log_message('warning', 'Combined summary too long. Truncating...');
                $combinedSummary = substr($combinedSummary, 0, 500000);
            }
    
            $todayTitle = "Today's Top Stories - " . date('F j, Y');
            $data = [
                'title' => $todayTitle,
                'content' => $combinedSummary,
                'links' => json_encode([]),
                'url' => '',
                'type' => 'todays_story',
                'scraped_at' => date('Y-m-d H:i:s'),
                'created_on' => date('Y-m-d H:i:s'),
                'modified_on' => date('Y-m-d H:i:s'),
            ];
    
            $this->marketingModel->storeTempScrapedData($data);
            log_message('info', '✅ Today’s story generated and stored.');
    
            return Http::jsonSuccess([
                'status' => 'success',
                'message' => 'Today’s story generated and stored successfully!',
                'title' => $todayTitle,
                'summary' => $combinedSummary
            ]);
        } catch (\Throwable $e) {
            log_message('error', '❌ generateTodaysStory error: ' . $e->getMessage());
            return Http::jsonError($e->getMessage(), 500);
        }
    }

    public function generateVoiceScriptManually() {
        try {
            log_message('info', '🎤 generateVoiceScriptManually() triggered.');
            $script = $this->getMyMIMarketing()->generateVoiceoverScript();
            return Http::jsonSuccess(['status' => 'success', 'script' => $script]);
        } catch (\Throwable $e) {
            log_message('error', '❌ Error in generateVoiceScriptManually: ' . $e->getMessage());
            return Http::jsonError($e->getMessage());
        }
    }

    public function getAlerts()
    {
        log_message('debug', '🔍 getAlerts called');
        try {
            $alerts = $this->alertsModel->getAllTradeAlerts();
            log_message('debug', '✅ getAlerts retrieved ' . count($alerts) . ' alerts.');
            return Http::jsonSuccess($alerts);
        } catch (\Throwable $e) {
            log_message('error', '❌ getAlerts error: ' . $e->getMessage());
            return $this->failServerError($e->getMessage());
        }
    }

    public function getAssets()
    {
        log_message('debug', '📊 getAssets called');
        try {
            $assets = $this->exchangeModel->getManagementAssets();
            log_message('debug', '✅ getAssets retrieved ' . count($assets) . ' assets.');
            return Http::jsonSuccess($assets);
        } catch (\Throwable $e) {
            log_message('error', '❌ getAssets error: ' . $e->getMessage());
            return $this->failServerError($e->getMessage());
        }
    }
    
    public function getNews()
    {
        log_message('debug', '📰 getNews called');
        try {
            $news = $this->marketingModel->getNewsAlerts();
            log_message('debug', '✅ getNews retrieved ' . count($news) . ' news records.');
            return Http::jsonSuccess($news);
        } catch (\Throwable $e) {
            log_message('error', '❌ getNews error: ' . $e->getMessage());
            return $this->failServerError($e->getMessage());
        }
    }
    
    public function getReferrals()
    {
        log_message('debug', '🔍 getReferrals called');
        try {
            $referrals = $this->referralModel->getAllReferrals();
            log_message('debug', '✅ getReferrals retrieved ' . count($referrals) . ' referrals.');
            return Http::jsonSuccess($referrals);
        } catch (\Throwable $e) {
            log_message('error', '❌ getReferrals error: ' . $e->getMessage());
            return $this->failServerError($e->getMessage());
        }
    }

    public function getSupport()
    {
        log_message('debug', '🧾 getSupport called');
        try {
            $support = $this->supportModel->getManagementSupport();
            log_message('debug', '✅ getSupport retrieved ' . count($support) . ' support records.');
            return Http::jsonSuccess($support);
        } catch (\Throwable $e) {
            log_message('error', '❌ getSupport error: ' . $e->getMessage());
            return $this->failServerError($e->getMessage());
        }
    }
    
    public function getTopMovers($apikey) {
        $url = "https://www.alphavantage.co/query?function=TOP_GAINERS_LOSERS&apikey=" . $apikey;
        $json = file_get_contents($url);
        return json_decode($json, true);
    }
    
    public function getUpcomingIPOs($apikey) {
        $url = "https://www.alphavantage.co/query?function=IPO_CALENDAR&apikey=" . $apikey;
        $csv = file_get_contents($url);
        $lines = explode("\n", trim($csv));
        $data = array_map('str_getcsv', $lines);
        return $data;
    }

    public function getUsers()
    {
        log_message('debug', '🔍 getUsers called');
        // log_message('debug', '✅ getUsers started');
        // $users = $this->userModel->getActiveUsers();
        // log_message('debug', '✅ getUsers retrieved ' . count($users) . ' users.');
        // return Http::jsonSuccess($users);
    }

    /**
     * Management Endpoint: Resend Activation Emails for All Users (Reference Example)
     */
    public function massResendActivationEmails()
    {
        // $users = $this->userModel
        //     ->where('active', 0)
        //     ->whereNotNull('activate_hash')
        //     ->findAll();
        // $users = $this->userModel->getUsersByStatus(0); // Then filter those with activate_hash
        // $users = array_filter($users, fn($u) => !empty($u['activate_hash']));
        $users = $this->userModel->getPendingActivationUsers(); // Then filter those with activate_hash
    
        $activator = service('activator');
        // $emailer = \Config\Services::email();
    
        $successCount = 0;
        $failureCount = 0;
    
        foreach ($users as $user) {
            $sent = $activator->send($user);
            if ($sent) {
                $successCount++;
                log_message('info', "Activation email sent to: {$user->email}");
            } else {
                $failureCount++;
                log_message('error', "Failed to send activation email to: {$user->email}");
            }
        }
    
        $summary = "{$successCount} emails sent successfully, {$failureCount} failed.";
        return Http::redirectTo('/Management/Users')->with('message', $summary);
    }
    
    /**
     * Management Endpoint: Manually Trigger Processing of Trade Alerts
     */
    public function processAllTradeAlerts()
    {
        $token    = $this->request->getHeaderLine('X-CRON-Key') ?: $this->request->getGet('cronKey');
        $expected = env('CRON_SHARED_KEY');

        if (! $expected || ! hash_equals((string) $expected, (string) $token)) {
            log_message('warning', '🚫 Management API - processAllTradeAlerts blocked - invalid token');
            return $this->failForbidden('Invalid CRON key.');
        }

        $batchSize = (int) ($this->request->getGet('batch_size') ?? 50);
        $idempotency = $this->reserveIdempotencyKey(
            'cron:trade-alerts',
            $this->getRequestIdempotencyKey(),
            45
        );

        if (! $idempotency['ok']) {
            return Http::jsonSuccess([
                'status'          => 'skipped',
                'reason'          => 'idempotency_replay',
                'idempotency_key' => $idempotency['key'],
            ]);
        }

        $start         = microtime(true);
        $pendingBefore = $this->alertsModel->builder()->where('status', 'Pending')->countAllResults();
        $summary = [
            'idempotency_key' => $idempotency['key'],
            'pending_before'  => $pendingBefore,
            'batch_size'      => $batchSize,
        ];

        try {
            log_message('info', '⚡ Management API - processAllTradeAlerts triggered.');

            $emailsFetched = $this->alertManager->fetchAndStoreAlertsEmails();
            $summary['emails_ingested'] = $emailsFetched ? 'fetched' : 'none';

            $this->alertManager->processTradeAlertsInBatches($batchSize);
            $summary['pending_after'] = $this->alertsModel->builder()->where('status', 'Pending')->countAllResults();

            $this->alertManager->updateAlerts();

            $summary['duration_ms'] = (int) ((microtime(true) - $start) * 1000);

            $this->finalizeIdempotencyKey($idempotency['key'], 200, $summary);
            log_message(
                'info',
                sprintf(
                    '✅ processAllTradeAlerts completed (key=%s) pending_before=%d pending_after=%d duration_ms=%d',
                    $summary['idempotency_key'],
                    $summary['pending_before'],
                    $summary['pending_after'],
                    $summary['duration_ms']
                )
            );

            return Http::jsonSuccess([
                'status'          => 'success',
                'message'         => 'All trade alerts processed successfully.',
                'idempotency_key' => $summary['idempotency_key'],
                'summary'         => $summary,
            ]);
        } catch (\Exception $e) {
            $this->finalizeIdempotencyKey($idempotency['key'], 500, ['error' => $e->getMessage()]);
            log_message('error', '❌ Management API - Error processing trade alerts: ' . $e->getMessage());
            return Http::jsonError($e->getMessage(), 500);
        }
    }

    public function processAndGenerateMarketingContent() {
    
        // Step 1: Fetch raw email content (assume it's already in `bf_marketing_scraper`)
        $emails = $this->getMarketingService()->fetchUnprocessedEmailSummaries(); // Custom method
        if (!empty($emails) && is_array($emails)) {
            foreach ($emails as $email) {
                // Step 2: Sanitize & Summarize
                $cleanContent = $this->getMarketingService()->sanitizeAndSummarize($email['email_body']);
        
                // Step 3: Extract Keywords
                $keywords = $this->getMyMIMarketing()->extractTopKeywords($cleanContent);
        
                // Step 4: Keyword-based Content Search
                $externalContent = $this->getMarketingService()->gatherKeywordBasedContent($keywords);
        
                // Step 5: Store content in `bf_marketing_temp_scraper`
                $this->getMarketingService()->storeScrapedContent($externalContent);
        
                // Step 6: Generate platform-specific content
                $generatedPosts = $this->getMarketingService()->generatePlatformPosts($externalContent);
        
                // Step 7: Store for display on Dashboard
                $this->getMarketingService()->storeGeneratedPostsForDashboard($generatedPosts);
            }
        }
    
        return Http::redirectTo('/Management/Marketing')->with('message', 'Content generation completed.');
    }

    public function processQueuedEmails()
    {
        $queue = $this->marketingModel->getQueuedEmails(25); // Limit batch size
        $mailService = service('mailService');
    
        foreach ($queue as $email) {
            try {
                $result = $mailService->send(
                    $email['email'],
                    $email['subject'],
                    $email['content'],
                    [
                        'module' => 'marketing',
                        'queue'  => true,
                    ]
                );

                if ($result['ok'] ?? false) {
                    $this->marketingModel->markEmailAsSent($email['id']);
                } else {
                    $error = $result['error'] ?? 'unknown error';
                    $this->marketingModel->incrementRetry($email['id']);
                    log_message('error', "[EmailQueue] ❌ Failed to queue: {$error}");
                }
            } catch (\Throwable $e) {
                $this->marketingModel->incrementRetry($email['id']);
                log_message('error', "❌ Email ID {$email['id']} failed: ".$e->getMessage());
            }
        }
    
        return Http::jsonSuccess([
            'status'   => 'complete',
            'sent'     => $successCount,
            'failed'   => $failCount,
            'total'    => count($queue),
        ]);
    }
    
    public function processTempEmailsToScraper()
    {
        try {
            log_message('info', '⚙️ Starting content generation from bf_marketing_temp_scraper...');
            $tempEmails = $this->marketingModel->getRecentScrapes(); // Only fetches latest 5
    
            foreach ($tempEmails as $email) {
                $cleanedBody = $this->marketingModel->cleanHtmlEmailContent($email->email_body);
                $summary = $this->getMyMIMarketing()->summarizeContent($cleanedBody);
                $keywords = $this->marketingModel->extractKeywords($email->email_body);
                $hashtags = $this->marketingModel->mapToContextualHashtags($keywords);
    
                $data = [
                    'title' => $email->email_subject ?? 'Generated Content',
                    'summary' => is_array($summary) ? implode("\n", $summary) : $summary,
                    'content' => $email->email_body,
                    'tags' => implode(',', $keywords),
                    'type' => 'Email/Newsletters',
                    'status' => 'pending',
                    'created_on' => date('Y-m-d H:i:s'),
                    'author_information' => $email->email_sender,
                ];
    
                $this->marketingModel->saveDailyLog($data);
            }
            log_message('info', '✅ Finished processing and saving to bf_marketing_scraper.');

            return Http::jsonSuccess([
                'status' => 'success',
                'message' => 'Content generated and saved to bf_marketing_scraper.',
            ]);
        } catch (\Throwable $e) {
            log_message('error', '❌ processTempEmailsToScraper error: ' . $e->getMessage());
            return Http::jsonError($e->getMessage(), 500);
        }
    }    

    public function reprocessIncompleteEmails()
    {
        try {
            $this->getMyMIMarketing()->reprocessIncompleteEmails();
            return Http::jsonSuccess(['status' => 'success', 'message' => 'Backfilled incomplete emails.']);
        } catch (\Throwable $e) {
            log_message('error', '❌ reprocessIncompleteEmails error: ' . $e->getMessage());
            return $this->failServerError('Failed to reprocess incomplete emails.');
        }
    }
 
    public function resendActivationEmailsBatch()
    {
        helper('email');
    
        $userModel = model(UserModel::class);
    
        $users = $userModel->where('active', 0)
            ->where('activate_hash IS NOT NULL', null, false)
            ->where('activate_email_resend IS NULL', null, false)
            ->limit(25)
            ->findAll();
    
        if (empty($users)) {
            log_message('info', '✅ [CRON] No users left to resend activation email to.');
            return Http::jsonSuccess(['status' => 'complete', 'message' => 'No users pending activation email resend.']);
        }
    
        // $emailService = \Config\Services::email();
        $siteSettings = config('SiteSettings');
        $socialMedia  = config('SocialMedia');
    
        $successCount = 0;
        $failureCount = 0;
    
        foreach ($users as $user) {
            try {
                $activationToken = $user->activate_hash;
                $userEmail       = $user->email;
    
                $emailBody = view('emails/completeActivation', [
                    'activationToken' => $activationToken,
                    'siteSettings'    => $siteSettings,
                    'socialMedia'     => $socialMedia,
                ]);
    
                $result = service('mailService')->send(
                    $userEmail,
                    '🚀 Activate Your MyMI Wallet Account',
                    $emailBody,
                    [
                        'module' => 'auth',
                        'queue'  => true,
                    ]
                );

                if ($result['ok'] ?? false) {
                    $userModel->update($user->id, [
                        'activate_email_resend' => date('Y-m-d H:i:s')
                    ]);
                    log_message('info', "[ActivationResend] ✅ Email sent to: {$userEmail}");
                    $successCount++;
                } else {
                    $error = $result['error'] ?? 'unknown';
                    log_message('error', "[ActivationResend] ❌ Failed to send email to {$userEmail} | Debug: {$error}");
                    $failureCount++;
                }
            } catch (\Throwable $e) {
                log_message('critical', "[ActivationResend] 💥 Exception for {$user->email}: " . $e->getMessage());
                $failureCount++;
            }
        }
    
        return Http::jsonSuccess([
            'status'  => 'complete',
            'success' => $successCount,
            'failed'  => $failureCount,
            'message' => "Resent {$successCount} activation emails, {$failureCount} failed."
        ]);
    }    
    
    public function resendActivationEmailsBatchQueued()
    {
        helper('email');
        $userModel       = model(UserModel::class);
        $marketingModel  = model(MarketingModel::class);
        $siteSettings    = config('SiteSettings');
        $socialMedia     = config('SocialMedia');
    
        $users = $userModel->where('active', 0)
            ->where('activate_hash IS NOT NULL', null, false)
            ->where('activate_email_resend IS NULL', null, false)
            ->limit(25)
            ->findAll();
    
        if (empty($users)) {
            log_message('info', '📪 No users left for activation email resend.');
            return Http::jsonSuccess(['status' => 'empty']);
        }
    
        foreach ($users as $user) {
            try {
                $userEmail   = $user->email;
                $activation  = $user->activate_hash;
    
                $emailBody = view('emails/completeActivation', [
                    'activationToken' => $activation,
                    'siteSettings'    => $siteSettings,
                    'socialMedia'     => $socialMedia,
                ]);
    
                $queued = $marketingModel->queueEmail([
                    'user_id'     => $user->id,
                    'email'       => $userEmail,
                    'subject'     => '🚀 Activate Your MyMI Wallet Account',
                    'content'     => $emailBody,
                    'type'        => 'activation_resend',
                    'status'      => 'queued',
                    'priority'    => 'normal',
                    'scheduled_at'=> date('Y-m-d H:i:s'),
                    'created_at'  => date('Y-m-d H:i:s'),
                ]);
    
                if ($queued) {
                    $userModel->update($user->id, ['activate_email_resend' => date('Y-m-d H:i:s')]);
                    log_message('info', "📥 Queued activation email to: {$userEmail}");
                } else {
                    log_message('error', "❌ Failed to queue activation email to: {$userEmail}");
                }
            } catch (\Throwable $e) {
                log_message('critical', "🚨 Queuing error for user {$user->email}: {$e->getMessage()}");
            }
        }
    
        return Http::jsonSuccess(['status' => 'queued', 'count' => count($users)]);
    }
    
    public function runCronManually()
    {
        if ($response = $this->requireCronAuth()) {
            return $response;
        }

        $result = $this->executeCronWorkflow();
        $result['message'] = 'Manual CRON execution complete.';

        return Http::jsonSuccess($result);
    }

    public function runDailyAlphaVantageDataPipeline() {
        if ($response = $this->requireCronAuth()) {
            return $response;
        }

        $symbols = array_map(static function ($row) {
            return is_array($row) ? ($row['symbol'] ?? null) : $row;
        }, $this->alertsModel->getTopWatchlistSymbols());

        $symbols = array_values(array_filter(array_map(static fn ($symbol) => $symbol ? strtoupper((string) $symbol) : null, $symbols)));

        $jobId = $this->alphaVantageService->enqueue($symbols, getenv('ALPHA_VANTAGE_KEY') ?: null);

        return Http::jsonSuccess([
            'job_id'  => $jobId,
            'symbols' => $symbols,
            'message' => 'Pipeline queued. Monitor queue:work alpha_vantage.',
        ], 202);
    }

    public function sendTestActivationEmail()
    {
        helper('email');
    
        $userModel = model(UserModel::class);
        $user      = $userModel->find(2); // Manually testing user ID 2
    
        if (!$user || empty($user->activate_hash)) {
            return $this->failNotFound('Test user or activation token not found.');
        }
    
        // $emailService = \Config\Services::email();
        $siteSettings = config('SiteSettings');
        $socialMedia  = config('SocialMedia');
    
        $emailBody = view('emails/completeActivation', [
            'activationToken' => $user->activate_hash,
            'siteSettings'    => $siteSettings,
            'socialMedia'     => $socialMedia,
        ]);
    
        $result = service('mailService')->send(
            'tburks2392@gmail.com',
            '✅ [TEST] Activate Your MyMI Wallet Account',
            $emailBody,
            [
                'module' => 'auth',
                'queue'  => true,
            ]
        );

        if ($result['ok'] ?? false) {
            return $this->respond(['status' => 'success', 'message' => 'Test activation email sent successfully.']);
        }

        $errorDebug = $result['error'] ?? 'unknown';
        return $this->failServerError("Failed to send test email. Debug: {$errorDebug}");
    }
    
    
    protected function requireCronAuth(): ?ResponseInterface
    {
        $expected = trim((string) getenv('MYMI_CRON_TOKEN'));

        if ($expected === '') {
            return null;
        }

        $authHeader = $this->request->getHeaderLine('Authorization');
        $provided   = '';

        if ($authHeader && preg_match('/Bearer\s+(.*)$/i', $authHeader, $matches)) {
            $provided = trim($matches[1]);
        }

        if ($provided === '') {
            $provided = (string) $this->request->getGet('token');
        }

        if ($provided === '' || ! hash_equals($expected, $provided)) {
            log_message('warning', 'Cron auth failed for ManagementController endpoint.');

            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }

        return null;
    }

    public function sendToZapierManually() {
        $summary = $this->generateTodaysNewsSummary();
        $result = $this->getMyMIMarketing()->sendToZapier($summary['content']);
        return Http::jsonSuccess(['status' => 'success', 'message' => 'Sent manually to Zapier.', 'result' => $result]);
    }

    public function scrapeAndGenerateTodaysStoryFromInbox()
    {
        try {
            log_message('info', '📥 Starting inbox scrape for news@mymiwallet.com...');
            $this->getMyMIMarketing()->fetchAndStoreEmails('news');
    
            $today = date('Y-m-d');
            $scrapes = $this->marketingModel->getScrapesByDate($today);
    
            if (empty($scrapes)) {
                log_message('info', '📭 No emails found for today.');
                return Http::jsonError('No emails found for today.', 404);
            }
    
            $summaries = [];
            foreach ($scrapes as $scrape) {
                $cleanedBody = $this->marketingModel->cleanHtmlEmailContent($scrape['content']);
                $summary = $this->getMyMIMarketing()->summarizeContent($cleanedBody);
    
                if (is_array($summary)) {
                    $summary = $summary['summary'] ?? implode('. ', array_map('strval', $summary));
                }
    
                $summaries[] = $summary;
            }
    
            $combinedSummary = implode("\n\n", $summaries);
            if (strlen($combinedSummary) > 500000) {
                log_message('warning', 'Combined summary too long. Truncating...');
                $combinedSummary = substr($combinedSummary, 0, 500000);
            }
    
            $todayTitle = "Today's News Highlights - " . date('F j, Y');
            $data = [
                'title' => $todayTitle,
                'content' => $combinedSummary,
                'links' => json_encode([]),
                'url' => '',
                'type' => 'todays_story',
                'scraped_at' => date('Y-m-d H:i:s'),
                'created_on' => date('Y-m-d H:i:s'),
                'modified_on' => date('Y-m-d H:i:s'),
            ];
    
            $this->marketingModel->storeTempScrapedData($data);
            log_message('info', '✅ Today’s story generated and stored.');
    
            return Http::jsonSuccess([
                'status' => 'success',
                'message' => 'Today’s story generated and stored successfully!',
                'title' => $todayTitle,
                'summary' => $combinedSummary
            ]);
        } catch (\Throwable $e) {
            log_message('error', '❌ scrapeAndGenerateTodaysStoryFromInbox error: ' . $e->getMessage());
            return Http::jsonError($e->getMessage(), 500);
        }
    }
    
    public function sharePost($id, $platform)
    {
        try {
            $post = $this->marketingModel->getGeneratedPostById($id);
            if (!$post || empty($post['posts'])) {
                return $this->failNotFound('Post not found or invalid.');
            }
    
            $posts = json_decode($post['posts'], true);
            $message = $posts[$platform] ?? null;
    
            if (!$message) {
                return $this->failValidationError("No formatted message found for platform: $platform");
            }
    
            $success = $this->getMarketingService()->distributeContent($platform, $message);
    
            if ($success) {
                return $this->respond(['status' => 'success', 'message' => 'Post shared.']);
            } else {
                return $this->failServerError('Failed to dispatch post.');
            }
        } catch (\Throwable $e) {
            log_message('error', "[PostShare] Error: " . $e->getMessage());
            return $this->failServerError('An unexpected error occurred.');
        }
    }
    
    /**
     * Management Endpoint: Send All Pending Discord Alerts
     */
    public function sendAllDiscordAlerts()
    {
        $alerts = $this->alertsModel->getAlertsWithNewTVChart();
        if (empty($alerts)) {
            return Http::jsonError('No new alerts to send.', 404);
        }

        foreach ($alerts as $alert) {
            $this->alertManager->sendDiscordNotification($alert);
        }

        return Http::jsonSuccess(['status' => 'success', 'message' => 'All Discord notifications sent.']);
    }

    public function unsubscribe($token = null)
    {
        if (empty($token)) {
            return $this->failValidationError('Missing unsubscribe token.');
        }

        $email = $this->emailModel->getEmailByUnsubscribeToken($token);

        if (!$email) {
            return $this->failNotFound('Invalid unsubscribe token.');
        }

        $this->emailModel->unsubscribeEmail($email);
        return $this->renderTheme('emails/unsubscribed', ['email' => $email]);
    }

    /**
     * Management Endpoint: Update Market Data for Trade Alerts
     */
    public function updateMarketDataForAlerts()
    {
        try {
            $this->alertManager->updateAlerts();
            return Http::jsonSuccess(['status' => 'success', 'message' => 'Trade alerts updated with market data.']);
        } catch (\Exception $e) {
            return Http::jsonError('Failed to update market data: ' . $e->getMessage(), 500);
        }
    }

    private function isHealthcheckAllowed(?string $clientIp, ?string $token, array $allowedIps): bool
    {
        $providedToken = $this->request->getHeaderLine('X-Log-Healthcheck-Token') ?: $this->request->getGet('token');

        if ($token && $providedToken && hash_equals((string) $token, (string) $providedToken)) {
            return true;
        }

        if ($allowedIps && $clientIp && in_array($clientIp, $allowedIps, true)) {
            return true;
        }

        return false;
    }

    private function resolveLogPath(): string
    {
        $loggerConfig = config('Logger');
        $fileConfig   = $loggerConfig->handlers[FileHandler::class] ?? [];

        $path = $fileConfig['path'] ?? WRITEPATH . 'logs/';
        $path = $path === '' ? WRITEPATH . 'logs/' : rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        $extension = $fileConfig['fileExtension'] ?? 'log';
        $extension = $extension === '' ? 'log' : $extension;

        return $path . 'log-' . date('Y-m-d') . '.' . $extension;
    }

    private function dbHealthcheck(string $marker): bool
    {
        try {
            $db = Database::connect();
            $builder = $db->table('bf_error_logs');
            $builder->where('created_at >=', date('Y-m-d H:i:s', time() - 120));
            $builder->like('message', $marker, 'both', false);

            return $builder->countAllResults() > 0;
        } catch (\Throwable $e) {
            return false;
        }
    }
}
?>
