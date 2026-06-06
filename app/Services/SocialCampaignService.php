<?php

namespace App\Services;

use Config\Database;

class SocialCampaignService
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function createCampaign(array $data): array
    {
        $key = $data['campaign_key'] ?? url_title($data['title'] ?? 'social-campaign-' . time(), '-', true);

        $exists = $this->db->table('bf_social_campaigns')->where('campaign_key', $key)->get()->getRowArray();
        if ($exists) {
            return ['status' => 'success', 'campaign_id' => (int) $exists['id'], 'existing' => true];
        }

        $this->db->table('bf_social_campaigns')->insert([
            'campaign_key' => $key,
            'title' => $data['title'] ?? 'Social Campaign',
            'description' => $data['description'] ?? null,
            'audience' => $data['audience'] ?? 'beginner',
            'cta_type' => $data['cta_type'] ?? 'join_discord',
            'status' => $data['status'] ?? 'draft',
            'starts_at' => $data['starts_at'] ?? null,
            'ends_at' => $data['ends_at'] ?? null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return ['status' => 'success', 'campaign_id' => $this->db->insertID()];
    }

    public function getCampaigns(int $limit = 100): array
    {
        return $this->db->table('bf_social_campaigns')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function addPostToCampaign(int $campaignId, int $generatedPostId): array
    {
        $post = $this->db->table('bf_social_generated_posts')->where('id', $generatedPostId)->get()->getRowArray();
        if (! $post) {
            return ['status' => 'failed', 'error' => 'Generated post not found'];
        }

        $exists = $this->db->table('bf_social_campaign_posts')
            ->where('campaign_id', $campaignId)
            ->where('generated_post_id', $generatedPostId)
            ->get()
            ->getRowArray();

        if ($exists) {
            return ['status' => 'success', 'campaign_post_id' => (int) $exists['id'], 'existing' => true];
        }

        $platform = $this->db->table('bf_social_platforms')->where('id', $post['platform_id'])->get()->getRowArray();

        $this->db->table('bf_social_campaign_posts')->insert([
            'campaign_id' => $campaignId,
            'generated_post_id' => $generatedPostId,
            'platform_key' => $platform['platform_key'] ?? null,
            'status' => 'draft',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return ['status' => 'success', 'campaign_post_id' => $this->db->insertID()];
    }

    public function schedulePost(int $campaignId, int $generatedPostId, string $scheduledFor): array
    {
        $campaignPost = $this->addPostToCampaign($campaignId, $generatedPostId);

        if (($campaignPost['status'] ?? '') !== 'success') {
            return $campaignPost;
        }

        $post = $this->db->table('bf_social_generated_posts')->where('id', $generatedPostId)->get()->getRowArray();
        $platform = $post ? $this->db->table('bf_social_platforms')->where('id', $post['platform_id'])->get()->getRowArray() : null;

        $this->db->table('bf_social_campaign_schedule')->insert([
            'campaign_id' => $campaignId,
            'campaign_post_id' => $campaignPost['campaign_post_id'],
            'generated_post_id' => $generatedPostId,
            'platform_key' => $platform['platform_key'] ?? null,
            'scheduled_for' => $scheduledFor,
            'status' => 'scheduled',
            'notes' => 'Internal schedule only. No external posting.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return ['status' => 'success', 'schedule_id' => $this->db->insertID()];
    }

    public function getSchedule(int $limit = 100): array
    {
        return $this->db->table('bf_social_campaign_schedule')
            ->orderBy('scheduled_for', 'ASC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function createSampleCampaign(): array
    {
        $campaign = $this->createCampaign([
            'campaign_key' => 'sample-community-growth-' . date('Ymd-His'),
            'title' => 'Sample Community Growth Campaign',
            'description' => 'Draft-only campaign for MyMI Wallet social community growth.',
            'audience' => 'beginner',
            'cta_type' => 'free_tools',
            'status' => 'draft',
        ]);

        return $campaign;
    }

    public function queueDueSchedules(int $limit = 25): array
    {
        $rows = $this->db->table('bf_social_campaign_schedule')
            ->where('status', 'scheduled')
            ->where('scheduled_for <=', date('Y-m-d H:i:s'))
            ->limit($limit)
            ->get()
            ->getResultArray();

        $updated = 0;
        foreach ($rows as $row) {
            $this->db->table('bf_social_campaign_schedule')->where('id', $row['id'])->update([
                'status' => 'ready',
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $updated++;
        }

        return ['status' => 'success', 'ready' => $updated];
    }
}
