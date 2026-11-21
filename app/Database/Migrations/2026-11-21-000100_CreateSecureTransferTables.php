<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * MyMI Secure Transfer (MST1) metadata. Ciphertext files live on disk under
 * Config\SecureTransfer::$storagePath, never in the database.
 *
 * Safe to run on prod by name: each table is created only when missing.
 * Times are Unix seconds (INT), matching the protocol's signed fields.
 */
class CreateSecureTransferTables extends Migration
{
    public function up()
    {
        $this->create('bf_secure_transfer_challenges', [
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nonce'      => ['type' => 'CHAR', 'constraint' => 32],
            'user_id'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'wallet'     => ['type' => 'VARCHAR', 'constraint' => 64],
            'expires_at' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'used_at'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
        ], ['nonce'], [['expires_at']]);

        $this->create('bf_secure_transfer_keys', [
            'id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'wallet'       => ['type' => 'VARCHAR', 'constraint' => 64],
            'transfer_key' => ['type' => 'CHAR', 'constraint' => 44],
            'statement'    => ['type' => 'TEXT'],
            'signature'    => ['type' => 'VARCHAR', 'constraint' => 100],
            'created_at'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'revoked_at'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
        ], [], [['wallet', 'revoked_at'], ['user_id', 'revoked_at']]);

        $this->create('bf_secure_transfers', [
            'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'transfer_id'      => ['type' => 'CHAR', 'constraint' => 32],
            'sender_user_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'sender_wallet'    => ['type' => 'VARCHAR', 'constraint' => 64],
            'manifest'         => ['type' => 'MEDIUMTEXT'],
            'signature'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'ciphertext_bytes' => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true],
            'created_at'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'expires_at'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'revoked_at'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'purged_at'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
        ], ['transfer_id'], [['sender_user_id', 'created_at'], ['expires_at']]);

        $this->create('bf_secure_transfer_recipients', [
            'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'transfer_id'   => ['type' => 'CHAR', 'constraint' => 32],
            'wallet'        => ['type' => 'VARCHAR', 'constraint' => 64],
            'downloaded_at' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
        ], [['transfer_id', 'wallet']], [['wallet']]);
    }

    private function create(string $table, array $fields, array $unique, array $keys): void
    {
        if ($this->db->tableExists($table)) {
            log_message('notice', "CreateSecureTransferTables: {$table} already exists");
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
        log_message('notice', "CreateSecureTransferTables: created {$table}");
    }

    public function down()
    {
        // Intentionally empty: recipients may still hold ciphertext ids. Drop by hand after purge if ever needed.
    }
}
