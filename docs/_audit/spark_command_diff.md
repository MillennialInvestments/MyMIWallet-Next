# Spark Command Diff (MyMIWallet-Next vs MyGigHop)

## Source Availability
- `MyGigHop/app/Commands` was not present in this workspace.
- Classification below uses only current repository commands as migration candidates.

| Command | Classification | Reason |
|---|---|---|
| `aiops:alerts-check` | **REMOVE** | Finance/trading oriented naming pattern. |
| `aiops:alerts-clean` | **REMOVE** | Finance/trading oriented naming pattern. |
| `aiops:alerts-health` | **REMOVE** | Finance/trading oriented naming pattern. |
| `aiops:alerts-worker` | **REMOVE** | Finance/trading oriented naming pattern. |
| `aiops:api:schema` | **KEEP** | Platform/system operational command. |
| `aiops:audit` | **KEEP** | Platform/system operational command. |
| `aiops:auto:run` | **KEEP** | Platform/system operational command. |
| `aiops:backlog` | **KEEP** | Platform/system operational command. |
| `aiops:build-command` | **KEEP** | Platform/system operational command. |
| `aiops:chat-gov-index` | **KEEP** | Platform/system operational command. |
| `aiops:command-index` | **KEEP** | Platform/system operational command. |
| `aiops:continue` | **KEEP** | Platform/system operational command. |
| `aiops:copilot:validate` | **KEEP** | Platform/system operational command. |
| `aiops:csp:audit` | **KEEP** | Platform/system operational command. |
| `aiops:db:slow_scan` | **KEEP** | Platform/system operational command. |
| `aiops:dedupe:report` | **KEEP** | Platform/system operational command. |
| `aiops:deps:add` | **KEEP** | Platform/system operational command. |
| `aiops:diff:format` | **KEEP** | Platform/system operational command. |
| `aiops:docs-sync` | **KEEP** | Platform/system operational command. |
| `aiops:doctor` | **KEEP** | Platform/system operational command. |
| `aiops:email-scan` | **KEEP** | Platform/system operational command. |
| `aiops:form:test` | **KEEP** | Platform/system operational command. |
| `aiops:gate:cost` | **KEEP** | Platform/system operational command. |
| `aiops:governance:analyze` | **KEEP** | Platform/system operational command. |
| `aiops:graph:run` | **KEEP** | Platform/system operational command. |
| `aiops:health:full` | **KEEP** | Platform/system operational command. |
| `aiops:ingest` | **KEEP** | Platform/system operational command. |
| `aiops:init` | **KEEP** | Platform/system operational command. |
| `aiops:manual:index` | **KEEP** | Platform/system operational command. |
| `aiops:manual:run` | **KEEP** | Platform/system operational command. |
| `aiops:n8n:logs` | **KEEP** | Platform/system operational command. |
| `aiops:n8n:restart` | **KEEP** | Platform/system operational command. |
| `aiops:n8n:start` | **KEEP** | Platform/system operational command. |
| `aiops:n8n:stop` | **KEEP** | Platform/system operational command. |
| `aiops:observe` | **KEEP** | Platform/system operational command. |
| `aiops:observe:cost` | **KEEP** | Platform/system operational command. |
| `aiops:observe:hash` | **KEEP** | Platform/system operational command. |
| `aiops:observe:map` | **KEEP** | Platform/system operational command. |
| `aiops:observe:patch` | **KEEP** | Platform/system operational command. |
| `aiops:observe:regression` | **KEEP** | Platform/system operational command. |
| `aiops:observe:scan` | **KEEP** | Platform/system operational command. |
| `aiops:observe:snapshot` | **KEEP** | Platform/system operational command. |
| `aiops:observe:suggest` | **KEEP** | Platform/system operational command. |
| `aiops:patch:apply` | **KEEP** | Platform/system operational command. |
| `aiops:patch:dry_run` | **KEEP** | Platform/system operational command. |
| `aiops:patch:hallucination` | **KEEP** | Platform/system operational command. |
| `aiops:patch:risk_score` | **KEEP** | Platform/system operational command. |
| `aiops:patch:validate` | **KEEP** | Platform/system operational command. |
| `aiops:pr:auto` | **KEEP** | Platform/system operational command. |
| `aiops:pr:create` | **KEEP** | Platform/system operational command. |
| `aiops:priority:build` | **KEEP** | Platform/system operational command. |
| `aiops:public-pages:audit` | **KEEP** | Platform/system operational command. |
| `aiops:public-pages:import` | **KEEP** | Platform/system operational command. |
| `aiops:public-pages:report` | **KEEP** | Platform/system operational command. |
| `aiops:public-pages:run` | **KEEP** | Platform/system operational command. |
| `aiops:redis:stats` | **KEEP** | Platform/system operational command. |
| `aiops:repair` | **KEEP** | Platform/system operational command. |
| `aiops:repair:run` | **KEEP** | Platform/system operational command. |
| `aiops:repair:run_safe` | **KEEP** | Platform/system operational command. |
| `aiops:rollback` | **KEEP** | Platform/system operational command. |
| `aiops:routes:compare` | **KEEP** | Platform/system operational command. |
| `aiops:routes:gate` | **KEEP** | Platform/system operational command. |
| `aiops:routes:regress` | **KEEP** | Platform/system operational command. |
| `aiops:routes:scan` | **KEEP** | Platform/system operational command. |
| `aiops:routes:scan_auth` | **KEEP** | Platform/system operational command. |
| `aiops:run` | **KEEP** | Platform/system operational command. |
| `aiops:scan:cells` | **KEEP** | Platform/system operational command. |
| `aiops:scan:integrity` | **KEEP** | Platform/system operational command. |
| `aiops:seed` | **KEEP** | Platform/system operational command. |
| `aiops:self-heal` | **KEEP** | Platform/system operational command. |
| `aiops:sql:check` | **KEEP** | Platform/system operational command. |
| `aiops:status` | **KEEP** | Platform/system operational command. |
| `aiops:sync-perf` | **KEEP** | Platform/system operational command. |
| `aiops:unlock` | **KEEP** | Platform/system operational command. |
| `aiops:watch` | **KEEP** | Platform/system operational command. |
| `aiops:worker` | **KEEP** | Platform/system operational command. |
| `aiops:worker:logs` | **KEEP** | Platform/system operational command. |
| `alerts:audit` | **REMOVE** | Finance/trading oriented naming pattern. |
| `alerts:forecast` | **REMOVE** | Finance/trading oriented naming pattern. |
| `alerts:ingest` | **REMOVE** | Finance/trading oriented naming pattern. |
| `alerts:parse-test` | **REMOVE** | Finance/trading oriented naming pattern. |
| `api:audit` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `api:filters-check` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `api:list` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `api:permissions` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `api:rate-limit-check` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `api:versioning-check` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `app:api:audit` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `app:api:list` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `app:compat-audit` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `app:controller:audit` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `app:errors:dispatch` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `app:errors:learn` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `app:gate:coverage` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `app:healthcheck` | **KEEP** | Platform/system operational command. |
| `app:logs:check-server` | **KEEP** | Platform/system operational command. |
| `app:logs:consolidate` | **KEEP** | Platform/system operational command. |
| `app:logs:enable-full` | **KEEP** | Platform/system operational command. |
| `app:test` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `app:update` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `audit:all` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `audit:node` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `audit:psr4` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `auth:audit` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `auth:flow-smoke` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `auth:funnel-check` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `auth:smoke` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `auth:smoke-test` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `cache:audit` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `chat:audit` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `chat:logs` | **KEEP** | Platform/system operational command. |
| `chat:repair` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `chat:restart` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `chat:start` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `chat:status` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `chat:stop` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `chat:unlock` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `codex:audit` | **KEEP** | Platform/system operational command. |
| `codex:continue` | **KEEP** | Platform/system operational command. |
| `codex:gate` | **KEEP** | Platform/system operational command. |
| `codex:gate:severity` | **KEEP** | Platform/system operational command. |
| `codex:index` | **KEEP** | Platform/system operational command. |
| `codex:instruct:audit` | **KEEP** | Platform/system operational command. |
| `codex:instruct:devops_review` | **KEEP** | Platform/system operational command. |
| `codex:instruct:summarize` | **KEEP** | Platform/system operational command. |
| `codex:review` | **KEEP** | Platform/system operational command. |
| `codex:review:commit` | **KEEP** | Platform/system operational command. |
| `codex:review:list` | **KEEP** | Platform/system operational command. |
| `codex:review:pr-outbox` | **KEEP** | Platform/system operational command. |
| `codex:review:publish` | **KEEP** | Platform/system operational command. |
| `codex:status` | **KEEP** | Platform/system operational command. |
| `config:clear` | **KEEP** | Platform/system operational command. |
| `config:drift` | **KEEP** | Platform/system operational command. |
| `config:lint` | **KEEP** | Platform/system operational command. |
| `content:ingest-sample` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `contentengine:smoke` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `controller:profile` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `db:apply-docs` | **KEEP** | Platform/system operational command. |
| `db:drift` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `db:inventory` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `discord:list` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `discord:process-queue` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `discord:test` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `discord:test-liquidity` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `discord:wire-check` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `docs:architecture-map` | **KEEP** | Platform/system operational command. |
| `docs:architecture:graph` | **KEEP** | Platform/system operational command. |
| `docs:audit` | **KEEP** | Platform/system operational command. |
| `docs:build-how-it-works-nav` | **KEEP** | Platform/system operational command. |
| `docs:controllers:list` | **KEEP** | Platform/system operational command. |
| `docs:database:map` | **KEEP** | Platform/system operational command. |
| `docs:dependencies:map` | **KEEP** | Platform/system operational command. |
| `docs:full-audit` | **KEEP** | Platform/system operational command. |
| `docs:generate-architecture-map` | **KEEP** | Platform/system operational command. |
| `docs:generate-knowledge-graph` | **KEEP** | Platform/system operational command. |
| `docs:generate-missing` | **KEEP** | Platform/system operational command. |
| `docs:inventory` | **KEEP** | Platform/system operational command. |
| `docs:modules:map` | **KEEP** | Platform/system operational command. |
| `docs:readme:build` | **KEEP** | Platform/system operational command. |
| `docs:routes:inventory` | **KEEP** | Platform/system operational command. |
| `docs:scan-orphan-routes` | **KEEP** | Platform/system operational command. |
| `docs:scan-orphan-views` | **KEEP** | Platform/system operational command. |
| `docs:scan-undocumented-controllers` | **KEEP** | Platform/system operational command. |
| `docs:services:list` | **KEEP** | Platform/system operational command. |
| `docs:spark:inventory` | **KEEP** | Platform/system operational command. |
| `docs:sync-all` | **KEEP** | Platform/system operational command. |
| `docs:sync-code` | **KEEP** | Platform/system operational command. |
| `docs:sync-system` | **KEEP** | Platform/system operational command. |
| `docs:test` | **KEEP** | Platform/system operational command. |
| `docs:views:dirs` | **KEEP** | Platform/system operational command. |
| `docs:views:export` | **KEEP** | Platform/system operational command. |
| `docs:views:list` | **KEEP** | Platform/system operational command. |
| `dreamhost:dns-test` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `dreamhost:dns-verify` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `dreamhost:email-audit` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `dreamhost:email-list` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `dreamhost:env` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `dreamhost:imap-capabilities` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `dreamhost:imap-flag-sweep` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `dreamhost:imap-test` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `dreamhost:limits` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `dreamhost:port-test` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `dreamhost:smtp-probe` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `dreamhost:ssl-test` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `email:healthcheck` | **KEEP** | Platform/system operational command. |
| `email:queue-scan` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `email:test` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `env:doctor` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `fix:503` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `forecasts:evaluate` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `gap:sync` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `gighop:dispatch:optimize` | **KEEP** | Platform/system operational command. |
| `gighop:health` | **KEEP** | Platform/system operational command. |
| `gighop:zones:validate` | **KEEP** | Platform/system operational command. |
| `git:pull:safe` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `git:sync-safe` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `git:workspace:guard` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `git:workspace:repair` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `github:branch` | **KEEP** | Platform/system operational command. |
| `github:commit` | **KEEP** | Platform/system operational command. |
| `github:health` | **KEEP** | Platform/system operational command. |
| `github:pr:create` | **KEEP** | Platform/system operational command. |
| `github:pull` | **KEEP** | Platform/system operational command. |
| `github:push` | **KEEP** | Platform/system operational command. |
| `github:search` | **KEEP** | Platform/system operational command. |
| `github:status` | **KEEP** | Platform/system operational command. |
| `github:sync` | **KEEP** | Platform/system operational command. |
| `growth:retention-watch` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `gtm:cron:validate-security` | **REMOVE** | Finance/trading oriented naming pattern. |
| `gtm:health:snapshot` | **KEEP** | Platform/system operational command. |
| `gtm:launch:audit` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `gtm:launch:smoke` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `health:cache` | **KEEP** | Platform/system operational command. |
| `health:disk` | **KEEP** | Platform/system operational command. |
| `health:git-safety` | **KEEP** | Platform/system operational command. |
| `health:services` | **KEEP** | Platform/system operational command. |
| `infra:server-audit` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `investments:economy:updateall` | **REMOVE** | Finance/trading oriented naming pattern. |
| `keys:generate` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `keys:generate-ci4` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `logger:audit` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `logs:doctor` | **KEEP** | Platform/system operational command. |
| `logs:full-report` | **KEEP** | Platform/system operational command. |
| `logs:healthcheck` | **KEEP** | Platform/system operational command. |
| `logs:scan` | **KEEP** | Platform/system operational command. |
| `logs:summarize` | **KEEP** | Platform/system operational command. |
| `logs:summarize-all` | **KEEP** | Platform/system operational command. |
| `logs:test` | **KEEP** | Platform/system operational command. |
| `logs:watch` | **KEEP** | Platform/system operational command. |
| `mail:send` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `mail:send-test` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `mail:test` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `mail:verify` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `marketing:automation-audit` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `master:health:commands` | **KEEP** | Platform/system operational command. |
| `master:health:controllers` | **KEEP** | Platform/system operational command. |
| `master:health:dependencies` | **KEEP** | Platform/system operational command. |
| `master:health:docs` | **KEEP** | Platform/system operational command. |
| `master:health:logs` | **KEEP** | Platform/system operational command. |
| `master:health:models` | **KEEP** | Platform/system operational command. |
| `master:health:routes` | **KEEP** | Platform/system operational command. |
| `master:health:services` | **KEEP** | Platform/system operational command. |
| `master:health:views` | **KEEP** | Platform/system operational command. |
| `master:knowledge-graph:build` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `master:run-all` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `mdit:nav:compute_daily` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `migrate:dry-run` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `news:audit` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:bench` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:chat` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:circuit:reset` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:circuit:status` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:diagnose` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:docs:inventory` | **KEEP** | Platform/system operational command. |
| `ollama:docs:sync` | **KEEP** | Platform/system operational command. |
| `ollama:doctor` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:embed` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:embed:file` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:generate` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:health` | **KEEP** | Platform/system operational command. |
| `ollama:logs` | **KEEP** | Platform/system operational command. |
| `ollama:logs:export` | **KEEP** | Platform/system operational command. |
| `ollama:logs:tail` | **KEEP** | Platform/system operational command. |
| `ollama:modelfile:validate` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:models:create` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:models:diff` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:models:ensure` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:models:export` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:models:list` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:models:prune` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:models:pull` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:models:push` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:models:rm` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:models:show` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:ping` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:policy:check` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:policy:export` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:queue:push` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:queue:retry` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:queue:stats` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:queue:work` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:rag:query` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:sessions:list` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:sessions:rm` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:sessions:show` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:stream` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ollama:version` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ops:analyze-commands` | **KEEP** | Platform/system operational command. |
| `ops:app:update` | **KEEP** | Platform/system operational command. |
| `ops:ci:prepare` | **KEEP** | Platform/system operational command. |
| `ops:commands:audit` | **KEEP** | Platform/system operational command. |
| `ops:commands:autofix` | **KEEP** | Platform/system operational command. |
| `ops:commands:inventory` | **KEEP** | Platform/system operational command. |
| `ops:commands:lint` | **KEEP** | Platform/system operational command. |
| `ops:commands:missing` | **KEEP** | Platform/system operational command. |
| `ops:config:lint` | **KEEP** | Platform/system operational command. |
| `ops:console:build` | **KEEP** | Platform/system operational command. |
| `ops:diff` | **KEEP** | Platform/system operational command. |
| `ops:diff:wallet` | **KEEP** | Platform/system operational command. |
| `ops:doctor:full` | **KEEP** | Platform/system operational command. |
| `ops:drift:scan` | **KEEP** | Platform/system operational command. |
| `ops:env:snapshot` | **KEEP** | Platform/system operational command. |
| `ops:fetch-commands` | **KEEP** | Platform/system operational command. |
| `ops:filesystem-scan` | **KEEP** | Platform/system operational command. |
| `ops:filesystem:fix` | **KEEP** | Platform/system operational command. |
| `ops:filesystem:lint` | **KEEP** | Platform/system operational command. |
| `ops:grep` | **KEEP** | Platform/system operational command. |
| `ops:healthcheck` | **KEEP** | Platform/system operational command. |
| `ops:integrity:wallet` | **KEEP** | Platform/system operational command. |
| `ops:logger:test` | **KEEP** | Platform/system operational command. |
| `ops:model-limit:audit` | **KEEP** | Platform/system operational command. |
| `ops:network:matrix` | **KEEP** | Platform/system operational command. |
| `ops:next-steps` | **KEEP** | Platform/system operational command. |
| `ops:next-steps:sync` | **KEEP** | Platform/system operational command. |
| `ops:next-steps:sync-manual` | **KEEP** | Platform/system operational command. |
| `ops:nginx-status` | **KEEP** | Platform/system operational command. |
| `ops:php-fpm-health` | **KEEP** | Platform/system operational command. |
| `ops:php:extensions` | **KEEP** | Platform/system operational command. |
| `ops:propose-pr` | **KEEP** | Platform/system operational command. |
| `ops:report` | **KEEP** | Platform/system operational command. |
| `ops:self-heal` | **KEEP** | Platform/system operational command. |
| `ops:subs:audit` | **KEEP** | Platform/system operational command. |
| `ops:subs:doctor` | **KEEP** | Platform/system operational command. |
| `ops:subs:repair` | **KEEP** | Platform/system operational command. |
| `ops:subs:status` | **KEEP** | Platform/system operational command. |
| `ops:sync` | **KEEP** | Platform/system operational command. |
| `ops:tail` | **KEEP** | Platform/system operational command. |
| `ops:vps:snapshot` | **KEEP** | Platform/system operational command. |
| `ops:work` | **KEEP** | Platform/system operational command. |
| `optimize:safe` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `perf:k6` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `repo:class-scan` | **KEEP** | Platform/system operational command. |
| `repo:class-trace` | **KEEP** | Platform/system operational command. |
| `repo:diff-split` | **KEEP** | Platform/system operational command. |
| `repo:health` | **KEEP** | Platform/system operational command. |
| `research:alerts:cleanup` | **REMOVE** | Finance/trading oriented naming pattern. |
| `research:alerts:watchlist-import` | **REMOVE** | Finance/trading oriented naming pattern. |
| `research:data:compile` | **REMOVE** | Finance/trading oriented naming pattern. |
| `research:earnings:calendar` | **REMOVE** | Finance/trading oriented naming pattern. |
| `research:google:scan` | **REMOVE** | Finance/trading oriented naming pattern. |
| `research:intelligence:signals` | **REMOVE** | Finance/trading oriented naming pattern. |
| `research:knowledge:build` | **REMOVE** | Finance/trading oriented naming pattern. |
| `research:news:collect` | **REMOVE** | Finance/trading oriented naming pattern. |
| `research:pipeline:run` | **REMOVE** | Finance/trading oriented naming pattern. |
| `research:reports:daily` | **REMOVE** | Finance/trading oriented naming pattern. |
| `research:reports:weekly` | **REMOVE** | Finance/trading oriented naming pattern. |
| `research:short-interest:scan` | **REMOVE** | Finance/trading oriented naming pattern. |
| `revenue:cost-forecast` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `revenue:scan` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `route:benchmark` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `routes:auth-audit` | **KEEP** | Platform/system operational command. |
| `routes:debug` | **KEEP** | Platform/system operational command. |
| `routes:docs` | **KEEP** | Platform/system operational command. |
| `routes:reconcile` | **KEEP** | Platform/system operational command. |
| `routes:repair` | **KEEP** | Platform/system operational command. |
| `runtime:cache-boot` | **KEEP** | Platform/system operational command. |
| `runtime:check` | **KEEP** | Platform/system operational command. |
| `runtime:diagnose-502` | **KEEP** | Platform/system operational command. |
| `runtime:spark-doctor` | **KEEP** | Platform/system operational command. |
| `runtime:triage` | **KEEP** | Platform/system operational command. |
| `scanning:run` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `scraper:audit-emails` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `security:csp:audit` | **REMOVE** | Finance/trading oriented naming pattern. |
| `security:secrets-audit` | **REMOVE** | Finance/trading oriented naming pattern. |
| `spark-reset` | **KEEP** | Platform/system operational command. |
| `spark:commands:graph` | **KEEP** | Platform/system operational command. |
| `spark:diagnose-502` | **KEEP** | Platform/system operational command. |
| `spark:diagnose-503` | **KEEP** | Platform/system operational command. |
| `spark:doctor` | **KEEP** | Platform/system operational command. |
| `spark:fix` | **KEEP** | Platform/system operational command. |
| `spark:purge-fastcgi` | **KEEP** | Platform/system operational command. |
| `spark:registry-audit` | **KEEP** | Platform/system operational command. |
| `spark:restart-safe` | **KEEP** | Platform/system operational command. |
| `spark:traffic-spike-guard` | **KEEP** | Platform/system operational command. |
| `test:redis` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `ux:journey-audit` | **MIGRATE** | General purpose command; evaluate per product requirements. |
| `wallets:warm-summary-cache` | **MIGRATE** | General purpose command; evaluate per product requirements. |
