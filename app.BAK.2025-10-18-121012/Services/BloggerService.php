<?php namespace App\Services;

class BloggerService
{
    /** Compose brief and generate content blocks */
    public function composeAndGenerate(array $payload): array
    {
        $lib   = new \App\Libraries\MyMIBlogger();
        $brief = $lib->composeBrief($payload);
        $blocks= $lib->generateCampaignContent($brief);
        return ['campaignId' => bin2hex(random_bytes(8)), 'blocks' => $blocks];
    }

    /** Repurpose a block for another channel */
    public function repurpose(array $block, string $channel): array
    {
        $lib = new \App\Libraries\MyMIBlogger();
        return $lib->repurpose($block, $channel);
    }
}
?>