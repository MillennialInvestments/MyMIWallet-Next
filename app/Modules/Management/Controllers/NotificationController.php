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
use Ratchet\Client\WebSocket;
use Ratchet\Client\Connector;


#[\AllowDynamicProperties]
class NotificationController extends UserController
{
    // Controller Settings
    protected $API;
    protected $auth;
    protected $helpers = ['auth', 'form', 'url'];
    protected $request;
    protected $session; 
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
        $this->request                              = service('request'); 
        $this->API                                  = config('APISettings');
        $this->siteSettings                         = config('SiteSettings');
        $this->debug                                = $this->siteSettings->debug; 
        $this->session                              = Services::session(); 
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
        $this->userAccount                          = $this->getMyMIUser()->getUserInformation($this->cuID); 
        $this->userBudget                           = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID); 
        $this->userDashboard                        = $this->getMyMIDashboard()->dashboardInfo($this->cuID); 
        $this->alertsInfo                           = $this->MyMIAlerts->getAlertInfo();
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
        $this->data['cuRole']                       = $this->userAccount['cuRole'] ?? 4;
        $this->data['cuUserType']                   = $this->userAccount['cuUserType'] ?? '';
        $this->data['cuEmail']                      = $this->userAccount['cuEmail'] ?? '';
        $this->data['cuUsername']                   = $this->userAccount['cuUsername'] ?? '';
        $this->data['cuDisplayName']                = $this->userAccount['cuDisplayName'] ?? '';
        $this->data['cuFirstName']                  = $this->userAccount['cuFirstName'] ?? '';
        $this->data['cuMiddleName']                 = $this->userAccount['cuMiddleName'] ?? '';
        $this->data['cuLastName']                   = $this->userAccount['cuLastName'] ?? '';
        $this->data['cuNameSuffix']                 = $this->userAccount['cuNameSuffix'] ?? '';
        $this->data['cuNameInitials']               = $this->userAccount['cuNameInitials'] ?? '';
        $this->data['cuKYC']                        = $this->userAccount['cuKYC'] ?? '';
        $this->data['cuDOB']                        = $this->userAccount['cuDOB'] ?? '';
        $this->data['cuSSN']                        = $this->userAccount['cuSSN'] ?? '';
        $this->data['cuPhone']                      = $this->userAccount['cuPhone'] ?? '';
        $this->data['cuAddress']                    = $this->userAccount['cuAddress'] ?? '';
        $this->data['cuCity']                       = $this->userAccount['cuCity'] ?? '';
        $this->data['cuState']                      = $this->userAccount['cuState'] ?? '';
        $this->data['cuCountry']                    = $this->userAccount['cuCountry'] ?? '';
        $this->data['cuZipCode']                    = $this->userAccount['cuZipCode'] ?? '';
        $this->data['cuMailingAddress']             = $this->userAccount['cuMailingAddress'] ?? '';
        $this->data['cuEmployment']                 = $this->userAccount['cuEmployment'] ?? '';
        $this->data['cuOccupation']                 = $this->userAccount['cuOccupation'] ?? '';
        $this->data['cuSalary']                     = $this->userAccount['cuSalary'] ?? '';
        $this->data['cuProofIdentity']              = $this->userAccount['cuProofIdentity'] ?? '';
        $this->data['cuProofAddress']               = $this->userAccount['cuProofAddress'] ?? '';
        $this->data['cuPublicKey']                  = $this->userAccount['cuPublicKey'] ?? '';
        $this->data['cuPrivateKey']                 = $this->userAccount['cuPrivateKey'] ?? '';
        $this->data['cuReferrer']                   = $this->userAccount['cuReferrer'] ?? '';
        $this->data['cuReferrerCode']               = $this->userAccount['cuReferrerCode'] ?? '';

        $this->data['alertsInfo']                   = $this->alertsInfo;
        $this->data['userAccount']                  = $this->userAccount;
        $this->data['userBudget']                   = $this->userBudget;
        $this->data['userDashboard']                = $this->userDashboard;
        $this->data['reporting']                    = $this->reporting;

        if ($this->debug === 1) {
        // log_message('debug', 'AlertsController L105: $reporting: ' . print_r($this->reporting, true));
        }
        return $this->data;
}

    // Inside the AlertsController

    public function index()
    {
        $this->data['pageTitle'] = 'MyMI Alerts | Management | MyMI Wallet';
        $this->data['pendingTradeAlerts'] = $this->MyMIAlerts->getPendingTradeAlerts();
        $this->commonData();
        
        // Update trade alerts with current market prices when this page is visited
        $this->alertsModel->updateTradeAlertsWithCurrentPrices();

        // In your controller right before rendering the view
        // log_message('debug', 'Pending Trade Alerts: ' . print_r($this->data['pendingTradeAlerts'], true));
        $this->renderTheme('ManagementModule\Views\Alerts\index', $this->data);
    }
    
    public function sendNotification($message, $category = null) {
        $loop = Factory::create();
        $connector = new Connector($loop);

        $connector('ws://localhost:8080')->then(function (WebSocket $conn) use ($message, $category) {
            $notification = ['message' => $message, 'category' => $category];
            $conn->send(json_encode($notification));
            $conn->close();
        }, function ($e) {
            echo "Could not connect: {$e->getMessage()}\n";
        });

        $loop->run();
    }

    public function addRecord() {
        $model = new YourModel();

        // Add the new record to the database
        $data = [
            'field1' => 'value1',
            'field2' => 'value2',
            // other fields...
        ];
        $model->insert($data);

        // Send WebSocket notification
        $this->sendWebSocketMessage('A new record has been added.');
    }

    private function sendWebSocketMessage($message) {
        $loop = \React\EventLoop\Factory::create();
        $connector = new Connector($loop);

        $connector('ws://localhost:8080')->then(function (WebSocket $conn) use ($message) {
            $conn->send($message);
            $conn->close();
        }, function ($e) {
            echo "Could not connect: {$e->getMessage()}\n";
        });

        $loop->run();
    }
}
