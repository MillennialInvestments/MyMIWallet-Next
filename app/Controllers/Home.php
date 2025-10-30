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
    protected $csp;
    protected $cspNonce;
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
        $this->auth        = service('authentication');
        $this->session     = service('session');
        $this->siteSettings = config('SiteSettings');

        // Resolve current user id (fallbacks preserved)
        $this->cuID = $this->auth?->id()
            ?? $this->session?->get('user_id')
            ?? null;

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
    protected function buildCommonData(array $overrides = []): array
    {
        $data = parent::commonData();

        // Site + auth
        $data['auth']        = $this->auth ?? service('authentication');
        $data['siteSettings']= $this->siteSettings ?? config('SiteSettings');
        $data['beta']        = (int)($data['siteSettings']->beta ?? 0);

        // Current user quick info
        $userAccount = [];
        try {
            if (method_exists($this, 'getMyMIUser')) {
                $userAccount = $this->getMyMIUser()->getUserInformation($this->cuID) ?? [];
            }
        } catch (\Throwable $e) {
            log_message('info', 'Home::buildCommonData - no user info: ' . $e->getMessage());
        }
        $data['cuRole'] = $userAccount['cuRole'] ?? '';
        $data['cuKYC']  = $userAccount['cuKYC']  ?? '';

        // Analytics counters
        $reporting = [];
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
        $data = $this->buildCommonData([
            'layout'    => 'public',
            'pageName'  => 'Home',
            'pageTitle' => 'MyMI Wallet | The Future of Finance | Budgeting & Investments',
        ]);
        return $this->renderTheme('themes/public/home', $data);
    }

    public function apexReferral()
    {
        $data = $this->buildCommonData([
            'layout'    => 'public',
            'pageName'  => 'Apex Referral',
            'pageTitle' => 'MyMI Wallet | The Future of Finance | Apex Referral',
        ]);
        return $this->renderTheme('themes/public/home', $data);
    }

    public function corporateEarnings()
    {
        $data = $this->buildCommonData([
            'layout'    => 'public',
            'pageName'  => 'Corporate Earnings',
            'pageTitle' => 'MyMI Wallet | The Future of Finance | Corporate Earnings',
        ]);
        return $this->renderTheme('themes/public/corporateEarnings', $data);
    }

    public function economicCalendar()
    {
        $data = $this->buildCommonData([
            'layout'    => 'public',
            'pageName'  => 'Economic Calendar',
            'pageTitle' => 'MyMI Wallet | The Future of Finance | Economic Calendar',
        ]);
        return $this->renderTheme('themes/public/economicCalendar', $data);
    }

    public function gettingStarted()
    {
        $data = $this->buildCommonData([
            'layout'    => 'public',
            'pageName'  => 'Getting Started',
            'pageTitle' => 'MyMI Wallet | The Future of Finance | Getting Started',
        ]);
        return $this->renderTheme('themes/public/gettingStarted', $data);
    }

    public function memberships()
    {
        $data = $this->buildCommonData([
            'layout'    => 'public',
            'pageName'  => 'Memberships',
            'pageTitle' => 'MyMI Wallet | The Future of Finance | Memberships',
        ]);
        return $this->renderTheme('themes/public/memberships', $data);
    }

    public function previewAlert(?string $symbol = null)
    {
        $symbol   = strtoupper(trim((string)$symbol));
        $meta     = $this->metaService
            ? $this->metaService->getBySlugOrFallback($symbol ? ('Preview/Alert/' . strtolower($symbol)) : 'Preview/Alert')
            : ['page_title' => 'Preview Alert — ' . ($symbol ?: 'Unknown')];

        $alert              = $this->alertsModel?->getAlertBySymbol($symbol);
        $recentTradeAlerts  = $this->alertsModel?->getRecentAlerts($symbol, 8) ?? [];

        $ticker   = $alert['ticker']   ?? ($symbol ?: '');
        $exchange = $alert['exchange'] ?? '';
        $tvSymbol = $exchange . ':' . $ticker;

        $data = $this->buildCommonData([
            'layout'            => 'public',
            'pageName'          => 'Preview Alert',
            'pageTitle'         => $meta['title'] ?? ($meta['page_title'] ?? 'Preview Alert'),
            'meta'              => $meta ?? [],
            'symbol'            => $symbol,
            'alert'             => $alert,
            'tradeAlert'        => $alert,
            'recentTradeAlerts' => $recentTradeAlerts,
            'ticker'            => $ticker,
            'exchange'          => $exchange,
            'tvSymbol'          => $tvSymbol,
            'realTimeStockData' => [],
            'secFilings'        => [],
            'comments'          => [],
            'cuID'              => $this->cuID,
        ]);

        return $this->renderTheme('themes/public/previewAlert', $data);
    }

    public function privacy()
    {
        return $this->renderTheme('themes/public/privacyPolicy', [
            'layout'    => 'public',
            'pageTitle' => 'Privacy Policy — MyMI Wallet',
        ]);
    }

    public function terms()
    {
        return $this->renderTheme('themes/public/termsOfService', [
            'layout'    => 'public',
            'pageTitle' => 'Terms of Service — MyMI Wallet',
        ]);
    }
}
