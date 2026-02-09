<?php

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Libraries\DocsIndex;
use CodeIgniter\HTTP\ResponseInterface;
use Throwable;

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
        try {
            $docs = $this->index->scan();
            return $this->response->setJSON(['status' => 'success', 'data' => is_array($docs) ? $docs : []]);
        } catch (Throwable $e) {
            log_message('error', '[API] docs index failed: {message}', ['message' => $e->getMessage()]);
            return $this->response->setJSON(['status' => 'success', 'data' => []]);
        }
    }

    public function view(): ResponseInterface
    {
        $path = (string) ($this->request->getGet('path') ?? '');

        try {
            $content = $path !== '' ? (string) $this->index->getContents($path) : '';
            return $this->response->setJSON(['status' => 'success', 'data' => ['path' => $path, 'content' => $content]]);
        } catch (Throwable $e) {
            log_message('error', '[API] docs view failed: {message}', ['message' => $e->getMessage()]);
            return $this->response->setJSON(['status' => 'success', 'data' => ['path' => $path, 'content' => '']]);
        }
    }
}