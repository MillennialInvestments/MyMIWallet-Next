<?php
namespace App\Modules\Template\Models;

use CodeIgniter\Model;

/**
 * Generic model for Template module.
 */
class TemplateModel extends Model
{
    protected $table      = 'template';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','value','created_at','updated_at'];
    protected $useTimestamps = true;
}
