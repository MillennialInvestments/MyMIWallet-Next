<?php namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use App\Libraries\MyMIDiscord;
use CodeIgniter\CLI\CLI;

class DiscordTestAllCategories extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:discord:test-all-categories';
    protected $description = 'Loop all configured marketing Discord categories and test post delivery.';

    public function run(array $params)
    {
        $this->parseParams($params);
        $cfg = config('MarketingDistribution');
        $map = (array) ($cfg->discord['category_channel_map'] ?? []);
        $discord = new MyMIDiscord();
        $results = [];

        foreach ($map as $category => $channelKeys) {
            $channelKey = (string) (($channelKeys[0] ?? '') ?: ($cfg->discord['fallback_channel'] ?? 'community_news'));
            $channelId = (string) ($cfg->discord['channels'][$channelKey] ?? '');
            $payload = [
                'content' => sprintf('🧪 Bulk category test: **%s** (%s)', $category, date('Y-m-d H:i:s')),
                'allowed_mentions' => ['parse' => []],
            ];
            $send = $discord->sendToChannel($channelKey, $payload, $channelId !== '' ? $channelId : null);
            $results[] = [
                'category' => (string) $category,
                'channel_key' => $channelKey,
                'success' => (bool) ($send['success'] ?? false),
                'external_message_id' => $send['external_message_id'] ?? null,
                'error_message' => $send['error_message'] ?? null,
            ];
        }

        CLI::write(json_encode(['results' => $results], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $failures = count(array_filter($results, static fn(array $row): bool => ! $row['success']));

        return $failures === 0 ? EXIT_SUCCESS : EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
