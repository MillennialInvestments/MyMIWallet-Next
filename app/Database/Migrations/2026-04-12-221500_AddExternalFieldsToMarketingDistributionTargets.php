<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddExternalFieldsToMarketingDistributionTargets extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_marketing_distribution_targets')) {
            return;
        }

        if (! $this->db->fieldExists('external_id', 'bf_marketing_distribution_targets')) {
            $this->forge->addColumn('bf_marketing_distribution_targets', [
                'external_id' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'response_json'],
            ]);
        }

        if (! $this->db->fieldExists('external_uri', 'bf_marketing_distribution_targets')) {
            $this->forge->addColumn('bf_marketing_distribution_targets', [
                'external_uri' => ['type' => 'VARCHAR', 'constraint' => 512, 'null' => true, 'after' => 'external_id'],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_marketing_distribution_targets') && $this->db->fieldExists('external_uri', 'bf_marketing_distribution_targets')) {
            $this->forge->dropColumn('bf_marketing_distribution_targets', 'external_uri');
        }

        if ($this->db->tableExists('bf_marketing_distribution_targets') && $this->db->fieldExists('external_id', 'bf_marketing_distribution_targets')) {
            $this->forge->dropColumn('bf_marketing_distribution_targets', 'external_id');
        }
    }
}
