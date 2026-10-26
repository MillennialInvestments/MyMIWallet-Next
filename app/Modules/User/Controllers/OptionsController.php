<?php

declare(strict_types=1);

namespace App\Modules\User\Controllers;

use App\Controllers\BaseUserController;
use App\Models\Options\OptionsPositionModel;
use App\Models\Options\OptionsScanCandidateModel;
use App\Services\Options\OptionsScannerEngine;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

#[\AllowDynamicProperties]
class OptionsController extends BaseUserController
{
    private OptionsScanCandidateModel $candidateModel;
    private OptionsPositionModel $positionModel;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        helper(['directory', 'form', 'file', 'url']);
        $this->candidateModel = new OptionsScanCandidateModel();
        $this->positionModel = new OptionsPositionModel();
    }

    /**
     * Options Opportunity Scanner & Momentum Manager Dashboard.
     */
    public function index()
    {
        $this->setCurrentUser();
        $data = $this->preparePageData('Investments', 'Options Momentum');
        $data['page_title'] = 'MyMI Options Opportunity Scanner & Trade Momentum Manager';

        return $this->renderTheme('Investments/Options_Momentum_Dashboard', $data);
    }
}
