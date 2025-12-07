<?php namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Libraries\MyMIDiscord;
use App\Libraries\MyMIAssistant;
use App\Models\AlertsModel;
use App\Models\DiscordLinkModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Discord as DiscordConfig;

class DiscordController extends BaseController
{
    use ResponseTrait;

    protected MyMIDiscord $discord;
    protected DiscordConfig $cfg;
    protected DiscordLinkModel $linkModel;
    protected MyMIAssistant $assistant;

    public function __construct()
    {
        $this->discord = new MyMIDiscord();
        $this->cfg     = config('Discord');
        $this->linkModel = new DiscordLinkModel();
        $this->assistant = new MyMIAssistant();
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
        return $this->respond(['queued'=>$queued,'tz'=>config('Discord')->timezone]);
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

    public function handleInteraction(): ResponseInterface
    {
        $raw = $this->request->getBody();
        if (!$this->verifySignature($raw)) {
            return $this->failForbidden('Invalid Discord signature.');
        }

        $payload = json_decode($raw, true) ?? [];
        $type    = $payload['type'] ?? null;

        if ($type === 1) {
            return $this->respond(['type' => 1]);
        }

        $command = strtolower($payload['data']['name'] ?? '');
        $options = $payload['data']['options'][0] ?? [];

        switch ($command) {
            case 'mymi':
                $sub = strtolower($options['name'] ?? '');
                return $this->handleMymiCommand($sub, $options['options'] ?? [], $payload);
            case 'ticker':
                return $this->respond($this->formatTickerResponse($payload));
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

    public function completeOnboardingStep(): ResponseInterface
    {
        $discordUserId = (string) $this->request->getPost('discord_user_id');
        $stepKey       = (string) $this->request->getPost('step_key');

        if ($discordUserId === '' || $stepKey === '') {
            return $this->failValidationErrors('discord_user_id and step_key are required');
        }

        // TODO: Map step_key to bf_discord_achievements and insert into bf_discord_user_achievements
        return $this->response->setJSON([
            'status'  => 'accepted',
            'message' => 'Achievement recording to be wired in a follow-up release.',
        ]);
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
            $message = $timestamp.$rawBody;
            return sodium_crypto_sign_verify_detached(hex2bin($sig), $message, hex2bin($publicKey));
        } catch (\Throwable $e) {
            log_message('warning', 'Discord signature verification failed: '.$e->getMessage());
            return false;
        }
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

    protected function getDiscordUser(array $payload): array
    {
        $user = $payload['member']['user'] ?? $payload['user'] ?? [];
        return [
            'id'       => (string) ($user['id'] ?? ''),
            'username' => (string) ($user['username'] ?? ''),
        ];
    }
}