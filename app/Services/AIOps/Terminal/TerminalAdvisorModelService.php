<?php

namespace App\Services\AIOps\Terminal;

use App\Services\Ollama\OllamaStreamingClient;
use Throwable;

class TerminalAdvisorModelService
{
    /** @var callable */
    private $streamChat;

    public function __construct(?callable $streamChat = null)
    {
        $this->streamChat = $streamChat
            ?? static function (
                string $baseUrl,
                string $model,
                array $messages,
                array $options,
                int $timeout,
                callable $onChunk,
                callable $onDone,
                ?array $format = null
            ): void {
                (new OllamaStreamingClient())->streamChat(
                    $baseUrl,
                    $model,
                    $messages,
                    $options,
                    $timeout,
                    $onChunk,
                    $onDone,
                    $format
                );
            };
    }

    public function explain(
        array $advisor,
        array $settings,
        ?callable $onChunk = null
    ): array
    {
        $baseUrl = rtrim((string) ($settings['model_base_url'] ?? 'http://gq-ai02:11434'), '/');
        $model = trim((string) ($settings['model_name'] ?? 'llama3.3:70b'));
        $timeout = max(5, (int) ($settings['model_timeout_seconds'] ?? 45));

        $payload = [
            'repository' => $advisor['repository'] ?? '',
            'worktree' => $advisor['worktree'] ?? '',
            'branch' => $advisor['branch'] ?? '',
            'changed_files' => $advisor['changed_files'] ?? 0,
            'mission_lifecycle' => $advisor['mission_lifecycle'] ?? '',
            'mission_phase' => $advisor['mission_phase'] ?? '',
            'mission_task' => $advisor['mission_task'] ?? '',
            'failure_class' => $advisor['failure_class'] ?? '',
            'baseline_state' => $advisor['baseline_state'] ?? '',
            'mutation_permission' => $advisor['mutation_permission'] ?? false,
            'reaction_policy' => $advisor['reaction_policy'] ?? '',
            'next_command' => $advisor['next_command'] ?? '',
            'why' => $advisor['why'] ?? '',
            'repeat_count' => $advisor['repeat_count'] ?? 0,
        ];

        $system = 'You are the read-only TBI AIOps terminal explainer. '
            . 'Explain the supplied deterministic state to a junior contributor in concise plain English. '
            . 'Do not invent commands, do not grant authority, do not change the next command, and do not recommend destructive, production, privilege, credential, reset, clean, stash, rebase, or force operations. '
            . 'The deterministic next_command and governance state are authoritative. '
            . 'Return 3 short paragraphs: where they are, why AIOps is in this state, and what the next command will accomplish.';

        $text = '';
        $streamTelemetry = [];

        try {
            $streamChat = $this->streamChat;

            $streamChat(
                $baseUrl,
                $model,
                [
                    ['role' => 'system', 'content' => $system],
                    [
                        'role' => 'user',
                        'content' => json_encode(
                            $payload,
                            JSON_PRETTY_PRINT
                            | JSON_UNESCAPED_SLASHES
                        ),
                    ],
                ],
                [],
                $timeout,
                static function (array $chunk) use (
                    &$text,
                    $onChunk
                ): void {
                    $content = (string) (
                        $chunk['message']['content']
                        ?? ''
                    );

                    if ($content === '') {
                        return;
                    }

                    $text .= $content;

                    if ($onChunk !== null) {
                        $onChunk($content);
                    }
                },
                static function (array $done) use (
                    &$streamTelemetry
                ): void {
                    $streamTelemetry = is_array(
                        $done['stream_telemetry'] ?? null
                    )
                        ? $done['stream_telemetry']
                        : [];
                }
            );

            if (trim($text) === '') {
                return $this->record(
                    false,
                    '',
                    $model,
                    $baseUrl,
                    'empty_model_response',
                    $payload,
                    $streamTelemetry
                );
            }

            return $this->record(
                true,
                $text,
                $model,
                $baseUrl,
                '',
                $payload,
                $streamTelemetry
            );
        } catch (Throwable $e) {
            return $this->record(
                false,
                '',
                $model,
                $baseUrl,
                $e->getMessage(),
                $payload,
                $streamTelemetry
            );
        }
    }

    private function record(
        bool $ok,
        string $text,
        string $model,
        string $baseUrl,
        string $error,
        array $input,
        array $streamTelemetry = []
    ): array {
        $dir = WRITEPATH . 'aiops/terminal/advisor-model';
        $path = '';

        if (is_dir($dir) || mkdir($dir, 0700, true) || is_dir($dir)) {
            @chmod($dir, 0700);
            $id = gmdate('Ymd-His') . '-' . substr(
                hash('sha256', json_encode($input, JSON_UNESCAPED_SLASHES) . microtime(true)),
                0,
                10
            );
            $path = $dir . '/' . $id . '.json';
            $record = [
                'schema_version' => 1,
                'created_at_utc' => gmdate(DATE_ATOM),
                'ok' => $ok,
                'model' => $model,
                'base_url' => $baseUrl,
                'read_only' => true,
                'streaming' => true,
                'stream_telemetry' => $streamTelemetry,
                'input' => $input,
                'explanation' => $text,
                'error' => $error,
            ];
            @file_put_contents(
                $path,
                json_encode($record, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL,
                LOCK_EX
            );
            @chmod($path, 0600);
        }

        return [
            'ok' => $ok,
            'explanation' => $text,
            'model' => $model,
            'base_url' => $baseUrl,
            'error' => $error,
            'evidence' => $path,
            'read_only' => true,
            'streaming' => true,
            'stream_telemetry' => $streamTelemetry,
        ];
    }
}
