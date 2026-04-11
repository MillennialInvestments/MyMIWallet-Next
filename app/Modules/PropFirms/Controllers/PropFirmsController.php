<?php

namespace App\Modules\PropFirms\Controllers;

use App\Controllers\UserController;

class PropFirmsController extends UserController
{
    public function index()
    {
        return redirect()->to(site_url('Dashboard/PropFirms'));
    }

    public function ruleSets()
    {
        return redirect()->to(site_url('Dashboard/PropFirms'));
    }

    public function accounts()
    {
        return redirect()->to(site_url('Dashboard/PropFirms'));
    }
}
