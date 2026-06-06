<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SocialPostTemplatesSeeder extends Seeder
{
    public function run(): void
    {
        $platforms = $this->db->table('bf_social_platforms')->get()->getResultArray();

        if (empty($platforms)) {
            $this->call('SocialPlatformsSeeder');
            $platforms = $this->db->table('bf_social_platforms')->get()->getResultArray();
        }

        $templateKeys = [
            'daily_news_digest' => 'Daily News Digest',
            'budget_tip' => 'Budget Tip',
            'investment_tip' => 'Investment Tip',
            'trade_alert_digest' => 'Trade Alert Digest',
            'community_question' => 'Community Question',
            'promo_free_tools' => 'Promo Free Tools',
            'promo_membership_discount' => 'Promo Membership Discount',
            'promo_discord_invite' => 'Promo Discord Invite',
            'weekly_recap' => 'Weekly Recap',
        ];

        foreach ($platforms as $platform) {
            foreach ($templateKeys as $key => $title) {
                $exists = $this->db->table('bf_social_post_templates')
                    ->where('platform_id', $platform['id'])
                    ->where('template_key', $key)
                    ->countAllResults();

                if ($exists > 0) {
                    continue;
                }

                $maxChars = match ($platform['platform_key']) {
                    'x' => 280,
                    'stocktwits' => 1000,
                    'tiktok' => 2200,
                    'linkedin' => 3000,
                    'facebook' => 5000,
                    'youtube' => 5000,
                    'discord' => 2000,
                    default => 2000,
                };

                $this->db->table('bf_social_post_templates')->insert([
                    'platform_id' => $platform['id'],
                    'template_key' => $key,
                    'title' => $title,
                    'max_chars' => $maxChars,
                    'hashtag_limit' => $platform['platform_key'] === 'x' ? 3 : 8,
                    'supports_links' => 1,
                    'supports_mentions' => 1,
                    'supports_tickers' => in_array($platform['platform_key'], ['x', 'stocktwits'], true) ? 1 : 0,
                    'rules_json' => json_encode([
                        'funnel' => 'post -> platform community -> Discord -> website -> free tools -> memberships -> premium add-ons',
                        'approval_required' => true,
                        'external_posting' => false,
                    ]),
                    'body_template' => "{HOOK}\n\n{VALUE}\n\n{CTA}\n\n{LINKS}\n\n{TICKERS}\n{HASHTAGS}",
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
