<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAnalysisReportToTradeAlerts extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_investment_trade_alerts')) {
            return;
        }

        $existing = array_map(
            static fn($field) => strtolower((string) ($field->name ?? '')),
            $this->db->getFieldData('bf_investment_trade_alerts')
        );

        $columns = [];

        if (! in_array('analysis_report_json', $existing, true)) {
            $columns['analysis_report_json'] = [
                'type' => 'LONGTEXT',
                'null' => true,
                'after' => 'volume',
            ];
        }

        if (! in_array('analysis_report_text', $existing, true)) {
            $columns['analysis_report_text'] = [
                'type' => 'LONGTEXT',
                'null' => true,
                'after' => 'analysis_report_json',
            ];
        }

        if (! in_array('analysis_reported_at', $existing, true)) {
            $columns['analysis_reported_at'] = [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'analysis_report_text',
            ];
        }

        if (! in_array('analysis_source', $existing, true)) {
            $columns['analysis_source'] = [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'analysis_reported_at',
            ];
        }

        if ($columns !== []) {
            $this->forge->addColumn('bf_investment_trade_alerts', $columns);
        }
    }

    public function down()
    {
        if (! $this->db->tableExists('bf_investment_trade_alerts')) {
            return;
        }

        $existing = array_map(
            static fn($field) => strtolower((string) ($field->name ?? '')),
            $this->db->getFieldData('bf_investment_trade_alerts')
        );

        $drop = array_values(array_filter([
            in_array('analysis_report_json', $existing, true) ? 'analysis_report_json' : null,
            in_array('analysis_report_text', $existing, true) ? 'analysis_report_text' : null,
            in_array('analysis_reported_at', $existing, true) ? 'analysis_reported_at' : null,
            in_array('analysis_source', $existing, true) ? 'analysis_source' : null,
        ]));

        if ($drop !== []) {
            $this->forge->dropColumn('bf_investment_trade_alerts', $drop);
        }
    }
}

