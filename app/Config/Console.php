<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Console Configuration
 *
 * IMPORTANT:
 * Spark auto-discovery is DISABLED.
 * ALL commands must be explicitly registered here.
 *
 * This prevents silent command drift and production surprises.
 */
class Console extends BaseConfig
{
    /**
     * Registered Spark Commands
     *
     * @var array<class-string>
     */
    public array $commands = [
        \App\Commands\AppUpdate::class,
        \App\Commands\RuntimeCheck::class,

        \App\Commands\Logs\Healthcheck::class,
        \App\Commands\Logs\Summarize::class,
        \App\Commands\LogsFullReport::class,

        \App\Commands\ConfigLint::class,
        \App\Commands\CacheAudit::class,

        \App\Commands\Ops\CommandsAudit::class,
    ];

    // public array $commands = [

    //     /*
    //     |--------------------------------------------------------------------------
    //     | App / Runtime
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\AppUpdate::class,
    //     \App\Commands\RuntimeCheck::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Logs & Health
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\Logs\Healthcheck::class,
    //     \App\Commands\Logs\Summarize::class,
    //     \App\Commands\Logs\FullReport::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Auth / Security
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\Auth\Audit::class,
    //     \App\Commands\Auth\FunnelCheck::class,
    //     \App\Commands\Auth\Smoke::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Cache / Config
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\Cache\Audit::class,
    //     \App\Commands\Config\Lint::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Database / Integrity
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\Database\ApplyDocs::class,
    //     \App\Commands\Database\Inventory::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Alerts / Marketing / Content
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\Alerts\ParseTest::class,
    //     \App\Commands\Content\IngestSample::class,
    //     \App\Commands\ContentEngine\Smoke::class,
    //     \App\Commands\News\Audit::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Ops / AI / Automation
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\Ops\CodexReview::class,
    //     \App\Commands\Ops\AnalyzeCommands::class,
    //     \App\Commands\Ops\FetchCommands::class,
    //     \App\Commands\Ops\Work::class,

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Maintenance / Recovery
    //     |--------------------------------------------------------------------------
    //     */
    //     \App\Commands\Maintenance\SparkDiagnose503::class,
    //     \App\Commands\Maintenance\SparkPurgeFastcgi::class,
    //     \App\Commands\Maintenance\SparkRestartSafe::class,
    //     \App\Commands\Maintenance\SparkTrafficSpikeGuard::class,
    // ];

    /**
     * Show basic help when no command is provided
     */
    public bool $showHelp = true;
}
