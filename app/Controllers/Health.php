<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

class Health extends BaseController
{
    public function index(): ResponseInterface
    {
        return $this->response->setJSON([
            'status' => 'ok',
            'time'   => date('c'),
        ]);
    }

    public function status(): ResponseInterface
    {
        return $this->response
            ->setContentType('application/json')
            ->setJSON([
                'status' => 'ok',
                'time'   => date('c'),
            ]);
    }
}
