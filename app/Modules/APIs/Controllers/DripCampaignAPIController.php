<?php

namespace App\Modules\APIs\Controllers;

use App\Controllers\UserController;
use App\Services\DripCampaignService;

#[\AllowDynamicProperties]
class DripCampaignAPIController extends UserController
{
    public function processBatch()
    {
        $drip = new DripCampaignService();
        $result = $drip->processDueEmails();
        return $this->respond(['status' => 'success', 'processed' => $result]);
    }

    public function open($trackingId)
    {
        $model = new \App\Models\DripCampaignModel();
        $model->recordEmailOpen($trackingId);

        return $this->response
            ->setHeader('Content-Type', 'image/gif')
            ->setBody(base64_decode('R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==')); // transparent 1x1 gif
    }

    public function click($trackingId)
    {
        $url = $this->request->getGet('url') ?? '/';
        $model = new \App\Models\DripCampaignModel();
        $model->recordEmailClick($trackingId, $url);

        return redirect_to_safe(
            is_string($url) && $url !== '' ? $url : null,
            '/'
        );
    }

    public function enrollUser(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: DripCampaignAPIController::enrollUser');
        return redirect()->to('/Maintenance');
    }

    public function testDripCron(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: DripCampaignAPIController::testDripCron');
        return redirect()->to('/Maintenance');
    }
}
?>
