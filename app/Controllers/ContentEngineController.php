<?php

namespace App\Controllers;

class ContentEngineController extends BaseController
{

    public function run(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Modules\ContentEngine\Controllers\ContentEngineController::run');
        return redirect()->to('/Maintenance');
    }

    public function draft(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Modules\ContentEngine\Controllers\ContentEngineController::draft');
        return redirect()->to('/Maintenance');
    }
}
