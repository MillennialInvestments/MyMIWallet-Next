<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;

class AiOpsManagementAdminController extends BaseController
{
    public function index()
    {
        $data = [
            'pageTitle'     => 'AI Ops Control Center',
        ];

        return view('App\Modules\Management\Views\AiOps\index', $data);
    }
}
