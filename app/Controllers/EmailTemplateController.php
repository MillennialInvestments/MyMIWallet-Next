<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EmailTemplateController extends BaseController
{

    public function create(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: EmailTemplateController::create');
        return redirect()->to('/Maintenance');
    }

    public function store(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: EmailTemplateController::store');
        return redirect()->to('/Maintenance');
    }
}
