<?php namespace App\Models;

use CodeIgniter\Model;
use DateTime;
use DateTimeInterface;
use DateTimeZone;

class DiscordModel extends Model
{
    protected $DBGroup = 'default';

    public function getEnabledSubscriptions(string $eventKey): array
    {
        return $this->db->table('bf_discord_subscriptions')
            ->where(['event_key'=>$eventKey,'is_enabled'=>1])
            ->get()->getResultArray();
    }

    public function getTemplate(string $templateKey): ?array
    {
        $row = $this->db->table('bf_discord_templates')->where('template_key',$templateKey)->get()->getRowArray();
        return $row ?: null;
    }

    public function getChannel(string $channelKey): ?array
    {
        $row = $this->db->table('bf_discord_channels')->where('channel_key',$channelKey)->get()->getRowArray();
        return $row ?: null;
    }

    public function enqueue(string $channelKey, array $payload, int $priority = 5, ?string $dedupeKey = null, ?string $coalesceKey = null): bool
    {
        $payloadJson = json_encode($payload, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        $dedupeSource = $dedupeKey ? ($dedupeKey.'|'.$payloadJson) : ($channelKey.'|'.$payloadJson);
        $dedupe = hash('sha256', $dedupeSource);
        $builder = $this->db->table('bf_discord_queue');
        $builder->ignore(true)->insert([
            'channel_key' => $channelKey,
            'payload_json'=> $payloadJson,
            'dedupe_hash' => $dedupe,
            'status'      => 'queued',
            'scheduled_at'=> date('Y-m-d H:i:s'),
            'priority'    => max(0, $priority),
            'coalesce_key'=> $coalesceKey,
        ]);
        return $this->db->affectedRows() > 0;
    }

    public function claimBatch(int $limit, DateTimeInterface $now): array
    {
        // Simple claim: select queued whose available_at is null or <= now
        return $this->db->table('bf_discord_queue')
            ->where('status','queued')
            ->groupStart()
                ->where('available_at IS NULL', null, false)
                ->orWhere('available_at <=', $now->format('Y-m-d H:i:s'))
            ->groupEnd()
            ->orderBy('scheduled_at','ASC')
            ->limit($limit)->get()->getResultArray();
    }

    public function skip(int $id, string $reason): void
    {
        $this->db->table('bf_discord_queue')->where('id',$id)->update([
            'status'=>'failed', 'error'=>$reason
        ]);
    }

    public function rescheduleLater(int $id, DateTimeInterface $at): void
    {
        $this->db->table('bf_discord_queue')->where('id',$id)->update([
            'available_at'=>$at->format('Y-m-d H:i:s'),
        ]);
    }

    public function rescheduleAfter(int $id, int $seconds): void
    {
        $this->db->table('bf_discord_queue')->where('id',$id)->update([
            'available_at'=> date('Y-m-d H:i:s', time()+max(10,$seconds/2)),
        ]);
    }

    public function getSubscriptionByChannelAndPayload(string $channelKey, array $queueRow): ?array
    {
        $coalesce = $queueRow['coalesce_key'] ?? null;
        $builder = $this->db->table('bf_discord_subscriptions')->where([
            'channel_key' => $channelKey,
            'is_enabled'  => 1,
        ]);
        if ($coalesce) {
            $builder->where('coalesce_key', $coalesce);
        }

        $row = $builder->orderBy('priority', 'DESC')->get()->getRowArray();
        return $row ?: null;
    }

    public function isDuplicate(array $queueRow): bool
    {
        $dedupe = $queueRow['dedupe_hash'];
        $exists = $this->db->table('bf_discord_message_history')->where('dedupe_hash',$dedupe)->countAllResults();
        if ($exists > 0) return true;

        $payload = json_decode($queueRow['payload_json'] ?? '{}', true);
        $content = (string)($payload['content'] ?? '');
        $norm    = $this->normalizedHash($content);
        $since   = date('Y-m-d H:i:s', time() - 86400);

        $fuzzy = $this->db->table('bf_discord_message_history')
            ->where('normalized_hash', $norm)
            ->where('created_at >=', $since)
            ->countAllResults();

        return $fuzzy > 0;
    }

    public function markSent(int $id, DateTimeInterface $now): void
    {
        $this->db->table('bf_discord_queue')->where('id',$id)->update([
            'status'=>'sent', 'sent_at'=>$now->format('Y-m-d H:i:s')
        ]);

        $row = $this->db->table('bf_discord_queue')->where('id',$id)->get()->getRowArray();
        $payload = json_decode($row['payload_json'] ?? '{}', true);
        $contentHash = hash('sha256', (string)($payload['content'] ?? ''));
        $this->db->table('bf_discord_message_history')->insert([
            'channel_key'  => $row['channel_key'],
            'content_hash' => $contentHash,
            'dedupe_hash'  => $row['dedupe_hash'],
            'normalized_hash' => $this->normalizedHash((string)($payload['content'] ?? '')),
            'created_at'   => date('Y-m-d H:i:s'),
        ]);
    }

    public function touchLastSent(string $channelKey, DateTimeInterface $now): void
    {
        $this->db->table('bf_discord_channels')->where('channel_key',$channelKey)->update([
            'last_sent_at'=> $now->format('Y-m-d H:i:s')
        ]);
    }

    public function backoff(int $id): void
    {
        $row = $this->db->table('bf_discord_queue')->where('id',$id)->get()->getRowArray();
        $attempts = (int)($row['attempts'] ?? 0) + 1;
        $envBase = getenv('DISCORD_ALERTS_JOB_RETRY_BASE_SEC');
        $base = max(5, $envBase !== false && $envBase !== null && $envBase !== '' ? (int) $envBase : 30);
        $delay = min(3600, (int) ($base * (2 ** ($attempts-1)) + random_int(0, 7)));
        $this->db->table('bf_discord_queue')->where('id',$id)->update([
            'attempts' => $attempts,
            'available_at' => date('Y-m-d H:i:s', time()+$delay),
            'status' => $attempts >= 8 ? 'dead' : 'queued'
        ]);
    }

    public function disableChannel(string $channelKey, string $reason = ''): void
    {
        $this->db->table('bf_discord_channels')->where('channel_key',$channelKey)->update([
            'is_enabled' => 0,
            'topic'      => ($reason ?: 'disabled_by_system'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function storeWebhookMessageId(string $channelKey, string $messageId, array $sentBody): void
    {
        $payloadJson = json_encode($sentBody, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        $this->db->table('bf_discord_message_history')->insert([
            'channel_key'     => $channelKey,
            'message_id'      => $messageId,
            'content_hash'    => hash('sha256', (string)($sentBody['content'] ?? '')),
            'dedupe_hash'     => hash('sha256', $channelKey.'|'.$payloadJson),
            'normalized_hash' => $this->normalizedHash($sentBody['content'] ?? ''),
            'created_at'      => date('Y-m-d H:i:s'),
        ]);
    }

    protected function normalizedHash(string $s): string
    {
        $n = preg_replace('~https?://\S+~', '', $s);
        $n = preg_replace('~\d+~', '', $n);
        $n = strtolower(trim(preg_replace('~\s+~', ' ', $n)));
        return hash('sha256', $n);
    }

    public function listChannels(): array
    {
        return $this->db->table('bf_discord_channels')->orderBy('channel_key','ASC')->get()->getResultArray();
    }

    public function listTemplates(): array
    {
        return $this->db->table('bf_discord_templates')->orderBy('template_key','ASC')->get()->getResultArray();
    }

    public function listSubscriptions(): array
    {
        return $this->db->table('bf_discord_subscriptions s')
            ->select('s.*, c.name AS channel_name, t.title AS template_title')
            ->join('bf_discord_channels c', 'c.channel_key = s.channel_key', 'left')
            ->join('bf_discord_templates t', 't.template_key = s.template_key', 'left')
            ->orderBy('s.event_key','ASC')
            ->orderBy('s.channel_key','ASC')
            ->get()->getResultArray();
    }

    public function saveChannel(array $data): bool
    {
        $id = isset($data['id']) ? (int)$data['id'] : 0;
        $payload = [
            'channel_key'      => trim($data['channel_key'] ?? ''),
            'name'             => trim($data['name'] ?? ''),
            'channel_id'       => trim($data['channel_id'] ?? ''),
            'webhook_url'      => trim($data['webhook_url'] ?? ''),
            'is_enabled'       => !empty($data['is_enabled']) ? 1 : 0,
            'allow_embeds'     => !empty($data['allow_embeds']) ? 1 : 0,
            'min_interval_sec' => max(0, (int)($data['min_interval_sec'] ?? $this->getDefaultInterval())),
            'role_id'          => trim($data['role_id'] ?? ''),
            'category'         => trim($data['category'] ?? ''),
            'priority'         => max(0, (int)($data['priority'] ?? 5)),
            'updated_at'       => date('Y-m-d H:i:s'),
        ];

        if ($id > 0) {
            return (bool) $this->db->table('bf_discord_channels')->where('id',$id)->update($payload);
        }

        $payload['created_at'] = date('Y-m-d H:i:s');
        return (bool) $this->db->table('bf_discord_channels')->insert($payload);
    }

    public function deleteChannel(int $id): bool
    {
        return (bool) $this->db->table('bf_discord_channels')->where('id',$id)->delete();
    }

    public function saveTemplate(array $data): bool
    {
        $id = isset($data['id']) ? (int)$data['id'] : 0;
        $payload = [
            'template_key' => trim($data['template_key'] ?? ''),
            'title'        => trim($data['title'] ?? ''),
            'content'      => $data['content'] ?? '',
            'embed_json'   => $this->normalizeJsonField($data['embed_json'] ?? null),
            'is_enabled'   => !empty($data['is_enabled']) ? 1 : 0,
            'updated_at'   => date('Y-m-d H:i:s'),
        ];

        if ($id > 0) {
            unset($payload['template_key']);
            return (bool) $this->db->table('bf_discord_templates')->where('id',$id)->update($payload);
        }

        $payload['created_at'] = date('Y-m-d H:i:s');
        return (bool) $this->db->table('bf_discord_templates')->insert($payload);
    }

    public function deleteTemplate(int $id): bool
    {
        return (bool) $this->db->table('bf_discord_templates')->where('id',$id)->delete();
    }

    public function saveSubscription(array $data): bool
    {
        $id = isset($data['id']) ? (int)$data['id'] : 0;
        $payload = [
            'event_key'     => trim($data['event_key'] ?? ''),
            'channel_key'   => trim($data['channel_key'] ?? ''),
            'template_key'  => trim($data['template_key'] ?? ''),
            'filters_json'  => $this->normalizeJsonField($data['filters_json'] ?? null),
            'is_enabled'    => !empty($data['is_enabled']) ? 1 : 0,
            'role_key'      => trim($data['role_key'] ?? ''),
            'mention_role'  => !empty($data['mention_role']) ? 1 : 0,
            'priority'      => max(0, (int)($data['priority'] ?? 5)),
            'coalesce_key'  => trim($data['coalesce_key'] ?? ''),
            'digest_window_sec' => max(0, (int)($data['digest_window_sec'] ?? 0)),
            'max_per_window'    => max(0, (int)($data['max_per_window'] ?? 0)),
            'digest_template_key' => trim($data['digest_template_key'] ?? ''),
            'quiet_bypass'       => !empty($data['quiet_bypass']) ? 1 : 0,
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        foreach (['role_key','coalesce_key','digest_template_key'] as $nullable) {
            if ($payload[$nullable] === '') {
                $payload[$nullable] = null;
            }
        }

        if ($id > 0) {
            return (bool) $this->db->table('bf_discord_subscriptions')->where('id',$id)->update($payload);
        }

        $payload['created_at'] = date('Y-m-d H:i:s');
        return (bool) $this->db->table('bf_discord_subscriptions')->insert($payload);
    }

    public function listPolicies(): array
    {
        return $this->db->table('bf_discord_policies')->orderBy('created_at','DESC')->get()->getResultArray();
    }

    public function savePolicy(array $data): bool
    {
        $id = isset($data['id']) ? (int) $data['id'] : 0;
        $ruleType = in_array($data['rule_type'] ?? '', ['blocklist','allowlist'], true) ? $data['rule_type'] : 'blocklist';
        $action   = in_array($data['action'] ?? '', ['drop','mask'], true) ? $data['action'] : 'drop';

        $pattern = trim($data['pattern'] ?? '');
        if ($pattern === '') {
            throw new \InvalidArgumentException('Pattern is required.');
        }

        $maskWith = isset($data['mask_with']) ? trim($data['mask_with']) : null;
        if ($action === 'mask' && $maskWith === '') {
            throw new \InvalidArgumentException('Mask replacement is required for mask actions.');
        }

        $payload = [
            'rule_type'   => $ruleType,
            'pattern'     => $pattern,
            'channel_key' => ($channel = trim($data['channel_key'] ?? '')) !== '' ? $channel : null,
            'action'      => $action,
            'mask_with'   => $maskWith !== '' ? $maskWith : null,
            'is_enabled'  => !empty($data['is_enabled']) ? 1 : 0,
        ];

        if ($id > 0) {
            return (bool) $this->db->table('bf_discord_policies')->where('id',$id)->update($payload);
        }

        $payload['created_at'] = date('Y-m-d H:i:s');
        return (bool) $this->db->table('bf_discord_policies')->insert($payload);
    }

    public function deletePolicy(int $id): bool
    {
        return (bool) $this->db->table('bf_discord_policies')->where('id',$id)->delete();
    }

    public function deleteSubscription(int $id): bool
    {
        return (bool) $this->db->table('bf_discord_subscriptions')->where('id',$id)->delete();
    }

    public function getRecentDataKeys(int $limit = 50): array
    {
        $rows = $this->db->table('bf_discord_logs')
            ->select('context_json')
            ->orderBy('id','DESC')
            ->limit($limit)
            ->get()->getResultArray();

        $keys = [];
        foreach ($rows as $row) {
            $ctx = json_decode($row['context_json'] ?? '[]', true);
            if (isset($ctx['data_keys']) && is_array($ctx['data_keys'])) {
                foreach ($ctx['data_keys'] as $key) {
                    if ($key !== '') {
                        $keys[$key] = true;
                    }
                }
            }
        }

        ksort($keys);
        return array_keys($keys);
    }

    public function getHealthSnapshot(): array
    {
        $cfg = config('Discord');
        $tzName = $cfg->timezone ?? 'America/Chicago';
        $tz = new DateTimeZone($tzName);
        $now = new DateTime('now', $tz);

        $start24 = (clone $now)->modify('-24 hours')->format('Y-m-d H:i:s');
        $start7  = (clone $now)->modify('-7 days')->format('Y-m-d H:i:s');

        $queued = $this->db->table('bf_discord_queue')->where('status','queued')->countAllResults();
        $failed = $this->db->table('bf_discord_queue')->where('status','failed')->where('created_at >=', $start24)->countAllResults();
        $dead   = $this->db->table('bf_discord_queue')->where('status','dead')->where('created_at >=', $start7)->countAllResults();

        $channels = $this->db->table('bf_discord_channels')
            ->select('channel_key,name,last_sent_at,min_interval_sec,is_enabled')
            ->orderBy('channel_key','ASC')
            ->get()->getResultArray();

        $nextQuiet = null;
        if (!empty($cfg->quietHoursStart) && !empty($cfg->quietHoursEnd)) {
            $end = DateTime::createFromFormat('H:i', $cfg->quietHoursEnd, $tz);
            if ($end) {
                $nextQuiet = new DateTime($now->format('Y-m-d').' '.$end->format('H:i').':00', $tz);
                if ((int)$now->format('Hi') >= (int)$end->format('Hi')) {
                    $nextQuiet->modify('+1 day');
                }
            }
        }

        return [
            'queued'           => $queued,
            'failed24h'        => $failed,
            'dead7d'           => $dead,
            'channels'         => $channels,
            'nextQuietResume'  => $nextQuiet ? $nextQuiet->format('Y-m-d H:i:s') : null,
            'timezone'         => $tzName,
        ];
    }

    public function logEvent(string $level, string $message, array $context = []): void
    {
        $now = date('Y-m-d H:i:s');
        $contextJson = $context ? json_encode($context, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : null;

        try {
            $this->db->table('bf_discord_logs')->insert([
                'level'        => $level,
                'message'      => $message,
                'context_json' => $contextJson,
                'created_at'   => $now,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'Failed to write Discord log: {err}', ['err' => $e->getMessage()]);
        }

        try {
            $this->db->table('bf_error_logs')->insert([
                'level'      => strtoupper($level),
                'message'    => $message,
                'context'    => $contextJson,
                'file'       => null,
                'line'       => null,
                'ip_address' => null,
                'user_agent' => null,
                'created_at' => $now,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'Failed to mirror Discord log to bf_error_logs: {err}', ['err' => $e->getMessage()]);
        }
    }

    protected function normalizeJsonField($value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }
        if (is_array($value)) {
            return json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }
        $trimmed = trim((string) $value);
        if ($trimmed === '') {
            return null;
        }
        $decoded = json_decode($trimmed, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \InvalidArgumentException('Invalid JSON payload.');
        }
        return json_encode($decoded, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    protected function getDefaultInterval(): int
    {
        $cfg = config('Discord');
        return (int)($cfg->minSecondsBetweenPosts ?? 90);
    }
}