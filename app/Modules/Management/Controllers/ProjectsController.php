<?php namespace App\Modules\Management\Controllers;

use App\Config\{Auth, SiteSettings, SocialMedia};
use App\Controllers\UserController;
use App\Libraries\{MyMIBudget, MyMICoin, MyMIDashboard, MyMIExchange, MyMIGold, MyMIInvestments, MyMIMarketing, MyMIProjects, MyMISolana, MyMIUser, MyMIWallet, MyMIWallets};
use App\Models\{AccountsModel, DashboardModel, ProjectsModel, SolanaModel, UserModel};
use App\Services\{AccountService, DashboardService, SolanaService, SupportService, UserService};
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Config\Services;
use Myth\Auth\Authorization\GroupModel;

#[\AllowDynamicProperties]
class ProjectsController extends UserController
{
    use ResponseTrait;

    // Controller Settings
    protected $auth;
    protected $helpers = ['auth', 'form', 'url'];
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

    public function __construct()
    {
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
        $this->MyMIUser = service('MyMIUser');
//         $this->MyMIWallet = new MyMIWallet(); // replaced by BaseController getter
//         $this->MyMIWallets = new MyMIWallets(); // replaced by BaseController getter

        $this->accountService = new AccountService();
        $this->dashboardService = new dashboardService();
        $this->solanaService = new SolanaService();
        $this->supportService = new SupportService();

        // Initialize UserService and pass required dependencies
        $this->cuID = getCuID();  // Assuming getCuID() is a helper or service
        $this->userService = new UserService($this->siteSettings, $this->cuID, Services::request());        
        
        if ($this->uri->getSegment(1) === 'Exchange') {
            if ($this->uri->getSegment(2) === 'Solana') {
                $this->solanaDW = $this->getSolanaService()->getUserDefaultSolana($this->cuID); 
            }
        }
    }

    public function commonData(): array
    {
        $this->data = parent::commonData();
        // Fetch data from UserService
        $userData = $this->getuserService()->commonData();
    
        // Merge the user data with BudgetController data
        $this->data = array_merge($this->data, $userData);

        // Site Settings
        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['beta'] = (string) $this->siteSettings->beta;
        $this->data['debug'] = (string) $this->siteSettings->debug;
        $this->data['request'] = $this->request;
        $this->data['uri'] = $this->request->getUri();
        $this->data['userAgent'] = $this->request->getUserAgent();
        $this->data['date'] = $this->siteSettings->date;
        $this->data['time'] = $this->siteSettings->time;
        $this->data['hostTime'] = $this->siteSettings->hostTime;
        $this->data['cuID'] = $this->cuID;

        // Budget Info
        $budgetInfo = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID);
        $this->data['totalAccountBalance'] = $budgetInfo['totalAccountBalance'];
        $this->data['totalAccountBalanceFMT'] = $budgetInfo['totalAccountBalanceFMT'];

        // Dashboard Info
        $this->data['getFeatures'] = $this->getMyMIDashboard()->getFeatures();
        $dashboardInfo = $this->getMyMIDashboard()->dashboardInfo($this->cuID);
        $this->data['completedGoals'] = $dashboardInfo['progressGoalData']['completions'];
        //log_message('debug', 'DashboardController L104 - $pendingGoals - $dashboardInfo[progressGoalData][goals]: ' . (print_r($dashboardInfo['progressGoalData']['goals'], true)));
        $this->data['pendingGoals'] = $dashboardInfo['progressGoalData']['goals'];
        $this->data['promotionalBanners'] = $dashboardInfo['promotionalBanners'];

        // User Info
        $userInfo = $this->getMyMIUser()->getUserInformation($this->cuID);
        $this->data['cuWalletID'] = $userInfo['cuWalletID'];
        $this->data['cuRole'] = $userInfo['cuRole'] ?? 4;
        $this->data['cuUserType'] = $userInfo['cuUserType'] ?? '';
        $this->data['cuEmail'] = $userInfo['cuEmail'] ?? '';
        $this->data['cuDisplayName'] = $userInfo['cuDisplayName'] ?? '';
        $this->data['cuUsername'] = $userInfo['cuUsername'] ?? '';
        $this->data['cuNameInitials'] = $userInfo['cuNameInitials'] ?? '';
        $this->data['cuKYC'] = $userInfo['cuKYC'] ?? '';
        $this->data['cuWalletCount'] = $userInfo['cuWalletCount'];
        $this->data['MyMIGCoinSum'] = $userInfo['MyMIGCoinSum'];
        $this->data['walletID'] = $userInfo['walletID'];

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

        // Projects Data
        $this->data['projects'] = $this->getMyMIProjects()->projectsData($this->cuID); 

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
        $this->data['pageTitle'] = 'MyMI Dashboard | MyMI Wallet | The Future of Finance';
        $this->commonData();
        $this->data['useDataTables'] = true;
        $this->data['useProjectListDT'] = true;
        return $this->renderTheme('App\Modules\Management\Views\Projects\index', $this->data);
    }

    public function add()
    {
        log_message('debug', 'ProjectsController::add - Method Start');
    
        if ($this->request->getMethod() === 'POST') {
            log_message('debug', 'ProjectsController::add - POST request detected');
            $formData = $this->request->getPost();
            log_message('debug', 'ProjectsController::add - $formData: ' . print_r($formData, true));
    
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
            log_message('debug', 'ProjectsController::add - $projectData: ' . print_r($projectData, true));
    
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
                        'from' => 'no-reply@mymiwallet.com',
                        'to' => $formData['user_email'],
                        'subject' => 'New MyMI Wallet Project Submitted - ' . $formData['name'],
                        'message' => $emailContent,
                    ];
                    log_message('debug', 'ProjectsController::add - $emailData: ' . print_r($emailData, true));
                
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
            'state'         => 'permit_empty|alpha|min_length[2]|max_length[2]',
            'postal_code'   => 'permit_empty|string',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->with('error','Invalid input.')->withInput();
        }

        $in     = $this->request->getPost();
        $source = !empty($in['zillow_url']) ? 'zillow' : 'address';
        if ($source === 'address' && empty($in['address_line1'])) {
            return redirect()->back()->with('error','Provide a Zillow (or similar) link or an address.');
        }

        /** @var \App\Models\ProjectsModel $pm */
        $pm = model('ProjectsModel');
        $id = $pm->reSaveIntake([
            'user_id'       => (int)$this->cuID,
            'source'        => $source,
            'raw_input'     => $source === 'zillow'
                ? (string)$in['zillow_url']
                : trim(($in['address_line1'] ?? '').' '.($in['city'] ?? '').' '.($in['state'] ?? '').' '.($in['postal_code'] ?? '')),
            'zillow_url'    => $in['zillow_url'] ?? null,
            'address_line1' => $in['address_line1'] ?? null,
            'city'          => $in['city'] ?? null,
            'state'         => strtoupper($in['state'] ?? ''),
            'postal_code'   => $in['postal_code'] ?? null,
            'status'        => 'queued',
        ]);

        if (!$id) {
            return redirect()->back()->with('error','Failed to queue property.');
        }

        service('RealEstateIngestService')->queue((int)$id); // run now
        return redirect()->back()->with('success','Submitted! We’re fetching public details now.');
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
    
}
