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
        | App / Healthcheck
        |----------------------------------------------------------------------
        */
        \App\Commands\App\Healthcheck::class,

        /*
        |----------------------------------------------------------------------
        | Runtime / Recovery
        |----------------------------------------------------------------------
        */
        \App\Commands\Runtime\SparkDoctor::class,
        \App\Commands\Runtime\SparkDoctorRuntime::class,
        \App\Commands\Runtime\SparkOptimize::class,
        \App\Commands\Runtime\Diagnose502::class,
        \App\Commands\Runtime\Triage::class,
        \App\Commands\Runtime\CacheBoot::class,

        \App\Commands\Diagnose503::class,
        \App\Commands\PurgeFastCGI::class,
        \App\Commands\RestartSafe::class,
        \App\Commands\TrafficSpikeGuard::class,

        /*
        |----------------------------------------------------------------------
        | AIOps
        |----------------------------------------------------------------------
        */
        \App\Commands\AiOps\Audit::class,
        \App\Commands\AiOps\AutoRun::class,
        \App\Commands\AiOps\ChatGovernanceIndex::class,
        \App\Commands\AiOps\CommandIndex::class,
        \App\Commands\AiOps\CopilotValidate::class,
        \App\Commands\AiOps\EmailScan::class,
        \App\Commands\AiOps\ManualRun::class,
        \App\Commands\AiOps\N8nLogs::class,
        \App\Commands\AiOps\N8nRestart::class,
        \App\Commands\AiOps\N8nStart::class,
        \App\Commands\AiOps\N8nStop::class,
        \App\Commands\AiOps\Repair::class,
        \App\Commands\AiOps\Run::class,
        \App\Commands\AiOps\ScanCells::class,
        \App\Commands\AiOps\Seed::class,
        \App\Commands\AiOps\SelfHeal::class,
        \App\Commands\AiOps\Status::class,
        \App\Commands\AiOps\Watch::class,

        /*
        |----------------------------------------------------------------------
        | Ops
        |----------------------------------------------------------------------
        */
        \App\Commands\Ops\AiopsInit::class,
        \App\Commands\Ops\AppUpdate::class,
        \App\Commands\Ops\ConfigLint::class,
        \App\Commands\Ops\ConfigReset::class,
        \App\Commands\Ops\CommandsAudit::class,
        \App\Commands\Ops\CommandsAutofix::class,
        \App\Commands\Ops\CommandsInventory::class,
        \App\Commands\Ops\CommandsLint::class,
        \App\Commands\Ops\FilesystemLint::class,
        \App\Commands\Ops\AlertsIngest::class,
        \App\Commands\Ops\NextSteps::class,
        \App\Commands\Ops\NextStepsSync::class,
        \App\Commands\Ops\NextStepsSyncManual::class,
        \App\Commands\Ops\ProposePr::class,
        \App\Commands\Ops\Diagnostics\FilesystemScan::class,
        \App\Commands\Ops\DreamHost\DnsVerify::class,
        \App\Commands\Ops\DreamHost\EmailAudit::class,
        \App\Commands\Ops\DreamHost\EmailList::class,
        \App\Commands\Ops\DreamHost\Limits::class,
        \App\Commands\Ops\Email\Healthcheck::class,
        \App\Commands\Ops\Email\QueueScan::class,
        \App\Commands\Ops\Email\Test::class,
        \App\Commands\Ops\Health\Healthcheck::class,
        \App\Commands\Ops\Logs\Scan::class,
        \App\Commands\Ops\Logs\Watch::class,
        \App\Commands\Ops\PHP\FpmHealth::class,
        \App\Commands\Ops\Report::class,
        \App\Commands\Ops\SelfHeal::class,
        \App\Commands\Ops\Server\NginxStatus::class,
        \App\Commands\Ops\SparkReset::class,
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
        \App\Commands\Chat\Unlock::class,
        \App\Commands\Logs\Summarize::class,
        \App\Commands\Logs\SummarizeAll::class,
        /*
        |----------------------------------------------------------------------
        | Codex / Review
        |----------------------------------------------------------------------
        */
        \App\Commands\Codex\Review::class,
        \App\Commands\Codex\ReviewList::class,
        \App\Commands\Codex\ReviewCommit::class,
        \App\Commands\Codex\ReviewPrOutbox::class,
        \App\Commands\Codex\ReviewPublish::class,

        /*
        |----------------------------------------------------------------------
        | Config / Drift / Security
        |----------------------------------------------------------------------
        */
        \App\Commands\Config\Drift::class,
        \App\Commands\Database\Drift::class,

        /* Security */
        \App\Commands\Security\GenerateKey::class,
        \App\Commands\Security\GenerateCI4Key::class,
        \App\Commands\Security\SecretsAudit::class,

        /*
        |----------------------------------------------------------------------
        | Business / Product Audits
        |----------------------------------------------------------------------
        */
        \App\Commands\Audit\NodeAudit::class,
        \App\Commands\Marketing\AutomationAudit::class,
        \App\Commands\Growth\RetentionWatch::class,
        \App\Commands\Ux\JourneyAudit::class,
        \App\Commands\Revenue\CostForecast::class,
        \App\Commands\Scraper\EmailScraperAudit::class,


        /*
        |----------------------------------------------------------------------
        | GitHub
        |----------------------------------------------------------------------
        */
        \App\Commands\GitHub\SearchRepo::class,
    ];

    /**
     * Show help output when no command is provided
     */
    public bool $showHelp = true;
}
