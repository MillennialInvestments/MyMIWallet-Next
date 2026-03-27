<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFundMetadataToProjects extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_projects')) {
            return;
        }

        $fields = $this->db->getFieldNames('bf_projects');
        $columns = [
            'is_active' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1, 'null' => false],
            'is_system' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0, 'null' => false],
            'project_type' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'general', 'null' => false],
            'nav_per_unit' => ['type' => 'DECIMAL', 'constraint' => '18,8', 'default' => '1.00000000', 'null' => false],
            'total_units_issued' => ['type' => 'DECIMAL', 'constraint' => '20,8', 'default' => '0.00000000', 'null' => false],
            'total_fund_value' => ['type' => 'DECIMAL', 'constraint' => '18,2', 'default' => '0.00', 'null' => false],
            'linked_visual' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
        ];

        foreach ($columns as $name => $def) {
            if (! in_array($name, $fields, true)) {
                $this->forge->addColumn('bf_projects', [$name => $def]);
            }
        }

        $this->db->query("UPDATE bf_projects SET is_active = 0 WHERE is_system = 0 OR is_system IS NULL");

        $exists = $this->db->table('bf_projects')
            ->where('name', 'MyMI US Oil Fund')
            ->where('project_type', 'private_fund')
            ->countAllResults();

        if ((int) $exists === 0) {
            $this->db->table('bf_projects')->insert([
                'name' => 'MyMI US Oil Fund',
                'description' => 'Private fund project focused on disciplined accumulation and management of U.S. oil exposure using a NAV-driven unit model inside MyMI Projects.',
                'target_amount' => 1000000.00,
                'current_amount' => 0.00,
                'status' => 'active',
                'is_active' => 1,
                'is_system' => 1,
                'project_type' => 'private_fund',
                'nav_per_unit' => 1.00000000,
                'total_units_issued' => 1000000.00000000,
                'total_fund_value' => 1000000.00,
                'linked_visual' => 'https://cdn.mymi.com/projects/mymi-us-oil-fund-flow.png',
                'created_by' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }

    public function down()
    {
        if (! $this->db->tableExists('bf_projects')) {
            return;
        }

        foreach (['linked_visual', 'total_fund_value', 'total_units_issued', 'nav_per_unit', 'project_type', 'is_system', 'is_active'] as $field) {
            if (in_array($field, $this->db->getFieldNames('bf_projects'), true)) {
                $this->forge->dropColumn('bf_projects', $field);
            }
        }
    }
}
