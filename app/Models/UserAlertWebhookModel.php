<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class UserAlertWebhookModel extends Model
{
    protected $table            = 'bf_user_alert_webhooks';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $allowedFields    = [
        'user_id',
        'webhook_token',
        'name',
        'provider',
        'status',
        'secret_key',
        'alert_count',
        'last_received_at',
    ];

    /**
     * Get or create a default webhook token for a user.
     */
    public function getOrCreateWebhook(int $userId, string $name = 'Default Webhook', string $provider = 'tradingview'): ?array
    {
        if ($userId <= 0) {
            return null;
        }

        if (! $this->db->tableExists($this->table)) {
            return [
                'id'            => 0,
                'user_id'       => $userId,
                'webhook_token' => bin2hex(random_bytes(16)),
                'name'          => $name,
                'provider'      => $provider,
                'status'        => 'active',
                'alert_count'   => 0,
            ];
        }

        $row = $this->where('user_id', $userId)
            ->where('status', 'active')
            ->orderBy('id', 'ASC')
            ->first();

        if ($row) {
            return $row;
        }

        $token = bin2hex(random_bytes(24));
        $id = $this->insert([
            'user_id'       => $userId,
            'webhook_token' => $token,
            'name'          => $name,
            'provider'      => $provider,
            'status'        => 'active',
            'alert_count'   => 0,
        ], true);

        return $this->find($id);
    }

    /**
     * Find active webhook by token.
     */
    public function findByToken(string $token): ?array
    {
        if ($token === '' || ! $this->db->tableExists($this->table)) {
            return null;
        }

        return $this->where('webhook_token', $token)
            ->where('status', 'active')
            ->first();
    }

    /**
     * Regenerate a user's webhook token.
     */
    public function regenerateToken(int $userId, int $webhookId = 0): ?array
    {
        if ($userId <= 0 || ! $this->db->tableExists($this->table)) {
            return null;
        }

        $query = $this->where('user_id', $userId);
        if ($webhookId > 0) {
            $query->where('id', $webhookId);
        }
        $existing = $query->first();

        if (! $existing) {
            return $this->getOrCreateWebhook($userId);
        }

        $newToken = bin2hex(random_bytes(24));
        $this->update($existing['id'], [
            'webhook_token' => $newToken,
            'updated_at'    => Time::now('UTC')->toDateTimeString(),
        ]);

        return $this->find($existing['id']);
    }

    /**
     * Increment alert counter and update last received timestamp.
     */
    public function recordReceipt(int $webhookId): void
    {
        if ($webhookId <= 0 || ! $this->db->tableExists($this->table)) {
            return;
        }

        $this->builder()
            ->where('id', $webhookId)
            ->set('alert_count', 'alert_count + 1', false)
            ->set('last_received_at', Time::now('UTC')->toDateTimeString())
            ->update();
    }
}
