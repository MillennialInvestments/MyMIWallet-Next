# Phase 16 CI Writable Cache Bootstrap Fix

Generated UTC: 2026-06-04T00:23:56Z
Branch: fix/ci-spark-command-audit-real
Commit Before Fix Commit: 345a466a5 chore: trigger CI after Spark audit cleanup

## Reason
- PR #514 CI logs showed CodeIgniter Spark commands failing on fresh runners.
- writable/cache did not exist before CodeIgniter attempted to save FileLocatorCache.
- This fix adds a reusable CI writable-directory preparation script.
- Workflows invoking Spark are updated to prepare writable directories first.

## Changed Files
```text
 M docs/_ops/filesystem-lint-summary.md
 M docs/_ops/filesystem-lint.json
 M docs/_ops/filesystem-lint.md
 M docs/_ops/filesystem-trend.md
 M docs/_ops/trends/filesystem-violations.json
 M docs/next/bf_aiops_task_runs/commands_lint.json
?? docs/security/solana/PHASE_16_CI_WRITABLE_CACHE_BOOTSTRAP_FIX.md
?? scripts/ci/prepare-writable.sh
```

## Diff Stat
```text
 docs/_ops/filesystem-lint-summary.md            |   10 +-
 docs/_ops/filesystem-lint.json                  | 5953 ++++++++++++++++++++---
 docs/_ops/filesystem-lint.md                    | 2874 ++++++++++-
 docs/_ops/filesystem-trend.md                   |    6 +-
 docs/_ops/trends/filesystem-violations.json     |    8 +
 docs/next/bf_aiops_task_runs/commands_lint.json |   45 +-
 6 files changed, 7943 insertions(+), 953 deletions(-)
```

## Writable Bootstrap Test
```text
Preparing CodeIgniter writable directories...
Prepared: writable/cache
Prepared: writable/debugbar
Prepared: writable/logs
Prepared: writable/session
Prepared: writable/uploads
CodeIgniter writable directories are ready.
PASS: writable/cache exists
drwxrwxr-x 20 mymiteam pg9881444 139264 Jun  3 17:23 writable
drwxrwxr-x  2 mymiteam pg9881444     10 Jun  3 17:23 writable/cache
```

## Spark Boot Test
```text
PASS: php spark list booted
```

