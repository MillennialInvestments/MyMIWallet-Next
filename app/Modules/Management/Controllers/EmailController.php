<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\UserController;
use App\Services\EmailService;
use App\Models\EmailModel;

#[\AllowDynamicProperties]
class EmailController extends UserController
{
    protected $emailService;
    protected $emailModel;
    public function __construct()
    {
        helper(['auth', 'form']);
        $this->emailService = new EmailService();
        $this->emailModel = new EmailModel();
        $this->data = [];
    }

    public function index()
    {
        $this->data['lists'] = $this->emailModel->getActiveLists();
        return $this->renderTheme('Management/Email/index', $this->data);
    }

    public function addMember()
    {
        $post = $this->request->getPost();
        if (!$post) {
            return redirect()->back()->with('error', 'No data received.');
        }

        if ($this->emailModel->isMemberExists($post['list_id'], $post['email'])) {
            return redirect()->back()->with('error', 'This email is already in the list.');
        }

        $data = [
            'list_id' => $post['list_id'],
            'user_id' => null,
            'email' => $post['email'],
            'status' => 'subscribed',
            'added_at' => date('Y-m-d H:i:s'),
        ];

        $this->emailModel->addMember($data);

        return redirect()->back()->with('success', 'Member added to list successfully.');
    }

    public function autoScheduleLogs()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('bf_campaign_auto_logs');
        $builder->select('bf_campaign_auto_logs.*, bf_campaigns.name as campaign_name');
        $builder->join('bf_campaigns', 'bf_campaigns.id = bf_campaign_auto_logs.campaign_id', 'left');
        $builder->orderBy('bf_campaign_auto_logs.created_at', 'DESC');
        $query = $builder->get();
    
        $this->data['logs'] = $query->getResultArray();
    
        return $this->renderTheme('Management/Email/modals/autoScheduleLogs', $this->data);
    }
    
    public function campaigns()
    {
        $this->data['campaigns'] = $this->emailModel->getAllCampaigns();
        return $this->renderTheme('Management/Email/campaigns', $this->data);
    }

    public function campaignStats($campaignId)
    {
        $campaign = $this->emailModel->getCampaignById($campaignId);
        if (!$campaign) {
            return "Campaign not found.";
        }
        $this->data['campaign'] = $campaign;
        return $this->renderTheme('Management/Email/modals/campaignStats', $this->data);
    }

    public function createList()
    {
        $post = $this->request->getPost();
        if (!$post) {
            return redirect()->back()->with('error', 'No data received.');
        }

        $slug = url_title($post['name'], '-', true);
        $data = [
            'name' => $post['name'],
            'slug' => $slug,
            'description' => $post['description'],
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->emailModel->createList($data);

        return redirect()->back()->with('success', 'List created successfully.');
    }

    public function editCampaign($campaignId)
    {
        $campaign = $this->emailModel->getCampaignById($campaignId);
        if (!$campaign) {
            return "Campaign not found.";
        }
        $this->data['campaign'] = $campaign;
        return $this->renderTheme('Management/Email/modals/editCampaign', $this->data);
    }

    public function queued()
    {
        return $this->renderTheme('Management/Email/queued', $this->data);
    }

    public function previewQueuedEmail($emailId)
    {
        $email = $this->emailModel->getQueuedEmailById($emailId);
        if (!$email) {
            return "Email not found.";
        }

        $this->data['email'] = $email;
        return $this->renderTheme('Management/Email/modals/previewQueuedEmail', $this->data);
    }

    public function sendCampaign()
    {
        $post = $this->request->getPost();
        if (!$post) {
            return redirect()->back()->with('error', 'No data received.');
        }

        $campaignId = $post['campaign_id'];
        $listId = $post['list_id'];

        $sendResult = $this->emailService->queueCampaignToList($campaignId, $listId);

        if ($sendResult) {
            return redirect()->back()->with('success', 'Campaign queued successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to queue campaign.');
        }
    }

    public function scheduleCampaign($id)
    {
        $post = $this->request->getPost();
        $datetime = $post['scheduled_at'] ?? null;
    
        if (!$datetime) {
            return redirect()->back()->with('error', 'Scheduled time is required.');
        }
    
        $campaignModel = new \App\Models\CampaignModel();
        $campaignModel->scheduleCampaign($id, $datetime);
    
        return redirect()->back()->with('success', 'Campaign scheduled successfully.');
    }    
    
    public function scheduleCampaignSubmit($campaignId)
    {
        $post = $this->request->getPost();
        if (!$post || empty($post['scheduled_at'])) {
            return redirect()->back()->with('error', 'Schedule time is required.');
        }
    
        $scheduledAtUTC = (new \DateTime($post['scheduled_at']))->format('Y-m-d H:i:s');
    
        $this->emailModel->updateCampaign($campaignId, [
            'scheduled_at' => $scheduledAtUTC,
            'is_draft' => 0,
        ]);
    
        return redirect()->to('/Management/Email/campaigns')->with('success', 'Campaign scheduled successfully.');
    }
}
?>
