<?php

declare(strict_types=1);

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;

class ScannerController extends BaseController
{
    public function status()
    {
        return $this->response->setJSON(['status' => 'success', 'data' => service('scannerService')->status()]);
    }

    public function run()
    {
        $input = $this->request->getJSON(true) ?: $this->request->getPost();
        $data = service('scannerService')->run(is_array($input) ? $input : []);
        return $this->response->setJSON(['status' => 'success', 'data' => $data]);
    }

    public function results()
    {
        $filters = $this->request->getGet();
        return $this->response->setJSON(['status' => 'success', 'data' => service('scannerService')->results($filters)]);
    }

    public function symbol(string $symbol)
    {
        $filters = $this->request->getGet();
        $filters['symbol'] = $symbol;
        return $this->response->setJSON(['status' => 'success', 'data' => service('scannerService')->results($filters)]);
    }

    public function syncUniverse()
    {
        $count = service('scannerService')->syncUniverse();
        return $this->response->setJSON(['status' => 'success', 'data' => ['synced' => $count]]);
    }
}
