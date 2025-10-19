<?php namespace App\Modules\APIs\Controllers;

use App\Controllers\UserController;
use CodeIgniter\API\ResponseTrait;

#[\AllowDynamicProperties]
class ZapierController extends UserController
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
