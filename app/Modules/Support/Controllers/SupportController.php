<?php
namespace App\Modules\Support\Controllers;

use App\Controllers\UserController;
use CodeIgniter\API\ResponseTrait;
use App\Models\{PageSEOModel, SubscribeModel, SupportModel, UserModel};

class SupportController extends UserController
{
    use ResponseTrait;
    // protected array $helpers = ['auth', 'directory', 'form', 'file', 'url'];

    protected ?int $cuID = null;               // ✅ match BaseController
    protected ?SupportModel $supportModel = null;
    protected ?UserModel $userModel = null;
    protected ?PageSEOModel $pageSEOModel = null;
    protected ?SubscribeModel $subscribeModel = null;

    // protected array $siteSettings = [];
    protected $auth;
    protected $session;
    protected ?array $userAccount = null;
    protected $reportingCache = null;

    public function __construct()
    {
        // parent::__construct();
        $this->supportModel   = model(SupportModel::class);
        $this->userModel      = model(UserModel::class);
        $this->pageSEOModel   = model(PageSEOModel::class);
        $this->subscribeModel = model(SubscribeModel::class);
        // $this->cuID comes from UserController/BaseController; leave null-tolerant usage
    }

    public function index()
    {
        $data = $this->commonData(); // ensure BaseLoader/commonData returns arrays
        return $this->renderTheme('SupportModule\Views\Support\index', $data);
    }

    public function article(string $slug = 'welcome')
    {
        $data = $this->commonData();
        $data['article'] = $this->supportModel->findBySlug($slug);
        return $this->renderTheme('SupportModule/Support/article', $data);
    }
}