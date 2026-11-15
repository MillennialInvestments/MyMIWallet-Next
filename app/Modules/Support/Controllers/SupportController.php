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

    /**
     * GT-FORM-ROUTES-001: POST /Support/Manager, the "Submit Request" form (JSON or form-encoded).
     */
    public function submitRequest()
    {
        $json  = $this->request->getJSON(true);
        $input = is_array($json) ? $json : (array) $this->request->getPost();

        [$userId, $email] = $this->sessionIdentity();
        $result = (new \App\Services\Forms\SupportRequestService())->submit($userId, $email, $input, 'General');

        if (! $result['ok']) {
            return $this->response->setStatusCode($result['reason'] === 'invalid_input' ? 422 : 500)->setJSON([
                'status'  => 'error',
                'message' => $result['reason'] === 'invalid_input' ? 'Please check the form and try again.' : 'Your request could not be saved.',
                'errors'  => $result['errors'] ?? [],
            ]);
        }

        return $this->response->setJSON([
            'status'     => 'success',
            'message'    => 'Thanks! Your request #' . $result['id'] . ' was received and our team will follow up by email.',
            'request_id' => $result['id'],
        ]);
    }

    /**
     * GT-FORM-ROUTES-001: POST /Support/Feedback, the "Was this helpful?" box on KB articles.
     */
    public function submitArticleFeedback()
    {
        $slug    = mb_substr(preg_replace('/[^A-Za-z0-9_\-]/', '', (string) $this->request->getPost('slug')), 0, 120);
        $helpful = $this->request->getPost('helpful') === 'yes' ? 'yes' : 'no';
        $note    = trim((string) $this->request->getPost('note'));

        [$userId, $email] = $this->sessionIdentity();
        $result = (new \App\Services\Forms\SupportRequestService())->submit($userId, $email ?: 'anonymous@feedback.invalid', [
            'topic'   => 'Article Feedback',
            'details' => "Article: {$slug}\nHelpful: {$helpful}" . ($note !== '' ? "\nNote: {$note}" : ''),
        ], 'Article Feedback');

        $target = $slug !== '' ? site_url('Support/Article/' . $slug) : site_url('Support');

        return redirect()->to($target)->with($result['ok'] ? 'message' : 'error', $result['ok']
            ? 'Thanks for the feedback!'
            : 'Sorry, we could not save your feedback.');
    }

    /** @return array{0: ?int, 1: ?string} */
    private function sessionIdentity(): array
    {
        $userId = (int) ($this->cuID ?? session('cuID') ?? 0);
        if ($userId <= 0) {
            return [null, null];
        }
        $row = $this->userModel?->select('email')->where('id', $userId)->limit(1)->get()->getRowArray();

        return [$userId, is_array($row) ? (string) ($row['email'] ?? '') : null];
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
