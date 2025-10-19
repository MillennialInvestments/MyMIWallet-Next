<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class DripCampaignModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'bf_email_drip_campaigns';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['name', 'description', 'trigger_event', 'is_active'];

    public function createCampaign(array $data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->insert($data);
    }

    public function createStep(array $data)
    {
        return $this->db->table('bf_email_drip_campaign_steps')->insert($data);
    }

    public function createUserProgress(array $data)
    {
        return $this->db->table('bf_email_user_drip_progress')->insert($data);
    }

    // Only relevant new or updated methods shown
    public function ensureTrackingFields()
    {
        $fields = ['sent_at', 'click_count', 'open_count', 'open_rate', 'engagement_score'];
        foreach ($fields as $field) {
            $exists = $this->db->query("SHOW COLUMNS FROM `bf_email_drip_email_tracking` LIKE '$field'")->getResult();
            if (empty($exists)) {
                $type = ($field === 'sent_at') ? "DATETIME DEFAULT NULL"
                    : ($field === 'engagement_score' || $field === 'open_rate' ? "FLOAT DEFAULT 0" : "INT DEFAULT 0");
                $this->db->query("ALTER TABLE `bf_email_drip_email_tracking` ADD COLUMN `$field` $type");
            }
        }
    }

    // --- CAMPAIGN METHODS ---
    public function getCampaignByTrigger($trigger)
    {
        return $this->where('trigger_event', $trigger)->where('is_active', true)->first();
    }

    public function getCampaignEngagementStats($campaignId)
    {
        return $this->db->table('bf_email_drip_email_tracking')
            ->select('AVG(open_rate) as avg_open, AVG(click_count) as avg_click, AVG(engagement_score) as avg_score')
            ->where('campaign_id', $campaignId)
            ->get()->getRowArray();
    }

    public function getNextStep($campaignId, $afterStepNum)
    {
        return $this->db->table('bf_email_drip_campaign_steps')
            ->where('campaign_id', $campaignId)
            ->where('step_number >', $afterStepNum)
            ->where('is_active', true)
            ->orderBy('step_number', 'ASC')
            ->get()->getRowArray();
    }

    public function getPopularTags($limit = 10)
    {
        return $this->db->table('bf_email_tag_usage')
            ->select('tag, COUNT(*) as usage_count')
            ->groupBy('tag')
            ->orderBy('usage_count', 'DESC')
            ->limit($limit)
            ->get()->getResultArray();
    }

    public function getStepById($stepId)
    {
        return $this->db->table('bf_email_drip_campaign_steps')
            ->where('id', $stepId)->get()->getRowArray();
    }

    // --- STEP METHODS ---
    public function getStepsForCampaign($campaignId)
    {
        return $this->db->table('bf_email_drip_campaign_steps')
            ->where('campaign_id', $campaignId)
            ->orderBy('step_number', 'ASC')
            ->get()->getResultArray();
    }

    public function getUsersDueForEmail()
    {
        return $this->db->table('bf_email_user_drip_progress')
            ->where('status', 'active')
            ->where('next_send_at IS NOT NULL', null, false)
            ->where('next_send_at <=', date('Y-m-d H:i:s'))
            ->get()->getResultArray();
    }

    // --- USER PROGRESS METHODS ---
    public function getUserProgress($userId, $campaignId)
    {
        return $this->db->table('bf_email_user_drip_progress')
            ->where(['user_id' => $userId, 'campaign_id' => $campaignId])
            ->get()->getRowArray();
    }

    public function logEmailSent(array $data)
    {
        return $this->db->table('bf_email_drip_email_tracking')->insert($data);
    }

    // --- TAGGING + ANALYTICS ---
    public function logTagUsage($tag)
    {
        return $this->db->table('bf_email_tag_usage')
            ->insert(['tag' => $tag, 'used_at' => date('Y-m-d H:i:s')]);
    }

    public function recordEmailClick($id, $url)
    {
        return $this->db->table('bf_email_drip_email_tracking')
            ->where('id', $id)
            ->set('click_count', 'click_count + 1', false)
            ->set('last_click_url', $url)
            ->set('last_clicked_at', date('Y-m-d H:i:s'))
            ->update();
    }

    // --- TRACKING METHODS ---
    public function recordEmailOpen($id)
    {
        return $this->db->table('bf_email_drip_email_tracking')
            ->where('id', $id)
            ->set('open_count', 'open_count + 1', false)
            ->set('opened_at', date('Y-m-d H:i:s'))
            ->update();
    }

    // --- NEW PERFORMANCE TRACKING ---
    public function recordEmailPerformance($id, $score)
    {
        return $this->db->table('bf_email_drip_email_tracking')
            ->where('id', $id)
            ->update(['engagement_score' => $score]);
    }

    public function updateCampaign($id, array $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->update($id, $data);
    }

    public function updateEngagementScore($emailId)
    {
        $this->db->query("
            UPDATE bf_email_drip_email_tracking
            SET open_rate = IFNULL(open_count,0)/1.0,
                engagement_score = IFNULL(open_count,0)*1 + IFNULL(click_count,0)*2
            WHERE id = ?", [$emailId]);
    }

    public function updateUserProgress($userId, $campaignId, array $data)
    {
        return $this->db->table('bf_email_user_drip_progress')
            ->where(['user_id' => $userId, 'campaign_id' => $campaignId])
            ->update($data);
    }

}
?>
