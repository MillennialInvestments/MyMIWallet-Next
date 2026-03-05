<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOpsManagementTables extends Migration
{
    public function up(): void
    {
        $attributes = [
            'ENGINE'          => 'InnoDB',
            'DEFAULT CHARSET' => 'utf8mb4',
            'COLLATE'         => 'utf8mb4_unicode_ci',
        ];

        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'code'        => ['type' => 'VARCHAR', 'constraint' => 32],
            'name'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'owner'       => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
            'priority'    => ['type' => 'VARCHAR', 'constraint' => 8, 'default' => 'P2'],
            'status'      => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'planned'],
            'start_date'  => ['type' => 'DATE', 'null' => true],
            'target_date' => ['type' => 'DATE', 'null' => true],
            'notes'       => ['type' => 'TEXT', 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('code');
        $this->forge->createTable('ops_projects', true, $attributes);

        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'project_id'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'code'          => ['type' => 'VARCHAR', 'constraint' => 32],
            'name'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'owner'         => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
            'priority'      => ['type' => 'VARCHAR', 'constraint' => 8, 'default' => 'P2'],
            'status'        => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'planned'],
            'due_date'      => ['type' => 'DATE', 'null' => true],
            'notes'         => ['type' => 'TEXT', 'null' => true],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('code');
        $this->forge->addKey('project_id');
        $this->forge->addForeignKey('project_id', 'ops_projects', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ops_subprojects', true, $attributes);

        $this->forge->addField([
            'id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'project_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'subproject_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'code'            => ['type' => 'VARCHAR', 'constraint' => 32],
            'area'            => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'feature_surface' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
            'title'           => ['type' => 'VARCHAR', 'constraint' => 255],
            'acceptance'      => ['type' => 'TEXT', 'null' => true],
            'status'          => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'open'],
            'severity'        => ['type' => 'VARCHAR', 'constraint' => 16, 'null' => true],
            'priority'        => ['type' => 'VARCHAR', 'constraint' => 8, 'default' => 'P2'],
            'owner'           => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
            'due_date'        => ['type' => 'DATE', 'null' => true],
            'routes'          => ['type' => 'TEXT', 'null' => true],
            'handler'         => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'dependencies'    => ['type' => 'TEXT', 'null' => true],
            'evidence_link'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'updated_utc'     => ['type' => 'DATETIME', 'null' => true],
            'created_at'      => ['type' => 'DATETIME', 'null' => true],
            'updated_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('code');
        $this->forge->addKey('project_id');
        $this->forge->addKey('subproject_id');
        $this->forge->addForeignKey('project_id', 'ops_projects', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('subproject_id', 'ops_subprojects', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('ops_tasks', true, $attributes);

        $this->forge->addField([
            'id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'task_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'event_type'   => ['type' => 'VARCHAR', 'constraint' => 32],
            'payload_json' => ['type' => 'LONGTEXT', 'null' => true],
            'created_by'   => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
            'created_at'   => ['type' => 'DATETIME', 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('task_id');
        $this->forge->addKey('event_type');
        $this->forge->addForeignKey('task_id', 'ops_tasks', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ops_task_events', true, $attributes);
    }

    public function down(): void
    {
        $this->forge->dropTable('ops_task_events', true);
        $this->forge->dropTable('ops_tasks', true);
        $this->forge->dropTable('ops_subprojects', true);
        $this->forge->dropTable('ops_projects', true);
    }
}
