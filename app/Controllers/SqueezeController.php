<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SqueezeController extends BaseController
{

    public function fade(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: SqueezeController::fade');
        return redirect()->to('/Maintenance');
    }

    public function run(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: SqueezeController::run');
        return redirect()->to('/Maintenance');
    }

    public function scorecard(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: SqueezeController::scorecard');
        return redirect()->to('/Maintenance');
    }

    public function zoomout(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: SqueezeController::zoomout');
        return redirect()->to('/Maintenance');
    }
}
