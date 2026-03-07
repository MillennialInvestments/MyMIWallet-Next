<?php namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;


#[\AllowDynamicProperties]
class HealthAPIController extends BaseAPIController
{
    public function index()
    {
        $dbOk = true;
        try {
            db_connect()->reconnect();
        } catch (\Throwable $e) {
            $dbOk = false;
        }

        return $this->respond([
            'status' => 'ok',
            'db'     => $dbOk ? 'up' : 'down',
            'time'   => date('c'),
        ], 200);
    }

    public function spark()
    {
        $statusPath = WRITEPATH . 'triage/spark-command-audit.json';
        $payload = [
            'status' => 'unknown',
            'commands' => 0,
            'last_check' => null,
        ];

        if (is_file($statusPath)) {
            $decoded = json_decode((string) file_get_contents($statusPath), true);
            if (is_array($decoded)) {
                $payload['status'] = $decoded['status'] ?? $payload['status'];
                $payload['commands'] = $decoded['commands'] ?? $payload['commands'];
                $payload['last_check'] = $decoded['last_check'] ?? $payload['last_check'];
            }
        }

        $statusCode = $payload['status'] === 'ok' ? 200 : 503;

        return $this->respond($payload, $statusCode);
    }
}
