<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EmailQueueController extends BaseController
{

    public function create(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: EmailQueueController::create');
        return redirect()->to('/Maintenance');
    }

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: EmailQueueController::index');
        return redirect()->to('/Maintenance');
    }

    public function processQueue(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: EmailQueueController::processQueue');
        return redirect()->to('/Maintenance');
    }

    public function store(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: EmailQueueController::store');
        return redirect()->to('/Maintenance');
    }
}
