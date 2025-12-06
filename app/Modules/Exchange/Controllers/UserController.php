<?php

namespace App\Modules\Exchange\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        log_message(
            'warning',
            'Exchange UserController::index hit – stub controller, no implementation yet.'
        );

        return redirect()->to(site_url('Exchange/Solana'));
    }
}