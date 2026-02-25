<?php

declare(strict_types=1);

namespace App\Commands\Ollama;

use App\Models\OllamaSessionModel;
use Config\Ollama;

class Chat extends BaseOllamaCommand
{
    protected $name = 'ollama:chat';
    protected $description = 'Chat completion with optional session persistence.';
    protected $options = ['--model' => 'Model', '--session' => 'Session ID', '--system' => 'System prompt', '--user' => 'User message', '--save-session' => 'Persist session', '--load-session' => 'Load existing session', '--reset' => 'Reset session', '--base-url' => 'URL', '--timeout' => 'Timeout', '--json' => 'JSON output'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $cfg = config(Ollama::class);
        $model = $this->optString($flags, 'model', $cfg->defaultChatModel);
        $sessionId = $this->optString($flags, 'session', '');
        $runUuid = $this->runUuid();
        $messages = [];

        if ($this->optBool($flags, 'load-session', false) && $sessionId !== '') {
            $session = (new OllamaSessionModel())->find($sessionId);
            if (is_array($session) && isset($session['messages_json'])) {
                $messages = json_decode((string) $session['messages_json'], true) ?: [];
            }
        }

        if ($this->optBool($flags, 'reset', false)) {
            $messages = [];
        }

        $system = $this->optString($flags, 'system', '');
        $user = $this->optString($flags, 'user', '');
        if ($system !== '') {
            $messages[] = ['role' => 'system', 'content' => $system];
        }
        if ($user !== '') {
            $messages[] = ['role' => 'user', 'content' => $user];
        }

        try {
            $res = $this->client()->chat(['model' => $model, 'messages' => $messages, 'stream' => false], $this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
            $reply = $res['message'] ?? [];
            if ($reply !== []) {
                $messages[] = $reply;
            }

            if ($this->optBool($flags, 'save-session', false) && $sessionId !== '') {
                (new OllamaSessionModel())->save([
                    'session_id' => $sessionId,
                    'title' => 'Ollama Session ' . $sessionId,
                    'model' => $model,
                    'messages_json' => json_encode($messages, JSON_UNESCAPED_SLASHES),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }

            $this->writeRun('chat', $model, $runUuid, ['messages' => $messages], 'ok');

            return $this->emitPayload(['run_uuid' => $runUuid, 'model' => $model, 'message' => $reply, 'session' => $sessionId], $flags, EXIT_SUCCESS);
        } catch (\Throwable $e) {
            $this->writeRun('chat', $model, $runUuid, ['messages' => $messages], 'error', 0, null, null, $e->getMessage());
            log_message('error', 'ollama:chat failed {run_uuid}: {error}', ['run_uuid' => $runUuid, 'error' => $e->getMessage()]);

            return $this->emitPayload(['run_uuid' => $runUuid, 'error' => $e->getMessage()], $flags, self::EXIT_ERROR);
        }
    }
}
