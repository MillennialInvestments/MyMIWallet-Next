<?php

namespace App\Modules\Marketing_New\Libraries;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use voku\helper\HtmlDomParser;

class WebScraper
{
    protected $client;

    public function __construct()
    {
        $this->client = new HttpBrowser(HttpClient::create());
    }

    public function scrapeWebsite($url)
    {
        $crawler = $this->client->request('GET', $url);
        $html = $crawler->html();
        $dom = HtmlDomParser::str_get_html($html);

        // Extract data
        $data = [
            'url' => $url,
            'title' => $dom->find('title', 0)->innertext,
            'summary' => $dom->find('meta[name="description"]', 0)->content ?? '',
            'content' => $dom->find('body', 0)->innertext,
            'keywords' => $dom->find('meta[name="keywords"]', 0)->content ?? '',
            'links' => json_encode(array_map(function($element) {
                return $element->href;
            }, $dom->find('a'))),
            'images' => json_encode(array_map(function($element) {
                return $element->src;
            }, $dom->find('img'))),
            'videos' => json_encode(array_map(function($element) {
                return $element->src;
            }, $dom->find('video'))),
            'metadata' => json_encode(array_map(function($element) {
                return [
                    'name' => $element->name,
                    'content' => $element->content,
                ];
            }, $dom->find('meta'))),
            'structured_data' => json_encode(array_map(function($element) {
                return $element->innertext;
            }, $dom->find('script[type="application/ld+json"]'))),
            'additional_html_elements' => $html, // Customize as needed
            'scraped_at' => date('Y-m-d H:i:s'),
        ];

        return $data;
    }
}
