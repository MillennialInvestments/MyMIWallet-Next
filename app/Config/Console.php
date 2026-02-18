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
        | AI-Ops
        |----------------------------------------------------------------------
        */
        \App\Commands\AiOps\Audit::class,
        \App\Commands\AiOps\AutoRun::class,
        \App\Commands\AiOps\Backlog::class,
        \App\Commands\AiOps\BuildCommand::class,
        \App\Commands\AiOps\ChatGovernanceIndex::class,
        \App\Commands\AiOps\CommandIndex::class,
        \App\Commands\AiOps\ContinueAudit::class,
        \App\Commands\AiOps\CopilotValidate::class,
        \App\Commands\AiOps\DiffFormat::class,
        \App\Commands\AiOps\GateCost::class,
        \App\Commands\AiOps\EmailScan::class,
        \App\Commands\AiOps\GovernanceAnalyze::class,
        \App\Commands\AiOps\HealthFull::class,
        \App\Commands\AiOps\Init::class,
        \App\Commands\AiOps\ManualIndex::class,
        \App\Commands\AiOps\ManualRun::class,
        \App\Commands\AiOps\Observe::class,
        \App\Commands\AiOps\PRAuto::class,
        \App\Commands\AiOps\PRCreate::class,
        \App\Commands\AiOps\Repair::class,
        \App\Commands\AiOps\RepairRunSafe::class,
        \App\Commands\AiOps\Rollback::class,
        \App\Commands\AiOps\Run::class,
        \App\Commands\AiOps\ScanCells::class,
        \App\Commands\AiOps\Seed::class,
        \App\Commands\AiOps\SelfHeal::class,
        \App\Commands\AiOps\Status::class,
        \App\Commands\AiOps\SyncPerfRoutes::class,
        \App\Commands\AiOps\Watch::class,
        \App\Commands\AiOps\Alerts\Check::class,
        \App\Commands\AiOps\Alerts\Clean::class,
        \App\Commands\AiOps\Alerts\Health::class,
        \App\Commands\AiOps\Alerts\Worker::class,
        \App\Commands\AiOps\API\SchemeValidate::class,
        \App\Commands\AiOps\DB\SlowScan::class,
        \App\Commands\AiOps\N8n\Logs::class,
        \App\Commands\AiOps\N8n\Restart::class,
        \App\Commands\AiOps\N8n\Start::class,
        \App\Commands\AiOps\N8n\Stop::class,
        \App\Commands\AiOps\Observe\Cost::class,
        \App\Commands\AiOps\Observe\Hash::class,
        \App\Commands\AiOps\Observe\Map::class,
        \App\Commands\AiOps\Observe\Patch::class,
        \App\Commands\AiOps\Observe\Regression::class,
        \App\Commands\AiOps\Observe\Scan::class,
        \App\Commands\AiOps\Observe\Snapshot::class,
        \App\Commands\AiOps\Observe\Suggest::class,
        \App\Commands\AiOps\Patch\Apply::class,
        \App\Commands\AiOps\Patch\DryRun::class,
        \App\Commands\AiOps\Patch\Hallucination::class,
        \App\Commands\AiOps\Patch\RiskScore::class,
        \App\Commands\AiOps\Patch\Validate::class,
        \App\Commands\AiOps\PublicPages\Audit::class,
        \App\Commands\AiOps\PublicPages\Import::class,
        \App\Commands\AiOps\PublicPages\Report::class,
        \App\Commands\AiOps\PublicPages\Run::class,
        \App\Commands\AiOps\Redis\Stats::class,
        \App\Commands\AiOps\Routes\Compare::class,
        \App\Commands\AiOps\Routes\Gate::class,
        \App\Commands\AiOps\Routes\Regress::class,
        \App\Commands\AiOps\Routes\Scan::class,
        \App\Commands\AiOps\Routes\ScanAuth::class,

        /*
        |----------------------------------------------------------------------
        | App / Audit
        |----------------------------------------------------------------------
        */
        \App\Commands\Audit\All::class,
        \App\Commands\App\ControllerAudit::class,
        \App\Commands\App\CoverageGate::class,
        \App\Commands\App\Healthcheck::class,
        \App\Commands\App\Test::class,
        \App\Commands\AppUpdate::class,
        \App\Commands\RuntimeCheck::class,
        \App\Commands\SparkRegistryAudit::class,

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
        | Content / Marketing
        |----------------------------------------------------------------------
        */
        \App\Commands\ContentIngestSample::class,
        \App\Commands\ContentEngineSmoke::class,
        \App\Commands\Marketing\AutomationAudit::class,
        \App\Commands\NewsAudit::class,

        /*
        |----------------------------------------------------------------------
        | Codex
        |----------------------------------------------------------------------
        */
        \App\Commands\Codex\Instructions\Audit::class,
        \App\Commands\Codex\Instructions\DevOpsReview::class,
        \App\Commands\Codex\Instructions\Summarize::class,
        \App\Commands\Codex\Auth::class,
        \App\Commands\Codex\Audit::class,
        \App\Commands\Codex\ContinueAudit::class,
        \App\Commands\Codex\Gate::class,
        \App\Commands\Codex\GateSeverity::class,
        \App\Commands\Codex\Index::class,
        \App\Commands\Codex\Review::class,
        \App\Commands\Codex\ReviewList::class,
        \App\Commands\Codex\ReviewCommit::class,
        \App\Commands\Codex\ReviewPrOutbox::class,
        \App\Commands\Codex\ReviewPublish::class,
        \App\Commands\Codex\Status::class,

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
        | DreamHost Diagnostics
        |----------------------------------------------------------------------
        */
        \App\Commands\Dreamhost\DNSTest::class,
        \App\Commands\Dreamhost\EnvDebug::class,
        \App\Commands\Dreamhost\ImapFlagSweep::class,
        \App\Commands\Dreamhost\ImapTest::class,
        \App\Commands\Dreamhost\PortTest::class,
        \App\Commands\Dreamhost\SmtpProbe::class,
        \App\Commands\Dreamhost\SSLTest::class,

        /*
        |----------------------------------------------------------------------
        | GitHub
        |----------------------------------------------------------------------
        */
        \App\Commands\GitHub\SearchRepo::class,

        /*
        |----------------------------------------------------------------------
        | K6 / Performance Testing
        |----------------------------------------------------------------------
        */
        \App\Commands\Performance\K6Run::class,

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
        \App\Commands\Ops\DoctorFull::class,
        \App\Commands\Ops\EnvSnapshot::class,
        \App\Commands\Ops\FilesystemFix::class,
        \App\Commands\Ops\FilesystemLint::class,
        \App\Commands\Ops\ImageCapabilities::class,
        \App\Commands\Ops\NetworkMatrix::class,
        \App\Commands\Ops\NextSteps::class,
        \App\Commands\Ops\NextStepsSync::class,
        \App\Commands\Ops\NextStepsSyncManual::class,
        \App\Commands\Ops\PHPExtensionsAudit::class,
        \App\Commands\Ops\ProposePr::class,
        \App\Commands\Ops\SparkRegistryAudit::class,
        \App\Commands\Ops\SparkReset::class,
        \App\Commands\Ops\SubsAudit::class,
        \App\Commands\Ops\SubsDoctor::class,
        \App\Commands\Ops\SubsRepair::class,
        \App\Commands\Ops\SubsStatus::class,
        \App\Commands\Ops\VPSSnapshot::class,
        \App\Commands\OpsAnalyzeCommands::class,
        \App\Commands\OpsFetchCommands::class,
        \App\Commands\OpsWork::class,

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
        | Scrapers / Alerts
        |----------------------------------------------------------------------
        */
        \App\Commands\AlertsAudit::class,
        \App\Commands\AlertsParseTest::class,
        \App\Commands\Scrapers\EmailScraperAudit::class,

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
        | Testing / Development
        |----------------------------------------------------------------------
        */
        \App\Commands\Test\RedisPing::class,
        \App\Commands\SecurityCspAudit::class,

        /*
        |----------------------------------------------------------------------
        | Traits
        |----------------------------------------------------------------------
        */
        \App\Commands\Traits\ParamOptions::class,

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
