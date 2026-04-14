<?php namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;

use App\Libraries\MyMIDiscord;
use App\Libraries\MyMIAssistant;
use App\Libraries\MyMIAlphaVantage;
use App\Libraries\MyMIAlerts;
use App\Libraries\MyMINews;
use App\Libraries\MyMISEC;
use App\Libraries\FRED;
use App\Models\AlertsModel;
use App\Models\DiscordLinkModel;
use App\Models\DiscordRelayAuditModel;
use App\Services\Discord\DiscordOpsRelayService;
use App\Services\Market\IndicatorHealthService;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Discord as DiscordConfig;

class DiscordAPIController extends BaseAPIController
{
    use ResponseTrait;

    protected MyMIDiscord $discord;
    protected DiscordConfig $cfg;
    protected DiscordLinkModel $linkModel;
    protected MyMIAssistant $assistant;
    protected DiscordRelayAuditModel $relayAudit;
    protected DiscordOpsRelayService $relayService;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->discord = new MyMIDiscord();
        $this->cfg     = config('Discord');
        $this->linkModel = new DiscordLinkModel();
        $this->assistant = new MyMIAssistant();
        $this->relayAudit = new DiscordRelayAuditModel();
        $this->relayService = new DiscordOpsRelayService();
    }

    public function enqueue()
    {
        $event = $this->request->getPost('event_key');
        $data  = $this->request->getPost('data') ?? [];
        if (!$event || !is_array($data)) {
            return $this->failValidationErrors('event_key and data are required');
        }
        $this->discord->dispatch($event, $data);
        return $this->respond(['status'=>'ok']);
    }

    public function broadcast()
    {
        // Admin-only (reuse your token/role checks)
        $channelKey = $this->request->getPost('channel_key');
        $templateKey= $this->request->getPost('template_key');
        $data       = $this->request->getPost('data') ?? [];
        if (!$channelKey || !$templateKey) return $this->failValidationErrors('channel_key & template_key required');

        $payload = $this->discord->renderTemplate($templateKey, $data);
        if (!$payload) return $this->failNotFound('Template disabled or not found');

        service('logger')->info('Discord broadcast manual', compact('channelKey','templateKey'));
        $queued = model('DiscordModel')->enqueue($channelKey, $payload);
        return $this->respond(['status'=>$queued ? 'queued' : 'skipped', 'reason'=>$queued ? null : 'duplicate']);
    }

    public function processQueue()
    {
        // Protect with your X-CRON-Key gate (same as ManagementController)
        $token = $this->request->getHeaderLine('X-CRON-Key') ?: $this->request->getGet('cronKey');
        $expected = env('CRON_SHARED_KEY');

        if (!$expected || !hash_equals((string) $expected, (string) $token)) {
            log_message('warning', '🚫 DiscordController::processQueue blocked - invalid or missing token.');
            return $this->failForbidden('Invalid CRON key.');
        }

        $stats = $this->discord->processQueue(25);
        return $this->respond(['status'=>'ok','stats'=>$stats]);
    }

    public function test()
    {
        $data = [
            'ticker'  => 'SPY',
            'title'   => 'Test Alert',
            'status'  => 'Opened',
            'price'   => '430.12',
            'tp'      => '435.00',
            'sl'      => '427.50',
                        'chartUrl'=> 'https://www.tradingview.com/symbols/SPY/'
        ];
        $this->discord->dispatch('alerts.opened', $data);
        return $this->respond(['status'=>'queued','example'=>$data]);
    }

    public function coalesceNow()
    {
        $this->discord->coalesceQueue();
        return $this->respond(['status'=>'ok','message'=>'coalesced']);
    }

    public function purgeDead()
    {
        $db = db_connect();
        $n = $db->table('bf_discord_queue')->where('status','dead')->delete();
        return $this->respond(['status'=>'ok','deleted'=>$n]);
    }

    public function health()
    {
        $db = db_connect();
        $queued = $db->table('bf_discord_queue')->where('status','queued')->countAllResults();
        return $this->respond([
            'status' => 'ok',
            'service' => 'discord_interactions',
            'queued' => $queued,
            'tz' => config('Discord')->timezone,
            'time' => date(DATE_ATOM),
        ]);
    }

    public function commandsCatalog(): ResponseInterface
    {
        $config = config('DiscordHelp');

        return $this->response->setJSON([
            'status'   => 'success',
            'commands' => $config->commands,
        ]);
    }

    public function onboardingSteps(): ResponseInterface
    {
        $config = config('DiscordHelp');

        return $this->response->setJSON([
            'status' => 'success',
            'steps'  => $config->onboardingSteps,
        ]);
    }

    public function sharingGuide(): ResponseInterface
    {
        $data = [
            'status'   => 'success',
            'sections' => [
                [
                    'title'       => 'Trade Ideas & Alerts',
                    'description' => 'Post in #trade-alerts-free or your tiered alerts channel. Use $TICKER and /mymi alerts.',
                    'channels'    => ['#trade-alerts-free', '#trade-alerts-tier1', '#trade-alerts-tier2', '#trade-alerts-tier3'],
                ],
                [
                    'title'       => 'Due Diligence & Research',
                    'description' => 'Share DD, long-form analysis, and links in #due-diligence.',
                    'channels'    => ['#due-diligence', '#research'],
                ],
                [
                    'title'       => 'Support & Questions',
                    'description' => 'Use #welcome-support and /mymi support for help with the app or account.',
                    'channels'    => ['#welcome-support', '#support-tickets'],
                ],
                [
                    'title'       => 'Streaming & Live Content',
                    'description' => 'Link Twitch/Youtube streams in #live-streams and follow pinned rules.',
                    'channels'    => ['#live-streams'],
                ],
            ],
        ];

        return $this->response->setJSON($data);
    }


    public function interactions(): ResponseInterface
    {
        return $this->handleInteraction();
    }

    public function registerGuildCommands(): ResponseInterface
    {
        $cfg = $this->cfg;
        $appId = trim((string) ($cfg->applicationId ?? ''));
        $guildId = trim((string) ($cfg->guildId ?? ''));
        $botToken = trim((string) ($cfg->botToken ?? ''));

        if ($appId === '' || $guildId === '' || $botToken === '') {
            return $this->response->setStatusCode(422)->setJSON([
                'status' => 'error',
                'message' => 'Missing Discord command registration configuration.',
                'required' => [
                    'DISCORD_APPLICATION_ID' => $appId !== '',
                    'DISCORD_GUILD_ID' => $guildId !== '',
                    'DISCORD_INTERACTIONS_PUBLIC_KEY' => trim((string) ($cfg->publicKey ?? '')) !== '',
                    'DISCORD_MYMI_AI_BOT_TOKEN' => $botToken !== '',
                ],
            ]);
        }

        $commands = [
            ['name' => 'ai', 'description' => 'Relay prompt to configured AI provider', 'options' => [
                ['type' => 3, 'name' => 'provider', 'description' => 'aiops|ollama', 'required' => true],
                ['type' => 3, 'name' => 'prompt', 'description' => 'Prompt text', 'required' => true],
            ]],
            ['name' => 'ticker', 'description' => 'Lookup stock ticker', 'options' => [['type' => 3, 'name' => 'symbol', 'description' => 'Ticker symbol', 'required' => true]]],
            ['name' => 'crypto', 'description' => 'Lookup crypto symbol', 'options' => [['type' => 3, 'name' => 'symbol', 'description' => 'Crypto symbol', 'required' => true]]],
            ['name' => 'quote', 'description' => 'Lookup quote summary', 'options' => [['type' => 3, 'name' => 'symbol', 'description' => 'Ticker symbol', 'required' => true]]],
            ['name' => 'news', 'description' => 'Lookup recent news', 'options' => [['type' => 3, 'name' => 'symbol', 'description' => 'Ticker symbol', 'required' => true]]],
            ['name' => 'custom-send', 'description' => 'Queue custom message to routed channel', 'options' => [
                ['type' => 3, 'name' => 'channel_key', 'description' => 'custom_messages, announcements, etc', 'required' => true],
                ['type' => 3, 'name' => 'message', 'description' => 'Message text', 'required' => true],
            ]],
            ['name' => 'spark', 'description' => 'Run allowlisted spark command', 'options' => [['type' => 3, 'name' => 'command', 'description' => 'Allowlisted spark command', 'required' => true]]],
        ];

        $url = sprintf('https://discord.com/api/v10/applications/%s/guilds/%s/commands', rawurlencode($appId), rawurlencode($guildId));
        try {
            $res = service('curlrequest')->put($url, [
                'headers' => ['Authorization' => 'Bot ' . $botToken, 'Content-Type' => 'application/json'],
                'json' => $commands,
                'timeout' => 20,
            ]);
            $status = $res->getStatusCode();
            $body = json_decode((string) $res->getBody(), true);
            return $this->response->setStatusCode($status)->setJSON([
                'status' => $status >= 200 && $status < 300 ? 'ok' : 'error',
                'discord_status' => $status,
                'response' => $body,
            ]);
        } catch (\Throwable $e) {
            return $this->response->setStatusCode(502)->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function handleInteraction(): ResponseInterface
    {
        $raw = $this->request->getBody();
        if (!$this->verifySignature($raw)) {
            return $this->failForbidden('Invalid Discord signature.');
        }

        $payload = json_decode($raw, true) ?? [];
        if (! $this->isWithinTimestampSkew()) {
            return $this->response->setStatusCode(401)->setJSON(['error' => 'timestamp_skew']);
        }

        if (! $this->enforceRateLimit($payload)) {
            return $this->response->setStatusCode(429)->setJSON(['error' => 'rate_limited']);
        }

        $type    = $payload['type'] ?? null;

        if ($type === 1) {
            return $this->respond(['type' => 1]);
        }

        $command = strtolower($payload['data']['name'] ?? '');
        $options = $payload['data']['options'][0] ?? [];

        switch ($command) {
            case 'ai':
                return $this->respond($this->handleAiProviderCommand($payload));
            case 'mymi':
                $sub = strtolower($options['name'] ?? '');
                return $this->handleMymiCommand($sub, $options['options'] ?? [], $payload);
            case 'ticker':
                return $this->respond($this->formatTickerResponse($payload));
            case 'quote':
                return $this->respond($this->formatQuoteResponse($payload));
            case 'crypto':
                return $this->respond($this->formatCryptoResponse($payload));
            case 'news':
                return $this->respond($this->formatNewsResponse($payload));
            case 'custom-send':
                return $this->respond($this->handleCustomSendCommand($payload));
            case 'aiops':
                return $this->respond($this->handleAiopsRelayCommand($payload));
            case 'ollama':
                return $this->respond($this->handleOllamaRelayCommand($payload));
            case 'spark':
                return $this->respond($this->handleSparkCommand($payload));
            default:
                return $this->respond($this->interactionMessage('Unknown command. Please run /mymi help for options.'));
        }
    }

    public function messageHook(): ResponseInterface
    {
        $body    = $this->request->getJSON(true) ?? [];
        $content = $body['content'] ?? '';
        if (!$content) {
            return $this->failValidationErrors('content is required');
        }

        if (!preg_match('/\$([A-Za-z\.:-]{1,10})/', $content, $m)) {
            return $this->respond(['status' => 'ok', 'message' => 'No ticker found']);
        }

        $symbol = strtoupper($m[1]);
        $alert  = $this->latestAlertForSymbol($symbol);
        if (!$alert) {
            return $this->respond(['status' => 'ok', 'message' => 'No alert found for '.$symbol]);
        }

        return $this->respond([
            'status' => 'ok',
            'symbol' => $symbol,
            'alert'  => $this->summarizeAlert($alert),
        ]);
    }

    public function completeOnboardingStep(): ResponseInterface
    {
        $discordUserId = (string) $this->request->getPost('discord_user_id');
        $stepKey       = (string) $this->request->getPost('step_key');
        $apiToken      = $this->request->getHeaderLine('X-Internal-Api-Token');
        $expectedToken = env('DISCORD_INTERNAL_API_TOKEN');

        if (!$expectedToken || !hash_equals((string) $expectedToken, (string) $apiToken)) {
            return $this->response->setStatusCode(401)
                ->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }

        if ($discordUserId === '' || $stepKey === '') {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Missing discord_user_id or step_key']);
        }

        $achievementKey = $this->mapStepKeyToAchievementKey($stepKey);
        if (!$achievementKey) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Unknown step key']);
        }

        try {
            $db = db_connect();

            $achievement = $db->table('bf_discord_achievements')
                ->where('key', $achievementKey)
                ->get()
                ->getRowArray();

            if (!$achievement) {
                return $this->response->setStatusCode(404)
                    ->setJSON(['status' => 'error', 'message' => 'Achievement not found']);
            }

            $userId = null;
            try {
                $link = $db->table('bf_users_discord_links')
                    ->where('discord_user_id', $discordUserId)
                    ->orderBy('id', 'DESC')
                    ->get()
                    ->getRowArray();

                if ($link && !empty($link['user_id'])) {
                    $userId = (int) $link['user_id'];
                }
            } catch (\Throwable $e) {
                log_message('notice', 'DiscordController::completeOnboardingStep link lookup failed: {msg}', [
                    'msg' => $e->getMessage(),
                ]);
            }

            $existing = $db->table('bf_discord_user_achievements')
                ->where('discord_user_id', $discordUserId)
                ->where('achievement_id', $achievement['id'])
                ->get()
                ->getRowArray();

            if ($existing) {
                return $this->response->setJSON([
                    'status'       => 'success',
                    'message'      => 'Already completed',
                    'achievement'  => $achievement,
                    'discord_user' => $discordUserId,
                    'user_id'      => $userId,
                ]);
            }

            $db->table('bf_discord_user_achievements')->insert([
                'discord_user_id' => $discordUserId,
                'achievement_id'  => $achievement['id'],
                'achievement_key' => $achievement['key'] ?? $achievementKey,
                'user_id'         => $userId,
                'completed_at'    => date('Y-m-d H:i:s'),
            ]);

            return $this->response->setJSON([
                'status'       => 'success',
                'message'      => 'Achievement recorded',
                'achievement'  => $achievement,
                'discord_user' => $discordUserId,
                'user_id'      => $userId,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'DiscordController::completeOnboardingStep failed: {msg}', [
                'msg' => $e->getMessage(),
            ]);

            return $this->response->setStatusCode(500)
                ->setJSON(['status' => 'error', 'message' => 'Unable to record achievement']);
        }
    }

    public function webhookProxy(): ResponseInterface
    {
        $channel = $this->request->getPost('channel_key');
        $content = $this->request->getPost('content');
        $embeds  = $this->request->getPost('embeds');

        if (!$channel || !$content) {
            return $this->failValidationErrors('channel_key and content are required');
        }

        $queued = $this->discord->enqueuePlain($channel, $content, ['embeds' => is_array($embeds) ? $embeds : []]);
        return $this->respond(['status' => $queued ? 'queued' : 'skipped']);
    }

    public function createLinkToken(): ResponseInterface
    {
        $apiKey = env('DISCORD_LINK_API_KEY');
        if ($apiKey && !hash_equals((string) $apiKey, (string) $this->request->getHeaderLine('X-API-Key'))) {
            return $this->failForbidden('Invalid API key');
        }

        $discordUserId  = (string) $this->request->getPost('discord_user_id');
        $discordName    = (string) $this->request->getPost('discord_username');
        $ttl            = (int) ($this->request->getPost('ttl') ?? 900);

        if (!$discordUserId) {
            return $this->failValidationErrors('discord_user_id is required');
        }

        $token = $this->linkModel->issueToken($discordUserId, $discordName, $ttl);

        return $this->respond([
            'status'     => 'ok',
            'token'      => $token['token'],
            'expires_at' => $token['expires_at']->toDateTimeString(),
            'link_url'   => site_url('/Account/Social-Media?source=discord&code='.$token['token']),
        ]);
    }

    protected function handleMymiCommand(string $sub, array $options, array $payload): ResponseInterface
    {
        switch ($sub) {
            case '':
            case 'ask':
            case 'chat':
                return $this->respond($this->handleAiChatFromInteraction($options, $payload));
            case 'help':
                return $this->respond($this->handleHelpCommand($payload));
            case 'link':
                $user = $payload['member']['user'] ?? $payload['user'] ?? [];
                $token = $this->linkModel->issueToken((string) ($user['id'] ?? ''), (string) ($user['username'] ?? ''));
                $url   = site_url('/Account/Social-Media?source=discord&code='.$token['token']);
                $msg   = 'Click the link to complete Discord linking: '.$url;
                return $this->respond($this->interactionMessage($msg, true));
            case 'support':
                return $this->respond($this->handleSupportCommand($payload));
            case 'alerts':
                if ($guard = $this->maybeDenyPremiumCommand('alerts', $payload)) {
                    return $this->respond($guard);
                }
                $symbol = $this->extractOptionValue($options, 'symbol');
                $alerts = $this->latestAlerts($symbol, 5);
                if (!$alerts) {
                    return $this->respond($this->interactionMessage('No alerts found for the requested filter.', true));
                }
                return $this->respond([
                    'type' => 4,
                    'data' => [
                        'content' => $symbol ? "Latest alerts for {$symbol}" : 'Latest alerts',
                        'embeds'  => array_map(fn($a) => $this->alertEmbed($a), $alerts),
                    ],
                ]);
            case 'ticker':
                if ($guard = $this->maybeDenyPremiumCommand('ticker', $payload)) {
                    return $this->respond($guard);
                }
                return $this->respond($this->formatTickerResponse($payload));
            case 'budget':
                if ($guard = $this->maybeDenyPremiumCommand('budget', $payload)) {
                    return $this->respond($guard);
                }
                return $this->respond($this->interactionMessage('Budget summary will be synced here soon. Visit '.site_url('Budget').' for the full dashboard.', true));
            case 'portfolio':
                if ($guard = $this->maybeDenyPremiumCommand('portfolio', $payload)) {
                    return $this->respond($guard);
                }
                return $this->respond($this->interactionMessage('Portfolio snapshots are being wired. Check your MyMI Wallet portfolio for now.', true));
            case 'watchlist':
                if ($guard = $this->maybeDenyPremiumCommand('watchlist', $payload)) {
                    return $this->respond($guard);
                }
                return $this->respond($this->interactionMessage('Watchlist management is coming to Discord. Manage symbols inside MyMI Wallet for now.', true));
            case 'projects':
                if ($guard = $this->maybeDenyPremiumCommand('projects', $payload)) {
                    return $this->respond($guard);
                }
                return $this->respond($this->interactionMessage('Browse MyMI Projects in-app while Discord embeds are finalized.', true));
            case 'assets':
                if ($guard = $this->maybeDenyPremiumCommand('assets', $payload)) {
                    return $this->respond($guard);
                }
                return $this->respond($this->interactionMessage('Asset Creator prompts will surface here soon. Manage assets directly in MyMI Wallet today.', true));
            case 'news':
                return $this->respond($this->interactionMessage('Fetching curated news — check #marketing-news or use /mymi news [topic|symbol].', true));
            case 'earnings':
                return $this->respond($this->interactionMessage('Daily/weekly earnings posts live in #earnings-watch. Use /mymi earnings [today|this_week].', true));
            default:
                return $this->respond($this->interactionMessage('Command not yet implemented.'));
        }
    }

    protected function handleAiChatFromInteraction(array $options, array $payload): array
    {
        $question = $this->extractOptionValue($options, 'question');
        if (!$question && !empty($options[0]['value'])) {
            $question = (string) ($options[0]['value'] ?? '');
        }

        $user   = $payload['member']['user'] ?? $payload['user'] ?? [];
        $discordId = (string) ($user['id'] ?? '');

        if ($question === '' || $discordId === '') {
            return $this->interactionMessage('Please provide a message for MyMI AI.');
        }

        try {
            $result = $this->assistant->chat([
                'message'        => $question,
                'discord_user_id'=> $discordId,
                'channel_context'=> [
                    'channel_id' => $payload['channel_id'] ?? null,
                    'source'     => 'discord',
                ],
            ]);

            return [
                'type' => 4,
                'data' => [
                    'content' => $result['reply'] ?? 'Working on it... ',
                    'flags'   => 64,
                ],
            ];
        } catch (\Throwable $e) {
            log_message('error', 'Discord AI chat failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->interactionMessage('Unable to process that request right now.', true);
        }
    }

    protected function handleHelpCommand(array $payload): array
    {
        $config          = config('DiscordHelp');
        $commandsSummary = $this->formatCommandList($config->commands, ['link', 'alerts', 'ticker', 'budget', 'portfolio', 'projects', 'news', 'support']);
        $stepsList       = $this->formatOnboardingChecklist($config->onboardingSteps);
        $user            = $this->getDiscordUser($payload);

        if (!empty($user['id'])) {
            $this->discord->enqueuePlain('support', 'Help pack sent to <@'.$user['id'].'>. Start in #welcome-support: '.site_url('Support/Discord'));
            $this->discord->trackOnboardingStep($user['id'], 'read_how_it_works');
        }

        return [
            'type' => 4,
            'data' => [
                'content' => 'Here’s how the MyMI Discord works — Support is your starting point.',
                'embeds'  => [
                    [
                        'title'       => 'Welcome to MyMI Wallet Discord',
                        'description' => 'New members land in #welcome-support. Link your account, review the rules, and start with the key commands below.',
                        'fields'      => [
                            [
                                'name'  => 'Start here',
                                'value' => '1) Register on MyMI Wallet → 2) Use /mymi link → 3) Follow #welcome-support pins.',
                            ],
                            [
                                'name'  => 'Key commands',
                                'value' => $commandsSummary,
                            ],
                            [
                                'name'  => 'Onboarding steps',
                                'value' => $stepsList,
                            ],
                            [
                                'name'  => 'Resources',
                                'value' => 'Support onboarding: '.site_url('Support/Discord')."\nHow It Works (Discord): ".site_url('How-It-Works/Discord')."\nSharing guide: ".site_url('API/Discord/sharingGuide'),
                            ],
                        ],
                        'footer' => ['text' => 'Use /mymi support anytime for help.'],
                    ],
                ],
                'flags'   => 64,
            ],
        ];
    }
    protected function handleSupportCommand(array $payload): array
    {
        $user = $this->getDiscordUser($payload);
        $link = site_url('Support/Discord');
        $msg  = 'Head to #welcome-support or open a ticket at '.$link.' for step-by-step help.';

        if (!empty($user['id'])) {
            $this->discord->enqueuePlain('support', 'Support request from <@'.$user['id'].'>. Guide: '.$link);
        }

        return [
            'type' => 4,
            'data' => [
                'content' => $msg,
                'embeds'  => [
                    [
                        'title'       => 'Need assistance?',
                        'description' => 'Start in #welcome-support. Ask a question, open a thread, or tap the web guide for forms.',
                        'fields'      => [
                            [
                                'name'  => 'Web support',
                                'value' => $link,
                            ],
                            [
                                'name'  => 'Commands',
                                'value' => '/mymi link • /mymi alerts • /mymi support',
                            ],
                        ],
                    ],
                ],
                'flags'   => 64,
            ],
        ];
    }

    protected function formatTickerResponse(array $payload): array
    {
        $options = $payload['data']['options'] ?? [];
        $symbol  = strtoupper((string) ($options[0]['value'] ?? ''));
        if (!$symbol) {
            return $this->interactionMessage('Please provide a ticker symbol.');
        }

        $alert = $this->latestAlertForSymbol($symbol);
        if (!$alert) {
            return $this->interactionMessage('No alerts found for '.$symbol.'.');
        }

        return [
            'type' => 4,
            'data' => [
                'content' => 'Latest alert for '.$symbol,
                'embeds'  => [$this->alertEmbed($alert)],
            ],
        ];
    }

    public function tickerLookup(): ResponseInterface
    {
        $symbol = strtoupper((string) $this->request->getGet('symbol'));
        return $this->response->setJSON($this->buildQuotePayload($symbol, 'ticker'));
    }

    public function cryptoLookup(): ResponseInterface
    {
        $symbol = strtoupper((string) $this->request->getGet('symbol'));
        return $this->response->setJSON($this->buildQuotePayload($symbol, 'crypto'));
    }

    public function quoteLookup(): ResponseInterface
    {
        $symbol = strtoupper((string) $this->request->getGet('symbol'));
        return $this->response->setJSON($this->buildQuotePayload($symbol, 'quote'));
    }

    protected function formatQuoteResponse(array $payload): array
    {
        $symbol = strtoupper((string) (($payload['data']['options'][0]['value'] ?? '')));
        $data = $this->buildQuotePayload($symbol, 'quote');
        return $this->interactionMessage($data['message'] ?? 'No data found.');
    }

    protected function formatCryptoResponse(array $payload): array
    {
        $symbol = strtoupper((string) (($payload['data']['options'][0]['value'] ?? '')));
        $data = $this->buildQuotePayload($symbol, 'crypto');
        return $this->interactionMessage($data['message'] ?? 'No data found.');
    }

    protected function handleAiopsRelayCommand(array $payload): array
    {
        $prompt = trim((string) ($payload['data']['options'][0]['value'] ?? ''));
        if ($prompt === '') {
            return $this->interactionMessage('Usage: /aiops <prompt>');
        }

        $result = $this->relayService->relayAiopsPrompt($prompt, ['discord_payload' => $payload]);
        $this->auditRelay('aiops', 'aiops', $payload, $result);
        return $this->interactionMessage($result['content'], true);
    }

    protected function handleOllamaRelayCommand(array $payload): array
    {
        $prompt = trim((string) ($payload['data']['options'][0]['value'] ?? ''));
        if ($prompt === '') {
            return $this->interactionMessage('Usage: /ollama <prompt>');
        }

        $result = $this->relayService->relayOllamaPrompt($prompt, ['discord_payload' => $payload]);
        $this->auditRelay('ollama', 'ollama', $payload, $result);
        return $this->interactionMessage($result['content'], true);
    }

    protected function handleSparkCommand(array $payload): array
    {
        $options = $payload['data']['options'] ?? [];
        $command = trim((string) ($options[0]['value'] ?? ''));
        $discordOps = config('DiscordOps');
        $allowed = array_values(array_map('trim', (array) $discordOps->sparkAllowlist));

        if (! in_array($command, $allowed, true)) {
            $this->auditRelay('spark', 'spark', $payload, ['success' => false, 'content' => 'Denied command']);
            return $this->interactionMessage('Denied. Command is not allowlisted.');
        }

        if (! $this->isDiscordAdminAuthorized($payload)) {
            $this->auditRelay('spark', 'spark', $payload, ['success' => false, 'content' => 'Unauthorized']);
            return $this->interactionMessage('Unauthorized for /spark command.');
        }

        $output = command($command);
        $content = "```
" . $this->relayService->truncateReply((string) $output) . "
```";
        $this->auditRelay('spark', $command, $payload, ['success' => true, 'content' => $content]);
        return $this->interactionMessage($content, true);
    }

    protected function isDiscordAdminAuthorized(array $payload): bool
    {
        $cfg = config('DiscordOps');
        $user = $payload['member']['user'] ?? $payload['user'] ?? [];
        $userId = (string) ($user['id'] ?? '');
        if ($userId !== '' && in_array($userId, (array) $cfg->adminUserIds, true)) {
            return true;
        }

        $roles = array_map('strval', (array) ($payload['member']['roles'] ?? []));
        foreach ((array) $cfg->adminRoleIds as $roleId) {
            if (in_array((string) $roleId, $roles, true)) {
                return true;
            }
        }

        return false;
    }

    protected function auditRelay(string $type, string $commandName, array $payload, array $result): void
    {
        try {
            $user = $payload['member']['user'] ?? $payload['user'] ?? [];
            $this->relayAudit->insert([
                'relay_type' => $type,
                'discord_user_id' => (string) ($user['id'] ?? ''),
                'discord_channel_id' => (string) ($payload['channel_id'] ?? ''),
                'command_name' => $commandName,
                'request_payload' => json_encode($payload, JSON_UNESCAPED_SLASHES),
                'response_payload' => json_encode($result, JSON_UNESCAPED_SLASHES),
                'status' => ($result['success'] ?? false) ? 'ok' : 'failed',
                'created_on' => date('Y-m-d H:i:s'),
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'Discord relay audit failed: {msg}', ['msg' => $e->getMessage()]);
        }
    }

    protected function buildQuotePayload(string $symbol, string $type): array
    {
        if ($symbol === '') {
            return ['status' => 'error', 'message' => 'Missing symbol'];
        }

        $alpha = new MyMIAlphaVantage();
        $quote = $alpha->getCurrentPrice($symbol);
        $price = (float) ($quote['price'] ?? 0);
        $change = (float) ($quote['change_percent'] ?? 0);
        $source = 'AlphaVantage';

        if ($price <= 0) {
            $alert = $this->latestAlertForSymbol($symbol);
            if (! $alert) {
                return ['status' => 'error', 'message' => "No recent market data found for {$symbol}."];
            }
            $price = (float) ($alert['price'] ?? 0);
            $target = (float) ($alert['target_price'] ?? 0);
            $change = $target > 0 && $price > 0 ? (($target - $price) / $price) * 100 : 0.0;
            $source = 'alerts_cache';
        }

        $indicator = (new IndicatorHealthService())->evaluate($symbol, [
            'price' => $price,
            'change_percent' => $change,
            'high' => $quote['high'] ?? $price,
            'low' => $quote['low'] ?? $price,
            'open' => $quote['open'] ?? $price,
            'volume' => $quote['volume'] ?? 0,
        ]);

        $headlines = [];
        try {
            $news = (new MyMIAlerts())->fetchAlphaVantageNews($symbol);
            foreach (array_slice((array) $news, 0, 3) as $item) {
                $headlines[] = (string) ($item['title'] ?? $item['headline'] ?? 'headline');
            }
        } catch (\Throwable $e) {
            $headlines = [];
        }

        $emoji = $change >= 0 ? '📈' : '📉';
        $message = sprintf('%s **%s** %s: $%0.2f | Δ %0.2f%% | trend: %s | health: %s | source: %s', $emoji, $symbol, strtoupper($type), $price, $change, strtoupper((string) $indicator['summary']), $alpha->didHitRateLimit() ? 'rate_limited' : 'ok', $source);
        if ($headlines !== []) {
            $message .= "
• " . implode("
• ", $headlines);
        }

        return [
            'status' => 'success',
            'symbol' => $symbol,
            'price' => $price,
            'change_percent' => round($change, 2),
            'trend' => $indicator['summary'] ?? 'neutral',
            'indicator' => $indicator,
            'headlines' => $headlines,
            'message' => $message,
            'context' => ['source' => $source, 'indicator_healthcheck' => $alpha->didHitRateLimit() ? 'rate_limited' : 'ok'],
        ];
    }

    protected function formatNewsResponse(array $payload): array
    {
        $symbol = strtoupper((string) (($payload['data']['options'][0]['value'] ?? 'SPY')));
        $items = [];
        try {
            $items = (new MyMIAlerts())->fetchAlphaVantageNews($symbol);
        } catch (\Throwable $e) {
            log_message('warning', 'Discord news alpha fetch failed: {msg}', ['msg' => $e->getMessage()]);
        }

        if (empty($items)) {
            try {
                $items = (new MyMINews())->fetchTopMarketAuxNews(4);
            } catch (\Throwable $e) {
                log_message('warning', 'Discord news fallback fetch failed: {msg}', ['msg' => $e->getMessage()]);
            }
        }

        $macroCount = 0;
        try {
            $macro = (new FRED())->fetchSeriesUpdates(2);
            $macroCount = is_array($macro['seriess'] ?? null) ? count($macro['seriess']) : 0;
        } catch (\Throwable $e) {
            $macroCount = 0;
        }

        $secCount = 0;
        try {
            $secCount = count((new MyMISEC())->filings($symbol, 2));
        } catch (\Throwable $e) {
            $secCount = 0;
        }

        if (empty($items)) {
            return $this->interactionMessage("No recent news found for {$symbol}. Macro(FRED): {$macroCount}, SEC filings: {$secCount}.");
        }

        $lines = [];
        foreach (array_slice($items, 0, 4) as $item) {
            $title = (string) ($item['title'] ?? $item['headline'] ?? 'News');
            $url = (string) ($item['url'] ?? $item['link'] ?? '');
            $lines[] = $url !== '' ? "- {$title} {$url}" : "- {$title}";
        }

        return $this->interactionMessage("📰 {$symbol} recent news\n" . implode("\n", $lines) . "\nMacro(FRED): {$macroCount} | SEC filings: {$secCount}");
    }

    protected function handleCustomSendCommand(array $payload): array
    {
        $channelKey = trim((string) $this->extractOptionValue((array) ($payload['data']['options'] ?? []), 'channel_key'));
        $message = trim((string) $this->extractOptionValue((array) ($payload['data']['options'] ?? []), 'message'));
        if ($channelKey === '' || $message === '') {
            return $this->interactionMessage('Usage: /custom-send channel_key:<key> message:<text>');
        }

        $subject = trim((string) $this->extractOptionValue((array) ($payload['data']['options'] ?? []), 'subject')) ?: 'Custom Message';
        $recipientEmail = trim((string) $this->extractOptionValue((array) ($payload['data']['options'] ?? []), 'recipient_email'));
        $content = "📩 **{$subject}**\n{$message}";

        $queued = $this->discord->enqueuePlain($channelKey, $content, ['priority' => 5, 'recipient_email' => $recipientEmail]);
        $this->auditRelay('custom_send', 'custom-send', $payload, ['success' => $queued, 'content' => $content]);

        return $this->interactionMessage($queued ? 'Queued to ' . $channelKey . '.' : 'Unable to queue custom message.');
    }

    protected function interactionMessage(string $content, bool $ephemeral = true): array
    {
        return [
            'type' => 4,
            'data' => [
                'content' => $content,
                'flags'   => $ephemeral ? 64 : 0,
            ],
        ];
    }

    protected function verifySignature(string $rawBody): bool
    {
        $sig       = $this->request->getHeaderLine('X-Signature-Ed25519');
        $timestamp = $this->request->getHeaderLine('X-Signature-Timestamp');
        $publicKey = $this->cfg->publicKey ?? '';

        if (!$sig || !$timestamp || !$publicKey) {
            return false;
        }

        try {
            $sigBin = @hex2bin($sig);
            $keyBin = @hex2bin($publicKey);
            if ($sigBin === false || $keyBin === false) {
                return false;
            }
            $message = $timestamp.$rawBody;
            return sodium_crypto_sign_verify_detached($sigBin, $message, $keyBin);
        } catch (\Throwable $e) {
            log_message('warning', 'Discord signature verification failed: '.$e->getMessage());
            return false;
        }
    }



    protected function handleAiProviderCommand(array $payload): array
    {
        $options = (array) ($payload['data']['options'] ?? []);
        $provider = strtolower(trim((string) $this->extractOptionValue($options, 'provider')));
        $prompt = trim((string) $this->extractOptionValue($options, 'prompt'));

        if ($provider === '' || $prompt === '') {
            return $this->interactionMessage('Usage: /ai provider:<aiops|ollama> prompt:<text>');
        }

        $ops = config('DiscordOps');
        if (mb_strlen($prompt) > $ops->maxPromptLength) {
            return $this->interactionMessage('Prompt too long for relay policy.');
        }

        if (! ($ops->providersEnabled[$provider] ?? false)) {
            return $this->interactionMessage('Provider is disabled by policy.');
        }

        $result = match ($provider) {
            'aiops' => $this->relayService->relayAiopsPrompt($prompt, ['discord_payload' => $payload]),
            'ollama' => $this->relayService->relayOllamaPrompt($prompt, ['discord_payload' => $payload]),
            default => ['success' => false, 'content' => 'Unsupported provider.', 'meta' => []],
        };

        $this->auditRelay('ai', $provider, $payload, $result);
        return $this->interactionMessage((string) ($result['content'] ?? 'No response.'), true);
    }

    protected function isWithinTimestampSkew(): bool
    {
        $ts = trim($this->request->getHeaderLine('X-Signature-Timestamp'));
        if ($ts === '' || ! ctype_digit($ts)) {
            return false;
        }

        $ops = config('DiscordOps');
        return abs(time() - (int) $ts) <= max(30, (int) $ops->interactionsMaxSkewSeconds);
    }

    protected function enforceRateLimit(array $payload): bool
    {
        $ops = config('DiscordOps');
        $userId = $this->getInteractionUserId($payload);
        if ($userId === '') {
            return true;
        }

        $cache = cache();
        $window = max(10, (int) $ops->rateLimitWindowSeconds);
        $max = max(1, (int) $ops->rateLimitMaxRequestsPerUser);
        $key = 'discord:int:rate:' . sha1($userId);
        $bucket = $cache->get($key);
        $now = time();

        if (! is_array($bucket) || ($bucket['expires_at'] ?? 0) < $now) {
            $bucket = ['count' => 0, 'expires_at' => $now + $window];
        }

        $bucket['count'] = (int) ($bucket['count'] ?? 0) + 1;
        $cache->save($key, $bucket, max(1, $bucket['expires_at'] - $now));

        return $bucket['count'] <= $max;
    }

    protected function getInteractionUserId(array $payload): string
    {
        $user = $payload['member']['user'] ?? $payload['user'] ?? [];
        return trim((string) ($user['id'] ?? ''));
    }

    protected function extractOptionValue(array $options, string $name): ?string
    {
        foreach ($options as $opt) {
            if (($opt['name'] ?? '') === $name) {
                return (string) ($opt['value'] ?? '');
            }
        }
        return null;
    }

    protected function latestAlerts(?string $symbol, int $limit = 3): array
    {
        $alertsModel = new AlertsModel();
        $builder = $alertsModel->orderBy('created_on', 'DESC')->where('status !=', 'Closed');
        if ($symbol) {
            $builder->like('ticker', strtoupper($symbol));
        }
        return $builder->limit($limit)->find();
    }

    protected function latestAlertForSymbol(string $symbol): ?array
    {
        $alertsModel = new AlertsModel();
        return $alertsModel->orderBy('created_on', 'DESC')
            ->like('ticker', strtoupper($symbol))
            ->first();
    }

    protected function summarizeAlert($alert): array
    {
        return [
            'ticker' => $alert['ticker'] ?? $alert->ticker ?? '',
            'status' => $alert['status'] ?? $alert->status ?? '',
            'price'  => $alert['price'] ?? $alert->price ?? '',
            'target' => $alert['target_price'] ?? $alert->target_price ?? '',
            'stop'   => $alert['stop_loss'] ?? $alert->stop_loss ?? '',
            'created_on' => $alert['created_on'] ?? $alert->created_on ?? null,
        ];
    }

    protected function alertEmbed($alert): array
    {
        $summary = $this->summarizeAlert($alert);
        return [
            'title'       => ($summary['ticker'] ?: 'Alert').' — '.($summary['status'] ?: ''),
            'description' => 'Entry: '.$summary['price'].' | Target: '.$summary['target'].' | Stop: '.$summary['stop'],
            'timestamp'   => $summary['created_on'],
        ];
    }

    protected function maybeDenyPremiumCommand(string $commandKey, array $payload): ?array
    {
        $config = config('DiscordHelp');
        $meta   = $config->commands[$commandKey] ?? null;

        if (!$meta || empty($meta['premium'])) {
            return null;
        }

        $user = $this->getDiscordUser($payload);
        if (empty($user['id'])) {
            return $this->interactionMessage('Link your account with /mymi link to unlock this command.', true);
        }

        $link = $this->linkModel->findByDiscordId($user['id']);
        if (!$link || empty($link['user_id'])) {
            return $this->interactionMessage('Upgrade required. Link your MyMI Wallet account and ensure your plan includes this command: '.site_url('Memberships'), true);
        }

        // TODO: Check membership tier and map to Discord roles/plans.
        return null;
    }

    protected function formatCommandList(array $commands, array $keys): string
    {
        $parts = [];
        foreach ($keys as $key) {
            if (!isset($commands[$key])) {
                continue;
            }
            $cmd = $commands[$key];
            $parts[] = $cmd['name'].' — '.$cmd['description'];
        }

        return implode("\n", $parts);
    }

    protected function formatOnboardingChecklist(array $steps): string
    {
        $lines = [];
        foreach ($steps as $step) {
            $line = '- [ ] '.$step['title'];
            if (!empty($step['description'])) {
                $line .= ' — '.$step['description'];
            }
            if (!empty($step['url'])) {
                $line .= ' ('.$step['url'].')';
            }
            $lines[] = $line;
        }

        return implode("\n", $lines);
    }

    protected function mapStepKeyToAchievementKey(string $stepKey): ?string
    {
        $stepKey = trim($stepKey);
        if ($stepKey === '') {
            return null;
        }

        $known = [
            'read_how_it_works' => 'read_how_it_works',
            'first_budget_sync' => 'first_budget_sync',
            'first_trade_tracked' => 'first_trade_tracked',
            'onboarding_complete' => 'onboarding_complete',
        ];

        if (isset($known[$stepKey])) {
            return $known[$stepKey];
        }

        $config = config('DiscordHelp');
        if ($config && property_exists($config, 'onboardingSteps')) {
            foreach ($config->onboardingSteps as $step) {
                if (($step['key'] ?? '') === $stepKey) {
                    return $stepKey;
                }
            }
        }

        return null;
    }

    protected function getDiscordUser(array $payload): array
    {
        $user = $payload['member']['user'] ?? $payload['user'] ?? [];
        return [
            'id'       => (string) ($user['id'] ?? ''),
            'username' => (string) ($user['username'] ?? ''),
        ];
    }
}
