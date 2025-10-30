<?php

namespace App\Modules\Marketing_New\Models;

use CodeIgniter\Model;

class MarketingModel extends Model
{
    protected $table = 'bf_marketing_scraper';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'status', 'type', 'url', 'title', 'summary', 'content', 'email_identifier', 'email_date',
        'email_sender', 'email_subject', 'email_body', 'email_attachments', 'keywords', 'scraped_at',
        'created_on', 'modified_on', 'links', 'images', 'videos', 'metadata', 'structured_data',
        'additional_html_elements', 'page_performance'
    ];

    public function saveScrapedData($scrapedData, $generatedContent)
    {
        $data = array_merge($scrapedData, ['generated_content' => $generatedContent]);
        return $this->db->table('bf_marketing_temp_scraper')->insert($data);
    }

    public function fetchEmails()
    {
        return $this->db->table('emails')->get()->getResultArray();
    }

    public function getEmailById($emailId)
    {
        return $this->db->table('emails')->where('id', $emailId)->get()->getRowArray();
    }

    public function saveGeneratedContent($content)
    {
        $data = [
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        return $this->db->table('generated_content')->insert($data);
    }
}
