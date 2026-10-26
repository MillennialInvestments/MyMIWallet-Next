<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FixAuthForeignKeysToBfUsers extends Migration
{
    public function up()
    {
        // Only applies to MySQL/MariaDB engines with foreign key support
        if ($this->db->DBDriver !== 'MySQLi') {
            return;
        }

        $tables = [
            'auth_tokens' => 'auth_tokens_user_id_foreign',
            'auth_remember_tokens' => 'auth_remember_tokens_user_id_foreign',
            'auth_groups_users' => 'auth_groups_users_user_id_foreign',
            'auth_identities' => 'auth_identities_user_id_foreign',
            'auth_permissions_users' => 'auth_permissions_users_user_id_foreign',
            'auth_users_permissions' => 'auth_users_permissions_user_id_foreign',
        ];

        foreach ($tables as $table => $constraint) {
            if (! $this->db->tableExists($table) || ! $this->db->tableExists('bf_users')) {
                continue;
            }

            try {
                // Check if current constraint references users view
                $checkSql = "
                    SELECT REFERENCED_TABLE_NAME 
                    FROM information_schema.KEY_COLUMN_USAGE 
                    WHERE TABLE_SCHEMA = DATABASE() 
                      AND TABLE_NAME = ? 
                      AND CONSTRAINT_NAME = ?
                ";
                $row = $this->db->query($checkSql, [$table, $constraint])->getRow();

                if ($row && $row->REFERENCED_TABLE_NAME === 'users') {
                    $this->db->query("ALTER TABLE `{$table}` DROP FOREIGN KEY `{$constraint}`");
                    $this->db->query("ALTER TABLE `{$table}` ADD CONSTRAINT `{$constraint}` FOREIGN KEY (`user_id`) REFERENCES `bf_users` (`id`) ON DELETE CASCADE");
                }
            } catch (\Throwable $e) {
                log_message('error', 'FixAuthForeignKeysToBfUsers migration notice on {table}: {message}', [
                    'table' => $table,
                    'message' => $e->getMessage(),
                ]);
            }
        }
    }

    public function down()
    {
        // Safe no-op to avoid breaking active login foreign keys
    }
}
