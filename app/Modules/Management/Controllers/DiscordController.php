<?php
// app/Modules/User/Controllers/DashboardController.php
namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use Myth\Auth\Authorization\GroupModel;
use App\Config\{Auth, SiteSettings, SocialMedia}; 
use App\Controllers\UserController;
use App\Libraries\{MyMIAnalytics, MyMIBudget, MyMICoin, MyMIDashboard, MyMIExchange, MyMIGold, MyMIUser, MyMIWallet, MyMIWallets};
use App\Models\{AccountsModel, BudgetModel, DiscordModel, WalletModel, UserModel};
use App\Services\{AccountService, BudgetService, DashboardService, GoalTrackingService, MarketingService, SolanaService, UserService, WalletService};
// use App\Modules\User\Libraries\{DashboardLibrary}; 
use DateTime;
use DateInterval;
use CodeIgniter\API\ResponseTrait;
use Psr\Log\LoggerInterface;

#[\AllowDynamicProperties]
class DiscordController extends UserController
{
    protected $auth;
    protected $logger;
    protected $session;
    protected $siteSettings;
    protected $walletModel;
    protected $accountService;
    protected $budgetService;
    protected $dashboardService;
    protected $goalTrackingService;
    protected $marketingService;
    protected $solanaService;
    protected $userService;
    protected $walletService;
    protected $budgetModel;
    protected $MyMIDashboard;
    protected $discordModel;
    protected $helpers = ['auth', 'form', 'url'];

    public function __construct()
    {
        $this->auth = service('authentication');
        $this->session = Services::session();
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug;

        if (!function_exists('getCuID')) {
            helper('cuID');
        }

        // Check for user ID
        $this->cuID                                 = function_exists('getCuID') ? getCuID() : ($this->auth->id() ?? $this->session->get('user_id'));
        log_message('debug', 'HowTosController L47 - $this->cuID: ' . (print_r($this->cuID, true)));
        if (empty($this->cuID)) {
            log_message('error', 'Failed to retrieve user ID.');
            return redirect()->to('/login')->with('redirect_url', current_url())->send();
        }
        
        // $this->accountService = new AccountService();
        $this->budgetService = new BudgetService((int) $this->cuID);
        // $this->dashboardService = new DashboardService();
        // $this->goalTrackingService = new GoalTrackingService();
        // $this->marketingService  = new MarketingService();
        // $this->solanaService  = new SolanaService();

        // $this->budgetModel = new BudgetModel(); 
        // $this->MyMIDashboard = new MyMIDashboard(); 
        $this->logger = service('logger');
        // $this->walletModel = new WalletModel();
        // $this->walletService = new WalletService($this->logger, $this->walletModel);

        // Initialize UserService and pass required dependencies
        // $this->cuID                                 = $this->auth->id() ?? session('logged_in') ?? $this->session->get('user_id');
        // log_message('debug', 'HowTosController L47 - $this->cuID: ' . (print_r($this->cuID, true)));
        // if (empty($this->cuID)) {
        //     log_message('error', 'Failed to retrieve user ID.');
        //     return redirect()->to('/login')->with('redirect_url', current_url())->send();
        // }

        $this->discordModel = new DiscordModel();
    }

