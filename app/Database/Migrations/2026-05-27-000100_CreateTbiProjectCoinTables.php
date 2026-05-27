<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbiProjectCoinTables extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_tbi_project_coins')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'project_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'coin_key' => ['type' => 'VARCHAR', 'constraint' => 100],
                'coin_name' => ['type' => 'VARCHAR', 'constraint' => 150],
                'symbol' => ['type' => 'VARCHAR', 'constraint' => 20],
                'coin_type' => ['type' => 'VARCHAR', 'constraint' => 30],
                'unit_value_usd' => ['type' => 'DECIMAL', 'constraint' => '18,6', 'default' => '1.000000'],
                'solana_mint_address' => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
                'exchange_asset_id' => ['type' => 'VARCHAR', 'constraint' => 120, 'null' => true],
                'project_exchange_symbol' => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true],
                'primary_issuance_enabled' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
                'secondary_trading_enabled' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'compliance_required' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
                'status' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'draft'],
                'metadata_json' => ['type' => 'TEXT', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
                'deleted_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('coin_key');
            $this->forge->addKey('project_id');
            $this->forge->addKey('symbol');
            $this->forge->addKey('coin_type');
            $this->forge->addKey('status');
            $this->forge->createTable('bf_tbi_project_coins', true);
        }

        if (! $this->db->tableExists('bf_tbi_coin_contribution_categories')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'category_key' => ['type' => 'VARCHAR', 'constraint' => 100],
                'category_name' => ['type' => 'VARCHAR', 'constraint' => 150],
                'description' => ['type' => 'TEXT', 'null' => true],
                'default_coin_key' => ['type' => 'VARCHAR', 'constraint' => 100],
                'is_operational_expense' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
                'is_work_contribution' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'is_active' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('category_key');
            $this->forge->createTable('bf_tbi_coin_contribution_categories', true);

            $categories = [
                ['category_key' => 'cash_contribution', 'category_name' => 'Cash Contribution', 'description' => 'Direct cash contribution.', 'default_coin_key' => 'tbi_utility', 'is_operational_expense' => 1, 'is_work_contribution' => 0, 'is_active' => 1],
                ['category_key' => 'development_work', 'category_name' => 'Development Work', 'description' => 'Approved development contribution.', 'default_coin_key' => 'tbi_utility', 'is_operational_expense' => 0, 'is_work_contribution' => 1, 'is_active' => 1],
                ['category_key' => 'marketing', 'category_name' => 'Marketing', 'description' => 'Marketing and outreach spend.', 'default_coin_key' => 'tbi_utility', 'is_operational_expense' => 1, 'is_work_contribution' => 0, 'is_active' => 1],
                ['category_key' => 'customer_acquisition', 'category_name' => 'Customer Acquisition', 'description' => 'Approved customer acquisition costs.', 'default_coin_key' => 'tbi_utility', 'is_operational_expense' => 1, 'is_work_contribution' => 0, 'is_active' => 1],
                ['category_key' => 'infrastructure_costs', 'category_name' => 'Infrastructure Costs', 'description' => 'Infrastructure and systems.', 'default_coin_key' => 'tbi_utility', 'is_operational_expense' => 1, 'is_work_contribution' => 0, 'is_active' => 1],
                ['category_key' => 'management', 'category_name' => 'Management', 'description' => 'Management contributions.', 'default_coin_key' => 'tbi_utility', 'is_operational_expense' => 1, 'is_work_contribution' => 1, 'is_active' => 1],
                ['category_key' => 'hosting', 'category_name' => 'Hosting', 'description' => 'Hosting/service infrastructure costs.', 'default_coin_key' => 'tbi_utility', 'is_operational_expense' => 1, 'is_work_contribution' => 0, 'is_active' => 1],
                ['category_key' => 'software_access', 'category_name' => 'Software Access', 'description' => 'Software/subscription access costs.', 'default_coin_key' => 'tbi_utility', 'is_operational_expense' => 1, 'is_work_contribution' => 0, 'is_active' => 1],
                ['category_key' => 'exchange_fees', 'category_name' => 'Exchange Fees', 'description' => 'Internal exchange-related fees.', 'default_coin_key' => 'tbi_utility', 'is_operational_expense' => 1, 'is_work_contribution' => 0, 'is_active' => 1],
                ['category_key' => 'support_operations', 'category_name' => 'Support Operations', 'description' => 'Support and operational expenses.', 'default_coin_key' => 'tbi_utility', 'is_operational_expense' => 1, 'is_work_contribution' => 0, 'is_active' => 1],
            ];
            foreach ($categories as $category) {
                $this->db->table('bf_tbi_coin_contribution_categories')->insert($category);
            }
        }

        if (! $this->db->tableExists('bf_tbi_coin_contribution_ledger')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'project_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'coin_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'user_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'category_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'contribution_type' => ['type' => 'VARCHAR', 'constraint' => 20],
                'description' => ['type' => 'TEXT', 'null' => true],
                'external_reference' => ['type' => 'VARCHAR', 'constraint' => 190, 'null' => true],
                'usd_value' => ['type' => 'DECIMAL', 'constraint' => '18,6', 'default' => '0.000000'],
                'coin_quantity' => ['type' => 'DECIMAL', 'constraint' => '18,6', 'default' => '0.000000'],
                'unit_value_usd' => ['type' => 'DECIMAL', 'constraint' => '18,6', 'default' => '1.000000'],
                'status' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'pending'],
                'reviewed_by' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
                'reviewed_at' => ['type' => 'DATETIME', 'null' => true],
                'idempotency_key' => ['type' => 'VARCHAR', 'constraint' => 120],
                'metadata_json' => ['type' => 'TEXT', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
                'deleted_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('idempotency_key');
            $this->forge->addKey('project_id');
            $this->forge->addKey('coin_id');
            $this->forge->addKey('user_id');
            $this->forge->addKey('category_id');
            $this->forge->addKey('status');
            $this->forge->createTable('bf_tbi_coin_contribution_ledger', true);
        }
    }

    public function down()
    {
        $this->forge->dropTable('bf_tbi_coin_contribution_ledger', true);
        $this->forge->dropTable('bf_tbi_coin_contribution_categories', true);
        $this->forge->dropTable('bf_tbi_project_coins', true);
    }
}
