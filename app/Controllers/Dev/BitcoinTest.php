<?php

namespace App\Controllers\Dev;

use App\Controllers\BaseController;

class BitcoinTest extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Controllers\Dev\BitcoinTest::index');
        return redirect()->to('/Maintenance');
    }
}
