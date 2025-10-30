<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class AdvisorModel extends Model
{
    protected $table = 'bf_users_certified_advisors';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 'name', 'specialty', 'location', 'contact', 
        'bio', 'certifications', 'experience', 'fee_structure', 
        'created_at', 'updated_at'
    ];

    /**
     * Register a new advisor
     * @param array $data
     * @return int|bool
     */
    public function registerAdvisor(array $data)
    {
        return $this->insert($data);
    }

    /**
     * Get an advisor by ID
     * @param int $id
     * @return array|object|null
     */
    public function getAdvisor($id)
    {
        return $this->find($id);
    }

    /**
     * Update advisor details
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateAdvisor($id, array $data)
    {
        return $this->update($id, $data);
    }

    /**
     * Delete an advisor by ID
     * @param int $id
     * @return bool
     */
    public function deleteAdvisor($id)
    {
        return $this->delete($id);
    }

    /**
     * Get all advisors
     * @return array
     */
    public function getAllAdvisors()
    {
        return $this->findAll();
    }

    /**
     * Get advisors by specialty
     * @param string $specialty
     * @return array
     */
    public function getAdvisorsBySpecialty($specialty)
    {
        return $this->where('specialty', $specialty)->findAll();
    }
}
