<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;

class SignalsAdminController extends BaseController
{
    public function index()
    {
        $dt = new \DateTime();
        $week = $dt->format('o') . '-' . $dt->format('W');

        return view('App\Modules\Management\Views\Signals\index', [
            'week' => $week,
        ]);
    }
}
