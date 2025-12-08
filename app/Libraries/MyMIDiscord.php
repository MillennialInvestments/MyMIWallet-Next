<?php namespace App\Libraries;

use App\Models\DiscordModel;
use Config\Discord as DiscordConfig;
use DateTime;
use DateTimeZone;

class MyMIDiscord
{
    protected DiscordModel $model;
    protected DiscordConfig $cfg;
    protected DiscordConfig $config;
    protected DateTimeZone $tz;

    public function __construct()
    {
        $this->model = new DiscordModel();
        $this->config = config('Discord');
        $this->cfg    = $this->config;
        $this->hydrateConfigFromEnv();
        $this->tz    = new DateTimeZone($this->cfg->timezone ?? 'America/Chicago');
    }

    /** Queue a message using template + data into channel_key */
    public function dispatch(string $eventKey, array $data): bool
    {
        $subs = $this->model->getEnabledSubscriptions($eventKey);
        foreach ($subs as $sub) {
            if (!$this->passesFilters($sub['filters_json'] ?? null, $data)) {
                continue;
            }
            $payload = $this->renderTemplate($sub['template_key'], $data);
            if (!$payload) {
                $this->model->logEvent('warning', 'discord.render_template_skipped', [
                    'event'    => $eventKey,
                    'template' => $sub['template_key'],
                    'channel'  => $sub['channel_key'],
                ]);
                continue;
            }

            // Quiet hours & channel pacing handled at process time; still schedule now.
            $queued = $this->model->enqueue($sub['channel_key'], $payload);
            $this->model->logEvent($queued ? 'info' : 'notice', $queued ? 'discord.queued' : 'discord.dedupe_skip', [
                'event'       => $eventKey,
                'channel'     => $sub['channel_key'],
                'template'    => $sub['template_key'],
                'payload_len' => strlen(json_encode($payload)),
                'data_keys'   => array_keys($data),
            ]);
        }
        return true;
    }

    /** Queue a plain text payload to a specific channel_key (bypasses template lookup). */
    public function enqueuePlain(string $channelKey, string $content, array $context = []): bool
    {
        $content = $this->sanitize($content);
        if ($content === '') {
            return false;
        }

        $payload = ['content' => $content];
        if (!empty($context['embeds']) && is_array($context['embeds'])) {
            $payload['embeds'] = $context['embeds'];
        }

        return $this->model->enqueue(
            $channelKey,
            $payload,
            (int)($context['priority'] ?? 5),
            $context['dedupe_key'] ?? null,
            $context['coalesce_key'] ?? null
        );
    }

    /**
     * Dispatch a liquidity scanner alert through the Discord pipeline.
     */
    public function notifyLiquidityScan(array $payload): bool
    {
        // Normalize and validate required fields
        $ticker    = strtoupper(trim($payload['ticker'] ?? ''));
        $scanner   = trim($payload['scanner'] ?? '');
        $timeframe = trim($payload['timeframe'] ?? '');
        $price     = isset($payload['price']) ? (float) $payload['price'] : null;

        if ($ticker === '' || $scanner === '') {
            $this->model->logEvent('warning', 'scanner.liquidity.missing_fields', [
                'raw' => array_keys($payload),
            ]);
            return false;
        }

        if ($price === null) {
            $this->model->logEvent('notice', 'scanner.liquidity.price_missing', [
                'ticker'  => $ticker,
                'scanner' => $scanner,
            ]);
        }

        $eventData = [
            'ticker'       => $ticker,
            'scanner'      => $scanner,
            'timeframe'    => $timeframe !== '' ? $timeframe : ($payload['tf'] ?? ''),
            'price'        => $price,
            'notes'        => $payload['notes'] ?? null,
            'triggered_at' => $payload['triggered_at'] ?? date('Y-m-d H:i:s'),
        ];

        return $this->dispatch('scanner.liquidity', $eventData);
    }

