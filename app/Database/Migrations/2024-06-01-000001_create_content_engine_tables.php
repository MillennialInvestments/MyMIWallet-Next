<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateContentEngineTables extends Migration
{
    public function up()
    {
        // bf_content_scanner_ingest
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'scan_name'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'quote_ts'     => ['type' => 'DATETIME', 'null' => true],
            'payload_hash' => ['type' => 'VARCHAR', 'constraint' => 64],
            'source'       => ['type' => 'VARCHAR', 'constraint' => 64, 'default' => 'manual_chatgpt'],
            'row_count'    => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'status'       => [
                'type'       => 'ENUM',
                'constraint' => ['received', 'processed', 'failed'],
                'default'    => 'received',
            ],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('payload_hash');
        $this->forge->addUniqueKey('payload_hash');
        $this->forge->createTable('bf_content_scanner_ingest');

        // bf_content_scanner_rows
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'ingest_id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'symbol'           => ['type' => 'VARCHAR', 'constraint' => 16],
            'raw_json'         => ['type' => 'LONGTEXT'],
            'stage'            => ['type' => 'DECIMAL', 'constraint' => '10,4', 'null' => true],
            'mark'             => ['type' => 'DECIMAL', 'constraint' => '16,4', 'null' => true],
            'mark_pct_change'  => ['type' => 'DECIMAL', 'constraint' => '10,4', 'null' => true],
            'pct_chng_5d'      => ['type' => 'DECIMAL', 'constraint' => '10,4', 'null' => true],
            'market_cap_m'     => ['type' => 'DECIMAL', 'constraint' => '16,4', 'null' => true],
            'volume'           => ['type' => 'BIGINT', 'null' => true],
            'dollar_vol_m'     => ['type' => 'DECIMAL', 'constraint' => '16,4', 'null' => true],
            'abvvol'           => ['type' => 'DECIMAL', 'constraint' => '10,4', 'null' => true],
            'vol_365'          => ['type' => 'DECIMAL', 'constraint' => '10,4', 'null' => true],
            'high_52w'         => ['type' => 'DECIMAL', 'constraint' => '16,4', 'null' => true],
            'low_52w'          => ['type' => 'DECIMAL', 'constraint' => '16,4', 'null' => true],
            'pct_1mo_chg'      => ['type' => 'DECIMAL', 'constraint' => '10,4', 'null' => true],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('ingest_id');
        $this->forge->addKey('symbol');
        $this->forge->createTable('bf_content_scanner_rows');

        // bf_content_ideas
        $this->forge->addField([
            'id'                        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'ingest_id'                 => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'symbol'                    => ['type' => 'VARCHAR', 'constraint' => 16],
            'score_total'               => ['type' => 'DECIMAL', 'constraint' => '10,4', 'null' => true],
            'tier'                      => [
                'type'       => 'ENUM',
                'constraint' => ['tier1', 'tier2', 'tier3', 'avoid'],
                'default'    => 'avoid',
            ],
            'reasons_json'              => ['type' => 'TEXT', 'null' => true],
            'recommended_platforms_json'=> ['type' => 'TEXT', 'null' => true],
            'status'                    => [
                'type'       => 'ENUM',
                'constraint' => ['draft', 'approved', 'scheduled', 'posted', 'skipped'],
                'default'    => 'draft',
            ],
            'created_at'                => ['type' => 'DATETIME', 'null' => true],
            'updated_at'                => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['symbol', 'ingest_id']);
        $this->forge->createTable('bf_content_ideas');

        // bf_content_posts
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idea_id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'platform'       => [
                'type'       => 'ENUM',
                'constraint' => ['tradingview', 'stocktwits', 'tiktok', 'youtube', 'facebook', 'discord'],
            ],
            'title'          => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'body'           => ['type' => 'TEXT', 'null' => true],
            'hashtags'       => ['type' => 'TEXT', 'null' => true],
            'cta'            => ['type' => 'TEXT', 'null' => true],
            'payload_json'   => ['type' => 'TEXT', 'null' => true],
            'status'         => [
                'type'       => 'ENUM',
                'constraint' => ['draft', 'approved', 'sent', 'failed'],
                'default'    => 'draft',
            ],
            'last_error'     => ['type' => 'TEXT', 'null' => true],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['platform', 'status']);
        $this->forge->createTable('bf_content_posts');
    }

    public function down()
    {
        $this->forge->dropTable('bf_content_posts', true);
        $this->forge->dropTable('bf_content_ideas', true);
        $this->forge->dropTable('bf_content_scanner_rows', true);
        $this->forge->dropTable('bf_content_scanner_ingest', true);
    }
}
