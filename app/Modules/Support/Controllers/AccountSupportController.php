<?php

namespace App\Modules\Support\Controllers;

use App\Controllers\UserController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

class AccountSupportController extends UserController
{
    use ResponseTrait;

    protected $helpers = ['form', 'url'];

    public function index()
    {
        $data = $this->commonData();
        $data['pageTitle'] = 'Account Help Center | MyMI Wallet';

        return $this->renderTheme('SupportModule/Support/account_help', $data);
    }

    public function resendActivation(): ResponseInterface|RedirectResponse
    {
        return $this->handleSupportAction('activation');
    }

    public function sendPasswordReset(): ResponseInterface|RedirectResponse
    {
        return $this->handleSupportAction('password_reset');
    }

    private function handleSupportAction(string $action): ResponseInterface|RedirectResponse
    {
        $email = strtolower(trim((string) $this->request->getPost('email')));
        $ip    = $this->request->getIPAddress();
        $emailHash = $this->hashEmail($email);

        $genericMessage = 'If an account exists for that email, we sent instructions.';

        if (! $this->checkRateLimit($action, $ip, $emailHash)) {
            log_message('warning', '[SUPPORT] Rate limited', ['ip' => $ip, 'action' => $action]);
            return $this->respondGeneric($genericMessage);
        }

        log_message('info', '[SUPPORT] Account help requested', [
            'action' => $action,
            'email_hash' => $emailHash,
            'ip' => $ip,
        ]);

        if ($email === '' || ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            log_message('notice', '[SUPPORT] Account help missing/invalid email', [
                'action' => $action,
                'email_hash' => $emailHash,
                'ip' => $ip,
            ]);

            return $this->respondGeneric($genericMessage);
        }

        $users = model(UserModel::class);
        $user  = $users->where('email', $email)->first();

        $result = 'skipped';
        $transport = $this->mailerTransport();

        if ($action === 'activation') {
            if ($user && (int) ($user->active ?? 0) === 0) {
                $activator = service('activator');
                $sent = $activator->send($user);
                $result = $sent ? 'sent' : 'failed';

                if (! $sent) {
                    log_message('error', '[SUPPORT] Resend activation failed', [
                        'email_hash' => $emailHash,
                        'ip' => $ip,
                        'error' => $activator->error() ?? lang('Auth.unknownError'),
                    ]);
                    return $this->respondFailure();
                }
            } elseif ($user && (int) ($user->active ?? 0) === 1) {
                $result = 'already_active';
            } else {
                $result = 'no_user';
            }
        }

        if ($action === 'password_reset') {
            if ($user) {
                $user->generateResetHash();
                $users->save($user);

                $resetter = service('resetter');
                $sent = $resetter->send($user);
                $result = $sent ? 'sent' : 'failed';

                if (! $sent) {
                    log_message('error', '[SUPPORT] Password reset failed', [
                        'email_hash' => $emailHash,
                        'ip' => $ip,
                        'error' => $resetter->error() ?? lang('Auth.unknownError'),
                    ]);
                    return $this->respondFailure();
                }
            } else {
                $result = 'no_user';
            }
        }

        log_message('info', '[SUPPORT] Account help outcome', [
            'action' => $action,
            'email_hash' => $emailHash,
            'ip' => $ip,
            'result' => $result,
            'transport' => $transport,
        ]);

        return $this->respondGeneric($genericMessage);
    }

    private function respondGeneric(string $message): ResponseInterface|RedirectResponse
    {
        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => $message,
            ]);
        }

        session()->setFlashdata('auth_message', [
            'type' => 'info',
            'text' => $message,
        ]);

        return redirect()->back();
    }

    private function respondFailure(): ResponseInterface|RedirectResponse
    {
        $message = 'We couldn’t send your email right now. Please try again or contact support.';

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $message,
            ]);
        }

        session()->setFlashdata('auth_message', [
            'type' => 'danger',
            'text' => $message,
        ]);

        return redirect()->back();
    }

    private function checkRateLimit(string $action, string $ip, string $emailHash): bool
    {
        $throttler = service('throttler');
        $ipKey = md5("support-{$action}-ip:{$ip}");
        $ipAllowed = $throttler->check($ipKey, 5, 10 * MINUTE);

        if (! $ipAllowed) {
            return false;
        }

        if ($emailHash === '') {
            return true;
        }

        $emailKey = md5("support-{$action}-email:{$emailHash}");
        return $throttler->check($emailKey, 3, 10 * MINUTE);
    }

    private function hashEmail(string $email): string
    {
        if ($email === '') {
            return '';
        }

        return sha1(strtolower(trim($email)));
    }

    private function mailerTransport(): string
    {
        $emailConfig = config('Email');

        return (string) ($emailConfig->protocol ?? 'mail');
    }
}
