<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RenameDiscordManualMessageRecipientFields extends Migration
{
    public function up()
    {
        $table = 'bf_discord_manual_messages';
        if (! $this->db->tableExists($table)) {
            return;
        }

        if ($this->db->fieldExists('customer_id', $table) && ! $this->db->fieldExists('recipient_id', $table)) {
            $this->db->query("ALTER TABLE {$table} CHANGE customer_id recipient_id INT NULL");
        }

        if ($this->db->fieldExists('customer_email', $table) && ! $this->db->fieldExists('recipient_email', $table)) {
            $this->db->query("ALTER TABLE {$table} CHANGE customer_email recipient_email VARCHAR(255) NULL");
        }
    }

    public function down()
    {
        $table = 'bf_discord_manual_messages';
        if (! $this->db->tableExists($table)) {
            return;
        }

        if ($this->db->fieldExists('recipient_id', $table) && ! $this->db->fieldExists('customer_id', $table)) {
            $this->db->query("ALTER TABLE {$table} CHANGE recipient_id customer_id INT NULL");
        }

        if ($this->db->fieldExists('recipient_email', $table) && ! $this->db->fieldExists('customer_email', $table)) {
            $this->db->query("ALTER TABLE {$table} CHANGE recipient_email customer_email VARCHAR(255) NULL");
        }
    }
}
