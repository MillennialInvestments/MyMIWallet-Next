<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CommonDataController extends BaseController
{

    public function smoke(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: CommonDataController::smoke');
        return redirect()->to('/Maintenance');
    }
}
