<?php declare(strict_types=1);

namespace App\Modules\Management\Controllers;

use App\Controllers\UserController;
use CodeIgniter\API\ResponseTrait;

class InvestmentsAdminController extends UserController
{
    use ResponseTrait;

    protected array $data = [];
    protected array $helpers = ['url', 'form', 'security'];

    public function index()
    {
        $this->data = $this->commonData();
        $this->data['pageTitle'] = $this->data['pageTitle'] ?? 'Investments - MyMI Management';

        return $this->renderTheme('Management/Investments/index', $this->data);
    }

    public function newsIndex()
    {
        $this->data = $this->commonData();
        $this->data['pageTitle'] = $this->data['pageTitle'] ?? 'Investments News - MyMI Management';

        return $this->renderTheme('Management/Investments/news', $this->data);
    }
}
