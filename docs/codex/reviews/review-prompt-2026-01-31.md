# Codex Review Prompt - 2026-01-31

## Inputs
- Git status:
```
 M ../app/Commands/CodexReview.php
 M ../writable/logs/log-2026-01-31.php
?? ../docs/aiops/filesystem_rules.md
```
- Recent commits:
```
99b76266b 01/31/2026 - Commands & Config Changes to fix Spark not working - TBJ (24 minutes ago)
fe82f5b5b 01/30/2026 - Config, Commands, Docs and more updates - TBJ (12 hours ago)
b02bbbebd Merge pull request #206 from MillennialInvestments/codex/design-aiops-spark-control-plane-documentation (13 hours ago)
6d1712baa Add AIOps control plane documentation (14 hours ago)
31c27e02d Merge pull request #205 from MillennialInvestments/codex/audit-spark-command-discovery-rules (23 hours ago)
dc0ab0b6f Add Spark Doctor audit enforcement (23 hours ago)
6ee736744 01/30/2026 - AIOPS and app/Commands + Tools Updates - TBJ (24 hours ago)
48253b14b Merge pull request #204 from MillennialInvestments/codex/implement-mdit-phase-1-in-mymi-wallet (26 hours ago)
381b1f141 feat(mdit): implement Phase 1 Reg D accredited-only flow (2 days ago)
3d6b679f2 Merge pull request #203 from MillennialInvestments/codex/implement-spark-runtime-validation-and-safety-hardening (2 days ago)
```
- Changed files:
```
.github/workflows/ci-config-guard.yml
.github/workflows/ci-health.yml
.github/workflows/ci.yml
.github/workflows/spark-command-lint.yml
.gitignore
README.md
aiops/aiops_worker.php
aiops/bridge.pid
app/Commands/Aiops/Run.php
app/Commands/AppUpdate.php
app/Commands/Contracts/AiOpsRunnable.php
app/Commands/Contracts/DryRunCapable.php
app/Commands/Contracts/RequiresApproval.php
app/Commands/Database/MigrateDryRun.php
app/Commands/Diagnose503.php
app/Commands/DiscordProcessQueue.php
app/Commands/Fix503.php
app/Commands/ForecastRefresh.php
app/Commands/Health/Cache.php
app/Commands/Health/Disk.php
app/Commands/Health/GitSafety.php
app/Commands/Health/Services.php
app/Commands/Logs/Summarize.php
app/Commands/LogsFullReport.php
app/Commands/MailSend.php
app/Commands/MditNavComputeDaily.php
app/Commands/Ops/CommandsAudit.php
app/Commands/Ops/CommandsAutofix.php
app/Commands/Ops/CommandsLint.php
app/Commands/Ops/NextSteps.php
app/Commands/OpsAnalyzeCommands.php
app/Commands/OpsFetchCommands.php
app/Commands/OpsWork.php
app/Commands/PurgeFastCGI.php
app/Commands/RestartSafe.php
app/Commands/Runtime/Diagnose502.php
app/Commands/Runtime/SparkDoctor.php
app/Commands/Runtime/SparkFix.php
app/Commands/RuntimeCheck.php
app/Commands/SafeBaseCommand.php
app/Commands/SparkReset.php
app/Commands/TrafficSpikeGuard.php
app/Commands/WalletsWarmSummaryCache.php
app/Config/App.php
app/Config/Boot/cli.php
app/Config/Boot/development.php
app/Config/Boot/development.php.bak
app/Config/Boot/production.php
app/Config/Boot/production.php.bak
app/Config/Boot/testing.php
app/Config/Boot/testing.php.bak
app/Config/Console.php
app/Config/Routes.php
app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php
app/Database/Migrations/2026-04-01-000110_CreateMditAuthRoles.php
app/Helpers/ci_guard_helper.php
app/Models/MDIT/MditDepositModel.php
app/Models/MDIT/MditDisclosureAcceptanceModel.php
app/Models/MDIT/MditInvestorProfileModel.php
app/Models/MDIT/MditNavSnapshotModel.php
app/Models/MDIT/MditRedemptionModel.php
app/Models/MDIT/MditTokenLedgerModel.php
app/Models/MDIT/MditWalletModel.php
app/Models/MDIT/MditWebhookEventModel.php
app/Models/Ops/SparkHealthModel.php
app/Modules/APIs/Controllers/HealthController.php
app/Modules/APIs/Controllers/MditAdminController.php
app/Modules/APIs/Controllers/MditBaseController.php
app/Modules/APIs/Controllers/MditDepositController.php
app/Modules/APIs/Controllers/MditInvestorController.php
app/Modules/APIs/Controllers/MditIssuanceController.php
app/Modules/APIs/Controllers/MditRedemptionController.php
app/Modules/APIs/Controllers/MditWebhookController.php
app/Services/MDIT/MditDepositService.php
app/Services/MDIT/MditInvestorService.php
app/Services/MDIT/MditIssuanceService.php
app/Services/MDIT/MditNavService.php
app/Services/MDIT/MditRedemptionService.php
app/Services/MDIT/Providers/Kyc/SandboxKycProvider.php
composer.lock
docs/CRON.md
docs/_aiops/README.md
docs/_aiops/ci-summary.md
docs/_aiops/doc-change-log.md
docs/_aiops/gap-report.md
docs/_aiops/next-steps.md
docs/_aiops/nightly-summary.md
docs/_aiops/spark-results.md
docs/_aiops/stale-docs.md
docs/ai/codex_prompts/spark_rules.md
docs/ai/contracts/spark_commands_contract.md
docs/aiops/command-inventory.md
docs/aiops/control-plane.md
docs/aiops/spark_bootstrap_rules.md
docs/aiops/spark_command_invariants.md
docs/aiops/spark_rules.md
docs/chatgpt/unified_collaboration.md
docs/management/Automation_Levels.md
docs/management/Command_Discovery_And_Design.md
docs/management/Command_Gap_Analysis.md
docs/management/Command_Runtime_Audit.md
docs/management/Management_Command_Map.md
docs/management/Management_Roadmap.md
docs/management/Recommended_New_Commands.md
docs/management/Spark_Bootstrap_Requirements.md
docs/mdit/phase1_implementation_notes.md
docs/next/bf_aiops_task_runs/README.md
docs/product/Next_Codex_Tasks.md
docs/spark/cli-standards.md
docs/spark/merge-report.md
docs/spark/standards.md
docs/standards/aiops.md
docs/standards/spark.md
public/docs/codex/reviews/review-2026-01-31.md
public/docs/codex/reviews/review-prompt-2026-01-31.md
scripts/cron/spark_health_nightly.sh
tests/feature/MditPhase1Test.php
tools/github_open_issue.php
tools/spark_autopatch_commands.php
tools/spark_fix.php
tools/spark_scan_commands.php
writable/cache/.gitkeep
writable/cache/FactoriesCache/.gitkeep
writable/cache/FactoriesCache_config
writable/cache/FileLocatorCache
writable/cache/ratelimit_bot_a64e7f0cc1fcd410d95ad9060e85305ae0ef7012
writable/logs/log-2026-01-30.php
writable/logs/log-2026-01-31.php
writable/triage/spark-command-audit.json
writable/triage/spark-command-audit.md
```
- Docs drift:
Missing docs: docs/cron/index.csv, docs/chatgpt/prompt_templates.md, docs/ops/control_plane_assumptions.md

## Ask
Generate a concise risk-aware review, flag missing docs or auth gaps, and propose next steps.