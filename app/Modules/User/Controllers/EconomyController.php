<?php

namespace App\Modules\User\Controllers;

use App\Controllers\BaseUserController;

use App\Libraries\EconomicDataService;

class EconomyController extends BaseUserController
{
    private EconomicDataService $service;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->service = new EconomicDataService();
    }

    public function dashboardWidget()
    {
        $snapshot = $this->service->latestSnapshot();
        $series = array_reverse($this->service->unemploymentSeries(48));

        return view('Investments/economy_widget', [
            'snapshot' => $snapshot,
            'unemploymentSeries' => $series,
        ]);
    }

    public function latest()
    {
        return $this->response->setJSON($this->service->latestSnapshot());
    }

    public function updateAll()
    {
        $summary = $this->service->updateAllIndicators();
        return $this->response->setJSON([
            'status' => 'ok',
            'summary' => $summary,
        ]);
    }
}
