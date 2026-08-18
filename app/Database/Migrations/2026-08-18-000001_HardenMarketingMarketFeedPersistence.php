<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

final class HardenMarketingMarketFeedPersistence extends Migration
{
    public function up(): void
    {
        $this->forge->addColumn(
            'bf_marketing_market_feed_items',
            [
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
            ]
        );
    }

    public function down(): void
    {
        // Forward-only: collected source and feed records are preserved.
    }
}
