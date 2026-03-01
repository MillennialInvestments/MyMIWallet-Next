<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AssetsController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: AssetsController::index');
        return redirect()->to('/Maintenance');
    }
}
