<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use App\Config\{APIs, Auth, SiteSettings, SocialMedia};
use App\Controllers\UserController;
use App\Libraries\{HtmlFormatter, MyMIAnalytics, MyMIAlerts, MyMIBudget, MyMIDashboard, MyMIExchange, MyMIMarketing, MyMIUser};
use App\Models\{AlertsModel, AnnouncementModel, InvestmentModel, ManagementModel, MarketingModel, MyMIGoldModel, SolanaModel, UserModel};
use App\Services\{DashboardService, GoalTrackingService, MarketingService, SolanaService, UserService};
use CodeIgniter\API\ResponseTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use voku\helper\HtmlDomParser;

#[\AllowDynamicProperties]
class MarketingController extends UserController
{
    use ResponseTrait;
    protected $API;
    protected $auth;
    protected $helpers = ['auth', 'form', 'url'];
    protected $logger;
    protected $request;
    protected $session;
    protected $uri;
    protected $siteSettings;
    protected $NewsEmail; 
    protected $HtmlFormatter;
    protected $MyMIAnalytics;
    protected $MyMIAlerts;
    protected $MyMIBudget;
    protected $MyMIDashboard;
    protected $MyMIExchange;
    protected $MyMIMarketing;
    protected $MyMIUser;
    protected $dashboardService; 
    protected $goalTrackingService; 
    protected $marketingService; 
    protected $solanaService; 
    protected $userService; 
    protected $alertsModel;
    protected $investmentModel;
    protected $marketingModel;
    protected $userModel;
    protected $userAccount;
    protected $userDashboard;
    protected $getBlogPosts;
    protected $departmentTasks;
    protected $marketing;
    protected $reporting;

    public function __construct()
    {
        $this->API = config('APIs');
        $this->auth = service('authentication');        
        // Get the logger instance from CodeIgniter's Services
        $this->logger = service('logger');
        $this->NewsEmail = config('NewsEmailServer');
        $this->request                              = service('request'); 
        $this->session = Services::session();
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug; 
        $this->uri                                  = $this->request->getUri(); 
        

        // Initialize UserService and pass required dependencies
        // $this->dashboardService = new DashboardService();  // This should be SolanaService, not SolonaService
        // $this->marketingService = new MarketingService();  // This should be SolanaService, not SolonaService
        // $this->goalTrackingService = new GoalTrackingService();  // This should be SolanaService, not SolonaService
        // $this->solanaService = new SolanaService();  // This should be SolanaService, not SolonaService
      
        // Load models
        $this->alertsModel = new AlertsModel();
        $this->investmentModel = new InvestmentModel();
        $this->marketingModel = new MarketingModel();
        // $this->userModel = new UserModel();

        // Load libraries
        // $this->MyMIAnalytics = new MyMIAnalytics();
        // $this->MyMIAlerts = new MyMIAlerts();
        // $this->MyMIBudget = new MyMIBudget();
        // $this->MyMIDashboard = new MyMIDashboard();
        // $this->MyMIUser = service('MyMIUser');
        // $this->HtmlFormatter = new HtmlFormatter();
        // $this->MyMIMarketing = new MyMIMarketing(); // Ensure this is correctly initialized
        // $this->marketing = $this->getMyMIMarketing()->marketing(); 

        // Load Services 
        // $this->userAccount = $this->getMyMIUser()->getUserInformation($this->cuID);
        $this->userDashboard = $this->getMyMIDashboard()->dashboardInfo($this->cuID);
        $this->departmentTasks = $this->getMyMIAnalytics()->get_department_tasks($this->uri->getSegment(2), ['Page SEO Edit']);
        $this->getBlogPosts = $this->getMyMIMarketing()->getBlogPosts();

        // Initialize UserService and pass required dependencies
        $this->cuID = $this->session->get('user_id') ?? $this->auth->id();
        if (!$this->cuID) {
            log_message('error', 'Investments ControllerFailed to retrieve valid User ID in MyMIInvestments');
            throw new \RuntimeException('User ID could not be retrieved.');
        }
        log_message('debug', "InvestmentsController: cuID initialized as {$this->cuID}");
        $this->userAccount = $this->getMyMIUser()->getUserInformation($this->cuID);
        $userBudget = $this->getMyMIBudget()->getUserBudget($this->cuID); 
        log_message('info', 'DashboardController L72 - $checkingSummary: ' . $userBudget['checkingSummary']);
        $this->data['checkingSummary'] = $userBudget['checkingSummary'];


    }

    public function commonData(): array {
        $this->data = parent::commonData();
        // Fetch user data via a UserService
        // if (!empty($this->getuserService()->commonData())) { 
        //     $userData = $this->getuserService()->commonData();  // Assume this service optimally fetches all user-related data
        // } else {
        //     log_message('error', 'Failed to retrieve user ID.');
        //     return redirect()->to('/login')->with('redirect_url', current_url())->send();
        // }
        $this->data = $this->data ?? [];
        // Fetch data from UserService
        $userData = $this->getuserService()->commonData(); 
        // Merge the user data with BudgetController data
        $this->data = array_merge($this->data, $userData);  
    
        // Fetch general site settings
        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['beta'] = (string)$this->siteSettings->beta;
        $this->data['uri'] = $this->request->getUri();
        $this->data['date'] = $this->siteSettings->date;
        $this->data['time'] = $this->siteSettings->time;
        $this->data['hostTime'] = $this->siteSettings->hostTime;
    
        // Optimize dashboard data retrieval (use caching if necessary)
        $dashboardInfo = $this->getDashboardService()->getDashboardInfo($this->cuID);  // Batch fetch data
        $this->data['completedGoals'] = $this->getGoalTrackingService()->getCompletedGoals($this->cuID);
        $this->data['pendingGoals'] = $this->getGoalTrackingService()->getPendingGoals($this->cuID);
        $this->data['promotionalBanners'] = $dashboardInfo['promotionalBanners'];
    
        // Fetch total account balance and cache it (to avoid repeated calls)
        $userBudget = $this->getBudgetService()->getUserBudget($this->cuID);
        $this->data['totalAccountBalance'] = $userBudget['totalAccountBalance'] ?? 0;
        $this->data['totalAccountBalanceFMT'] = $userBudget['totalAccountBalanceFMT'] ?? '0.00';
        
        // Fetch Solana data (consider using a caching strategy)
        $userSolanaData = $this->getSolanaService()->getSolanaData($this->cuID);
        $this->data['cuSolanaDW'] = $userSolanaData['userSolanaWallets']['cuSolanaDW'] ?? null;
        // Ensure Solana network status exists to avoid "Undefined array key"
        try {
            if (!isset($this->solanaService)) {
                $this->solanaService = service('solanaService'); // or however you DI it
            }
            $data['solanaNetworkStatus'] = $this->solanaService->getNetworkStatus();
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController getNetworkStatus failed: {msg}', ['msg' => $e->getMessage()]);
            $data['solanaNetworkStatus'] = [
                'healthy' => false,
                'slot'    => null,
                'version' => null,
                'error'   => $e->getMessage(),
            ];
        }
        $this->data['cuSolanaTotal'] = $userSolanaData['userSolanaWallets']['cuSolanaTotal'] ?? 0;
        $this->data['cuSolanaValue'] = $userSolanaData['userSolanaWallets']['cuSolanaValue'] ?? 0;
    
        // Merge user data into the $this->data array (if not already handled by a service)
        $this->data = array_merge($this->data, $userData);
    
        // Conditionally run debug-specific logic
        if ($this->debug === 1) {
            // Add your debug logic here
        }
        return $this->data;
}
      
    // ***STANDARD PAGES***

    public function index()
    {
        $this->data['pageTitle'] = 'MyMI Marketing | Management | MyMI Wallet';
    
        // General analytics data
        $this->data['reporting'] = $this->getMyMIAnalytics()->reporting();
    
        // 🔁 Auto-generate if no recent posts
        $this->data['recentMarketingPosts'] = $this->getMyMIMarketing()->getRecentPosts(5);
        if (empty($this->data['recentMarketingPosts'])) {
            log_message('info', '📭 No recent posts found. Running fallback generation...');
            $this->getMyMIMarketing()->generateFromTempScraper(5);
            $this->data['recentMarketingPosts'] = $this->getMyMIMarketing()->getRecentPosts(25);
        }
    
        // 📅 Today's summaries (created_at = today)
        $todaysSummaries = $this->marketingModel->getTodaysGeneratedSummaries();
        log_message('debug', 'Management/MarketingController::index L182 - $todaysSummaries Array: ' . (print_r($todaysSummaries, true))); 
        $this->data['todaysStory'] = array_filter($todaysSummaries, function ($summary) {
            return isset($summary['summary']) && strlen(trim($summary['summary'])) > 10;
        });
        
        // 📦 All recent summaries (used for buffer/preview blocks)
        $this->data['generatedSummaries'] = $this->marketingModel->getLatestGeneratedSummaries(25);
        $this->data['finalizedContent'] = $this->marketingModel->getFinalizedPosts();
        $this->data['marketingBuffer'] = $this->marketingModel->getMarketingBuffer();
        $this->data['dripCampaigns'] = $this->getDripCampaigns();
    
        // 👇 Optional: baseline post creation from today’s story (if you want to enforce it)
        if (empty($this->data['todaysStory'])) {
            log_message('info', '📅 No content generated today. Triggering summary fallback...');
            $this->getMyMIMarketing()->generateFromTempScraper(5);
            $this->data['todaysStory'] = $this->marketingModel
                ->where('DATE(created_at)', date('Y-m-d'))
                ->orderBy('created_at', 'DESC')
                ->findAll();
        }
    
        // 🔗 Inject buttons that use `posts` field to generate platform messages
        // (Handled in the view using `dynamicModalLoader()`)
    
        $this->commonData();
        return $this->renderTheme('ManagementModule\Views\Marketing\index', $this->data);
    }
    
    // public function index()
    // {
    //     $this->data['pageTitle'] = 'MyMI Marketing | Management | MyMI Wallet';
    //     $this->data['reporting'] = $this->getMyMIAnalytics()->reporting();
    
    //     // Auto-generate fallback content if no posts exist
    //     $this->data['recentMarketingPosts'] = $this->getMyMIMarketing()->getRecentPosts();
    //     if (empty($this->data['recentMarketingPosts'])) {
    //         log_message('info', 'No recentMarketingPosts found. Running auto-generation...');
    //         $this->getMyMIMarketing()->generateFromTempScraper(5);
    //         $this->data['recentMarketingPosts'] = $this->getMyMIMarketing()->getRecentPosts(); // reload
    //     }
    
    //     $this->data['todaysStory'] = $this->marketingModel->getValidUnprocessedEmailsFromToday();
    //     $this->data['generatedSummaries'] = $this->marketingModel->getLatestGeneratedSummaries(25);
    //     $this->data['marketingBuffer'] = $this->marketingModel->getMarketingBuffer();
    //     $this->commonData();
    //     return $this->renderTheme('ManagementModule\Views\Marketing\index', $this->data);
    // }
    
