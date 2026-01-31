<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Spark Console Configuration
 *
 * IMPORTANT RULES:
 * - Auto-discovery is intentionally disabled
 * - Every command must be explicitly registered here
 * - Class names, namespaces, and file paths MUST match exactly
 * - No command may define a constructor
 *
 * This file is the single source of truth for Spark.
 */
class Console extends BaseConfig
{
    /**
     * Explicitly registered Spark commands
     *
     * @var array<class-string>
     */
    // public array $commands = [

    //     /*
    //     |--------------------------------------------------------------------------
    //     | App / Runtime
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\AppUpdate::class,
    //     \App\Commands\RuntimeCheck::class,
    //     \App\Commands\Runtime\SparkDoctor::class,
    //     \App\Commands\Runtime\SparkFix::class,
    //     \App\Commands\SparkReset::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | AI Ops
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\AiOpsSeed::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Auth
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\Auth\Audit::class,
    //     \App\Commands\Auth\FunnelCheck::class,
    //     \App\Commands\Auth\Smoke::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Alerts
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\AlertsAudit::class,
    //     \App\Commands\AlertsParseTest::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Cache / Config
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\CacheAudit::class,
    //     \App\Commands\ConfigLint::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Content / Marketing
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\ContentIngestSample::class,
    //     \App\Commands\ContentEngineSmoke::class,
    //     \App\Commands\NewsAudit::class,
    //     \App\Commands\RevenueStreamsScan::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Database / Integrity
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\Database\ApplyDocs::class,
    //     \App\Commands\Database\Inventory::class,
    //     \App\Commands\Database\MigrateDryRun::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Discord
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\DiscordList::class,
    //     \App\Commands\DiscordProcessQueue::class,
    //     \App\Commands\DiscordTest::class,
    //     \App\Commands\DiscordTestLiquidity::class,
    //     \App\Commands\DiscordWireCheck::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Environment
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\Env\EnvDoctor::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Forecasting
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\ForecastEvaluate::class,
    //     \App\Commands\ForecastRefresh::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Gap Tracker
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\GapTrackerSync::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Health
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\Health\Cache::class,
    //     \App\Commands\Health\Disk::class,
    //     \App\Commands\Health\GitSafety::class,
    //     \App\Commands\Health\Services::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Logs
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\Logs\Healthcheck::class,
    //     \App\Commands\Logs\Summarize::class,
    //     \App\Commands\LogsFullReport::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Mail
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\MailSend::class,
    //     \App\Commands\MailSendTest::class,
    //     \App\Commands\MailTest::class,
    //     \App\Commands\MailVerify::class,
    //     \App\Commands\TestEmail::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Maintenance / Recovery
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\Diagnose503::class,
    //     \App\Commands\Fix503::class,
    //     \App\Commands\PurgeFastCGI::class,
    //     \App\Commands\RestartSafe::class,
    //     \App\Commands\TrafficSpikeGuard::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Ops / Automation
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\Ops\CommandsAudit::class,
    //     \App\Commands\Ops\CommandsAutofix::class,
    //     \App\Commands\Ops\CommandsLint::class,
    //     \App\Commands\Ops\NextSteps::class,
    //     \App\Commands\OpsAnalyzeCommands::class,
    //     \App\Commands\OpsFetchCommands::class,
    //     \App\Commands\OpsWork::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Routes / Security
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\RoutesAuthAudit::class,
    //     \App\Commands\SecurityCspAudit::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Wallets
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\WalletsWarmSummaryCache::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Finance / NAV
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\MditNavComputeDaily::class,
    // ];
    public array $commands = [];


    /**
     * Show help output when no command is provided
     */
    public bool $showHelp = true;
}
