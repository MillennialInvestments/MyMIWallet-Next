<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Models;

use App\Commands\Ollama\BaseOllamaCommand;

class PruneModels extends BaseOllamaCommand
{
    protected $name = 'ollama:models:prune';
    protected $description = 'Prunes models based on simple keep allowlist policy.';
    protected $options = ['--keep' => 'Comma list of models to keep', '--dry-run' => 'Dry run', '--base-url' => 'Override URL', '--timeout' => 'Timeout', '--json' => 'JSON output'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $keep = array_filter(array_map('trim', explode(',', $this->optString($flags, 'keep', ''))));

        $all = $this->client()->listModels($this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
        $models = $all['models'] ?? [];
        $toDelete = array_values(array_filter($models, static function ($model) use ($keep) {
            return ! in_array((string) ($model['name'] ?? ''), $keep, true);
        }));

        if ($this->optBool($flags, 'dry-run', false)) {
            return $this->emitPayload(['status' => 'dry-run', 'delete_count' => count($toDelete), 'candidates' => $toDelete], $flags, EXIT_SUCCESS);
        }

        $removed = [];
        foreach ($toDelete as $model) {
            $name = (string) ($model['name'] ?? '');
            if ($name === '') {
                continue;
            }
            $this->client()->rm($name, $this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
            $removed[] = $name;
        }

        return $this->emitPayload(['status' => 'ok', 'removed' => $removed], $flags, EXIT_SUCCESS);
    }
}
