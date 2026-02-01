<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddReferralFieldsToUsers extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('users')) {
            return;
        }

        // Add referral_code only if it does not exist
        if (! $this->db->fieldExists('referral_code', 'users')) {
            $this->forge->addColumn('users', [
                'referral_code' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                    'after'      => 'email', // adjust if needed
                ],
            ]);
        }

        // Add referred_by_user_id only if it does not exist
        if (! $this->db->fieldExists('referred_by_user_id', 'users')) {
            $this->forge->addColumn('users', [
                'referred_by_user_id' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
                    'null'       => true,
                    'after'      => 'referral_code',
                ],
            ]);
        }
    }

    public function down()
    {
        if (! $this->db->tableExists('users')) {
            return;
        }

        if ($this->db->fieldExists('referred_by_user_id', 'users')) {
            $this->forge->dropColumn('users', 'referred_by_user_id');
        }

        if ($this->db->fieldExists('referral_code', 'users')) {
            $this->forge->dropColumn('users', 'referral_code');
        }
    }
}
