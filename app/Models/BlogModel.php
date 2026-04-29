<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blog_posts';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $allowedFields = [
        'title',
        'slug',
        'content',
        'meta_description',
        'meta_keywords',
        'featured_image',
        'category_id',
        'published_at',
        'created_at',
        'updated_at',
    ];

    private ?bool $blogTableExists = null;

    private function canQueryBlogTable(): bool
    {
        if ($this->blogTableExists !== null) {
            return $this->blogTableExists;
        }

        $this->blogTableExists = $this->db->tableExists($this->table);
        if (! $this->blogTableExists) {
            log_message('warning', 'BlogModel table missing; returning empty results.', [
                'table' => $this->table,
            ]);
        }

        return $this->blogTableExists;
    }

    public function getPostBySlug(string $slug): ?array
    {
        if (! $this->canQueryBlogTable()) {
            return null;
        }

        return $this->asArray()
            ->where('slug', $slug)
            ->where('published_at <=', date('Y-m-d H:i:s'))
            ->first();
    }

    public function getRecentPosts(int $limit): array
    {
        if (! $this->canQueryBlogTable()) {
            return [];
        }

        return $this->asArray()
            ->where('published_at <=', date('Y-m-d H:i:s'))
            ->orderBy('published_at', 'DESC')
            ->limit($limit)
            ->findAll(20);
    }

    public function getPostsByCategory(int $categoryId): array
    {
        if (! $this->canQueryBlogTable()) {
            return [];
        }

        return $this->asArray()
            ->where('category_id', $categoryId)
            ->where('published_at <=', date('Y-m-d H:i:s'))
            ->orderBy('published_at', 'DESC')
            ->findAll(20);
    }

    public function getRelatedPosts(int $currentPostId, int $categoryId, int $limit = 3): array
    {
        if (! $this->canQueryBlogTable()) {
            return [];
        }

        return $this->asArray()
            ->select('id, title, slug, published_at, featured_image')
            ->where('category_id', $categoryId)
            ->where('id !=', $currentPostId)
            ->where('published_at <=', date('Y-m-d H:i:s'))
            ->orderBy('published_at', 'DESC')
            ->limit($limit)
            ->findAll(20);
    }

    public function getCategoryBySlug(string $slug): ?array
    {
        if (! $this->db->tableExists('blog_categories')) {
            return null;
        }

        $category = $this->db->table('blog_categories')
            ->select('id, name, slug, meta_description, meta_keywords')
            ->where('slug', $slug)
            ->get()
            ->getRowArray();

        return $category ?: null;
    }

    public function getPublishedListing(int $perPage = 12): array
    {
        if (! $this->canQueryBlogTable()) {
            return [];
        }

        $perPage = max(1, $perPage);
        $now = date('Y-m-d H:i:s');

        return $this->asArray()
            ->where('published_at IS NOT NULL')
            ->where('published_at <=', $now)
            ->orderBy('published_at', 'DESC')
            ->paginate($perPage);
    }
}
