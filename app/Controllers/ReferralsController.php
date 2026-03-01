<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ReferralsController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ReferralsController::index');
        return redirect()->to('/Maintenance');
    }
}
