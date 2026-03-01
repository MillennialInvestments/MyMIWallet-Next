<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UsersController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: UsersController::index');
        return redirect()->to('/Maintenance');
    }

    public function profile(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: UsersController::profile');
        return redirect()->to('/Maintenance');
    }
}
