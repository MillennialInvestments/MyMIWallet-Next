<?php

namespace App\Config;

use CodeIgniter\Config\BaseConfig;

class SocialPlatforms extends BaseConfig
{
    /**
     * Default platform metadata used when the database tables are empty.
     */
    public array $platforms = [
        'youtube' => [
            'display_name'        => 'YouTube',
            'base_url'            => 'https://youtube.com',
            'supports_groups'     => 1,
            'supports_short_video'=> 1,
            'supports_long_video' => 1,
            'supports_live'       => 1,
            'supports_polls'      => 1,
            'supports_threads'    => 0,
        ],
        'tiktok' => [
            'display_name'        => 'TikTok',
            'base_url'            => 'https://www.tiktok.com',
            'supports_groups'     => 0,
            'supports_short_video'=> 1,
            'supports_long_video' => 0,
            'supports_live'       => 1,
            'supports_polls'      => 1,
            'supports_threads'    => 0,
        ],
        'twitch' => [
            'display_name'        => 'Twitch',
            'base_url'            => 'https://twitch.tv',
            'supports_groups'     => 0,
            'supports_short_video'=> 0,
            'supports_long_video' => 1,
            'supports_live'       => 1,
            'supports_polls'      => 1,
            'supports_threads'    => 0,
        ],
        'discord' => [
            'display_name'        => 'Discord',
            'base_url'            => 'https://discord.gg',
            'supports_groups'     => 1,
            'supports_short_video'=> 0,
            'supports_long_video' => 0,
            'supports_live'       => 0,
            'supports_polls'      => 1,
            'supports_threads'    => 1,
        ],
        'facebook' => [
            'display_name'        => 'Facebook',
            'base_url'            => 'https://facebook.com',
            'supports_groups'     => 1,
            'supports_short_video'=> 1,
            'supports_long_video' => 1,
            'supports_live'       => 1,
            'supports_polls'      => 1,
            'supports_threads'    => 0,
        ],
        'linkedin' => [
            'display_name'        => 'LinkedIn',
            'base_url'            => 'https://www.linkedin.com',
            'supports_groups'     => 0,
            'supports_short_video'=> 1,
            'supports_long_video' => 1,
            'supports_live'       => 1,
            'supports_polls'      => 1,
            'supports_threads'    => 0,
        ],
        'x' => [
            'display_name'        => 'X (Twitter)',
            'base_url'            => 'https://twitter.com',
            'supports_groups'     => 0,
            'supports_short_video'=> 1,
            'supports_long_video' => 0,
            'supports_live'       => 1,
            'supports_polls'      => 1,
            'supports_threads'    => 1,
        ],
        'stocktwits' => [
            'display_name'        => 'StockTwits',
            'base_url'            => 'https://stocktwits.com',
            'supports_groups'     => 0,
            'supports_short_video'=> 0,
            'supports_long_video' => 0,
            'supports_live'       => 0,
            'supports_polls'      => 1,
            'supports_threads'    => 0,
        ],
    ];

    /**
     * Default body templates keyed by template_key.
     */
    public array $defaultTemplates = [
        'daily_news_digest' => "{HOOK}\n\n{VALUE}\n\nCTA: {CTA}\nLinks: {LINKS}\nTags: {HASHTAGS}\nTickers: {TICKERS}",
        'budget_tip' => "{HOOK}\n- {VALUE}\n\nTry it: {CTA}\n{LINKS}\n{HASHTAGS}",
        'investment_tip' => "{HOOK}\n{VALUE}\n\nNext: {CTA}\n{LINKS}\n{HASHTAGS}\n{TICKERS}",
        'trade_alert_digest' => "{HOOK}\n{VALUE}\n\nWatch: {TICKERS}\nCTA: {CTA}\n{LINKS}",
        'community_question' => "{HOOK}\n{VALUE}\n\nJoin the discussion: {CTA}\n{LINKS}\n{HASHTAGS}",
        'promo_free_tools' => "{HOOK}\n{VALUE}\n\nGet the free toolkit: {CTA}\n{LINKS}\n{HASHTAGS}",
        'promo_membership_discount' => "{HOOK}\n{VALUE}\n\nUpgrade today: {CTA}\n{LINKS}\n{HASHTAGS}",
        'promo_discord_invite' => "{HOOK}\n{VALUE}\n\nJoin Discord: {CTA}\n{LINKS}\n{HASHTAGS}",
        'weekly_recap' => "{HOOK}\n{VALUE}\n\nSee you live: {CTA}\nResources: {LINKS}\n{HASHTAGS}\n{TICKERS}",
    ];
}
