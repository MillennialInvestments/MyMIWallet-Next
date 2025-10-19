<?php namespace App\Libraries;

use App\Config\MyMIBlogger as MyMIBloggerConfig;

#[\AllowDynamicProperties]
class MyMIBlogger
{
    /** @var MyMIBloggerConfig */
    protected $cfg;

    public function __construct()
    {
        $this->cfg = config('MyMIBlogger');
    }

    /** Build a creative brief from user seed + marketing defaults */
    public function composeBrief(array $seed): array
    {
        $campaign = $seed['campaign'] ?? [];
        $brief = [
            'campaign_name' => trim($campaign['name'] ?? 'Untitled Campaign'),
            'goal'          => $campaign['goal'] ?? 'acquisition',
            'audience'      => $campaign['audience'] ?? 'retail crypto users',
            'tone'          => $campaign['tone'] ?? $this->cfg->defaultTone,
            'channels'      => $campaign['channels'] ?? $this->cfg->defaultChannels,
            'length'        => $campaign['length'] ?? 'standard',
            'keywords'      => (array)($campaign['keywords'] ?? []),
            'assets'        => (array)($campaign['assets'] ?? []),
            'utm'           => (array)($campaign['utm'] ?? []),
            'cta_url'       => $campaign['assets']['cta_url'] ?? $this->cfg->defaultCTA,
            'brand'         => [
                'voice'      => $this->cfg->brandVoice,
                'prohibited' => $this->cfg->prohibitedPhrases,
            ],
            'features'      => service('MyMIMarketing')->coreFeatures(),
            'valueProps'    => service('MyMIMarketing')->valueProps(),
            'legal'         => service('MyMIMarketing')->disclaimers(),
        ];
        return $brief;
    }

    /** Orchestrate generation for multiple channels */
    public function generateCampaignContent(array $brief): array
    {
        $blocks = [];
        foreach ($brief['channels'] as $channel) {
            $blocks[] = $this->generateForChannel($channel, $brief);
        }
        return array_values(array_filter($blocks));
    }

    /** Generate a single channel block */
    public function generateForChannel(string $channel, array $brief): ?array
    {
        $prompt = $this->renderPrompt($channel, $brief);
        $html   = service('marketingService')->generateCopy($prompt);
        return $this->normalizeBlock($channel, $brief, $html);
    }

    /** Render prompt template */
    public function renderPrompt(string $channel, array $brief): string
    {
        $map = [
            'blog'     => APPPATH . 'Views/Marketing/prompts/blog.md',
            'email'    => APPPATH . 'Views/Marketing/prompts/email.md',
            'x'        => APPPATH . 'Views/Marketing/prompts/social_x.md',
            'linkedin' => APPPATH . 'Views/Marketing/prompts/social_linkedin.md',
        ];
        $file = $map[$channel] ?? $map['blog'];
        return service('marketingService')->renderTemplate($file, $brief);
    }

    /** Normalize generated HTML */
    public function normalizeBlock(string $channel, array $brief, string $html): array
    {
        return [
            'id'        => bin2hex(random_bytes(8)),
            'channel'   => $channel,
            'title'     => $this->extractTitle($html, $brief),
            'html'      => service('marketingService')->sanitizeHtml($html),
            'excerpt'   => service('marketingService')->excerpt($html, 220),
            'cta_url'   => $brief['cta_url'],
            'keywords'  => $brief['keywords'],
            'meta'      => [
                'length'   => $brief['length'],
                'tone'     => $brief['tone'],
                'goal'     => $brief['goal'],
                'audience' => $brief['audience'],
            ],
            'status'    => 'draft',
            'created_at'=> date('c'),
        ];
    }

    /** Repurpose existing block for another channel */
    public function repurpose(array $block, string $targetChannel): array
    {
        $brief = $this->composeBrief(['campaign' => [
            'name'     => $block['title'] ?? 'Repurpose',
            'audience' => $block['meta']['audience'] ?? 'retail crypto users',
            'tone'     => $block['meta']['tone'] ?? $this->cfg->defaultTone,
            'channels' => [$targetChannel],
            'keywords' => $block['keywords'] ?? [],
            'assets'   => ['cta_url' => $block['cta_url'] ?? $this->cfg->defaultCTA],
        ]]);
        return $this->generateForChannel($targetChannel, $brief);
    }

    /** Extract a title from generated HTML */
    protected function extractTitle(string $html, array $brief): string
    {
        if (preg_match('/<h1[^>]*>(.*?)<\/h1>/', $html, $m)) {
            return strip_tags($m[1]);
        }
        return $brief['campaign_name'] ?? 'Untitled';
    }
}
?>
