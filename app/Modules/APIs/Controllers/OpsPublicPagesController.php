<?php

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;

class OpsPublicPagesController extends BaseController
{

    public function import(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Modules\APIs\Controllers\OpsPublicPagesController::import');
        return redirect()->to('/Maintenance');
    }

    public function report(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Modules\APIs\Controllers\OpsPublicPagesController::report');
        return redirect()->to('/Maintenance');
    }

    public function run(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Modules\APIs\Controllers\OpsPublicPagesController::run');
        return redirect()->to('/Maintenance');
    }
}
