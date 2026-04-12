<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class ApiResearch extends BaseConfig
{
    public string $userAgent = 'MyMIWallet API Research Bot/2.0';
    public int $defaultTimeout = 20;
    public int $maxPages = 50;
    public int $maxDepth = 3;
    public int $maxContentCharsPerPage = 50000;
    public int $maxEndpointsPerRun = 1000;
    public int $maxExamplesPerEndpoint = 5;

    public bool $enableAiSummary = false;
    public bool $storeInDatabase = true;
    public bool $writeJsonSnapshot = true;
    public bool $writeMarkdownReport = true;
    public bool $compareAgainstPrevious = true;
    public bool $detectOpenApi = true;
    public bool $detectPostman = true;
    public bool $extractCodeExamples = true;
    public bool $followChangelogLinks = true;

    public ?string $aiProvider = null; // ollama|openai|null
    public ?string $ollamaEndpoint = null;
    public ?string $ollamaModel = null;
    public ?string $openAiApiKey = null;
    public ?string $openAiModel = null;

    public string $docsOutputPath = ROOTPATH . 'docs/APIs/';

    /**
     * @var string[]
     */
    public array $allowedPathKeywords = [
        'docs',
        'developers',
        'developer',
        'api',
        'reference',
        'guides',
        'guide',
        'auth',
        'authentication',
        'webhooks',
        'endpoints',
        'sdk',
        'quickstart',
        'getting-started',
        'swagger',
        'openapi',
        'api-docs',
        'reference',
        'changelog',
    ];

    /**
     * @var string[]
     */
    public array $blockedPathKeywords = [
        'login',
        'logout',
        'signup',
        'register',
        'privacy',
        'terms',
        'cookies',
        'contact',
        'blog',
        'careers',
        'pricing',
        'status',
        'mailto:',
        'javascript:',
    ];

    /**
     * @var string[]
     */
    public array $candidateSpecFilenames = [
        'openapi.json',
        'swagger.json',
        'openapi.yaml',
        'openapi.yml',
        'swagger.yaml',
        'swagger.yml',
        'postman_collection.json',
    ];
}