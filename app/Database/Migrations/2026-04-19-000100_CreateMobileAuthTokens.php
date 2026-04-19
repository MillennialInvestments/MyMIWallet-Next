<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMobileAuthTokens extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'INT', 'unsigned' => true],
            'token_prefix' => ['type' => 'VARCHAR', 'constraint' => 24],
            'token_hash' => ['type' => 'CHAR', 'constraint' => 64],
            'device_name' => ['type' => 'VARCHAR', 'constraint' => 120, 'null' => true],
            'last_used_at' => ['type' => 'DATETIME', 'null' => true],
            'expires_at' => ['type' => 'DATETIME', 'null' => true],
            'revoked_at' => ['type' => 'DATETIME', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => false],
            'updated_at' => ['type' => 'DATETIME', 'null' => false],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('user_id');
        $this->forge->addKey('token_prefix');
        $this->forge->addUniqueKey('token_hash');
        $this->forge->createTable('bf_mobile_auth_tokens', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_mobile_auth_tokens', true);
    }
}
