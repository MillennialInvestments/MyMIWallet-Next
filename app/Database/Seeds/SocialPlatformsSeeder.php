<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SocialPlatformsSeeder extends Seeder
{
    public function run(): void
    {
        $platforms = [
            ['platform_key' => 'youtube', 'display_name' => 'YouTube', 'base_url' => 'https://www.youtube.com', 'supports_groups' => 0, 'supports_short_video' => 1, 'supports_long_video' => 1, 'supports_live' => 1, 'supports_polls' => 1, 'supports_threads' => 0],
            ['platform_key' => 'tiktok', 'display_name' => 'TikTok', 'base_url' => 'https://www.tiktok.com', 'supports_groups' => 0, 'supports_short_video' => 1, 'supports_long_video' => 0, 'supports_live' => 1, 'supports_polls' => 0, 'supports_threads' => 0],
            ['platform_key' => 'twitch', 'display_name' => 'Twitch', 'base_url' => 'https://www.twitch.tv', 'supports_groups' => 0, 'supports_short_video' => 1, 'supports_long_video' => 1, 'supports_live' => 1, 'supports_polls' => 1, 'supports_threads' => 0],
            ['platform_key' => 'discord', 'display_name' => 'Discord', 'base_url' => 'https://discord.com', 'supports_groups' => 1, 'supports_short_video' => 0, 'supports_long_video' => 0, 'supports_live' => 1, 'supports_polls' => 1, 'supports_threads' => 1],
            ['platform_key' => 'facebook', 'display_name' => 'Facebook', 'base_url' => 'https://www.facebook.com', 'supports_groups' => 1, 'supports_short_video' => 1, 'supports_long_video' => 1, 'supports_live' => 1, 'supports_polls' => 1, 'supports_threads' => 1],
            ['platform_key' => 'linkedin', 'display_name' => 'LinkedIn', 'base_url' => 'https://www.linkedin.com', 'supports_groups' => 1, 'supports_short_video' => 1, 'supports_long_video' => 1, 'supports_live' => 1, 'supports_polls' => 1, 'supports_threads' => 0],
            ['platform_key' => 'x', 'display_name' => 'X / Twitter', 'base_url' => 'https://x.com', 'supports_groups' => 1, 'supports_short_video' => 1, 'supports_long_video' => 1, 'supports_live' => 1, 'supports_polls' => 1, 'supports_threads' => 1],
            ['platform_key' => 'stocktwits', 'display_name' => 'StockTwits', 'base_url' => 'https://stocktwits.com', 'supports_groups' => 0, 'supports_short_video' => 0, 'supports_long_video' => 0, 'supports_live' => 0, 'supports_polls' => 0, 'supports_threads' => 0],
        ];

        foreach ($platforms as $platform) {
            $exists = $this->db->table('bf_social_platforms')
                ->where('platform_key', $platform['platform_key'])
                ->countAllResults();

            if ($exists > 0) {
                continue;
            }

            $platform['created_at'] = date('Y-m-d H:i:s');
            $platform['updated_at'] = date('Y-m-d H:i:s');

            $this->db->table('bf_social_platforms')->insert($platform);
        }
    }
}
