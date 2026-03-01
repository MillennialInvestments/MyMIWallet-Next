<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ChatUsageController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ChatUsageController::index');
        return redirect()->to('/Maintenance');
    }

    public function resetUser(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ChatUsageController::resetUser');
        return redirect()->to('/Maintenance');
    }

    public function saveSettings(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ChatUsageController::saveSettings');
        return redirect()->to('/Maintenance');
    }
}
