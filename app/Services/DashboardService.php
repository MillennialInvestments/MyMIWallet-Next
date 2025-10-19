<?php

namespace App\Services;

use App\Libraries\{BaseLoader, MyMIDashboard};

class DashboardService
{

    protected $MyMIDashboard;

    public function __construct()
    {
        $this->MyMIDashboard = new MyMIDashboard();
    }

    public function getPromotionalBanners($userId)
    {
        // Assuming `dashboardInfo` method fetches the relevant dashboard data including promotional banners
        $dashboardInfo = $this->MyMIDashboard->dashboardInfo($userId);
        return $dashboardInfo['promotionalBanners'] ?? [];
    }

    public function getDashboardInfo($userId)
    {
        return $this->MyMIDashboard->dashboardInfo($userId);
    }
}
