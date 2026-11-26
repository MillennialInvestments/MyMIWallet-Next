<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * MyMI Secure Transfer investigation record and legal holds.
 *
 * bf_secure_transfer_audit is add-only and hash-chained (prev_hash -> row_hash);
 * the application never updates or deletes it. bf_secure_transfer_holds stops
 * ciphertext deletion for held transfers, users or wallets.
 *
 * Safe to run on prod by name: each table is created only when missing.
 */
class CreateSecureTransferAuditTables extends Migration
{
    public function up()
    {
        $this->create('bf_secure_transfer_audit', [
            'id'          => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
            'event'       => ['type' => 'VARCHAR', 'constraint' => 32],
            'user_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'wallet'      => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'transfer_id' => ['type' => 'CHAR', 'constraint' => 32, 'null' => true],
            'ip'          => ['type' => 'VARCHAR', 'constraint' => 45, 'null' => true],
            'user_agent'  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'detail'      => ['type' => 'TEXT'],
            'created_at'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'prev_hash'   => ['type' => 'CHAR', 'constraint' => 64],
            'row_hash'    => ['type' => 'CHAR', 'constraint' => 64],
        ], [['row_hash']], [['user_id'], ['wallet'], ['transfer_id'], ['created_at']]);

        $this->create('bf_secure_transfer_holds', [
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'scope'       => ['type' => 'VARCHAR', 'constraint' => 16],
            'value'       => ['type' => 'VARCHAR', 'constraint' => 64],
            'reason'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'set_by'      => ['type' => 'VARCHAR', 'constraint' => 64],
            'set_at'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'released_at' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'released_by' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
        ], [], [['scope', 'value']]);
    }

    private function create(string $table, array $fields, array $unique, array $keys): void
    {
        if ($this->db->tableExists($table)) {
            log_message('notice', "CreateSecureTransferAuditTables: {$table} already exists");
            return;
        }
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        foreach ($unique as $u) {
            $this->forge->addUniqueKey($u);
        }
        foreach ($keys as $k) {
            $this->forge->addKey($k);
        }
        $this->forge->createTable($table, true);
        log_message('notice', "CreateSecureTransferAuditTables: created {$table}");
    }

    public function down()
    {
        // Intentionally empty: investigation records are never dropped by a rollback.
    }
}
