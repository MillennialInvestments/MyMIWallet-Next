<?php namespace App\Modules\User\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use Myth\Auth\Authorization\GroupModel;
use App\Config\{Auth, SiteSettings, SocialMedia};
use App\Controllers\UserController;
use App\Libraries\{MyMIInstitutes, MyMIBudget, MyMIDashboard, MyMIUser};
use App\Models\{AccountsModel, InstitutesModel, BudgetModel, UserModel};
use CodeIgniter\API\ResponseTrait;

#[\AllowDynamicProperties]
class InstitutesController extends UserController
{
    protected $auth;
    protected $helpers = ['auth', 'form', 'url'];
    protected $library;
    protected $session;
    protected $siteSettings;
    protected $institutesModel;
    protected $budgetModel;
    protected $userModel;

    public function __construct()
    {
        $this->auth = service('authentication');
        $this->session = Services::session();
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug;
        $this->institutesModel = new InstitutesModel();
        $this->budgetModel = new BudgetModel();
        // $this->userModel = new UserModel();
//         $this->MyMIInstitutes = new MyMIInstitutes(); // replaced by BaseController getter
//         $this->MyMIBudget = new MyMIBudget(); // replaced by BaseController getter
//         $this->MyMIDashboard = new MyMIDashboard(); // replaced by BaseController getter
        
    }

    public function commonData(): array
    {
        $this->data = parent::commonData();
        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['beta'] = (string)$this->siteSettings->beta;
        $this->data['uri'] = $this->request->getUri();
        $this->data['userAgent'] = $this->request->getUserAgent();
        $this->data['date'] = $this->siteSettings->date;
        $this->data['time'] = $this->siteSettings->time;
        $this->data['hostTime'] = $this->siteSettings->hostTime;
        $this->data['cuID'] = $this->cuID;
        $this->data['cuRole'] = $this->getMyMIUser()->getUserInformation($this->cuID)['cuRole'] ?? 4;
        $this->data['cuUserType'] = $this->getMyMIUser()->getUserInformation($this->cuID)['cuUserType'] ?? '';
        $this->data['cuEmail'] = $this->getMyMIUser()->getUserInformation($this->cuID)['cuEmail'] ?? '';
        $this->data['cuDisplayName'] = $this->getMyMIUser()->getUserInformation($this->cuID)['cuDisplayName'] ?? '';
        $this->data['cuUsername'] = $this->getMyMIUser()->getUserInformation($this->cuID)['cuUsername'] ?? '';
        $this->data['cuNameInitials'] = $this->getMyMIUser()->getUserInformation($this->cuID)['cuNameInitials'] ?? '';
        $this->data['cuKYC'] = $this->getMyMIUser()->getUserInformation($this->cuID)['cuKYC'] ?? '';
        $this->data['totalAccountBalance'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalance'];
        $this->data['totalAccountBalanceFMT'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalanceFMT'];
        $this->data['cuSolanaDW'] = $this->getMyMIDashboard()->getCryptoAccount($this->cuID, 'Solana')['accountInfo'];
        $this->data['completedGoals'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['progressGoalData']['completions'];
        $this->data['pendingGoals'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['progressGoalData']['goals'];
        $this->data['promotionalBanners'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['promotionalBanners'];
        $this->data['getIncomeYTDSummary'] = $this->budgetModel->getIncomeYTDSummary($this->cuID);
        $this->data['getExpenseYTDSummary'] = $this->budgetModel->getExpenseYTDSummary($this->cuID);
        return $this->data;
}

    public function index()
    {
        $this->data['pageTitle'] = 'Financial Institutions | MyMI Wallet | The Future of Finance';
        $this->commonData();
        $this->data['institutes'] = $this->MyMIInstitutes->getAllInstitutes();
        return $this->renderTheme('App\Modules\User\Views\Institutes\index', $this->data);
    }

    public function register()
    {
        if ($this->request->getMethod() == 'post') {
            $instituteData = [
                'user_id' => $this->request->getPost('user_id'),
                'name' => $this->request->getPost('name'),
                'specialty' => $this->request->getPost('specialty'),
                'location' => $this->request->getPost('location'),
                'contact' => $this->request->getPost('contact'),
                'bio' => $this->request->getPost('bio'),
                'certifications' => $this->request->getPost('certifications'),
                'experience' => $this->request->getPost('experience'),
                'fee_structure' => $this->request->getPost('fee_structure')
            ];
            $this->MyMIInstitutes->registerInstitute($instituteData);
            return redirect()->to('/Institutes');
        }

        $this->data['pageTitle'] = 'Register Financial Institution | MyMI Wallet | The Future of Finance';
        $this->commonData();
        $this->data['users'] = $this->userModel->findAll();
        return $this->renderTheme('App\Modules\User\Views\Institutes\register', $this->data);
    }

    public function view($id)
    {
        $this->data['pageTitle'] = 'View Financial Institution | MyMI Wallet | The Future of Finance';
        $this->commonData();
        $this->data['institute'] = $this->MyMIInstitutes->getInstitute($id);
        return $this->renderTheme('App\Modules\User\Views\Institutes\view', $this->data);
    }

    public function edit($id)
    {
        if ($this->request->getMethod() == 'post') {
            $instituteData = [
                'name' => $this->request->getPost('name'),
                'specialty' => $this->request->getPost('specialty'),
                'location' => $this->request->getPost('location'),
                'contact' => $this->request->getPost('contact'),
                'bio' => $this->request->getPost('bio'),
                'certifications' => $this->request->getPost('certifications'),
                'experience' => $this->request->getPost('experience'),
                'fee_structure' => $this->request->getPost('fee_structure')
            ];
            $this->MyMIInstitutes->updateInstitute($id, $instituteData);
            return redirect()->to('/Institutes/view/' . $id);
        }

        $this->data['pageTitle'] = 'Edit Financial Institution | MyMI Wallet | The Future of Finance';
        $this->commonData();
        $this->data['institute'] = $this->MyMIInstitutes->getInstitute($id);
        return $this->renderTheme('App\Modules\User\Views\Institutes\edit', $this->data);
    }

    public function delete($id)
    {
        $this->MyMIInstitutes->deleteInstitute($id);
        return redirect()->to('/Institutes');
    }

    public function filterBySpecialty($specialty)
    {
        $this->data['pageTitle'] = 'Financial Institutions | MyMI Wallet | The Future of Finance';
        $this->commonData();
        $this->data['institutes'] = $this->MyMIInstitutes->getInstitutesBySpecialty($specialty);
        return $this->renderTheme('App\Modules\User\Views\Institutes\index', $this->data);
    }
}
?>