    /** Render a template_key into {content, embeds?} */
    public function renderTemplate(string $templateKey, array $data): ?array
    {
        $tpl = $this->model->getTemplate($templateKey);
        if (!$tpl || !(int)$tpl['is_enabled']) return null;

        $content = $this->mustache($tpl['content'] ?? '', $data);
        $embeds  = $tpl['embed_json'] ? json_decode($this->mustache($tpl['embed_json'], $data), true) : null;
        if (!$embeds && !empty($data['image_url'])) {
            $embeds = ['image' => ['url' => $data['image_url']]];
        } elseif (is_array($embeds) && !empty($data['image_url']) && empty($embeds['image']['url'])) {
            $embeds['image']['url'] = $data['image_url'];
        }

        $payload = ['content' => $this->sanitize($content)];
        if ($embeds) {
            $payload['embeds'] = [$embeds];
        }

        return $payload;
    }

    /** Simple mustache replacer: {{var}} and {{#items}} loops (minimal) */
    protected function mustache(string $text, array $data): string
    {
        // loops
        $text = preg_replace_callback('/\{\{#(\w+)\}\}(.+?)\{\{\/\1\}\}/s', function($m) use($data) {
            $k = $m[1]; $tpl = $m[2];
            $arr = $data[$k] ?? [];
            if (!is_array($arr)) return '';
            $out = '';
            foreach ($arr as $row) {
                $out .= preg_replace_callback('/\{\{(\w+)\}\}/', function($mm) use($row) {
                    return isset($row[$mm[1]]) ? (string)$row[$mm[1]] : '';
                }, $tpl);
            }
            return $out;
        }, $text);

        // scalars
        $text = preg_replace_callback('/\{\{(\w+)\}\}/', function($m) use($data) {
            return isset($data[$m[1]]) ? (string)$data[$m[1]] : '';
        }, $text);

        return trim($text);
    }

    protected function sanitize(string $s): string
    {
        // prevent @everyone etc. and excess whitespace
        $s = str_replace(['@everyone','@here'], ['everyone','here'], $s);
        $s = preg_replace('/\s{3,}/', '  ', $s);

        try {
            $db = db_connect();
            $rules = $db->table('bf_discord_policies')->where('is_enabled', 1)->get()->getResultArray();
            foreach ($rules as $r) {
                $pattern = '~' . $r['pattern'] . '~i';
                if (!preg_match($pattern, $s)) {
                    continue;
                }

                if ($r['rule_type'] === 'blocklist') {
                    if ($r['action'] === 'drop') {
                        return '';
                    }
                    if ($r['action'] === 'mask' && !empty($r['mask_with'])) {
                        $s = preg_replace($pattern, $r['mask_with'], $s);
                    }
                }
            }
        } catch (\Throwable $e) {
            // ignore policy failures
        }

        return $s;
    }

    protected function coalesceQueue(): void
    {
        $db = db_connect();
        $subs = $db->table('bf_discord_subscriptions')
            ->where('is_enabled', 1)
            ->where('digest_window_sec >', 0)
            ->get()->getResultArray();

        if (!$subs) {
            return;
        }

        $now = new \DateTimeImmutable('now', $this->tz);

        foreach ($subs as $sub) {
            $window = (int) $sub['digest_window_sec'];
            $since  = $now->modify("-{$window} seconds")->format('Y-m-d H:i:s');

            $rows = $db->table('bf_discord_queue')
                ->where('status', 'queued')
                ->where('channel_key', $sub['channel_key'])
                ->where('coalesce_key', $sub['coalesce_key'])
                ->groupStart()
                    ->where('available_at IS NULL', null, false)
                    ->orWhere('available_at <=', $now->format('Y-m-d H:i:s'))
                ->groupEnd()
                ->where('scheduled_at >=', $since)
                ->orderBy('scheduled_at', 'ASC')
                ->get()->getResultArray();

            if (count($rows) < 2) {
                continue;
            }

            $max  = (int) ($sub['max_per_window'] ?? 0);
            $take = $max > 0 ? min($max, count($rows)) : count($rows);

            $items = [];
            for ($i = 0; $i < $take; $i++) {
                $p = json_decode($rows[$i]['payload_json'], true) ?: [];
                $items[] = [
                    'headline' => $p['headline'] ?? $p['title'] ?? (mb_strimwidth($p['content'] ?? '', 0, 80, '…')),
                    'url'      => $p['url'] ?? $p['chartUrl'] ?? '',
                ];
            }

            $tplKey = $sub['digest_template_key'] ?: 'digest.market_news.15m';
            $payload = $this->renderTemplate($tplKey, [
                'count'  => count($items),
                'window' => "{$window}s",
                'items'  => $items,
            ]);
            if (!$payload) {
                continue;
            }

            model('DiscordModel')->enqueue(
                $sub['channel_key'],
                $payload,
                (int) ($sub['priority'] ?? 5),
                $sub['channel_key'],
                $sub['coalesce_key']
            );

            $ids = array_column($rows, 'id');
            if ($ids) {
                $db->table('bf_discord_queue')->whereIn('id', $ids)->update([
                    'status' => 'failed',
                    'error'  => 'coalesced',
                ]);
            }
        }
    }

