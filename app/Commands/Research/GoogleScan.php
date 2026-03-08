<?php

namespace App\Commands\Research;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class GoogleScan extends SafeBaseCommand
{
    protected $group = 'research';
    protected $name = 'research:google:scan';

    public function run(array $params)
    {

        $queries = [
            'stock market news today',
            'top stocks today analysis',
            'market outlook today',
            'federal reserve news',
            'earnings reports today',
        ];

        $results = [];

        foreach ($queries as $query) {

            $url = "https://www.google.com/search?q=" . urlencode($query);

            $html = @file_get_contents($url);

            preg_match_all('/<a href="\/url\?q=(.*?)&/', $html, $matches);

            foreach ($matches[1] as $link) {

                $results[] = [
                    'query' => $query,
                    'url' => urldecode($link),
                    'created_at' => date('Y-m-d H:i:s')
                ];
            }
        }

        file_put_contents(
            ROOTPATH . 'docs/_google_financial_links.json',
            json_encode($results, JSON_PRETTY_PRINT)
        );

        CLI::write("Financial links discovered: " . count($results), 'green');
    }
}