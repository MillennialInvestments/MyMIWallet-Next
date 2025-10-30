<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class SubscribeModel extends Model
{
    protected $table = 'bf_applications'; // Update as per CI4 database schema
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'email', 'referral', // Update with actual fields from your database
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_on';
    protected $updatedField = 'modified_on';
    protected $createdByField = 'created_by';
    protected $updatedByField = 'modified_by';

    protected $validationRules = [
        'email' => 'required|valid_email|max_length[255]',
    ];

    public $galleryPath;

    public function __construct()
    {
        parent::__construct();
        $this->galleryPath = realpath(APPPATH . '../images/');
    }

    /**
     * ✅ Check if a user has a premium subscription
     */
    public function checkUserSubscription($userID)
    {
        return $this->db->table('bf_users_subscriptions')
            ->where('user_id', $userID)
            ->whereIn('subscription_name', [
                'MyMI Trade Alerts - Premium Tier 1',
                'MyMI Trade Alerts - Premium Tier 2',
                'MyMI Trade Alerts - Premium Tier 3'
            ])
            ->where('active', 1)
            ->get()
            ->getRow();
    }

    public function insertEmail($email, $referral)
    {
        $query = $this->where('email', $email)
                      ->get('bf_users_subscribers');

        if ($query->getNumRows() > 0) {
            return ['success' => false, 'message' => 'This email is already subscribed to our Newsletter & Mailing List'];
        } else {
            $data = ['email' => $email, 'referral' => $referral];

            if ($this->table('bf_users_subscribers')->insert($data)) {
                return ['success' => true, 'message' => 'Thank you for subscribing!'];
            } else {
                return ['success' => false, 'message' => 'Subscription failed. Please try again.'];
            }
        }
    }

    // Implement other methods as needed...
}
