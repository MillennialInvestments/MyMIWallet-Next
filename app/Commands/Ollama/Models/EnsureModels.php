<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Models;

use App\Commands\Ollama\BaseOllamaCommand;
use Config\Ollama;

class EnsureModels extends BaseOllamaCommand
{
    protected $name = 'ollama:models:ensure';
    protected $description = 'Ensures required models exist for a profile.';
    protected $options = ['--profile' => 'default|aiops|marketing|alerts', '--base-url' => 'Override URL', '--timeout' => 'Timeout', '--json' => 'JSON output'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $cfg = config(Ollama::class);
        $profile = $this->optString($flags, 'profile', $cfg->governanceProfile);
        $required = $cfg->profiles[$profile]['allowed_models'] ?? $cfg->profiles['default']['allowed_models'];

        $all = $this->client()->listModels($this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
        $existing = array_map(static fn ($m) => (string) ($m['name'] ?? ''), $all['models'] ?? []);
        $pulled = [];

        foreach ($required as $model) {
            if (! in_array($model, $existing, true)) {
                $this->client()->pull((string) $model, false, $this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
                $pulled[] = $model;
            }
        }

        return $this->emitPayload(['profile' => $profile, 'required' => $required, 'pulled' => $pulled], $flags, EXIT_SUCCESS);
    }
}
