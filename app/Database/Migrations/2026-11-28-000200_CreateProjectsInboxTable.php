<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration: CreateProjectsInboxTable
 *
 * Establishes or hardens the bf_projects_inbox table for real estate
 * property sourcing, intake queue, and asynchronous scraping ingestion.
 */
class CreateProjectsInboxTable extends Migration
{
    private const TABLE_NAME = 'bf_projects_inbox';

    public function up()
    {
        if (! $this->db->tableExists(self::TABLE_NAME)) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'source' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 64,
                    'null'       => true,
                ],
                'source_key' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 128,
                    'null'       => true,
                ],
                'trigger' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 64,
                    'null'       => true,
                ],
                'raw_subject' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ],
                'raw_body' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'url' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'payload_json' => [
                    'type' => 'LONGTEXT',
                    'null' => true,
                ],
                'status' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 32,
                    'default'    => 'queued',
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

            $this->forge->addPrimaryKey('id');
            $this->forge->addKey('status');
            $this->forge->addKey('source');
            $this->forge->createTable(self::TABLE_NAME, true);

            log_message('notice', 'CreateProjectsInboxTable: created bf_projects_inbox');
        } else {
            // Defensive column addition using getFieldData to bypass connection cache
            $fields = $this->db->getFieldData(self::TABLE_NAME);
            $existing = [];
            foreach ($fields as $f) {
                $existing[strtolower($f->name)] = true;
            }

            $columnsToAdd = [];
            if (! isset($existing['id'])) {
                $columnsToAdd['id'] = [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                    'first'          => true,
                ];
            }
            if (! isset($existing['source'])) {
                $columnsToAdd['source'] = [
                    'type'       => 'VARCHAR',
                    'constraint' => 64,
                    'null'       => true,
                ];
            }
            if (! isset($existing['source_key'])) {
                $columnsToAdd['source_key'] = [
                    'type'       => 'VARCHAR',
                    'constraint' => 128,
                    'null'       => true,
                ];
            }
            if (! isset($existing['trigger'])) {
                $columnsToAdd['trigger'] = [
                    'type'       => 'VARCHAR',
                    'constraint' => 64,
                    'null'       => true,
                ];
            }
            if (! isset($existing['raw_subject'])) {
                $columnsToAdd['raw_subject'] = [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ];
            }
            if (! isset($existing['raw_body'])) {
                $columnsToAdd['raw_body'] = [
                    'type' => 'TEXT',
                    'null' => true,
                ];
            }
            if (! isset($existing['url'])) {
                $columnsToAdd['url'] = [
                    'type' => 'TEXT',
                    'null' => true,
                ];
            }
            if (! isset($existing['payload_json'])) {
                $columnsToAdd['payload_json'] = [
                    'type' => 'LONGTEXT',
                    'null' => true,
                ];
            }
            if (! isset($existing['status'])) {
                $columnsToAdd['status'] = [
                    'type'       => 'VARCHAR',
                    'constraint' => 32,
                    'default'    => 'queued',
                ];
            }
            if (! isset($existing['created_at'])) {
                $columnsToAdd['created_at'] = [
                    'type' => 'DATETIME',
                    'null' => true,
                ];
            }
            if (! isset($existing['updated_at'])) {
                $columnsToAdd['updated_at'] = [
                    'type' => 'DATETIME',
                    'null' => true,
                ];
            }

            if (! empty($columnsToAdd)) {
                $this->forge->addColumn(self::TABLE_NAME, $columnsToAdd);
                log_message('notice', 'CreateProjectsInboxTable: added missing columns to bf_projects_inbox');
            }
        }
    }

    public function down()
    {
        if ($this->db->tableExists(self::TABLE_NAME)) {
            $this->forge->dropTable(self::TABLE_NAME, true);
        }
    }
}
