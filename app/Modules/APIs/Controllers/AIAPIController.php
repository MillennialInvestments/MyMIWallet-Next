<?php
namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;

use App\Libraries\MyMIAssistant;
use App\Models\DiscordLinkModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\API\ResponseTrait;

class AIAPIController extends BaseAPIController
{
    use ResponseTrait;

    protected MyMIAssistant $assistant;
    protected DiscordLinkModel $linkModel;

    public function _remap($method, ...$params)
    {
        if (! aiKimiEnabled()) {
            return $this->response->setJSON([
                'status'  => 'disabled',
                'message' => 'Kimi AI Services are currently disabled by SiteSettings.',
            ]);
        }

        if (! method_exists($this, $method)) {
            throw PageNotFoundException::forPageNotFound();
        }

        return $this->$method(...$params);
    }

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->assistant = new MyMIAssistant();
        $this->linkModel = new DiscordLinkModel();
    }

    public function postChat()
    {
        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $message = trim((string) ($payload['message'] ?? ''));

        if ($message === '') {
            return $this->failValidationErrors('message is required');
        }

        $userId = $this->cuID ?? session('cuID') ?? session('user_id') ?? (function_exists('user_id') ? user_id() : null);
        $userId = $userId ? (int) $userId : null;
        $ipAddress = (string) $this->request->getIPAddress();

        // Anonymous IP-based question quota check (5 questions per IP/day)
        $quotaService = new \App\Services\AI\AIChatQuotaService();
        $quota = $quotaService->checkQuota($userId, $ipAddress);
        if (! $quota['allowed']) {
            return $this->response->setStatusCode(429)->setJSON([
                'status'          => 'quota_exceeded',
                'message'         => $quota['message'],
                'quota_remaining' => 0,
                'requires_auth'   => true,
            ]);
        }

        // Ticker Intelligence Extraction
        $tickerService = new \App\Services\AI\TickerIntelligenceService();
        $tickers = $tickerService->extractTickers($message);
        $tickerIntel = !empty($tickers) ? $tickerService->getIntelligence($tickers, $userId) : [];

        $params = [
            'message'             => $message,
            'session_key'         => $payload['session_key'] ?? null,
            'user_id'             => $userId,
            'discord_user_id'     => $payload['discord_user_id'] ?? null,
            'ticker_intelligence' => $tickerIntel,
            'channel_context'     => [
                'channel_id' => $payload['channel_id'] ?? null,
                'source'     => $payload['source'] ?? 'web',
            ],
        ];

        try {
            $result = $this->assistant->chat($params);

            // Increment quota for anonymous visitors
            $newCount = $quotaService->incrementQuota($userId, $ipAddress);
            $remaining = $userId ? 'unlimited' : max(0, \App\Services\AI\AIChatQuotaService::DEFAULT_GUEST_DAILY_LIMIT - $newCount);

            $result['quota'] = [
                'quota_type'      => $quota['quota_type'],
                'quota_remaining' => $remaining,
            ];
            $result['tickers_detected'] = $tickers;
            $result['ticker_intelligence'] = $tickerIntel;

            return $this->respond($result);
        } catch (\Throwable $e) {
            log_message('error', 'AIController::postChat failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->failServerError('Unable to process AI chat request.');
        }
    }

    public function listNotes()
    {
        if (! $this->cuID) {
            return $this->failUnauthorized('Authentication required.');
        }

        try {
            $discordId = $this->request->getGet('discord_user_id') ?? null;
            $notes     = $this->assistant->getNotesForUser($this->cuID, $discordId);

            return $this->respond(['notes' => is_array($notes) ? $notes : []]);
        } catch (\Throwable $e) {
            log_message('error', 'AIController::listNotes failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->failServerError('Internal processing error');
        }
    }

    public function updateLinkSettings()
    {
        if (!$this->cuID) {
            return $this->failUnauthorized('Authentication required.');
        }

        $link = $this->linkModel->findByUserId($this->cuID);
        if (!$link) {
            return $this->failNotFound('No Discord link found for this user.');
        }

        $payload  = $this->request->getJSON(true) ?? $this->request->getPost();
        $unlink   = filter_var($payload['unlink'] ?? false, FILTER_VALIDATE_BOOLEAN);
        $persona  = $payload['ai_persona'] ?? $link['ai_persona'] ?? null;
        $scopes   = $this->normalizeScopes($payload['scopes'] ?? []);

        $update = [
            'ai_persona'  => $persona,
            'scopes_json' => json_encode($scopes),
            'last_seen_at'=> date('Y-m-d H:i:s'),
        ];

        if ($unlink) {
            $update = array_merge($update, [
                'user_id'         => null,
                'discord_user_id' => null,
                'linked_at'       => null,
            ]);
        }

        $this->linkModel->update($link['id'], $update);

        return $this->respond([
            'status'  => 'ok',
            'persona' => $persona,
            'scopes'  => $scopes,
            'unlinked'=> $unlink,
        ]);
    }

    private function normalizeScopes($scopes): array
    {
        $defaults = [
            'budget'     => true,
            'alerts'     => true,
            'watchlists' => true,
            'marketing'  => false,
        ];

        if (is_array($scopes)) {
            $scopes = array_merge($defaults, array_map('boolval', $scopes));
        } else {
            $decoded = json_decode((string) $scopes, true) ?? [];
            $scopes  = array_merge($defaults, array_map('boolval', $decoded));
        }

        return $scopes;
    }
}