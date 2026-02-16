<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Codex extends BaseConfig
{
    /**
     * OpenAI model name (override with env OPENAI_MODEL)
     */
    public string $model = 'gpt-4o';

    /**
     * OpenAI API URL (override with env OPENAI_API_URL)
     */
    public string $apiUrl = 'https://api.openai.com/v1/chat/completions';

    /**
     * Default batch size for codex:continue
     */
    public int $batchSize = 5;

    /**
     * Max bytes per file to send to OpenAI (avoid huge vendor blobs)
     */
    public int $maxFileBytes = 350000;

    /**
     * Max # of tokens to use per reponse
     */
    public int $maxTokens = 1500;

    /**
     * Output locations
     */
    public string $reportPath = 'audit/report.md';
    public string $jsonlPath  = 'audit/report.jsonl';
}
