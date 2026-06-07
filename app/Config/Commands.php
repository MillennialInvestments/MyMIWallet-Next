<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Commands extends BaseConfig
{
    /**
     * @var array<string, class-string>
     */
    public $commands = [
        'solana:preview-browser-runtime:smoke' => \App\Commands\SolanaPreviewBrowserRuntimeSmoke::class,
        'solana:preview-runtime:smoke' => \App\Commands\SolanaPreviewRuntimeSmoke::class,
        'marketing:audit:distribution' => \App\Commands\Marketing\AuditDistribution::class,
        'auth:baseline:capture' => \App\Commands\Auth\BaselineCapture::class,
        'auth:baseline:diff' => \App\Commands\Auth\BaselineDiff::class,
        'auth:baseline:restore' => \App\Commands\Auth\BaselineRestore::class,
        'auth:surface:scan' => \App\Commands\Auth\SurfaceScan::class,
        'auth:smoke' => \App\Commands\Auth\Smoke::class,
        'docs:inventory-forms' => \App\Commands\Docs\Generate\FormInventory::class,
        'db:table-list' => \App\Commands\Database\TableList::class,
        'coinvault:audit' => \App\Commands\CoinVault\Audit::class,
        'coinvault:tbi-external-contribution-smoke' => \App\Commands\TbiExternalContributionSmoke::class,
        'aiops:solana-healthcheck' => \App\Commands\SolanaHealthcheck::class,
        'aiops:solana-digest' => \App\Commands\SolanaDigest::class,
        'aiops:solana-transaction-audit' => \App\Commands\SolanaTransactionAudit::class,
        'exchange:create-tbi-project-coin-drafts' => \App\Commands\CreateTbiProjectCoinDrafts::class,
    ];
}
