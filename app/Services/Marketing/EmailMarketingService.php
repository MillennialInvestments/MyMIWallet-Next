<?php

namespace App\Services\Marketing;

use App\Models\Marketing\{AudienceModel, EmailMarketingModel, EmailQueueModel, EmailTemplateModel, EmailOpenTrackingModel};
use Dompdf\Dompdf;
use Config\Services;

class EmailMarketingService
{
    protected $campaignModel;
    protected $queueModel;
    protected $templateModel;
    protected $audienceModel;
    protected $trackingModel;

    public function __construct()
    {
        $this->campaignModel = new EmailMarketingModel();
        $this->queueModel = new EmailQueueModel();
        $this->templateModel = new EmailTemplateModel();
        $this->audienceModel = new AudienceModel();
        $this->trackingModel = new EmailOpenTrackingModel();
    }

    // Process and save PDF content to campaign
    public function processPdfContent($file)
    {
        if ($file && $file->isValid()) {
            $filePath = WRITEPATH . 'uploads/' . $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $filePath);

            $dompdf = new Dompdf();
            $dompdf->loadHtml(file_get_contents($filePath));
            $dompdf->render();
            return $dompdf->outputHtml();
        }
        return null;
    }

    // Create a campaign
    public function createCampaign(array $data)
    {
        return $this->campaignModel->createCampaign($data);
    }

    // Schedule campaign and update stage
    public function scheduleCampaign(int $campaignId, string $datetime)
    {
        $this->campaignModel->scheduleCampaign($campaignId, $datetime);
        return $this->campaignModel->updateCampaignStage($campaignId, 'scheduled');
    }

    // Queue email based on selected audience
    public function queueEmail(int $campaignId, string $subject, string $content)
    {
        $campaign = $this->campaignModel->getCampaignById($campaignId);
        $audience = $this->audienceModel->getUsersByAccountType($campaign['audience_type']);

        foreach ($audience as $user) {
            $this->queueModel->queueEmail([
                'campaign_id' => $campaignId,
                'email' => $user['email'],
                'subject' => $subject,
                'content' => $content,
                'status' => 'pending',
            ]);
        }
    }

    // Process email queue and track opens
    public function processQueue()
    {
        $pendingEmails = $this->queueModel->getPendingEmails();
        $emailService = Services::email();

        foreach ($pendingEmails as $emailData) {
            $emailService->setTo($emailData['email']);
            $emailService->setSubject($emailData['subject']);
            $emailService->setMessage($emailData['content']);

            if ($emailService->send()) {
                $this->queueModel->markAsSent($emailData['id']);
                $this->trackingModel->recordEmailOpen($emailData['id']);
            }
        }
    }

    // Record email open event
    public function trackEmailOpen(int $emailId)
    {
        return $this->trackingModel->recordEmailOpen($emailId);
    }

    // Fetch all templates
    public function getTemplates()
    {
        return $this->templateModel->getAllTemplates();
    }

    // Save email template
    public function saveTemplate(array $data)
    {
        return $this->templateModel->createTemplate($data);
    }
}
