<?php

namespace App\Models\Marketing;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class EmailTemplateModel extends Model
{
    protected $table = 'bf_marketing_email_templates';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'subject', 'content', 'created_at', 'updated_at'];

    // Creates a new template
    public function createTemplate(array $data)
    {
        return $this->insert($data);
    }

    // Fetches all templates
    public function getAllTemplates()
    {
        return $this->findAll();
    }
}
