<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\Ops\EnvDoctorService;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class OpsHealth extends BaseController
{
    use ResponseTrait;

    public function index(): ResponseInterface
    {
        $service = new EnvDoctorService();
        $summary = $service->latestSummary();

        if (! $summary) {
            return $this->failNotFound('No EnvDoctor report available.');
        }

        return $this->respond($summary);
    }

    public function score(): ResponseInterface
    {
        $service = new EnvDoctorService();
        $summary = $service->latestSummary();

        if (! $summary) {
            return $this->failNotFound('No EnvDoctor report available.');
        }

        return $this->respond([
            'score' => $summary['score'] ?? 0,
            'status' => $summary['status'] ?? 'unknown',
            'generated_at' => $summary['generated_at'] ?? null,
        ]);
    }

    public function run(): ResponseInterface
    {
        $service = new EnvDoctorService();
        $result = $service->run(false);
        $summary = $service->summarizeReport($result['report']);
        $summary['paths'] = $result['paths'];

        return $this->respond($summary);
    }
}
