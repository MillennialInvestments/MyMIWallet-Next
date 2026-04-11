<?php

namespace App\Modules\PropFirms\Controllers;

use App\Controllers\UserController;
use App\Modules\PropFirms\Libraries\PropFirmsService;

class DashboardController extends UserController
{
    public function index()
    {
        $service = service('propFirmsService');

        $data = $this->commonData();
        $data['pageTitle'] = 'Prop Firms Dashboard';
        $data['summary'] = $service->dashboardSummary((int) ($this->cuID ?? 0));

        return $this->renderTheme('App\Modules\PropFirms\Views\dashboard\propfirms', $data);
    }
}
