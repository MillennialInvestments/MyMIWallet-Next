<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

class Debug extends BaseController
{
    public function whoami(): ResponseInterface
    {
        $data = $this->commonData();
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        return $this->response->setJSON([
            'cuID'       => $data['cuID'] ?? null,
            'session_id' => session_id(),
            'headers'    => function_exists('getallheaders') ? getallheaders() : [],
        ]);
    }
}