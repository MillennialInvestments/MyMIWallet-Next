<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SocialCreateSampleTracking extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:social:create-sample-tracking';
    protected $description = 'Create sample tracking link, click, and conversion events.';

    public function run(array $params)
    {
        $service = new \App\Services\SocialTrackingService();

        $link = $service->createTrackingLink([
            'platform_key' => 'discord',
            'source' => 'discord',
            'medium' => 'community',
            'campaign' => 'sample-community-growth',
            'content' => 'sample-post',
            'destination_url' => site_url('/Register'),
        ]);

        if (($link['status'] ?? '') === 'success') {
            $service->recordClick(['tracking_link_id' => $link['tracking_link_id']]);
            $service->recordConversion([
                'tracking_link_id' => $link['tracking_link_id'],
                'conversion_type' => 'registration',
                'conversion_value' => 0,
            ]);
            $service->recordConversion([
                'tracking_link_id' => $link['tracking_link_id'],
                'conversion_type' => 'revenue',
                'conversion_value' => 49.99,
            ]);
        }

        $metrics = $service->refreshMetrics();

        CLI::write(json_encode(['status' => 'success', 'link' => $link, 'metrics' => $metrics], JSON_PRETTY_PRINT));
        return EXIT_SUCCESS;
    }
}
