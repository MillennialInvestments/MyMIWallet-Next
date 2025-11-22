<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMarketingFieldsToTradeAlerts extends Migration
{
    public function up()
    {
        $fields = [
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'category',
            ],
            'summary' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'title',
            ],
            'keywords' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'summary',
            ],
            'last_marketed_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'last_updated_time',
            ],
            'marketing_status' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
                'null'       => true,
                'default'    => 'pending',
                'after'      => 'last_marketed_at',
            ],
            'distribution_channels' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'marketing_status',
            ],
        ];

        // Forward-only migration: ignore failures if columns already exist.
        foreach ($fields as $column => $definition) {
            try {
                $this->forge->addColumn('bf_investment_trade_alerts', [$column => $definition]);
            } catch (\Throwable $e) {
                log_message('debug', 'Migration add_marketing_fields_to_trade_alerts skipped column {column}: {error}', [
                    'column' => $column,
                    'error'  => $e->getMessage(),
                ]);
            }
        }
    }

    public function down()
    {
        // Forward-only for safety in production environments.
    }
}