    /** Worker: send up to $limit messages respecting channel pacing, quiet hours, and dedupe */
    public function processQueue(int $limit = 25): array
    {
        $this->coalesceQueue();

        $now = new DateTime('now', $this->tz);
        $items = $this->model->claimBatch($limit, $now);

        $stats = ['sent'=>0,'skipped'=>0,'failed'=>0];
        foreach ($items as $item) {
            $chan = $this->model->getChannel($item['channel_key']);
            if (!$chan || !(int)$chan['is_enabled']) {
                $this->model->skip($item['id'],'channel_disabled');
                $this->model->logEvent('warning', 'discord.skip.channel_disabled', ['queue_id'=>$item['id'],'channel'=>$item['channel_key']]);
                $stats['skipped']++;
                continue;
            }

            $subQuietBypass = false;
            try {
                $subRow = $this->model->getSubscriptionByChannelAndPayload($item['channel_key'], $item);
                $subQuietBypass = (bool)($subRow['quiet_bypass'] ?? false);
            } catch (\Throwable $e) {
                // no-op
            }

            if ($this->isQuietHours($now) && !$subQuietBypass) {
                $resume = $this->quietResumeAt($now);
                $this->model->rescheduleLater($item['id'], $resume);
                $this->model->logEvent('notice', 'discord.defer.quiet_hours', ['queue_id'=>$item['id'],'channel'=>$item['channel_key'],'resume_at'=>$resume->format('Y-m-d H:i:s')]);
                $stats['skipped']++;
                continue;
            }

            if (!$this->channelPacingOK($chan, $now)) {
                $this->model->rescheduleAfter($item['id'], (int)$chan['min_interval_sec']);
                $this->model->logEvent('notice', 'discord.defer.channel_pacing', ['queue_id'=>$item['id'],'channel'=>$item['channel_key']]);
                $stats['skipped']++;
                continue;
            }

            if ($this->model->isDuplicate($item)) {
                $this->model->skip($item['id'],'duplicate');
                $this->model->logEvent('info', 'discord.skip.duplicate', ['queue_id'=>$item['id'],'channel'=>$item['channel_key']]);
                $stats['skipped']++;
                continue;
            }

            $payload = json_decode($item['payload_json'], true) ?? [];
            if (($payload['content'] ?? null) === '') {
                $this->model->skip($item['id'], 'policy_drop');
                $stats['skipped']++;
                continue;
            }
            $ok = $this->deliver($chan, $payload);
            if ($ok) {
                $this->model->markSent($item['id'], $now);
                $this->model->touchLastSent($chan['channel_key'], $now);
                $this->model->logEvent('info', 'discord.sent', ['queue_id'=>$item['id'],'channel'=>$item['channel_key']]);
                $stats['sent']++;
            } else {
                $this->model->backoff($item['id']); // exponential backoff
                $this->model->logEvent('error', 'discord.retry', ['queue_id'=>$item['id'],'channel'=>$item['channel_key']]);
                $stats['failed']++;
            }
        }
        return $stats;
    }

