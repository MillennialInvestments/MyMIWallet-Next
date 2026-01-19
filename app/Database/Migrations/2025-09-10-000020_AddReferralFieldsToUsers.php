<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddReferralFieldsToUsers extends Migration
{
    public function up()
    {
        $fields = [
            'referral_code' => [
                'type'       => 'varchar',
                'constraint' => 255,
                'null'       => true,
            ],
            'referred_by_user_id' => [
                'type'       => 'int',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['referral_code', 'referred_by_user_id']);
    }
}
