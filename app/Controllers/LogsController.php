<?php

namespace App\Controllers;

class LogsController extends BaseController
{

    public function summary(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Modules\Logs\Controllers\LogsController::summary');
        return redirect()->to('/Maintenance');
    }
}
