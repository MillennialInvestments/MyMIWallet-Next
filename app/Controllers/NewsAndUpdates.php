<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class NewsAndUpdates extends BaseController
{

    public function IntegratingWithPlaid(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: NewsAndUpdates::IntegratingWithPlaid');
        return redirect()->to('/Maintenance');
    }

    public function TheRoadmapToTheFutureOfFinance(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: NewsAndUpdates::TheRoadmapToTheFutureOfFinance');
        return redirect()->to('/Maintenance');
    }

    public function index(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: NewsAndUpdates::index');
        return redirect()->to('/Maintenance');
    }
}
