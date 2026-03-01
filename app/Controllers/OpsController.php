<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OpsController extends BaseController
{

    public function ajaxDispatch(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: OpsController::ajaxDispatch');
        return redirect()->to('/Maintenance');
    }

    public function ajaxStatus(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: OpsController::ajaxStatus');
        return redirect()->to('/Maintenance');
    }

    public function health(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: OpsController::health');
        return redirect()->to('/Maintenance');
    }

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: OpsController::index');
        return redirect()->to('/Maintenance');
    }

    public function healthcheck(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Modules\Ops\Controllers\OpsController::healthcheck');
        return redirect()->to('/Maintenance');
    }

    public function appUpdate(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Modules\Ops\Controllers\OpsController::appUpdate');
        return redirect()->to('/Maintenance');
    }

    public function commands(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Modules\Ops\Controllers\OpsController::commands');
        return redirect()->to('/Maintenance');
    }
}
