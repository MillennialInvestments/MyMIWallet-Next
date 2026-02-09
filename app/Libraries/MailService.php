<?php

declare(strict_types=1);

namespace App\Libraries;

use App\Models\EmailOutboxModel;
use App\Models\MailQueueModel;
use CodeIgniter\Email\Email;

class MailService
{
    private Email $mailer;
    private EmailOutboxModel $outbox;
    private MailQueueModel $queue;
    private ?string $lastError = null;
    private string $fromEmail;
    private string $fromName;
    private string $replyToEmail;
    private string $replyToName;

    public function __construct(?Email $mailer = null, ?EmailOutboxModel $outbox = null, ?MailQueueModel $queue = null)
    {
        $this->mailer = $mailer ?? service('email');
        $this->outbox = $outbox ?? new EmailOutboxModel();
        $this->queue = $queue ?? new MailQueueModel();

        $emailConfig = config('Email');
        $this->fromEmail = (string) ($emailConfig->fromEmail ?? 'support@mymiwallet.com');
        $this->fromName = (string) ($emailConfig->fromName ?? 'MyMI Wallet Support');
        $this->replyToEmail = (string) ($emailConfig->replyToEmail ?? $this->fromEmail);
        $this->replyToName = (string) ($emailConfig->replyToName ?? $this->fromName);
    }

    public function sendActivationEmail($user, string $token, array $context = []): array
    {
        $to = (string) ($user->email ?? '');
        $name = $this->resolveRecipientName($user);
        $actionUrl = $this->buildUrl('activate-account', ['token' => $token]);

        $payload = [
            'name' => $name,
            'actionUrl' => $actionUrl,
            'ctaLabel' => 'Activate My Account',
            'supportEmail' => $this->replyToEmail,
        ];

        $html = $this->renderTemplate('activation', 'Activate your MyMI Wallet account', $payload);
        $text = $this->renderTextTemplate('activation_text', $payload);

        return $this->sendEmail(
            $to,
            'Activate your MyMI Wallet account',
            $html,
            $text,
            'activation',
            $user->id ?? null,
            array_merge(['source' => 'auth', 'template' => 'activation'], $context)
        );
    }

    public function sendPasswordResetEmail($user, string $token, array $context = []): array
    {
        $to = (string) ($user->email ?? '');
        $name = $this->resolveRecipientName($user);
        $actionUrl = $this->buildUrl('reset-password', ['token' => $token]);

        $payload = [
            'name' => $name,
            'actionUrl' => $actionUrl,
            'ctaLabel' => 'Reset My Password',
            'supportEmail' => $this->replyToEmail,
        ];

        $html = $this->renderTemplate('reset', 'Reset your MyMI Wallet password', $payload);
        $text = $this->renderTextTemplate('reset_text', $payload);

        return $this->sendEmail(
            $to,
            'Reset your MyMI Wallet password',
            $html,
            $text,
            'reset',
            $user->id ?? null,
            array_merge(['source' => 'auth', 'template' => 'reset'], $context)
        );
    }

    public function sendGeneric(string $to, string $subject, string $html, ?string $text = null, array $context = []): array
    {
        return $this->sendEmail(
            $to,
            $subject,
            $html,
            $text,
            'generic',
            null,
            array_merge(['source' => 'generic'], $context)
        );
    }

    public function send(string $to, string $subject, string $html, array $opts = []): array
    {
        $text = $opts['text'] ?? null;
        $type = (string) ($opts['type'] ?? 'generic');
        $userId = isset($opts['user_id']) ? (int) $opts['user_id'] : null;

        if (! empty($opts['queue'])) {
            return $this->queueEmail($to, $subject, $html, $text, $type, $userId, $opts);
        }

        return $this->sendEmail(
            $to,
            $subject,
            $html,
            $text,
            $type,
            $userId,
            array_merge(['source' => $opts['module'] ?? 'generic'], $opts)
        );
    }

