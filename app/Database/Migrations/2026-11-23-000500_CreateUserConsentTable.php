<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * User legal consent audit records (GTM-057).
 *
 * Records versioned consent to Terms of Service, Privacy Policy, and
 * other compliance agreements with IP address, user agent, and timestamp.
 *
 * Safe to run on prod by name: created only when missing; down() keeps data.
 */
class CreateUserConsentTable extends Migration
{
    public function up()
    {
        $tableName = $this->db->DBPrefix === '' ? 'bf_user_consent' : 'user_consent';
        $fullTable = $this->db->prefixTable('user_consent');

        if ($this->db->tableExists($fullTable) || $this->db->tableExists('bf_user_consent')) {
            log_message('notice', 'CreateUserConsentTable: user consent table already exists');
            return;
        }

        $this->forge->addField([
            'id'           => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
            'user_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'consent_type' => ['type' => 'VARCHAR', 'constraint' => 64],
            'version'      => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => '1.0'],
            'ip_address'   => ['type' => 'VARCHAR', 'constraint' => 45, 'null' => true],
            'user_agent'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'consent_time' => ['type' => 'DATETIME', 'null' => true],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_id', 'consent_type']);
        $this->forge->addKey('created_at');
        $this->forge->createTable($tableName, true);
        log_message('notice', 'CreateUserConsentTable: created ' . $fullTable);
    }

    public function down()
    {
        // Intentionally empty: compliance and consent records are never dropped by a rollback.
    }
}
