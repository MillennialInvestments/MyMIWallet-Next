<?php

namespace App\Services;

use Config\Database;

class SocialTrackingService
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function createTrackingLink(array $data): array
    {
        $platformKey = $data['platform_key'] ?? 'unknown';
        $campaignId = isset($data['campaign_id']) ? (int) $data['campaign_id'] : null;
        $generatedPostId = isset($data['generated_post_id']) ? (int) $data['generated_post_id'] : null;
        $communityId = isset($data['community_id']) ? (int) $data['community_id'] : null;

        $destinationUrl = $data['destination_url'] ?? site_url('/Register');
        $source = $data['source'] ?? $platformKey;
        $medium = $data['medium'] ?? 'social';
        $campaign = $data['campaign'] ?? ('community-growth-' . date('Ym'));
        $content = $data['content'] ?? ('post-' . ($generatedPostId ?: 'manual'));

        $trackingCode = $data['tracking_code'] ?? strtolower(substr(hash('sha256', implode('|', [
            $platformKey,
            $campaignId,
            $generatedPostId,
            $communityId,
            microtime(true),
        ])), 0, 16));

        $separator = str_contains($destinationUrl, '?') ? '&' : '?';
        $trackingUrl = $destinationUrl
            . $separator
            . http_build_query([
                'utm_source' => $source,
                'utm_medium' => $medium,
                'utm_campaign' => $campaign,
                'utm_content' => $content,
                'mymi_track' => $trackingCode,
            ]);

        $existing = $this->db->table('bf_social_tracking_links')
            ->where('tracking_code', $trackingCode)
            ->get()
            ->getRowArray();

        if ($existing) {
            return ['status' => 'success', 'tracking_link_id' => (int) $existing['id'], 'tracking_url' => $existing['tracking_url'], 'existing' => true];
        }

        $this->db->table('bf_social_tracking_links')->insert([
            'platform_key' => $platformKey,
            'campaign_id' => $campaignId,
            'generated_post_id' => $generatedPostId,
            'community_id' => $communityId,
            'source' => $source,
            'medium' => $medium,
            'campaign' => $campaign,
            'content' => $content,
            'tracking_code' => $trackingCode,
            'destination_url' => $destinationUrl,
            'tracking_url' => $trackingUrl,
            'clicks' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return ['status' => 'success', 'tracking_link_id' => $this->db->insertID(), 'tracking_url' => $trackingUrl];
    }

    public function getTrackingLinks(int $limit = 100): array
    {
        return $this->db->table('bf_social_tracking_links')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function recordClick(array $data): array
    {
        $trackingCode = $data['tracking_code'] ?? null;
        $trackingLinkId = isset($data['tracking_link_id']) ? (int) $data['tracking_link_id'] : null;

        if (! $trackingLinkId && $trackingCode) {
            $row = $this->db->table('bf_social_tracking_links')
                ->where('tracking_code', $trackingCode)
                ->get()
                ->getRowArray();

            if ($row) {
                $trackingLinkId = (int) $row['id'];
            }
        }

        if (! $trackingLinkId) {
            return ['status' => 'failed', 'error' => 'Missing tracking link'];
        }

        $ip = $data['ip'] ?? service('request')->getIPAddress();
        $ua = $data['user_agent'] ?? (string) service('request')->getUserAgent();

        $this->db->table('bf_social_click_events')->insert([
            'tracking_link_id' => $trackingLinkId,
            'ip_hash' => hash('sha256', (string) $ip),
            'user_agent_hash' => hash('sha256', (string) $ua),
            'referrer' => $data['referrer'] ?? service('request')->getServer('HTTP_REFERER'),
            'clicked_at' => $data['clicked_at'] ?? date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $this->db->table('bf_social_tracking_links')
            ->where('id', $trackingLinkId)
            ->set('clicks', 'clicks + 1', false)
            ->set('updated_at', date('Y-m-d H:i:s'))
            ->update();

        return ['status' => 'success', 'tracking_link_id' => $trackingLinkId];
    }

    public function recordConversion(array $data): array
    {
        $allowed = [
            'registration',
            'discord_join',
            'budget_tool_usage',
            'portfolio_creation',
            'membership_upgrade',
            'advisor_booking',
            'exchange_usage',
            'revenue',
        ];

        $type = $data['conversion_type'] ?? '';
        if (! in_array($type, $allowed, true)) {
            return ['status' => 'failed', 'error' => 'Invalid conversion_type'];
        }

        $this->db->table('bf_social_conversion_events')->insert([
            'tracking_link_id' => $data['tracking_link_id'] ?? null,
            'user_id' => $data['user_id'] ?? null,
            'conversion_type' => $type,
            'conversion_value' => $data['conversion_value'] ?? null,
            'metadata_json' => isset($data['metadata']) ? json_encode($data['metadata']) : ($data['metadata_json'] ?? null),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return ['status' => 'success', 'conversion_id' => $this->db->insertID()];
    }

    public function refreshMetrics(?string $dateKey = null): array
    {
        $dateKey = $dateKey ?: date('Y-m-d');

        $platforms = $this->db->table('bf_social_tracking_links')
            ->select('platform_key, campaign_id, community_id')
            ->groupBy('platform_key, campaign_id, community_id')
            ->get()
            ->getResultArray();

        $updated = 0;

        foreach ($platforms as $row) {
            $platformKey = $row['platform_key'];
            $campaignId = $row['campaign_id'];
            $communityId = $row['community_id'];

            $linksBuilder = $this->db->table('bf_social_tracking_links')
                ->where('platform_key', $platformKey);

            if ($campaignId !== null) {
                $linksBuilder->where('campaign_id', $campaignId);
            }

            if ($communityId !== null) {
                $linksBuilder->where('community_id', $communityId);
            }

            $links = $linksBuilder->get()->getResultArray();
            $ids = array_map(static fn ($link) => (int) $link['id'], $links);

            $clicks = 0;
            $registrations = 0;
            $discordJoins = 0;
            $budgetToolUsage = 0;
            $portfolioCreations = 0;
            $membershipUpgrades = 0;
            $advisorBookings = 0;
            $exchangeUsage = 0;
            $revenue = 0.0;

            if (! empty($ids)) {
                $clicks = $this->db->table('bf_social_click_events')
                    ->whereIn('tracking_link_id', $ids)
                    ->where('DATE(clicked_at)', $dateKey)
                    ->countAllResults();

                $conversions = $this->db->table('bf_social_conversion_events')
                    ->whereIn('tracking_link_id', $ids)
                    ->where('DATE(created_at)', $dateKey)
                    ->get()
                    ->getResultArray();

                foreach ($conversions as $conversion) {
                    switch ($conversion['conversion_type']) {
                        case 'registration':
                            $registrations++;
                            break;
                        case 'discord_join':
                            $discordJoins++;
                            break;
                        case 'budget_tool_usage':
                            $budgetToolUsage++;
                            break;
                        case 'portfolio_creation':
                            $portfolioCreations++;
                            break;
                        case 'membership_upgrade':
                            $membershipUpgrades++;
                            break;
                        case 'advisor_booking':
                            $advisorBookings++;
                            break;
                        case 'exchange_usage':
                            $exchangeUsage++;
                            break;
                        case 'revenue':
                            $revenue += (float) ($conversion['conversion_value'] ?? 0);
                            break;
                    }
                }
            }

            $existing = $this->db->table('bf_social_funnel_metrics')
                ->where('platform_key', $platformKey)
                ->where('campaign_id', $campaignId)
                ->where('community_id', $communityId)
                ->where('date_key', $dateKey)
                ->get()
                ->getRowArray();

            $payload = [
                'platform_key' => $platformKey,
                'campaign_id' => $campaignId,
                'community_id' => $communityId,
                'date_key' => $dateKey,
                'views' => 0,
                'clicks' => $clicks,
                'registrations' => $registrations,
                'discord_joins' => $discordJoins,
                'budget_tool_usage' => $budgetToolUsage,
                'portfolio_creations' => $portfolioCreations,
                'membership_upgrades' => $membershipUpgrades,
                'advisor_bookings' => $advisorBookings,
                'exchange_usage' => $exchangeUsage,
                'revenue' => $revenue,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if ($existing) {
                $this->db->table('bf_social_funnel_metrics')->where('id', $existing['id'])->update($payload);
            } else {
                $payload['created_at'] = date('Y-m-d H:i:s');
                $this->db->table('bf_social_funnel_metrics')->insert($payload);
            }

            $updated++;
        }

        return ['status' => 'success', 'date_key' => $dateKey, 'updated' => $updated];
    }

    public function getPlatformMetrics(int $limit = 100): array
    {
        return $this->db->table('bf_social_funnel_metrics')
            ->select('platform_key, SUM(clicks) AS clicks, SUM(registrations) AS registrations, SUM(discord_joins) AS discord_joins, SUM(membership_upgrades) AS membership_upgrades, SUM(revenue) AS revenue')
            ->groupBy('platform_key')
            ->orderBy('revenue', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function getCampaignMetrics(int $limit = 100): array
    {
        return $this->db->table('bf_social_funnel_metrics')
            ->select('campaign_id, SUM(clicks) AS clicks, SUM(registrations) AS registrations, SUM(discord_joins) AS discord_joins, SUM(membership_upgrades) AS membership_upgrades, SUM(revenue) AS revenue')
            ->groupBy('campaign_id')
            ->orderBy('revenue', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function getCommunityMetrics(int $limit = 100): array
    {
        return $this->db->table('bf_social_funnel_metrics')
            ->select('community_id, SUM(clicks) AS clicks, SUM(registrations) AS registrations, SUM(discord_joins) AS discord_joins, SUM(membership_upgrades) AS membership_upgrades, SUM(revenue) AS revenue')
            ->groupBy('community_id')
            ->orderBy('revenue', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function audit(): array
    {
        $this->refreshMetrics();

        $platforms = $this->getPlatformMetrics(10);
        $campaigns = $this->getCampaignMetrics(10);
        $communities = $this->getCommunityMetrics(10);

        return [
            'status' => 'success',
            'top_platform' => $platforms[0] ?? null,
            'top_campaign' => $campaigns[0] ?? null,
            'top_community' => $communities[0] ?? null,
            'platforms' => $platforms,
            'campaigns' => $campaigns,
            'communities' => $communities,
        ];
    }
}
