<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EarningsController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: EarningsController::index');
        return redirect()->to('/Maintenance');
    }

    public function test(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: EarningsController::test');
        return redirect()->to('/Maintenance');
    }

    public function viewByDate(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: EarningsController::viewByDate');
        return redirect()->to('/Maintenance');
    }
}
