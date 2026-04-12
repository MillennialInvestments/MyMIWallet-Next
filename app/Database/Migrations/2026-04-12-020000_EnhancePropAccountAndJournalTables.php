<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EnhancePropAccountAndJournalTables extends Migration
{
    public function up()
    {
        $accountFields = [
            'peak_balance' => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0, 'after' => 'current_balance'],
            'remaining_drawdown' => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0, 'after' => 'peak_balance'],
            'remaining_dll' => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0, 'after' => 'remaining_drawdown'],
        ];

        foreach ($accountFields as $name => $field) {
            if (! $this->db->fieldExists($name, 'bf_user_prop_accounts')) {
                $this->forge->addColumn('bf_user_prop_accounts', [$name => $field]);
            }
        }

        $journalFields = [
            'entry_reason' => ['type' => 'TEXT', 'null' => true, 'after' => 'entry_body'],
            'exit_reason' => ['type' => 'TEXT', 'null' => true, 'after' => 'entry_reason'],
            'mistake_tag' => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true, 'after' => 'emotion_tag'],
            'lessons_learned' => ['type' => 'TEXT', 'null' => true, 'after' => 'mistake_tag'],
            'review_score' => ['type' => 'INT', 'constraint' => 3, 'default' => 0, 'after' => 'lessons_learned'],
            'symbol' => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true, 'after' => 'review_score'],
            'replay_start_at' => ['type' => 'DATETIME', 'null' => true, 'after' => 'trade_date'],
            'replay_end_at' => ['type' => 'DATETIME', 'null' => true, 'after' => 'replay_start_at'],
        ];

        foreach ($journalFields as $name => $field) {
            if (! $this->db->fieldExists($name, 'bf_prop_trade_journal')) {
                $this->forge->addColumn('bf_prop_trade_journal', [$name => $field]);
            }
        }
    }

    public function down()
    {
        foreach (['peak_balance', 'remaining_drawdown', 'remaining_dll'] as $field) {
            if ($this->db->fieldExists($field, 'bf_user_prop_accounts')) {
                $this->forge->dropColumn('bf_user_prop_accounts', $field);
            }
        }

        foreach (['entry_reason', 'exit_reason', 'mistake_tag', 'lessons_learned', 'review_score', 'symbol', 'replay_start_at', 'replay_end_at'] as $field) {
            if ($this->db->fieldExists($field, 'bf_prop_trade_journal')) {
                $this->forge->dropColumn('bf_prop_trade_journal', $field);
            }
        }
    }
}
