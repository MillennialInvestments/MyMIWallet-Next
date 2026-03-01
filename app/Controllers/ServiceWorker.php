<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ServiceWorker extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ServiceWorker::index');
        return redirect()->to('/Maintenance');
    }
}
