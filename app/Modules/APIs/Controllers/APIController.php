<?php

declare(strict_types=1);

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;
use CodeIgniter\HTTP\ResponseInterface;

#[\AllowDynamicProperties]
class APIController extends BaseAPIController
{
    public function index(): ResponseInterface
    {
        return $this->respond([
            'status'      => 'online',
            'api_version' => 'v1',
            'endpoints'   => [
                'status' => site_url('API/v1/Status'),
                'health' => site_url('API/v1/Health'),
                'ops'    => site_url('API/v1/Ops/status'),
            ],
            'server_time' => date('c'),
        ], 200);
    }

    public function status(): ResponseInterface
    {
        return $this->respond([
            'status'      => 'healthy',
            'subsystem'   => 'api-gateway',
            'version'     => '1.0.0',
            'environment' => ENVIRONMENT,
            'timestamp'   => time(),
        ], 200);
    }
}
