# Phase 16 CI AIOps Command Recovery Validation

Generated UTC: 2026-06-03T17:54:37Z
Branch: fix/ci-aiops-command-autoload-recovery
Commit Before Recovery Commit: b1aaddc09 Merge pull request #510 from MillennialInvestments/feature/solana-preview-browser-runtime-smoke-phase-16

## Reason
- PR #511 is failing CI due to pre-existing AIOps/Spark command discovery failures.
- CI logs show App\Config\SafeBaseCommand not found in app/Commands/AiOps/Observe/Map.php.
- CI logs show PriorityBuildCommand::$aiOpsRunnable has incompatible typed property declaration.
- This recovery does not enable Solana execution, broadcast, minting, or private-key submission.

## Changed Files
```text
 M docs/next/bf_aiops_task_runs/commands_lint.json
?? docs/security/solana/PHASE_16_CI_AIOPS_COMMAND_RECOVERY_VALIDATION.md
```

## PHP Syntax
```text
```

## Class Load Checks
```text
App\\Commands\\SafeBaseCommand => NOT LOADABLE
App\\Commands\\AiOps\\Observe\\Map => NOT LOADABLE
App\\Commands\\AIOps\\PriorityBuildCommand => NOT LOADABLE
App\\Commands\\AiOps\\PriorityBuildCommand => NOT LOADABLE
App\\Commands\\Ops\\WalletIntegrity => NOT LOADABLE
App\\Commands\\AIOps\\SqlCheck => NOT LOADABLE
```

## Spark Discovery
```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 17:54:37 UTC+00:00

AIOps
  aiops:alerts-clean                          Delete completed aiops alert queue rows
                                              older than 30 days
  aiops:analyze:code                          Analyze files or folders for security, UX,
                                              performance, maintainability, and backend
                                              efficiency risks.
  aiops:autofix:analyze                       Analyze latest log file and produce
                                              categorized recurring issue suggestions.
  aiops:csp:audit                             Scans the repository for CSP violations and
                                              writes a dated audit report.
  aiops:errors                                Run the AIOps error scan wrapper and
                                              delegate to logs:errors when available.
  aiops:routes:suggest                        Scan recent 404 logs and suggest likely
                                              intended route matches.
  aiops:scan:cells                            Stateful scanner for repeated UI blocks and
                                              Cell candidates.
  aiops:scan:integrity                        Scan CI4 app integrity for command
                                              inheritance, support files, view paths, and
                                              unsafe trim usage.
  aiops:solana-digest                         Summarize current Solana Exchange routes,
                                              files, and status.
  aiops:solana-healthcheck                    Run a safe Solana route and network health
                                              check.
  aiops:solana-transaction-audit              Safely summarize Solana transaction records
                                              when available.
  aiops:unlock                                Manually unlock an AIOPS patch job and
                                              reset retries.
  aiops:views:missing                         Scan controllers for view()/renderTheme()
                                              references and report missing views.
  logs:errors                                 Scan runtime logs, normalize errors, and
                                              generate structured AIOps error reports.

AIOps - API
  aiops:api:schema                            Validate API endpoints return JSON
                                              (optionally check required keys)

AIOps - Alerts
  aiops:alerts-check                          Fetch emails and queue them for processing
  aiops:alerts-health                         Run health checks on aiops alert queue and
                                              notify if failures are high
  aiops:alerts-worker                         Process queued alert emails

AIOps - All Control
  aiops:all                                   Run a full AIOps scan and generate unified
                                              Markdown and JSON reports in docs/_aiops.
  aiops:execute-docs                          Process docs/_aiops markdown files and
                                              execute actionable patches in a stateful
                                              loop.
  aiops:repairs                               Run the error->action->repair queue->patch
                                              plan pipeline.

AIOps - Audit
  aiops:audit                                 Audit aiops runtime, orchestration routes,
                                              and n8n/docs readiness
  aiops:continue                              Operational audit (server + runtime focus)
  aiops:copilot:validate                      Validate copilot instructions and Spark
                                              command safety rules.
  aiops:diff:format                           Generate a real unified diff from current
                                              working tree
  aiops:doctor                                Validate AIOps service wiring, namespace
                                              casing, and Spark helper migration state.
  aiops:health:full                           Run full system health checks and generate
                                              a consolidated report
  aiops:priority:build                        Scan /docs, detect gaps, verify repo, stage
                                              codegen artifacts for PR batching, and
                                              write /docs/priority outputs.

AIOps - Commands
  aiops:build-command                         Generate a Spark command from text logic
                                              using AIOps
  aiops:chat-gov-index                        Index ChatGPT governance steps from
                                              archived chats and sync CSV/DB outputs.
  aiops:command-index                         Scan and classify Spark commands for AIOps
                                              governance.
  aiops:governance:analyze                    Analyze token usage + model anomalies

AIOps - DB
  aiops:db:slow_scan                          Scan logs for slow query markers
                                              (best-effort)
  aiops:sql:check                             Validate model/table/query SQL
                                              compatibility against live schema.

AIOps - Docs
  aiops:docs-sync                             Run documentation sync pipeline using
                                              DocsSyncEngine

AIOps - Management
  aiops:gate:cost                             Enforce daily AI cost cap; auto-disable
                                              AiOps LLM when threshold exceeded

AIOps - Marketing
  aiops:email-scan                            Scan alerts mailbox for new emails and
                                              record AIOps counts.

AIOps - Observe
  aiops:observe:cost                          Correlate observability signals with AI
                                              cost logs
  aiops:observe:hash                          Fingerprint recurring errors into stable
                                              hashes
  aiops:observe:map                           Map errors to routes and controllers
  aiops:observe:patch                         Create patch file from suggestions
  aiops:observe:regression                    Detect fingerprint regressions vs previous
                                              snapshot
  aiops:observe:scan                          Scan logs and persist recurring errors
  aiops:observe:snapshot                      Snapshot fingerprint map for regression
                                              detection
  aiops:observe:suggest                       Generate fix suggestions for recurring
                                              errors

AIOps - PR
  aiops:pr:auto                               Full safe pipeline: observe → validate
                                              → regression → PR
  aiops:pr:create                             Create a branch, push, and open a PR
                                              (requires token + enabled flags)
  aiops:rollback                              Rollback working tree to clean state (hard
                                              reset)
  aiops:seed                                  Seed default AI Ops caps and pricing
```

