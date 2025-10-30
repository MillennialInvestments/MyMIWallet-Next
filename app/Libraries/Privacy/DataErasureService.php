<?php
namespace App\Libraries\Privacy;

use CodeIgniter\Database\BaseConnection;

class DataErasureService
{
    public function __construct(private BaseConnection $db) {}

    public function pseudonymizeUser(int $userId): int
    {
        $count = 0;
        $count += $this->db->table('bf_user_profiles')->where('user_id',$userId)
            ->set([
                'phone'=>null,'street'=>null,'city'=>null,'state'=>null,'postal_code'=>null,
                'phone_ciphertext'=>null,'phone_iv'=>null,'phone_tag'=>null,
                'street_ciphertext'=>null,'street_iv'=>null,'street_tag'=>null,
                'city_ciphertext'=>null,'city_iv'=>null,'city_tag'=>null,
                'state_ciphertext'=>null,'state_iv'=>null,'state_tag'=>null,
                'postal_code_ciphertext'=>null,'postal_code_iv'=>null,'postal_code_tag'=>null,
                'phone_sha'=>null
            ])->update() ? $this->db->affectedRows() : 0;

        $count += $this->db->table('users')->where('id',$userId)
            ->set(['display_name' => 'Deleted User #'.$userId])->update() ? $this->db->affectedRows() : 0;

        return $count;
    }
}
