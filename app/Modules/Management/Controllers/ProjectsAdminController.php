<?php namespace App\Modules\Management\Controllers;

use App\Controllers\BaseAdminController;

use Config\{Auth, SiteSettings, SocialMedia};
use App\Libraries\{MyMIBudget, MyMICoin, MyMIDashboard, MyMIExchange, MyMIGold, MyMIInvestments, MyMIMarketing, MyMIProjects, MyMISolana, MyMIUser, MyMIWallet, MyMIWallets};
use App\Models\{AccountsModel, DashboardModel, ProjectsModel, SolanaModel, UserModel};
use App\Services\{AccountService, DashboardService, SolanaService, SupportService, UserService};
use CodeIgniter\API\ResponseTrait;
use Config\Services;
use Myth\Auth\Authorization\GroupModel;

#[\AllowDynamicProperties]
class ProjectsAdminController extends BaseAdminController
{
    use ResponseTrait;

    // Controller Settings
    protected $auth;
    
    protected $session;
    protected $siteSettings;
    protected $socialMedia;
    protected $uri;

    // Models
    protected $accountsModel;
    protected $dashboardModel;
    protected $projectsModel;
    protected $solanaModel;

    // Libraries
    protected $MyMIBudget;
    protected $MyMIDashboard;
    protected $MyMIGold;
    protected $MyMIMarketing;
    protected $MyMIProjects;
    protected $MyMISolana;
    protected $MyMIUser;
    protected $MyMIWallet;
    protected $MyMIWallets;

    // Services
    protected $accountService;
    protected $dashboardService;
    protected $solanaService; 
    protected $supportService; 
    protected $userService; 

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->auth = service('authentication');
        $this->request = service('request');
        $this->session = Services::session();
        $this->siteSettings = config('SiteSettings');
        $this->socialMedia = config('SocialMedia');
        $this->debug = 1;
        $this->uri = $this->request->getUri();
        $this->dashboardModel = new DashboardModel();
        $this->projectsModel = new ProjectsModel();
//         $this->MyMIProjects = new MyMIProjects(); // replaced by BaseController getter
//         $this->MyMIBudget = new MyMIBudget(); // replaced by BaseController getter
//         $this->MyMIDashboard = new MyMIDashboard(); // replaced by BaseController getter
//         $this->MyMIGold = new MyMIGold(); // replaced by BaseController getter
//         $this->MyMISolana = new MyMISolana(); // replaced by BaseController getter
//         $this->MyMIWallet = new MyMIWallet(); // replaced by BaseController getter
//         $this->MyMIWallets = new MyMIWallets(); // replaced by BaseController getter

        $this->accountService = new AccountService();
        $this->dashboardService = new dashboardService();
        $this->solanaService = new SolanaService();
        $this->supportService = new SupportService();

        // Initialize UserService and pass required dependencies
        $this->cuID = $this->getCuID();  // Assuming $this->getCuID() is a helper or service
        $this->userService = new UserService($this->siteSettings, $this->cuID, Services::request());        
        
