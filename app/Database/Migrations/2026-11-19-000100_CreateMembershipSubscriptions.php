<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Auto-renewing memberships: one row per PayPal subscription a member
 * approved (MembershipSubscriptionService). Access itself still lives in
 * bf_users_subscriptions.
 *
 * Safe to run on prod by name: it only creates the table when it is missing.
 */
class CreateMembershipSubscriptions extends Migration
{
    private const TABLE = 'bf_membership_subscriptions';

    public function up()
    {
        if ($this->db->tableExists(self::TABLE)) {
            log_message('notice', 'CreateMembershipSubscriptions: ' . self::TABLE . ' already exists');

            return;
        }

        $this->forge->addField([
            'id'                       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'                  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'plan_slug'                => ['type' => 'VARCHAR', 'constraint' => 32],
            'provider'                 => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'paypal'],
            'provider_subscription_id' => ['type' => 'VARCHAR', 'constraint' => 64],
            'status'                   => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'active'],
            'last_paid_at'             => ['type' => 'DATETIME', 'null' => true],
            'created_at'               => ['type' => 'DATETIME', 'null' => true],
            'updated_at'               => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('provider_subscription_id', 'uq_membership_subscription_provider_id');
        $this->forge->addKey(['user_id', 'status']);
        $this->forge->createTable(self::TABLE, true);
        log_message('notice', 'CreateMembershipSubscriptions: created ' . self::TABLE);
    }

    public function down()
    {
        // Intentionally empty: rows tie members to live PayPal subscriptions.
    }
}
