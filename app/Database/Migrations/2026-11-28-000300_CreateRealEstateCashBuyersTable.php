<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration: CreateRealEstateCashBuyersTable
 *
 * Establishes the bf_real_estate_cash_buyers table for active cash buyer
 * registration, buy-box matching, and 1-click wholesale contract dispo broadcasts.
 *
 * Lead Sponsor: Timothy Burks Incorporated, LLC.
 * Operating Managers: Timothy Burks & AnneAlicia Burks, Bossier City, Louisiana.
 */
class CreateRealEstateCashBuyersTable extends Migration
{
    private const TABLE_NAME = 'bf_real_estate_cash_buyers';

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
                'full_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 128,
                ],
                'company_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 128,
                    'null'       => true,
                ],
                'email' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 128,
                ],
                'phone' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 32,
                    'null'       => true,
                ],
                'buyer_type' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 64,
                    'default'    => 'rehabber', // rehabber, landlord_fund, str_operator, institutional
                ],
                'max_purchase_price' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '12,2',
                    'default'    => 250000.00,
                ],
                'min_roi_pct' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '5,2',
                    'default'    => 12.00,
                ],
                'target_zips' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ],
                'target_cities' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ],
                'proof_of_funds_verified' => [
                    'type'       => 'TINYINT',
                    'constraint' => 1,
                    'default'    => 0,
                ],
                'proof_of_funds_amount' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '12,2',
                    'default'    => 0.00,
                ],
                'status' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 32,
                    'default'    => 'active', // active, inactive, paused
                ],
                'notes' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'deals_received_count' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'default'    => 0,
                ],
                'deals_closed_count' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'default'    => 0,
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
            $this->forge->addKey('buyer_type');
            $this->forge->addKey('status');

            $tableName = self::TABLE_NAME;
            if ($this->db->DBPrefix !== '' && str_starts_with($tableName, $this->db->DBPrefix)) {
                $tableName = substr($tableName, strlen($this->db->DBPrefix));
            }
            $this->forge->createTable($tableName, true);

            // Seed initial regional buyers for Bossier City and Shreveport MSA
            $this->db->table(self::TABLE_NAME)->insertBatch([
                [
                    'full_name'               => 'Ark-La-Tex Turnkey & Rehabbers',
                    'company_name'            => 'Ark-La-Tex Capital Partners',
                    'email'                   => 'acquisitions@arklatexcapital.com',
                    'phone'                   => '318-555-0192',
                    'buyer_type'              => 'rehabber',
                    'max_purchase_price'      => 185000.00,
                    'min_roi_pct'             => 14.00,
                    'target_zips'             => '71111,71112,71101,71103,71107',
                    'target_cities'           => 'Bossier City, Shreveport',
                    'proof_of_funds_verified' => 1,
                    'proof_of_funds_amount'   => 450000.00,
                    'status'                  => 'active',
                    'notes'                   => 'Aggressive cash buyer for single-family rehabs with >15% ROI spread. 10-14 day close.',
                    'deals_received_count'    => 1,
                    'deals_closed_count'      => 0,
                    'created_at'              => date('Y-m-d H:i:s'),
                    'updated_at'              => date('Y-m-d H:i:s'),
                ],
                [
                    'full_name'               => 'Red River Turnkey Fund',
                    'company_name'            => 'Red River Landlord Trust',
                    'email'                   => 'invest@redriverlandlords.com',
                    'phone'                   => '318-555-0144',
                    'buyer_type'              => 'landlord_fund',
                    'max_purchase_price'      => 160000.00,
                    'min_roi_pct'             => 10.00,
                    'target_zips'             => '71101,71103,71107,71108,71109',
                    'target_cities'           => 'Shreveport, Bossier City',
                    'proof_of_funds_verified' => 1,
                    'proof_of_funds_amount'   => 350000.00,
                    'status'                  => 'active',
                    'notes'                   => 'Buys 3+ bed single-family rentals for Section 8 and long-term lease. POF on file.',
                    'deals_received_count'    => 1,
                    'deals_closed_count'      => 0,
                    'created_at'              => date('Y-m-d H:i:s'),
                    'updated_at'              => date('Y-m-d H:i:s'),
                ],
                [
                    'full_name'               => 'Bayou Hospitality Partners',
                    'company_name'            => 'Bayou Vacation Rentals, LLC',
                    'email'                   => 'deals@bayouhospitality.com',
                    'phone'                   => '318-555-0178',
                    'buyer_type'              => 'str_operator',
                    'max_purchase_price'      => 225000.00,
                    'min_roi_pct'             => 12.00,
                    'target_zips'             => '71111,71101,71105',
                    'target_cities'           => 'Bossier City, Shreveport',
                    'proof_of_funds_verified' => 1,
                    'proof_of_funds_amount'   => 500000.00,
                    'status'                  => 'active',
                    'notes'                   => 'Short-term and mid-term rental operator near Barksdale AFB and casino district.',
                    'deals_received_count'    => 1,
                    'deals_closed_count'      => 0,
                    'created_at'              => date('Y-m-d H:i:s'),
                    'updated_at'              => date('Y-m-d H:i:s'),
                ],
                [
                    'full_name'               => 'Sunbelt SFR Institutional Desk',
                    'company_name'            => 'Sunbelt Single-Family Asset Management',
                    'email'                   => 'portfolio@sunbeltsfr.com',
                    'phone'                   => '214-555-0189',
                    'buyer_type'              => 'institutional',
                    'max_purchase_price'      => 300000.00,
                    'min_roi_pct'             => 9.50,
                    'target_zips'             => '71111,71112,71101,71105,71107',
                    'target_cities'           => 'Bossier City, Shreveport',
                    'proof_of_funds_verified' => 1,
                    'proof_of_funds_amount'   => 2000000.00,
                    'status'                  => 'active',
                    'notes'                   => 'Institutional cash desk for 1975+ clean-title SFR homes. Immediate escrow wire.',
                    'deals_received_count'    => 1,
                    'deals_closed_count'      => 0,
                    'created_at'              => date('Y-m-d H:i:s'),
                    'updated_at'              => date('Y-m-d H:i:s'),
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->tableExists(self::TABLE_NAME)) {
            $tableName = self::TABLE_NAME;
            if ($this->db->DBPrefix !== '' && str_starts_with($tableName, $this->db->DBPrefix)) {
                $tableName = substr($tableName, strlen($this->db->DBPrefix));
            }
            $this->forge->dropTable($tableName, true);
        }
    }
}
