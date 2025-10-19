<?php
namespace App\Models;

use CodeIgniter\Model;

class PrivacyRequestModel extends Model
{
    protected $table = 'bf_privacy_requests';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','type','status','notes','result_path','created_at','updated_at'];
    protected $useTimestamps = false;
}
