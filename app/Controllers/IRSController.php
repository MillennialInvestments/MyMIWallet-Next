<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class IRSController extends BaseController
{

    public function IRSExpandedHomeEnergyTaxCredits(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: IRSController::IRSExpandedHomeEnergyTaxCredits');
        return redirect()->to('/Maintenance');
    }
}
