<?php

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;

class BitcoinController extends BaseController
{

    public function broadcastSignedTx(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Modules\APIs\Controllers\BitcoinController::broadcastSignedTx');
        return redirect()->to('/Maintenance');
    }

    public function buildUnsignedPsbt(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Modules\APIs\Controllers\BitcoinController::buildUnsignedPsbt');
        return redirect()->to('/Maintenance');
    }
}
