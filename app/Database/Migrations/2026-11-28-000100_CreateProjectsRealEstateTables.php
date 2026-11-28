<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration: CreateProjectsRealEstateTables
 *
 * Establishes real estate syndication, co-investment pro forma underwriting,
 * and audited revenue-sharing tables for residential STRs (Airbnb/VRBO)
 * and commercial leased properties within /Projects.
 */
class CreateProjectsRealEstateTables extends Migration
{
    private const TABLE_RE = 'bf_projects_real_estate';
    private const TABLE_REV = 'bf_projects_real_estate_revenues';

    public function up()
    {
        if (! $this->db->tableExists(self::TABLE_RE)) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'BIGINT',
                    'constraint'     => 20,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'project_id' => [
                    'type'       => 'INT',
                    'constraint' => 10,
                    'unsigned'   => true,
                ],
                'property_category' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 50,
                    'default'    => 'residential_str', // residential_str, commercial_lease, multi_family, mixed_use
                ],
                'monetization_strategy' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'default'    => 'airbnb_vrbo', // airbnb_vrbo, triple_net_nnn, retail_lease, medium_term_rental
                ],
                'property_address' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'default'    => '',
                ],
                'city' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'default'    => '',
                ],
                'state' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 10,
                    'default'    => '',
                ],
                'postal_code' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 20,
                    'default'    => '',
                ],
                'zillow_url' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 500,
                    'null'       => true,
                ],
                'mls_number' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'null'       => true,
                ],
                'purchase_price' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '14,2',
                    'default'    => '0.00',
                ],
                'renovation_budget' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '14,2',
                    'default'    => '0.00',
                ],
                'furnishing_budget' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '14,2',
                    'default'    => '0.00',
                ],
                'closing_costs' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '14,2',
                    'default'    => '0.00',
                ],
                'total_acquisition_cost' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '14,2',
                    'default'    => '0.00',
                ],
                'projected_adr' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '10,2',
                    'null'       => true,
                ],
                'projected_occupancy_pct' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '5,2',
                    'null'       => true,
                ],
                'projected_monthly_rent' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '12,2',
                    'null'       => true,
                ],
                'projected_annual_noi' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '14,2',
                    'default'    => '0.00',
                ],
                'target_coc_return' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '6,2',
                    'default'    => '0.00',
                ],
                'sponsor_management_fee_pct' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '5,2',
                    'default'    => '15.00',
                ],
                'operational_stage' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 30,
                    'default'    => 'sourcing', // sourcing, fundraising, acquisition, renovation, active_cashflow, exited
                ],
                'airbnb_listing_url' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 500,
                    'null'       => true,
                ],
                'vrbo_listing_url' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 500,
                    'null'       => true,
                ],
                'spv_entity_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 150,
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
            $this->forge->addUniqueKey('project_id', 'uniq_project_id');
            $this->forge->addKey('property_category');
            $this->forge->addKey('operational_stage');
            $this->forge->createTable(self::TABLE_RE, true);
            log_message('notice', 'CreateProjectsRealEstateTables: created bf_projects_real_estate');
        }

        if (! $this->db->tableExists(self::TABLE_REV)) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'BIGINT',
                    'constraint'     => 20,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'project_id' => [
                    'type'       => 'INT',
                    'constraint' => 10,
                    'unsigned'   => true,
                ],
                'reporting_period' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 20, // e.g. 2026-11
                ],
                'revenue_source' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 50,
                    'default'    => 'airbnb_payout', // airbnb_payout, vrbo_payout, commercial_rent, other
                ],
                'gross_revenue' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '14,2',
                    'default'    => '0.00',
                ],
                'platform_fees' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '14,2',
                    'default'    => '0.00',
                ],
                'cleaning_fees' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '14,2',
                    'default'    => '0.00',
                ],
                'utilities' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '14,2',
                    'default'    => '0.00',
                ],
                'property_taxes' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '14,2',
                    'default'    => '0.00',
                ],
                'insurance' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '14,2',
                    'default'    => '0.00',
                ],
                'maintenance_reserves' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '14,2',
                    'default'    => '0.00',
                ],
                'sponsor_fee' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '14,2',
                    'default'    => '0.00',
                ],
                'net_distributable' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '14,2',
                    'default'    => '0.00',
                ],
                'proof_attachment_url' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 500,
                    'null'       => true,
                ],
                'reported_by' => [
                    'type'       => 'INT',
                    'constraint' => 10,
                    'unsigned'   => true,
                    'default'    => 0,
                ],
                'status' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 30,
                    'default'    => 'draft', // draft, audited, distributed
                ],
                'distributed_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
                'notes' => [
                    'type' => 'TEXT',
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
            $this->forge->addKey(['project_id', 'reporting_period'], false, false, 'idx_project_period');
            $this->forge->addKey('status');
            $this->forge->createTable(self::TABLE_REV, true);
            log_message('notice', 'CreateProjectsRealEstateTables: created bf_projects_real_estate_revenues');
        }
    }

    public function down()
    {
        $this->forge->dropTable(self::TABLE_REV, true);
        $this->forge->dropTable(self::TABLE_RE, true);
    }
}
