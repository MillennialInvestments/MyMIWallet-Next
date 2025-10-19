<?php namespace App\Libraries;

use App\Models\DiscordModel;
use Config\Discord as DiscordConfig;
use DateTime;
use DateTimeZone;

class MyMIDiscord
{
    protected DiscordModel $model;
    protected DiscordConfig $cfg;
    protected DateTimeZone $tz;

    public function __construct()
    {
        $this->model = new DiscordModel();
        $this->cfg   = config('Discord');
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

        $webhook = $chan['webhook_url'] ?: ($this->cfg->defaultWebhook ?: getenv('DISCORD_DEFAULT_WEBHOOK') ?: '');
        if ($webhook) {
            if ($this->cfg->storeWebhookMsgId && strpos($webhook, 'wait=true') === false) {
                $webhook .= (str_contains($webhook, '?') ? '&' : '?') . 'wait=true';
            }
            return $this->postJSON($webhook, $payload, $chan);
        }

        if ($this->cfg->useBotApiFallback && $this->cfg->botToken && !empty($chan['channel_id'])) {
            return $this->postBotMessage($chan['channel_id'], $payload);
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
}