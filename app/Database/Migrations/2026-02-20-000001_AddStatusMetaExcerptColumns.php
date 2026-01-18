<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusMetaExcerptColumns extends Migration
{
    public function up()
    {
        $tables = [
            'bf_marketing_blog_posts' => [
                'status'   => ['type' => 'VARCHAR', 'constraint' => 32, 'null' => true],
                'excerpt'  => ['type' => 'VARCHAR', 'constraint' => 512, 'null' => true],
                'meta_json'=> ['type' => 'LONGTEXT', 'null' => true],
            ],
            'bf_marketing_scraper' => [
                'status'   => ['type' => 'VARCHAR', 'constraint' => 32, 'null' => true],
                'meta_json'=> ['type' => 'LONGTEXT', 'null' => true],
            ],
            'bf_support_requests' => [
                'status'   => ['type' => 'VARCHAR', 'constraint' => 32, 'null' => true],
            ],
            'bf_ai_usage' => [
                'meta_json'=> ['type' => 'LONGTEXT', 'null' => true],
            ],
        ];

        foreach ($tables as $table => $fields) {
            if (! $this->db->tableExists($table)) {
                continue;
            }

            $addFields = [];
            foreach ($fields as $name => $spec) {
                if (! $this->db->fieldExists($name, $table)) {
                    $addFields[$name] = $spec;
                }
            }

            if ($addFields !== []) {
                $this->forge->addColumn($table, $addFields);
            }
        }

        if ($this->db->tableExists('bf_marketing_blog_posts')
            && $this->db->fieldExists('excerpt', 'bf_marketing_blog_posts')
            && $this->db->fieldExists('content', 'bf_marketing_blog_posts')
        ) {
            $this->db->query(
                "UPDATE bf_marketing_blog_posts
                 SET excerpt = LEFT(content, 220)
                 WHERE excerpt IS NULL OR excerpt = ''"
            );
        }
    }

    public function down()
    {
        $columns = [
            'bf_marketing_blog_posts' => ['status', 'excerpt', 'meta_json'],
            'bf_marketing_scraper'    => ['status', 'meta_json'],
            'bf_support_requests'     => ['status'],
            'bf_ai_usage'             => ['meta_json'],
        ];

        foreach ($columns as $table => $fields) {
            if (! $this->db->tableExists($table)) {
                continue;
            }

            foreach ($fields as $field) {
                if ($this->db->fieldExists($field, $table)) {
                    $this->forge->dropColumn($table, $field);
                }
            }
        }
    }
}
