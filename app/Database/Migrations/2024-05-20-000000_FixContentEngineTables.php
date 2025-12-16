<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FixContentEngineTables20240520 extends Migration
{
    public function up(): void
    {
        $forge = $this->forge;

        if (! $this->db->tableExists('bf_content_scanner_ingest')) {
            $forge->addField([
                'id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'scan_name'    => ['type' => 'VARCHAR', 'constraint' => 191],
                'quote_ts'     => ['type' => 'DATETIME', 'null' => true],
                'payload_hash' => ['type' => 'VARCHAR', 'constraint' => 128],
                'source'       => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
                'row_count'    => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
                'status'       => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'received'],
                'created_at'   => ['type' => 'DATETIME', 'null' => true],
                'updated_at'   => ['type' => 'DATETIME', 'null' => true],
            ]);
            $forge->addKey('id', true);
            $forge->addKey('quote_ts');
            $forge->addKey('status');
            $forge->addUniqueKey('payload_hash');
            $forge->createTable('bf_content_scanner_ingest', true);
        }

        if (! $this->db->tableExists('bf_content_scanner_rows')) {
            $forge->addField([
                'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'ingest_id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'symbol'           => ['type' => 'VARCHAR', 'constraint' => 16],
                'raw_json'         => ['type' => 'TEXT'],
                'stage'            => ['type' => 'DECIMAL', 'constraint' => '10,2', 'null' => true],
                'mark'             => ['type' => 'DECIMAL', 'constraint' => '18,4', 'null' => true],
                'mark_pct_change'  => ['type' => 'DECIMAL', 'constraint' => '10,2', 'null' => true],
                'pct_chng_5d'      => ['type' => 'DECIMAL', 'constraint' => '10,2', 'null' => true],
                'market_cap_m'     => ['type' => 'DECIMAL', 'constraint' => '18,2', 'null' => true],
                'volume'           => ['type' => 'DECIMAL', 'constraint' => '18,2', 'null' => true],
                'dollar_vol_m'     => ['type' => 'DECIMAL', 'constraint' => '18,2', 'null' => true],
                'abvvol'           => ['type' => 'DECIMAL', 'constraint' => '18,2', 'null' => true],
                'vol_365'          => ['type' => 'DECIMAL', 'constraint' => '18,2', 'null' => true],
                'high_52w'         => ['type' => 'DECIMAL', 'constraint' => '18,2', 'null' => true],
                'low_52w'          => ['type' => 'DECIMAL', 'constraint' => '18,2', 'null' => true],
                'pct_1mo_chg'      => ['type' => 'DECIMAL', 'constraint' => '10,2', 'null' => true],
                'created_at'       => ['type' => 'DATETIME', 'null' => true],
            ]);
            $forge->addKey('id', true);
            $forge->addKey('ingest_id');
            $forge->addKey('symbol');
            $forge->addForeignKey('ingest_id', 'bf_content_scanner_ingest', 'id', 'CASCADE', 'CASCADE');
            $forge->createTable('bf_content_scanner_rows', true);
        }

        if (! $this->db->tableExists('bf_content_ideas')) {
            $forge->addField([
                'id'                          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'ingest_id'                   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'symbol'                      => ['type' => 'VARCHAR', 'constraint' => 16],
                'score_total'                 => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0],
                'tier'                        => ['type' => 'VARCHAR', 'constraint' => 16],
                'reasons_json'                => ['type' => 'TEXT', 'null' => true],
                'recommended_platforms_json'  => ['type' => 'TEXT', 'null' => true],
                'status'                      => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'draft'],
                'created_at'                  => ['type' => 'DATETIME', 'null' => true],
                'updated_at'                  => ['type' => 'DATETIME', 'null' => true],
            ]);
            $forge->addKey('id', true);
            $forge->addKey('ingest_id');
            $forge->addKey('symbol');
            $forge->addKey(['ingest_id', 'tier']);
            $forge->addForeignKey('ingest_id', 'bf_content_scanner_ingest', 'id', 'CASCADE', 'CASCADE');
            $forge->createTable('bf_content_ideas', true);
        }

        if (! $this->db->tableExists('bf_content_posts')) {
            $forge->addField([
                'id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'idea_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'platform'     => ['type' => 'VARCHAR', 'constraint' => 32],
                'title'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'body'         => ['type' => 'TEXT', 'null' => true],
                'hashtags'     => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'cta'          => ['type' => 'TEXT', 'null' => true],
                'payload_json' => ['type' => 'TEXT', 'null' => true],
                'status'       => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'draft'],
                'last_error'   => ['type' => 'TEXT', 'null' => true],
                'created_at'   => ['type' => 'DATETIME', 'null' => true],
                'updated_at'   => ['type' => 'DATETIME', 'null' => true],
            ]);
            $forge->addKey('id', true);
            $forge->addKey('idea_id');
            $forge->addKey(['platform', 'status']);
            $forge->addForeignKey('idea_id', 'bf_content_ideas', 'id', 'CASCADE', 'CASCADE');
            $forge->createTable('bf_content_posts', true);
        }
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_content_posts', true);
        $this->forge->dropTable('bf_content_ideas', true);
        $this->forge->dropTable('bf_content_scanner_rows', true);
        $this->forge->dropTable('bf_content_scanner_ingest', true);
    }
}
