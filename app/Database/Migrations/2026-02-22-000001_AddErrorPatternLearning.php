<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddErrorPatternLearning extends Migration
{
    public function up()
    {
        // Patterns learned from consolidated logs (deduped)
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'fingerprint' => ['type' => 'VARCHAR', 'constraint' => 255], // stable dedupe key (can match consolidated fingerprint or derived)
            'category' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'error_type' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'severity' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'MEDIUM'], // LOW/MEDIUM/HIGH/CRITICAL
            'title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'summary' => ['type' => 'TEXT', 'null' => true],
            'likely_root_cause' => ['type' => 'TEXT', 'null' => true],
            'suggested_fix' => ['type' => 'TEXT', 'null' => true],
            'controllers' => ['type' => 'TEXT', 'null' => true], // JSON array
            'services' => ['type' => 'TEXT', 'null' => true],    // JSON array
            'tags' => ['type' => 'TEXT', 'null' => true],        // JSON array
            'example_message' => ['type' => 'TEXT', 'null' => true],
            'occurrence_count' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'first_seen' => ['type' => 'DATETIME', 'null' => true],
            'last_seen' => ['type' => 'DATETIME', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('fingerprint', false, true);
        $this->forge->createTable('bf_error_patterns', true);

        // Learning runs (audit trail)
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'run_uuid' => ['type' => 'VARCHAR', 'constraint' => 64],
            'provider' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true], // ollama/openai/off
            'started_at' => ['type' => 'DATETIME', 'null' => true],
            'finished_at' => ['type' => 'DATETIME', 'null' => true],
            'processed' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'created' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'updated' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'skipped' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'errors' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'notes' => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('run_uuid', false, true);
        $this->forge->createTable('bf_error_learning_runs', true);

        // Alert rules (simple threshold-based to start)
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'is_enabled' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'severity_min' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'HIGH'],
            'window_minutes' => ['type' => 'INT', 'constraint' => 11, 'default' => 15],
            'threshold_count' => ['type' => 'INT', 'constraint' => 11, 'default' => 5],
            'scope' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'global'], // global/controller/service/pattern
            'scope_value' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'notify_email' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'notify_discord_webhook' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bf_error_alert_rules', true);

        // Alert events (each trigger instance)
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'rule_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'triggered_at' => ['type' => 'DATETIME', 'null' => true],
            'window_start' => ['type' => 'DATETIME', 'null' => true],
            'window_end' => ['type' => 'DATETIME', 'null' => true],
            'count' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'severity' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'scope' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'scope_value' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'payload' => ['type' => 'TEXT', 'null' => true], // JSON
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('rule_id');
        $this->forge->createTable('bf_error_alert_events', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_error_alert_events', true);
        $this->forge->dropTable('bf_error_alert_rules', true);
        $this->forge->dropTable('bf_error_learning_runs', true);
        $this->forge->dropTable('bf_error_patterns', true);
    }
}