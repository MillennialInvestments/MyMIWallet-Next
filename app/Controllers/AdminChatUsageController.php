<?php

namespace App\Controllers;

class AdminChatUsageController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Api\\AdminChatUsageController::index');
        return redirect()->to('/Maintenance');
    }
}
