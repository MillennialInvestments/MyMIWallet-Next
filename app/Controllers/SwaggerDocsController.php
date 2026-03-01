<?php

namespace App\Controllers;

class SwaggerDocsController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: Api\SwaggerDocsController::index');
        return redirect()->to('/Maintenance');
    }
}
