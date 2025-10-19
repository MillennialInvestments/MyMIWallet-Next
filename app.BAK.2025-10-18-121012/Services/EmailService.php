<?php

namespace App\Services;

use App\Models\EmailModel;

class EmailService
{
    protected $emailModel;

    public function __construct()
    {
        $this->emailModel = new EmailModel();
    }

    public function getActiveLists()
    {
        $emailModel = new \App\Models\EmailModel();
        return $emailModel->getActiveLists();
    }
    
    public function getAvailableCampaigns()
    {
        return $this->emailModel->db
            ->table('bf_marketing_campaigns')
            ->where('status', 'draft')
            ->orWhere('status', 'scheduled')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResultArray();
    }
    
    // 🚀 Queue Campaign to List
    public function queueCampaignToList($campaignId, $listId)
    {
        $campaign = $this->emailModel->getCampaignById($campaignId);
        if (!$campaign) {
            return false;
        }

        $members = $this->emailModel->getMembersByList($listId);
        if (empty($members)) {
            return false;
        }

        foreach ($members as $member) {
            $unsubscribeToken = $this->emailModel->generateUnsubscribeToken($member['email']);
            $this->emailModel->updateUnsubscribeToken($member['email'], $unsubscribeToken);
            $unsubscribeLink = site_url('API/Email/unsubscribe/' . $unsubscribeToken);
        
            $firstName = 'there'; // default
            if (!empty($member['user_id'])) {
                $user = model('UserModel')->find($member['user_id']);
                if ($user && !empty($user->first_name)) {
                    $firstName = $user->first_name;
                }
            }
            
            $emailContent = "Hi {$firstName},<br><br>" . ($campaign['email_message'] ?? $campaign['primary_content'] ?? 'Stay updated with MyMI Wallet!');
            $emailContent .= "<br><br><small><a href='{$unsubscribeLink}'>Click here to unsubscribe</a></small>";
            
            $this->emailModel->db->table('bf_marketing_email_queue')->insert([
                'campaign_id' => $campaignId,
                'email'       => $member['email'],
                'subject'     => $campaign['name'] ?? 'New from MyMI Wallet',
                'content'     => $emailContent,
                'status'      => 'pending',
                'priority'    => 'normal',
                'scheduled_at'=> date('Y-m-d H:i:s'),
                'created_at'  => date('Y-m-d H:i:s'),
            ]);
        }        

        return true;
    }
}
?>