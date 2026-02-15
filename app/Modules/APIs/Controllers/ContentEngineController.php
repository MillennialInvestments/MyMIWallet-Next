<?php

declare(strict_types=1);

namespace App\Modules\APIs\Controllers;

use Config\ContentEngine as ContentEngineConfig;
use App\Controllers\BaseController;
use App\Libraries\ContentEngine\DistributionService;
use App\Libraries\ContentEngine\PostDraftService;
use App\Libraries\ContentEngine\ScannerIngestService;
use App\Libraries\ContentEngine\ScannerScoringService;
use App\Models\ContentIdeaModel;
use App\Models\ContentPostModel;
use App\Models\ContentScannerIngestModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Authorization\GroupModel;

class ContentEngineController extends BaseController
{
    use ResponseTrait;

    protected ContentEngineConfig $config;
    protected ScannerIngestService $ingestService;
    protected ScannerScoringService $scoringService;
    protected PostDraftService $draftService;
    protected DistributionService $distributionService;
    protected ContentIdeaModel $ideaModel;
    protected ContentPostModel $postModel;
    protected ContentScannerIngestModel $ingestModel;
    protected $auth;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->config = config(ContentEngineConfig::class);
        $this->ingestService = new ScannerIngestService($this->config);
        $this->scoringService = new ScannerScoringService($this->config);
        $this->draftService = new PostDraftService($this->config);
        $this->distributionService = new DistributionService($this->config);
        $this->ideaModel = model(ContentIdeaModel::class);
        $this->postModel = model(ContentPostModel::class);
        $this->ingestModel = model(ContentScannerIngestModel::class);
        $this->auth = service('authentication');
    }

    public function ingestScanner()
    {
        if (! $this->allowTokenOnly()) {
            return $this->fail('Invalid or missing token for ingest', 401);
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        if (! is_array($payload)) {
            return $this->fail('Invalid payload', 400);
        }

        try {
            $result = $this->ingestService->ingest($payload, 'api');
            return $this->respond($result);
        } catch (\Throwable $e) {
            log_message('error', 'ContentEngine ingest failed: ' . $e->getMessage());
            return $this->fail($e->getMessage(), 400);
        }
    }

    public function processIngest(int $ingestId)
    {
        if ($guard = $this->guardAdminOrToken()) {
            return $guard;
        }

        try {
            $force = (bool) ($this->request->getGet('force') ?? $this->request->getPost('force'));
            $ideas = $this->scoringService->scoreIngest($ingestId, $force);
            $drafts = $this->draftService->generateDrafts($ingestId, $ideas);
            $summary = $this->summarizeIdeas($ideas);

            return $this->respond([
                'ingest_id' => $ingestId,
                'ideas'     => $ideas,
                'drafts'    => $drafts,
                'summary'   => $summary,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'processIngest failed: ' . $e->getMessage());
            return $this->fail($e->getMessage(), 400);
        }
    }

    public function topIdeas()
    {
        if ($guard = $this->guardAdminOrToken()) {
            return $guard;
        }

        try {
            $ingestId = (int) $this->request->getGet('ingest_id');
            if ($ingestId <= 0) {
                return $this->respond([]);
            }

            $tier = $this->request->getGet('tier');
            $limit = max(1, min(50, (int) ($this->request->getGet('limit') ?? 10)));

            $builder = $this->ideaModel->where('ingest_id', $ingestId)->orderBy('score_total', 'DESC');
            if ($tier) {
                $builder->where('tier', $tier);
            }

            $ideas = $builder->findAll($limit);
            foreach ($ideas as &$idea) {
                $idea['reasons'] = json_decode($idea['reasons_json'] ?? '[]', true);
                $idea['recommended_platforms'] = json_decode($idea['recommended_platforms_json'] ?? '[]', true);
            }

            return $this->respond($ideas);
        } catch (\Throwable $e) {
            log_message('error', 'ContentEngine topIdeas failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->failServerError('Internal processing error');
        }
    }

    public function posts(?int $ideaId = null)
    {
        if ($guard = $this->guardAdminOrToken()) {
            return $guard;
        }

        try {
            $ideaId = $ideaId ?? (int) $this->request->getGet('idea_id');
            if ($ideaId <= 0) {
                return $this->respond([]);
            }

            $posts = $this->postModel->where('idea_id', $ideaId)->findAll();
            foreach ($posts as &$post) {
                $post['payload'] = json_decode($post['payload_json'] ?? '{}', true);
            }

            return $this->respond($posts);
        } catch (\Throwable $e) {
            log_message('error', 'ContentEngine posts failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->failServerError('Internal processing error');
        }
    }

    public function approvePost(int $postId)
    {
        if ($guard = $this->guardAdminOrToken()) {
            return $guard;
        }

        $this->postModel->update($postId, ['status' => 'approved']);
        return $this->respond(['id' => $postId, 'status' => 'approved']);
    }

    public function sendPost(int $postId)
    {
        if ($guard = $this->guardAdminOrToken()) {
            return $guard;
        }

        $result = $this->distributionService->send($postId);
        if (($result['status'] ?? '') === 'sent' || ($result['status'] ?? '') === 'skipped') {
            return $this->respond($result);
        }

        $this->postModel->update($postId, ['status' => 'failed', 'last_error' => $result['message'] ?? 'failed to send']);
        return $this->fail($result['message'] ?? 'failed to send', 400);
    }

    public function runDaily()
    {
        if ($guard = $this->guardAdminOrToken()) {
            return $guard;
        }

        $ingest = $this->ingestModel->where('status', 'received')
            ->orderBy('quote_ts', 'DESC')
            ->first();

        if (! $ingest) {
            return $this->respond(['status' => 'noop', 'message' => 'No pending ingests.']);
        }

        $ingestId = (int) $ingest['id'];
        $ideas = $this->scoringService->scoreIngest($ingestId);

        // Auto-limit top 5 for TradingView + StockTwits drafts
        $top = array_slice($ideas, 0, 5);
        $pared = array_map(static function ($idea) {
            $idea['platforms'] = ['tradingview', 'stocktwits'];
            return $idea;
        }, $top);
        $drafts = $this->draftService->generateDrafts($ingestId, $pared);

        return $this->respond([
            'ingest_id' => $ingestId,
            'status'    => 'processed',
            'created_drafts' => $drafts,
        ]);
    }

    protected function summarizeIdeas(array $ideas): array
    {
        $tiers = ['tier1' => 0, 'tier2' => 0, 'tier3' => 0, 'avoid' => 0];
        foreach ($ideas as $idea) {
            $tiers[$idea['tier']]++;
        }

        $top = array_slice($ideas, 0, 5);
        return [
            'tiers' => $tiers,
            'top'   => $top,
        ];
    }

    protected function guardAdminOrToken(): ?ResponseInterface
    {
        if ($this->config->ingestToken) {
            $token = $this->request->getHeaderLine('X-MYMI-TOKEN') ?: $this->request->getHeaderLine('X-API-Key');
            if ($token && hash_equals((string) $this->config->ingestToken, (string) $token)) {
                return null;
            }
        }

        if (! $this->auth || ! $this->auth->check()) {
            return $this->fail('Unauthorized', 401);
        }

        $user = $this->auth->user();
        $groups = new GroupModel();
        if (! $user || ! ($groups->inGroup('admin', $user->id) || $groups->inGroup('superadmin', $user->id))) {
            return $this->fail('Forbidden', 403);
        }

        return null;
    }

    protected function allowTokenOnly(): bool
    {
        $expected = $this->config->ingestToken;
        if (! $expected) {
            return true;
        }

        $token = $this->request->getHeaderLine('X-MYMI-TOKEN') ?: $this->request->getHeaderLine('X-API-Key');
        return $token && hash_equals((string) $expected, (string) $token);
    }
}