## Ops Command Diagnostics
```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 17:54:37 UTC+00:00

 Command          File                                  Violations              
--------------------------------------------------------------------------------
 load             app/Commands/SafeBaseCommand.php      PSR-4 filename mismatch 
 WalletIntegrity  app/Commands/Ops/WalletIntegrity.php  Illegal option()        
 SqlCheck         app/Commands/AIOps/SqlCheck.php       Illegal option()        

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 17:54:37 UTC+00:00

FAIL load
  - Missing $name, $group, or $description metadata.
  - Missing documentation entry in docs/management/Command_Runtime_Audit.md.
FAIL ops:integrity:wallet
  - Deprecated Spark CLI APIs detected ($this->option/getOption/getArgument).
  - Missing documentation entry in docs/management/Command_Runtime_Audit.md.
FAIL aiops:sql:check
  - Deprecated Spark CLI APIs detected ($this->option/getOption/getArgument).
  - Missing documentation entry in docs/management/Command_Runtime_Audit.md.

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 17:54:37 UTC+00:00

Missing: \App\Commands\Marketing\AuditDistribution
Missing: \App\Commands\AnalyzeCode
Missing: \App\Commands\SolanaWalletSecretsAudit
Audit complete.
```

## Solana Safety Gates
```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 17:54:38 UTC+00:00


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

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 17:54:39 UTC+00:00


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

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 17:54:40 UTC+00:00

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
- AIOps command discovery fatal errors are remediated.
- Solana Phase 16/15 safety gates remain passing.
- Permanent Solana guardrails remain passing.
