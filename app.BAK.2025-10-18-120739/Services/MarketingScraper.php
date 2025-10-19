<?php
namespace App\Services;

use App\Models\MarketingModel;

class MarketingScraper
{
    /**
     * Queue a link for the existing Marketing scraper pipeline.
     */
    public function queueLink(string $url, array $meta = []): bool
    {
        $model = model(MarketingModel::class);
        $data = [
            'title'       => $meta['title'] ?? null,
            'content'     => $meta['note'] ?? null,
            'links'       => json_encode([$url]),
            'url'         => $url,
            'source'      => $meta['source'] ?? 'email-intake',
            'scraped_at'  => date('Y-m-d H:i:s'),
            'created_on'  => date('Y-m-d H:i:s'),
            'modified_on' => date('Y-m-d H:i:s'),
        ];
        return (bool) $model->storeTempScrapedData($data);
    }
}
?>