<?php

namespace App\Modules\PropFirms\Controllers;

use App\Controllers\UserController;
use App\Modules\PropFirms\Libraries\PropNotificationService;
use Config\Database;

class NotificationsController extends UserController
{
    public function index()
    {
        $userId = (int) ($this->cuID ?? 0);
        $db = Database::connect();

        $accountIds = array_map(
            static fn (array $row): int => (int) $row['id'],
            $db->table('bf_user_prop_accounts')->select('id')->where('user_id', $userId)->get()->getResultArray()
        );

        if ($accountIds === []) {
            return $this->response->setJSON(['status' => 'ok', 'data' => []]);
        }

        $rows = $db->table('bf_prop_notifications')
            ->whereIn('user_prop_account_id', $accountIds)
            ->orderBy('created_at', 'DESC')
            ->limit(50)
            ->get()
            ->getResultArray();

        return $this->response->setJSON(['status' => 'ok', 'data' => $rows]);
    }

    public function markRead(int $id)
    {
        $userId = (int) ($this->cuID ?? 0);
        $db = Database::connect();

        $notification = $db->table('bf_prop_notifications n')
            ->join('bf_user_prop_accounts a', 'a.id = n.user_prop_account_id')
            ->where('n.id', $id)
            ->where('a.user_id', $userId)
            ->get()
            ->getRowArray();

        if ($notification === null) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Notification not found.']);
        }

        $ok = (new PropNotificationService())->markAsRead($id);

        return $this->response->setJSON(['status' => $ok ? 'ok' : 'error']);
    }
}
