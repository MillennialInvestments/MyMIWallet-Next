<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAiOpsFormTests extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'source_type' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'null' => false,
            ],
            'source_value' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'form_action' => [
                'type' => 'VARCHAR',
                'constraint' => 512,
                'null' => true,
            ],
            'http_method' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'null' => true,
            ],
            'controller_class' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'route_match' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'generated_payload' => [
                'type' => 'JSON',
                'null' => true,
            ],
            'response_status' => [
                'type' => 'SMALLINT',
                'constraint' => 6,
                'null' => true,
            ],
            'response_headers' => [
                'type' => 'MEDIUMTEXT',
                'null' => true,
            ],
            'response_body' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'error_detected' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'unsigned' => true,
                'default' => 0,
            ],
            'logs_snapshot' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'patch_job_created' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'unsigned' => true,
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('source_type');
        $this->forge->addKey('http_method');
        $this->forge->addKey('error_detected');
        $this->forge->addKey('patch_job_created');
        $this->forge->addKey('created_at');

        $this->forge->createTable('bf_aiops_form_tests', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_aiops_form_tests', true);
    }
}
