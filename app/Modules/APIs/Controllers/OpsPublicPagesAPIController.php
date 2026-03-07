<?php

declare(strict_types=1);

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;


class OpsPublicPagesAPIController extends BaseAPIController
{
    public function run()
    {
        command('aiops:public-pages:run --due');
        return $this->response->setJSON(['status' => 'ok']);
    }

    public function import()
    {
        command('aiops:public-pages:import');
        return $this->response->setJSON(['status' => 'ok']);
    }

    public function report()
    {
        $run = (string) ($this->request->getGet('run') ?? '');
        if ($run === '') {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'run is required']);
        }
        command('aiops:public-pages:report --run=' . $run);
        return $this->response->setJSON(['status' => 'ok']);
    }
}
