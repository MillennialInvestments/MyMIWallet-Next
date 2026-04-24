<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HardenMarketingDistributionTargetsForReliability extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_marketing_distribution_targets')) {
            return;
        }

        $columns = [
            'idempotency_key' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true, 'after' => 'destination'],
            'attempt_count' => ['type' => 'INT', 'constraint' => 11, 'default' => 0, 'after' => 'retry_count'],
            'max_attempts' => ['type' => 'INT', 'constraint' => 11, 'default' => 3, 'after' => 'attempt_count'],
            'http_status' => ['type' => 'INT', 'constraint' => 11, 'null' => true, 'after' => 'error_message'],
            'failure_class' => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true, 'after' => 'http_status'],
            'response_excerpt' => ['type' => 'TEXT', 'null' => true, 'after' => 'failure_class'],
            'response_headers' => ['type' => 'LONGTEXT', 'null' => true, 'after' => 'response_excerpt'],
            'response_body' => ['type' => 'LONGTEXT', 'null' => true, 'after' => 'response_headers'],
            'locked_at' => ['type' => 'DATETIME', 'null' => true, 'after' => 'next_retry_at'],
            'locked_by' => ['type' => 'VARCHAR', 'constraint' => 120, 'null' => true, 'after' => 'locked_at'],
            'next_retry_at' => ['type' => 'DATETIME', 'null' => true, 'after' => 'queued_at'],
            'last_attempt_at' => ['type' => 'DATETIME', 'null' => true, 'after' => 'next_retry_at'],
        ];

        foreach ($columns as $name => $def) {
            if (! $this->db->fieldExists($name, 'bf_marketing_distribution_targets')) {
                $this->forge->addColumn('bf_marketing_distribution_targets', [$name => $def]);
            }
        }

        $this->db->query("UPDATE bf_marketing_distribution_targets SET status='failed_retryable' WHERE status IN ('failed','retrying')");
        $this->db->query("UPDATE bf_marketing_distribution_targets SET status='failed_permanent', failure_class='discord_permission_denied' WHERE channel='discord' AND (http_status=403 OR error_message LIKE '%403%')");
        $this->db->query("UPDATE bf_marketing_distribution_targets SET attempt_count=retry_count WHERE attempt_count IS NULL OR attempt_count=0");
        $this->db->query("UPDATE bf_marketing_distribution_targets SET max_attempts=3 WHERE max_attempts IS NULL OR max_attempts=0");

        $rows = $this->db->table('bf_marketing_distribution_targets')->select('id, generated_content_id, destination, channel, payload_json')->get()->getResultArray();
        foreach ($rows as $row) {
            $payload = json_decode((string) ($row['payload_json'] ?? '{}'), true);
            if (! is_array($payload)) {
                $payload = [];
            }
            $key = hash('sha256', implode('|', [
                (int) ($row['generated_content_id'] ?? 0),
                (string) ($row['destination'] ?? ''),
                (string) ($row['channel'] ?? ''),
                json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            ]));
            $this->db->table('bf_marketing_distribution_targets')->where('id', (int) $row['id'])->update(['idempotency_key' => $key]);
        }

        $this->db->query('CREATE UNIQUE INDEX uniq_marketing_distribution_idempotency ON bf_marketing_distribution_targets(idempotency_key)');
        $this->db->query('CREATE INDEX idx_marketing_distribution_status_retry ON bf_marketing_distribution_targets(status, next_retry_at)');
        $this->db->query('CREATE INDEX idx_marketing_distribution_lock ON bf_marketing_distribution_targets(locked_at, locked_by)');
    }

    public function down()
    {
        if (! $this->db->tableExists('bf_marketing_distribution_targets')) {
            return;
        }

        $this->db->query('DROP INDEX uniq_marketing_distribution_idempotency ON bf_marketing_distribution_targets');
        $this->db->query('DROP INDEX idx_marketing_distribution_status_retry ON bf_marketing_distribution_targets');
        $this->db->query('DROP INDEX idx_marketing_distribution_lock ON bf_marketing_distribution_targets');

        foreach (['idempotency_key','attempt_count','max_attempts','http_status','failure_class','response_excerpt','response_headers','response_body','locked_at','locked_by','next_retry_at','last_attempt_at'] as $field) {
            if ($this->db->fieldExists($field, 'bf_marketing_distribution_targets')) {
                $this->forge->dropColumn('bf_marketing_distribution_targets', $field);
            }
        }

        $this->db->query("UPDATE bf_marketing_distribution_targets SET status='failed' WHERE status='failed_retryable'");
    }
}
