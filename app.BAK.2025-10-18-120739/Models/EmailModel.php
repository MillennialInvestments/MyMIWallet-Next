<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class EmailModel extends Model
{
    protected $table = 'bf_email_distribution_lists';
    protected $primaryKey = 'id';
    protected $allowedFields = [];

    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    // 🚀 Member Management
    public function addMember(array $data)
    {
        return $this->db->table('bf_email_list_members')->insert($data);
    }

    public function cleanupOldQueuedEmails()
    {
        return $this->db->table('bf_marketing_email_queue')
            ->where('created_at <', date('Y-m-d H:i:s', strtotime('-90 days')))
            ->delete();
    }

    public function cloneCampaign($campaignId)
    {
        $campaign = $this->getCampaignById($campaignId);
        if (!$campaign) {
            return false;
        }
    
        unset($campaign['id']); // remove ID for insert
        $campaign['name'] = $campaign['name'] . ' (Clone)';
        $campaign['created_at'] = date('Y-m-d H:i:s');
    
        $this->db->table('bf_marketing_campaigns')->insert($campaign);
    
        return $this->db->insertID();
    }
    
    public function createDraftCampaign(array $data)
    {
        return $this->db->table('bf_marketing_campaigns')->insert($data);
    }
    
    // 🚀 List Management
    public function createList(array $data)
    {
        return $this->db->table('bf_email_distribution_lists')->insert($data);
    }

    // Generate a simple unsubscribe token
    public function generateUnsubscribeToken($email)
    {
        return bin2hex(random_bytes(32)); // 64 char random token
    }

    public function getActiveLists()
    {
        return $this->db->table('bf_email_distribution_lists')
            ->where('is_active', 1)
            ->get()
            ->getResultArray();
    }

    public function getAdminEmails()
    {
        return $this->db->table('users')
            ->select('email, first_name')
            ->where('role_id', 1) // Assuming role_id=1 = Admin
            ->where('active', 1)
            ->where('deleted', 0)
            ->get()
            ->getResultArray();
    }

    public function getAllCampaigns()
    {
        return $this->db->table('bf_marketing_campaigns')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResultArray();
    }

    // 🚀 Campaign Content
    public function getCampaignById($campaignId)
    {
        return $this->db->table('bf_marketing_campaigns')
            ->where('id', $campaignId)
            ->get()
            ->getRowArray();
    }
    
    public function getCampaignMetrics($campaignId)
    {
        $sent = $this->db->table('bf_marketing_email_queue')
            ->where('campaign_id', $campaignId)
            ->where('status', 'sent')
            ->countAllResults();
    
        $opened = $this->db->table('bf_marketing_email_open_tracking')
            ->where('campaign_id', $campaignId)
            ->countAllResults();
    
        $bounced = $this->db->table('bf_marketing_email_queue')
            ->where('campaign_id', $campaignId)
            ->where('status', 'bounced')
            ->countAllResults();
    
        return compact('sent', 'opened', 'bounced');
    }

    // 🚀 Counters
    public function getEmailQueueStats()
    {
        $pending = $this->db->table('bf_marketing_email_queue')
            ->where('status', 'pending')
            ->countAllResults();
    
        $sent = $this->db->table('bf_marketing_email_queue')
            ->where('status', 'sent')
            ->countAllResults();
    
        $opened = $this->db->table('bf_marketing_email_open_tracking')
            ->countAllResults();
    
        $unsubscribed = $this->db->table('bf_email_list_members')
            ->where('status', 'unsubscribed')
            ->countAllResults();
    
        $bounced = $this->db->table('bf_marketing_email_queue')
            ->where('status', 'bounced')
            ->countAllResults();
    
        $openRate = ($sent > 0) ? round(($opened / $sent) * 100, 2) : 0;
    
        return compact('pending', 'sent', 'openRate', 'unsubscribed', 'bounced');
    }
    
    // 🚀 Trend Graph
    public function getEmailQueueTrend()
    {
        return $this->db->query("
            SELECT 
                DATE(created_at) as send_date,
                COUNT(CASE WHEN status = 'pending' THEN 1 END) as pending,
                COUNT(CASE WHEN status = 'sent' THEN 1 END) as sent
            FROM bf_marketing_email_queue
            WHERE created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)
            GROUP BY send_date
            ORDER BY send_date ASC
        ")->getResultArray();
    }

    public function getListById(int $id)
    {
        return $this->db->table('bf_email_distribution_lists')
            ->where('id', $id)
            ->get()
            ->getRowArray();
    }

    public function getMembersByList($listId)
    {
        return $this->db->table('bf_email_list_members')
            ->where('list_id', $listId)
            ->get()
            ->getResultArray();
    }

    public function getMemberByToken($token)
    {
        return $this->db->table('bf_email_list_members')
            ->where('unsubscribe_token', $token)
            ->get()
            ->getRowArray();
    }

    // 🚀 Email Queue Operations
    public function getPendingEmails()
    {
        return $this->db->table('bf_marketing_email_queue')
            ->where('status', 'pending')
            ->orderBy('priority', 'DESC')
            ->orderBy('created_at', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getQueuedEmailById($emailId)
    {
        return $this->db->table('bf_marketing_email_queue')
            ->where('id', $emailId)
            ->get()
            ->getRowArray();
    }

    public function getQueuedEmails($limit = 25, $offset = 0, $search = null)
    {
        $builder = $this->db->table('bf_marketing_email_queue');

        if (!empty($search)) {
            $builder->groupStart()
                ->like('email', $search)
                ->orLike('subject', $search)
                ->orLike('campaign_id', $search)
                ->groupEnd();
        }

        $builder->orderBy('created_at', 'DESC');
        $builder->limit($limit, $offset);

        return $builder->get()->getResultArray();
    }

    public function getQueuedEmailsCount($search = null)
    {
        $builder = $this->db->table('bf_marketing_email_queue');

        if (!empty($search)) {
            $builder->groupStart()
                ->like('email', $search)
                ->orLike('subject', $search)
                ->orLike('campaign_id', $search)
                ->groupEnd();
        }

        return $builder->countAllResults();
    }

    public function isMemberExists(int $listId, string $email)
    {
        return $this->db->table('bf_email_list_members')
            ->where('list_id', $listId)
            ->where('email', $email)
            ->countAllResults() > 0;
    }

    public function markEmailAsSent($emailId)
    {
        return $this->db->table('bf_marketing_email_queue')
            ->where('id', $emailId)
            ->update([
                'status' => 'sent',
                'updated_at' => date('Y-m-d H:i:s')
            ]);
    }

    public function queueEmail(array $data)
    {
        $unsubscribeToken = $this->generateUnsubscribeToken($data['email']);
        $this->updateUnsubscribeToken($data['email'], $unsubscribeToken);
    
        $data['unsubscribe_link'] = site_url('API/Email/unsubscribe/' . $unsubscribeToken);
        $data['status']           = $data['status'] ?? 'queued';
        $data['created_at']       = $data['created_at'] ?? date('Y-m-d H:i:s');
    
        return $this->db->table('bf_marketing_email_queue')->insert($data);
    }
    
    public function queueTestEmail(array $data)
    {
        $this->db->table('bf_marketing_email_queue')->insert([
            'campaign_id' => $data['campaign_id'],
            'email'       => $data['email'],
            'subject'     => $data['subject'],
            'content'     => $data['content'],
            'status'      => 'pending',
            'priority'    => 'high',
            'scheduled_at'=> date('Y-m-d H:i:s'),
            'created_at'  => date('Y-m-d H:i:s'),
        ]);
    }

    public function removeMember(int $listId, string $email)
    {
        return $this->db->table('bf_email_list_members')
            ->where('list_id', $listId)
            ->where('email', $email)
            ->delete();
    }

    public function updateCampaign($campaignId, array $data)
    {
        return $this->db->table('bf_marketing_campaigns')
            ->where('id', $campaignId)
            ->update($data);
    }
    
    public function updateUnsubscribeToken($email, $token): bool
    {
        $updated1 = $this->db->table('bf_email_list_members')
            ->where('email', $email)
            ->update(['unsubscribe_token' => $token]);
    
        $updated2 = $this->db->table('bf_users_subscribers')
            ->where('email', $email)
            ->update(['unsubscribe_token' => $token]);
    
        return $updated1 || $updated2;
    }    
    
    public function unsubscribeMember($token): bool
    {
        // Try in email_list_members
        $member = $this->db->table('bf_email_list_members')
            ->where('unsubscribe_token', $token)
            ->get()->getRowArray();
    
        if ($member) {
            $this->db->table('bf_email_list_members')
                ->where('unsubscribe_token', $token)
                ->update([
                    'status' => 'unsubscribed',
                    'unsubscribed_at' => date('Y-m-d H:i:s'),
                ]);
        }
    
        // Try in users_subscribers
        $userSub = $this->db->table('bf_users_subscribers')
            ->where('unsubscribe_token', $token)
            ->get()->getRowArray();
    
        if ($userSub) {
            $this->db->table('bf_users_subscribers')
                ->where('unsubscribe_token', $token)
                ->update([
                    'status' => 'unsubscribed',
                    'unsubscribed_at' => date('Y-m-d H:i:s'),
                ]);
        }
    
        return ($member || $userSub);
    }    
}
?>
