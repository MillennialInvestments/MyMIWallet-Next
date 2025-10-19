<?php namespace App\Modules\APIs\Controllers;

use CodeIgniter\RESTful\ResourceController;

#[\AllowDynamicProperties]
class HealthController extends ResourceController
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
}
