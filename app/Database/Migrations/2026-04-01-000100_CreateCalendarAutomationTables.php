<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCalendarAutomationTables extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'message_id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'imap_uid' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'from_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'subject' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'received_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'raw_body' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'parsed_json' => [
                'type' => 'JSON',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['new', 'parsed', 'queued', 'failed', 'ignored'],
                'default' => 'new',
            ],
            'error' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'processed_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('message_id', 'unique_message_id');
        $this->forge->createTable('calendar_trigger_inbox', true);

        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'route_key' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'handler_type' => [
                'type' => 'ENUM',
                'constraint' => ['internal_method', 'http_endpoint', 'queue_job'],
                'null' => false,
            ],
            'handler_target' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'default_payload' => [
                'type' => 'JSON',
                'null' => true,
            ],
            'enabled' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('route_key', 'unique_route_key');
        $this->forge->createTable('automation_routes', true);

        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'job_type' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'payload' => [
                'type' => 'JSON',
                'null' => true,
            ],
            'dedupe_key' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'run_after' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['queued', 'running', 'success', 'failed'],
                'default' => 'queued',
            ],
            'attempts' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'last_error' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('dedupe_key', 'unique_dedupe');
        $this->forge->addKey(['status', 'run_after'], false, false, 'idx_automation_jobs_status_run_after');
        $this->forge->createTable('automation_jobs', true);
    }

    public function down()
    {
        $this->forge->dropTable('automation_jobs', true);
        $this->forge->dropTable('automation_routes', true);
        $this->forge->dropTable('calendar_trigger_inbox', true);
    }
}
