<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use App\Libraries\AiOps\AiOpsManager;
use Config\Services;

class AiOpsManagementController extends BaseController
{
    protected AiOpsManager $manager;

    public function __construct()
    {
        $this->manager = new AiOpsManager();
    }

    public function index()
    {
        $siteSettings = config('SiteSettings');
        $monthKey     = $this->manager->getMonthKey();
        $summary      = $this->manager->getUsageSummary($monthKey);
        $events       = db_connect()->table('bf_ai_ops_events')->orderBy('id', 'DESC')->limit(20)->get()->getResultArray();

        $data = [
            'pageTitle'     => 'AI Ops Control Center',
            'monthKey'      => $monthKey,
            'summary'       => $summary,
            'events'        => $events,
            'siteSettings'  => $siteSettings,
        ];

        return view('App\Modules\Management\Views\AiOps\index', $data);
    }
}
