<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * GT-FORM-ROUTES-001: referral program applications. The table came from the
 * CodeIgniter 3 site; create it only where it is missing.
 */
class CreateUsersReferralProgram extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('bf_users_referral_program')) {
            return;
        }
        $str = static fn (int $n) => ['type' => 'VARCHAR', 'constraint' => $n, 'null' => true];
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'user_id'         => ['type' => 'INT', 'unsigned' => true],
            'referrer_code'   => $str(50),
            'active'          => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'signup_date'     => ['type' => 'DATE', 'null' => true],
            'user_type'       => $str(50),
            'first_name'      => $str(100),
            'last_name'       => $str(100),
            'email'           => $str(255),
            'phone'           => $str(30),
            'address'         => $str(255),
            'city'            => $str(100),
            'state'           => $str(100),
            'country'         => $str(100),
            'zipcode'         => $str(20),
            'paypal'          => $str(255),
            'other_payment'   => $str(255),
            'wallet_id'       => $str(100),
            'basic_code'      => $str(100),
            'premium_code'    => $str(100),
            'gold_code'       => $str(100),
            'links_created'   => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'user_ip_address' => $str(45),
            'total_spend'     => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0],
            'days_active'     => ['type' => 'INT', 'default' => 0],
            'created_on'      => ['type' => 'DATETIME', 'null' => true],
            'modified_on'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('user_id');
        $this->forge->addKey('referrer_code');
        $this->forge->createTable('bf_users_referral_program');
    }

    public function down()
    {
        $this->forge->dropTable('bf_users_referral_program', true);
    }
}
