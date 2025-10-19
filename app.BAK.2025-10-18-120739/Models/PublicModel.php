<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class PublicModel extends Model
{
    protected $table = 'bf_applications'; // Update as per CI4 database schema
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'Name', 'email', 'phone', 'message', // Update with actual fields from your database
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_on';
    protected $updatedField = 'modified_on';
    protected $createdByField = 'created_by';
    protected $updatedByField = 'modified_by';

    protected $validationRules = [
        'Name' => 'required|alpha|max_length[255]',
        'email' => 'required|valid_email|max_length[255]',
        'phone' => 'required|max_length[30]',
        'message' => 'alpha_dash|max_length[255]',
    ];

    public $galleryPath;

    public function __construct()
    {
        parent::__construct();
        $this->galleryPath = realpath(APPPATH . '../images/');
    }

    // Implement the methods from the CI3 model

    public function getMarketingSeo($pageName)
    {
        return $this->table('bf_marketing_page_seo')
                    ->where('page_name', $pageName)
                    ->get()
                    ->getResult();
    }

    public function getPageSeo($pageName)
    {
        return $this->table('bf_marketing_page_seo')
                    ->where('page_name', $pageName)
                    ->get()
                    ->getResult();
    }

    public function getSymbolHeader($symbol)
    {
        return $this->table('bf_investment_stock_listing')
                    ->where('symbol', $symbol)
                    ->get()
                    ->getResult();
    }

    public function getAllWalletsCount()
    {
        return $this->table('bf_users_wallet')
                    ->countAllResults();
    }

    public function getAllTradesCount()
    {
        return $this->table('bf_users_trades')
                    ->countAllResults();
    }

    public function getAllGoldCount()
    {
        return $this->table('bf_users_coin_purchases')
                    ->selectSum('total')
                    ->get()
                    ->getRow();
    }

    // Add any remaining methods as needed...
}
