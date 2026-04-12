<?php

namespace App\Modules\PropFirms\Controllers;

use App\Controllers\UserController;
use App\Modules\PropFirms\Libraries\PropFirmDefaultsSeeder;

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

    public function seedDefaults()
    {
        $result = (new PropFirmDefaultsSeeder())->seedDefaults();

        return $this->response->setJSON([
            'status' => 'ok',
            'message' => 'Prop firm defaults were seeded safely.',
            'data' => $result,
        ]);
    }
}
