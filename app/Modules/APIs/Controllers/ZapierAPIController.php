<?php namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;

use CodeIgniter\API\ResponseTrait;

#[\AllowDynamicProperties]
class ZapierAPIController extends BaseAPIController
{
    use ResponseTrait;

    public function webhookReceiver()
    {
        $payload = $this->request->getJSON(true);

        log_message('info', 'Zapier Webhook Triggered: ' . json_encode($payload));

        // Extract data
        $filename = $payload['filename'] ?? 'unknown.mp4';
        $action = $payload['action'] ?? 'unknown';

        // Trigger optional logic here...

        return $this->respond([
            'status' => 'success',
            'message' => 'Webhook received',
            'data' => [
                'filename' => $filename,
                'action' => $action,
            ]
        ]);
    }
}
?>