    public function commonData(): array
    {
        $this->data = parent::commonData();
        $this->data = $this->data ?? [];
        $cuID = getCuID();  // Get current user ID once
        $this->cuID = $cuID;  // Ensure $this->cuID is set for use elsewhere
        $userData = $this->getMyMIUser()->getUserInformation($cuID);  // ✅ Correct method call
     
        // Dashboard Info
        $dashboardInfo = $this->getMyMIDashboard()->dashboardInfo($this->cuID);
        $this->data['completedGoals'] = $dashboardInfo['progressGoalData']['completions'];
        // log_message('debug', 'DashboardController L104 - $pendingGoals - $dashboardInfo[progressGoalData][goals]: ' . (print_r($dashboardInfo['progressGoalData']['goals'], true)));
        $this->data['pendingGoals'] = $dashboardInfo['progressGoalData']['goals'];
        $this->data['promotionalBanners'] = $dashboardInfo['promotionalBanners'];
    
        // Merge the user data with BudgetController data
        $this->data = array_merge($this->data, $userData);
    
        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['debug'] = $this->siteSettings->debug;
        $this->data['uri'] = $this->request->getUri();
        $this->data['userAgent'] = $this->request->getUserAgent();
        $this->data['date'] = $this->siteSettings->date;

        // Additional dynamic data from the service
        $this->data['getFeatures'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['getFeatures'];
        $this->data['totalAccountBalance'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalance'];
        $this->data['totalAccountBalanceFMT'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalanceFMT'];
        $this->data['completedGoals'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['progressGoalData']['completions'];
        $this->data['pendingGoals'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['progressGoalData']['goals'];
        $this->data['promotionalBanners'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['promotionalBanners'];
        $this->data['userBudget'] = $this->getMyMIBudget()->getUserBudget($this->cuID);
        $this->data['userWallets'] = $this->getMyMIWallets()->getUserWallets($this->cuID);  
        $this->data['reporting'] = $this->getMyMIAnalytics()->reporting($this->cuID);

        // Fetch Solana data
        $this->data['cuSolanaDW'] = $this->getMyMIDashboard()->getCryptoAccount($this->cuID, 'Solana')['accountInfo'];
        $this->data['solanaNetworkStatus'] = $this->MyMISolana->getUserSolana($this->cuID)['solanaNetworkStatus'];
        $this->data['cuSolanaTotal'] = $this->MyMISolana->getUserSolana($this->cuID)['cuSolanaTotal'] ?? 0;
        $this->data['cuSolanaValue'] = $this->MyMISolana->getUserSolana($this->cuID)['cuSolanaValue'] ?? 0;
        return $this->data;
}

    public function index()
    {
        log_message('info', 'ManagementController L117 - Starting Page Load');
        $this->data['pageTitle']                    = 'MyMI Management | MyMI Wallet | The Future of Finance';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->data['discordHealth'] = $this->discordModel->getHealthSnapshot();
        return $this->renderTheme('App\Modules\Management\Views\index', $this->data);
    }

    public function discord()
    {
        $this->data['pageTitle'] = 'Discord Admin | MyMI Wallet';
        $this->commonData();

        $channels = $this->discordModel->listChannels();
        $templates = $this->discordModel->listTemplates();
        $subscriptions = $this->discordModel->listSubscriptions();
        $policies      = $this->discordModel->listPolicies();

        $this->data['discordChannels'] = $channels;
        $this->data['discordTemplates'] = $templates;
        $this->data['discordSubscriptions'] = $subscriptions;
        $this->data['discordPolicies'] = $policies;
        $this->data['discordTemplateKeys'] = $this->discordModel->getRecentDataKeys();
        $this->data['discordChannelOptions'] = array_map(static fn ($row) => $row['channel_key'], $channels);
        $this->data['discordTemplateOptions'] = array_map(static fn ($row) => $row['template_key'], $templates);
        $this->data['discordEventOptions'] = ['alerts.opened', 'news.daily_digest', 'marketing.post.ready'];
        $this->data['discordHealth'] = $this->discordModel->getHealthSnapshot();

        return $this->renderTheme('App\Modules\Management\Views\Discord\index', $this->data);
    }

    public function saveDiscordChannel()
    {
        $data = $this->request->getPost();

        try {
            if (empty($data['channel_key'])) {
                throw new \InvalidArgumentException('Channel key is required.');
            }
            if ($this->discordModel->saveChannel($data)) {
                session()->setFlashdata('message', 'Discord channel saved.');
            } else {
                session()->setFlashdata('error', 'No changes were applied to the channel.');
            }
        } catch (\Throwable $e) {
            log_message('error', 'Failed to save Discord channel: ' . $e->getMessage());
            session()->setFlashdata('error', 'Failed to save channel: ' . $e->getMessage());
        }

        return redirect()->to('/Management/Discord');
    }

    public function deleteDiscordChannel()
    {
        $id = (int) $this->request->getPost('id');
        if ($id > 0) {
            $this->discordModel->deleteChannel($id);
            session()->setFlashdata('message', 'Discord channel removed.');
        }
        return redirect()->to('/Management/Discord');
    }

    public function saveDiscordTemplate()
    {
        $data = $this->request->getPost();

        try {
            if (empty($data['template_key'])) {
                throw new \InvalidArgumentException('Template key is required.');
            }
            if (empty($data['content'])) {
                throw new \InvalidArgumentException('Template content cannot be empty.');
            }
            if ($this->discordModel->saveTemplate($data)) {
                session()->setFlashdata('message', 'Discord template saved.');
            } else {
                session()->setFlashdata('error', 'No changes were applied to the template.');
            }
        } catch (\InvalidArgumentException $e) {
            session()->setFlashdata('error', $e->getMessage());
        } catch (\Throwable $e) {
            log_message('error', 'Failed to save Discord template: ' . $e->getMessage());
            session()->setFlashdata('error', 'Failed to save template: ' . $e->getMessage());
        }

        return redirect()->to('/Management/Discord#templates');
    }

    public function deleteDiscordTemplate()
    {
        $id = (int) $this->request->getPost('id');
        if ($id > 0) {
            $this->discordModel->deleteTemplate($id);
            session()->setFlashdata('message', 'Discord template deleted.');
        }
        return redirect()->to('/Management/Discord#templates');
    }

    public function saveDiscordSubscription()
    {
        $data = $this->request->getPost();

        try {
            if (empty($data['event_key']) || empty($data['channel_key']) || empty($data['template_key'])) {
                throw new \InvalidArgumentException('Event, channel, and template are required.');
            }
            if ($this->discordModel->saveSubscription($data)) {
                session()->setFlashdata('message', 'Discord subscription saved.');
            } else {
                session()->setFlashdata('error', 'No changes were applied to the subscription.');
            }
        } catch (\InvalidArgumentException $e) {
            session()->setFlashdata('error', $e->getMessage());
        } catch (\Throwable $e) {
            log_message('error', 'Failed to save Discord subscription: ' . $e->getMessage());
            session()->setFlashdata('error', 'Failed to save subscription: ' . $e->getMessage());
        }

        return redirect()->to('/Management/Discord#subscriptions');
    }

    public function deleteDiscordSubscription()
    {
        $id = (int) $this->request->getPost('id');
        if ($id > 0) {
            $this->discordModel->deleteSubscription($id);
            session()->setFlashdata('message', 'Discord subscription removed.');
        }
        return redirect()->to('/Management/Discord#subscriptions');
    }

    public function saveDiscordPolicy()
    {
        $data = $this->request->getPost();

        try {
            if ($this->discordModel->savePolicy($data)) {
                session()->setFlashdata('message', 'Discord policy saved.');
            } else {
                session()->setFlashdata('error', 'No changes were applied to the policy.');
            }
        } catch (\InvalidArgumentException $e) {
            session()->setFlashdata('error', $e->getMessage());
        } catch (\Throwable $e) {
            log_message('error', 'Failed to save Discord policy: ' . $e->getMessage());
            session()->setFlashdata('error', 'Failed to save policy: ' . $e->getMessage());
        }

        return redirect()->to('/Management/Discord#policies');
    }

    public function deleteDiscordPolicy()
    {
        $id = (int) $this->request->getPost('id');
        if ($id > 0) {
            $this->discordModel->deletePolicy($id);
            session()->setFlashdata('message', 'Discord policy removed.');
        }
        return redirect()->to('/Management/Discord#policies');
    }
}