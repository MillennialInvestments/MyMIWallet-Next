<?php declare(strict_types=1);

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseAdminController;

use CodeIgniter\API\ResponseTrait;

class DevelopmentAdminController extends BaseAdminController
{
    use ResponseTrait;

    protected ?int $cuID = null;
    protected array $data = [];

    public function index(): string
    {
        $this->data = $this->commonData();
        $this->data['pageTitle'] = $this->data['pageTitle'] ?? 'Development Roadmap';

        return $this->renderTheme('App\\Modules\\Management\\Views\\Development\\index', $this->data);
    }
}
