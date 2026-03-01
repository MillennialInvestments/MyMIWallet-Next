<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TaxConfig extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: TaxConfig::index');
        return redirect()->to('/Maintenance');
    }

    public function rates(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: TaxConfig::rates');
        return redirect()->to('/Maintenance');
    }

    public function templates(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: TaxConfig::templates');
        return redirect()->to('/Maintenance');
    }
}