        if ($this->uri->getSegment(1) === 'Exchange') {
            if ($this->uri->getSegment(2) === 'Solana') {
                $this->solanaDW = $this->getSolanaService()->getUserDefaultSolana($this->cuID); 
            }
        }
    }

    public function commonData(): array
    {
        $base = parent::commonData();
        if ($base instanceof \CodeIgniter\HTTP\ResponseInterface) {
            return $base;
        }
        $this->data = array_merge($base, $this->data);

        // Site Settings
        $this->data['siteSettings'] = $this->siteSettings ?? config('SiteSettings');
        $this->data['beta']         = (string) ($this->siteSettings->beta ?? '');
        $this->data['debug']        = (string) ($this->siteSettings->debug ?? '');
        $this->data['request']      = $this->request ?? service('request');
        $this->data['uri']          = $this->request ? $this->request->getUri() : null;
        $this->data['userAgent']    = $this->request ? $this->request->getUserAgent() : null;
        $this->data['date']         = $this->siteSettings->date ?? date('Y-m-d');
        $this->data['time']         = $this->siteSettings->time ?? date('H:i:s');
        $this->data['hostTime']     = $this->siteSettings->hostTime ?? time();
        $this->data['cuID']         = $this->cuID;

        // Defaults to protect views from undefined key notices
        $this->data['totalAccountBalance']    = (float) ($this->data['totalAccountBalance'] ?? 0.0);
        $this->data['totalAccountBalanceFMT'] = (string) ($this->data['totalAccountBalanceFMT'] ?? '$0.00');
        $this->data['getFeatures']            = $this->data['getFeatures'] ?? [];
        $this->data['completedGoals']         = $this->data['completedGoals'] ?? [];
        $this->data['pendingGoals']           = $this->data['pendingGoals'] ?? [];
        $this->data['promotionalBanners']     = $this->data['promotionalBanners'] ?? [];
        $this->data['cuWalletID']             = $this->data['cuWalletID'] ?? 0;
        $this->data['cuRole']                 = $this->data['cuRole'] ?? 1;
        $this->data['cuUserType']             = $this->data['cuUserType'] ?? 'admin';
        $this->data['cuEmail']                = $this->data['cuEmail'] ?? '';
        $this->data['cuDisplayName']          = $this->data['cuDisplayName'] ?? '';
        $this->data['cuUsername']             = $this->data['cuUsername'] ?? '';
        $this->data['cuNameInitials']         = $this->data['cuNameInitials'] ?? '';
        $this->data['cuKYC']                  = $this->data['cuKYC'] ?? '';
        $this->data['cuWalletCount']          = $this->data['cuWalletCount'] ?? 0;
        $this->data['MyMIGCoinSum']           = $this->data['MyMIGCoinSum'] ?? 0;
        $this->data['walletID']               = $this->data['walletID'] ?? 0;
        $this->data['cuSolanaDW']             = $this->data['cuSolanaDW'] ?? null;
        $this->data['cuSolanaTotal']          = $this->data['cuSolanaTotal'] ?? 0;
        $this->data['cuSolanaValue']          = $this->data['cuSolanaValue'] ?? 0;
        $this->data['solanaNetworkStatus']    = $this->data['solanaNetworkStatus'] ?? ['healthy' => false];
        $this->data['projects']               = $this->data['projects'] ?? [];

        // Safe optional data enrichment
        try {
            $userData = $this->getuserService()->commonData();
            if (is_array($userData)) {
                $this->data = array_merge($this->data, $userData);
            }
        } catch (\Throwable $e) {
            log_message('notice', 'ProjectsAdminController commonData: userService skipped: ' . $e->getMessage());
        }

        if (! empty($this->cuID)) {
            // Safely enrich with Budget Info
            try {
                $budgetInfo = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID);
                if (is_array($budgetInfo)) {
                    $this->data['totalAccountBalance']    = (float) ($budgetInfo['totalAccountBalance'] ?? 0.0);
                    $this->data['totalAccountBalanceFMT'] = (string) ($budgetInfo['totalAccountBalanceFMT'] ?? '$0.00');
                }
            } catch (\Throwable $e) {
                log_message('notice', 'ProjectsAdminController commonData: budgetInfo skipped: ' . $e->getMessage());
            }

            // Safely enrich with Dashboard Info
            try {
                $this->data['getFeatures'] = $this->getMyMIDashboard()->getFeatures() ?: [];
                $dashboardInfo = $this->getMyMIDashboard()->dashboardInfo($this->cuID);
                if (is_array($dashboardInfo)) {
                    $this->data['completedGoals']     = $dashboardInfo['progressGoalData']['completions'] ?? [];
                    $this->data['pendingGoals']       = $dashboardInfo['progressGoalData']['goals'] ?? [];
                    $this->data['promotionalBanners'] = $dashboardInfo['promotionalBanners'] ?? [];
                }
            } catch (\Throwable $e) {
                log_message('notice', 'ProjectsAdminController commonData: dashboardInfo skipped: ' . $e->getMessage());
            }

            // Safely enrich with User Info
            try {
                $userInfo = $this->getMyMIUser()->getUserInformation($this->cuID);
                if (is_array($userInfo)) {
                    foreach (['cuWalletID','cuRole','cuUserType','cuEmail','cuDisplayName','cuUsername','cuNameInitials','cuKYC','cuWalletCount','MyMIGCoinSum','walletID'] as $key) {
                        if (isset($userInfo[$key])) {
                            $this->data[$key] = $userInfo[$key];
                        }
                    }
                }
            } catch (\Throwable $e) {
                log_message('notice', 'ProjectsAdminController commonData: userInfo skipped: ' . $e->getMessage());
            }

            // Safely enrich with Solana Info
            try {
                $userSolanaData = $this->getSolanaService()->getSolanaData($this->cuID);
                if (is_array($userSolanaData)) {
                    $this->data['cuSolanaDW']    = $userSolanaData['userSolanaWallets']['cuSolanaDW'] ?? null;
                    $this->data['cuSolanaTotal'] = $userSolanaData['userSolanaWallets']['cuSolanaTotal'] ?? 0;
                    $this->data['cuSolanaValue'] = $userSolanaData['userSolanaWallets']['cuSolanaValue'] ?? 0;
                }
            } catch (\Throwable $e) {
                log_message('notice', 'ProjectsAdminController commonData: solanaData skipped: ' . $e->getMessage());
            }

            // Safely enrich with Projects Data
            try {
                $this->data['projects'] = $this->getMyMIProjects()->projectsData($this->cuID);
            } catch (\Throwable $e) {
                log_message('notice', 'ProjectsAdminController commonData: projectsData skipped: ' . $e->getMessage());
            }
        }

        return $this->data;
    }

    // Refactored userAccountData to ensure all account-related data is captured
    private function userAccountData()
    {
        $userInfo = $this->getMyMIUser()->getUserInformation($this->cuID);
        $this->data['cuFirstName'] = $userInfo['cuFirstName'] ?? '';
        $this->data['cuMiddleName'] = $userInfo['cuMiddleName'] ?? '';
        $this->data['cuLastName'] = $userInfo['cuLastName'] ?? '';
        $this->data['cuNameSuffix'] = $userInfo['cuNameSuffix'] ?? '';
        $this->data['cuPhone'] = $userInfo['cuPhone'] ?? '';
        $this->data['cuDOB'] = $userInfo['cuDOB'] ?? '';
        $this->data['cuMailingAddress'] = $userInfo['cuMailingAddress'] ?? '';

        if ($this->siteSettings->solanaExchange === 1) {
            $exchange = 'Solana';
            $this->data['cuSolanaDW'] = $this->getMyMIDashboard()->getCryptoAccount($this->cuID, $exchange)['accountInfo'] ?? [];
        }
    }

    // Views
    public function index()
    {
        $this->data['pageTitle'] = 'Real Estate & Project Operations Mission Control | MyMI Admin';
        $this->commonData();
        $this->data['useDataTables'] = true;
        $this->data['useProjectListDT'] = true;

        $realEstateProjects = [];
        $reMetrics = [
            'total_portfolio_value'   => 0.0,
            'active_properties_count' => 0,
            'total_projected_noi'     => 0.0,
            'wholesale_pipeline_count'=> 0,
            'str_count'               => 0,
            'ltr_count'               => 0,
            'commercial_count'        => 0,
        ];

        try {
            $reModel = new \App\Models\ProjectsRealEstateModel();
            $realEstateProjects = $reModel->getActiveRealEstateProjects(100);

            foreach ($realEstateProjects as $rep) {
                $reMetrics['active_properties_count']++;
                $val = (float) ($rep['purchase_price'] ?? $rep['target_acquisition_cost'] ?? $rep['total_acquisition_cost'] ?? 0);
                $reMetrics['total_portfolio_value'] += $val;
                $noi = (float) ($rep['projected_annual_noi'] ?? 0);
                $reMetrics['total_projected_noi'] += $noi;

                $cat = $rep['property_category'] ?? 'residential_str';
                if ($cat === 'wholesale_flip') {
                    $reMetrics['wholesale_pipeline_count']++;
                } elseif ($cat === 'residential_ltr') {
                    $reMetrics['ltr_count']++;
                } elseif ($cat === 'commercial_lease') {
                    $reMetrics['commercial_count']++;
                } else {
                    $reMetrics['str_count']++;
                }
            }
        } catch (\Throwable $e) {
            log_message('error', 'ProjectsAdminController::index real estate error: ' . $e->getMessage());
        }

        $inboxSubmissions = [];
        try {
            $inboxSubmissions = $this->projectsModel->getRecentInboxSubmissions(25);
        } catch (\Throwable $e) {
            log_message('error', 'ProjectsAdminController::index inbox error: ' . $e->getMessage());
        }

        $this->data['realEstateProjects'] = $realEstateProjects;
        $this->data['reMetrics']          = $reMetrics;
        $this->data['inboxSubmissions']   = $inboxSubmissions;

        return $this->renderTheme('App\Modules\Management\Views\Projects\index', $this->data);
    }

    public function add()
    {
        log_message('debug', 'ProjectsController::add - Method Start');
    
        if ($this->request->getMethod() === 'POST') {
            log_message('debug', 'ProjectsController::add - POST request detected');
            $formData = $this->request->getPost();
            $this->logSnippet('debug', 'ProjectsController add formData', $formData);
    
            log_message('debug', 'ProjectsController::add - User ID matched: ' . $this->cuID);
    
            // Prepare project data
            $projectData = [
                'beta' => $formData['beta'],
                'name' => $formData['name'],
                'description' => $formData['description'],
                'target_amount' => $formData['target_amount'],
                'status' => 'pending',
                'created_by' => $this->cuID,
                'user_email' => $formData['user_email'],
                'username' => $formData['username'],
                'created_at' => date('Y-m-d H:i:s'),
                'investment_goal' => $formData['target_amount'],
                'minimum_investment' => $formData['minimum_investment'],
                'maximum_investment' => $formData['maximum_investment'],
                'project_stage' => $formData['project_stage'],
                'completion_date' => $formData['completion_date'],
                'remarks' => $formData['remarks'],
                'promotional_links' => $formData['promotional_links'],
                'form_mode' => $formData['form_mode'],
            ];
            $this->logSnippet('debug', 'ProjectsController add projectData', $projectData);
    
            if ($this->projectsModel->createProject($projectData)) {
                log_message('debug', 'ProjectsController::add - Project created successfully');
    
                try {
                    // Render the project received content
                    $emailBody = view('ManagementModule\Views\Projects\_email\Project_Received', ['data' => $projectData]);
                    log_message('debug', 'ProjectsController::add - $emailBody: ' . $emailBody);
                
                    // Use the layout for email rendering
                    $emailContent = view('emails/layout', [
                        'title' => 'New Project Submission',
                        'content' => $emailBody,
                        'siteSettings' => $this->siteSettings,
                        'socialMedia' => $this->socialMedia,
                    ]);
                    log_message('debug', 'ProjectsController::add - $emailContent: ' . $emailContent);
                
                    // Email data
                    $emailData = [
                        'from'    => 'no-reply@mymiwallet.com',
                        'to'      => $formData['user_email'],
                        'subject' => 'New MyMI Wallet Project Submitted - ' . $formData['name'],
                        'message' => $emailContent,
                        'module'  => 'projects',
                        'queue'   => true,
                    ];
                    $this->logSnippet('debug', 'ProjectsController add emailData', $emailData);
                
                    // Send email
                    if ($this->supportService->sendEmail($emailData)) {
                        log_message('info', 'ProjectsController::add - Confirmation email sent successfully');
                    } else {
                        log_message('error', 'ProjectsController::add - Failed to send confirmation email');
                        return $this->respond(['status' => 'error', 'message' => 'Failed to send confirmation email'], 500);
                    }
                } catch (\Exception $e) {
                    log_message('error', 'ProjectsController::add - Error in sendConfirmationEmail: ' . $e->getMessage());
                    return $this->respond(['status' => 'error', 'message' => 'Failed to send confirmation email'], 500);
                }               
    
                return $this->respond(['status' => 'success', 'message' => 'Project submitted successfully'], 200);
            } else {
                log_message('error', 'ProjectsController::add - Project creation failed');
                return $this->respond(['status' => 'error', 'message' => 'Failed to submit the project'], 500);
            }
        }
    
        log_message('debug', 'ProjectsController::add - Method End');
    }

    /** GET Management/Projects/Quick-Analysis: Interactive AI Underwriting Dashboard */
    public function realEstateQuickAnalysis()
    {
        $this->data['pageTitle'] = 'AIOps Real Estate Quick-Analysis | MyMI Admin';
        return $this->renderTheme('App\\Modules\\Management\\Views\\Projects\\quick_analysis_page', $this->data);
    }

    /** POST Management/Projects/Quick-Analysis/Analyze: Run AIOps analysis via AJAX */
    public function runQuickAnalysis()
    {
        $input = $this->request->getPost() ?: $this->request->getJSON(true) ?: [];
        $actorId = (int) ($this->cuID ?? 1);

        try {
            $underwriter = new \App\Services\RealEstateAiUnderwriterService();
            $result = $underwriter->analyze($input, $actorId);
            return $this->respond($result);
        } catch (\Throwable $e) {
            log_message('error', 'runQuickAnalysis error: ' . $e->getMessage());
            return $this->fail('AIOps analysis error: ' . $e->getMessage(), 400);
        }
    }

    /** POST Management/Projects/Quick-Analysis/Parse-Listing: Ingest and parse Zillow or listing URL */
    public function parseListingUrl()
    {
        $input = $this->request->getPost() ?: $this->request->getJSON(true) ?: [];
        $url = trim((string) ($input['url'] ?? $input['zillow_url'] ?? ''));

        if ($url === '') {
            return $this->respond([
                'status'  => 'error',
                'message' => 'Please provide a valid listing URL.',
            ], 400);
        }

        try {
            $ingestService = new \App\Services\RealEstateIngestService();
            $parsed = $ingestService->parseListingUrl($url);

            if (!($parsed['ok'] ?? false)) {
                return $this->respond([
                    'status'  => 'error',
                    'message' => $parsed['message'] ?? 'Could not parse listing details from this link. You can enter the details manually.',
                    'data'    => $parsed,
                ], 200);
            }

            return $this->respond([
                'status' => 'ok',
                'data'   => $parsed,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'parseListingUrl error: ' . $e->getMessage());
            return $this->respond([
                'status'  => 'error',
                'message' => 'Failed to parse listing URL: ' . $e->getMessage(),
            ], 500);
        }
    }

    /** POST Management/Projects/Quick-Analysis/Publish: Publish analyzed deal directly to marketplace */
    public function publishQuickAnalysis()
    {
        helper(['form']);
        $in = $this->request->getPost() ?: [];
        $actorId = (int) ($this->cuID ?? 1);

        try {
            $dealService = new \App\Services\RealEstateDealService();
            $result = $dealService->intakePropertyDeal($actorId, $in);

            if ($result['ok'] ?? false) {
                return redirect()->to(site_url('Projects/Real-Estate/' . (int) $result['project_id']))
                    ->with('success', 'Real Estate Project approved, underwritten, and published live to community marketplace!');
            }

            return redirect()->back()->with('error', $result['error'] ?? 'Failed to publish project.');
        } catch (\Throwable $e) {
            log_message('error', 'publishQuickAnalysis error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Publish error: ' . $e->getMessage());
        }
    }

    public function realEstateQuickIntake()
    {
        $this->data['pageTitle'] = 'Quick Property Intake';
        return $this->renderTheme('App\\Modules\\Management\\Views\\Projects\\quick_intake_page', $this->data);
    }

    public function realEstateQuickSubmit()
    {
        helper(['form']);
        $rules = [
            'zillow_url'    => 'permit_empty|valid_url',
            'address_line1' => 'permit_empty|string',
            'city'          => 'permit_empty|string',
            'state'         => 'permit_empty|string',
            'postal_code'   => 'permit_empty|string',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->with('error','Invalid input.')->withInput();
        }

        $in = $this->request->getPost();
        $zillowUrl = trim((string) ($in['zillow_url'] ?? ''));

        // If Zillow link was provided, auto-parse missing address components and price
        if ($zillowUrl !== '' && (empty($in['address_line1']) || empty($in['purchase_price']))) {
            try {
                $ingestService = new \App\Services\RealEstateIngestService();
                $parsed = $ingestService->parseListingUrl($zillowUrl);
                if ($parsed['ok'] ?? false) {
                    if (empty($in['address_line1']) && !empty($parsed['address_line1'])) {
                        $in['address_line1'] = $parsed['address_line1'];
                    }
                    if (empty($in['city']) && !empty($parsed['city'])) {
                        $in['city'] = $parsed['city'];
                    }
                    if (empty($in['state']) && !empty($parsed['state'])) {
                        $in['state'] = $parsed['state'];
                    }
                    if (empty($in['postal_code']) && !empty($parsed['postal_code'])) {
                        $in['postal_code'] = $parsed['postal_code'];
                    }
                    if (empty($in['purchase_price']) && !empty($parsed['purchase_price'])) {
                        $in['purchase_price'] = $parsed['purchase_price'];
                    }
                    if (empty($in['title']) && !empty($parsed['title'])) {
                        $in['title'] = $parsed['title'];
                    }
                }
            } catch (\Throwable $e) {
                log_message('notice', 'realEstateQuickSubmit parseListingUrl notice: ' . $e->getMessage());
            }
        }

        $source = $zillowUrl !== '' ? 'zillow' : 'address';
        if ($source === 'address' && empty($in['address_line1'])) {
            return redirect()->back()->with('error','Provide a Zillow (or similar) link or an address.')->withInput();
        }

        // 1. If pro forma or direct project creation requested, initialize syndicated project
        if ($this->request->getPost('create_project') || ! empty($in['purchase_price'])) {
            try {
                $dealService = new \App\Services\RealEstateDealService();
                $intakeResult = $dealService->intakePropertyDeal((int) ($this->cuID ?? 1), $in);
                if ($intakeResult['ok'] ?? false) {
                    return redirect()->to(site_url('Projects/Real-Estate/' . (int) $intakeResult['project_id']))
                        ->with('success', 'Real Estate Project and Pro Forma successfully created and live in marketplace!');
                }
                if (!empty($intakeResult['error'])) {
                    return redirect()->back()->with('error', $intakeResult['error'])->withInput();
                }
            } catch (\Throwable $e) {
                log_message('error', 'realEstateQuickSubmit deal creation error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Deal creation error: ' . $e->getMessage())->withInput();
            }
        }

        // 2. Queue for background ingestion
        /** @var \App\Models\ProjectsModel $pm */
        $pm = model('ProjectsModel');
        $id = $pm->reSaveIntake([
            'user_id'       => (int) ($this->cuID ?? 1),
            'source'        => $source,
            'raw_input'     => $source === 'zillow'
                ? $zillowUrl
                : trim(($in['address_line1'] ?? '').' '.($in['city'] ?? '').' '.($in['state'] ?? '').' '.($in['postal_code'] ?? '')),
            'zillow_url'    => $zillowUrl ?: null,
            'address_line1' => $in['address_line1'] ?? null,
            'city'          => $in['city'] ?? null,
            'state'         => strtoupper($in['state'] ?? ''),
            'postal_code'   => $in['postal_code'] ?? null,
            'status'        => 'queued',
        ]);

        try {
            $ingest = new \App\Services\RealEstateIngestService();
            $ingest->queue((int)$id);
        } catch (\Throwable $e) {
            log_message('error', 'realEstateQuickSubmit ingest error: ' . $e->getMessage());
        }

        return redirect()->back()->with('success','Submitted! We’re fetching public details now.');
    }

    /** GET Management/Projects/Deal-Finder: Distressed sourcing across 5 platforms */
    public function dealFinder()
    {
        $this->commonData();
        $this->data['pageTitle'] = 'Distressed Property & Section 8 Deal Finder | MyMI Admin';

        try {
            $finderService = new \App\Services\RealEstateDealFinderService();
            $defaultResults = $finderService->searchDistressedOpportunities([
                'max_price' => 50000,
                'min_sqft'  => 1700,
                'beds'      => 3,
                'zip'       => '71111',
            ]);
            $this->data['dealFinderData'] = $defaultResults;
        } catch (\Throwable $e) {
            log_message('error', 'dealFinder error: ' . $e->getMessage());
            $this->data['dealFinderData'] = [];
        }

        return $this->renderTheme('App\\Modules\\Management\\Views\\Projects\\deal_finder_page', $this->data);
    }

    /** POST Management/Projects/Deal-Finder/Search: Run search across 5 platforms via AJAX */
    public function searchDistressedDeals()
    {
        $input = $this->request->getPost() ?: $this->request->getJSON(true) ?: [];
        try {
            $finderService = new \App\Services\RealEstateDealFinderService();
            $results = $finderService->searchDistressedOpportunities($input);
            return $this->respond($results);
        } catch (\Throwable $e) {
            log_message('error', 'searchDistressedDeals error: ' . $e->getMessage());
            return $this->fail('Search error: ' . $e->getMessage(), 400);
        }
    }

    /** POST Management/Projects/Deal-Finder/Hud-Fmr: Fetch HUD Fair Market Rent by ZIP */
    public function hudFairMarketRent()
    {
        $input = $this->request->getPost() ?: $this->request->getJSON(true) ?: [];
        $zip = trim((string) ($input['zip'] ?? '71111'));
        try {
            $finderService = new \App\Services\RealEstateDealFinderService();
            $hudFmr = $finderService->getHudFairMarketRent($zip);
            return $this->respond([
                'status' => 'ok',
                'data'   => $hudFmr,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'hudFairMarketRent error: ' . $e->getMessage());
            return $this->fail('HUD FMR error: ' . $e->getMessage(), 400);
        }
    }
    
    public function viewProject($projectID = null)
    {
        $this->data['pageTitle'] = 'MyMI Dashboard | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Projects\viewProject', $this->data);
    }

    public function listProjects()
    {
        $projects = $this->projectsModel->getAllProjects();
        return $this->respond(['status' => 'success', 'projects' => $projects]);
    }

    public function createProject()
    {
        $data = $this->request->getPost();
        $projectId = $this->projectsModel->createProject($data);

        return $projectId ? $this->respond(['status' => 'success', 'project_id' => $projectId]) : $this->fail('Project creation failed');
    }

    public function commitInvestment($projectId)
    {
        $userId = $this->cuID;
        $amount = $this->request->getPost('amount');

        $commitmentStatus = $this->getMyMIProjects()->commitToProject($userId, $projectId, $amount);
        return $commitmentStatus ? $this->respond(['status' => 'success', 'message' => 'Investment committed successfully']) : $this->fail('Commitment failed');
    }

    public function distributeRevenue($projectId)
    {
        $distributeStatus = $this->getMyMIProjects()->distributeRevenue($projectId);
        return $distributeStatus ? $this->respond(['status' => 'success', 'message' => 'Revenue distributed successfully']) : $this->fail('Distribution failed');
    }

    public function sendMoreInfoRequest($projectId)
    {
        // Fetch project and user details
        $project = $this->projectsModel->getProjectById($projectId);
        if (!$project) {
            return $this->failNotFound('Project not found.');
        }
    
        // Compose email data
        $emailData = [
            'name' => $project['username'],
            'email' => $project['user_email'],
            'project_name' => $project['name'],
            'subject' => 'More Information Required for Your Project',
            'message' => view('ManagementModule\Views\Projects\_emails\More_Information_Required', $project),
        ];
    
        try {
            $this->supportService->sendEmail($emailData);
            return $this->respond(['status' => 'success', 'message' => 'Request for more information sent successfully.']);
        } catch (\Exception $e) {
            log_message('error', 'Error sending More Information Required email: ' . $e->getMessage());
            return $this->respond(['status' => 'error', 'message' => 'Failed to send email.'], 500);
        }
    }
    
    public function approveProject($projectId)
    {
        // Update project status
        $updateStatus = $this->projectsModel->update($projectId, ['status' => 'approved']);
        if (!$updateStatus) {
            return $this->fail('Failed to update project status.');
        }
    
        // Fetch project and user details
        $project = $this->projectsModel->getProjectById($projectId);
        if (!$project) {
            return $this->failNotFound('Project not found.');
        }
    
        // Compose email data
        $emailData = [
            'name' => $project['username'],
            'email' => $project['user_email'],
            'project_name' => $project['name'],
            'subject' => 'Your Project Has Been Approved!',
            'message' => view('ManagementModule\Views\Projects\_emails\Project_Approved', $project),
        ];
    
        try {
            $this->supportService->sendEmail($emailData);
            return $this->respond(['status' => 'success', 'message' => 'Project approved and email sent successfully.']);
        } catch (\Exception $e) {
            log_message('error', 'Error sending Project Approved email: ' . $e->getMessage());
            return $this->respond(['status' => 'error', 'message' => 'Failed to send email.'], 500);
        }
    }
    
    public function notifyIssues($projectId)
    {
        // Fetch project and user details
        $project = $this->projectsModel->getProjectById($projectId);
        if (!$project) {
            return $this->failNotFound('Project not found.');
        }
    
        // Compose email data
        $emailData = [
            'name' => $project['username'],
            'email' => $project['user_email'],
            'project_name' => $project['name'],
            'subject' => 'Issues Found in Your Project Submission',
            'message' => view('ManagementModule\Views\Projects\_emails\Project_Issues', $project),
        ];
    
        try {
            $this->supportService->sendEmail($emailData);
            return $this->respond(['status' => 'success', 'message' => 'Issues notification sent successfully.']);
        } catch (\Exception $e) {
            log_message('error', 'Error sending Issues Notification email: ' . $e->getMessage());
            return $this->respond(['status' => 'error', 'message' => 'Failed to send email.'], 500);
        }
    }
    
    public function rejectProject($projectId)
    {
        // Update project status
        $updateStatus = $this->projectsModel->update($projectId, ['status' => 'rejected']);
        if (!$updateStatus) {
            return $this->fail('Failed to update project status.');
        }
    
        // Fetch project and user details
        $project = $this->projectsModel->getProjectById($projectId);
        if (!$project) {
            return $this->failNotFound('Project not found.');
        }
    
        // Compose email data
        $emailData = [
            'name' => $project['username'],
            'email' => $project['user_email'],
            'project_name' => $project['name'],
            'subject' => 'Your Project Was Not Approved',
            'message' => view('ManagementModule\Views\Projects\_emails\Project_Not_Approved', $project),
        ];
    
        try {
            $this->supportService->sendEmail($emailData);
            log_message('info', 'Confirmation email sent successfully');
            return $this->respond(['status' => 'success', 'message' => 'Project rejection email sent successfully.']);
        } catch (\Exception $e) {
            log_message('error', 'Error sending Project Not Approved email: ' . $e->getMessage());
            return $this->respond(['status' => 'error', 'message' => 'Failed to send email.'], 500);
        }
    }
    

    public function fundOverview($projectId = null)
    {
        $this->commonData();
        $projectId = $projectId ? (int) $projectId : null;
        if ($projectId === null) {
            $primary = $this->getMyMIProjects()->getPrimaryFundProject();
            $projectId = (int) ($primary['id'] ?? 0);
        }

        if ($projectId <= 0) {
            return redirect()->back()->with('error', 'No fund project found.');
        }

        $dashboard = $this->getMyMIProjects()->getFundDashboardData($projectId, (int) $this->cuID);
        $dashboard['pageTitle'] = 'Fund Overview';
        return $this->renderTheme('App\Modules\Management\Views\Projects\fund_overview', $dashboard);
    }

    public function updateFundNAV()
    {
        $projectId = (int) $this->request->getPost('project_id');
        $totalFundValue = $this->request->getPost('total_fund_value');

        try {
            $nav = $this->getMyMIProjects()->recalculateProjectNAV($projectId, $totalFundValue !== null ? (float) $totalFundValue : null);
            log_message('info', 'ProjectsAdminController::updateFundNAV', ['project_id' => $projectId, 'nav' => $nav]);
            return $this->respond(['status' => 'success', 'nav' => $nav]);
        } catch (\Throwable $e) {
            return $this->respond(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }

    public function recordFundDistribution()
    {
        $projectId = (int) $this->request->getPost('project_id');
        $totalAmount = (float) $this->request->getPost('total_amount');
        $note = $this->request->getPost('note');

        try {
            $distributionId = $this->getMyMIProjects()->recordFundDistribution($projectId, $totalAmount, $note);
            log_message('info', 'ProjectsAdminController::recordFundDistribution', ['project_id' => $projectId, 'distribution_id' => $distributionId]);
            return $this->respond(['status' => 'success', 'distribution_id' => $distributionId]);
        } catch (\Throwable $e) {
            return $this->respond(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }

    public function seedPrimaryFundProject()
    {
        $existing = $this->projectsModel->getPrimarySystemProject();
        if ($existing) {
            return $this->respond(['status' => 'success', 'message' => 'Primary fund project already exists.', 'project_id' => (int) $existing['id']]);
        }

        $id = $this->projectsModel->insert([
            'name' => 'MyMI US Oil Fund',
            'description' => 'Private fund project focused on disciplined accumulation and management of U.S. oil exposure using a NAV-driven unit model inside MyMI Projects.',
            'target_amount' => 1000000.00,
            'current_amount' => 0.00,
            'status' => 'active',
            'is_active' => 1,
            'is_system' => 1,
            'project_type' => 'private_fund',
            'nav_per_unit' => 1.00000000,
            'total_units_issued' => 1000000.00000000,
            'total_fund_value' => 1000000.00,
            'linked_visual' => 'https://cdn.mymi.com/projects/mymi-us-oil-fund-flow.png',
            'created_by' => (int) $this->cuID,
            'created_at' => date('Y-m-d H:i:s'),
        ], true);

        log_message('info', 'ProjectsAdminController::seedPrimaryFundProject seeded project', ['project_id' => $id]);
        try {
            $asset = $this->getMyMIProjects()->registerProjectAsExchangeAsset((int) $id);
        } catch (\Throwable $e) {
            $asset = ['error' => $e->getMessage()];
        }

        return $this->respond(['status' => 'success', 'project_id' => (int) $id, 'exchange_asset' => $asset]);
    }

    public function hideTestProjects()
    {
        $updated = $this->projectsModel
            ->where('is_system', 0)
            ->set(['is_active' => 0, 'updated_at' => date('Y-m-d H:i:s')])
            ->update();

        log_message('info', 'ProjectsAdminController::hideTestProjects hid non-system projects', ['updated' => $updated]);
        return $this->respond(['status' => 'success', 'updated' => $updated]);
    }

    public function updateInvestorCompliance()
    {
        $projectId = (int) $this->request->getPost('project_id');
        $userId = (int) $this->request->getPost('user_id');

        $payload = [
            'kyc_status' => (string) $this->request->getPost('kyc_status'),
            'investor_eligibility' => (string) $this->request->getPost('investor_eligibility'),
            'agreement_signed' => (int) $this->request->getPost('agreement_signed'),
            'notes' => $this->request->getPost('notes'),
        ];

        $ok = $this->getMyMIProjects()->updateInvestorCompliance($projectId, $userId, $payload, (int) $this->cuID);
        return $this->respond(['status' => $ok ? 'success' : 'error']);
    }

    public function recordFundCapitalFlow()
    {
        $projectId = (int) $this->request->getPost('project_id');
        $flowType = (string) $this->request->getPost('flow_type');
        $amount = (float) $this->request->getPost('amount');
        $unitsDelta = (float) $this->request->getPost('units_delta');
        $reference = $this->request->getPost('reference');
        $notes = $this->request->getPost('notes');

        $id = $this->getMyMIProjects()->recordManualCapitalFlow(
            $projectId,
            $flowType,
            $amount,
            $unitsDelta,
            $reference,
            $notes,
            (int) $this->cuID
        );

        return $this->respond(['status' => 'success', 'capital_flow_id' => $id]);
    }

    public function validateFundIntegrity($projectId = null)
    {
        $projectId = $projectId ? (int) $projectId : 0;
        if ($projectId <= 0) {
            $primary = $this->projectsModel->getPrimarySystemProject();
            $projectId = (int) ($primary['id'] ?? 0);
        }

        if ($projectId <= 0) {
            return $this->respond(['status' => 'error', 'message' => 'No fund project found.'], 404);
        }

        $report = $this->getMyMIProjects()->validateFundIntegrity($projectId);
        return $this->respond(['status' => 'success', 'data' => $report]);
    }

    public function reconcileFundExchange($projectId)
    {
        $projectId = (int) $projectId;
        if ($projectId <= 0) {
            return $this->respond(['status' => 'error', 'message' => 'Invalid project id.'], 400);
        }

        $report = $this->getMyMIProjects()->reconcileProjectFundWithExchange($projectId);
        return $this->respond(['status' => 'success', 'data' => $report]);
    }

    public function registerFundExchangeAsset($projectId)
    {
        $projectId = (int) $projectId;
        if ($projectId <= 0) {
            return $this->respond(['status' => 'error', 'message' => 'Invalid project id.'], 400);
        }

        try {
            $asset = $this->getMyMIProjects()->registerProjectAsExchangeAsset($projectId);
            return $this->respond(['status' => 'success', 'data' => $asset]);
        } catch (\Throwable $e) {
            return $this->respond(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }

    public function distributionConsole($projectId)
    {
        $projectId = (int) $projectId;
        $project = $this->projectsModel->find($projectId);
        if (! $project) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Project not found.');
        }

        $property = null;
        $revenues = [];
        try {
            $reModel = new \App\Models\ProjectsRealEstateModel();
            $property = $reModel->getByProjectId($projectId);

            $revModel = new \App\Models\ProjectsRealEstateRevenueModel();
            $revenues = $revModel->getRevenuesByProject($projectId);
        } catch (\Throwable $e) {
            log_message('error', 'distributionConsole error: ' . $e->getMessage());
        }

        $this->data['pageTitle'] = 'Real Estate Revenue Distribution Console | MyMI Admin';
        $this->data['project'] = $project;
        $this->data['property'] = $property;
        $this->data['revenues'] = $revenues;

        return $this->renderTheme('App\\Modules\\Management\\Views\\Projects\\distribution_console', $this->data);
    }

    public function executeDistribution($projectId)
    {
        $projectId = (int) $projectId;
        $revenueId = (int) $this->request->getPost('revenue_id');
        $actorId = (int) ($this->cuID ?? 1);

        try {
            $dealService = new \App\Services\RealEstateDealService();
            $result = $dealService->executeRevenueDistribution($projectId, $revenueId, $actorId);
            return $this->respond(['status' => 'success', 'data' => $result]);
        } catch (\Throwable $e) {
            return $this->respond(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }

    /** GET Management/Projects/Buyers: Cash Buyer CRM Management Console */
    public function cashBuyersIndex()
    {
        $this->commonData();
        $this->data['pageTitle'] = 'Cash Buyer CRM & Wholesale Dispo Network | MyMI Admin';

        try {
            $buyerModel = model(\App\Models\RealEstateCashBuyerModel::class);
            $this->data['cashBuyers'] = $buyerModel->orderBy('proof_of_funds_verified', 'DESC')
                ->orderBy('max_purchase_price', 'DESC')
                ->findAll();
        } catch (\Throwable $e) {
            log_message('error', 'cashBuyersIndex error: ' . $e->getMessage());
            $this->data['cashBuyers'] = [];
        }

        return $this->renderTheme('App\\Modules\\Management\\Views\\Projects\\buyers_page', $this->data);
    }

    /** GET/POST Management/Projects/Buyers/List: Return JSON array of active buyers */
    public function cashBuyersList()
    {
        try {
            $buyerModel = model(\App\Models\RealEstateCashBuyerModel::class);
            $buyers = $buyerModel->where('status', 'active')
                ->orderBy('proof_of_funds_verified', 'DESC')
                ->findAll();
            return $this->respond(['status' => 'ok', 'buyers' => $buyers]);
        } catch (\Throwable $e) {
            return $this->respond(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }

    /** POST Management/Projects/Buyers/Add: Register new institutional or private cash buyer */
    public function addCashBuyer()
    {
        $in = $this->request->getPost() ?: $this->request->getJSON(true) ?: [];
        $fullName = trim((string) ($in['full_name'] ?? ''));
        $email = trim((string) ($in['email'] ?? ''));

        if ($fullName === '' || $email === '') {
            return $this->respond(['status' => 'error', 'message' => 'Full Name and Email are required.'], 400);
        }

        try {
            $buyerModel = model(\App\Models\RealEstateCashBuyerModel::class);
            $insertData = [
                'full_name'                => $fullName,
                'company_name'             => trim((string) ($in['company_name'] ?? '')),
                'email'                    => $email,
                'phone'                    => trim((string) ($in['phone'] ?? '')),
                'buyer_type'               => trim((string) ($in['buyer_type'] ?? 'institutional_fund')),
                'max_purchase_price'       => (float) ($in['max_purchase_price'] ?? 250000.0),
                'min_roi_pct'              => (float) ($in['min_roi_pct'] ?? 10.0),
                'target_zips'              => trim((string) ($in['target_zips'] ?? '71111, 71101, 71105')),
                'target_cities'            => trim((string) ($in['target_cities'] ?? 'Bossier City, Shreveport')),
                'proof_of_funds_verified'  => ! empty($in['proof_of_funds_verified']) ? 1 : 0,
                'proof_of_funds_amount'    => (float) ($in['proof_of_funds_amount'] ?? 0.0),
                'status'                   => 'active',
                'notes'                    => trim((string) ($in['notes'] ?? '')),
                'deals_received_count'     => 0,
                'deals_closed_count'       => 0,
            ];

            $id = $buyerModel->insert($insertData);
            return $this->respond(['status' => 'ok', 'id' => $id, 'message' => 'Cash buyer added successfully.']);
        } catch (\Throwable $e) {
            log_message('error', 'addCashBuyer error: ' . $e->getMessage());
            return $this->respond(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }

    /** POST Management/Projects/Buyers/Match: Find buyers matching specific deal criteria */
    public function matchBuyersForDeal()
    {
        $in = $this->request->getPost() ?: $this->request->getJSON(true) ?: [];
        $price = (float) ($in['price'] ?? $in['end_buyer_price'] ?? 0.0);
        $roi   = (float) ($in['roi'] ?? $in['end_buyer_roi_pct'] ?? 0.0);
        $zip   = trim((string) ($in['zip'] ?? ''));

        try {
            $buyerModel = model(\App\Models\RealEstateCashBuyerModel::class);
            $matched = $buyerModel->findMatchingBuyers($price, $roi, $zip);
            return $this->respond([
                'status'        => 'ok',
                'matches_count' => count($matched),
                'buyers'        => $matched,
            ]);
        } catch (\Throwable $e) {
            return $this->respond(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }

    /** POST Management/Projects/Buyers/Broadcast: Dispatch deal package to selected cash buyers */
    public function broadcastDealToBuyers()
    {
        $in = $this->request->getPost() ?: $this->request->getJSON(true) ?: [];
        $buyerIds = $in['buyer_ids'] ?? [];
        if (is_string($buyerIds)) {
            $buyerIds = explode(',', $buyerIds);
        }
        $buyerIds = array_map('intval', (array) $buyerIds);
        $buyerIds = array_filter($buyerIds, fn($id) => $id > 0);

        if (empty($buyerIds)) {
            return $this->respond(['status' => 'error', 'message' => 'No cash buyers selected for broadcast.'], 400);
        }

        try {
            $buyerModel = model(\App\Models\RealEstateCashBuyerModel::class);
            $buyerModel->recordBroadcast($buyerIds);

            return $this->respond([
                'status'          => 'ok',
                'broadcast_count' => count($buyerIds),
                'message'         => 'Deal packet successfully dispatched to ' . count($buyerIds) . ' verified cash buyers.',
            ]);
        } catch (\Throwable $e) {
            return $this->respond(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }

    /** GET/POST Management/Projects/Quick-Analysis/Generate-Contract: Export LREC Assignment Agreement PDF */
    public function downloadAssignmentContract()
    {
        $in = array_merge($this->request->getGet(), $this->request->getPost());

        $deal = [
            'address'               => $in['address'] ?? '1842 Barksdale Blvd',
            'city'                  => $in['city'] ?? 'Bossier City',
            'state'                 => $in['state'] ?? 'LA',
            'zip'                   => $in['zip'] ?? '71111',
            'contract_price'        => (float) ($in['contract_price'] ?? 42500.0),
            'assignment_fee'        => (float) ($in['assignment_fee'] ?? 15000.0),
            'earnest_money_deposit' => (float) ($in['earnest_deposit'] ?? 2500.0),
            'days_to_close'         => (int) ($in['days_to_close'] ?? 14),
            'sqft'                  => (int) ($in['sqft'] ?? 1820),
            'beds'                  => (int) ($in['beds'] ?? 3),
            'baths'                 => (float) ($in['baths'] ?? 2.0),
            'title_escrow_agent'    => $in['title_escrow_agent'] ?? 'North Louisiana Title & Escrow, LLC',
        ];

        $buyer = [
            'name'    => $in['buyer_name'] ?? 'Bayou Equity Capital Partners, LLC',
            'company' => $in['buyer_company'] ?? 'Bayou Equity Fund I',
            'phone'   => $in['buyer_phone'] ?? '318-555-0192',
            'email'   => $in['buyer_email'] ?? 'acquisitions@bayouequity.com',
            'address' => $in['buyer_address'] ?? '700 Texas St, Suite 400, Shreveport, LA 71101',
        ];

        try {
            $docService = new \App\Services\RealEstateDocumentService();
            $pdfPath = $docService->generateAssignmentContractPdf($deal, $buyer);

            if (! file_exists($pdfPath)) {
                return $this->respond(['status' => 'error', 'message' => 'PDF generation failed.'], 500);
            }

            $content = (string) file_get_contents($pdfPath);
            return $this->response
                ->setHeader('Content-Type', 'application/pdf')
                ->setHeader('Content-Disposition', 'attachment; filename="' . basename($pdfPath) . '"')
                ->setBody($content);
        } catch (\Throwable $e) {
            log_message('error', 'downloadAssignmentContract error: ' . $e->getMessage());
            return $this->respond(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /** GET/POST Management/Projects/Quick-Analysis/Export-Dscr-Package: Export Lender DSCR Package PDF */
    public function downloadDscrLenderPackage()
    {
        $in = array_merge($this->request->getGet(), $this->request->getPost());

        $deal = [
            'address'           => $in['address'] ?? '1842 Barksdale Blvd',
            'city'              => $in['city'] ?? 'Bossier City',
            'state'             => $in['state'] ?? 'LA',
            'zip'               => $in['zip'] ?? '71111',
            'purchase_price'    => (float) ($in['purchase_price'] ?? 42500.0),
            'sqft'              => (int) ($in['sqft'] ?? 1820),
            'beds'              => (int) ($in['beds'] ?? 3),
            'baths'             => (float) ($in['baths'] ?? 2.0),
            'renovation_budget' => (float) ($in['renovation_budget'] ?? 15000.0),
            'appraised_arv'     => (float) ($in['appraised_arv'] ?? 125000.0),
            'monthly_rent'      => (float) ($in['monthly_rent'] ?? 1485.0),
        ];

        try {
            $docService = new \App\Services\RealEstateDocumentService();
            $pdfPath = $docService->generateDscrLenderPackagePdf($deal);

            if (! file_exists($pdfPath)) {
                return $this->respond(['status' => 'error', 'message' => 'PDF generation failed.'], 500);
            }

            $content = (string) file_get_contents($pdfPath);
            return $this->response
                ->setHeader('Content-Type', 'application/pdf')
                ->setHeader('Content-Disposition', 'attachment; filename="' . basename($pdfPath) . '"')
                ->setBody($content);
        } catch (\Throwable $e) {
            log_message('error', 'downloadDscrLenderPackage error: ' . $e->getMessage());
            return $this->respond(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

}
