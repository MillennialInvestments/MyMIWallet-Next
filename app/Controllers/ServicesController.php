<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ServicesController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ServicesController::index');
        return redirect()->to('/Maintenance');
    }
}
