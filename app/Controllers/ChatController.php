<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ChatController extends BaseController
{

    public function me(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ChatController::me');
        return redirect()->to('/Maintenance');
    }

    public function tool(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ChatController::tool');
        return redirect()->to('/Maintenance');
    }

    public function health(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Modules\Chat\Controllers\ChatController::health');
        return redirect()->to('/Maintenance');
    }

    public function usage(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Modules\Chat\Controllers\ChatController::usage');
        return redirect()->to('/Maintenance');
    }
}
