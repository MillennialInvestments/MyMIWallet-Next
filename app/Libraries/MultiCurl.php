<?php

namespace App\Libraries;

class MultiCurl
{
    public function run(array $urls, array $opts = []): array
    {
        $timeout = (int)($opts['timeout'] ?? 15);
        $connectTimeout = (int)($opts['connect_timeout'] ?? 10);
        $maxConcurrency = (int)($opts['concurrency'] ?? 10);

        $headers = $opts['headers'] ?? [];
        $cookie  = $opts['cookie'] ?? null;

        $results = [];
        $queue = array_values($urls);

        while (!empty($queue)) {
            $batch = array_splice($queue, 0, $maxConcurrency);

            $mh = curl_multi_init();
            $handles = [];

            foreach ($batch as $url) {
                $ch = curl_init($url);

                $h = $headers;
                if (!empty($h)) {
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
                }

                if ($cookie) {
                    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
                }

                curl_setopt_array($ch, [
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_TIMEOUT => $timeout,
                    CURLOPT_CONNECTTIMEOUT => $connectTimeout,
                    CURLOPT_HEADER => false,
                ]);

                $handles[$url] = $ch;
                curl_multi_add_handle($mh, $ch);
            }

            $running = null;
            do {
                curl_multi_exec($mh, $running);
                curl_multi_select($mh);
            } while ($running > 0);

            foreach ($handles as $url => $ch) {
                $resp = curl_multi_getcontent($ch);
                $err = curl_error($ch);
                $info = curl_getinfo($ch);

                $results[$url] = [
                    'status' => $info['http_code'] ?? 0,
                    'time_ms' => isset($info['total_time']) ? round($info['total_time'] * 1000, 2) : null,
                    'length' => strlen($resp ?? ''),
                    'redirect' => $info['redirect_url'] ?? '',
                    'error' => $err ?: null,
                ];

                curl_multi_remove_handle($mh, $ch);
                curl_close($ch);
            }

            curl_multi_close($mh);
        }

        return $results;
    }
}
