<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * GTM-017/018: make the production `users` view usable by the auth models.
 *
 * In production `users` is a VIEW over `bf_users`. Myth/Auth's UserModel saves
 * through it, but the view was missing created_at, updated_at, reset_at,
 * reset_expires, force_pass_reset, status and status_message, and its
 * deleted_at was a computed expression, which MySQL 8 does not allow an INSERT
 * through. Registration inserts and password-reset updates therefore failed.
 *
 * up() only adds nullable or defaulted columns, turns deleted_at into a virtual
 * generated column (still derived from the `deleted` flag, so existing code
 * that sets `deleted` keeps working), and rebuilds the view as plain column
 * references. It also gives the Shield-shaped auth_groups_users the group_id
 * column Myth's role checks join on. The previous view definition is saved,
 * and down() restores it and drops only what up() added.
 *
 * Does nothing where `users` is a real table (local, CI, SQLite).
 */
class AlignUsersViewForAuth extends Migration
{
    private const BACKUP_TABLE = 'bf_schema_view_backups';
    private const TAG          = '2026-11-15-000100_AlignUsersViewForAuth';

    /** @var array<string, string> column => definition, added to bf_users when missing */
    private const BF_USERS_COLUMNS = [
        'created_at'       => 'DATETIME NULL',
        'updated_at'       => 'DATETIME NULL',
        'reset_at'         => 'DATETIME NULL',
        'reset_expires'    => 'DATETIME NULL',
        'force_pass_reset' => 'TINYINT(1) NOT NULL DEFAULT 0',
        'status'           => 'VARCHAR(255) NULL',
        'status_message'   => 'VARCHAR(255) NULL',
        'deleted_at'       => "DATETIME GENERATED ALWAYS AS (CASE WHEN `deleted` = 1 THEN '1970-01-01 00:00:00' ELSE NULL END) VIRTUAL",
    ];

    public function up()
    {
        if (! $this->usersIsViewOverBfUsers()) {
            return;
        }

        $db = $this->db;
        $previous = $this->currentViewDefinition();

        // Privilege probe: re-create the view unchanged. If this connection may not
        // replace views, stop here before any ALTER has run.
        $db->query('CREATE OR REPLACE SQL SECURITY INVOKER VIEW `users` AS ' . $previous);

        $this->ensureBackupTable();
        $db->table(self::BACKUP_TABLE)->insert([
            'view_name'     => 'users',
            'migration'     => self::TAG,
            'definition'    => $previous,
            'added_columns' => json_encode(['bf_users' => [], 'auth_groups_users.group_id' => false]),
            'saved_at'      => date('Y-m-d H:i:s'),
        ]);
        $backupId = (int) $db->insertID();
        $record   = static function (array $added, bool $groupIdAdded) use ($db, $backupId): void {
            $db->table(self::BACKUP_TABLE)->where('id', $backupId)->update([
                'added_columns' => json_encode(['bf_users' => $added, 'auth_groups_users.group_id' => $groupIdAdded]),
            ]);
        };

        $existing = array_map('strtolower', $db->getFieldNames('bf_users'));
        $added    = [];
        foreach (self::BF_USERS_COLUMNS as $column => $definition) {
            if (! in_array($column, $existing, true)) {
                $db->query('ALTER TABLE `bf_users` ADD COLUMN `' . $column . '` ' . $definition);
                $added[] = $column;
                $record($added, false);
            }
        }
        $db->resetDataCache();

        $groupIdAdded = false;
        if ($db->tableExists('auth_groups_users') && $db->tableExists('auth_groups')) {
            $groupCols = array_map('strtolower', $db->getFieldNames('auth_groups_users'));
            if (! in_array('group_id', $groupCols, true)) {
                $db->query('ALTER TABLE `auth_groups_users` ADD COLUMN `group_id` INT UNSIGNED NULL, ADD INDEX `idx_agu_group_id` (`group_id`)');
                $groupIdAdded = true;
                $record($added, true);
            }
            if (in_array('group', $groupCols, true)) {
                // Shield's rows name the group; Myth reads group_id.
                $db->query('UPDATE `auth_groups_users` agu JOIN `auth_groups` g ON g.`name` = agu.`group` SET agu.`group_id` = g.`id` WHERE agu.`group_id` IS NULL');
                // Myth inserts (user_id, group_id) only, so the Shield columns need defaults.
                $db->query("ALTER TABLE `auth_groups_users` MODIFY `group` VARCHAR(255) NOT NULL DEFAULT ''");
            }
            if (in_array('created_at', $groupCols, true)) {
                $db->query('ALTER TABLE `auth_groups_users` MODIFY `created_at` DATETIME NULL');
            }
        }


        $this->rebuildViewFromBfUsers();
    }

    public function down()
    {
        $db = $this->db;
        if (! $db->tableExists(self::BACKUP_TABLE)) {
            return;
        }
        $row = $db->table(self::BACKUP_TABLE)->where('migration', self::TAG)->orderBy('id', 'DESC')->get(1)->getRowArray();
        if (! $row) {
            return;
        }

        $db->query('CREATE OR REPLACE SQL SECURITY INVOKER VIEW `users` AS ' . $row['definition']);

        $added = json_decode((string) $row['added_columns'], true) ?: [];
        foreach (array_reverse($added['bf_users'] ?? []) as $column) {
            $db->query('ALTER TABLE `bf_users` DROP COLUMN `' . str_replace('`', '', $column) . '`');
        }
        if (! empty($added['auth_groups_users.group_id'])) {
            $db->query('ALTER TABLE `auth_groups_users` DROP INDEX `idx_agu_group_id`, DROP COLUMN `group_id`');
        }

        $db->table(self::BACKUP_TABLE)->where('id', $row['id'])->delete();
    }

    private function usersIsViewOverBfUsers(): bool
    {
        if (! in_array($this->db->DBDriver, ['MySQLi'], true) || ! $this->db->tableExists('bf_users')) {
            return false;
        }

        $row = $this->db->query(
            "SELECT TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'users'"
        )->getRowArray();

        return ($row['TABLE_TYPE'] ?? '') === 'VIEW';
    }

    private function currentViewDefinition(): string
    {
        $row = $this->db->query(
            "SELECT VIEW_DEFINITION FROM information_schema.VIEWS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'users'"
        )->getRowArray();

        return (string) ($row['VIEW_DEFINITION'] ?? '');
    }

    private function rebuildViewFromBfUsers(): void
    {
        $columns = $this->db->getFieldNames('bf_users');
        $select  = implode(', ', array_map(
            static fn (string $c): string => '`bf_users`.`' . str_replace('`', '', $c) . '` AS `' . str_replace('`', '', $c) . '`',
            $columns
        ));

        $this->db->query('CREATE OR REPLACE SQL SECURITY INVOKER VIEW `users` AS SELECT ' . $select . ' FROM `bf_users`');
    }

    private function ensureBackupTable(): void
    {
        $this->db->query('CREATE TABLE IF NOT EXISTS `' . self::BACKUP_TABLE . '` (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `view_name` VARCHAR(64) NOT NULL,
            `migration` VARCHAR(128) NOT NULL,
            `definition` LONGTEXT NOT NULL,
            `added_columns` TEXT NULL,
            `saved_at` DATETIME NOT NULL
        ) ENGINE=InnoDB');
    }
}
