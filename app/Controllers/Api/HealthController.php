<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class HealthController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Api\\HealthController::index');
        return redirect()->to('/Maintenance');
    }
}
