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
        | Standards
        |----------------------------------------------------------------------
        */
        \App\Commands\ControllerProfile::class,
        \App\Commands\GtmHealthSnapshot::class,
        \App\Commands\GtmLaunchAudit::class,
        \App\Commands\GtmLaunchSmoke::class,

        /*
        |----------------------------------------------------------------------
        | AI-Ops
        |----------------------------------------------------------------------
        */
        \App\Commands\AIOps\Audit::class,
        \App\Commands\AIOps\AutoRun::class,
        \App\Commands\AIOps\Backlog::class,
        \App\Commands\AIOps\BuildCommand::class,
        \App\Commands\AIOps\ChatGovernanceIndex::class,
        \App\Commands\AIOps\CommandIndex::class,
        \App\Commands\AIOps\ContinueAudit::class,
        \App\Commands\AIOps\CspAudit::class,
        \App\Commands\AIOps\CopilotValidate::class,
        \App\Commands\AIOps\DedupeReport::class,
        \App\Commands\AIOps\DepsAdd::class,
        \App\Commands\AIOps\DiffFormat::class,
        \App\Commands\AIOps\Doctor::class,
        \App\Commands\AIOps\GateCost::class,
        \App\Commands\AIOps\EmailScan::class,
        \App\Commands\AIOps\GovernanceAnalyze::class,
        \App\Commands\AIOps\HealthFull::class,
        \App\Commands\AIOps\Ingest::class,
        \App\Commands\AIOps\Init::class,
        \App\Commands\AIOps\ManualIndex::class,
        \App\Commands\AIOps\ManualRun::class,
        \App\Commands\AIOps\Observe::class,
        \App\Commands\AIOps\PRAuto::class,
        \App\Commands\AIOps\PRCreate::class,
        \App\Commands\AIOps\PriorityBuildCommand::class,
        \App\Commands\AIOps\Repair::class,
        \App\Commands\AIOps\RepairRun::class,
        \App\Commands\AIOps\RepairRunSafe::class,
        \App\Commands\AIOps\Rollback::class,
        \App\Commands\AIOps\Run::class,
        \App\Commands\AIOps\RunGraph::class,
        \App\Commands\AIOps\ScanCells::class,
        \App\Commands\AIOps\Seed::class,
        \App\Commands\AIOps\SelfHeal::class,
        \App\Commands\AIOps\Status::class,
        \App\Commands\AIOps\SqlCheck::class,
        \App\Commands\AIOps\SyncPerfRoutes::class,
        \App\Commands\AIOps\Unlock::class,
        \App\Commands\AIOps\Watch::class,
        \App\Commands\AIOps\Worker::class,
        \App\Commands\AIOps\WorkerLogs::class,
        \App\Commands\AIOps\Alerts\Check::class,
        \App\Commands\AIOps\Alerts\Clean::class,
        \App\Commands\AIOps\Alerts\Health::class,
        \App\Commands\AIOps\Alerts\Worker::class,
        \App\Commands\AIOps\API\SchemaValidate::class,
        \App\Commands\AIOps\DB\SlowScan::class,
        \App\Commands\AIOps\Docs\AutoSync::class,
        \App\Commands\AIOps\Forms\TestScan::class,
        \App\Commands\AIOps\N8n\Logs::class,
        \App\Commands\AIOps\N8n\Restart::class,
        \App\Commands\AIOps\N8n\Start::class,
        \App\Commands\AIOps\N8n\Stop::class,
        \App\Commands\AIOps\Observe\Cost::class,
        \App\Commands\AIOps\Observe\Hash::class,
        \App\Commands\AIOps\Observe\Map::class,
        \App\Commands\AIOps\Observe\Patch::class,
        \App\Commands\AIOps\Observe\Regression::class,
        \App\Commands\AIOps\Observe\Scan::class,
        \App\Commands\AIOps\Observe\Snapshot::class,
        \App\Commands\AIOps\Observe\Suggest::class,
        \App\Commands\AIOps\Patch\Apply::class,
        \App\Commands\AIOps\Patch\DryRun::class,
        \App\Commands\AIOps\Patch\Hallucination::class,
        \App\Commands\AIOps\Patch\RiskScore::class,
        \App\Commands\AIOps\Patch\Validate::class,
        \App\Commands\AIOps\PublicPages\Audit::class,
        \App\Commands\AIOps\PublicPages\Import::class,
        \App\Commands\AIOps\PublicPages\Report::class,
        \App\Commands\AIOps\PublicPages\Run::class,
        \App\Commands\AIOps\Redis\Stats::class,
        \App\Commands\AIOps\Routes\Compare::class,
        \App\Commands\AIOps\Routes\Gate::class,
        \App\Commands\AIOps\Routes\Regress::class,
        \App\Commands\AIOps\Routes\Scan::class,
        \App\Commands\AIOps\Routes\ScanAuth::class,

        /*
        |----------------------------------------------------------------------
        | Alerts Management
        |----------------------------------------------------------------------
        */
        \App\Commands\Alerts\Audit::class,
        \App\Commands\Alerts\Forecast::class,
        \App\Commands\Alerts\Ingest::class,
        \App\Commands\Alerts\ParseTest::class,

        /*
        |----------------------------------------------------------------------
        | App / Audit
        |----------------------------------------------------------------------
        */
        \App\Commands\Audit\All::class,
        \App\Commands\App\APIAuditPro::class,
        \App\Commands\App\APIList::class,
        \App\Commands\App\ControllerAudit::class,
        \App\Commands\App\CoverageGate::class,
        \App\Commands\App\Healthcheck::class,
        \App\Commands\App\Test::class,
        \App\Commands\AppUpdate::class,
        \App\Commands\RuntimeCheck::class,

        /*
        |----------------------------------------------------------------------
        | API Governance
        |----------------------------------------------------------------------
        */
        \App\Commands\API\ApiAudit::class,
        \App\Commands\API\ApiList::class,
        \App\Commands\API\ApiPermissions::class,
        \App\Commands\API\ApiFiltersCheck::class,
        \App\Commands\API\ApiRateLimitCheck::class,
        \App\Commands\API\ApiVersioningCheck::class,

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
        \App\Commands\Scanning\RunScanner::class,
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
        | Config
        |----------------------------------------------------------------------
        */
        \App\Commands\ConfigClear::class,
        \App\Commands\ConfigLint::class,
        \App\Commands\Config\Drift::class,

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
        \App\Commands\Discord\GetList::class,
        \App\Commands\Discord\ProcessQueue::class,
        \App\Commands\Discord\Test::class,
        \App\Commands\Discord\TestLiquidity::class,
        \App\Commands\Discord\WireCheck::class,

        /*
        |----------------------------------------------------------------------
        | Docs Management
        |----------------------------------------------------------------------
        */
        \App\Commands\Docs\ArchitectureGraph::class,
        \App\Commands\Docs\DatabaseMap::class,
        \App\Commands\Docs\DependenciesMap::class,
        \App\Commands\Docs\FullDocsAudit::class,
        \App\Commands\Docs\ModulesMap::class,
        \App\Commands\Docs\RoutesInventory::class,
        \App\Commands\Docs\SparkCommandsInventory::class,
        \App\Commands\Docs\SyncDocsSystem::class,
        \App\Commands\Docs\Exports\ExportViewTxt::class,
        \App\Commands\Docs\Generate\DocsReadmeBuilder::class,
        \App\Commands\Docs\Scan\ControllersList::class,
        \App\Commands\Docs\Scan\ServiceList::class,
        \App\Commands\Docs\Scan\ViewDirectories::class,
        \App\Commands\Docs\Scan\ViewFiles::class,
        \App\Commands\Docs\GenerateKnowledgeGraph::class,
        \App\Commands\Docs\BuildHowItWorksNavigation::class,
        \App\Commands\Docs\ScanOrphanRoutes::class,
        \App\Commands\Docs\ScanOrphanViews::class,
        \App\Commands\Docs\ScanUndocumentedControllers::class,
        \App\Commands\Docs\GenerateArchitectureMap::class,

        /*
        |----------------------------------------------------------------------
        | DreamHost Diagnostics
        |----------------------------------------------------------------------
        */
        \App\Commands\DreamHost\DNSTest::class,
        \App\Commands\DreamHost\EnvDebug::class,
        \App\Commands\DreamHost\ImapFlagSweep::class,
        \App\Commands\DreamHost\ImapTest::class,
        \App\Commands\DreamHost\PortTest::class,
        \App\Commands\DreamHost\SmtpProbe::class,
        \App\Commands\DreamHost\SSLTest::class,

        /*
        |----------------------------------------------------------------------
        | .env
        |----------------------------------------------------------------------
        */
        \App\Commands\ENV\EnvDoctor::class,

        /*
        |----------------------------------------------------------------------
        | Errors / Incidents
        |----------------------------------------------------------------------
        */
        \App\Commands\Errors\ConsolidateErrors::class,
        \App\Commands\Errors\Diagnose502::class,
        \App\Commands\Errors\Diagnose503::class,
        \App\Commands\Errors\DispatchAlerts::class,
        \App\Commands\Errors\LearnPatterns::class,

        /*
        |----------------------------------------------------------------------
        | GitHub
        |----------------------------------------------------------------------
        */
        \App\Commands\GitHub\PullSafe::class,
        \App\Commands\GitHub\SearchRepo::class,
        \App\Commands\GitHub\SyncSafe::class,
        \App\Commands\GitHub\WorkspaceGuard::class,
        \App\Commands\GitHub\WorkspaceRepair::class,

        /*
        |----------------------------------------------------------------------
        | K6 / Performance Testing
        |----------------------------------------------------------------------
        */
        \App\Commands\Performance\K6Run::class,

        /*
        |----------------------------------------------------------------------
        | Logger
        |----------------------------------------------------------------------
        */
        \App\Commands\Logger\Audit::class,

        /*
        |----------------------------------------------------------------------
        | Logs
        |----------------------------------------------------------------------
        */
        \App\Commands\Logs\CheckServerLogs::class,
        \App\Commands\Logs\Doctor::class,
        \App\Commands\Logs\EnableFullLogging::class,
        \App\Commands\Logs\Healthcheck::class,
        \App\Commands\Logs\Summarize::class,
        \App\Commands\Logs\SummarizeAll::class,
        \App\Commands\LogsFullReport::class,
        \App\Commands\LogsTest::class,

        /*
        |----------------------------------------------------------------------
        | Mail
        |----------------------------------------------------------------------
        */
        \App\Commands\Mail\SendSend::class,
        \App\Commands\Mail\SendTestEmail::class,
        \App\Commands\Mail\Test::class,
        \App\Commands\Mail\Verify::class,

        /*
        |----------------------------------------------------------------------
        | Mail
        |----------------------------------------------------------------------
        */
        \App\Commands\Master\Health\Commands::class,
        \App\Commands\Master\Health\Controllers::class,
        \App\Commands\Master\Health\Dependencies::class,
        \App\Commands\Master\Health\Docs::class,
        \App\Commands\Master\Health\Logs::class,
        \App\Commands\Master\Health\Models::class,
        \App\Commands\Master\Health\Routes::class,
        \App\Commands\Master\Health\Services::class,
        \App\Commands\Master\Health\Views::class,
        \App\Commands\Master\KnowledgeGraphBuild::class,
        \App\Commands\Master\RunAll::class,
        /*
        |----------------------------------------------------------------------
        | Ops
        |----------------------------------------------------------------------
        */
        \App\Commands\Ops\AnalyzeCommands::class,
        \App\Commands\Ops\AppUpdate::class,
        \App\Commands\Ops\BaseOpsCommand::class,
        \App\Commands\Ops\BuildConsoleRegistry::class,
        \App\Commands\Ops\CiPrepare::class,
        \App\Commands\Ops\ConfigLint::class,
        \App\Commands\Ops\Diff::class,
        \App\Commands\Ops\DiffWallet::class,
        \App\Commands\Ops\DriftScan::class,
        \App\Commands\Ops\DoctorFull::class,
        \App\Commands\Ops\EnvSnapshot::class,
        \App\Commands\Ops\FetchCommands::class,
        \App\Commands\Ops\FilesystemFix::class,
        \App\Commands\Ops\FilesystemLint::class,
        \App\Commands\Ops\ImageCapabilities::class,
        \App\Commands\Ops\LoggerTest::class,
        \App\Commands\Ops\ModelLimitAudit::class,
        \App\Commands\Ops\NetworkMatrix::class,
        \App\Commands\Ops\NextSteps::class,
        \App\Commands\Ops\NextStepsSync::class,
        \App\Commands\Ops\NextStepsSyncManual::class,
        \App\Commands\Ops\PHPExtensionsAudit::class,
        \App\Commands\Ops\ProposePr::class,
        \App\Commands\Ops\Report::class,
        \App\Commands\Ops\SelfHeal::class,
        \App\Commands\Ops\Sync::class,
        \App\Commands\Ops\VPSSnapshot::class,
        \App\Commands\Ops\WalletIntegrity::class,
        \App\Commands\Ops\Work::class,
        \App\Commands\Ops\Commands\Audit::class,
        \App\Commands\Ops\Commands\Autofix::class,
        \App\Commands\Ops\Commands\ConstructorScanner::class,
        \App\Commands\Ops\Commands\Inventory::class,
        \App\Commands\Ops\Commands\Lint::class,
        \App\Commands\Ops\Commands\MissingFromConsole::class,
        \App\Commands\Ops\Daignostics\FilesystemScan::class,
        \App\Commands\Ops\Subs\Audit::class,
        \App\Commands\Ops\Subs\Doctor::class,
        \App\Commands\Ops\Subs\Repair::class,
        \App\Commands\Ops\Subs\Status::class,

        /*
        |----------------------------------------------------------------------
        | Ollama - Control
        |----------------------------------------------------------------------
        */
        \App\Commands\Ollama\CircuitReset::class,
        \App\Commands\Ollama\CircuitStatus::class,
        \App\Commands\Ollama\Health::class,
        \App\Commands\Ollama\Version::class,
        \App\Commands\Ollama\Ping::class,
        \App\Commands\Ollama\Diagnose::class,
        \App\Commands\Ollama\Doctor::class,
        \App\Commands\Ollama\Models\ListModels::class,
        \App\Commands\Ollama\Models\ShowModel::class,
        \App\Commands\Ollama\Models\PullModel::class,
        \App\Commands\Ollama\Models\RmModel::class,
        \App\Commands\Ollama\Models\PruneModels::class,
        \App\Commands\Ollama\Models\EnsureModels::class,
        \App\Commands\Ollama\Generate::class,
        \App\Commands\Ollama\Chat::class,
        \App\Commands\Ollama\Embed::class,
        \App\Commands\Ollama\Queue\Push::class,
        \App\Commands\Ollama\Queue\Work::class,
        \App\Commands\Ollama\Queue\Stats::class,
        \App\Commands\Ollama\Policy\Check::class,
        \App\Commands\Ollama\Docs\Sync::class,

        \App\Commands\Ollama\Logs::class,
        \App\Commands\Ollama\Logs\Tail::class,
        \App\Commands\Ollama\Logs\Export::class,
        \App\Commands\Ollama\Models\ExportModels::class,
        \App\Commands\Ollama\Models\DiffModels::class,
        \App\Commands\Ollama\Stream::class,
        \App\Commands\Ollama\Bench::class,
        \App\Commands\Ollama\EmbedFile::class,
        \App\Commands\Ollama\RagQuery::class,
        \App\Commands\Ollama\Sessions\ListSessions::class,
        \App\Commands\Ollama\Sessions\ShowSession::class,
        \App\Commands\Ollama\Sessions\RmSession::class,
        \App\Commands\Ollama\Policy\Export::class,
        \App\Commands\Ollama\Queue\Retry::class,
        \App\Commands\Ollama\Circuit\Status::class,
        \App\Commands\Ollama\Circuit\Reset::class,
        \App\Commands\Ollama\Modelfile\Validate::class,
        \App\Commands\Ollama\Models\CreateModel::class,
        \App\Commands\Ollama\Models\PushModel::class,
        \App\Commands\Ollama\Docs\Inventory::class,
        
        /*
        |----------------------------------------------------------------------
        | Git
        |----------------------------------------------------------------------
        */
        \App\Commands\Git\Status::class,
        \App\Commands\Git\Commit::class,
        \App\Commands\Git\Push::class,
        \App\Commands\Git\Pull::class,
        \App\Commands\Git\Branch::class,
        \App\Commands\Git\CreatePR::class,
        \App\Commands\Git\Sync::class,
        \App\Commands\Git\Health::class,

        /*
        |----------------------------------------------------------------------
        | Repo
        |----------------------------------------------------------------------
        */
        \App\Commands\Repo\ClassScan::class,
        \App\Commands\Repo\ClassTrace::class,
        \App\Commands\Repo\DiffSplit::class,
        \App\Commands\Repo\Health::class,
        
        /*
        |----------------------------------------------------------------------
        | Research
        |----------------------------------------------------------------------
        */
        \App\Commands\Research\DailyMarketReport::class,
        \App\Commands\Research\EarningsCalendar::class,
        \App\Commands\Research\FinancialIntelligenceSignals::class,
        \App\Commands\Research\FinancialKnowledge::class,
        \App\Commands\Research\FinancialNewsCollect::class,
        \App\Commands\Research\GoogleFinancialScan::class,
        \App\Commands\Research\GoogleScan::class,
        \App\Commands\Research\MarketDataCompile::class,
        \App\Commands\Research\ResearchPipeline::class,
        \App\Commands\Research\ShortInterestScan::class,
        \App\Commands\Research\ThinkOrSwimImport::class,
        \App\Commands\Research\WatchlistCleanup::class,
        \App\Commands\Research\WeeklyMarketReport::class,

        /*
        |----------------------------------------------------------------------
        | Routes
        |----------------------------------------------------------------------
        */
        \App\Commands\Routes\Audit::class,
        \App\Commands\Routes\Benchmark::class,
        \App\Commands\Routes\Debug::class,
        \App\Commands\Routes\Docs::class,
        \App\Commands\Routes\Reconcile::class,
        \App\Commands\Routes\Repair::class,
        
        /*
        |----------------------------------------------------------------------
        | Runtime / Recovery
        |----------------------------------------------------------------------
        */
        \App\Commands\Runtime\CacheBoot::class,
        \App\Commands\Runtime\Diagnose502::class,
        \App\Commands\Runtime\SparkDoctor::class,
        \App\Commands\Runtime\SparkDoctorRuntime::class,
        \App\Commands\Runtime\SparkFix::class,
        \App\Commands\Runtime\SparkOptimize::class,
        \App\Commands\Runtime\Triage::class,

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
        | Spark
        |----------------------------------------------------------------------
        */
        \App\Commands\Spark\Doctor::class,
        \App\Commands\Spark\DoctorRuntime::class,
        \App\Commands\Spark\Fix::class,
        \App\Commands\Spark\Optimize::class,

        /*
        |----------------------------------------------------------------------
        | Testing / Development
        |----------------------------------------------------------------------
        */
        \App\Commands\Test\RedisPing::class,

        /*
        |----------------------------------------------------------------------
        | Traits
        |----------------------------------------------------------------------
        */
        // \App\Commands\Traits\ParamOptions::class,

        /*
        |----------------------------------------------------------------------
        | Wallets / Forecasts / MDIT
        |----------------------------------------------------------------------
        */
        \App\Commands\ForecastEvaluate::class,
        \App\Commands\MditNavComputeDaily::class,
        \App\Commands\WalletsWarmSummaryCache::class,
    ];

    /**
     * Show help output when no command is provided
     */
    public bool $showHelp = true;
}
