# AIOPS INGEST JOB #12

## Goal
Analyze the instruction and produce minimal CI4-compatible code changes.

## Governance Context
- Risk Level: CRITICAL
- Governance Score: 25
- Manual Review Required: NO

## Targeting Hints (best-effort)
- system/CodeIgniter.php
- app/Modules/APIs/Controllers/InvestmentsAPIController.php
- app/Controllers/
- app/Services/
- app/Services/AIOps/
- app/Config/Cache.php


## Output Contract (STRICT)
Write outputs into:
- docs/_aiops/pr_ready/12/
Include:
- pr.md (title, summary, rationale, rollback, tests)
- patch/ (full replacement files OR unified diffs per file)
- risks.md
- tests.md

## Instruction
AIOPS_PATCH_JOB_TITLE=LOG_AUTOFIX_20260227_013824
AIOPS_OBJECTIVE=Resolve_current_log_failures_detected_by_logs_summarize

CRITICAL_ISSUES:
- [1] CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
- [1] [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001

ERROR_ISSUES:
- [1] DashboardController::index failed to load executive summary: Cache key contains reserved characters {}()/\@:
- [1] Table 'mymiwallet.bf_squeeze_scorecards' doesn't exist
- [1] API getForecastAccuracySummary failed: Call to undefined method App\Services\ForecastAccuracyEvaluator::getAccuracyDashboardData()
- [1] API getConfidenceHeatmap failed: App\Services\ForecastAggregationService::getConfidenceHeatmap(): Argument #2 ($windowMinutes) must be of type int, string given, called in /home/mymiteam/mymiwallet/site/current/app/Modules/APIs/Controllers/InvestmentsAPIController.php on line 301
