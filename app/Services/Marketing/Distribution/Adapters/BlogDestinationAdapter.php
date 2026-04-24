<?php

declare(strict_types=1);

namespace App\Services\Marketing\Distribution\Adapters;

use App\Models\MarketingModel;
use App\Services\Marketing\Distribution\DestinationSendResult;
use Config\Database;

final class BlogDestinationAdapter implements DestinationAdapterInterface
{
    public function __construct(private MarketingModel $marketingModel)
    {
    }

    public function send(array $target, array $payload): DestinationSendResult
    {
        $db = Database::connect();
        $generatedContentId = (int) ($target['generated_content_id'] ?? 0);

        $existing = $db->table('bf_marketing_blog_posts')->where('generated_content_id', $generatedContentId)->get()->getRowArray();
        $data = [
            'generated_content_id' => $generatedContentId,
            'title' => (string) ($payload['title'] ?? 'Marketing Update'),
            'content' => (string) ($payload['content'] ?? $payload['summary'] ?? ''),
            'excerpt' => mb_substr((string) ($payload['summary'] ?? ''), 0, 220),
            'status' => 'published',
            'meta_json' => json_encode(['source' => 'distribution_engine', 'generated_content_id' => $generatedContentId]),
            'modified_on' => date('Y-m-d H:i:s'),
        ];

        if (empty($existing)) {
            $data['slug'] = $this->marketingModel->createSlug((string) $data['title']);
            $data['created_on'] = date('Y-m-d H:i:s');
            $db->table('bf_marketing_blog_posts')->insert($data);
            $externalId = (string) $db->insertID();
        } else {
            $externalId = (string) ($existing['id'] ?? '');
            $db->table('bf_marketing_blog_posts')->where('id', (int) $externalId)->update($data);
        }

        return new DestinationSendResult(true, 200, false, null, $externalId, 'blog_published', date('Y-m-d H:i:s'));
    }
}
