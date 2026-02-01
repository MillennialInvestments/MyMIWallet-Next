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
        | Ops / AIOps
        |----------------------------------------------------------------------
        */
        \App\Commands\Ops\AppUpdate::class,
        \App\Commands\AiOps\ChatGovernanceIndex::class,
        \App\Commands\AiOps\Run::class,
        \App\Commands\Ops\CommandsAudit::class,
        \App\Commands\Ops\CommandsAutofix::class,
        \App\Commands\Ops\AiopsInit::class,
        \App\Commands\Ops\CommandsInventory::class,
        \App\Commands\Ops\CommandsLint::class,
        \App\Commands\Ops\FilesystemLint::class,
        \App\Commands\Ops\ProposePr::class,
        \App\Commands\Ops\NextSteps::class,
        \App\Commands\Ops\NextStepsSync::class,
        \App\Commands\Ops\ProposePr::class,
        \App\Commands\Ops\SparkReset::class,
        \App\Commands\OpsWork::class,

        /*
        |----------------------------------------------------------------------
        | Codex / Review
        |----------------------------------------------------------------------
        */
        \App\Commands\Codex\Review::class,
        \App\Commands\Codex\ReviewList::class,
        \App\Commands\Codex\ReviewCommit::class,
        \App\Commands\Codex\ReviewPublish::class,

        /*
        |----------------------------------------------------------------------
        | Config / Drift / Security
        |----------------------------------------------------------------------
        */
        \App\Commands\Config\Drift::class,
        \App\Commands\Database\Drift::class,
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
        | Codex / Review System
        |----------------------------------------------------------------------
        */
        \App\Commands\CodexReview::class,
        // future:
        // \App\Commands\CodexReviewList::class,
        // \App\Commands\CodexReviewCommit::class,
        // \App\Commands\CodexReviewPublish::class,
    ];

    /**
     * Show help output when no command is provided
     */
    public bool $showHelp = true;
}
