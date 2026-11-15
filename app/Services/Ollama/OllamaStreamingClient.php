<?php

namespace App\Services\Ollama;

use Config\TbiOllamaControlPlane;

final class OllamaStreamingClient
{
    private function allowedBaseUrls(): array
    {
        $controlPlane = config(TbiOllamaControlPlane::class);
        $allowed = [];

        foreach ($controlPlane->nodes() as $name => $node) {
            $allowed[] = 'http://' . $name . ':11434';
            $allowed[] = rtrim((string) $node['endpoint'], '/');
        }

        return $allowed;
    }

    public function streamChat(
        string $baseUrl,
        string $model,
        array $messages,
        array $options,
        int $timeout,
        callable $onChunk,
        callable $onDone,
        ?array $format = null
    ): void {
        $baseUrl = rtrim($baseUrl, '/');

        if (! in_array($baseUrl, $this->allowedBaseUrls(), true)) {
            throw new \RuntimeException(
                'Ollama base URL is not allowlisted.'
            );
        }

        $payload = [
            'model' => $model,
            'stream' => true,
            'messages' => $messages,
        ];

        if ($options !== []) {
            $payload['options'] = $options;
        }

        if ($format !== null) {
            $payload['format'] = $format;
        }

        $encodedPayload = json_encode(
            $payload,
            JSON_UNESCAPED_SLASHES
            | JSON_THROW_ON_ERROR
        );

        $ch = curl_init($baseUrl . '/api/chat');

        if ($ch === false) {
            throw new \RuntimeException(
                'Unable to initialize curl.'
            );
        }

        $buffer = '';
        $startedAt = microtime(true);
        $firstByteAt = null;
        $chunkCount = 0;
        $streamedBytes = 0;
        $terminalRecord = null;

        try {
            $configured = curl_setopt_array(
                $ch,
                [
                CURLOPT_POST => true,
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    'Accept: application/x-ndjson',
                ],
                CURLOPT_POSTFIELDS => $encodedPayload,
                CURLOPT_RETURNTRANSFER => false,
                CURLOPT_HEADER => false,
                CURLOPT_CONNECTTIMEOUT => 10,
                CURLOPT_TIMEOUT => $timeout,
                CURLOPT_WRITEFUNCTION =>
                    static function (
                        $curl,
                        string $chunk
                    ) use (
                        &$buffer,
                        &$firstByteAt,
                        &$chunkCount,
                        &$streamedBytes,
                        &$terminalRecord,
                        $onChunk
                    ): int {
                        $length = strlen($chunk);

                        if (
                            $length > 0
                            && $firstByteAt === null
                        ) {
                            $firstByteAt = microtime(true);
                        }

                        $chunkCount++;
                        $streamedBytes += $length;
                        $buffer .= $chunk;

                        while (
                            ($pos = strpos(
                                $buffer,
                                "\n"
                            )) !== false
                        ) {
                            $line = trim(
                                substr(
                                    $buffer,
                                    0,
                                    $pos
                                )
                            );

                            $buffer = substr(
                                $buffer,
                                $pos + 1
                            );

                            if ($line === '') {
                                continue;
                            }

                            if ($terminalRecord !== null) {
                                throw new \RuntimeException(
                                    'Ollama stream contained a record after terminal done=true.'
                                );
                            }

                            try {
                                $decoded = json_decode(
                                    $line,
                                    true,
                                    512,
                                    JSON_THROW_ON_ERROR
                                );
                            } catch (
                                \JsonException $exception
                            ) {
                                throw new \RuntimeException(
                                    'Ollama stream contained malformed NDJSON.',
                                    0,
                                    $exception
                                );
                            }

                            if (! is_array($decoded)) {
                                throw new \RuntimeException(
                                    'Ollama stream record was not a JSON object.'
                                );
                            }

                            if (
                                ($decoded['done'] ?? false)
                                === true
                            ) {
                                $terminalRecord = $decoded;
                                continue;
                            }

                            $onChunk($decoded);
                        }

                        return $length;
                    },
                ]
            );

            if ($configured !== true) {
                throw new \RuntimeException(
                    'Unable to configure Ollama streaming request.'
                );
            }

            $ok = curl_exec($ch);

            if ($ok === false) {
                throw new \RuntimeException(
                    curl_errno($ch)
                    . ' : '
                    . curl_error($ch)
                );
            }

            $statusCode = (int) curl_getinfo(
                $ch,
                CURLINFO_RESPONSE_CODE
            );

            if (
                $statusCode < 200
                || $statusCode >= 300
            ) {
                throw new \RuntimeException(
                    'Ollama streaming request failed with HTTP '
                    . $statusCode
                    . '.'
                );
            }

            if (trim($buffer) !== '') {
                throw new \RuntimeException(
                    'Ollama stream ended with incomplete trailing NDJSON data.'
                );
            }

            if ($terminalRecord === null) {
                throw new \RuntimeException(
                    'Ollama stream ended without terminal done=true.'
                );
            }

            $firstByteMilliseconds =
                $firstByteAt === null
                    ? null
                    : (int) round(
                        (
                            $firstByteAt
                            - $startedAt
                        ) * 1000
                    );

            $terminalRecord[
                'stream_telemetry'
            ] = [
                'first_byte_ms' =>
                    $firstByteMilliseconds,
                'chunk_count' =>
                    $chunkCount,
                'streamed_bytes' =>
                    $streamedBytes,
            ];

            $onDone($terminalRecord);
        } finally {
            curl_close($ch);
        }
    }
}
