<?php

namespace App\Libraries\Mail;

class SmtpProvider implements MailProviderInterface
{
    public function send(array $payload): array
    {
        $email  = service('email');
        $config = config('Email');

        $fromEmail = $payload['from_email'] ?? getenv('mail.from.email') ?? getenv('email.fromEmail') ?? $config->fromEmail;
        $fromName  = $payload['from_name'] ?? getenv('mail.from.name') ?? getenv('email.fromName') ?? $config->fromName;

        $email->setFrom($fromEmail, $fromName);
        $email->setTo($payload['to'] ?? '');
        $email->setSubject($payload['subject'] ?? '');

        if (! empty($payload['html'])) {
            $email->setMessage($payload['html']);
            $email->setMailType('html');
        } else {
            $email->setMessage($payload['text'] ?? '');
            $email->setMailType('text');
        }

        if (! empty($payload['reply_to'])) {
            $email->setReplyTo($payload['reply_to']);
        }

        $meta = [
            'host'     => $config->SMTPHost,
            'port'     => $config->SMTPPort,
            'protocol' => $config->protocol,
            'crypto'   => $config->SMTPCrypto,
            'from'     => $fromEmail,
        ];

        if (! $email->send(false)) {
            $debug = $email->printDebugger(['headers', 'subject', 'body']);
            return [
                'ok'         => false,
                'provider'   => 'smtp',
                'message_id' => null,
                'error'      => 'SMTP send failed',
                'meta'       => array_merge($meta, ['debug' => $debug]),
            ];
        }

        return [
            'ok'         => true,
            'provider'   => 'smtp',
            'message_id' => null,
            'error'      => null,
            'meta'       => $meta,
        ];
    }
}
