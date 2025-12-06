<?php namespace App\Libraries;

use App\Models\AlertsModel;
use App\Models\DiscordAiMessageModel;
use App\Models\DiscordAiNoteModel;
use App\Models\DiscordAiSessionModel;
use App\Models\DiscordLinkModel;
use App\Models\InvestmentModel;
use CodeIgniter\I18n\Time;
use RuntimeException;

class MyMIAssistant
{
    protected DiscordLinkModel $linkModel;
    protected DiscordAiSessionModel $sessionModel;
    protected DiscordAiMessageModel $messageModel;
    protected DiscordAiNoteModel $noteModel;
    protected CryptoHelper $crypto;
    protected MyMIBudget $budget;
    protected AlertsModel $alertsModel;
    protected InvestmentModel $investmentModel;

    public function __construct(
        ?DiscordLinkModel $linkModel = null,
        ?DiscordAiSessionModel $sessionModel = null,
        ?DiscordAiMessageModel $messageModel = null,
        ?DiscordAiNoteModel $noteModel = null,
        ?CryptoHelper $cryptoHelper = null
    ) {
        $this->linkModel      = $linkModel ?? new DiscordLinkModel();
        $this->sessionModel   = $sessionModel ?? new DiscordAiSessionModel();
        $this->messageModel   = $messageModel ?? new DiscordAiMessageModel();
        $this->noteModel      = $noteModel ?? new DiscordAiNoteModel();
        $this->crypto         = $cryptoHelper ?? new CryptoHelper();
        $this->budget         = new MyMIBudget();
        $this->alertsModel    = new AlertsModel();
        $this->investmentModel = new InvestmentModel();
    }

    /**
     * Primary chat entry point for Discord + Web.
     */
    public function chat(array $payload): array
    {
        $message        = trim((string) ($payload['message'] ?? ''));
        $userId         = $payload['user_id'] ?? null;
        $discordUserId  = $payload['discord_user_id'] ?? null;
        $sessionKey     = $payload['session_key'] ?? null;
        $channelContext = $payload['channel_context'] ?? [];

        if ($message === '') {
            throw new RuntimeException('message is required');
        }

        $link      = $this->resolveIdentity($userId, $discordUserId);
        $userId    = $link['user_id'] ?? $userId;
        $scopes    = $this->normalizeScopes($link['scopes_json'] ?? null);
        $session   = $this->ensureSession($sessionKey, $userId, $discordUserId, $channelContext, $link);
        $context   = $this->buildContext($userId, $scopes);

        if (!empty($context)) {
            $this->sessionModel->update($session['id'], ['context_json' => json_encode($context)]);
        }

        $this->storeMessage($session['id'], 'user', $message, ['channel' => $channelContext]);

        $prompt   = $this->buildPrompt($message, $context, $session, $link);
        $response = $this->callModel($prompt);

        $this->storeMessage($session['id'], 'assistant', $response['content'], $response['meta'] ?? []);

        $notes = [];
        if ($this->shouldCaptureNote($message)) {
            $notes[] = $this->saveNote([
                'user_id'         => $userId,
                'discord_user_id' => $discordUserId,
                'title'           => 'Saved from chat',
                'note_type'       => 'ai_capture',
                'content'         => $message,
                'tags'            => 'ai,chat',
                'encrypted'       => true,
            ]);
        }

        return [
            'reply'       => $response['content'],
            'session_key' => $session['session_key'],
            'notes'       => array_filter($notes),
            'context'     => $context,
        ];
    }

    public function getNotesForUser(?int $userId, ?string $discordUserId = null): array
    {
        $rows = $this->noteModel->forUser($userId, $discordUserId);
        return array_map(fn ($row) => $this->hydrateNote($row), $rows);
    }

    public function ensureSessionKey(?int $userId, ?string $discordUserId = null, ?string $channelId = null): ?string
    {
        $existing = $this->sessionModel
            ->where('is_active', 1)
            ->where('user_id', $userId)
            ->orderBy('updated_at', 'DESC')
            ->first();

        if ($existing) {
            return $existing['session_key'] ?? null;
        }

        $session = [
            'user_id'        => $userId,
            'discord_user_id'=> $discordUserId,
            'channel_id'     => $channelId,
            'session_key'    => $this->generateSessionKey(),
            'is_active'      => 1,
            'created_at'     => Time::now('UTC')->toDateTimeString(),
            'updated_at'     => Time::now('UTC')->toDateTimeString(),
        ];

        $this->sessionModel->insert($session);

        return $session['session_key'];
    }

