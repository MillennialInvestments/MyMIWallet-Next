<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AccountSupportController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: AccountSupportController::index');
        return redirect()->to('/Maintenance');
    }

    public function resendActivation(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: AccountSupportController::resendActivation');
        return redirect()->to('/Maintenance');
    }

    public function sendPasswordReset(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: AccountSupportController::sendPasswordReset');
        return redirect()->to('/Maintenance');
    }
}
