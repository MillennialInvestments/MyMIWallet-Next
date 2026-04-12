<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use App\Libraries\MyMIMarketing;
use App\Services\Marketing\MarketingNotificationService;
use CodeIgniter\CLI\CLI;
use Config\Database;

class ProcessNotifications extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:process-notifications';
    protected $description = 'Process pending marketing notifications and generate marketing packages.';

    public function run(array $params)
    {
        $db = Database::connect();
        $records = $db->table('bf_marketing_notifications')
            ->where('status', 'processed')
            ->where('summary IS NOT NULL', null, false)
            ->where('id NOT IN (SELECT notification_id FROM bf_marketing_generated_content WHERE notification_id IS NOT NULL)', null, false)
            ->limit(25)
            ->get()
            ->getResultArray();

        if (empty($records)) {
            CLI::write('No notifications to process.');
            return;
        }

        $marketing = service('MyMIMarketing');
        if (! $marketing instanceof MyMIMarketing) {
            $marketing = new MyMIMarketing();
        }

        $service = new MarketingNotificationService($marketing);

        foreach ($records as $record) {
            try {
                $storyId = $service->attachToStory($record);
                $package = $service->generateMarketingPackage($record, $storyId);

                $db->table('bf_marketing_generated_content')->insert([
                    'notification_id' => (int) $record['id'],
                    'story_id' => $storyId,
                    'content_json' => json_encode($package),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                CLI::write('Processed notification #' . $record['id']);
            } catch (\Throwable $e) {
                log_message('error', 'marketing:process-notifications failed for ID ' . $record['id'] . ': ' . $e->getMessage());
                CLI::error('Failed notification #' . $record['id'] . ': ' . $e->getMessage());
            }
        }
    }
}
