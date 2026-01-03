<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Libraries\AiCostControls;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class AdminChatUsageController extends BaseController
{
    use ResponseTrait;

    public function index(): ResponseInterface
    {
        $controls = new AiCostControls();
        $month    = $this->request->getGet('month') ?: null;

        return $this->respond($controls->getChatUsageSummary($month));
    }
}
