<?php
namespace App\Libraries\Resilience;

class HttpClient
{
    public static function postJson(string $breakerName, string $url, array $data, array $headers = [], int $timeout = 10): array
    {
        $cb = new CircuitBreaker($breakerName);
        if (! $cb->allow()) {
            return ['ok' => false, 'code' => 503, 'err' => 'circuit_open', 'body' => null];
        }

        $body = json_encode($data, JSON_UNESCAPED_SLASHES);
        $hdrs = array_merge(['Content-Type' => 'application/json'], $headers);
        $attempts = 0;
        $max = (int)(getenv('QUEUE_MAX_ATTEMPTS') ?: 5);
        $base = (int)(getenv('QUEUE_BACKOFF_SECONDS') ?: 10);

        while ($attempts < $max) {
            $attempts++;
            $res = self::curl('POST', $url, $body, $hdrs, $timeout);
            if ($res['ok']) {
                $cb->recordSuccess();
                return $res;
            }

            if (in_array($res['code'], [0,408,425,429,500,502,503,504], true)) {
                $cb->recordFailure();
                $delay = min(60, $base * (2 ** max(0, $attempts-1)) + random_int(0,5));
                sleep($delay);
                continue;
            }
            $cb->recordFailure();
            return $res;
        }

        return ['ok' => false, 'code' => 503, 'err' => 'retry_exhausted', 'body' => null];
    }

    private static function curl(string $method, string $url, ?string $body, array $headers, int $timeout): array
    {
        $ch = curl_init($url);
        $hdr = [];
        foreach ($headers as $k => $v) {
            $hdr[] = $k . ': ' . $v;
        }
        curl_setopt_array($ch, [
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => $hdr,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => $timeout,
        ]);
        $resp = curl_exec($ch);
        $err  = curl_error($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ['ok' => ($err === '' && $code >= 200 && $code < 300), 'code' => $code ?: 0, 'err' => $err, 'body' => $resp];
    }
}

