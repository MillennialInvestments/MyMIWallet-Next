<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration 2026-11-27-000500: Tables for Prediction Markets Hub (Polymarket & Kalshi),
 * Gamified Social Competitions & Leaderboards, and Licensed Crypto On-Ramp Rev-Share.
 *
 * Strict Non-Custodial Invariant: Zero private key custody, client-side signing only.
 * No real wagers brokered or accepted by MyMI.
 */
class CreatePredictionsAndGamificationTables extends Migration
{
    public function up(): void
    {
        // 1. bf_sports_prediction_markets (Polymarket & Kalshi Market Aggregator)
        if (! $this->db->tableExists('bf_sports_prediction_markets')) {
            $this->forge->addField([
                'id'                  => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
                'provider'            => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'polymarket'],
                'external_id'         => ['type' => 'VARCHAR', 'constraint' => 128],
                'category'            => ['type' => 'VARCHAR', 'constraint' => 64],
                'title'               => ['type' => 'VARCHAR', 'constraint' => 255],
                'description'         => ['type' => 'TEXT', 'null' => true],
                'yes_price'           => ['type' => 'DECIMAL', 'constraint' => '5,4', 'default' => 0.5000],
                'no_price'            => ['type' => 'DECIMAL', 'constraint' => '5,4', 'default' => 0.5000],
                'volume_usd_24h'      => ['type' => 'DECIMAL', 'constraint' => '14,2', 'default' => 0.00],
                'total_liquidity_usd' => ['type' => 'DECIMAL', 'constraint' => '14,2', 'default' => 0.00],
                'resolution_date'     => ['type' => 'DATETIME', 'null' => true],
                'status'              => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'active'],
                'contract_address'    => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
                'chain'               => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'polygon'],
                'created_at'          => ['type' => 'DATETIME', 'null' => true],
                'updated_at'          => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey(['provider', 'external_id'], 'uq_pred_provider_ext');
            $this->forge->addKey('category');
            $this->forge->addKey('status');
            $this->forge->createTable('bf_sports_prediction_markets', true);
        }

        // 2. bf_sports_prediction_orders (Non-Custodial Client-Side Slips & Receipts)
        if (! $this->db->tableExists('bf_sports_prediction_orders')) {
            $this->forge->addField([
                'id'                => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
                'user_id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'market_id'         => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true],
                'outcome'           => ['type' => 'VARCHAR', 'constraint' => 8, 'default' => 'YES'],
                'shares_count'      => ['type' => 'DECIMAL', 'constraint' => '12,4', 'default' => 0.0000],
                'share_price'       => ['type' => 'DECIMAL', 'constraint' => '5,4', 'default' => 0.5000],
                'total_amount_usd'  => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0.00],
                'platform_fee_usd'  => ['type' => 'DECIMAL', 'constraint' => '8,4', 'default' => 0.0000],
                'tx_signature'      => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
                'wallet_address'    => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
                'status'            => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'pending'],
                'settled_payout'    => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0.00],
                'created_at'        => ['type' => 'DATETIME', 'null' => true],
                'updated_at'        => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('user_id');
            $this->forge->addKey(['user_id', 'status']);
            $this->forge->createTable('bf_sports_prediction_orders', true);
        }

        // 3. bf_sports_gamified_leaderboard (Social / UIGEA-Exempt Skill Competition)
        if (! $this->db->tableExists('bf_sports_gamified_leaderboard')) {
            $this->forge->addField([
                'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'user_id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'username'          => ['type' => 'VARCHAR', 'constraint' => 64],
                'avatar_badge'      => ['type' => 'VARCHAR', 'constraint' => 64, 'default' => 'rookie'],
                'tier_level'        => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 1],
                'season_year'       => ['type' => 'SMALLINT', 'constraint' => 4, 'unsigned' => true, 'default' => 2025],
                'virtual_bankroll'  => ['type' => 'DECIMAL', 'constraint' => '12,2', 'default' => 2500.00],
                'total_predictions' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'default' => 0],
                'won_predictions'   => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'default' => 0],
                'lost_predictions'  => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'default' => 0],
                'win_rate_pct'      => ['type' => 'DECIMAL', 'constraint' => '5,2', 'default' => 0.00],
                'net_roi_pct'       => ['type' => 'DECIMAL', 'constraint' => '7,2', 'default' => 0.00],
                'current_streak'    => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
                'best_streak'       => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
                'xp_points'         => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'default' => 0],
                'created_at'        => ['type' => 'DATETIME', 'null' => true],
                'updated_at'        => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey(['user_id', 'season_year'], 'uq_gamified_user_season');
            $this->forge->addKey('net_roi_pct');
            $this->forge->addKey('xp_points');
            $this->forge->createTable('bf_sports_gamified_leaderboard', true);
        }

        // 4. bf_sports_onramp_transactions (Licensed Crypto On-Ramp Rev-Share Tracking)
        if (! $this->db->tableExists('bf_sports_onramp_transactions')) {
            $this->forge->addField([
                'id'                  => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
                'user_id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'provider'            => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'moonpay'],
                'external_tx_id'      => ['type' => 'VARCHAR', 'constraint' => 128],
                'fiat_amount'         => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0.00],
                'fiat_currency'       => ['type' => 'VARCHAR', 'constraint' => 8, 'default' => 'USD'],
                'crypto_asset'        => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'USDC'],
                'crypto_amount'       => ['type' => 'DECIMAL', 'constraint' => '16,8', 'default' => 0.00000000],
                'destination_wallet'  => ['type' => 'VARCHAR', 'constraint' => 128],
                'platform_fee_earned' => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0.00],
                'status'              => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'pending'],
                'sanctions_cleared'   => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
                'created_at'          => ['type' => 'DATETIME', 'null' => true],
                'updated_at'          => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey(['provider', 'external_tx_id'], 'uq_onramp_provider_ext');
            $this->forge->addKey('user_id');
            $this->forge->createTable('bf_sports_onramp_transactions', true);
        }
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_sports_onramp_transactions', true);
        $this->forge->dropTable('bf_sports_gamified_leaderboard', true);
        $this->forge->dropTable('bf_sports_prediction_orders', true);
        $this->forge->dropTable('bf_sports_prediction_markets', true);
    }
}