    protected function isQuietHours(DateTime $now): bool
    {
        [$qs,$qe] = [$this->cfg->quietHoursStart, $this->cfg->quietHoursEnd];
        if (!$qs || !$qe) return false;
        $start = DateTime::createFromFormat('H:i', $qs, $this->tz);
        $end   = DateTime::createFromFormat('H:i', $qe, $this->tz);
        if (!$start || !$end) return false;

        $h = (int)$now->format('Hi');
        $hs = (int)$start->format('Hi');
        $he = (int)$end->format('Hi');

        return $hs <= $he ? ($h >= $hs && $h < $he) : ($h >= $hs || $h < $he);
    }

    protected function quietResumeAt(DateTime $now): DateTime
    {
        $end = DateTime::createFromFormat('H:i', $this->cfg->quietHoursEnd, $this->tz);
        $resume = new DateTime($now->format('Y-m-d').' '.$end->format('H:i').':00', $this->tz);
        if ((int)$now->format('Hi') >= (int)$end->format('Hi')) {
            $resume->modify('+1 day');
        }
        return $resume;
    }

    protected function channelPacingOK(array $chan, DateTime $now): bool
    {
        $min = (int)($chan['min_interval_sec'] ?? $this->cfg->minSecondsBetweenPosts);
        if ($min <= 0) return true;
        if (empty($chan['last_sent_at'])) return true;
        $last = new DateTime($chan['last_sent_at'], $this->tz);
        return ($now->getTimestamp() - $last->getTimestamp()) >= $min;
    }

    protected function deliver(array $chan, array $payload): bool
    {
        // Prefer webhook for stability; fall back to bot API if needed
        if (!(int)($chan['allow_embeds'] ?? 1) && isset($payload['embeds'])) {
            unset($payload['embeds']);
        }

        if ($this->cfg->alertsStrict && empty($chan['webhook_url']) && empty($chan['channel_id'])) {
            log_message('warning', 'Discord strict mode: missing target for channel_key={k}', ['k' => $chan['channel_key'] ?? '']);
            return false;
        }

        if ($this->cfg->alertsDryRun) {
            log_message('info', 'Discord DRY_RUN: {payload}', ['payload' => json_encode($payload)]);
            return true;
        }

        // $webhook = $chan['webhook_url'] ?: ($this->cfg->defaultWebhook ?: getenv('DISCORD_DEFAULT_WEBHOOK') ?: '');
        $webhook = $this->resolveChannelWebhook($chan);
        if ($webhook) {
            if ($this->cfg->storeWebhookMsgId && strpos($webhook, 'wait=true') === false) {
                $webhook .= (str_contains($webhook, '?') ? '&' : '?') . 'wait=true';
            }
            return $this->postJSON($webhook, $payload, $chan);
        }

        $channelId = $chan['channel_id'] ?: $this->resolveChannelId($chan);
        if ($this->cfg->useBotApiFallback && $this->cfg->botToken && !empty($channelId)) {
            return $this->postBotMessage($channelId, $payload);
        }

        return false;
    }

    protected function postJSON(string $url, array $body, array $chan): bool
    {
        try {
            $client = \Config\Services::curlrequest(['timeout' => 10]);
            $resp = $client->post($url, [
                'headers' => ['Content-Type' => 'application/json'],
                'json'    => $body,
            ]);
            $code = $resp->getStatusCode();
            $ok   = $code >= 200 && $code < 300;

            if ($ok && $this->cfg->storeWebhookMsgId) {
                $payload = json_decode($resp->getBody(), true);
                if (!empty($payload['id'])) {
                    model('DiscordModel')->storeWebhookMessageId(
                        $chan['channel_key'] ?? '',
                        (string) $payload['id'],
                        $body
                    );
                }
            }

            if (!$ok && in_array($code, [401, 403, 404], true)) {
                model('DiscordModel')->disableChannel($chan['channel_key'] ?? '', 'invalid_webhook_' . $code);
            }
            return $ok;
        } catch (\Throwable $e) {
            log_message('error', 'Discord deliver failed: {err}', ['err' => $e->getMessage()]);
            return false;
        }
    }

