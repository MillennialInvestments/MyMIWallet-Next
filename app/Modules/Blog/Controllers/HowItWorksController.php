<?php

namespace App\Modules\Blog\Controllers;

use Myth\Auth\Authorization\GroupModel;
use Config\{Auth, SiteSettings, SocialMedia};
use App\Controllers\UserController;
use App\Libraries\{BaseLoader, MyMIAnalytics, MyMIGold};
use App\Models\{MarketingModel, MyMIGoldModel, PageSEOModel, SubscribeModel, UserModel};
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;
use App\Services\Docs\DocsRendererService;

#[\AllowDynamicProperties]
class HowItWorksController extends UserController
{
    use ResponseTrait;

    protected string $ci4DocsPath = ROOTPATH . 'docs/user-guides/ci4/';

    protected $auth;
    protected $helpers = ['directory', 'form', 'file', 'url', 'url_safe'];
    protected $request;
    protected $session;
    protected $uri;
    protected $siteSettings;
    protected $socialMedia;

    protected $MyMIAnalytics;
    protected $MyMIGoldModel;
    protected $pageSEOModel;
    protected $subscribeModel;
    protected $userModel;

    protected ?array $userAccount = null;
    protected ?MyMIGold $myMIGold = null;
    protected $docsRenderer;
    protected static array $missingSlugLogCache = [];
    protected const CANONICAL_SLUG_ALIASES = [
        'overview' => 'overview',
        'overview-page' => 'overview',
        'investor-profile' => 'setting-financial-goals',
        'earnings' => 'daily-financial-news',
        'alerts' => 'alerts',
        'account-settings' => 'setting-financial-goals',
        'marketing' => 'financial-forecasting',
        'investments' => 'investment-portfolio-management',
        'mymi-wallets' => 'manage-finances',
        'automated-financial-insights' => 'financial-forecasting',
    ];

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    )
    {
        parent::initController($request, $response, $logger);

        try {
            $this->auth = service('authentication');
        } catch (\Throwable $e) {
            log_message('error', 'HowItWorksController auth bootstrap failed: {message}', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
            $this->auth = null;
        }
        $this->request      = service('request');
        $this->session      = Services::session();
        $this->uri          = $this->request->getUri();

        $this->siteSettings = config('SiteSettings');
        $this->socialMedia  = config('SocialMedia');

        $this->pageSEOModel = new PageSEOModel();
        $this->subscribeModel = new SubscribeModel();
        $this->userModel = new UserModel();

        $this->cuID = ($this->auth && method_exists($this->auth, 'id'))
            ? ($this->auth->id() ?? $this->session->get('user_id'))
            : $this->session->get('user_id');

        $this->myMIGold = service('myMIGold') ?: (class_exists(MyMIGold::class) ? new MyMIGold() : null);

        if (!$this->MyMIGoldModel && class_exists(MyMIGoldModel::class)) {
            $this->MyMIGoldModel = new MyMIGoldModel();
        }
        $this->docsRenderer = new DocsRendererService();
    }

    public function commonData(): array {     
        $this->data = parent::commonData(); 
        $this->data['reporting']                        = $this->getMyMIAnalytics()->reporting($this->cuID);
        $this->data['siteSettings']                     = $this->siteSettings;     
        $this->data['socialMedia']                      = $this->socialMedia;     
        $this->data['uri']                              = $this->request->getUri(); 
        $this->data['beta']                             = $this->siteSettings->beta;
        $this->data['investmentOperations']             = $this->siteSettings->investmentOperations;
        $this->data['userAgent']                        = $this->request->getUserAgent();
        $this->data['date']                             = $this->siteSettings->date;
        $this->data['time']                             = $this->siteSettings->time;
        $this->data['hostTime']                         = $this->siteSettings->hostTime;
        $this->data['date']                             = $this->siteSettings->date;

        // Add or merge existing $this->data with new values
        $account = is_array($this->userAccount ?? null) ? $this->userAccount : [];
        if (!empty($account['cuEmail'])) {
            $this->data['cuRole']                       = $this->userAccount['cuRole'];
            $this->data['cuUserType']                   = $this->userAccount['cuUserType'];
            $this->data['cuEmail']                      = $this->userAccount['cuEmail'];
            $this->data['cuUsername']                   = $this->userAccount['cuUsername'];
            $this->data['cuDisplayName']                = $this->userAccount['cuDisplayName'];
            $this->data['cuFirstName']                  = $this->userAccount['cuFirstName'];
            $this->data['cuMiddleName']                 = $this->userAccount['cuMiddleName'];
            $this->data['cuLastName']                   = $this->userAccount['cuLastName'];
            $this->data['cuNameSuffix']                 = $this->userAccount['cuNameSuffix'];
            $this->data['cuNameInitials']               = $this->userAccount['cuNameInitials'];
            $this->data['cuKYC']                        = $this->userAccount['cuKYC'];
            $this->data['cuDOB']                        = $this->userAccount['cuDOB'];
            $this->data['cuSSN']                        = $this->userAccount['cuSSN'];
            $this->data['cuPhone']                      = $this->userAccount['cuPhone'];
            $this->data['cuAddress']                    = $this->userAccount['cuAddress'];
            $this->data['cuCity']                       = $this->userAccount['cuCity'];
            $this->data['cuState']                      = $this->userAccount['cuState'];
            $this->data['cuCountry']                    = $this->userAccount['cuCountry'];
            $this->data['cuZipCode']                    = $this->userAccount['cuZipCode'];
            $this->data['cuMailingAddress']             = $this->userAccount['cuMailingAddress'];
            $this->data['cuEmployment']                 = $this->userAccount['cuEmployment'];
            $this->data['cuOccupation']                 = $this->userAccount['cuOccupation'];
            $this->data['cuSalary']                     = $this->userAccount['cuSalary'];
            $this->data['cuProofIdentity']              = $this->userAccount['cuProofIdentity'];
            $this->data['cuProofAddress']               = $this->userAccount['cuProofAddress'];
            $this->data['cuPublicKey']                  = $this->userAccount['cuPublicKey'];
            $this->data['cuPrivateKey']                 = $this->userAccount['cuPrivateKey'];
            $this->data['cuReferrer']                   = $this->userAccount['cuReferrer'];
            $this->data['cuReferrerCode']               = $this->userAccount['cuReferrerCode'];
        } else {
            
        }
        return $this->data;
    }

    /**
     * Standard renderer for public pages
     */
    protected function renderPublic(string $view, array $data = []): ResponseInterface
    {
        $baseData = $this->commonData();
        $merged = array_merge($baseData, $data);

        $content = view($view, $merged);

        $html = view('themes/public/layouts/index', array_merge($merged, [
            'content' => $content
        ]));

        return $this->response
            ->setStatusCode(200)
            ->setBody($html);
    }

    /**
     * Default entry
     */
    public function index(): ResponseInterface
    {
        return $this->show('overview');
    }

    /**
     * Main slug handler
     */
    public function show(string $slug = 'overview'): ResponseInterface
    {
        try {
            $slug = $this->normalizeRequestedSlug($slug ?: ($this->request->getUri()->getSegment(2) ?? 'overview'));
            log_message('debug', '[HOW_IT_WORKS] slug=' . $slug);

            $canonicalSlug = $this->resolveCanonicalSlug($slug);
            if ($canonicalSlug !== $slug) {
                return redirect()->to(site_url('How-It-Works/' . $canonicalSlug), 301);
            }

            $normalizedSlug = $canonicalSlug;

            $viewMap = [
                'overview'                        => 'themes/public/how_it_works/index', // legacy_howitworks_public_theme_overview_restore
                'registering-an-account'          => 'App\Modules\Blog\Views\HowItWorks\Registering_An_Account',
                'personal-budgeting'              => 'App\Modules\Blog\Views\HowItWorks\Personal_Budgeting',
                'investment-dashboard'            => 'App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management',
                'investment-portfolio-management' => 'App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management',
                'setting-financial-goals'         => 'App\Modules\Blog\Views\HowItWorks\Determining_Your_Financial_Goals',
                'determining-your-financial-goals'=> 'App\Modules\Blog\Views\HowItWorks\Determining_Your_Financial_Goals',
                'mymi-gold'                       => 'App\Modules\Blog\Views\HowItWorks\MyMI_Gold',
                'mymi-exchange'                   => 'App\Modules\Blog\Views\HowItWorks\Manage_Finances',
                'features-and-plans'              => 'App\Modules\Blog\Views\HowItWorks\Features_And_Plans',
                'manage-finances'                 => 'App\Modules\Blog\Views\HowItWorks\Manage_Finances',
                'daily-financial-news'            => 'App\Modules\Blog\Views\HowItWorks\Daily_Financial_News',
                'discord'                         => 'App\Modules\Blog\Views\HowItWorks\Discord',
                'streaming'                       => 'App\Modules\Blog\Views\HowItWorks\Streaming',
                'purchase-mymi-gold'              => 'App\Modules\Blog\Views\HowItWorks\Purchase_MyMI_Gold',
                'alerts'                          => 'themes/public/how_it_works/alerts',
            ];

            if (isset($viewMap[$normalizedSlug])) {
                $data = $this->commonData();
                if (str_starts_with($viewMap[$normalizedSlug], 'themes/public/how_it_works/')) {
                    return $this->renderPublic($viewMap[$normalizedSlug], is_array($data) ? $data : []);
                }

                if (method_exists($this, 'respondWithRendered')) {
                    return $this->respondWithRendered($viewMap[$normalizedSlug], $data);
                }

                return $this->renderPublic($viewMap[$normalizedSlug], is_array($data) ? $data : []);
            }

            // 3) Dynamic docs/how-it-works/*.md fallback
            if ($this->docsRenderer instanceof DocsRendererService) {
                $docPage = $this->docsRenderer->renderDocBySlug($normalizedSlug);
                if (is_array($docPage)) {
                    $data = [
                        'layout'      => 'public',
                        'title'       => $docPage['title'] ?? ucwords(str_replace('-', ' ', $normalizedSlug)),
                        'slug'        => $docPage['slug'] ?? $normalizedSlug,
                        'contentHtml' => $docPage['contentHtml'] ?? '',
                        'navItems'    => $this->getNavItems(),
                    ];

                    if (method_exists($this, 'respondWithRendered')) {
                        return $this->respondWithRendered('App\Modules\Blog\Views\HowItWorks\index', $data);
                    }

                    return $this->renderPublic('App\Modules\Blog\Views\HowItWorks\index', $data);
                }
            }

            $cacheKey = 'slug:' . $normalizedSlug;
            if (!isset(self::$missingSlugLogCache[$cacheKey])) {
                log_message('notice', '[HOW_IT_WORKS] Unknown slug fallback', [
                    'requested_slug' => $slug,
                    'normalized_slug' => $normalizedSlug,
                    'referrer' => (string) $this->request->getHeaderLine('Referer'),
                ]);
                self::$missingSlugLogCache[$cacheKey] = true;
            }
            return $this->renderHowItWorksFallback($normalizedSlug);

        } catch (\Throwable $e) {
            log_message('error', 'HowItWorksController failure: {msg} | file={file} line={line}', [
                'msg' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return $this->renderHowItWorksFallback($slug);
        }
    }

    protected function renderHowItWorksFallback(string $slug): ResponseInterface
    {
        $normalized = $this->normalizeRequestedSlug($slug ?: 'overview');
        return $this->renderPublic('App\Modules\Blog\Views\HowItWorks\fallback', [
            'slug'  => $normalized,
            'title' => ucwords(str_replace('-', ' ', $normalized)),
        ]);
    }

    protected function normalizeRequestedSlug(string $slug): string
    {
        $slug = strtolower(trim(str_replace('_', '-', $slug)));
        $slug = preg_replace('/\s+/', '-', $slug) ?? $slug;
        $slug = preg_replace('/-+/', '-', $slug) ?? $slug;

        return trim($slug, '-') ?: 'overview';
    }

    protected function resolveCanonicalSlug(string $slug): string
    {
        $normalized = $this->normalizeRequestedSlug($slug);

        return self::CANONICAL_SLUG_ALIASES[$normalized] ?? $normalized;
    }

    /**
     * Discord guide page
     */
    public function discord(): ResponseInterface
    {
        $config = config('DiscordHelp');

        $data = [
            'title' => 'How The MyMI Discord Works',
            'commands' => $config->commands,
            'onboardingSteps' => $config->onboardingSteps,
            'sharingGuideUrl' => site_url('API/Discord/sharingGuide')
        ];

        return $this->renderPublic(
            'App\Modules\Blog\Views\HowItWorks\Discord',
            $data
        );
    }

    /**
     * Streaming guide
     */
    public function streaming(): ResponseInterface
    {
        return $this->renderPublic(
            'App\Modules\Blog\Views\HowItWorks\Streaming',
            ['title' => 'Streaming with Twitch & YouTube']
        );
    }

    protected function parseMarkdownToHtml(string $markdown): string
    {
        if (class_exists(\Parsedown::class)) {
            $parsedown = new \Parsedown();
            $parsedown->setSafeMode(true);
            return $parsedown->text($markdown);
        }

        return nl2br(esc($markdown));
    }

    protected function getGuideTitle(string $slug): string
    {
        $titles = [
            'overview'         => 'How MyMI Wallet Works',
            'alerts'           => 'Trade Alerts Dashboard Guide',
            'marketing'        => 'Marketing Dashboard Guide',
            'earnings'         => 'Earnings Calendar Guide',
            'investments'      => 'Investments & Portfolio Guide',
            'account-settings' => 'Account Settings & Social Media Linking',
        ];

        return $titles[$slug] ?? 'How It Works';
    }

    protected function getNavItems(): array
    {
        $items = [
            ['slug' => 'overview', 'label' => 'Overview'],
            ['slug' => 'alerts', 'label' => 'Alerts Dashboard'],
            ['slug' => 'marketing', 'label' => 'Marketing Dashboard'],
            ['slug' => 'earnings', 'label' => 'Earnings Calendar'],
            ['slug' => 'investments', 'label' => 'Investments & Portfolio'],
            ['slug' => 'account-settings', 'label' => 'Account Settings & Social Linking'],
        ];

        if ($this->docsRenderer instanceof DocsRendererService) {
            foreach ($this->docsRenderer->listHowItWorksDocs() as $docItem) {
                $items[] = [
                    'slug' => $docItem['slug'],
                    'label' => $docItem['title'],
                ];
            }
        }

        $unique = [];
        foreach ($items as $item) {
            $unique[$item['slug']] = $item;
        }

        return array_values($unique);
    }

    public function DailyFinancialNews()
    {
        $page = max(1, (int) ($this->request->getGet('page') ?? 1));
        $perPage = min(50, max(5, (int) ($this->request->getGet('perPage') ?? 20)));
        $offset = ($page - 1) * $perPage;

        $model = model(MarketingModel::class);

        try {
            $rows = $model->getDailyNews($perPage, $offset);
        } catch (\Throwable $e) {
            log_message('error', 'DailyFinancialNews query failed: {msg}', ['msg' => $e->getMessage()]);
            $rows = [];
        }

        $data = [
            'pageTitle' => 'Daily Financial News | MyMI Wallet',
            'news' => $rows,
            'page' => $page,
            'perPage' => $perPage,
            'hasMore' => count($rows) === $perPage
        ];

        return $this->renderPublic(
            'App\Modules\Blog\Views\HowItWorks\Daily_Financial_News',
            $data
        );
    }

    public function InvestmentPortfolioManagement()
    {
        $uri = $this->uri;
    
        $data = [
            'pageTitle' => 'Investment Portfolio Management | MyMI Wallet',
        ];
        return $this->renderPublic('App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management', $data);
    }  

    /**
     * MyMI Gold page
     */
    public function MyMIGold(): ResponseInterface
    {
        $data = [
            'pageTitle' => 'MyMI Gold | How It Works | MyMI Wallet',
            'goldValue' => null,
            'getInitialCoinValue' => null
        ];

        if ($this->myMIGold && method_exists($this->myMIGold, 'getCoinValue')) {
            try {
                $data['goldValue'] = $this->myMIGold->getCoinValue();
            } catch (\Throwable $e) {
                log_message('error', 'MyMIGold value fetch failed: {msg}', ['msg' => $e->getMessage()]);
            }
        }

        if ($this->MyMIGoldModel && method_exists($this->MyMIGoldModel, 'getInitialCoinValue')) {
            try {
                $data['getInitialCoinValue'] = $this->MyMIGoldModel->getInitialCoinValue();
            } catch (\Throwable $e) {
                log_message('error', 'Initial coin value fetch failed: {msg}', ['msg' => $e->getMessage()]);
            }
        }

        return $this->renderPublic('App\Modules\Blog\Views\HowItWorks\MyMI_Gold', $this->data);
    }

    public function PersonalBudgeting()
    {
        $uri = $this->uri;
    
        $data = [
            // Add any specific data needed for the Personal Budgeting view here
            'pageTitle' => 'Personal Budgeting | How It Works | MyMI Wallet',
        ];

        return $this->renderPublic('App\Modules\Blog\Views\HowItWorks\Personal_Budgeting', $data);
    }

    public function PurchaseMyMIGold(): ResponseInterface {
        $getCoinValue = $this->MyMIGoldModel->getCoinValue();
        $getInitialCoinValue = $this->MyMIGoldModel->getInitialCoinValue();
        
        $uri = $this->uri;
    
        $data = [
            'getCoinValue' => $getCoinValue,
            'getInitialCoinValue' => $getInitialCoinValue
        ];
    
        // Pass the structured data array to the view
        return $this->renderPublic('App\Modules\Blog\Views\HowItWorks\Purchase_MyMI_Gold', $data);
    }

    public function SettingFinancialGoals()
    {
        $uri = $this->uri;
    
        $data = [
            // Add any specific data needed for the Personal Budgeting view here
            'pageTitle' => 'Personal Budgeting | How It Works | MyMI Wallet',
        ];

        return $this->renderPublic('App\Modules\Blog\Views\HowItWorks\Setting_Financial_Goals', $data);
    }

}
