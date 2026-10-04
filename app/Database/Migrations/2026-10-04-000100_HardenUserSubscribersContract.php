<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

final class HardenUserSubscribersContract extends Migration
{
    private const TABLE = 'bf_users_subscribers';

    public function up(): void
    {
        if (! $this->db->tableExists(self::TABLE)) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => 45,
                    'null' => true,
                ],
                'referral' => [
                    'type' => 'VARCHAR',
                    'constraint' => 45,
                    'null' => true,
                ],
                'category' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => true,
                ],
                'subject' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => true,
                ],
                'topic' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => true,
                ],
                'beta' => [
                    'type' => 'TINYINT',
                    'constraint' => 1,
                    'default' => 0,
                    'null' => true,
                ],
                'date' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
                'hostTime' => [
                    'type' => 'VARCHAR',
                    'constraint' => 45,
                    'null' => true,
                ],
                'time' => [
                    'type' => 'VARCHAR',
                    'constraint' => 45,
                    'null' => true,
                ],
                'user_id' => [
                    'type' => 'INT',
                    'null' => true,
                ],
                'user_ip' => [
                    'type' => 'VARCHAR',
                    'constraint' => 45,
                    'null' => true,
                ],
                'initial_sent' => [
                    'type' => 'INT',
                    'default' => 0,
                    'null' => true,
                ],
                'status' => [
                    'type' => 'VARCHAR',
                    'constraint' => 50,
                    'default' => 'active',
                    'null' => true,
                ],
                'delivery_error' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'updated_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
                'unsubscribe_token' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => true,
                ],
                'unsubscribed_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
            ]);

            $this->forge->addKey('id', true);
            $this->forge->createTable(self::TABLE, true);
        } else {
            $missing = [
                'user_id' => [
                    'type' => 'INT',
                    'null' => true,
                ],
                'status' => [
                    'type' => 'VARCHAR',
                    'constraint' => 50,
                    'default' => 'active',
                    'null' => true,
                ],
                'delivery_error' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'updated_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
                'unsubscribe_token' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => true,
                ],
                'unsubscribed_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
            ];

            foreach ($missing as $field => $definition) {
                if (! $this->db->fieldExists($field, self::TABLE)) {
                    $this->forge->addColumn(
                        self::TABLE,
                        [$field => $definition]
                    );
                }
            }
        }

        $this->ensureIndex(
            'idx_bf_users_subscribers_email',
            ['email']
        );
        $this->ensureIndex(
            'idx_bf_users_subscribers_unsubscribe_token',
            ['unsubscribe_token']
        );
        $this->ensureIndex(
            'idx_bf_users_subscribers_status_updated_at',
            ['status', 'updated_at']
        );
    }

    public function down(): void
    {
        // Forward-only: existing subscriber identity and lifecycle data is preserved.
    }

    /**
     * @param list<string> $columns
     */
    private function ensureIndex(
        string $name,
        array $columns
    ): void {
        $existing = [];

        foreach ($this->db->getIndexData(self::TABLE) as $index) {
            $indexName = is_object($index)
                ? (string) ($index->name ?? '')
                : (string) ($index['name'] ?? $index['Key_name'] ?? '');

            if ($indexName !== '') {
                $existing[] = strtolower($indexName);
            }
        }

        if (in_array(strtolower($name), $existing, true)) {
            return;
        }

        $quotedColumns = array_map(
            static fn (string $column): string => chr(96) . $column . chr(96),
            $columns
        );

        $quote = chr(96);
        $this->db->query(
            'CREATE INDEX ' . $quote . $name . $quote . ' ON '
            . $quote . self::TABLE . $quote
            . ' (' . implode(', ', $quotedColumns) . ')'
        );
    }
}
