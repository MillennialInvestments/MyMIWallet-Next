<?php

namespace App\Controllers;

class OpsFilesystemStatusController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Api\OpsFilesystemStatusController::index');
        return redirect()->to('/Maintenance');
    }
}
