# Spark Commands Inventory

Total command PHP files scanned: **402**.

| Command | Class | File | Description | Dependencies |
|---|---|---|---|---|
| `aiops:api:schema` | `SchemaValidate` | `app/Commands/AIOps/API/SchemaValidate.php` | Validate API endpoints return JSON (optionally check required keys) | - |
| `aiops:alerts-check` | `Check` | `app/Commands/AIOps/Alerts/Check.php` | Fetch emails and queue them for processing | new: EmailQueueService, EmailScraperService |
| `aiops:alerts-clean` | `Clean` | `app/Commands/AIOps/Alerts/Clean.php` | Delete completed aiops alert queue rows older than 30 days | - |
| `aiops:alerts-health` | `Health` | `app/Commands/AIOps/Alerts/Health.php` | Run health checks on aiops alert queue and notify if failures are high | new: SlackWebhookService |
| `aiops:alerts-worker` | `Worker` | `app/Commands/AIOps/Alerts/Worker.php` | Process queued alert emails | new: SlackWebhookService |
| `aiops:audit` | `Audit` | `app/Commands/AIOps/Audit.php` | Audit aiops runtime, orchestration routes, and n8n/docs readiness | - |
| `aiops:auto:run` | `AutoRun` | `app/Commands/AIOps/AutoRun.php` | Run AIOPS using manual priorities first, falling back to log-driven auto priorities. | new: AutoRunCoordinator, ManualRunNotifier, OllamaPatchRunner |
| `aiops:backlog` | `Backlog` | `app/Commands/AIOps/Backlog.php` | Reconcile outstanding AIOPS patch workflow jobs. | new: BacklogMetaService, OllamaPatchRunner |
| `aiops:build-command` | `BuildCommand` | `app/Commands/AIOps/BuildCommand.php` | Generate a Spark command from text logic using AIOps | new: AIOpsService, CommandBuilderService |
| `aiops:chat-gov-index` | `ChatGovernanceIndex` | `app/Commands/AIOps/ChatGovernanceIndex.php` | Index ChatGPT governance steps from archived chats and sync CSV/DB outputs. | new: ChatGovernanceIndexer |
| `aiops:command-index` | `CommandIndex` | `app/Commands/AIOps/CommandIndex.php` | Scan and classify Spark commands for AIOps governance. | new: CommandHookService, CommandInventoryService |
| `aiops:continue` | `ContinueAudit` | `app/Commands/AIOps/ContinueAudit.php` | Operational audit (server + runtime focus) | new: AuditState, OpenAIClient, SeverityParser |
| `aiops:copilot:validate` | `CopilotValidate` | `app/Commands/AIOps/CopilotValidate.php` | Validate copilot instructions and Spark command safety rules. | new: CommandHookService, CommandInventoryService |
| `aiops:csp:audit` | `CspAudit` | `app/Commands/AIOps/CspAudit.php` | Scans the repository for CSP violations and writes a dated audit report. | new: RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `aiops:db:slow_scan` | `SlowScan` | `app/Commands/AIOps/DB/SlowScan.php` | Scan logs for slow query markers (best-effort) | - |
| `aiops:dedupe:report` | `DedupeReport` | `app/Commands/AIOps/DedupeReport.php` | Generate duplicate and near-duplicate instruction report. | new: AIOpsInstructionModel, InstructionService |
| `aiops:deps:add` | `DepsAdd` | `app/Commands/AIOps/DepsAdd.php` | Add dependency link: instruction depends on another instruction | new: AIOpsDependencyModel |
| `aiops:diff:format` | `DiffFormat` | `app/Commands/AIOps/DiffFormat.php` | Generate a real unified diff from current working tree | - |
| `aiops:docs-sync` | `AutoSync` | `app/Commands/AIOps/Docs/AutoSync.php` | Run documentation sync pipeline using DocsSyncEngine | service(): docsSyncEngine |
| `aiops:doctor` | `Doctor` | `app/Commands/AIOps/Doctor.php` | Validate AIOps service wiring, namespace casing, and Spark helper migration state. | service(): {$serviceName} |
| `aiops:email-scan` | `EmailScan` | `app/Commands/AIOps/EmailScan.php` | Scan alerts mailbox for new emails and record AIOps counts. | new: AiOpsRunModel, EmailScannerService |
| `aiops:form:test` | `FormTestScan` | `app/Commands/AIOps/FormTestScan.php` | Scan a form (url/file/text), map route->controller, generate payload, submit, capture logs, and queue a patch job if errors found. | new: FormIntelligenceService, FormPatchPlanner, FormTestExecutor |
| `(not set)` | `TestScan` | `app/Commands/AIOps/Forms/TestScan.php` | - | - |
| `aiops:gate:cost` | `GateCost` | `app/Commands/AIOps/GateCost.php` | Enforce daily AI cost cap; auto-disable AiOps LLM when threshold exceeded | new: AiOpsGuard |
| `aiops:governance:analyze` | `GovernanceAnalyze` | `app/Commands/AIOps/GovernanceAnalyze.php` | Analyze token usage + model anomalies | - |
| `aiops:health:full` | `HealthFull` | `app/Commands/AIOps/HealthFull.php` | Run full system health checks and generate a consolidated report | - |
| `aiops:ingest` | `Ingest` | `app/Commands/AIOps/Ingest.php` | Ingest AI instruction text and enqueue for AIOps worker (analysis + patch + PR prep) | new: InstructionService |
| `aiops:init` | `Init` | `app/Commands/AIOps/Init.php` | Initialize and validate the AIOps PR factory (one-time or rare use). | - |
| `aiops:scan:integrity` | `IntegrityScan` | `app/Commands/AIOps/IntegrityScan.php` | Scan CI4 app integrity for command inheritance, support files, view paths, and unsafe trim usage. | service(): locator |
| `aiops:manual:index` | `ManualIndex` | `app/Commands/AIOps/ManualIndex.php` | Index AI manual documentation under docs/_aiops/manual | - |
| `aiops:manual:run` | `ManualRun` | `app/Commands/AIOps/ManualRun.php` | Run manual-priority AIOPS correlation, state refresh, and PR creation. | new: ManualPriorityRunner, ManualRunNotifier |
| `aiops:n8n:logs` | `Logs` | `app/Commands/AIOps/N8n/Logs.php` | Tail n8n logs | - |
| `aiops:n8n:restart` | `Restart` | `app/Commands/AIOps/N8n/Restart.php` | Restart n8n | - |
| `aiops:n8n:start` | `Start` | `app/Commands/AIOps/N8n/Start.php` | Start n8n | - |
| `aiops:n8n:stop` | `Stop` | `app/Commands/AIOps/N8n/Stop.php` | Stop n8n | - |
| `aiops:observe:cost` | `Cost` | `app/Commands/AIOps/Observe/Cost.php` | Correlate observability signals with AI cost logs | - |
| `aiops:observe:hash` | `Hash` | `app/Commands/AIOps/Observe/Hash.php` | Fingerprint recurring errors into stable hashes | new: ErrorFingerprint |
| `aiops:observe:map` | `Map` | `app/Commands/AIOps/Observe/Map.php` | Map errors to routes and controllers | - |
| `aiops:observe:patch` | `Patch` | `app/Commands/AIOps/Observe/Patch.php` | Create patch file from suggestions | - |
| `aiops:observe:regression` | `Regression` | `app/Commands/AIOps/Observe/Regression.php` | Detect fingerprint regressions vs previous snapshot | - |
| `aiops:observe:scan` | `Scan` | `app/Commands/AIOps/Observe/Scan.php` | Scan logs and persist recurring errors | - |
| `aiops:observe:snapshot` | `Snapshot` | `app/Commands/AIOps/Observe/Snapshot.php` | Snapshot fingerprint map for regression detection | - |
| `aiops:observe:suggest` | `Suggest` | `app/Commands/AIOps/Observe/Suggest.php` | Generate fix suggestions for recurring errors | new: OpenAIClient |
| `aiops:observe` | `Observe` | `app/Commands/AIOps/Observe.php` | Parse logs and detect recurring error signatures | - |
| `aiops:pr:auto` | `PRAuto` | `app/Commands/AIOps/PRAuto.php` | Full safe pipeline: observe → validate → regression → PR | - |
| `aiops:pr:create` | `PRCreate` | `app/Commands/AIOps/PRCreate.php` | Create a branch, push, and open a PR (requires token + enabled flags) | new: GitHubClient |
| `aiops:patch:apply` | `Apply` | `app/Commands/AIOps/Patch/Apply.php` | Safely apply AI-generated patch under guardrails | new: GuardedPatchApplier |
| `aiops:patch:dry_run` | `DryRun` | `app/Commands/AIOps/Patch/DryRun.php` | Apply patch in temporary branch | - |
| `aiops:patch:hallucination` | `Hallucination` | `app/Commands/AIOps/Patch/Hallucination.php` | Detect hallucinated symbols in aiops_generated_patch.diff before apply | new: PatchHallucinationDetector |
| `aiops:patch:risk_score` | `RiskScore` | `app/Commands/AIOps/Patch/RiskScore.php` | Calculate patch risk score | new: PatchRiskScorer |
| `aiops:patch:validate` | `Validate` | `app/Commands/AIOps/Patch/Validate.php` | Validate PHP syntax after patch apply | - |
| `aiops:priority:build` | `PriorityBuildCommand` | `app/Commands/AIOps/PriorityBuildCommand.php` | Scan /docs, detect gaps, verify repo, stage codegen artifacts for PR batching, and write /docs/priority outputs. | service(): aiopsDocsScanner, aiopsOllamaCodeGen, aiopsPriorityWriter, aiopsRepoVerifier |
| `aiops:public-pages:audit` | `Audit` | `app/Commands/AIOps/PublicPages/Audit.php` | Audit public pages schema coverage, freshness, and governance conditions. | - |
| `aiops:public-pages:import` | `Import` | `app/Commands/AIOps/PublicPages/Import.php` | Import docs/_aiops/inputs/public_pages.csv into bf_public_pages_catalog. | - |
| `aiops:public-pages:report` | `Report` | `app/Commands/AIOps/PublicPages/Report.php` | Generate report artifacts for a public pages run. | - |
| `aiops:public-pages:run` | `Run` | `app/Commands/AIOps/PublicPages/Run.php` | Run public pages source collection and draft generation. | new: PublicPagesPipelineService |
| `aiops:redis:stats` | `Stats` | `app/Commands/AIOps/Redis/Stats.php` | Fetch Redis INFO stats (best-effort) | - |
| `aiops:repair` | `Repair` | `app/Commands/AIOps/Repair.php` | Apply safe aiops repairs | new: Date |
| `aiops:repair:run` | `RepairRun` | `app/Commands/AIOps/RepairRun.php` | Full autonomous repair pipeline | - |
| `aiops:repair:run_safe` | `RepairRunSafe` | `app/Commands/AIOps/RepairRunSafe.php` | Run repair pipeline with rollback safety + gating before PR | - |
| `aiops:rollback` | `Rollback` | `app/Commands/AIOps/Rollback.php` | Rollback working tree to clean state (hard reset) | - |
| `aiops:routes:compare` | `Compare` | `app/Commands/AIOps/Routes/Compare.php` | Compare staging vs production routes scan | new: MultiCurl<br>api: https://dev.mymiwallet.com, https://mymiwallet.com |
| `aiops:routes:gate` | `Gate` | `app/Commands/AIOps/Routes/Gate.php` | Gate based on routes_scan.json thresholds | - |
| `aiops:routes:regress` | `Regress` | `app/Commands/AIOps/Routes/Regress.php` | Detect route scan regressions vs previous snapshot | - |
| `aiops:routes:scan` | `Scan` | `app/Commands/AIOps/Routes/Scan.php` | Scan Routes.php (GET routes), parallel curl, write JSON+CSV+snapshot | new: MultiCurl |
| `aiops:routes:scan_auth` | `ScanAuth` | `app/Commands/AIOps/Routes/ScanAuth.php` | Authenticated scan using AIOPS_AUTH_COOKIE | new: MultiCurl |
| `aiops:run` | `Run` | `app/Commands/AIOps/Run.php` | Manually run the AI-Ops worker and generate docs/_aiops reports | new: OllamaPatchRunner |
| `aiops:graph:run` | `RunGraph` | `app/Commands/AIOps/RunGraph.php` | Execute queued instructions respecting dependency graph (runs worker iteratively). | new: DependencyResolver |
| `aiops:scan:cells` | `ScanCells` | `app/Commands/AIOps/ScanCells.php` | Stateful scanner for repeated UI blocks and Cell candidates. | new: AiOpsScanStateModel, CellDiscoveryScanner |
| `aiops:seed` | `Seed` | `app/Commands/AIOps/Seed.php` | Seed default AI Ops caps and pricing configuration. | - |
| `aiops:self-heal` | `SelfHeal` | `app/Commands/AIOps/SelfHeal.php` | Run one-pass self-heal | - |
| `aiops:sql:check` | `SqlCheck` | `app/Commands/AIOps/SqlCheck.php` | Validate model/table/query SQL compatibility against live schema. | new: SchemaInspectorService |
| `aiops:status` | `Status` | `app/Commands/AIOps/Status.php` | AIOps runtime status | new: AiOpsServiceManager |
| `aiops:sync-perf` | `SyncPerfRoutes` | `app/Commands/AIOps/SyncPerfRoutes.php` | Scan Routes.php and sync perf_urls.txt automatically | - |
| `aiops:unlock` | `Unlock` | `app/Commands/AIOps/Unlock.php` | Manually unlock an AIOPS patch job and reset retries. | new: BacklogMetaService |
| `aiops:watch` | `Watch` | `app/Commands/AIOps/Watch.php` | Continuous aiops audit watcher | - |
| `aiops:worker` | `Worker` | `app/Commands/AIOps/Worker.php` | Process queued AIOps instructions (governance + targeting + diff + optional PR). | new: BranchLockService, DependencyResolver, DiffBuilder, GitHubPRService, GovernanceScorer, InstructionService … |
| `aiops:worker:logs` | `WorkerLogs` | `app/Commands/AIOps/WorkerLogs.php` | Summarize logs, ingest actionable issues, and run aiops worker once. | new: AIOpsInstructionModel, InstructionService, LogSummarizeService |
| `api:audit` | `ApiAudit` | `app/Commands/API/ApiAudit.php` | Institutional API governance audit: routes, permissions, filters, rate limits, and versioning. | new: ApiGovernanceService |
| `api:filters-check` | `ApiFiltersCheck` | `app/Commands/API/ApiFiltersCheck.php` | Fail on CRITICAL uncovered endpoints by filter governance. | new: ApiGovernanceService |
| `api:list` | `ApiList` | `app/Commands/API/ApiList.php` | List endpoints with filters, auth indicator, and version. | new: ApiGovernanceService |
| `api:permissions` | `ApiPermissions` | `app/Commands/API/ApiPermissions.php` | Generate endpoint permission matrix in markdown and JSON. | new: ApiGovernanceService |
| `api:rate-limit-check` | `ApiRateLimitCheck` | `app/Commands/API/ApiRateLimitCheck.php` | Fail when external/API-like endpoints have no rate-limit enforcement metadata. | new: ApiGovernanceService |
| `api:versioning-check` | `ApiVersioningCheck` | `app/Commands/API/ApiVersioningCheck.php` | Detect API endpoints missing /API/vN namespace and emit remediation. | new: ApiGovernanceService |
| `alerts:audit` | `Audit` | `app/Commands/Alerts/Audit.php` | Audit recent scraped alert emails against generated trade alerts. | new: AlertsModel, ReflectionMethod |
| `alerts:forecast` | `Forecast` | `app/Commands/Alerts/Forecast.php` | Refresh forecasts for open alerts. | service(): mymiForecaster |
| `alerts:ingest` | `Ingest` | `app/Commands/Alerts/Ingest.php` | Ingest ThinkorSwim alert emails and upsert trade alerts. | new: AiOpsIngestRunModel, AlertsModel, MyMIAlerts |
| `alerts:parse-test` | `ParseTest` | `app/Commands/Alerts/ParseTest.php` | Parse a broker email sample and output normalized execution data. | new: ThinkorSwimParser |
| `app:api:audit` | `APIAuditPro` | `app/Commands/App/APIAuditPro.php` | Advanced API audit: groups, filters, duplicates, OpenAPI, Postman, probe mode. | new: RecursiveDirectoryIterator, RecursiveIteratorIterator<br>api: https://schema.getpostman.com/json/collection/v2.1.0/collection.json |
| `app:api:list` | `APIList` | `app/Commands/App/APIList.php` | List complete APIs from latest audit report. | - |
| `app:controller:audit` | `ControllerAudit` | `app/Commands/App/ControllerAudit.php` | Audit controllers for unsafe initController patterns, score severity, suggest patches, optional safe auto-fix, and regression diff. | service(): authentication, session<br>new: RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `app:gate:coverage` | `CoverageGate` | `app/Commands/App/CoverageGate.php` | Gate on PHPUnit coverage if available (coverage-text). | - |
| `app:healthcheck` | `Healthcheck` | `app/Commands/App/Healthcheck.php` | Compatibility healthcheck command aligned to AI-Ops spark checks. | new: LogHealthcheckService |
| `app:test` | `Test` | `app/Commands/App/Test.php` | Run PHPUnit test suite | - |
| `app:update` | `AppUpdate` | `app/Commands/AppUpdate.php` | Deprecated. Use ops:app:update instead. | - |
| `audit:all` | `All` | `app/Commands/Audit/All.php` | Full system visibility audit | - |
| `audit:node` | `NodeAudit` | `app/Commands/Audit/NodeAudit.php` | Detect tracked node_modules and native build artifacts (read-only). | - |
| `audit:psr4` | `AuditPsr4` | `app/Commands/AuditPsr4.php` | Audit PSR-4 compliance for the app namespace. | - |
| `auth:audit` | `Audit` | `app/Commands/Auth/Audit.php` | Audit Myth:Auth authentication and account lifecycle flows end-to-end, including registration, login, and reset flows. | new: AuthAuditRunner |
| `auth:flow-smoke` | `FlowSmoke` | `app/Commands/Auth/FlowSmoke.php` | Smoke test for auth redirect safety and login route no-cache headers. | service(): response<br>helper(): 'url'<br>new: AuthController, ReflectionMethod<br>api: https://evil.example |
| `auth:funnel-check` | `FunnelCheck` | `app/Commands/Auth/FunnelCheck.php` | Check auth funnel sanity using recent user events and emit alerts on drop-offs. | new: AuthFunnelCheckService, DateInterval, DateTimeImmutable |
| `auth:smoke` | `Smoke` | `app/Commands/Auth/Smoke.php` | Run a safe authentication smoke test and record health results for ops visibility. | new: AuthSmokeService |
| `auth:smoke-test` | `SmokeTest` | `app/Commands/Auth/SmokeTest.php` | Deterministic Myth/Auth smoke test for login/session/reset flow. | new: AuthSmokeService |
| `(not set)` | `BaseAiopsCommand` | `app/Commands/Base/BaseAiopsCommand.php` | - | - |
| `cache:audit` | `CacheAudit` | `app/Commands/CacheAudit.php` | Scan the repo for unsafe cache key usage. | new: RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `chat:audit` | `Audit` | `app/Commands/Chat/Audit.php` | Chat audit | - |
| `chat:logs` | `Logs` | `app/Commands/Chat/Logs.php` | Tail persisted chat logs from writable/logs/chat. | - |
| `chat:repair` | `Repair` | `app/Commands/Chat/Repair.php` | Chat repairs | - |
| `chat:restart` | `Restart` | `app/Commands/Chat/Restart.php` | Restart chat | - |
| `chat:start` | `Start` | `app/Commands/Chat/Start.php` | Start chat | - |
| `chat:status` | `Status` | `app/Commands/Chat/Status.php` | Chat status with PID and listening-port verification. | - |
| `chat:stop` | `Stop` | `app/Commands/Chat/Stop.php` | Stop chat | - |
| `chat:unlock` | `Unblock` | `app/Commands/Chat/Unblock.php` | Safely clear stale chat runtime lock and pid files. | - |
| `codex:audit` | `Audit` | `app/Commands/Codex/Audit.php` | Full repository audit via OpenAI | api: https://api.openai.com/v1/chat/completions |
| `codex:continue` | `ContinueAudit` | `app/Commands/Codex/ContinueAudit.php` | Continue audit in batches (default 5 files) with OpenAI + severity tracking | new: AuditState, CostTracker, OpenAIClient, SeverityParser |
| `codex:gate` | `Gate` | `app/Commands/Codex/Gate.php` | Fail build if high severity issues exist | new: AuditState |
| `codex:gate:severity` | `GateSeverity` | `app/Commands/Codex/GateSeverity.php` | Fail if severity counters exceed thresholds | new: AuditState |
| `codex:index` | `Index` | `app/Commands/Codex/Index.php` | Index repository and initialize audit state | new: AuditState |
| `codex:instruct:audit` | `Audit` | `app/Commands/Codex/Instructions/Audit.php` | Batch review repository files via OpenAI API | api: https://api.openai.com/v1/chat/completions |
| `codex:instruct:devops_review` | `DevOpsReview` | `app/Commands/Codex/Instructions/DevOpsReview.php` | Generate instruction payload to audit AI DevOps layer against docs/* | - |
| `codex:instruct:summarize` | `Summarize` | `app/Commands/Codex/Instructions/Summarize.php` | Generate structured AI documentation summary template | - |
| `codex:review` | `Review` | `app/Commands/Codex/Review.php` | Generate Codex review artifacts (summary + prompt payload) | - |
| `codex:review:commit` | `ReviewCommit` | `app/Commands/Codex/ReviewCommit.php` | Commit Codex review artifacts intentionally (latest or by date). | - |
| `codex:review:list` | `ReviewList` | `app/Commands/Codex/ReviewList.php` | List available Codex review artifacts stored under docs. | - |
| `codex:review:pr-outbox` | `ReviewPrOutbox` | `app/Commands/Codex/ReviewPrOutbox.php` | Review the latest PR outbox bundle and publish CODEX_REVIEW.md. | - |
| `codex:review:publish` | `ReviewPublish` | `app/Commands/Codex/ReviewPublish.php` | Aggregate governance lint results and publish review artifacts. | new: CommandRulesScanner |
| `codex:status` | `Status` | `app/Commands/Codex/Status.php` | Show audit status | new: AuditState |
| `app:compat-audit` | `CompatAudit` | `app/Commands/CompatAudit.php` | Audit MyMI Wallet for CI4 + PHP compatibility issues. | helper(): , "text" |
| `config:drift` | `Drift` | `app/Commands/Config/Drift.php` | Compare deployed config and environment to repo baselines. | - |
| `config:clear` | `ConfigClear` | `app/Commands/ConfigClear.php` | Clear configuration-related caches safely (guarded). | - |
| `config:lint` | `ConfigLint` | `app/Commands/ConfigLint.php` | Lint Config/Services.php overrides against CI4 service signatures. | new: ConfigLintService |
| `contentengine:smoke` | `ContentEngineSmoke` | `app/Commands/ContentEngineSmoke.php` | End-to-end smoke test for the Content Engine ingest → scoring → drafts pipeline. | new: PostDraftService, ScannerIngestService, ScannerScoringService |
| `content:ingest-sample` | `ContentIngestSample` | `app/Commands/ContentIngestSample.php` | Load sample Daily Top Gainers JSON, ingest, score, and print the top 5 ideas. | new: PostDraftService, ScannerIngestService, ScannerScoringService |
| `(not set)` | `(unknown)` | `app/Commands/Contracts/AiOpsRunnable.php` | - | - |
| `(not set)` | `(unknown)` | `app/Commands/Contracts/DryRunCapable.php` | - | - |
| `(not set)` | `(unknown)` | `app/Commands/Contracts/RequiresApproval.php` | - | - |
| `controller:profile` | `ControllerProfile` | `app/Commands/ControllerProfile.php` | Profile controller boot performance. | - |
| `db:apply-docs` | `ApplyDocs` | `app/Commands/Database/ApplyDocs.php` | Compile SQL from docs/mysql and apply statements with audit logging. | new: DbApplyDocsService |
| `db:drift` | `Drift` | `app/Commands/Database/Drift.php` | Compare live schema to expected inventory. | - |
| `db:inventory` | `Inventory` | `app/Commands/Database/Inventory.php` | Scan code and migrations to inventory MyMI Wallet tables and generate integrity docs/SQL adjustments. | new: DbInventoryService |
| `migrate:dry-run` | `MigrateDryRun` | `app/Commands/Database/MigrateDryRun.php` | List pending migrations without executing them. | - |
| `discord:list` | `GetList` | `app/Commands/Discord/GetList.php` | List configured Discord channels/webhooks/IDs from config and database. | - |
| `discord:process-queue` | `ProcessQueue` | `app/Commands/Discord/ProcessQueue.php` | Process queued Discord messages respecting quiet hours and pacing. | new: MyMIDiscord |
| `discord:test` | `Test` | `app/Commands/Discord/Test.php` | Send a test payload through the Discord queue pipeline. | new: MyMIDiscord |
| `discord:test-liquidity` | `TestLiquidity` | `app/Commands/Discord/TestLiquidity.php` | Send a test Liquidity Scan alert to alerts.liquidity channel | new: MyMIDiscord |
| `discord:wire-check` | `WireCheck` | `app/Commands/Discord/WireCheck.php` | Validate Discord env vars, tables, and queue health for MyMIDiscord. | new: MyMIDiscord |
| `docs:architecture:graph` | `ArchitectureGraph` | `app/Commands/Docs/ArchitectureGraph.php` | Generate CI4 architecture graph | - |
| `docs:architecture-map` | `ArchitectureMap` | `app/Commands/Docs/ArchitectureMap.php` | Generate architecture map of CI4 application | - |
| `docs:audit` | `AuditDocs` | `app/Commands/Docs/AuditDocs.php` | Audit CI4 codebase vs /docs documentation | - |
| `docs:build-how-it-works-nav` | `BuildHowItWorksNavigation` | `app/Commands/Docs/BuildHowItWorksNavigation.php` | Build How-It-Works navigation partial from view files and docs/how-it-works markdown files. | new: DocsRendererService |
| `docs:database:map` | `DatabaseMap` | `app/Commands/Docs/DatabaseMap.php` | - | - |
| `docs:dependencies:map` | `DependenciesMap` | `app/Commands/Docs/DependenciesMap.php` | - | - |
| `docs:test` | `Test` | `app/Commands/Docs/DocsTest.php` | Test DocsService loading and navigation | service(): docs |
| `docs:views:export` | `ExportViewTxt` | `app/Commands/Docs/Exports/ExportViewTxt.php` | - | - |
| `docs:full-audit` | `FullDocsAudit` | `app/Commands/Docs/FullDocsAudit.php` | - | - |
| `docs:readme:build` | `DocsReadmeBuilder` | `app/Commands/Docs/Generate/DocsReadmeBuilder.php` | - | - |
| `docs:generate-architecture-map` | `GenerateArchitectureMap` | `app/Commands/Docs/GenerateArchitectureMap.php` | Generate docs/_architecture_map.json from read-only repository scans. | new: RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `docs:generate-knowledge-graph` | `GenerateKnowledgeGraph` | `app/Commands/Docs/GenerateKnowledgeGraph.php` | Generate docs/_knowledge_graph.json linking docs, views, routes, controllers, services, and health scans. | new: DocsRendererService, RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `docs:generate-missing` | `GenerateMissingDocs` | `app/Commands/Docs/GenerateMissingDocs.php` | Generate documentation for undocumented controllers | - |
| `docs:inventory` | `InventoryDocs` | `app/Commands/Docs/InventoryDocs.php` | Scan /docs directory and generate docs/_inventory.md | - |
| `docs:modules:map` | `ModulesMap` | `app/Commands/Docs/ModulesMap.php` | - | - |
| `docs:routes:inventory` | `RoutesInventory` | `app/Commands/Docs/RoutesInventory.php` | - | service(): routes |
| `docs:controllers:list` | `ControllersList` | `app/Commands/Docs/Scan/ControllersList.php` | List all module controllers | - |
| `docs:services:list` | `ServiceList` | `app/Commands/Docs/Scan/ServiceList.php` | List all Services classes | - |
| `docs:views:dirs` | `ViewDirectories` | `app/Commands/Docs/Scan/ViewDirectories.php` | - | - |
| `docs:views:list` | `ViewFiles` | `app/Commands/Docs/Scan/ViewFiles.php` | - | - |
| `docs:scan-orphan-routes` | `ScanOrphanRoutes` | `app/Commands/Docs/ScanOrphanRoutes.php` | Detect routes that do not map to existing controller methods. | - |
| `docs:scan-orphan-views` | `ScanOrphanViews` | `app/Commands/Docs/ScanOrphanViews.php` | Detect views that are not referenced by controllers. | new: RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `docs:scan-undocumented-controllers` | `ScanUndocumentedControllers` | `app/Commands/Docs/ScanUndocumentedControllers.php` | Detect controllers with no docs markdown references. | new: RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `docs:spark:inventory` | `SparkCommandsInventory` | `app/Commands/Docs/SparkCommandsInventory.php` | - | - |
| `docs:sync-all` | `SyncAllDocs` | `app/Commands/Docs/SyncAllDocs.php` | Run full documentation pipeline | - |
| `docs:sync-code` | `SyncCodeFromDocs` | `app/Commands/Docs/SyncCodeFromDocs.php` | Analyze /docs and generate repository patches to align code with documentation. | service(): docsSyncEngine |
| `docs:sync-system` | `SyncDocsSystem` | `app/Commands/Docs/SyncDocsSystem.php` | - | - |
| `dreamhost:dns-test` | `DNSTest` | `app/Commands/DreamHost/DNSTest.php` | Resolve DNS for a given host. | - |
| `dreamhost:env` | `EnvDebug` | `app/Commands/DreamHost/EnvDebug.php` | Display relevant DreamHost environment variables. | - |
| `dreamhost:imap-capabilities` | `ImapCapabilities` | `app/Commands/DreamHost/ImapCapabilities.php` | Probe IMAP greeting/capabilities/mailboxes and print detailed errors. | - |
| `dreamhost:imap-flag-sweep` | `ImapFlagSweep` | `app/Commands/DreamHost/ImapFlagSweep.php` | Try multiple IMAP connection flag variants and report which one connects. | - |
| `dreamhost:imap-test` | `ImapTest` | `app/Commands/DreamHost/ImapTest.php` | Test IMAP SSL connectivity to DreamHost mailbox. | - |
| `dreamhost:port-test` | `PortTest` | `app/Commands/DreamHost/PortTest.php` | Test raw TCP connection to host:port. | - |
| `dreamhost:ssl-test` | `SSLTest` | `app/Commands/DreamHost/SSLTest.php` | Test raw SSL connection to a host/port. | - |
| `dreamhost:smtp-probe` | `SmtpProbe` | `app/Commands/DreamHost/SmtpProbe.php` | Probe SMTP endpoints (465 SSL, 587 STARTTLS) and print handshake banner. | - |
| `env:doctor` | `EnvDoctor` | `app/Commands/Env/EnvDoctor.php` | Environment diagnostics and snapshot. | new: EnvDoctorService |
| `app:logs:consolidate` | `ConsolidateErrors` | `app/Commands/Errors/ConsolidateErrors.php` | Consolidate bf_error_logs into categorized grouped records. | - |
| `spark:diagnose-502` | `Diagnose502` | `app/Commands/Errors/Diagnose502.php` | Diagnose common 502 causes (php-fpm, nginx, socket). | - |
| `spark:diagnose-503` | `Diagnose503` | `app/Commands/Errors/Diagnose503.php` | Diagnose common 503 causes (cache, maintenance, upstream). | - |
| `app:errors:dispatch` | `DispatchAlerts` | `app/Commands/Errors/DispatchAlerts.php` | Evaluate alert rules and send notifications. | new: ErrorAlertService |
| `app:errors:learn` | `LearnPatterns` | `app/Commands/Errors/LearnPatterns.php` | AI-assisted learning of consolidated error patterns into bf_error_patterns. | new: ErrorPatternLearnerService |
| `fix:503` | `Fix503` | `app/Commands/Fix503.php` | Diagnose and attempt safe auto-fixes for 503 errors. | new: CommandRunner, EnvDoctorService, HostingModeDetector<br>api: https://www.mymiwallet.com |
| `forecasts:evaluate` | `ForecastEvaluate` | `app/Commands/ForecastEvaluate.php` | Evaluate forecasts for accuracy windows. | service(): forecastAccuracyEvaluator |
| `gap:sync` | `GapTrackerSync` | `app/Commands/GapTrackerSync.php` | Enrich gap tracker CSV and produce a report. | new: AiOpsManager |
| `gighop:dispatch:optimize` | `DispatchOptimize` | `app/Commands/GigHop/DispatchOptimize.php` | Runs safe dispatch optimization analysis for GigHop routes. | helper(): ['cli', 'log'] |
| `gighop:health` | `Health` | `app/Commands/GigHop/Health.php` | Checks GigHop operational health (drivers, gigs, queue). | service(): aiopsService<br>helper(): ['aiops', 'cli'] |
| `gighop:zones:validate` | `ZonesValidate` | `app/Commands/GigHop/ZonesValidate.php` | Validates GigHop zone configuration integrity. | helper(): 'cli' |
| `github:branch` | `Branch` | `app/Commands/GitHub/Branch.php` | Create and switch to a new feature branch. | service(): git |
| `github:commit` | `Commit` | `app/Commands/GitHub/Commit.php` | Stage tracked changes and create a git commit. | service(): git |
| `github:pr:create` | `CreatePR` | `app/Commands/GitHub/CreatePR.php` | Create a GitHub pull request for the current branch. | service(): git, github |
| `github:health` | `Health` | `app/Commands/GitHub/Health.php` | Show a lightweight repository and remote health summary. | service(): git |
| `github:pull` | `Pull` | `app/Commands/GitHub/Pull.php` | Pull the current branch from origin with rebase. | service(): git |
| `git:pull:safe` | `PullSafe` | `app/Commands/GitHub/PullSafe.php` | Safely pull origin/main by stashing local changes and optionally resetting generated artifacts. | - |
| `github:push` | `Push` | `app/Commands/GitHub/Push.php` | Push the current branch to origin. | service(): git |
| `github:search` | `SearchRepo` | `app/Commands/GitHub/SearchRepo.php` | Search the local git repository for a given string or pattern. | - |
| `github:status` | `Status` | `app/Commands/GitHub/Status.php` | Show repository branch and working tree status. | service(): git |
| `github:sync` | `Sync` | `app/Commands/GitHub/Sync.php` | Commit pending changes when needed, then pull and push the current branch. | service(): git |
| `git:sync-safe` | `SyncSafe` | `app/Commands/GitHub/SyncSafe.php` | Safely sync repository with origin/main with automatic stash handling | - |
| `git:workspace:guard` | `WorkspaceGuard` | `app/Commands/GitHub/WorkspaceGuard.php` | Detects workspace conditions that commonly block pulls/PRs. | - |
| `git:workspace:repair` | `WorkspaceRepair` | `app/Commands/GitHub/WorkspaceRepair.php` | Repairs git workspace when generated files block pull operations. | - |
| `growth:retention-watch` | `RetentionWatch` | `app/Commands/Growth/RetentionWatch.php` | Detect retention anomalies from engagement signals. | - |
| `gtm:cron:validate-security` | `GtmCronRouteSecurityValidation` | `app/Commands/GtmCronRouteSecurityValidation.php` | Validate INTERNAL_CRON and /API/Management routes reject missing/invalid tokens. | api: http://127.0.0.1 |
| `gtm:health:snapshot` | `GtmHealthSnapshot` | `app/Commands/GtmHealthSnapshot.php` | Generate deterministic GTM daily health snapshot markdown report. | - |
| `gtm:launch:audit` | `GtmLaunchAudit` | `app/Commands/GtmLaunchAudit.php` | Generate go-live launch readiness audit for Phase A user surfaces. | service(): commands |
| `gtm:launch:smoke` | `GtmLaunchSmoke` | `app/Commands/GtmLaunchSmoke.php` | Run non-destructive HTTP smoke checks for Phase A user navigation surfaces. | api: http://127.0.0.1 |
| `health:cache` | `Cache` | `app/Commands/Health/Cache.php` | Check CI4 writable cache directories for access. | - |
| `health:disk` | `Disk` | `app/Commands/Health/Disk.php` | Check disk and inode usage for the host. | new: CommandRunner |
| `health:git-safety` | `GitSafety` | `app/Commands/Health/GitSafety.php` | Check git ignore rules for env/writable and tracked secrets. | new: CommandRunner |
| `health:services` | `Services` | `app/Commands/Health/Services.php` | Detect web server + PHP handler status without systemctl. | new: CommandRunner, HostingModeDetector |
| `investments:economy:updateall` | `EconomyUpdateAll` | `app/Commands/Investments/EconomyUpdateAll.php` | Fetch and store economic indicators from FRED into local tables. | new: EconomicDataService |
| `logger:audit` | `Audit` | `app/Commands/Logger/Audit.php` | Audit logger handlers for overlap and recursion risks. | new: Logger |
| `app:logs:check-server` | `CheckServerLogs` | `app/Commands/Logs/CheckServerLogs.php` | Check external Apache/Nginx error.log | - |
| `logs:doctor` | `Doctor` | `app/Commands/Logs/Doctor.php` | Validate CI4 logging and debug visibility plumbing. | - |
| `app:logs:enable-full` | `EnableFullLogging` | `app/Commands/Logs/EnableFullLogging.php` | Force CI4 to log all levels with DB + PHP fallback enabled. | - |
| `logs:healthcheck` | `Healthcheck` | `app/Commands/Logs/Healthcheck.php` | Emit test logs and verify file + DB log sinks are functioning. | new: LogHealthcheckService |
| `logs:summarize` | `Summarize` | `app/Commands/Logs/Summarize.php` | Summarize CI4 logs for a given date, including new entries since the last run. | new: LogSummarizeService, WorkerLogs |
| `logs:summarize-all` | `SummarizeAll` | `app/Commands/Logs/SummarizeAll.php` | Summarize logs for all known subsystems from writable/logs/** and emit docs/_aiops/logs markdown reports. | - |
| `logs:full-report` | `LogsFullReport` | `app/Commands/LogsFullReport.php` | Summarize CI4 + Apache + PHP logs for a given date. | - |
| `logs:test` | `LogsTest` | `app/Commands/LogsTest.php` | Canonical logging test command (writes debug/info/error and validates file + DB sinks). | new: LogHealthcheckService |
| `mail:send` | `Send` | `app/Commands/Mail/Send.php` | Process and send queued mail jobs. | new: MailService |
| `mail:send-test` | `SendTest` | `app/Commands/Mail/SendTest.php` | Send a test email using branded templates. | new: MailService |
| `mail:test` | `Test` | `app/Commands/Mail/Test.php` | Send a DreamHost SMTP test email and output transport diagnostics. | service(): email |
| `mail:verify` | `Verify` | `app/Commands/Mail/Verify.php` | Verify SMTP settings by sending a diagnostic email. | service(): email |
| `marketing:automation-audit` | `AutomationAudit` | `app/Commands/Marketing/AutomationAudit.php` | Verify marketing automations, cron hooks, and API usage expectations. | - |
| `master:health:commands` | `Commands` | `app/Commands/Master/Health/Commands.php` | Inspect Spark command inventory and metadata. | new: RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `master:health:controllers` | `Controllers` | `app/Commands/Master/Health/Controllers.php` | Inspect controllers for basic CI4 health issues. | new: RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `master:health:dependencies` | `Dependencies` | `app/Commands/Master/Health/Dependencies.php` | Inspect service(), model, and view dependency references across controllers. | new: RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `master:health:docs` | `Docs` | `app/Commands/Master/Health/Docs.php` | Inspect docs directory health and summary coverage. | new: RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `master:health:logs` | `Logs` | `app/Commands/Master/Health/Logs.php` | Inspect writable/logs for current log file health. | - |
| `master:health:models` | `Models` | `app/Commands/Master/Health/Models.php` | Inspect models for table mapping and basic CI4 model metadata. | new: RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `master:health:routes` | `Routes` | `app/Commands/Master/Health/Routes.php` | Inspect route configuration files and emit a health report. | - |
| `master:health:services` | `Services` | `app/Commands/Master/Health/Services.php` | Inspect service classes and app/Config/Services.php references. | - |
| `master:health:views` | `Views` | `app/Commands/Master/Health/Views.php` | Inspect views inventory and view directory health. | new: RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `master:knowledge-graph:build` | `KnowledgeGraphBuild` | `app/Commands/Master/KnowledgeGraphBuild.php` | Build a CI4 knowledge graph from controllers, routes, models, services, views, and commands. | new: RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `master:run-all` | `RunAll` | `app/Commands/Master/RunAll.php` | Run the master docs, graph, and health pipeline. | - |
| `mdit:nav:compute_daily` | `MditNavComputeDaily` | `app/Commands/MditNavComputeDaily.php` | Compute and snapshot the daily MDIT NAV. | new: MditNavService |
| `news:audit` | `NewsAudit` | `app/Commands/NewsAudit.php` | Audit recent marketing news ingestion, summarization, and post generation. | - |
| `(not set)` | `BaseOllamaCommand` | `app/Commands/Ollama/BaseOllamaCommand.php` | - | new: OllamaClient, OllamaRunModel |
| `ollama:bench` | `Bench` | `app/Commands/Ollama/Bench.php` | Benchmarks latency and throughput for prompt set. | - |
| `ollama:chat` | `Chat` | `app/Commands/Ollama/Chat.php` | Chat completion with optional session persistence. | new: OllamaSessionModel |
| `ollama:circuit:reset` | `Reset` | `app/Commands/Ollama/Circuit/Reset.php` | Resets circuit breaker state. | - |
| `ollama:circuit:status` | `Status` | `app/Commands/Ollama/Circuit/Status.php` | Shows circuit breaker state. | - |
| `ollama:circuit:reset` | `CircuitReset` | `app/Commands/Ollama/CircuitReset.php` | Resets Ollama circuit breaker. | new: OllamaCircuitBreaker |
| `ollama:circuit:status` | `CircuitStatus` | `app/Commands/Ollama/CircuitStatus.php` | Shows Ollama circuit breaker state. | new: OllamaCircuitBreaker |
| `ollama:diagnose` | `Diagnose` | `app/Commands/Ollama/Diagnose.php` | Operator diagnostic report for Ollama connectivity and env. | - |
| `ollama:docs:inventory` | `Inventory` | `app/Commands/Ollama/Docs/Inventory.php` | Builds docs embedding/metadata manifest. | - |
| `ollama:docs:sync` | `Sync` | `app/Commands/Ollama/Docs/Sync.php` | Regenerates Ollama inventory and policy docs. | - |
| `ollama:doctor` | `Doctor` | `app/Commands/Ollama/Doctor.php` | Deep diagnostics for Ollama connectivity and runtime hints. | - |
| `ollama:embed` | `Embed` | `app/Commands/Ollama/Embed.php` | Generates embedding vector for input text. | - |
| `ollama:embed:file` | `EmbedFile` | `app/Commands/Ollama/EmbedFile.php` | Embeds file chunks into vector storage. | - |
| `ollama:generate` | `Generate` | `app/Commands/Ollama/Generate.php` | Runs single prompt generate against Ollama. | new: OllamaCircuitBreaker |
| `ollama:health` | `Health` | `app/Commands/Ollama/Health.php` | Checks endpoint reachability and readiness. | - |
| `ollama:logs:export` | `Export` | `app/Commands/Ollama/Logs/Export.php` | Export Ollama run/error evidence to docs/_aiops/ollama/logs/*.md. | new: OllamaRunModel |
| `ollama:logs:tail` | `Tail` | `app/Commands/Ollama/Logs/Tail.php` | Tail app-captured Ollama logs from file. | - |
| `ollama:logs` | `Logs` | `app/Commands/Ollama/Logs.php` | Backward-compatible alias of ollama:logs:tail. | - |
| `ollama:modelfile:validate` | `Validate` | `app/Commands/Ollama/Modelfile/Validate.php` | Validates Ollama Modelfile. | - |
| `ollama:models:create` | `CreateModel` | `app/Commands/Ollama/Models/CreateModel.php` | Creates a model from Modelfile. | - |
| `ollama:models:diff` | `DiffModels` | `app/Commands/Ollama/Models/DiffModels.php` | Compare installed model inventory versus required profile and emit remediation. | - |
| `ollama:models:ensure` | `EnsureModels` | `app/Commands/Ollama/Models/EnsureModels.php` | Ensures required models exist for a profile. | - |
| `ollama:models:export` | `ExportModels` | `app/Commands/Ollama/Models/ExportModels.php` | Exports model inventory for docs or DB. | - |
| `ollama:models:list` | `ListModels` | `app/Commands/Ollama/Models/ListModels.php` | Lists installed Ollama models. | - |
| `ollama:models:prune` | `PruneModels` | `app/Commands/Ollama/Models/PruneModels.php` | Prunes models based on simple keep allowlist policy. | - |
| `ollama:models:pull` | `PullModel` | `app/Commands/Ollama/Models/PullModel.php` | Pulls a model with optional progress stream flag. | - |
| `ollama:models:push` | `PushModel` | `app/Commands/Ollama/Models/PushModel.php` | Pushes a model to registry. | - |
| `ollama:models:rm` | `RmModel` | `app/Commands/Ollama/Models/RmModel.php` | Removes a local model. | - |
| `ollama:models:show` | `ShowModel` | `app/Commands/Ollama/Models/ShowModel.php` | Shows metadata for one model. | - |
| `ollama:ping` | `Ping` | `app/Commands/Ollama/Ping.php` | Low-level ping with retries. | - |
| `ollama:policy:check` | `Check` | `app/Commands/Ollama/Policy/Check.php` | Validates current governance profile and limits. | - |
| `ollama:policy:export` | `Export` | `app/Commands/Ollama/Policy/Export.php` | Exports active policy to docs. | - |
| `ollama:queue:push` | `Push` | `app/Commands/Ollama/Queue/Push.php` | Queues an Ollama job in DB. | new: OllamaQueueModel |
| `ollama:queue:retry` | `Retry` | `app/Commands/Ollama/Queue/Retry.php` | Retries failed jobs from queue. | - |
| `ollama:queue:stats` | `Stats` | `app/Commands/Ollama/Queue/Stats.php` | Queue depth and status counts. | new: OllamaQueueModel |
| `ollama:queue:work` | `Work` | `app/Commands/Ollama/Queue/Work.php` | Consumes queued Ollama jobs. | new: OllamaQueueModel |
| `ollama:rag:query` | `RagQuery` | `app/Commands/Ollama/RagQuery.php` | Retrieves top-k chunks and optional answer. | - |
| `ollama:sessions:list` | `ListSessions` | `app/Commands/Ollama/Sessions/ListSessions.php` | Lists recent Ollama sessions. | - |
| `ollama:sessions:rm` | `RmSession` | `app/Commands/Ollama/Sessions/RmSession.php` | Deletes a session record. | - |
| `ollama:sessions:show` | `ShowSession` | `app/Commands/Ollama/Sessions/ShowSession.php` | Shows one session transcript. | - |
| `ollama:stream` | `Stream` | `app/Commands/Ollama/Stream.php` | Streams tokens to console and transcript output. | - |
| `ollama:version` | `Version` | `app/Commands/Ollama/Version.php` | Reports Ollama version info from health endpoint. | - |
| `ops:analyze-commands` | `AnalyzeCommands` | `app/Commands/Ops/AnalyzeCommands.php` | Analyze parsed ops inbox items and generate AI plans | service(): curlrequest<br>new: OpsCommandService<br>api: https://api.openai.com/v1/chat/completions |
| `ops:app:update` | `AppUpdate` | `app/Commands/Ops/AppUpdate.php` | Safely update and validate the CI4 application. | new: ApiHealthService, AppSelfTestService, ConfigAuditService, DatabaseHealthService, FilesystemHealthService, SnapshotWriter …<br>api: https://api.coingecko.com, https://api.marketaux.com, https://www.alphavantage.co |
| `(not set)` | `BaseOpsCommand` | `app/Commands/Ops/BaseOpsCommand.php` | - | - |
| `ops:console:build` | `BuildConsoleRegistry` | `app/Commands/Ops/BuildConsoleRegistry.php` | Rebuild Console.php command registry | - |
| `ops:ci:prepare` | `CiPrepare` | `app/Commands/Ops/CiPrepare.php` | Prepare deterministic writable/artifact directories for CI runs. | - |
| `ops:commands:audit` | `Audit` | `app/Commands/Ops/Commands/Audit.php` | Audit Spark commands for illegal constructors. | new: CommandRulesScanner |
| `ops:commands:autofix` | `Autofix` | `app/Commands/Ops/Commands/Autofix.php` | Auto-fix Spark commands that define illegal constructors. | new: CommandRulesScanner |
| `(not set)` | `ConstructorScanner` | `app/Commands/Ops/Commands/ConstructorScanner.php` | - | - |
| `ops:commands:inventory` | `Inventory` | `app/Commands/Ops/Commands/Inventory.php` | Generate Spark command inventory from Console.php and command files. | - |
| `ops:commands:lint` | `Lint` | `app/Commands/Ops/Commands/Lint.php` | Lint Spark commands for runtime safety contracts and documentation coverage. | new: CommandRulesScanner |
| `ops:commands:missing` | `MissingFromConsole` | `app/Commands/Ops/Commands/MissingFromConsole.php` | Check commands missing from Console registry | - |
| `ops:config:lint` | `ConfigLint` | `app/Commands/Ops/ConfigLint.php` | Lint Config files for illegal patterns (env(), dynamic expressions, protocols). | - |
| `ops:filesystem-scan` | `FilesystemScan` | `app/Commands/Ops/Diagnostics/FilesystemScan.php` | Ops helper command: ops:filesystem-scan | new: VpsHealthService |
| `ops:diff` | `Diff` | `app/Commands/Ops/Diff.php` | Compare two files and persist AIOps diff artifact. | new: Differ, UnifiedDiffOutputBuilder |
| `ops:diff:wallet` | `DiffWallet` | `app/Commands/Ops/DiffWallet.php` | Run wallet-specific diff governance check. | - |
| `ops:doctor:full` | `DoctorFull` | `app/Commands/Ops/DoctorFull.php` | Run high-signal diagnostics: env, php extensions, network matrix, IMAP capabilities (best-effort). | - |
| `dreamhost:dns-verify` | `DnsVerify` | `app/Commands/Ops/DreamHost/DnsVerify.php` | Ops helper command: dreamhost:dns-verify | new: DreamHostService |
| `dreamhost:email-audit` | `EmailAudit` | `app/Commands/Ops/DreamHost/EmailAudit.php` | Ops helper command: dreamhost:email-audit | new: DreamHostService |
| `dreamhost:email-list` | `EmailList` | `app/Commands/Ops/DreamHost/EmailList.php` | Ops helper command: dreamhost:email-list | new: DreamHostService |
| `dreamhost:limits` | `Limits` | `app/Commands/Ops/DreamHost/Limits.php` | Ops helper command: dreamhost:limits | new: DreamHostService |
| `ops:drift:scan` | `DriftScan` | `app/Commands/Ops/DriftScan.php` | Scan critical services for production drift. | - |
| `email:healthcheck` | `Healthcheck` | `app/Commands/Ops/Email/Healthcheck.php` | Ops helper command: email:healthcheck | new: EmailOpsService |
| `email:queue-scan` | `QueueScan` | `app/Commands/Ops/Email/QueueScan.php` | Ops helper command: email:queue-scan | new: EmailOpsService |
| `email:test` | `Test` | `app/Commands/Ops/Email/Test.php` | Ops helper command: email:test | new: EmailOpsService |
| `ops:env:snapshot` | `EnvSnapshot` | `app/Commands/Ops/EnvSnapshot.php` | Print key env vars with secret redaction (safe for logs/screenshots). | - |
| `ops:fetch-commands` | `FetchCommands` | `app/Commands/Ops/FetchCommands.php` | Fetch unread ops commands from IMAP and store them in bf_ops_command_inbox | new: OpsCommandInboxModel |
| `ops:filesystem:fix` | `FilesystemFix` | `app/Commands/Ops/FilesystemFix.php` | Auto-fix filesystem governance violations | - |
| `ops:filesystem:lint` | `FilesystemLint` | `app/Commands/Ops/FilesystemLint.php` | Lint and optionally auto-fix filesystem governance violations. | - |
| `ops:grep` | `Grep` | `app/Commands/Ops/Grep.php` | Search a path for a plain-text string or regex pattern. | new: RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `ops:grep` | `GrepSearch` | `app/Commands/Ops/GrepSearch.php` | Search codebase or DB schema for a string | - |
| `ops:healthcheck` | `Healthcheck` | `app/Commands/Ops/Health/Healthcheck.php` | Ops helper command: ops:healthcheck | new: VpsHealthService |
| `ops:logger:test` | `LoggerTest` | `app/Commands/Ops/LoggerTest.php` | Writes test entries to configured logger handlers. | - |
| `logs:scan` | `Scan` | `app/Commands/Ops/Logs/Scan.php` | Ops helper command: logs:scan | new: LogOpsService |
| `logs:watch` | `Watch` | `app/Commands/Ops/Logs/Watch.php` | Ops helper command: logs:watch | new: LogOpsService |
| `ops:model-limit:audit` | `ModelLimitAudit` | `app/Commands/Ops/ModelLimitAudit.php` | Audit models/services/libraries for unbounded query patterns. | - |
| `ops:network:matrix` | `NetworkMatrix` | `app/Commands/Ops/NetworkMatrix.php` | Test outbound connectivity matrix (TCP/SSL) with latency and banner. | - |
| `ops:next-steps` | `NextSteps` | `app/Commands/Ops/NextSteps.php` | Generate next-steps issues from audit commands and write docs/snapshots. | new: AiOpsTaskModel, CommandsAnalyzer, ConfigLintAnalyzer, CspAnalyzer, Psr4Analyzer, RoutesAnalyzer … |
| `ops:next-steps:sync` | `NextStepsSync` | `app/Commands/Ops/NextStepsSync.php` | Diff latest snapshots and queue net-new issues. | - |
| `ops:next-steps:sync-manual` | `NextStepsSyncManual` | `app/Commands/Ops/NextStepsSyncManual.php` | Sync manual TODOs from docs/_aiops/next-steps.md into the database. | new: AiOpsManualTodoModel |
| `ops:php-fpm-health` | `FpmHealth` | `app/Commands/Ops/PHP/FpmHealth.php` | Ops helper command: ops:php-fpm-health | new: VpsHealthService |
| `ops:php:extensions` | `PHPExtensionsAudit` | `app/Commands/Ops/PHPExtensionsAudit.php` | Audit required PHP extensions and key INI values (IMAP/SSL-friendly). | - |
| `ops:propose-pr` | `ProposePr` | `app/Commands/Ops/ProposePr.php` | Generate and validate a PR artifact bundle, then export to tracked outbox for GitHub automation. | new: PrOutboxWriter |
| `ops:report` | `Report` | `app/Commands/Ops/Report.php` | Ops helper command: ops:report | new: VpsHealthService |
| `ops:self-heal` | `SelfHeal` | `app/Commands/Ops/SelfHeal.php` | Ops helper command: ops:self-heal | new: VpsHealthService |
| `ops:nginx-status` | `NginxStatus` | `app/Commands/Ops/Server/NginxStatus.php` | Ops helper command: ops:nginx-status | new: VpsHealthService |
| `ops:subs:audit` | `Audit` | `app/Commands/Ops/Subs/Audit.php` | Run subsystem audits | - |
| `ops:subs:doctor` | `Doctor` | `app/Commands/Ops/Subs/Doctor.php` | Friendly subsystem triage | - |
| `ops:subs:repair` | `Repair` | `app/Commands/Ops/Subs/Repair.php` | Run subsystem repairs | - |
| `ops:subs:status` | `Status` | `app/Commands/Ops/Subs/Status.php` | Combined subsystem status | - |
| `(not set)` | `CommandRulesScanner` | `app/Commands/Ops/Support/CommandRulesScanner.php` | - | - |
| `ops:sync` | `Sync` | `app/Commands/Ops/Sync.php` | Runs an ops sync pipeline: git guard/pull + routes docs + launch audit + repo health. | service(): commands |
| `ops:tail` | `TailLogs` | `app/Commands/Ops/TailLogs.php` | Tail CI logs or any file | - |
| `ops:vps:snapshot` | `VPSSnapshot` | `app/Commands/Ops/VPSSnapshot.php` | Collect system/runtime snapshot (no-sudo, best-effort) and write docs/_aiops snapshot. | - |
| `ops:integrity:wallet` | `WalletIntegrity` | `app/Commands/Ops/WalletIntegrity.php` | Validate wallet balances against completed ledger transactions. | - |
| `ops:work` | `Work` | `app/Commands/Ops/Work.php` | Process AiOps task queue items safely. | new: AiOpsSettingsModel, AiOpsTaskModel, AiOpsTaskRunner, PrOutboxWriter |
| `perf:k6` | `K6Run` | `app/Commands/Performance/K6Run.php` | Run k6 load test | - |
| `spark:purge-fastcgi` | `PurgeFastCGI` | `app/Commands/PurgeFastCGI.php` | Detect and neutralize legacy FastCGI/php-pm socket references safely. | - |
| `repo:class-scan` | `ClassScan` | `app/Commands/Repo/ClassScan.php` | Scan repository for duplicate classes and namespace conflicts. | new: RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `repo:class-trace` | `ClassTrace` | `app/Commands/Repo/ClassTrace.php` | Trace where a class is declared and referenced in the repository. | new: RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `repo:diff-split` | `DiffSplit` | `app/Commands/Repo/DiffSplit.php` | Split large git diffs into smaller review batches. | - |
| `repo:health` | `Health` | `app/Commands/Repo/Health.php` | Runs lightweight repository health checks for GTM readiness. | - |
| `(not set)` | `BaseResearchTaskCommand` | `app/Commands/Research/BaseResearchTaskCommand.php` | - | service(): researchService |
| `research:reports:daily` | `DailyMarketReport` | `app/Commands/Research/DailyMarketReport.php` | Generate daily market research report | - |
| `research:earnings:calendar` | `EarningsCalendar` | `app/Commands/Research/EarningsCalendar.php` | Collect earnings calendar research items | - |
| `research:intelligence:signals` | `FinancialIntelligenceSignals` | `app/Commands/Research/FinancialIntelligenceSignals.php` | Generate trade-signal intelligence from research rankings and the financial knowledge graph | - |
| `research:knowledge:build` | `FinancialKnowledge` | `app/Commands/Research/FinancialKnowledge.php` | Build financial knowledge graph | - |
| `research:news:collect` | `FinancialNewsCollect` | `app/Commands/Research/FinancialNewsCollect.php` | - | new: FinancialResearchService<br>api: https://feeds.finance.yahoo.com/rss/2.0/headline?s=^GSPC, https://www.marketwatch.com/rss/topstories, https://www.reutersagency.com/feed/?best-topics=business-finance |
| `research:google:scan` | `GoogleFinancialScan` | `app/Commands/Research/GoogleFinancialScan.php` | Scan Google for financial research links | api: https://www.google.com/search?q= |
| `research:google:scan` | `GoogleScan` | `app/Commands/Research/GoogleScan.php` | - | api: https://www.google.com/search?q= |
| `research:data:compile` | `MarketDataCompile` | `app/Commands/Research/MarketDataCompile.php` | - | api: https://query1.finance.yahoo.com/v7/finance/quote?symbols=$symbol |
| `research:pipeline:run` | `ResearchPipeline` | `app/Commands/Research/ResearchPipeline.php` | - | - |
| `research:short-interest:scan` | `ShortInterestScan` | `app/Commands/Research/ShortInterestScan.php` | Scan short-interest candidates | - |
| `research:alerts:watchlist-import` | `ThinkOrSwimImport` | `app/Commands/Research/ThinkOrSwimImport.php` | - | - |
| `research:alerts:cleanup` | `WatchlistCleanup` | `app/Commands/Research/WatchlistCleanup.php` | - | - |
| `research:reports:weekly` | `WeeklyMarketReport` | `app/Commands/Research/WeeklyMarketReport.php` | Generate weekly market research report | - |
| `spark:restart-safe` | `RestartSafe` | `app/Commands/RestartSafe.php` | Flush caches/sessions safely and guide a no-sudo restart flow on DreamHost. | - |
| `revenue:cost-forecast` | `CostForecast` | `app/Commands/Revenue/CostForecast.php` | Forecast infra and API costs and detect overruns. | - |
| `revenue:scan` | `RevenueStreamsScan` | `app/Commands/RevenueStreamsScan.php` | Scan the repository for monetizable features and generate revenue stream docs. | - |
| `route:benchmark` | `Benchmark` | `app/Commands/Routes/Benchmark.php` | Benchmark route loading performance. | - |
| `routes:debug` | `Debug` | `app/Commands/Routes/Debug.php` | Resolve a route and verify controller, method, and HTTP method coverage. | - |
| `routes:docs` | `Docs` | `app/Commands/Routes/Docs.php` | Export active routes to Markdown + JSON under docs/routes/. | service(): router, routes |
| `routes:reconcile` | `Reconcile` | `app/Commands/Routes/Reconcile.php` | Reconcile route handlers against actual controllers and methods. | new: RouteReconcileService |
| `routes:repair` | `Repair` | `app/Commands/Routes/Repair.php` | Repair invalid route handlers, resolve namespaces, and remove exact duplicate route definitions. | new: RouteRepairService |
| `routes:auth-audit` | `RoutesAuthAudit` | `app/Commands/RoutesAuthAudit.php` | Audit public routes for unauthenticated access regressions. | - |
| `runtime:cache-boot` | `CacheBoot` | `app/Commands/Runtime/CacheBoot.php` | Validate cache boot health and warm critical cache keys. | - |
| `runtime:diagnose-502` | `Diagnose502` | `app/Commands/Runtime/Diagnose502.php` | Diagnose and optionally remediate 502/503 gateway errors | - |
| `runtime:spark-doctor` | `SparkDoctor` | `app/Commands/Runtime/SparkDoctor.php` | Validate Spark command discovery and CI4 compatibility | - |
| `runtime:spark-doctor` | `SparkDoctorRuntime` | `app/Commands/Runtime/SparkDoctorRuntime.php` | Validate Spark command discovery and CI4 compatibility (runtime scope). | - |
| `spark:fix` | `SparkFix` | `app/Commands/Runtime/SparkFix.php` | Auto-heal Spark command standards and generate a fix report | - |
| `optimize:safe` | `SparkOptimize` | `app/Commands/Runtime/SparkOptimize.php` | Run CI4 optimize safely (CI-only) | - |
| `runtime:triage` | `Triage` | `app/Commands/Runtime/Triage.php` | Consolidate runtime diagnostics into a single report. | - |
| `runtime:check` | `RuntimeCheck` | `app/Commands/RuntimeCheck.php` | Validate runtime invariants (nginx, php, permissions, etc.). | - |
| `(not set)` | `load` | `app/Commands/SafeBaseCommand.php` | - | - |
| `scanning:run` | `RunScanner` | `app/Commands/Scanning/RunScanner.php` | Run MyMI liquidity + momentum scanner | service(): scannerService |
| `scraper:audit-emails` | `EmailScraperAudit` | `app/Commands/Scrapers/EmailScraperAudit.php` | Audit recent trade and news emails against the expected scraper schema. | new: RuntimeException, ScraperOpsService |
| `keys:generate-ci4` | `GenerateCI4Key` | `app/Commands/Security/GenerateCI4Key.php` | Generate and rotate CodeIgniter 4 encryption.key | - |
| `keys:generate` | `GenerateKey` | `app/Commands/Security/GenerateKey.php` | Generate a cryptographically secure encryption key. | - |
| `security:secrets-audit` | `SecretsAudit` | `app/Commands/Security/SecretsAudit.php` | Detect sensitive secrets in configs, logs, or docs. | - |
| `security:csp:audit` | `SecurityCspAudit` | `app/Commands/SecurityCspAudit.php` | Scan view templates for CSP-unsafe inline scripts, styles, and handlers. | new: RecursiveDirectoryIterator, RecursiveIteratorIterator |
| `spark:commands:graph` | `CommandGraph` | `app/Commands/Spark/CommandGraph.php` | Generate Spark command graph | - |
| `spark:doctor` | `Doctor` | `app/Commands/Spark/Doctor.php` | System health inspector for Spark commands. | new: CommandHookService, CommandInventoryService |
| `spark:fix` | `Fix` | `app/Commands/Spark/Fix.php` | Safely repair Spark command and cache issues. | new: CommandHookService, CommandInventoryService |
| `infra:server-audit` | `InfraServerAudit` | `app/Commands/Spark/InfraServerAudit.php` | Audit server and classify reusable infrastructure components | - |
| `spark:registry-audit` | `RegistryAudit` | `app/Commands/Spark/RegistryAudit.php` | Audit Spark command registry against filesystem declarations and runtime list output. | new: Console |
| `spark-reset` | `Reset` | `app/Commands/Spark/Reset.php` | Reset Spark caches, purge command metadata, and rebuild autoload (guarded). | - |
| `(not set)` | `ArtifactHelper` | `app/Commands/Support/ArtifactHelper.php` | - | - |
| `(not set)` | `GitHubIssueHelper` | `app/Commands/Support/GitHubIssueHelper.php` | - | api: https://api.github.com/repos/{$repo}/issues |
| `(not set)` | `(unknown)` | `app/Commands/Support/SubsCommandTrait.php` | - | new: SubSystemManager |
| `test:redis` | `RedisPing` | `app/Commands/Test/RedisPing.php` | Test Redis connection | new: RedisService |
| `email:test` | `TestEmail` | `app/Commands/TestEmail.php` | Send a test email using the current SMTP configuration. | service(): mailService |
| `spark:traffic-spike-guard` | `TrafficSpikeGuard` | `app/Commands/TrafficSpikeGuard.php` | Detect traffic/error spikes that commonly lead to 503 and alert Discord. | - |
| `(not set)` | `(unknown)` | `app/Commands/Traits/CiRuntimeCheck.php` | - | - |
| `(not set)` | `(unknown)` | `app/Commands/Traits/NextStepTrait.php` | - | - |
| `(not set)` | `(unknown)` | `app/Commands/Traits/ParamOptions.php` | - | - |
| `(not set)` | `(unknown)` | `app/Commands/Traits/SparkRunnerTrait.php` | - | new: RuntimeException |
| `ux:journey-audit` | `JourneyAudit` | `app/Commands/Ux/JourneyAudit.php` | Validate critical user journeys (signup to dashboard flow checks). | - |
| `wallets:warm-summary-cache` | `WalletsWarmSummaryCache` | `app/Commands/WalletsWarmSummaryCache.php` | Pre-warm the /API/Wallets/summary cache for active users. | new: UserModel, WalletSummaryService |
