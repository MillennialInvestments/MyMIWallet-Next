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
    protected $helpers = ['directory', 'form', 'file', 'url'];
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

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    )
    {
        parent::initController($request, $response, $logger);

        $this->auth         = service('authentication');
        $this->request      = service('request');
        $this->session      = Services::session();
        $this->uri          = $this->request->getUri();

        $this->siteSettings = config('SiteSettings');
        $this->socialMedia  = config('SocialMedia');

        $this->pageSEOModel = new PageSEOModel();
        $this->subscribeModel = new SubscribeModel();
        $this->userModel = new UserModel();

        $this->cuID = $this->auth->id() ?? $this->session->get('user_id');

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

        $slug = isset($merged['slug']) ? $this->normalizeSlug((string) $merged['slug']) : null;
        if ($slug && $this->pageSEOModel) {
            $pageSEO = $this->pageSEOModel->where('slug', $slug)->first();
            if (is_array($pageSEO)) {
                $merged['seoTitle'] = $pageSEO['title'] ?? ($pageSEO['seoTitle'] ?? ($merged['seoTitle'] ?? null));
                $merged['seoDescription'] = $pageSEO['description'] ?? ($pageSEO['seoDescription'] ?? ($merged['seoDescription'] ?? null));
                $merged['seoKeywords'] = $pageSEO['keywords'] ?? ($pageSEO['seoKeywords'] ?? ($merged['seoKeywords'] ?? null));
            }
        }

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
        $normalizedSlug = $this->normalizeSlug($slug);
        $docsService = service('docs');

        if ($docsService) {
            $doc = $docsService->getDoc($normalizedSlug, 'how-it-works');
            if (is_array($doc)) {
                return $this->renderPublic('Modules/Blog/Views/HowItWorks/index', [
                    'slug' => $doc['slug'] ?? $normalizedSlug,
                    'title' => $doc['title'] ?? $this->getGuideTitle($normalizedSlug),
                    'contentHtml' => $doc['contentHtml'] ?? '',
                    'navItems' => $this->getNavItems(),
                    'seoTitle' => $doc['title'] ?? null,
                    'seoDescription' => $doc['description'] ?? null,
                    'seoKeywords' => isset($doc['keywords']) && is_array($doc['keywords']) ? implode(', ', $doc['keywords']) : null,
                ]);
            }
        }

        return $this->response
            ->setStatusCode(404)
            ->setBody(view('errors/html/error_404'));
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

        return $this->renderPublic('App\Modules\Blog\Views\HowItWorks\MyMI_Gold', array_merge($data, [
            'slug' => 'mymi-gold',
            'title' => $this->getGuideTitle('mymi-gold'),
            'navItems' => $this->getNavItems(),
        ]));
    }

    public function PurchaseMyMIGold(): ResponseInterface
    {
        $getCoinValue = null;
        $getInitialCoinValue = null;

        if ($this->MyMIGoldModel && method_exists($this->MyMIGoldModel, 'getCoinValue')) {
            try {
                $getCoinValue = $this->MyMIGoldModel->getCoinValue();
            } catch (\Throwable $e) {
                log_message('error', 'MyMIGold purchase coin value fetch failed: {msg}', ['msg' => $e->getMessage()]);
            }
        }

        if ($this->MyMIGoldModel && method_exists($this->MyMIGoldModel, 'getInitialCoinValue')) {
            try {
                $getInitialCoinValue = $this->MyMIGoldModel->getInitialCoinValue();
            } catch (\Throwable $e) {
                log_message('error', 'MyMIGold initial coin value fetch failed: {msg}', ['msg' => $e->getMessage()]);
            }
        }

        return $this->renderPublic('App\Modules\Blog\Views\HowItWorks\Purchase_MyMI_Gold', [
            'slug' => 'purchase-mymi-gold',
            'title' => $this->getGuideTitle('purchase-mymi-gold'),
            'navItems' => $this->getNavItems(),
            'getCoinValue' => $getCoinValue,
            'getInitialCoinValue' => $getInitialCoinValue,
        ]);
    }


    protected function getGuideTitle(string $slug): string
    {
        $titles = [];
        foreach ($this->getNavItems() as $item) {
            $titles[$item['slug']] = $item['label'];
        }

        return $titles[$slug] ?? ucwords(str_replace('-', ' ', $slug));
    }

    protected function getNavItems(): array
    {
        $docsService = service('docs');

        if ($docsService && method_exists($docsService, 'getNavigation')) {
            return $docsService->getNavigation('how-it-works');
        }

        return [];
    }

    public function PersonalBudgeting(): ResponseInterface
    {
        return $this->renderPublic('App\Modules\Blog\Views\HowItWorks\Personal_Budgeting', [
            'slug' => 'personal-budgeting',
            'title' => $this->getGuideTitle('personal-budgeting'),
            'navItems' => $this->getNavItems(),
        ]);
    }

    public function InvestmentPortfolioManagement(): ResponseInterface
    {
        return $this->renderPublic('App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management', [
            'slug' => 'investment-portfolio-management',
            'title' => $this->getGuideTitle('investment-portfolio-management'),
            'navItems' => $this->getNavItems(),
        ]);
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
            'slug' => 'daily-financial-news',
            'title' => $this->getGuideTitle('daily-financial-news'),
            'pageTitle' => 'Daily Financial News | MyMI Wallet',
            'navItems' => $this->getNavItems(),
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

    /**
     * Normalize slug
     */
    private function normalizeSlug(string $slug): string
    {
        $slug = trim(strtolower($slug));
        $slug = str_replace([' ', '_'], '-', $slug);
        return preg_replace('/[^a-z0-9\-]+/', '-', $slug);
    }
}
