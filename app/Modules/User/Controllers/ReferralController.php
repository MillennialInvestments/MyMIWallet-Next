<?php 

namespace App\Modules\User\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use App\Controllers\UserController;
use App\Libraries\{MyMIDashboard};
use App\Models\{BudgetModel, UserModel, WalletModel};
use App\Services\{AccountService, BudgetService, DashboardService, GoalTrackingService, MarketingService, ReferralService, SolanaService, UserService, WalletService};
use CodeIgniter\API\ResponseTrait;

#[\AllowDynamicProperties]
class ReferralController extends UserController {
    use ResponseTrait;
    protected $auth;
    protected $email;
    protected $logger;
    protected $session;
    protected $siteSettings;
    protected $socialMedia;
    protected $accountService;
    protected $budgetService;
    protected $dashboardService;
    protected $goalTrackingService;
    protected $marketingService;
    protected $referralService;
    protected $solanaService;
    protected $userService;
    protected $userData;
    protected $walletService;
    protected $budgetModel;
    protected $userModel;
    protected $walletModel;

    public function __construct() {
        // Initialize services and libraries
        $this->auth = service('authentication');
        $this->email = Services::email();
        $this->request = Services::request();
        $this->session = Services::session();
        $this->siteSettings = config('SiteSettings');
        $this->socialMedia = config('SocialMedia');
        $this->debug = $this->siteSettings->debug; 
        $this->referralService = new ReferralService();

        // Retrieve current user ID
                

        // $this->accountService = new AccountService();
        // $this->budgetService = new BudgetService();
        // $this->dashboardService = new DashboardService();
        $this->goalTrackingService = new GoalTrackingService();
        // $this->marketingService  = new MarketingService();
        $this->solanaService  = new SolanaService();

        $this->budgetModel = new BudgetModel(); 
        // $this->userModel = new UserModel(); 
//         $this->MyMIDashboard = new MyMIDashboard(); // replaced by BaseController getter 
        $this->logger = service('logger');
        $this->walletModel = new \App\Models\WalletModel();
        $this->walletService = new \App\Services\WalletService($this->logger, $this->walletModel);

//         // Initialize UserService and pass required dependencies
        // $this->cuID = getCuID();  // Assuming getCuID() is a helper or service
// $this->userService = new UserService($this->siteSettings, $this->cuID, Services::request());

        // // Fetch user data from the service
        // $this->userData = $this->getuserService()->commonData();
    }

