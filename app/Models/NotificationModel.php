<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table = 'notification_outbox';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'recipient',
        'subject',
        'message',
        'status',
        'sent_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Retrieve a goal row by ID, checking table existence null-safely.
     *
     * @return array<string, mixed>|null
     */
    public function getGoalById(int $goalId): ?array
    {
        $table = 'bf_financial_goals';
        if (! $this->db->tableExists($table)) {
            $table = 'financial_goals';
            if (! $this->db->tableExists($table)) {
                return null;
            }
        }

        $row = $this->db->table($table)
            ->where('id', $goalId)
            ->limit(1)
            ->get()
            ->getRowArray();

        return is_array($row) ? $row : null;
    }

    /**
     * Send a notification to a user, queuing in notification_outbox and/or user notifications table.
     */
    public function sendNotification(int $userId, string $message, string $subject = 'Notification', string $type = 'system'): bool
    {
        $now = date('Y-m-d H:i:s');
        $success = false;

        // Insert into notification_outbox if table exists
        $outboxTable = $this->table;
        if ($this->db->tableExists($outboxTable)) {
            $this->db->table($outboxTable)->insert([
                'recipient'  => (string) $userId,
                'subject'    => $subject,
                'message'    => $message,
                'status'     => 'pending',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $success = true;
        }

        // Insert into bf_users_notifications if available
        $userNotifTable = 'bf_users_notifications';
        if ($this->db->tableExists($userNotifTable)) {
            $this->db->table($userNotifTable)->insert([
                'user_id'    => $userId,
                'type'       => $type,
                'subject'    => $subject,
                'message'    => $message,
                'is_read'    => 0,
                'created_at' => $now,
            ]);
            $success = true;
        }

        return $success;
    }

    /**
     * Retrieve notifications for a user bounded by limit.
     *
     * @return list<array<string, mixed>>
     */
    public function getUserNotifications(int $userId, int $limit = 20): array
    {
        $limit = max(1, min($limit, 100));

        if ($this->db->tableExists('bf_users_notifications')) {
            return $this->db->table('bf_users_notifications')
                ->where('user_id', $userId)
                ->orderBy('created_at', 'DESC')
                ->limit($limit)
                ->get()
                ->getResultArray();
        }

        if ($this->db->tableExists($this->table)) {
            return $this->db->table($this->table)
                ->where('recipient', (string) $userId)
                ->orderBy('created_at', 'DESC')
                ->limit($limit)
                ->get()
                ->getResultArray();
        }

        return [];
    }

    /**
     * Mark a notification as read.
     */
    public function markAsRead(int $notificationId, ?int $userId = null): bool
    {
        if ($this->db->tableExists('bf_users_notifications')) {
            $builder = $this->db->table('bf_users_notifications')->where('id', $notificationId);
            if ($userId !== null) {
                $builder->where('user_id', $userId);
            }
            return $builder->update(['is_read' => 1, 'updated_at' => date('Y-m-d H:i:s')]);
        }

        if ($this->db->tableExists($this->table)) {
            $builder = $this->db->table($this->table)->where('id', $notificationId);
            if ($userId !== null) {
                $builder->where('recipient', (string) $userId);
            }
            return $builder->update(['status' => 'read', 'updated_at' => date('Y-m-d H:i:s')]);
        }

        return false;
    }

    /**
     * Count unread notifications for a user.
     */
    public function getUnreadCount(int $userId): int
    {
        if ($this->db->tableExists('bf_users_notifications')) {
            return $this->db->table('bf_users_notifications')
                ->where('user_id', $userId)
                ->where('is_read', 0)
                ->countAllResults();
        }

        if ($this->db->tableExists($this->table)) {
            return $this->db->table($this->table)
                ->where('recipient', (string) $userId)
                ->where('status', 'pending')
                ->countAllResults();
        }

        return 0;
    }
}
