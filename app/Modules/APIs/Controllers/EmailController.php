<?php

namespace App\Modules\APIs\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\{CampaignModel, EmailModel};

#[\AllowDynamicProperties]
class EmailController extends \App\Controllers\BaseController
{
    use ResponseTrait;

    protected $campaignModel;
    protected $emailModel;

    public function __construct()
    {
        $this->campaignModel = new CampaignModel();
        $this->emailModel = new EmailModel();
    }

    public function autoScheduleDrafts()
    {
        $count = $this->campaignModel->autoScheduleEligibleDrafts();
    
        if ($count === 0) {
            return $this->respond(['status' => 'success', 'message' => 'No drafts ready for auto-scheduling.']);
        }
    
        return $this->respond(['status' => 'success', 'message' => "Auto-scheduled {$count} campaigns."]);
    }
    
    
    public function autoScheduleDraftCampaigns()
    {
        helper(['date']);
        $nowUTC = date('Y-m-d H:i:s');
    
        $autoDrafts = $this->campaignModel->getAutoScheduleDrafts($nowUTC);
    
        if (empty($autoDrafts)) {
            log_message('info', 'No auto-scheduled campaigns to process.');
            return $this->respond(['status' => 'success', 'message' => 'No campaigns found to auto-schedule.']);
        }
    
        foreach ($autoDrafts as $campaign) {
            // Schedule it
            $this->emailModel->updateCampaign($campaign['id'], [
                'scheduled_at' => $campaign['auto_schedule_at'],
                'is_draft'     => 0
            ]);
    
            log_message('info', "✅ Campaign [{$campaign['id']}] auto-scheduled for {$campaign['auto_schedule_at']}.");
    
            // Optionally immediately queue it here (advanced: queue lists immediately if you want)
            // $this->emailModel->queueCampaign($campaign['id']);
        }
    
        return $this->respond(['status' => 'success', 'message' => 'Auto-scheduled campaigns processed.']);
    }
    
    public function cancelScheduledCampaign($campaignId)
    {
        $this->emailModel->updateCampaign($campaignId, [
            'scheduled_at' => null,
            'is_draft' => 1,
        ]);
    
        return $this->respond(['status' => 'success', 'message' => 'Schedule canceled, draft mode.']);
    }
    
    public function cloneCampaign($campaignId)
    {
        $newCampaignId = $this->campaignModel->cloneCampaign($campaignId);
        if (!$newCampaignId) {
            return $this->fail('Failed to clone campaign.');
        }
        return $this->respond(['status' => 'success', 'newCampaignId' => $newCampaignId]);
    }
    
    public function createDraftCampaign()
    {
        $post = $this->request->getJSON(true);
        if (!$post || empty($post['name'])) {
            return $this->fail('Invalid campaign data.');
        }
    
        $data = [
            'name' => $post['name'],
            'primary_content' => $post['primary_content'] ?? '',
            'email_message' => $post['email_message'] ?? '',
            'is_draft' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ];
    
        if (!empty($post['auto_schedule_at'])) {
            $data['auto_schedule_at'] = (new \DateTime($post['auto_schedule_at']))->format('Y-m-d H:i:s');
        }
    
        $campaignId = $this->campaignModel->createDraftCampaign($data);
    
        if (!$campaignId) {
            return $this->fail('Failed to create draft.');
        }
    
        return $this->respond(['status' => 'success', 'campaignId' => $campaignId]);
    }
    
    public function deleteCampaign($campaignId)
    {
        $deleted = $this->emailModel->deleteCampaign($campaignId);
        if (!$deleted) {
            return $this->fail('Failed to delete campaign.');
        }
        return $this->respond(['status' => 'success', 'message' => 'Campaign deleted.']);
    }

    public function fetchCampaignAnalytics()
    {
        $campaigns = $this->campaignModel->fetchCampaignAnalytics();
        $trend = $this->campaignModel->getCampaignTrend();
    
        return $this->respond([
            'status'    => 'success',
            'campaigns' => $campaigns,
            'trend'     => $trend,
        ]);
    }    
    
