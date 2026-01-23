<?php

namespace App\Modules\Blog\Controllers;

use Myth\Auth\Authorization\GroupModel;
use App\Config\{Auth, SiteSettings, SocialMedia};
use App\Controllers\UserController; 
use App\Libraries\{BaseLoader, MyMIAnalytics, MyMIGold};
use App\Models\{MarketingModel, MyMIGoldModel, PageSEOModel, SubscribeModel, UserModel};
// use App\Modules\User\Libraries\{DashboardLibrary};
use CodeIgniter\API\RequestTrait; // Import the ResponseTrait
use CodeIgniter\API\ResponseTrait; // Import the ResponseTrait
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

#[\AllowDynamicProperties]
class HowItWorksController extends UserController
{
    use ResponseTrait;
    protected string $ci4DocsPath = ROOTPATH . 'docs/user-guides/ci4/';
    protected $auth;
    protected $helpers = ['directory', 'form', 'file', 'url'];
    protected $library;
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

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->auth                                     = service('authentication'); // Use the 'authentication' service
        $this->request                                  = service('request');
        $this->session                                  = Services::session();
        $this->siteSettings                             = config('SiteSettings');
        $this->socialMedia                              = config('SocialMedia');
        $this->uri                                      = $this->request->getUri();
//         $this->MyMIAnalytics                            = new MyMIAnalytics(); // replaced by BaseController getter
//         $this->MyMIGoldModel                            = new MyMIGoldModel(); // replaced by BaseController getter
        $this->pageSEOModel                             = new PageSEOModel();
        $this->subscribeModel                           = new SubscribeModel();
        $this->userModel                                = new UserModel();
        $this->cuID                                     = $this->auth->id() ?? $this->session->get('user_id');
        $this->myMIGold                                 = service('myMIGold') ?: (class_exists(MyMIGold::class) ? new MyMIGold() : null);
        if (! $this->MyMIGoldModel && class_exists(MyMIGoldModel::class)) {
            $this->MyMIGoldModel = new MyMIGoldModel();
        }
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



    public function index(): ResponseInterface
    {
        return $this->show('overview');
    }

    public function show(string $slug = 'overview'): ResponseInterface
    {
        $normalizedSlug = $this->normalizeSlug($slug);

        // 1) CI4 markdown-based docs
        $map = [
            'overview'         => '01_Overview.md',
            'alerts'           => '02_Alerts_Dashboard_Guide.md',
            'marketing'        => '03_Marketing_Dashboard_Guide.md',
            'earnings'         => '04_Earnings_Dashboard_Guide.md',
            'investments'      => '05_Investments_and_Portfolio_Guide.md',
            'account-settings' => '06_Account_Settings_and_Social_Media_Linking.md',
        ];

        if (array_key_exists($normalizedSlug, $map)) {
            $file = $this->ci4DocsPath . $map[$normalizedSlug];
            if (is_file($file)) {
                $markdown     = file_get_contents($file) ?: '';
                $contentHtml  = $this->parseMarkdownToHtml($markdown);
                $data = [
                    'layout'      => 'public',
                    'title'       => $this->getGuideTitle($normalizedSlug),
                    'slug'        => $normalizedSlug,
                    'contentHtml' => $contentHtml,
                    'navItems'    => $this->getNavItems(),
                ];

                return $this->respondWithRendered('App\\Modules\\Blog\\Views\\HowItWorks\\index', $data);
            }
        }

        // 2) Static How-It-Works views (dash-friendly slug mapping)
        $viewMap = [
            'registering-an-account'   => 'App\Modules\Blog\Views\HowItWorks\Registering_An_Account',
            'personal-budgeting'       => 'App\Modules\Blog\Views\HowItWorks\Personal_Budgeting',
            'investment-dashboard'     => 'App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management',
            'setting-financial-goals'  => 'App\Modules\Blog\Views\HowItWorks\Determining_Your_Financial_Goals',
            'mymi-gold'                => 'App\Modules\Blog\Views\HowItWorks\MyMI_Gold',
            'mymi-exchange'            => 'App\Modules\Blog\Views\HowItWorks\Manage_Finances',
            'features-and-plans'       => 'App\Modules\Blog\Views\HowItWorks\Features_And_Plans',
            'manage-finances'          => 'App\Modules\Blog\Views\HowItWorks\Manage_Finances',
        ];

        if (isset($viewMap[$normalizedSlug])) {
            return $this->respondWithRendered($viewMap[$normalizedSlug], $this->commonData());
        }

        // Graceful 404 (no exception)
        return $this->response
            ->setStatusCode(404)
            ->setBody(view('errors/html/error_404'));
    }

    public function discord(): ResponseInterface
    {
        $config = config('DiscordHelp');

        $data = [
            'title'           => 'How The MyMI Discord Works',
            'slug'            => 'discord',
            'commands'        => $config->commands,
            'onboardingSteps' => $config->onboardingSteps,
            'sharingGuideUrl' => site_url('API/Discord/sharingGuide'),
        ];

        return $this->response
            ->setStatusCode(200)
            ->setBody(view('Modules/Blog/HowItWorks/Discord', $data));
    }

