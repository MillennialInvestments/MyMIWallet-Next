<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRegistrationAttributionColumnsToUsers extends Migration
{
    public function up(): void
    {
        $fields = [];

        if (! $this->db->fieldExists('source_slug', 'users')) {
            $fields['source_slug'] = ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true, 'after' => 'source_channel'];
        }
        if (! $this->db->fieldExists('utm_source', 'users')) {
            $fields['utm_source'] = ['type' => 'VARCHAR', 'constraint' => 120, 'null' => true, 'after' => 'campaign_code'];
        }
        if (! $this->db->fieldExists('utm_medium', 'users')) {
            $fields['utm_medium'] = ['type' => 'VARCHAR', 'constraint' => 120, 'null' => true, 'after' => 'utm_source'];
        }
        if (! $this->db->fieldExists('utm_campaign', 'users')) {
            $fields['utm_campaign'] = ['type' => 'VARCHAR', 'constraint' => 120, 'null' => true, 'after' => 'utm_medium'];
        }
        if (! $this->db->fieldExists('landing_path', 'users')) {
            $fields['landing_path'] = ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'utm_campaign'];
        }

        if ($fields !== []) {
            $this->forge->addColumn('users', $fields);
        }
    }

    public function down(): void
    {
        foreach (['source_slug', 'utm_source', 'utm_medium', 'utm_campaign', 'landing_path'] as $column) {
            if ($this->db->fieldExists($column, 'users')) {
                $this->forge->dropColumn('users', $column);
            }
        }
    }
}
