<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BlogController extends BaseController
{

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: BlogController::index');
        return redirect()->to('/Maintenance');
    }

    public function view(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: BlogController::view');
        return redirect()->to('/Maintenance');
    }

    public function viewBlog(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: BlogController::viewBlog');
        return redirect()->to('/Maintenance');
    }
}
