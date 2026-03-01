<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class WebDesignController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: WebDesignController::index');
        return redirect()->to('/Maintenance');
    }
}