    // public function index() {
    //     $this->data['pageTitle'] = 'MyMI Marketing | Management | MyMI Wallet';
    //     // Fetch analytics data
    //     $this->data['reporting'] = $this->getMyMIAnalytics()->reporting();
    //     $todaysStory = $this->marketingModel->getValidUnprocessedEmailsFromToday();
    //     log_message('info', 'Management/MarketingController L170 - $todaysStory: ' . (print_r($todaysStory, true))); 
    //     $this->data['todaysStory'] = $todaysStory; 
    //     $this->data['recentMarketingPosts'] = $this->getMyMIMarketing()->getRecentPosts(); // Adjust this line to match your model method
    //     $this->data['generatedSummaries'] = $this->marketingModel->getLatestGeneratedSummaries(25);
    //     $this->commonData();
    //     return $this->renderTheme('ManagementModule\Views\Marketing\index', $this->data);
    // }      

    public function add($type = null) {
        log_message('debug', 'MarketingController L183 - add() method called with type: ' . (is_null($type) ? 'null' : $type));
    
        if (!empty($type)) {
    
            // Handle POST request (form submission)
            if ($this->request->getMethod() === 'POST') {
                log_message('debug', 'Handling POST request for type: ' . $type);
    
                if ($type === 'Schedule') {
                    log_message('info', 'Processing Schedule submission');
                    try {
                        $this->marketingModel->addMarketingSchedule($this->request->getPost()); // Save the schedule data
                        log_message('info', 'Schedule data saved successfully');
    
                        // Check if the request is AJAX
                        if ($this->request->isAJAX()) {
                            return $this->response->setJSON(['success' => true, 'message' => 'Schedule added successfully']);
                        } else {
                            // Redirect to a success page for non-AJAX requests
                            return redirect()->to('/Management/Marketing/Schedule')->with('success', 'Schedule added successfully');
                        }
                    } catch (\Exception $e) {
                        log_message('error', 'Error saving schedule: ' . $e->getMessage());
                        return $this->response->setJSON(['error' => 'Failed to save schedule.']);
                    }
                } elseif ($type === 'Campaign') {
                    log_message('info', 'Processing Campaign submission');
                    try {
                        $campaignData = [
                            'beta' => $this->request->getPost('beta'),
                            'config_mode' => $this->request->getPost('config_mode'),
                            'form_mode' => $this->request->getPost('form_mode'),
                            'escalated' => $this->request->getPost('escalated'),
                            'user_id' => $this->request->getPost('user_id'),
                            'user_email' => $this->request->getPost('user_email'),
                            'username' => $this->request->getPost('username'),
                            'assigned_to' => $this->request->getPost('assigned_to'),
                            'date' => $this->siteSettings->date,
                            'time' => $this->siteSettings->time,
                            'campaign_name' => $this->request->getPost('campaign_name'),
                            'promotionalLinks' => json_encode($this->request->getPost('promotionalLinks')),
                            'overall_campaign_description' => $this->request->getPost('overall_campaign_description'),
                            'voice_script' => $this->request->getPost('voice_script'),
                            'facebookMessage' => $this->request->getPost('facebookMessage'),
                            'linkedinMessage' => $this->request->getPost('linkedinMessage'),
                            'discordMessage' => $this->request->getPost('discordMessage'),
                            'stocktwitsMessage' => $this->request->getPost('stocktwitsMessage'),
                            'tiktokMessage' => $this->request->getPost('tiktokMessage'),
                            'youtubeMessage' => $this->request->getPost('youtubeMessage'),
                            'emailMessage' => $this->request->getPost('emailMessage'),
                            'additionalInfo' => $this->request->getPost('additionalInfo'),
                            'hashtags' => $this->request->getPost('hashtags'),
                        ];
    
                        $this->marketingModel->addMarketingCampaign($campaignData); // Save the campaign data
                        log_message('info', 'Campaign data saved successfully');
    
                        // Check if the request is AJAX
                        if ($this->request->isAJAX()) {
                            log_message('info', 'MarketingController L251 - This is using the $this->request->isAJAX() Form Submission');
                            return $this->response->setJSON(['success' => true, 'message' => 'Campaign added successfully']);
                        } else {
                            // Redirect to a success page for non-AJAX requests
                            log_message('info', 'MarketingController L251 - This is NOT using the $this->request->isAJAX() Form Submission');
                            return redirect()->to('/Management/Marketing/Campaigns')->with('success', 'Campaign added successfully');
                        }
                    } catch (\Exception $e) {
                        log_message('error', 'Error saving campaign: ' . $e->getMessage());
                        return $this->response->setJSON(['error' => 'Failed to save campaign.']);
                    }
                } else {
                    log_message('error', 'Unrecognized type in POST request: ' . $type);
                    return $this->response->setJSON(['error' => 'Unrecognized type in POST request']);
                }
            }
    
            // Handle GET request (form display)
            if ($this->request->getMethod() === 'get') {
                log_message('debug', 'Handling GET request for type: ' . $type);
    
                if ($type === 'Schedule') {
                    log_message('debug', 'Loading view for Schedule');
                    try {
                        $response = $this->renderTheme('ManagementModule\Views\Marketing\Schedule\Add', $this->data);
                        log_message('debug', 'View for Schedule loaded successfully');
                        return $response;
                    } catch (\Exception $e) {
                        log_message('error', 'Failed to load view for Schedule: ' . $e->getMessage());
                        return $this->response->setJSON(['error' => 'Failed to load view for Schedule']);
                    }
                } elseif ($type === 'Campaign') {
                    log_message('debug', 'Loading view for Campaign');
                    try {
                        $response = $this->renderTheme('ManagementModule\Views\Marketing\Campaign\Add', $this->data);
                        log_message('debug', 'View for Campaign loaded successfully');
                        return $response;
                    } catch (\Exception $e) {
                        log_message('error', 'Failed to load view for Campaign: ' . $e->getMessage());
                        return $this->response->setJSON(['error' => 'Failed to load view for Campaign']);
                    }
                } else {
                    log_message('error', 'Unrecognized type in GET request: ' . $type);
                    return $this->response->setJSON(['error' => 'Unrecognized type in GET request']);
                }
            }
        } else {
            log_message('warning', 'No type provided; redirecting to /Management/Marketing');
            return redirect()->to('/Management/Marketing')->with('error', 'No type provided');
        }
    }  

    public function addSchedule() {
        if ($this->request->getMethod() === 'post') {
            $additionalInfo = $this->request->getPost('additional_info');
    
            // Validate and parse the JSON input
            $jsonData = null;
            if (!empty($additionalInfo)) {
                $jsonData = json_decode($additionalInfo, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    return redirect()->back()->withInput()->with('error', 'Invalid JSON format in Additional Information.');
                }
            }
    
            $scheduleData = [
                'day' => $this->request->getPost('day'),
                'time' => $this->request->getPost('time'),
                'activity' => $this->request->getPost('activity'),
                'link' => $this->request->getPost('link'),
                'additional_info' => json_encode($jsonData)  // Store as JSON in the database
            ];
    
            // Insert the new schedule
            $this->marketingModel->addMarketingSchedule($scheduleData);
    
            return redirect()->to(base_url('Management/Marketing/Schedule'))->with('success', 'New schedule added successfully.');
        }
    
        // Load the form view
        $this->commonData(); 
        return $this->renderTheme('ManagementModule\Views\Marketing\Schedule\Add');
    }   

    public function addSubscriber()
    {
        helper('email');
    
        try {
            $rawRequestBody = $this->request->getBody();
            $jsonData = json_decode($rawRequestBody, true);
    
            if (empty($jsonData['email'])) {
                log_message('warning', 'addSubscriber: Missing email in request body.');
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Email is required.',
                ]);
            }
    
            $marketingModel = new \App\Models\MarketingModel();
    
            $subscriberData = [
                'email'      => filter_var($jsonData['email'], FILTER_SANITIZE_EMAIL),
                'category'   => $jsonData['category'] ?? 'General',
                'referral'   => $jsonData['referral'] ?? 'Organic',
                'beta'       => $this->siteSettings->beta,
                'date'       => date('Y-m-d H:i:s'),
                'hostTime'   => date('Y-m-d H:i:s'),
                'time'       => date('H:i:s'),
                'user_id'    => session('user_id') ?? null,
                'user_ip'    => $this->request->getIPAddress()
            ];
    
