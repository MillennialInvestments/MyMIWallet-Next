<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use App\Services\Observability\ErrorAggregationService;
use App\Models\ErrorPatternModel;

class ErrorOpsController extends BaseController
{
    public function index()
    {
        // Use your dashboard theme conventions
        return $this->renderTheme('Management/admin/errors_dashboard', [
            'pageTitle' => 'Error Ops Dashboard',
        ]);
    }

    public function apiKpis()
    {
        $svc = new ErrorAggregationService();
        return $this->response->setJSON(['status' => 'success', 'data' => $svc->kpisLastMinutes(15)]);
    }

    public function apiTopControllers()
    {
        $svc = new ErrorAggregationService();
        return $this->response->setJSON(['status' => 'success', 'data' => $svc->topControllers(60, 25)]);
    }

    public function apiHeatmap()
    {
        $svc = new ErrorAggregationService();
        return $this->response->setJSON(['status' => 'success', 'data' => $svc->heatmapByController(24)]);
    }

    public function apiPatterns()
    {
        $model = new ErrorPatternModel();
        $rows = $model->orderBy('last_seen', 'DESC')->findAll(200);
        return $this->response->setJSON(['status' => 'success', 'data' => $rows]);
    }
}