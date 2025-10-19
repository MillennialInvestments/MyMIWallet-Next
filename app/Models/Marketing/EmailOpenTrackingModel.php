<?php

namespace App\Models\Marketing;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class EmailOpenTrackingModel extends Model
{
    protected $table = 'bf_email_open_tracking';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email_id', 'opened_at'];

    // Records an email open event
    public function recordEmailOpen(int $emailId)
    {
        return $this->insert(['email_id' => $emailId, 'opened_at' => date('Y-m-d H:i:s')]);
    }

    // Counts opens for a specific campaign
    public function countOpensByCampaign(int $campaignId)
    {
        return $this->where('campaign_id', $campaignId)->countAllResults();
    }
}
