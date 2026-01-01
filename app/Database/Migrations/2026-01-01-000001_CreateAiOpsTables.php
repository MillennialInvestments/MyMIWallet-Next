<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAiOpsTables extends Migration
{
    public function up()
    {
        // bf_ai_ops_caps
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'subsystem'   => ['type' => 'VARCHAR', 'constraint' => 100],
            'cap_usd'     => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0],
            'cap_tokens'  => ['type' => 'BIGINT', 'null' => true],
            'reset_period'=> ['type' => 'ENUM', 'constraint' => ['monthly'], 'default' => 'monthly'],
            'is_enabled'  => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('subsystem');
        $this->forge->createTable('bf_ai_ops_caps', true);

        // bf_ai_ops_usage
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'subsystem'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'date_key'       => ['type' => 'DATE'],
            'month_key'      => ['type' => 'CHAR', 'constraint' => 7], // YYYY-MM
            'requests'       => ['type' => 'INT', 'default' => 0],
            'tokens_in'      => ['type' => 'BIGINT', 'default' => 0],
            'tokens_out'     => ['type' => 'BIGINT', 'default' => 0],
            'cost_usd'       => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => 0],
            'cache_hits'     => ['type' => 'INT', 'default' => 0],
            'status_success' => ['type' => 'INT', 'default' => 0],
            'status_error'   => ['type' => 'INT', 'default' => 0],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['subsystem', 'date_key'], false, true);
        $this->forge->createTable('bf_ai_ops_usage', true);

        // bf_ai_ops_events
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'subsystem'  => ['type' => 'VARCHAR', 'constraint' => 100],
            'event_type' => ['type' => 'VARCHAR', 'constraint' => 100],
            'message'    => ['type' => 'TEXT', 'null' => true],
            'meta_json'  => ['type' => 'LONGTEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('subsystem');
        $this->forge->addKey('event_type');
        $this->forge->createTable('bf_ai_ops_events', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_ai_ops_events', true);
        $this->forge->dropTable('bf_ai_ops_usage', true);
        $this->forge->dropTable('bf_ai_ops_caps', true);
    }
}
