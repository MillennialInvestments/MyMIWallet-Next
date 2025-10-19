<?php namespace App\Libraries;

use App\Libraries\{BaseLoader};
use App\Models\InstitutesModel;

#[\AllowDynamicProperties]
class MyMIInstitutes
{

    protected $institutesModel;

    public function __construct()
    {
        $this->institutesModel = new InstitutesModel();
    }

    public function registerInstitute($data)
    {
        return $this->institutesModel->registerInstitute($data);
    }

    public function getInstitute($id)
    {
        return $this->institutesModel->getInstitute($id);
    }

    public function updateInstitute($id, $data)
    {
        return $this->institutesModel->updateInstitute($id, $data);
    }

    public function deleteInstitute($id)
    {
        return $this->institutesModel->deleteInstitute($id);
    }

    public function getAllInstitutes()
    {
        return $this->institutesModel->getAllInstitutes();
    }

    public function getInstitutesBySpecialty($specialty)
    {
        return $this->institutesModel->getInstitutesBySpecialty($specialty);
    }
}
?>
