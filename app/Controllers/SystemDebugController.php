<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\AIOps\RouteErrorHeatmapService;

class SystemDebugController extends BaseController
{
    public function errorHeatmap()
    {
        $service = new RouteErrorHeatmapService();

        return $this->response->setJSON([
            'status' => 'ok',
            'generated_at' => date(DATE_ATOM),
            'routes' => $service->topRoutes(100),
        ]);
    }

    public function index()
    {
        $service = new RouteErrorHeatmapService();
        $heatmap = $service->topRoutes(25);

        $reportFiles = [
            'autofix' => ROOTPATH . 'docs/reports/autofix_report.md',
            'route_suggestions' => ROOTPATH . 'docs/reports/route_suggestions.md',
            'missing_views' => ROOTPATH . 'docs/reports/missing_views_report.md',
        ];

        $reports = [];
        foreach ($reportFiles as $key => $file) {
            $reports[$key] = is_file($file)
                ? (string) file_get_contents($file)
                : 'Report not generated yet.';
        }

        return view('management/system_debug', [
            'pageTitle' => 'System Debug',
            'heatmap' => $heatmap,
            'reports' => $reports,
        ]);
    }
}
