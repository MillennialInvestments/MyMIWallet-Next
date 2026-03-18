<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HardenPremiumSchema extends Migration
{
    public function up()
    {
        $this->hardenUsersTable();
        $this->hardenSubscriptionsTable();
    }

    public function down()
    {
        if ($this->db->tableExists('users')) {
            $this->dropIndexIfExists('users', 'idx_users_source_channel');
            $this->dropIndexIfExists('users', 'idx_users_campaign_code');

            $columns = array_filter(['source_channel', 'campaign_code'], fn (string $column): bool => $this->db->fieldExists($column, 'users'));
            if ($columns !== []) {
                $this->forge->dropColumn('users', $columns);
            }
        }

        if ($this->db->tableExists('bf_users_subscriptions')) {
            foreach ([
                'idx_subscriptions_user_id',
                'idx_subscriptions_membership_status',
                'idx_subscriptions_expires_at',
                'idx_subscriptions_trial_ends_at',
                'idx_subscriptions_user_status',
            ] as $index) {
                $this->dropIndexIfExists('bf_users_subscriptions', $index);
            }

            $columns = array_filter([
                'membership_tier',
                'membership_status',
                'expires_at',
                'trial_ends_at',
                'source_channel',
                'campaign_code',
            ], fn (string $column): bool => $this->db->fieldExists($column, 'bf_users_subscriptions'));

            if ($columns !== []) {
                $this->forge->dropColumn('bf_users_subscriptions', $columns);
            }
        }
    }

    private function hardenUsersTable(): void
    {
        if (! $this->db->tableExists('users')) {
            return;
        }

        $fields = [];

        if (! $this->db->fieldExists('source_channel', 'users')) {
            $fields['source_channel'] = [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => false,
                'default' => 'direct',
            ];
        }

        if (! $this->db->fieldExists('campaign_code', 'users')) {
            $fields['campaign_code'] = [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ];
        }

        if ($fields !== []) {
            $this->forge->addColumn('users', $fields);
        }

        $this->db->query("UPDATE `users` SET `source_channel` = 'direct' WHERE `source_channel` IS NULL OR TRIM(`source_channel`) = ''");

        $this->addIndexIfMissing('users', 'idx_users_source_channel', ['source_channel']);
        $this->addIndexIfMissing('users', 'idx_users_campaign_code', ['campaign_code']);
    }

    private function hardenSubscriptionsTable(): void
    {
        if (! $this->db->tableExists('bf_users_subscriptions')) {
            return;
        }

        $fields = [];

        if (! $this->db->fieldExists('membership_tier', 'bf_users_subscriptions')) {
            $fields['membership_tier'] = [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'null' => false,
                'default' => 'free',
            ];
        }

        if (! $this->db->fieldExists('membership_status', 'bf_users_subscriptions')) {
            $fields['membership_status'] = [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'null' => false,
                'default' => 'free',
            ];
        }

        if (! $this->db->fieldExists('expires_at', 'bf_users_subscriptions')) {
            $fields['expires_at'] = [
                'type' => 'DATETIME',
                'null' => true,
            ];
        }

        if (! $this->db->fieldExists('trial_ends_at', 'bf_users_subscriptions')) {
            $fields['trial_ends_at'] = [
                'type' => 'DATETIME',
                'null' => true,
            ];
        }

        if (! $this->db->fieldExists('source_channel', 'bf_users_subscriptions')) {
            $fields['source_channel'] = [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => false,
                'default' => 'direct',
            ];
        }

        if (! $this->db->fieldExists('campaign_code', 'bf_users_subscriptions')) {
            $fields['campaign_code'] = [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ];
        }

        if ($fields !== []) {
            $this->forge->addColumn('bf_users_subscriptions', $fields);
        }

        if ($this->db->fieldExists('tier', 'bf_users_subscriptions')) {
            $this->db->query("UPDATE `bf_users_subscriptions`
                SET `membership_tier` = CASE
                    WHEN LOWER(TRIM(COALESCE(`tier`, ''))) IN ('tier 3', 'tier3', 'premium', 'gold') THEN 'tier3'
                    WHEN LOWER(TRIM(COALESCE(`tier`, ''))) IN ('tier 2', 'tier2', 'pro') THEN 'tier2'
                    WHEN LOWER(TRIM(COALESCE(`tier`, ''))) IN ('tier 1', 'tier1', 'basic', 'starter') THEN 'tier1'
                    WHEN LOWER(TRIM(COALESCE(`tier`, ''))) = 'trial' THEN 'trial'
                    ELSE 'free'
                END
                WHERE `membership_tier` IS NULL OR TRIM(`membership_tier`) = ''");
        }

        $hasActive = $this->db->fieldExists('active', 'bf_users_subscriptions');
        $hasExpires = $this->db->fieldExists('expires_at', 'bf_users_subscriptions');
        $hasTrialEnds = $this->db->fieldExists('trial_ends_at', 'bf_users_subscriptions');

        $this->db->query("UPDATE `bf_users_subscriptions` SET `source_channel` = 'direct' WHERE `source_channel` IS NULL OR TRIM(`source_channel`) = ''");
        $this->db->query("UPDATE `bf_users_subscriptions` SET `membership_tier` = 'free' WHERE `membership_tier` IS NULL OR TRIM(`membership_tier`) = ''");

        if ($hasActive) {
            $this->db->query("UPDATE `bf_users_subscriptions`
                SET `membership_status` = CASE
                    WHEN LOWER(TRIM(COALESCE(`membership_tier`, 'free'))) = 'trial' THEN 'trial'
                    WHEN `active` = 1 THEN 'active'
                    ELSE 'inactive'
                END
                WHERE `membership_status` IS NULL OR TRIM(`membership_status`) = '' OR `membership_status` = 'free'");
        }

        if ($hasExpires) {
            $this->db->query("UPDATE `bf_users_subscriptions`
                SET `membership_status` = 'expired'
                WHERE `expires_at` IS NOT NULL AND `expires_at` < NOW() AND `membership_status` IN ('active', 'trial')");
        }

        if ($hasTrialEnds) {
            $this->db->query("UPDATE `bf_users_subscriptions`
                SET `membership_status` = 'expired'
                WHERE `trial_ends_at` IS NOT NULL AND `trial_ends_at` < NOW() AND `membership_status` = 'trial'");
        }

        if ($hasActive && ($hasExpires || $hasTrialEnds)) {
            $this->db->query("UPDATE `bf_users_subscriptions`
                SET `active` = 0
                WHERE `membership_status` IN ('expired', 'inactive', 'canceled', 'cancelled', 'unpaid')");
        }

        $this->addIndexIfMissing('bf_users_subscriptions', 'idx_subscriptions_user_id', ['user_id']);
        $this->addIndexIfMissing('bf_users_subscriptions', 'idx_subscriptions_membership_status', ['membership_status']);
        $this->addIndexIfMissing('bf_users_subscriptions', 'idx_subscriptions_expires_at', ['expires_at']);
        $this->addIndexIfMissing('bf_users_subscriptions', 'idx_subscriptions_trial_ends_at', ['trial_ends_at']);
        $this->addIndexIfMissing('bf_users_subscriptions', 'idx_subscriptions_user_status', ['user_id', 'membership_status']);
    }

    private function addIndexIfMissing(string $table, string $indexName, array $columns): void
    {
        if ($this->indexExists($table, $indexName)) {
            return;
        }

        $existingColumns = array_values(array_filter($columns, fn (string $column): bool => $this->db->fieldExists($column, $table)));
        if ($existingColumns === []) {
            return;
        }

        $columnList = implode(', ', array_map(static fn (string $column): string => "`{$column}`", $existingColumns));
        $this->db->query("CREATE INDEX `{$indexName}` ON `{$table}` ({$columnList})");
    }

    private function dropIndexIfExists(string $table, string $indexName): void
    {
        if (! $this->indexExists($table, $indexName)) {
            return;
        }

        $this->db->query("DROP INDEX `{$indexName}` ON `{$table}`");
    }

    private function indexExists(string $table, string $indexName): bool
    {
        $result = $this->db->query("SHOW INDEX FROM `{$table}` WHERE Key_name = ?", [$indexName]);
        return ! empty($result->getResultArray());
    }
}