## Spark Audit Tests
```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-04 00:23:57 UTC+00:00

Unsafe query patterns detected: 25
app/Models/Marketing/MarketingVideoAssetModel.php:23 findAll() without limit
  return $this->where('video_content_id', $contentId)->orderBy('sort_order', 'ASC')->findAll();
app/Models/Marketing/MarketingVideoTemplateModel.php:29 findAll() without limit
  return $builder->orderBy('template_name', 'ASC')->findAll();
app/Models/BudgetModel.php:1070 get()->getResultArray() without limit
  $result = $builder->get()->getResultArray();
app/Models/BudgetModel.php:1438 get() without limit
  //                       ->get();
app/Models/AlertsModel.php:1488 get()->getResultArray() without limit
  return $builder->get()->getResultArray();
app/Models/ProjectsModel.php:128 get()->getResultArray() without limit
  ->get()->getResultArray();
app/Models/ProjectsModel.php:173 get()->getResultArray() without limit
  ->get()->getResultArray();
app/Models/ProjectsModel.php:198 get()->getResultArray() without limit
  ->get()->getResultArray();
app/Models/ProjectsModel.php:215 get()->getResultArray() without limit
  ->get()->getResultArray();
app/Models/ProjectsModel.php:328 get()->getResultArray() without limit
  ->get()->getResultArray();
app/Models/ProjectsModel.php:350 get()->getResultArray() without limit
  ->get()->getResultArray();
app/Models/UserModel.php:396 get() without limit
  $getResult = $this->db->table('auth_groups')->where('name', $groupName)->get();
app/Models/TbiProjectCoinModel.php:17 findAll() without limit
  public function getCoinsForProject(int $projectId): array { return $this->where('project_id', $projectId)->findAll(); }
app/Models/TbiProjectCoinModel.php:35 get()->getResultArray() without limit
  public function getContributionCategories(): array { return $this->db->table('bf_tbi_coin_contribution_categories')->where('is_active', 1)->get()->getResultArray(); }
app/Libraries/MyMIExchange.php:316 get() without limit
  // $getUserAssets						= $this->db->get();
app/Services/OpsExportService.php:25 findAll() without limit
  ->findAll();
app/Services/AlertService.php:59 findAll() without limit
  $alerts = $this->alertsModel->whereIn('id', $ids)->findAll();
app/Services/Observability/ErrorAlertService.php:18 findAll() without limit
  $rules = $rulesModel->where('is_enabled', 1)->findAll();
app/Services/AIOps/DependencyResolver.php:21 findAll() without limit
  $rows = $this->deps->where('instruction_id', $instructionId)->findAll();
app/Services/AIOps/DependencyResolver.php:65 findAll() without limit
  $edges = $this->deps->findAll();
app/Services/MarketingNewsScrapeService.php:1266 get()->getResultArray() without limit
  return $builder->get()->getResultArray();
app/Services/MarketingDistributionService.php:97 findAll() without limit
  ->findAll();
app/Services/MarketingDistributionService.php:189 findAll() without limit
  ->findAll();
app/Services/MarketingDistributionService.php:411 findAll() without limit
  $rows = $this->targetModel->where('generated_content_id', $generatedContentId)->findAll();
app/Modules/APIs/Models/ScannerModel.php:60 get()->getResultArray() without limit
  $rows = $this->db->table('bf_investment_tickers')->select('ticker as symbol, exchange, asset_type')->get()->getResultArray();

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-04 00:23:57 UTC+00:00

Filesystem lint: FAIL
app/Commands/SolanaHealthcheck.php:20 Missing ROOTPATH anchor [WARNING]
app/Commands/SolanaHealthcheck.php:49 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/BuildConsoleRegistry.php:59 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/ProposePr.php:356 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/ProposePr.php:365 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/ProposePr.php:367 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/Diff.php:58 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/Diff.php:82 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/Commands/Audit.php:34 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/Commands/Lint.php:182 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/Commands/Lint.php:186 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/VPSSnapshot.php:21 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/VPSSnapshot.php:63 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/NextSteps.php:281 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/NextSteps.php:283 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/NextSteps.php:293 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/NextSteps.php:304 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/NextSteps.php:305 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/CiPrepare.php:31 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/CiPrepare.php:58 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/CiPrepare.php:59 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/FilesystemFix.php:68 Missing ROOTPATH anchor [WARNING]
app/Commands/Ops/FilesystemFix.php:70 Missing ROOTPATH anchor [WARNING]
app/Commands/Master/Health/Routes.php:45 Missing ROOTPATH anchor [WARNING]
app/Commands/Master/KnowledgeGraphBuild.php:41 Missing ROOTPATH anchor [WARNING]
app/Commands/Gtm/CronRouteSecurityValidation.php:195 Missing ROOTPATH anchor [WARNING]
app/Commands/Gtm/CronRouteSecurityValidation.php:232 Missing ROOTPATH anchor [WARNING]
app/Commands/Gtm/HealthSnapshot.php:97 Missing ROOTPATH anchor [WARNING]
app/Commands/Gtm/HealthSnapshot.php:100 Missing ROOTPATH anchor [WARNING]
app/Commands/Gtm/LaunchSmoke.php:37 Missing ROOTPATH anchor [WARNING]
app/Commands/Gtm/LaunchSmoke.php:55 Missing ROOTPATH anchor [WARNING]
app/Commands/Gtm/LaunchAudit.php:130 Missing ROOTPATH anchor [WARNING]
app/Commands/Gtm/LaunchAudit.php:133 Missing ROOTPATH anchor [WARNING]
app/Commands/CreateTbiProjectCoinDrafts.php:31 Missing ROOTPATH anchor [WARNING]
app/Commands/CreateTbiProjectCoinDrafts.php:99 Missing ROOTPATH anchor [WARNING]
app/Commands/Support/SubsCommandTrait.php:49 Missing ROOTPATH anchor [WARNING]
app/Commands/Support/SubsCommandTrait.php:53 Missing ROOTPATH anchor [WARNING]
app/Commands/Support/ArtifactHelper.php:108 Missing ROOTPATH anchor [WARNING]
app/Commands/Support/ArtifactHelper.php:113 Missing ROOTPATH anchor [WARNING]
app/Commands/Support/ArtifactHelper.php:120 Missing ROOTPATH anchor [WARNING]
app/Commands/Support/ArtifactHelper.php:139 Missing ROOTPATH anchor [WARNING]
app/Commands/Support/ArtifactHelper.php:156 Missing ROOTPATH anchor [WARNING]
app/Commands/Support/ArtifactHelper.php:187 Missing ROOTPATH anchor [WARNING]
app/Commands/Support/ArtifactHelper.php:208 Missing ROOTPATH anchor [WARNING]
app/Commands/Support/GitHubIssueHelper.php:73 Missing ROOTPATH anchor [WARNING]
app/Commands/Support/GitHubIssueHelper.php:79 Missing ROOTPATH anchor [WARNING]
app/Commands/Support/GitHubIssueHelper.php:90 Missing ROOTPATH anchor [WARNING]
app/Commands/NewsAudit.php:732 Missing ROOTPATH anchor [WARNING]
app/Commands/NewsAudit.php:792 Missing ROOTPATH anchor [WARNING]
app/Commands/Auth/Smoke.php:39 Missing ROOTPATH anchor [WARNING]
app/Commands/Auth/Smoke.php:41 Missing ROOTPATH anchor [WARNING]
app/Commands/Auth/SurfaceScan.php:48 Missing ROOTPATH anchor [WARNING]
app/Commands/Auth/SurfaceScan.php:50 Missing ROOTPATH anchor [WARNING]
app/Commands/Database/TableList.php:57 Missing ROOTPATH anchor [WARNING]
app/Commands/Database/TableList.php:60 Missing ROOTPATH anchor [WARNING]
app/Commands/Database/TableList.php:79 Missing ROOTPATH anchor [WARNING]
app/Commands/Logs/SummarizeAll.php:27 Missing ROOTPATH anchor [WARNING]
app/Commands/Logs/SummarizeAll.php:50 Missing ROOTPATH anchor [WARNING]
app/Commands/Logs/EnableFullLogging.php:23 Missing ROOTPATH anchor [WARNING]
app/Commands/App/APIAuditPro.php:239 Missing ROOTPATH anchor [WARNING]
app/Commands/App/APIAuditPro.php:261 Missing ROOTPATH anchor [WARNING]
app/Commands/App/ControllerAudit.php:42 Missing ROOTPATH anchor [WARNING]
app/Commands/App/ControllerAudit.php:43 Missing ROOTPATH anchor [WARNING]
app/Commands/App/ControllerAudit.php:49 Missing ROOTPATH anchor [WARNING]
app/Commands/App/ControllerAudit.php:456 Missing ROOTPATH anchor [WARNING]
app/Commands/App/ControllerAudit.php:468 Missing ROOTPATH anchor [WARNING]
app/Commands/CompatAudit.php:371 Missing ROOTPATH anchor [WARNING]
app/Commands/CompatAudit.php:557 Missing ROOTPATH anchor [WARNING]
app/Commands/CompatAudit.php:596 Missing ROOTPATH anchor [WARNING]
app/Commands/SolanaTransactionAudit.php:31 Missing ROOTPATH anchor [WARNING]
app/Commands/SolanaTransactionAudit.php:78 Missing ROOTPATH anchor [WARNING]
app/Commands/Security/GenerateCI4Key.php:48 Missing ROOTPATH anchor [WARNING]
app/Commands/API/ApiAudit.php:26 Missing ROOTPATH anchor [WARNING]
app/Commands/API/ApiAudit.php:51 Missing ROOTPATH anchor [WARNING]
app/Commands/API/ApiAudit.php:52 Path not allowlisted [ERROR]
app/Commands/API/ApiAudit.php:53 Path not allowlisted [ERROR]
app/Commands/API/ApiAudit.php:61 Path not allowlisted [ERROR]
app/Commands/API/ApiAudit.php:62 Path not allowlisted [ERROR]
app/Commands/API/ApiAudit.php:63 Path not allowlisted [ERROR]
app/Commands/API/ApiAudit.php:64 Path not allowlisted [ERROR]
app/Commands/API/ApiAudit.php:65 Path not allowlisted [ERROR]
app/Commands/API/ApiAudit.php:70 Path not allowlisted [ERROR]
app/Commands/API/ApiAudit.php:71 Path not allowlisted [ERROR]
app/Commands/API/ApiAudit.php:72 Path not allowlisted [ERROR]
app/Commands/API/ApiAudit.php:73 Path not allowlisted [ERROR]
app/Commands/API/ApiAudit.php:78 Path not allowlisted [ERROR]
app/Commands/API/ApiAudit.php:99 Path not allowlisted [ERROR]
app/Commands/API/ApiList.php:57 Missing ROOTPATH anchor [WARNING]
app/Commands/API/ApiList.php:58 Missing ROOTPATH anchor [WARNING]
app/Commands/API/ApiPermissions.php:19 Path not allowlisted [ERROR]
app/Commands/API/ApiPermissions.php:39 Path not allowlisted [ERROR]
app/Commands/API/ApiVersioningCheck.php:21 Path not allowlisted [ERROR]
app/Commands/API/ApiVersioningCheck.php:32 Path not allowlisted [ERROR]
app/Commands/Routes/Docs.php:30 Missing ROOTPATH anchor [WARNING]
app/Commands/Routes/Docs.php:87 Missing ROOTPATH anchor [WARNING]
app/Commands/Routes/Docs.php:92 Missing ROOTPATH anchor [WARNING]
app/Commands/Routes/Repair.php:32 Missing ROOTPATH anchor [WARNING]
app/Commands/Routes/Repair.php:72 Missing ROOTPATH anchor [WARNING]
app/Commands/Routes/Reconcile.php:30 Missing ROOTPATH anchor [WARNING]
app/Commands/Routes/Reconcile.php:51 Missing ROOTPATH anchor [WARNING]
app/Commands/Routes/Reconcile.php:52 Missing ROOTPATH anchor [WARNING]
app/Commands/SolanaPreviewBrowserRuntimeSmoke.php:373 Missing ROOTPATH anchor [WARNING]
app/Commands/SolanaPreviewBrowserRuntimeSmoke.php:376 Missing ROOTPATH anchor [WARNING]
app/Commands/Spark/InfraServerAudit.php:40 Missing ROOTPATH anchor [WARNING]
app/Commands/Spark/Doctor.php:295 Missing ROOTPATH anchor [WARNING]
app/Commands/Spark/Doctor.php:299 Missing ROOTPATH anchor [WARNING]
app/Commands/Spark/Fix.php:167 Missing ROOTPATH anchor [WARNING]
app/Commands/Spark/Fix.php:169 Missing ROOTPATH anchor [WARNING]
app/Commands/Spark/Fix.php:261 Missing ROOTPATH anchor [WARNING]
app/Commands/Spark/CommandGraph.php:64 Missing ROOTPATH anchor [WARNING]
app/Commands/Codex/ReviewPrOutbox.php:75 Missing ROOTPATH anchor [WARNING]
app/Commands/Codex/ReviewPrOutbox.php:76 Missing ROOTPATH anchor [WARNING]
app/Commands/Codex/ReviewPublish.php:54 Missing ROOTPATH anchor [WARNING]
app/Commands/Codex/ReviewPublish.php:56 Missing ROOTPATH anchor [WARNING]
app/Commands/Codex/ReviewPublish.php:59 Missing ROOTPATH anchor [WARNING]
app/Commands/Codex/ReviewPublish.php:189 Missing ROOTPATH anchor [WARNING]
app/Commands/Codex/Instructions/Summarize.php:35 Artifact written to writable/ [ERROR]
app/Commands/Codex/Instructions/DevOpsReview.php:25 Missing ROOTPATH anchor [WARNING]
app/Commands/Codex/Instructions/DevOpsReview.php:27 Missing ROOTPATH anchor [WARNING]
app/Commands/Codex/ContinueAudit.php:199 Missing ROOTPATH anchor [WARNING]
app/Commands/Codex/ContinueAudit.php:200 Missing ROOTPATH anchor [WARNING]
app/Commands/Codex/ContinueAudit.php:203 Missing ROOTPATH anchor [WARNING]
app/Commands/Codex/ContinueAudit.php:212 Missing ROOTPATH anchor [WARNING]
app/Commands/Codex/Review.php:36 Missing ROOTPATH anchor [WARNING]
app/Commands/Codex/Review.php:55 Missing ROOTPATH anchor [WARNING]
app/Commands/Codex/Review.php:56 Missing ROOTPATH anchor [WARNING]
app/Commands/Platform/ControlAnalyze.php:35 Missing ROOTPATH anchor [WARNING]
app/Commands/Platform/ControlAnalyze.php:36 Path not allowlisted [ERROR]
app/Commands/Platform/ControlDispatch.php:69 Missing ROOTPATH anchor [WARNING]
app/Commands/Platform/EdgeSnapshot.php:39 Missing ROOTPATH anchor [WARNING]
app/Commands/Platform/EdgeSnapshot.php:42 Missing ROOTPATH anchor [WARNING]
app/Commands/Platform/EdgeSnapshot.php:43 Missing ROOTPATH anchor [WARNING]
app/Commands/SolanaDigest.php:20 Missing ROOTPATH anchor [WARNING]
app/Commands/SolanaDigest.php:62 Missing ROOTPATH anchor [WARNING]
app/Commands/SolanaWalletSecretsAudit.php:238 Missing ROOTPATH anchor [WARNING]
app/Commands/SolanaWalletSecretsAudit.php:286 Missing ROOTPATH anchor [WARNING]
app/Commands/Research/DailyMarketReport.php:61 Missing ROOTPATH anchor [WARNING]
app/Commands/Research/FinancialIntelligenceSignals.php:79 Missing ROOTPATH anchor [WARNING]
app/Commands/Research/WeeklyMarketReport.php:48 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Ingest.php:270 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Ingest.php:349 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Ingest.php:358 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Ingest.php:382 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/MissingViewScan.php:41 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/MissingViewScan.php:42 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/MissingViewScan.php:44 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/MissingViewScan.php:57 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/ScanCells.php:76 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Unlock.php:39 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Doctor.php:80 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Doctor.php:81 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/HealthFull.php:17 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/HealthFull.php:33 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/CspAudit.php:196 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/AutoFixAnalyze.php:120 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/AutoFixAnalyze.php:121 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/AutoFixAnalyze.php:126 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/AutoFixAnalyze.php:145 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/SuggestRoutes.php:37 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/SuggestRoutes.php:38 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/SuggestRoutes.php:40 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/SuggestRoutes.php:46 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/PyOps.php:61 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/PyOps.php:67 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Audit.php:58 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Audit.php:60 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/SelfHeal.php:3 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/All.php:565 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/All.php:730 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/AiopsRepairs.php:71 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/AiopsRepairs.php:95 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/AiopsRepairs.php:120 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/AiopsRepairs.php:131 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/SyncPerfRoutes.php:48 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Observe/Map.php:39 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Observe/Patch.php:27 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Observe/Cost.php:63 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Observe/Snapshot.php:23 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Observe/Regression.php:27 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Observe/Regression.php:37 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Observe/Regression.php:75 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/DiffFormat.php:29 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Patch/Hallucination.php:25 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Patch/Hallucination.php:27 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Patch/Hallucination.php:32 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Patch/Hallucination.php:44 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Patch/Hallucination.php:54 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Routes/Scan.php:92 Artifact written to writable/ [ERROR]
app/Commands/AIOps/Routes/Scan.php:110 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Routes/Gate.php:87 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Routes/Gate.php:94 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Routes/Regress.php:27 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Routes/Regress.php:39 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Routes/Regress.php:79 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Routes/Regress.php:87 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Routes/Compare.php:76 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Routes/ScanAuth.php:79 Artifact written to writable/ [ERROR]
app/Commands/AIOps/API/SchemaValidate.php:26 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/API/SchemaValidate.php:65 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/API/SchemaValidate.php:73 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/DB/SlowScan.php:18 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/DB/SlowScan.php:22 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/DB/SlowScan.php:45 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Redis/Stats.php:32 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/PublicPages/Audit.php:64 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/PublicPages/Audit.php:94 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/PublicPages/Audit.php:97 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/PublicPages/Audit.php:107 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/PublicPages/Report.php:41 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/PublicPages/Report.php:44 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/PublicPages/Report.php:73 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/PublicPages/Run.php:131 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/PublicPages/Run.php:141 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/LogsErrors.php:240 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/LogsErrors.php:243 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/LogsErrors.php:293 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/LogsErrors.php:299 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Observe.php:47 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Backlog.php:134 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Backlog.php:185 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/CommandIndex.php:139 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/CommandIndex.php:143 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/CopilotValidate.php:290 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/CopilotValidate.php:294 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Worker.php:112 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Worker.php:113 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Worker.php:114 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Worker.php:121 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Worker.php:127 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Worker.php:133 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Worker.php:138 Missing ROOTPATH anchor [WARNING]
app/Commands/AIOps/Worker.php:193 Missing ROOTPATH anchor [WARNING]
app/Commands/Ollama/Docs/Sync.php:29 Path not allowlisted [ERROR]
app/Commands/Ollama/Docs/Sync.php:32 Path not allowlisted [ERROR]
app/Commands/Ollama/Logs/Export.php:27 Missing ROOTPATH anchor [WARNING]
app/Commands/Ollama/Logs/Export.php:58 Missing ROOTPATH anchor [WARNING]
app/Commands/Ollama/OllamaRun.php:183 Missing ROOTPATH anchor [WARNING]
app/Commands/Ollama/OllamaRun.php:242 Missing ROOTPATH anchor [WARNING]
app/Commands/Repo/ClassScan.php:72 Missing ROOTPATH anchor [WARNING]
app/Commands/Repo/ClassScan.php:99 Missing ROOTPATH anchor [WARNING]
app/Commands/Repo/DiffSplit.php:34 Missing ROOTPATH anchor [WARNING]
app/Commands/Repo/DiffSplit.php:53 Missing ROOTPATH anchor [WARNING]
app/Commands/Repo/ClassTrace.php:83 Missing ROOTPATH anchor [WARNING]
app/Commands/Repo/ClassTrace.php:137 Missing ROOTPATH anchor [WARNING]
app/Commands/Alerts/Audit.php:497 Missing ROOTPATH anchor [WARNING]
app/Commands/Alerts/Audit.php:566 Missing ROOTPATH anchor [WARNING]
app/Commands/Docs/AuditDocs.php:49 Path not allowlisted [ERROR]
app/Commands/Docs/InventoryDocs.php:41 Missing ROOTPATH anchor [WARNING]
app/Commands/Docs/Generate/DocsReadmeBuilder.php:37 Missing ROOTPATH anchor [WARNING]
app/Commands/Docs/Generate/ArchitectureMap.php:42 Path not allowlisted [ERROR]
app/Commands/Docs/Generate/MissingDocs.php:26 Missing ROOTPATH anchor [WARNING]
app/Commands/Docs/Generate/MissingDocs.php:48 Missing ROOTPATH anchor [WARNING]
app/Commands/Docs/Generate/FormInventory.php:60 Path not allowlisted [ERROR]
app/Commands/Docs/Generate/KnowledgeGraph.php:63 Path not allowlisted [ERROR]
app/Commands/Docs/Scan/OrphanRoutes.php:36 Path not allowlisted [ERROR]
app/Commands/Docs/Scan/OrphanViews.php:35 Path not allowlisted [ERROR]
app/Commands/Docs/Scan/UndocumentedControllers.php:34 Path not allowlisted [ERROR]
app/Commands/Docs/BuildHowItWorksNavigation.php:65 Missing ROOTPATH anchor [WARNING]
app/Commands/GapTrackerSync.php:247 Missing ROOTPATH anchor [WARNING]
app/Commands/GapTrackerSync.php:278 Missing ROOTPATH anchor [WARNING]
{
    "generated_at": "2026-06-04T00:23:57+00:00",
    "total_files": 468,
    "issues": [
        {
            "file": "app/Commands/SolanaHealthcheck.php",
            "line": 20,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($reportDir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/SolanaHealthcheck.php",
            "line": 49,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($reportPath, implode(PHP_EOL, $report));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $report));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $report));"
        },
        {
            "file": "app/Commands/Ops/BuildConsoleRegistry.php",
            "line": 59,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents(APPPATH . 'Config/Console.php', $output);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $output);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $output);"
        },
        {
            "file": "app/Commands/Ops/ProposePr.php",
            "line": 356,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($rootedDir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Ops/ProposePr.php",
            "line": 365,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($rootedDir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Ops/ProposePr.php",
            "line": 367,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "if (file_put_contents($rootedPath, $content) === false) {",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "if (file_put_contents(ROOTPATH . 'docs/_ops/autofix.json') {",
            "confidence": 0.8,
            "replacement_line": "if (file_put_contents(ROOTPATH . 'docs/_ops/autofix.json') {"
        },
        {
            "file": "app/Commands/Ops/Diff.php",
            "line": 58,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($baseDir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Ops/Diff.php",
            "line": 82,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($mdPath, $markdown);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $markdown);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $markdown);"
        },
        {
            "file": "app/Commands/Ops/Commands/Audit.php",
            "line": 34,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($targetDir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Ops/Commands/Lint.php",
            "line": 182,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($directory, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Ops/Commands/Lint.php",
            "line": 186,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT));"
        },
        {
            "file": "app/Commands/Ops/VPSSnapshot.php",
            "line": 21,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($outDir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Ops/VPSSnapshot.php",
            "line": 63,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "$ok = @file_put_contents($path, implode(\"\\n\", $data));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "$ok = @file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $data));",
            "confidence": 0.8,
            "replacement_line": "$ok = @file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $data));"
        },
        {
            "file": "app/Commands/Ops/NextSteps.php",
            "line": 281,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Ops/NextSteps.php",
            "line": 283,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($target, $markdown);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $markdown);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $markdown);"
        },
        {
            "file": "app/Commands/Ops/NextSteps.php",
            "line": 293,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Ops/NextSteps.php",
            "line": 304,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir(dirname($path), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Ops/NextSteps.php",
            "line": 305,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT));"
        },
        {
            "file": "app/Commands/Ops/CiPrepare.php",
            "line": 31,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($path, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Ops/CiPrepare.php",
            "line": 58,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir(dirname($path), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Ops/CiPrepare.php",
            "line": 59,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($path, json_encode($report, JSON_PRETTY_PRINT));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT));"
        },
        {
            "file": "app/Commands/Ops/FilesystemFix.php",
            "line": 68,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir(dirname($patchPath), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Ops/FilesystemFix.php",
            "line": 70,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($patchPath, $diff);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $diff);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $diff);"
        },
        {
            "file": "app/Commands/Master/Health/Routes.php",
            "line": 45,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($output, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/Master/KnowledgeGraphBuild.php",
            "line": 41,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outputFile, json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/Gtm/CronRouteSecurityValidation.php",
            "line": 195,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Gtm/CronRouteSecurityValidation.php",
            "line": 232,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($path, implode(PHP_EOL, $lines) . PHP_EOL);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines) . PHP_EOL);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines) . PHP_EOL);"
        },
        {
            "file": "app/Commands/Gtm/HealthSnapshot.php",
            "line": 97,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Gtm/HealthSnapshot.php",
            "line": 100,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outputPath, implode(PHP_EOL, $lines) . PHP_EOL);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines) . PHP_EOL);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines) . PHP_EOL);"
        },
        {
            "file": "app/Commands/Gtm/LaunchSmoke.php",
            "line": 37,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir(dirname($output), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Gtm/LaunchSmoke.php",
            "line": 55,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($output, implode(PHP_EOL, $lines) . PHP_EOL);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines) . PHP_EOL);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines) . PHP_EOL);"
        },
        {
            "file": "app/Commands/Gtm/LaunchAudit.php",
            "line": 130,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir(dirname($outputPath), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Gtm/LaunchAudit.php",
            "line": 133,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outputPath, implode(PHP_EOL, $lines) . PHP_EOL);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines) . PHP_EOL);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines) . PHP_EOL);"
        },
        {
            "file": "app/Commands/CreateTbiProjectCoinDrafts.php",
            "line": 31,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($reportDir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/CreateTbiProjectCoinDrafts.php",
            "line": 99,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($reportPath, implode(PHP_EOL, $report) . PHP_EOL);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $report) . PHP_EOL);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $report) . PHP_EOL);"
        },
        {
            "file": "app/Commands/Support/SubsCommandTrait.php",
            "line": 49,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($dir, 0775, true);",
            "resolved_path": "docs/_support/autofix.json",
            "subsystem": "support",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_support/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_support/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Support/SubsCommandTrait.php",
            "line": 53,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($path, $content . \"\\n\");",
            "resolved_path": "docs/_support/autofix.json",
            "subsystem": "support",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_support/autofix.json', $content . \"\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_support/autofix.json', $content . \"\\n\");"
        },
        {
            "file": "app/Commands/Support/ArtifactHelper.php",
            "line": 108,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "if (file_put_contents($artifactDir . '/summary.md', $summary) === false) {",
            "resolved_path": "docs/_support/autofix.json",
            "subsystem": "support",
            "suggested_fix": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {",
            "confidence": 0.8,
            "replacement_line": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {"
        },
        {
            "file": "app/Commands/Support/ArtifactHelper.php",
            "line": 113,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "if (file_put_contents($artifactDir . '/report.json', $reportJson) === false) {",
            "resolved_path": "docs/_support/autofix.json",
            "subsystem": "support",
            "suggested_fix": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {",
            "confidence": 0.8,
            "replacement_line": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {"
        },
        {
            "file": "app/Commands/Support/ArtifactHelper.php",
            "line": 120,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "if (file_put_contents($artifactDir . '/meta.json', $metaJson) === false) {",
            "resolved_path": "docs/_support/autofix.json",
            "subsystem": "support",
            "suggested_fix": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {",
            "confidence": 0.8,
            "replacement_line": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {"
        },
        {
            "file": "app/Commands/Support/ArtifactHelper.php",
            "line": 139,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "if (file_put_contents($target, $body . PHP_EOL) === false) {",
            "resolved_path": "docs/_support/autofix.json",
            "subsystem": "support",
            "suggested_fix": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {",
            "confidence": 0.8,
            "replacement_line": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {"
        },
        {
            "file": "app/Commands/Support/ArtifactHelper.php",
            "line": 156,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "return mkdir($artifactDir, 0755, true);",
            "resolved_path": "docs/_support/autofix.json",
            "subsystem": "support",
            "suggested_fix": "return mkdir(ROOTPATH . 'docs/_support/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "return mkdir(ROOTPATH . 'docs/_support/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Support/ArtifactHelper.php",
            "line": 187,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "if (file_put_contents($resolved, $contents) === false) {",
            "resolved_path": "docs/_support/autofix.json",
            "subsystem": "support",
            "suggested_fix": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {",
            "confidence": 0.8,
            "replacement_line": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {"
        },
        {
            "file": "app/Commands/Support/ArtifactHelper.php",
            "line": 208,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "if (file_put_contents($resolved, $contents, FILE_APPEND) === false) {",
            "resolved_path": "docs/_support/autofix.json",
            "subsystem": "support",
            "suggested_fix": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {",
            "confidence": 0.8,
            "replacement_line": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {"
        },
        {
            "file": "app/Commands/Support/GitHubIssueHelper.php",
            "line": 73,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir(dirname($path), 0775, true);",
            "resolved_path": "docs/_support/autofix.json",
            "subsystem": "support",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_support/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_support/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Support/GitHubIssueHelper.php",
            "line": 79,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir(dirname($path), 0775, true);",
            "resolved_path": "docs/_support/autofix.json",
            "subsystem": "support",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_support/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_support/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Support/GitHubIssueHelper.php",
            "line": 90,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($path, $payload . PHP_EOL);",
            "resolved_path": "docs/_support/autofix.json",
            "subsystem": "support",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_support/autofix.json', $payload . PHP_EOL);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_support/autofix.json', $payload . PHP_EOL);"
        },
        {
            "file": "app/Commands/NewsAudit.php",
            "line": 732,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($docPath, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/NewsAudit.php",
            "line": 792,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($docPath . DIRECTORY_SEPARATOR . 'news_audit_last_run.md', implode(PHP_EOL, $lines));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines));"
        },
        {
            "file": "app/Commands/Auth/Smoke.php",
            "line": 39,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir(dirname($outPath), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Auth/Smoke.php",
            "line": 41,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outPath, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/Auth/SurfaceScan.php",
            "line": 48,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir(dirname($outPath), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Auth/SurfaceScan.php",
            "line": 50,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outPath, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/Database/TableList.php",
            "line": 57,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Database/TableList.php",
            "line": 60,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($dir . '/db-table-list-latest.json', json_encode($result, JSON_PRETTY_PRINT));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($result, JSON_PRETTY_PRINT));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($result, JSON_PRETTY_PRINT));"
        },
        {
            "file": "app/Commands/Database/TableList.php",
            "line": 79,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($dir . '/db-table-list-latest.md', $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/Logs/SummarizeAll.php",
            "line": 27,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($outDir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Logs/SummarizeAll.php",
            "line": 50,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($file, $this->renderSubsystemMarkdown($summary));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $this->renderSubsystemMarkdown($summary));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $this->renderSubsystemMarkdown($summary));"
        },
        {
            "file": "app/Commands/Logs/EnableFullLogging.php",
            "line": 23,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($configPath, $contents);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $contents);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $contents);"
        },
        {
            "file": "app/Commands/App/APIAuditPro.php",
            "line": 239,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "if (!is_dir($dir)) mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "if (!is_dir($dir)) mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "if (!is_dir($dir)) mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/App/APIAuditPro.php",
            "line": 261,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($file, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/App/ControllerAudit.php",
            "line": 42,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($latestPath, $json);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $json);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $json);"
        },
        {
            "file": "app/Commands/App/ControllerAudit.php",
            "line": 43,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($snapshotPath, $json);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $json);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $json);"
        },
        {
            "file": "app/Commands/App/ControllerAudit.php",
            "line": 49,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($mdPath, $this->renderRegressionMarkdown($diff, $snapshotPath));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $this->renderRegressionMarkdown($diff, $snapshotPath));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $this->renderRegressionMarkdown($diff, $snapshotPath));"
        },
        {
            "file": "app/Commands/App/ControllerAudit.php",
            "line": 456,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "$ok = file_put_contents($filePath, $new) !== false;",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "$ok = file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $new) !== false;",
            "confidence": 0.8,
            "replacement_line": "$ok = file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $new) !== false;"
        },
        {
            "file": "app/Commands/App/ControllerAudit.php",
            "line": 468,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/CompatAudit.php",
            "line": 371,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($filePath, $modified);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $modified);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $modified);"
        },
        {
            "file": "app/Commands/CompatAudit.php",
            "line": 557,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($path, (string) json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', (string) json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', (string) json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/CompatAudit.php",
            "line": 596,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($directory, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/SolanaTransactionAudit.php",
            "line": 31,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($reportDir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/SolanaTransactionAudit.php",
            "line": 78,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($reportPath, implode(PHP_EOL, $report));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $report));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $report));"
        },
        {
            "file": "app/Commands/Security/GenerateCI4Key.php",
            "line": 48,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($env, $contents);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $contents);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $contents);"
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 26,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 51,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($dir . '/report.md', $body);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $body);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $body);"
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 52,
            "call": "mkdir",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "@mkdir(ROOTPATH . 'docs/APIs/audit', 0775, true);",
            "resolved_path": "docs/APIs/audit",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/APIs/audit', 0775, true);",
            "confidence": 0.95,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/APIs/audit', 0775, true);"
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 53,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/APIs/audit/latest.md', $body);",
            "resolved_path": "docs/APIs/audit/latest.md",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/APIs/audit/latest.md', $body);",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/APIs/audit/latest.md', $body);"
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 61,
            "call": "mkdir",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "@mkdir(ROOTPATH . 'docs/APIs', 0775, true);",
            "resolved_path": "docs/APIs",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/APIs', 0775, true);",
            "confidence": 0.95,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/APIs', 0775, true);"
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 62,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_routes.md', $this->renderRoutesInventory($scan));",
            "resolved_path": "docs/APIs/_inventory_routes.md",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_routes.md', $this->renderRoutesInventory($scan));",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_routes.md', $this->renderRoutesInventory($scan));"
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 63,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_controllers.md', $this->renderControllersInventory($scan));",
            "resolved_path": "docs/APIs/_inventory_controllers.md",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_controllers.md', $this->renderControllersInventory($scan));",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_controllers.md', $this->renderControllersInventory($scan));"
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 64,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_filters.md', $this->renderFiltersInventory($scan));",
            "resolved_path": "docs/APIs/_inventory_filters.md",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_filters.md', $this->renderFiltersInventory($scan));",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_filters.md', $this->renderFiltersInventory($scan));"
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 65,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_rate_limits.md', $this->renderRateInventory($scan));",
            "resolved_path": "docs/APIs/_inventory_rate_limits.md",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_rate_limits.md', $this->renderRateInventory($scan));",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_rate_limits.md', $this->renderRateInventory($scan));"
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 70,
            "call": "mkdir",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "@mkdir(ROOTPATH . 'docs/security', 0775, true);",
            "resolved_path": "docs/security",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/security', 0775, true);",
            "confidence": 0.95,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/security', 0775, true);"
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 71,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/security/filter-coverage.md', $this->renderFilterCoverage($scan));",
            "resolved_path": "docs/security/filter-coverage.md",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/security/filter-coverage.md', $this->renderFilterCoverage($scan));",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/security/filter-coverage.md', $this->renderFilterCoverage($scan));"
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 72,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/APIs/rate-limit-coverage.md', $this->renderRateCoverage($scan));",
            "resolved_path": "docs/APIs/rate-limit-coverage.md",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/APIs/rate-limit-coverage.md', $this->renderRateCoverage($scan));",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/APIs/rate-limit-coverage.md', $this->renderRateCoverage($scan));"
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 73,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/APIs/deprecations.md', $this->renderDeprecations($scan));",
            "resolved_path": "docs/APIs/deprecations.md",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/APIs/deprecations.md', $this->renderDeprecations($scan));",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/APIs/deprecations.md', $this->renderDeprecations($scan));"
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 78,
            "call": "mkdir",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "@mkdir(ROOTPATH . 'docs/APIs/openapi', 0775, true);",
            "resolved_path": "docs/APIs/openapi",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/APIs/openapi', 0775, true);",
            "confidence": 0.95,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/APIs/openapi', 0775, true);"
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 99,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/APIs/openapi/openapi.v1.json', json_encode($spec, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/APIs/openapi/openapi.v1.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/APIs/openapi/openapi.v1.json', json_encode($spec, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/APIs/openapi/openapi.v1.json', json_encode($spec, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/API/ApiList.php",
            "line": 57,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($target, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/API/ApiList.php",
            "line": 58,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($target . '/latest.md', implode(PHP_EOL, $lines) . PHP_EOL);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines) . PHP_EOL);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines) . PHP_EOL);"
        },
        {
            "file": "app/Commands/API/ApiPermissions.php",
            "line": 19,
            "call": "mkdir",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "@mkdir(ROOTPATH . 'docs/security', 0775, true);",
            "resolved_path": "docs/security",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/security', 0775, true);",
            "confidence": 0.95,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/security', 0775, true);"
        },
        {
            "file": "app/Commands/API/ApiPermissions.php",
            "line": 39,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/security/endpoint-permission-matrix.md', implode(PHP_EOL, $md) . PHP_EOL);",
            "resolved_path": "docs/security/endpoint-permission-matrix.md",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/security/endpoint-permission-matrix.md', implode(PHP_EOL, $md) . PHP_EOL);",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/security/endpoint-permission-matrix.md', implode(PHP_EOL, $md) . PHP_EOL);"
        },
        {
            "file": "app/Commands/API/ApiVersioningCheck.php",
            "line": 21,
            "call": "mkdir",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "@mkdir(ROOTPATH . 'docs/APIs', 0775, true);",
            "resolved_path": "docs/APIs",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/APIs', 0775, true);",
            "confidence": 0.95,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/APIs', 0775, true);"
        },
        {
            "file": "app/Commands/API/ApiVersioningCheck.php",
            "line": 32,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/APIs/deprecations.md', implode(PHP_EOL, $lines) . PHP_EOL);",
            "resolved_path": "docs/APIs/deprecations.md",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/APIs/deprecations.md', implode(PHP_EOL, $lines) . PHP_EOL);",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/APIs/deprecations.md', implode(PHP_EOL, $lines) . PHP_EOL);"
        },
        {
            "file": "app/Commands/Routes/Docs.php",
            "line": 30,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Routes/Docs.php",
            "line": 87,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "if (@file_put_contents($fullOut, implode(\"\\n\", $md) . \"\\n\") === false) {",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "if (@file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\") === false) {",
            "confidence": 0.8,
            "replacement_line": "if (@file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\") === false) {"
        },
        {
            "file": "app/Commands/Routes/Docs.php",
            "line": 92,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "if (@file_put_contents($jsonOut, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . \"\\n\") === false) {",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "if (@file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . \"\\n\") === false) {",
            "confidence": 0.8,
            "replacement_line": "if (@file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . \"\\n\") === false) {"
        },
        {
            "file": "app/Commands/Routes/Repair.php",
            "line": 32,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Routes/Repair.php",
            "line": 72,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($reportPath, implode(\"\\n\", $md) . \"\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");"
        },
        {
            "file": "app/Commands/Routes/Reconcile.php",
            "line": 30,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Routes/Reconcile.php",
            "line": 51,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($fullOut, implode(\"\\n\", $md) . \"\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");"
        },
        {
            "file": "app/Commands/Routes/Reconcile.php",
            "line": 52,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($jsonOut, json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . \"\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . \"\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . \"\\n\");"
        },
        {
            "file": "app/Commands/SolanaPreviewBrowserRuntimeSmoke.php",
            "line": 373,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir(dirname($scriptPath), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/SolanaPreviewBrowserRuntimeSmoke.php",
            "line": 376,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($scriptPath, $script);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $script);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $script);"
        },
        {
            "file": "app/Commands/Spark/InfraServerAudit.php",
            "line": 40,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outputPath, json_encode($results, JSON_PRETTY_PRINT));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($results, JSON_PRETTY_PRINT));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($results, JSON_PRETTY_PRINT));"
        },
        {
            "file": "app/Commands/Spark/Doctor.php",
            "line": 295,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($directory, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Spark/Doctor.php",
            "line": 299,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/Spark/Fix.php",
            "line": 167,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir(dirname($path), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Spark/Fix.php",
            "line": 169,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "return file_put_contents($path, $updated) !== false;",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "return file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $updated) !== false;",
            "confidence": 0.8,
            "replacement_line": "return file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $updated) !== false;"
        },
        {
            "file": "app/Commands/Spark/Fix.php",
            "line": 261,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "$ok = @mkdir(dirname($path), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "$ok = @mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "$ok = @mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Spark/CommandGraph.php",
            "line": 64,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir(dirname($target), 0755, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Codex/ReviewPrOutbox.php",
            "line": 75,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($dir, 0775, true);",
            "resolved_path": "docs/_codex/autofix.json",
            "subsystem": "codex",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Codex/ReviewPrOutbox.php",
            "line": 76,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($dir . '/CODEX_REVIEW.md', $review);",
            "resolved_path": "docs/_codex/autofix.json",
            "subsystem": "codex",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $review);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $review);"
        },
        {
            "file": "app/Commands/Codex/ReviewPublish.php",
            "line": 54,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($dir, 0775, true);",
            "resolved_path": "docs/_codex/autofix.json",
            "subsystem": "codex",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Codex/ReviewPublish.php",
            "line": 56,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($artifactPath, json_encode($payload, JSON_PRETTY_PRINT) . PHP_EOL);",
            "resolved_path": "docs/_codex/autofix.json",
            "subsystem": "codex",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', json_encode($payload, JSON_PRETTY_PRINT) . PHP_EOL);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', json_encode($payload, JSON_PRETTY_PRINT) . PHP_EOL);"
        },
        {
            "file": "app/Commands/Codex/ReviewPublish.php",
            "line": 59,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($dashboardPath, $this->renderDashboard($filesystem, $commands, $timestamp));",
            "resolved_path": "docs/_codex/autofix.json",
            "subsystem": "codex",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $this->renderDashboard($filesystem, $commands, $timestamp));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $this->renderDashboard($filesystem, $commands, $timestamp));"
        },
        {
            "file": "app/Commands/Codex/ReviewPublish.php",
            "line": 189,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0775, true);",
            "resolved_path": "docs/_codex/autofix.json",
            "subsystem": "codex",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Codex/Instructions/Summarize.php",
            "line": 35,
            "call": "file_put_contents",
            "reason": "Artifact written to writable/",
            "severity": "error",
            "snippet": "file_put_contents(WRITEPATH . 'audit/instruction_template.txt', $template);",
            "resolved_path": "docs/_codex/autofix.json",
            "subsystem": "codex",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $template);",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $template);"
        },
        {
            "file": "app/Commands/Codex/Instructions/DevOpsReview.php",
            "line": 25,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@is_dir(dirname($outPath)) || @mkdir(dirname($outPath), 0775, true);",
            "resolved_path": "docs/_codex/autofix.json",
            "subsystem": "codex",
            "suggested_fix": "@is_dir(dirname($outPath)) || @mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@is_dir(dirname($outPath)) || @mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Codex/Instructions/DevOpsReview.php",
            "line": 27,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outPath, $prompt);",
            "resolved_path": "docs/_codex/autofix.json",
            "subsystem": "codex",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $prompt);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $prompt);"
        },
        {
            "file": "app/Commands/Codex/ContinueAudit.php",
            "line": 199,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@is_dir(dirname($mdPath)) || @mkdir(dirname($mdPath), 0775, true);",
            "resolved_path": "docs/_codex/autofix.json",
            "subsystem": "codex",
            "suggested_fix": "@is_dir(dirname($mdPath)) || @mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@is_dir(dirname($mdPath)) || @mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Codex/ContinueAudit.php",
            "line": 200,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@is_dir(dirname($jsonlPath)) || @mkdir(dirname($jsonlPath), 0775, true);",
            "resolved_path": "docs/_codex/autofix.json",
            "subsystem": "codex",
            "suggested_fix": "@is_dir(dirname($jsonlPath)) || @mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@is_dir(dirname($jsonlPath)) || @mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Codex/ContinueAudit.php",
            "line": 203,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($mdPath, $md, FILE_APPEND | LOCK_EX);",
            "resolved_path": "docs/_codex/autofix.json",
            "subsystem": "codex",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $md, FILE_APPEND | LOCK_EX);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $md, FILE_APPEND | LOCK_EX);"
        },
        {
            "file": "app/Commands/Codex/ContinueAudit.php",
            "line": 212,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($jsonlPath, json_encode($row) . \"\\n\", FILE_APPEND | LOCK_EX);",
            "resolved_path": "docs/_codex/autofix.json",
            "subsystem": "codex",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', json_encode($row) . \"\\n\", FILE_APPEND | LOCK_EX);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', json_encode($row) . \"\\n\", FILE_APPEND | LOCK_EX);"
        },
        {
            "file": "app/Commands/Codex/Review.php",
            "line": 36,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "if (! is_dir($outputDir) && ! mkdir($outputDir, 0775, true) && ! is_dir($outputDir)) {",
            "resolved_path": "docs/_codex/autofix.json",
            "subsystem": "codex",
            "suggested_fix": "if (! is_dir($outputDir) && ! mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true) {",
            "confidence": 0.8,
            "replacement_line": "if (! is_dir($outputDir) && ! mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true) {"
        },
        {
            "file": "app/Commands/Codex/Review.php",
            "line": 55,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($reviewPath, $this->renderReview($today, $status, $recentCommits, $changedFiles, $docsDrift));",
            "resolved_path": "docs/_codex/autofix.json",
            "subsystem": "codex",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $this->renderReview($today, $status, $recentCommits, $changedFiles, $docsDrift));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $this->renderReview($today, $status, $recentCommits, $changedFiles, $docsDrift));"
        },
        {
            "file": "app/Commands/Codex/Review.php",
            "line": 56,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($promptPath, $this->renderPromptPayload($today, $status, $recentCommits, $changedFiles, $docsDrift));",
            "resolved_path": "docs/_codex/autofix.json",
            "subsystem": "codex",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $this->renderPromptPayload($today, $status, $recentCommits, $changedFiles, $docsDrift));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $this->renderPromptPayload($today, $status, $recentCommits, $changedFiles, $docsDrift));"
        },
        {
            "file": "app/Commands/Platform/ControlAnalyze.php",
            "line": 35,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($reportPath, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);"
        },
        {
            "file": "app/Commands/Platform/ControlAnalyze.php",
            "line": 36,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/_platform/control_plane_report.md', \"# Control Plane Report\\n\\n```json\\n\" . json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . \"\\n```\\n\");",
            "resolved_path": "docs/_platform/control_plane_report.md",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_platform/control_plane_report.md', \"# Control Plane Report\\n\\n```json\\n\" . json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . \"\\n```\\n\");",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_platform/control_plane_report.md', \"# Control Plane Report\\n\\n```json\\n\" . json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . \"\\n```\\n\");"
        },
        {
            "file": "app/Commands/Platform/ControlDispatch.php",
            "line": 69,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($reportPath, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);"
        },
        {
            "file": "app/Commands/Platform/EdgeSnapshot.php",
            "line": 39,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($base, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Platform/EdgeSnapshot.php",
            "line": 42,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($base . '/edge_status.json', json_encode($status, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($status, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($status, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);"
        },
        {
            "file": "app/Commands/Platform/EdgeSnapshot.php",
            "line": 43,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($base . '/edge_metrics.json', json_encode($metrics, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($metrics, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($metrics, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);"
        },
        {
            "file": "app/Commands/SolanaDigest.php",
            "line": 20,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($reportDir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/SolanaDigest.php",
            "line": 62,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($reportPath, implode(PHP_EOL, $report) . PHP_EOL);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $report) . PHP_EOL);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $report) . PHP_EOL);"
        },
        {
            "file": "app/Commands/SolanaWalletSecretsAudit.php",
            "line": 238,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/SolanaWalletSecretsAudit.php",
            "line": 286,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($path, implode(\"\\n\", $lines));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $lines));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $lines));"
        },
        {
            "file": "app/Commands/Research/DailyMarketReport.php",
            "line": 61,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0755, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Research/FinancialIntelligenceSignals.php",
            "line": 79,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($file, json_encode($signals, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($signals, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($signals, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/Research/WeeklyMarketReport.php",
            "line": 48,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0755, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/Ingest.php",
            "line": 270,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/Ingest.php",
            "line": 349,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($fullPath, implode(\"\\n\", $lines) . \"\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $lines) . \"\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $lines) . \"\\n\");"
        },
        {
            "file": "app/Commands/AIOps/Ingest.php",
            "line": 358,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/Ingest.php",
            "line": 382,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($path, $content . \"\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $content . \"\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $content . \"\\n\");"
        },
        {
            "file": "app/Commands/AIOps/MissingViewScan.php",
            "line": 41,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir(dirname($jsonPath), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/MissingViewScan.php",
            "line": 42,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir(dirname($mdPath), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/MissingViewScan.php",
            "line": 44,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($jsonPath, json_encode($issues, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($issues, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($issues, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);"
        },
        {
            "file": "app/Commands/AIOps/MissingViewScan.php",
            "line": 57,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($mdPath, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/ScanCells.php",
            "line": 76,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($runDir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/Unlock.php",
            "line": 39,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($unlockDir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/Doctor.php",
            "line": 80,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir(dirname($reportPath), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/Doctor.php",
            "line": 81,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($reportPath, $report);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $report);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $report);"
        },
        {
            "file": "app/Commands/AIOps/HealthFull.php",
            "line": 17,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir(dirname($report), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/HealthFull.php",
            "line": 33,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($report, \"# Full Health Report\\n\\n\" . implode(\"\\n\\n---\\n\\n\", $sections));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Full Health Report\\n\\n\" . implode(\"\\n\\n---\\n\\n\", $sections));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Full Health Report\\n\\n\" . implode(\"\\n\\n---\\n\\n\", $sections));"
        },
        {
            "file": "app/Commands/AIOps/CspAudit.php",
            "line": 196,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/AutoFixAnalyze.php",
            "line": 120,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir(dirname($path), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/AutoFixAnalyze.php",
            "line": 121,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);"
        },
        {
            "file": "app/Commands/AIOps/AutoFixAnalyze.php",
            "line": 126,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir(dirname($path), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/AutoFixAnalyze.php",
            "line": 145,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($path, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/SuggestRoutes.php",
            "line": 37,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir(dirname($jsonPath), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/SuggestRoutes.php",
            "line": 38,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir(dirname($mdPath), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/SuggestRoutes.php",
            "line": 40,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($jsonPath, json_encode($suggestions, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($suggestions, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($suggestions, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);"
        },
        {
            "file": "app/Commands/AIOps/SuggestRoutes.php",
            "line": 46,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($mdPath, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/PyOps.php",
            "line": 61,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "if (!is_dir($runDir) && !mkdir($runDir, 0755, true) && !is_dir($runDir)) {",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "if (!is_dir($runDir) && !mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true) {",
            "confidence": 0.8,
            "replacement_line": "if (!is_dir($runDir) && !mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true) {"
        },
        {
            "file": "app/Commands/AIOps/PyOps.php",
            "line": 67,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($requestFile, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/AIOps/Audit.php",
            "line": 58,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/Audit.php",
            "line": 60,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($mdAbsPath, $this->buildOrchestrationMarkdown($orchestration));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $this->buildOrchestrationMarkdown($orchestration));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $this->buildOrchestrationMarkdown($orchestration));"
        },
        {
            "file": "app/Commands/AIOps/SelfHeal.php",
            "line": 3,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "class SelfHeal extends SafeBaseCommand { use SubsCommandTrait; protected $group = 'AIOps - Repair'; protected $name='aiops:self-heal'; protected $description='Run one-pass self-heal'; protected $options=['--attempts'=>'max 3','--json'=>'JSON']; public function run(array $params){$this->parseParams($params);$json=$this->optBool('json');$attempts=max(1,min(3,$this->optInt('attempts', 1)));$lock = ROOTPATH . 'aiops/runtime/selfheal.lock'; if(is_file($lock) && (time()-filemtime($lock))<600){$out=['status'=>'locked','message'=>'self-heal already running'];$this->emit($out,$json);return EXIT_SUCCESS;} file_put_contents($lock,(string)getmypid()); try {$runs=[]; for($i=1;$i<=$attempts;$i++){ $audit=command('aiops:audit --json=1'); $repair=command('aiops:repair --json=1'); $status=command('aiops:status --json=1'); $runs[]=['cycle'=>$i,'audit'=>$audit,'repair'=>$repair,'status'=>$status]; } $md=\"# Self Heal \".date('c').\"\\n\\nAttempts: {$attempts}\\n\"; $path=$this->writeDoc('nightly','self-heal-'.date('Y-m-d--Hi').'.md',$md); $out=['status'=>'ok','attempts'=>$attempts,'report'=>$path]; } finally {@unlink($lock);} $this->emit($out,$json); return EXIT_SUCCESS; }}",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "class SelfHeal extends SafeBaseCommand { use SubsCommandTrait; protected $group = 'AIOps - Repair'; protected $name='aiops:self-heal'; protected $description='Run one-pass self-heal'; protected $options=['--attempts'=>'max 3','--json'=>'JSON']; public function run(array $params){$this->parseParams($params);$json=$this->optBool('json');$attempts=max(1,min(3,$this->optInt('attempts', 1)));ROOTPATH . 'docs/_ops/autofix.json' = ROOTPATH . 'aiops/runtime/selfheal.lock'; if(is_file(ROOTPATH . 'docs/_ops/autofix.json') && (time()-filemtime(ROOTPATH . 'docs/_ops/autofix.json'))<600){$out=['status'=>'locked','message'=>'self-heal already running'];$this->emit($out,$json);return EXIT_SUCCESS;} file_put_contents(ROOTPATH . 'docs/_ops/autofix.json',(string)getmypid()); try {$runs=[]; for($i=1;$i<=$attempts;$i++){ $audit=command('aiops:audit --json=1'); $repair=command('aiops:repair --json=1'); $status=command('aiops:status --json=1'); $runs[]=['cycle'=>$i,'audit'=>$audit,'repair'=>$repair,'status'=>$status]; } $md=\"# Self Heal \".date('c').\"\\n\\nAttempts: {$attempts}\\n\"; $path=$this->writeDoc('nightly','self-heal-'.date('Y-m-d--Hi').'.md',$md); $out=['status'=>'ok','attempts'=>$attempts,'report'=>$path]; } finally {@unlink(ROOTPATH . 'docs/_ops/autofix.json');} $this->emit($out,$json); return EXIT_SUCCESS; }}",
            "confidence": 0.8,
            "replacement_line": "class SelfHeal extends SafeBaseCommand { use SubsCommandTrait; protected $group = 'AIOps - Repair'; protected $name='aiops:self-heal'; protected $description='Run one-pass self-heal'; protected $options=['--attempts'=>'max 3','--json'=>'JSON']; public function run(array $params){$this->parseParams($params);$json=$this->optBool('json');$attempts=max(1,min(3,$this->optInt('attempts', 1)));ROOTPATH . 'docs/_ops/autofix.json' = ROOTPATH . 'aiops/runtime/selfheal.lock'; if(is_file(ROOTPATH . 'docs/_ops/autofix.json') && (time()-filemtime(ROOTPATH . 'docs/_ops/autofix.json'))<600){$out=['status'=>'locked','message'=>'self-heal already running'];$this->emit($out,$json);return EXIT_SUCCESS;} file_put_contents(ROOTPATH . 'docs/_ops/autofix.json',(string)getmypid()); try {$runs=[]; for($i=1;$i<=$attempts;$i++){ $audit=command('aiops:audit --json=1'); $repair=command('aiops:repair --json=1'); $status=command('aiops:status --json=1'); $runs[]=['cycle'=>$i,'audit'=>$audit,'repair'=>$repair,'status'=>$status]; } $md=\"# Self Heal \".date('c').\"\\n\\nAttempts: {$attempts}\\n\"; $path=$this->writeDoc('nightly','self-heal-'.date('Y-m-d--Hi').'.md',$md); $out=['status'=>'ok','attempts'=>$attempts,'report'=>$path]; } finally {@unlink(ROOTPATH . 'docs/_ops/autofix.json');} $this->emit($out,$json); return EXIT_SUCCESS; }}"
        },
        {
            "file": "app/Commands/AIOps/All.php",
            "line": 565,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($reportDir . '_aiops_all.md', $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/All.php",
            "line": 730,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($directory, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/AiopsRepairs.php",
            "line": 71,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($dir . '_repair_queue.md', implode(\"\\n\", $md) . \"\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");"
        },
        {
            "file": "app/Commands/AIOps/AiopsRepairs.php",
            "line": 95,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($dir . '_patch_plan.md', implode(\"\\n\", $md) . \"\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");"
        },
        {
            "file": "app/Commands/AIOps/AiopsRepairs.php",
            "line": 120,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($dir . '_execution_log.md', implode(\"\\n\", $log) . \"\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $log) . \"\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $log) . \"\\n\");"
        },
        {
            "file": "app/Commands/AIOps/AiopsRepairs.php",
            "line": 131,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($dir . '_final_report.md', implode(\"\\n\", $final) . \"\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $final) . \"\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $final) . \"\\n\");"
        },
        {
            "file": "app/Commands/AIOps/SyncPerfRoutes.php",
            "line": 48,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($perfFile, implode(\"\\n\", $cleaned));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $cleaned));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $cleaned));"
        },
        {
            "file": "app/Commands/AIOps/Observe/Map.php",
            "line": 39,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($statePath, json_encode($data, JSON_PRETTY_PRINT));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($data, JSON_PRETTY_PRINT));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($data, JSON_PRETTY_PRINT));"
        },
        {
            "file": "app/Commands/AIOps/Observe/Patch.php",
            "line": 27,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($patchFile, $content);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $content);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $content);"
        },
        {
            "file": "app/Commands/AIOps/Observe/Cost.php",
            "line": 63,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outPath, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/Observe/Snapshot.php",
            "line": 23,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@is_dir($dir) || @mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@is_dir($dir) || @mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@is_dir($dir) || @mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/Observe/Regression.php",
            "line": 27,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($reportPath, \"# Regression Report\\n\\nNo history found.\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Regression Report\\n\\nNo history found.\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Regression Report\\n\\nNo history found.\\n\");"
        },
        {
            "file": "app/Commands/AIOps/Observe/Regression.php",
            "line": 37,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($reportPath, \"# Regression Report\\n\\nNo previous snapshot.\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Regression Report\\n\\nNo previous snapshot.\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Regression Report\\n\\nNo previous snapshot.\\n\");"
        },
        {
            "file": "app/Commands/AIOps/Observe/Regression.php",
            "line": 75,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($reportPath, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/DiffFormat.php",
            "line": 29,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outPath, $diff);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $diff);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $diff);"
        },
        {
            "file": "app/Commands/AIOps/Patch/Hallucination.php",
            "line": 25,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@is_dir(dirname($outJson)) || @mkdir(dirname($outJson), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@is_dir(dirname($outJson)) || @mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@is_dir(dirname($outJson)) || @mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/Patch/Hallucination.php",
            "line": 27,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outJson, json_encode($result, JSON_PRETTY_PRINT));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($result, JSON_PRETTY_PRINT));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($result, JSON_PRETTY_PRINT));"
        },
        {
            "file": "app/Commands/AIOps/Patch/Hallucination.php",
            "line": 32,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outMd, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/Patch/Hallucination.php",
            "line": 44,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outMd, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/Patch/Hallucination.php",
            "line": 54,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outMd, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/Routes/Scan.php",
            "line": 92,
            "call": "mkdir",
            "reason": "Artifact written to writable/",
            "severity": "error",
            "snippet": "@mkdir(WRITEPATH . 'audit', 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.95,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/Routes/Scan.php",
            "line": 110,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($histDir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/Routes/Gate.php",
            "line": 87,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outPath, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/Routes/Gate.php",
            "line": 94,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outPath, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/Routes/Regress.php",
            "line": 27,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($report, \"# Routes Regression Report\\n\\nNo history.\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Routes Regression Report\\n\\nNo history.\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Routes Regression Report\\n\\nNo history.\\n\");"
        },
        {
            "file": "app/Commands/AIOps/Routes/Regress.php",
            "line": 39,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($report, \"# Routes Regression Report\\n\\nNo previous snapshot.\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Routes Regression Report\\n\\nNo previous snapshot.\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Routes Regression Report\\n\\nNo previous snapshot.\\n\");"
        },
        {
            "file": "app/Commands/AIOps/Routes/Regress.php",
            "line": 79,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($report, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/Routes/Regress.php",
            "line": 87,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($report, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/Routes/Compare.php",
            "line": 76,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($out, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/Routes/ScanAuth.php",
            "line": 79,
            "call": "mkdir",
            "reason": "Artifact written to writable/",
            "severity": "error",
            "snippet": "@mkdir(WRITEPATH . 'audit', 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.95,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/API/SchemaValidate.php",
            "line": 26,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir(dirname($report), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/API/SchemaValidate.php",
            "line": 65,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($report, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/API/SchemaValidate.php",
            "line": 73,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($report, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/DB/SlowScan.php",
            "line": 18,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir(dirname($out), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/DB/SlowScan.php",
            "line": 22,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($out, \"# DB Slow Scan\\n\\nNo log file found.\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# DB Slow Scan\\n\\nNo log file found.\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# DB Slow Scan\\n\\nNo log file found.\\n\");"
        },
        {
            "file": "app/Commands/AIOps/DB/SlowScan.php",
            "line": 45,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($out, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/Redis/Stats.php",
            "line": 32,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir(dirname($out), 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Audit.php",
            "line": 64,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Audit.php",
            "line": 94,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($reportPath, $report);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $report);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $report);"
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Audit.php",
            "line": 97,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($violationPath, \"# Public Pages Violations\\n\\n- None\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Public Pages Violations\\n\\n- None\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Public Pages Violations\\n\\n- None\\n\");"
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Audit.php",
            "line": 107,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($violationPath, $body);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $body);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $body);"
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Report.php",
            "line": 41,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Report.php",
            "line": 44,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($dir . '/run_summary.json', (string) ($run['summary_json'] ?: '{}'));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', (string) ($run['summary_json'] ?: '{}'));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', (string) ($run['summary_json'] ?: '{}'));"
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Report.php",
            "line": 73,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($dir . '/publish_suggestions.md', $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Run.php",
            "line": 131,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Run.php",
            "line": 141,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($dir . '/violations.md', $body);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $body);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $body);"
        },
        {
            "file": "app/Commands/AIOps/LogsErrors.php",
            "line": 240,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/LogsErrors.php",
            "line": 243,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($dir . '_error_summary.json', json_encode($summary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($summary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($summary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/AIOps/LogsErrors.php",
            "line": 293,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($dir . '_error_summary.md', implode(\"\\n\", $md) . \"\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");"
        },
        {
            "file": "app/Commands/AIOps/LogsErrors.php",
            "line": 299,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($dir . '_error_new_today.md', implode(\"\\n\", $newMd) . \"\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $newMd) . \"\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $newMd) . \"\\n\");"
        },
        {
            "file": "app/Commands/AIOps/Observe.php",
            "line": 47,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($report, $output);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $output);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $output);"
        },
        {
            "file": "app/Commands/AIOps/Backlog.php",
            "line": 134,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($reportPath, $report);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $report);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $report);"
        },
        {
            "file": "app/Commands/AIOps/Backlog.php",
            "line": 185,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/CommandIndex.php",
            "line": 139,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($directory, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/CommandIndex.php",
            "line": 143,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($jsonPath, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/AIOps/CopilotValidate.php",
            "line": 290,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($directory, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/CopilotValidate.php",
            "line": 294,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/AIOps/Worker.php",
            "line": 112,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "if (!is_dir($outDir))  mkdir($outDir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "if (!is_dir($outDir))  mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "if (!is_dir($outDir))  mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/Worker.php",
            "line": 113,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "if (!is_dir($readyDir)) mkdir($readyDir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "if (!is_dir($readyDir)) mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "if (!is_dir($readyDir)) mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/Worker.php",
            "line": 114,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "if (!is_dir($patchDir)) mkdir($patchDir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "if (!is_dir($patchDir)) mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "if (!is_dir($patchDir)) mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/AIOps/Worker.php",
            "line": 121,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($instructionFile, $text);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $text);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $text);"
        },
        {
            "file": "app/Commands/AIOps/Worker.php",
            "line": 127,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($targetsFile, json_encode($targets, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($targets, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($targets, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/AIOps/Worker.php",
            "line": 133,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($prMd, $prBody);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $prBody);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $prBody);"
        },
        {
            "file": "app/Commands/AIOps/Worker.php",
            "line": 138,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($ollamaPrompt, $this->buildOllamaPrompt($id, $risk, $gov, $targets, $text));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $this->buildOllamaPrompt($id, $risk, $gov, $targets, $text));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $this->buildOllamaPrompt($id, $risk, $gov, $targets, $text));"
        },
        {
            "file": "app/Commands/AIOps/Worker.php",
            "line": 193,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($mysqlMd, \"# MySQL Change Notes\\n\\nDocument schema impact and rollback steps.\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# MySQL Change Notes\\n\\nDocument schema impact and rollback steps.\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# MySQL Change Notes\\n\\nDocument schema impact and rollback steps.\\n\");"
        },
        {
            "file": "app/Commands/Ollama/Docs/Sync.php",
            "line": 29,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/_aiops/ollama/models.md', $modelsDoc);",
            "resolved_path": "docs/_aiops/ollama/models.md",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_aiops/ollama/models.md', $modelsDoc);",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_aiops/ollama/models.md', $modelsDoc);"
        },
        {
            "file": "app/Commands/Ollama/Docs/Sync.php",
            "line": 32,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/_aiops/ollama/policy.md', $policyDoc);",
            "resolved_path": "docs/_aiops/ollama/policy.md",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_aiops/ollama/policy.md', $policyDoc);",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_aiops/ollama/policy.md', $policyDoc);"
        },
        {
            "file": "app/Commands/Ollama/Logs/Export.php",
            "line": 27,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($path, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Ollama/Logs/Export.php",
            "line": 58,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($file, $md);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);"
        },
        {
            "file": "app/Commands/Ollama/OllamaRun.php",
            "line": 183,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "if (file_put_contents($outputPath, $markdown) === false) {",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "if (file_put_contents(ROOTPATH . 'docs/_ops/autofix.json') {",
            "confidence": 0.8,
            "replacement_line": "if (file_put_contents(ROOTPATH . 'docs/_ops/autofix.json') {"
        },
        {
            "file": "app/Commands/Ollama/OllamaRun.php",
            "line": 242,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "if (! mkdir($dir, 0775, true) && ! is_dir($dir)) {",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "if (! mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true) {",
            "confidence": 0.8,
            "replacement_line": "if (! mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true) {"
        },
        {
            "file": "app/Commands/Repo/ClassScan.php",
            "line": 72,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Repo/ClassScan.php",
            "line": 99,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($dir . '/class_integrity_report.md', implode(\"\\n\", $md));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md));"
        },
        {
            "file": "app/Commands/Repo/DiffSplit.php",
            "line": 34,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($dir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Repo/DiffSplit.php",
            "line": 53,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($file, implode(\"\\n\", $md));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md));"
        },
        {
            "file": "app/Commands/Repo/ClassTrace.php",
            "line": 83,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($outDir, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Repo/ClassTrace.php",
            "line": 137,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outDir . '/class_trace.md', implode(\"\\n\", $md) . \"\\n\");",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");"
        },
        {
            "file": "app/Commands/Alerts/Audit.php",
            "line": 497,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($docPath, 0775, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Alerts/Audit.php",
            "line": 566,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($docPath . DIRECTORY_SEPARATOR . 'alerts_audit_last_run.md', implode(PHP_EOL, $lines));",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines));"
        },
        {
            "file": "app/Commands/Docs/AuditDocs.php",
            "line": 49,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/_audit_report.md', $report);",
            "resolved_path": "docs/_audit_report.md",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_audit_report.md', $report);",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_audit_report.md', $report);"
        },
        {
            "file": "app/Commands/Docs/InventoryDocs.php",
            "line": 41,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outputFile, $markdown);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $markdown);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $markdown);"
        },
        {
            "file": "app/Commands/Docs/Generate/DocsReadmeBuilder.php",
            "line": 37,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($dir . '/README.md', $readme);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $readme);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $readme);"
        },
        {
            "file": "app/Commands/Docs/Generate/ArchitectureMap.php",
            "line": 42,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/_architecture_map.json', json_encode($architectureMap, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/_architecture_map.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_architecture_map.json', json_encode($architectureMap, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_architecture_map.json', json_encode($architectureMap, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/Docs/Generate/MissingDocs.php",
            "line": 26,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "mkdir($docPath, 0755, true);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/Docs/Generate/MissingDocs.php",
            "line": 48,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($docFile, $markdown);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $markdown);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $markdown);"
        },
        {
            "file": "app/Commands/Docs/Generate/FormInventory.php",
            "line": 60,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/_form_inventory.md', $this->buildMarkdownReport($forms));",
            "resolved_path": "docs/_form_inventory.md",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_form_inventory.md', $this->buildMarkdownReport($forms));",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_form_inventory.md', $this->buildMarkdownReport($forms));"
        },
        {
            "file": "app/Commands/Docs/Generate/KnowledgeGraph.php",
            "line": 63,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/_knowledge_graph.json', json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/_knowledge_graph.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_knowledge_graph.json', json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_knowledge_graph.json', json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/Docs/Scan/OrphanRoutes.php",
            "line": 36,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/_orphan_routes.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/_orphan_routes.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_orphan_routes.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_orphan_routes.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/Docs/Scan/OrphanViews.php",
            "line": 35,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/_orphan_views.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/_orphan_views.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_orphan_views.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_orphan_views.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/Docs/Scan/UndocumentedControllers.php",
            "line": 34,
            "call": "file_put_contents",
            "reason": "Path not allowlisted",
            "severity": "error",
            "snippet": "file_put_contents(ROOTPATH . 'docs/_undocumented_controllers.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "resolved_path": "docs/_undocumented_controllers.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_undocumented_controllers.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "confidence": 0.95,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_undocumented_controllers.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));"
        },
        {
            "file": "app/Commands/Docs/BuildHowItWorksNavigation.php",
            "line": 65,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($outputPath, $buffer);",
            "resolved_path": "docs/_ops/autofix.json",
            "subsystem": "ops",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $buffer);",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $buffer);"
        },
        {
            "file": "app/Commands/GapTrackerSync.php",
            "line": 247,
            "call": "mkdir",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "@mkdir($rootedDir, 0775, true);",
            "resolved_path": "docs/_gap-tracker/autofix.json",
            "subsystem": "gap_tracker",
            "suggested_fix": "@mkdir(ROOTPATH . 'docs/_gap-tracker/autofix.json', 0775, true);",
            "confidence": 0.8,
            "replacement_line": "@mkdir(ROOTPATH . 'docs/_gap-tracker/autofix.json', 0775, true);"
        },
        {
            "file": "app/Commands/GapTrackerSync.php",
            "line": 278,
            "call": "file_put_contents",
            "reason": "Missing ROOTPATH anchor",
            "severity": "warning",
            "snippet": "file_put_contents($path, implode(PHP_EOL, $report));",
            "resolved_path": "docs/_gap-tracker/autofix.json",
            "subsystem": "gap_tracker",
            "suggested_fix": "file_put_contents(ROOTPATH . 'docs/_gap-tracker/autofix.json', implode(PHP_EOL, $report));",
            "confidence": 0.8,
            "replacement_line": "file_put_contents(ROOTPATH . 'docs/_gap-tracker/autofix.json', implode(PHP_EOL, $report));"
        }
    ],
    "issue_count": 260,
    "error_count": 30,
    "severity_summary": {
        "error": 30,
        "warning": 230
    },
    "fixes_applied": 0,
    "manual_required": 27,
    "confidence_summary": {
        "high": 30,
        "medium": 230,
        "low": 0
    },
    "fix_plan": [
        {
            "file": "app/Commands/SolanaHealthcheck.php",
            "line": 20,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($reportDir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/SolanaHealthcheck.php",
            "line": 49,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($reportPath, implode(PHP_EOL, $report));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $report));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/BuildConsoleRegistry.php",
            "line": 59,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents(APPPATH . 'Config/Console.php', $output);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $output);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/ProposePr.php",
            "line": 356,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($rootedDir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/ProposePr.php",
            "line": 365,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($rootedDir, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/ProposePr.php",
            "line": 367,
            "issue": "Missing ROOTPATH anchor",
            "replace": "if (file_put_contents($rootedPath, $content) === false) {",
            "with": "if (file_put_contents(ROOTPATH . 'docs/_ops/autofix.json') {",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/Diff.php",
            "line": 58,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($baseDir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/Diff.php",
            "line": 82,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($mdPath, $markdown);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $markdown);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/Commands/Audit.php",
            "line": 34,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($targetDir, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/Commands/Lint.php",
            "line": 182,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($directory, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/Commands/Lint.php",
            "line": 186,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/VPSSnapshot.php",
            "line": 21,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($outDir, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/VPSSnapshot.php",
            "line": 63,
            "issue": "Missing ROOTPATH anchor",
            "replace": "$ok = @file_put_contents($path, implode(\"\\n\", $data));",
            "with": "$ok = @file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $data));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/NextSteps.php",
            "line": 281,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/NextSteps.php",
            "line": 283,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($target, $markdown);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $markdown);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/NextSteps.php",
            "line": 293,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/NextSteps.php",
            "line": 304,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir(dirname($path), 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/NextSteps.php",
            "line": 305,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/CiPrepare.php",
            "line": 31,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($path, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/CiPrepare.php",
            "line": 58,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir(dirname($path), 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/CiPrepare.php",
            "line": 59,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($path, json_encode($report, JSON_PRETTY_PRINT));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/FilesystemFix.php",
            "line": 68,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir(dirname($patchPath), 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ops/FilesystemFix.php",
            "line": 70,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($patchPath, $diff);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $diff);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Master/Health/Routes.php",
            "line": 45,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($output, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Master/KnowledgeGraphBuild.php",
            "line": 41,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outputFile, json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Gtm/CronRouteSecurityValidation.php",
            "line": 195,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Gtm/CronRouteSecurityValidation.php",
            "line": 232,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($path, implode(PHP_EOL, $lines) . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines) . PHP_EOL);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Gtm/HealthSnapshot.php",
            "line": 97,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Gtm/HealthSnapshot.php",
            "line": 100,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outputPath, implode(PHP_EOL, $lines) . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines) . PHP_EOL);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Gtm/LaunchSmoke.php",
            "line": 37,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir(dirname($output), 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Gtm/LaunchSmoke.php",
            "line": 55,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($output, implode(PHP_EOL, $lines) . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines) . PHP_EOL);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Gtm/LaunchAudit.php",
            "line": 130,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir(dirname($outputPath), 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Gtm/LaunchAudit.php",
            "line": 133,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outputPath, implode(PHP_EOL, $lines) . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines) . PHP_EOL);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/CreateTbiProjectCoinDrafts.php",
            "line": 31,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($reportDir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/CreateTbiProjectCoinDrafts.php",
            "line": 99,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($reportPath, implode(PHP_EOL, $report) . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $report) . PHP_EOL);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Support/SubsCommandTrait.php",
            "line": 49,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($dir, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_support/autofix.json', 0775, true);",
            "allowed": [
                "docs/_support/"
            ]
        },
        {
            "file": "app/Commands/Support/SubsCommandTrait.php",
            "line": 53,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($path, $content . \"\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_support/autofix.json', $content . \"\\n\");",
            "allowed": [
                "docs/_support/"
            ]
        },
        {
            "file": "app/Commands/Support/ArtifactHelper.php",
            "line": 108,
            "issue": "Missing ROOTPATH anchor",
            "replace": "if (file_put_contents($artifactDir . '/summary.md', $summary) === false) {",
            "with": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {",
            "allowed": [
                "docs/_support/"
            ]
        },
        {
            "file": "app/Commands/Support/ArtifactHelper.php",
            "line": 113,
            "issue": "Missing ROOTPATH anchor",
            "replace": "if (file_put_contents($artifactDir . '/report.json', $reportJson) === false) {",
            "with": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {",
            "allowed": [
                "docs/_support/"
            ]
        },
        {
            "file": "app/Commands/Support/ArtifactHelper.php",
            "line": 120,
            "issue": "Missing ROOTPATH anchor",
            "replace": "if (file_put_contents($artifactDir . '/meta.json', $metaJson) === false) {",
            "with": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {",
            "allowed": [
                "docs/_support/"
            ]
        },
        {
            "file": "app/Commands/Support/ArtifactHelper.php",
            "line": 139,
            "issue": "Missing ROOTPATH anchor",
            "replace": "if (file_put_contents($target, $body . PHP_EOL) === false) {",
            "with": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {",
            "allowed": [
                "docs/_support/"
            ]
        },
        {
            "file": "app/Commands/Support/ArtifactHelper.php",
            "line": 156,
            "issue": "Missing ROOTPATH anchor",
            "replace": "return mkdir($artifactDir, 0755, true);",
            "with": "return mkdir(ROOTPATH . 'docs/_support/autofix.json', 0775, true);",
            "allowed": [
                "docs/_support/"
            ]
        },
        {
            "file": "app/Commands/Support/ArtifactHelper.php",
            "line": 187,
            "issue": "Missing ROOTPATH anchor",
            "replace": "if (file_put_contents($resolved, $contents) === false) {",
            "with": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {",
            "allowed": [
                "docs/_support/"
            ]
        },
        {
            "file": "app/Commands/Support/ArtifactHelper.php",
            "line": 208,
            "issue": "Missing ROOTPATH anchor",
            "replace": "if (file_put_contents($resolved, $contents, FILE_APPEND) === false) {",
            "with": "if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {",
            "allowed": [
                "docs/_support/"
            ]
        },
        {
            "file": "app/Commands/Support/GitHubIssueHelper.php",
            "line": 73,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir(dirname($path), 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_support/autofix.json', 0775, true);",
            "allowed": [
                "docs/_support/"
            ]
        },
        {
            "file": "app/Commands/Support/GitHubIssueHelper.php",
            "line": 79,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir(dirname($path), 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_support/autofix.json', 0775, true);",
            "allowed": [
                "docs/_support/"
            ]
        },
        {
            "file": "app/Commands/Support/GitHubIssueHelper.php",
            "line": 90,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($path, $payload . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/_support/autofix.json', $payload . PHP_EOL);",
            "allowed": [
                "docs/_support/"
            ]
        },
        {
            "file": "app/Commands/NewsAudit.php",
            "line": 732,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($docPath, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/NewsAudit.php",
            "line": 792,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($docPath . DIRECTORY_SEPARATOR . 'news_audit_last_run.md', implode(PHP_EOL, $lines));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Auth/Smoke.php",
            "line": 39,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir(dirname($outPath), 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Auth/Smoke.php",
            "line": 41,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outPath, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Auth/SurfaceScan.php",
            "line": 48,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir(dirname($outPath), 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Auth/SurfaceScan.php",
            "line": 50,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outPath, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Database/TableList.php",
            "line": 57,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Database/TableList.php",
            "line": 60,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($dir . '/db-table-list-latest.json', json_encode($result, JSON_PRETTY_PRINT));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($result, JSON_PRETTY_PRINT));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Database/TableList.php",
            "line": 79,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($dir . '/db-table-list-latest.md', $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Logs/SummarizeAll.php",
            "line": 27,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($outDir, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Logs/SummarizeAll.php",
            "line": 50,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($file, $this->renderSubsystemMarkdown($summary));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $this->renderSubsystemMarkdown($summary));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Logs/EnableFullLogging.php",
            "line": 23,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($configPath, $contents);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $contents);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/App/APIAuditPro.php",
            "line": 239,
            "issue": "Missing ROOTPATH anchor",
            "replace": "if (!is_dir($dir)) mkdir($dir, 0775, true);",
            "with": "if (!is_dir($dir)) mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/App/APIAuditPro.php",
            "line": 261,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($file, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/App/ControllerAudit.php",
            "line": 42,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($latestPath, $json);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $json);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/App/ControllerAudit.php",
            "line": 43,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($snapshotPath, $json);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $json);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/App/ControllerAudit.php",
            "line": 49,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($mdPath, $this->renderRegressionMarkdown($diff, $snapshotPath));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $this->renderRegressionMarkdown($diff, $snapshotPath));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/App/ControllerAudit.php",
            "line": 456,
            "issue": "Missing ROOTPATH anchor",
            "replace": "$ok = file_put_contents($filePath, $new) !== false;",
            "with": "$ok = file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $new) !== false;",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/App/ControllerAudit.php",
            "line": 468,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($dir, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/CompatAudit.php",
            "line": 371,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($filePath, $modified);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $modified);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/CompatAudit.php",
            "line": 557,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($path, (string) json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', (string) json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/CompatAudit.php",
            "line": 596,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($directory, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/SolanaTransactionAudit.php",
            "line": 31,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($reportDir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/SolanaTransactionAudit.php",
            "line": 78,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($reportPath, implode(PHP_EOL, $report));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $report));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Security/GenerateCI4Key.php",
            "line": 48,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($env, $contents);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $contents);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 26,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($dir, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 51,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($dir . '/report.md', $body);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $body);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 52,
            "issue": "Path not allowlisted",
            "replace": "@mkdir(ROOTPATH . 'docs/APIs/audit', 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/APIs/audit', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 53,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/APIs/audit/latest.md', $body);",
            "with": "file_put_contents(ROOTPATH . 'docs/APIs/audit/latest.md', $body);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 61,
            "issue": "Path not allowlisted",
            "replace": "@mkdir(ROOTPATH . 'docs/APIs', 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/APIs', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 62,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_routes.md', $this->renderRoutesInventory($scan));",
            "with": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_routes.md', $this->renderRoutesInventory($scan));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 63,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_controllers.md', $this->renderControllersInventory($scan));",
            "with": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_controllers.md', $this->renderControllersInventory($scan));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 64,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_filters.md', $this->renderFiltersInventory($scan));",
            "with": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_filters.md', $this->renderFiltersInventory($scan));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 65,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_rate_limits.md', $this->renderRateInventory($scan));",
            "with": "file_put_contents(ROOTPATH . 'docs/APIs/_inventory_rate_limits.md', $this->renderRateInventory($scan));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 70,
            "issue": "Path not allowlisted",
            "replace": "@mkdir(ROOTPATH . 'docs/security', 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/security', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 71,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/security/filter-coverage.md', $this->renderFilterCoverage($scan));",
            "with": "file_put_contents(ROOTPATH . 'docs/security/filter-coverage.md', $this->renderFilterCoverage($scan));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 72,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/APIs/rate-limit-coverage.md', $this->renderRateCoverage($scan));",
            "with": "file_put_contents(ROOTPATH . 'docs/APIs/rate-limit-coverage.md', $this->renderRateCoverage($scan));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 73,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/APIs/deprecations.md', $this->renderDeprecations($scan));",
            "with": "file_put_contents(ROOTPATH . 'docs/APIs/deprecations.md', $this->renderDeprecations($scan));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 78,
            "issue": "Path not allowlisted",
            "replace": "@mkdir(ROOTPATH . 'docs/APIs/openapi', 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/APIs/openapi', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiAudit.php",
            "line": 99,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/APIs/openapi/openapi.v1.json', json_encode($spec, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/APIs/openapi/openapi.v1.json', json_encode($spec, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiList.php",
            "line": 57,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($target, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiList.php",
            "line": 58,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($target . '/latest.md', implode(PHP_EOL, $lines) . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines) . PHP_EOL);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiPermissions.php",
            "line": 19,
            "issue": "Path not allowlisted",
            "replace": "@mkdir(ROOTPATH . 'docs/security', 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/security', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiPermissions.php",
            "line": 39,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/security/endpoint-permission-matrix.md', implode(PHP_EOL, $md) . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/security/endpoint-permission-matrix.md', implode(PHP_EOL, $md) . PHP_EOL);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiVersioningCheck.php",
            "line": 21,
            "issue": "Path not allowlisted",
            "replace": "@mkdir(ROOTPATH . 'docs/APIs', 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/APIs', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/API/ApiVersioningCheck.php",
            "line": 32,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/APIs/deprecations.md', implode(PHP_EOL, $lines) . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/APIs/deprecations.md', implode(PHP_EOL, $lines) . PHP_EOL);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Routes/Docs.php",
            "line": 30,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($dir, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Routes/Docs.php",
            "line": 87,
            "issue": "Missing ROOTPATH anchor",
            "replace": "if (@file_put_contents($fullOut, implode(\"\\n\", $md) . \"\\n\") === false) {",
            "with": "if (@file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\") === false) {",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Routes/Docs.php",
            "line": 92,
            "issue": "Missing ROOTPATH anchor",
            "replace": "if (@file_put_contents($jsonOut, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . \"\\n\") === false) {",
            "with": "if (@file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . \"\\n\") === false) {",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Routes/Repair.php",
            "line": 32,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($dir, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Routes/Repair.php",
            "line": 72,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($reportPath, implode(\"\\n\", $md) . \"\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Routes/Reconcile.php",
            "line": 30,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($dir, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Routes/Reconcile.php",
            "line": 51,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($fullOut, implode(\"\\n\", $md) . \"\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Routes/Reconcile.php",
            "line": 52,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($jsonOut, json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . \"\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . \"\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/SolanaPreviewBrowserRuntimeSmoke.php",
            "line": 373,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir(dirname($scriptPath), 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/SolanaPreviewBrowserRuntimeSmoke.php",
            "line": 376,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($scriptPath, $script);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $script);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Spark/InfraServerAudit.php",
            "line": 40,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outputPath, json_encode($results, JSON_PRETTY_PRINT));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($results, JSON_PRETTY_PRINT));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Spark/Doctor.php",
            "line": 295,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($directory, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Spark/Doctor.php",
            "line": 299,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Spark/Fix.php",
            "line": 167,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir(dirname($path), 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Spark/Fix.php",
            "line": 169,
            "issue": "Missing ROOTPATH anchor",
            "replace": "return file_put_contents($path, $updated) !== false;",
            "with": "return file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $updated) !== false;",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Spark/Fix.php",
            "line": 261,
            "issue": "Missing ROOTPATH anchor",
            "replace": "$ok = @mkdir(dirname($path), 0775, true);",
            "with": "$ok = @mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Spark/CommandGraph.php",
            "line": 64,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir(dirname($target), 0755, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Codex/ReviewPrOutbox.php",
            "line": 75,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($dir, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);",
            "allowed": [
                "docs/_codex/"
            ]
        },
        {
            "file": "app/Commands/Codex/ReviewPrOutbox.php",
            "line": 76,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($dir . '/CODEX_REVIEW.md', $review);",
            "with": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $review);",
            "allowed": [
                "docs/_codex/"
            ]
        },
        {
            "file": "app/Commands/Codex/ReviewPublish.php",
            "line": 54,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($dir, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);",
            "allowed": [
                "docs/_codex/"
            ]
        },
        {
            "file": "app/Commands/Codex/ReviewPublish.php",
            "line": 56,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($artifactPath, json_encode($payload, JSON_PRETTY_PRINT) . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', json_encode($payload, JSON_PRETTY_PRINT) . PHP_EOL);",
            "allowed": [
                "docs/_codex/"
            ]
        },
        {
            "file": "app/Commands/Codex/ReviewPublish.php",
            "line": 59,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($dashboardPath, $this->renderDashboard($filesystem, $commands, $timestamp));",
            "with": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $this->renderDashboard($filesystem, $commands, $timestamp));",
            "allowed": [
                "docs/_codex/"
            ]
        },
        {
            "file": "app/Commands/Codex/ReviewPublish.php",
            "line": 189,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);",
            "allowed": [
                "docs/_codex/"
            ]
        },
        {
            "file": "app/Commands/Codex/Instructions/Summarize.php",
            "line": 35,
            "issue": "Artifact written to writable/",
            "replace": "file_put_contents(WRITEPATH . 'audit/instruction_template.txt', $template);",
            "with": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $template);",
            "allowed": [
                "docs/_codex/"
            ]
        },
        {
            "file": "app/Commands/Codex/Instructions/DevOpsReview.php",
            "line": 25,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@is_dir(dirname($outPath)) || @mkdir(dirname($outPath), 0775, true);",
            "with": "@is_dir(dirname($outPath)) || @mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);",
            "allowed": [
                "docs/_codex/"
            ]
        },
        {
            "file": "app/Commands/Codex/Instructions/DevOpsReview.php",
            "line": 27,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outPath, $prompt);",
            "with": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $prompt);",
            "allowed": [
                "docs/_codex/"
            ]
        },
        {
            "file": "app/Commands/Codex/ContinueAudit.php",
            "line": 199,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@is_dir(dirname($mdPath)) || @mkdir(dirname($mdPath), 0775, true);",
            "with": "@is_dir(dirname($mdPath)) || @mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);",
            "allowed": [
                "docs/_codex/"
            ]
        },
        {
            "file": "app/Commands/Codex/ContinueAudit.php",
            "line": 200,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@is_dir(dirname($jsonlPath)) || @mkdir(dirname($jsonlPath), 0775, true);",
            "with": "@is_dir(dirname($jsonlPath)) || @mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);",
            "allowed": [
                "docs/_codex/"
            ]
        },
        {
            "file": "app/Commands/Codex/ContinueAudit.php",
            "line": 203,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($mdPath, $md, FILE_APPEND | LOCK_EX);",
            "with": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $md, FILE_APPEND | LOCK_EX);",
            "allowed": [
                "docs/_codex/"
            ]
        },
        {
            "file": "app/Commands/Codex/ContinueAudit.php",
            "line": 212,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($jsonlPath, json_encode($row) . \"\\n\", FILE_APPEND | LOCK_EX);",
            "with": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', json_encode($row) . \"\\n\", FILE_APPEND | LOCK_EX);",
            "allowed": [
                "docs/_codex/"
            ]
        },
        {
            "file": "app/Commands/Codex/Review.php",
            "line": 36,
            "issue": "Missing ROOTPATH anchor",
            "replace": "if (! is_dir($outputDir) && ! mkdir($outputDir, 0775, true) && ! is_dir($outputDir)) {",
            "with": "if (! is_dir($outputDir) && ! mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true) {",
            "allowed": [
                "docs/_codex/"
            ]
        },
        {
            "file": "app/Commands/Codex/Review.php",
            "line": 55,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($reviewPath, $this->renderReview($today, $status, $recentCommits, $changedFiles, $docsDrift));",
            "with": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $this->renderReview($today, $status, $recentCommits, $changedFiles, $docsDrift));",
            "allowed": [
                "docs/_codex/"
            ]
        },
        {
            "file": "app/Commands/Codex/Review.php",
            "line": 56,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($promptPath, $this->renderPromptPayload($today, $status, $recentCommits, $changedFiles, $docsDrift));",
            "with": "file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $this->renderPromptPayload($today, $status, $recentCommits, $changedFiles, $docsDrift));",
            "allowed": [
                "docs/_codex/"
            ]
        },
        {
            "file": "app/Commands/Platform/ControlAnalyze.php",
            "line": 35,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($reportPath, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Platform/ControlAnalyze.php",
            "line": 36,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/_platform/control_plane_report.md', \"# Control Plane Report\\n\\n```json\\n\" . json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . \"\\n```\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_platform/control_plane_report.md', \"# Control Plane Report\\n\\n```json\\n\" . json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . \"\\n```\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Platform/ControlDispatch.php",
            "line": 69,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($reportPath, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Platform/EdgeSnapshot.php",
            "line": 39,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($base, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Platform/EdgeSnapshot.php",
            "line": 42,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($base . '/edge_status.json', json_encode($status, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($status, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Platform/EdgeSnapshot.php",
            "line": 43,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($base . '/edge_metrics.json', json_encode($metrics, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($metrics, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/SolanaDigest.php",
            "line": 20,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($reportDir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/SolanaDigest.php",
            "line": 62,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($reportPath, implode(PHP_EOL, $report) . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $report) . PHP_EOL);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/SolanaWalletSecretsAudit.php",
            "line": 238,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/SolanaWalletSecretsAudit.php",
            "line": 286,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($path, implode(\"\\n\", $lines));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $lines));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Research/DailyMarketReport.php",
            "line": 61,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0755, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Research/FinancialIntelligenceSignals.php",
            "line": 79,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($file, json_encode($signals, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($signals, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Research/WeeklyMarketReport.php",
            "line": 48,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0755, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Ingest.php",
            "line": 270,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Ingest.php",
            "line": 349,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($fullPath, implode(\"\\n\", $lines) . \"\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $lines) . \"\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Ingest.php",
            "line": 358,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Ingest.php",
            "line": 382,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($path, $content . \"\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $content . \"\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/MissingViewScan.php",
            "line": 41,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir(dirname($jsonPath), 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/MissingViewScan.php",
            "line": 42,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir(dirname($mdPath), 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/MissingViewScan.php",
            "line": 44,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($jsonPath, json_encode($issues, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($issues, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/MissingViewScan.php",
            "line": 57,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($mdPath, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/ScanCells.php",
            "line": 76,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($runDir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Unlock.php",
            "line": 39,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($unlockDir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Doctor.php",
            "line": 80,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir(dirname($reportPath), 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Doctor.php",
            "line": 81,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($reportPath, $report);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $report);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/HealthFull.php",
            "line": 17,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir(dirname($report), 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/HealthFull.php",
            "line": 33,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($report, \"# Full Health Report\\n\\n\" . implode(\"\\n\\n---\\n\\n\", $sections));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Full Health Report\\n\\n\" . implode(\"\\n\\n---\\n\\n\", $sections));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/CspAudit.php",
            "line": 196,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/AutoFixAnalyze.php",
            "line": 120,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir(dirname($path), 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/AutoFixAnalyze.php",
            "line": 121,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/AutoFixAnalyze.php",
            "line": 126,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir(dirname($path), 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/AutoFixAnalyze.php",
            "line": 145,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($path, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/SuggestRoutes.php",
            "line": 37,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir(dirname($jsonPath), 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/SuggestRoutes.php",
            "line": 38,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir(dirname($mdPath), 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/SuggestRoutes.php",
            "line": 40,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($jsonPath, json_encode($suggestions, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($suggestions, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/SuggestRoutes.php",
            "line": 46,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($mdPath, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/PyOps.php",
            "line": 61,
            "issue": "Missing ROOTPATH anchor",
            "replace": "if (!is_dir($runDir) && !mkdir($runDir, 0755, true) && !is_dir($runDir)) {",
            "with": "if (!is_dir($runDir) && !mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true) {",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/PyOps.php",
            "line": 67,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($requestFile, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Audit.php",
            "line": 58,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($dir, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Audit.php",
            "line": 60,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($mdAbsPath, $this->buildOrchestrationMarkdown($orchestration));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $this->buildOrchestrationMarkdown($orchestration));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/SelfHeal.php",
            "line": 3,
            "issue": "Missing ROOTPATH anchor",
            "replace": "class SelfHeal extends SafeBaseCommand { use SubsCommandTrait; protected $group = 'AIOps - Repair'; protected $name='aiops:self-heal'; protected $description='Run one-pass self-heal'; protected $options=['--attempts'=>'max 3','--json'=>'JSON']; public function run(array $params){$this->parseParams($params);$json=$this->optBool('json');$attempts=max(1,min(3,$this->optInt('attempts', 1)));$lock = ROOTPATH . 'aiops/runtime/selfheal.lock'; if(is_file($lock) && (time()-filemtime($lock))<600){$out=['status'=>'locked','message'=>'self-heal already running'];$this->emit($out,$json);return EXIT_SUCCESS;} file_put_contents($lock,(string)getmypid()); try {$runs=[]; for($i=1;$i<=$attempts;$i++){ $audit=command('aiops:audit --json=1'); $repair=command('aiops:repair --json=1'); $status=command('aiops:status --json=1'); $runs[]=['cycle'=>$i,'audit'=>$audit,'repair'=>$repair,'status'=>$status]; } $md=\"# Self Heal \".date('c').\"\\n\\nAttempts: {$attempts}\\n\"; $path=$this->writeDoc('nightly','self-heal-'.date('Y-m-d--Hi').'.md',$md); $out=['status'=>'ok','attempts'=>$attempts,'report'=>$path]; } finally {@unlink($lock);} $this->emit($out,$json); return EXIT_SUCCESS; }}",
            "with": "class SelfHeal extends SafeBaseCommand { use SubsCommandTrait; protected $group = 'AIOps - Repair'; protected $name='aiops:self-heal'; protected $description='Run one-pass self-heal'; protected $options=['--attempts'=>'max 3','--json'=>'JSON']; public function run(array $params){$this->parseParams($params);$json=$this->optBool('json');$attempts=max(1,min(3,$this->optInt('attempts', 1)));ROOTPATH . 'docs/_ops/autofix.json' = ROOTPATH . 'aiops/runtime/selfheal.lock'; if(is_file(ROOTPATH . 'docs/_ops/autofix.json') && (time()-filemtime(ROOTPATH . 'docs/_ops/autofix.json'))<600){$out=['status'=>'locked','message'=>'self-heal already running'];$this->emit($out,$json);return EXIT_SUCCESS;} file_put_contents(ROOTPATH . 'docs/_ops/autofix.json',(string)getmypid()); try {$runs=[]; for($i=1;$i<=$attempts;$i++){ $audit=command('aiops:audit --json=1'); $repair=command('aiops:repair --json=1'); $status=command('aiops:status --json=1'); $runs[]=['cycle'=>$i,'audit'=>$audit,'repair'=>$repair,'status'=>$status]; } $md=\"# Self Heal \".date('c').\"\\n\\nAttempts: {$attempts}\\n\"; $path=$this->writeDoc('nightly','self-heal-'.date('Y-m-d--Hi').'.md',$md); $out=['status'=>'ok','attempts'=>$attempts,'report'=>$path]; } finally {@unlink(ROOTPATH . 'docs/_ops/autofix.json');} $this->emit($out,$json); return EXIT_SUCCESS; }}",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/All.php",
            "line": 565,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($reportDir . '_aiops_all.md', $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/All.php",
            "line": 730,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($directory, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/AiopsRepairs.php",
            "line": 71,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($dir . '_repair_queue.md', implode(\"\\n\", $md) . \"\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/AiopsRepairs.php",
            "line": 95,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($dir . '_patch_plan.md', implode(\"\\n\", $md) . \"\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/AiopsRepairs.php",
            "line": 120,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($dir . '_execution_log.md', implode(\"\\n\", $log) . \"\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $log) . \"\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/AiopsRepairs.php",
            "line": 131,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($dir . '_final_report.md', implode(\"\\n\", $final) . \"\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $final) . \"\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/SyncPerfRoutes.php",
            "line": 48,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($perfFile, implode(\"\\n\", $cleaned));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $cleaned));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Observe/Map.php",
            "line": 39,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($statePath, json_encode($data, JSON_PRETTY_PRINT));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($data, JSON_PRETTY_PRINT));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Observe/Patch.php",
            "line": 27,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($patchFile, $content);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $content);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Observe/Cost.php",
            "line": 63,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outPath, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Observe/Snapshot.php",
            "line": 23,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@is_dir($dir) || @mkdir($dir, 0775, true);",
            "with": "@is_dir($dir) || @mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Observe/Regression.php",
            "line": 27,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($reportPath, \"# Regression Report\\n\\nNo history found.\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Regression Report\\n\\nNo history found.\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Observe/Regression.php",
            "line": 37,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($reportPath, \"# Regression Report\\n\\nNo previous snapshot.\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Regression Report\\n\\nNo previous snapshot.\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Observe/Regression.php",
            "line": 75,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($reportPath, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/DiffFormat.php",
            "line": 29,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outPath, $diff);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $diff);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Patch/Hallucination.php",
            "line": 25,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@is_dir(dirname($outJson)) || @mkdir(dirname($outJson), 0775, true);",
            "with": "@is_dir(dirname($outJson)) || @mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Patch/Hallucination.php",
            "line": 27,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outJson, json_encode($result, JSON_PRETTY_PRINT));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($result, JSON_PRETTY_PRINT));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Patch/Hallucination.php",
            "line": 32,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outMd, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Patch/Hallucination.php",
            "line": 44,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outMd, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Patch/Hallucination.php",
            "line": 54,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outMd, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Routes/Scan.php",
            "line": 92,
            "issue": "Artifact written to writable/",
            "replace": "@mkdir(WRITEPATH . 'audit', 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Routes/Scan.php",
            "line": 110,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($histDir, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Routes/Gate.php",
            "line": 87,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outPath, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Routes/Gate.php",
            "line": 94,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outPath, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Routes/Regress.php",
            "line": 27,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($report, \"# Routes Regression Report\\n\\nNo history.\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Routes Regression Report\\n\\nNo history.\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Routes/Regress.php",
            "line": 39,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($report, \"# Routes Regression Report\\n\\nNo previous snapshot.\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Routes Regression Report\\n\\nNo previous snapshot.\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Routes/Regress.php",
            "line": 79,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($report, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Routes/Regress.php",
            "line": 87,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($report, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Routes/Compare.php",
            "line": 76,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($out, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Routes/ScanAuth.php",
            "line": 79,
            "issue": "Artifact written to writable/",
            "replace": "@mkdir(WRITEPATH . 'audit', 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/API/SchemaValidate.php",
            "line": 26,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir(dirname($report), 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/API/SchemaValidate.php",
            "line": 65,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($report, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/API/SchemaValidate.php",
            "line": 73,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($report, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/DB/SlowScan.php",
            "line": 18,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir(dirname($out), 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/DB/SlowScan.php",
            "line": 22,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($out, \"# DB Slow Scan\\n\\nNo log file found.\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# DB Slow Scan\\n\\nNo log file found.\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/DB/SlowScan.php",
            "line": 45,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($out, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Redis/Stats.php",
            "line": 32,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir(dirname($out), 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Audit.php",
            "line": 64,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Audit.php",
            "line": 94,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($reportPath, $report);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $report);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Audit.php",
            "line": 97,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($violationPath, \"# Public Pages Violations\\n\\n- None\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# Public Pages Violations\\n\\n- None\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Audit.php",
            "line": 107,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($violationPath, $body);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $body);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Report.php",
            "line": 41,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Report.php",
            "line": 44,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($dir . '/run_summary.json', (string) ($run['summary_json'] ?: '{}'));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', (string) ($run['summary_json'] ?: '{}'));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Report.php",
            "line": 73,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($dir . '/publish_suggestions.md', $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Run.php",
            "line": 131,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/PublicPages/Run.php",
            "line": 141,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($dir . '/violations.md', $body);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $body);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/LogsErrors.php",
            "line": 240,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/LogsErrors.php",
            "line": 243,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($dir . '_error_summary.json', json_encode($summary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($summary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/LogsErrors.php",
            "line": 293,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($dir . '_error_summary.md', implode(\"\\n\", $md) . \"\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/LogsErrors.php",
            "line": 299,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($dir . '_error_new_today.md', implode(\"\\n\", $newMd) . \"\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $newMd) . \"\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Observe.php",
            "line": 47,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($report, $output);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $output);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Backlog.php",
            "line": 134,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($reportPath, $report);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $report);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Backlog.php",
            "line": 185,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/CommandIndex.php",
            "line": 139,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($directory, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/CommandIndex.php",
            "line": 143,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($jsonPath, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/CopilotValidate.php",
            "line": 290,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($directory, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/CopilotValidate.php",
            "line": 294,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Worker.php",
            "line": 112,
            "issue": "Missing ROOTPATH anchor",
            "replace": "if (!is_dir($outDir))  mkdir($outDir, 0775, true);",
            "with": "if (!is_dir($outDir))  mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Worker.php",
            "line": 113,
            "issue": "Missing ROOTPATH anchor",
            "replace": "if (!is_dir($readyDir)) mkdir($readyDir, 0775, true);",
            "with": "if (!is_dir($readyDir)) mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Worker.php",
            "line": 114,
            "issue": "Missing ROOTPATH anchor",
            "replace": "if (!is_dir($patchDir)) mkdir($patchDir, 0775, true);",
            "with": "if (!is_dir($patchDir)) mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Worker.php",
            "line": 121,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($instructionFile, $text);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $text);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Worker.php",
            "line": 127,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($targetsFile, json_encode($targets, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($targets, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Worker.php",
            "line": 133,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($prMd, $prBody);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $prBody);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Worker.php",
            "line": 138,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($ollamaPrompt, $this->buildOllamaPrompt($id, $risk, $gov, $targets, $text));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $this->buildOllamaPrompt($id, $risk, $gov, $targets, $text));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/AIOps/Worker.php",
            "line": 193,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($mysqlMd, \"# MySQL Change Notes\\n\\nDocument schema impact and rollback steps.\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', \"# MySQL Change Notes\\n\\nDocument schema impact and rollback steps.\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ollama/Docs/Sync.php",
            "line": 29,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/_aiops/ollama/models.md', $modelsDoc);",
            "with": "file_put_contents(ROOTPATH . 'docs/_aiops/ollama/models.md', $modelsDoc);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ollama/Docs/Sync.php",
            "line": 32,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/_aiops/ollama/policy.md', $policyDoc);",
            "with": "file_put_contents(ROOTPATH . 'docs/_aiops/ollama/policy.md', $policyDoc);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ollama/Logs/Export.php",
            "line": 27,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($path, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ollama/Logs/Export.php",
            "line": 58,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($file, $md);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $md);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ollama/OllamaRun.php",
            "line": 183,
            "issue": "Missing ROOTPATH anchor",
            "replace": "if (file_put_contents($outputPath, $markdown) === false) {",
            "with": "if (file_put_contents(ROOTPATH . 'docs/_ops/autofix.json') {",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Ollama/OllamaRun.php",
            "line": 242,
            "issue": "Missing ROOTPATH anchor",
            "replace": "if (! mkdir($dir, 0775, true) && ! is_dir($dir)) {",
            "with": "if (! mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true) {",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Repo/ClassScan.php",
            "line": 72,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Repo/ClassScan.php",
            "line": 99,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($dir . '/class_integrity_report.md', implode(\"\\n\", $md));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Repo/DiffSplit.php",
            "line": 34,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($dir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Repo/DiffSplit.php",
            "line": 53,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($file, implode(\"\\n\", $md));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Repo/ClassTrace.php",
            "line": 83,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($outDir, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Repo/ClassTrace.php",
            "line": 137,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outDir . '/class_trace.md', implode(\"\\n\", $md) . \"\\n\");",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(\"\\n\", $md) . \"\\n\");",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Alerts/Audit.php",
            "line": 497,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($docPath, 0775, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Alerts/Audit.php",
            "line": 566,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($docPath . DIRECTORY_SEPARATOR . 'alerts_audit_last_run.md', implode(PHP_EOL, $lines));",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Docs/AuditDocs.php",
            "line": 49,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/_audit_report.md', $report);",
            "with": "file_put_contents(ROOTPATH . 'docs/_audit_report.md', $report);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Docs/InventoryDocs.php",
            "line": 41,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outputFile, $markdown);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $markdown);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Docs/Generate/DocsReadmeBuilder.php",
            "line": 37,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($dir . '/README.md', $readme);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $readme);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Docs/Generate/ArchitectureMap.php",
            "line": 42,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/_architecture_map.json', json_encode($architectureMap, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/_architecture_map.json', json_encode($architectureMap, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Docs/Generate/MissingDocs.php",
            "line": 26,
            "issue": "Missing ROOTPATH anchor",
            "replace": "mkdir($docPath, 0755, true);",
            "with": "mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Docs/Generate/MissingDocs.php",
            "line": 48,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($docFile, $markdown);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $markdown);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Docs/Generate/FormInventory.php",
            "line": 60,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/_form_inventory.md', $this->buildMarkdownReport($forms));",
            "with": "file_put_contents(ROOTPATH . 'docs/_form_inventory.md', $this->buildMarkdownReport($forms));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Docs/Generate/KnowledgeGraph.php",
            "line": 63,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/_knowledge_graph.json', json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/_knowledge_graph.json', json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Docs/Scan/OrphanRoutes.php",
            "line": 36,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/_orphan_routes.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/_orphan_routes.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Docs/Scan/OrphanViews.php",
            "line": 35,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/_orphan_views.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/_orphan_views.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Docs/Scan/UndocumentedControllers.php",
            "line": 34,
            "issue": "Path not allowlisted",
            "replace": "file_put_contents(ROOTPATH . 'docs/_undocumented_controllers.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "with": "file_put_contents(ROOTPATH . 'docs/_undocumented_controllers.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/Docs/BuildHowItWorksNavigation.php",
            "line": 65,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($outputPath, $buffer);",
            "with": "file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $buffer);",
            "allowed": [
                "docs/_ops/",
                "ci/"
            ]
        },
        {
            "file": "app/Commands/GapTrackerSync.php",
            "line": 247,
            "issue": "Missing ROOTPATH anchor",
            "replace": "@mkdir($rootedDir, 0775, true);",
            "with": "@mkdir(ROOTPATH . 'docs/_gap-tracker/autofix.json', 0775, true);",
            "allowed": [
                "docs/_gap-tracker/"
            ]
        },
        {
            "file": "app/Commands/GapTrackerSync.php",
            "line": 278,
            "issue": "Missing ROOTPATH anchor",
            "replace": "file_put_contents($path, implode(PHP_EOL, $report));",
            "with": "file_put_contents(ROOTPATH . 'docs/_gap-tracker/autofix.json', implode(PHP_EOL, $report));",
            "allowed": [
                "docs/_gap-tracker/"
            ]
        }
    ]
}

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-04 00:23:58 UTC+00:00

✅ All Spark command rules passed.

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-04 00:23:58 UTC+00:00

```

## Solana Safety Gates
```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-04 00:23:58 UTC+00:00


============================================================
SOLANA PREVIEW BROWSER RUNTIME SMOKE - PHASE 16
============================================================
Safety: simulated browser only; no private keys, broadcasts, minting, or execution calls.

PASS: Preview UX JS exists
PASS: Preview UX JS has Phase 14 marker
PASS: Preview UX JS intercepts submit in capture phase
PASS: Preview UX JS stops immediate propagation
PASS: Preview UX JS calls swap preview fallback endpoint
PASS: Preview UX JS forces dry_run=true
PASS: Preview UX JS forces broadcast=false
PASS: Preview UX JS requires signature
PASS: Preview UX JS requires wallet signature
PASS: Preview UX JS blocks private key submission
PASS: Preview UX JS neutralizes private key fields
PASS: coinSwap view includes preview runtime config
PASS: swap view includes preview runtime config
PASS: trade view includes preview runtime config
PASS: Preview swap API route exists
PASS: Preview transaction API route exists
PASS: Preview swap route uses CSRF
PASS: Preview transaction route uses CSRF
PASS: Swap execute route remains trackable
PASS: Token mint route remains trackable
PASS: Node runtime is available for browser simulation

--- Node Browser Simulation Output ---
PASS: Submit default prevented
PASS: Submit propagation stopped
PASS: Submit immediate propagation stopped
PASS: Preview API called exactly once
PASS: Preview API endpoint used
PASS: Preview API uses POST
PASS: CSRF token included in preview request
PASS: dry_run=true submitted
PASS: broadcast=false submitted
PASS: signature_required=true submitted
PASS: wallet_signature_required=true submitted
PASS: private_key_submission_allowed=false submitted
PASS: private_key value not submitted
PASS: privateKey value not submitted
PASS: seed value not submitted
PASS: seed_phrase value not submitted
PASS: mnemonic value not submitted
PASS: private key field disabled in DOM
PASS: seed phrase field disabled in DOM
PASS: preview modal opened
PASS: no swap execute fetch call occurred
PASS: no token mint fetch call occurred
FETCH_CALLS=[{"url":"/index.php/API/Solana/swap/preview","method":"POST","body":"csrf_test_name=csrf-test-hash&from_token=SOL&to_token=MYMI&amount=0.25&slippage=0.50&action=swap_preview&network=solana&estimated_output=Preview+pending+API+estimate&estimated_fee=Preview+pending+fee+estimate&private_key_submission_allowed=false&broadcast=false&dry_run=true&signature_required=true&wallet_signature_required=true","headers":{"Content-Type":"application/x-www-form-urlencoded; charset=UTF-8","X-Requested-With":"XMLHttpRequest","X-CSRF-TOKEN":"csrf-test-hash"}}]
PASS: Node browser simulation completed successfully

============================================================
RESULT
============================================================
PASS count: 22
FAIL count: 0

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-04 00:23:59 UTC+00:00


============================================================
SOLANA PREVIEW RUNTIME SMOKE - PHASE 15
============================================================
Safety: preview-only, no private keys, no broadcasts, no minting.

PASS: Preview UX JS exists
PASS: Preview UX JS has Phase 14 marker
PASS: Preview UX JS forces dry_run=true
PASS: Preview UX JS forces broadcast=false
PASS: Preview UX JS requires signature
PASS: Preview UX JS requires wallet signature
PASS: Preview UX JS blocks private key submission
PASS: Preview UX JS strips private_key field
PASS: Preview UX JS strips privateKey field
PASS: Preview UX JS strips seed phrase fields
PASS: Preview UX JS strips mnemonic field
PASS: Preview UX JS neutralizes private key fields
PASS: Preview UX JS stops normal form submission
PASS: Preview UX JS uses swap preview fallback endpoint
PASS: Preview UX JS does not call swap execute endpoint directly
PASS: Preview UX JS does not call token mint endpoint directly
PASS: coinSwap view injects preview UX JS
PASS: coinSwap view configures swap preview URL
PASS: coinSwap view configures transaction preview URL
PASS: swap view injects preview UX JS
PASS: swap view configures swap preview URL
PASS: swap view configures transaction preview URL
PASS: trade view injects preview UX JS
PASS: trade view configures swap preview URL
PASS: trade view configures transaction preview URL
PASS: Preview transaction route exists
PASS: Preview swap route exists
PASS: Preview transaction route uses CSRF
PASS: Preview swap route uses CSRF
PASS: Swap execute route remains trackable for safety monitoring
PASS: Token mint route remains trackable for safety monitoring

============================================================
RESULT
============================================================
PASS count: 31
FAIL count: 0

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-04 00:24:01 UTC+00:00

============================================================
SOLANA GUARDRAILS SMOKE
============================================================
Safety: no private keys, no broadcasts, no mainnet minting.

## Config Defaults
PASS: SOLANA_ALLOW_TRANSACTION_EXECUTION default false
PASS: SOLANA_ALLOW_MAINNET_BROADCAST default false
PASS: SOLANA_ALLOW_MAINNET_MINT default false
PASS: SOLANA_ALLOW_PRIVATE_KEY_SUBMISSION default false
PASS: SOLANA_REQUIRE_WALLET_SIGNATURE default true
PASS: SOLANA_DEFAULT_DRY_RUN default true

## Provider Library Guard Responses
PASS: MyMIRaydium::swap returns array
PASS: MyMIRaydium::swap broadcast=false
PASS: MyMIRaydium::swap dry_run=true
PASS: MyMIRaydium::swap sanitized payload
PASS: MyMIRaydium::swap safe guard message
PASS: MyMIPhantom::transfer returns array
PASS: MyMIPhantom::transfer broadcast=false
PASS: MyMIPhantom::transfer dry_run=true
PASS: MyMIPhantom::transfer sanitized payload
PASS: MyMIPhantom::transfer safe guard message
PASS: MyMIPhantom::swap returns array
PASS: MyMIPhantom::swap broadcast=false
PASS: MyMIPhantom::swap dry_run=true
PASS: MyMIPhantom::swap sanitized payload
PASS: MyMIPhantom::swap safe guard message
PASS: MyMIPhantom::createToken returns array
PASS: MyMIPhantom::createToken broadcast=false
PASS: MyMIPhantom::createToken dry_run=true
PASS: MyMIPhantom::createToken sanitized payload
PASS: MyMIPhantom::createToken safe guard message
PASS: MyMISolflare::transfer returns array
PASS: MyMISolflare::transfer broadcast=false
PASS: MyMISolflare::transfer dry_run=true
PASS: MyMISolflare::transfer sanitized payload
PASS: MyMISolflare::transfer safe guard message
PASS: MyMISolflare::swap returns array
PASS: MyMISolflare::swap broadcast=false
PASS: MyMISolflare::swap dry_run=true
PASS: MyMISolflare::swap sanitized payload
PASS: MyMISolflare::swap safe guard message
PASS: MyMISolflare::createToken returns array
PASS: MyMISolflare::createToken broadcast=false
PASS: MyMISolflare::createToken dry_run=true
PASS: MyMISolflare::createToken sanitized payload
PASS: MyMISolflare::createToken safe guard message

============================================================
RESULT
============================================================
PASS count: 41
FAIL count: 0
```

## Result
- writable/cache is created before Spark commands run.
- CodeIgniter FileLocatorCache can be written on fresh CI runners.
- Spark command audit remains passing.
- Solana Phase 16/15 safety gates remain passing.
- Permanent Solana guardrails remain passing.
