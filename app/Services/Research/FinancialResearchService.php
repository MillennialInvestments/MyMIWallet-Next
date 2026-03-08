<?php

namespace App\Services\Research;

use Config\Database;

class FinancialResearchService
{

    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function storeNews($source, $title, $url, $summary = null)
    {

        return $this->db->table('bf_financial_news')->insert([
            'source' => $source,
            'title' => $title,
            'url' => $url,
            'summary' => $summary,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

}