    protected function postBotMessage(string $channelId, array $body): bool
    {
        try {
            $client = \Config\Services::curlrequest(['timeout' => 10]);
            $resp = $client->post('https://discord.com/api/v10/channels/' . $channelId . '/messages', [
                'headers' => [
                    'Authorization' => 'Bot ' . $this->cfg->botToken,
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'content'          => $body['content'] ?? '',
                    'embeds'           => $body['embeds'] ?? null,
                    'allowed_mentions' => $body['allowed_mentions'] ?? ['parse' => []],
                ],
            ]);
            return $resp->getStatusCode() >= 200 && $resp->getStatusCode() < 300;
        } catch (\Throwable $e) {
            log_message('error', 'Discord Bot API failed: {err}', ['err' => $e->getMessage()]);
            return false;
        }
    }

    protected function passesFilters(?string $filtersJson, array $data): bool
    {
        if (!$filtersJson) return true;
        $f = json_decode($filtersJson, true) ?: [];
        // Example: tickers filter
        if (!empty($f['tickers']) && isset($data['ticker']) && is_array($f['tickers'])) {
            if (!in_array(strtoupper($data['ticker']), array_map('strtoupper',$f['tickers']), true)) return false;
        }
        return true;
    }

    protected function hydrateConfigFromEnv(): void
    {
        $envTz = getenv('DISCORD_TIMEZONE');
        if (!empty($envTz)) {
            $this->cfg->timezone = $envTz;
        }

        $envWebhook = getenv('DISCORD_DEFAULT_WEBHOOK');
        if (!empty($envWebhook)) {
            $this->cfg->defaultWebhook = $envWebhook;
        }

        $envMinGap = getenv('DISCORD_MIN_SECONDS_BETWEEN_POSTS');
        if ($envMinGap !== false && $envMinGap !== null && $envMinGap !== '') {
            $this->cfg->minSecondsBetweenPosts = (int) $envMinGap;
        }

        $envQuietStart = getenv('DISCORD_QUIET_HOURS_START');
        if (!empty($envQuietStart)) {
            $this->cfg->quietHoursStart = $envQuietStart;
        }

        $envQuietEnd = getenv('DISCORD_QUIET_HOURS_END');
        if (!empty($envQuietEnd)) {
            $this->cfg->quietHoursEnd = $envQuietEnd;
        }
    }

    protected function resolveChannelWebhook(array $chan): string
    {
        $key = $chan['channel_key'] ?? '';
        if (!empty($chan['webhook_url'])) {
            return $chan['webhook_url'];
        }

        if ($key && !empty($this->cfg->channelWebhooks[$key] ?? null)) {
            return $this->cfg->channelWebhooks[$key];
        }

        return $this->cfg->defaultWebhook ?: (string) getenv('DISCORD_DEFAULT_WEBHOOK') ?: '';
    }

    protected function resolveChannelId(array $chan): string
    {
        $key = $chan['channel_key'] ?? '';
        if (!empty($chan['channel_id'])) {
            return (string) $chan['channel_id'];
        }

        if ($key && !empty($this->cfg->channelIds[$key] ?? null)) {
            return $this->cfg->channelIds[$key];
        }

        return '';
    }

