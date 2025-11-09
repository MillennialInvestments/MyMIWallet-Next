<?php 

namespace App\Modules\User\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use App\Controllers\UserController;
use App\Libraries\{MyMIDashboard};
use App\Models\{BudgetModel, UserModel, WalletModel};
use App\Services\{AccountService, BudgetService, DashboardService, GoalTrackingService, MarketingService, ReferralService, SolanaService, UserService, WalletService};
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

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
    public function commonData(): array|ResponseInterface
    {
        $base = parent::commonData();
        if ($base instanceof ResponseInterface) {
            return $base;
        }

        $this->data = is_array($base) ? $base : [];

        $cuID = $this->resolveCurrentUserId();
        $this->cuID = $cuID;

        $userData = [];
        if ($cuID !== null) {
            try {
                $userData = $this->getMyMIUser()->getUserInformation($cuID) ?? [];
            } catch (\Throwable $e) {
                log_message('error', 'ReferralController::commonData getUserInformation failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
            }
        }

        $baseData = is_array($this->data) ? $this->data : [];
        $userData = is_array($userData) ? $userData : [];
        $this->data = array_merge($baseData, $userData);

        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['debug']        = (int) ($this->siteSettings->debug ?? 0);
        $this->data['uri']          = $this->request?->getUri();
        $this->data['userAgent']    = $this->request?->getUserAgent();
        $this->data['date']         = $this->siteSettings->date ?? date('Y-m-d');
        $this->data['time']         = $this->siteSettings->time ?? date('H:i:s');
        $this->data['cuID']         = $cuID;

        try {
            $this->data['getFeatures'] = $this->getMyMIDashboard()->getFeatures();
        } catch (\Throwable $e) {
            log_message('error', 'ReferralController::commonData getFeatures failed: {message}', [
                'message' => $e->getMessage(),
            ]);
            $this->data['getFeatures'] = [];
        }

        $dashboardInfo = [];
        if ($cuID !== null) {
            try {
                $dashboardInfo = $this->getMyMIDashboard()->dashboardInfo($cuID) ?? [];
            } catch (\Throwable $e) {
                log_message('error', 'ReferralController::commonData dashboardInfo failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
            }
        }

        $this->data['progressGoalData']   = is_array($dashboardInfo['progressGoalData'] ?? null) ? $dashboardInfo['progressGoalData'] : [];
        $this->data['promotionalBanners'] = is_array($dashboardInfo['promotionalBanners'] ?? null) ? $dashboardInfo['promotionalBanners'] : [];

        if ($cuID !== null) {
            try {
                $this->data['totalAccountBalance'] = (float) ($this->getMyMIBudget()->getTotalAccountBalance($cuID) ?? 0);
            } catch (\Throwable $e) {
                log_message('error', 'ReferralController::commonData getTotalAccountBalance failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
                $this->data['totalAccountBalance'] = (float) ($this->data['totalAccountBalance'] ?? 0);
            }

            try {
                $this->data['completedGoals'] = $this->getGoalTrackingService()->getCompletedGoals($cuID) ?? [];
                $this->data['pendingGoals']   = $this->getGoalTrackingService()->getPendingGoals($cuID) ?? [];
            } catch (\Throwable $e) {
                log_message('error', 'ReferralController::commonData goal tracking failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
                $this->data['completedGoals'] = $this->data['completedGoals'] ?? [];
                $this->data['pendingGoals']   = $this->data['pendingGoals'] ?? [];
            }

            try {
                $this->data['userBudget']  = $this->getMyMIBudget()->getUserBudget($cuID) ?? [];
            } catch (\Throwable $e) {
                log_message('error', 'ReferralController::commonData getUserBudget failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
                $this->data['userBudget'] = $this->data['userBudget'] ?? [];
            }

            try {
                $this->data['userWallets'] = $this->getMyMIWallets()->getUserWallets($cuID) ?? [];
            } catch (\Throwable $e) {
                log_message('error', 'ReferralController::commonData getUserWallets failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
                $this->data['userWallets'] = $this->data['userWallets'] ?? [];
            }
        } else {
            $this->data['totalAccountBalance'] = (float) ($this->data['totalAccountBalance'] ?? 0);
            $this->data['completedGoals']      = $this->data['completedGoals'] ?? [];
            $this->data['pendingGoals']        = $this->data['pendingGoals'] ?? [];
            $this->data['userBudget']          = $this->data['userBudget'] ?? [];
            $this->data['userWallets']         = $this->data['userWallets'] ?? [];
        }

        $userSolanaData = [];
        if ($cuID !== null) {
            try {
                $userSolanaData = $this->getSolanaService()->getSolanaData($cuID) ?? [];
            } catch (\Throwable $e) {
                log_message('error', 'ReferralController::commonData getSolanaData failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
            }
        }
        $solanaWallets = is_array($userSolanaData['userSolanaWallets'] ?? null) ? $userSolanaData['userSolanaWallets'] : [];
        $this->data['cuSolanaDW']    = $solanaWallets['cuSolanaDW']   ?? null;
        $this->data['cuSolanaTotal'] = (float) ($solanaWallets['cuSolanaTotal'] ?? 0);
        $this->data['cuSolanaValue'] = (float) ($solanaWallets['cuSolanaValue'] ?? 0);

        $this->data['solanaNetworkStatus'] = [
            'healthy' => false,
            'slot'    => null,
            'version' => null,
            'error'   => null,
        ];
        try {
            if (!isset($this->solanaService)) {
                $this->solanaService = service('solanaService');
            }
            $this->data['solanaNetworkStatus'] = $this->solanaService->getNetworkStatus();
        } catch (\Throwable $e) {
            log_message('error', 'ReferralController::commonData getNetworkStatus failed: {message}', [
                'message' => $e->getMessage(),
            ]);
            $this->data['solanaNetworkStatus']['error'] = $e->getMessage();
        }

        $userReferrals = [];
        $userLinks = [];
        $commissionEarnings = [];
        $commissionHistory  = [];
        $referralSuccess    = [];
        if ($cuID !== null) {
            try {
                $userReferrals = $this->referralService->getUserReferralData($cuID) ?? [];
            } catch (\Throwable $e) {
                log_message('error', 'ReferralController::commonData getUserReferralData failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
            }

            try {
                $userLinks = $this->referralService->generateReferralLinks($cuID) ?? [];
            } catch (\Throwable $e) {
                log_message('error', 'ReferralController::commonData generateReferralLinks failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
            }

            try {
                $commissionEarnings = $this->referralService->calculateCommissions($cuID) ?? [];
            } catch (\Throwable $e) {
                log_message('error', 'ReferralController::commonData calculateCommissions failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
            }

            try {
                $commissionHistory = $this->referralService->getCommissionHistory($cuID) ?? [];
            } catch (\Throwable $e) {
                log_message('error', 'ReferralController::commonData getCommissionHistory failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
            }

            try {
                $referralSuccess = $this->referralService->getReferralSuccess($cuID) ?? [];
            } catch (\Throwable $e) {
                log_message('error', 'ReferralController::commonData getReferralSuccess failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
            }
        }

        $this->data['userReferrals']       = $userReferrals;
        $this->data['userLinks']           = $userLinks;
        $this->data['commissionEarnings']  = $commissionEarnings;
        $this->data['commissionHistory']   = $commissionHistory;
        $this->data['referralSuccess']     = $referralSuccess;

        return $this->data;
    }
    

    /**
     * Display the main referral program page.
     */
    public function index()
    {
        $common = $this->commonData();
        if ($common instanceof ResponseInterface) {
            return $common;
        }
        $this->data['pageTitle'] = 'Referral Program | MyMI Wallet';
        return $this->renderTheme('UserModule\Views\Referral_Program\index', $this->data);
    }

    public function create()
    {
        $common = $this->commonData();
        if ($common instanceof ResponseInterface) {
            return $common;
        }
        $this->data['pageTitle'] = 'Referral Program | MyMI Wallet';
        return $this->renderTheme('UserModule\Views\Referral_Program\Create', $this->data);
    }

    public function share()
    {
        $common = $this->commonData();
        if ($common instanceof ResponseInterface) {
            return $common;
        }
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