    public function fetchQueuedEmailById($emailId)
    {
        $email = $this->emailModel->getQueuedEmailById($emailId);

        if (!$email) {
            return $this->failNotFound('Email not found.');
        }

        return $this->respond([
            'status' => 'success',
            'email' => $email
        ]);
    }

    public function fetchQueuedEmails()
    {
        $limit  = (int) ($this->request->getGet('limit') ?? 25);
        $offset = (int) ($this->request->getGet('offset') ?? 0);
        $search = $this->request->getGet('search') ?? null;
    
        $emails = $this->emailModel->getQueuedEmails($limit, $offset, $search);
        $total  = $this->emailModel->getQueuedEmailsCount($search);
    
        return $this->respond([
            'status' => 'success',
            'emails' => $emails,
            'total' => $total,
            'limit' => $limit,
            'offset' => $offset,
        ]);
    }   

    public function fetchTagAnalytics()
    {
        $tagData = $this->campaignModel->fetchTagAnalytics();
        return $this->respond([
            'status' => 'success',
            'tags' => $tagData,
        ]);
    }
    
    public function getAllCampaigns()
    {
        $campaigns = $this->campaignModel->getAllCampaigns();
        return $this->respond(['status' => 'success', 'campaigns' => $campaigns]);
    }

    public function getCampaignMetrics($campaignId)
    {
        $metrics = $this->emailModel->getCampaignMetrics($campaignId);
        return $this->respond(['status' => 'success'] + $metrics);
    }
    
    public function getCampaignStats($campaignId)
    {
        $stats = $this->campaignModel->getCampaignStats($campaignId);
    
        if (!$stats) {
            return $this->failNotFound('Campaign not found.');
        }
    
        return $this->respond([
            'status' => 'success',
            'stats' => $stats,
        ]);
    }
    
    public function getEmailQueueStats()
    {
        $stats = $this->emailModel->getEmailQueueStats();
        return $this->respond(array_merge(['status' => 'success'], $stats));
    }    

    public function getEmailQueueTrend()
    {
        $trend = $this->emailModel->getEmailQueueTrend();
        return $this->respond([
            'status' => 'success',
            'trend' => $trend
        ]);
    } 

    public function processScheduledCampaigns()
    {
        helper(['date']);
        $nowUTC = date('Y-m-d H:i:s');
    
        $scheduledCampaigns = $this->emailModel->getScheduledCampaigns($nowUTC);
    
        if (empty($scheduledCampaigns)) {
            log_message('info', 'No scheduled campaigns to process.');
            return $this->response->setJSON(['status' => 'success', 'message' => 'No scheduled campaigns found.']);
        }
    
        foreach ($scheduledCampaigns as $campaign) {
            $lists = $this->emailModel->getListsByCampaign($campaign['id']);
    
            if (empty($lists)) {
                log_message('warning', "No lists found for campaign [{$campaign['id']}]. Skipping.");
                continue;
            }
    
            foreach ($lists as $list) {
                $members = $this->emailModel->getMembersByList($list['list_id']);
    
                if (empty($members)) {
                    log_message('warning', "No members found for list [{$list['list_id']}] in campaign [{$campaign['id']}]. Skipping.");
                    continue;
                }
    
                foreach ($members as $member) {
                    $unsubscribeToken = $this->emailModel->generateUnsubscribeToken($member['email']);
                    $this->emailModel->updateUnsubscribeToken($member['email'], $unsubscribeToken);
    
                    $unsubscribeLink = site_url('API/Email/unsubscribe/' . $unsubscribeToken);
                    $firstName = $member['first_name'] ?? 'there';
    
                    $emailContent = "Hi {$firstName},<br><br>" .
                        ($campaign['email_message'] ?? $campaign['primary_content'] ?? 'Stay updated with MyMI Wallet!') .
                        "<br><br><small><a href='{$unsubscribeLink}'>Click here to unsubscribe</a></small>";
    
                    $this->emailModel->queueTestEmail([
                        'campaign_id' => $campaign['id'],
                        'email' => $member['email'],
                        'subject' => $campaign['name'] ?? 'New from MyMI Wallet',
                        'content' => $emailContent,
                        'scheduled_at' => $campaign['scheduled_at'],
                    ]);
                }
            }
    
            $this->emailModel->markCampaignAsSent($campaign['id']);
            log_message('info', "✅ Scheduled campaign [{$campaign['id']}] processed and queued successfully.");
        }
    
        return $this->response->setJSON(['status' => 'success', 'message' => 'Scheduled campaigns processed successfully.']);
    }
    
