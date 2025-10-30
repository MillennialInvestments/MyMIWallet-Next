<?php
namespace App\Modules\Template\Controllers;

use App\Controllers\BaseController;

/**
 * Example controller for the Template module.
 */
class TemplateController extends BaseController
{
    public function index()
    {
        return view('Template\\index');
    }
}
