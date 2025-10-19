<?php

namespace App\Modules\Management\Controllers\Marketing;

use App\Models\EmailQueueModel;
use App\Models\EmailTemplateModel;
use App\Controllers\BaseController;
use Dompdf\Dompdf;

#[\AllowDynamicProperties]
class CampaignController extends \App\Controllers\BaseController
{
    public function uploadForm()
    {
        // Load view for uploading the campaign file
        $data['title'] = 'Upload Email Campaign';
        return $this->renderTheme('campaign/upload_form', $data);
    }

    public function processFile()
    {
        $file = $this->request->getFile('campaign_file');
        if ($file && $file->isValid()) {
            $filePath = WRITEPATH . 'uploads/' . $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $filePath);

            // Process file with Dompdf
            $dompdf = new Dompdf();
            $dompdf->loadHtml(file_get_contents($filePath));
            $dompdf->render();
            $htmlContent = $dompdf->outputHtml();

            // Return HTML content to preview
            return $this->response->setJSON(['success' => true, 'htmlContent' => $htmlContent]);
        }
        return $this->response->setJSON(['success' => false, 'message' => 'File upload failed.']);
    }

    public function saveCampaign()
    {
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');
        $scheduledAt = $this->request->getPost('scheduled_at');

        $campaignModel = new EmailQueueModel();
        $campaignModel->save([
            'email' => '',  // Set recipient email dynamically later or in the queue processing function
            'subject' => $title,
            'content' => $content,
            'scheduled_at' => $scheduledAt,
        ]);

        return $this->response->setJSON(['success' => true, 'message' => 'Campaign saved successfully.']);
    }
}
?>
