<?php

namespace App\Controllers;

class HealthController extends BaseController
{

    public function healthz(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: System\HealthController::healthz');
        return redirect()->to('/Maintenance');
    }

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Api\\HealthController::index');
        return redirect()->to('/Maintenance');
    }

    public function diag(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: System\HealthController::diag');
        return redirect()->to('/Maintenance');
    }
}
