<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddScannerSourceToTradeAlerts extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_investment_trade_alerts')) {
            return;
        }

        $fields = $this->db->getFieldData('bf_investment_trade_alerts');
        $hasSource = false;
        foreach ($fields as $field) {
            if (($field->name ?? '') === 'source') {
                $hasSource = true;
                break;
            }
        }

        if (! $hasSource) {
            $this->forge->addColumn('bf_investment_trade_alerts', [
                'source' => [
                    'type' => 'ENUM',
                    'constraint' => ['email', 'manual', 'scanner'],
                    'default' => 'scanner',
                    'after' => 'notification_sent',
                ],
            ]);
        }

        $this->db->query("UPDATE bf_investment_trade_alerts SET source = 'scanner' WHERE source IS NULL OR source = ''");

        try {
            $this->db->query('ALTER TABLE bf_investment_trade_alerts ADD UNIQUE KEY uniq_ticker_status_source (ticker, status, source)');
        } catch (\Throwable $e) {
            // already exists on some environments
        }
    }

    public function down()
    {
        if (! $this->db->tableExists('bf_investment_trade_alerts')) {
            return;
        }

        try {
            $this->db->query('ALTER TABLE bf_investment_trade_alerts DROP INDEX uniq_ticker_status_source');
        } catch (\Throwable $e) {
        }
    }
}
