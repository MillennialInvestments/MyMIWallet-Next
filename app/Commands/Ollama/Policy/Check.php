<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Policy;

use App\Commands\Ollama\BaseOllamaCommand;
use Config\Ollama;

class Check extends BaseOllamaCommand
{
    protected $name = 'ollama:policy:check';
    protected $description = 'Validates current governance profile and limits.';
    protected $options = ['--profile' => 'Profile name', '--json' => 'JSON output'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $cfg = config(Ollama::class);
        $profile = $this->optString($flags, 'profile', $cfg->governanceProfile);
        $policy = $cfg->profiles[$profile] ?? null;
        if ($policy === null) {
            return $this->emitPayload(['status' => 'error', 'error' => 'Unknown profile: ' . $profile], $flags, self::EXIT_ERROR);
        }

        return $this->emitPayload(['status' => 'ok', 'profile' => $profile, 'policy' => $policy], $flags, EXIT_SUCCESS);
    }
}
