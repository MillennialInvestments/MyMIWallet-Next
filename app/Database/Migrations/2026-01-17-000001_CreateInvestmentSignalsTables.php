<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInvestmentSignalsTables extends Migration
{
    public function up()
    {
        // Tracks each file processed so ingestion is idempotent.
        $this->forge->addField([
            'id'            => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'week_key'      => ['type' => 'VARCHAR', 'constraint' => 8], // YYYY-WW
            'file_date'     => ['type' => 'DATE', 'null' => true],
            'file_path'     => ['type' => 'VARCHAR', 'constraint' => 255],
            'file_name'     => ['type' => 'VARCHAR', 'constraint' => 190],
            'category'      => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'signal_type'   => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'file_hash'     => ['type' => 'CHAR', 'constraint' => 64],
            'rows_total'    => ['type' => 'INT', 'unsigned' => true, 'default' => 0],
            'rows_inserted' => ['type' => 'INT', 'unsigned' => true, 'default' => 0],
            'rows_skipped'  => ['type' => 'INT', 'unsigned' => true, 'default' => 0],
            'processed_at'  => ['type' => 'DATETIME', 'null' => true],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey(['week_key']);
        $this->forge->addUniqueKey(['file_path', 'file_hash'], 'uq_signal_file_path_hash');
        $this->forge->createTable('bf_investment_signal_files', true);

        // Stores normalized signals across all weekly CSV exports.
        $this->forge->addField([
            'id'           => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'week_key'     => ['type' => 'VARCHAR', 'constraint' => 8],
            'signal_date'  => ['type' => 'DATE', 'null' => true], // derived from filename
            'symbol'       => ['type' => 'VARCHAR', 'constraint' => 16],
            'category'     => ['type' => 'VARCHAR', 'constraint' => 64],
            'signal_type'  => ['type' => 'VARCHAR', 'constraint' => 64],
            'source'       => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'csv'],
            'source_file'  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'row_hash'     => ['type' => 'CHAR', 'constraint' => 64], // idempotent per file row
            'score'        => ['type' => 'INT', 'unsigned' => true, 'default' => 50],
            'appearances'  => ['type' => 'INT', 'unsigned' => true, 'default' => 1],
            'metrics_json' => ['type' => 'TEXT', 'null' => true], // store extra cols safely
            'status'       => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'new'], // new|reviewed|promoted|ignored
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey(['week_key', 'symbol']);
        $this->forge->addKey(['category', 'signal_type']);
        $this->forge->addUniqueKey(['source_file', 'row_hash'], 'uq_signal_row');
        $this->forge->createTable('bf_investment_signals', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_investment_signals', true);
        $this->forge->dropTable('bf_investment_signal_files', true);
    }
}
