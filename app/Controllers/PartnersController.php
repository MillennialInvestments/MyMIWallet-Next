<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PartnersController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: PartnersController::index');
        return redirect()->to('/Maintenance');
    }
}
