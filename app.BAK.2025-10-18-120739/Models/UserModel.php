<?php

namespace App\Models;

use CodeIgniter\Model;
use Faker\Generator;
use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Entities\User;

/**
 * @method User|null first()
 */
#[\AllowDynamicProperties]
class UserModel extends Model
{
    protected $table          = 'users';
    // protected $table          = 'users';
    protected $primaryKey     = 'id';
    protected $returnType     = 'App\Entities\User';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
        'email', 'username', 'password_hash', '2fa_secret', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at', 'anonymous_id', 'ip_address', 'created_at', 'user_id', 'comment', 'ticker'
    ];
    protected $useTimestamps   = true;
    protected $validationRules = [
        'email'         => 'required|valid_email|is_unique[users.email,id,{id}]',
        'username'      => 'required|alpha_numeric_punct|min_length[3]|max_length[30]|is_unique[users.username,id,{id}]',
        'password_hash' => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $beforeInsert = ['sanitizeEmail'];
    protected $beforeUpdate = ['sanitizeEmail'];
    protected $afterInsert  = ['addToGroup', '_provisionDefaultSolana'];

    protected $auth;
    protected $session;
    public $cuID;

    public function __construct()
    {
        parent::__construct();
        $this->auth = service('authentication');
        $this->session = session();        
        
        $this->cuID = $this->auth->id() ?? $this->session->get('user_id');
        $cuID = $this->cuID;
        if (empty($this->cuID)) {
            log_message('debug', 'UserModel - no user session (public request).');
        }
    }
    /**
     * The id of a group to assign.
     * Set internally by withGroup.
     *
     * @var int|null
     */
    protected $assignGroup;
    protected function _provisionDefaultSolana(array $data)
    {
        try {
            $id = (int)($data['id'] ?? 0);
            if ($id > 0) {
                // Only if user has no default wallet
                $m = model(\App\Models\SolanaModel::class);
                $row = $m->getDefaultAddressFromExchangeTable($id);
                if (!$row) {
                    (new \App\Libraries\MyMISolana())->provisionDefaultPublicAddress($id);
                }
            }
        } catch (\Throwable $e) {
            log_message('error', 'UserModel::_provisionDefaultSolana: '.$e->getMessage());
        }
        return $data;
    }

    public function addComment($data) {
        return $this->db->table('bf_users_comments')->insert($data);
    }

    /**
     * If a default role is assigned in Config\Auth, will
     * add this user to that group. Will do nothing
     * if the group cannot be found.
     *
     * @param mixed $data
     *
     * @return mixed
     */
    protected function addToGroup($data)
    {
        if (is_numeric($this->assignGroup)) {
            $groupModel = model(GroupModel::class);
            $groupModel->addUserToGroup($data['id'], $this->assignGroup);
        }

        return $data;
    }

    public function banUser($userId)
    {
        return $this->update($userId, ['banned' => 1]);
    }

    public function bulkBanUsers(array $userIds): bool
    {
        if (empty($userIds)) {
            log_message('error', 'bulkBanUsers called with an empty userIds array.');
            return false;
        }
    
        try {
            return $this->builder()
                ->whereIn('id', $userIds)
                ->update(['banned' => 1]); // ✅ Key-value pair for update
        } catch (\Throwable $e) {
            log_message('critical', 'bulkBanUsers failed: ' . $e->getMessage());
            return false;
        }
    } 
    
    /**
     * Clears the group to assign to newly created users.
     *
     * @return $this
     */
    public function clearGroup()
    {
        $this->assignGroup = null;

        return $this;
    }

    public function getCommentsByTicker($ticker) {
        return $this->db->table('bf_users_comments')->where('ticker', $ticker)->orderBy('created_at', 'DESC')->findAll();
    }

    // Retrieve incomplete onboarding steps
    public function getIncompleteOnboardingSteps($userId)
    {
        $profile = $this->getOnboardingStatus($userId);
        if (!$profile) {
            return [];
        }

        $incompleteSteps = [];
        foreach ($profile as $step => $status) {
            if ($step !== 'id' && $step !== 'user_id' && $step !== 'reminder_last_sent' && $status == 0) {
                $incompleteSteps[] = $step;
            }
        }
        return $incompleteSteps;
    }

    // Retrieve onboarding status for a user
    public function getOnboardingStatus($userId)
    {
        return $this->db->table('bf_user_onboarding')->where('user_id', $userId)->get()->getRowArray();
    }

    public function getOrCreateAnonymousUser($ip) {
        $existingUser = $this->db->table('bf_users_anonymous')->where('ip_address', $ip)->first();

        if ($existingUser) {
            return $existingUser['anonymous_id'];
        }

        // Generate a new unique anonymous user
        do {
            $newAnonymousID = "anonymousUser" . rand(100000, 999999);
        } while ($this->where('anonymous_id', $newAnonymousID)->countAllResults() > 0);

        $this->insert([
            'anonymous_id' => $newAnonymousID,
            'ip_address' => $ip
        ]);

        return $newAnonymousID;
    }    

    public function getPublicToken($userId) {
        $query = $this->db->get_where('users', ['id' => $userId]);
        $user = $query->row_array();
        
        if (isset($user['public_token']) && !empty($user['public_token'])) {
            return $user['public_token'];
        } else {
            log_message('ERROR', 'Public token is missing for user: ' . $userId);
            // Optionally, you can generate a new token or handle this case as needed
            return null;
        }
    }
    
    public function getTierEmails($tierLevel) {
        return $this->db->table('users')
            ->select('bf_users.email')
            ->join('bf_users_subscriptions', 'bf_users.id = bf_users_subscriptions.user_id')
            ->where('bf_users_subscriptions.tier', $tierLevel)
            ->get()
            ->getResultArray();
    }
    
    public function getActiveUsers() {
        return $this->where('active', 1)->get()->getResultArray(); 
    }

    public function getActiveUsersForWalkthrough()
    {
        return $this->where('active', 1)->get()->getResultArray();
    }
    
    public function getPendingActivationUsers()
    {
        return $this->where('active', 0)
            ->where('activate_hash IS NOT NULL', null, false)
            ->get()
            ->getResultArray();
    }
    
    public function getPendingUsers() {
        return $this->where('active', 0)->get()->getResultArray(); 
    }

    public function getUsersByStatus(int $status = 1, string $search = null)
    {
        $builder = $this->where('active', $status);
    
        if (!empty($search)) {
            $builder = $builder->groupStart()
                ->like('email', $search)
                ->orLike('first_name', $search)
                ->orLike('last_name', $search)
                ->orLike('username', $search)
                ->groupEnd();
        }
    
        return $builder->get()->getResultArray();
    }
    
    // Update the getUserID method
    public function getUserID() {
        $authService = service('authentication');
        $sessionService = service('session');
    
        if ($authService->isLoggedIn()) {
            return $authService->id();
        }
    
        $userID = $authService->id() ?? $sessionService->get('user_id');
    
        if (empty($userID)) {
            log_message('info', 'UserModel - Could not retrieve user ID from authentication or session.');
            return null;
        }
    
        return $userID;
    }
    

    // Update the getUserInfo method
    public function getUserInfo($userID)
    {
        $user = $this->find($userID);

        if (!$user) {
            log_message('error', "User not found with ID: $userID");
            return null;
        }

        return $user;
    }

    public function getUserAccount($cuID) {
        return $this->select([
                    'id', 'email', 'username', 'first_name', 'middle_name', 'last_name', 'name_suffix',
                    'wallet_id', 'display_name', 'role_id', 'referrer', 'partner',
                    'kyc', 'kyc_verified', 'dob', 'ssn', 'organization', 'address',
                    'city', 'state', 'country', 'zipcode', 'mailing_address',
                    'employment', 'occupation', 'salary', 'proof_identity', 'proof_address',
                    'type', 'private_key', 'signup_date', 'last_login', 'referrer_code',
                ])
                ->where('id', $cuID)
                ->limit(1)
                ->get()
                ->getRowArray();
    }
    
    
    public function generateActivateHash()
    {
        $this->activate_hash = bin2hex(random_bytes(16));
        $this->save();
    }
    
    public function logAuthError(string $process, string $errorMessage)
    {
        $data = [
            'process'      => $process,
            'error_message'=> $errorMessage,
            'ip_address'   => service('request')->getIPAddress(),
            'user_agent'   => service('request')->getUserAgent(),
            'created_at'   => date('Y-m-d H:i:s'),
        ];
        $this->db->table('auth_errors')->insert($data);
    }
    
    /**
     * Logs a password reset attempt for posterity sake.
     */
    public function logResetAttempt(string $email, ?string $token = null, ?string $ipAddress = null, ?string $userAgent = null)
    {
        $this->db->table('auth_reset_attempts')->insert([
            'email'      => $email,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'token'      => $token,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Logs an activation attempt for posterity sake.
     */
    public function logActivationAttempt(?string $token = null, ?string $ipAddress = null, ?string $userAgent = null)
    {
        $this->db->table('auth_activation_attempts')->insert([
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'token'      => $token,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function unbanUser($userId)
    {
        return $this->update($userId, ['banned' => 0]);
    }
    
    // Update specific onboarding step
    public function updateOnboardingStep($userId, $step, $status = 1)
    {
        return $this->db->table('bf_user_onboarding')->where('user_id', $userId)->set([
            $step => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ])->update();
    }

    /**
     * Sets the group to assign any users created.
     *
     * @return $this
     */
    public function withGroup(string $groupName)
    {
        $group = $this->db->table('auth_groups')->where('name', $groupName)->get()->getFirstRow();

        $this->assignGroup = $group->id;

        return $this;
    }

    /**
     * Faked data for Fabricator.
     */
    public function fake(Generator &$faker): User
    {
        return new User([
            'email'    => $faker->email,
            'username' => $faker->userName,
            'password' => bin2hex(random_bytes(16)),
        ]);
    }
    
    public function getUserLoginActivity($cuID) {
        $builder = $this->db->table('auth_logins')
                        ->where('user_id', $cuID)
                        ->get()
                        ->getResultArray(); 
        return $builder; 
    }

    public function getUserWallets($cuID) { 
        $builder = $this->db->table('bf_users_wallet') 
                            ->where('user_id', $cuID)
                            ->where('status', 1)
                            ->where('active', 'Yes')
                            ->get()
                            ->getResultArray(); 
        return $builder; 
    }

    public function getUserNonCreditWallets($cuID) { 
        $builder = $this->db->table('bf_users_wallet') 
                            ->where('user_id', $cuID)
                            ->where('status', 1)
                            ->where('active', 'Yes')
                            ->where('wallet_type !=', 'Credit')
                            ->get()
                            ->getResultArray(); 
        return $builder; 
    }

    public function getUserCryptoWallets($cuID) { 
        $builder = $this->db->table('bf_users_crypto_accounts') 
                            ->where('user_id', $cuID)
                            ->where('status', 1)
                            ->where('deleted', 0)
                            ->get()
                            ->getResultArray(); 
        return $builder; 
    }

    public function getUserFinancialWallets($cuID) { 
        $bankAccounts = $this->db->table('bf_users_bank_accounts') 
                            ->where('user_id', $cuID)
                            ->where('status', 1)
                            ->where('deleted', 0)
                            ->get()
                            ->getResultArray(); 
        $creditAccounts = $this->db->table('bf_users_credit_accounts') 
                            ->where('user_id', $cuID)
                            ->where('status', 1)
                            ->where('deleted', 0)
                            ->get()
                            ->getResultArray(); 
        $debtAccounts = $this->db->table('bf_users_debt_accounts') 
                            ->where('user_id', $cuID)
                            ->where('status', 1)
                            ->where('deleted', 0)
                            ->get()
                            ->getResultArray(); 
        $builder = [
            'bankAccounts' => $bankAccounts, 
            'creditAccounts' => $creditAccounts,
            'debtAccounts' => $debtAccounts,
        ]; 

        return $builder; 
    }

    public function getUserInvestWallets($cuID) { 
        $builder = $this->db->table('bf_users_invest_accounts') 
                            ->where('user_id', $cuID)
                            ->where('status', 1)
                            ->where('deleted', 0)
                            ->get()
                            ->getResultArray(); 
        return $builder; 
    }

    protected function sanitizeEmail(array $data)
    {
        if (isset($data['data']['email'])) {
            $data['data']['email'] = strtolower(trim($data['data']['email']));
        }
        return $data;
    }
}
?>
