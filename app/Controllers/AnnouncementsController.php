<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AnnouncementsController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: AnnouncementsController::index');
        return redirect()->to('/Maintenance');
    }
}
