<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DocsController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: DocsController::index');
        return redirect()->to('/Maintenance');
    }

    public function view(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: DocsController::view');
        return redirect()->to('/Maintenance');
    }
}
