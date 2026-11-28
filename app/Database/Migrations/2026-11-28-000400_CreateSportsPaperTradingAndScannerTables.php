<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration 2026-11-28-000400: Tables and columns for:
 * 1. Prediction Markets Paper Trading (is_paper_trade, paper_balance_credits).
 * 2. Automated +EV & Correlated SGP Scanner Cache (bf_sports_ev_scans).
 *
 * Hard Invariants:
 * - Analytical and educational only (no real house gaming).
 * - Full defensive checks (getFieldData, tableExists).
 * - Reversible down() drop and column removal.
 */
class CreateSportsPaperTradingAndScannerTables extends Migration
{
    public function up(): void
    {
        // 1. Add is_paper_trade to bf_sports_prediction_orders
        if ($this->db->tableExists('bf_sports_prediction_orders', false)) {
            $orderFields = array_map(
                static fn ($f) => is_object($f) ? $f->name : $f['name'],
                $this->db->getFieldData('bf_sports_prediction_orders')
            );

            $newOrderCols = [];
            if (! in_array('is_paper_trade', $orderFields, true)) {
                $newOrderCols['is_paper_trade'] = [
                    'type'       => 'TINYINT',
                    'constraint' => 1,
                    'default'    => 0,
                    'after'      => 'wallet_address',
                ];
            }

            if ($newOrderCols !== []) {
                $this->forge->addColumn('bf_sports_prediction_orders', $newOrderCols);
            }
        }

        // 2. Add paper_balance_credits to bf_sports_user_settings
        if ($this->db->tableExists('bf_sports_user_settings', false)) {
            $settingsFields = array_map(
                static fn ($f) => is_object($f) ? $f->name : $f['name'],
                $this->db->getFieldData('bf_sports_user_settings')
            );

            $newSettingsCols = [];
            if (! in_array('paper_balance_credits', $settingsFields, true)) {
                $newSettingsCols['paper_balance_credits'] = [
                    'type'       => 'DECIMAL',
                    'constraint' => '12,2',
                    'default'    => 1000.00,
                    'after'      => 'quant_venue_weight',
                ];
            }

            if ($newSettingsCols !== []) {
                $this->forge->addColumn('bf_sports_user_settings', $newSettingsCols);
            }
        }

        // 3. bf_sports_ev_scans: Cache of detected +EV correlated SGP & arbitrage edges
        if (! $this->db->tableExists('bf_sports_ev_scans', false)) {
            $this->forge->addField([
                'id'            => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
                'scan_type'     => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'sgp'],
                'sport'         => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'MLB'],
                'title'         => ['type' => 'VARCHAR', 'constraint' => 255],
                'legs_json'     => ['type' => 'TEXT', 'null' => true],
                'fair_odds'     => ['type' => 'INT', 'constraint' => 11, 'default' => 100],
                'offered_odds'  => ['type' => 'INT', 'constraint' => 11, 'default' => 120],
                'ev_pct'        => ['type' => 'DECIMAL', 'constraint' => '6,2', 'default' => 0.00],
                'star_rating'   => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 1],
                'sportsbook'    => ['type' => 'VARCHAR', 'constraint' => 64, 'default' => 'DraftKings'],
                'metadata_json' => ['type' => 'TEXT', 'null' => true],
                'expires_at'    => ['type' => 'DATETIME', 'null' => true],
                'created_at'    => ['type' => 'DATETIME', 'null' => true],
                'updated_at'    => ['type' => 'DATETIME', 'null' => true],
            ]);

            $this->forge->addKey('id', true);
            $this->forge->addKey(['scan_type', 'sport']);
            $this->forge->addKey('ev_pct');
            $this->forge->createTable('bf_sports_ev_scans', true);
        }
    }

    public function down(): void
    {
        if ($this->db->tableExists('bf_sports_ev_scans', false)) {
            $this->forge->dropTable('bf_sports_ev_scans', true);
        }

        if ($this->db->tableExists('bf_sports_user_settings', false)) {
            $settingsFields = array_map(
                static fn ($f) => is_object($f) ? $f->name : $f['name'],
                $this->db->getFieldData('bf_sports_user_settings')
            );
            if (in_array('paper_balance_credits', $settingsFields, true)) {
                $this->forge->dropColumn('bf_sports_user_settings', 'paper_balance_credits');
            }
        }

        if ($this->db->tableExists('bf_sports_prediction_orders', false)) {
            $orderFields = array_map(
                static fn ($f) => is_object($f) ? $f->name : $f['name'],
                $this->db->getFieldData('bf_sports_prediction_orders')
            );
            if (in_array('is_paper_trade', $orderFields, true)) {
                $this->forge->dropColumn('bf_sports_prediction_orders', 'is_paper_trade');
            }
        }
    }
}
