<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Docs;

use App\Commands\Ollama\BaseOllamaCommand;
use Config\Ollama;

class Sync extends BaseOllamaCommand
{
    protected $name = 'ollama:docs:sync';
    protected $description = 'Regenerates Ollama inventory and policy docs.';
    protected $options = ['--profile' => 'Profile name', '--base-url' => 'URL', '--timeout' => 'Timeout', '--json' => 'JSON output'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $cfg = config(Ollama::class);
        $profile = $this->optString($flags, 'profile', $cfg->governanceProfile);

        $models = $this->client()->listModels($this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
        $policy = $cfg->profiles[$profile] ?? $cfg->profiles['default'];

        $modelsDoc = "# Ollama Models\n\nGenerated: " . date('c') . "\n\n";
        foreach (($models['models'] ?? []) as $model) {
            $modelsDoc .= '- ' . ($model['name'] ?? 'unknown') . PHP_EOL;
        }
        file_put_contents(ROOTPATH . 'docs/_aiops/ollama/models.md', $modelsDoc);

        $policyDoc = "# Ollama Policy\n\nProfile: {$profile}\n\n```json\n" . json_encode($policy, JSON_PRETTY_PRINT) . "\n```\n";
        file_put_contents(ROOTPATH . 'docs/_aiops/ollama/policy.md', $policyDoc);

        return $this->emitPayload(['status' => 'ok', 'profile' => $profile, 'models_count' => count($models['models'] ?? [])], $flags, EXIT_SUCCESS);
    }
}
