<?php

declare(strict_types=1);

namespace App\Commands\Ollama;

use App\Libraries\Ollama\OllamaClient;
use CodeIgniter\CLI\CLI;
use Config\Ollama as OllamaConfig;
use RuntimeException;
use Throwable;

class OllamaRun extends BaseOllamaCommand
{
    protected $name = 'ollama:run';
    protected $description = 'Run an Ollama prompt from a file and write response artifacts.';
    protected $usage = 'ollama:run --file="./docs/_aiops/patch_jobs/{job-id}/ollama_prompt.md"';
    protected $options = [
        '--file' => 'Prompt file path. If omitted, --job-dir/ollama_prompt.md is used.',
        '--max-tokens' => 'Max output tokens. Defaults to Config\\Ollama/profile limits.',
        '--model' => 'Model override. Defaults to Config\\Ollama::defaultChatModel.',
        '--output' => 'Output file path. Defaults to prompt dir/ollama_response.md.',
        '--profile' => 'Governance profile override.',
        '--format' => 'Output format. Supported: markdown.',
        '--timeout' => 'HTTP timeout (seconds). Defaults to Config\\Ollama::timeout.',
        '--prefer-internal' => 'Set to 1 to target OLLAMA_INTERNAL_BASE_URL for same-server execution (default: true).',
        '--overwrite' => 'Set to 1 to overwrite existing output file.',
        '--job-dir' => 'Patch-job directory containing ollama_prompt.md.',
        '--system' => 'Optional system prompt for Ollama /api/generate.',
    ];

    public function run(array $params)
    {
        $startMicro = microtime(true);
        $startedAt = date('Y-m-d H:i:s');
        $config = config(OllamaConfig::class);
        $client = new OllamaClient($config);

        $metadata = [
            'command' => $this->name,
            'success' => false,
            'profile' => null,
            'model' => null,
            'base_url' => $config->getResolvedBaseUrl(false),
            'prompt_file' => null,
            'output_file' => null,
            'started_at' => $startedAt,
            'completed_at' => null,
            'duration_ms' => 0,
            'prompt_sha1' => null,
            'response_sha1' => null,
            'response_length' => 0,
            'prompt_length' => 0,
            'timeout' => 0,
            'effective_max_tokens' => 0,
            'total_duration' => 0,
            'load_duration' => 0,
            'prompt_eval_count' => 0,
            'eval_count' => 0,
            'error_message' => null,
        ];

        $sidecarPath = null;

        try {
            [, $flags] = $this->parseParams($params);

            $file = trim((string) ($flags['file'] ?? ''));
            $jobDir = trim((string) ($flags['job-dir'] ?? ''));
            $output = trim((string) ($flags['output'] ?? ''));
            $model = trim((string) ($flags['model'] ?? $config->defaultChatModel));
            $profileOverride = $flags['profile'] ?? null;
            $format = strtolower(trim((string) ($flags['format'] ?? 'markdown')));
            $system = trim((string) ($flags['system'] ?? ''));
            $timeout = (int) ($flags['timeout'] ?? $config->timeout);
            $preferInternal = array_key_exists('prefer-internal', $flags)
                ? $this->toBool($flags['prefer-internal'])
                : true;
            $resolvedBaseUrl = $config->getResolvedBaseUrl($preferInternal);
            $overwrite = $this->toBool($flags['overwrite'] ?? false);
            $maxTokensOverride = isset($flags['max-tokens']) ? (int) $flags['max-tokens'] : null;

            if ($file === '' && $jobDir === '') {
                throw new RuntimeException('Missing required input. Provide --file or --job-dir.');
            }

            if ($file === '' && $jobDir !== '') {
                $file = rtrim($jobDir, '/\\') . DIRECTORY_SEPARATOR . 'ollama_prompt.md';
            }

            $promptPath = $this->normalizePath($file);
            if (! is_file($promptPath)) {
                throw new RuntimeException('Prompt file does not exist: ' . $file);
            }

            if (! is_readable($promptPath)) {
                throw new RuntimeException('Prompt file is not readable: ' . $file);
            }

            $promptRaw = file_get_contents($promptPath);
            if ($promptRaw === false) {
                throw new RuntimeException('Unable to read prompt file: ' . $file);
            }

            $prompt = trim($promptRaw);
            if ($prompt === '') {
                throw new RuntimeException('Prompt file is empty: ' . $file);
            }

            $promptDir = dirname($promptPath);
            if ($output === '') {
                if (str_starts_with($file, './')) {
                    $output = dirname($file) . '/ollama_response.md';
                } else {
                    $output = $promptDir . DIRECTORY_SEPARATOR . 'ollama_response.md';
                }
            }

            $outputPath = $this->normalizePath($output);
            if (is_file($outputPath) && ! $overwrite) {
                throw new RuntimeException('Output file already exists. Use --overwrite=1 to replace: ' . $output);
            }

            $sidecarPath = $this->normalizePath($promptDir . DIRECTORY_SEPARATOR . 'ollama_run.json');

            $metadata['prompt_file'] = $file;
            $metadata['output_file'] = $output;
            $metadata['model'] = $model;
            $metadata['base_url'] = $resolvedBaseUrl;
            $metadata['prompt_sha1'] = sha1($prompt);
            $metadata['prompt_length'] = strlen($prompt);
            $metadata['timeout'] = $timeout;
            $metadata['prefer_internal'] = $preferInternal;

            $profileData = $client->resolveProfile(is_string($profileOverride) ? $profileOverride : null);
            $profile = (string) $profileData['name'];
            $settings = $profileData['settings'];

            $client->assertModelAllowed($model, $profile);

            $profileMaxTokens = (int) ($settings['max_tokens'] ?? $config->maxTokens);

            $baseMaxTokens = ($maxTokensOverride !== null && $maxTokensOverride > 0)
                ? $maxTokensOverride
                : $config->maxTokens;

            $effectiveMaxTokens = max(1, min($baseMaxTokens, $profileMaxTokens));
            $metadata['effective_max_tokens'] = $effectiveMaxTokens;

            if (($settings['pii_redaction'] ?? false) === true) {
                $prompt = $this->applyPiiRedactionStub($prompt);
            }

            if ($format !== 'markdown') {
                throw new RuntimeException('Unsupported format: ' . $format . '. Only markdown is supported.');
            }

            log_message('debug', '[ollama:run] model=' . $model);
            log_message('debug', '[ollama:run] profile=' . $profile);
            log_message('debug', '[ollama:run] timeout=' . $timeout);
            log_message('debug', '[ollama:run] resolvedBaseUrl=' . $resolvedBaseUrl);
            log_message('debug', '[ollama:run] preferInternal=' . ($preferInternal ? 'true' : 'false'));
            log_message('debug', '[ollama:run] effectiveMaxTokens=' . $effectiveMaxTokens);
            log_message('debug', '[ollama:run] promptLength=' . strlen($prompt));

            $result = $client->generate($prompt, [
                'model' => $model,
                'max_tokens' => $effectiveMaxTokens,
                'timeout' => $timeout,
                'system' => $system,
                'base_url' => $resolvedBaseUrl,
            ]);

            $markdown = $this->buildMarkdownOutput(
                (string) $result['response'],
                $model,
                $profile,
                $file,
                date('Y-m-d H:i:s')
            );

            $this->ensureDirectory(dirname($outputPath));
            if (file_put_contents($outputPath, $markdown) === false) {
                throw new RuntimeException('Unable to write output file: ' . $output);
            }

            $metadata['success'] = true;
            $metadata['profile'] = $profile;
            $metadata['response_sha1'] = sha1((string) $result['response']);
            $metadata['response_length'] = strlen((string) $result['response']);
            $metadata['total_duration'] = (int) ($result['metrics']['total_duration'] ?? 0);
            $metadata['load_duration'] = (int) ($result['metrics']['load_duration'] ?? 0);
            $metadata['prompt_eval_count'] = (int) ($result['metrics']['prompt_eval_count'] ?? 0);
            $metadata['eval_count'] = (int) ($result['metrics']['eval_count'] ?? 0);

            if (($settings['require_logging'] ?? false) === true || $config->writeSidecarJson) {
                $this->writeSidecar($sidecarPath, $metadata, $startMicro);
            }

            CLI::write('Ollama run complete. Response written to: ' . $outputPath, 'green');

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            $metadata['error_message'] = $e->getMessage();

            if ($sidecarPath !== null && $config->writeSidecarJson) {
                $this->writeSidecar($sidecarPath, $metadata, $startMicro);
            }

            CLI::error('ollama:run failed - ' . $e->getMessage());

            return EXIT_ERROR;
        }
    }

