<?php

declare(strict_types=1);

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use App\Models\AIOpsChatAdminModel;
use App\Services\AIOps\ChatIngestService;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class ChatAdminController extends BaseController
{
    use ResponseTrait;

    protected ChatIngestService $ingestService;
    protected AIOpsChatAdminModel $chatAdminModel;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->ingestService = new ChatIngestService();
        $this->chatAdminModel = new AIOpsChatAdminModel();
    }

    public function index(): ResponseInterface|string
    {
        if (! $this->isAdmin()) {
            return $this->response->setStatusCode(403)->setBody('Forbidden');
        }

        $data = $this->commonData();
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        $data['pageTitle'] = 'AIOps Chat Admin';

        return view('App\Modules\Management\Views\admin\chat', $data);
    }

    public function submit(): ResponseInterface
    {
        if (! $this->isAdmin()) {
            return $this->failUnauthorized('Unauthorized');
        }

        if (! $this->request->is('post')) {
            return $this->fail('Invalid method', 405);
        }

        if (! $this->checkThrottle()) {
            return $this->respond([
                'status' => 'throttled',
                'message' => 'Please wait 5 seconds between submissions.',
            ], 429);
        }

        $rawText = (string) ($this->request->getPost('text') ?? '');
        if ($rawText === '') {
            return $this->failValidationErrors('Text is required.');
        }

        try {
            $cleanText = $this->ingestService->sanitizeInput($rawText);
            $result = $this->ingestService->runIngest($cleanText);
            $this->ingestService->logInstruction($result['instruction_id'] ?? null);

            $id = $this->chatAdminModel->insert([
                'user_id'        => $this->currentUserId(),
                'raw_text'       => $rawText,
                'cleaned_text'   => $cleanText,
                'instruction_id' => $result['instruction_id'] ?? null,
                'created_at'     => date('Y-m-d H:i:s'),
            ], true);

            log_message('info', '[ChatAdminController] Ingest submitted by admin {userId}', [
                'userId' => $this->currentUserId() ?? 0,
            ]);

            return $this->respond([
                'status' => $result['status'],
                'id' => $id,
                'instruction_id' => $result['instruction_id'],
                'output' => $result['output'],
            ]);
        } catch (\Throwable $e) {
            log_message('error', '[ChatAdminController] submit failed: {message}', ['message' => $e->getMessage()]);
            $this->logFailureToDatabase($e->getMessage());

            return $this->respond([
                'status' => 'error',
                'message' => 'Failed to submit ingest request.',
            ], 500);
        }
    }

    public function history(): ResponseInterface
    {
        if (! $this->isAdmin()) {
            return $this->failUnauthorized('Unauthorized');
        }

        $rows = $this->chatAdminModel
            ->orderBy('id', 'DESC')
            ->limit(25)
            ->findAll();

        return $this->respond([
            'status' => 'ok',
            'rows' => $rows,
        ]);
    }

    private function isAdmin(): bool
    {
        if (function_exists('has_permission') && has_permission('admin.access')) {
            return true;
        }

        if (function_exists('in_groups') && in_groups(['admin', 'superadmin'])) {
            return true;
        }

        $auth = service('authentication');
        if (method_exists($auth, 'user')) {
            $user = $auth->user();
            if ($user && method_exists($user, 'can') && $user->can('admin.access')) {
                return true;
            }
        }

        return false;
    }

    private function currentUserId(): ?int
    {
        $auth = service('authentication');
        if (! method_exists($auth, 'id')) {
            return null;
        }

        $id = $auth->id();

        return is_numeric($id) ? (int) $id : null;
    }

    private function checkThrottle(): bool
    {
        $session = session();
        $key = 'chat_admin_last_submit_' . ($this->currentUserId() ?? 'guest');
        $last = (int) ($session->get($key) ?? 0);

        if ($last > 0 && (time() - $last) < 5) {
            return false;
        }

        $session->set($key, time());

        return true;
    }

    private function logFailureToDatabase(string $message): void
    {
        try {
            $db = \Config\Database::connect();
            if (! method_exists($db, 'tableExists') || ! $db->tableExists('bf_error_logs')) {
                return;
            }

            $payload = [
                'source' => 'ChatAdminController',
                'message' => mb_substr($message, 0, 500),
                'severity' => 'error',
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $columns = array_map('strtolower', $db->getFieldNames('bf_error_logs'));
            $filtered = [];

            foreach ($payload as $key => $value) {
                if (in_array(strtolower($key), $columns, true)) {
                    $filtered[$key] = $value;
                }
            }

            if ($filtered !== []) {
                $db->table('bf_error_logs')->insert($filtered);
            }
        } catch (\Throwable $e) {
            log_message('error', '[ChatAdminController] failed writing bf_error_logs: {message}', ['message' => $e->getMessage()]);
        }
    }
}
