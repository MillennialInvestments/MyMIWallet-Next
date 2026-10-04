<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class SubscribeModel extends Model
{
    protected $table = 'bf_users_subscribers';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;

    protected $allowedFields = [
        'email',
        'referral',
        'category',
        'subject',
        'topic',
        'beta',
        'date',
        'hostTime',
        'time',
        'user_id',
        'user_ip',
        'initial_sent',
        'status',
        'delivery_error',
        'updated_at',
        'unsubscribe_token',
        'unsubscribed_at',
    ];

    protected $useTimestamps = false;

    protected $validationRules = [
        'email' => 'required|valid_email|max_length[45]',
    ];

    public $galleryPath;

    public function __construct()
    {
        parent::__construct();
        $this->galleryPath = realpath(APPPATH . '../images/');
    }

    /**
     * Entitlement remains a separate concern owned by REV-S003.
     */
    public function checkUserSubscription($userID)
    {
        helper('premium');

        $entitlements = premium_entitlements((int) $userID, ['feature_key' => 'alerts.trade_alerts']);

        return (object) [
            'user_id' => (int) $userID,
            'active' => ! empty($entitlements['membershipActive']) ? 1 : 0,
            'subscription_name' => $entitlements['subscriptionName'] ?? null,
            'tier' => $entitlements['membershipTier'] ?? 'free',
            'membership_status' => $entitlements['membershipStatus'] ?? 'free',
        ];
    }

    /**
     * Persist one canonical marketing/Trade Alerts subscriber identity.
     *
     * This method intentionally does not grant memberships, tiers, or billing
     * entitlements.
     *
     * @return array{success: bool, reason: string, message: string, id?: int}
     */
    public function subscribe(array $subscriberData): array
    {
        $email = strtolower(trim((string) ($subscriberData['email'] ?? '')));

        if (
            $email === ''
            || strlen($email) > 45
            || filter_var($email, FILTER_VALIDATE_EMAIL) === false
        ) {
            return [
                'success' => false,
                'reason' => 'invalid_email',
                'message' => 'A valid subscriber email is required.',
            ];
        }

        if ($this->where('email', $email)->first() !== null) {
            return [
                'success' => false,
                'reason' => 'duplicate_email',
                'message' => 'This email is already subscribed to our Newsletter & Mailing List',
            ];
        }

        $data = array_intersect_key(
            $subscriberData,
            array_flip($this->allowedFields)
        );

        $data['email'] = $email;
        $data['status'] = trim((string) ($data['status'] ?? '')) ?: 'active';
        $data['date'] = $data['date'] ?? date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        if (array_key_exists('user_id', $data)) {
            $userId = (int) $data['user_id'];

            if ($userId > 0) {
                $data['user_id'] = $userId;
            } else {
                unset($data['user_id']);
            }
        }

        $insertId = $this->insert($data, true);

        if ($insertId === false) {
            return [
                'success' => false,
                'reason' => 'insert_failed',
                'message' => 'Subscription failed. Please try again.',
            ];
        }

        return [
            'success' => true,
            'reason' => 'created',
            'message' => 'Thank you for subscribing!',
            'id' => (int) $insertId,
        ];
    }

    public function insertEmail($email, $referral = null, $userID = null)
    {
        $data = [
            'email' => $email,
            'referral' => $referral,
        ];

        if ((int) $userID > 0) {
            $data['user_id'] = (int) $userID;
        }

        return $this->subscribe($data);
    }

    public function updateDeliveryStatus(
        string $email,
        string $status,
        string $errorMessage = ''
    ): bool {
        $email = strtolower(trim($email));
        $status = trim($status);

        if ($email === '' || $status === '') {
            return false;
        }

        return (bool) $this->db
            ->table($this->table)
            ->where('email', $email)
            ->update([
                'status' => $status,
                'delivery_error' => $errorMessage !== ''
                    ? substr($errorMessage, 0, 500)
                    : null,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
    }

    public function setUnsubscribeToken(
        string $email,
        string $token
    ): bool {
        $email = strtolower(trim($email));
        $token = trim($token);

        if ($email === '' || $token === '') {
            return false;
        }

        return (bool) $this->db
            ->table($this->table)
            ->where('email', $email)
            ->update([
                'unsubscribe_token' => $token,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
    }

    public function unsubscribeByToken(string $token): bool
    {
        $token = trim($token);

        if ($token === '') {
            return false;
        }

        $subscriber = $this
            ->where('unsubscribe_token', $token)
            ->first();

        if (! is_array($subscriber) || empty($subscriber['id'])) {
            return false;
        }

        $timestamp = date('Y-m-d H:i:s');

        return (bool) $this->update(
            (int) $subscriber['id'],
            [
                'status' => 'unsubscribed',
                'unsubscribed_at' => $timestamp,
                'updated_at' => $timestamp,
            ]
        );
    }
}