    public function streaming(): ResponseInterface
    {
        $data = [
            'title' => 'Streaming with Twitch & YouTube',
        ];

        return $this->response
            ->setStatusCode(200)
            ->setBody(view('Modules/Blog/HowItWorks/Streaming', $data));
    }

    public function DetermineYourFinancialGoals(): ResponseInterface
    {
        $data = $this->commonData(); // Ensure this is correctly populating $this->data
        $data['pageTitle'] = 'Determine Your Financial Goals | How It Works | MyMI Wallet';
        return $this->respondWithRendered('App\Modules\Blog\Views\HowItWorks\Determining_Your_Financial_Goals', $data);
    }

    public function RegisteringAnAccount(): ResponseInterface
    {
        $data = $this->commonData(); // Ensure this is correctly populating $this->data
        $data['pageTitle'] = 'Registering An Account | How It Works | MyMI Wallet';
        return $this->respondWithRendered('App\Modules\Blog\Views\HowItWorks\Registering_An_Account', $data);
    }

    public function MyMIGold(): ResponseInterface {
        $this->data['pageTitle'] = 'MyMI Gold | How It Works | MyMI Wallet';
        $this->data['goldValue'] = null;
        $this->data['getCoinValue'] = null;
        $this->data['getInitialCoinValue'] = null;

        if ($this->myMIGold && method_exists($this->myMIGold, 'getCoinValue')) {
            try {
                $value = $this->myMIGold->getCoinValue();
                $this->data['goldValue'] = $value;
                $this->data['getCoinValue'] = $value;
            } catch (\Throwable $e) {
                log_message('error', 'MyMIGold::getCoinValue failed: {msg}', ['msg' => $e->getMessage()]);
            }
        } else {
            log_message('warning', 'MyMIGold library missing or method not available; rendering page without live value.');
        }

        if ($this->MyMIGoldModel && method_exists($this->MyMIGoldModel, 'getInitialCoinValue')) {
            try {
                $this->data['getInitialCoinValue'] = $this->MyMIGoldModel->getInitialCoinValue();
            } catch (\Throwable $e) {
                log_message('error', 'MyMIGoldModel::getInitialCoinValue failed: {msg}', ['msg' => $e->getMessage()]);
            }
        }

        return $this->respondWithRendered('App\Modules\Blog\Views\HowItWorks\MyMI_Gold', $this->data);
    }

    public function PurchaseMyMIGold(): ResponseInterface {
        $getCoinValue = $this->MyMIGoldModel->getCoinValue();
        $getInitialCoinValue = $this->MyMIGoldModel->getInitialCoinValue();
        
        $uri = $this->uri;
    
        $viewFileData = [
            'getCoinValue' => $getCoinValue,
            'getInitialCoinValue' => $getInitialCoinValue
        ];
        // Merge site settings with other data
        $data = array_merge($this->getViewFileData($uri), $viewFileData);
    
        // Pass the structured data array to the view
        $content = view('Modules\Blog\Views\HowItWorks\Purchase_MyMI_Gold', $data);
        return $this->response->setStatusCode(200)->setBody($this->renderPage('Home', 'Automated', $content));
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
        return [
            ['slug' => 'overview', 'label' => 'Overview'],
            ['slug' => 'alerts', 'label' => 'Alerts Dashboard'],
            ['slug' => 'marketing', 'label' => 'Marketing Dashboard'],
            ['slug' => 'earnings', 'label' => 'Earnings Calendar'],
            ['slug' => 'investments', 'label' => 'Investments & Portfolio'],
            ['slug' => 'account-settings', 'label' => 'Account Settings & Social Linking'],
        ];
    }

    public function PersonalBudgeting()
    {
        $this->data['pageTitle']                    = 'Personal Budgeting | How It Works | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('App\Modules\Blog\Views\HowItWorks\Personal_Budgeting', $this->data);
    }

