<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class MailQueueModel extends Model
{
    protected $table         = 'bf_mail_queue';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'module',
        'provider',
        'to_email',
        'subject',
        'html',
        'text',
        'status',
        'attempts',
        'last_error',
        'scheduled_at',
        'sent_at',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = false;

    public function enqueue(array $data): int
    {
        $record = array_merge([
            'module'       => 'system',
            'provider'     => null,
            'to_email'     => '',
            'subject'      => '',
            'html'         => null,
            'text'         => null,
            'status'       => 'queued',
            'attempts'     => 0,
            'last_error'   => null,
            'scheduled_at' => null,
            'sent_at'      => null,
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'   => null,
        ], $data);

        return (int) $this->insert($record, true);
    }

    /**
     * @return array<int, array>
     */
    public function getPending(int $limit = 25): array
    {
        $now = Time::now('UTC')->toDateTimeString();

        return $this->where('status', 'queued')
            ->groupStart()
                ->where('scheduled_at', null)
                ->orWhere('scheduled_at <=', $now)
            ->groupEnd()
            ->orderBy('scheduled_at', 'ASC')
            ->orderBy('id', 'ASC')
            ->limit($limit)
            ->find();
    }

    public function markSending(int $id, int $attempts): void
    {
        $this->update($id, [
            'status'     => 'sending',
            'attempts'   => $attempts,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function markSent(int $id, ?string $provider = null): void
    {
        $this->update($id, [
            'status'     => 'sent',
            'provider'   => $provider,
            'sent_at'    => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'last_error' => null,
        ]);
    }

    public function markFailed(int $id, string $error, ?int $backoffMinutes = null, ?string $provider = null): void
    {
        $data = [
            'status'     => 'failed',
            'provider'   => $provider,
            'last_error' => mb_substr($error, 0, 255),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($backoffMinutes !== null) {
            $data['scheduled_at'] = Time::now('UTC')->addMinutes($backoffMinutes)->toDateTimeString();
            $data['status']       = 'queued';
        }

        $this->update($id, $data);
    }
}