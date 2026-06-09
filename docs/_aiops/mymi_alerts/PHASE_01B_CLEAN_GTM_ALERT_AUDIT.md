# Phase 01B — Clean MyMI Alert System GTM Audit

Generated UTC: 2026-06-08T15:57:00Z
Branch: main
Commit: a271c0ae0 Register TBI CoinVault smoke command (#518)

## Objective

Complete a clean, non-destructive GTM readiness audit for the MyMI Alert System.

## Git Status

```text
 M writable/logs/emergency.log
?? docs/01_Systematic_Standup/
?? docs/_aiops/mymi_alerts/
```

## PHP / CI4

```text
PHP 8.2.30 (cli) (built: May  4 2026 10:40:52) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.2.30, Copyright (c) Zend Technologies
    with Zend OPcache v8.2.30, Copyright (c), by Zend Technologies

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-08 15:57:00 UTC+00:00

AIOps
  aiops:alerts-clean                          Delete completed aiops
                                              alert queue rows older
                                              than 30 days
  aiops:analyze:code                          Analyze files or
                                              folders for security,
                                              UX, performance,
                                              maintainability, and
                                              backend efficiency
                                              risks.
  aiops:autofix:analyze                       Analyze latest log
                                              file and produce
                                              categorized recurring
                                              issue suggestions.
  aiops:csp:audit                             Scans the repository
                                              for CSP violations and
                                              writes a dated audit
                                              report.
  aiops:errors                                Run the AIOps error
                                              scan wrapper and
                                              delegate to
                                              logs:errors when
                                              available.
  aiops:routes:suggest                        Scan recent 404 logs
                                              and suggest likely
                                              intended route
                                              matches.
  aiops:scan:cells                            Stateful scanner for
                                              repeated UI blocks and
                                              Cell candidates.
  aiops:scan:integrity                        Scan CI4 app integrity
                                              for command
                                              inheritance, support
                                              files, view paths, and
                                              unsafe trim usage.
  aiops:solana-digest                         Summarize current
                                              Solana Exchange
                                              routes, files, and
                                              status.
  aiops:solana-healthcheck                    Run a safe Solana
                                              route and network
                                              health check.
  aiops:solana-transaction-audit              Safely summarize
                                              Solana transaction
                                              records when
                                              available.
  aiops:unlock                                Manually unlock an
                                              AIOPS patch job and
                                              reset retries.
  aiops:views:missing                         Scan controllers for
                                              view()/renderTheme()
                                              references and report
                                              missing views.
  logs:errors                                 Scan runtime logs,
                                              normalize errors, and
                                              generate structured
                                              AIOps error reports.

AIOps - API
  aiops:api:schema                            Validate API endpoints
                                              return JSON
                                              (optionally check
                                              required keys)

AIOps - Alerts
  aiops:alerts-check                          Fetch emails and queue
                                              them for processing
  aiops:alerts-health                         Run health checks on
                                              aiops alert queue and
                                              notify if failures are
                                              high
  aiops:alerts-worker                         Process queued alert
                                              emails

AIOps - All Control
  aiops:all                                   Run a full AIOps scan
                                              and generate unified
                                              Markdown and JSON
                                              reports in
                                              docs/_aiops.
  aiops:execute-docs                          Process docs/_aiops
                                              markdown files and
                                              execute actionable
                                              patches in a stateful
                                              loop.
  aiops:repairs                               Run the
                                              error->action->repair
                                              queue->patch plan
                                              pipeline.

AIOps - Audit
  aiops:audit                                 Audit aiops runtime,
                                              orchestration routes,
                                              and n8n/docs readiness
  aiops:continue                              Operational audit
                                              (server + runtime
                                              focus)
  aiops:copilot:validate                      Validate copilot
                                              instructions and Spark
                                              command safety rules.
  aiops:diff:format                           Generate a real
                                              unified diff from
                                              current working tree
  aiops:doctor                                Validate AIOps service
                                              wiring, namespace
                                              casing, and Spark
                                              helper migration
                                              state.
  aiops:health:full                           Run full system health
                                              checks and generate a
                                              consolidated report
  aiops:priority:build                        Scan /docs, detect
                                              gaps, verify repo,
                                              stage codegen
                                              artifacts for PR
                                              batching, and write
                                              /docs/priority
                                              outputs.

AIOps - Commands
  aiops:build-command                         Generate a Spark
                                              command from text
                                              logic using AIOps
  aiops:chat-gov-index                        Index ChatGPT
                                              governance steps from
                                              archived chats and
                                              sync CSV/DB outputs.
  aiops:command-index                         Scan and classify
                                              Spark commands for
                                              AIOps governance.
  aiops:governance:analyze                    Analyze token usage +
                                              model anomalies

AIOps - DB
  aiops:db:slow_scan                          Scan logs for slow
                                              query markers
                                              (best-effort)
  aiops:sql:check                             Validate
                                              model/table/query SQL
                                              compatibility against
                                              live schema.

AIOps - Docs
  aiops:docs-sync                             Run documentation sync
                                              pipeline using
                                              DocsSyncEngine

AIOps - Management
  aiops:gate:cost                             Enforce daily AI cost
                                              cap; auto-disable
                                              AiOps LLM when
                                              threshold exceeded

AIOps - Marketing
  aiops:email-scan                            Scan alerts mailbox
                                              for new emails and
                                              record AIOps counts.

AIOps - Observe
  aiops:observe:cost                          Correlate
                                              observability signals
                                              with AI cost logs
  aiops:observe:hash                          Fingerprint recurring
                                              errors into stable
                                              hashes
  aiops:observe:map                           Map errors to routes
                                              and controllers
  aiops:observe:patch                         Create patch file from
                                              suggestions
  aiops:observe:regression                    Detect fingerprint
                                              regressions vs
                                              previous snapshot
  aiops:observe:scan                          Scan logs and persist
                                              recurring errors
  aiops:observe:snapshot                      Snapshot fingerprint
                                              map for regression
                                              detection
  aiops:observe:suggest                       Generate fix
                                              suggestions for
                                              recurring errors

AIOps - PR
  aiops:pr:auto                               Full safe pipeline:
                                              observe → validate
                                              → regression → PR
  aiops:pr:create                             Create a branch, push,
                                              and open a PR
                                              (requires token +
                                              enabled flags)
  aiops:rollback                              Rollback working tree
                                              to clean state (hard
                                              reset)
  aiops:seed                                  Seed default AI Ops
                                              caps and pricing
                                              configuration.

AIOps - Patch
  aiops:patch:apply                           Safely apply
                                              AI-generated patch
                                              under guardrails
  aiops:patch:dry_run                         Apply patch in
                                              temporary branch
  aiops:patch:hallucination                   Detect hallucinated
                                              symbols in
                                              aiops_generated_patch.diff
                                              before apply
  aiops:patch:risk_score                      Calculate patch risk
                                              score
  aiops:patch:validate                        Validate PHP syntax
                                              after patch apply

AIOps - Performance
  aiops:sync-perf                             Scan Routes.php and
                                              sync perf_urls.txt
                                              automatically

AIOps - Public Pages
  aiops:public-pages:audit                    Audit public pages
                                              schema coverage,
                                              freshness, and
                                              governance conditions.
  aiops:public-pages:import                   Import
                                              docs/_aiops/inputs/public_pages.csv
                                              into
                                              bf_public_pages_catalog.
  aiops:public-pages:report                   Generate report
                                              artifacts for a public
                                              pages run.
  aiops:public-pages:run                      Run public pages
                                              source collection and
                                              draft generation.

AIOps - QA
  aiops:form:test                             Scan a form
                                              (url/file/text), map
                                              route->controller,
                                              generate payload,
                                              submit, capture logs,
                                              and queue a patch job
                                              if errors found.

AIOps - Redis
  aiops:redis:stats                           Fetch Redis INFO stats
                                              (best-effort)

AIOps - Repair
  aiops:repair                                Apply safe aiops
                                              repairs
  aiops:repair:run                            Full autonomous repair
                                              pipeline
  aiops:repair:run_safe                       Run repair pipeline
                                              with rollback safety +
                                              gating before PR
  aiops:self-heal                             Run one-pass self-heal
  aiops:status                                AIOps runtime status
  aiops:watch                                 Continuous aiops audit
                                              watcher

AIOps - Routes
  aiops:routes:compare                        Compare staging vs
                                              production routes scan
  aiops:routes:gate                           Gate based on
                                              routes_scan.json
                                              thresholds
  aiops:routes:regress                        Detect route scan
                                              regressions vs
                                              previous snapshot
  aiops:routes:scan                           Scan Routes.php (GET
                                              routes), parallel
                                              curl, write
                                              JSON+CSV+snapshot
  aiops:routes:scan_auth                      Authenticated scan
                                              using
                                              AIOPS_AUTH_COOKIE

AIOps - Run
  aiops:auto:run                              Run AIOPS using manual
                                              priorities first,
                                              falling back to
                                              log-driven auto
                                              priorities.
  aiops:backlog                               Reconcile outstanding
                                              AIOPS patch workflow
                                              jobs.
  aiops:dedupe:report                         Generate duplicate and
                                              near-duplicate
                                              instruction report.
  aiops:deps:add                              Add dependency link:
                                              instruction depends on
                                              another instruction
  aiops:graph:run                             Execute queued
                                              instructions
                                              respecting dependency
                                              graph (runs worker
                                              iteratively).
  aiops:ingest                                Ingest AI instruction
                                              text and enqueue for
                                              AIOps worker (analysis
                                              + patch + PR prep)
  aiops:init                                  Initialize and
                                              validate the AIOps PR
                                              factory (one-time or
                                              rare use).
  aiops:manual:index                          Index AI manual
                                              documentation under
                                              docs/_aiops/manual
  aiops:manual:run                            Run manual-priority
                                              AIOPS correlation,
                                              state refresh, and PR
                                              creation.
  aiops:observe                               Parse logs and detect
                                              recurring error
                                              signatures
  aiops:py                                    Run Python automation
                                              actions and return
                                              structured JSON.
  aiops:run                                   Manually run the
                                              AI-Ops worker and
                                              generate docs/_aiops
                                              reports
  aiops:worker                                Process queued AIOps
                                              instructions
                                              (governance +
                                              targeting + diff +
                                              optional PR).
  aiops:worker:logs                           Summarize logs, ingest
                                              actionable issues, and
                                              run aiops worker once.

AIOps - n8n
  aiops:n8n:logs                              Tail n8n logs
  aiops:n8n:restart                           Restart n8n
  aiops:n8n:start                             Start n8n
  aiops:n8n:stop                              Stop n8n

API
  api:audit                                   Institutional API
                                              governance audit:
                                              routes, permissions,
                                              filters, rate limits,
                                              and versioning.
  api:diff                                    Compare the two most
                                              recent research runs
                                              for a provider.
  api:filters-check                           Fail on CRITICAL
                                              uncovered endpoints by
                                              filter governance.
  api:inventory                               Build
                                              docs/APIs/_inventory.md
                                              from latest API
                                              research runs.
  api:list                                    List endpoints with
                                              filters, auth
                                              indicator, and
                                              version.
  api:permissions                             Generate endpoint
                                              permission matrix in
                                              markdown and JSON.
  api:rate-limit-check                        Fail when
                                              external/API-like
                                              endpoints have no
                                              rate-limit enforcement
                                              metadata.
  api:research                                Research API
                                              documentation, parse
                                              specs, extract
                                              endpoints, and write
                                              reports.
  api:test-url                                Test an API URL or
                                              endpoint and write a
                                              markdown report.
  api:versioning-check                        Detect API endpoints
                                              missing /API/vN
                                              namespace and emit
                                              remediation.

Alerts
  alerts:audit                                Audit recent scraped
                                              alert emails against
                                              generated trade
                                              alerts.
  alerts:fetch-raw-emails                     Fetch raw trade alert
                                              emails into
                                              bf_investment_scraper
                                              and move inserted
                                              messages to Processed.
  alerts:forecast                             Refresh forecasts for
                                              open alerts.
  alerts:ingest                               Ingest ThinkorSwim
                                              alert emails and
                                              upsert trade alerts.
  alerts:parse-test                           Parse a broker email
                                              sample and output
                                              normalized execution
                                              data.

App
  app:api:audit                               Advanced API audit:
                                              groups, filters,
                                              duplicates, OpenAPI,
                                              Postman, probe mode.
  app:api:list                                List complete APIs
                                              from latest audit
                                              report.
  app:compat-audit                            Audit MyMI Wallet for
                                              CI4 + PHP
                                              compatibility issues.
  app:controller:audit                        Audit controllers for
                                              unsafe initController
                                              patterns, score
                                              severity, suggest
                                              patches, optional safe
                                              auto-fix, and
                                              regression diff.
  app:gate:coverage                           Gate on PHPUnit
                                              coverage if available
                                              (coverage-text).
  app:test                                    Run PHPUnit test suite

App - Logging
  app:errors:dispatch                         Evaluate alert rules
                                              and send
                                              notifications.
  app:errors:learn                            AI-assisted learning
                                              of consolidated error
                                              patterns into
                                              bf_error_patterns.
  app:logs:check-server                       Check external
                                              Apache/Nginx error.log
  app:logs:consolidate                        Consolidate
                                              bf_error_logs into
                                              categorized grouped
                                              records.
  app:logs:enable-full                        Force CI4 to log all
                                              levels with DB + PHP
                                              fallback enabled.

Audit
  audit:all                                   Full system visibility
                                              audit

Auth
  auth:activate_user                          Activate Existing
                                              User.
  auth:create_group                           Adds a new group to
                                              the database.
  auth:create_user                            Adds a new user to the
                                              database.
  auth:hash_password                          Hashes given password.
  auth:list_groups                            Lists groups from the
                                              database.
  auth:list_users                             Lists users from the
                                              database.
  auth:publish                                Publish selected Auth
                                              functionality into the
                                              current application.
  auth:set_password                           Set password to user.

Automation
  automation:run                              Run queued automation
                                              jobs

Cache
  cache:clear                                 Clears the current
                                              system caches.
  cache:info                                  Shows file cache
                                              information in the
                                              current system.

Chat
  chat:audit                                  Chat audit
  chat:logs                                   Tail persisted chat
                                              logs from
                                              writable/logs/chat.
  chat:repair                                 Chat repairs
  chat:restart                                Restart chat
  chat:start                                  Start chat
  chat:status                                 Chat status with PID
                                              and listening-port
                                              verification.
  chat:stop                                   Stop chat

CodeIgniter
  config:check                                Check your Config
                                              values.
  env                                         Retrieves the current
                                              environment, or set a
                                              new one.
  filter:check                                Check filters for a
                                              route.
  help                                        Displays basic usage
                                              information.
  list                                        Lists the available
                                              commands.
  namespaces                                  Verifies your
                                              namespaces are setup
                                              correctly.
  optimize                                    Optimize for
                                              production.
  phpini:check                                Check your php.ini
                                              values in production
                                              environment.
  publish                                     Discovers and executes
                                              all predefined
                                              Publisher classes.
  routes                                      Displays all routes.
  serve                                       Launches the
                                              CodeIgniter
                                              PHP-Development
                                              Server.

Codex
  codex:audit                                 Full repository audit
                                              via OpenAI
  codex:continue                              Continue audit in
                                              batches (default 5
                                              files) with OpenAI +
                                              severity tracking
  codex:gate                                  Fail build if high
                                              severity issues exist
  codex:gate:severity                         Fail if severity
                                              counters exceed
                                              thresholds
  codex:index                                 Index repository and
                                              initialize audit state
  codex:instruct:audit                        Batch review
                                              repository files via
                                              OpenAI API
  codex:instruct:devops_review                Generate instruction
                                              payload to audit AI
                                              DevOps layer against
                                              docs/*
  codex:instruct:summarize                    Generate structured AI
                                              documentation summary
                                              template
  codex:review                                Generate Codex review
                                              artifacts (summary +
                                              prompt payload)
  codex:review:commit                         Commit Codex review
                                              artifacts
                                              intentionally (latest
                                              or by date).
  codex:review:list                           List available Codex
                                              review artifacts
                                              stored under docs.
  codex:review:publish                        Aggregate governance
                                              lint results and
                                              publish review
                                              artifacts.
  codex:status                                Show audit status

CoinVault
  coinvault:audit                             Audit Coin Vault
                                              module routes, files,
                                              database mappings, and
                                              Solana integration
                                              map.
  coinvault:tbi-external-contribution-smoke   Validate MyMI
                                              CoinVault can receive
                                              and persist a TBI
                                              external contribution
                                              payload.

Config
  config:clear                                Clear
                                              configuration-related
                                              caches safely
                                              (guarded).

Database
  db:create                                   Create a new database
                                              schema.
  db:seed                                     Runs the specified
                                              seeder to populate
                                              known data into the
                                              database.
  db:table                                    Retrieves information
                                              on the selected table.
  db:table-list                               List database tables,
                                              columns, indexes, and
                                              approximate row
                                              counts.
  migrate                                     Locates and runs all
                                              new migrations against
                                              the database.
  migrate:refresh                             Does a rollback
                                              followed by a latest
                                              to refresh the current
                                              state of the database.
  migrate:rollback                            Runs the "down" method
                                              for all migrations in
                                              the last batch.
  migrate:status                              Displays a list of all
                                              migrations and whether
                                              they've been run or
                                              not.

DevOps
  git:pull:safe                               Safely pull
                                              origin/main by
                                              stashing local changes
                                              and optionally
                                              resetting generated
                                              artifacts.
  git:workspace:guard                         Detects workspace
                                              conditions that
                                              commonly block
                                              pulls/PRs.
  git:workspace:repair                        Repairs git workspace
                                              when generated files
                                              block pull operations.
  repo:health                                 Runs lightweight
                                              repository health
                                              checks for GTM
                                              readiness.

Diagnostics
  controller:profile                          Profile controller
                                              boot performance.
  logger:audit                                Audit logger handlers
                                              for overlap and
                                              recursion risks.
  route:benchmark                             Benchmark route
                                              loading performance.
  routes:debug                                Resolve a route and
                                              verify controller,
                                              method, and HTTP
                                              method coverage.

Discord
  discord:custom:send                         Send or queue a custom
                                              message to a chosen
                                              Discord channel key
                                              and audit it.
  discord:list                                List configured
                                              Discord
                                              channels/webhooks/IDs
                                              from config and
                                              database.
  discord:process-queue                       Process queued Discord
                                              messages respecting
                                              quiet hours and
                                              pacing.
  discord:test                                Send a test payload
                                              through the Discord
                                              queue pipeline.
  discord:test-liquidity                      Send a test Liquidity
                                              Scan alert to
                                              alerts.liquidity
                                              channel
  discord:wire-check                          Validate Discord env
                                              vars, tables, and
                                              queue health for
                                              MyMIDiscord.

Docs
  api:scrape                                  Scrape API docs and
                                              generate a MyMI Wallet
                                              integration summary
                                              report.
  docs:architecture-map                       Generate architecture
                                              map of CI4 application
  docs:architecture:graph                     Generate CI4
                                              architecture graph
  docs:audit                                  Audit CI4 codebase vs
                                              /docs documentation
  docs:build-how-it-works-nav                 Build How-It-Works
                                              navigation partial
                                              from view files and
                                              docs/how-it-works
                                              markdown files.
  docs:database:map                           
  docs:dependencies:map                       
  docs:full-audit                             
  docs:generate-architecture-map              Generate
                                              docs/_architecture_map.json
                                              from read-only
                                              repository scans.
  docs:generate-knowledge-graph               Generate
                                              docs/_knowledge_graph.json
                                              linking docs, views,
                                              routes, controllers,
                                              services, and health
                                              scans.
  docs:generate-missing                       Generate documentation
                                              for undocumented
                                              controllers
  docs:inventory                              Scan /docs directory
                                              and generate
                                              docs/_inventory.md
  docs:inventory-forms                        Inventory repository
                                              forms, submit
                                              dependencies, and risk
                                              flags.
  docs:modules:map                            
  docs:routes:inventory                       
  docs:scan-orphan-routes                     Detect routes that do
                                              not map to existing
                                              controller methods.
  docs:scan-orphan-views                      Detect views that are
                                              not referenced by
                                              controllers.
  docs:scan-routes                            Scan all routes and
                                              validate controllers
  docs:scan-undocumented-controllers          Detect controllers
                                              with no docs markdown
                                              references.
  docs:spark:inventory                        
  docs:sync-all                               Run full documentation
                                              pipeline
  docs:sync-code                              Analyze /docs and
                                              execute DocsSyncEngine
                                              safely.
  docs:sync-system                            
  docs:test                                   Test DocsService
                                              loading and navigation

Docs Export
  docs:views:export                           

Docs Generate
  docs:readme:build                           

Docs Scan
  docs:controllers:list                       List all module
                                              controllers
  docs:services:list                          List all Services
                                              classes
  docs:views:dirs                             
  docs:views:list                             

DreamHost Diagnostics
  dreamhost:dns-test                          Resolve DNS for a
                                              given host.
  dreamhost:env                               Display relevant
                                              DreamHost environment
                                              variables.
  dreamhost:imap-capabilities                 Probe IMAP
                                              greeting/capabilities/mailboxes
                                              and print detailed
                                              errors.
  dreamhost:imap-flag-sweep                   Try multiple IMAP
                                              connection flag
                                              variants and report
                                              which one connects.
  dreamhost:imap-test                         Test IMAP SSL
                                              connectivity to
                                              DreamHost mailbox.
  dreamhost:port-test                         Test raw TCP
                                              connection to
                                              host:port.
  dreamhost:smtp-probe                        Probe SMTP endpoints
                                              (465 SSL, 587
                                              STARTTLS) and print
                                              handshake banner.
  dreamhost:ssl-test                          Test raw SSL
                                              connection to a
                                              host/port.

Encryption
  key:generate                                Generates a new
                                              encryption key and
                                              writes it in an `.env`
                                              file.

Exchange
  exchange:create-tbi-project-coin-drafts     Create or update
                                              draft/devnet TBI
                                              project coin records
                                              without minting or
                                              broadcasting.

Forecasts
  forecasts:evaluate                          Evaluate forecasts for
                                              accuracy windows.

GTM
  gtm:cron:validate-security                  Validate INTERNAL_CRON
                                              and /API/Management
                                              routes reject
                                              missing/invalid
                                              tokens.
  gtm:health:snapshot                         Generate deterministic
                                              GTM daily health
                                              snapshot markdown
                                              report.
  gtm:launch:audit                            Generate go-live
                                              launch readiness audit
                                              for Phase A user
                                              surfaces.
  gtm:launch:smoke                            Run non-destructive
                                              HTTP smoke checks for
                                              Phase A user
                                              navigation surfaces.

GapTracker
  gap:sync                                    Enrich gap tracker CSV
                                              and produce a report.

Generators
  make:cell                                   Generates a new
                                              Controlled Cell file
                                              and its view.
  make:command                                Generates a new spark
                                              command.
  make:config                                 Generates a new config
                                              file.
  make:controller                             Generates a new
                                              controller file.
  make:entity                                 Generates a new entity
                                              file.
  make:filter                                 Generates a new filter
                                              file.
  make:migration                              Generates a new
                                              migration file.
  make:model                                  Generates a new model
                                              file.
  make:scaffold                               Generates a complete
                                              set of scaffold files.
  make:seeder                                 Generates a new seeder
                                              file.
  make:test                                   Generates a new test
                                              file.
  make:transformer                            Generates a new
                                              transformer file.
  make:validation                             Generates a new
                                              validation file.

Git
  git:sync-safe                               Safely sync repository
                                              with origin/main with
                                              automatic stash
                                              handling

GitHub
  github:branch                               Create and switch to a
                                              new feature branch.
  github:commit                               Stage tracked changes
                                              and create a git
                                              commit.
  github:health                               Show a lightweight
                                              repository and remote
                                              health summary.
  github:pr:create                            Create a GitHub pull
                                              request for the
                                              current branch.
  github:pull                                 Pull the current
                                              branch from origin
                                              with rebase.
  github:push                                 Push the current
                                              branch to origin.
  github:search                               Search the local git
                                              repository for a given
                                              string or pattern.
  github:status                               Show repository branch
                                              and working tree
                                              status.
  github:sync                                 Commit pending changes
                                              when needed, then pull
                                              and push the current
                                              branch.

Housekeeping
  debugbar:clear                              Clears all debugbar
                                              JSON files.
  logs:clear                                  Clears all log files.

Infrastructure
  infra:server-audit                          Audit server and
                                              classify reusable
                                              infrastructure
                                              components

Mail
  mail:send                                   Process and send
                                              queued mail jobs.

Marketing
  marketing:approve-generated                 Approve generated
                                              marketing content and
                                              optionally pre-create
                                              destination targets.
  marketing:audit:distribution                Audit marketing
                                              distribution
                                              destination health and
                                              retry posture.
  marketing:bluesky:healthcheck               Run Bluesky
                                              connectivity/auth
                                              healthcheck for
                                              marketing
                                              distribution.
  marketing:daily-audit                       Daily marketing
                                              pipeline QA audit
                                              report.
  marketing:discord-activation                Send one-time Discord
                                              activation
                                              announcement for
                                              marketing stream
                                              channels.
  marketing:discord:test-all-categories       Loop all configured
                                              marketing Discord
                                              categories and test
                                              post delivery.
  marketing:discord:test-category             Send a
                                              category-formatted
                                              test message to the
                                              mapped Discord
                                              channel.
  marketing:distribute                        Distribute approved
                                              generated marketing
                                              content.
  marketing:distribution:assert-sql           Runs SQL-level anomaly
                                              assertions for
                                              marketing
                                              distribution/regression
                                              monitoring.
  marketing:distribution:failure-inject-test  Dev-safe failure
                                              injection checks for
                                              blog/in_app/email/discord
                                              target retries and
                                              idempotency.
  marketing:email:clean                       Moves already-ingested
                                              emails from IMAP
                                              source folder into a
                                              processed folder.
  marketing:generate:package                  Generate a marketing
                                              package from
                                              notification_id or
                                              headline.
  marketing:mastodon:healthcheck              Run Mastodon
                                              connectivity/auth
                                              healthcheck for
                                              marketing
                                              distribution.
  marketing:news:debug                        Diagnose marketing
                                              IMAP connectivity,
                                              folder counts, subject
                                              samples, and filter
                                              matches.
  marketing:news:generate                     Generates clustered
                                              story records from
                                              pending
                                              bf_marketing_temp_scraper
                                              rows.
  marketing:news:imap-test                    Smoke test for
                                              marketing/news IMAP
                                              connectivity.
  marketing:news:scrape                       Ingests alert/news
                                              emails (or OCR/raw
                                              text) into
                                              bf_marketing_temp_scraper
                                              with folder-level
                                              diagnostics.
  marketing:news:seed-test                    Insert synthetic rows
                                              into
                                              bf_marketing_temp_scraper
                                              for non-IMAP pipeline
                                              testing.
  marketing:notification:test                 Test marketing
                                              notification
                                              readiness, pending
                                              counts, and recent
                                              campaign activity.
  marketing:pipeline                          Runs marketing
                                              generation pipeline
                                              sections.
  marketing:process-notifications             Process pending
                                              marketing
                                              notifications and
                                              generate marketing
                                              packages.
  marketing:promotions:audit                  Audit promotion source
                                              data and campaign
                                              readiness from scraper
                                              and campaign tables.
  marketing:promotions:generate               Generate promotion
                                              campaign rows from
                                              finalized marketing
                                              summaries.
  marketing:promotions:test                   Run a chained smoke
                                              test for promotions
                                              audit and dry-run
                                              generation.
  marketing:regression:smoke                  Runs full marketing
                                              pipeline smoke checks
                                              and validates count
                                              movement across
                                              stages.
  marketing:retry-distribution                Retry failed marketing
                                              distribution targets.
  marketing:scraper:audit-emails              Audit recent trade and
                                              news emails against
                                              the expected scraper
                                              schema.

Ollama - Control
  ollama:bench                                Benchmarks latency and
                                              throughput for prompt
                                              set.
  ollama:chat                                 Chat completion with
                                              optional session
                                              persistence.
  ollama:circuit:reset                        Resets circuit breaker
                                              state.
  ollama:circuit:status                       Shows circuit breaker
                                              state.
  ollama:diagnose                             Operator diagnostic
                                              report for Ollama
                                              connectivity and env.
  ollama:docs:inventory                       Builds docs
                                              embedding/metadata
                                              manifest.
  ollama:docs:sync                            Regenerates Ollama
                                              inventory and policy
                                              docs.
  ollama:doctor                               Deep diagnostics for
                                              Ollama connectivity
                                              and runtime hints.
  ollama:embed                                Generates embedding
                                              vector for input text.
  ollama:embed:file                           Embeds file chunks
                                              into vector storage.
  ollama:health                               Checks endpoint
                                              reachability and
                                              readiness.
  ollama:logs                                 Backward-compatible
                                              alias of
                                              ollama:logs:tail.
  ollama:logs:export                          Export Ollama
                                              run/error evidence to
                                              docs/_aiops/ollama/logs/*.md.
  ollama:logs:tail                            Tail app-captured
                                              Ollama logs from file.
  ollama:modelfile:validate                   Validates Ollama
                                              Modelfile.
  ollama:models:create                        Creates a model from
                                              Modelfile.
  ollama:models:diff                          Compare installed
                                              model inventory versus
                                              required profile and
                                              emit remediation.
  ollama:models:ensure                        Ensures required
                                              models exist for a
                                              profile.
  ollama:models:export                        Exports model
                                              inventory for docs or
                                              DB.
  ollama:models:list                          Lists installed Ollama
                                              models.
  ollama:models:prune                         Prunes models based on
                                              simple keep allowlist
                                              policy.
  ollama:models:pull                          Pulls a model with
                                              optional progress
                                              stream flag.
  ollama:models:push                          Pushes a model to
                                              registry.
  ollama:models:rm                            Removes a local model.
  ollama:models:show                          Shows metadata for one
                                              model.
  ollama:ping                                 Low-level ping with
                                              retries.
  ollama:policy:check                         Validates current
                                              governance profile and
                                              limits.
  ollama:policy:export                        Exports active policy
                                              to docs.
  ollama:queue:push                           Queues an Ollama job
                                              in DB.
  ollama:queue:retry                          Retries failed jobs
                                              from queue.
  ollama:queue:stats                          Queue depth and status
                                              counts.
  ollama:queue:work                           Consumes queued Ollama
                                              jobs.
  ollama:rag:query                            Retrieves top-k chunks
                                              and optional answer.
  ollama:run                                  Run an Ollama prompt
                                              from a file and write
                                              response artifacts.
  ollama:sessions:list                        Lists recent Ollama
                                              sessions.
  ollama:sessions:rm                          Deletes a session
                                              record.
  ollama:sessions:show                        Shows one session
                                              transcript.
  ollama:stream                               Streams tokens to
                                              console and transcript
                                              output.
  ollama:version                              Reports Ollama version
                                              info from health
                                              endpoint.

Ops
  ops:diff                                    Compare two files and
                                              persist AIOps diff
                                              artifact.
  ops:diff:wallet                             Run wallet-specific
                                              diff governance check.
  ops:doctor:full                             Run high-signal
                                              diagnostics: env, php
                                              extensions, network
                                              matrix, IMAP
                                              capabilities
                                              (best-effort).
  ops:drift:scan                              Scan critical services
                                              for production drift.
  ops:env:snapshot                            Print key env vars
                                              with secret redaction
                                              (safe for
                                              logs/screenshots).
  ops:grep                                    Search a path for a
                                              plain-text string or
                                              regex pattern.
  ops:integrity:wallet                        Validate wallet
                                              balances against
                                              completed ledger
                                              transactions.
  ops:logger:test                             Writes test entries to
                                              configured logger
                                              handlers.
  ops:network:matrix                          Test outbound
                                              connectivity matrix
                                              (TCP/SSL) with latency
                                              and banner.
  ops:php:extensions                          Audit required PHP
                                              extensions and key INI
                                              values
                                              (IMAP/SSL-friendly).
  ops:subs:audit                              Run subsystem audits
  ops:subs:doctor                             Friendly subsystem
                                              triage
  ops:subs:repair                             Run subsystem repairs
  ops:subs:status                             Combined subsystem
                                              status
  ops:sync                                    Runs an ops sync
                                              pipeline: git
                                              guard/pull + routes
                                              docs + launch audit +
                                              repo health.
  ops:vps:snapshot                            Collect system/runtime
                                              snapshot (no-sudo,
                                              best-effort) and write
                                              docs/_aiops snapshot.

Ops-Terminal
  ops:tail                                    Tail CI logs or any
                                              file

Performance
  perf:k6                                     Run k6 load test

Repo
  repo:class-scan                             Scan repository for
                                              duplicate classes and
                                              namespace conflicts.
  repo:class-trace                            Trace where a class is
                                              declared and
                                              referenced in the
                                              repository.
  repo:diff-split                             Split large git diffs
                                              into smaller review
                                              batches.

Routes
  routes:docs                                 Export active routes
                                              to Markdown + JSON
                                              under docs/routes/.
  routes:reconcile                            Reconcile route
                                              handlers against
                                              actual controllers and
                                              methods.
  routes:repair                               Repair invalid route
                                              handlers, resolve
                                              namespaces, and remove
                                              exact duplicate route
                                              definitions.

Runtime
  spark:fix                                   Auto-heal Spark
                                              command standards and
                                              generate a fix report

Settings
  settings:clear                              Clears all settings
                                              from persistent
                                              storage.
  settings:publish                            Publish Settings
                                              config file into the
                                              current application.

Shield
  shield:hmac                                 Encrypt/Decrypt
                                              secretKey for HMAC
                                              tokens.
  shield:model                                Generate a new
                                              UserModel file.
  shield:setup                                Initial setup for
                                              CodeIgniter Shield.
  shield:user                                 Manage Shield users.

Solana
  solana:preview-browser-runtime:smoke        Phase 16
                                              browser-runtime
                                              simulation for Solana
                                              preview modal and
                                              wallet-signature
                                              safety flow.
  solana:preview-runtime:smoke                Phase 15 smoke test
                                              for Solana preview UX
                                              runtime safety markers
                                              and preview-only API
                                              routes.
  solana:wallet-secrets:audit                 Audit and optionally
                                              encrypt existing
                                              plaintext Solana
                                              wallet access_token
                                              values.

Spark
  registry:audit                              Audit Spark command
                                              registry against
                                              filesystem
                                              declarations and
                                              runtime list output.
  spark-reset                                 Reset Spark caches,
                                              purge command
                                              metadata, and rebuild
                                              autoload (guarded).
  spark:commands:graph                        Generate Spark command
                                              graph
  spark:doctor                                System health
                                              inspector for Spark
                                              commands.

Test
  test:redis                                  Test Redis connection

Translation
  lang:find                                   Find and save
                                              available phrases to
                                              translate.
  lang:sync                                   Synchronize
                                              translation files from
                                              one language to
                                              another.

Worker Mode
  worker:install                              Install FrankenPHP
                                              worker mode by
                                              creating necessary
                                              configuration files
  worker:uninstall                            Remove FrankenPHP
                                              worker mode
                                              configuration files

app
  app:healthcheck                             Compatibility
                                              healthcheck command
                                              aligned to AI-Ops
                                              spark checks.
  app:update                                  Deprecated. Use
                                              ops:app:update
                                              instead.
  runtime:check                               Validate runtime
                                              invariants (nginx,
                                              php, permissions,
                                              etc.).

audit
  audit:node                                  Detect tracked
                                              node_modules and
                                              native build artifacts
                                              (read-only).
  config:drift                                Compare deployed
                                              config and environment
                                              to repo baselines.
  growth:retention-watch                      Detect retention
                                              anomalies from
                                              engagement signals.
  revenue:cost-forecast                       Forecast infra and API
                                              costs and detect
                                              overruns.
  ux:journey-audit                            Validate critical user
                                              journeys (signup to
                                              dashboard flow
                                              checks).

auth
  auth:audit                                  Audit Myth:Auth
                                              authentication and
                                              account lifecycle
                                              flows end-to-end,
                                              including
                                              registration, login,
                                              and reset flows.
  auth:baseline:capture                       Capture auth/authz
                                              golden baseline
                                              artifacts.
  auth:baseline:diff                          Diff current
                                              auth/authz runtime
                                              against current golden
                                              baseline.
  auth:baseline:restore                       Restore auth-critical
                                              files from auth
                                              baseline artifacts.
  auth:flow-smoke                             Smoke test for auth
                                              redirect safety and
                                              login route no-cache
                                              headers.
  auth:funnel-check                           Check auth funnel
                                              sanity using recent
                                              user events and emit
                                              alerts on drop-offs.
  auth:smoke                                  Probe auth-critical
                                              routes and runtime
                                              expectations for
                                              login/register/reset/redirect
                                              safety.
  auth:smoke-test                             Deterministic
                                              Myth/Auth smoke test
                                              for
                                              login/session/reset
                                              flow.
  auth:surface:scan                           Scan and report
                                              auth/authz runtime
                                              surface area.

cache
  cache:audit                                 Scan the repo for
                                              unsafe cache key
                                              usage.

chat
  chat:unlock                                 Safely clear stale
                                              chat runtime lock and
                                              pid files.

codex
  codex:review:pr-outbox                      Review the latest PR
                                              outbox bundle and
                                              publish
                                              CODEX_REVIEW.md.

config
  config:lint                                 Lint
                                              Config/Services.php
                                              overrides against CI4
                                              service signatures.

content
  content:ingest-sample                       Load sample Daily Top
                                              Gainers JSON, ingest,
                                              score, and print the
                                              top 5 ideas.
  contentengine:smoke                         End-to-end smoke test
                                              for the Content Engine
                                              ingest → scoring →
                                              drafts pipeline.

database
  db:apply-docs                               Compile SQL from
                                              docs/mysql and apply
                                              statements with audit
                                              logging.
  db:inventory                                Scan code and
                                              migrations to
                                              inventory MyMI Wallet
                                              tables and generate
                                              integrity docs/SQL
                                              adjustments.
  migrate:dry-run                             List pending
                                              migrations without
                                              executing them.

db
  db:drift                                    Compare live schema to
                                              expected inventory.

env
  env:doctor                                  Environment
                                              diagnostics and
                                              snapshot.

health
  health:cache                                Check CI4 writable
                                              cache directories for
                                              access.
  health:disk                                 Check disk and inode
                                              usage for the host.
  health:git-safety                           Check git ignore rules
                                              for env/writable and
                                              tracked secrets.
  health:services                             Detect web server +
                                              PHP handler status
                                              without systemctl.

investments
  investments:economy:updateall               Fetch and store
                                              economic indicators
                                              from FRED into local
                                              tables.

logs
  logs:doctor                                 Validate CI4 logging
                                              and debug visibility
                                              plumbing.
  logs:healthcheck                            Emit test logs and
                                              verify file + DB log
                                              sinks are functioning.
  logs:summarize                              Summarize CI4 logs for
                                              a given date,
                                              including new entries
                                              since the last run.
  logs:summarize-all                          Summarize logs for all
                                              known subsystems from
                                              writable/logs/** and
                                              emit docs/_aiops/logs
                                              markdown reports.
  logs:test                                   Canonical logging test
                                              command (writes
                                              debug/info/error and
                                              validates file + DB
                                              sinks).

maintenance
  audit:psr4                                  Audit PSR-4 compliance
                                              for the app namespace.
  logs:full-report                            Summarize CI4 + Apache
                                              + PHP logs for a given
                                              date.
  mail:send-test                              Send a test email
                                              using branded
                                              templates.
  mail:test                                   Send a DreamHost SMTP
                                              test email and output
                                              transport diagnostics.
  mail:verify                                 Verify SMTP settings
                                              by sending a
                                              diagnostic email.
  news:audit                                  Audit recent marketing
                                              news ingestion,
                                              summarization, and
                                              post generation.
  routes:auth-audit                           Audit public routes
                                              for unauthenticated
                                              access regressions.
  spark:diagnose-502                          Diagnose common 502
                                              causes (php-fpm,
                                              nginx, socket).
  spark:diagnose-503                          Diagnose common 503
                                              causes (cache,
                                              maintenance,
                                              upstream).
  spark:purge-fastcgi                         Detect and neutralize
                                              legacy FastCGI/php-pm
                                              socket references
                                              safely.
  spark:restart-safe                          Flush caches/sessions
                                              safely and guide a
                                              no-sudo restart flow
                                              on DreamHost.
  spark:traffic-spike-guard                   Detect traffic/error
                                              spikes that commonly
                                              lead to 503 and alert
                                              Discord.

marketing
  marketing:automation:audit                  Verify marketing
                                              automations, cron
                                              hooks, and API usage
                                              expectations.
  revenue:scan                                Scan the repository
                                              for monetizable
                                              features and generate
                                              revenue stream docs.

master
  master:health:commands                      Inspect Spark command
                                              inventory and
                                              metadata.
  master:health:controllers                   Inspect controllers
                                              for basic CI4 health
                                              issues.
  master:health:dependencies                  Inspect service(),
                                              model, and view
                                              dependency references
                                              across controllers.
  master:health:docs                          Inspect docs directory
                                              health and summary
                                              coverage.
  master:health:logs                          Inspect writable/logs
                                              for current log file
                                              health.
  master:health:models                        Inspect models for
                                              table mapping and
                                              basic CI4 model
                                              metadata.
  master:health:routes                        Inspect route
                                              configuration files
                                              and emit a health
                                              report.
  master:health:services                      Inspect service
                                              classes and
                                              app/Config/Services.php
                                              references.
  master:health:views                         Inspect views
                                              inventory and view
                                              directory health.
  master:knowledge-graph:build                Build a CI4 knowledge
                                              graph from
                                              controllers, routes,
                                              models, services,
                                              views, and commands.
  master:run-all                              Run the master docs,
                                              graph, and health
                                              pipeline.

mdit
  mdit:nav:compute_daily                      Compute and snapshot
                                              the daily MDIT NAV.

ops
  dreamhost:dns-verify                        Ops helper command:
                                              dreamhost:dns-verify
  dreamhost:email-audit                       Ops helper command:
                                              dreamhost:email-audit
  dreamhost:email-list                        Ops helper command:
                                              dreamhost:email-list
  dreamhost:limits                            Ops helper command:
                                              dreamhost:limits
  email:healthcheck                           Ops helper command:
                                              email:healthcheck
  email:queue-scan                            Ops helper command:
                                              email:queue-scan
  email:test                                  Ops helper command:
                                              email:test
  fix:503                                     Diagnose and attempt
                                              safe auto-fixes for
                                              503 errors.
  logs:scan                                   Ops helper command:
                                              logs:scan
  logs:watch                                  Ops helper command:
                                              logs:watch
  ops:analyze-commands                        Analyze parsed ops
                                              inbox items and
                                              generate AI plans
  ops:app:update                              Safely update and
                                              validate the CI4
                                              application.
  ops:ci:prepare                              Prepare deterministic
                                              writable/artifact
                                              directories for CI
                                              runs.
  ops:commands:audit                          Audit Spark commands
                                              for illegal
                                              constructors.
  ops:commands:autofix                        Auto-fix Spark
                                              commands that define
                                              illegal constructors.
  ops:commands:inventory                      Generate Spark command
                                              inventory from
                                              Console.php and
                                              command files.
  ops:commands:lint                           Lint Spark commands
                                              for runtime safety
                                              contracts and
                                              documentation
                                              coverage.
  ops:commands:missing                        Check commands missing
                                              from Console registry
  ops:config:lint                             Lint Config files for
                                              illegal patterns
                                              (env(), dynamic
                                              expressions,
                                              protocols).
  ops:console:build                           Rebuild Console.php
                                              command registry
  ops:fetch-commands                          Fetch unread ops
                                              commands from IMAP and
                                              store them in
                                              bf_ops_command_inbox
  ops:filesystem-scan                         Ops helper command:
                                              ops:filesystem-scan
  ops:filesystem:fix                          Auto-fix filesystem
                                              governance violations
  ops:filesystem:lint                         Lint and optionally
                                              auto-fix filesystem
                                              governance violations.
  ops:healthcheck                             Ops helper command:
                                              ops:healthcheck
  ops:model-limit:audit                       Audit
                                              models/services/libraries
                                              for unbounded query
                                              patterns.
  ops:next-steps                              Generate next-steps
                                              issues from audit
                                              commands and write
                                              docs/snapshots.
  ops:next-steps:sync                         Diff latest snapshots
                                              and queue net-new
                                              issues.
  ops:next-steps:sync-manual                  Sync manual TODOs from
                                              docs/_aiops/next-steps.md
                                              into the database.
  ops:nginx-status                            Ops helper command:
                                              ops:nginx-status
  ops:php-fpm-health                          Ops helper command:
                                              ops:php-fpm-health
  ops:propose-pr                              Generate and validate
                                              a PR artifact bundle,
                                              then export to tracked
                                              outbox for GitHub
                                              automation.
  ops:report                                  Ops helper command:
                                              ops:report
  ops:self-heal                               Ops helper command:
                                              ops:self-heal
  ops:work                                    Process AiOps task
                                              queue items safely.

platform
  platform:control:analyze                    Analyze collected
                                              control-plane
                                              artifacts and output
                                              ranked action queue.
  platform:control:collect                    Collect edge snapshots
                                              from registered
                                              platform manifests.
  platform:control:dispatch                   Dispatch or dry-run
                                              actions generated by
                                              control-plane
                                              analysis.
  platform:control:run                        Run control-plane
                                              collect -> analyze ->
                                              dispatch pipeline.
  platform:cron:dispatch                      Cron-friendly wrapper
                                              for control-plane
                                              dispatch dry-run
                                              workflow.
  platform:edge-snapshot                      Generate lightweight
                                              edge status and
                                              metrics artifacts for
                                              control-plane
                                              collection.
  platform:run                                Run deterministic
                                              platform lifecycle
                                              orchestration with
                                              safe failure
                                              isolation.
  platform:run:report                         Print latest platform
                                              run report summary.
  platform:run:subsystem                      Run platform pipeline
                                              scoped to one or more
                                              subsystems.

research
  research:alerts:cleanup                     Clean up stale
                                              research
                                              alert/watchlist rows.
  research:alerts:watchlist-import            
  research:data:compile                       
  research:earnings:calendar                  Collect earnings
                                              calendar research
                                              items
  research:google:scan                        Scan Google for
                                              financial research
                                              links
  research:intelligence:signals               Generate trade-signal
                                              intelligence from
                                              research rankings and
                                              the financial
                                              knowledge graph
  research:knowledge:build                    Build financial
                                              knowledge graph
  research:news:collect                       
  research:pipeline:run                       
  research:reports:daily                      Generate daily market
                                              research report
  research:reports:weekly                     Generate weekly market
                                              research report
  research:short-interest:scan                Scan short-interest
                                              candidates

runtime
  optimize:safe                               Run CI4 optimize
                                              safely (CI-only)
  runtime:cache-boot                          Validate cache boot
                                              health and warm
                                              critical cache keys.
  runtime:diagnose-502                        Diagnose and
                                              optionally remediate
                                              502/503 gateway errors
  runtime:spark-doctor                        Validate Spark command
                                              discovery and CI4
                                              compatibility
  runtime:triage                              Consolidate runtime
                                              diagnostics into a
                                              single report.

scanning
  scanning:run                                Run MyMI liquidity +
                                              momentum scanner

security
  keys:generate                               Generate a
                                              cryptographically
                                              secure encryption key.
  keys:generate-ci4                           Generate and rotate
                                              CodeIgniter 4
                                              encryption.key
  security:csp:audit                          Scan view templates
                                              for CSP-unsafe inline
                                              scripts, styles, and
                                              handlers.
  security:secrets-audit                      Detect sensitive
                                              secrets in configs,
                                              logs, or docs.

wallets
  wallets:warm-summary-cache                  Pre-warm the
                                              /API/Wallets/summary
                                              cache for active
                                              users.
```

## Existing AIOps Alert / API / Marketing Commands

```text
  aiops:alerts-clean                          Delete completed aiops
  aiops:solana-digest                         Summarize current
  aiops:api:schema                            Validate API endpoints
  aiops:alerts-check                          Fetch emails and queue
  aiops:alerts-health                         Run health checks on
  aiops:alerts-worker                         Process queued alert
  aiops:sql:check                             Validate
AIOps - Marketing
  aiops:email-scan                            Scan alerts mailbox
                                              generated trade
  alerts:fetch-raw-emails                     Fetch raw trade alert
                                              bf_investment_scraper
                                              upsert trade alerts.
  app:compat-audit                            Audit MyMI Wallet for
  coinvault:tbi-external-contribution-smoke   Validate MyMI
                                              MyMIDiscord.
                                              generate a MyMI Wallet
Marketing
  marketing:approve-generated                 Approve generated
                                              marketing content and
  marketing:audit:distribution                Audit marketing
  marketing:bluesky:healthcheck               Run Bluesky
                                              marketing
  marketing:daily-audit                       Daily marketing
  marketing:discord-activation                Send one-time Discord
                                              marketing stream
  marketing:discord:test-all-categories       Loop all configured
                                              marketing Discord
  marketing:discord:test-category             Send a
  marketing:distribute                        Distribute approved
                                              generated marketing
  marketing:distribution:assert-sql           Runs SQL-level anomaly
                                              marketing
  marketing:distribution:failure-inject-test  Dev-safe failure
  marketing:email:clean                       Moves already-ingested
  marketing:generate:package                  Generate a marketing
  marketing:mastodon:healthcheck              Run Mastodon
                                              marketing
  marketing:news:debug                        Diagnose marketing
  marketing:news:generate                     Generates clustered
                                              bf_marketing_temp_scraper
  marketing:news:imap-test                    Smoke test for
                                              marketing/news IMAP
  marketing:news:scrape                       Ingests alert/news
                                              bf_marketing_temp_scraper
  marketing:news:seed-test                    Insert synthetic rows
                                              bf_marketing_temp_scraper
  marketing:notification:test                 Test marketing
  marketing:pipeline                          Runs marketing
  marketing:process-notifications             Process pending
                                              marketing
                                              generate marketing
  marketing:promotions:audit                  Audit promotion source
  marketing:promotions:generate               Generate promotion
                                              finalized marketing
  marketing:promotions:test                   Run a chained smoke
  marketing:regression:smoke                  Runs full marketing
  marketing:retry-distribution                Retry failed marketing
  marketing:scraper:audit-emails              Audit recent trade and
                                              news emails against
                                              inventory MyMI Wallet
investments
  investments:economy:updateall               Fetch and store
  news:audit                                  Audit recent marketing
                                              news ingestion,
marketing
  marketing:automation:audit                  Verify marketing
  research:intelligence:signals               Generate trade-signal
  research:news:collect                       
  scanning:run                                Run MyMI liquidity +
```

## Alert-Related Files

```text
app/Commands/DiscordCustomSend.php
app/Commands/Errors/DispatchAlerts.php
app/Commands/Marketing/DiscordActivationAnnouncement.php
app/Commands/Marketing/DiscordTestAllCategories.php
app/Commands/Marketing/DiscordTestCategory.php
app/Commands/Marketing/NewsDebug.php
app/Commands/Marketing/NewsGenerate.php
app/Commands/Marketing/NewsImapTest.php
app/Commands/Marketing/NewsScrape.php
app/Commands/Marketing/NewsSeedTest.php
app/Commands/NewsAudit.php
app/Commands/Research/DailyMarketReport.php
app/Commands/Research/FinancialNewsCollect.php
app/Commands/Research/MarketDataCompile.php
app/Commands/Research/WeeklyMarketReport.php
app/Commands/SolanaDigest.php
app/Config/DiscordHelp.php
app/Config/DiscordOps.php
app/Config/Discord.php
app/Config/MarketingDistribution.php
app/Config/Marketing.php
app/Config/NewsEmailServer.php
app/Database/Migrations/2006-04-18-000001_CreateFinancialNewsTable.php
app/Database/Migrations/2025-09-09-000010_CreatePredictionsMarkets.php
app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php
app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php
app/Database/Migrations/2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php
app/Database/Migrations/2026-03-12-000100_CreateInvestmentForecastAccuracy.php
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php
app/Database/Migrations/2026-03-20-000120_CreateTradeAlertScannerMeta.php
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php
app/Database/Migrations/2026-03-30-000400_AddTickerToProjects.php
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php
app/Database/Migrations/2026-04-09-120000_EnhanceMarketingGenerationPipeline.php
app/Database/Migrations/2026-04-09-130000_HardenMarketingNewsPipelineSchema.php
app/Database/Migrations/2026-04-12-120050_CreateMarketingDistributionTargets.php
app/Database/Migrations/2026-04-12-221500_AddExternalFieldsToMarketingDistributionTargets.php
app/Database/Migrations/2026-04-13-090000_AddDiscordCategoryFieldsToMarketingGeneratedContent.php
app/Database/Migrations/2026-04-13-120000_CreateDiscordOpsTables.php
app/Database/Migrations/2026-04-14-120000_RenameDiscordManualMessageRecipientFields.php
app/Database/Migrations/2026-04-19-000001_CreateMarketingPageSeoTable.php
app/Database/Migrations/2026-04-23-090000_HardenMarketingDistributionTargetsForReliability.php
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php
app/Database/Seeds/MarketingVideoStudioSeeder.php
app/Helpers/news_helper.php
app/Libraries/AlertChannelInterface.php
app/Libraries/AlertChannels/DiscordChannel.php
app/Libraries/AlertJobQueue.php
app/Libraries/AlertSourceInterface.php
app/Libraries/AlertSources/MarketAuxNewsSource.php
app/Libraries/ContentEngine/templates/discord.php
app/Libraries/DiscordAlert.php
app/Libraries/MarketNewsProvider.php
app/Libraries/MyMIAlerts.php
app/Libraries/MyMIDiscord.php
app/Libraries/MyMIInvestments.php
app/Libraries/MyMIMarketAux.php
app/Libraries/MyMIMarketData.php
app/Libraries/MyMIMarketing.php
app/Libraries/MyMINews.php
app/Libraries/MyMISnapTrader.php
app/Libraries/TradeAlertMailboxFetcher.php
app/Libraries/Trades/TradeEnhancements.php
app/Libraries/Traits/MarketingBatchTrait.php
app/Models/AlertJobModel.php
app/Models/AlertsModel.php
app/Models/DiscordAiMessageModel.php
app/Models/DiscordAiNoteModel.php
app/Models/DiscordAiSessionModel.php
app/Models/DiscordLinkModel.php
app/Models/DiscordManualMessageModel.php
app/Models/DiscordModel.php
app/Models/DiscordRelayAuditModel.php
app/Models/ErrorAlertEventModel.php
app/Models/ErrorAlertRuleModel.php
app/Models/Fin/TradeModel.php
app/Models/InvestmentForecastAccuracyModel.php
app/Models/InvestmentForecastHistoryModel.php
app/Models/InvestmentModel.php
app/Models/InvestmentPriceForecastModel.php
app/Models/InvestmentScannerLineageModel.php
app/Models/InvestmentTickerDailyCountModel.php
app/Models/MarketingDistributionTargetModel.php
app/Models/Marketing/EmailMarketingModel.php
app/Models/Marketing/MarketingPublishQueueModel.php
app/Models/Marketing/MarketingVideoAssetModel.php
app/Models/Marketing/MarketingVideoContentModel.php
app/Models/Marketing/MarketingVideoTemplateModel.php
app/Models/Marketing/MarketingVideoVersionModel.php
app/Models/MarketingModel.php
app/Models/MarketingNewsletterModel.php
app/Models/Predictions/MarketsModel.php
app/Models/Predictions/TradesModel.php
app/Models/TradeAlertScannerMetaModel.php
app/Modules/APIs/Controllers/AlertsAPIController.php
app/Modules/APIs/Controllers/AlertsPublicAPIController.php
app/Modules/APIs/Controllers/DiscordAPIController.php
app/Modules/APIs/Controllers/InvestmentsAPIController.php
app/Modules/APIs/Controllers/MarketingAPIController.php
app/Modules/APIs/Models/InvestmentsNewsModel.php
app/Modules/APIs/Models/InvestmentsTickersModel.php
app/Modules/APIs/Models/MarketingNewsContentModel.php
app/Modules/Blog/Controllers/NewsAndUpdates.php
app/Modules/Blog/Views/HowItWorks/Daily_Financial_News.php
app/Modules/Blog/Views/HowItWorks/Discord.php
app/Modules/Blog/Views/HowItWorks/Investment_Portfolio_Management.php
app/Modules/Blog/Views/Investing/Tips_For_Effective_Investment_Portfolio_Management.php
app/Modules/Exchange/Views/Solana/trade.php
app/Modules/Management/Controllers/AlertsAdminController.php
app/Modules/Management/Controllers/DiscordAdminController.php
app/Modules/Management/Controllers/InvestmentsAdminController.php
app/Modules/Management/Controllers/MarketingAdminController.php
app/Modules/Management/Controllers/MarketingController-07012024.php.tmp
app/Modules/Management/Controllers/MarketingController.11202024.php.tmp
app/Modules/Management/Documents/Marketing/MarketingOpRunbook.md
app/Modules/Management/Models/AlertPendingModel.php
app/Modules/Management/Views/Alerts/emails/trade_alerts.php
app/Modules/Management/Views/Alerts/form_fields/trade_alert_fields.php
app/Modules/Management/Views/Alerts/modals/addTrade.php
app/Modules/Management/Views/Alerts/modals/createTradeAlert.php
app/Modules/Management/Views/Alerts/modals/manageTradeAlert.php
app/Modules/Management/Views/Alerts/modals/viewTradeChart.php
app/Modules/Management/Views/Alerts/resources/market-data.php
app/Modules/Management/Views/Alerts/resources/sendDiscordAlert.php
app/Modules/Management/Views/Alerts/tradeAnalysis.php
app/Modules/Management/Views/Alerts/tradeDetails.php
app/Modules/Management/Views/Alerts/Trades.php
app/Modules/Management/Views/Assets/Applications/Approval/Market_Conversion.php
app/Modules/Management/Views/Investments/news.php
app/Modules/Management/Views/Marketing/Exchanges/includes/discord.php
app/Modules/Management/Views/Marketing/financialNews.php
app/Modules/Management/Views/Marketing/Marketing_Manager_10162023.php
app/Modules/Management/Views/Marketing/Marketing_Manager.php
app/Modules/Management/Views/Projects/index/investment_commitment.php
app/Modules/Management/Views/Web_Design/Infrastructure_Overview/Alerting_System/Breakout_Stock_Alerts.php
app/Modules/Management/Views/Web_Design/Infrastructure_Overview/Alerting_System/Instant_Buy_Alerts.php
app/Modules/Management/Views/Web_Design/Infrastructure_Overview/Alerting_System/Market_Movers.php
app/Modules/Management/Views/Web_Design/Infrastructure_Overview/Alerting_System/Targeting/Instant_Buy_Alerts.php
app/Modules/Management/Views/Web_Design/Infrastructure_Overview/Alerting_System/Targeting/Market_Movers.php
app/Modules/Management/Views/Web_Design/Test_Page/trade_tracker.php
app/Modules/Marketing_New/Models/MarketingModel.php
app/Modules/PropFirms/Models/PropTradeJournalModel.php
app/Modules/ScriptStudio/Views/marketplace.php
app/Modules/Support/Libraries/DiscordSupportNotifier.php
app/Modules/Support/Views/discord_onboarding.php
app/Modules/User/Controllers/AlertsController.php
app/Modules/User/Controllers/InvestmentsController.php
app/Modules/User/Controllers/TradeTracker.php
app/Modules/User/Views/Alerts/trades.php
app/Modules/User/Views/Investments/Add/Bond/trade.php
app/Modules/User/Views/Investments/Add/trade.php
app/Modules/User/Views/Investments/index/Investment_Calendar.php
app/Modules/User/Views/Investments/index/Investment_Research.php
app/Modules/User/Views/Investments/index/Investment_Tools.php
app/Modules/User/Views/Investments/index/Investment_Tools-sm.php
app/Modules/User/Views/Investments/index/Markets.php
app/Modules/User/Views/Investments/index/My_Alerts.php
app/Modules/User/Views/Investments/index/MyMI_News.php
app/Modules/User/Views/Investments/index/Recent_Trades.php
app/Modules/User/Views/Investments/index/Top_Trades.php
app/Modules/User/Views/Investments/resources/import_investments.php
app/Modules/User/Views/Investments/resources/manage_trade.php
app/Modules/User/Views/Investments/resources/market_news.php
app/Modules/User/Views/Investments/resources/mymi_news.php
app/Modules/User/Views/Investments/resources/set_alerts.php
app/Modules/User/Views/Investments/resources/share_trade.php
app/Modules/User/Views/Investments/resources/working/all_investments.php
app/Modules/User/Views/Investments/tradeTracker copy 2.php
app/Modules/User/Views/Investments/tradeTracker copy.php
app/Modules/User/Views/Investments/tradeTracker-full-functionality.php
app/Modules/User/Views/Investments/tradeTracker.php
app/Modules/User/Views/Investments/tradeTracker-working-12082024.php
app/Modules/User/Views/Knowledgebase/includes/Assets/mymi_marketplace.php
app/Modules/User/Views/Knowledgebase/Trade_Tracker.php
app/Modules/User/Views/Predictions/markets.php
app/Modules/User/Views/Projects/holdings/list_investments.php
app/Modules/User/Views/Projects/index/investment_commitment.php
app/Modules/User/Views/Referral_Program/Marketing_Affiliate_Program_Agreement.php
app/Modules/User/Views/Wallets/Add_Account/investment_fields.php
app/Modules/User/Views/Wallets/Details/investment_accounts.php
app/Modules/User/Views/Wallets/Edit_Account/investment_fields.php
app/Modules/User/Views/Wallets/index/investment_wallets.php
app/Modules/User/Views/Wallets/Link_Account/Import-Trades.php
app/Modules/User/Views/Wallets/Link_Account (Original)/Import-Trades.php
app/Modules/User/Views/Wallets/Link_Account (Original)/TD-Ameritrade.php
app/Modules/User/Views/Wallets/Link_Account (Original)/Trade-Import-Success.php
app/Modules/User/Views/Wallets/Link_Account (Original)/Upload-Trades.php
app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-07202022.php
app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-B.php
app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade.php
app/Modules/User/Views/Wallets/Link_Account/Trade-Import-Success.php
app/Modules/User/Views/Wallets/Link_Account/Upload-Trades.php
app/Modules/User/Views/Wallets/types/investment_wallets.php
app/Services/AlertService.php
app/Services/Discord/DiscordOpsRelayService.php
app/Services/Forecasting/MarketDataProviderInterface.php
app/Services/InvestmentService.php
app/Services/Marketing/Distribution/Adapters/DiscordDestinationAdapter.php
app/Services/Marketing/Distribution/DiscordMessageBuilder.php
app/Services/MarketingDistributionService.php
app/Services/Marketing/EmailMarketingService.php
app/Services/Marketing/MarketingNotificationService.php
app/Services/Marketing/MarketingVideoService.php
app/Services/MarketingNewsGenerateService.php
app/Services/MarketingNewsScrapeService.php
app/Services/MarketingNotificationService.php
app/Services/MarketingPackageService.php
app/Services/MarketingPipelineService.php
app/Services/MarketingScraper.php
app/Services/MarketingService.php
app/Services/MarketingStoryService.php
app/Services/Observability/ErrorAlertService.php
app/Services/Scanning/Providers/MarketDataProviderInterface.php
app/Services/Scanning/ScannerAlertBridge.php
app/Services/TradeAlertsIngest.php
app/Views/Auth/register/Discord.php
app/Views/emails/ai_ops_alert.php
app/Views/themes/public/how_it_works/alerts.php
app/Views/themes/public/previewAlert.orig.php
app/Views/themes/public/previewAlert.php
```

## Alert-Related Routes

```text
| GET     | Alerts/Preview/([^/]+)                                                      | »                                              | \App\Modules\User\Controllers\AlertsController::preview/$1                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                         | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Preview/Alert/([^/]+)                                                       | »                                              | \App\Modules\User\Controllers\AlertsController::preview/$1                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Investments/News                                                            | »                                              | (Closure)                                                                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Purchase/MyMIGold                                                           | »                                              | (Closure)                                                                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                         | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | How-It-Works/Purchase/MyMIGold                                              | »                                              | (Closure)                                                                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Discord/register                                                            | discord-register                               | \App\Controllers\AuthController::register                                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf no-cache                          | no-cache cspoff sessionTracker requestLifecycle observability jsonException toolbar                        |
| GET     | Discord/register/([^/]+)                                                    | discord-register-referral                      | \App\Controllers\AuthController::register/$1                                                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf no-cache                          | no-cache cspoff sessionTracker requestLifecycle observability jsonException toolbar                        |
| GET     | MyMI-Wallet                                                                 | mymi-wallet                                    | \App\Modules\User\Controllers\WalletsController::MyMIWallet                                           | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Trade-Tracker                                                               | mymi-trade-tracker                             | \App\Modules\User\Controllers\InvestmentsController::tradeTracker                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Trade-Tracker/getTradeData                                                  | get-trade-tracker-data                         | \App\Modules\User\Controllers\InvestmentsController::getTradeData                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | MyMI-Gold/Goals/([^/]+)                                                     | mymi-gold-daily-goals                          | \App\Modules\User\Controllers\DashboardController::goals                                              | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | API/mobile/investments                                                      | »                                              | \App\Modules\APIs\Controllers\MobileController::investments                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked apiToken                                           | apiToken cspoff sessionTracker requestLifecycle observability jsonException toolbar                        |
| GET     | API/mobile/alerts                                                           | »                                              | \App\Modules\APIs\Controllers\MobileController::alerts                                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked apiToken                                           | apiToken cspoff sessionTracker requestLifecycle observability jsonException toolbar                        |
| GET     | API/cronFetchAndGenerateNews                                                | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchAndGenerateNews                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getSymbolsByTradeType/([^/]+)                               | »                                              | \App\Modules\APIs\Controllers\APIController::getSymbolsByTradeType/$1                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getForecastDetails/([^/]+)                                  | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getForecastDetails/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getConfidenceHeatmap                                        | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getConfidenceHeatmap                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getTopConfidenceBySector                                    | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getTopConfidenceBySector                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getConfidenceDistribution                                   | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getConfidenceDistribution                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getForecastAccuracySummary                                  | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getForecastAccuracySummary                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/commandsCatalog                                                 | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::commandsCatalog                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/onboardingSteps                                                 | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::onboardingSteps                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/sharingGuide                                                    | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::sharingGuide                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/health                                                          | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::health                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/lookup/ticker                                                   | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::tickerLookup                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/lookup/crypto                                                   | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::cryptoLookup                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/lookup/quote                                                    | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::quoteLookup                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/process-queue                                                   | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::processQueue                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/coalesce-now                                                    | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::coalesceNow                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Management/distributeTodaysNewsContent                                  | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::distributeTodaysNewsContent                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/fetchAlphaVantageNewsForTradeAlerts                          | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::fetchAlphaVantageNewsForTradeAlerts            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/fetchNewsEmails                                              | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::fetchNewsEmails                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/generateCoffeeAndStocksNewsletter                            | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::generateCoffeeAndStocksNewsletter              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/fetchCoffeeAndStocksNewsletter                               | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::fetchCoffeeAndStocksNewsletter                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/runBackfillAlertsEmails                                      | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::runBackfillAlertsEmails                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/runBackfillMarketingEmails                                   | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::runBackfillMarketingEmails                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/getAlerts                                                    | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::getAlerts                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/getNews                                                      | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::getNews                                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/processAllTradeAlerts                                        | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::processAllTradeAlerts                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/sendAllDiscordAlerts                                         | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::sendAllDiscordAlerts                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/updateMarketDataForAlerts                                    | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::updateMarketDataForAlerts                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/cronAnalyzeContent                                 | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronAnalyzeContent                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/cronFetchAndGenerateNews                           | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchAndGenerateNews                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/generateContent                                    | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchAndGenerateNews                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/cronFetchInbox                                     | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchInbox                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/cronFetchMarketingEmails                           | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchMarketingEmails                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/generateContentDigestFromStored                    | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::generateContentDigestFromStored                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/generateContentFromScraper                         | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::generateContentFromScraper                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/generateDailyContentDigest                         | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::generateDailyContentDigest                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/massResendActivationEmails                         | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::massResendActivationEmails                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/getSocialPlatforms                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getSocialPlatforms                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/getSocialCommunities                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getSocialCommunities                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/saveSocialCommunity                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::saveSocialCommunity                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/getPostTemplates                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getPostTemplates                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/savePostTemplate                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::savePostTemplate                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/generatePlatformPosts/([0-9]+)                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generatePlatformPosts/$1                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/generatePlatformPosts                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generatePlatformPosts                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/generateDailyCommunityPosts                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateDailyCommunityPosts                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/exportGeneratedPostJson/([0-9]+)                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::exportGeneratedPostJson/$1                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/generateRevenueDocs                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateRevenueDocs                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/cronGenerateDailyCommunityPosts                              | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronGenerateDailyCommunityPosts                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/cronQueueDistribution                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronQueueDistribution                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Alerts/ingestCsvSignals                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::ingestCsvSignals                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/signals                                                          | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getSignals                                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/signalFiles                                                      | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getSignalFiles                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/previewSignalFile/([0-9]+)                                       | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::previewSignalFile/$1                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/recalcSignalScores                                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::recalcSignalScores                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/addTradeAlert                                                    | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::addTradeAlert                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/backfillCategories                                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::backfillCategories                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/createTradeAlert/([^/]+)                                         | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::addTradeAlert                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/createTradeAlert                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::addTradeAlert                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getFilteredAlerts                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getFilteredAlerts                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/scanner                                                          | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::scanner                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/fetchAutoGeneratedAnalysis                                       | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::fetchAutoGeneratedAnalysis                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/fetchEmailAlerts                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::fetchEmailAlerts                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/fetchMarketAuxNews/([^/]+)                                       | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::fetchMarketAuxNews/$1                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/forceFetchEmails                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::forceFetchEmails                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/forceFetchTickers                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::forceFetchTickers                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateMarketingForAlert/([0-9]+)                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateMarketingForAlert/$1                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateNow                                                      | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateNow                                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateTradeAlertSummary                                        | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateTradeAlertSummary                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getEmaComparison/([^/]+)                                         | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getEmaComparison/$1                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateAlertSocialCopy/([0-9]+)                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateAlertSocialCopy/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getFullMetrics                                                   | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getFullMetrics                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getLatestPrices                                                  | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getLatestPrices                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getTechnicalIndicators                                           | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getTechnicalIndicators                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/hideTradeAlert                                                   | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::hideTradeAlert                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/manageTradeAlert                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::manageTradeAlert                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/markAlertAsSentAndSendEmail/([^/]+)                              | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::markAlertAsSentAndSendEmail/$1                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/processAlerts                                                    | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::processAlerts                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/processEmailAlerts                                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::processEmailAlerts                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/processTradeAlerts                                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::processTradeAlerts                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/processTradeBatch                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::processTradeBatch                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/sendAlert                                                        | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::sendAlert                                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/sendDiscordAlerts                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::sendDiscordAlerts                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/sendDiscordAlertsBySymbol/([^/]+)                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::sendDiscordAlertsBySymbol/$1                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/storeMarketingContent                                            | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::storeMarketingContent                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/updateBatchPrices                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateBatchPrices                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/updateChartOverride                                              | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateChartOverride                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/updateExchange                                                   | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateExchange                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/updateStatus/([0-9]+)/(.*)                                       | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateStatus/$1/$2                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/updateTradeAlerts                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateTradeAlerts                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/submitTradeAlert                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::submitTradeAlert                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getTradeAlertDetails                                             | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getTradeAlertDetails                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateVoiceoverScript                                          | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateVoiceoverScript                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateVoiceoverAndMarketingContent                             | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateVoiceoverAndMarketingContent               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateAndStoreVoiceover                                        | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateAndStoreVoiceover                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateSocialMediaPosts                                         | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateSocialMediaPosts                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/postMarketingContentToSocials                                    | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::postMarketingContentToSocials                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/gen-keys                                                         | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::genKeys                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/sign                                                             | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::sign                                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Broker/investment-accounts                                              | »                                              | \App\Modules\APIs\Controllers\BrokerAPIController::investmentAccounts                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Broker/fetchPlaidInvestments/([^/]+)                                    | »                                              | \App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidInvestments/$1                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Broker/fetchPlaidInvestments                                            | »                                              | \App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidInvestments                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Budget/investment-accounts                                              | »                                              | \App\Modules\APIs\Controllers\BudgetAPIController::investmentAccounts                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments                                                             | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController:index                                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getInvestmentData/([^/]+)                                   | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getInvestmentData/$1                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/searchTickers                                               | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::searchTickers                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/news                                                        | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::listNews                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/news/([0-9]+)                                               | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getNews/$1                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getForecastHighlights                                       | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getForecastHighlights                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronAnalyzeContent                                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronAnalyzeContent                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronAutoPublishGroupedDigest                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronAutoPublishGroupedDigest                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronFetchAndGenerateNews                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronFetchAndGenerateNews                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronFetchInbox                                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronFetchInbox                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronFetchMarketingEmails                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronFetchMarketingEmails                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronProcessSMSMarketingIdeas                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronProcessSMSMarketingIdeas                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/downloadVoiceover/(.*)                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::downloadVoiceover/$1                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/distributeHighScoreContent                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::distributeHighScoreContent                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/emailPostForApproval/([0-9]+)                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::emailPostForApproval/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchBufferPaginated                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchBufferPaginated                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchFinalizedSummariesBlock                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchFinalizedSummariesBlock                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchGeneratedSummaries                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchGeneratedSummaries                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchGeneratedSummariesBlock                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchGeneratedSummariesBlock                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchGeneratedSummariesJson                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchGeneratedSummariesJson                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getVideoContent/([0-9]+)                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getVideoContent/$1                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getVideoQueue                                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getVideoQueue                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateFromTicker                                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromTicker                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateFromTopic                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromTopic                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateFromScrapedSource/([0-9]+)                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromScrapedSource/$1                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/exportVideoPackage/([0-9]+)                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::exportVideoPackage/$1                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getTemplates                                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getTemplates                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/saveTemplate                                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::saveTemplate                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/forceGenerateFromTemp                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::forceGenerateFromTemp                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/ForceGenerateFromTemp/([0-9]+)                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::ForceGenerateFromTemp/$1                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateCampaignContent                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateCampaignContent                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateDailyMarketCampaign                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateDailyMarketCampaign                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateCampaignStepContent                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateCampaignStepContent                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateContentFromScraper                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateContentFromScraper                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateContentDigestFromStored                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateContentDigestFromStored                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateDailyContentDigest                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateDailyContentDigest                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateKimiSummaries                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateKimiSummaries                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateKimiPosts                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateKimiPosts                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/GenerateFromSimilar/([0-9]+)                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromSimilar/$1                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateFromSimilar                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromSimilar                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateLivePreview                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateLivePreview                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generatePostsFromSummary/([0-9]+)                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generatePostsFromSummary/$1                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generatePostsFromSummary                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generatePostsFromSummary                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generatePostMediaContent                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generatePostMediaContent                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateScheduledPosts                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateScheduledPosts                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getCleanedScrapedContent                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getCleanedScrapedContent                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getScrapeDetails/([0-9]+)                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getScrapeDetails/$1                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateThreadFromSummary/([0-9]+)                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateThreadFromSummary/$1                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getContentPerformanceAnalytics                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getContentPerformanceAnalytics                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getGeneratedPostsPaginated                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getGeneratedPostsPaginated                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getStoryboardPackage/([0-9]+)                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getStoryboardPackage/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getTopGeneratedPosts                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getTopGeneratedPosts                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getTopKeywordChart/([0-9]+)                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getTopKeywordChart/$1                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/groupSimilarSummariesByCosine                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::groupSimilarSummariesByCosine                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/massResendActivationEmails                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::massResendActivationEmails                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/monitorKeywords                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::monitorKeywordsAndScrape                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/previewBufferItem/([0-9]+)                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::previewBufferItem/$1                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/previewPendingSummaries                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::previewPendingSummaries                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processMarketingTempEmails/([0-9]+)/([^/]+)/([0-9]+)          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processMarketingTempEmails/$1/$2/$3             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processMarketingTempEmails/([0-9]+)/([^/]+)                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processMarketingTempEmails/$1/$2                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/publishGroupedContentDraft                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::publishGroupedContentDraft                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/rankBufferPostsDaily                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::rankBufferPostsDaily                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runNewsScrape                                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runNewsScrape                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runNewsGenerate                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runNewsGenerate                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runNewsPipeline                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runNewsPipeline                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/reprocessIncompleteEmails                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::reprocessIncompleteEmails                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runContentGenerationBatch                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runContentGenerationBatch                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runKeywordBackfillBatch                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runKeywordBackfillBatch                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runKeywordEnrichment                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runKeywordEnrichment                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runScheduledTasks                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runScheduledTasks                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Search/([^/]+)/(.*)                                           | »                                              | \App\Modules\APIs\Controllers\ManagementController::index/$1/$2                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/sendWalkthroughEmails                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::sendWalkthroughEmails                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/scheduleApprovedPost/([0-9]+)                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::scheduleApprovedPost/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/schedulePost/(.*)/(.*)/(.*)                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::schedulePost/$1/$2/$3                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/sharePost/([0-9]+)/([^/]+)                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::sharePost/$1/$2                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Large-Content/Form                                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::submitLargeContentForm                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Manual-Content/Form                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::shortLongContentForm                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/testGenerateDailyDigest                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::testGenerateDailyDigest                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/testGenerateFromTempEmail/([0-9]+)                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::testGenerateFromTempEmail/$1                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/testTfIdfEdgeCases                                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::testTfIdfEdgeCases                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/testGenerateSummarizerHarness                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::testGenerateSummarizerHarness                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Timeline/([^/]+)                                              | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::timeline/$1                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Timeline                                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::viewTimelineGrouped                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/triggerBackfill                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::reprocessIncompleteEmails                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/triggerPostAutogenOnEmpty                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::triggerPostAutogenOnEmpty                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processPendingNotifications                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processPendingNotifications                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processPendingTempScraper                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processPendingTempScraper                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processPendingCampaigns                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processPendingCampaigns                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processPendingGeneratedContent                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processPendingGeneratedContent                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/distributionSummary                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::distributionSummary                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/distributionHistory/([0-9]+)                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::distributionHistory/$1                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/distributionFailedSummary                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::distributionFailedSummary                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/distributionChannelTotals                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::distributionChannelTotals                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/retryDistributionTargets                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::retryDistributionTargets                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/retryDistributionTargets/([0-9]+)                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::retryDistributionTargets/$1                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runMarketingPipeline                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runMarketingPipeline                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing                                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::index                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Add/([^/]+)                                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::add/$1                                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Approve-Content/([0-9]+)                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::approveContent/$1                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Blog-Creator                                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::blogCreator                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Blogs                                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::blogs                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Campaigns                                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::campaigns                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Content-Review                                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::contentReview                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Content/Generator                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::contentGenerator                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Content/Listing                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::contentListing                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Daily-Log                                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::viewDailyLogs                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Edit-Content/([0-9]+)                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::editContent/$1                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Email/(.*)/(.*)                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::viewEmail/$1/$2                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchEmails                                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchEmails                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Financial-News                                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::financialNews                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateContent                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateContent                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateNewsletter                                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateNewsletterContent                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getRecentScrapes                                              | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getRecentScrapes                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Grouped-Content-Drafts                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateGroupedContentDrafts                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Ideas                                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::ideas                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Post-Creator                                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::postCreator                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/previewGeneratedPost/([0-9]+)                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::previewGeneratedPost/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Promote                                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::promote                                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Promote/([^/]+)                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::promote                                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Research                                                      | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::research                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/RunContentGeneration                                          | »                                              | \App\Modules\APIs\Controllers\Management\MarketingAPIController::runContentGeneration                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Quick-Scraper                                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::standaloneScrape                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Reject-Content/([0-9]+)                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::rejectContent/$1                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Schedule                                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::schedule                                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Schedule/([^/]+)                                              | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::schedule/$1                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/scheduleNewsletters                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::scheduleNewsletterCampaign                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/submitDailyLog                                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::submitDailyLog                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/sendNotification                                              | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::sendNotification                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/sendNewsletter                                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::sendScheduleNewsletter                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Communities                                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::communities                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Test                                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::test                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Twitter                                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::twitterDashboard                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Video-Creator                                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::videoCreator                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/View-Email/([^/]+)/([^/]+)                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::viewEmail/$1/$2                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/View-Grouped-Summaries                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::View-Grouped-Summaries                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/MyMI-Gold/Tasks/Add                                           | »                                              | \App\Modules\APIs\Controllers\WalletsAPIController::addUserGoldTasks                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Email-Templates/create                                        | »                                              | \App\Modules\APIs\Controllers\EmailTemplateController::create                                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Email-Queue                                                   | »                                              | \App\Modules\APIs\Controllers\EmailQueueController::index                                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Email-Queue/create                                            | »                                              | \App\Modules\APIs\Controllers\EmailQueueController::create                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getPlatforms                                                  | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::getPlatforms                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getPlatformRules/([^/]+)                                      | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::getPlatformRules/$1                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/listSuggestions/([^/]+)/([^/]+)                               | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::listSuggestions/$1/$2                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Markets                                                     | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::markets                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Market/([0-9]+)                                             | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::view/$1                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Markets/Create                                              | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::createMarket                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Markets/Settle/([0-9]+)                                     | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::settle/$1                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Cron/Fetch-Market-Data                                      | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::cronFetchMarketData                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Cron/Settle-Markets                                         | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::cronSettleMarkets                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Cron/Expire-Markets                                         | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::cronExpireMarkets                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Cron/Update-Market-Prices                                   | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::cronUpdateMarketPrices                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Cron/Update-Market-States                                   | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::cronUpdateMarketStates                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Cron/Process-Expired-Markets                                | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::cronProcessExpiredMarkets                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Cron/Process-Settled-Markets                                | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::cronProcessSettledMarkets                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/getMarketPrice/([^/]+)                                           | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::get/$1                                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/getMarketPrice                                                   | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::getMarketPrice                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Blog/Investing/Tips-For-Effective-Investment-Portfolio-Management           | »                                              | \App\Modules\Blog\Controllers\InvestingController::TipsForEffectiveInvestmentPortfolioManagement      | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Blog/News-And-Updates                                                       | »                                              | \App\Modules\Blog\Controllers\UpdatesController::index                                                | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Blog/News-And-Updates/Integrating-With-Plaid                                | »                                              | \App\Modules\Blog\Controllers\NewsAndUpdates::IntegratingWithPlaid                                    | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Blog/News-And-Updates/The-Roadmap-To-The-Future-Of-Finance                  | »                                              | \App\Modules\Blog\Controllers\NewsAndUpdates::TheRoadmapToTheFutureOfFinance                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts                                                           | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::index                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Add/([^/]+)                                               | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::add                                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/addTradeAlert                                             | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::addTradeAlert                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Advisor/Media                                             | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::advisorMedia                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Crypto/([^/]+)/([^/]+)                                    | »                                              | \App\Modules\Management\Controllers\Management\AlertsAdminController::stockOverview/$1/$2             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Audit/Emails                                              | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::auditEmailScraper                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/fetchData                                                 | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::fetchData                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Fetch/Ticker/([^/]+)                                      | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::fetchTickerDetails/$1                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Import/Tickers                                            | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::importTickers                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Stock/([^/]+)/([^/]+)                                     | »                                              | \App\Modules\Management\Controllers\Management\AlertsAdminController::stockOverview/$1/$2             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Tasks/fetchAlerts                                         | »                                              | \App\Modules\Management\Controllers\Management\AlertsAdminController::fetchData                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Submit/TradingView                                        | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::submitTradingView                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Test                                                      | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::test                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Test-Alert-Email                                          | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::testEmail                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Test-Email                                                | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::sendTestEmail                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Trades                                                    | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::trades                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Top-Performance/Weekly                                    | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::topPerformanceWeekly                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/weeklyTopPerformance                                      | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::topPerformanceWeekly                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Discord                                                          | »                                              | \App\Modules\Management\Controllers\DiscordAdminController::index                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Investments                                                      | »                                              | \App\Modules\Management\Controllers\InvestmentsAdminController::index                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Investments/News                                                 | »                                              | \App\Modules\Management\Controllers\InvestmentsAdminController::newsIndex                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing                                                        | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::index                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Add/([^/]+)                                            | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::add/$1                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Approve-Content/([0-9]+)                               | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::approveContent/$1                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Blog-Creator                                           | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::blogCreator                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Blogs                                                  | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::blogs                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
```

## Key Method / Table References

```text
app/Controllers/BaseController.php:1556:            // Embeds (YouTube, TradingView, Clarity)
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:11:        if ($this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:14:            if (! $this->db->fieldExists('source', 'bf_investment_scraper')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:23:            if (! $this->db->fieldExists('account_type', 'bf_investment_scraper')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:32:            if (! $this->db->fieldExists('message_hash', 'bf_investment_scraper')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:42:                $this->forge->addColumn('bf_investment_scraper', $fields);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:45:            $this->addIndexIfMissing('bf_investment_scraper', 'idx_scraper_source_hash', ['source', 'message_hash']);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:48:        if ($this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:51:            if (! $this->db->fieldExists('source', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:60:            if (! $this->db->fieldExists('account_type', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:69:            if (! $this->db->fieldExists('broker_order_id', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:78:            if (! $this->db->fieldExists('execution_id', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:87:            if (! $this->db->fieldExists('filled_qty', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:96:            if (! $this->db->fieldExists('filled_price', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:105:            if (! $this->db->fieldExists('filled_at', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:112:            if (! $this->db->fieldExists('side', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:121:            if (! $this->db->fieldExists('notified_discord', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:131:                $this->forge->addColumn('bf_investment_trade_alerts', $fields);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:134:            $this->addIndexIfMissing('bf_investment_trade_alerts', 'idx_trade_alerts_execution_id', ['execution_id'], true);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:135:            $this->addIndexIfMissing('bf_investment_trade_alerts', 'idx_trade_alerts_notified_discord', ['notified_discord']);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:141:        if ($this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:142:            $this->dropIndexIfExists('bf_investment_trade_alerts', 'idx_trade_alerts_execution_id');
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:143:            $this->dropIndexIfExists('bf_investment_trade_alerts', 'idx_trade_alerts_notified_discord');
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:156:            $existing = array_filter($columns, fn ($column) => $this->db->fieldExists($column, 'bf_investment_trade_alerts'));
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:158:                $this->forge->dropColumn('bf_investment_trade_alerts', $existing);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:162:        if ($this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:163:            $this->dropIndexIfExists('bf_investment_scraper', 'idx_scraper_source_hash');
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:166:            $existing = array_filter($columns, fn ($column) => $this->db->fieldExists($column, 'bf_investment_scraper'));
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:168:                $this->forge->dropColumn('bf_investment_scraper', $existing);
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:75:        if ($this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:87:                if (! $this->db->fieldExists($name, 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:88:                    $this->forge->addColumn('bf_investment_trade_alerts', [$name => $definition]);
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:93:                $this->db->query('CREATE INDEX latest_forecast_id ON bf_investment_trade_alerts (latest_forecast_id)');
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:112:        if ($this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:124:                if ($this->db->fieldExists($column, 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:125:                    $this->forge->dropColumn('bf_investment_trade_alerts', $column);
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:75:                'occurrences' => ['type' => 'INT', 'unsigned' => true, 'default' => 0],
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:13:        if (! $this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:17:        $fields = $this->db->getFieldData('bf_investment_trade_alerts');
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:27:            $this->forge->addColumn('bf_investment_trade_alerts', [
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:32:                    'after' => 'notification_sent',
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:37:        $this->db->query("UPDATE bf_investment_trade_alerts SET source = 'scanner' WHERE source IS NULL OR source = ''");
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:40:            $this->db->query('ALTER TABLE bf_investment_trade_alerts ADD UNIQUE KEY uniq_ticker_status_source (ticker, status, source)');
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:48:        if (! $this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:53:            $this->db->query('ALTER TABLE bf_investment_trade_alerts DROP INDEX uniq_ticker_status_source');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:11:        if (! $this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:15:        if (! $this->db->fieldExists('email_identifier', 'bf_investment_scraper')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:16:            $this->forge->addColumn('bf_investment_scraper', [
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:27:        if (! $this->indexExists('bf_investment_scraper', 'idx_scraper_email_identifier')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:28:            $this->db->query('CREATE INDEX `idx_scraper_email_identifier` ON `bf_investment_scraper` (`email_identifier`)');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:31:        $sourceHashUnique = $this->indexExists('bf_investment_scraper', 'uq_scraper_source_hash');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:32:        if (! $sourceHashUnique && $this->db->fieldExists('source', 'bf_investment_scraper') && $this->db->fieldExists('message_hash', 'bf_investment_scraper')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:34:                if ($this->indexExists('bf_investment_scraper', 'idx_scraper_source_hash')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:35:                    $this->db->query('DROP INDEX `idx_scraper_source_hash` ON `bf_investment_scraper`');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:38:                $this->db->query('CREATE UNIQUE INDEX `uq_scraper_source_hash` ON `bf_investment_scraper` (`source`, `message_hash`)');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:45:        if (! $this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:49:        if ($this->indexExists('bf_investment_scraper', 'uq_scraper_source_hash')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:50:            $this->db->query('DROP INDEX `uq_scraper_source_hash` ON `bf_investment_scraper`');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:53:        if ($this->indexExists('bf_investment_scraper', 'idx_scraper_email_identifier')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:54:            $this->db->query('DROP INDEX `idx_scraper_email_identifier` ON `bf_investment_scraper`');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:62:FROM `bf_investment_scraper`
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:11:        if (! $this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:17:        if (! $this->db->fieldExists('email_identifier', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:20:        if (! $this->db->fieldExists('email_sender', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:23:        if (! $this->db->fieldExists('source', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:26:        if (! $this->db->fieldExists('account_type', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:29:        if (! $this->db->fieldExists('email_type', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:32:        if (! $this->db->fieldExists('metadata', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:35:        if (! $this->db->fieldExists('created_on', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:38:        if (! $this->db->fieldExists('updated_at', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:43:            $this->forge->addColumn('bf_investment_scraper', $fields);
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:46:        $this->addIndexIfMissing('bf_investment_scraper', 'idx_email_identifier', ['email_identifier']);
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:47:        $this->addIndexIfMissing('bf_investment_scraper', 'idx_status', ['status']);
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:48:        $this->addIndexIfMissing('bf_investment_scraper', 'idx_email_date', ['email_date']);
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:53:        if (! $this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:57:        $this->dropIndexIfExists('bf_investment_scraper', 'idx_email_identifier');
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:58:        $this->dropIndexIfExists('bf_investment_scraper', 'idx_status');
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:59:        $this->dropIndexIfExists('bf_investment_scraper', 'idx_email_date');
app/Database/Migrations/2026-04-11-120000_AddEmailQueueTrackingColumns.php:12:        $this->ensureColumns('bf_investment_scraper');
app/Libraries/Privacy/DataExportService.php:22:            'alerts'       => $this->db->table('bf_investment_trade_alerts')->where('user_id',$userId)
app/Libraries/Privacy/DataExportService.php:23:                                     ->select('id,ticker,status,occurrences,created_at,updated_at')
app/Libraries/MyMIAdvisor.php:112:        $chartUrl = $this->generateTradingViewChartUrl($symbol);
app/Libraries/MyMIAdvisor.php:470:    public function generateTradingViewChartUrl($symbol): string
app/Libraries/MyMIAdvisor.php:496:            'background_chart' => $this->generateTradingViewChartUrl($mediaPackage['ticker'] ?? 'AAPL'),
app/Libraries/MyMIAdvisor.php:611:            'chart_url' => $this->generateTradingViewChartUrl($symbol),
app/Libraries/test.txt:1268:                    $this->marketingModel->markTempScraperProcessed($recordId);
app/Libraries/test.txt:1313:                    $this->marketingModel->markTempScraperProcessed($recordId);
app/Libraries/test.txt:1656:                $this->marketingModel->markTempScraperProcessed($id);
app/Libraries/test.txt:1682:                        $this->marketingModel->markTempScraperProcessed($recordId);
app/Libraries/test.txt:1805:                        $this->marketingModel->markTempScraperProcessed($record['id']);
app/Libraries/test.txt:1910:            $this->marketingModel->markTempScraperProcessed($id);
app/Libraries/test.txt:3050:                $model->markTempRecordAsProcessed($record['id']);
app/Libraries/test.txt:3130:        $this->marketingModel->markEmailsAsProcessed(array_column($rawRecords, 'id'));
app/Libraries/test.txt:4782:            $processedEmailsToday = $this->marketingModel->getProcessedEmails(date('Y-m-d'));
app/Libraries/test.txt:4835:                        'status'            => 'In Review',
app/Libraries/test.txt:5079:    public function saveTradingViewChart($chartUrl, $ticker)
app/Libraries/test.txt:5847:     * @param array $tradeAlert A record from bf_investment_trade_alerts.
app/Libraries/test.txt:7095:                    $this->marketingModel->markTempScraperProcessed($record['id']);
app/Libraries/test.txt:7096:                    log_message('info', '✅ Processed and stored content for record ID ' . $record['id']);
app/Libraries/test.txt:8135:    public function getProcessedEmails($date = null)
app/Libraries/test.txt:8327:        return $this->where('status', 'In Review')->limit(50)->get()->getResultArray(); // Limit the results to prevent memory overload
app/Libraries/test.txt:8394:            ->where('status', 'In Review')
app/Libraries/test.txt:8404:            ->where('status', 'In Review')
app/Libraries/test.txt:8545:            ->where('status', 'In Review')
app/Libraries/test.txt:8920:                                'status' => 'In Review',
app/Libraries/test.txt:8931:                            if ($this->isEmailProcessed($data['email_identifier'])) {
app/Libraries/test.txt:8951:    public function isEmailProcessed($emailIdentifier)
app/Libraries/test.txt:8963:    public function markEmailsAsProcessed($ids = [])
app/Libraries/test.txt:8968:                ->update(['status' => 'Processed']);
app/Libraries/test.txt:8973:    public function markTempRecordAsProcessed($id)
app/Libraries/test.txt:8977:            ->update(['status' => 'Processed', 'updated_at' => date('Y-m-d H:i:s')]);
app/Libraries/test.txt:8980:    public function markTempScraperProcessed($id)
app/Libraries/test.txt:8984:            ->update(['status' => 'Processed']);
app/Libraries/MyMIAlerts.php:683:    protected function markEmailAsProcessed($imapStream, int $emailNumber): void
app/Libraries/MyMIAlerts.php:687:            if (@imap_mail_move($imapStream, (string) $emailNumber, 'Processed')) {
app/Libraries/MyMIAlerts.php:691:            log_message('warning', 'MyMIAlerts::markEmailAsProcessed failed: {msg}', ['msg' => $e->getMessage()]);
app/Libraries/MyMIAlerts.php:785:        foreach ($this->db->getFieldData('bf_investment_scraper') as $field) {
app/Libraries/MyMIAlerts.php:820:        if ($this->alertsModel->isEmailProcessed($identifier)) {
app/Libraries/MyMIAlerts.php:856:            'status'           => 'In Review',
app/Libraries/MyMIAlerts.php:945:            log_message('error', '❌ Failed to insert alert email into bf_investment_scraper.');
app/Libraries/MyMIAlerts.php:1172:    public function fetchAndStoreAlertsEmails()
app/Libraries/MyMIAlerts.php:1214:                    $this->markEmailAsProcessed($inbox, $emailNumber);
app/Libraries/MyMIAlerts.php:1220:                    $this->markEmailAsProcessed($inbox, $emailNumber);
app/Libraries/MyMIAlerts.php:1234:                $this->markEmailAsProcessed($inbox, $emailNumber);
app/Libraries/MyMIAlerts.php:1245:    // public function fetchAndStoreAlertsEmails()
app/Libraries/MyMIAlerts.php:1283:    //             if ($this->alertsModel->isEmailProcessed($emailIdentifier)) {
app/Libraries/MyMIAlerts.php:1311:    //                 'status'           => 'In Review',
app/Libraries/MyMIAlerts.php:1335:    //                 $existingAlert = $this->db->table('bf_investment_trade_alerts')
app/Libraries/MyMIAlerts.php:1337:    //                     ->where('status', 'In Review')
app/Libraries/MyMIAlerts.php:1344:    //                         'status' => 'In Review',
app/Libraries/MyMIAlerts.php:1382:    // public function fetchAndStoreAlertsEmails()
app/Libraries/MyMIAlerts.php:1419:    //             if ($this->alertsModel->isEmailProcessed($emailIdentifier)) {
app/Libraries/MyMIAlerts.php:1443:    //                 'status' => 'In Review',
app/Libraries/MyMIAlerts.php:1476:    //                         // ✅ If it exists, update occurrences and last updated time
app/Libraries/MyMIAlerts.php:1478:    //                             'occurrences'  => $existingAlert['occurrences'] + 1,
app/Libraries/MyMIAlerts.php:1483:    //                         // log_message('info', "🔄 Updated occurrence count for Ticker: {$symbol} (Now {$existingAlert['occurrences'] + 1})");
app/Libraries/MyMIAlerts.php:1489:    //                             'status'      => 'In Review',
app/Libraries/MyMIAlerts.php:1492:    //                             'occurrences' => 1
app/Libraries/MyMIAlerts.php:1499:    //                 log_message('error', '❌ Failed to insert email into `bf_investment_scraper`.');
app/Libraries/MyMIAlerts.php:1535:            $lastScraped = $this->db->table('bf_investment_alert_history')
app/Libraries/MyMIAlerts.php:1572:                if ($this->alertsModel->isEmailProcessed($emailIdentifier)) {
app/Libraries/MyMIAlerts.php:1593:                    'status' => 'In Review',
app/Libraries/MyMIAlerts.php:1608:            $this->db->table('bf_investment_alert_history')->insert([
app/Libraries/MyMIAlerts.php:1697:                        'status'           => 'In Review',
app/Libraries/MyMIAlerts.php:1907:            // Build a TradingView symbol safely: e.g., "NASDAQ:NVDA"
app/Libraries/MyMIAlerts.php:1946:        $row = $this->db->table('bf_investment_tickers')
app/Libraries/MyMIAlerts.php:1973:        $row = $this->db->table('bf_investment_tickers')
app/Libraries/MyMIAlerts.php:2109:    public function processScrapedSymbols(): bool
app/Libraries/MyMIAlerts.php:2113:        $processed = $this->alertsModel->processScrapedSymbols(function (string $text) {
app/Libraries/MyMIAlerts.php:2183:        $lastProcessed = $this->db->table('bf_investment_alert_history')
app/Libraries/MyMIAlerts.php:2190:        $lastTimestamp = $lastProcessed ? $lastProcessed->last_alert_processed : '1970-01-01 00:00:00';
app/Libraries/MyMIAlerts.php:2193:        $alerts = $this->db->table('bf_investment_trade_alerts')
app/Libraries/MyMIAlerts.php:2195:            ->where('status', 'In Review')
app/Libraries/MyMIAlerts.php:2209:            $this->db->table('bf_investment_trade_alerts')
app/Libraries/MyMIAlerts.php:2211:                ->update(['status' => 'Processed']);
app/Libraries/MyMIAlerts.php:2214:            $this->db->table('bf_investment_alert_history')->insert([
app/Libraries/MyMIAlerts.php:2230:        $pendingAlerts = $this->db->table('bf_investment_trade_alerts')
app/Libraries/MyMIAlerts.php:2250:                    $this->db->table('bf_investment_trade_alerts')
app/Libraries/MyMIAlerts.php:2256:                            'status' => 'Processed',
app/Libraries/MyMIAlerts.php:2273:    public function saveTradingViewChart($chartUrl, $ticker)
app/Libraries/MyMIAlerts.php:2304:    public function sendDiscordNotification($tradeAlert)
app/Libraries/MyMIAlerts.php:2306:        if (!empty($tradeAlert['notification_sent'])) {
app/Libraries/MyMIAlerts.php:2324:                log_message('warning', 'MyMIAlerts::sendDiscordNotification Kimi fallback: ' . $e->getMessage());
app/Libraries/MyMIAlerts.php:2345:        $this->alertsModel->updateMarketingContent($tradeAlert['id'], ['notification_sent' => 1]);
app/Libraries/MyMIAlerts.php:2495:    public function updateAlerts()
app/Libraries/MyMIAlerts.php:2510:        $this->debugLog("� MyMIAlerts L460 - Starting updateAlerts method...");
app/Libraries/MyMIAlerts.php:2527:                $this->debugLog("updateAlerts - skip unknown symbol {$sym}");
app/Libraries/MyMIAlerts.php:2539:                log_message('debug', "MyMIAlerts::updateAlerts L1489 - skip unknown symbol {$ticker}");
app/Libraries/MyMIAlerts.php:2569:                'occurrences'               => $alert['occurrences'] + 1
app/Libraries/MyMIAlerts.php:2594:        $this->debugLog("✅ updateAlerts method completed.");
app/Libraries/MyMIAlerts.php:2605:        $alerts = $this->db->table('bf_investment_trade_alerts')
app/Libraries/MyMIAlerts.php:2627:    // public function updateAlerts()
app/Libraries/Signals/MyMISignalIngestor.php:225:            if ($this->files->alreadyProcessed($path, $hash)) {
app/Libraries/MyMIMarketing.php:1154:            $processedEmailsToday = $this->marketingModel->getProcessedEmails(date('Y-m-d'));
app/Libraries/MyMIMarketing.php:1207:                        'status'            => 'In Review',
app/Libraries/MyMIMarketing.php:1532:    public function saveTradingViewChart($chartUrl, $ticker)
app/Libraries/MyMIMarketing.php:2414:    public function summarizeTradingViewFinancials($url)
app/Libraries/MyMIMarketing.php:2419:            throw new \Exception('Failed to load TradingView financials page.');
app/Libraries/MyMIMarketing.php:2582:     * @param array $tradeAlert A record from bf_investment_trade_alerts.
app/Libraries/MyMIMarketing.php:3202:                $alertsModel->markNewsAsProcessed((int) ($row['id'] ?? 0));
app/Libraries/MyMIMarketing.php:4504:                        'status'           => 'In Review',
app/Libraries/MyMIMarketing.php:5174:                    $this->marketingModel->markTempScraperProcessed($record['id']);
app/Libraries/MyMIMarketing.php:5175:                    log_message('info', '✅ Processed and stored content for record ID ' . $record['id']);
app/Libraries/TradeAlertMailboxFetcher.php:42:        $targetFolder = $this->cleanFolderName((string) ($options['target_folder'] ?? 'Processed'));
app/Libraries/TradeAlertMailboxFetcher.php:230:            'status' => 'In Review',
app/Models/AccountsModel.php:172:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AccountsModel.php:181:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AccountsModel.php:424:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/AccountsModel.php:433:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/SignalFilesModel.php:31:    public function alreadyProcessed(string $filePath, string $fileHash): bool
app/Models/AnalyticalModel.php:580:                            ->where('status', 'In Review')
app/Models/EsportsModel.php:168:    public function markWebhookProcessed(int $webhookId): bool
app/Models/AlertsModel.php:16:    protected $table       = 'bf_investment_trade_alerts';
app/Models/AlertsModel.php:31:        'active','status','occurrences','alert_count','distributed_count','created_on','created_by','updated_at','alert_created','send_alert','alert_sent',
app/Models/AlertsModel.php:34:        'financial_news','analysis_summary','tv_chart_type','tv_chart','display','notification_sent','submitted_date','last_updated','last_updated_time',
app/Models/AlertsModel.php:89:        $result = $this->db->table('bf_investment_trade_alerts')->insert($data);
app/Models/AlertsModel.php:111:                $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->update($tickerUpdate);
app/Models/AlertsModel.php:127:                $alertsUpdated = $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->update($alertsUpdate);
app/Models/AlertsModel.php:143:                $historyUpdated = $this->db->table('bf_investment_alert_history')->where('ticker', $symbol)->update($historyUpdate);
app/Models/AlertsModel.php:186:        $result = $this->db->table('bf_investment_trade_alerts')->where('id', $id)->update($data);
app/Models/AlertsModel.php:203:        $result = $this->db->table('bf_investment_trade_alerts')->where('id', $id)->delete();
app/Models/AlertsModel.php:220:        $builder = $db->table('bf_investment_tickers');
app/Models/AlertsModel.php:224:            log_message('info', "ensureTickerExists: {$symbol} already exists in bf_investment_tickers.");
app/Models/AlertsModel.php:273:        return (bool) $this->db->table('bf_investment_tickers')->select('symbol')->where('symbol', strtoupper($symbol))->get()->getRow();
app/Models/AlertsModel.php:411:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:450:        $activeTickers = $this->db->table('bf_investment_tickers')
app/Models/AlertsModel.php:486:                $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:513:                $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:530:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:540:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:550:        return $this->db->table('bf_investment_trade_alerts')->where('id', $id)->get()->getRowArray();
app/Models/AlertsModel.php:555:        $builder = $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->countAllResults();
app/Models/AlertsModel.php:561:        $builder = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:570:        $builder = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:580:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:590:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:591:            ->select('bf_investment_trade_alerts.*, bf_investment_tickers.exchange')
app/Models/AlertsModel.php:592:            ->join('bf_investment_tickers', 'bf_investment_tickers.symbol = bf_investment_trade_alerts.ticker', 'left')
app/Models/AlertsModel.php:593:            ->where('bf_investment_trade_alerts.ticker', $symbol)
app/Models/AlertsModel.php:594:            ->orderBy('bf_investment_trade_alerts.created_on', 'DESC')
app/Models/AlertsModel.php:601:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:611:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:621:        $builder = $this->db->table('bf_investment_alert_history');
app/Models/AlertsModel.php:638:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:648:        return $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->limit(20)->get();
app/Models/AlertsModel.php:653:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/AlertsModel.php:655:        $hasTv = $this->hasColumn('bf_investment_trade_alerts', 'tv_symbol');
app/Models/AlertsModel.php:687:        $builder->where('status', 'In Review');
app/Models/AlertsModel.php:697:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:700:            ->where('notification_sent', 0)
app/Models/AlertsModel.php:707:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:716:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:753:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:996:            $tableName = 'bf_investment_trade_alerts';
app/Models/AlertsModel.php:1186:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1196:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1197:            ->where('status', 'In Review')
app/Models/AlertsModel.php:1210:        $builder = $this->db->table('bf_investment_alert_history')->where('send_alert', 1);
app/Models/AlertsModel.php:1236:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1245:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1254:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1265:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:1280:    public function getLastProcessedTradeAlert()
app/Models/AlertsModel.php:1282:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:1292:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1302:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1328:        $builder = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1385:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1387:            ->where('status', 'In Review')
app/Models/AlertsModel.php:1408:            if ($this->hasColumn('bf_investment_scraper', $column)) {
app/Models/AlertsModel.php:1413:        $builder = $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1415:            ->where('status', 'In Review');
app/Models/AlertsModel.php:1417:        if (! empty($sourceFilter) && $this->hasColumn('bf_investment_scraper', 'source')) {
app/Models/AlertsModel.php:1429:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1431:            ->where('status', 'In Review')
app/Models/AlertsModel.php:1441:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1443:            ->where('status', 'In Review')
app/Models/AlertsModel.php:1453:            return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1460:            return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1481:        $builder = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1503:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1515:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1542:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1572:        return $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->get()->getRow();
app/Models/AlertsModel.php:1586:        $row = $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->get()->getRowArray();
app/Models/AlertsModel.php:1596:        $row = $this->db->table('bf_investment_tickers')->where('symbol', strtoupper($symbol))->get()->getRowArray();
app/Models/AlertsModel.php:1613:        return $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->get()->getRow();
app/Models/AlertsModel.php:1628:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1638:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1649:        return $this->db->table('bf_investment_trade_alerts')->where('alert_created', 1)->limit(20)->get()->getResultArray();
app/Models/AlertsModel.php:1654:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1656:            ->where('status', 'In Review')
app/Models/AlertsModel.php:1669:        return $this->db->table('bf_investment_trade_alerts')->where('id', $tradeID)->get()->getRowArray();
app/Models/AlertsModel.php:1674:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:1690:            FROM bf_investment_alert_history h
app/Models/AlertsModel.php:1692:                SELECT DISTINCT ticker FROM bf_investment_alert_history
app/Models/AlertsModel.php:1705:            $first = $this->db->table('bf_investment_alert_history')->select('price')->where('ticker', $r['ticker'])->where('alerted_on', $r['first_date'])->get()->getRowArray();
app/Models/AlertsModel.php:1706:            $last  = $this->db->table('bf_investment_alert_history')->select('price')->where('ticker', $r['ticker'])->where('alerted_on', $r['last_date'])->get()->getRowArray();
app/Models/AlertsModel.php:1725:        $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1760:        $this->db->table('bf_investment_alert_history')->insert($snapshot);
app/Models/AlertsModel.php:1789:        $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->update($tickerUpdate);
app/Models/AlertsModel.php:1805:        $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->where('status', 'Opened')->update($alertsUpdate);
app/Models/AlertsModel.php:1821:        $this->db->table('bf_investment_alert_history')->where('ticker', $symbol)->where('status', 'Opened')->update($historyUpdate);
app/Models/AlertsModel.php:1843:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1855:        $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1863:        $existingTicker = $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->get()->getRow();
app/Models/AlertsModel.php:1875:        return $this->db->table('bf_investment_tickers')->insert($data);
app/Models/AlertsModel.php:1888:        $existingAlert = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1895:            $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1898:                    'occurrences'  => $existingAlert['occurrences'] + 1,
app/Models/AlertsModel.php:1904:            $tradeData['status']       = 'In Review';
app/Models/AlertsModel.php:1907:            $tradeData['occurrences']  = 1;
app/Models/AlertsModel.php:1909:            $result = $this->db->table('bf_investment_trade_alerts')->insert($tradeData);
app/Models/AlertsModel.php:1923:    public function isEmailProcessed($emailIdentifier)
app/Models/AlertsModel.php:1929:        if (! $this->hasColumn('bf_investment_scraper', 'email_identifier')) {
app/Models/AlertsModel.php:1930:            log_message('warning', 'Email identifier column missing from bf_investment_scraper; duplicate fallback will rely on message_hash.');
app/Models/AlertsModel.php:1934:        $exists = $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1950:        if (! $this->hasColumn('bf_investment_scraper', 'email_identifier')) {
app/Models/AlertsModel.php:1954:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1962:        if (! $this->hasColumn('bf_investment_scraper', 'message_hash') || ! $this->hasColumn('bf_investment_scraper', 'source')) {
app/Models/AlertsModel.php:1966:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1975:        return (bool) $this->db->table('bf_investment_scraper')->insert($data);
app/Models/AlertsModel.php:1988:        return (bool) $this->db->table('bf_investment_scraper')->insert($safeData);
app/Models/AlertsModel.php:1999:        if ($identifier !== '' && $this->isEmailProcessed($identifier)) {
app/Models/AlertsModel.php:2022:        $table = 'bf_investment_scraper';
app/Models/AlertsModel.php:2043:        $row = $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:2089:    public function markScraperAlertProcessed($id)
app/Models/AlertsModel.php:2091:        return $this->db->table('bf_investment_scraper')->where('id', $id)->update(['status' => 'Processed']);
app/Models/AlertsModel.php:2096:        return $this->db->table('bf_investment_trade_alerts')->where('id', $alertId)->update(['notification_sent' => 1]);
app/Models/AlertsModel.php:2099:    public function markScraperRecordProcessed($id)
app/Models/AlertsModel.php:2101:        $existing = $this->db->table('bf_investment_scraper')->where('id', $id)->get()->getRow();
app/Models/AlertsModel.php:2106:        log_message('info', "✅ Marking scraper record ID $id as Processed.");
app/Models/AlertsModel.php:2107:        return $this->db->table('bf_investment_scraper')->where('id', $id)->update(['status' => 'Processed']);
app/Models/AlertsModel.php:2127:                'occurrences'      => 1,
app/Models/AlertsModel.php:2159:        $existingAlert = $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->get()->getRowArray();
app/Models/AlertsModel.php:2162:            $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2165:                    'occurrences'      => $existingAlert['occurrences'] + 1,
app/Models/AlertsModel.php:2171:            $this->db->table('bf_investment_trade_alerts')->insert([
app/Models/AlertsModel.php:2174:                'occurrences'      => 1,
app/Models/AlertsModel.php:2181:        $this->db->table('bf_investment_alert_history')->insert([
app/Models/AlertsModel.php:2271:        $builder     = $this->db->table('bf_investment_scraper');
app/Models/AlertsModel.php:2285:                    $alertsBuilder = $this->db->table('bf_investment_trade_alerts');
app/Models/AlertsModel.php:2290:                            'occurrences' => $existingAlert->occurrences + $symbolCounts[$symbol],
app/Models/AlertsModel.php:2295:                            'occurrences'=> $symbolCounts[$symbol],
app/Models/AlertsModel.php:2309:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2327:                'occurrences'      => ($existing['occurrences'] ?? 1) + 1,
app/Models/AlertsModel.php:2336:            $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2351:            'occurrences'       => 1,
app/Models/AlertsModel.php:2361:        $this->db->table('bf_investment_trade_alerts')->insert($insert);
app/Models/AlertsModel.php:2409:        if ($this->hasColumn('bf_investment_alert_history', 'status') && isset($snapshot['status'])) {
app/Models/AlertsModel.php:2413:        if ($this->hasColumn('bf_investment_alert_history', 'category') && isset($snapshot['category'])) {
app/Models/AlertsModel.php:2417:        if ($this->hasColumn('bf_investment_alert_history', 'occurrences') && isset($snapshot['occurrences'])) {
app/Models/AlertsModel.php:2418:            $data['occurrences'] = $snapshot['occurrences'];
app/Models/AlertsModel.php:2421:        if ($this->hasColumn('bf_investment_alert_history', 'email_identifier') && isset($snapshot['email_identifier'])) {
app/Models/AlertsModel.php:2425:        if ($this->hasColumn('bf_investment_alert_history', 'trade_alert_id') && isset($snapshot['trade_alert_id'])) {
app/Models/AlertsModel.php:2429:        if ($this->hasColumn('bf_investment_alert_history', 'execution_id') && isset($snapshot['execution_id'])) {
app/Models/AlertsModel.php:2433:        if ($this->hasColumn('bf_investment_alert_history', 'created_on')) {
app/Models/AlertsModel.php:2438:            $this->db->table('bf_investment_alert_history')->insert($data);
app/Models/AlertsModel.php:2444:    public function processScrapedSymbols(?callable $symbolExtractor = null, ?string $sourceFilter = null, ?array &$report = null): bool
app/Models/AlertsModel.php:2489:        $record = $this->db->table('bf_investment_scraper')->where('id', $recordId)->get()->getRowArray();
app/Models/AlertsModel.php:2516:                $this->markScraperRecordProcessed($record['id']);
app/Models/AlertsModel.php:2522:                'status'            => 'In Review',
app/Models/AlertsModel.php:2542:                'notification_sent' => 0,
app/Models/AlertsModel.php:2556:                    'occurrences'      => 1,
app/Models/AlertsModel.php:2573:            $this->markScraperRecordProcessed($record['id']);
app/Models/AlertsModel.php:2582:            $this->markScraperRecordProcessed($record['id']);
app/Models/AlertsModel.php:2615:                'occurrences'      => $upserted['occurrences'] ?? 1,
app/Models/AlertsModel.php:2626:        $this->markScraperRecordProcessed($record['id']);
app/Models/AlertsModel.php:2731:            $existing = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2746:            $this->db->table('bf_investment_trade_alerts')->insert($payload);
app/Models/AlertsModel.php:2803:        return (bool) $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2811:        $pendingAlerts = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2812:            ->where('status', 'In Review')
app/Models/AlertsModel.php:2829:                    $this->db->table('bf_investment_trade_alerts')->where('id', $alert['id'])->update([
app/Models/AlertsModel.php:2833:                        'status'      => 'Processed',
app/Models/AlertsModel.php:2865:            $inserted = $this->db->table('bf_investment_scraper')->insert($emailData);
app/Models/AlertsModel.php:2879:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:2881:            ->where('status', 'In Review')
app/Models/AlertsModel.php:2891:    public function markNewsAsProcessed(int $id): bool
app/Models/AlertsModel.php:2893:        return (bool) $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:2896:                'status'      => 'Processed',
app/Models/AlertsModel.php:2908:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:2923:     * Submit or update a TradingView alert.
app/Models/AlertsModel.php:2925:    public function submitTradingViewPost(array $payload): int
app/Models/AlertsModel.php:2939:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/AlertsModel.php:2955:            $this->db->table('bf_investment_trade_alerts')->where('id', $existing['id'])->update($data);
app/Models/AlertsModel.php:2958:            $data['occurrences'] = 1;
app/Models/AlertsModel.php:2961:            $this->db->table('bf_investment_trade_alerts')->insert($data);
app/Models/AlertsModel.php:2965:        $alert = $this->db->table('bf_investment_trade_alerts')->where('id', $alertId)->get()->getRowArray();
app/Models/AlertsModel.php:2975:        $this->db->table('bf_investment_alert_history')->insert($hist);
app/Models/AlertsModel.php:2982:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2990:        $table = 'bf_investment_tickers_nw';
app/Models/AlertsModel.php:3051:        $table = 'bf_investment_tickers_nw';
app/Models/AlertsModel.php:3068:        $existing = $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:3074:            return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:3080:            return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:3096:            $result = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3117:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3125:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3143:        // ✅ Update bf_investment_alert_history
app/Models/AlertsModel.php:3144:        $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:3148:        // ✅ Update bf_investment_tickers
app/Models/AlertsModel.php:3149:        $this->db->table('bf_investment_tickers')
app/Models/AlertsModel.php:3153:        // ✅ Update bf_investment_trade_alerts
app/Models/AlertsModel.php:3154:        $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3181:        $tickers = $this->db->table('bf_investment_tickers')
app/Models/AlertsModel.php:3190:                $this->db->table('bf_investment_tickers')
app/Models/AlertsModel.php:3217:        $existingTicker = $this->db->table('bf_investment_tickers')
app/Models/AlertsModel.php:3228:        return $this->db->table('bf_investment_tickers')
app/Models/AlertsModel.php:3236:        $ticker = $this->db->table('bf_investment_tickers')
app/Models/AlertsModel.php:3267:            $this->db->table('bf_investment_tickers')
app/Models/AlertsModel.php:3281:        $builder = $this->db->table('bf_investment_trade_alerts')->where('id', $id);
app/Models/AlertsModel.php:3284:            $builder->set('occurrences', 'occurrences + 1', false);
app/Models/AlertsModel.php:3319:        $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3331:        $existingAlert = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3342:        $updateStatus = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3357:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3428:            $result = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3459:        $builder = $this->db->table('bf_investment_alert_history');
app/Models/AlertsModel.php:3471:        $result = $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:3522:        $existingMessage = $this->db->table('bf_investment_alert_history')->where('symbol', $tradeAlert['ticker']) // If `symbol` is the correct column
app/Models/AlertsModel.php:3527:            $this->db->table('bf_investment_alert_history')->insert([
app/Models/AlertsModel.php:3544:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:3747:    //     $builder = $this->db->table('bf_investment_scraper');
app/Models/AlertsModel.php:3757:    //                 $alertsBuilder = $this->db->table('bf_investment_trade_alerts');
app/Models/AlertsModel.php:3762:    //                         'occurrences' => $existingAlert->occurrences + $symbolCounts[$symbol],
app/Models/AlertsModel.php:3767:    //                         'occurrences' => $symbolCounts[$symbol],
app/Models/AlertsModel.php:3784:    // //     // Query builder to read the bf_investment_scraper data
app/Models/AlertsModel.php:3785:    // //     $builder = $this->db->table('bf_investment_scraper');
app/Models/AlertsModel.php:3795:    // //                 // Count the occurrences
app/Models/AlertsModel.php:3820:    // //                 $alertsBuilder = $this->db->table('bf_investment_trade_alerts');
app/Models/AlertsModel.php:3822:    // //                     'occurrences' => $symbolCounts[$symbol],
app/Models/AlertsModel.php:3855:            ->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3875:            ->table('bf_investment_trade_alerts')
app/Models/MarketingModel.php:624:            ->table('bf_investment_trade_alerts')
app/Models/MarketingModel.php:626:            ->whereIn('status', ['In Review', 'Opened'])
app/Models/MarketingModel.php:808:        return $this->where('status', 'In Review')->limit(50)->get()->getResultArray(); // Limit the results to prevent memory overload
app/Models/MarketingModel.php:952:        return $this->db->table('bf_investment_trade_alerts')
app/Models/MarketingModel.php:1004:            ->where('status', 'In Review')
app/Models/MarketingModel.php:1014:            ->where('status', 'In Review')
app/Models/MarketingModel.php:1152:    public function getProcessedEmails($date = null)
app/Models/MarketingModel.php:1268:            ->where('status', 'In Review')
app/Models/MarketingModel.php:1348:                ->table('bf_investment_trade_alerts')
app/Models/MarketingModel.php:1560:            ->where('status', 'In Review')
app/Models/MarketingModel.php:1959:                                'status' => 'In Review',
app/Models/MarketingModel.php:1970:                            if ($this->isEmailProcessed($data['email_identifier'])) {
app/Models/MarketingModel.php:1990:    public function isEmailProcessed($emailIdentifier)
app/Models/MarketingModel.php:2092:    public function markEmailsAsProcessed($ids = [])
app/Models/MarketingModel.php:2097:                ->update(['status' => 'Processed']);
app/Models/MarketingModel.php:2102:    public function markTempRecordAsProcessed($id)
app/Models/MarketingModel.php:2106:            ->update(['status' => 'Processed', 'updated_at' => date('Y-m-d H:i:s')]);
app/Models/MarketingModel.php:2109:    public function markTempScraperProcessed($id)
app/Models/MarketingModel.php:2113:            ->update(['status' => 'Processed']);
app/Models/MyMICoinModel.php:101:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/MyMICoinModel.php:108:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/MyMICoinModel.php:249:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/MyMICoinModel.php:256:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/WalletModel.php:1241:        return $this->db->table('bf_investment_trade_alerts')
app/Models/WalletModel.php:1250:        return $this->db->table('bf_investment_trade_alerts')
app/Models/InvestmentModel.php:497:        return $this->db->table('bf_investment_trade_alerts')
app/Models/InvestmentModel.php:528:     * ✅ Check If Ticker Exists in `bf_investment_tickers`
app/Models/InvestmentModel.php:532:        return $this->db->table('bf_investment_tickers')
app/Models/InvestmentModel.php:646:            return $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->update($tickerData);
app/Models/InvestmentModel.php:648:            return $this->db->table('bf_investment_tickers')->insert($tickerData);
app/Models/InvestmentModel.php:1166:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/InvestmentModel.php:1195:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/InvestmentModel.php:1211:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/InvestmentModel.php:1576:        return $this->db->table('bf_investment_alert_history')
app/Models/InvestmentModel.php:1593:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AiOpsEmailProcessedModel.php:9:class AiOpsEmailProcessedModel extends Model
app/Models/AiOpsEmailProcessedModel.php:32:    public function hasProcessed(string $mailbox, int $imapUid): bool
app/Models/InvestmentTickerDailyCountModel.php:20:        'occurrences',
app/Models/InvestmentTickerDailyCountModel.php:38:        $builder->set('occurrences', 'occurrences + ' . $increment, false);
app/Models/InvestmentTickerDailyCountModel.php:52:            'occurrences' => $increment,
app/Views/themes/dashboard/layouts/custom-js.php:27:    'useTradingView' => $useTradingView ?? false,
app/Views/themes/dashboard/layouts/custom-js.php:65:if (!empty($useTradingView)) {
app/Views/themes/dashboard/layouts/footer.php:95:    'useTradingView' => $useTradingView ?? false,
app/Views/themes/dashboard/partials/custom-js/tradingview.php:8:$database = 'bf_investment_trade_alerts';
app/Views/themes/public/layouts/js-links-10042025.php:42:<!-- TradingView library -->
app/Views/themes/public/layouts/js-links.php:164:<!-- TradingView library -->
app/Views/themes/public/layouts/total-index.php:29:!function(e,t,n,c,o,a,f){e.fbq||(o=e.fbq=function(){o.callMethod?o.callMethod.apply(o,arguments):o.queue.push(arguments)},e._fbq||(e._fbq=o),(o.push=o).loaded=!0,o.version="2.0",o.queue=[],(a=t.createElement(n)).async=!0,a.src="https://connect.facebook.net/en_US/fbevents.js",(f=t.getElementsByTagName(n)[0]).parentNode.insertBefore(a,f))}(window,document,"script"),window.__mymiMetaPixelInitialized||(fbq("init","1066980131308331"),window.__mymiMetaPixelInitialized=!0),fbq("track","PageView")</script><noscript><img src="https://www.facebook.com/tr?id=1066980131308331&ev=PageView&noscript=1"class="d-none"height="1"width="1"></noscript></head><body class="bg-white intro nk-body npc-landing"><div class="nk-app-root"><div class="nk-main"><div class="nk-wrap ml-0"><div class="intro-navbar navbar navbar-expand-lg"><div class="container container-xl"><div class="row align-items-center d-flex intro-wrap justify-content-between pt-0 w-100"><div class="d-flex col-auto d-md-block d-none intro-logo justify-content-start pl-4 pt-3 pt-lg-0 px-lg-5"><a href="https://www.mymiwallet.com/index.php/"class="logo-link mt-md-1 w-100"><img src="https://www.mymiwallet.com/assets/images/Millennial-Investments.png"class="d-md-block d-none img-fluid logo-dark logo-img ml-0 w-100"alt="MyMI Wallet - Investment Accounting/Analytical Software & Crypto Asset Marketplace/Exchange"srcset="https://www.mymiwallet.com/assets/images/Millennial-Investments.png"id="main_logo"></a></div><div class="d-flex align-items-center col-auto justify-content-end"><button class="mr-2 navbar-toggler"type="button"aria-controls="navbarNav"aria-expanded="false"aria-label="Toggle navigation"data-bs-target="#navbarNav"data-bs-toggle="collapse"><img src="https://www.mymiwallet.com/assets/images/MyMI-Wallet.png"class="img-fluid logo-dark logo-img"alt="MyMI Wallet - Investment Accounting/Analytical Software & Crypto Asset Marketplace/Exchange"srcset="https://www.mymiwallet.com/assets/images/MyMI-Wallet.png"id="mobile_logo"> <span class="text-white">MENU</span></button></div><div class="d-md-block d-none flex-grow-1"></div><div class="col-auto"><a href="https://www.mymiwallet.com/index.php/login"class="btn btn-primary d-md-none"><span>LOGIN</span></a></div></div><div class="collapse align-items-right intro-nav navbar-collapse"id="navbarNav"><ul class="mt-1 navbar-nav pl-4 pl-lg-0"><li class="intro-nav-item nav-item"><a href="https://www.mymiwallet.com/index.php"class="intro-nav-link nav-link link-to">Home</a></li><li class="intro-nav-item nav-item"><a href="https://www.mymiwallet.com/index.php#features"class="intro-nav-link nav-link link-to">Features</a></li><li class="intro-nav-item nav-item dropdown"><a href="#"class="intro-nav-link nav-link dropdown-toggle"data-bs-toggle="dropdown"aria-expanded="false"aria-haspopup="true"id="resourcesDropdown"role="button">Resources</a><div class="dropdown-menu public-sitenav-dropdown"id="public-sitenav-dropdown"aria-labelledby="resourcesDropdown"><a href="https://www.mymiwallet.com/index.php/Blog"class="dropdown-item">Blog</a> <a href="https://www.mymiwallet.com/index.php/How-It-Works"class="dropdown-item">How It Works</a> <a href="https://www.mymiwallet.com/index.php/Knowledgebase"class="dropdown-item">Knowledgebase</a></div></li><li class="intro-nav-item nav-item d-lg-inline-flex"><a href="https://www.mymiwallet.com/index.php/Support"class="intro-nav-link nav-link"target="_blank">Support</a></li><li class="intro-nav-item nav-item pl-lg-1 py-1"><a href="https://www.mymiwallet.com/index.php/login"class="btn btn-primary"><span>LOGIN</span></a></li></ul></div></div></div><div class="content-wrapper mt-0 nk-content p-0"><div class="mb-3 pt-5 pt-lg-5"><div class="row justify-content-center pt-4 pt-xl-3"><div class="pr-md-0 col-12 pt-4 pt-xl-0"><style nonce="WlJWJwxgEr8GgMMaoybCBg==">.hero-section{background:url(https://www.mymiwallet.com/assets/images/MyMI-Walllet-Background.jpeg) no-repeat center center fixed;background-size:cover}.social-icon-link{display:inline-block;color:#fff;transition:color .3s ease,transform .3s ease}.social-icon-link:hover{color:var(--bs-primary);transform:scale(1.2)}.social-icon-link svg path{fill:currentColor;transition:fill .3s ease}</style><section class="full-width hero-section pt-0"><div class="container-fluid p-5"><div class="row align-items-center"><div class="col-lg-2"></div><div class="col-lg-4"data-aos="fade-right"data-aos-duration="1000"><div class="text-white hero-content p-4"><span class="mb-3 badge animate-pulse bg-warning text-dark">Introducing</span><h1 class="mb-3 fw-bold display-4">Welcome to MyMI Wallet</h1><h2 class="h3 mb-4">Your All-In-One Financial Dashboard</h2><h3 class="lead mb-4">From budgeting and goal setting to investing and crypto, MyMI Wallet gives you the tools to manage and grow your financial life.</h3><div class="rounded-4 overflow-hidden position-relative shadow-lg video-container"><div class="ratio ratio-16x9"><iframe allowfullscreen src="https://www.youtube.com/embed/AMCS5kwGgpA"title="MyMI Wallet Overview"></iframe></div></div><div class="d-flex flex-wrap mt-4 gap-2"><a href="https://www.mymiwallet.com/index.php/Free/register"class="btn btn-lg btn-warning">Register Now <i class="fas fa-arrow-right ms-2"></i></a></div></div><div class="text-white hero-content p-4 mt-5"><h1 class="mb-3 fw-bold display-4 text-center">Join The Community!<br><hr></h1><div class="justify-content-center d-flex flex-wrap gap-3 align-items-center mb-4 mt-2"><a href="https://discord.gg/UUMexvA"class="social-icon-link"target="_blank"title="Discord"><svg viewBox="0 0 16 16"xmlns="http://www.w3.org/2000/svg"class="bi ad-font-lg bi-discord"fill="currentColor"height="3rem"width="3rem"><path d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z"/></svg> </a><a href="https://www.facebook.com/MyMIWalletNews"class="social-icon-link"target="_blank"title="Facebook Page"><svg viewBox="0 0 16 16"xmlns="http://www.w3.org/2000/svg"class="bi bi-facebook"fill="currentColor"height="3rem"width="3rem"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg> </a><a href="https://www.facebook.com/InvestorsTalk"class="social-icon-link"target="_blank"title="Investors Talk FB Group"><svg viewBox="0 0 16 16"xmlns="http://www.w3.org/2000/svg"class="bi bi-facebook"fill="currentColor"height="3rem"width="3rem"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg> </a><a href="https://www.linkedin.com/MyMIWallet"class="social-icon-link"target="_blank"title="LinkedIn"><svg viewBox="0 0 16 16"xmlns="http://www.w3.org/2000/svg"class="bi bi-linkedin"fill="currentColor"height="3rem"width="3rem"><path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/></svg> </a><a href="https://www.tiktok.com/@MyMIWallet"class="social-icon-link"target="_blank"title="TikTok"><svg viewBox="0 0 16 16"xmlns="http://www.w3.org/2000/svg"class="bi bi-tiktok"fill="currentColor"height="3rem"width="3rem"><path d="M9.117 0h1.631a.253.253 0 01.251.25v.647c0 .668.276 1.303.765 1.766a2.572 2.572 0 001.728.71c.14 0 .248.112.248.25v1.317a.253.253 0 01-.267.249 5.797 5.797 0 01-3.114-.815v5.592a3.454 3.454 0 11-2.505-3.33v1.537a1.917 1.917 0 101.185 1.77V0zM8.36 3.958a5.773 5.773 0 01-1.147-.553v6.837a1.92 1.92 0 00-1.35-2.167V7.34a3.451 3.451 0 012.497 3.323V3.958z"/></svg> </a><a href="https://www.tradingview.com/u/MyMIWallet/"class="social-icon-link"target="_blank"title="TradingView"><div style="height:48px;display:flex;align-items:center;justify-content:center"><img src="https://www.mymiwallet.com/assets/images/Company-Logos/TradingView-white-short-logo.png"class="bi bi-facebook"style="height:100%;object-fit:cover"></div></a><a href="https://www.twitter.com/MyMIWalletNews"class="social-icon-link"target="_blank"title="Twitter"><svg viewBox="0 0 16 16"xmlns="http://www.w3.org/2000/svg"class="bi bi-twitter"fill="currentColor"height="3rem"width="3rem"><path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/></svg> </a><a href="https://www.youtube.com/@MyMIWallet"class="social-icon-link"target="_blank"title="YouTube"><svg viewBox="0 0 16 16"xmlns="http://www.w3.org/2000/svg"class="bi bi-youtube"fill="currentColor"height="3rem"width="3rem"><path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/></svg></a></div></div></div><div class="col-md-12 col-lg-5 d-block-lg pl-lg-5"data-aos="fade-left"data-aos-duration="1000"><div class="intro-banner-wrap"><div class="intro-banner-inner"><div class="pt-5 intro-banner-desc"><div class="card p-3 rounded"><div class="card-body"><div class="card"><img src="https://www.mymiwallet.com/assets/images/MyMI-Wallet-Logo-Black.png"class="mb-3"alt="MyMI Wallet - Investment Accounting/Analytical Software & Crypto Asset Marketplace/Exchange"srcset="https://www.mymiwallet.com/assets/images/MyMI-Wallet-Logo-Black.png"><h1 class="text-center card-title display-7 mb-1 mbr-bold mbr-fonts-style mbr-section-title pb-3">Create Your Free Account!</h1><div class="card-body"><form action="https://www.mymiwallet.com/index.php/register"class="form-horizontal"id="user_register_form"method="POST"><input name="csrf_test_name"value="30836fbe33c9c1adce69cf5ae95f913487558676d5edf866b3107d9b2f773eb6"type="hidden"> <input name="referral"value="Default"id="referral"type="hidden"> <input name="referral_link"value="Default"id="referral_link"type="hidden"><div class="form-group"><label for="account_type">Account Type</label> <select class="form-control"id="account_type"name="account_type"required><option value="Personal">Personal</option><option value="Business">Business</option></select></div><div class="form-group"><label for="email">Email Address</label> <input name="email"value=""id="email"class="form-control"required type="email"></div><div class="form-group"><label for="username">Username</label> <input name="username"value=""id="username"class="form-control"required></div><div class="form-group"><label for="password">Password</label> <input name="password"value=""id="password"class="form-control"required type="password"></div><div class="form-group"><label for="pass_confirm">Confirm Password</label> <input name="pass_confirm"value=""id="pass_confirm"class="form-control"required type="password"></div><div class="form-group"><label for="pass_confirm">Referral Code</label> <input name="referral"value=""id="referral"class="form-control"></div><button class="btn btn-primary btn-block"type="submit">Register</button><div class="control-group form-row pt-3"><div class="controls col-12 pl-0"><div class="accordion-item"><a href="#"class="accordion-head border-bottom collapsed"data-bs-toggle="collapse"data-bs-target="#accordion-item-2-2"><strong>Service Disclosure</strong> <span class="accordion-icon"></span></a><div class="collapse accordion-body"id="accordion-item-2-2"data-bs-parent="#accordion-2"><div class="accordion-inner"><small class="text-muted">We are committed to complying with all U.S. regulations that help prevent, detect and remediate unlawful behavior by customers and virtual currency developers when using Millennial Investment's MyMI Wallet trading platform or any of the company’s other services. MyMI Wallet is also not a regulated exchange under U.S. securities laws.</small></div></div><div class="accordian-footer pl-4 py-2"><small>By registering an account, you are agreeing to our<br><a href="https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions">Terms &Conditions</a> and <a href="https://www.mymiwallet.com/index.php/Legal/Privacy-Policy">Privacy Policy</a> at MyMI Wallet, LLC.</small></div></div></div></div></form></div></div></div></div><div id="features"></div></div></div></div></div></div></div><div class="wave-divider"><svg viewBox="0 0 1440 320"xmlns="http://www.w3.org/2000/svg"><path d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,149.3C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"fill="#ffffff"fill-opacity="1"></path></svg></div></section><section class="full-width py-5 bg-light"id="journey"><div class="container-fluid"><div class="row justify-content-center text-center"><div class="col-lg-10"data-aos="fade-up"><span class="mb-3 badge bg-primary text-white">All-In-One Platform</span><h2 class="mb-3 fw-bold display-5">Why Choose MyMI Wallet?</h2><p class="lead mb-5">We simplify your financial life by bringing everything into one place — budgeting, investing, crypto, goal tracking, and more.</p></div></div><div class="row text-center g-4"><div class="col-md-3"data-aos="fade-up"data-aos-delay="100"><div class="bg-white feature-card h-100 p-4 rounded-4 shadow-sm"><i class="mb-3 fa-2x fas fa-piggy-bank text-primary"></i><h5>Personal Budgeting</h5><p>Create, manage, and forecast your monthly budget with real-time visibility.</p></div></div><div class="col-md-3"data-aos="fade-up"data-aos-delay="200"><div class="bg-white feature-card h-100 p-4 rounded-4 shadow-sm"><i class="mb-3 fa-2x fas fa-bullseye text-success"></i><h5>Financial Goals</h5><p>Set SMART financial goals and track progress with powerful visual dashboards.</p></div></div><div class="col-md-3"data-aos="fade-up"data-aos-delay="300"><div class="bg-white feature-card h-100 p-4 rounded-4 shadow-sm"><i class="mb-3 fa-2x fas fa-chart-line text-danger"></i><h5>Investing & Trade Alerts</h5><p>Get real-time insights and manage your investment portfolio with confidence.</p></div></div><div class="col-md-3"data-aos="fade-up"data-aos-delay="400"><div class="bg-white feature-card h-100 p-4 rounded-4 shadow-sm"><i class="mb-3 fa-2x fas fa-coins text-warning"></i><h5>Crypto Wallet & MyMI Gold</h5><p>Earn, save, and spend with crypto & in-app rewards using MyMI Gold tokens.</p></div></div></div></div></section><section class="bg-white features-section full-width mb-5 py-5"><div class="container-fluid"><div class="row justify-content-center text-center mb-5"><div class="col-lg-8"data-aos="fade-up"><span class="mb-3 badge bg-primary text-white">Our Services & Tools</span><h2 class="mb-3 fw-bold display-5">Your All-in-One Investment Toolkit</h2><p class="lead">MyMI Wallet equips investors with powerful, user-friendly tools to enhance financial decision-making. Whether you're a novice or a seasoned investor, we offer solutions tailored to optimize your financial strategies.</p></div></div><div class="row justify-content-center g-4"><div class="col-xl-8"><div class="row intro-feature-list"><div class="col-lg-4 col-md-10"><div class="intro-feature-item"><div class="intro-feature-media"><svg viewBox="0 0 512 512"xmlns="http://www.w3.org/2000/svg"id="GrowthReport"><path d="M255.328,511.507H68.479a30.689,30.689,0,0,1-30.786-30.59V30.59A30.678,30.678,0,0,1,68.479,0H403.837a30.678,30.678,0,0,1,30.786,30.59V409.929Z"fill="#4285f4"class="svgShape color79a1b5"></path><path d="M89.79,135.1a29.1,29.1,0,1,0,58.205,0c0-7.919-5.933-14.487-12.864-19.339a39.808,39.808,0,0,0-16.283-6.309C104.423,106.993,89.791,96.277,89.791,82.2a29.1,29.1,0,1,1,58.2,0"fill="none"class="svgStroke colorStrokeffffff"stroke="#ffffff"stroke-linecap="round"stroke-linejoin="round"stroke-width="6"></path><line class="svgStroke colorStrokeffffff"fill="none"stroke="#ffffff"stroke-linecap="round"stroke-linejoin="round"stroke-width="6"x1="118.891"x2="118.891"y1="53.083"y2="34.55"></line><line class="svgStroke colorStrokeffffff"fill="none"stroke="#ffffff"stroke-linecap="round"stroke-linejoin="round"stroke-width="6"x1="118.891"x2="118.891"y1="182.748"y2="164.215"></line><line class="svgStroke colorStrokeffffff"fill="none"stroke="#ffffff"stroke-linecap="round"stroke-linejoin="round"stroke-width="6"x1="203.363"x2="382.519"y1="82.368"y2="82.368"></line><line class="svgStroke colorStrokeffffff"fill="none"stroke="#ffffff"stroke-linecap="round"stroke-linejoin="round"stroke-width="6"x1="203.363"x2="334.719"y1="134.93"y2="134.93"></line><path d="M308.409,285.629c12.422,18.106,23.514,35.7,32.528,51.607L361,387.429,349.857,493.714l-11.847,7.768c-25.08,10.671-62.026,13.2-110.295,7.685-161.207-18.4.209-223.538.209-223.538L239.286,271.5l64.5,6.214Z"fill="#34a853"class="svgShape color964c36"></path><path d="M321.365,355.123l0,128.972c.779,7.229,6.9,13.25,18.343,18.13,14.03,5.987,34.86,9.775,58.127,9.775s44.1-3.788,58.126-9.775c11.438-4.88,17.689-10.9,18.34-18.13l0-128.972Z"fill="#fbbc05"class="svgShape colorffcd0c"></path><ellipse class="svgShape colorfaa719"cx="397.834"cy="355.123"fill="#fac019"rx="76.469"ry="27.905"></ellipse><path d="M321.37,442.707c0,6.924,6.9,13.249,18.342,18.117,14.03,5.987,34.86,9.775,58.127,9.775s44.1-3.788,58.126-9.775c11.438-4.868,18.342-11.193,18.342-18.117V398.921c0,6.924-6.9,13.25-18.342,18.118-14.03,5.987-34.86,9.774-58.126,9.774s-44.1-3.787-58.127-9.774c-11.438-4.868-18.342-11.194-18.342-18.118Z"fill="#fac019"class="svgShape colorfaa719"></path><path d="M245.023,418.442a21.6,21.6,0,1,0,43.19,0c0-5.876-4.4-10.75-9.545-14.35a29.541,29.541,0,0,0-12.083-4.682c-10.7-1.825-21.561-9.776-21.561-20.218a21.594,21.594,0,1,1,43.187,0"fill="none"class="svgStroke colorStrokeffffff"stroke="#ffffff"stroke-linecap="round"stroke-linejoin="round"stroke-width="6"></path><line class="svgStroke colorStrokeffffff"fill="none"stroke="#ffffff"stroke-linecap="round"stroke-linejoin="round"stroke-width="6"x1="266.617"x2="266.617"y1="357.583"y2="343.83"></line><line class="svgStroke colorStrokeffffff"fill="none"stroke="#ffffff"stroke-linecap="round"stroke-linejoin="round"stroke-width="6"x1="266.617"x2="266.617"y1="453.799"y2="440.046"></line><path d="M331.478,222.877l-23.063,62.752H227.921l-27.006-62.752s17.235-10.833,59.366,4.445a90.406,90.406,0,0,0,34.338,5.657C318.96,232.015,331.478,222.877,331.478,222.877Z"fill="#ea4335"class="svgShape colorc36245"></path></svg></div><div class="intro-feature-info"><h4 class="title">Personal Financial Budgeting</h4><p>Take control of your finances with our Personal Budgeting tool. From expense tracking and budget creation to setting financial goals, it’s a comprehensive solution to help you manage your money effectively and achieve lasting financial success.</p><a href="https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting"class="btn btn-primary btn-sm">Explore More</a></div></div></div><div class="col-lg-4 col-md-10"><div class="intro-feature-item"><div class="intro-feature-media"><svg viewBox="0 0 64 64"xmlns="http://www.w3.org/2000/svg"id="Barchart"enable-background="new 0 0 64 64"><path d="M18.41,17.81h-6c-0.54,0-0.97,0.43-0.97,0.97v32.15c0,0.54,0.43,0.97,0.97,0.97h6
app/Views/themes/public/layouts/total-index.php:80:                                                    l7.4,5.9l9.3-10l0.1,2l1.2,0l-0.1-4.2L38.4,37z"fill="#225931"class="svgShape color222f59"></path><path d="M6.8 18.1c0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1C6.4 17 6.8 17.5 6.8 18.1zM10.9 18.1c0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1C10.4 17 10.9 17.5 10.9 18.1zM15 18.1c0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1C14.5 17 15 17.5 15 18.1z"fill="#ffffff"class="svgShape colorffffff"></path><rect class="svgShape colorffffff"fill="#ffffff"height="1"width="21.3"x="22.9"y="17.6"></rect><g class="svgShape color000000"fill="#000000"><rect class="svgShape colorbcd6ef"fill="#fbbc05"height="1"width="11.1"x="50.3"y="56.3"></rect></g><g class="svgShape color000000"fill="#000000"><rect class="svgShape colorbcd6ef"fill="#fbbc05"height="1"width="11.1"x="50.3"y="52.2"></rect></g><g class="svgShape color000000"fill="#000000"><rect class="svgShape colorbcd6ef"fill="#fbbc05"height="1"width="11.1"x="50.3"y="48.1"></rect></g><g class="svgShape color000000"fill="#000000"><rect class="svgShape colorbcd6ef"fill="#fbbc05"height="1"width="11.1"x="50.3"y="44"></rect></g><g class="svgShape color000000"fill="#000000"><rect class="svgShape colorbcd6ef"fill="#fbbc05"height="1"width="11.1"x="50.3"y="39.9"></rect></g><g class="svgShape color000000"fill="#000000"><rect class="svgShape colorbcd6ef"fill="#fbbc05"height="1"width="22.7"x="24.5"y="5.5"></rect></g><g class="svgShape color000000"fill="#000000"><rect class="svgShape colorbcd6ef"fill="#fbbc05"height="1"width="22.7"x="24.5"y="10.3"></rect></g></svg></div><div class="intro-feature-info"><h4 class="title">Automated Financial Insights</h4><p>Our AI-driven insights provide personalized recommendations based on your portfolio’s performance. Leverage these insights to fine-tune your investment strategies and maximize your financial growth.</p><a href="https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights"class="btn btn-primary btn-sm">Learn More</a></div></div></div></div></div></div><div class="row justify-content-center text-center mt-5"><div class="col-lg-8"data-aos="fade-up"><p class="lead">Ready to make smarter decisions with MyMI Wallet’s financial tools?</p><div class="justify-content-center d-flex flex-wrap gap-3 mt-4"><a href="https://www.mymiwallet.com/index.php/Dashboard"class="btn btn-primary btn-lg">Access Dashboard</a> <a href="https://www.mymiwallet.com/index.php/How-It-Works"class="btn btn-lg btn-outline-primary">Learn More</a></div></div></div></div></section><section class="text-center bg-light full-width py-5"><div class="container"><h2 class="fw-bold display-5 mb-4">Your Financial Freedom Starts Today</h2><p class="lead mb-4">Get access to all tools and resources for free. Upgrade anytime for more power.</p><a href="https://www.mymiwallet.com/index.php/Free/register"class="btn btn-primary btn-lg px-5 py-3">Register Now</a><p class="mt-3"><small>No credit card required. Cancel anytime.</small></p></div></section><div class="bg-white intro-feature intro-section"><div class="container container-xl"><div class="row justify-content-center"><div class="col-lg-9 col-xl-7"><div class="text-center intro-section-title"><span class="overline-title">Your Comprehensive Guide</span><h2 class="title intro-heading-lead">How It Works</h2><div class="intro-section-desc"><p>MyMI Wallet’s all-in-one platform gives you control over your investments, budgeting, and financial future. Explore our easy-to-follow guides to get started.</p></div></div></div></div><div class="row justify-content-center"><div class="col-xl-12"><div class="row justify-content-center intro-feature-list"><div class="col-lg-4 col-sm-6"><a href="https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account"class="intro-feature-item"><div class="intro-feature-media"><svg viewBox="0 0 64 64"xmlns="http://www.w3.org/2000/svg"id="Investor"><circle class="svgShape color65c981"cx="32"cy="32"fill="#34a853"r="32"></circle><path d="M43,38.87c-1.19-4-7.14-3.57-9.71-4.72s-2.17-5-2.49-5.7H24.5c-.33.67.08,4.54-2.49,5.7s-8.52.71-9.71,4.72a19.44,19.44,0,0,0-.8,5.35,95.15,95.15,0,0,0,16,1.62,102.5,102.5,0,0,0,16.33-1.62,19.45,19.45,0,0,0-.8-5.35Z"fill="#6d9be8"class="svgShape color6dc5e8"></path><path d="M29.26,45.8a44,44,0,0,0,2.8-12.71H23.19A43.89,43.89,0,0,0,26,45.81l1.45,0,1.81,0Z"fill="#ffffff"class="svgShape colorffffff"></path><path d="M29,33.76H26.29l-.2.66,3.09,0Z"fill="#d8a19c"class="svgShape colord8b59c"></path><path d="M29.12,45.81l.06-.85-.65-8.56h-1.7L26.08,45l.06.86,1.31,0,1.67,0Z"fill="#ea4335"class="svgShape colorf75267"></path><path d="M26.84,36.43l1.7,0,0,.48"fill="#b2352b"class="svgShape colorb22b39"></path><path d="M25.62,34h4l-.23,1.37-.91,1H26.84l-1-1Z"fill="#ea4335"class="svgShape colorf75267"></path><path d="M26.29 33.76l-2.74-1.49s-.36.51-1.26 1.72l3 2.13a.32.32 0 0 0 .5-.2l.2-1.09zM28.87 33.76l2.74-1.49s.36.51 1.26 1.72l-3 2.13a.32.32 0 0 1-.5-.2l-.2-1.09z"fill="#e5e5e5"class="svgShape colore5e5e5"></path><path d="M35 38.66l-4.09 7.07c-.74 0-1.48.07-2.22.08L31.46 35.5 32.13 33l1.8 1.4h0l1 3.1L33.45 38zM21.23 34.43l-.95 3.06 1.43.51-1.58.66 4.1 7.09c.73 0 1.48.06 2.22.07L23 33z"fill="#4285f4"class="svgShape color4395b5"></path><path d="M34.58 26.75c-.67-.12-1-1.22-.81-2.46s.95-2.14 1.62-2 1 1.22.81 2.46-.95 2.14-1.62 2zM19.06 24.73c-.22-1.24.14-2.34.81-2.46s1.4.78 1.62 2-.14 2.34-.81 2.46-1.4-.78-1.62-2z"fill="#d8c99e"class="svgShape colord8b79e"></path><path d="M34.46,16.94H20.8S17,32.54,27.63,34c10.66-1.51,6.83-17.1,6.83-17.1Z"fill="#f2e1b1"class="svgShape colorf2cfb1"></path><path d="M20.13,22.8a10.48,10.48,0,0,0,.71-2.85s.52,1.06.73.13a7.23,7.23,0,0,1,2.14-2.8c.22,0-1,2-.91,2.95a32,32,0,0,1,3.49-1.49,12.55,12.55,0,0,1,8.51.08l.32,3.72S36.9,20.8,36,17a7.54,7.54,0,0,0-8.12-5.76c-3.65.41-6.48,1.86-7.48,4S19.22,19.42,20.13,22.8Z"fill="#2d4f36"class="svgShape color2d434f"></path><path d="M49.55,52.33a4.77,4.77,0,0,0-4.11-.1,4.58,4.58,0,0,1-1.42.32A13.68,13.68,0,0,1,40,52.23a8,8,0,0,1-.82-.3c-.29-.13-1.18-.24-3.8.67-2.23.76-1.76-1.18-1.08-2.78a9,9,0,0,0,.73-4c-.12-3,.36-8.35,4.89-11.61v-.94s-2.14-2.1-2.3-3.24c-.12-.89.27-1.52,1.65-1.5a4.44,4.44,0,0,1,2.24.67l1.34.82h.64s2.5-1.28,3.34-1.13S48.4,30,46.26,33.3v.88l0,0a13.23,13.23,0,0,1,4.8,11.53,9,9,0,0,0,.56,3.82l.65,1.72S53.62,53.61,49.55,52.33Z"fill="#f7d163"class="svgShape colorf7cc63"></path><polygon class="svgShape colord89832"fill="#fbbc05"points="46.26 33.3 46.26 34.18 46.04 34.18 45.63 33.3 46.26 33.3"></polygon><polygon class="svgShape colord89832"fill="#fbbc05"points="40.49 34.21 39.88 34.21 39.88 33.3 40.08 33.3 40.49 34.21"></polygon><polygon class="svgShape colord89832"fill="#fbbc05"points="45.69 34.18 45 34.19 44.59 33.3 45.28 33.3 45.69 34.18"></polygon><polygon class="svgShape colord89832"fill="#fbbc05"points="44.65 34.19 43.96 34.19 43.55 33.3 44.24 33.3 44.65 34.19"></polygon><polygon class="svgShape colord89832"fill="#fbbc05"points="43.61 34.19 42.92 34.2 42.51 33.3 43.2 33.3 43.61 34.19"></polygon><polygon class="svgShape colord89832"fill="#fbbc05"points="42.57 34.2 41.88 34.2 41.47 33.3 42.16 33.3 42.57 34.2"></polygon><polygon class="svgShape colord89832"fill="#fbbc05"points="41.53 34.2 40.84 34.2 40.43 33.3 41.12 33.3 41.53 34.2"></polygon><polygon class="svgShape colora57329"fill="#a53329"points="40.84 34.2 40.49 34.21 40.08 33.3 40.43 33.3 40.84 34.2"></polygon><polygon class="svgShape colora57329"fill="#a53329"points="41.88 34.2 41.53 34.2 41.12 33.3 41.47 33.3 41.88 34.2"></polygon><polygon class="svgShape colora57329"fill="#a53329"points="42.92 34.2 42.57 34.2 42.16 33.3 42.51 33.3 42.92 34.2"></polygon><polygon class="svgShape colora57329"fill="#a53329"points="43.96 34.19 43.61 34.19 43.2 33.3 43.55 33.3 43.96 34.19"></polygon><polygon class="svgShape colora57329"fill="#a53329"points="45 34.19 44.65 34.19 44.24 33.3 44.59 33.3 45 34.19"></polygon><polygon class="svgShape colora57329"fill="#a53329"points="46.04 34.18 45.69 34.18 45.28 33.3 45.63 33.3 46.04 34.18"></polygon><path d="M46.07,44.67a1.85,1.85,0,0,1-.67,1.49,3.34,3.34,0,0,1-1.88.68V48h-.8V46.86a6.5,6.5,0,0,1-2.5-.5V44.81a6.75,6.75,0,0,0,1.23.44,6.56,6.56,0,0,0,1.28.23V43.67l-.39-.15a4.37,4.37,0,0,1-1.64-1,1.91,1.91,0,0,1-.48-1.32,1.73,1.73,0,0,1,.66-1.39,3.37,3.37,0,0,1,1.85-.66v-.89h.8v.87a6.64,6.64,0,0,1,2.42.54L45.38,41a6.33,6.33,0,0,0-1.87-.46V42.3a9,9,0,0,1,1.62.76,2.22,2.22,0,0,1,.71.71A1.76,1.76,0,0,1,46.07,44.67ZM42,41.2a.55.55,0,0,0,.18.42,2.12,2.12,0,0,0,.58.34V40.6Q42,40.71,42,41.2Zm2.35,3.55a.53.53,0,0,0-.2-.42,2.62,2.62,0,0,0-.6-.35v1.46Q44.31,45.31,44.31,44.75Z"fill="#ffffff"class="svgShape colorffffff"></path></svg></div><div class="intro-feature-info"><h4 class="title">Registering an Account</h4><p>Follow this guide to quickly create your MyMI Wallet account. Gain full access to the tools you need to manage your financial journey and make informed investment decisions.</p></div></a></div><div class="col-lg-4 col-sm-6"><a href="https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting"class="intro-feature-item"><div class="intro-feature-media"><svg viewBox="0 0 512 512"xmlns="http://www.w3.org/2000/svg"id="GrowthReport"><path d="M255.328,511.507H68.479a30.689,30.689,0,0,1-30.786-30.59V30.59A30.678,30.678,0,0,1,68.479,0H403.837a30.678,30.678,0,0,1,30.786,30.59V409.929Z"fill="#4285f4"class="svgShape color79a1b5"></path><path d="M89.79,135.1a29.1,29.1,0,1,0,58.205,0c0-7.919-5.933-14.487-12.864-19.339a39.808,39.808,0,0,0-16.283-6.309C104.423,106.993,89.791,96.277,89.791,82.2a29.1,29.1,0,1,1,58.2,0"fill="none"class="svgStroke colorStrokeffffff"stroke="#ffffff"stroke-linecap="round"stroke-linejoin="round"stroke-width="6"></path><line class="svgStroke colorStrokeffffff"fill="none"stroke="#ffffff"stroke-linecap="round"stroke-linejoin="round"stroke-width="6"x1="118.891"x2="118.891"y1="53.083"y2="34.55"></line><line class="svgStroke colorStrokeffffff"fill="none"stroke="#ffffff"stroke-linecap="round"stroke-linejoin="round"stroke-width="6"x1="118.891"x2="118.891"y1="182.748"y2="164.215"></line><line class="svgStroke colorStrokeffffff"fill="none"stroke="#ffffff"stroke-linecap="round"stroke-linejoin="round"stroke-width="6"x1="203.363"x2="382.519"y1="82.368"y2="82.368"></line><line class="svgStroke colorStrokeffffff"fill="none"stroke="#ffffff"stroke-linecap="round"stroke-linejoin="round"stroke-width="6"x1="203.363"x2="334.719"y1="134.93"y2="134.93"></line><path d="M308.409,285.629c12.422,18.106,23.514,35.7,32.528,51.607L361,387.429,349.857,493.714l-11.847,7.768c-25.08,10.671-62.026,13.2-110.295,7.685-161.207-18.4.209-223.538.209-223.538L239.286,271.5l64.5,6.214Z"fill="#34a853"class="svgShape color964c36"></path><path d="M321.365,355.123l0,128.972c.779,7.229,6.9,13.25,18.343,18.13,14.03,5.987,34.86,9.775,58.127,9.775s44.1-3.788,58.126-9.775c11.438-4.88,17.689-10.9,18.34-18.13l0-128.972Z"fill="#fbbc05"class="svgShape colorffcd0c"></path><ellipse class="svgShape colorfaa719"cx="397.834"cy="355.123"fill="#fac019"rx="76.469"ry="27.905"></ellipse><path d="M321.37,442.707c0,6.924,6.9,13.249,18.342,18.117,14.03,5.987,34.86,9.775,58.127,9.775s44.1-3.788,58.126-9.775c11.438-4.868,18.342-11.193,18.342-18.117V398.921c0,6.924-6.9,13.25-18.342,18.118-14.03,5.987-34.86,9.774-58.126,9.774s-44.1-3.787-58.127-9.774c-11.438-4.868-18.342-11.194-18.342-18.118Z"fill="#fac019"class="svgShape colorfaa719"></path><path d="M245.023,418.442a21.6,21.6,0,1,0,43.19,0c0-5.876-4.4-10.75-9.545-14.35a29.541,29.541,0,0,0-12.083-4.682c-10.7-1.825-21.561-9.776-21.561-20.218a21.594,21.594,0,1,1,43.187,0"fill="none"class="svgStroke colorStrokeffffff"stroke="#ffffff"stroke-linecap="round"stroke-linejoin="round"stroke-width="6"></path><line class="svgStroke colorStrokeffffff"fill="none"stroke="#ffffff"stroke-linecap="round"stroke-linejoin="round"stroke-width="6"x1="266.617"x2="266.617"y1="357.583"y2="343.83"></line><line class="svgStroke colorStrokeffffff"fill="none"stroke="#ffffff"stroke-linecap="round"stroke-linejoin="round"stroke-width="6"x1="266.617"x2="266.617"y1="453.799"y2="440.046"></line><path d="M331.478,222.877l-23.063,62.752H227.921l-27.006-62.752s17.235-10.833,59.366,4.445a90.406,90.406,0,0,0,34.338,5.657C318.96,232.015,331.478,222.877,331.478,222.877Z"fill="#ea4335"class="svgShape colorc36245"></path></svg></div><div class="intro-feature-info"><h4 class="title">Personal Budgeting</h4><p>Track income, manage expenses, and set financial goals with our easy-to-use budgeting tool. Take full control of your personal finances with MyMI Wallet.</p></div></a></div><div class="col-lg-4 col-sm-6"><a href="https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard"class="intro-feature-item"><div class="intro-feature-media"><svg viewBox="0 0 56 56"xmlns="http://www.w3.org/2000/svg"id="Investment"><path d="M52 51H4a1 1 0 0 0 0 2h48a1 1 0 0 0 0-2zm-30-2h12c.55 0 1-.45 1-1V36c0-.55-.45-1-1-1H22c-.55 0-1 .45-1 1v12c0 .55.45 1 1 1zM6 49h12c.55 0 1-.45 1-1v-8c0-.55-.45-1-1-1H6c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1z"fill="#34a853"class="svgShape color3b4652"></path><path d="M38 49h12c.55 0 1-.45 1-1V28c0-.55-.45-1-1-1H38c-.55 0-1 .45-1 1v20c0 .55.45 1 1 1z"fill="#4285f4"class="svgShape color2b79c2"></path><path d="M6 37c.15 0 .303-.034.447-.105L32.43 23.903l-1.325 2.65a1 1 0 1 0 1.79.894l3-6A1.001 1.001 0 0 0 35 20h-7a1 1 0 0 0 0 2h3.763L5.553 35.105A1 1 0 0 0 6 37z"fill="#34a853"class="svgShape color3b4652"></path><path d="M43.58 3c-5.19 0-9.41 4.22-9.41 9.42 0 5.19 4.22 9.41 9.41 9.41S53 17.61 53 12.42C53 7.22 48.77 3 43.58 3zm-.02 8.417c1.795 0 3.22 1.424 3.22 3.174a3.191 3.191 0 0 1-2.197 3.049v.634a1 1 0 0 1-2 0v-.641c-1.281-.422-2.196-1.599-2.196-2.998a1 1 0 0 1 2 0c0 .648.526 1.175 1.174 1.175.692 0 1.219-.527 1.219-1.175 0-.692-.527-1.218-1.175-1.218-1.795 0-3.218-1.425-3.218-3.175a3.19 3.19 0 0 1 2.196-3.048v-.635a1 1 0 0 1 2 0V7.2c1.28.422 2.197 1.598 2.197 2.997a1 1 0 0 1-2 0c0-.648-.527-1.175-1.175-1.175-.692 0-1.218.527-1.218 1.175 0 .692.526 1.219 1.174 1.219z"fill="#4285f4"class="svgShape color2b79c2"></path></svg></div><div class="intro-feature-info"><h4 class="title">Investment Dashboard</h4><p>Access a complete overview of your portfolio with our Investment Dashboard. Get real-time updates, performance metrics, and track your progress to make smarter financial decisions.</p></div></a></div><div class="col-lg-4 col-sm-6"><a href="https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals"class="intro-feature-item"><div class="intro-feature-media"><svg viewBox="0 0 64 64"xmlns="http://www.w3.org/2000/svg"id="Business"><g class="svgShape color000000"fill="#000000"transform="translate(-183 -1175.362)"><path d="M190 1229.362v-10l11.958-11.937 2.921 3 7.942-8 1.947 2L227 1192.36v37.002z"fill="#4ac36a"class="svgShape color8bc34a"fill-rule="evenodd"></path><path d="M187.5 1182.362v50m47.5-2.5h-50"fill="none"class="svgStroke colorStroke37474f"stroke="#374f3d"></path><path d="m189.34 1219.362 13-12 3 3 8-8 2 2 12.005-12.346"fill="none"class="svgStroke colorStroke263238"stroke="#26382b"></path><path d="M224 1191.862h3.5v3.5m-36 25v7m3-10v10m3-13v13m3-16v16m3-16v16m3-15v15m3-18v18m3-21v21m3-20v20m3-23v23m3-26v26m3-29v29"fill="none"class="svgStroke colorStroke263238"stroke="#26382b"></path><g class="svgShape color000000"fill="#000000"transform="translate(183 185)"><path d="M53.5 1035.362h2v5h-2z"fill="#ffbe00"class="svgShape colorff9800"color="#000"overflow="visible"style="isolation:auto;mix-blend-mode:normal"></path><path d="M52 1030.862h-2a3.492 3.492 0 0 1-3.5-3.5v-.729m0-.179v-2.592h3.321"fill="none"class="svgStroke colorStrokeffc107"stroke="#ffbf07"stroke-linecap="round"stroke-linejoin="round"color="#000"overflow="visible"style="isolation:auto;mix-blend-mode:normal"transform="matrix(-1 0 0 1 109 2)"></path><path d="M52 1032.862h-2a3.492 3.492 0 0 1-3.5-3.5v-.73m0-.178v-2.592h3.321"fill="none"class="svgStroke colorStrokeffc107"stroke="#ffbf07"stroke-linecap="round"stroke-linejoin="round"color="#000"overflow="visible"style="isolation:auto;mix-blend-mode:normal"></path><rect class="svgShape colorffc107"fill="#fbbc05"height="11"width="11"x="49"y="1025.362"rx="4.889"color="#000"overflow="visible"ry="4.889"style="isolation:auto;mix-blend-mode:normal"></rect><rect class="svgShape colorffc107"fill="#fbbc05"height="8"width="11"x="49"y="1023.362"rx="0"color="#000"overflow="visible"ry="0"style="isolation:auto;mix-blend-mode:normal"></rect><path d="m54 1036.362-.89-.301-.752.561.012-.939-.767-.542.897-.279.279-.897.542.767.94-.012-.563.753z"fill="#ffbe00"class="svgShape colorff9800"color="#000"overflow="visible"style="isolation:auto;mix-blend-mode:normal"transform="rotate(8.722 5946.841 1188.277)scale(1.85876)"></path><rect class="svgShape colorffc107"fill="#fbbc05"height="1"width="5"x="52"y="1040.362"rx=".5"color="#000"overflow="visible"ry=".5"style="isolation:auto;mix-blend-mode:normal"></rect><rect class="svgShape colorffc107"fill="#fbbc05"height="1"width="5"x="52"y="1040.862"rx="0"color="#000"overflow="visible"ry="0"style="isolation:auto;mix-blend-mode:normal"></rect><rect class="svgShape color6d4c41"fill="#416d4d"height="4"width="9"x="50"y="1041.362"rx="1"color="#000"overflow="visible"ry="1"style="isolation:auto;mix-blend-mode:normal"></rect><path d="M50 1043.362h9v2h-9z"fill="#416d4d"class="svgShape color6d4c41"color="#000"overflow="visible"style="isolation:auto;mix-blend-mode:normal"></path><path d="M52 1043.362h5v1h-5z"fill="#f5b600"class="svgShape colorf57c00"color="#000"overflow="visible"style="isolation:auto;mix-blend-mode:normal"></path></g><path d="M190 1185.362h2v2h-2z"fill="#4caf66"class="svgShape color4caf50"color="#000"overflow="visible"style="isolation:auto;mix-blend-mode:normal"></path><path d="M190 1189.362h2v2h-2z"fill="#ea4335"class="svgShape colorf44336"color="#000"overflow="visible"style="isolation:auto;mix-blend-mode:normal"></path><path d="M193 1185.362h4v2h-4zM193 1189.362h4v2h-4z"fill="#e9eaed"class="svgShape colore9eded"color="#000"overflow="visible"style="isolation:auto;mix-blend-mode:normal"></path><path d="M199 1185.362h11v2h-11zM199 1189.362h11v2h-11z"fill="#b0b8c5"class="svgShape colorb0bec5"color="#000"overflow="visible"style="isolation:auto;mix-blend-mode:normal"></path><path d="m229.081 1207.857 1.414-1.414m-1.414 0 1.414 1.414"fill="none"class="svgStroke colorStroke6d4c41"stroke="#416d4d"stroke-linecap="round"stroke-linejoin="round"></path><path d="m244.575 1205.488.919-.53m-2.375.14-.53-.919m1.598 2.758.53.919m-1.987-1.309-.918.53"fill="none"class="svgStroke colorStroke47a146"stroke="#34a853"stroke-linecap="round"stroke-linejoin="round"></path><path d="m231.626 1223.366.868-.5m-2.238.13-.494-.855m1.505 2.595.493.854m-1.876-1.224-.854.493"fill="none"class="svgStroke colorStrokef44336"stroke="#f44536"stroke-linecap="round"stroke-linejoin="round"></path><path d="m244.08 1227.857 1.415-1.414m-1.414 0 1.414 1.414"fill="none"class="svgStroke colorStroke0277bd"stroke="#0248bd"stroke-linecap="round"stroke-linejoin="round"></path><circle class="svgStroke colorStroke2196f3"cx="233.5"cy="1203.862"fill="none"r="1"color="#000"overflow="visible"style="isolation:auto;mix-blend-mode:normal"stroke="#4285f4"stroke-linecap="round"stroke-linejoin="round"></circle><circle class="svgShape colorf44336"cx="242.5"cy="1222.862"fill="#ea4335"r=".5"color="#000"overflow="visible"style="isolation:auto;mix-blend-mode:normal"></circle><circle class="svgShape color4caf50"cx="229.5"cy="1226.862"fill="#4caf66"r=".5"color="#000"overflow="visible"style="isolation:auto;mix-blend-mode:normal"></circle></g></svg></div><div class="intro-feature-info"><h4 class="title">Setting Financial Goals</h4><p>Learn how to create and track your financial goals using our intuitive tools. Stay on course and reach your milestones to achieve financial independence.</p></div></a></div><div class="col-lg-4 col-sm-6"><a href="https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold"class="intro-feature-item"><div class="intro-feature-media"><svg viewBox="0 0 512 512"xmlns="http://www.w3.org/2000/svg"id="FinancialAnalysis"><path d="M456,216V448H56V216a24.006,24.006,0,0,1,24-24H432A24.006,24.006,0,0,1,456,216Z"fill="#2d302e"class="svgShape color2d2d30"></path><polyline class="svgShape color83d8f4"fill="#4285f4"points="352 216 432 216 432 424 80 424 80 216 160 216 320 216"></polyline><path d="M16,448H496a0,0,0,0,1,0,0v32a16,16,0,0,1-16,16H32a16,16,0,0,1-16-16V448a0,0,0,0,1,0,0Z"fill="#e0e1e2"class="svgShape colore0e0e2"></path><polygon class="svgShape color57565c"fill="#34a853"points="288 472 224 472 216 448 296 448 288 472"></polygon><circle class="svgShape colorff9811"cx="256"cy="144"fill="#fbbc05"r="88"></circle><circle class="svgShape colorffda44"cx="256"cy="144"fill="#ffcf44"r="64"></circle><rect class="svgShape colorffda44"fill="#ffcf44"height="48"width="24"x="16"y="16"></rect><rect class="svgShape colorffda44"fill="#ffcf44"height="48"width="24"x="472"y="112"transform="rotate(180 484 136)"></rect><rect class="svgShape colorffda44"fill="#ffcf44"height="88"width="24"x="120"y="264"></rect><rect class="svgShape colorab2300"fill="#ea4335"height="56"width="24"x="168"y="296"></rect><rect class="svgShape colorff9811"fill="#fbbc05"height="80"width="24"x="216"y="272"></rect><rect class="svgShape color91cc04"fill="#cc9904"height="88"width="24"x="264"y="264"></rect><rect class="svgShape colorff9811"fill="#fbbc05"height="56"width="24"x="312"y="296"></rect><rect class="svgShape colorab2300"fill="#ea4335"height="80"width="24"x="360"y="272"></rect><circle class="svgShape colorab2300"cx="360"cy="56"fill="#ea4335"r="16"></circle><g class="svgShape color000000"fill="#000000"><path d="M496,440H464V216a32.042,32.042,0,0,0-32-32H343.26a95.309,95.309,0,0,0,5.7-16H448a8,8,0,0,0,0-16H351.66c.22-2.64.34-5.31.34-8a96,96,0,0,0-184.9-36.22L117.66,58.34A8.008,8.008,0,0,0,112,56H64a8,8,0,0,0,0,16h44.69l53.17,53.17A96.009,96.009,0,0,0,168.74,184H80a32.036,32.036,0,0,0-32,32V440H16a8,8,0,0,0-8,8v32a24.032,24.032,0,0,0,24,24H480a24.032,24.032,0,0,0,24-24V448A8,8,0,0,0,496,440ZM256,64a80,80,0,1,1-80,80A80.093,80.093,0,0,1,256,64ZM424,224V416H88V224H203.03a95.715,95.715,0,0,0,105.96,0ZM64,216a16.021,16.021,0,0,1,16-16h98.07a99.229,99.229,0,0,0,6.44,8H80a8,8,0,0,0-8,8V424a8,8,0,0,0,8,8H432a8,8,0,0,0,8-8V216a8,8,0,0,0-8-8H327.49a99.229,99.229,0,0,0,6.44-8H432a16.021,16.021,0,0,1,16,16V440H64ZM284.9,456l-2.67,8H229.77l-2.67-8ZM488,480a8.011,8.011,0,0,1-8,8H32a8.011,8.011,0,0,1-8-8V456H210.23l6.18,18.53A8,8,0,0,0,224,480h64a8,8,0,0,0,7.59-5.47L301.77,456H488Z"fill="#000000"class="svgShape color000000"></path><path d="M104 464H40a8 8 0 000 16h64a8 8 0 000-16zM136 464h-8a8 8 0 000 16h8a8 8 0 000-16zM256 216a72 72 0 10-72-72A72.083 72.083 0 00256 216zm0-128a56 56 0 11-56 56A56.062 56.062 0 01256 88z"fill="#000000"class="svgShape color000000"></path><path d="M240 160a8 8 0 000 16h8a8 8 0 0016 0h8a8 8 0 008-8V144a8 8 0 00-8-8H248v-8h24a8 8 0 000-16h-8a8 8 0 00-16 0h-8a8 8 0 00-8 8v24a8 8 0 008 8h24v8zM64 24H168a8 8 0 000-16H64a8 8 0 000 16zM64 48h56a8 8 0 000-16H64a8 8 0 000 16zM16 72H40a8 8 0 008-8V16a8 8 0 00-8-8H16a8 8 0 00-8 8V64A8 8 0 0016 72zm8-48h8V56H24zM448 128H392a8 8 0 000 16h56a8 8 0 000-16zM496 104H472a8 8 0 00-8 8v48a8 8 0 008 8h24a8 8 0 008-8V112A8 8 0 00496 104zm-8 48h-8V120h8zM112 360H400a8 8 0 000-16h-8V272a8 8 0 00-8-8H360a8 8 0 00-8 8v72h-8V296a8 8 0 00-8-8H312a8 8 0 00-8 8v48h-8V264a8 8 0 00-8-8H264a8 8 0 00-8 8v80h-8V272a8 8 0 00-8-8H216a8 8 0 00-8 8v72h-8V296a8 8 0 00-8-8H168a8 8 0 00-8 8v48h-8V264a8 8 0 00-8-8H120a8 8 0 00-8 8v80a8 8 0 000 16zm256-80h8v64h-8zm-48 24h8v40h-8zm-48-32h8v72h-8zm-48 8h8v64h-8zm-48 24h8v40h-8zm-48-32h8v72h-8zM112 384h80a8 8 0 000-16H112a8 8 0 000 16zM112 408h48a8 8 0 000-16H112a8 8 0 000 16zM296 368H216a8 8 0 000 16h80a8 8 0 000-16zM264 392H216a8 8 0 000 16h48a8 8 0 000-16zM400 368H320a8 8 0 000 16h80a8 8 0 000-16zM368 392H320a8 8 0 000 16h48a8 8 0 000-16zM360 80a23.856 23.856 0 0010.34-2.345l0 0 40 40A8 8 0 00416 120h32a8 8 0 000-16H419.313L381.657 66.343l0 0A24 24 0 10360 80zm0-32a8 8 0 11-8 8A8.009 8.009 0 01360 48z"fill="#000000"class="svgShape color000000"></path></g></svg></div><div class="intro-feature-info"><h4 class="title">MyMI Gold</h4><p>Unlock exclusive features with MyMI Gold. Gain access to advanced analytics, higher trade limits, and special rewards. Learn how to acquire and grow your MyMI Gold balance.</p></div></a></div><div class="col-lg-4 col-sm-6"><a href="https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange"class="intro-feature-item"><div class="intro-feature-media"><svg viewBox="0 0 512 512"xmlns="http://www.w3.org/2000/svg"id="BitcoinExchange"><circle class="svgShape color7dd9c2"cx="137.5"cy="137.5"fill="#34a853"r="137.5"></circle><path d="M20 157.5C20 81.68 81.68 20 157.5 20a136.79 136.79 0 0 1 86.66 30.84A137.27 137.27 0 0 0 137.5 0C61.68 0 0 61.68 0 137.5a137.27 137.27 0 0 0 50.84 106.66A136.79 136.79 0 0 1 20 157.5Z"fill="#4285f4"class="svgShape color5cd0b3"></path><circle class="svgShape colorffcd69"cx="374.5"cy="374.5"fill="#ffd969"r="137.5"></circle><path d="M257 394.5c0-75.82 61.68-137.5 137.5-137.5a136.79 136.79 0 0 1 86.66 30.84A137.27 137.27 0 0 0 374.5 237C298.68 237 237 298.68 237 374.5a137.27 137.27 0 0 0 50.84 106.66A136.79 136.79 0 0 1 257 394.5Z"fill="#fbbc05"class="svgShape colorffc144"></path><path d="M170 137.5a37.49 37.49 0 0 0-11.65-65.9V57.5a7.5 7.5 0 0 0-15 0V70h-11.68V57.5a7.5 7.5 0 1 0-15 0V70H97.5a7.5 7.5 0 0 0 0 15H110v45H97.5a7.5 7.5 0 0 0 0 15H110v45H97.5a7.5 7.5 0 0 0 0 15h19.17v12.5a7.5 7.5 0 1 0 15 0V205h11.66v12.5a7.5 7.5 0 0 0 15 0v-14.1A37.49 37.49 0 0 0 170 137.5ZM125 85h22.5a22.5 22.5 0 0 1 0 45H125Zm22.5 105H125v-45h22.5a22.5 22.5 0 0 1 0 45Z"fill="#f5f7fa"class="svgShape colorfaf7f5"></path><path d="M429.14 207.17a7.5 7.5 0 0 1-7.5-7.5V127.5a32.54 32.54 0 0 0-32.5-32.5h-75a7.5 7.5 0 0 1 0-15h75a47.55 47.55 0 0 1 47.5 47.5v72.17a7.5 7.5 0 0 1-7.5 7.5Z"fill="#ea4335"class="svgShape colordc72a9"></path><path d="M429.14 211.5a7.5 7.5 0 0 1-5.3-2.2L388.49 174a7.5 7.5 0 1 1 10.6-10.61l30.05 30 30.06-30A7.5 7.5 0 1 1 469.8 174l-35.35 35.3a7.51 7.51 0 0 1-5.31 2.2Z"fill="#e3958e"class="svgShape colore38eba"></path><path d="M197.86 432h-75a47.55 47.55 0 0 1-47.5-47.5v-72.17a7.5 7.5 0 0 1 15 0v72.17a32.54 32.54 0 0 0 32.5 32.5h75a7.5 7.5 0 0 1 0 15Z"fill="#ea4335"class="svgShape colordc72a9"></path><path d="M47.5 350.86a7.51 7.51 0 0 1-5.3-12.81l35.35-35.35a7.51 7.51 0 0 1 5.31-2.2 7.5 7.5 0 0 1 5.3 2.2l35.35 35.35a7.5 7.5 0 1 1-10.6 10.61l-30-30.05-30.11 30.05a7.48 7.48 0 0 1-5.3 2.2Z"fill="#e3958e"class="svgShape colore38eba"></path><path d="M422 400.35A33.39 33.39 0 0 0 388.65 367h-28.3a18.35 18.35 0 1 1 0-36.69h46.15a7.5 7.5 0 0 0 0-15H394V297a7.5 7.5 0 0 0-15 0v18.35h-9V297a7.5 7.5 0 0 0-15 0v18.78a33.35 33.35 0 0 0 5.35 66.22h28.3a18.35 18.35 0 1 1 0 36.69H342.5a7.5 7.5 0 0 0 0 15H355V452a7.5 7.5 0 0 0 15 0v-18.31h9V452a7.5 7.5 0 0 0 15 0v-18.74a33.41 33.41 0 0 0 28-32.91Z"fill="#f5f7fa"class="svgShape colorfaf7f5"></path></svg></div><div class="intro-feature-info"><h4 class="title">MyMI Exchange</h4><p>Trade MyMI Gold and other digital assets securely with our MyMI Exchange. Buy, sell, and manage your trades in one place to diversify your portfolio and enhance your financial growth.</p></div></a></div></div></div></div></div></div><section class="text-white bg-primary full-width py-5"><div class="container container-xl"><div class="row justify-content-center text-center mb-5"><div class="col-lg-8"data-aos="fade-up"><h2 class="mb-3 fw-bold display-5">Join Our Growing Platform</h2><p class="lead">Thousands are already on the path to financial freedom. Join them today.</p></div></div><div class="row text-center g-4"><div class="col-md-3 col-6"data-aos="fade-up"data-aos-delay="100"><div class="stat-card"><div class="fw-bold display-4"data-bs-target="115"data-counter="true">115</div><p>Active Users</p></div></div><div class="col-md-3 col-6"data-aos="fade-up"data-aos-delay="200"><div class="stat-card"><div class="fw-bold display-4"data-bs-target="206"data-counter="true">206</div><p>Wallets Created</p></div></div><div class="col-md-3 col-6"data-aos="fade-up"data-aos-delay="300"><div class="stat-card"><div class="fw-bold display-4"data-bs-target="139"data-counter="true">139</div><p>Trades Tracked</p></div></div><div class="col-md-3 col-6"data-aos="fade-up"data-aos-delay="400"><div class="stat-card"><div class="fw-bold display-4"data-bs-target="0"data-counter="true">0</div><p>Active Partners</p></div></div></div></div></section><div class="bg-white intro-feature intro-section"><div class="container-fluid"><div class="row justify-content-center"><div class="col-xl-12 col-lg-12"><div class="text-center intro-section-title"><span class="overline-title">Join Our Community</span><h2 class="title intro-heading-lead">MyMI's Communities for Investors</h2><div class="intro-section-desc"><p>Explore the vibrant MyMI Wallet communities across various social channels.<br>Each platform offers unique insights, resources, and interactions to help you make the most of your financial journey.</p></div></div></div></div><div class="row justify-content-center"><div class="col-lg-8"><div class="row justify-content-center intro-feature-list"><div class="col-sm-12"><div class="row"><div class="mb-3 col-12 col-lg-4"><div class="social-platform"><div class="row"><div class="col"><svg viewBox="0 0 16 16"xmlns="http://www.w3.org/2000/svg"class="bi ad-font-lg bi-discord"fill="currentColor"height="3rem"width="3rem"><path d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z"/></svg></div></div><div class="row"><div class="col"><h3>Discord</h3><p>Connect with a thriving community of like-minded investors and financial enthusiasts. Engage in real-time discussions, join dedicated channels for financial tips, and get direct support.</p></div></div><div class="row mt-3"><div class="col"><a href="https://discord.gg/UUMexvA"class="btn btn-primary btn-md social-link text-white"target="_blank">Join Our Discord</a></div></div></div></div><div class="mb-3 col-12 col-lg-4"><div class="social-platform"><div class="row"><div class="col"><svg viewBox="0 0 16 16"xmlns="http://www.w3.org/2000/svg"class="bi bi-facebook"fill="currentColor"height="3rem"width="3rem"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg></div></div><div class="row"><div class="col"><h3>Facebook Page</h3><p>Stay up-to-date with the latest MyMI Wallet news and feature updates. Follow our official announcements, market trends, and promotional events.</p></div></div><div class="row mt-3"><div class="col"><a href="https://www.facebook.com/MyMIWalletNews"class="btn btn-primary btn-md social-link text-white"target="_blank">Like Our Facebook Page</a></div></div></div></div><div class="mb-3 col-12 col-lg-4"><div class="social-platform"><div class="row"><div class="col"><svg viewBox="0 0 16 16"xmlns="http://www.w3.org/2000/svg"class="bi bi-facebook"fill="currentColor"height="3rem"width="3rem"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg></div></div><div class="row"><div class="col"><h3>Investors Talk FB Group</h3><p>Meet and exchange ideas with other investors in our exclusive Facebook Group. Perfect for discussions around personal finance and investment strategies.</p></div></div><div class="row mt-3"><div class="col"><a href="https://www.facebook.com/InvestorsTalk"class="btn btn-primary btn-md social-link text-white"target="_blank">Join The Investors Talk FB Group</a></div></div></div></div><div class="mb-3 col-12 col-lg-4"><div class="social-platform"><div class="row"><div class="col"><svg viewBox="0 0 16 16"xmlns="http://www.w3.org/2000/svg"class="bi bi-linkedin"fill="currentColor"height="3rem"width="3rem"><path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/></svg></div></div><div class="row"><div class="col"><h3>LinkedIn</h3><p>Gain professional insights into fintech and investment management with MyMI Wallet on LinkedIn. Connect with industry leaders and explore in-depth articles and updates.</p></div></div><div class="row mt-3"><div class="col"><a href="https://www.linkedin.com/MyMIWallet"class="btn btn-primary btn-md social-link text-white"target="_blank">Connect On LinkedIn</a></div></div></div></div><div class="mb-3 col-12 col-lg-4"><div class="social-platform"><div class="row"><div class="col"><svg viewBox="0 0 16 16"xmlns="http://www.w3.org/2000/svg"class="bi bi-tiktok"fill="currentColor"height="3rem"width="3rem"><path d="M9.117 0h1.631a.253.253 0 01.251.25v.647c0 .668.276 1.303.765 1.766a2.572 2.572 0 001.728.71c.14 0 .248.112.248.25v1.317a.253.253 0 01-.267.249 5.797 5.797 0 01-3.114-.815v5.592a3.454 3.454 0 11-2.505-3.33v1.537a1.917 1.917 0 101.185 1.77V0zM8.36 3.958a5.773 5.773 0 01-1.147-.553v6.837a1.92 1.92 0 00-1.35-2.167V7.34a3.451 3.451 0 012.497 3.323V3.958z"/></svg></div></div><div class="row"><div class="col"><h3>TikTok</h3><p>Discover bite-sized finance tips, investment insights, and platform features on TikTok. Ideal for anyone looking to learn finance in a fun and accessible way!</p></div></div><div class="row mt-3"><div class="col"><a href="https://www.tiktok.com/@MyMIWallet"class="btn btn-primary btn-md social-link text-white"target="_blank">Follow On TikTok</a></div></div></div></div><div class="mb-3 col-12 col-lg-4"><div class="social-platform"><div class="row"><div class="col"><div style="height:48px;display:flex;align-items:center;justify-content:center"><img src="https://www.mymiwallet.com/assets/images/Company-Logos/TradingView-white-short-logo.png"class="bi bi-facebook"style="height:100%;object-fit:cover"></div></div></div><div class="row"><div class="col"><h3>TradingView</h3><p>Follow us on TradingView to access technical analysis and trading insights. Perfect for new and seasoned investors looking to deepen market knowledge.</p></div></div><div class="row mt-3"><div class="col"><a href="https://www.tradingview.com/u/MyMIWallet/"class="btn btn-primary btn-md social-link text-white"target="_blank">Follow On TradingView</a></div></div></div></div><div class="mb-3 col-12 col-lg-4"><div class="social-platform"><div class="row"><div class="col"><svg viewBox="0 0 16 16"xmlns="http://www.w3.org/2000/svg"class="bi bi-twitter"fill="currentColor"height="3rem"width="3rem"><path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/></svg></div></div><div class="row"><div class="col"><h3>Twitter</h3><p>Get real-time updates, market insights, and quick tips on Twitter. Join us for timely, relevant information as it unfolds.</p></div></div><div class="row mt-3"><div class="col"><a href="https://www.twitter.com/MyMIWalletNews"class="btn btn-primary btn-md social-link text-white"target="_blank">Follow On Twitter</a></div></div></div></div><div class="mb-3 col-12 col-lg-4"><div class="social-platform"><div class="row"><div class="col"><svg viewBox="0 0 16 16"xmlns="http://www.w3.org/2000/svg"class="bi bi-youtube"fill="currentColor"height="3rem"width="3rem"><path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/></svg></div></div><div class="row"><div class="col"><h3>YouTube</h3><p>Watch tutorials, expert interviews, and investment guides on YouTube. Our videos cover everything from platform tutorials to advanced financial strategies.</p></div></div><div class="row mt-3"><div class="col"><a href="https://www.youtube.com/@MyMIWallet"class="btn btn-primary btn-md social-link text-white"target="_blank">Subscribe On YouTube</a></div></div></div></div></div></div></div></div></div></div></div></div></div></div><div class="intro-section intro-footer mt-auto text-start"><div class="container container-ld"><div class="row justify-content-center"><div class="col-md-12"><ul class="text-center intro-menu"><li><a href="https://brandfetch.com/mymiwallet.com"class="link-to"></a></li></ul></div></div><div class="row justify-content-center"><div class="col-md-12"><ul class="text-center intro-menu"><li><a href="https://www.mymiwallet.com/index.php/#features"class="link-to">Features</a></li><li><a href="https://www.mymiwallet.com/index.php/Knowledgebase"target="_blank">Doc</a></li><li><a href="https://www.mymiwallet.com/index.php/Privacy-Policy"target="_blank">Privacy Policy</a></li><li><a href="https://www.mymiwallet.com/index.php/Terms-Of-Service"target="_blank">Terms of Service</a></li><li><a href="https://www.mymiwallet.com/index.php/Support"target="_blank">Need Help?</a></li></ul></div><div class="mt-3 col-md-12"><div class="text-center intro-copyright"><p>©2025, MyMI Wallet. Operated By My Millennial Investments, LLC.<br>Developed &Powered by <a href="https://timothyburks.com"target="_blank">Timothy Burks Incorporated</a></p></div></div></div></div></div><script nonce="jtnYVszAdCZ5PTPm69Z4bA==">!function(r){var o=r(window),s=(r("body"),r(".intro-navbar")),n="navbar-fixed";r(".link-to").on("click",function(){var o=r(this).attr("href"),n=r(o);if(n.length)return r("html, body").scrollTop(n.offset().top-s.innerHeight()),!1}),o.on("scroll",function(){0<o.scrollTop()?s.hasClass(n)||s.addClass(n):s.hasClass(n)&&s.removeClass(n)})}(jQuery)</script><script nonce="jtnYVszAdCZ5PTPm69Z4bA==">function toggleMenu(){for(var e=document.getElementsByClassName("menu-item"),t=0;t<e.length;t++){e[t].classList.toggle("hidden")}}</script><script nonce="jtnYVszAdCZ5PTPm69Z4bA==">window.onload=function(){$("#navbarSupportedContent").hide()}</script><script src="https://www.googletagmanager.com/gtag/js?id=UA-168714029-1"async></script><script nonce="jtnYVszAdCZ5PTPm69Z4bA==">function gtag(){dataLayer.push(arguments)}window.dataLayer=window.dataLayer||[],gtag("js",new Date),gtag("config","UA-168714029-1")</script><script nonce="jtnYVszAdCZ5PTPm69Z4bA==">!function(e,t,n,c,o,a,f){e.fbq||(o=e.fbq=function(){o.callMethod?o.callMethod.apply(o,arguments):o.queue.push(arguments)},e._fbq||(e._fbq=o),(o.push=o).loaded=!0,o.version="2.0",o.queue=[],(a=t.createElement(n)).async=!0,a.src="https://connect.facebook.net/en_US/fbevents.js",(f=t.getElementsByTagName(n)[0]).parentNode.insertBefore(a,f))}(window,document,"script"),window.__mymiMetaPixelInitialized||(fbq("init","1066980131308331"),window.__mymiMetaPixelInitialized=!0),fbq("track","PageView")</script><noscript><img src="https://www.facebook.com/tr?id=1066980131308331&ev=PageView&noscript=1"class="d-none"height="1"width="1"></noscript></div></div></div></body>
app/Views/themes/public/previewAlert.orig.php:35:// Canonical strings for TradingView widgets:
app/Views/themes/public/previewAlert.orig.php:70:<!-- ✅ TradingView core library (needed for new TradingView.widget) -->
app/Views/themes/public/previewAlert.orig.php:73:<!-- TradingView Widget BEGIN: Tickers strip -->
app/Views/themes/public/previewAlert.orig.php:90:<!-- TradingView Widget END -->
app/Views/themes/public/previewAlert.orig.php:102:            <!-- TradingView Widget BEGIN: Technical Analysis -->
app/Views/themes/public/previewAlert.orig.php:108:                        <span class="blue-text">Track <?= esc($ticker) ?> markets on TradingView</span>
app/Views/themes/public/previewAlert.orig.php:125:            <!-- TradingView Widget END -->
app/Views/themes/public/previewAlert.orig.php:130:                <!-- ❌ Removed inline `new TradingView.widget(...)` here (we init safely at the bottom) -->
app/Views/themes/public/previewAlert.orig.php:144:                        <span class="blue-text">Track all markets on TradingView</span>
app/Views/themes/public/previewAlert.orig.php:165:                        <span class="blue-text">Track all markets on TradingView</span>
app/Views/themes/public/previewAlert.orig.php:189:            <!-- TradingView Timeline (shows first; may be empty for some symbols) -->
app/Views/themes/public/previewAlert.orig.php:486:    // ✅ Safely init TradingView widget (tv.js may load after DOM)
app/Views/themes/public/previewAlert.orig.php:488:        if (!window.TradingView) return setTimeout(initTVWidget, 50);
app/Views/themes/public/previewAlert.orig.php:494:            new TradingView.widget({
app/Views/themes/public/previewAlert.orig.php:504:            console.error("Failed to init TradingView widget:", e);
app/Views/themes/public/home.php:73:    'TradingView' => [
app/Views/themes/public/home.php:74:        'button' => 'Follow On TradingView',
app/Views/themes/public/home.php:76:        'description' => 'Follow us on TradingView to access technical analysis and trading insights. Perfect for new and seasoned investors looking to deepen market knowledge.',
app/Views/themes/public/home.php:78:                <img src="' . base_url('assets/images/Company-Logos/TradingView-white-short-logo.png') . '" class="bi bi-facebook" style="height: 100%; object-fit: cover;"/>
app/Views/themes/public/previewAlert.php:78:// Build TradingView symbols list from recent alerts
app/Views/themes/public/previewAlert.php:403:                            target="_blank" rel="noopener">TradingView Chart</a>
app/Views/themes/public/previewAlert.php:528:                        <span class="blue-text">Track <?= esc($ticker) ?> markets on TradingView</span>
app/Views/themes/public/previewAlert.php:560:         SYMBOL PROFILE + FINANCIALS (TradingView)
app/Views/themes/public/previewAlert.php:570:                        <span class="blue-text">Track all markets on TradingView</span>
app/Views/themes/public/previewAlert.php:596:                        <span class="blue-text">Track all markets on TradingView</span>
app/Views/themes/public/previewAlert.php:721:         LATEST NEWS (TradingView + MarketAux fallback)
app/Views/themes/public/previewAlert.php:1100:    // ✅ Safely init TradingView widget (tv.js may load after DOM)
app/Views/themes/public/previewAlert.php:1102:        if (!window.TradingView) return setTimeout(initTVWidget, 50);
app/Views/themes/public/previewAlert.php:1108:            new TradingView.widget({
app/Views/themes/public/previewAlert.php:1118:            console.error("Failed to init TradingView widget:", e);
app/Modules/APIs/Controllers/Webhooks/TradingViewAPIController.php:2:// PATCH: inbound TradingView webhook endpoint
app/Modules/APIs/Controllers/Webhooks/TradingViewAPIController.php:9:class TradingViewAPIController extends BaseAPIController
app/Modules/APIs/Controllers/ChatAPIController.php:201:        if ($db->tableExists('bf_investment_trade_alerts')) {
app/Modules/APIs/Controllers/ChatAPIController.php:202:            $alerts = $db->table('bf_investment_trade_alerts')
app/Modules/APIs/Controllers/MarketingAPIController.php:942:                    $this->marketingModel->markTempScraperProcessed($recordId);
app/Modules/APIs/Controllers/MarketingAPIController.php:1860:                $this->marketingModel->markTempScraperProcessed($id);
app/Modules/APIs/Controllers/MarketingAPIController.php:1886:                        $this->marketingModel->markTempScraperProcessed($recordId);
app/Modules/APIs/Controllers/MarketingAPIController.php:2076:                        $this->marketingModel->markTempScraperProcessed($record['id']);
```

## Required GTM Tables

```text
bf_investment_scraper
bf_investment_trade_alerts
bf_investment_tickers
bf_investment_alert_history
```

## GTM Priority

```text
P1: Alert pipeline stability
P2: Alert dashboard visibility
P3: Discord/email distribution
P4: TBI Marketing promotional CTA
P5: News enrichment
P6: Daily digest
```

## AIOps SQL Check

```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-08 15:57:02 UTC+00:00

[Error]
Call to undefined method App\Commands\AIOps\SqlCheck::opt()
at APPPATH/Commands/AIOps/SqlCheck.php:27

Backtrace:
  1    SYSTEMPATH/CLI/Commands.php:74
       App\Commands\AIOps\SqlCheck()->run([])

  2    SYSTEMPATH/CLI/Console.php:47
       CodeIgniter\CLI\Commands()->run('aiops:sql:check', [])

  3    SYSTEMPATH/Boot.php:442
       CodeIgniter\CLI\Console()->run()

  4    SYSTEMPATH/Boot.php:166
       CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))

  5    ROOTPATH/spark:107
       CodeIgniter\Boot::bootSpark(Object(Config\Paths))

```