    public function saveNote(array $payload): array
    {
        $title   = trim((string) ($payload['title'] ?? ''));
        $content = (string) ($payload['content'] ?? '');
        $encrypted = (bool) ($payload['encrypted'] ?? false);
        $noteType  = $payload['note_type'] ?? null;
        $tags      = $payload['tags'] ?? null;

        if ($title === '') {
            $title = 'MyMI AI Note';
        }

        $data = [
            'user_id'         => $payload['user_id'] ?? null,
            'discord_user_id' => $payload['discord_user_id'] ?? null,
            'title'           => $title,
            'note_type'       => $noteType,
            'tags'            => $tags,
            'encrypted'       => $encrypted ? 1 : 0,
        ];

        if ($encrypted) {
            $sealed = $this->crypto->encrypt($content);
            $data['content'] = json_encode([
                'ciphertext' => $sealed['ciphertext'],
                'nonce'      => $sealed['nonce'],
                'version'    => $sealed['version'],
            ]);
        } else {
            $data['content'] = $content;
        }

        $this->noteModel->insert($data);
        $data['content'] = $content;

        return $data;
    }

    protected function ensureSession(?string $sessionKey, ?int $userId, ?string $discordUserId, array $channelContext, array $link): array
    {
        $session = null;
        if ($sessionKey) {
            $session = $this->sessionModel->where('session_key', $sessionKey)->first();
        }

        if (!$session) {
            $session = $this->sessionModel
                ->where('user_id', $userId)
                ->where('discord_user_id', $discordUserId)
                ->where('is_active', 1)
                ->orderBy('updated_at', 'DESC')
                ->first();
        }

        if ($session) {
            $this->sessionModel->update($session['id'], [
                'updated_at' => Time::now('UTC')->toDateTimeString(),
                'channel_id' => $channelContext['channel_id'] ?? ($session['channel_id'] ?? null),
            ]);
            return $this->sessionModel->find($session['id']);
        }

        $new = [
            'user_id'         => $userId,
            'discord_user_id' => $discordUserId,
            'channel_id'      => $channelContext['channel_id'] ?? null,
            'session_key'     => $this->generateSessionKey(),
            'topic'           => $link['ai_persona'] ?? null,
            'is_active'       => 1,
            'created_at'      => Time::now('UTC')->toDateTimeString(),
            'updated_at'      => Time::now('UTC')->toDateTimeString(),
        ];

        $this->sessionModel->insert($new);

        return $new;
    }

    protected function buildContext(?int $userId, array $scopes): array
    {
        $context = [];

        if ($userId && ($scopes['budget'] ?? false)) {
            try {
                $budget = $this->budget->allUserBudgetInfo($userId);
                $context['budget'] = [
                    'totalAccountBalance' => $budget['totalAccountBalance'] ?? null,
                    'creditAvailable'     => $budget['creditAvailable'] ?? null,
                    'checkingSummary'     => $budget['checkingSummary'] ?? null,
                ];
            } catch (\Throwable $e) {
                log_message('error', 'MyMIAssistant budget context failed: {msg}', ['msg' => $e->getMessage()]);
            }
        }

        if ($userId && ($scopes['alerts'] ?? false)) {
            try {
                $alerts = $this->alertsModel
                    ->where('user_id', $userId)
                    ->where('status !=', 'Closed')
                    ->orderBy('created_on', 'DESC')
                    ->findAll(5);
                $context['alerts'] = array_map(static function ($alert) {
                    return [
                        'ticker' => $alert['ticker'] ?? null,
                        'status' => $alert['status'] ?? null,
                        'price'  => $alert['price'] ?? null,
                        'target' => $alert['target_price'] ?? null,
                    ];
                }, $alerts ?? []);
            } catch (\Throwable $e) {
                log_message('error', 'MyMIAssistant alerts context failed: {msg}', ['msg' => $e->getMessage()]);
            }
        }

        if ($userId && ($scopes['watchlists'] ?? false)) {
            try {
                $watch = $this->investmentModel->getUserWatchlist($userId) ?? [];
                $context['watchlist'] = array_map(static function ($row) {
                    return [
                        'symbol' => $row['symbol'] ?? null,
                        'price'  => $row['current_price'] ?? null,
                    ];
                }, $watch);
            } catch (\Throwable $e) {
                log_message('error', 'MyMIAssistant watchlist context failed: {msg}', ['msg' => $e->getMessage()]);
            }
        }

        return $context;
    }

