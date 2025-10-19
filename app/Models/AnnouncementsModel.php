<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class AnnouncementsModel extends Model
{
    protected $table                = 'bf_applications';
    protected $primaryKey           = 'id';
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $createdField         = 'created_on';
    protected $updatedField         = 'modified_on';
    protected $allowedFields        = [
        'field1', 'field2', 'field3', // Replace these with the actual field names
    ];
    protected $validationRules      = [
        'Name' => 'required|is_unique[bf_contactus.Name,bf_contactus.id]|alpha|max_length[255]',
        'email' => 'required|is_unique[bf_contactus.email,bf_contactus.id]|valid_email|max_length[255]',
        'phone' => 'required|is_unique[bf_contactus.phone,bf_contactus.id]|max_length[30]',
        'message' => 'alpha_dash|max_length[255]'
    ];
    protected $skipValidation       = false;

    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retrieve the latest announcements
     */
    public function getAnnouncements()
    {
        return $this->db->table('bf_users_posts')
            ->where('announcement', 1)
            ->orderBy('id', 'DESC')
            ->limit(10)
            ->get();
    }

    /**
     * Post a new announcement
     */
    public function postAnnouncement($data)
    {
        return $this->db->table('bf_users_posts')->insert($data);
    }

    /**
     * Retrieve external links that are active
     */
    public function getExternalLinks()
    {
        return $this->db->table('bf_external_sites')
            ->where('active', 'Yes')
            ->get();
    }
}
