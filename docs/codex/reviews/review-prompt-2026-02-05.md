# Codex Review Prompt - 2026-02-05

## Inputs
- Git status:
```
 M ../aiops/bridge.pid
 M ../docs/_aiops/ci-summary.md
 M ../docs/_aiops/doc-change-log.md
 M ../docs/_aiops/gap-report.md
 M ../docs/_aiops/next-steps.md
 M ../docs/_aiops/nightly-summary.md
 M ../docs/_aiops/spark-results.md
 M ../docs/_aiops/stale-docs.md
 M ../docs/_aiops/state.json
 M ../docs/chatgpt/aiops/chat_metrics.json
 D ../writable/cache/FactoriesCache_config
 M ../writable/cache/FileLocatorCache
 D ../writable/cache/ratelimit_bot_bcb7d9b5a05d2ea5e72a407bebe839531a851866
 D ../writable/cache/seo_7c2eebfe246a624f5a9407ef364a9062
 D ../writable/cache/seo_b99834bc19bbad24580b3adfa04fb947
?? ../app/Config/Codex.php
?? ../docs/aiops/artifacts/growth-retention-watch/20260205-024348/
?? ../docs/aiops/artifacts/growth-retention-watch/20260205-024413/
?? ../docs/aiops/artifacts/revenue-cost-forecast/20260205-024422/
?? ../docs/aiops/artifacts/scraper-audit-emails/
?? ../docs/aiops/artifacts/ux-journey-audit/20260205-024451/
?? ../docs/aiops/command-index.csv
?? ../docs/aiops/command-index.json
?? ../docs/aiops/copilot-validation.json
?? ../docs/gap_tracker/reports/gap_sync_2026-02-05.md
?? ../writable/logs/log-2026-02-05.php
```
- Recent commits:
```
b878585af Add Debug config to disable Kint safely for CLI and Codex (2 days ago)
c69fca359 02/02/2026 - AIOPS file updates/uploads - TBJ (2 days ago)
b1c0eba07 Merge pull request #225 from MillennialInvestments/codex/implement-aiops-email-scanning-pipeline (2 days ago)
db2f9c1a3 Add AIOps email scan pipeline (2 days ago)
2c03dcea3 Merge pull request #224 from MillennialInvestments/codex/create-structured-documentation-tasks-from-next-steps.md (2 days ago)
6785268f8 02/02/2026 - docs/aiops instructions to automate everything - TBJ (2 days ago)
1aedf8e48 Add doc-driven authority rules for AIOps (2 days ago)
9c65e9ea3 Merge pull request #223 from MillennialInvestments/codex/refactor-artifacthelper-for-sandbox-compliance (3 days ago)
f49045b87 Merge branch 'main' into codex/refactor-artifacthelper-for-sandbox-compliance (3 days ago)
1359b0a9e 02/02/2026 - Config + Command Updates to clear uncovered/underlying errors that were missed - TBJ (3 days ago)
```
- Changed files:
```
.github/codex-instructions.md
.github/copilot-instructions.md
aiops/bridge.pid
app/Commands/API/ApiAudit.php
app/Commands/AiOps/EmailScan.php
app/Commands/Config/Drift.php
app/Commands/Database/Drift.php
app/Commands/Fix503.php
app/Commands/Growth/RetentionWatch.php
app/Commands/LogsFullReport.php
app/Commands/Marketing/AutomationAudit.php
app/Commands/Ops/AiopsInit.php
app/Commands/Ops/AppUpdate.php
app/Commands/Ops/CommandsAutofix.php
app/Commands/Ops/CommandsInventory.php
app/Commands/Ops/NextStepsSync.php
app/Commands/Ops/ProposePr.php
app/Commands/Ops/SparkReset.php
app/Commands/Revenue/CostForecast.php
app/Commands/RevenueStreamsScan.php
app/Commands/Runtime/CacheBoot.php
app/Commands/Runtime/SparkDoctorRuntime.php
app/Commands/Runtime/Triage.php
app/Commands/SafeBaseCommand.php
app/Commands/Scrapers/EmailScraperAudit.php
app/Commands/Security/SecretsAudit.php
app/Commands/Support/ArtifactHelper.php
app/Commands/Ux/JourneyAudit.php
app/Config/APISettings.php
app/Config/Database.testing.php
app/Config/Debug.php
app/Config/Events.php
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php
app/Models/AiOpsEmailProcessedModel.php
app/Models/AiOpsRunModel.php
app/Models/InvestmentScannerLineageModel.php
app/Models/InvestmentTickerDailyCountModel.php
app/Services/AiOps/EmailScannerService.php
docs/_aiops/aiops_mission.md
docs/_aiops/ci-summary.md
docs/_aiops/codex-review-prompt.md
docs/_aiops/doc-change-log.md
docs/_aiops/gap-report.md
docs/_aiops/next-steps.md
docs/_aiops/nightly-summary.md
docs/_aiops/spark-results.md
docs/_aiops/stale-docs.md
docs/_aiops/state.json
docs/aiops/ARTIFACT_SANDBOX.md
docs/aiops/artifacts/ops-spark-reset/20260202-022437/report.json
docs/aiops/artifacts/ops-spark-reset/20260202-022437/summary.md
docs/aiops/scraper/_index.md
docs/aiops/scrapers/_index.md
docs/aiops/scrapers/alerts-email-scan.md
writable/cache/FactoriesCache_config
writable/cache/FileLocatorCache
writable/cache/ratelimit_bot_7d6b16512e419e540ff3cf0a868412a23aee8665
writable/cache/ratelimit_bot_bcb7d9b5a05d2ea5e72a407bebe839531a851866
writable/cache/seo_7c2eebfe246a624f5a9407ef364a9062
writable/cache/seo_b99834bc19bbad24580b3adfa04fb947
writable/logs/log-2026-02-01.php
writable/logs/log-2026-02-02.php
writable/logs/summary-2026-02-02.state
```
- Docs drift:
Missing docs: docs/cron/index.csv, docs/chatgpt/prompt_templates.md, docs/ops/control_plane_assumptions.md

## Ask
Generate a concise risk-aware review, flag missing docs or auth gaps, and propose next steps.