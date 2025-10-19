<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use App\Models\SitemapModel;
use CodeIgniter\HTTP\IncomingRequest;

#[\AllowDynamicProperties]
class SitemapController extends \App\Controllers\BaseController
{
    protected $sitemapModel;
    protected $articles;

    public function __construct()
    {
        $this->sitemapModel = new SitemapModel();
        $this->articles = [
            [
                'loc' => base_url('articles/lorem-ipsum-dolor-sit-amet'),
                'lastmod' => date('Y-m-d', time()),
                'changefreq' => 'monthly',
                'priority' => 0.5
            ],
            [
                'loc' => base_url('articles/consectetur-adipiscing-elit'),
                'lastmod' => date('Y-m-d', time()),
                'changefreq' => 'monthly',
                'priority' => '1'
            ],
            [
                'loc' => base_url('articles/nullam-nec-magna-eu-tellus-placerat-tempus'),
                'lastmod' => date('Y-m-d', time()),
                'changefreq' => 'monthly',
                'priority' => false
            ]
        ];
    }

    public function index()
    {
        $this->sitemapModel->add(base_url('sitemap/general'), date('Y-m-d', time()));
        $this->sitemapModel->add(base_url('sitemap/articles'), date('Y-m-d', time()));
        $this->sitemapModel->output('sitemapindex');
    }

    public function general()
    {
        $this->sitemapModel->add(base_url(), null, 'monthly', 1);
        $this->sitemapModel->add(base_url('contact'), null, 'monthly', 0.9);
        foreach ($this->articles as $article) {
            $this->sitemapModel->add($article['loc'], $article['lastmod'], $article['changefreq'], $article['priority']);
        }
        $this->sitemapModel->output();
    }

    public function articles()
    {
        foreach ($this->articles as $article) {
            $this->sitemapModel->add($article['loc'], $article['lastmod'], $article['changefreq'], $article['priority']);
        }
        $this->sitemapModel->output();
    }
}
