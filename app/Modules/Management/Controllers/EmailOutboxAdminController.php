<?php

declare(strict_types=1);

namespace App\Modules\Management\Controllers;

use App\Controllers\UserController;
use App\Libraries\MailService;
use App\Models\EmailOutboxModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

class EmailOutboxAdminController extends UserController
{
    protected EmailOutboxModel $outbox;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->outbox = new EmailOutboxModel();
    }

    public function index(): ResponseInterface|string
    {
        $data = $this->commonData();
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        if (! $this->isAdmin()) {
            return $this->response->setStatusCode(403)->setBody('Forbidden');
        }

        $filters = [
            'type' => (string) ($this->request->getGet('type') ?? ''),
            'status' => (string) ($this->request->getGet('status') ?? ''),
            'date_from' => (string) ($this->request->getGet('date_from') ?? ''),
            'date_to' => (string) ($this->request->getGet('date_to') ?? ''),
            'search' => (string) ($this->request->getGet('search') ?? ''),
        ];

        $limit = 200;
        $rows = $this->outbox->getFiltered($filters, $limit, 0);
        $total = $this->outbox->countFiltered($filters);

        $data['pageTitle'] = 'Email Outbox | Management';
        $data['filters'] = $filters;
        $data['outboxRows'] = $rows;
        $data['outboxTotal'] = $total;

        return $this->renderTheme('App\Modules\Management\Views\EmailOutbox\index', $data);
    }

    public function sendTest(): ResponseInterface|RedirectResponse
    {
        if (! $this->isAdmin()) {
            return $this->response->setStatusCode(403)->setJSON(['status' => 'error', 'message' => 'Forbidden']);
        }

        $to = strtolower(trim((string) $this->request->getPost('to_email')));
        $template = strtolower(trim((string) $this->request->getPost('template')));

        if ($to === '' || ! filter_var($to, FILTER_VALIDATE_EMAIL)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Please provide a valid email address.',
            ]);
        }

        $mailService = new MailService();
        $result = null;

        if ($template === 'activation') {
            $user = (object) ['id' => null, 'email' => $to, 'name' => 'Admin Test'];
            $token = bin2hex(random_bytes(16));
            $result = $mailService->sendActivationEmail($user, $token, ['source' => 'admin']);
        } elseif ($template === 'reset') {
            $user = (object) ['id' => null, 'email' => $to, 'name' => 'Admin Test'];
            $token = bin2hex(random_bytes(16));
            $result = $mailService->sendPasswordResetEmail($user, $token, ['source' => 'admin']);
        } else {
            $subject = 'MyMI Wallet test email';
            $html = view('emails/layout', [
                'title' => $subject,
                'content' => '<p>This is a generic MyMI Wallet test email.</p>',
                'logoUrl' => rtrim((string) (getenv('APP_URL') ?: site_url()), '/') . '/assets/images/MyMI-Wallet-Logo-Black.png',
                'appUrl' => rtrim((string) (getenv('APP_URL') ?: site_url()), '/'),
                'supportEmail' => 'support@mymiwallet.com',
                'preheader' => $subject,
            ]);
            $result = $mailService->sendGeneric($to, $subject, $html, 'This is a generic MyMI Wallet test email.', ['source' => 'admin']);
        }

        if (! ($result['ok'] ?? false)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Email send failed. ' . ($result['error'] ?? ''),
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Test email sent successfully.',
            'outbox_id' => $result['outbox_id'] ?? null,
        ]);
    }

    private function isAdmin(): bool
    {
        if (function_exists('has_permission') && has_permission('admin.access')) {
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
}
