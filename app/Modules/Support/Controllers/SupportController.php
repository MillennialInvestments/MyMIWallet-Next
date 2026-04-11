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
    // protected array $socialMedia = [];
    protected $auth;
    protected $session;
    protected ?array $userAccount = null;
    protected $reportingCache = null;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
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

    public function view(string $slug = '')
    {
        $slug = trim($slug);
        if ($slug === '') {
            return redirect()->to(site_url('Support'));
        }

        $data = $this->commonData();
        $normalized = strtolower($slug);

        if ($normalized === 'faq') {
            return $this->renderTheme('SupportModule/Support/faq', $data);
        }

        $article = $this->supportModel?->findBySlug($slug);
        if (! empty($article)) {
            $data['article'] = $article;
            return $this->renderTheme('SupportModule/article', $data);
        }

        $viewCandidate = 'SupportModule/Support/' . str_replace('-', '_', strtolower($slug));
        if ($this->viewExists($viewCandidate)) {
            return $this->renderTheme($viewCandidate, $data);
        }

        log_message('info', 'SupportController::view - slug not found: ' . $slug);

        return redirect()->to(site_url('Support'))->with('warning', 'Support page not found.');
    }

    public function article(string $slug = 'welcome')
    {
        $data = $this->commonData();
        $normalizedSlug = trim(strtolower($slug)) !== '' ? trim(strtolower($slug)) : 'welcome';
        $article = $this->supportModel->findBySlug($normalizedSlug);
        $attemptedView = 'SupportModule/article';

        if (! is_array($article) || empty($article['title']) || empty($article['content'])) {
            $article = [
                'slug' => $normalizedSlug,
                'title' => ucfirst(str_replace('-', ' ', $normalizedSlug)),
                'content' => view('App\\Modules\\Support\\Views\\articles\\welcome'),
            ];

            log_message('notice', 'SupportController::article fallback article rendered', [
                'slug' => $normalizedSlug,
                'attempted_view' => $attemptedView,
            ]);
        }

        $data['article'] = $article;

        if (! $this->viewExists($attemptedView)) {
            log_message('error', 'SupportController::article missing primary template', [
                'slug' => $normalizedSlug,
                'attempted_view' => $attemptedView,
            ]);
        }

        return $this->renderTheme($attemptedView, $data);
    }

    public function discordOnboarding()
    {
        $config = config('DiscordHelp');

        $data = [
            'pageTitle'       => 'Discord Onboarding',
            'commands'        => $config->commands,
            'onboardingSteps' => $config->onboardingSteps,
        ] + $this->commonData();

        return $this->renderTheme('SupportModule/discord_onboarding', $data);
    }
}
