<?php

namespace App\Services;

use App\Libraries\Mail\Contracts\MailProviderInterface;
use App\Libraries\Mail\Providers\PostmarkProvider;
use App\Libraries\Mail\Providers\SmtpProvider;
use App\Models\MailQueueModel;

class MailService
{
    protected MailProviderInterface $provider;
    protected MailQueueModel $queue;

    public function __construct(?MailProviderInterface $provider = null, ?MailQueueModel $queue = null)
    {
        $driver        = strtolower((string) getenv('mail.driver'));
        $this->provider = $provider ?? $this->resolveProvider($driver);
        $this->queue    = $queue ?? new MailQueueModel();
    }

    protected function resolveProvider(string $driver): MailProviderInterface
    {
        return match ($driver) {
            'postmark' => new PostmarkProvider(),
            'smtp' => new SmtpProvider(),
        };
    }

    /**
     * Send immediately (or enqueue when queue=true).
     *
     * @return array{ok:bool, provider:string, message_id:?string, error:?string, meta:array}
     */
    public function send(string $to, string $subject, string $html, array $opts = []): array
    {
        if (! empty($opts['queue'])) {
            $queueId = $this->queue(
                $opts['module'] ?? 'system',
                $to,
                $subject,
                $html,
                $opts
            );

            return [
                'ok'         => true,
                'provider'   => 'queue',
                'message_id' => (string) $queueId,
                'error'      => null,
                'meta'       => ['queued' => true],
            ];
        }

        $payload = [
            'to'         => $to,
            'subject'    => $subject,
            'html'       => $html,
            'text'       => $opts['text'] ?? null,
            'from_email' => $opts['from_email'] ?? getenv('mail.from.email'),
            'from_name'  => $opts['from_name'] ?? getenv('mail.from.name'),
            'reply_to'   => $opts['reply_to'] ?? null,
        ];

        $result = $this->provider->send($payload);

        $context = [
            'provider' => $result['provider'] ?? 'unknown',
            'to'       => $to,
            'subject'  => $subject,
            'module'   => $opts['module'] ?? 'system',
        ];

        if (! ($result['ok'] ?? false)) {
            log_message(
                'error',
                'Mail send failed provider={provider} to={to} subject={subject} err={err}',
                array_merge($context, ['err' => $result['error'] ?? 'unknown'])
            );
        } else {
            log_message(
                'debug',
                'Mail sent provider={provider} to={to} subject={subject}',
                $context
            );
        }

        return $result;
    }

    public function queue(string $module, string $to, string $subject, string $html, array $opts = []): int
    {
        return $this->queue->enqueue([
            'module'       => $module,
            'to_email'     => $to,
            'subject'      => $subject,
            'html'         => $html,
            'text'         => $opts['text'] ?? null,
            'status'       => 'queued',
            'scheduled_at' => $opts['scheduled_at'] ?? date('Y-m-d H:i:s'),
            'created_at'   => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Process pending queue items with retry/backoff.
     *
     * @return array{sent:int, failed:int, deferred:int}
     */
    public function processQueue(int $limit = 25): array
    {
        $jobs     = $this->queue->getPending($limit);
        $sent     = 0;
        $failed   = 0;
        $deferred = 0;

        foreach ($jobs as $job) {
            $attempt = ((int) ($job['attempts'] ?? 0)) + 1;
            $this->queue->markSending((int) $job['id'], $attempt);

            $result = $this->send(
                $job['to_email'],
                $job['subject'],
                $job['html'] ?? '',
                [
                    'text'    => $job['text'] ?? null,
                    'module'  => $job['module'] ?? 'system',
                    'queue'   => false,
                ]
            );

            if ($result['ok'] ?? false) {
                $sent++;
                $this->queue->markSent((int) $job['id'], $result['provider'] ?? null);
                continue;
            }

            $backoffMinutes = $attempt >= 3 ? null : min(60, $attempt * 5);
            $this->queue->markFailed(
                (int) $job['id'],
                $result['error'] ?? 'unknown error',
                $backoffMinutes,
                $result['provider'] ?? null
            );

            if ($backoffMinutes === null) {
                $failed++;
            } else {
                $deferred++;
            }
        }

        return compact('sent', 'failed', 'deferred');
    }
}