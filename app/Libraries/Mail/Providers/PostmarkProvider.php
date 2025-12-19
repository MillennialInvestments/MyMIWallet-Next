<?php

namespace App\Libraries\Mail\Providers;

use App\Libraries\Mail\Contracts\MailProviderInterface;

class PostmarkProvider implements MailProviderInterface
{
    public function send(array $payload): array
    {
        $token = getenv('postmark.token');
        if (! $token) {
            return [
                'ok'         => false,
                'provider'   => 'postmark',
                'message_id' => null,
                'error'      => 'Missing postmark.token',
                'meta'       => [],
            ];
        }

        $ch = curl_init('https://api.postmarkapp.com/email');

        $body = [
            'From'     => trim(($payload['from_name'] ?? '') . ' <' . ($payload['from_email'] ?? '') . '>'),
            'To'       => $payload['to'] ?? '',
            'Subject'  => $payload['subject'] ?? '',
            'HtmlBody' => $payload['html'] ?? null,
            'TextBody' => $payload['text'] ?? null,
        ];

        if (! empty($payload['reply_to'])) {
            $body['ReplyTo'] = $payload['reply_to'];
        }

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_HTTPHEADER     => [
                'Accept: application/json',
                'Content-Type: application/json',
                'X-Postmark-Server-Token: ' . $token,
            ],
            CURLOPT_POSTFIELDS     => json_encode($body),
            CURLOPT_TIMEOUT        => 15,
        ]);

        $resp = curl_exec($ch);
        $err  = curl_error($ch);
        $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($resp === false) {
            return [
                'ok'         => false,
                'provider'   => 'postmark',
                'message_id' => null,
                'error'      => $err ?: 'cURL error',
                'meta'       => ['http_code' => $code],
            ];
        }

        $json = json_decode($resp, true) ?: [];
        if ($code >= 200 && $code < 300) {
            return [
                'ok'         => true,
                'provider'   => 'postmark',
                'message_id' => $json['MessageID'] ?? null,
                'error'      => null,
                'meta'       => ['http_code' => $code],
            ];
        }

        return [
            'ok'         => false,
            'provider'   => 'postmark',
            'message_id' => null,
            'error'      => $json['Message'] ?? ('HTTP ' . $code),
            'meta'       => ['http_code' => $code, 'raw' => $json],
        ];
    }
}
