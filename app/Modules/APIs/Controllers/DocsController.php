<?php

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Libraries\DocsIndex;
use CodeIgniter\HTTP\ResponseInterface;

class DocsController extends BaseController
{
    private DocsIndex $index;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->index = new DocsIndex();
    }

    public function index(): ResponseInterface
    {
        $docs = $this->index->scan();
        return $this->response->setJSON(['status' => 'success', 'data' => $docs]);
    }

    public function view(): ResponseInterface
    {
        $path = $this->request->getGet('path');
        $content = $path ? $this->index->getContents($path) : '';
        return $this->response->setJSON(['status' => 'success', 'data' => ['path' => $path, 'content' => $content]]);
    }
}