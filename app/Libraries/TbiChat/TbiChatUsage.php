<?php

declare(strict_types=1);

namespace App\Libraries\TbiChat;

use Closure;

/**
 * Reads MyMI's own AI chat usage back from TBI AIOps
 * (GET https://chat.mymiwallet.com/usage?date=YYYYMMDD with a usage.read
 * token from TbiChatLink::reportToken, docs/aiops/tbi-tenant-chat.md).
 *
 * The report holds MyMI user ids, tiers, message, failure and token counts
 * and one anonymous total. It never holds what anyone asked or was told.
 *
 * TBI_CHAT_REPORT_RESOLVE (optional, an IP address) pins the chat host to
 * that address for this call only, for a server that cannot reach its own
 * public address. TLS is still checked against chat.mymiwallet.com.
 */
final class TbiChatUsage
{
    /** @var Closure(string, array<string, string>, ?string): array{status:int, body:string} */
    private Closure $get;

    /**
     * @param null|callable(string, array<string, string>, ?string): array{status:int, body:string} $get
     */
    public function __construct(private readonly TbiChatLink $link, ?callable $get = null, private readonly ?string $resolve = null)
    {
        $this->get = Closure::fromCallable($get ?? [self::class, 'curlGet']);
    }

    public static function fromEnv(): self
    {
        $resolve = function_exists('env') ? env('TBI_CHAT_REPORT_RESOLVE') : getenv('TBI_CHAT_REPORT_RESOLVE');
        $resolve = is_string($resolve) && filter_var(trim($resolve), FILTER_VALIDATE_IP) !== false ? trim($resolve) : null;

        return new self(TbiChatLink::fromEnv(), null, $resolve);
    }

    /**
     * One UTC day's report, or ['ok' => false, 'reason' => ...].
     *
     * @return array<string, mixed>
     */
    public function day(string $ymd, int $now): array
    {
        if (! preg_match('/^\d{8}$/', $ymd)) {
            return ['ok' => false, 'reason' => 'bad_date'];
        }
        $token = $this->link->reportToken($now);
        if ($token === null) {
            return ['ok' => false, 'reason' => 'chat_off'];
        }
        $res = ($this->get)($this->link->url() . '/usage?date=' . $ymd, ['Authorization' => 'Bearer ' . $token, 'Accept' => 'application/json'], $this->resolve);
        $data = json_decode($res['body'], true);
        if (! is_array($data)) {
            return ['ok' => false, 'reason' => $res['status'] === 0 ? 'unreachable' : 'bad_answer', 'status' => $res['status']];
        }
        if (($data['ok'] ?? false) !== true || $res['status'] !== 200) {
            return ['ok' => false, 'reason' => is_string($data['reason'] ?? null) ? $data['reason'] : 'refused', 'status' => $res['status']];
        }

        return $data;
    }

    /** @return array{status:int, body:string} */
    public static function curlGet(string $url, array $headers, ?string $resolve): array
    {
        $ch = curl_init($url);
        $lines = [];
        foreach ($headers as $k => $v) {
            $lines[] = $k . ': ' . $v;
        }
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $lines,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT => 20,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_PROTOCOLS => CURLPROTO_HTTPS,
        ]);
        $host = (string) parse_url($url, PHP_URL_HOST);
        if ($resolve !== null && $host !== '') {
            curl_setopt($ch, CURLOPT_RESOLVE, [$host . ':443:' . $resolve]);
        }
        $body = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);

        return ['status' => $body === false ? 0 : $status, 'body' => $body === false ? '' : (string) $body];
    }
}
