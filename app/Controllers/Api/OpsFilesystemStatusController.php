<?php

declare(strict_types=1);

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class OpsFilesystemStatusController extends BaseController
{
    use ResponseTrait;

    public function index(): ResponseInterface
    {
        $lintPath = ROOTPATH . 'docs/_ops/filesystem-lint.json';
        $trendPath = ROOTPATH . 'docs/_ops/filesystem-trend.md';

        $lint = [];
        if (is_file($lintPath)) {
            $decoded = json_decode((string) file_get_contents($lintPath), true);
            if (is_array($decoded)) {
                $lint = $decoded;
            }
        }

        $errors = (int) ($lint['severity_summary']['error'] ?? 0);
        $warnings = (int) ($lint['severity_summary']['warning'] ?? 0);
        $status = $errors > 0 ? 'unhealthy' : ($warnings > 0 ? 'warning' : 'healthy');

        $trend = 'stable';
        if (is_file($trendPath)) {
            $trendBody = (string) file_get_contents($trendPath);
            if (str_contains($trendBody, '✅ Improving')) {
                $trend = 'improving';
            } elseif (str_contains($trendBody, '❌ Regressing')) {
                $trend = 'regressing';
            }
        }

        return $this->respond([
            'status' => $status,
            'errors' => $errors,
            'warnings' => $warnings,
            'trend' => $trend,
            'last_run' => (string) ($lint['generated_at'] ?? ''),
        ]);
    }
}
