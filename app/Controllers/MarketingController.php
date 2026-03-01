<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MarketingController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: MarketingController::index');
        return redirect()->to('/Maintenance');
    }

    public function topCommunities(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: MarketingController::topCommunities');
        return redirect()->to('/Maintenance');
    }
}
