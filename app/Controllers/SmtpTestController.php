<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SmtpTestController extends BaseController
{

    public function probe(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: SmtpTestController::probe');
        return redirect()->to('/Maintenance');
    }
}
