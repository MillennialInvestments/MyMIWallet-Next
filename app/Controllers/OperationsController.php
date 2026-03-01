<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OperationsController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: OperationsController::index');
        return redirect()->to('/Maintenance');
    }
}
