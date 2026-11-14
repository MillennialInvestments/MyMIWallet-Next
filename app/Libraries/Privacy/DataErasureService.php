<?php

namespace App\Libraries\Privacy;

use CodeIgniter\Database\BaseConnection;
use Config\Privacy;

/**
 * Erases a user's personal data (GTM-045). The account row is pseudonymized and
 * deactivated; financial records stay without personal details.
 */
class DataErasureService
{
    private Privacy $cfg;

    public function __construct(private BaseConnection $db, ?Privacy $cfg = null)
    {
        $this->cfg = $cfg ?? config(Privacy::class);
    }

    /** Returns the number of rows changed or deleted. */
    public function pseudonymizeUser(int $userId): int
    {
        if ($userId <= 0) {
            return 0;
        }
        $count = 0;
        $this->db->transStart();

        $users = $this->cfg->usersTable;
        if ($this->db->tableExists($users, false)) {
            $fields = $this->db->getFieldNames($users);
            $set = [];
            $candidates = [
                'email'         => 'deleted+' . $userId . '@invalid.mymiwallet',
                'username'      => 'deleted_' . $userId,
                'display_name'  => 'Deleted User #' . $userId,
                'first_name'    => null,
                'last_name'     => null,
                'name'          => null,
                'phone'         => null,
                'avatar'        => null,
                'password_hash' => null,
                'reset_hash'    => null,
                'activate_hash' => null,
                'active'        => 0,
                'status'        => 'erased',
            ];
            foreach ($candidates as $col => $val) {
                if (in_array($col, $fields, true)) {
                    $set[$col] = $val;
                }
            }
            if ($set !== []) {
                $this->db->table($users)->where('id', $userId)->update($set);
                $count += $this->db->affectedRows();
            }
        }

        foreach ($this->cfg->scrubColumns as $table => $cols) {
            if (! $this->db->tableExists($table, false)) {
                continue;
            }
            $fields = $this->db->getFieldNames($table);
            $set = [];
            foreach ($cols as $c) {
                if (in_array($c, $fields, true)) {
                    $set[$c] = null;
                }
            }
            if ($set !== [] && in_array('user_id', $fields, true)) {
                $this->db->table($table)->where('user_id', $userId)->update($set);
                $count += $this->db->affectedRows();
            }
        }

        foreach ($this->cfg->eraseTables as $table => $userColumn) {
            if ($this->db->tableExists($table, false) && in_array($userColumn, $this->db->getFieldNames($table), true)) {
                $this->db->table($table)->where($userColumn, $userId)->delete();
                $count += $this->db->affectedRows();
            }
        }

        $this->db->transComplete();

        return $this->db->transStatus() ? $count : 0;
    }
}
