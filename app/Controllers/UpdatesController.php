<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UpdatesController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: UpdatesController::index');
        return redirect()->to('/Maintenance');
    }
}
