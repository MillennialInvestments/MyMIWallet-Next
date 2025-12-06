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
            case 'link':
                $user = $payload['member']['user'] ?? $payload['user'] ?? [];
                $token = $this->linkModel->issueToken((string) ($user['id'] ?? ''), (string) ($user['username'] ?? ''));
                $url   = site_url('/Account/Social-Media?source=discord&code='.$token['token']);
                $msg   = 'Click the link to complete Discord linking: '.$url;
                return $this->respond($this->interactionMessage($msg, true));
            case 'alerts':
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
                return $this->respond($this->formatTickerResponse($payload));
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
}