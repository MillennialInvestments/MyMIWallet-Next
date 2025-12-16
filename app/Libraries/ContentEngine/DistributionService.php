<?php

declare(strict_types=1);

namespace App\Libraries\ContentEngine;

use App\Models\ContentPostModel;

class DistributionService
{
    protected ContentPostModel $postModel;

    public function __construct()
    {
        $this->postModel = model(ContentPostModel::class);
    }

    public function send(int $postId): array
    {
        $post = $this->postModel->find($postId);
        if (! $post) {
            return ['status' => 'error', 'message' => 'Post not found'];
        }

        // Stub: integrate Zapier or Discord here
        $this->postModel->update($postId, [
            'status' => 'sent',
            'last_error' => null,
        ]);

        return ['status' => 'sent'];
    }
}