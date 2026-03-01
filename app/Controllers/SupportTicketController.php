<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SupportTicketController extends BaseController
{

    public function show(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: SupportTicketController::show');
        return redirect()->to('/Maintenance');
    }
}
