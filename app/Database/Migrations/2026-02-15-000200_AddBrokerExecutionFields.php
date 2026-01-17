<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBrokerExecutionFields extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('bf_investment_scraper')) {
            $fields = [];

            if (! $this->db->fieldExists('source', 'bf_investment_scraper')) {
                $fields['source'] = [
                    'type'       => 'VARCHAR',
                    'constraint' => 32,
                    'null'       => true,
                    'default'    => null,
                ];
            }

            if (! $this->db->fieldExists('account_type', 'bf_investment_scraper')) {
                $fields['account_type'] = [
                    'type'       => 'VARCHAR',
                    'constraint' => 16,
                    'null'       => true,
                    'default'    => null,
                ];
            }

            if (! $this->db->fieldExists('message_hash', 'bf_investment_scraper')) {
                $fields['message_hash'] = [
                    'type'       => 'CHAR',
                    'constraint' => 64,
                    'null'       => true,
                    'default'    => null,
                ];
            }

            if ($fields !== []) {
                $this->forge->addColumn('bf_investment_scraper', $fields);
            }

            $this->addIndexIfMissing('bf_investment_scraper', 'idx_scraper_source_hash', ['source', 'message_hash']);
        }

        if ($this->db->tableExists('bf_investment_trade_alerts')) {
            $fields = [];

            if (! $this->db->fieldExists('source', 'bf_investment_trade_alerts')) {
                $fields['source'] = [
                    'type'       => 'VARCHAR',
                    'constraint' => 32,
                    'null'       => true,
                    'default'    => null,
                ];
            }

            if (! $this->db->fieldExists('account_type', 'bf_investment_trade_alerts')) {
                $fields['account_type'] = [
                    'type'       => 'VARCHAR',
                    'constraint' => 16,
                    'null'       => true,
                    'default'    => null,
                ];
            }

            if (! $this->db->fieldExists('broker_order_id', 'bf_investment_trade_alerts')) {
                $fields['broker_order_id'] = [
                    'type'       => 'VARCHAR',
                    'constraint' => 64,
                    'null'       => true,
                    'default'    => null,
                ];
            }

            if (! $this->db->fieldExists('execution_id', 'bf_investment_trade_alerts')) {
                $fields['execution_id'] = [
                    'type'       => 'CHAR',
                    'constraint' => 64,
                    'null'       => true,
                    'default'    => null,
                ];
            }

            if (! $this->db->fieldExists('filled_qty', 'bf_investment_trade_alerts')) {
                $fields['filled_qty'] = [
                    'type'       => 'DECIMAL',
                    'constraint' => '18,8',
                    'null'       => true,
                    'default'    => null,
                ];
            }

            if (! $this->db->fieldExists('filled_price', 'bf_investment_trade_alerts')) {
                $fields['filled_price'] = [
                    'type'       => 'DECIMAL',
                    'constraint' => '18,8',
                    'null'       => true,
                    'default'    => null,
                ];
            }

            if (! $this->db->fieldExists('filled_at', 'bf_investment_trade_alerts')) {
                $fields['filled_at'] = [
                    'type' => 'DATETIME',
                    'null' => true,
                ];
            }

            if (! $this->db->fieldExists('side', 'bf_investment_trade_alerts')) {
                $fields['side'] = [
                    'type'       => 'ENUM',
                    'constraint' => ['BUY', 'SELL'],
                    'null'       => true,
                    'default'    => null,
                ];
            }

            if (! $this->db->fieldExists('notified_discord', 'bf_investment_trade_alerts')) {
                $fields['notified_discord'] = [
                    'type'       => 'TINYINT',
                    'constraint' => 1,
                    'null'       => false,
                    'default'    => 0,
                ];
            }

            if ($fields !== []) {
                $this->forge->addColumn('bf_investment_trade_alerts', $fields);
            }

            $this->addIndexIfMissing('bf_investment_trade_alerts', 'idx_trade_alerts_execution_id', ['execution_id'], true);
            $this->addIndexIfMissing('bf_investment_trade_alerts', 'idx_trade_alerts_notified_discord', ['notified_discord']);
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_investment_trade_alerts')) {
            $this->dropIndexIfExists('bf_investment_trade_alerts', 'idx_trade_alerts_execution_id');
            $this->dropIndexIfExists('bf_investment_trade_alerts', 'idx_trade_alerts_notified_discord');

            $columns = [
                'source',
                'account_type',
                'broker_order_id',
                'execution_id',
                'filled_qty',
                'filled_price',
                'filled_at',
                'side',
                'notified_discord',
            ];
            $existing = array_filter($columns, fn ($column) => $this->db->fieldExists($column, 'bf_investment_trade_alerts'));
            if ($existing) {
                $this->forge->dropColumn('bf_investment_trade_alerts', $existing);
            }
        }

        if ($this->db->tableExists('bf_investment_scraper')) {
            $this->dropIndexIfExists('bf_investment_scraper', 'idx_scraper_source_hash');

            $columns = ['source', 'account_type', 'message_hash'];
            $existing = array_filter($columns, fn ($column) => $this->db->fieldExists($column, 'bf_investment_scraper'));
            if ($existing) {
                $this->forge->dropColumn('bf_investment_scraper', $existing);
            }
        }
    }

    private function addIndexIfMissing(string $table, string $indexName, array $columns, bool $unique = false): void
    {
        $exists = $this->indexExists($table, $indexName);
        if ($exists) {
            return;
        }

        $columnList = implode(', ', array_map(static fn (string $column): string => "`{$column}`", $columns));
        $type = $unique ? 'UNIQUE INDEX' : 'INDEX';
        $this->db->query("CREATE {$type} `{$indexName}` ON `{$table}` ({$columnList})");
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
