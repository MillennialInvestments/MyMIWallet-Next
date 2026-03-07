<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseAdminController;


class AiOpsManagementAdminController extends BaseAdminController
{
    public function index()
    {
        $data = [
            'pageTitle'     => 'AI Ops Control Center',
        ];

        return view('App\Modules\Management\Views\AiOps\index', $data);
    }
}
