<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SecurityController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: SecurityController::index');
        return redirect()->to('/Maintenance');
    }
}
