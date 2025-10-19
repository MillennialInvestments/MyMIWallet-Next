<?php namespace App\Libraries;

use App\Libraries\{BaseLoader, MyMICoin, MyMIGold, MyMINotifications, MyMISolana, MyMIWallet};
use App\Models\AdvisorModel;

#[\AllowDynamicProperties]
class MyMIAdvisors
{

    protected $advisorModel;

    public function __construct()
    {
        $this->advisorModel = new AdvisorModel();
    }

    public function registerAdvisor($data)
    {
        return $this->advisorModel->registerAdvisor($data);
    }

    public function getAdvisor($id)
    {
        return $this->advisorModel->getAdvisor($id);
    }

    public function updateAdvisor($id, $data)
    {
        return $this->advisorModel->updateAdvisor($id, $data);
    }

    public function deleteAdvisor($id)
    {
        return $this->advisorModel->deleteAdvisor($id);
    }

    public function getAllAdvisors()
    {
        return $this->advisorModel->getAllAdvisors();
    }

    public function getAdvisorsBySpecialty($specialty)
    {
        return $this->advisorModel->getAdvisorsBySpecialty($specialty);
    }
}
