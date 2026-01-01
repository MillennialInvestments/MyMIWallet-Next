<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAiOpsTables extends Migration
{
    public function up()
    {
        // bf_ai_ops_caps
        $this->forge->addField([
            'id'           => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'subsystem'    => ['type' => 'VARCHAR', 'constraint' => 64],
            'cap_type'     => ['type' => 'VARCHAR', 'constraint' => 24, 'default' => 'CAPACITY'],
            'cap_value'    => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0],
            'reset_period' => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'MONTHLY'],
            'is_enabled'   => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('subsystem');
        $this->forge->createTable('bf_ai_ops_caps', true);

        // bf_ai_ops_runs
        $this->forge->addField([
            'id'             => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'job_key'        => ['type' => 'VARCHAR', 'constraint' => 64],
            'subsystem'      => ['type' => 'VARCHAR', 'constraint' => 64],
            'status'         => ['type' => 'VARCHAR', 'constraint' => 16],
            'started_at'     => ['type' => 'DATETIME'],
            'finished_at'    => ['type' => 'DATETIME', 'null' => true],
            'runtime_seconds'=> ['type' => 'INT', 'null' => true],
            'message'        => ['type' => 'TEXT', 'null' => true],
            'meta_json'      => ['type' => 'LONGTEXT', 'null' => true],
            'created_by'     => ['type' => 'BIGINT', 'null' => true],
            'created_at'     => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['job_key', 'started_at']);
        $this->forge->addKey(['subsystem', 'started_at']);
        $this->forge->createTable('bf_ai_ops_runs', true);

        // bf_ai_ops_usage
        $this->forge->addField([
            'id'              => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'month_key'       => ['type' => 'CHAR', 'constraint' => 7], // YYYY-MM
            'subsystem'       => ['type' => 'VARCHAR', 'constraint' => 64],
            'runs'            => ['type' => 'INT', 'default' => 0],
            'runtime_seconds' => ['type' => 'INT', 'default' => 0],
            'requests'        => ['type' => 'INT', 'default' => 0],
            'cache_hits'      => ['type' => 'INT', 'default' => 0],
            'errors'          => ['type' => 'INT', 'default' => 0],
            'capacity_used'   => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0],
            'updated_at'      => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['month_key', 'subsystem']);
        $this->forge->createTable('bf_ai_ops_usage', true);

        // bf_ai_ops_events
        $this->forge->addField([
            'id'         => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'subsystem'  => ['type' => 'VARCHAR', 'constraint' => 64],
            'event_type' => ['type' => 'VARCHAR', 'constraint' => 64],
            'message'    => ['type' => 'TEXT', 'null' => true],
            'meta_json'  => ['type' => 'LONGTEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['subsystem', 'created_at']);
        $this->forge->addKey(['event_type', 'created_at']);
        $this->forge->createTable('bf_ai_ops_events', true);

        // bf_site_settings_overrides
        $this->forge->addField([
            'setting_key'   => ['type' => 'VARCHAR', 'constraint' => 64],
            'setting_value' => ['type' => 'VARCHAR', 'constraint' => 255],
            'updated_at'    => ['type' => 'DATETIME'],
            'updated_by'    => ['type' => 'BIGINT', 'null' => true],
        ]);
        $this->forge->addKey('setting_key', true);
        $this->forge->createTable('bf_site_settings_overrides', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_site_settings_overrides', true);
        $this->forge->dropTable('bf_ai_ops_events', true);
        $this->forge->dropTable('bf_ai_ops_usage', true);
        $this->forge->dropTable('bf_ai_ops_runs', true);
        $this->forge->dropTable('bf_ai_ops_caps', true);
    }
}
