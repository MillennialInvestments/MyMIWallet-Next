<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * GT-FORM-ROUTES-001: tables behind forms that had nowhere to save.
 *
 * - bf_user_preferences: one JSON row per user and scope (budget settings,
 *   retirement goals, liked economic data series).
 * - bf_discord_ai_notes: assistant notes; the model existed but no migration did.
 * - bf_project_comments: project discussion comments.
 * - bf_project_sale_requests: requests to sell a project position, for admin review.
 * - bf_payment_claims: PayPal orders reported by the browser, stored with the
 *   server-side verification result before anything is credited.
 *
 * Every table is created only when it is missing. Run with
 * scripts/ops/db/run-migrations.php, never plain spark migrate in production.
 */
class CreateFormFeatureTables extends Migration
{
    public function up()
    {
        $ts = ['type' => 'DATETIME', 'null' => true];

        if (! $this->db->tableExists('bf_user_preferences')) {
            $this->forge->addField([
                'id'         => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'user_id'    => ['type' => 'BIGINT', 'unsigned' => true],
                'scope'      => ['type' => 'VARCHAR', 'constraint' => 64],
                'data'       => ['type' => 'MEDIUMTEXT', 'null' => true],
                'created_at' => $ts,
                'updated_at' => $ts,
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey(['user_id', 'scope']);
            $this->forge->createTable('bf_user_preferences');
        }

        if (! $this->db->tableExists('bf_discord_ai_notes')) {
            $this->forge->addField([
                'id'              => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'user_id'         => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
                'discord_user_id' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
                'title'           => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'note_type'       => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
                'content'         => ['type' => 'MEDIUMTEXT', 'null' => true],
                'tags'            => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'encrypted'       => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'created_at'      => $ts,
                'updated_at'      => $ts,
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('user_id');
            $this->forge->addKey('discord_user_id');
            $this->forge->createTable('bf_discord_ai_notes');
        }

        if (! $this->db->tableExists('bf_project_comments')) {
            $this->forge->addField([
                'id'         => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'project_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'user_id'    => ['type' => 'BIGINT', 'unsigned' => true],
                'topic'      => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
                'message'    => ['type' => 'TEXT'],
                'status'     => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'visible'],
                'created_at' => $ts,
                'updated_at' => $ts,
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey(['project_id', 'status']);
            $this->forge->createTable('bf_project_comments');
        }

        if (! $this->db->tableExists('bf_project_sale_requests')) {
            $this->forge->addField([
                'id'           => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'project_id'   => ['type' => 'BIGINT', 'unsigned' => true],
                'user_id'      => ['type' => 'BIGINT', 'unsigned' => true],
                'amount'       => ['type' => 'DECIMAL', 'constraint' => '18,2'],
                'requested_on' => ['type' => 'DATE', 'null' => true],
                'remarks'      => ['type' => 'VARCHAR', 'constraint' => 1000, 'null' => true],
                'status'       => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'pending'],
                'created_at'   => $ts,
                'updated_at'   => $ts,
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey(['project_id', 'status']);
            $this->forge->addKey('user_id');
            $this->forge->createTable('bf_project_sale_requests');
        }

        if (! $this->db->tableExists('bf_payment_claims')) {
            $this->forge->addField([
                'id'              => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'user_id'         => ['type' => 'BIGINT', 'unsigned' => true],
                'kind'            => ['type' => 'VARCHAR', 'constraint' => 32],
                'provider'        => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'paypal'],
                'provider_txn_id' => ['type' => 'VARCHAR', 'constraint' => 64],
                'claimed_amount'  => ['type' => 'DECIMAL', 'constraint' => '18,2', 'null' => true],
                'verified_amount' => ['type' => 'DECIMAL', 'constraint' => '18,2', 'null' => true],
                'currency'        => ['type' => 'VARCHAR', 'constraint' => 8, 'default' => 'USD'],
                'status'          => ['type' => 'VARCHAR', 'constraint' => 24, 'default' => 'pending'],
                'detail'          => ['type' => 'TEXT', 'null' => true],
                'created_at'      => $ts,
                'updated_at'      => $ts,
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey(['provider', 'provider_txn_id']);
            $this->forge->addKey(['user_id', 'kind']);
            $this->forge->createTable('bf_payment_claims');
        }
    }

    public function down()
    {
        foreach (['bf_payment_claims', 'bf_project_sale_requests', 'bf_project_comments', 'bf_user_preferences'] as $t) {
            $this->forge->dropTable($t, true);
        }
        // bf_discord_ai_notes may predate this migration; it is left in place.
    }
}
