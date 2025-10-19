<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class AnalyticalModel extends Model {
    protected $table = 'bf_applications';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = []; // Add allowed fields here
    protected $useTimestamps = true;
    protected $createdField = 'created_on';
    protected $updatedField = 'modified_on';
    protected $deletedField = '';
    protected $validationRules = [
        'Name' => 'required|is_unique[bf_contactus.Name,id]|alpha|max_length[255]',
        'email' => 'required|is_unique[bf_contactus.email,id]|valid_email|max_length[255]',
        'phone' => 'required|is_unique[bf_contactus.phone,id]|max_length[30]',
        'message' => 'alpha_dash|max_length[255]',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public $gallery_path;

    public function __construct() {
        parent::__construct();
        $this->gallery_path = realpath(APPPATH . '../images/');
    }


    public function getActiveUsers() {
        $activeUsersQuery = $this->db->table('users')
                                     ->where('active', 1)
                                     ->where('banned', 0)
                                     ->get();
    
        $activeUsers = $activeUsersQuery->getResultArray(); // This gets the result set
        $totalActiveUsers = count($activeUsers); // Count the number of active users
    
        return [
            'getActiveUsers' => $activeUsers,
            'totalActiveUsers' => $totalActiveUsers
        ];
    }

    public function getPendingUsers() {
        $pendingUsersQuery = $this->db->table('users')
                        ->where('active', 0)
                        ->get();
        
        $pendingUsers = $pendingUsersQuery->getResult(); 
        $totalPendingUsers = count($pendingUsers); 

        return [
            'getPendingUsers' => $pendingUsers,
            'totalPendingUsers' => $totalPendingUsers,
        ];
    }

    public function getActivePartners() {
        $activePartnersQuery = $this->db->table('users')
                        ->where('active', 1)
                        ->groupStart()
                        ->where('type', 'Partner')
                        ->orWhere('partner', 1)
                        ->groupEnd()
                        ->get()
                        ->getResultArray();

        $activePartners = $activePartnersQuery; 
        $totalActivePartners = count($activePartners); 

        return [
            'getActivePartners' => $activePartners,
            'totalActivePartners' => $totalActivePartners,
        ]; 
    }

    public function getPendingPartners() {
        $pendingPartnersQuery = $this->db->table('users')
                        ->where('active', 0)
                        ->where('partner', 1)
                        ->get();
        
        $pendingPartners = $pendingPartnersQuery->getResult(); 
        $totalPendingPartners = count($pendingPartners); 

        return [
            'getPendingPartners' => $pendingPartners,
            'totalPendingPartners' => $totalPendingPartners,
        ];
    }

    public function getActiveReferrals() {
        $activeReferralsQuery = $this->db->table('users')
                                         ->where('active', 1)
                                         ->where('referred !=', null)
                                         ->get();
    
        $activeReferrals = $activeReferralsQuery->getResult();
        $totalActiveReferrals = count($activeReferrals);
    
        return [
            'getActiveReferrals' => $activeReferrals,
            'totalActiveReferrals' => $totalActiveReferrals,
        ];
    }
    
    public function getActivePartnerReferrals() {
        $activePartnerReferralsQuery = $this->db->table('users')
                                                ->where('active', 1)
                                                ->where('referred !=', null)
                                                ->get();
    
        $activePartnerReferrals = $activePartnerReferralsQuery->getResult();
        $totalActivePartnerReferrals = count($activePartnerReferrals);
    
        return [
            'getActivePartnerReferrals' => $activePartnerReferrals,
            'totalActivePartnerReferrals' => $totalActivePartnerReferrals,
        ];
    }

    // Custom methods based on your CI3 model

    public function getActiveCampaigns() {
        $activeCampaignsQuery = $this->db->table('bf_marketing_campaigns')
                                         ->where('status', 1)
                                         ->orderBy('created_on', 'DESC')
                                         ->get();
    
        $activeCampaigns = $activeCampaignsQuery->getResult();
        $totalActiveCampaigns = count($activeCampaigns);
    
        return [
            'getActiveCampaigns' => $activeCampaigns,
            'totalActiveCampaigns' => $totalActiveCampaigns,
        ];
    }

    public function getActiveCampaignsLimited($limit = 25) {
        $activeCampaignsQuery = $this->db->table('bf_marketing_campaigns')
                                         ->where('status', 1)
                                         ->orderBy('created_on', 'DESC')
                                         ->limit($limit)
                                         ->get();
    
        $activeCampaigns = $activeCampaignsQuery->getResult();
        $totalActiveCampaigns = count($activeCampaigns);
    
        return [
            'getActiveCampaigns' => $activeCampaigns,
            'totalActiveCampaigns' => $totalActiveCampaigns,
        ];
    }

    public function getInactiveUsers() {
        $inactiveUsersQuery = $this->db->table('users')
                                       ->where('active', 0)
                                       ->where('banned', 0)
                                       ->get();
    
        $inactiveUsers = $inactiveUsersQuery->getResultArray();
        $totalInactiveUsers = count($inactiveUsers);
    
        return [
            'getInactiveUsers' => $inactiveUsers,
            'totalInactiveUsers' => $totalInactiveUsers,
        ];
    }
    
    public function getInactivePartners() {
        $inactivePartnersQuery = $this->db->table('users')
                                          ->where('active', 0)
                                          ->where('banned', 0)
                                          ->where('partner', 1)
                                          ->get();
    
        $inactivePartners = $inactivePartnersQuery->getResult();
        $totalInactivePartners = count($inactivePartners);
    
        return [
            'getInactivePartners' => $inactivePartners,
            'totalInactivePartners' => $totalInactivePartners,
        ];
    }
    
    public function getActiveServices() {
        $activeServicesQuery = $this->db->table('bf_users_services')
                                        ->where('status', 1)
                                        ->get();
    
        $activeServices = $activeServicesQuery->getResult();
        $totalActiveServices = count($activeServices);
    
        return [
            'getActiveServices' => $activeServices,
            'totalActiveServices' => $totalActiveServices,
        ];
    }
    
    public function getActiveServicesSubscriptions() {
        $activeServicesSubscriptionsQuery = $this->db->table('bf_users_services_purchases')
                                                      ->where('status', 'Active')
                                                      ->get();
    
        $activeServicesSubscriptions = $activeServicesSubscriptionsQuery->getResult();
        $totalActiveServicesSubscriptions = count($activeServicesSubscriptions);
    
        return [
            'getActiveServicesSubscriptions' => $activeServicesSubscriptions,
            'totalActiveServicesSubscriptions' => $totalActiveServicesSubscriptions,
        ];
    }
    
    public function getTasksByDepartment($department) {
        $tasksByDepartmentQuery = $this->db->table('bf_management_tasks')
                                           ->where('status', 'Pending')
                                           ->where('group', $department)
                                           ->get();
    
        $tasksByDepartment = $tasksByDepartmentQuery->getResult();
        $totalTasksByDepartment = count($tasksByDepartment);
    
        return [
            'getTasksByDepartment' => $tasksByDepartment,
            'totalTasksByDepartment' => $totalTasksByDepartment,
        ];
    }
    
    public function getTasksByType($department, $tasks) {
        $tasksByTypeQuery = $this->db->table('bf_management_tasks')
                                     ->where('status', 'Pending')
                                     ->where('group', $department)
                                     ->where('task', $tasks)
                                     ->get();
    
        $tasksByType = $tasksByTypeQuery->getResult();
        $totalTasksByType = count($tasksByType);
    
        return [
            'getTasksByType' => $tasksByType,
            'totalTasksByType' => $totalTasksByType,
        ];
    }
    
    public function getUserInformation($userID) {
        $userInformationQuery = $this->db->table('users')
                                         ->where('id', $userID)
                                         ->get();
    
        $userInformation = $userInformationQuery->getRow();
        return $userInformation;
    }
    
    public function getUserActivity($cuID) {
        $userActivityQuery = $this->db->table('bf_act_logger')
                                      ->where('created_by', $cuID)
                                      ->get();
    
        $userActivity = $userActivityQuery->getResult();
        $totalUserActivity = count($userActivity);
    
        return [
            'getUserActivity' => $userActivity,
            'totalUserActivity' => $totalUserActivity,
        ];
    }
    
    public function getUsersActivity() {
        $usersActivityQuery = $this->db->table('bf_act_logger')
                                       ->get();
    
        $usersActivity = $usersActivityQuery->getResult();
        $totalUsersActivity = count($usersActivity);
    
        return [
            'getUsersActivity' => $usersActivity,
            'totalUsersActivity' => $totalUsersActivity,
        ];
    }

    public function getPendingAssets() {
        $today = date("Y-m-d");
        $pendingAssetsQuery = $this->db->table('bf_exchanges_listing_request')
                                       ->where('status !=', 'Approved')
                                       ->where('date <=', $today)
                                       ->get();
    
        $pendingAssets = $pendingAssetsQuery->getResult();
        $totalPendingAssets = count($pendingAssets);
    
        return [
            'getPendingAssets' => $pendingAssets,
            'totalPendingAssets' => $totalPendingAssets,
        ];
    }
    
    public function getPendingAssetById($appID) {
        $pendingAsset = $this->db->table('bf_exchanges_listing_request')
                                 ->where('id', $appID)
                                 ->get()
                                 ->getRow();
    
        return $pendingAsset ? ['pendingAsset' => $pendingAsset] : null;
    }
    
    public function getApprovedAssets() {
        $approvedAssetsQuery = $this->db->table('bf_exchanges_assets')
                                        ->select('id, first_name, last_name, name_suffix, blockchain, blockchain_name, coin_quantity, coin_address, coin_logo, coin_name, coin_value, listing_type, discord, facebook, telegram, twitter, website, market_cap, symbol, volume, volume_array')
                                        ->where('status', 'Approved')
                                        ->where('market_cap IS NOT NULL', null, false)
                                        ->orderBy('market_cap', 'DESC')
                                        ->limit(100)
                                        ->get();
    
        $approvedAssets = $approvedAssetsQuery->getResultArray();
        $totalApprovedAssets = count($approvedAssets);
    
        return [
            'getApprovedAssets' => $approvedAssets,
            'totalApprovedAssets' => $totalApprovedAssets,
        ];
    }
    
    public function getApprovedAssetById($appID) {
        $approvedAsset = $this->db->table('bf_exchanges_assets')
                                  ->where('id', $appID)
                                  ->get()
                                  ->getRow();
    
        return $approvedAsset ? ['approvedAsset' => $approvedAsset] : null;
    }
    
    public function getPendingPartnerAssets() {
        $today = date("Y-m-d");
        $pendingPartnerAssetsQuery = $this->db->table('bf_exchanges_listing_request')
                                              ->where('status !=', 'Viewed')
                                              ->where('date <=', $today)
                                              ->where('partner', 1)
                                              ->get();
    
        $pendingPartnerAssets = $pendingPartnerAssetsQuery->getResult();
        $totalPendingPartnerAssets = count($pendingPartnerAssets);
    
        return [
            'getPendingPartnerAssets' => $pendingPartnerAssets,
            'totalPendingPartnerAssets' => $totalPendingPartnerAssets,
        ];
    }
    
    public function getApprovedPartnerAssets() {
        $approvedPartnerAssetsQuery = $this->db->table('bf_exchanges_assets')
                                               ->where('status', 'Approved')
                                               ->where('partner', 1)
                                               ->get()
                                               ->getResultArray();
    
        $approvedPartnerAssets = $approvedPartnerAssetsQuery;
        $totalApprovedPartnerAssets = count($approvedPartnerAssets);
    
        return [
            'getApprovedPartnerAssets' => $approvedPartnerAssets,
            'totalApprovedPartnerAssets' => $totalApprovedPartnerAssets,
        ];
    }

    public function getPendingAssetInformation($appID) {
        return $this->db->table('bf_exchanges_listing_request')
                        ->where('id', $appID)
                        ->get()
                        ->getRow();
    }
    
    public function migrateAssetRequestInfo($appID) {
        $assetRequest = $this->db->table('bf_exchanges_listing_request')
                                 ->where('id', $appID)
                                 ->get()
                                 ->getRow();
        if ($assetRequest) {
            $existingAsset = $this->getApprovedAssetById($appID);
            if (empty($existingAsset)) {
                $this->db->table('bf_exchanges_assets')
                         ->insert((array)$assetRequest);
            } else {
                $this->db->table('bf_exchanges_assets')
                         ->where('id', $appID)
                         ->update((array)$assetRequest);
            }
            $this->db->table('bf_exchanges_listing_request')
                     ->where('id', $appID)
                     ->update(['status' => 'Approved', 'date' => date("Y-m-d"), 'time' => time()]);
        }
    }
    
    public function updateAssetStatus($appID, $assetStatus) {
        $this->db->table('bf_exchanges_assets')
                 ->where('id', $appID)
                 ->update(['status' => $assetStatus]);
    }
    
    public function updatePendingAssetStatus($appID, $assetStatus) {
        $this->db->table('bf_exchanges_listing_request')
                 ->where('id', $appID)
                 ->update(['status' => $assetStatus]);
    }
    
    public function getTotalTransactions() {
        return $this->db->table('bf_exchanges_orders')
                        ->where('status', 'Closed')
                        ->get()
                        ->getResult();
    }
    
    public function getTotalWalletTransactions() {
        $totalWalletTransactionsQuery = $this->db->table('bf_users_wallet_transactions')
                        ->where('status', 1)
                        ->where('active', 'Yes')
                        ->get();
        
        $getTotalWalletTransactions = $totalWalletTransactionsQuery->getResult(); 
        $totalWalletTransactions = count($getTotalWalletTransactions); 

        return [
            'getTotalWalletTransaction' => $getTotalWalletTransactions,
            'totalWalletTransactions' => $totalWalletTransactions,
        ];
    }
    
    public function getTotalAmounts() {
        return $this->db->table('bf_exchanges_orders')
                        ->selectSum('amount')
                        ->selectSum('fees')
                        ->where('status', 'Closed')
                        ->get()
                        ->getResultArray();
    }
    
    public function getLastTotalAmount() {
        return $this->db->table('bf_exchanges_orders')
                        ->selectSum('amount')
                        ->selectSum('fees')
                        ->where('status', 'Closed')
                        ->get()
                        ->getRowArray();
    }
    
    public function getTotalPartnerAmounts() {
        $partnerAssets = $this->getApprovedPartnerAssets();
        $totals = [];
        foreach ($partnerAssets['getApprovedPartnerAssets'] as $partnerAsset) {
            $totals[] = $this->db->table('bf_exchanges_orders')
                                 ->selectSum('amount')
                                 ->selectSum('fees')
                                 ->where('market', $partnerAsset->symbol)
                                 ->orderBy('id', 'DESC')
                                 ->limit(1)
                                 ->get()
                                 ->getResultArray();
        }
        return $totals;
    }
    
    public function getPendingSupport($department) {
        $builder = $this->db->table('bf_support_requests')
                            ->where('status', 'Pending')
                            ->where('topic', $department);
        return $builder->get()->getResult();
    }
    
    public function getPendingPartnerSupport($department) {
        $builder = $this->db->table('bf_support_requests')
                            ->where('status', 'Pending')
                            ->where('partner', 1)
                            ->where('topic', $department);
        return $builder->get()->getResult();
    }
    
    public function getCompleteSupport($department) {
        $builder = $this->db->table('bf_support_requests')
                            ->where('status', 'Complete')
                            ->where('topic', $department);
        return $builder->get()->getResult();
    }
    
    public function getCompletePartnerSupport($department) {
        $builder = $this->db->table('bf_support_requests')
                            ->where('status', 'Complete')
                            ->where('partner', 1)
                            ->where('topic', $department);
        return $builder->get()->getResult();
    }
    
    public function getTotalTradesTracked() {
        $totalTradesTrackedQuery = $this->db->table('bf_users_trades')
                        ->where('order_status', 'OPENING')
                        ->get()
                        ->getResult();

        $getTotalTradesTracked = $totalTradesTrackedQuery;
        $totalTradesTracked = count($getTotalTradesTracked);

        return [
            'getTotalTradesTracked' => $getTotalTradesTracked,
            'totalTradesTracked' => $totalTradesTracked,
        ];
    }
    
    public function getTradesByUser($userID) {
        return $this->db->table('bf_users_trades')
                        ->where('user_id', $userID)
                        ->get()
                        ->getResult();
    }
    
    public function getTotalActiveWallets() {
        $totalActiveWalletsQuery = $this->db->table('bf_users_wallet')
                        ->where('status', 1)
                        ->where('active', 1)
                        ->get()
                        ->getResultArray();

        $getTotalActiveWallets = $totalActiveWalletsQuery; 
        $totalActiveWallets = count($getTotalActiveWallets); 

        return [
            'getTotalActiveWallets' => $getTotalActiveWallets,
            'totalWalletsCreated' => $totalActiveWallets,
        ];
    }
    
    public function getTotalActiveDefaultWallets() {
        $totalDefaultWalletsQuery = $this->db->table('bf_users_wallet')
                        ->where('active', 1)
                        ->where('default_wallet', 'Yes')
                        ->get()
                        ->getResult();

        $getTotalDefaultWallets = $totalDefaultWalletsQuery; 
        $totalDefaultWallets = count($getTotalDefaultWallets); 

        return [
            'getTotalDefaultWallets' => $getTotalDefaultWallets,
            'totalDefaultWallets' => $totalDefaultWallets,
        ];
    }
    
    public function getTotalActiveWalletsByUser($userID) {
        return $this->db->table('bf_users_wallet')
                        ->where('active', 1)
                        ->where('user_id', $userID)
                        ->get()
                        ->getResult();
    }

    public function get_tasks_by_department($department) {
        $builder = $this->db->table('bf_management_tasks')
                            ->where('status', 'Pending')
                            ->where('group', $department);
        $result = $builder->get()->getResultArray(); 
        $num_rows = count($result);
        return ['result' => $result, 'num_rows' => $num_rows];
    }
    
    public function get_tasks_by_type($department, $tasks) {
        $builder = $this->db->table('bf_management_tasks')
                            ->where('status', 'Pending')
                            ->where('group', $department)
                            ->where('task', $tasks);
        $result = $builder->get()->getResultArray(); 
        $num_rows = count($result);
        return ['result' => $result, 'num_rows' => $num_rows];
    }

    public function getBlogPosts() {
        $builder = $this->db->table('bf_marketing_scraper')
                            ->where('status', 'In Review')
                            ->where('type', 'Email/Newsletters')
                            ->order_by('id', 'DESC')
                            ->get()
                            ->getResultArray(); 
        return $builder; 
    }
}
