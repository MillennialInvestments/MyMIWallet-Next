<?php

namespace App\Services;

use App\Models\DripCampaignModel;
use App\Models\EmailModel;
use Config\SiteSettings;

class DripCampaignService
{
    protected $dripCampaignModel;
    protected $emailModel;

    public function __construct()
    {
        $this->dripCampaignModel = new DripCampaignModel();
        $this->emailModel = new EmailModel(); // Assumes your existing email queue model
    }

    public function enrollUserInCampaign($userId, $triggerEvent)
    {
        $campaign = $this->dripCampaignModel->getCampaignByTrigger($triggerEvent);
        if (!$campaign) return false;

        $existing = $this->dripCampaignModel->getUserProgress($userId, $campaign['id']);
        if ($existing) return false;

        $firstStep = $this->dripCampaignModel->getNextStep($campaign['id'], 0);
        if (!$firstStep) return false;

        $now = date('Y-m-d H:i:s');
        $delayHours = ($firstStep['delay_days'] * 24) + $firstStep['delay_hours'];
        $nextSendAt = date('Y-m-d H:i:s', strtotime("+{$delayHours} hours", strtotime($now)));

        $this->dripCampaignModel->createUserProgress([
            'user_id'      => $userId,
            'campaign_id'  => $campaign['id'],
            'current_step_id' => null,
            'next_step_id' => $firstStep['id'],
            'next_send_at' => $nextSendAt,
            'status'       => 'active',
            'enrolled_at'  => $now,
        ]);

        return true;
    }

    public function processDueEmails()
    {
        $dueUsers = $this->dripCampaignModel->getUsersDueForEmail();
        $results = [];

        foreach ($dueUsers as $progress) {
            $results[] = $this->processSpecificUserDrip($progress['user_id'], $progress['campaign_id']);
        }

        return $results;
    }

    public function processSpecificUserDrip($userId, $campaignId)
    {
        $progress = $this->dripCampaignModel->getUserProgress($userId, $campaignId);
        if (!$progress || !$progress['next_step_id']) return false;

        $step = $this->dripCampaignModel->getStepById($progress['next_step_id']);
        if (!$step || !$step['is_active']) return false;

        // Generate email body
        $userModel = model('UserModel');
        $user = $userModel->find($userId);
        if (!$user) return false;

        $trackingId = uniqid('', true);
        $viewData = [
            'user'             => $user,
            'unsubscribe_token'=> base64_encode("user:{$userId}"),
            'unsubscribe_link' => site_url("API/Email/unsubscribe/" . base64_encode("user:{$userId}")),
            'tracking_id'      => $trackingId,
            'siteSettings'     => config('SiteSettings')
        ];
        $html = view($step['view_file'], $viewData, ['saveData' => false]);

        $this->scheduleDripEmailForUser([
            'user_id'      => $userId,
            'campaign_id'  => $campaignId,
            'subject'      => $step['subject'],
            'description'  => $step['description'] ?? '',
            'content'      => $html,
            'schedule_time'=> $progress['next_send_at'] ?? date('Y-m-d H:i:s'),
            'utm_source'   => 'drip',
            'utm_medium'   => 'email',
            'utm_campaign' => 'campaign_' . $campaignId
        ]);

        $this->dripCampaignModel->logEmailSent([
            'user_id'     => $userId,
            'campaign_id' => $campaignId,
            'step_id'     => $step['id'],
            'message_id'  => $trackingId,
            'status'      => 'scheduled',
            'sent_at'     => date('Y-m-d H:i:s')
        ]);

        // Update progress
        $nextStep = $this->dripCampaignModel->getNextStep($campaignId, $step['step_number']);
        $now = date('Y-m-d H:i:s');

        $update = [
            'current_step_id'     => $step['id'],
            'last_email_sent_at'  => $now,
        ];

        if ($nextStep) {
            $delayHrs = ($nextStep['delay_days'] * 24) + $nextStep['delay_hours'];
            $update['next_step_id'] = $nextStep['id'];
            $update['next_send_at'] = date('Y-m-d H:i:s', strtotime("+{$delayHrs} hours", strtotime($now)));
        } else {
            $update['next_step_id'] = null;
            $update['next_send_at'] = null;
            $update['status'] = 'completed';
            $update['completed_at'] = $now;
        }

        $this->dripCampaignModel->updateUserProgress($userId, $campaignId, $update);
        return true;
    }

    public function scheduleDripEmailForUser(array $emailData): bool
    {
        $db = \Config\Database::connect();

        $required = ['user_id', 'campaign_id', 'subject', 'content', 'schedule_time'];
        foreach ($required as $field) {
            if (empty($emailData[$field])) {
                log_message('error', "❌ scheduleDripEmailForUser: Missing $field.");
                return false;
            }
        }

        $data = [
            'post_date'          => date('Y-m-d', strtotime($emailData['schedule_time'])),
            'schedule_time'      => $emailData['schedule_time'],
            'platform'           => 'email',
            'delivery_channel'   => 'email',
            'subscriber_id'      => $emailData['user_id'],
            'campaign_id'        => $emailData['campaign_id'],
            'content_subject'    => $emailData['subject'],
            'content_description'=> $emailData['description'] ?? '',
            'content_script'     => $emailData['content'],
            'content_blob'       => json_encode($emailData),
            'post_status'        => 'scheduled',
            'dispatch_type'      => 'drip',
            'created_at'         => date('Y-m-d H:i:s'),
            'updated_at'         => date('Y-m-d H:i:s')
        ];

        return $db->table('bf_marketing_schedule')->insert($data);
    }

    public function sendDripEmail($userId, $campaignId, $step)
    {
        $userModel = model('UserModel');
        $user = $userModel->find($userId);
        if (!$user) return false;
    
        $trackingId = uniqid('', true);
        $template = $step['view_file'] ?? 'join_discord_invite';
    
        $viewData = [
            'user'             => $user,
            'unsubscribe_token'=> base64_encode("user:{$userId}"),
            'unsubscribe_link' => site_url("API/Email/unsubscribe/" . base64_encode("user:{$userId}")),
            'tracking_id'      => $trackingId,
            'siteSettings'     => config('SiteSettings')
        ];
    
        $html = view("Email/Templates/{$template}", $viewData, ['saveData' => false]);
    
        $this->emailModel->queueEmail([
            'to'       => $user['email'],
            'subject'  => $step['subject'],
            'body'     => $html,
            'priority' => 3
        ]);
    
        // Log tracking record
        $this->dripCampaignModel->logEmailSent([
            'user_id'     => $userId,
            'campaign_id' => $campaignId,
            'step_id'     => $step['id'],
            'message_id'  => $trackingId,
            'status'      => 'sent',
            'sent_at'     => date('Y-m-d H:i:s')
        ]);
    
        return true;
    }    
}
?>