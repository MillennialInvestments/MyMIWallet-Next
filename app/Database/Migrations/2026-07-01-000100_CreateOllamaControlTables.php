<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOllamaControlTables extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'run_uuid' => ['type' => 'VARCHAR', 'constraint' => 64],
            'type' => ['type' => 'VARCHAR', 'constraint' => 32],
            'model' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
            'params_json' => ['type' => 'LONGTEXT', 'null' => true],
            'prompt_hash' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 20],
            'started_at' => ['type' => 'DATETIME', 'null' => true],
            'finished_at' => ['type' => 'DATETIME', 'null' => true],
            'latency_ms' => ['type' => 'INT', 'null' => true],
            'token_in' => ['type' => 'INT', 'null' => true],
            'token_out' => ['type' => 'INT', 'null' => true],
            'error' => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('status');
        $this->forge->addKey('model');
        $this->forge->createTable('bf_ollama_runs', true);

        $this->forge->addField([
            'session_id' => ['type' => 'VARCHAR', 'constraint' => 64],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'model' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
            'messages_json' => ['type' => 'LONGTEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('session_id', true);
        $this->forge->addKey('updated_at');
        $this->forge->createTable('bf_ollama_sessions', true);

        $this->forge->addField([
            'job_id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'type' => ['type' => 'VARCHAR', 'constraint' => 32],
            'priority' => ['type' => 'INT', 'default' => 5],
            'payload_json' => ['type' => 'LONGTEXT', 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 20],
            'attempts' => ['type' => 'INT', 'default' => 0],
            'last_error' => ['type' => 'TEXT', 'null' => true],
            'lease_until' => ['type' => 'DATETIME', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('job_id', true);
        $this->forge->addKey('status');
        $this->forge->addKey('created_at');
        $this->forge->createTable('bf_ollama_queue', true);

        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'doc_id' => ['type' => 'VARCHAR', 'constraint' => 128],
            'chunk_id' => ['type' => 'VARCHAR', 'constraint' => 128],
            'text' => ['type' => 'LONGTEXT'],
            'vector_json' => ['type' => 'LONGTEXT'],
            'dim' => ['type' => 'INT'],
            'hash' => ['type' => 'VARCHAR', 'constraint' => 64],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('doc_id');
        $this->forge->addKey('chunk_id');
        $this->forge->createTable('bf_ollama_embeddings', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_ollama_embeddings', true);
        $this->forge->dropTable('bf_ollama_queue', true);
        $this->forge->dropTable('bf_ollama_sessions', true);
        $this->forge->dropTable('bf_ollama_runs', true);
    }
}
