<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SmtpTestController extends BaseController
{
    public function probe(): ResponseInterface
    {
        helper('auth');

        if (! function_exists('logged_in') || ! logged_in()) {
            return $this->response->setStatusCode(401)->setJSON([
                'status'  => 'error',
                'message' => 'Authentication required.',
            ]);
        }

        if (function_exists('in_groups') && ! in_groups(['admin', 'superadmin'])) {
            return $this->response->setStatusCode(403)->setJSON([
                'status'  => 'error',
                'message' => 'Admin access required.',
            ]);
        }

        $config = config('Email');
        $to     = $this->request->getGet('to') ?? getenv('mail.test.to') ?? $config->fromEmail;

        $email = service('email');
        $email->setFrom($config->fromEmail, $config->fromName);
        $email->setTo($to);
        $email->setSubject('MyMI Wallet SMTP admin probe');
        $email->setMessage('SMTP admin probe executed at ' . date('c') . '.');

        $meta = [
            'host'     => $config->SMTPHost,
            'port'     => $config->SMTPPort,
            'protocol' => $config->protocol,
            'crypto'   => $config->SMTPCrypto,
            'from'     => $config->fromEmail,
            'to'       => $to,
        ];

        $debug = '';
        $sent  = false;

        try {
            $sent  = $email->send(false);
            $debug = $email->printDebugger(['headers', 'subject', 'body']);
        } catch (\Throwable $e) {
            $debug = 'Exception: ' . $e->getMessage();
        }

        $payload = [
            'status'  => $sent ? 'ok' : 'error',
            'meta'    => $meta,
            'debug'   => $debug,
            'message' => $sent ? 'SMTP test email sent.' : 'SMTP test email failed.',
        ];

        log_message($sent ? 'info' : 'error', 'SMTP admin probe completed', array_merge($meta, ['sent' => $sent]));

        return $this->response
            ->setStatusCode($sent ? 200 : 500)
            ->setJSON($payload);
    }
}
