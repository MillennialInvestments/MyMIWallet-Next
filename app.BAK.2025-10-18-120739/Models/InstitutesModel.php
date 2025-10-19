<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class InstitutesModel extends Model
{
    protected $table = 'bf_users_financial_institutions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'name', 'specialty', 'location', 'contact', 'bio', 'certifications', 'experience', 'fee_structure', 'created_at', 'updated_at'];

    public function registerInstitute(array $data)
    {
        return $this->insert($data);
    }

    public function getInstitute($id)
    {
        return $this->find($id);
    }

    public function updateInstitute($id, array $data)
    {
        return $this->update($id, $data);
    }

    public function deleteInstitute($id)
    {
        return $this->delete($id);
    }

    public function getAllInstitutes()
    {
        return $this->findAll();
    }

    public function getInstitutesBySpecialty($specialty)
    {
        return $this->where('specialty', $specialty)->findAll();
    }
}
?>
