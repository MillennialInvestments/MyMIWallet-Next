<?php namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use App\Libraries\MyMIDiscord;
use CodeIgniter\CLI\CLI;

class DiscordTestCategory extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:discord:test-category';
    protected $description = 'Send a category-formatted test message to the mapped Discord channel.';
    protected $options = ['--category' => 'Category key to test.'];

    private const SUPPORTED = [
        'community_news', 'announcements', 'mymi_news', 'crypto_news', 'financial_news', 'stock_news',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $category = strtolower(trim((string) (($flags['category'] ?? null) ?? CLI::getOption('category') ?? '')));
        if (! in_array($category, self::SUPPORTED, true)) {
            CLI::error('Unsupported or missing --category. Allowed: ' . implode(', ', self::SUPPORTED));
            return EXIT_ERROR;
        }

        $cfg = config('MarketingDistribution');
        $map = (array) ($cfg->discord['category_channel_map'] ?? []);
        $channels = (array) ($map[$category] ?? []);
        $channelKey = (string) ($channels[0] ?? $cfg->discord['fallback_channel'] ?? 'community_news');
        $channelId = (string) ($cfg->discord['channels'][$channelKey] ?? '');

        $payload = [
            'content' => sprintf("🧪 Category test for **%s**\nChannel: `%s`\nTime: %s", $category, $channelKey, date('Y-m-d H:i:s')),
            'allowed_mentions' => ['parse' => []],
        ];

        $result = (new MyMIDiscord())->sendToChannel($channelKey, $payload, $channelId !== '' ? $channelId : null);
        $output = [
            'success' => (bool) ($result['success'] ?? false),
            'category' => $category,
            'channel_key' => $channelKey,
            'channel_id' => $channelId,
            'external_message_id' => $result['external_message_id'] ?? null,
            'transport' => $result['transport'] ?? null,
            'error_message' => $result['error_message'] ?? null,
        ];

        CLI::write(json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        return $output['success'] ? EXIT_SUCCESS : EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
