<?php
namespace App\Modules\Management\Models;

use App\Models\ObservedModel;

/**
 * Model for alerts pending review.
 */
class AlertPendingModel extends ObservedModel
{
    protected $table      = 'alert_pending';
    protected $primaryKey = 'id';
    protected $allowedFields = ['symbol','message','status','created_at','updated_at'];
    protected $useTimestamps = true;
}
