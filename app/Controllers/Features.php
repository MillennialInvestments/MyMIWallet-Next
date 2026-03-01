<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Features extends BaseController
{

    public function BrokerageIntegrations(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Features::BrokerageIntegrations');
        return redirect()->to('/Maintenance');
    }

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Features::index');
        return redirect()->to('/Maintenance');
    }
}
