<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Models;

use App\Commands\Ollama\BaseOllamaCommand;
use Config\Ollama;

class DiffModels extends BaseOllamaCommand
{
    protected $name = 'ollama:models:diff';
    protected $description = 'Compare installed model inventory versus required profile and emit remediation.';
    protected $options = [
        '--profile' => 'default|aiops|marketing|alerts',
        '--base-url' => 'Override URL',
        '--timeout' => 'Timeout seconds',
        '--json' => 'JSON output',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $cfg = config(Ollama::class);
        $profile = $this->optString($flags, 'profile', $cfg->governanceProfile);
        $required = $cfg->profiles[$profile]['allowed_models'] ?? null;

        if (! is_array($required)) {
            return $this->emitPayload([
                'status' => 'error',
                'error' => 'Unknown profile: ' . $profile,
            ], $flags, self::EXIT_ERROR);
        }

        try {
            $res = $this->client()->listModels($this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
        } catch (\Throwable $e) {
            return $this->emitPayload([
                'status' => 'error',
                'error' => $e->getMessage(),
            ], $flags, self::EXIT_ERROR);
        }

        $installed = array_values(array_filter(array_map(static fn ($m) => (string) ($m['name'] ?? ''), $res['models'] ?? [])));

        $missing = array_values(array_diff($required, $installed));
        $extra = array_values(array_diff($installed, $required));

        $remediation = [];
        foreach ($missing as $model) {
            $remediation[] = 'php spark ollama:models:pull ' . $model . ' --json=1';
        }
        foreach ($extra as $model) {
            $remediation[] = 'php spark ollama:models:rm ' . $model . ' --force=1 --json=1';
        }

        return $this->emitPayload([
            'status' => ($missing === [] && $extra === []) ? 'ok' : 'warning',
            'profile' => $profile,
            'required' => $required,
            'installed' => $installed,
            'missing' => $missing,
            'extra' => $extra,
            'remediation_steps' => $remediation,
        ], $flags, ($missing === [] && $extra === []) ? EXIT_SUCCESS : self::EXIT_WARNING);
    }
}
