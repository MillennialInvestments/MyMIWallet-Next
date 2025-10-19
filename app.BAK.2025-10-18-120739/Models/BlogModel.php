<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table      = 'bf_marketing_blog_posts';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = [];

    public function getPostBySlug(string $slug): ?array
    {
        return $this->asArray()
            ->select('id, slug, title, excerpt, content, author, published_at, cover_image, updated_at')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->limit(1)
            ->first();
    }

    public function getPublishedListing(int $perPage = 12): array
    {
        return $this->asArray()
            ->select('id, slug, title, excerpt, published_at, cover_image')
            ->where('status', 'published')
            ->orderBy('published_at', 'DESC')
            ->paginate($perPage);
    }
    public function getTotalPublishedPosts(): int
    {
        return $this->where('status', 'published')->countAllResults();
    }

    public function getRecentPosts(int $limit = 5): array
    {
        return $this->asArray()
            ->select('id, slug, title, excerpt, published_at, cover_image')
            ->where('status', 'published')
            ->orderBy('published_at', 'DESC')
            ->limit($limit)
            ->findAll();
    }
    
}