<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdvisorController extends BaseController
{

    public function generateAdvisorInsight(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: AdvisorController::generateAdvisorInsight');
        return redirect()->to('/Maintenance');
    }

    public function generateNewsStoryboard(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: AdvisorController::generateNewsStoryboard');
        return redirect()->to('/Maintenance');
    }

    public function generateTradeAnalysis(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: AdvisorController::generateTradeAnalysis');
        return redirect()->to('/Maintenance');
    }

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: AdvisorController::index');
        return redirect()->to('/Maintenance');
    }
}