    private function queueEmail(
        string $to,
        string $subject,
        string $html,
        ?string $text,
        string $type,
        ?int $userId,
        array $context
    ): array {
        $queueId = $this->queue->enqueue([
            'module' => $context['module'] ?? 'system',
            'to_email' => $to,
            'subject' => $subject,
            'html' => $html,
            'text' => $text,
            'status' => 'queued',
            'scheduled_at' => $context['scheduled_at'] ?? date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $outboxId = $this->outbox->insert([
            'user_id' => $userId,
            'to_email' => $to,
            'subject' => $subject,
            'type' => $type,
            'status' => 'queued',
            'error_message' => null,
            'provider' => 'smtp',
            'meta_json' => json_encode($this->sanitizeContext($context)),
            'created_at' => date('Y-m-d H:i:s'),
        ], true);

        log_message('info', 'MailService queued email', [
            'to' => $to,
            'type' => $type,
            'queue_id' => $queueId,
            'outbox_id' => $outboxId,
        ]);

        return [
            'ok' => true,
            'error' => null,
            'queue_id' => $queueId,
            'outbox_id' => $outboxId,
            'meta' => ['queued' => true],
        ];
    }

    public function lastError(): ?string
    {
        return $this->lastError;
    }

    private function sendEmail(
        string $to,
        string $subject,
        string $html,
        ?string $text,
        string $type,
        ?int $userId,
        array $context
    ): array {
        $this->lastError = null;

        $outboxId = $this->outbox->insert([
            'user_id' => $userId,
            'to_email' => $to,
            'subject' => $subject,
            'type' => $type,
            'status' => 'queued',
            'error_message' => null,
            'provider' => 'smtp',
            'meta_json' => json_encode($this->sanitizeContext($context)),
            'created_at' => date('Y-m-d H:i:s'),
        ], true);

        $this->mailer->clear(true);
        $this->mailer->setFrom($this->fromEmail, $this->fromName);
        $this->mailer->setReplyTo($this->replyToEmail, $this->replyToName);
        $this->mailer->setTo($to);
        $this->mailer->setSubject($subject);
        $this->mailer->setMessage($html);

        if ($text) {
            $this->mailer->setAltMessage($text);
        }

        $this->mailer->setHeader('Message-ID', $this->buildMessageId());
        $this->mailer->setHeader('X-App', 'MyMI Wallet');
        $this->mailer->setHeader('X-Email-Type', $type);

        $sent = false;
        $error = null;

        try {
            $sent = $this->mailer->send(false);
        } catch (\Throwable $e) {
            $error = $e->getMessage();
            log_message('error', 'MailService exception: {error}', ['error' => $error]);
        }

        if (! $sent) {
            if (! $error) {
                $error = strip_tags($this->mailer->printDebugger(['headers', 'subject'])) ?: 'Unknown email error.';
            }

            $this->lastError = $error;
            $this->outbox->update($outboxId, [
                'status' => 'failed',
                'error_message' => $this->truncateError($error),
                'sent_at' => null,
            ]);

            log_message('error', 'MailService send failed', [
                'to' => $to,
                'type' => $type,
                'error' => $error,
                'outbox_id' => $outboxId,
            ]);

            return [
                'ok' => false,
                'error' => $error,
                'outbox_id' => $outboxId,
            ];
        }

        $this->outbox->update($outboxId, [
            'status' => 'sent',
            'error_message' => null,
            'sent_at' => date('Y-m-d H:i:s'),
        ]);

        log_message('info', 'MailService send succeeded', [
            'to' => $to,
            'type' => $type,
            'outbox_id' => $outboxId,
        ]);

        return [
            'ok' => true,
            'error' => null,
            'outbox_id' => $outboxId,
        ];
    }

    private function renderTemplate(string $template, string $title, array $payload): string
    {
        $appUrl = rtrim((string) (getenv('APP_URL') ?: site_url()), '/');
        $logoUrl = $appUrl . '/assets/images/MyMI-Wallet-Logo-Black.png';

        helper('email');

        $content = render_email_view("emails/{$template}", $payload);

        return render_email_view('emails/layout', [
            'title' => $title,
            'content' => $content,
            'logoUrl' => $logoUrl,
            'appUrl' => $appUrl,
            'supportEmail' => $this->replyToEmail,
            'preheader' => $title,
        ]);
    }

    private function renderTextTemplate(string $template, array $payload): ?string
    {
        if (! is_file(APPPATH . "Views/emails/{$template}.php")) {
            return null;
        }

        helper('email');

        $rendered = render_email_view("emails/{$template}", $payload);

        return $rendered === '' ? null : $rendered;
    }

    private function resolveRecipientName($user): string
    {
        $name = trim((string) ($user->name ?? $user->full_name ?? $user->username ?? ''));

        if ($name === '') {
            $email = (string) ($user->email ?? '');
            if ($email !== '' && str_contains($email, '@')) {
                $name = ucfirst(strtolower(strtok($email, '@')));
            }
        }

        return $name === '' ? 'there' : $name;
    }

    private function buildUrl(string $path, array $query = []): string
    {
        $base = rtrim((string) (getenv('APP_URL') ?: site_url()), '/');
        $url = $base . '/' . ltrim($path, '/');

        if (! empty($query)) {
            $url .= '?' . http_build_query($query);
        }

        return $url;
    }

    private function buildMessageId(): string
    {
        $host = gethostname() ?: 'mymiwallet.local';
        $unique = uniqid('mymi-', true);
        return sprintf('<%s@%s>', $unique, $host);
    }

    private function sanitizeContext(array $context): array
    {
        $allowedKeys = ['source', 'template', 'request_id', 'actor_id', 'admin_id', 'ip'];
        $safe = array_intersect_key($context, array_flip($allowedKeys));

        return array_filter($safe, static fn ($value) => $value !== null && $value !== '');
    }

    private function truncateError(string $error): string
    {
        $error = trim($error);
        if (strlen($error) > 255) {
            return substr($error, 0, 252) . '...';
        }

        return $error;
    }
}
