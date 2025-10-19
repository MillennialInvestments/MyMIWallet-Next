<?php declare(strict_types=1);

namespace App\Modules\Management\Controllers;

use App\Controllers\UserController;
use CodeIgniter\API\ResponseTrait;

class HRController extends UserController
{
    use ResponseTrait;

    protected ?int $cuID = null;
    protected array $data = [];
    protected array $helpers = ['url', 'form', 'security'];

    public function __construct()
    {
        parent::__construct();
    }

    public function index(): string
    {
        $this->data = $this->commonData();
        $this->data['pageTitle'] = $this->data['pageTitle'] ?? 'Human Resources';

        return $this->renderTheme('App\\Modules\\Management\\Views\\HR\\index', $this->data);
    }
}