    protected function buildPrompt(string $message, array $context, array $session, array $link): array
    {
        $history = $this->recentMessages($session['id'] ?? 0);
        return [
            'system'  => 'You are MyMI AI, a financial assistant for the MyMI Wallet platform. Be concise and avoid PII leakage.',
            'persona' => $link['ai_persona'] ?? null,
            'context' => $context,
            'history' => $history,
            'message' => $message,
        ];
    }

    protected function callModel(array $prompt): array
    {
        $budgetSummary = '';
        if (!empty($prompt['context']['budget'])) {
            $budget = $prompt['context']['budget'];
            $budgetSummary = sprintf(
                ' Net worth: %s. Credit available: %s.',
                $budget['totalAccountBalance'] ?? 'n/a',
                $budget['creditAvailable'] ?? 'n/a'
            );
        }

        $alertsSummary = '';
        if (!empty($prompt['context']['alerts'])) {
            $tickers = array_filter(array_map(static fn ($a) => $a['ticker'] ?? null, $prompt['context']['alerts']));
            if ($tickers) {
                $alertsSummary = ' Active alerts for: ' . implode(', ', $tickers) . '.';
            }
        }

        $content = 'Here\'s a quick response based on your MyMI data:' . $budgetSummary . $alertsSummary;
        $content .= ' You asked: ' . ($prompt['message'] ?? '');

        return [
            'content' => trim($content),
            'meta'    => [
                'used_context' => array_keys($prompt['context'] ?? []),
                'persona'      => $prompt['persona'] ?? null,
            ],
        ];
    }

    protected function recentMessages(int $sessionId, int $limit = 6): array
    {
        if ($sessionId <= 0) {
            return [];
        }

        return $this->messageModel
            ->where('session_id', $sessionId)
            ->orderBy('id', 'DESC')
            ->findAll($limit);
    }

    protected function storeMessage(int $sessionId, string $role, string $content, array $meta = []): void
    {
        $this->messageModel->insert([
            'session_id' => $sessionId,
            'role'       => $role,
            'content'    => $content,
            'meta_json'  => $meta ? json_encode($meta) : null,
            'created_at' => Time::now('UTC')->toDateTimeString(),
        ]);
    }

    protected function resolveIdentity(?int $userId, ?string $discordUserId): array
    {
        $link = null;
        if ($discordUserId) {
            $link = $this->linkModel->findByDiscordId($discordUserId);
        }
        if (!$link && $userId) {
            $link = $this->linkModel->findByUserId($userId);
        }

        if ($link && ($link['id'] ?? null)) {
            $this->linkModel->update($link['id'], ['last_seen_at' => Time::now('UTC')->toDateTimeString()]);
        }

        return $link ?? [];
    }

    protected function normalizeScopes($scopesJson): array
    {
        $defaults = [
            'budget'     => true,
            'alerts'     => true,
            'watchlists' => true,
            'marketing'  => false,
        ];

        if (empty($scopesJson)) {
            return $defaults;
        }

        if (is_array($scopesJson)) {
            return array_merge($defaults, $scopesJson);
        }

        $decoded = json_decode((string) $scopesJson, true) ?? [];
        return array_merge($defaults, array_map('boolval', $decoded));
    }

    protected function shouldCaptureNote(string $message): bool
    {
        return (bool) preg_match('/\\b(save|remember).*note\\b/i', $message);
    }

    protected function hydrateNote(array $row): array
    {
        if (!(int) ($row['encrypted'] ?? 0)) {
            return $row;
        }

        try {
            $encoded = json_decode($row['content'] ?? '', true) ?? [];
            if (!empty($encoded['ciphertext']) && !empty($encoded['nonce'])) {
                $row['content'] = $this->crypto->decrypt(
                    $encoded['ciphertext'],
                    $encoded['nonce'],
                    (int) ($encoded['version'] ?? 1)
                );
            }
        } catch (\Throwable $e) {
            log_message('error', 'MyMIAssistant failed to decrypt note: {msg}', ['msg' => $e->getMessage()]);
        }

        return $row;
    }

    protected function generateSessionKey(): string
    {
        return bin2hex(random_bytes(16));
    }
}