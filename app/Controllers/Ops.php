<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Ops extends BaseController
{

    public function opcacheReset(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Ops::opcacheReset');
        return redirect()->to('/Maintenance');
    }
}