            if ($marketingModel->addSubscriber($subscriberData)) {
                $emailService = \Config\Services::email();
    
                $emailService->setTo($subscriberData['email']);
                $emailService->setSubject('🎉 Welcome to Investor’s Talk | MyMI Wallet');
                $emailBody = view('emails/welcomeInvestor', [
                    'siteSettings' => $this->siteSettings,
                    'socialMedia'  => config('SocialMedia'),
                    'subscriber'   => $subscriberData,
                ]);
                $emailService->setMessage($emailBody);
                $emailService->setMailType('html');
    
                if ($emailService->send()) {
                    log_message('info', '✅ addSubscriber: Welcome email sent to ' . $subscriberData['email']);
                    return $this->response->setJSON([
                        'success' => true,
                        'message' => 'Subscriber added and welcome email sent.',
                    ]);
                } else {
                    $debug = $emailService->printDebugger(['headers', 'subject', 'body']);
                    $errorString = strip_tags($debug);
                    $errorSummary = strstr($errorString, "The following SMTP error was encountered", true)
                        ?: substr($errorString, 0, 300);
    
                    // Optionally, mark in DB the email failed to deliver
                    $marketingModel->markEmailAsUndeliverable($subscriberData['email'], $errorSummary);
    
                    log_message('error', "❌ addSubscriber: Email failed to send — {$errorSummary}");
    
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'The email could not be delivered. Please check the address and try again.',
                        'error'   => $errorSummary,
                    ]);
                }
            } else {
                log_message('error', '❌ addSubscriber: Failed to insert subscriber.');
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to save subscriber.',
                ]);
            }
        } catch (\Throwable $e) {
            log_message('critical', '❌ addSubscriber exception: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An unexpected error occurred. Please try again later.',
            ]);
        }
    }
    
    // public function addSubscriber()
    // {
    //     helper('email');
    
    //     try {
    //         $rawRequestBody = $this->request->getBody();
    //         $jsonData = json_decode($rawRequestBody, true);
    
    //         if (empty($jsonData['email'])) {
    //             log_message('warning', 'addSubscriber: Missing email in request body.');
    //             return $this->response->setJSON(['success' => false, 'message' => 'Email is required.']);
    //         }
    
    //         $marketingModel = new MarketingModel();
            
    //         $subscriberData = [
    //             'email'      => filter_var($jsonData['email'], FILTER_SANITIZE_EMAIL),
    //             'category'   => $jsonData['category'] ?? 'General',
    //             'referral'   => $jsonData['referral'] ?? 'Organic',
    //             'beta'       => $this->siteSettings->beta,
    //             'date'       => date('Y-m-d H:i:s'),
    //             'hostTime'   => date('Y-m-d H:i:s'),
    //             'time'       => date('H:i:s'),
    //             'user_id'    => session('user_id') ?? null,
    //             'user_ip'    => $this->request->getIPAddress()
    //         ];
    
    //         if ($marketingModel->addSubscriber($subscriberData)) {
    //             $emailService = \Config\Services::email();
    
    //             $emailService->setTo($subscriberData['email']);
    //             $emailService->setSubject('🎉 Welcome to Investor’s Talk | MyMI Wallet');
    //             $emailService->setMessage(view('emails/welcomeInvestor', [
    //                 'siteSettings' => $this->siteSettings,
    //                 'socialMedia'  => config('SocialMedia'),
    //                 'subscriber'   => $subscriberData, // You might want to personalize email with name later
    //             ]));
    //             $emailService->setMailType('html');
    
    //             if ($emailService->send()) {
    //                 log_message('info', '✅ addSubscriber: Welcome email sent successfully to ' . $subscriberData['email']);
    //                 return $this->response->setJSON(['success' => true, 'message' => 'Subscriber added and welcome email sent.']);
    //             } else {
    //                 $error = $emailService->printDebugger(['headers']);
    //                 log_message('error', '❌ addSubscriber: Email sending failed: ' . $error);
    //                 return $this->response->setJSON(['success' => false, 'message' => 'Subscriber added, but email failed to send.']);
    //             }
    //         } else {
    //             log_message('error', '❌ addSubscriber: Failed to add subscriber to database.');
    //             return $this->response->setJSON(['success' => false, 'message' => 'Failed to add subscriber.']);
    //         }
    //     } catch (\Throwable $e) {
    //         log_message('critical', '❌ addSubscriber exception: ' . $e->getMessage());
    //         return $this->response->setJSON(['success' => false, 'message' => 'An unexpected error occurred.']);
    //     }
    // }
    
    // public function addSubscriber() {
    //     helper('email');
    //     $rawRequestBody = $this->request->getBody();
    //     $jsonData = json_decode($rawRequestBody, true);

    //     $marketingModel = new MarketingModel();

    //     $subscriberData = [
    //         'email' => $jsonData['email'],
    //         'category' => $jsonData['category'],
    //         'referral' => $jsonData['referral'],
    //         'beta' => $this->siteSettings->beta,
    //         'date' => date('Y-m-d H:i:s'),
    //         'hostTime' => date('Y-m-d H:i:s'),
    //         'time' => date('H:i:s'),
    //         'user_id' => session('user_id'), // Assuming the user is logged in
    //         'user_ip' => $this->request->getIPAddress()
    //     ];

    //     if ($marketingModel->addSubscriber($subscriberData)) {
    //         $emailService = \Config\Services::email();
    //         $emailService->setTo($subscriberData['email']);
    //         $emailService->setSubject('🎉 Welcome to Investor’s Talk | MyMI Wallet');
    //         $emailService->setMessage(view('emails/welcomeInvestor', [
    //             'siteSettings' => $this->siteSettings,
    //             'socialMedia'  => config('SocialMedia'),
    //         ]));
    //         if ($emailService->send()) {
    //             log_message('info', 'Management/MarketingController L346 - $emailService: ' . print_r($emailService, true)); 
    //             return $this->response->setJSON(['success' => true, 'message' => 'Subscriber email sent successfully']);
    //         } else {
    //             log_message('error', 'Management/MarketingController L346 - Error Submitting: $emailService: ' . print_r($emailService, true)); 
    //             return $this->response->setJSON(['success' => false, 'message' => 'Failed to send Welcome Email']);
    //         }
    //     } else {
    //         return $this->response->setJSON(['success' => false, 'message' => 'Failed to add subscriber']);
    //     }
    // }

    public function approveBufferItem($id)
    {
        $this->marketingModel->updateBufferStatus($id, 'approved');
        return $this->respond(['status' => 'success', 'message' => 'Approved']);
    }
    
    public function approveLogo()
    {
        $symbol = $this->request->getPost('symbol');
        $imageUrl = $this->request->getPost('imageUrl');

        try {
            // Save or update the approved logo in the database
            $this->marketingModel->saveApprovedLogo($symbol, $imageUrl);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Logo approved successfully.',
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Failed to approve logo: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to approve logo.',
            ]);
        }
    }
    
    public function approveAndDownloadLogo()
    {
        $imageUrl = $this->request->getPost('selectedImage');
        $symbol = $this->request->getPost('symbol');

        try {
            // Download the selected image
            $imageContent = file_get_contents($imageUrl);
            $imagePath = WRITEPATH . 'uploads/Company-Logos/' . $symbol . '.png';

            file_put_contents($imagePath, $imageContent);

            // Move to public directory
            $publicPath = FCPATH . 'assets/images/Company-Logos/' . $symbol . '.png';
            rename($imagePath, $publicPath);

            return redirect()->to('/Management/Marketing/upcomingEarnings')->with('success', 'Logo approved and saved successfully.');
        } catch (\Exception $e) {
            log_message('error', 'Failed to download or save logo: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to save the logo.');
        }
    }

    public function approveContent($id) {
        $content = $this->marketingModel->find($id);
    
        if (!$content) {
            return redirect()->back()->with('error', 'Content not found.');
        }
    
        $this->marketingModel->update($id, ['status' => 'approved']);
        return redirect()->back()->with('success', 'Content approved successfully.');
    }
    
    public function blogs() {
        $this->data['pageTitle'] = 'MyMI Blogs | Management | MyMI Wallet';
        // Fetch analytics data
        $this->data['reporting'] = $this->getMyMIAnalytics()->reporting();
        $this->data['blogs'] = $this->marketingModel->getBlogs();
        $this->data['totalBlogs'] = $this->marketingModel->countBlogs(); 

        $this->commonData();
        return $this->renderTheme('ManagementModule\Views\Marketing\Blogs', $this->data);
    }      

    public function bufferDashboard()
    {
        $this->commonData();
        $this->data['pageTitle'] = 'Buffer Content Review | Management | MyMI Wallet';
        $this->data['pendingItems'] = $this->marketingModel->getPendingBufferItems();
        return $this->renderTheme('ManagementModule\Views\Marketing\bufferDashboard', $this->data);
    }

    public function campaigns() {
        $this->data['pageTitle'] = 'Marketing Campaigns | Management | MyMI Wallet';
        // Fetch analytics data
        $this->data['reporting'] = $this->getMyMIAnalytics()->reporting();
        // log_message('debug', 'MarketingController L160 - $this->marketing: ' . (print_r($this->marketing, true))); 
        $this->data['getActiveCampaigns'] = $this->marketing['department']['getActiveCampaigns'];  
        $getDripCampaignInfo = $this->getMyMIMarketing()->getDripCampaignInfo();
        log_message('info', 'Management/MarketingController L563 - $getDripCampaignInfo Array: ' . (print_r($getDripCampaignInfo, true)));
        $this->data['getActiveDripCampaigns'] = $getDripCampaignInfo['dripCampaigns'];  
        $this->data['getActiveDripCampaignSteps'] = $getDripCampaignInfo['dripCampaignSteps'];   
        
        $this->data['getActivePriorityCampaigns'] = $this->marketing['department']['getActivePriorityCampaigns']; 
        $this->commonData();
        return $this->renderTheme('ManagementModule\Views\Marketing\campaigns', $this->data);
    }  

    public function contentGenerator()
    {
        try {
            $this->data['pageTitle'] = 'MyMI Marketing | Management | MyMI Wallet';
            $this->commonData();
            return $this->renderTheme('ManagementModule\Views\Marketing\contentGenerator', $this->data);
        } catch (\Throwable $th) {
            log_message('error', 'MarketingController contentGenerator error: ' . $th->getMessage());
        }
    }

    public function contentReview() {
        // Retrieve the generated content from the session
        $generatedContent = $this->session->get('generatedContent');

        // Ensure content exists; otherwise, redirect back with an error message
        if (empty($generatedContent)) {
            return redirect()->to('/Management/Marketing')->with('error', 'No generated content available for review.');
        }

        // Load the content review view and pass the generated content    
        $this->data['generatedContent'] = $generatedContent;
        $this->commonData();
        return $this->renderTheme('ManagementModule\Views\Marketing\Content_Review', $this->data);
    }

    public function cronAnalyzeContent()
    {
        log_message('debug', '🧠 Starting content digest analysis...');
        $this->getMyMIMarketing()->generateFromTempScraper(5); // e.g., latest 5
        log_message('debug', '✅ Content digest completed.');
    }
    
    public function cronFetchAndStoreEmails()
    {
        try {
            log_message('debug', 'Starting cronFetchAndStoreEmails');
    
            $this->marketingService->scrapeAndStoreEmailsToTemp();
            log_message('debug', 'Finished cronFetchAndStoreEmails');
            return $this->respond(['status' => 'success']);
        } catch (\Throwable $e) {
            log_message('error', 'cronFetchAndStoreEmails Error: ' . $e->getMessage());
            return $this->failServerError($e->getMessage());
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
        $emailsFetched = $this->getMyMIMarketing()->fetchAndStoreEmails('newsletters');
    
        log_message('info', 'CRON: Fetched ' . $emailsFetched . ' marketing emails');
        return $this->respond(['status' => 'success', 'fetched' => $emailsFetched]);
    }    

    public function cronGenerateContentFromTemp()
    {
        try {
            log_message('debug', 'Starting cronGenerateContentFromTemp');
    
            $this->marketingService->generateFinalContentFromTemp();
            log_message('debug', 'Finished cronGenerateContentFromTemp');
            return $this->respond(['status' => 'success']);
        } catch (\Throwable $e) {
            log_message('error', 'cronGenerateContentFromTemp Error: ' . $e->getMessage());
            return $this->failServerError($e->getMessage());
        }
    }    
    
    public function cronSendDailyLog()
    {
        // Set timezone to CST
        date_default_timezone_set('America/Chicago');
    
        // Fetch today's logs or fallback
        $contentData = $this->getLogsOrFallback();
    
        // Generate email content
        $emailView = view('emails/daily_log_summary', [
            'contentData' => $contentData['data'],
            'contentType' => $contentData['type'],
        ]);
    
        // Determine the email type (tracked or fallback)
        $subject = ($contentData['type'] === 'logs') ?
            'Daily Log Summary for ' . date('F j, Y') :
            'Fallback Content - Daily Summary ' . date('F j, Y');
    
        // Send the summary email
        $this->email->setTo('community@mymiwallet.com')
            ->setSubject($subject)
            ->setMessage($emailView)
            ->send();
    
        // Send a reminder email to the team
        $this->email->setTo('team@mymiwallet.com')
            ->setSubject('Reminder: Daily Log Email Pending Confirmation')
            ->setMessage('The daily log email is scheduled to be sent at 3 PM CST. Please review the content to ensure everything is accurate.')
            ->send();
    }
    
    public function edit($id = null) {
        if ($id === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Exchange ID not provided');
        }
    
        // Fetch the token data for the given ID
        $tokenData = $this->marketingModel->getExchangeTokenById($id);
        if (!$tokenData) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Token not found');
        }
    
        // Handle form submission
        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
            $validation->setRules([
                'coin_name'  => 'required',
                'market_cap' => 'required|numeric',
                'website'    => 'required|valid_url',
                'discord'    => 'permit_empty|valid_url',
                'facebook'   => 'permit_empty|valid_url',
                'telegram'   => 'permit_empty|valid_url',
                'twitter'    => 'permit_empty|valid_url',
            ]);
    
            if ($validation->withRequest($this->request)->run()) {
                $updatedData = [
                    'coin_name'  => $this->request->getPost('coin_name'),
                    'market_cap' => $this->request->getPost('market_cap'),
                    'website'    => $this->request->getPost('website'),
                    'discord'    => $this->request->getPost('discord'),
                    'facebook'   => $this->request->getPost('facebook'),
                    'telegram'   => $this->request->getPost('telegram'),
                    'twitter'    => $this->request->getPost('twitter'),
                ];
    
                if ($this->marketingModel->updateExchangeToken($id, $updatedData)) {
                    $this->session->setFlashdata('success', 'Exchange token updated successfully');
                } else {
                    $this->session->setFlashdata('error', 'Failed to update the exchange token');
                }
    
                return redirect()->to(site_url('Management/Marketing/Exchanges/Edit/' . $id));
            } else {
                $this->session->setFlashdata('validation_errors', $validation->getErrors());
            }
        }
    
        // Render the view with the token data
        return $this->renderTheme('ManagementModule\Views\Marketing\Exchanges\edit', [
            'token'       => $tokenData,
            'validation'  => $this->session->getFlashdata('validation_errors'),
            'redirectURL' => site_url('Management/Marketing/Exchanges'),
        ]);
    }

    public function editContent($id) {
        $content = $this->marketingModel->find($id);
    
        if (!$content) {
            return redirect()->back()->with('error', 'Content not found.');
        }
    
        return $this->renderTheme('ManagementModule\Views\Marketing\Content_Edit', ['content' => $content]);
    }

    public function fetchBufferPaginated()
    {
        $page = (int) $this->request->getGet('page') ?: 1;
        $limit = (int) $this->request->getGet('limit') ?: 20;
    
        $data = $this->marketingModel->fetchBufferPaginated($page, $limit);
        return $this->respond($data);
    }

    public function fetchLatestSummaries()
    {
        $generatedSummaries = $this->marketingModel->getLatestGeneratedSummaries(25);
        return $this->renderTheme('ManagementModule\Views\Marketing\resources\generatedSummaries', ['generatedSummaries' => $generatedSummaries]);
    }
    
    public function fetchMissingLogos()
    {
        $postData = $this->request->getJSON(true);
    
        // Validate CSRF token
        $csrfName = csrf_token();
        $csrfHash = csrf_hash();
        if (!isset($postData[$csrfName]) || $postData[$csrfName] !== $csrfHash) {
            log_message('error', 'fetchMissingLogos: CSRF validation failed');
            return $this->response
                ->setHeader('X-CSRF-Token-Name', $csrfName)
                ->setHeader('X-CSRF-Token-Hash', $csrfHash)
                ->setJSON(['error' => 'Invalid CSRF token.']);
        }
    
        $symbols = $postData['symbols'] ?? null;
    
        // Validate symbols
        if (empty($symbols) || !is_array($symbols)) {
            log_message('error', 'fetchMissingLogos: Invalid symbols input');
            return $this->response
                ->setHeader('X-CSRF-Token-Name', $csrfName)
                ->setHeader('X-CSRF-Token-Hash', $csrfHash)
                ->setJSON(['error' => 'Invalid symbols input.']);
        }
    
        $results = [];
        foreach ($symbols as $symbol) {
            // Example: Fetch logo or simulate fetching process
            $results[] = [
                'symbol' => $symbol,
                'status' => 'not_found', // Simulated response
            ];
        }
    
        return $this->response
            ->setHeader('X-CSRF-Token-Name', $csrfName)
            ->setHeader('X-CSRF-Token-Hash', $csrfHash)
            ->setJSON(['results' => $results]);
    }

    public function financialNews()
    {
        $symbols = $this->investmentModel->getAllSymbolsByEarnings();
        $approvedLogos = $this->marketingModel->getApprovedLogos();
    
        // Ensure these variables are defined and passed
        $existingSymbols = array_column($approvedLogos, 'symbol');
        $missingSymbols = array_filter($symbols, function ($symbol) use ($existingSymbols) {
            return !in_array($symbol['symbol'], $existingSymbols);
        });
    
        // log_message('debug', 'financialNews: $approvedLogos = ' . print_r($approvedLogos, true));
        // log_message('debug', 'financialNews: $missingSymbols = ' . print_r($missingSymbols, true));
    
        $this->data['approvedLogos'] = $approvedLogos ?? [];
        $this->data['missingSymbols'] = $missingSymbols ?? [];
        $this->commonData();
    
        return $this->renderTheme('ManagementModule\Views\Marketing\financialNews', $this->data);
    }   
    
    // ***CONTENT GENERATOR***
    public function generateAudio() {
        // Collect input data from the frontend
        $text = $this->request->getPost('text');
        $fileName = $this->request->getPost('fileName') ?: uniqid('tts_', true); // Default to a unique name
        $directory = WRITEPATH . 'uploads/'; // Default directory for uploads
        $outputFile = $directory . $fileName . '.mp3'; // Full path to the output file

        // Validate input
        if (empty($text)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Text cannot be empty.',
            ]);
        }

        // Ensure the directory exists
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true); // Create directory if it doesn't exist
        }

        // Use Python to call gTTS and generate audio
        // Pass additional parameters like filename and directory
        $command = sprintf(
            'python3 gtts_script.py %s %s',
            escapeshellarg($text),
            escapeshellarg($outputFile)
        );
        exec($command, $output, $status);

        // Prepare JSON response
        if ($status === 0 && file_exists($outputFile)) {
            // Generate a URL for the file
            $fileUrl = base_url('uploads/' . basename($outputFile));
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Audio file generated successfully.',
                'file_url' => $fileUrl, // URL for the user to download the file
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to generate audio.',
            ]);
        }
    }

    private function generateAutomatedContent()
    {
        // Fetch recent data from various sources
        $scraperContent = $this->marketingModel->getRecentScrapes();
        $tempContent = $this->marketingModel->getRecentTempScrapes();
        $campaigns = $this->marketingModel->getActiveCampaignsLimited(50);

        // Combine all sources
        $allContent = array_merge($scraperContent, $tempContent, $campaigns);

        // Generate content via MarketingService
        $generatedContent = [];
        foreach ($allContent as $content) {
            $generatedContent[] = $this->getMarketingService()->generateContentFromPost(
                $content->title ?? 'Untitled',
                $content->content ?? '',
                $content->tags ? explode(',', $content->tags) : []
            );
        }

        // Store generated content in `bf_marketing_scraper` as automated logs
        foreach ($generatedContent as $content) {
            $slug = $this->marketingModel->createSlug($content['title']);
        
            $this->db->table('bf_marketing_blog_posts')->insert([
                'title'       => $content['title'] ?? 'Generated Content',
                'content'     => $content['summary'] ?? '',
                'slug'        => $slug,
                'tags'        => implode(',', $content['keywords'] ?? []),
                'created_on'  => date('Y-m-d H:i:s'),
            ]);
        
            // Ensure this is stored in bf_marketing_scraper
            $this->marketingModel->saveDailyLog([
                'title'              => $content['title'],
                'content'            => $content['summary'],
                'type'               => 'Automated',
                'tags'               => implode(',', $content['keywords']),
                'date_time'          => date('Y-m-d H:i:s'),
                'author_information' => 'MyMI Automated System',
                'created_on'         => date('Y-m-d H:i:s'),
            ]);
        }        

        return $generatedContent;
    }

    public function generateContent($platform, $postId) {
        // Fetch the post data
        $post = $this->marketingModel->getSchedulePostById($postId);

        if (!$post) {
            return redirect()->back()->with('error', 'Post not found.');
        }

        // Generate content using the API
        $content = $this->getMyMIMarketing()->generateContentFromGPT($post['subjects'], $post['descriptions'], $platform);

        // Store the generated content
        $contentData = [
            'post_id' => $postId,
            'platform' => $platform,
            'generated_content' => $content,
        ];
        $this->marketingModel->storeGeneratedContent($contentData);

        return redirect()->to("\Management\Marketing\Schedule")->with('success', 'Content generated successfully.');
    }

    public function generateContentDigestFromStored()
    {
        log_message('info', 'Marketing: Starting summary generation from stored marketing emails.');
    
        $model = new MarketingModel();
        $records = $model->getRecentUnprocessedTempEmails(5);
    
        $results = [];
        foreach ($records as $record) {
            if (empty($record['content']) || strlen($record['content']) < 1000) {
                log_message('debug', "⚠️ Skipping record ID {$record['id']} due to insufficient content length.");
                continue;
            }
            
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
    
    public function generateContentFromTweet($tweetId) {
        $tweet = $this->marketingModel->getTweetById($tweetId);

        if (!$tweet) {
            return $this->failNotFound('Tweet not found');
        }

        $generatedContent = $this->getMyMIMarketing()->generateContentFromTweets([$tweet]);

        $this->marketingModel->storeGeneratedContent([
            'tweet_id' => $tweetId,
            'content' => json_encode($generatedContent),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $this->getMyMIMarketing()->postToTwitter($generatedContent['platform_content']['Twitter']);

        return $this->respond(['message' => 'Content generated and posted successfully']);
    }

    public function generateDailyContentDigest()
    {
        log_message('debug', '🧠 Start Memory Usage: ' . memory_get_usage(true));
    
        @ini_set('memory_limit', '768M');
        $limit = 5;    
        $summary = [];
        $rawRecords = $this->marketingModel->getLatestUnprocessedEmails($limit);
        foreach ($rawRecords as $record) {
            $content = $record['content'] ?? '';
            if (empty($content) || strlen($content) < 500) {
                log_message('debug', "⏭️ Skipped record ID {$record['id']} - insufficient content.");
                continue;
            }
            $contentSize = strlen($content);
    
            log_message('debug', '📌 Processing record ID ' . $record['id'] . ' with content size: ' . $contentSize);
            log_message('debug', 'Management/MarketingController L770 - $record Array: ' . print_r($record, true));
    
            if ($contentSize === 0) {
                log_message('debug', "⏭️ Skipped record ID {$record['id']} - empty content.");
                continue;
            }
    
            try {
                gc_collect_cycles(); // clean memory before heavy ops
    
                $processed = $this->getMarketingService()->generateContentFromRaw($record);
    
                if ($processed === null) {
                    log_message('debug', "⚠️ Skipped record ID {$record['id']} - generateContentFromRaw() returned null.");
                    continue;
                }
    
                $this->marketingModel->saveFinalizedMarketingContent($processed);
    
                $summary[] = [
                    'title'          => $processed['headline'],
                    'summary'        => $processed['summary'],
                    'subtopics'      => $processed['subtopics'],
                    'platform_posts' => $processed['posts'],
                ];
    
            } catch (\Throwable $e) {
                log_message('error', "❌ generateDailyContentDigest failed on record ID {$record['id']}: {$e->getMessage()}");
            }
        }
    
        // ✅ Mark processed
        $this->marketingModel->markEmailsAsProcessed(array_column($rawRecords, 'id'));
    
        log_message('debug', '🏁 Peak Memory Usage: ' . memory_get_peak_usage(true));
        return $this->response->setJSON(['digest' => $summary]);
    }
    
    public function generateGroupedContentDrafts()
    {
        $grouped = $this->getMyMIMarketing()->groupSimilarSummariesByCosine();
        $labeled = $this->getMyMIMarketing()->generateGroupLabelsFromTFIDF($grouped['grouped'] ?? []);
        $drafts = $this->getMyMIMarketing()->generateGroupedBlogAndEmailDrafts($labeled);
        $this->data['blogContent'] = $drafts['blog'];
        $this->data['emailContent'] = $drafts['email'];
        $this->data['groupedLabels'] = $labeled;
        return $this->renderTheme('App\Modules\Management\Views\Marketing\resources\groupedContentPreview', $this->data);
    }
    
    public function generateNewsletterContent() {
        $emailContents = $this->marketingModel->getEmailContentsForNewsletter();

        // Generate content
        $content = $this->getMyMIMarketing()->generateNewsletterContent($emailContents);

        // Save the generated content as a draft
        $newsletterData = [
            'title' => 'Monthly Financial Newsletter - ' . date('F Y'),
            'content' => $content,
            'status' => 'draft',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->marketingModel->storeNewsletterDraft($newsletterData);
    
        // Redirect after fetching emails
        return redirect()->to(site_url('Management/Marketing/Content/Listing'))
                         ->with('success', 'Newsletter content generated successfully');
    }

    private function generateSummarizedFallbackContent($contentArray)
    {
        $summarizedContent = [];
        $summarizer = new \App\Libraries\ContentSummarizer();

        foreach ($contentArray as $content) {
            $summarizedContent[] = [
                'title' => $content->title ?? 'Untitled',
                'summary' => $summarizer->summarize($content->content ?? '', 200),
                'url' => $content->url ?? null,
            ];
        }

        return $summarizer->combineSummaries($summarizedContent);
    }
    
    private function getDripCampaigns()
    {
        $model = new \App\Models\DripCampaignModel();
        return $model->orderBy('created_at', 'DESC')->findAll(5); // Show top 5
    }
    
    private function getLogsOrFallback()
    {
        // Fetch today's logs
        $logs = $this->marketingModel->getDailyLogsByDate(date('Y-m-d'));
    
        if (!empty($logs)) {
            return ['type' => 'logs', 'data' => $logs];
        }
    
        // Fallback to generic content
        $scrapedContent = $this->marketingModel->getRecentScrapes();
        $campaigns = $this->marketingModel->getActiveCampaignsLimited(50);
    
        // Merge content from multiple sources
        $combinedContent = array_merge($scrapedContent, $campaigns['result']);
    
        // Summarize and generate fallback content
        $fallbackContent = $this->generateSummarizedFallbackContent($combinedContent);
    
        // Store generated fallback content in `bf_marketing_scraper` for future reference
        foreach ($fallbackContent as $content) {
            $this->marketingModel->saveDailyLog([
                'title' => $content['title'] ?? 'Automated Content',
                'content' => $content['summary'] ?? '',
                'type' => 'Automated',
                'tags' => implode(',', $content['keywords'] ?? []),
                'date_time' => date('Y-m-d H:i:s'),
                'author_information' => 'MyMI Automated System',
                'created_on' => date('Y-m-d H:i:s'),
            ]);
        }
    
        return ['type' => 'fallback', 'data' => $fallbackContent];
    }    

    public function getRecentScrapes() {
        try {
            $scrapes = $this->marketingModel->getRecentScrapes();
            return $this->response->setJSON(['success' => true, 'scrapes' => $scrapes]);
        } catch (\Throwable $th) {
            log_message('error', 'getRecentScrapes: Exception - ' . $th->getMessage());
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to fetch recent scrapes.']);
        }
    }

    private function handleMediaUpload($mediaFiles) {
        $uploadedMedia = [];
        
        foreach ($mediaFiles as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                // Move file to a designated folder, e.g., 'uploads/media/'
                $newFileName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads/media/', $newFileName);
                
                // Save the file info in an array (or a database)
                $uploadedMedia[] = [
                    'file_name' => $file->getClientName(),
                    'file_path' => WRITEPATH . 'uploads/media/' . $newFileName,
                    'file_size' => $file->getSize(),
                    'file_type' => $file->getMimeType(),
                ];
            }
        }
        
        return $uploadedMedia;
    }

    public function ideas() {
        $this->data['pageTitle'] = 'Marketing Campaigns | Management | MyMI Wallet';
        // Fetch analytics data
        $this->data['reporting'] = $this->getMyMIAnalytics()->reporting();
        // log_message('debug', 'MarketingController L160 - $this->marketing: ' . (print_r($this->marketing, true))); 
        // Add $getActiveIdeas to the main $this->data array
        $this->data['getActiveIdeas'] = $this->marketingModel->getActiveIdeas(); // Method to retrieve active ideas

        $this->commonData();
        return $this->renderTheme('ManagementModule\Views\Marketing\ideas', $this->data);
    }  

    public function importScheduleCSV() {
        if ($this->request->getMethod() === 'post') {
            $file = $this->request->getFile('csv_file');
            
            if ($file->isValid() && !$file->hasMoved()) {
                $filePath = WRITEPATH . 'uploads/' . $file->store();
                $csvData = array_map('str_getcsv', file($filePath));

                // Assume the CSV structure is: ['date', 'time', 'activity', 'campaign_title', 'platform', ...]
                foreach ($csvData as $row) {
                    $scheduleData = [
                        'day' => $row[0],
                        'time' => $row[1],
                        'activity' => $row[2],
                    ];

                    $scheduleId = $this->marketingModel->addMarketingSchedule($scheduleData);

                    // Add related marketing campaigns
                    $campaignData = [
                        'sched_id' => $scheduleId,
                        'title' => $row[3],
                        'platform' => $row[4],
                        'content' => $row[5],
                    ];
                    $this->marketingModel->addMarketingCampaign($campaignData);
                }

                return redirect()->back()->with('success', 'Schedule and campaigns imported successfully.');
            }

            return redirect()->back()->with('error', 'Invalid CSV file.');
        }

        return $this->renderTheme('ManagementModule\Views\Marketing\importCSV');
    }
    
    public function keywords()
    {
        helper(['text', 'date']);
    
        $reporting = [];
        $reporting['topKeywords'] = $this->marketingModel->getTopKeywordsWithStats();
        $reporting['totalKeywordsTracked'] = count($reporting['topKeywords']);
    
        $this->data['reporting'] = $reporting;
        $this->data['siteSettings'] = new \App\Config\SiteSettings();
    
        return $this->renderTheme('ManagementModule\Views\Marketing\Keywords\keywords', $this->data);
    }
    
    
    public function previewBufferItem($id)
    {
        $record = $this->marketingModel->findBufferItem($id);
        if (!$record) return $this->failNotFound("Item not found.");
        return $this->renderTheme('ManagementModule\Views\Marketing\modals\bufferPreview', ['item' => $record]);
    }

    public function previewGeneratedPost($postId)
    {
        log_message('debug', "🛰️ previewGeneratedPost() [direct call] - ID: {$postId}");
    
        $post = $this->marketingModel->findFinalizedById($postId);
    
        if (!$post) {
            log_message('error', "❌ previewGeneratedPost(): Post not found for ID: {$postId}");
            return $this->renderTheme('ManagementModule\Views\Errors\CannotLoadPage', [
                'message' => 'Generated Post not found.',
            ]);
        }
    
        log_message('debug', '📦 Loaded post data: ' . print_r($post, true));
    
        $post['title']     = $this->getMyMIMarketing()->cleanTitle($post['title'] ?? 'Untitled');
        $post['cta']       = $this->getMyMIMarketing()->generateCTA($post['summary'] ?? '');
        $post['voiceover'] = $post['voice_script'] ?? null;
    
        $cleanedSummary = $this->getMyMIMarketing()->cleanHtmlSummaryPreview($post['summary'] ?? '');
        $sentences      = $this->getMyMIMarketing()->splitIntoSentences($cleanedSummary);
        $keywords       = $this->getMyMIMarketing()->extractKeywords($sentences);
        $posts          = json_decode($post['platforms'] ?? '{}', true);
    
        log_message('debug', '🧼 Cleaned summary length: ' . strlen($cleanedSummary));
        log_message('debug', '📈 Keywords: ' . json_encode($keywords));
        log_message('debug', '🔄 Platforms: ' . json_encode($posts));
    
        $this->data = [
            'post'           => $post,
            'summary'        => $post,
            'cleaned_summary'=> $cleanedSummary,
            'keywords'       => $keywords,
            'posts'          => $posts,
            'voiceover_url'  => $post['voiceover_url'] ?? null,
        ];
    
        log_message('debug', '🎯 previewGeneratedPost: Data prepared for view: ' . (print_r($this->data,true)));
        
        $mode = $this->request->getGet('mode');
        if ($mode === 'insight') {
            log_message('debug', "🧠 Returning insightPreview view for post ID: {$postId}");
            return $this->renderTheme('ManagementModule\Views\Marketing\resources\modals\insightPreview', $this->data);
        }
    
        log_message('debug', "🎯 Returning full previewGeneratedPost view for post ID: {$postId}");
        return $this->renderTheme('ManagementModule\Views\Marketing\modals\previewGeneratedPost', $this->data);
    }    
    
    public function previewPendingSummaries()
    {
        try {
            $pendingSummaries = $this->marketingModel->getPendingScraperSummaries(10);
            return $this->renderTheme('App\Modules\Management\Views\Marketing\partials\previewPendingSummaries', [
                'pendingSummaries' => $pendingSummaries
            ]);
        } catch (\Throwable $e) {
            log_message('error', '❌ previewPendingSummaries failed: ' . $e->getMessage());
            return $this->failServerError('Could not load summaries.');
        }
    }
    
    public function previewVideoScript($id)
    {
        $post = $this->marketingModel->getGeneratedPostById($id);
        if (!$post) return $this->failNotFound('Post not found.');
    
        $posts = json_decode($post['posts'], true);
        $videoScript = $posts['video'] ?? 'No video script generated yet.';
    
        return $this->renderTheme('MarketingModule\Views\Marketing\modals\video_preview_modal', [
            'title' => $post['title'],
            'videoScript' => $videoScript,
        ]);
    }
    
    public function processScheduledPosts()
    {
        $currentTimestamp = date('Y-m-d H:i:s');
        $scheduledPosts = $this->marketingModel->getPendingScheduledPosts($currentTimestamp);

        foreach ($scheduledPosts as $post) {
            $payload = [
                'platform' => $post->platform,
                'content' => $post->content,
                'media_url' => $post->media_url,
            ];

            try {
                $response = $this->sendToZapier($post->zapier_webhook_url, $payload);

                if ($response->getStatusCode() === 200) {
                    $this->marketingModel->updatePostStatus($post->id, 'posted');
                } else {
                    throw new Exception("Zapier response error: {$response->getBody()}");
                }
            } catch (Exception $e) {
                $this->handlePostFailure($post, $e->getMessage());
            }
        }
    }

    private function sendToZapier($webhookUrl, $payload)
    {
        $client = new \GuzzleHttp\Client();
        return $client->post($webhookUrl, [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => $payload,
        ]);
    }

    private function handlePostFailure($post, $error)
    {
        $this->marketingModel->incrementRetryCount($post->id);
        log_message('error', "Failed to post to Zapier for Post ID {$post->id}: {$error}");

        if ($post->retry_count >= 3) {
            $this->marketingModel->updatePostStatus($post->id, 'failed');
        }
    }

    public function postCreator()
    {
        try {
            $this->data['pageTitle'] = 'MyMI Marketing | Management | MyMI Wallet';
            $this->commonData();
            return $this->renderTheme('ManagementModule\Views\Marketing\index', $this->data);
        } catch (\Throwable $th) {
            log_message('error', 'MarketingController postCreator error: ' . $th->getMessage());
        }
    }

    public function promote() {
        $this->data['pageTitle'] = 'MyMI Marketing | Management | MyMI Wallet';
        $this->data['exchangeAssets'] = []; 
        $this->data['useSummernote'] = true;
        $this->commonData();
        return $this->renderTheme('ManagementModule\Views\Marketing\Promote', $this->data);
    }  
    
    public function publishBlog($blogId) {
        $blog = $this->marketingModel->getBlogPostDetails($blogId);
        if (!$blog) {
            return redirect()->back()->with('error', 'Blog post not found.');
        }

        // Update status to published
        $this->marketingModel->update($blogId, ['status' => 'published']);
        return redirect()->to('/Management/Marketing/Blogs')->with('success', 'Blog published successfully.');
    }
    
    public function rejectBufferItem($id)
    {
        $this->marketingModel->updateBufferStatus($id, 'rejected');
        return $this->respond(['status' => 'success', 'message' => 'Rejected']);
    }

    public function rejectContent($id) {
        $content = $this->marketingModel->find($id);
    
        if (!$content) {
            return redirect()->back()->with('error', 'Content not found.');
        }
    
        $this->marketingModel->update($id, ['status' => 'rejected']);
        return redirect()->back()->with('success', 'Content rejected successfully.');
    }
    
    public function reviewBuffer()
    {
        $buffer = $this->marketingModel->getBufferItems(); // You'll implement this method next
        $this->data['pageTitle'] = 'Marketing Buffer Dashboard';
        $this->data['buffer'] = $buffer;
        return $this->renderTheme('ManagementModule\Views\Marketing\BufferDashboard', $this->data);
    }
    
    public function runContentGeneration()
    {
        // Generate the content
        $generatedContent = $this->generateAutomatedContent();
    
        // Store the generated content temporarily in the session or database for review
        $this->session->set('generatedContent', $generatedContent);
    
        // Redirect to the content review page
        return redirect()->to('/Management/Marketing/ContentReview')->with('success', count($generatedContent) . ' content items generated successfully. Please review and approve.');
    }    
    
    private function sanitizeContent($content) {
        $content = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $content);
        $content = preg_replace('#<style(.*?)>(.*?)</style>#is', '', $content);
        $content = strip_tags($content);
        $content = preg_replace('/\s+/', ' ', $content);
        return trim($content);
    }
    
    private function saveCampaign($formData) {
        
        // Prepare the data
        $data = [
            'title' => $formData['title'],
            'description' => $formData['description'],
            // Add other fields
        ];
        
        // Save the campaign
        $this->marketingModel->addMarketingCampaign($data);
    }
    
    public function saveContentEdit($id) {
        $postData = $this->request->getPost();
    
        $content = $this->marketingModel->find($id);
    
        if (!$content) {
            return redirect()->back()->with('error', 'Content not found.');
        }
    
        $this->marketingModel->update($id, [
            'content' => $postData['content'],
            'status' => 'pending',
        ]);
    
        return redirect()->to('/Management/Marketing/ContentReview')->with('success', 'Content updated successfully.');
    }

    private function saveSchedule($formData) {
        // Create a model for saving the schedule to the database
        $scheduleModel = new \App\Models\ScheduleModel();
        
        // Prepare the data
        $data = [
            'title' => $formData['title'],
            'description' => $formData['description'],
            // Add other fields
        ];
        
        // Save the schedule
        $scheduleModel->insert($data);
    }

    public function schedule($day = null) {
        if (!empty($day)) {
            $this->data['marketingSchedule'] = $this->marketingModel->getScheduleByDay($day);
            foreach ($this->data['marketingSchedule'] as &$schedule) {
                $schedule['campaigns'] = $this->marketingModel->getCampaignsBySchedId($schedule['id']);
            }
            $this->data['scheduleByDay'] = 'Yes';
        } else {
            $this->data['marketingSchedule'] = $this->marketingModel->getUpcomingSchedule();
            foreach ($this->data['marketingSchedule'] as &$schedule) {
                $schedule['campaigns'] = $this->marketingModel->getCampaignsBySchedId($schedule['id']);
            }
            $this->data['scheduleByDay'] = 'No';
        }
    
        $this->commonData();
        $this->data['pageTitle'] = 'Daily Schedule | Management | MyMI Wallet';    
        return $this->renderTheme('ManagementModule\Views\Marketing\Schedule', $this->data);
    }

    public function scheduleNewsletterCampaign() {
        $newsletterDraft = $this->marketingModel->getLatestNewsletterDraft();

        if (!$newsletterDraft) {
            return $this->response->setJSON(['success' => false, 'message' => 'No newsletter draft found']);
        }

        $campaignData = [
            'title' => $newsletterDraft['title'],
            'content' => $newsletterDraft['content'],
            'status' => 'scheduled',
            'send_date' => $this->request->getPost('send_date'),
            'target_audience' => 'all_users',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($this->marketingModel->scheduleNewsletterCampaign($campaignData)) {
            // Redirect after successfully scheduling the newsletter
            return redirect()->to(site_url('Management/Marketing/Content/Listing'))
                             ->with('success', 'Newsletter campaign scheduled successfully');
        } else {
            // Redirect back to the previous page with an error message
            return redirect()->back()->with('error', 'Failed to schedule newsletter campaign');
        }
    }

    private function scrapeGoogleSearch($query) {
        $searchUrl = 'https://www.google.com/search?q=' . urlencode($query);
        $client = new Client();
        try {
            $response = $client->get($searchUrl);
            if ($response->getStatusCode() == 200) {
                $html = $response->getBody()->getContents();
                $dom = new \DOMDocument();
                libxml_use_internal_errors(true);
                $dom->loadHTML($html);
                libxml_clear_errors();
                $xpath = new \DOMXPath($dom);
                $results = [];
                foreach ($xpath->query('//a[@href]') as $link) {
                    $href = $link->getAttribute('href');
                    if (strpos($href, '/url?q=') === 0) {
                        $href = substr($href, 7, strpos($href, '&') - 7);
                        $text = $link->nodeValue;
                        $results[] = ['href' => $href, 'text' => $text];
                    }
                }
                return $results;
            } else {
                log_message('error', 'scrapeGoogleSearch: Could not retrieve content, HTTP status code - ' . $response->getStatusCode());
                return ['error' => 'Could not retrieve content, HTTP status code - ' . $response->getStatusCode()];
            }
        } catch (RequestException $e) {
            log_message('error', 'scrapeGoogleSearch: RequestException - ' . $e->getMessage());
            return ['error' => 'RequestException error: ' . $e->getMessage()];
        } catch (\Exception $e) {
            log_message('error', 'scrapeGoogleSearch: General error - ' . $e->getMessage());
            return ['error' => 'General error: ' . $e->getMessage()];
        }
        return [];
    }

    public function scrapeLink() {
        $rawRequestBody = $this->request->getBody();
        $jsonData = json_decode($rawRequestBody, true);
        $url = $jsonData['url'] ?? null;

        if (!$url) {
            log_message('error', 'scrapeLink: URL is missing');
            return $this->response->setJSON(['success' => false, 'message' => 'URL is required.']);
        }

        try {
            log_message('debug', 'scrapeLink: Scraping URL - ' . $url);
            $scrapedData = $this->scrapeWebsiteWithFallback($url);

            if (isset($scrapedData['error'])) {
                log_message('error', 'scrapeLink: ' . $scrapedData['error']);
                return $this->response->setJSON(['success' => true, 'message' => 'Partially scraped data, proceeding with available data.']);
            }

            if (!empty($scrapedData['content'])) {
                $this->marketingModel->storeTempScrapedData([
                    'status' => 'In Review',
                    'type' => 'Website Link',
                    'title' => $scrapedData['title'],
                    'content' => $scrapedData['content'],
                    'links' => json_encode($scrapedData['links']),
                    'url' => $scrapedData['url'],
                    'scraped_at' => date('Y-m-d H:i:s'),
                    'modified_on' => date('Y-m-d H:i:s'),
                ]);

                return $this->response->setJSON(['success' => true, 'message' => 'Scraped data stored successfully.', 'data' => $scrapedData]);
            } else {
                log_message('error', 'scrapeLink: Scraped data is empty');
                return $this->response->setJSON(['success' => false, 'message' => 'Scraping failed. Please check the URL and try again.']);
            }
        } catch (\Throwable $th) {
            log_message('error', 'scrapeLink: Exception - ' . $th->getMessage());
            return $this->response->setJSON(['success' => false, 'message' => 'An error occurred during scraping.']);
        }
    }

    private function scrapeLinks($links) {
        $scrapedLinksData = [];
        foreach ($links as $link) {
            $url = filter_var($link['href'], FILTER_SANITIZE_URL);
            if (filter_var($url, FILTER_VALIDATE_URL)) {
                $scrapedData = $this->scrapeWebsite($url);
                if (!empty($scrapedData['content'])) {
                    $scrapedLinksData[] = $scrapedData;
                }
            }
        }
        return $scrapedLinksData;
    }

    private function scrapeWebsite($url) {
        $client = new Client();
        try {
            $response = $client->get($url, [
                'stream' => true,
                'headers' => [
                    'User-Agent' => 'MyMI Wallet Bot'
                ],
                'timeout' => 10, // optional: protect against hanging requests
                'http_errors' => false // prevents throwing exceptions on non-2xx responses
            ]);
            
            if ($response->getStatusCode() == 200) {
                $html = $response->getBody()->getContents();
                $dom = HtmlDomParser::str_get_html($html);
                if ($dom instanceof \voku\helper\HtmlDomParser) {
                    $title = $dom->find('title', 0)->text ?? 'No title found';
                    $bodyNode = $dom->find('body', 0);
                    $bodyContent = $bodyNode ? $this->sanitizeContent($bodyNode->innerHtml()) : 'No body content found';
                    $links = [];
                    foreach ($dom->find('a') as $link) {
                        $href = $link->getAttribute('href');
                        $text = $link->text;
                        $links[] = ['href' => $href, 'text' => $text];
                    }
                    log_message('debug', 'scrapeWebsite: Scraping successful for URL - ' . $url);
                    return [
                        'title' => $title,
                        'content' => $bodyContent,
                        'links' => $links,
                        'url' => $url
                    ];
                } else {
                    log_message('error', 'scrapeWebsite: DOM parsing failed for URL - ' . $url);
                    return ['error' => 'DOM parsing failed.'];
                }
            } else {
                log_message('error', 'scrapeWebsite: Could not retrieve content, HTTP status code - ' . $response->getStatusCode());
                return ['error' => 'Could not retrieve content, HTTP status code - ' . $response->getStatusCode()];
            }
        } catch (RequestException $e) {
            if ($e->hasResponse() && $e->getResponse()->getStatusCode() == 401) {
                log_message('error', 'scrapeWebsite: Unauthorized access for URL - ' . $url);
                return ['error' => 'Unauthorized access. Skipping URL.'];
            }
            log_message('error', 'scrapeWebsite: RequestException - ' . $e->getMessage());
            return ['error' => 'RequestException error: ' . $e->getMessage()];
        } catch (\Exception $e) {
            log_message('error', 'scrapeWebsite: General error - ' . $e->getMessage());
            return ['error' => 'General error: ' . $e->getMessage()];
        }
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

    public function searchAndApproveLogo($symbol)
    {
        $query = $symbol . ' logo png transparent';
        $searchUrl = 'https://www.google.com/search?q=' . urlencode($query) . '&tbm=isch';

        try {
            $response = $this->client->request('GET', $searchUrl);
            $htmlContent = $response->getBody()->getContents();

            // Use DOMDocument or other parsing methods to extract image URLs
            $dom = new \DOMDocument();
            @$dom->loadHTML($htmlContent);

            $xpath = new \DOMXPath($dom);
            $imageNodes = $xpath->query('//img');

            $imageUrls = [];
            foreach ($imageNodes as $imageNode) {
                $src = $imageNode->getAttribute('src');
                if ($src) {
                    $imageUrls[] = $src;
                }
            }

            // Pass image URLs to the view for approval
            return $this->renderTheme('ManagementModule\Views\Marketing\approve_logo', [
                'symbol' => $symbol,
                'imageUrls' => $imageUrls,
            ]);
        } catch (RequestException $e) {
            log_message('error', 'Google Search Request Failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to fetch logo suggestions.');
        }
    }

    public function sendScheduledNewsletter() {
        $campaigns = $this->marketingModel->getScheduledCampaigns();

        foreach ($campaigns as $campaign) {
            // Send the newsletter
            $this->getMyMIMarketing()->sendNewsletter($campaign['content'], $campaign['target_audience']);

            // Update the campaign status to 'sent'
            $this->marketingModel->updateCampaignStatus($campaign['id'], 'sent');
        }
        // Redirect after fetching emails
        return redirect()->to(site_url('Management/Marketing/Content/Listing'))
                         ->with('success', 'Scheduled newsletters sent successfully');
    }

    public function standaloneAddSubscriber() {
        $this->data['pageTitle'] = 'Add Subscriber | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('ManagementModule\Views\Marketing\resources\standaloneAddSubscriber', $this->data);
    }

    public function standaloneScrape() {
        $this->data['pageTitle'] = 'Quick Scraper | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('ManagementModule\Views\Marketing\resources\standaloneScraper', $this->data);
    }

    private function storeScrapedData($scrapedData) {
        $db = \Config\Database::connect();
        $builder = $db->table('bf_marketing_temp_scraper');
        $data = [
            'title' => $scrapedData['title'],
            'content' => $scrapedData['content'],
            'links' => json_encode($scrapedData['links']),
            'url' => $scrapedData['url'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $builder->insert($data);
    }

    public function submitContent() {
        $request = service('request');

        // Validate the form input
        $validationRules = [
            'campaignName' => 'required|min_length[3]',
            'promotionalLinks' => 'required',
            'facebookMessage' => 'required',
            'linkedinMessage' => 'required',
            'discordMessage' => 'required',
            'stockTwitsMessage' => 'required',
            'tiktokMessage' => 'required',
            'youtubeMessage' => 'required',
            'emailMessage' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
        }

        // Retrieve input data
        $campaignData = [
            'name' => $request->getPost('campaignName'),
            'promotional_links' => json_encode($request->getPost('promotionalLinks')),  // Storing as JSON
            'facebook_message' => $request->getPost('facebookMessage'),
            'linkedin_message' => $request->getPost('linkedinMessage'),
            'discord_message' => $request->getPost('discordMessage'),
            'stocktwits_message' => $request->getPost('stockTwitsMessage'),
            'tiktok_message' => $request->getPost('tiktokMessage'),
            'youtube_message' => $request->getPost('youtubeMessage'),
            'email_message' => $request->getPost('emailMessage'),
            'additional_info' => $request->getPost('additionalInfo'),
            'created_on' => date('Y-m-d H:i:s'),
            'status' => 1,  // Default active status
            'stage' => 'draft',  // Default stage
        ];

        // Save data to the database
        $marketingModel = new MarketingModel();
        if ($marketingModel->insert($campaignData)) {
            return redirect()->to('/Marketing/Success')->with('success', 'Marketing content submitted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to submit marketing content.')->withInput();
        }
    } 

    public function submitDailyLog()
    {
        $data = [
            'title' => $this->request->getPost('subject'),
            'content' => $this->request->getPost('log_content'),
            'subcontent' => json_encode($this->request->getPost('subcontent')),
            'tags' => $this->request->getPost('tags'),
            'type' => $this->request->getPost('content_type'),
            'url' => $this->request->getPost('url'),
            'author_information' => $this->request->getPost('author_information'),
            'date_time' => $this->request->getPost('date_time'),
            'trade_alert_subcategory' => $this->request->getPost('trade_alert_subcategory'), // New Field
            'created_on' => date('Y-m-d H:i:s'),
        ];
    
        if ($this->marketingModel->saveDailyLog($data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Daily log submitted successfully!']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to submit daily log.']);
        }
    }    

    public function submitLargeContent() {
        log_message('debug', 'submitLargeContent method called');
        try {
            $subject = $this->request->getPost('subject');
            $url = $this->request->getPost('url');
            $content = $this->request->getPost('large_content');
            $tags = $this->request->getPost('tags');
            $uploadedFiles = $this->request->getFiles();
            $contentType = $this->request->getPost('content_type');
    
            // Handle media upload
            $mediaAssets = $this->handleMediaUpload($uploadedFiles['media_assets']);
    
            // Check if content is non-empty and properly formatted
            if (empty($content) || strlen($content) < 50) {
                throw new \Exception('Content too short or empty');
            }
    
            // Generate content from large text
            $generatedContent = $this->getMyMIMarketing()->generateContentFromLargeText($content, $tags);
    
            // Ensure 'keywords' is always an array// Ensure 'keywords' is always an array
            $keywords = is_array($generatedContent['keywords']) ? $generatedContent['keywords'] : [];
            
            // Store scraped content in the database
            $this->marketingModel->storeScrapedContent([
                'status' => 'pending',
                'type' => $contentType,
                'url' => $url,
                'title' => $subject,
                'summary' => $generatedContent['summary'],
                'content' => $content,
                'keywords' => implode(', ', $keywords), // Always pass an array to implode
                'created_on' => date('Y-m-d H:i:s'),
            ]);
    
            return $this->response->setJSON(['success' => true]);
        } catch (\Exception $e) {
            log_message('error', 'submitLargeContent error: ' . $e->getMessage());
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to submit content.']);
        }
    } 

    public function submitLargeContentForm() {
        $this->data['pageTitle'] = 'MyMI Marketing | Management | MyMI Wallet';
        $this->commonData();
        $this->renderTheme('ManagementModule\Views\Marketing\resources\standaloneLargeContentForm', $this->data);
    }
    
    public function submitMarketingCampaign() {
        helper(['form', 'url']);
        
        // Capture and sanitize input
        $data = [
            'name' => $this->request->getPost('campaignName'),
            'assigned_to' => $this->request->getPost('assigned_to'),
            'promotional_links' => json_encode($this->request->getPost('promotionalLinks')),
            'facebook_message' => htmlentities($this->request->getPost('facebookMessage'), ENT_QUOTES, 'UTF-8'),
            'linkedin_message' => htmlentities($this->request->getPost('linkedinMessage'), ENT_QUOTES, 'UTF-8'),
            'discord_message' => htmlentities($this->request->getPost('discordMessage'), ENT_QUOTES, 'UTF-8'),
            'stocktwits_message' => htmlentities($this->request->getPost('stocktwitsMessage'), ENT_QUOTES, 'UTF-8'),
            'tiktok_message' => htmlentities($this->request->getPost('tiktokMessage'), ENT_QUOTES, 'UTF-8'),
            'youtube_message' => htmlentities($this->request->getPost('youtubeMessage'), ENT_QUOTES, 'UTF-8'),
            'email_message' => htmlentities($this->request->getPost('emailMessage'), ENT_QUOTES, 'UTF-8'),
            'additional_info' => htmlentities($this->request->getPost('additionalInfo'), ENT_QUOTES, 'UTF-8'),
            'overall_campaign_description' => htmlentities($this->request->getPost('overall_campaign_description'), ENT_QUOTES, 'UTF-8'),
            'voice_script' => htmlentities($this->request->getPost('voice_script'), ENT_QUOTES, 'UTF-8')
        ];

        // Validate the data
        if ($this->validate([
            'name' => 'required',
            'facebook_message' => 'required',
            // Add other validation rules as needed
        ])) {
            // Save data to the database using the model's method
            $this->marketingModel->submitCampaignContent($data);
            return redirect()->to('/dashboard')->with('success', 'Campaign submitted successfully.');
        } else {
            // Redirect back with input and errors if validation fails
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function submitMarketIdeas() {
        if ($this->request->getMethod() === 'post') {
            $data = [
                'title' => $this->request->getPost('title'),
                'description' => htmlentities($this->request->getPost('description'), ENT_QUOTES, 'UTF-8'),
                'created_by' => session()->get('user_id'), // Assuming the user ID is stored in the session
                'assigned_to' => $this->request->getPost('assigned_to'),
                'priority' => $this->request->getPost('priority'),
                'status' => 'draft', // Initial status
                'platforms' => json_encode($this->request->getPost('platforms')),
                'additional_info' => htmlentities($this->request->getPost('additional_info'), ENT_QUOTES, 'UTF-8'),
            ];
    
            // Handle image uploads
            $uploadedFiles = $this->request->getFiles();
            $filePaths = [];
    
            if ($uploadedFiles && isset($uploadedFiles['imageFiles'])) {
                foreach ($uploadedFiles['imageFiles'] as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $newName = $file->getRandomName();
                        $file->move(FCPATH . 'public/assets/images/Marketing/Ideas', $newName);
                        $filePaths[] = base_url('assets/images/Marketing/Ideas/' . $newName);
                    }
                }
            }
    
            // Store file paths as a JSON array in the database
            if (!empty($filePaths)) {
                $data['image_paths'] = json_encode($filePaths);
            }
    
            // Validate and submit data
            if ($this->validate([
                'title' => 'required',
                'description' => 'required'
            ])) {
                $this->marketingModel->submitIdea($data);
                return redirect()->back()->with('success', 'Idea submitted successfully.');
            } else {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        }
    }

    public function topCommunities($channel = null) {
        $this->commonData(); // Call this to populate $this->data
    
        $MyMIExchange = new MyMIExchange(); 
        $exchangeTokens = $MyMIExchange->getSolanaTokens();
        
        if (!empty($channel)) {
            if ($channel === 'Discord') {
                $this->data['tokens'] = $exchangeTokens['discord'];
                $this->data['pageTitle'] = 'Discord Communities';
                $this->renderTheme('ManagementModule\Views\Marketing\Exchanges\includes\discord', $this->data);
            } elseif ($channel === 'Facebook') {
                $this->data['tokens'] = $exchangeTokens['facebook'];
                $this->data['pageTitle'] = 'Facebook Communities';
                $this->renderTheme('ManagementModule\Views\Marketing\Exchanges\includes\facebook', $this->data);
            } elseif ($channel === 'Twitter') {
                $this->data['tokens'] = $exchangeTokens['x_twitter'];
                $this->data['pageTitle'] = 'Twitter Communities';
                $this->renderTheme('ManagementModule\Views\Marketing\Exchanges\includes\twitter', $this->data);
            } elseif ($channel === 'Website') {
                $this->data['tokens'] = $exchangeTokens['website'];
                $this->data['pageTitle'] = 'Website Communities';
                $this->renderTheme('ManagementModule\Views\Marketing\Exchanges\includes\website', $this->data);
            } else {
                // Default to 'all' if the channel is not recognized
                $this->data['tokens'] = $exchangeTokens['all'];
                $this->data['pageTitle'] = 'All Communities';
                $this->renderTheme('ManagementModule\Views\Marketing\Exchanges\includes\all_tokens', $this->data);
            }
        } else {
            // If no channel is specified, show all tokens
            $this->data['tokens'] = $exchangeTokens['all'];
            $this->data['pageTitle'] = 'All Communities';
            $this->renderTheme('ManagementModule\Views\Marketing\Exchanges\includes\all_tokens', $this->data);
        }
    }

    public function triggerPostAutogenOnEmpty()
    {
        $today = date('Y-m-d');
        $existing = $this->marketingModel->getLatestGeneratedSummaries(5, $today);
    
        if (!empty($existing)) {
            return $this->response->setJSON(['status' => 'skipped', 'message' => 'Summaries already exist for today.']);
        }
    
        try {
            $this->getMyMIMarketing()->generateFromTempScraper(5);
            return $this->response->setJSON(['status' => 'generated', 'message' => 'Generated new summaries.']);
        } catch (\Throwable $e) {
            log_message('error', 'triggerPostAutogenOnEmpty error: ' . $e->getMessage());
            return $this->failServerError('Failed to generate summaries.');
        }
    }
    
    public function twitterDashboard() {
        $data = [
            'pageTitle' => 'Twitter Dashboard',
            'hashtags' => $this->request->getPost('hashtags') ?? '',
            'tweets' => []
        ];

        if ($this->request->getMethod() === 'post') {
            $hashtags = $this->request->getPost('hashtags');
            $tweets = $this->getMyMIMarketing()->fetchTweets($hashtags);
            $data['tweets'] = $tweets;
        }

        return $this->renderTheme('Management/Marketing/Twitter', $data);
    }

    public function upcomingEarnings()
    {
        // Fetch upcoming earnings from a model (assuming you have a model for this)
        $model = new \App\Models\EarningsModel();
        $upcomingEarnings = $model->getUpcomingEarnings(); // Fetch upcoming earnings

        // Prepare data for the view
        $this->data['upcomingEarnings'] = $upcomingEarnings;

        return $this->renderTheme('ManagementModule\Views\Marketing\upcoming_earnings', $this->data);
    }

    public function updatePlatformToggle($id)
    {
        $post = $this->request->getJSON(true);
        $platform = $post['platform'];
        $enabled = (bool) $post['enabled'];
    
        $record = $this->marketingModel->getBufferItem($id);
        $platforms = json_decode($record['platforms'] ?? '{}', true);
    
        $platforms[$platform] = $enabled;
    
        $this->marketingModel->updateBufferItem($id, ['platforms' => json_encode($platforms)]);
    
        return $this->respond(['status' => 'success']);
    }
    
    public function viewBlog($slug)
    {
        $blogPost = $this->marketingModel->getBlogPostBySlug($slug);
    
        if (!$blogPost) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Blog post not found');
        }
    
        return $this->renderTheme('blog/view', ['blogPost' => $blogPost]);
    }
    
    public function viewCampaign($campaign_id) {
        $campaignModel = new CampaignModel();
        $campaign = $this->marketingModel->getCampaignsById($campaign_id);

        if (!$campaign) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Campaign not found");
        }

        return $this->renderTheme('ManagementModule\Views\Marketing\Campaigns\View', ['campaign' => $campaign]);
    }     
    
    public function viewDailyLogs($date = null)
    {
        $date = $this->siteSettings->date ?? date('Y-m-d');

        $this->data['pageTitle'] = 'Marketing Daily Log | ' . $date . ' | MyMI Wallet';
        // Fetch analytics data
        $this->data['reporting'] = $this->getMyMIAnalytics()->reporting();
        $this->data['logs'] = $this->marketingModel->getDailyLogsByDate($date);
        $this->commonData();
        return $this->renderTheme('ManagementModul\Views\Marketing\Daily_Logs', ['logs' => $logs, 'date' => $date]);
    }

    public function viewEmail($titleEncoded = null, $messageId = null)
    {
        log_message('debug', '📧 ManagementController::viewEmail called');
    
        try {
            if (empty($messageId)) {
                return redirect()->back()->with('error', 'Invalid email identifier.');
            }
    
            $emailRecord = $this->marketingModel->getEmailByMessageId($messageId);
    
            if (!$emailRecord) {
                return redirect()->back()->with('error', 'Email not found.');
            }
    
            $socialMediaPosts = $this->getMarketingService()->generateContentFromRaw($emailRecord);
            $emailRecord['social_media'] = $socialMediaPosts['posts'] ?? [];
    
            return $this->renderTheme('Management/Marketing/EmailDetail', [
                'email' => $emailRecord
            ]);
        } catch (\Throwable $e) {
            log_message('error', '❌ viewEmail() failed: ' . $e->getMessage());
            return $this->failServerError('Unable to load email.');
        }
    }
    
    public function viewGeneratedContent() {
        $contentData = $this->marketingModel->getLastGeneratedContent();  // Get last generated content
        $platformsContent = json_decode($contentData['platforms_content'], true);  // Decode the JSON
    
        $this->data['pageTitle'] = 'MyMI Marketing | Management | MyMI Wallet';
        $this->data['platforms_content'] = $platformsContent;
        $this->commonData();
        $this->renderTheme('ManagementModule\Views\Marketing\resources\standaloneGeneratedContent', $this->data);
    }   

    public function viewGeneratedSummaries()
    {
        $this->data['pageTitle'] = 'Generated Summaries';
        $this->data['generatedSummaries'] = $this->marketingModel->getLatestGeneratedSummaries(25);
        $this->renderTheme('ManagementModule\Views\Marketing\resources\generatedSummaries', $this->data);
    }

    public function viewGroupedSummaries()
    {
        try {
            $response = $this->groupSimilarSummariesByCosine(); // reuse Patch 8 method
            if (!is_array($response) && method_exists($response, 'getBody')) {
                $response = json_decode($response->getBody(), true);
            }
    
            $groups = $response['grouped'] ?? [];
            return $this->renderTheme('App\Modules\Management\Views\Marketing\resources\groupedSummariesView', [
                'groupedSummaries' => $groups
            ]);
        } catch (\Throwable $e) {
            log_message('error', '❌ viewGroupedSummaries() failed: ' . $e->getMessage());
            return $this->failServerError("Failed to render grouped summaries UI.");
        }
    }
    
    public function handleTeamMessage(array $email): bool
    {
        log_message('debug', '👥 handleTeamMessage triggered');
    
        $cleaned = $this->sanitizeRawEmailContent($email['content'] ?? '');
        if (strlen($cleaned) < 10) {
            log_message('warning', '⚠️ Team message too short. Skipped.');
            return false;
        }
    
        $data = [
            'sender_email' => $email['from'] ?? 'unknown',
            'message_body' => $cleaned,
            'created_at'   => date('Y-m-d H:i:s'),
            'context'      => 'SMS',
        ];
    
        $db = \Config\Database::connect();
        try {
            $db->table('bf_internal_team_messages')->insert($data); // table must exist
            return true;
        } catch (\Throwable $e) {
            log_message('error', '❌ Failed to store team message: ' . $e->getMessage());
            return false;
        }
    }
    
    public function viewTempScrapedEmails()
    {
        $data['scrapedEmails'] = $this->marketingModel->getRecentTempScrapedEmails(50);
        return $this->renderTheme('Marketing/viewTempScrapedEmails', $data);
    }
    
    public function viewTimelineGrouped()
    {
        $rawGroups = $this->getMyMIMarketing()->groupSimilarSummariesByCosine();
        $labeledGroups = $this->getMyMIMarketing()->generateGroupLabelsFromTFIDF($rawGroups['grouped'] ?? []);
    
        $this->data['groupedLabels'] = $labeledGroups;
        return $this->renderTheme('ManagementModule\Views\Marketing\resources\timelineGroupedView', $this->data);
    }

    /**
     * Display form to manually submit short and long form content.
     */
    public function shortLongContentForm()
    {
        $this->data['pageTitle'] = 'Manual Content Submission | MyMI Marketing';
        $this->commonData();
        return $this->renderTheme(
            'ManagementModule\Views\Marketing\resources\standaloneShortLongPostForm',
            $this->data
        );
    }

    /**
     * Handle manual short/long form submission and distribute content.
     */
    public function submitManualContent()
    {
        try {
            helper(['form', 'url']);

            $shortForm = trim((string) $this->request->getPost('short_form'));
            $longForm  = trim((string) $this->request->getPost('long_form'));

            if ($shortForm === '' || $longForm === '') {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Missing short or long form content.'
                ])->setStatusCode(400);
            }

            $platformContent = [
                'twitter'    => mb_strimwidth($shortForm, 0, 280, '', 'UTF-8'),
                'stocktwits' => mb_strimwidth($shortForm, 0, 300, '', 'UTF-8'),
                'discord'    => $longForm,
                'facebook'   => $longForm,
                'linkedin'   => $longForm,
                'email'      => $longForm,
            ];

            $payload = [
                'title'      => 'Manual Submission - ' . date('Y-m-d H:i'),
                'summary'    => $longForm,
                'platforms'  => json_encode($platformContent, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                'status'     => 'ready',
                'category'   => 'manual',
                'created_at' => date('Y-m-d H:i:s'),
            ];

            if (!$this->marketingModel->insertGeneratedContent($payload)) {
                log_message('error', 'submitManualContent: Failed to insert manual payload. Data: ' . json_encode($payload));

                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to store manual content.'
                ])->setStatusCode(500);
            }

            $marketingLibrary = $this->getMyMIMarketing();
            $marketingService = service('marketingService');

            $dispatchResults = [
                'twitter'    => $marketingLibrary->postToTwitter($platformContent['twitter']),
                'stocktwits' => $marketingService->distributeContent('stocktwits', $platformContent['stocktwits']),
                'linkedin'   => $marketingService->distributeContent('linkedin', $platformContent['linkedin']),
                'facebook'   => $marketingService->distributeContent('facebook', $platformContent['facebook']),
                'discord'    => $marketingService->distributeContent('discord', $platformContent['discord']),
                'email'      => $marketingService->distributeContent('email', $platformContent['email']),
            ];

            log_message('info', 'submitManualContent dispatched platforms: ' . json_encode($dispatchResults));

            return $this->response->setJSON([
                'success'  => true,
                'dispatch' => $dispatchResults,
            ]);
        } catch (\Throwable $e) {
            log_message('error', '[submitManualContent] ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Server error occurred.',
                'error'   => $e->getMessage()
            ])->setStatusCode(500);
        }
    }
    
    
}
?>
