<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

final class TbiOllamaControlPlane extends BaseConfig
{
    public string $reportPath = WRITEPATH . 'aiops/ollama-control-plane';

    /**
     * @return array<string, array<string, mixed>>
     */
    public function nodes(): array
    {
        return [
            'gq-ai02' => [
                'name' => 'gq-ai02',
                'aliases' => [],
                'endpoint' => rtrim((string) env('TBI_OLLAMA_GQ_AI02_URL', 'http://172.17.18.4:11434'), '/'),
                'ssh_target' => 'gq-ai02',
                'role' => 'fast_code',
                'execution_backend' => 'cpu',
                'production_eligible' => true,
                'allowed_routes' => [
                    'fast_triage',
                    'fast_code',
                    'embedding',
                ],
                'required_models' => [
                    'qwen2.5-coder:7b',
                    'bge-m3:latest',
                ],
                'preferred_model' => (string) env('TBI_OLLAMA_FAST_CODE_MODEL', 'qwen2.5-coder:7b'),
                'profile' => [
                    'context_length' => 8192,
                    'num_parallel' => 1,
                    'max_loaded_models' => 1,
                    'max_queue' => 32,
                    'keep_alive' => '30m',
                    'flash_attention' => false,
                    'kv_cache_type' => 'f16',
                ],
                'thresholds' => [
                    'connect_ms' => 1500,
                    'health_ms' => 3000,
                    'structured_output_ms' => 120000,
                    'source_patch_ms' => 180000,
                ],
            ],
            'gq-ai03' => [
                'name' => 'gq-ai03',
                'aliases' => [],
                'endpoint' => rtrim((string) env('TBI_OLLAMA_GQ_AI03_URL', 'http://172.17.18.5:11434'), '/'),
                'ssh_target' => 'gq-ai03',
                'role' => 'fast_code',
                'execution_backend' => 'cpu',
                'production_eligible' => true,
                'allowed_routes' => [
                    'fast_triage',
                    'fast_code',
                ],
                'required_models' => [
                    'qwen2.5-coder:7b',
                ],
                'preferred_model' => (string) env('TBI_OLLAMA_FAST_CODE_MODEL', 'qwen2.5-coder:7b'),
                'profile' => [
                    'context_length' => 8192,
                    'num_parallel' => 1,
                    'max_loaded_models' => 1,
                    'max_queue' => 32,
                    'keep_alive' => '30m',
                    'flash_attention' => false,
                    'kv_cache_type' => 'f16',
                ],
                'thresholds' => [
                    'connect_ms' => 1500,
                    'health_ms' => 3000,
                    'structured_output_ms' => 120000,
                    'source_patch_ms' => 180000,
                ],
            ],
            'gq-ai04' => [
                'name' => 'gq-ai04',
                'aliases' => [],
                'endpoint' => rtrim((string) env('TBI_OLLAMA_GQ_AI04_URL', 'http://172.17.18.6:11434'), '/'),
                'ssh_target' => 'gq-ai04',
                'role' => 'fast_code',
                'execution_backend' => 'cpu',
                'production_eligible' => true,
                'allowed_routes' => [
                    'fast_triage',
                    'fast_code',
                ],
                'required_models' => [
                    'qwen2.5-coder:7b',
                ],
                'preferred_model' => (string) env('TBI_OLLAMA_FAST_CODE_MODEL', 'qwen2.5-coder:7b'),
                'profile' => [
                    'context_length' => 8192,
                    'num_parallel' => 1,
                    'max_loaded_models' => 1,
                    'max_queue' => 32,
                    'keep_alive' => '30m',
                    'flash_attention' => false,
                    'kv_cache_type' => 'f16',
                ],
                'thresholds' => [
                    'connect_ms' => 1500,
                    'health_ms' => 3000,
                    'structured_output_ms' => 120000,
                    'source_patch_ms' => 180000,
                ],
            ],
            'gg-llm' => [
                'name' => 'gg-llm',
                'aliases' => ['gq-llm'],
                'endpoint' => rtrim((string) env('TBI_OLLAMA_GG_LLM_URL', 'http://172.17.18.2:11434'), '/'),
                'ssh_target' => 'gq-llm',
                'role' => 'deep_reasoning_candidate',
                'execution_backend' => 'gpu_or_mixed',
                'production_eligible' => true,
                'allowed_routes' => [
                    'code_review',
                    'deep_code_reasoning',
                    'diagnostic_reasoning',
                    'batch_analysis',
                    'embedding',
                ],
                'required_models' => [
                    'qwen2.5-coder:32b',
                    'qwen2.5-coder:14b',
                    'deepseek-r1:32b',
                    'llama3.3:70b',
                    'bge-m3:latest',
                ],
                'preferred_model' => (string) env('TBI_OLLAMA_DEEP_CODE_MODEL', 'qwen2.5-coder:32b'),
                'profile' => [
                    'context_length' => 32768,
                    'num_parallel' => 1,
                    'max_loaded_models' => 1,
                    'max_queue' => 24,
                    'keep_alive' => '15m',
                    'flash_attention' => true,
                    'kv_cache_type' => 'f16',
                ],
                'thresholds' => [
                    'connect_ms' => 2000,
                    'health_ms' => 5000,
                    'structured_output_ms' => 240000,
                    'source_patch_ms' => 360000,
                ],
            ],
        ];
    }

    public function normalizeNodeName(string $nodeName): string
    {
        $nodeName = trim($nodeName);

        foreach ($this->nodes() as $canonical => $node) {
            $aliases = is_array($node['aliases'] ?? null) ? $node['aliases'] : [];
            if ($nodeName === $canonical || in_array($nodeName, $aliases, true)) {
                return $canonical;
            }
        }

        return $nodeName;
    }

    /**
     * JSON Schema used by TBI AIOps source-patch workers.
     *
     * @return array<string, mixed>
     */
    public function sourcePatchSchema(): array
    {
        return [
            'type' => 'object',
            'properties' => [
                'status' => [
                    'type' => 'string',
                    'enum' => ['patch', 'blocked'],
                ],
                'summary' => ['type' => 'string'],
                'unified_diff' => [
                    'type' => 'string',
                    'description' => 'When status is patch, return a complete unified Git diff beginning with diff --git. When status is blocked, return an empty string.',
                ],
                'validation_commands' => [
                    'type' => 'array',
                    'items' => ['type' => 'string'],
                ],
                'risk_flags' => [
                    'type' => 'array',
                    'items' => ['type' => 'string'],
                ],
            ],
            'required' => [
                'status',
                'summary',
                'unified_diff',
                'validation_commands',
                'risk_flags',
            ],
        ];
    }
}
