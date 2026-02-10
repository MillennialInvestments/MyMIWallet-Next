<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class FilesystemGovernance extends BaseConfig
{
    /** @var array<string, array<int, string>> */
    public array $allowlists = [
        'ops' => [
            'docs/_ops/',
            'ci/',
        ],
        'aiops' => [
            'docs/_aiops/',
        ],
        'codex' => [
            'docs/_codex/',
        ],
        'support' => [
            'docs/_support/',
        ],
        'gap_tracker' => [
            'docs/_gap-tracker/',
        ],
        'default' => [
            'docs/',
            'ci/',
        ],
    ];

    public float $autoPrConfidenceThreshold = 0.75;
}