    private function toBool(mixed $value): bool
    {
        if (is_bool($value)) {
            return $value;
        }

        $normalized = strtolower(trim((string) $value));

        return in_array($normalized, ['1', 'true', 'yes', 'on'], true);
    }

    private function normalizePath(string $path): string
    {
        if (str_starts_with($path, './')) {
            return rtrim(ROOTPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . substr($path, 2);
        }

        return $path;
    }

    private function ensureDirectory(string $dir): void
    {
        if (is_dir($dir)) {
            return;
        }

        if (! mkdir($dir, 0775, true) && ! is_dir($dir)) {
            throw new RuntimeException('Unable to create directory: ' . $dir);
        }
    }

    private function buildMarkdownOutput(string $response, string $model, string $profile, string $promptFile, string $generatedAt): string
    {
        return "# Ollama Response\n\n"
            . '- Model: ' . $model . "\n"
            . '- Profile: ' . $profile . "\n"
            . '- Prompt File: ' . $promptFile . "\n"
            . '- Generated At: ' . $generatedAt . "\n\n"
            . "---\n\n"
            . $response . "\n";
    }

    private function applyPiiRedactionStub(string $prompt): string
    {
        return $prompt;
    }

    /**
     * @param array<string,mixed> $metadata
     */
    private function writeSidecar(string $sidecarPath, array $metadata, float $startMicro): void
    {
        $metadata['completed_at'] = date('Y-m-d H:i:s');
        $metadata['duration_ms'] = (int) ((microtime(true) - $startMicro) * 1000);

        $this->ensureDirectory(dirname($sidecarPath));

        file_put_contents(
            $sidecarPath,
            json_encode($metadata, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL
        );
    }
}
