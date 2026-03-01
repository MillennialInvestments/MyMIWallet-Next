<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class APIController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: APIController::index');
        return redirect()->to('/Maintenance');
    }
}
