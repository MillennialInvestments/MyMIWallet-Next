<?php

declare(strict_types=1);

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use App\Models\ContentIdeaModel;
use App\Models\ContentPostModel;

class ContentEngineAdminController extends BaseController
{
    protected ContentPostModel $postModel;
    protected ContentIdeaModel $ideaModel;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->postModel = model(ContentPostModel::class);
        $this->ideaModel = model(ContentIdeaModel::class);
    }

    public function previewPost(int $postId)
    {
        $post = $this->postModel->find($postId);
        if (! $post) {
            return $this->response->setStatusCode(404)->setBody('Post not found');
        }

        $idea = $this->ideaModel->find($post['idea_id']);
        $data = [
            'post' => $post,
            'idea' => $idea,
            'payload' => json_decode($post['payload_json'] ?? '{}', true),
        ];

        return view('App\Modules\Management\Views\ContentEngine\modals\post_preview', $data);
    }
}