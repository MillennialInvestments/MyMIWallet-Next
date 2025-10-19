<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class CampaignModel extends Model
{
    protected $db;
    protected $table = 'bf_marketing_campaigns';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'primary_content', 'email_message', 'is_draft', 'created_at', 'updated_at'];

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function autoScheduleEligibleDrafts()
    {
        $nowUTC = date('Y-m-d H:i:s');
    
        $drafts = $this->where('stage', 'Draft')
            ->where('auto_schedule_at IS NOT NULL', null, false)
            ->where('auto_schedule_at <=', $nowUTC)
            ->findAll();
    
        if (empty($drafts)) {
            log_message('info', 'CampaignModel: No drafts ready for auto-scheduling.');
            return 0;
        }
    
        $updatedCount = 0;
    
        foreach ($drafts as $draft) {
            $this->update($draft['id'], [
                'stage' => 'Scheduled',
                'scheduled_at' => $draft['auto_schedule_at']
            ]);
            log_message('info', "✅ CampaignModel: Auto-Scheduled Campaign ID {$draft['id']} ({$draft['name']}) at {$draft['auto_schedule_at']}.");
            $updatedCount++;
        }
    
        return $updatedCount;
    }
    
    public function cloneCampaign($campaignId)
    {
        $campaign = $this->find($campaignId);
        if (!$campaign) {
            return false;
        }

        unset($campaign['id']); // Remove the old ID
        $campaign['name'] = $campaign['name'] . ' (Clone)';
        $campaign['is_draft'] = 1;
        $campaign['created_at'] = date('Y-m-d H:i:s');
        $campaign['updated_at'] = null;

        $this->insert($campaign);
        return $this->insertID();
    }

    public function createDraftCampaign(array $data)
    {
        return $this->insert($data) ? $this->insertID() : false;
    }

    public function fetchCampaignAnalytics()
    {
        return $this->db->table('bf_marketing_campaigns')
            ->select('id, name, status, scheduled_at, sent_at, open_rate, bounce_rate')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResultArray();
    }
    
    public function fetchTagAnalytics()
    {
        $query = $this->db->query("
            SELECT hashtags
            FROM bf_marketing_campaigns
            WHERE hashtags IS NOT NULL AND hashtags != ''
        ");
    
        $allTags = [];
        foreach ($query->getResultArray() as $row) {
            $tags = explode(',', $row['hashtags']);
            foreach ($tags as $tag) {
                $cleaned = trim($tag);
                if (!empty($cleaned)) {
                    $allTags[] = strtolower($cleaned);
                }
            }
        }
    
        $tagCounts = array_count_values($allTags);
        arsort($tagCounts);
    
        return $tagCounts;
    }
    
    public function getAllCampaigns()
    {
        return $this->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function getAutoScheduleDrafts($nowUTC)
    {
        return $this->where('is_draft', 1)
                    ->where('auto_schedule_at IS NOT NULL')
                    ->where('auto_schedule_at <=', $nowUTC)
                    ->findAll();
    }
    
    public function getAvailableCampaigns()
    {
        return $this->where('is_draft', 0)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function getCampaignAnalytics($campaignId)
    {
        $sent = $this->db->table('bf_marketing_email_queue')
            ->where('campaign_id', $campaignId)
            ->where('status', 'sent')
            ->countAllResults();

        $opened = $this->db->table('bf_marketing_email_open_tracking')
            ->where('campaign_id', $campaignId)
            ->countAllResults();

        $bounced = $this->db->table('bf_marketing_email_queue')
            ->where('campaign_id', $campaignId)
            ->where('status', 'bounced')
            ->countAllResults();

        $openRate = ($sent > 0) ? round(($opened / $sent) * 100, 2) : 0;
        $bounceRate = ($sent > 0) ? round(($bounced / $sent) * 100, 2) : 0;

        return compact('sent', 'opened', 'bounced', 'openRate', 'bounceRate');
    }

    public function getCampaignStats($campaignId)
    {
        $sent = $this->db->table('bf_marketing_email_queue')
            ->where('campaign_id', $campaignId)
            ->countAllResults();
    
        $opened = $this->db->table('bf_marketing_email_open_tracking')
            ->where('campaign_id', $campaignId)
            ->countAllResults();
    
        $bounced = $this->db->table('bf_marketing_email_queue')
            ->where('campaign_id', $campaignId)
            ->where('status', 'bounced')
            ->countAllResults();
    
        return [
            'sent' => $sent,
            'opens' => $opened,
            'bounced' => $bounced,
            'open_rate' => $sent > 0 ? round(($opened / $sent) * 100, 2) : 0,
            'bounce_rate' => $sent > 0 ? round(($bounced / $sent) * 100, 2) : 0,
        ];
    }
    
    public function getCampaignTrend()
    {
        $data = $this->db->query("
            SELECT 
                DATE(scheduled_at) as date,
                COUNT(id) as sent,
                AVG(open_rate) as open_rate,
                AVG(bounce_rate) as bounce_rate
            FROM bf_marketing_campaigns
            WHERE scheduled_at IS NOT NULL
            GROUP BY DATE(scheduled_at)
            ORDER BY date ASC
        ")->getResultArray();

        $trend = [
            'dates' => [],
            'sent' => [],
            'open_rate' => [],
            'bounce_rate' => [],
        ];

        foreach ($data as $row) {
            $trend['dates'][] = $row['date'];
            $trend['sent'][] = (int) $row['sent'];
            $trend['open_rate'][] = (float) number_format($row['open_rate'], 2);
            $trend['bounce_rate'][] = (float) number_format($row['bounce_rate'], 2);
        }

        return $trend;
    }

    public function getDraftCampaigns()
    {
        return $this->where('is_draft', 1)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function getScheduledCampaigns()
    {
        return $this->where('status', 'scheduled')
                    ->where('scheduled_at <=', date('Y-m-d H:i:s'))
                    ->findAll();
    }

    public function queueScheduledCampaign($campaignId)
    {
        return $this->where('id', $campaignId)->set([
            'status' => 'queued'
        ])->update();
    }

    public function scheduleCampaign($campaignId, $datetime)
    {
        return $this->where('id', $campaignId)->set([
            'scheduled_at' => $datetime,
            'status' => 'scheduled'
        ])->update();
    }
}
?>
