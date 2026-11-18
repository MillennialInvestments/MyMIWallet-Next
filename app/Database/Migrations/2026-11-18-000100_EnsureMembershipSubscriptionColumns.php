<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Paid membership checkout writes access to bf_users_subscriptions
 * (MembershipFulfillmentService) and PremiumEntitlementService reads it.
 *
 * Safe to run on prod with scripts/ops/db/run-migrations.php: it only adds
 * what is missing (the table, or the membership_tier / membership_status /
 * expires_at columns) and never changes or removes existing data.
 */
class EnsureMembershipSubscriptionColumns extends Migration
{
    private const TABLE = 'bf_users_subscriptions';

    public function up()
    {
        if (! $this->db->tableExists(self::TABLE)) {
            $this->forge->addField([
                'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'user_id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'active'            => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'subscription_name' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
                'membership_tier'   => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'free'],
                'membership_status' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'free'],
                'expires_at'        => ['type' => 'DATETIME', 'null' => true],
                'source_channel'    => ['type' => 'VARCHAR', 'constraint' => 64, 'default' => 'direct'],
                'created_on'        => ['type' => 'DATETIME', 'null' => true],
                'updated_on'        => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('user_id');
            $this->forge->createTable(self::TABLE, true);
            log_message('notice', 'EnsureMembershipSubscriptionColumns: created ' . self::TABLE);

            return;
        }

        $add = [];
        if (! $this->db->fieldExists('membership_tier', self::TABLE)) {
            $add['membership_tier'] = ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'free'];
        }
        if (! $this->db->fieldExists('membership_status', self::TABLE)) {
            $add['membership_status'] = ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'free'];
        }
        if (! $this->db->fieldExists('expires_at', self::TABLE)) {
            $add['expires_at'] = ['type' => 'DATETIME', 'null' => true];
        }
        if ($add !== []) {
            $this->forge->addColumn(self::TABLE, $add);
        }
        log_message('notice', 'EnsureMembershipSubscriptionColumns: added ' . ($add === [] ? 'nothing (already complete)' : implode(', ', array_keys($add))));
    }

    public function down()
    {
        // Intentionally empty: these columns may hold paid access records.
    }
}
