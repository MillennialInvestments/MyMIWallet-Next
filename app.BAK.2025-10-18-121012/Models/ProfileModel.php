<?php
namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Security\EncryptsAttributes;

class ProfileModel extends Model
{
    use EncryptsAttributes;

    protected $table = 'bf_user_profiles';
    protected $allowedFields = [
        'user_id','phone','street','city','state','postal_code',
        'phone_ciphertext','phone_iv','phone_tag',
        'street_ciphertext','street_iv','street_tag',
        'city_ciphertext','city_iv','city_tag',
        'state_ciphertext','state_iv','state_tag',
        'postal_code_ciphertext','postal_code_iv','postal_code_tag',
        'phone_sha'
    ];
    protected array $encrypted = ['phone','street','city','state','postal_code'];
    protected array $hashed = ['phone'];
    protected $beforeInsert = ['encryptAttributes'];
    protected $beforeUpdate = ['encryptAttributes'];
    protected $afterFind    = ['decryptAttributes'];
}
