<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use RuntimeException;

final class HardenMarketingMarketFeedPersistence extends Migration
{
    public function up(): void
    {
        $table = 'bf_marketing_market_feed_items';

        if (! $this->db->tableExists($table)) {
            throw new RuntimeException(
                'Market-feed ledger table must exist before hardening.'
            );
        }

        $fields = [
            'relevance_score' => [
                'type'       => 'DECIMAL',
                'constraint' => '12,8',
                'null'       => true,
            ],
            'sentiment_score' => [
                'type'       => 'DECIMAL',
                'constraint' => '12,8',
                'null'       => true,
            ],
            'sentiment_label' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
                'null'       => true,
            ],
        ];

        foreach ($fields as $name => $definition) {
            if ($this->db->fieldExists($name, $table)) {
                continue;
            }

            $this->forge->addColumn(
                $table,
                [$name => $definition]
            );
        }
    }

    public function down(): void
    {
        // Forward-only: collected source and feed records are preserved.
    }
}
