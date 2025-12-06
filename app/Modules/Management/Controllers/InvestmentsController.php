<?php declare(strict_types=1);

namespace App\Modules\Management\Controllers;

use App\Controllers\UserController;
use CodeIgniter\API\ResponseTrait;

class InvestmentsController extends UserController
{
    use ResponseTrait;

    protected array $data = [];
    protected array $helpers = ['url', 'form', 'security'];

    public function __construct()
    {
        parent::__construct();
    }

    public function newsIndex()
    {
        $this->data = $this->commonData();
        $this->data['pageTitle'] = $this->data['pageTitle'] ?? 'Investments News';

        return $this->renderTheme('Management/Investments/news', $this->data);
    }
}
