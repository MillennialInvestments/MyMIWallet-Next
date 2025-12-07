<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddWeeklyStreamAndNewsletters extends Migration
{
    public function up()
    {
        // bf_weekly_stream_watchlist
        if (! $this->db->tableExists('bf_weekly_stream_watchlist')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'week_start_date' => [
                    'type' => 'DATE',
                    'null' => false,
                ],
                'watchlist_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 128,
                    'null'       => false,
                ],
                'symbol' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 32,
                    'null'       => false,
                ],
                'score' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '10,4',
                    'null'       => true,
                ],
                'notes' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                    'null' => false,
                    'default' => new RawSql('CURRENT_TIMESTAMP'),
                ],
            ]);

            $this->forge->addKey('id', true);
            $this->forge->addKey(['week_start_date', 'watchlist_name']);
            $this->forge->addKey('symbol');
            $this->forge->createTable('bf_weekly_stream_watchlist');
        }

        // bf_marketing_newsletters
        if (! $this->db->tableExists('bf_marketing_newsletters')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'title' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => false,
                ],
                'slug' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => false,
                ],
                'subject' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => false,
                ],
                'body_html' => [
                    'type' => 'MEDIUMTEXT',
                ],
                'status' => [
                    'type'       => 'ENUM',
                    'constraint' => ['draft', 'scheduled', 'sent'],
                    'default'    => 'draft',
                ],
                'week_start_date' => [
                    'type' => 'DATE',
                    'null' => true,
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                    'null' => false,
                    'default' => new RawSql('CURRENT_TIMESTAMP'),
                ],
                'updated_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                    'default' => null,
                ],
            ]);

            $this->forge->addKey('id', true);
            $this->forge->addKey('slug');
            $this->forge->addKey('week_start_date');
            $this->forge->createTable('bf_marketing_newsletters');
        }
    }

    public function down()
    {
        $this->forge->dropTable('bf_weekly_stream_watchlist', true);
        $this->forge->dropTable('bf_marketing_newsletters', true);
    }
}
