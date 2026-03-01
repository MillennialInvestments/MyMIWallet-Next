<?php

namespace App\Controllers;

class AIOpsController extends BaseController
{

    public function snapshot(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Modules\AIOps\Controllers\AIOpsController::snapshot');
        return redirect()->to('/Maintenance');
    }

    public function docsGaps(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Modules\AIOps\Controllers\AIOpsController::docsGaps');
        return redirect()->to('/Maintenance');
    }

    public function watch(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Modules\AIOps\Controllers\AIOpsController::watch');
        return redirect()->to('/Maintenance');
    }
}
