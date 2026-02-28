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
