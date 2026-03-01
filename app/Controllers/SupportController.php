<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SupportController extends BaseController
{

    public function article(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: SupportController::article');
        return redirect()->to('/Maintenance');
    }

    public function discordOnboarding(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: SupportController::discordOnboarding');
        return redirect()->to('/Maintenance');
    }

    public function view(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: SupportController::view');
        return redirect()->to('/Maintenance');
    }

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: SupportController::index');
        return redirect()->to('/Maintenance');
    }
}
