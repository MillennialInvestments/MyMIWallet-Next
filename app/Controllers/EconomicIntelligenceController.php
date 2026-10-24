<?php

namespace App\Controllers;

use App\Libraries\EconomicDataService;
use CodeIgniter\HTTP\ResponseInterface;

final class EconomicIntelligenceController extends Home
{
    public function index(): string|ResponseInterface
    {
        $data = $this->buildCommonData([
            'layout' => 'public',
            'pageName' => 'Economic Intelligence',
            'pageTitle' => 'MyMI Wallet | Economic Intelligence',
        ]);

        if ($data instanceof ResponseInterface) {
            return $data;
        }

        $data['economicSnapshot'] = ['indicators' => []];

        try {
            $data['economicSnapshot'] =
                (new EconomicDataService())->latestSnapshot();
        } catch (\Throwable $exception) {
            log_message('warning', 'Public economic snapshot unavailable');
        }

        return $this->renderTheme(
            'themes/public/economicIntelligence',
            $data
        );
    }
}
