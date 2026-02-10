<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Spark Console Configuration
 *
 * RULES:
 * - Auto-discovery is disabled
 * - Every command must be explicitly registered here
 * - No command may define a constructor
 * - No typed properties in commands
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
    public array $commands = [

        /*
        |----------------------------------------------------------------------
        | App / Runtime
        |----------------------------------------------------------------------
        */
        \App\Commands\App\Healthcheck::class,
        \App\Commands\AppUpdate::class,
        \App\Commands\RuntimeCheck::class,

        /*
        |----------------------------------------------------------------------
        | Runtime / Recovery
        |----------------------------------------------------------------------
        */
        \App\Commands\Runtime\SparkDoctor::class,
        \App\Commands\Runtime\SparkDoctorRuntime::class,
        \App\Commands\Runtime\SparkFix::class,
        \App\Commands\Runtime\SparkOptimize::class,
        \App\Commands\Runtime\Triage::class,
        \App\Commands\Runtime\CacheBoot::class,

        \App\Commands\Diagnose503::class,
        \App\Commands\Fix503::class,
        \App\Commands\PurgeFastCGI::class,
        \App\Commands\RestartSafe::class,
        \App\Commands\TrafficSpikeGuard::class,

        /*
        |----------------------------------------------------------------------
        | AI-Ops
        |----------------------------------------------------------------------
        */
        \App\Commands\AiOps\Audit::class,
        \App\Commands\AiOps\AutoRun::class,
        \App\Commands\AiOps\Backlog::class,
        \App\Commands\AiOps\ChatGovernanceIndex::class,
        \App\Commands\AiOps\CommandIndex::class,
        \App\Commands\AiOps\CopilotValidate::class,
        \App\Commands\AiOps\EmailScan::class,
        \App\Commands\AiOps\Init::class,
        \App\Commands\AiOps\ManualRun::class,
        \App\Commands\AiOps\N8nLogs::class,
        \App\Commands\AiOps\N8nRestart::class,
        \App\Commands\AiOps\N8nStart::class,
        \App\Commands\AiOps\N8nStop::class,
        \App\Commands\AiOps\PublicPagesAudit::class,
        \App\Commands\AiOps\PublicPagesImport::class,
        \App\Commands\AiOps\PublicPagesReport::class,
        \App\Commands\AiOps\PublicPagesRun::class,
        \App\Commands\AiOps\Repair::class,
        \App\Commands\AiOps\Run::class,
        \App\Commands\AiOps\ScanCells::class,
        \App\Commands\AiOps\Seed::class,
        \App\Commands\AiOps\SelfHeal::class,
        \App\Commands\AiOps\Status::class,
        \App\Commands\AiOps\Unlock::class,
        \App\Commands\AiOps\Watch::class,

        /*
        |----------------------------------------------------------------------
        | Ops
        |----------------------------------------------------------------------
        */
        \App\Commands\Ops\AppUpdate::class,
        \App\Commands\Ops\AlertsIngest::class,
        \App\Commands\Ops\CiPrepare::class,
        \App\Commands\Ops\CommandsAudit::class,
        \App\Commands\Ops\CommandsAutofix::class,
        \App\Commands\Ops\CommandsInventory::class,
        \App\Commands\Ops\CommandsLint::class,
        \App\Commands\Ops\ConfigLint::class,
        \App\Commands\Ops\ConfigReset::class,
        \App\Commands\Ops\FilesystemFix::class,
        \App\Commands\Ops\FilesystemLint::class,
        \App\Commands\Ops\NextSteps::class,
        \App\Commands\Ops\NextStepsSync::class,
        \App\Commands\Ops\NextStepsSyncManual::class,
        \App\Commands\Ops\ProposePr::class,
        \App\Commands\Ops\SparkReset::class,
        \App\Commands\Ops\SubsAudit::class,
        \App\Commands\Ops\SubsDoctor::class,
        \App\Commands\Ops\SubsRepair::class,
        \App\Commands\Ops\SubsStatus::class,

        \App\Commands\OpsAnalyzeCommands::class,
        \App\Commands\OpsFetchCommands::class,
        \App\Commands\OpsWork::class,

        /*
        |----------------------------------------------------------------------
        | Chat
        |----------------------------------------------------------------------
        */
        \App\Commands\Chat\Audit::class,
        \App\Commands\Chat\Logs::class,
        \App\Commands\Chat\Repair::class,
        \App\Commands\Chat\Restart::class,
        \App\Commands\Chat\Start::class,
        \App\Commands\Chat\Stop::class,
        \App\Commands\Chat\Status::class,
        \App\Commands\Chat\Unblock::class,

        /*
        |----------------------------------------------------------------------
        | Logs
        |----------------------------------------------------------------------
        */
        \App\Commands\Logs\Healthcheck::class,
        \App\Commands\Logs\Summarize::class,
        \App\Commands\Logs\SummarizeAll::class,
        \App\Commands\LogsFullReport::class,
        \App\Commands\LogsTest::class,

        /*
        |----------------------------------------------------------------------
        | Auth
        |----------------------------------------------------------------------
        */
        \App\Commands\Auth\Audit::class,
        \App\Commands\Auth\FlowSmoke::class,
        \App\Commands\Auth\FunnelCheck::class,
        \App\Commands\Auth\Smoke::class,
        \App\Commands\Auth\SmokeTest::class,

        /*
        |----------------------------------------------------------------------
        | Database
        |----------------------------------------------------------------------
        */
        \App\Commands\Database\ApplyDocs::class,
        \App\Commands\Database\Drift::class,
        \App\Commands\Database\Inventory::class,
        \App\Commands\Database\MigrateDryRun::class,

        /*
        |----------------------------------------------------------------------
        | Content / Marketing
        |----------------------------------------------------------------------
        */
        \App\Commands\ContentIngestSample::class,
        \App\Commands\ContentEngineSmoke::class,
        \App\Commands\Marketing\AutomationAudit::class,
        \App\Commands\NewsAudit::class,

        /*
        |----------------------------------------------------------------------
        | Business / Product Audits
        |----------------------------------------------------------------------
        */
        \App\Commands\Audit\NodeAudit::class,
        \App\Commands\GapTrackerSync::class,
        \App\Commands\Growth\RetentionWatch::class,
        \App\Commands\Revenue\CostForecast::class,
        \App\Commands\RevenueStreamsScan::class,
        \App\Commands\Ux\JourneyAudit::class,

        /*
        |----------------------------------------------------------------------
        | Discord
        |----------------------------------------------------------------------
        */
        \App\Commands\DiscordList::class,
        \App\Commands\DiscordProcessQueue::class,
        \App\Commands\DiscordTest::class,
        \App\Commands\DiscordTestLiquidity::class,
        \App\Commands\DiscordWireCheck::class,

        /*
        |----------------------------------------------------------------------
        | Security
        |----------------------------------------------------------------------
        */
        \App\Commands\Security\GenerateKey::class,
        \App\Commands\Security\GenerateCI4Key::class,
        \App\Commands\Security\SecretsAudit::class,
        \App\Commands\SecurityCspAudit::class,

        /*
        |----------------------------------------------------------------------
        | Scrapers / Alerts
        |----------------------------------------------------------------------
        */
        \App\Commands\AlertsAudit::class,
        \App\Commands\AlertsParseTest::class,
        \App\Commands\Scrapers\EmailScraperAudit::class,

        /*
        |----------------------------------------------------------------------
        | GitHub / Codex
        |----------------------------------------------------------------------
        */
        \App\Commands\GitHub\SearchRepo::class,
        \App\Commands\Codex\Review::class,
        \App\Commands\Codex\ReviewList::class,
        \App\Commands\Codex\ReviewCommit::class,
        \App\Commands\Codex\ReviewPrOutbox::class,
        \App\Commands\Codex\ReviewPublish::class,

        /*
        |----------------------------------------------------------------------
        | Wallets / Forecasts / MDIT
        |----------------------------------------------------------------------
        */
        \App\Commands\ForecastEvaluate::class,
        \App\Commands\ForecastRefresh::class,
        \App\Commands\MditNavComputeDaily::class,
        \App\Commands\WalletsWarmSummaryCache::class,
    ];

    /**
     * Show help output when no command is provided
     */
    public bool $showHelp = true;
}
