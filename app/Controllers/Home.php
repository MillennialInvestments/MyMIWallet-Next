<?php

namespace App\Controllers;

use App\Models\{AlertsModel, PageSEOModel, ReferralModel, SubscribeModel, UserModel};
use App\Services\MetaService;
use App\Libraries\MyMIAnalytics;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Home extends BaseController
{
    // Old deps as props (lazy-loaded)
    protected $auth;
    protected $session;
    protected $siteSettings;

    protected ?MyMIAnalytics $myMIAnalytics = null;
    protected ?MetaService   $metaService   = null;

    protected ?AlertsModel   $alertsModel   = null;
    protected ?PageSEOModel  $pageSEOModel  = null;
    protected ?ReferralModel $referralModel = null;
    protected ?SubscribeModel $subscribeModel = null;
    protected ?UserModel     $userModel     = null;

    protected ?int $cuID = null;

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);

        // Core services/settings
        try {
            $this->auth = service('authentication');
        } catch (\Throwable $e) {
            log_message('error', 'Home controller auth bootstrap failed: {message}', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);

            $this->auth = null;
        }

        $this->session     = service('session');
        $this->siteSettings = config('SiteSettings');

        // Resolve current user id (fallbacks preserved)
        $this->cuID = 0;

        try {
            if ($this->auth && method_exists($this->auth, 'id')) {
                $this->cuID = $this->safeAuthId();
            }
        } catch (\Throwable $e) {
            log_message('error', 'Home controller user id resolution failed: {message}', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);

            $this->cuID = 0;
        }

        // Lazy-initialize library/services if available
        $this->myMIAnalytics = class_exists(MyMIAnalytics::class) ? new MyMIAnalytics() : null;
        $this->metaService   = class_exists(MetaService::class)   ? new MetaService()   : null;

        // Models (only if classes exist)
        $this->alertsModel    = class_exists(AlertsModel::class)    ? new AlertsModel()    : null;
        $this->pageSEOModel   = class_exists(PageSEOModel::class)   ? new PageSEOModel()   : null;
        $this->referralModel  = class_exists(ReferralModel::class)  ? new ReferralModel()  : null;
        $this->subscribeModel = class_exists(SubscribeModel::class) ? new SubscribeModel() : null;
        $this->userModel      = class_exists(UserModel::class)      ? new UserModel()      : null;
    }

    /**
     * Merge in your “old” commonData() enrichments on top of BaseController::commonData().
     */
    protected function buildCommonData(array $overrides = []): array|ResponseInterface
    {
        $buildStart             = microtime(true);
        $data                   = parent::commonData();
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        // Site + auth
        $data['auth']           = $this->auth;
        $data['siteSettings']   = $this->siteSettings ?? config('SiteSettings');
        $data['beta']           = (int)($data['siteSettings']->beta ?? 0);

        // Current user quick info
        $userAccount            = [];
        try {
            if ($this->cuID && method_exists($this, 'getMyMIUser')) {
                $userAccount    = $this->getMyMIUser()->getUserInformation($this->cuID) ?? [];
            }
        } catch (\Throwable $e) {
            log_message('info', 'Home::buildCommonData - no user info: ' . $e->getMessage());
        }
        $data['cuRole']         = $userAccount['cuRole'] ?? '';
        $data['cuKYC']          = $userAccount['cuKYC']  ?? '';

        // Analytics counters
        $reporting              = [];
        try {
            if ($this->myMIAnalytics) {
                $reporting = $this->myMIAnalytics->reporting() ?? [];
            }
        } catch (\Throwable $e) {
            log_message('error', 'Home::buildCommonData reporting() failed: ' . $e->getMessage());
        }
        $data['totalActiveUsers']     = (int)($reporting['totalActiveUsers']     ?? 0);
        $data['totalWalletsCreated']  = (int)($reporting['totalWalletsCreated']  ?? 0);
        $data['totalTradesTracked']   = (int)($reporting['totalTradesTracked']   ?? 0);
        $data['totalActivePartners']  = (int)($reporting['totalActivePartners']  ?? 0);
        $data['totalApprovedAssets']  = (int)($reporting['totalApprovedAssets']  ?? 0);

        // Money defaults
        $data['totalAccountBalance']    = $data['totalAccountBalance']    ?? 0.0;
        $data['totalAccountBalanceFMT'] = $data['totalAccountBalanceFMT'] ?? number_format((float)$data['totalAccountBalance'], 2);

        // SEO (MetaService)
        try {
            if ($this->metaService) {
                $data['meta'] = $data['meta'] ?? $this->metaService->getSeoData();
            }
        } catch (\Throwable $e) {
            log_message('error', 'Home::buildCommonData meta failed: ' . $e->getMessage());
        }

        // Premium flag (same logic as before)
        $isPremiumSession = (bool)($this->session?->get('is_premium'));
        $isPremiumRole    = in_array(strtolower($data['cuRole'] ?? ''), ['premium', 'pro', 'admin'], true);
        $isPremiumType    = (strtolower($userAccount['account_type'] ?? '') === 'premium');
        $data['isPremiumUser'] = $isPremiumSession || $isPremiumRole || $isPremiumType;

        // Apply any overrides from controller action
        if (!empty($overrides)) {
            $data = array_replace($data, $overrides);
        }

        log_message('info', '[PERF][HOME] buildCommonData complete in {ms}ms', [
            'ms' => round((microtime(true) - $buildStart) * 1000, 2),
            'user_id' => $this->cuID,
        ]);

        return $data;
    }

    /* ------------------- ROUTES/ACTIONS ------------------- */

    // NEW temporary landing (keep your new behavior)
    public function temp()
    {
        return $this->renderTheme('temp_landing', [
            'layout'    => 'public',
            'pageName'  => 'Home',
            'pageTitle' => 'MyMI Wallet — The Future of Finance',
            'meta'      => [
                'description' => 'Budgeting & Investments, AI-driven insights, and tokenized assets — all in one secure wallet.',
                'keywords'    => 'budgeting, investments, crypto, stocks, analytics, tokenized assets',
            ],
        ]);
    }

    // If you want the old “home” as well (mapped to /home-old for now)
    public function index()
    {
        if (strtoupper((string) $this->request->getMethod()) === "HEAD") {
            return $this->response->setStatusCode(200);
        }

        $requestStart = microtime(true);
        $data = $this->buildCommonData([
            'layout'    => 'public',
            'pageName'  => 'Home',
            'pageTitle' => 'MyMI Wallet | The Future of Finance | Budgeting & Investments',
        ]);
        

        // ⬅️ NEW: pass through Response (401/redirect)
        if ($data instanceof ResponseInterface) {
            return $data;
        }
        log_message('info', '[PERF][HOME] index commonData done in {ms}ms', [
            'ms' => round((microtime(true) - $requestStart) * 1000, 2),
            'user_id' => $this->cuID,
        ]);
        $renderStart = microtime(true);
        $response = $this->renderTheme('themes/public/home', $data);
        log_message('info', '[PERF][HOME] index renderTheme done in {ms}ms', [
            'ms' => round((microtime(true) - $renderStart) * 1000, 2),
            'total_ms' => round((microtime(true) - $requestStart) * 1000, 2),
            'user_id' => $this->cuID,
        ]);

        return $response;
    }

    public function apexReferral(?string $referralCode = null)
    {
        $data = $this->buildCommonData([
            'layout'    => 'public',
            'pageName'  => 'Apex Referral',
            'pageTitle' => 'MyMI Wallet | The Future of Finance | Apex Referral',
            'referralCode' => $referralCode,
        ]);
        if ($data instanceof ResponseInterface) {
            return $data;
        }
        return $this->renderTheme('themes/public/home', $data);
    }

    public function corporateEarnings(?string $section = null)
    {
        $data = $this->buildCommonData([
            'layout'    => 'public',
            'pageName'  => 'Corporate Earnings',
            'pageTitle' => 'MyMI Wallet | The Future of Finance | Corporate Earnings',
            'contentSection' => $section,
        ]);
        if ($data instanceof ResponseInterface) {
            return $data;
        }
        return $this->renderTheme('themes/public/corporateEarnings', $data);
    }

    public function economicCalendar(?string $section = null)
    {
        $data = $this->buildCommonData([
            'layout'    => 'public',
            'pageName'  => 'Economic Calendar',
            'pageTitle' => 'MyMI Wallet | The Future of Finance | Economic Calendar',
            'contentSection' => $section,
        ]);
        if ($data instanceof ResponseInterface) {
            return $data;
        }
        return $this->renderTheme('themes/public/economicCalendar', $data);
    }

    public function economicCalendarContent(?string $section = null)
    {
        // Reuse the main Economic Calendar view while allowing deep links to sections/content
        return $this->economicCalendar($section);
    }

    public function exchange(string $slug)
    {
        $data = [
            'exchangeSlug' => $slug,
        ];

        return $this->renderTheme('themes/public/exchange', $data);
    }

    public function gettingStarted(?string $section = null, ?string $subsection = null)
    {
        $data = $this->buildCommonData([
            'layout'    => 'public',
            'pageName'  => 'Getting Started',
            'pageTitle' => 'MyMI Wallet | The Future of Finance | Getting Started',
            'contentSection' => $section,
            'contentSubsection' => $subsection,
        ]);
        if ($data instanceof ResponseInterface) {
            return $data;
        }
        return $this->renderTheme('themes/public/gettingStarted', $data);
    }

    public function memberships(?string $plan = null)
    {
        $data = $this->buildCommonData([
            'layout'    => 'public',
            'pageName'  => 'Memberships',
            'pageTitle' => 'MyMI Wallet | The Future of Finance | Memberships',
            'selectedPlan' => $plan,
        ]);
        if ($data instanceof ResponseInterface) {
            return $data;
        }
        return $this->renderTheme('themes/public/memberships', $data);
    }

    public function previewAlert(?string $symbol = null, ?string $exchangeSlug = null)
    {
        if ($exchangeSlug !== null && $symbol !== null) {
            $symbol = strtoupper(trim((string) $exchangeSlug)) . '-' . strtoupper(trim((string) $symbol));
        }

        $symbol = strtoupper(trim((string) $symbol));
        log_message('info', 'PreviewAlert symbol: {symbol}', ['symbol' => $symbol]);
        // Support NASDAQ-GUTS style slug – take last segment as ticker
        $slugSymbol = $symbol;
        $slugExchange = '';
        if ($symbol !== '') {
            $parts       = explode('-', $symbol);
            $slugSymbol  = strtoupper(end($parts));
            $slugExchange = count($parts) > 1 ? strtoupper(reset($parts)) : '';
        }

        $meta = [
            'page_title'  => 'Preview Alert — ' . ($symbol ?: 'Unknown'),
            'description' => 'Preview MyMI trade alerts, links, and tools for ' . ($symbol ?: 'this symbol') . '.',
        ];

        if ($this->metaService && method_exists($this->metaService, 'getBySlugOrFallback')) {
            try {
                $slug     = $symbol ? ('Preview/Alert/' . strtolower($symbol)) : 'Preview/Alert';
                $metaData = $this->metaService->getBySlugOrFallback($slug);

                if (is_array($metaData)) {
                    $meta = array_replace($meta, $metaData);
                }
            } catch (\Throwable $e) {
                log_message('error', 'Home::previewAlert metaService error: {msg}', ['msg' => $e->getMessage()]);
            }
        }

        $pageTitle = $meta['title'] ?? ($meta['page_title'] ?? 'Preview Alert');

        $alert             = null;
        $recentTradeAlerts = [];

        if ($this->alertsModel) {
            try {
                if ($symbol && method_exists($this->alertsModel, 'getAlertBySymbol')) {
                    $alert = $this->alertsModel->getAlertBySymbol($symbol);
                }

                if ($symbol && method_exists($this->alertsModel, 'getRecentAlerts')) {
                    $recentTradeAlerts = $this->alertsModel->getRecentAlerts($symbol, 8) ?? [];
                }
            } catch (\Throwable $e) {
                log_message('error', 'Home::previewAlert alertsModel error: {msg}', ['msg' => $e->getMessage()]);
            }
        }
        log_message('info', 'PreviewAlert found alert: {found} for symbol: {symbol}', [
            'found'  => $alert ? 'yes' : 'no',
            'exchange' => $alert['exchange'],
            'symbol' => $symbol,
        ]);
        $ticker   = '';
        $exchange = '';

        if (is_array($alert)) {
            $ticker   = strtoupper($alert['ticker']   ?? $slugSymbol ?? '');
            $exchange = strtoupper($alert['exchange'] ?? ($slugExchange ?: 'NASDAQ'));
        } else {
            $ticker   = $slugSymbol;
            $exchange = $slugExchange ?: 'NASDAQ';
        }

        $tvSymbol = ($exchange ? $exchange . ':' : '') . $ticker;

        $data = $this->buildCommonData([
            'layout'              => 'public',
            'pageName'            => 'Preview Alert',
            'pageTitle'           => $pageTitle,
            'meta'                => $meta,
            'symbol'              => $symbol,
            'alert'               => $alert,
            'tradeAlert'          => $alert,
            'recentTradeAlerts'   => $recentTradeAlerts,
            'ticker'              => $ticker,
            'exchange'            => $exchange,
            'tvSymbol'            => $tvSymbol,
            'realTimeStockData'   => $realTimeStockData ?? [],
            'secFilings'          => $secFilings ?? [],
            'comments'            => $comments ?? [],
            'companyProfile'      => $companyProfile ?? [],
            'keyStats'            => $keyStats ?? [],
            'performanceStats'    => $performanceStats ?? [],
            'valuationStats'      => $valuationStats ?? [],
            'ownershipTopHolders' => $ownershipTopHolders ?? [],
            'insiderTrades'       => $insiderTrades ?? [],
            'peers'               => $peers ?? [],
            'heldByEtfs'          => $heldByEtfs ?? [],
            'headlineNews'        => $headlineNews ?? null,
            'cuID'                => $this->cuID,
        ]);
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        return $this->renderTheme('themes/public/previewAlert', $data);
    }

    public function privacy(?string $section = null)
    {
        $data = $this->buildCommonData([
            'layout'         => 'public',
            'pageName'       => 'Privacy Policy',
            'pageTitle'      => 'Privacy Policy — MyMI Wallet',
            'contentSection' => $section,
        ]);
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        return $this->renderTheme('themes/public/privacyPolicy', $data);
    }

    public function privacyPolicy(?string $section = null)
    {
        return $this->privacy($section);
    }

    public function sector(string $slug)
    {
        $data = [
            'sectorSlug' => $slug,
        ];
        
        return $this->renderTheme('Public/sector', $data);
    }

    public function terms(?string $section = null)
    {
        $data = $this->buildCommonData([
            'layout'         => 'public',
            'pageName'       => 'Terms of Service',
            'pageTitle'      => 'Terms of Service — MyMI Wallet',
            'contentSection' => $section,
        ]);
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        return $this->renderTheme('themes/public/termsOfService', $data);
    }

    public function termsOfService(?string $section = null)
    {
        return $this->terms($section);
    }
}
