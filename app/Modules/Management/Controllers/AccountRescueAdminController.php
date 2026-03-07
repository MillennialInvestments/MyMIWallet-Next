<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseAdminController;

use App\Models\AuditLogModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

class AccountRescueAdminController extends BaseAdminController
{
    protected $helpers = ['form', 'url'];

    public function index(): string
    {
        $data = $this->commonData();
        $data['pageTitle'] = 'Account Rescue | Management | MyMI Wallet';
        $data['lookupEmail'] = '';
        $data['lookupUser'] = null;

        return $this->renderTheme('App\Modules\Management\Views\AccountRescue\index', $data);
    }

    public function lookup(): string
    {
        $email = strtolower(trim((string) $this->request->getPost('email')));

        $data = $this->commonData();
        $data['pageTitle'] = 'Account Rescue | Management | MyMI Wallet';
        $data['lookupEmail'] = $email;
        $data['lookupUser'] = null;

        if ($email === '' || ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            session()->setFlashdata('auth_message', [
                'type' => 'warning',
                'text' => 'Enter a valid email address to look up.',
            ]);

            return $this->renderTheme('App\Modules\Management\Views\AccountRescue\index', $data);
        }

        $userModel = model(UserModel::class);
        $user = $userModel->where('email', $email)->first();

        if (! $user) {
            session()->setFlashdata('auth_message', [
                'type' => 'info',
                'text' => 'No user found for that email.',
            ]);
            $this->logAudit('account_rescue.lookup_miss', null, [
                'email_hash' => sha1($email),
            ]);

            return $this->renderTheme('App\Modules\Management\Views\AccountRescue\index', $data);
        }

        $data['lookupUser'] = $this->mapUser($user);

        $this->logAudit('account_rescue.lookup', (int) ($user->id ?? 0), [
            'email_hash' => sha1($email),
        ]);

        return $this->renderTheme('App\Modules\Management\Views\AccountRescue\index', $data);
    }

    public function resendActivation(): RedirectResponse
    {
        return $this->handleActivationAction('resend_activation');
    }

    public function manualActivate(): RedirectResponse
    {
        return $this->handleActivationAction('manual_activate');
    }

    public function forcePasswordReset(): RedirectResponse
    {
        return $this->handleActivationAction('force_password_reset');
    }

    public function unlockAccount(): RedirectResponse
    {
        $email = strtolower(trim((string) $this->request->getPost('email')));
        $userId = (int) $this->request->getPost('user_id');

        if ($email === '' || $userId === 0) {
            session()->setFlashdata('auth_message', [
                'type' => 'warning',
                'text' => 'Missing account details for unlock.',
            ]);
            return redirect()->back();
        }

        $db = db_connect();
        $db->table('login_attempts')->where('identifier', $email)->delete();

        log_message('info', '[SUPPORT] Account unlock requested', [
            'admin_id' => $this->currentAdminId(),
            'user_id' => $userId,
            'email_hash' => sha1($email),
            'ip' => $this->request->getIPAddress(),
        ]);

        $this->logAudit('account_rescue.unlock', $userId, [
            'email_hash' => sha1($email),
        ]);

        session()->setFlashdata('auth_message', [
            'type' => 'success',
            'text' => 'Login lockout cleared (if one existed).',
        ]);

        return redirect()->back();
    }

    private function handleActivationAction(string $action): RedirectResponse
    {
        $email = strtolower(trim((string) $this->request->getPost('email')));
        $userId = (int) $this->request->getPost('user_id');

        if ($email === '' || $userId === 0) {
            session()->setFlashdata('auth_message', [
                'type' => 'warning',
                'text' => 'Missing account details for action.',
            ]);
            return redirect()->back();
        }

        $userModel = model(UserModel::class);
        $user = $userModel->find($userId);

        if (! $user) {
            session()->setFlashdata('auth_message', [
                'type' => 'warning',
                'text' => 'User not found for this action.',
            ]);
            return redirect()->back();
        }

        $transport = $this->mailerTransport();
        $emailHash = sha1($email);
        $result = 'skipped';

        if ($action === 'resend_activation') {
            if ((int) ($user->active ?? 0) === 0) {
                $activator = service('activator');
                $sent = $activator->send($user);
                $result = $sent ? 'sent' : 'failed';

                if (! $sent) {
                    log_message('error', '[SUPPORT] Admin resend activation failed', [
                        'admin_id' => $this->currentAdminId(),
                        'user_id' => $userId,
                        'email_hash' => $emailHash,
                        'error' => $activator->error() ?? lang('Auth.unknownError'),
                    ]);
                }
            } else {
                $result = 'already_active';
            }
        }

        if ($action === 'manual_activate') {
            if ((int) ($user->active ?? 0) === 0) {
                $user->activate();
                $userModel->save($user);
                $result = 'activated';
            } else {
                $result = 'already_active';
            }
        }

        if ($action === 'force_password_reset') {
            $user->generateResetHash();
            $userModel->save($user);
            $resetter = service('resetter');
            $sent = $resetter->send($user);
            $result = $sent ? 'sent' : 'failed';

            if (! $sent) {
                log_message('error', '[SUPPORT] Admin password reset failed', [
                    'admin_id' => $this->currentAdminId(),
                    'user_id' => $userId,
                    'email_hash' => $emailHash,
                    'error' => $resetter->error() ?? lang('Auth.unknownError'),
                ]);
            }
        }

        log_message('info', '[SUPPORT] Admin account rescue action', [
            'action' => $action,
            'admin_id' => $this->currentAdminId(),
            'user_id' => $userId,
            'email_hash' => $emailHash,
            'result' => $result,
            'transport' => $transport,
            'ip' => $this->request->getIPAddress(),
        ]);

        $this->logAudit('account_rescue.' . $action, $userId, [
            'email_hash' => $emailHash,
            'result' => $result,
            'transport' => $transport,
        ]);

        session()->setFlashdata('auth_message', [
            'type' => $result === 'failed' ? 'warning' : 'success',
            'text' => 'Action completed. Check logs for delivery status.',
        ]);

        return redirect()->back();
    }

    private function mapUser($user): array
    {
        $emailVerified = (int) ($user->active ?? 0) === 1 && empty($user->activate_hash);

        return [
            'id' => (int) ($user->id ?? 0),
            'email' => (string) ($user->email ?? ''),
            'active' => (int) ($user->active ?? 0) === 1,
            'email_verified' => $emailVerified,
            'created_at' => $user->created_at ?? null,
            'referral_code' => $user->referral_code ?? null,
            'last_login' => $user->last_login ?? null,
        ];
    }

    private function logAudit(string $event, ?int $targetId, array $meta = []): void
    {
        $audit = model(AuditLogModel::class);

        $audit->insert([
            'event' => $event,
            'actor_id' => $this->currentAdminId(),
            'target' => $targetId ? (string) $targetId : null,
            'meta_json' => json_encode($meta),
            'ip_address' => $this->request->getIPAddress(),
            'user_agent' => (string) $this->request->getUserAgent(),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    private function currentAdminId(): int
    {
        return (int) (service('authentication')->id() ?? 0);
    }

    private function mailerTransport(): string
    {
        $emailConfig = config('Email');

        return (string) ($emailConfig->protocol ?? 'mail');
    }
}