    public function apiGet(string $endpoint)
    {
        $token = getenv('DISCORD_BOT_TOKEN');

        if (empty($token)) {
            log_message('error', 'MyMIDiscord::apiGet missing DISCORD_BOT_TOKEN env var.');
            return null;
        }

        $client = \Config\Services::curlrequest([
            'baseURI' => 'https://discord.com/api/v10',
            'headers' => [
                'Authorization' => "Bot {$token}",
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
                'User-Agent'    => 'MyMIWalletBot (https://www.mymiwallet.com)',
            ],
            'http_errors'    => false,   // don’t throw exceptions on 4xx/5xx
            'allow_redirects'=> false,   // <- IMPORTANT, don’t silently follow to HTML
            'timeout'        => 10,
        ]);

        $endpoint = '/' . ltrim($endpoint, '/');

        try {
            $response = $client->get($endpoint);
        } catch (\Throwable $e) {
            log_message('error', 'MyMIDiscord::apiGet transport error for {endpoint}: {err}', [
                'endpoint' => $endpoint,
                'err'      => $e->getMessage(),
            ]);
            return null;
        }

        $status = $response->getStatusCode();
        $body   = (string) $response->getBody();
        $headers = $response->getHeaderLine('Location');

        if ($status >= 300) {
            log_message(
                'error',
                'MyMIDiscord::apiGet HTTP {status} for {endpoint}. Location={loc}, body={body}',
                [
                    'status'   => $status,
                    'endpoint' => $endpoint,
                    'loc'      => $headers,
                    'body'     => substr($body, 0, 300),
                ]
            );
            return null;
        }

        $decoded = json_decode($body, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message(
                'error',
                'MyMIDiscord::apiGet JSON decode error for {endpoint}: {error} - {body}',
                [
                    'endpoint' => $endpoint,
                    'error'    => json_last_error_msg(),
                    'body'     => substr($body, 0, 300),
                ]
            );
            return null;
        }

        return $decoded;
    }

    private function markOnboardingStepCompleted(string $discordUserId, string $stepKey): void
    {
        $endpoint = $this->config->onboardingCompleteEndpoint ?? null;
        $token    = $this->config->internalApiToken ?? null;

        if (!$endpoint || !$token) {
            log_message('debug', 'MyMIDiscord::markOnboardingStepCompleted skipped (missing endpoint or token).');
            return;
        }

        $payload = [
            'discord_user_id' => $discordUserId,
            'step_key'        => $stepKey,
        ];

        try {
            if (class_exists(\GuzzleHttp\Client::class)) {
                $client = new \GuzzleHttp\Client([
                    'timeout' => 3.0,
                ]);

                $response = $client->post($endpoint, [
                    'headers' => [
                        'Accept'               => 'application/json',
                        'X-Internal-Api-Token' => $token,
                    ],
                    'form_params' => $payload,
                ]);

                $statusCode = $response->getStatusCode();
                if ($statusCode >= 200 && $statusCode < 300) {
                    log_message('debug', 'MyMIDiscord::markOnboardingStepCompleted success for {discord_user_id} step={step_key}', [
                        'discord_user_id' => $discordUserId,
                        'step_key'        => $stepKey,
                    ]);
                } else {
                    log_message('warning', 'MyMIDiscord::markOnboardingStepCompleted non-2xx response: {code}', [
                        'code' => $statusCode,
                    ]);
                }

                return;
            }

            $ch = curl_init($endpoint);
            curl_setopt_array($ch, [
                CURLOPT_POST           => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT        => 3,
                CURLOPT_HTTPHEADER     => [
                    'Accept: application/json',
                    'X-Internal-Api-Token: ' . $token,
                ],
                CURLOPT_POSTFIELDS     => http_build_query($payload),
            ]);

            $body       = curl_exec($ch);
            $curlError  = curl_error($ch);
            $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($curlError) {
                log_message('error', 'MyMIDiscord::markOnboardingStepCompleted curl error: {error}', [
                    'error' => $curlError,
                ]);
                return;
            }

            if ($statusCode < 200 || $statusCode >= 300) {
                log_message('warning', 'MyMIDiscord::markOnboardingStepCompleted HTTP status {code} body={body}', [
                    'code' => $statusCode,
                    'body' => $body,
                ]);
                return;
            }

            log_message('debug', 'MyMIDiscord::markOnboardingStepCompleted success (curl) for {discord_user_id} step={step_key}', [
                'discord_user_id' => $discordUserId,
                'step_key'        => $stepKey,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'MyMIDiscord::markOnboardingStepCompleted failed: {msg}', [
                'msg' => $e->getMessage(),
            ]);
        }
    }

    public function trackOnboardingStep(string $discordUserId, string $stepKey): void
    {
        $this->markOnboardingStepCompleted($discordUserId, $stepKey);
    }
}