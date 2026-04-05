<?php

namespace App\Services\AIOps;

use CodeIgniter\HTTP\CURLRequest;
use Config\Services;
use Throwable;

class OllamaCodeGenService
{
    public function __construct(
        private string $ollamaUrl,
        private string $model,
        private int $timeout = 60,
        private int $maxTokens = 1200,
        private string $mode = 'remote'
    ) {}

    /**
     * @return GeneratedArtifact[]
     */
    public function generateArtifactsForGroup(string $groupName, array $gapItems): array
    {
        $artifacts = [];
        $maxItems  = 8; // hard cap per PR group
        $gapItems  = array_slice($gapItems, 0, $maxItems);

        foreach ($gapItems as $item) {
            if ($item->exists) continue; // only generate missing

            // Build a tight prompt
            $prompt = $this->buildPromptForGapItem($groupName, $item);

            $resp = $this->callOllama($prompt);
            if (! $resp) continue;

            $artifact = GeneratedArtifact::fromOllama($item, $resp);
            if ($artifact->isValid()) {
                $artifacts[] = $artifact;
            }
        }

        return $artifacts;
    }

    private function callOllama(string $prompt): ?string
    {
        /** @var CURLRequest $http */
        $http = Services::curlrequest([
            'timeout' => $this->timeout,
        ]);

        try {
            log_message('debug', 'AIOps codegen Ollama resolved config', [
                'base_url' => $this->ollamaUrl,
                'mode' => $this->mode,
                'model' => $this->model,
                'timeout' => $this->timeout,
                'max_tokens' => $this->maxTokens,
            ]);
            $res = $http->post($this->ollamaUrl . '/api/generate', [
                'json' => [
                    'model' => $this->model,
                    'prompt' => $prompt,
                    'stream' => false,
                    'options' => [
                        'temperature' => 0.2,
                        'num_predict' => $this->maxTokens,
                    ],
                ],
            ]);

            $json = json_decode((string) $res->getBody(), true);
            return is_array($json) ? (string) ($json['response'] ?? '') : null;

        } catch (Throwable $e) {
            log_message('error', 'OLLAMA_CODEGEN failed: {msg}', ['msg' => $e->getMessage()]);
            return null;
        }
    }

    private function buildPromptForGapItem(string $groupName, $item): string
    {
        $target = $item->suggestedTargetPath ?? '(unknown)';

        return <<<PROMPT
You are generating code for a CodeIgniter 4.7 (PHP 8.2) application.

GOAL:
Generate the missing code for this gap item.

RULES:
- Output MUST be either:
  (A) a full file with correct PHP namespace + class, OR
  (B) a unified diff patch.
- Do NOT include markdown fences.
- Do NOT reference secrets or environment values beyond placeholders.
- Keep code minimal, compilable, and CI4 idiomatic.

PR GROUP: {$groupName}
GAP TYPE: {$item->type}
REFERENCE: {$item->reference}
SOURCE DOC: {$item->docPath}:{$item->docLine}

TARGET PATH (where this should live): {$target}

CONTEXT SNIPPET:
{$item->context}

Now output the code.
PROMPT;
    }
}
