<?php
namespace App\Modules\Template\Models;

use App\Models\ObservedModel;

/**
 * Generic model for Template module.
 */
class TemplateModel extends ObservedModel
{
    protected $table      = 'template';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','value','created_at','updated_at'];
    protected $useTimestamps = true;
}
