<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\BlogModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;

class Blog extends BaseController
{
    protected BlogModel $blogModel;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        helper(['text', 'url']);
        $this->blogModel = new BlogModel();
    }

    public function index(): string
    {
        $posts = $this->blogModel->getRecentPosts(10);
        $metaTitle = 'MyMI Wallet Blog | Trade Alerts & Investment Strategies';
        $metaDescription = 'Explore trade alerts, investment strategies, and financial tools from MyMI Wallet to level up your crypto wallet, budgeting, and portfolio management.';
        $metaKeywords = $this->defaultKeywords();

        return view('blog/index', [
            'posts' => $posts,
            'metaTitle' => $metaTitle,
            'metaDescription' => $metaDescription,
            'metaKeywords' => $metaKeywords,
        ]);
    }

    public function post(string $slug): ResponseInterface|string
    {
        $post = $this->blogModel->getPostBySlug($slug);

        if (! $post) {
            throw PageNotFoundException::forPageNotFound();
        }

        $metaTitle = $post['title'] . ' | MyMI Wallet Blog';
        $metaDescription = $post['meta_description']
            ?? character_limiter(strip_tags($post['content']), 160);
        $metaKeywords = $post['meta_keywords'] ?: $this->defaultKeywords();
        $seoKeywords = array_filter(array_map('trim', explode(',', $metaKeywords)));

        $relatedPosts = [];
        if (! empty($post['category_id'])) {
            $relatedPosts = $this->blogModel->getRelatedPosts((int) $post['id'], (int) $post['category_id']);
        }

        $breadcrumbs = [
            ['name' => 'Home', 'url' => base_url('/')],
            ['name' => 'Blog', 'url' => base_url('blog')],
            ['name' => $post['title'], 'url' => current_url()],
        ];

        return view('blog/single_post', [
            'post' => $post,
            'metaTitle' => $metaTitle,
            'metaDescription' => $metaDescription,
            'metaKeywords' => $metaKeywords,
            'relatedPosts' => $relatedPosts,
            'breadcrumbs' => $breadcrumbs,
            'seoKeywords' => $seoKeywords,
        ]);
    }

    public function category(string $categorySlug): ResponseInterface|string
    {
        $category = $this->blogModel->getCategoryBySlug($categorySlug);
        $categoryId = $category['id'] ?? null;

        if (! $categoryId && is_numeric($categorySlug)) {
            $categoryId = (int) $categorySlug;
        }

        if (! $categoryId) {
            throw PageNotFoundException::forPageNotFound();
        }

        $posts = $this->blogModel->getPostsByCategory((int) $categoryId);
        $categoryName = $category['name'] ?? ucwords(str_replace('-', ' ', $categorySlug));
        $metaTitle = $categoryName . ' | MyMI Wallet Blog';
        $metaDescription = $category['meta_description']
            ?? 'Latest updates on ' . strtolower($categoryName) . ' including trade alerts, investment strategies, and financial tools from MyMI Wallet.';
        $metaKeywords = $category['meta_keywords'] ?: $this->defaultKeywords();

        return view('blog/category', [
            'categoryName' => $categoryName,
            'posts' => $posts,
            'metaTitle' => $metaTitle,
            'metaDescription' => $metaDescription,
            'metaKeywords' => $metaKeywords,
        ]);
    }

    private function defaultKeywords(): string
    {
        return implode(', ', [
            'Trade Alerts',
            'Investment Strategies',
            'MyMI Wallet',
            'Financial Tools',
            'Crypto Wallet',
            'Personal Budgeting',
            'automated financial insights',
            'investment portfolio management',
            'investor profile',
            'financial news',
        ]);
    }
}
