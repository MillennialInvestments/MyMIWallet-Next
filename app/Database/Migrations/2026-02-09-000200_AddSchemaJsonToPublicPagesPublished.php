<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSchemaJsonToPublicPagesPublished extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('bf_public_pages_published') && ! $this->db->fieldExists('schema_json', 'bf_public_pages_published')) {
            $this->forge->addColumn('bf_public_pages_published', [
                'schema_json' => ['type' => 'LONGTEXT', 'null' => true, 'after' => 'published_meta_json'],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_public_pages_published') && $this->db->fieldExists('schema_json', 'bf_public_pages_published')) {
            $this->forge->dropColumn('bf_public_pages_published', 'schema_json');
        }
    }
}

