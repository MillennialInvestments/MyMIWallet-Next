<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class DashboardModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'users';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['name', 'email', 'phone', 'message', 'title', 'url', 'keywords', 'user_id', 'goal_description', 'goal_type', 'goal_frequency', 'reward_amount'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_on';
    protected $updatedField         = 'modified_on';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'name'    => 'required|alpha|max_length[255]|is_unique[bf_contactus.name,id,{id}]',
        'email'   => 'required|valid_email|max_length[255]|is_unique[bf_contactus.email,id,{id}]',
        'phone'   => 'required|max_length[30]|is_unique[bf_contactus.phone,id,{id}]',
        'message' => 'alpha_dash|max_length[255]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    public $galleryPath;

    public function __construct()
    {
        parent::__construct();
        $this->galleryPath = realpath(ROOTPATH . 'public/images/');
    }

    public function prepData($postData)
    {
        // Your data preparation before saving to the database
    }

    public function getPromotionalBanners() { 
        return $this->db->table('bf_users_promotions')
                        ->where('active', 1)
                        ->get()
                        ->getResultArray();
    }
    
    public function getAllWallets($cuID)
    {
        return $this->db->table('bf_users_wallet')
                        ->where('user_id', $cuID)
                        ->get()
                        ->getResultArray();
    }

    public function getAnnouncements()
    {
        $currentMonth = date("F");
        $currentYear = date("Y");

        return $this->db->table('bf_announcements')
                        ->where('month', $currentMonth)
                        ->where('year', $currentYear)
                        ->orderBy('id', 'DESC')
                        ->get()
                        ->getResult();
    }

    public function getFeatures() {
        return $this->db->table('bf_users_memberships')->where('active', 1)->orderBy('feature_level', 'ASC')->orderBy('feature_name', 'ASC')->get()->getResultArray(); 
    }

    public function getFeatureInformation($featureIdentifier = null) {
        return $this->db->table('bf_users_memberships')->where('active', 1)->where('identifier', $featureIdentifier)->get()->getRowArray(); 
    }

    public function getPendingFeatures($featureIdentifier = null) {
        return $this->db->table('bf_users_memberships')->where('active', 0)->where('identifier', $featureIdentifier)->get()->getRowArray(); 
    }

    public function getUpcomingEconomicEvents() {
        $currentDateTime = date('Y-m-d H:i:s'); // Get the current date and time
        return $this->db->table('bf_investment_calendar')
                        ->where('date >=', $currentDateTime)
                        ->orderBy('date', 'ASC')
                        ->get()
                        ->getResultArray();
    }

    public function searchLinks($keyword) {
        return $this->like('keywords', $keyword)->findAll();
    }

    public function createGoal($data)
    {
        return $this->db->table('bf_users_goal_checklist')->insert($data);
    }

    public function getGoals($userId)
    {
        return $this->db->table('bf_users_goal_checklist')
                        ->where('status', 1)
                        ->orderBy('id', 'ASC')
                        ->get()
                        ->getResultArray();
    }

    public function updateGoal($id, $data)
    {
        return $this->db->table('bf_users_goal_checklist')->update($id, $data);
    }

    public function deleteGoal($id)
    {
        return $this->db->table('bf_users_goal_checklist')->delete($id);
    }

    public function logGoalCompletion($data)
    {
        $completionTable = $this->db->table('bf_users_goal_completions');
        return $completionTable->insert($data);
    }

    public function getCompletions($userId)
    {
        $completionTable = $this->db->table('bf_users_goal_completions');
        return $completionTable->where('user_id', $userId)->orderBy('completion_date', 'DESC')->get()->getResult();
    }
}
