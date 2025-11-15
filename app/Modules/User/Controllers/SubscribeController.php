<?php namespace App\Modules\User\Controllers;

use App\Controllers\UserController;
use App\Models\{MarketingModel, BudgetModel, MyMIGoldModel, SubscribeModel};

#[\AllowDynamicProperties]
class SubscribeController extends UserController
{
    private $siteSettings;

    public function __construct()
    {
        parent::__construct();
        // Load necessary models, libraries, etc.
        $this->marketingModel = new MarketingModel();
        $this->budgetModel = new BudgetModel();
        $this->mymigoldModel = new MyMIGoldModel();
        $this->subscribeModel = new SubscribeModel();
    }

    public function index()
    {
        $this->setCurrentUser();
        
        $data = $this->preparePageData('Automated', 'User_Subscribe');
        return $this->renderTheme('Subscribe/Index', $data);
    }

    public function Services()
    {
        $this->setCurrentUser();
        
        $data = $this->preparePageData('Automated', 'User_Subscribe_Services');
        return $this->renderTheme('Subscribe/Services', $data);
    }

    public function Submit()
    {
        $email = $this->request->getPost('email');
        $referral = $this->request->getPost('referral');

        $result = $this->subscribeModel->insertEmail($email, $referral);

        if (is_array($result) && !empty($result['success'])) {
            $this->invalidateCrudCache(['subscriptions']);
        }

        return $this->response->setJSON($result);
    }

    // The saveData function, assuming similar logic to the original CI3 version
    private function saveData($type = 'insert', $id = 0)
    {
        helper(['form', 'url']);
        $validation =  \Config\Services::validation();
    
        // Set validation rules
        $validation->setRules($this->referralModel->getValidationRules($type));
    
        $payload = [
            'id' => $id,
            'data' => $this->request->getPost()
        ];
    
        // Validate and process the data
        if (!$validation->withRequest($this->request)->run()) {
            return false;
        }
    
        // Prepare data and insert or update in database
        $data = $this->referralModel->prep_data($this->request->getPost());
        $result = false;
    
        if ($type == 'insert') {
            $id = $this->referralModel->insert($data);
            $result = is_numeric($id) ? $id : false;
        } else {
            $result = $this->referralModel->update($id, $data);
        }
    
        return $result;
    }
    
    protected function setCurrentUser()
    {
        $this->current_user = service('auth')->getCurrentUser();
        if ($this->current_user) {
            $this->current_user->user_img = gravatar_link($this->current_user->email, 22, $this->current_user->email, "{$this->current_user->email} Profile");
        }
    
        $this->template->set('current_user', $this->current_user);
    }
    
    private function preparePageData($pageType, $pageName)
    {
        $request = service('request');
        $pageURIA = $request->uri->getSegment(1);
        $pageURIB = $request->uri->getSegment(2);
        $pageURIC = $request->uri->getSegment(3);
        $pageURID = $request->uri->getSegment(4);
        $pageURIE = $request->uri->getSegment(5);
        // Add other URI segments and data as needed
    
        return [
            'pageType' => $pageType,
            'pageName' => $pageName,
            'pageURIA' => $pageURIA,
            'pageURIB' => $pageURIB,
            'pageURIC' => $pageURIC,
            'pageURID' => $pageURID,
            'pageURIE' => $pageURIE,
            // Other data as required
        ];
    }
}
