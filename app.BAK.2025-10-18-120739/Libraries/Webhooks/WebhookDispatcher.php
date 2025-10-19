<?php
// PATCH: enqueue and dispatch outbound webhooks
namespace App\Libraries\Webhooks;

use App\Models\WebhookOutboxModel;

class WebhookDispatcher
{
    public static function enqueue(string $url, array $payload, array $extraHeaders = []): int
    {
        $secret = getenv('MYMI_OUTBOUND_WEBHOOK_SECRET') ?: '';
        $body   = json_encode($payload, JSON_UNESCAPED_SLASHES);
        $sig    = 'sha256=' . hash_hmac('sha256', $body, $secret);

        $headers = array_merge([
            'Content-Type' => 'application/json',
            'X-Webhook-Signature' => $sig,
        ], $extraHeaders);

        $m = new WebhookOutboxModel();
        return $m->insert([
            'target_url'      => $url,
            'headers_json'    => json_encode($headers),
            'body_json'       => $body,
            'signature'       => $sig,
            'status'          => 'pending',
            'attempts'        => 0,
            'next_attempt_at' => date('Y-m-d H:i:s'),
            'created_at'      => date('Y-m-d H:i:s'),
        ]);
    }

    public static function attemptSend(array $row, int $timeout = 10): array
    {
        $headers = json_decode($row['headers_json'], true) ?: [];
        $ch = curl_init($row['target_url']);
        $hdr = [];
        foreach ($headers as $k=>$v) {
            $hdr[] = $k . ': ' . $v;
        }
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $row['body_json'],
            CURLOPT_HTTPHEADER => $hdr,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => $timeout,
        ]);
        $resp = curl_exec($ch);
        $err  = curl_error($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ['ok' => ($err === '' && $code >= 200 && $code < 300), 'code'=>$code, 'err'=>$err, 'resp'=>$resp];
    }
}
