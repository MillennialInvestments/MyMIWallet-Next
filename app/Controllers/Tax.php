<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Tax extends BaseController
{

    public function ajaxRecalc(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Tax::ajaxRecalc');
        return redirect()->to('/Maintenance');
    }

    public function ajaxSaveAllocation(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Tax::ajaxSaveAllocation');
        return redirect()->to('/Maintenance');
    }

    public function ajaxSaveLine(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Tax::ajaxSaveLine');
        return redirect()->to('/Maintenance');
    }

    public function edit(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Tax::edit');
        return redirect()->to('/Maintenance');
    }

    public function exportCsv(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Tax::exportCsv');
        return redirect()->to('/Maintenance');
    }

    public function exportJson(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Tax::exportJson');
        return redirect()->to('/Maintenance');
    }

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Tax::index');
        return redirect()->to('/Maintenance');
    }

    public function preview(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Tax::preview');
        return redirect()->to('/Maintenance');
    }

    public function view(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Tax::view');
        return redirect()->to('/Maintenance');
    }
}
