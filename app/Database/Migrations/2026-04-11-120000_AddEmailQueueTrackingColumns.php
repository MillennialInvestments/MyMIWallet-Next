<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEmailQueueTrackingColumns extends Migration
{
    public function up()
    {
        $this->ensureColumns('bf_marketing_temp_scraper');
        $this->ensureColumns('bf_investment_scraper');
    }

    public function down()
    {
        // Non-destructive by design.
    }

    private function ensureColumns(string $table): void
    {
        if (! $this->db->tableExists($table)) {
            return;
        }

        $columns = [
            'source_mailbox' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'source_folder' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'imap_uid' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'message_id' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'route_category' => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
            'ingested_at' => ['type' => 'DATETIME', 'null' => true],
            'moved_to_processed_at' => ['type' => 'DATETIME', 'null' => true],
        ];

        foreach ($columns as $name => $definition) {
            if (! $this->db->fieldExists($name, $table)) {
                $this->forge->addColumn($table, [$name => $definition]);
            }
        }
    }
}
