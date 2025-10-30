<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class PageSEOModel extends Model
{
    protected $table         = 'bf_marketing_page_seo';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = [
        'page_name','page_title','page_description','page_url',
        'page_internal_url','page_image','status','source',
        'created_at','updated_at'
    ];

    public function getByInternalUrl(string $slug): ?array
    {
        return $this->where('page_internal_url', $slug)
                    ->orderBy('id', 'DESC')
                    ->first();
    }

    public function getByPageName(string $pageName): ?array
    {
        return $this->where('page_name', $pageName)
                    ->orderBy('id', 'DESC')
                    ->first();
    }

    // Backward compatibility
    public function getPageSEOByName($pageTitle)
    {
        return $this->getByPageName($pageTitle);
    }

    public function saveOrUpdatePageSEO($seoData)
    {
        $existingSEO = $this->getByPageName($seoData['page_name']);

        if (empty($existingSEO)) {
            return $this->insert($seoData);
        }
        return $this->update($existingSEO['id'], $seoData);
    }
}
