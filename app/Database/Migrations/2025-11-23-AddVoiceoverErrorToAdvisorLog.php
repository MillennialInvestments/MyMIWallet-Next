<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddVoiceoverErrorToAdvisorLog extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('bf_investment_advisor_log')) {
            return;
        }

        $fields = $this->db->getFieldNames('bf_investment_advisor_log');
        if (in_array('voiceover_error', $fields, true)) {
            return;
        }

        $this->forge->addColumn('bf_investment_advisor_log', [
            'voiceover_error' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'voiceover_url',
            ],
        ]);
    }

    public function down()
    {
        if (!$this->db->tableExists('bf_investment_advisor_log')) {
            return;
        }

        $fields = $this->db->getFieldNames('bf_investment_advisor_log');
        if (!in_array('voiceover_error', $fields, true)) {
            return;
        }

        $this->forge->dropColumn('bf_investment_advisor_log', 'voiceover_error');
    }
}
