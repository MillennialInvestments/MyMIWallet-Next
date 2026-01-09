<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserOnboardingTables extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_user_onboarding')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'user_id' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
                ],
                'steps_json' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'first_verified_login_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
                'walkthrough_started_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
                'walkthrough_completed_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
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
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('user_id');
            $this->forge->createTable('bf_user_onboarding', true);
        }

        if (! $this->db->tableExists('bf_user_profiles')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'user_id' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
                ],
                'first_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 120,
                    'null'       => true,
                ],
                'last_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 120,
                    'null'       => true,
                ],
                'email' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ],
                'phone' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 40,
                    'null'       => true,
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
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('user_id');
            $this->forge->createTable('bf_user_profiles', true);
        }

        if (! $this->db->tableExists('bf_user_employment')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'user_id' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
                ],
                'employment_type' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 40,
                    'null'       => true,
                ],
                'company_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 160,
                    'null'       => true,
                ],
                'business_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 160,
                    'null'       => true,
                ],
                'job_title' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 120,
                    'null'       => true,
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
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('user_id');
            $this->forge->createTable('bf_user_employment', true);
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_user_employment')) {
            $this->forge->dropTable('bf_user_employment', true);
        }

        if ($this->db->tableExists('bf_user_profiles')) {
            $this->forge->dropTable('bf_user_profiles', true);
        }

        if ($this->db->tableExists('bf_user_onboarding')) {
            $this->forge->dropTable('bf_user_onboarding', true);
        }
    }
}
