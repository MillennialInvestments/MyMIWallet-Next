<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class DesignModel extends Model
{
    protected $table                = 'bf_applications';
    protected $primaryKey           = 'id';
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $createdField         = 'created_on';
    protected $updatedField         = 'modified_on';
    protected $allowedFields        = [
        'field1', 'field2', 'field3', // Replace with actual field names
    ];
    protected $validationRules      = [
        'Name' => 'required|is_unique[bf_contactus.Name,bf_contactus.id]|alpha|max_length[255]',
        'email' => 'required|is_unique[bf_contactus.email,bf_contactus.id]|valid_email|max_length[255]',
        'phone' => 'required|is_unique[bf_contactus.phone,bf_contactus.id]|max_length[30]',
        'message' => 'alpha_dash|max_length[255]'
    ];
    protected $skipValidation       = false;

    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Add a new dashboard record.
     */
    public function addDashboard($data)
    {
        return $this->db->table('bf_dashboards')->insert($data);
    }

    /**
     * Edit a dashboard record.
     */
    public function editDashboard($id, $data)
    {
        return $this->db->table('bf_dashboards')->where('id', $id)->update($data);
    }

    /**
     * Delete a dashboard record.
     */
    public function deleteDashboard($id)
    {
        return $this->db->table('bf_dashboards')->where('id', $id)->delete();
    }

    /**
     * Add a new dashboard navbar record.
     */
    public function addDashboardNavbar($data)
    {
        return $this->db->table('bf_dashboard_navbar')->insert($data);
    }

    /**
     * Edit a dashboard navbar record.
     */
    public function editDashboardNavbar($id, $data)
    {
        return $this->db->table('bf_dashboard_navbar')->where('id', $id)->update($data);
    }

    /**
     * Delete a dashboard navbar record.
     */
    public function deleteNavbar($id)
    {
        return $this->db->table('bf_dashboard_navbar')->where('id', $id)->delete();
    }

    /**
     * Add a new indash navbar record.
     */
    public function addIndashNavbar($data)
    {
        return $this->db->table('bf_dashboard_navbar_indash')->insert($data);
    }

    /**
     * Edit an indash navbar record.
     */
    public function editIndashNavbar($id, $data)
    {
        return $this->db->table('bf_dashboard_navbar_indash')->where('id', $id)->update($data);
    }

    /**
     * Delete an indash navbar record.
     */
    public function deleteIndashNavbar($id)
    {
        return $this->db->table('bf_dashboard_navbar_indash')->where('id', $id)->delete();
    }

    /**
     * Add a new construction task.
     */
    public function addConstructionTasks($data)
    {
        return $this->db->table('bf_dashboard_construction_to_do_list')->insert($data);
    }

    /**
     * Add a new construction subtask.
     */
    public function addConstructionSubtasks($data)
    {
        return $this->db->table('bf_dashboard_construction_to_do_list')->insert($data);
    }

    /**
     * Mark a construction task as complete.
     */
    public function completeConstructionTasks($id, $completed)
    {
        return $this->db->table('bf_dashboard_construction_to_do_list')->where('id', $id)->update(['completed' => $completed]);
    }

    /**
     * Mark a construction task as not complete.
     */
    public function notCompleteConstructionTasks($id, $completed)
    {
        return $this->db->table('bf_dashboard_construction_to_do_list')->where('id', $id)->update(['completed' => $completed]);
    }

    /**
     * Update construction tasks.
     */
    public function updateConstructionTasks($id, $data)
    {
        return $this->db->table('bf_dashboard_construction_to_do_list')->where('id', $id)->update($data);
    }

    /**
     * Delete a construction task.
     */
    public function deleteConstructionTasks($id)
    {
        return $this->db->table('bf_dashboard_construction_to_do_list')->where('id', $id)->delete();
    }

    /**
     * Add a new dashboard upgrade.
     */
    public function addDashboardUpgrade($data)
    {
        return $this->db->table('bf_dashboard_upgrade')->insert($data);
    }

    /**
     * Edit a dashboard upgrade.
     */
    public function editDashboardUpgrade($id, $data)
    {
        return $this->db->table('bf_dashboard_upgrade')->where('id', $id)->update($data);
    }

    /**
     * Delete a dashboard upgrade.
     */
    public function deleteUpgrade($id)
    {
        return $this->db->table('bf_dashboard_upgrades')->where('id', $id)->delete();
    }

    /**
     * Update inventory.
     */
    public function inventoryUpdate($data)
    {
        return $this->db->table('bf_asset_management')->insert($data);
    }

    /**
     * Add a new residential TV mount.
     */
    public function addResidentialTvMount($data)
    {
        return $this->db->table('bf_project_scheduling')->insert($data);
    }

    /**
     * Send a message.
     */
    public function sendMessage($data)
    {
        return $this->db->table('bf_messaging')->insert($data);
    }

    /**
     * Reply to a message.
     */
    public function messageReply($data)
    {
        return $this->db->table('bf_messaging')->insert($data);
    }

    /**
     * Delete a message.
     */
    public function deleteMessage($id)
    {
        return $this->db->table('bf_dashboard_upgrades')->where('id', $id)->delete();
    }

    /**
     * Add a new contractor.
     */
    public function addContractors($data)
    {
        return $this->db->table('bf_contractors')->insert($data);
    }

    /**
     * Ask a question.
     */
    public function askQuestion($data)
    {
        return $this->db->table('bf_questions')->insert($data);
    }

    /**
     * Submit a suggestion.
     */
    public function submitSuggestion($data)
    {
        return $this->db->table('bf_suggestions')->insert($data);
    }
}
