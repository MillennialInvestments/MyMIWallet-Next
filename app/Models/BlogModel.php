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
        $builder = $this->asArray()
            ->select('id, slug, title, excerpt, content, author, published_at, cover_image, updated_at')
            ->where('slug', $slug);

        $builder = $this->applyPublishedScope($builder);

        return $builder
            ->limit(1)
            ->first();
    }

    public function getPublishedListing(int $perPage = 12): array
    {
        $builder = $this->asArray()
            ->select('id, slug, title, excerpt, published_at, cover_image');

        $builder = $this->applyPublishedScope($builder);

        return $builder
            ->orderBy('published_at', 'DESC')
            ->paginate($perPage);
    }
    public function getTotalPublishedPosts(): int
    {
        $builder = $this->builder();

        $builder = $this->applyPublishedScope($builder);

        return $builder->countAllResults();
    }

    public function getRecentPosts(int $limit = 5): array
    {
        $builder = $this->asArray()
            ->select('id, slug, title, excerpt, published_at, cover_image');

        $builder = $this->applyPublishedScope($builder);

        return $builder
            ->orderBy('published_at', 'DESC')
            ->limit($limit)
            ->findAll();
    }

    private function applyPublishedScope($builder)
    {
        if ($this->db->fieldExists('status', $this->table)) {
            $builder->where('status', 'published');
        }

        return $builder;
    }
    
}
