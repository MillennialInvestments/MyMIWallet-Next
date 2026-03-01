<?php

namespace App\Controllers;

class AiOpsManualRunController extends BaseController
{

    public function run(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Api\\AiOpsManualRunController::run');
        return redirect()->to('/Maintenance');
    }
}
