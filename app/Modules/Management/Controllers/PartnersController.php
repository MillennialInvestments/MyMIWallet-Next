<?php // app/Modules/Management/Controllers/AlertsController.php
namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use Myth\Auth\Authorization\GroupModel;
use App\Config\{APIs, Auth, SiteSettings, SocialMedia}; 
use App\Controllers\UserController;
use App\Libraries\{MyMIAnalytics, MyMIAlerts, MyMIBudget, MyMIDashboard, MyMIMarketing, MyMIUser};
use App\Models\{AlertsModel, AnnouncementModel, InvestmentModel, ManagementModel, MarketingModel, MyMIGoldModel, UserModel};
use CodeIgniter\API\ResponseTrait; 
use CodeIgniter\API\RequestTrait; 
use HTMLPurifier;
use HTMLPurifier_Config;


#[\AllowDynamicProperties]
class PartnersController extends UserController
{
    // Controller Settings
    protected $API;
    protected $auth;
    protected $helpers = ['auth', 'form', 'url'];
    protected $request;
    protected $session; 
    protected $uri; 
    protected $siteSettings;
    protected $MyMIAnalytics;
    protected $MyMIBudget;
    protected $MyMIDashboard;
    protected $MyMIMarketing;
    protected $MyMIUser;
    protected $alertsModel;
    protected $marketingModel;
    protected $userModel;
    protected $reporting; 
    protected $userAccount; 
    protected $userBudget; 
    protected $userDashboard; 

    public function __construct()
    {
        // Set Controller Settings
        $this->auth                                 = service('authentication');
        $this->API                                  = config('APIs');
        $this->siteSettings                         = config('SiteSettings');
        $this->request                              = service('request'); 
        $this->session                              = Services::session(); 
        $this->debug                                = $this->siteSettings->debug; 
        $this->uri                                  = $this->request->getUri(); 
        $this->alertsModel                          = new AlertsModel(); 
        $this->marketingModel                       = new MarketingModel(); 
        $this->userModel                            = new UserModel(); 
//         $this->MyMIAnalytics                        = new MyMIAnalytics(); // replaced by BaseController getter 
//         $this->MyMIAlerts                           = new MyMIAlerts(); // replaced by BaseController getter 
//         $this->MyMIBudget                           = new MyMIBudget(); // replaced by BaseController getter 
//         $this->MyMIDashboard                        = new MyMIDashboard(); // replaced by BaseController getter 
//         $this->MyMIMarketing                        = new MyMIMarketing(); // replaced by BaseController getter 
//         $this->MyMIUser                             = new MyMIUser(); // replaced by BaseController getter 
        // Check multiple sources for user ID

        // Get the user ID from various sources
        $this->cuID = $this->auth->id() ?? session('logged_in') ?? $this->session->get('user_id');
        if (!$this->cuID) {
            log_message('error', 'AlertsController L63 - Could not retrieve user ID');
        } 
        $this->userDashboard                        = $this->getMyMIDashboard()->dashboardInfo($this->cuID); 
        $this->reporting                            = $this->getMyMIAnalytics()->reporting($this->cuID);
    }

    public function commonData(): array
    {
        $this->data = parent::commonData();
        $this->data['siteSettings']                 = $this->siteSettings;
        $this->data['beta']                         = (string) $this->siteSettings->beta;
        $this->data['uri']                          = $this->request->getUri(); 
        $this->data['userAgent']                    = $this->request->getUserAgent();
        $this->data['date']                         = $this->siteSettings->date;
        $this->data['time']                         = $this->siteSettings->time;
        $this->data['hostTime']                     = $this->siteSettings->hostTime;

        // Add or merge existing $this->data with new values
        $this->data['cuID']                         = $this->cuID;
        $this->data['cuRole']                       = $this->getMyMIUser()->getUserInformation($this->cuID)['cuRole'] ?? 4;
        $this->data['cuUserType']                   = $this->getMyMIUser()->getUserInformation($this->cuID)['cuUserType'] ?? '';
        $this->data['cuEmail']                      = $this->getMyMIUser()->getUserInformation($this->cuID)['cuEmail'] ?? '';
        $this->data['cuDisplayName']                = $this->getMyMIUser()->getUserInformation($this->cuID)['cuDisplayName'] ?? '';
        $this->data['cuNameInitials']               = $this->getMyMIUser()->getUserInformation($this->cuID)['cuNameInitials'] ?? '';
        $this->data['cuKYC']                        = $this->getMyMIUser()->getUserInformation($this->cuID)['cuKYC'] ?? '';
        $this->data['totalAccountBalance']          = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalance'];
        $this->data['totalAccountBalanceFMT']       = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalanceFMT'];
        $this->data['cuSolanaDW']                   = $this->getMyMIDashboard()->getCryptoAccount($this->cuID, 'Solana')['accountInfo'];
        $this->data['completedGoals']               = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['progressGoalData']['completions'];
        $this->data['pendingGoals']                 = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['progressGoalData']['goals'];
        $this->data['promotionalBanners']           = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['promotionalBanners'];
        $this->data['reporting']                    = $this->getMyMIAnalytics()->reporting();
        $this->data['alertsInfo']                   = $this->MyMIAlerts->getAlertInfo();;

        if ($this->debug === 1) {
            // log_message('debug', 'AlertsController L105: $reporting: ' . print_r($this->reporting, true));
        }
        return $this->data;
}

    public function index()
    {
        $this->data['pageTitle'] = 'Partners | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Partners\index', $this->data);
    }

    private function saveData($type = 'insert', $id = 0)
    {
        if ($type !== 'insert' && $id === 0) {
            return false;
        }
        $validation = \Config\Services::validation();
        $rules = $this->dashboard_model->getValidationRules($type);
        if (!$this->validate($rules)) {
            return false;
        }
        $data = $this->dashboard_model->prepData($this->request->getPost());
        if ($type === 'insert') {
            $result = $this->dashboard_model->insert($data);
        } else {
            $result = $this->dashboard_model->update($id, $data);
        }
        return $result;
    }

    protected function set_current_user()
    {
        if (class_exists('Auth')) {
            if ($this->auth->check()) {
                $this->data['current_user'] = clone $this->auth->user();
                $this->data['current_user']->user_img = gravatar_link($this->data['current_user']->email, 22, $this->data['current_user']->email, "{$this->data['current_user']->email} Profile");
                if (isset($this->data['current_user']->language)) {
                    $this->config->set('language', $this->data['current_user']->language);
                }
            } else {
                $this->data['current_user'] = null;
            }
        }
    }
}
