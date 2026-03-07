<?php
namespace App\Deprecated\Controllers;

use App\Controllers\BaseController;

/**
 * Example controller for the Template module.
 */
class LegacyTemplateController extends BaseController
{
    public function index()
    {
        return view('Template\\index');
    }
}
