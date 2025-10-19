<?php

namespace App\Models\Marketing;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class EmailMarketingModel extends Model
{
    protected $table = 'bf_marketing_campaigns';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'type', 'audience_type', 'scheduled_at', 'stage', 'html_content', 'description', 'created_by', 'status'];

    // Creates a new campaign
    public function createCampaign(array $data)
    {
        return $this->insert($data);
    }

    // Updates campaign stage (draft, scheduled, completed)
    public function updateCampaignStage(int $campaignId, string $stage)
    {
        return $this->update($campaignId, ['stage' => $stage]);
    }

    // Schedules the campaign with a specific datetime
    public function scheduleCampaign(int $campaignId, string $datetime)
    {
        return $this->update($campaignId, ['scheduled_at' => $datetime, 'stage' => 'scheduled']);
    }

    // Fetches all campaigns based on status (draft, scheduled, completed)
    public function getCampaignsByStage(string $stage)
    {
        return $this->where('stage', $stage)->findAll();
    }

    // Retrieves campaign by ID
    public function getCampaignById(int $campaignId)
    {
        return $this->find($campaignId);
    }
}
