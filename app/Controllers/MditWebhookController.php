<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MditWebhookController extends BaseController
{

    public function onramp(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: MditWebhookController::onramp');
        return redirect()->to('/Maintenance');
    }
}
