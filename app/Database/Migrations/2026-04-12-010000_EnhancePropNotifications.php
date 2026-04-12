<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EnhancePropNotifications extends Migration
{
    public function up()
    {
        $fields = [
            'type' => ['type' => 'VARCHAR', 'constraint' => 40, 'default' => 'INFO', 'after' => 'channel'],
            'symbol' => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true, 'after' => 'type'],
            'event_key' => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true, 'after' => 'status'],
            'payload_json' => ['type' => 'LONGTEXT', 'null' => true, 'after' => 'event_key'],
            'read_at' => ['type' => 'DATETIME', 'null' => true, 'after' => 'sent_at'],
        ];

        foreach ($fields as $name => $field) {
            if (! $this->db->fieldExists($name, 'bf_prop_notifications')) {
                $this->forge->addColumn('bf_prop_notifications', [$name => $field]);
            }
        }

    }

    public function down()
    {
        foreach (['type', 'symbol', 'event_key', 'payload_json', 'read_at'] as $field) {
            if ($this->db->fieldExists($field, 'bf_prop_notifications')) {
                $this->forge->dropColumn('bf_prop_notifications', $field);
            }
        }
    }
}
