<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HowItWorks extends BaseController
{

    public function MyMIGold(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: HowItWorks::MyMIGold');
        return redirect()->to('/Maintenance');
    }
}