    /**
     * Common data setup for all pages.
     */
    public function commonData(): array
    {
        $this->data = parent::commonData();
        $this->data = $this->data ?? [];
        $cuID = getCuID();  // Get current user ID once
        $this->cuID = $cuID;  // Ensure $this->cuID is set for use elsewhere
        $userData = $this->getMyMIUser()->getUserInformation($cuID);  // ✅ Correct method call
        // Ensure $this->data is an array
        if (!is_array($this->data)) {
            $this->data = [];
        }
        
        if ($this->debug = 1) {
            //log_message('info', 'ReferralController L83 - $userData: ' . (print_r($this->userData, true)));
        }
        
        // Merge the fetched data with $this->data
        $this->data = array_merge($this->data, $userData);
    
        // Add additional data to $this->data
        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['debug'] = $this->siteSettings->debug;
        $this->data['uri'] = $this->request->getUri();
        $this->data['userAgent'] = $this->request->getUserAgent();
        $this->data['date'] = $this->siteSettings->date;
        $this->data['time'] = $this->siteSettings->time;
        $this->data['cuID'] = $this->cuID;

        // Additional dynamic data from the service
        $this->data['getFeatures'] = $this->getMyMIDashboard()->getFeatures();
        $this->data['totalAccountBalance'] = $this->getMyMIBudget()->getTotalAccountBalance($this->cuID);
        $this->data['completedGoals'] = $this->getGoalTrackingService()->getCompletedGoals($this->cuID);
        $this->data['pendingGoals'] = $this->getGoalTrackingService()->getPendingGoals($this->cuID);
        $this->data['progressGoalData'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['progressGoalData'];
        $this->data['promotionalBanners'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['promotionalBanners'];
        $this->data['userBudget'] = $this->getMyMIBudget()->getUserBudget($this->cuID);
        $this->data['userWallets'] = $this->getMyMIWallets()->getUserWallets($this->cuID);

        // Fetch Solana data
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
    
        // Referral-specific data
        $userReferrals = $this->referralService->getUserReferralData($this->cuID); 
        if (!empty($userReferrals['referrer_code'])) {

        }; 
        $this->data['userReferrals'] = $userReferrals;
        $this->data['userLinks'] = $this->referralService->generateReferralLinks($this->cuID);
        $this->data['commissionEarnings'] = $this->referralService->calculateCommissions($this->cuID);
        $this->data['commissionHistory'] = $this->referralService->getCommissionHistory($this->cuID);
        // Track referral success
        $this->data['referralSuccess'] = $this->referralService->getReferralSuccess($this->cuID);
        return $this->data;
}
    

    /**
     * Display the main referral program page.
     */
    public function index() {
        $this->commonData();
        $this->data['pageTitle'] = 'Referral Program | MyMI Wallet';
        return $this->renderTheme('UserModule\Views\Referral_Program\index', $this->data);
    }

    public function create() {
        $this->commonData();
        $this->data['pageTitle'] = 'Referral Program | MyMI Wallet';
        return $this->renderTheme('UserModule\Views\Referral_Program\Create', $this->data);
    }

    public function share()
    {
        $this->data['pageTitle'] = 'Share Your Referral Link | MyMI Wallet';
        $referralLink = base_url('/referral/' . $this->cuID);
    
        // Pre-generated messages for social sharing
        $message = $this->referralService->getPreGeneratedMessages($this->cuID);
    
        $this->data['referralLink'] = $referralLink;
        $this->data['emailSubject'] = "Join MyMI Wallet Today!";
        $this->data['emailBody'] = "Hi there,\n\n" . $message . "\n\nBest regards!";
    
        // Social media shareable links
        $this->data['facebookShareLink'] = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($referralLink);
        $this->data['twitterShareLink'] = 'https://twitter.com/intent/tweet?text=' . urlencode($message);
        $this->data['linkedinShareLink'] = 'https://www.linkedin.com/sharing/share-offsite/?url=' . urlencode($referralLink);
    
        return $this->renderTheme('UserModule\Views\Referral_Program/share', $this->data);
    }
    

    public function sendReferralEmail()
    {
        log_message('info', 'sendReferralEmail method triggered.');
    
        // Check if the request is AJAX
        if (!$this->request->isAJAX()) {
            log_message('error', 'Non-AJAX request received.');
            return $this->response->setJSON([
                'success' => false, 
                'message' => 'Invalid request method. Please use AJAX.'
            ]);
        }
    
        // Log that AJAX request is being processed
        log_message('info', 'Processing AJAX referral request...');
    
        // Get the data from the request
        $data = json_decode($this->request->getBody(), true);
        log_message('info', 'Request Data: ' . print_r($data, true)); // Log the received request data
    
        $referralEmail = $data['referral_email'];
        $userID = $data['user_id'];
        $ipAddress = $this->request->getIPAddress();
        $referrerCode = 'MyMI-' . $userID; // Generate unique referral code
    
        log_message('info', 'Referral process initiated by UserID: ' . $userID . ', Target Email: ' . $referralEmail);
    
        // Validate email
        if (!filter_var($referralEmail, FILTER_VALIDATE_EMAIL)) {
            log_message('error', 'Invalid email address submitted: ' . $referralEmail);
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid email address.']);
        }
    
        // Check if the email is associated with an existing account
        $existingUser = $this->userModel->where('email', $referralEmail)->first();
        if ($existingUser) {
            log_message('warning', 'Referral email already in use by an existing account: ' . $referralEmail);
            return $this->response->setJSON(['success' => false, 'message' => 'The email is already associated with an existing account.']);
        }
    
        // Store referral data in the database
        $referralData = [
            'referrer_code' => $referrerCode,
            'user_id' => $userID,
            'user_ip_address' => $ipAddress,
            'signup_date' => date('Y-m-d H:i:s'),
            'type' => 'Email',
            'city' => $this->userData['cuCity'],
            'state' => $this->userData['cuState'],
            'country' => $this->userData['cuCountry'],
            'zipcode' => $this->userData['cuZipCode'],
            'active' => 1,
            'referral_email' => $referralEmail
        ];
    
        if ($this->debug = 1) {
            log_message('info', 'Storing referral data: ' . print_r($referralData, true));
        }
    
        // Store referral data in the database
        $subscriberData = [
            'email' => $referralEmail,
            'referral' => $referrerCode,
            'category' => 'Referral Program',
            'subject' => 'Member Referral', 
            'topic' => 'Referrer ' . $referrerCode . ' referred the following user: ' . $referralEmail,
            'beta' => $this->siteSettings->beta,
            'date' => date('Y-m-d'),
            'hostTime' => date('Y-m-d H:i:s'),
            'time' => date('H:i:s'), 
            'user_id' => $userID, 
            'user_ip' => $ipAddress
        ];
    
        if ($this->debug = 1) {
            log_message('info', 'Storing referral data: ' . print_r($subscriberData, true));
        }

        $stored = $this->referralService->storeReferral($referralData , $subscriberData);
    
        if (!$stored) {
            log_message('error', 'Failed to store referral data for email: ' . $referralEmail);
            return $this->response->setJSON(['success' => false, 'message' => 'Could not store referral.']);
        }
    
        // Log after successfully storing referral data
        log_message('info', 'Referral data stored successfully for email: ' . $referralEmail);
    
        // Send email
        $referrerName = $this->referralService->getUserNameByID($userID);
        $emailContent = view('emails/referral_invite', [
            'youtube_video_id' => $this->socialMedia->promotional_yt_video,
            'referral_link' => site_url('/Referral/Register/' . $referrerCode),
            'referrer_name' => $referrerName
        ]);
    
        $this->email->setTo($referralEmail);
        $this->email->setSubject('Join MyMI Wallet Today!');
        $this->email->setMessage($emailContent);
    
        if ($this->email->send()) {
            log_message('info', 'Referral email sent successfully to: ' . $referralEmail);
    
            // Return JSON response with a success message and a redirect URL (to the previous page)
            return $this->response->setJSON([
                'success' => true, 
                'message' => 'Referral invitation sent successfully.',
                'redirect' => previous_url() // Use previous_url() to get the referring page
            ]);
        } else {
            $error = $this->email->printDebugger(['headers']);
            log_message('error', 'Failed to send referral email to: ' . $referralEmail . ' Error: ' . $error);
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to send the invitation.']);
        }
    }
    
    
    /**
     * Display the user's referrals and related information.
     */
    public function My_Referrals() {
        $this->commonData();
        $this->data['pageTitle'] = 'My Referrals | MyMI Wallet';
        return $this->renderTheme('UserModule\Views\Referral_Program/My_Referrals', $this->data);
    }

    /**
     * Display a list of users in the referral program.
     */
    public function Users() {
        $this->commonData();
        $this->data['pageTitle'] = 'Referral Program Users | MyMI Wallet';
        return $this->renderTheme('UserModule\Views\Referral_Program/Users', $this->data);
    }

    /**
     * Show the Marketing Affiliate Program Agreement page.
     */
    public function Marketing_Affiliate_Program_Agreement() {
        $this->commonData();
        $this->data['pageTitle'] = 'Marketing Affiliate Program Agreement | MyMI Wallet';
        return $this->renderTheme('UserModule\Views\Referral_Program/Marketing_Affiliate_Program_Agreement', $this->data);
    }

    /**
     * Display the referral program application page.
     */
    public function Apply() {
        $this->commonData();
        $this->data['pageTitle'] = 'Apply for Referral Program | MyMI Wallet';
        return $this->renderTheme('UserModule\Views\Referral_Program/Apply', $this->data);
    }

    /**
     * Referral program application success page.
     */
    public function Success() {
        $this->commonData();
        $this->data['pageTitle'] = 'Referral Program Success | MyMI Wallet';
        return $this->renderTheme('UserModule\Views\Referral_Program/Success', $this->data);
    }

    /**
     * Handle new affiliate information submission.
     */
    public function New_Affiliate_Information() {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $validation->setRules([
            'url_link' => 'trim',
            'subpage_name' => 'trim',
            'subpage_link' => 'trim',
            'subpage_icon' => 'trim',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->renderTheme('UserModule\Views\Referral_Program/New_Affiliate_Information', [
                'validation' => $validation,
                'pageType' => 'Automated',
                'pageName' => 'Referral_Program_Activate_Affiliate',
            ]);
        } else {
            $formData = $this->request->getPost();
            if ($this->referralService->saveAffiliateInformation($formData)) {
                return redirect()->to('/Referral-Program/Applications')->with('message', 'Submitted Successfully');
            } else {
                return $this->renderTheme('UserModule\Views\Referral_Program/New_Affiliate_Information', [
                    'error' => 'There was a problem submitting your request. Please try again.',
                    'pageType' => 'Automated',
                    'pageName' => 'Referral_Program_Activate_Affiliate',
                ]);
            }
        }
    }

    /**
     * Activate affiliate by ID and notify them via email.
     */
    public function Activate_Affiliate($id) {
        if ($this->referralService->activateAffiliate($id)) {
            return redirect()->to('/Referral-Program/Applications')->with('message', 'Affiliate Activated Successfully');
        } else {
            return redirect()->back()->with('error', 'Error in activating the affiliate.');
        }
    }

    /**
     * Handle new affiliate procedure page.
     */
    public function New_Affiliate_Procedure() {
        $this->commonData();
        $this->data['pageTitle'] = 'New Affiliate Procedure | MyMI Wallet';
        return $this->renderTheme('UserModule\Views\Referral_Program/New_Affiliate_Procedure', $this->data);
    }

    /**
     * Process referral payouts using different payment methods.
     */
    public function processPayments() {
        $this->commonData();
        $this->referralService->processReferralPayments($this->cuID);
        return redirect()->back()->with('message', 'Referral payments processed successfully.');
    }


    public function sendFollowUpEmails()
    {
        $this->referralService->sendFollowUpEmails();
    }

    /**
     * Save new referral or update existing data.
     */
    private function saveData($type = 'insert', $id = 0) {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $validation->setRules($this->referralService->getValidationRules($type));

        if (!$validation->withRequest($this->request)->run()) {
            return false;
        }

        $data = $this->referralService->prepareData($this->request->getPost());
        return $type === 'insert' ? $this->referralService->saveReferral($data) : $this->referralService->updateReferral($id, $data);
    }
}
