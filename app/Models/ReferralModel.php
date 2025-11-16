<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class ReferralModel extends Model
{
    protected $table = 'bf_users_referral_program';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['user_id', 'referrer_code', 'active', 'signup_date', 'user_type', 'first_name', 'last_name', 'email', 'phone', 'address', 'city', 'state', 'country', 'zipcode', 'paypal', 'other_payment', 'user_ip_address', 'total_spend', 'days_active'];
    protected $beforeInsert = [];
    protected $beforeUpdate = [];
    protected $validationRules = [
        'name' => 'required|alpha_space|max_length[255]',
        'email' => 'required|valid_email|max_length[255]',
        'phone' => 'required|max_length[30]',
        'message' => 'permit_empty|alpha_dash|max_length[255]',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    protected $createdField = 'created_on';
    protected $updatedField = 'modified_on';
    protected $deletedField = 'deleted_on';

    public function apply($data)
    {
        return $this->insert($data);
    }

    public function updateReferral($id, $data)
    {
        return $this->update($id, $data);
    }

    public function updateUser($userId, $signupDate, $referrerCode, $firstName, $lastName)
    {
        $data = [
            'ref_signup_date' => $signupDate,
            'referrer'        => 'Yes',
            'referrer_code'   => $referrerCode,
            'first_name'      => $firstName,
            'last_name'       => $lastName,
        ];

        return $this->update($userId, $data);
    }

    public function affiliateAccountSetup($userId, $referrerCode, $basicCode, $premiumCode, $goldCode)
    {
        $data = [
            'links_created' => 1,
            'basic_code'    => $basicCode,
            'premium_code'  => $premiumCode,
            'gold_code'     => $goldCode,
        ];

        return $this->set($data)
                    ->where('user_id', $userId)
                    ->update();
    }

    public function activateAffiliate($id)
    {
        $data = ['active' => 1];

        return $this->set($data)
                    ->where('id', $id)
                    ->update();
    }
        
    public function getAllReferrals()
    {
        log_message('debug', 'ReferralModel L78 - $cuReferrerCode: ' . $cuReferrerCode);
    
        // Select the fields you want to retrieve (e.g., signup_date, referrer_email, etc.)
        return $this->db->table('bf_users_referrals')
                    ->select('id, signup_date, referral_email, referrer_code, type')
                    ->groupBy('DATE(signup_date)')
                    ->orderBy('signup_date', 'DESC')  // You can also order by signup date if needed
                    ->get()
                    ->getResultArray();
    }
        
    public function getTotalReferrals($cuID, $cuReferrerCode)
    {
        log_message('debug', 'ReferralModel L78 - $cuReferrerCode: ' . $cuReferrerCode);
    
        // Select the fields you want to retrieve (e.g., signup_date, referrer_email, etc.)
        return $this->db->table('bf_users_referrals')
                    ->select('id, signup_date, referral_email, referrer_code, type')
                    ->where('referrer_code', $cuReferrerCode)
                    ->groupBy('DATE(signup_date)')
                    ->orderBy('signup_date', 'DESC')  // You can also order by signup date if needed
                    ->get()
                    ->getResultArray();
    }
    

    public function getTotalActiveReferrals($cuID, $cuReferrerCode)
    {
        log_message('debug', 'ReferralModel L88 - $cuReferrerCode: ' . $cuReferrerCode); 
        return $this->db->table('bf_users_referrals')
                    ->select('COUNT(*) as count, signup_date')
                    ->where(['referrer_code' => $cuReferrerCode, 'active' => 1])
                    ->groupBy('DATE(signup_date)')
                    ->get()
                    ->getResultArray();
    }

    public function calculateCommission($cuID, $cuReferrerCode)
    {
        // Step 1: Get all users referred by the current user using their referrer_code
        $referredUsers = $this->db->table('users')
                                  ->select('id')
                                  ->where('referrer_code', $cuReferrerCode)
                                  ->get()
                                  ->getResultArray();
    
        if (empty($referredUsers)) {
            // No referred users, return 0 as total spending
            return ['total_spending' => 0];
        }
    
        // Extract the list of user IDs referred by the current user
        $referredUserIds = array_column($referredUsers, 'id');
    
        // Step 2: Sum up transactions for all referred users in the current month and year
        $currentMonth = date('m');
        $currentYear = date('Y');
    
        $query = $this->db->table('bf_users_wallet_transactions')
                          ->select('SUM(amount) as total_spending')
                          ->whereIn('user_id', $referredUserIds)
                          ->where('MONTH(submitted_date)', $currentMonth)  // Use correct date column
                          ->where('YEAR(submitted_date)', $currentYear)
                          ->get();
    
        return $query->getRowArray();
    }   

    /**
     * Get affiliate details for a user, including the referrer code.
     *
     * @param int $userID
     * @return array|null
     */
    public function getAffiliateDetails($userID)
    {
        // Assuming that 'referrer_code' and 'email' are part of the 'users' table
        return $this->db->table('users')
                        ->select('id, referrer_code, email') // Select needed columns
                        ->where('id', $userID) // Filter by user ID
                        ->get()
                        ->getRowArray();
    }

    // Example: get commission history for a specific user
    public function getUserCommissionHistory($userId)
    {
        return $this->db->table('bf_users_wallet_transactions')
            ->select('id, transaction_id, amount, unix_timestamp')
            ->where('user_id', $userId)
            ->orderBy('unix_timestamp', 'DESC') // Get latest first
            ->get()
            ->getResultArray();
    }

    public function storeReferral($data) {
        return $this->db->table('bf_users_referrals')
                        ->insert($data);
             
    }

    public function storeSubscriber($data) {
        return $this->db->table('bf_users_subscribers')
                        ->insert($data);     
    }

    public function saveToDatabase($data)
    {
        return $this->insert($data);
    }

    public function getReferrerCode($cuID)
    {
        // Log the current user ID
        log_message('debug', 'ReferralModel L172 - $cuID: ' . $cuID);
    
        // Retrieve user data
        $user = $this->db->table('users')
                         ->where('id', $cuID)
                         ->get()
                         ->getRowArray();
    
        // Check if user was found
        if (!$user) {
            log_message('error', 'No user found for ID ' . $cuID);
            return null;
        }
    
        // Log the current referrer code
        log_message('debug', 'ReferralModel L175 - $user[referrer_code]: ' . ($user['referrer_code'] ?? 'NULL'));
    
        // Check if referrer_code is empty or null, and assign a new one if necessary
        if (empty($user['referrer_code'])) {
            $newCode = 'MyMI-' . $cuID;
            $newCodeData = [
                'referrer_code' => $newCode,
            ];
    
            // Update user with the new referrer code
            $updateSuccess = $this->db->table('users')
                                      ->where('id', $cuID)  // Make sure to specify the 'where' clause correctly
                                      ->update($newCodeData);
    
            if ($updateSuccess) {
                log_message('info', 'New Referrer Code assigned to UserID ' . $cuID . ': ' . $newCode);
            } else {
                log_message('error', 'There was an error assigning Code: ' . $newCode . ' to UserID ' . $cuID);
                return null; // Return null or handle the error case appropriately
            }
    
            // Return the new referral code after assignment
            return $newCode;
        }
    
        // Return the existing referrer code if it's not empty
        return $user['referrer_code'];
    }    

    public function getUserReferralPerformance($cuID, $referrerCode)
    {
        // Example query: Adjust as necessary based on your DB structure
        return $this->db->table('bf_users_referrals')
                        ->select('COUNT(*) as total_referrals, SUM(total_spend) as total_spending')
                        ->where('referrer_code', $referrerCode)
                        ->get()
                        ->getRowArray();
    }
    
}