    public function InvestmentPortfolioManagement()
    {
        $this->data['pageTitle'] = 'Investment Portfolio Management | How It Works | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management', $this->data);
    }  

    public function DailyFinancialNews()
    {
        $page = max(1, (int) ($this->request->getGet('page') ?? 1));
        $perPage = min(50, max(5, (int) ($this->request->getGet('perPage') ?? 20)));
        $offset = ($page - 1) * $perPage;

        $userId = (int) ($this->auth->id() ?? $this->session->get('user_id') ?? 0);
        $ttl = 300; // 5 min
        $safeCache = service('safeCache');
        $cacheParams = ['page' => $page, 'perPage' => $perPage];
        $cachedHtml = null;

        if ($safeCache) {
            $cachedHtml = $userId > 0
                ? $safeCache->getUser('howitworks', 'dailynews', $userId, $cacheParams)
                : $safeCache->getGuest('howitworks', 'dailynews', $cacheParams);
        }

        if (is_string($cachedHtml)) {
            return $this->response->setBody($cachedHtml);
        }

        $model = model(MarketingModel::class);
        try {
            $rows = $model->getDailyNews($perPage, $offset);
        } catch (\Throwable $e) {
            log_message('error', 'DailyFinancialNews query failed: {msg}', ['msg' => $e->getMessage()]);
            $rows = [];
        }

        $this->data['pageTitle'] = 'Daily Financial News | How It Works | MyMI Wallet';
        $this->data['news'] = $rows;
        $this->data['page'] = $page;
        $this->data['perPage'] = $perPage;
        $this->data['hasMore'] = count($rows) === $perPage;

        $html = $this->renderTheme('App\Modules\Blog\Views\HowItWorks\Daily_Financial_News', $this->data);
        if ($safeCache) {
            if ($userId > 0) {
                $safeCache->saveUser('howitworks', 'dailynews', $userId, $html, $ttl, $cacheParams);
            } else {
                $safeCache->saveGuest('howitworks', 'dailynews', $html, $ttl, $cacheParams);
            }
        }
        return $this->response->setBody($html);
    } 

    // Additional methods...

    private function renderPage($pageName, $pageType, $content)
    {
        $cuID = $this->session->get('user_id') ?? 0;
        $reportingData = $this->getMyMIAnalytics()->reporting($cuID);
        $uri = $this->request->uri;
        $siteSettings = $this->getSiteSettings();

        $pageTitle = $this->getPageTitle($pageName);
        $seoData = $this->pageSEOModel->getPageSEOByName($pageName);
        $seoData = $this->ensureSEOData($seoData, $pageTitle);

        $viewFileData = [
            'pageType' => $pageType,
            'pageName' => $pageName,
            'pageTitle' => $pageTitle,
            'reportingData' => $reportingData,
            'seoData' => $seoData,
            'cuID' => $cuID,
            'content' => $content
        ];

        // Merge site settings with other data
        $data = array_merge($viewFileData, $siteSettings, [
            // 'addValueHere' => $addValueHere,
        ]);
        return $this->render('themes/default/layouts/index', $data);
    }

    private function getViewFileData($uri)
    {
        $data = [];
        for ($i = 1; $i <= 5; $i++) {
            $data['pageURI' . chr(64 + $i)] = $uri->getTotalSegments() >= $i ? $uri->getSegment($i, '') : '';
        }
        return $data;
    }  

    private function getSiteSettings() {
        $settings = $this->siteSettings;
        return [
            'siteOperations' => $settings->siteOperations,
            'educateOperations' => $settings->educateOperations,
            'budgetOperations' => $settings->budgetOperations,
            'investmentOperations' => $settings->investmentOperations,
            'integrationOperations' => $settings->integrationOperations,
            'newsOperations' => $settings->newsOperations,
            'referralOperations' => $settings->referralOperations,
            'debtOperations' => $settings->debtOperations,
            'retirementOperations' => $settings->retirementOperations,
            'assetOperations' => $settings->assetOperations,
            'exchangeOperations' => $settings->exchangeOperations,
            'marketplaceOperations' => $settings->marketplaceOperations,
            'partnerOperations' => $settings->partnerOperations,
            'bettingOperations' => $settings->bettingOperations
            // Add any additional settings here if needed
        ];
    }

    private function getPageTitle($pageName)
    {
        $thisURL = current_url();
        return str_replace(['/', '-'], [' | ', ' '], $thisURL);
    }
    
    private function ensureSEOData($seoData, $pageTitle)
    {
        if (empty($seoData)) {
            $seoData = [
                'page_name' => $pageTitle,
                'page_title' => $pageTitle,
                'page_url' => current_url(),
                'page_sitemap_url' => base_url('/sitemap.xml'),
                'page_image' => base_url('/assets/images/default-seo-image.png'),
                'meta_description' => 'Default meta description for ' . $pageTitle,
                'meta_keywords' => 'default,keywords,for,' . str_replace(' ', ',', strtolower($pageTitle))
            ];
            
            $this->pageSEOModel->saveOrUpdatePageSEO($seoData);
        }
    
        return $seoData;
    }    

    public function render(string $view, array $data = [], array $options = []): string
    {
        return $this->renderTheme($view, $data);
    }

    private function normalizeSlug(string $slug): string
    {
        $slug = trim(strtolower($slug));
        $slug = str_replace([' ', '_'], '-', $slug);
        return preg_replace('/[^a-z0-9\-]+/', '-', $slug);
    }

    private function respondWithRendered(string $view, array $data = []): ResponseInterface
    {
        $rendered = $this->renderTheme($view, $data);
        if ($rendered instanceof ResponseInterface) {
            return $rendered;
        }

        return $this->response->setStatusCode(200)->setBody($rendered);
    }
}