    public function scheduleCampaignApi($campaignId)
    {
        $post = $this->request->getPost();
        if (!$post || empty($post['scheduled_at'])) {
            return $this->fail('Scheduled time required.');
        }
    
        $scheduledAtUTC = (new \DateTime($post['scheduled_at']))->format('Y-m-d H:i:s');
    
        $this->emailModel->updateCampaign($campaignId, [
            'scheduled_at' => $scheduledAtUTC,
            'is_draft' => 0,
        ]);
    
        return $this->respond(['status' => 'success', 'message' => 'Campaign scheduled.']);
    }
    
    public function sendMassTestCampaign()
    {
        $campaignId = $this->request->getGet('campaign_id');
        if (!$campaignId) {
            return $this->fail('Campaign ID missing.');
        }
    
        $admins = $this->emailModel->getAdminEmails();
        if (empty($admins)) {
            return $this->fail('No admin emails found.');
        }
    
        $campaign = $this->emailModel->getCampaignById($campaignId);
        if (!$campaign) {
            return $this->failNotFound('Campaign not found.');
        }
    
        foreach ($admins as $admin) {
            $unsubscribeToken = $this->emailModel->generateUnsubscribeToken($admin['email']);
            $this->emailModel->updateUnsubscribeToken($admin['email'], $unsubscribeToken);
            $unsubscribeLink = site_url('API/Email/unsubscribe/' . $unsubscribeToken);
    
            $firstName = $admin['first_name'] ?? 'Admin';
            $emailContent = "Hi {$firstName},<br><br>" . ($campaign['email_message'] ?? $campaign['primary_content'] ?? 'Stay updated with MyMI Wallet!');
            $emailContent .= "<br><br><small><a href='{$unsubscribeLink}'>Click here to unsubscribe</a></small>";
    
            $this->emailModel->queueTestEmail([
                'campaign_id' => $campaignId,
                'email'       => $admin['email'],
                'subject'     => '[TEST] ' . ($campaign['name'] ?? 'New from MyMI Wallet'),
                'content'     => $emailContent,
            ]);
        }
    
        return $this->respond(['status' => 'success', 'message' => 'Test emails queued for Admins.']);
    }

    public function trackBounceWebhook()
    {
        $payload = $this->request->getJSON(true);

        log_message('info', '[ESP Webhook] Raw Payload: ' . json_encode($payload));

        $email = $payload['recipient'] ?? $payload['email'] ?? null;
        $reason = $payload['reason'] ?? $payload['description'] ?? 'Unknown bounce reason';

        if (!$email) {
            log_message('error', '[ESP Webhook] Missing email in bounce payload.');
            return $this->failValidationError('Email missing from webhook payload.');
        }

        $this->marketingModel->markEmailAsUndeliverable($email, $reason);

        log_message('info', "[ESP Webhook] Bounce tracked for {$email}: {$reason}");

        return $this->respond(['status' => 'success', 'message' => "Bounce recorded for $email."]);
    }

    public function unsubscribe($token)
    {
        $member = $this->emailModel->getMemberByToken($token);
    
        if (!$member) {
            return $this->failNotFound('Invalid unsubscribe link.');
        }
    
        $this->emailModel->unsubscribeMember($token);
    
        return $this->renderTheme('Management/Email/unsubscribe_success'); // basic confirmation page
    }
    
}
?>
