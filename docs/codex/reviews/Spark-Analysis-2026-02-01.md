login as: mymiteam
Keyboard-interactive authentication prompts from server:
| Password:
End of keyboard-interactive prompts from server
            __ /__ /__ / | |  | |
\ \ /_ \(_-< _ \ _ \ _ \__ _|__ _|
 \_/.__/___/___/___/___/  _|   _|
   _|
Welcome to vps33344.dreamhostps.com

Any malicious and/or unauthorized activity is strictly forbidden.
All activity may be logged by Dreamhost Web Hosting.

Last login: Fri Jan 30 18:48:27 2026 from 76.234.126.68
[vps33344]$ php spark aiops:run
Could not open input file: spark
[vps33344]$ cd mymiwallet/site/current
[vps33344]$ php spark aiops:run

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:25:51 UTC+00:0                                                                                                                                                             0

AI-Ops Spark Runner
--------------------
Worker: /home/mymiteam/mymiwallet/site/current/aiops/aiops_worker.php
Mode: manual
Dry run: NO

Executing worker...

AI-Ops worker complete. Wrote docs/_aiops outputs. Run=2026-02-01T18:25:51Z

AI-Ops worker completed successfully.
Outputs written to: docs/_aiops/

Nightly Summary Preview:
------------------------
# AI-Ops: Nightly Summary
> Auto-generated. Do not edit manually.
> Run: 2026-02-01T18:25:51Z

## Docs
- Changed docs: 375
- Total docs scanned: 922

## Gaps (heuristic)
- Undocumented code candidates: 1119
- Docs with no code match candidates: 873

## Stale Docs
- Docs older than 60 days: 111

## Suggestions
- See: `docs/_aiops/next-steps.md`

## Ops
- Spark results: `docs/_aiops/spark-results.md`
- CI summary: `docs/_aiops/ci-summary.md`

[Error]
Undefined constant CodeIgniter\CLI\CLI::SUCCESS
at APPPATH/Commands/AiOps/Run.php:91

[vps33344]$ php spark aiops:seed

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:26:05 UTC+00:00

AI Ops caps seeded successfully.
[vps33344]$ php spark php spark cache:info

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:29:12 UTC+00:00

Command "php" not found.

Did you mean this?
    phpini:check

[vps33344]$ php spark cache:info

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:29:21 UTC+00:00

+-----------------------+-----------------------------------------------+---------+---------------------+
| Name                  | Server Path                                   | Size    | Date                |
+-----------------------+-----------------------------------------------+---------+---------------------+
| FileLocatorCache      | ROOTPATH/writable/cache/FileLocatorCache      | 58.6 KB | 2026-02-01 18:10:42 |
| FactoriesCache_config | ROOTPATH/writable/cache/FactoriesCache_config | 35.1 KB | 2026-02-01 18:10:42 |
+-----------------------+-----------------------------------------------+---------+---------------------+

[vps33344]$ php spark migrate

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:29:33 UTC+00:00

Running all new migrations...
[CodeIgniter\Database\Exceptions\DatabaseException]
Duplicate column name 'output_text'
at SYSTEMPATH/Database/BaseConnection.php:684

  Caused by:
  [CodeIgniter\Database\Exceptions\DatabaseException]
  Duplicate column name 'output_text'
  at SYSTEMPATH/Database/MySQLi/Connection.php:332

  Caused by:
  [mysqli_sql_exception]
  Duplicate column name 'output_text'
  at SYSTEMPATH/Database/MySQLi/Connection.php:327

[vps33344]$ php spark migrate:status

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:29:45 UTC+00:00

+---------------+-------------------+---------------------------------------+---------+---------------------+-------+
| Namespace     | Version           | Filename                              | Group   | Migrated On         | Batch |
+---------------+-------------------+---------------------------------------+---------+---------------------+-------+
| App           | 2017-11-20-223112 | create_auth_tables                    | default | 2023-03-15 07:14:33 | 3     |
| App           | 2025-01-01-000100 | CreateTaxModuleTables                 | default | 2026-02-01 14:29:40 | 4     |
| App           | 2025-09-09-000010 | CreatePredictionsMarkets              | default | 2026-02-01 14:29:40 | 4     |
| App           | 2025-09-09-000020 | CreatePredictionsOptions              | default | 2026-02-01 14:29:40 | 4     |
| App           | 2025-09-09-000030 | CreatePredictionsOrders               | default | 2026-02-01 14:29:40 | 4     |
| App           | 2025-09-09-000040 | CreatePredictionsTrades               | default | 2026-02-01 14:29:40 | 4     |
| App           | 2025-09-09-000050 | CreatePredictionsPositions            | default | 2026-02-01 14:29:40 | 4     |
| App           | 2025-09-09-000060 | CreatePredictionsLiquidity            | default | 2026-02-01 14:29:40 | 4     |
| App           | 2025-09-09-000070 | CreatePredictionsSettlementsPayouts   | default | 2026-02-01 14:29:40 | 4     |
| App           | 2025-09-10-000020 | AddReferralFieldsToUsers              | default | 2026-02-01 18:04:01 | 5     |
| App           | 2025-12-23-000001 | CreateCommunityAndTemplateTables      | default | 2026-02-01 18:04:01 | 5     |
| App           | 2026-01-01-000001 | CreateAiOpsTables                     | default | 2026-02-01 18:04:01 | 5     |
| App           | 2026-01-15-000100 | AddChatAndAiOpsUsageTables            | default | 2026-02-01 18:04:01 | 5     |
| App           | 2026-01-15-000100 | CreateChatToolRuns                    | default | 2026-02-01 18:04:01 | 5     |
| App           | 2026-01-15-000100 | CreateOpsFoundation                   | default | 2026-02-01 18:04:02 | 5     |
| App           | 2026-01-17-000001 | CreateInvestmentSignalsTables         | default | 2026-02-01 18:04:02 | 5     |
| App           | 2026-01-21-000110 | AddOutputTextToOpsRuns                | ---     | ---                 | ---   |
| App           | 2026-02-01-000100 | CreateUserOnboardingTables            | ---     | ---                 | ---   |
| App           | 2026-02-15-000200 | AddBrokerExecutionFields              | ---     | ---                 | ---   |
| App           | 2026-02-15-000200 | CreateUserSetupPreferences            | ---     | ---                 | ---   |
| App           | 2026-02-20-000001 | AddStatusMetaExcerptColumns           | ---     | ---                 | ---   |
| App           | 2026-02-25-000001 | CreateAuthHealthRuns                  | ---     | ---                 | ---   |
| App           | 2026-03-01-000100 | CreateUserEvents                      | ---     | ---                 | ---   |
| App           | 2026-03-05-000100 | CreateEmailOutbox                     | ---     | ---                 | ---   |
| App           | 2026-03-10-000100 | CreateInvestmentForecastingTables     | ---     | ---                 | ---   |
| App           | 2026-03-10-000200 | CreateInvestmentForecastAccuracyTable | ---     | ---                 | ---   |
| App           | 2026-03-12-000100 | CreateInvestmentForecastAccuracy      | ---     | ---                 | ---   |
| App           | 2026-03-15-000100 | CreateAiOpsTaskPipelineTables         | ---     | ---                 | ---   |
| App           | 2026-04-01-000100 | CreateMditPhase1Tables                | ---     | ---                 | ---   |
| App           | 2026-04-01-000110 | CreateMditAuthRoles                   | ---     | ---                 | ---   |
| App           | 2026-04-15-000100 | CreateChatGovernanceTables            | ---     | ---                 | ---   |
| Myth\Auth     | 2017-11-20-223112 | create_auth_tables                    | default | 2023-03-15 07:03:47 | 2     |
| Tatter\Audits | 20190404090152    | create_table_audits                   | ---     | ---                 | ---   |
+---------------+-------------------+---------------------------------------+---------+---------------------+-------+

[vps33344]$ php spark discord:list

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:32:20 UTC+00:00

=== MyMI Discord Wiring Overview ===

-- Core Environment --
Timezone        : America/Chicago
Quiet Hours     : 22:00 - 06:30
Default Webhook : (none)
Bot Token       : MTQ0MzU3...Jik8Wc
Guild ID        : 726783076188815452
Use Bot Fallback: true
Store Msg IDs   : true
Alerts Strict   : false
Alerts Dry Run  : false

-- Configured channelWebhooks (Config\Discord) --
  alerts         : (empty)
  alerts.ai      : (empty)
  alerts.ema     : (empty)
  alerts.free    : (empty)
  alerts.liquidity : [configured]
  alerts.momentum : (empty)
  alerts.news    : (empty)
  alerts.tier1   : (empty)
  alerts.tier2   : (empty)
  alerts.tier3   : (empty)
  earnings       : (empty)
  marketing      : (empty)
  marketing.news : (empty)
  ops            : (empty)
  staging        : (empty)
  support        : (empty)

-- Configured channelIds (Config\Discord) --
  alerts     : (empty)
  alerts.ai  : (empty)
  alerts.ema : (empty)
  alerts.free : (empty)
  alerts.liquidity : 1443981138837110844
  alerts.momentum : (empty)
  alerts.news : (empty)
  alerts.tier1 : (empty)
  alerts.tier2 : (empty)
  alerts.tier3 : (empty)
  earnings   : (empty)
  marketing  : (empty)
  marketing.news : (empty)
  ops        : (empty)
  staging    : (empty)
  support    : (empty)

-- bf_discord_channels (database) --
  [alerts]
    alerts
      enabled       : yes
      webhook_url   : (none)
      channel_id    : (none)
      min_interval  : 60 sec

    alerts.ai
      enabled       : yes
      webhook_url   : (none)
      channel_id    : (none)
      min_interval  : 90 sec

    alerts.ema
      enabled       : yes
      webhook_url   : (none)
      channel_id    : (none)
      min_interval  : 90 sec

    alerts.free
      enabled       : yes
      webhook_url   : (none)
      channel_id    : (none)
      min_interval  : 60 sec

    alerts.liquidity
      enabled       : yes
      webhook_url   : (none)
      channel_id    : (none)
      min_interval  : 90 sec

    alerts.momentum
      enabled       : yes
      webhook_url   : (none)
      channel_id    : (none)
      min_interval  : 90 sec

    alerts.news
      enabled       : yes
      webhook_url   : (none)
      channel_id    : (none)
      min_interval  : 120 sec

    alerts.tier1
      enabled       : yes
      webhook_url   : (none)
      channel_id    : (none)
      min_interval  : 60 sec

    alerts.tier2
      enabled       : yes
      webhook_url   : (none)
      channel_id    : (none)
      min_interval  : 60 sec

    alerts.tier3
      enabled       : yes
      webhook_url   : (none)
      channel_id    : (none)
      min_interval  : 60 sec

  [earnings]
    earnings
      enabled       : yes
      webhook_url   : (none)
      channel_id    : (none)
      min_interval  : 180 sec

  [marketing]
    marketing
      enabled       : yes
      webhook_url   : (none)
      channel_id    : (none)
      min_interval  : 180 sec

    marketing.news
      enabled       : yes
      webhook_url   : (none)
      channel_id    : (none)
      min_interval  : 180 sec

  [ops]
    ops
      enabled       : yes
      webhook_url   : (none)
      channel_id    : (none)
      min_interval  : 180 sec

  [staging]
    staging
      enabled       : yes
      webhook_url   : (none)
      channel_id    : (none)
      min_interval  : 30 sec

  [support]
    support
      enabled       : yes
      webhook_url   : (none)
      channel_id    : (none)
      min_interval  : 180 sec


-- bf_discord_subscriptions (scanner/system) --
  scanner.ai_ultron    → alerts.ai          (template: scanner.ai_ultron.basic)
  scanner.ema_trend    → alerts.ema         (template: scanner.ema_trend.basic)
  scanner.generic      → alerts             (template: scanner.generic.basic)
  scanner.liquidity    → alerts.liquidity   (template: scanner.liquidity.basic)
  scanner.momentum     → alerts.momentum    (template: scanner.momentum.basic)
  scanner.news         → alerts.news        (template: scanner.news.basic)

[vps33344]$ php spark discord:wire-check

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:33:05 UTC+00:00

=== Discord Wire Check ===
-- Core env/config --
  DISCORD_BOT_TOKEN                   : ok
  DISCORD_GUILD_ID                    : ok
  DISCORD_TIMEZONE                    : ok
  DISCORD_MIN_SECONDS_BETWEEN_POSTS   : ok
  DISCORD_QUIET_HOURS_START           : ok
  DISCORD_QUIET_HOURS_END             : ok
-- Feature flags --
  DISCORD_USE_BOT_API_FALLBACK : true
  DISCORD_STORE_WEBHOOK_MSG_ID : true
  DISCORD_ALERTS_STRICT        : false
  DISCORD_ALERTS_DRY_RUN       : false

-- Table presence --
  bf_discord_channels          : ok
  bf_discord_templates         : ok
  bf_discord_subscriptions     : ok
  bf_discord_queue             : ok
  bf_discord_message_history   : missing
  bf_discord_policies          : ok
  bf_discord_events_log        : ok
  bf_discord_logs              : missing

-- Queue snapshot --
  queued count : 0
  dead count   : 0
  next scheduled : (none)
  next available : (none)

[vps33344]$ php spark forecasts:evaluate

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:33:18 UTC+00:00

Forecast accuracy evaluation starting...
[CodeIgniter\Database\Exceptions\DatabaseException]
Table 'mymiwallet.bf_investment_forecast_history' doesn't exist
at SYSTEMPATH/Database/BaseConnection.php:684

  Caused by:
  [CodeIgniter\Database\Exceptions\DatabaseException]
  Table 'mymiwallet.bf_investment_forecast_history' doesn't exist
  at SYSTEMPATH/Database/MySQLi/Connection.php:332

  Caused by:
  [mysqli_sql_exception]
  Table 'mymiwallet.bf_investment_forecast_history' doesn't exist
  at SYSTEMPATH/Database/MySQLi/Connection.php:327

[vps33344]$ php spark forecasts:refresh

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:33:27 UTC+00:00

This action is destructive. Re-run with --approve.
Forecast refresh starting...
[CodeIgniter\Database\Exceptions\DatabaseException]
Unknown column 'forecast_updated_at' in 'order clause'
at SYSTEMPATH/Database/BaseConnection.php:684

  Caused by:
  [CodeIgniter\Database\Exceptions\DatabaseException]
  Unknown column 'forecast_updated_at' in 'order clause'
  at SYSTEMPATH/Database/MySQLi/Connection.php:332

  Caused by:
  [mysqli_sql_exception]
  Unknown column 'forecast_updated_at' in 'order clause'
  at SYSTEMPATH/Database/MySQLi/Connection.php:327


[vps33344]$ php spark gap:sync

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:38:26 UTC+00:00

Gap sync completed: 25 rows processed. Report: /home/mymiteam/mymiwallet/site/current/docs/gap_tracker/reports/gap_sync_2026-02-01.md
[vps33344]$ php spark spark:fix

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:38:31 UTC+00:00

🔧 Running Spark fixer...
Could not open input file: tools/spark_fix.php
Spark fixer failed.
[vps33344]$ php spark aiops:chat-governance-index

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:38:38 UTC+00:00

Chat governance index complete.
Scanned: 0
Complete: 0
In progress: 0
Blocked: 0
CSV: /home/mymiteam/mymiwallet/site/current/docs/chatgpt/aiops/chat_step_tracker.csv
Metrics JSON: /home/mymiteam/mymiwallet/site/current/docs/chatgpt/aiops/chat_metrics.json
Database sync: success
[vps33344]$ php spark api:audit

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:38:44 UTC+00:00

FeatureTestTrait is unavailable; cannot run internal requests.

[vps33344]$ php spark alerts:parse-test

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:39:12 UTC+00:00

Usage: php spark alerts:parse-test /path/to/email.txt ["Subject line"]
[vps33344]$ php spark runtime:check

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:39:22 UTC+00:00

MyMI Wallet – Runtime Check

PHP Version: 8.2.29

❌ Forbidden FastCGI references detected:
 - php-cgi found in /home/mymiteam/nginx/conf/nginx.conf
 - php-fpm found in /home/mymiteam/nginx/conf/nginx.conf
 - php-pm found in /home/mymiteam/nginx/conf/nginx.conf
 - 9000/9071 found in /home/mymiteam/nginx/conf/nginx.conf
 - php82 found in /home/mymiteam/nginx/conf/nginx.conf
 - php82 found in /home/mymiteam/nginx/sites-enabled/mymiwallet.conf
 - php-cgi found in /home/mymiteam/nginx/logs/error.log
 - php-pm found in /home/mymiteam/nginx/logs/error.log
 - 9000/9071 found in /home/mymiteam/nginx/logs/error.log
 - 9000/9071 found in /home/mymiteam/nginx/logs/mymiwallet.com.error.log

Runtime check FAILED.


[vps33344]$ php spark audit:node

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:40:01 UTC+00:00

FAIL: Hygiene violations detected.

Tracked node_modules directories:
- assets/js/BitcoinJS-lib/node_modules
- assets/js/Sophtron/node_modules
- assets/js/Sophtron_Old/node_modules

Remediation:
git rm -r --cached assets/js/BitcoinJS-lib/node_modules
git rm -r --cached assets/js/Sophtron/node_modules
git rm -r --cached assets/js/Sophtron_Old/node_modules

Tracked native build artifacts:
- assets/js/BitcoinJS-lib/node_modules/tiny-secp256k1/build/Release/obj.target/secp256k1/native/addon.o
- assets/js/BitcoinJS-lib/node_modules/tiny-secp256k1/build/Release/obj.target/secp256k1/native/secp256k1/src/secp256k1.o
- assets/js/BitcoinJS-lib/node_modules/tiny-secp256k1/build/Release/secp256k1.node

Remediation:
git rm --cached assets/js/BitcoinJS-lib/node_modules/tiny-secp256k1/build/Release/obj.target/secp256k1/native/addon.o
git rm --cached assets/js/BitcoinJS-lib/node_modules/tiny-secp256k1/build/Release/obj.target/secp256k1/native/secp256k1/src/secp256k1.o
git rm --cached assets/js/BitcoinJS-lib/node_modules/tiny-secp256k1/build/Release/secp256k1.node

[vps33344]$ php spark config:drift

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:40:56 UTC+00:00

Config drift artifacts written.
Docs: /home/mymiteam/mymiwallet/site/current/docs/aiops/artifacts/config-drift/20260201-184056
Raw: /home/mymiteam/mymiwallet/site/current/writable/aiops/artifacts/config-drift/20260201-184056
[vps33344]$ php spark growth:retention-watch

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:41:02 UTC+00:00

Retention watch artifacts written.
Docs: /home/mymiteam/mymiwallet/site/current/docs/aiops/artifacts/growth-retention-watch/20260201-184102
Raw: /home/mymiteam/mymiwallet/site/current/writable/aiops/artifacts/growth-retention-watch/20260201-184102
[vps33344]$ php spark revenue:cost-forecast

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:41:09 UTC+00:00

Cost forecast artifacts written.
Docs: /home/mymiteam/mymiwallet/site/current/docs/aiops/artifacts/revenue-cost-forecast/20260201-184109
Raw: /home/mymiteam/mymiwallet/site/current/writable/aiops/artifacts/revenue-cost-forecast/20260201-184109
[vps33344]$ php spark scraper:audit-emails

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:41:19 UTC+00:00

Email Scraper Audit Summary
Total scanned: 25
Trade emails: 0
News emails: 25
Passed: 0
Failed: 25
Fallbacks applied: 25

Failure breakdown:
- PARSE_FAILED: 25
- FALLBACK_APPLIED: 50

Report written to: /home/mymiteam/mymiwallet/site/current/writable/triage/email-scraper-audit-2026-02-01_184120.json

[vps33344]$ php spark ux:journey-audit

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:42:00 UTC+00:00

UX journey audit artifacts written.
Docs: /home/mymiteam/mymiwallet/site/current/docs/aiops/artifacts/ux-journey-audit/20260201-184200
Raw: /home/mymiteam/mymiwallet/site/current/writable/aiops/artifacts/ux-journey-audit/20260201-184200

[vps33344]$ php spark config:llint

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:42:28 UTC+00:00

Command "config:llint" not found.

Did you mean one of these?
    config:drift
    config:lint

[vps33344]$ php spark config:lint

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:42:31 UTC+00:00

[OK] Services::cache
[OK] Services::responsecache
[OK] Services::session
[OK] Services::email
[OK] Services::logger
[OK] Services::validation
[OK] Services::renderer

[vps33344]$ php spark content:ingest-sample

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:42:52 UTC+00:00

Ingest #1 processed. Top ideas:
- TSLA | score 64.76 | tier tier2
- AAPL | score 61.29 | tier tier2
- GME | score 32.31 | tier avoid
[vps33344]$ php spark contentengine:smoke

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:43:01 UTC+00:00

Loading sample from /home/mymiteam/mymiwallet/site/current/writable/samples/daily_gainers.json
Ingest #1 saved with 3 rows.
Tier counts: {"tier1":0,"tier2":2,"tier3":0,"avoid":1}
Top 5 picks:
- TSLA | score 64.76 | tier tier2
- AAPL | score 61.29 | tier tier2
- GME | score 32.31 | tier avoid
Draft counts by platform: {"tradingview":2,"stocktwits":2,"facebook":2,"discord":2}
Preview drafts available for first idea: 4
[vps33344]$ php spark db:apply-docs

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:43:11 UTC+00:00

Starting db:apply-docs
[Error]
Undefined constant "App\Services\Spark\MYSQLI_OPT_PROTOCOL"
at APPPATH/Services/Spark/DbApplyDocsService.php:84

[vps33344]$ php spark migrate:dry-run

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:43:55 UTC+00:00

Pending migrations: 15

## Migration Dry-Run Plan

- Estimated batch: **6**
- Pending migrations: **15**

| Migration | Filename | Estimated Batch | Affected Tables |
| --- | --- | --- | --- |
| AddOutputTextToOpsRuns | 2026-01-21-000110_AddOutputTextToOpsRuns.php | 6 | bf_ops_job_runs |
| CreateUserOnboardingTables | 2026-02-01-000100_CreateUserOnboardingTables.php | 6 | bf_user_onboarding, bf_user_profiles, bf_user_employment |
| AddBrokerExecutionFields | 2026-02-15-000200_AddBrokerExecutionFields.php | 6 | bf_investment_scraper, bf_investment_trade_alerts |
| CreateUserSetupPreferences | 2026-02-15-000200_CreateUserSetupPreferences.php | 6 | bf_user_setup_preferences |
| AddStatusMetaExcerptColumns | 2026-02-20-000001_AddStatusMetaExcerptColumns.php | 6 | Unknown |
| CreateAuthHealthRuns | 2026-02-25-000001_CreateAuthHealthRuns.php | 6 | bf_auth_health_runs |
| CreateUserEvents | 2026-03-01-000100_CreateUserEvents.php | 6 | bf_user_events |
| CreateEmailOutbox | 2026-03-05-000100_CreateEmailOutbox.php | 6 | bf_email_outbox |
| CreateInvestmentForecastingTables | 2026-03-10-000100_CreateInvestmentForecastingTables.php | 6 | bf_investment_price_forecasts, bf_investment_forecast_history, bf_investment_forecast_jobs, bf_investment_trade_alerts |
| CreateInvestmentForecastAccuracyTable | 2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php | 6 | bf_investment_forecast_accuracy |
| CreateInvestmentForecastAccuracy | 2026-03-12-000100_CreateInvestmentForecastAccuracy.php | 6 | bf_investment_forecast_accuracy |
| CreateAiOpsTaskPipelineTables | 2026-03-15-000100_CreateAiOpsTaskPipelineTables.php | 6 | bf_aiops_tasks, bf_aiops_task_runs, bf_aiops_registry, bf_aiops_settings, bf_ops_command_inbox |
| CreateMditPhase1Tables | 2026-04-01-000100_CreateMditPhase1Tables.php | 6 | bf_mdit_investor_profiles, bf_mdit_wallets, bf_mdit_deposits, bf_mdit_token_ledger, bf_mdit_redemptions, bf_mdit_nav_snapshots, bf_mdit_disclosures_acceptance, bf_mdit_webhook_events |
| CreateMditAuthRoles | 2026-04-01-000110_CreateMditAuthRoles.php | 6 | Unknown |
| CreateChatGovernanceTables | 2026-04-15-000100_CreateChatGovernanceTables.php | 6 | bf_chat_archives, bf_chat_steps |

[vps33344]$ php spark db:drift

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:44:02 UTC+00:00

Database drift artifacts written.
Docs: /home/mymiteam/mymiwallet/site/current/docs/aiops/artifacts/db-drift/20260201-184402
Raw: /home/mymiteam/mymiwallet/site/current/writable/aiops/artifacts/db-drift/20260201-184402

[vps33344]$ php spark env:doctor

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:44:21 UTC+00:00

Env Doctor completed.
Status: WARNING | Score: 70 | ok:22 warning:3 critical:0

JSON: /home/mymiteam/mymiwallet/site/current/writable/triage/envdoctor/envdoctor-2026-02-01-184421.json
Markdown: /home/mymiteam/mymiwallet/site/current/writable/triage/envdoctor/envdoctor-2026-02-01-184421.md
[vps33344]$ php spark health:cache

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:44:32 UTC+00:00

Running cache health checks...

cache=OK (/home/mymiteam/mymiwallet/site/current/writable/cache)
debugbar=OK (/home/mymiteam/mymiwallet/site/current/writable/debugbar)
session=OK (/home/mymiteam/mymiwallet/site/current/writable/session)

overall=PASS
[vps33344]$ php spark health:disk

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:44:37 UTC+00:00

Running disk health checks...

Disk usage (df -h)
----------------------------------------
Filesystem      Size  Used Avail Use% Mounted on
overlay          25G  1.6G   24G   7% /
tmpfs            15G  212K   15G   1% /run
/dev/md10        10G  4.0K   10G   1% /tmp
tmpfs            64M     0   64M   0% /dev
tmpfs            15G     0   15G   0% /run/lock
tmpfs            26G   20M   26G   1% /run/secrets
/dev/nvme0n1p1  459G   39G  402G   9% /var/container_share
shm              63M     0   63M   0% /dev/shm

Inode usage (df -i)
----------------------------------------
Filesystem        Inodes    IUsed     IFree IUse% Mounted on
overlay        468779520 39972414 428807106    9% /
tmpfs           32995412      236  32995176    1% /run
/dev/md10         655360       44    655316    1% /tmp
tmpfs           32995412       18  32995394    1% /dev
tmpfs           32995412        3  32995409    1% /run/lock
tmpfs           32995412     6637  32988775    1% /run/secrets
/dev/nvme0n1p1  30352688   124337  30228351    1% /var/container_share
shm             32995412        1  32995411    1% /dev/shm

overall=PASS
[vps33344]$ php spark health:git-safety

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:44:49 UTC+00:00

Running git safety checks...

git_safety=FAIL
issue=Tracked secret-like files detected: assets/js/BitcoinJS-lib/node_modules/yargs-parser/build/lib/tokenize-arg-string.js

[vps33344]$ php spark health:services

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:45:20 UTC+00:00

Running service health checks...
sh: line 1: httpd: command not found
sh: line 1: php-fpm: command not found
sh: line 1: litespeed: command not found
sh: line 1: php82-fpm: command not found
sh: line 1: openlitespeed: command not found
sh: line 1: lsphp: command not found
sh: line 1: php-cgi: command not found
sh: line 1: php8.2-fpm: command not found
sh: line 1: ea-php82-php-fpm: command not found
[Sun Feb 01 10:45:20.962695 2026] [core:warn] [pid 399178] AH00111: Config variable ${APACHE_RUN_DIR} is not defined
apache2: Syntax error on line 80 of /etc/apache2/apache2.conf: DefaultRuntimeDir must be a valid directory, absolute or relative to ServerRoot

web_server=nginx
php_mode=cgi
php_workers=1
fastcgi_upstream=unix:/home/mymiteam/.php/php-fpm.sock
ports_listening=80,443
hosting_mode=NGINX+PHP-CGI
overall=PASS
[vps33344]$ php spark logs:healthcheck

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:45:29 UTC+00:00

Starting logs:healthcheck

Log healthcheck summary
----------------------------------------
marker: 3a63d9052141
file_log_path: /home/mymiteam/mymiwallet/site/current/writable/logs/log-2026-02-01.php
file_log_ok=false
db_log_ok=false (db not available: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '%3a63d9052141%' at line 4)
overall=FAIL

[vps33344]$ php spark logs:summarize

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:45:45 UTC+00:00

Starting logs:summarize
Summary generated for 2026-02-01: /home/mymiteam/mymiwallet/site/current/writable/logs/summary-2026-02-01.log
Last processed timestamp updated to: 2026-02-01 18:43:13
total_entries=52
new_entries=8
⚠ Log summary: total=52, new=8
[vps33344]$ php spark alerts/audit

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:45:52 UTC+00:00

Command "alerts/audit" not found.

Did you mean this?
    alerts:audit

[vps33344]$ php spark alerts:audit

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:46:06 UTC+00:00


SECTION 1: COUNTS
----------------------------------------
Emails scanned: 0
Alerts scanned: 250
Emails with alerts: 0
Emails missing alerts: 0
Alerts without source email: 0
Symbol mismatches: 0

SECTION 2: TOP ISSUES (LIMIT 25)
----------------------------------------
No issues detected.
SECTION 3: HEALTH SCORE
----------------------------------------
PASS - 100% correctly mapped

Audit duration: 339 ms
Memory peak: 14.00 MB
[vps33344]$ php spark audit:psr4

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:46:15 UTC+00:00

❌ MarketingBatchTrait
  Legacy global class: app/Libraries/Traits/MarketingBatchTrait.php

❌ TextProcessor
  Legacy global class: app/Libraries/Traits/TextProcessor.php

❌ CryptoCurrencyInterface
  Legacy global class: app/Libraries/CryptoCurrencyInterface.php

❌ FMVService
  Legacy global class: app/Libraries/FMVService.php

❌ MyMIAdvisor
  Legacy global class: app/Libraries/MyMIAdvisor.php

❌ MyMIAdvisors
  Legacy global class: app/Libraries/MyMIAdvisors.php

❌ MyMIBirdeye
  Legacy global class: app/Libraries/MyMIBirdeye.php

❌ MyMIBitcoin
  Legacy global class: app/Libraries/MyMIBitcoin.php

❌ MyMIBlogger
  Legacy global class: app/Libraries/MyMIBlogger.php

❌ MyMICoinGecko
  Legacy global class: app/Libraries/MyMICoinGecko.php

❌ MyMICryptoPanic
  Legacy global class: app/Libraries/MyMICryptoPanic.php

❌ MyMIDexScreener
  Legacy global class: app/Libraries/MyMIDexScreener.php

❌ MyMIDigibyte
  Legacy global class: app/Libraries/MyMIDigibyte.php

❌ MyMIEthereum
  Legacy global class: app/Libraries/MyMIEthereum.php

❌ MyMIFinnhub
  Legacy global class: app/Libraries/MyMIFinnhub.php

❌ MyMIGemini
  Legacy global class: app/Libraries/MyMIGemini.php

❌ MyMIInfura
  Legacy global class: app/Libraries/MyMIInfura.php

❌ MyMIInstitutes
  Legacy global class: app/Libraries/MyMIInstitutes.php

❌ MyMIRaydium
  Legacy global class: app/Libraries/MyMIRaydium.php

❌ MyMIJupiter
  Legacy global class: app/Libraries/MyMIJupiter.php

❌ MyMILogger
  Legacy global class: app/Libraries/MyMILogger.php

❌ MyMIMarketData
  Legacy global class: app/Libraries/MyMIMarketData.php

❌ MyMIProjects
  Legacy global class: app/Libraries/MyMIProjects.php

❌ MyMIPump
  Legacy global class: app/Libraries/MyMIPump.php

❌ MyMISEC
  Legacy global class: app/Libraries/MyMISEC.php

❌ MyMITwitter
  Legacy global class: app/Libraries/MyMITwitter.php

❌ MyMIWalletConnect
  Legacy global class: app/Libraries/MyMIWalletConnect.php

❌ WebSocketClient
  Legacy global class: app/Libraries/WebSocketClient.php

❌ WebSocketHandler
  Legacy global class: app/Libraries/WebSocketHandler.php

❌ ScannerRouter
  Legacy global class: app/Libraries/ScannerRouter.php

❌ MyMIAssistant
  Legacy global class: app/Libraries/MyMIAssistant.php

❌ MyMIDiscord
  Legacy global class: app/Libraries/MyMIDiscord.php

❌ MyMIPredictions
  Legacy global class: app/Libraries/MyMIPredictions.php

❌ LiquidityModel
  Legacy global class: app/Models/Predictions/LiquidityModel.php

❌ MarketsModel
  Legacy global class: app/Models/Predictions/MarketsModel.php

❌ OptionsModel
  Legacy global class: app/Models/Predictions/OptionsModel.php

❌ OrdersModel
  Legacy global class: app/Models/Predictions/OrdersModel.php

❌ PayoutsModel
  Legacy global class: app/Models/Predictions/PayoutsModel.php

❌ PositionsModel
  Legacy global class: app/Models/Predictions/PositionsModel.php

❌ TradesModel
  Legacy global class: app/Models/Predictions/TradesModel.php

❌ AdvisorModel
  Legacy global class: app/Models/AdvisorModel.php

❌ AnalyticalModel
  Legacy global class: app/Models/AnalyticalModel.php

❌ AssetsModel
  Legacy global class: app/Models/AssetsModel.php

❌ AuctionBalanceModel
  Legacy global class: app/Models/AuctionBalanceModel.php

❌ AuctionBidModel
  Legacy global class: app/Models/AuctionBidModel.php

❌ AuctionItemModel
  Legacy global class: app/Models/AuctionItemModel.php

❌ AuctionLotModel
  Legacy global class: app/Models/AuctionLotModel.php

❌ AuctionPaymentModel
  Legacy global class: app/Models/AuctionPaymentModel.php

❌ AuctionSettlementModel
  Legacy global class: app/Models/AuctionSettlementModel.php

❌ BudgetModel
  Legacy global class: app/Models/BudgetModel.php

❌ CampaignModel
  Legacy global class: app/Models/CampaignModel.php

❌ DiscordModel
  Legacy global class: app/Models/DiscordModel.php

❌ ExchangeModel
  Legacy global class: app/Models/ExchangeModel.php

❌ InstitutesModel
  Legacy global class: app/Models/InstitutesModel.php

❌ InvestorModel
  Legacy global class: app/Models/InvestorModel.php

❌ MgmtBudgetModel
  Legacy global class: app/Models/MgmtBudgetModel.php

❌ MyMICoinModel
  Legacy global class: app/Models/MyMICoinModel.php

❌ MyMIGoldModel
  Legacy global class: app/Models/MyMIGoldModel.php

❌ PageSEOModel
  Legacy global class: app/Models/PageSEOModel.php

❌ PlaidModel
  Legacy global class: app/Models/PlaidModel.php

❌ ProjectCommitmentsModel
  Legacy global class: app/Models/ProjectCommitmentsModel.php

❌ ProjectDistributionsModel
  Legacy global class: app/Models/ProjectDistributionsModel.php

❌ ProjectInboxModel
  Legacy global class: app/Models/ProjectInboxModel.php

❌ ProjectPayoutsModel
  Legacy global class: app/Models/ProjectPayoutsModel.php

❌ ProjectsModel
  Legacy global class: app/Models/ProjectsModel.php

❌ ProjectTokenAllocationsModel
  Legacy global class: app/Models/ProjectTokenAllocationsModel.php

❌ ProjectWithdrawalsModel
  Legacy global class: app/Models/ProjectWithdrawalsModel.php

❌ PublicModel
  Legacy global class: app/Models/PublicModel.php

❌ SolanaModel
  Legacy global class: app/Models/SolanaModel.php

❌ SubscribeModel
  Legacy global class: app/Models/SubscribeModel.php

❌ TrackerModel
  Legacy global class: app/Models/TrackerModel.php

❌ InvestmentModel
  Legacy global class: app/Models/InvestmentModel.php

❌ AuctionsController
  Legacy global class: app/Modules/APIs/Controllers/AuctionsController.php
  Legacy global class: app/Modules/User/Controllers/AuctionsController.php

❌ ZapierController
  Legacy global class: app/Modules/APIs/Controllers/ZapierController.php

❌ HealthController
  Legacy global class: app/Modules/APIs/Controllers/HealthController.php

❌ AiOpsController
  Legacy global class: app/Modules/APIs/Controllers/AiOpsController.php

❌ AlertsController
  Legacy global class: app/Modules/APIs/Controllers/AlertsController.php

❌ DiscordController
  Legacy global class: app/Modules/APIs/Controllers/DiscordController.php

❌ SolanaController
  Legacy global class: app/Modules/APIs/Controllers/SolanaController.php
  Legacy global class: app/Modules/Exchange/Controllers/SolanaController.php

❌ DigiByteController
  Legacy global class: app/Modules/Exchange/Controllers/DigiByteController.php

❌ GeminiController
  Legacy global class: app/Modules/Exchange/Controllers/GeminiController.php

❌ BloggerController
  Legacy global class: app/Modules/Management/Controllers/Marketing/BloggerController.php

❌ ProjectsController
  Legacy global class: app/Modules/Management/Controllers/ProjectsController.php
  Legacy global class: app/Modules/User/Controllers/ProjectsController.php

❌ PredictionsController
  Legacy global class: app/Modules/User/Controllers/PredictionsController.php

❌ BudgetController
  Legacy global class: app/Modules/User/Controllers/BudgetController.php

❌ InstitutesController
  Legacy global class: app/Modules/User/Controllers/InstitutesController.php

❌ SubscribeController
  Legacy global class: app/Modules/User/Controllers/SubscribeController.php

❌ InvestmentsController
  Legacy global class: app/Modules/User/Controllers/InvestmentsController.php

❌ DashboardController
  Legacy global class: app/Modules/User/Controllers/DashboardController.php

❌ BirdeyeService
  Legacy global class: app/Services/BirdeyeService.php

❌ BitcoinService
  Legacy global class: app/Services/BitcoinService.php

❌ BlockchainService
  Legacy global class: app/Services/BlockchainService.php

❌ BloggerService
  Legacy global class: app/Services/BloggerService.php

❌ CoinGeckoService
  Legacy global class: app/Services/CoinGeckoService.php

❌ CryptoPanicService
  Legacy global class: app/Services/CryptoPanicService.php

❌ DigiByteService
  Legacy global class: app/Services/DigiByteService.php

❌ EtherscanService
  Legacy global class: app/Services/EtherscanService.php

❌ InfuraService
  Legacy global class: app/Services/InfuraService.php

❌ JupiterService
  Legacy global class: app/Services/JupiterService.php

❌ MetaService
  Legacy global class: app/Services/MetaService.php

❌ SearchRotationService
  Legacy global class: app/Services/SearchRotationService.php

❌ CoinGecko
  Legacy global class: app/Config/CoinGecko.php

❌ Birdeye
  Legacy global class: app/Config/Birdeye.php

❌ DigiByte
  Legacy global class: app/Config/DigiByte.php

❌ Etherscan
  Legacy global class: app/Config/Etherscan.php

❌ Infura
  Legacy global class: app/Config/Infura.php

❌ Jupiter
  Legacy global class: app/Config/Jupiter.php

❌ MyMIAuction
  Legacy global class: app/Config/MyMIAuction.php

❌ Predictions
  Legacy global class: app/Config/Predictions.php

❌ Projects
  Legacy global class: app/Config/Projects.php

❌ WalletConnect
  Legacy global class: app/Config/WalletConnect.php

❌ Discord
  Legacy global class: app/Config/Discord.php

❌ Email
  Legacy global class: app/Config/Email.php

❌ QueueConfig
  Legacy global class: app/Config/QueueConfig.php

❌ DiscordTest
  Legacy global class: app/Commands/DiscordTest.php

❌ app/Commands/API/ApiAudit.php
  Multiple classes: ApiAudit, ApiAuditRequester

❌ DiscordTestLiquidity
  Legacy global class: app/Commands/DiscordTestLiquidity.php

❌ DiscordWireCheck
  Legacy global class: app/Commands/DiscordWireCheck.php

❌ DiscordProcessQueue
  Legacy global class: app/Commands/DiscordProcessQueue.php

❌ DiscordList
  Legacy global class: app/Commands/DiscordList.php


Summary
Total classes: 797
PSR-4 OK: 797
Violations: 0
Legacy globals: 122
Legacy files: 125
Last scan: 2026-02-01 18:46:15

[vps33344]$ php spark email:test

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:47:47 UTC+00:00

[CodeIgniter\Database\Exceptions\DatabaseException]
Table 'mymiwallet.bf_email_outbox' doesn't exist
at SYSTEMPATH/Database/BaseConnection.php:684

  Caused by:
  [CodeIgniter\Database\Exceptions\DatabaseException]
  Table 'mymiwallet.bf_email_outbox' doesn't exist
  at SYSTEMPATH/Database/MySQLi/Connection.php:332

  Caused by:
  [mysqli_sql_exception]
  Table 'mymiwallet.bf_email_outbox' doesn't exist
  at SYSTEMPATH/Database/MySQLi/Connection.php:327

[vps33344]$ php spark mail:send-test

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:47:57 UTC+00:00

Usage: php spark mail:send-test you@example.com [activation|reset|generic]
[vps33344]$ php spark mail:send-test tim@mymiwallet.com activation

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:48:18 UTC+00:00

[CodeIgniter\Database\Exceptions\DatabaseException]
Table 'mymiwallet.bf_email_outbox' doesn't exist
at SYSTEMPATH/Database/BaseConnection.php:684

  Caused by:
  [CodeIgniter\Database\Exceptions\DatabaseException]
  Table 'mymiwallet.bf_email_outbox' doesn't exist
  at SYSTEMPATH/Database/MySQLi/Connection.php:332

  Caused by:
  [mysqli_sql_exception]
  Table 'mymiwallet.bf_email_outbox' doesn't exist
  at SYSTEMPATH/Database/MySQLi/Connection.php:327

[vps33344]$ php spark news:audit

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:48:49 UTC+00:00


SECTION 1: COUNTS
----------------------------------------
Temp records scanned: 233
Final records scanned: 250
Posts scanned: 0
Valid pipeline %: 0%
Skipped records %: 0%
Broken records %: 100%

SECTION 2: TOP ISSUES (MAX 25)
----------------------------------------
- Record ID: 7218
  Source: —
  Title: =?UTF-8?B?8J+fqg==?= Thursday links
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7217
  Source: —
  Title: =?utf-8?B?UGVyc29uYWwgRmluYW5jZSBEYWlseTogQ2Fy?= =?utf-8?B?IGFuZCBob21lIGJ1eWVycyBmYWNlIGhpZ2hlcg==?= =?utf-8?B?IHBya...
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7216
  Source: —
  Title: =?utf-8?Q?Here?= =?utf-8?Q?=e2=80=99s_what_investors_should_do_as_courts_weigh_the?= =?utf-8?Q?_future_of_Trump=e2=80...
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7215
  Source: —
  Title: =?utf-8?B?QWZ0ZXIgdGhlIEJlbGw6IEhlcmXigJlzIHc=?= =?utf-8?B?aGF0IGludmVzdG9ycyBzaG91bGQgZG8gYQ==?= =?utf-8?B?cyBjb3Vyd...
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7214
  Source: —
  Title: =?utf-8?B?VGVjaCBEYWlseTogVGhlIG1hcmtldCBnb3Qg?= =?utf-8?B?YW4gZXhwZWN0ZWQgYm9vc3QgZnJvbSBOdmlk?= =?utf-8?B?aWEg4oCUI...
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7213
  Source: —
  Title: =?utf-8?Q?U.S._stocks_end_higher_despite_appeals_court_reinstating?= =?utf-8?Q?_Trump_tariffs_=e2=80=94_for_now?=
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7212
  Source: —
  Title: Park City, Utah, Mansion With an 8,900-Square-Foot Tennis Facility to List for $18.8 Million
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7211
  Source: —
  Title: Trump's tariffs reinstated during appeal, as U.S. stocks hold on to narrow gains
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7210
  Source: —
  Title: Powell tells Trump he won't be political during White House meeting
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7209
  Source: —
  Title: =?UTF-8?B?8J+Utw==?= The Daily: Analysts expect crypto rally to resume after dip on hawkish Fed minutes
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7208
  Source: —
  Title: Europe Daily: Pharma, chips, other sectors look set to get hit with new tariffs soon, even as a court blocks other Tr...
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7207
  Source: —
  Title: These sectors can still get hit with new tariffs soon
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7206
  Source: —
  Title: =?utf-8?Q?Enthusiasm_over_trade-court_tariff_ruling_is_fading_on?= =?utf-8?Q?_Wall_Street_=e2=80=94_follow_live?=
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7205
  Source: —
  Title: Midday Report: Stock Market Today: Dow flat, S&P 500, Nasdaq hold gains scored after court blocks Trump tariffs; Nvid...
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7204
  Source: —
  Title: Why Apple investors should be bracing for a wave of downgrades
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7203
  Source: —
  Title: =?utf-8?Q?World=20Bank=20Email=20Alert=20-=20Global=20Alerts=20-=202025-05-28?=
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7202
  Source: —
  Title: 35 easy ways to make extra cash, Easy tricks to make your computer last longer
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7201
  Source: —
  Title: =?utf-8?Q?Wall_Street_enthusiasm_over_tariff_ruling_tempered_by?= =?utf-8?Q?_what=e2=80=99s-next_uncertainty?=
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7200
  Source: —
  Title: =?utf-8?Q?Tax_Bill_Threatens_the_Grid=e2=80=99s_New_Workhorse?=
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7199
  Source: —
  Title: =?utf-8?Q?CEO_confidence_hasn?= =?utf-8?Q?=e2=80=99t_plummeted_like_this_since_at_least_the_1970s?=
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7198
  Source: —
  Title: =?UTF-8?q?TD=E2=82=BF:_Chasing_Bitcoin_Stocks=3F_Here=E2=80=99s_What_You_?= =?UTF-8?q?Need_to_Know_-_(a_Swan_Signal_L...
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7197
  Source: —
  Title: Permissionless IV Agenda is Live!
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7196
  Source: —
  Title: U.S. first-time unemployment claims jump to five-week high
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7195
  Source: —
  Title: GDP update reinforces first shrinkage of U.S. economy in three years
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

- Record ID: 7194
  Source: —
  Title: Economic calendar: GDP, jobless claims, home sales and Fed talk awaited
  Issue category: SCRAPER_SKIPPED_UNLOGGED
  Suspected stage: ingest

SECTION 3: HEALTH STATUS
----------------------------------------
FAIL (0% valid pipeline)

Audit duration: 296 ms
Memory peak: 16.00 MB
[vps33344]$ php spark routes:auth-audit

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:49:00 UTC+00:00

Running public route auth audit...
[Error]
Call to undefined method CodeIgniter\HTTP\Response::isRedirect()
at APPPATH/Commands/RoutesAuthAudit.php:256

[vps33344]$ php spark spark:diagnose-503

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:49:20 UTC+00:00

503 Diagnostics
----------------------------------------
Writable: OK
Writable/cache exists: OK
public/index.php exists: OK
CI4 log today exists: FAIL
Upstream socket refused detected: OK

Suggested Actions:
- Clear cache: rm -rf writable/cache/*

[vps33344]$ php spark spark:purge-fastcgi

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:49:36 UTC+00:00

Scanning for php-pm / fastcgi / controller.sock references…
^C
[vps33344]$ php spark spark:restart-safe

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:51:33 UTC+00:00

This action is destructive. Re-run with --approve.
Restart-safe: flushing CI4 caches…
Purged: /home/mymiteam/mymiwallet/site/current/writable/cache
Purged: /home/mymiteam/mymiwallet/site/current/writable/debugbar
Opcache reset attempted.

Next step (DreamHost, no sudo):
- In DreamHost panel: restart Web Server / PHP service for this domain.
- Then run: php spark spark:diagnose-503
[vps33344]$ php spark spark:traffic-spike-guard

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:51:52 UTC+00:00

Traffic Spike Guard
----------------------------------------
nginx_upstream_refused: 0
nginx_upstream_connect: 481
ci4_critical: 0
ci4_error: 0

[vps33344]$ php spark marketing:automation-audit

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:52:27 UTC+00:00

Marketing automation audit artifacts written.
Docs: /home/mymiteam/mymiwallet/site/current/docs/aiops/artifacts/marketing-automation-audit/20260201-185227
Raw: /home/mymiteam/mymiwallet/site/current/writable/aiops/artifacts/marketing-automation-audit/20260201-185227
[vps33344]$ php spark revenue:scan

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:52:33 UTC+00:00

Generated: /home/mymiteam/mymiwallet/site/current/public/docs/revenue_streams/README.md
Generated: /home/mymiteam/mymiwallet/site/current/public/docs/revenue_streams/revenue_streams_full.md
Generated: /home/mymiteam/mymiwallet/site/current/public/docs/revenue_streams/revenue_streams_by_module.md
Generated: /home/mymiteam/mymiwallet/site/current/public/docs/revenue_streams/revenue_streams_by_user_type.md
Generated: /home/mymiteam/mymiwallet/site/current/public/docs/revenue_streams/revenue_streams_by_pricing_tier.md
Scan complete. Streams found: 0


[vps33344]$ php spark fix:503

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:52:45 UTC+00:00

Starting 503 triage...
This action is destructive. Re-run with --approve.
[Error]
Call to undefined method App\Commands\Fix503::guardPathForSecrets()
at APPPATH/Commands/Fix503.php:231

[vps33344]$ php spark ops:aiops:init

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:52:58 UTC+00:00

[Error]
Call to a member function getOptions() on null
at APPPATH/Commands/Ops/AiopsInit.php:20

[vps33344]$ php spark ops:analyze-commands

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:53:10 UTC+00:00

This action is destructive. Re-run with --approve.
No Parsed inbox items found.
[vps33344]$ php spark ops:app:update

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:53:19 UTC+00:00

ops:app:update summary
✔ Passed: 4
⚠️ Warnings: 1
❌ Failures: 4
Phase 0: Environment Guardrails — PASSED (0ms)
Phase 1: Filesystem & Permissions — PASSED (0ms)
Phase 2: Cache & Autoload Sanity — FAILED (0ms)
  ⚠️ FileLocator reset unavailable; skipped.
  ❌ cache:clear failed: Non-static method CodeIgniter\CLI\Commands::run() cannot be called statically
Phase 3: Database Health — WARNING (50ms)
  ⚠️ Pending migrations: 6
Phase 4: Configuration Audit — FAILED (1ms)
  ❌ Encryption key missing.
Phase 5: API & Integration Health — FAILED (1176ms)
  ⚠️ external:marketaux check failed (404)
  ⚠️ external:coingecko check failed (403)
  ❌ internal:system/healthz check failed (403)
  ❌ internal:API/Health check failed (502)
Phase 6: Spark Command Governance — FAILED (0ms)
  ❌ Unhandled exception: Non-static method CodeIgniter\CLI\Commands::run() cannot be called statically
Phase 7: Application Self-Tests — PASSED (11ms)
Phase 8: AIOps Snapshot — PASSED (0ms)

[vps33344]$ php spark ops:commands:audit

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:54:12 UTC+00:00

 Command    File                            Violations
----------------------------------------------------------------
 ProposePr  app/Commands/Ops/ProposePr.php  Illegal getOption()
All Spark commands are constructor-safe.
[vps33344]$ php spark ops:commands:autofix

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:54:17 UTC+00:00

No illegal constructors detected. Nothing to fix.
[vps33344]$ php spark ops:commands:inventory

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:54:23 UTC+00:00

[Error]
Call to undefined function RecursiveDirectoryIterator()
at APPPATH/Commands/Ops/CommandsInventory.php:52

[vps33344]$ php spark ops:commands:lint

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:54:29 UTC+00:00

FAIL ops:propose-pr
  - Deprecated Spark CLI APIs detected ($this->option/getOption/getArgument).
  - Missing documentation entry in docs/management/Command_Runtime_Audit.md.

[vps33344]$ php spark ops:fetch-commands

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:54:52 UTC+00:00

This action is destructive. Re-run with --approve.
IMAP credentials are not configured.
[vps33344]$ php spark ops:filesystem-lint

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:55:01 UTC+00:00

Command "ops:filesystem-lint" not found.

Did you mean this?
    ops:filesystem:lint

[vps33344]$ php spark ops:filesystem:lint

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:55:08 UTC+00:00

Filesystem lint: FAIL
app/Commands/Ops/NextSteps.php:304 file_put_contents (Writes to writable/ (outside artifact sandbox))
  file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
  Fix: Use log_message() for logs or move output to ROOTPATH . 'docs/...'
app/Commands/Ops/ProposePr.php:310 mkdir (Missing ROOTPATH anchor)
  mkdir($dir, 0775, true);
  Fix: mkdir(ROOTPATH . 'docs/...', ...)
app/Commands/Ops/ProposePr.php:319 file_put_contents (Missing ROOTPATH anchor)
  if (file_put_contents($path, $content) === false) {
  Fix: file_put_contents(ROOTPATH . 'docs/...', ...)
app/Commands/Ops/AiopsInit.php:35 file_put_contents (Missing ROOTPATH anchor)
  file_put_contents($doc, "# AIOps\n\n");
  Fix: file_put_contents(ROOTPATH . 'docs/...', ...)
app/Commands/Ops/AiopsInit.php:41 file_put_contents (Missing ROOTPATH anchor)
  file_put_contents($doc, $marker, FILE_APPEND);
  Fix: file_put_contents(ROOTPATH . 'docs/...', ...)
app/Commands/Ops/CommandsAutofix.php:84 file_put_contents (Missing ROOTPATH anchor)
  file_put_contents($backup, $code);
  Fix: file_put_contents(ROOTPATH . 'docs/...', ...)
app/Commands/Ops/CommandsAutofix.php:96 file_put_contents (Missing ROOTPATH anchor)
  file_put_contents($path, $updated);
  Fix: file_put_contents(ROOTPATH . 'docs/...', ...)
app/Commands/Support/ArtifactHelper.php:97 file_put_contents (Missing ROOTPATH anchor)
  if (file_put_contents($dir . '/summary.md', $summary) === false) {
  Fix: file_put_contents(ROOTPATH . '/summary.md', ...)
app/Commands/Support/ArtifactHelper.php:102 file_put_contents (Missing ROOTPATH anchor)
  if (file_put_contents($dir . '/report.json', $reportJson) === false) {
  Fix: file_put_contents(ROOTPATH . '/report.json', ...)
app/Commands/Support/ArtifactHelper.php:116 mkdir (Missing ROOTPATH anchor)
  return mkdir($dir, 0755, true);
  Fix: mkdir(ROOTPATH . 'docs/...', ...)
app/Commands/Fix503.php:225 mkdir (Missing ROOTPATH anchor)
  mkdir($directory, 0775, true);
  Fix: mkdir(ROOTPATH . 'docs/...', ...)
app/Commands/Fix503.php:225 mkdir (Writes to writable/ (outside artifact sandbox))
  mkdir($directory, 0775, true);
  Fix: Use log_message() for logs or move output to ROOTPATH . 'docs/...'
app/Commands/Fix503.php:233 file_put_contents (Missing ROOTPATH anchor)
  file_put_contents($this->logPath, '');
  Fix: file_put_contents(ROOTPATH . 'docs/...', ...)
app/Commands/Fix503.php:240 file_put_contents (Missing ROOTPATH anchor)
  file_put_contents($this->logPath, $line . PHP_EOL, FILE_APPEND);
  Fix: file_put_contents(ROOTPATH . 'docs/...', ...)
app/Commands/Fix503.php:401 mkdir (Missing ROOTPATH anchor)
  mkdir(dirname($path), 0775, true);
  Fix: mkdir(ROOTPATH . 'docs/...', ...)
app/Commands/Fix503.php:403 file_put_contents (Writes to public/)
  file_put_contents($path, $content);
  Fix: Move output to ROOTPATH . 'docs/...'
app/Commands/Fix503.php:541 file_put_contents (Missing ROOTPATH anchor)
  file_put_contents($snapshotPath, implode(PHP_EOL, $output) . PHP_EOL);
  Fix: file_put_contents(ROOTPATH . 'docs/...', ...)
app/Commands/Fix503.php:541 file_put_contents (Writes to writable/ (outside artifact sandbox))
  file_put_contents($snapshotPath, implode(PHP_EOL, $output) . PHP_EOL);
  Fix: Use log_message() for logs or move output to ROOTPATH . 'docs/...'
app/Commands/Fix503.php:658 file_put_contents (Missing ROOTPATH anchor)
  file_put_contents($this->summaryPath, $content . PHP_EOL);
  Fix: file_put_contents(ROOTPATH . 'docs/...', ...)
app/Commands/GapTrackerSync.php:247 mkdir (Missing ROOTPATH anchor)
  mkdir($dir, 0775, true);
  Fix: mkdir(ROOTPATH . 'docs/...', ...)
app/Commands/GapTrackerSync.php:280 file_put_contents (Missing ROOTPATH anchor)
  file_put_contents($path, implode(PHP_EOL, $report));
  Fix: file_put_contents(ROOTPATH . 'docs/...', ...)
app/Commands/Runtime/CacheBoot.php:53 mkdir (Missing ROOTPATH anchor)
  mkdir($cacheDir, 0755, true);
  Fix: mkdir(ROOTPATH . 'docs/...', ...)
app/Commands/Runtime/CacheBoot.php:53 mkdir (Writes to writable/ (outside artifact sandbox))
  mkdir($cacheDir, 0755, true);
  Fix: Use log_message() for logs or move output to ROOTPATH . 'docs/...'
app/Commands/Runtime/CacheBoot.php:66 file_put_contents (Missing ROOTPATH anchor)
  $warmed = file_put_contents($warmFile, $warmPayload) !== false;
  Fix: file_put_contents(ROOTPATH . 'docs/...', ...)
app/Commands/Runtime/CacheBoot.php:66 file_put_contents (Writes to writable/ (outside artifact sandbox))
  $warmed = file_put_contents($warmFile, $warmPayload) !== false;
  Fix: Use log_message() for logs or move output to ROOTPATH . 'docs/...'
app/Commands/LogsFullReport.php:59 mkdir (Missing ROOTPATH anchor)
  @mkdir($dir, 0775, true);
  Fix: mkdir(ROOTPATH . 'docs/...', ...)
app/Commands/LogsFullReport.php:59 mkdir (Writes to writable/ (outside artifact sandbox))
  @mkdir($dir, 0775, true);
  Fix: Use log_message() for logs or move output to ROOTPATH . 'docs/...'
app/Commands/LogsFullReport.php:62 file_put_contents (Missing ROOTPATH anchor)
  file_put_contents($out, $md);
  Fix: file_put_contents(ROOTPATH . 'docs/...', ...)
app/Commands/LogsFullReport.php:62 file_put_contents (Writes to writable/ (outside artifact sandbox))
  file_put_contents($out, $md);
  Fix: Use log_message() for logs or move output to ROOTPATH . 'docs/...'
app/Commands/API/ApiAudit.php:87 mkdir (Missing ROOTPATH anchor)
  mkdir($triageDir, 0755, true);
  Fix: mkdir(ROOTPATH . 'docs/...', ...)
app/Commands/API/ApiAudit.php:87 mkdir (Writes to writable/ (outside artifact sandbox))
  mkdir($triageDir, 0755, true);
  Fix: Use log_message() for logs or move output to ROOTPATH . 'docs/...'
app/Commands/API/ApiAudit.php:91 file_put_contents (Missing ROOTPATH anchor)
  file_put_contents($reportPath, json_encode($report, JSON_PRETTY_PRINT));
  Fix: file_put_contents(ROOTPATH . 'docs/...', ...)
app/Commands/API/ApiAudit.php:91 file_put_contents (Writes to writable/ (outside artifact sandbox))
  file_put_contents($reportPath, json_encode($report, JSON_PRETTY_PRINT));
  Fix: Use log_message() for logs or move output to ROOTPATH . 'docs/...'
app/Commands/Scrapers/EmailScraperAudit.php:811 mkdir (Missing ROOTPATH anchor)
  if (! mkdir($dir, 0775, true) && ! is_dir($dir)) {
  Fix: mkdir(ROOTPATH . 'docs/...', ...)
app/Commands/Scrapers/EmailScraperAudit.php:811 mkdir (Writes to writable/ (outside artifact sandbox))
  if (! mkdir($dir, 0775, true) && ! is_dir($dir)) {
  Fix: Use log_message() for logs or move output to ROOTPATH . 'docs/...'
app/Commands/Scrapers/EmailScraperAudit.php:824 file_put_contents (Missing ROOTPATH anchor)
  if (file_put_contents($path, $json) === false) {
  Fix: file_put_contents(ROOTPATH . 'docs/...', ...)
app/Commands/Scrapers/EmailScraperAudit.php:824 file_put_contents (Writes to writable/ (outside artifact sandbox))
  if (file_put_contents($path, $json) === false) {
  Fix: Use log_message() for logs or move output to ROOTPATH . 'docs/...'
app/Commands/RevenueStreamsScan.php:49 mkdir (Missing ROOTPATH anchor)
  if (! is_dir($docsDir) && ! mkdir($docsDir, 0775, true) && ! is_dir($docsDir)) {
  Fix: mkdir(ROOTPATH . 'docs/...', ...)
app/Commands/RevenueStreamsScan.php:49 mkdir (Writes to writable/ (outside artifact sandbox))
  if (! is_dir($docsDir) && ! mkdir($docsDir, 0775, true) && ! is_dir($docsDir)) {
  Fix: Use log_message() for logs or move output to ROOTPATH . 'docs/...'
app/Commands/RevenueStreamsScan.php:71 file_put_contents (Missing ROOTPATH anchor)
  file_put_contents($path, $content);
  Fix: file_put_contents(ROOTPATH . 'docs/...', ...)

[vps33344]$ php spark ops:next-steps:sync

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:55:41 UTC+00:00

[TypeError]
App\Commands\Ops\NextStepsSync::App\Commands\Ops\{closure}(): Argument #1 ($issue) must be of type array, string given
at APPPATH/Commands/Ops/NextStepsSync.php:56

[vps33344]$ php spark ops:propose-pr

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:55:58 UTC+00:00

[Error]
Call to undefined method App\Commands\Ops\ProposePr::getOption()
at APPPATH/Commands/Ops/ProposePr.php:28

[vps33344]$ php spark ops:spark-reset

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:56:12 UTC+00:00

Spark reset artifacts written.
Docs: /home/mymiteam/mymiwallet/site/current/docs/aiops/artifacts/ops-spark-reset/20260201-185612
Raw: /home/mymiteam/mymiwallet/site/current/writable/aiops/artifacts/ops-spark-reset/20260201-185612
[vps33344]$ php spark ops:work

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:56:18 UTC+00:00

ops:work starting (safe_mode=ON)
ops:work completed. Processed 0 task(s).
[vps33344]$ php spark optimize:safe

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:56:33 UTC+00:00

optimize:safe is CI-only.


[vps33344]$ php spark runtime:diagnose-502

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:57:29 UTC+00:00

Runtime 502/503 Diagnostics
Detection mode only. Re-run with --approve to apply safe fixes.

❌ PHP handler: unknown

FastCGI / Socket Checks
✔ /home/mymiteam/.php.sock

Nginx fastcgi_pass Scan
• fastcgi_pass php82
• fastcgi_pass unix:/dh/cgi-system/php74.cgi
• fastcgi_pass unix:/home/mymiteam/.php.sock

Writable Permissions
✔ Writable: /home/mymiteam/mymiwallet/site/current/writable/
✔ Writable: /home/mymiteam/mymiwallet/site/current/writable/cache
✔ Writable: /home/mymiteam/mymiwallet/site/current/writable/sessions
✔ Writable: /home/mymiteam/mymiwallet/site/current/writable/logs

Cache State
✔ Cache files: 1

Diagnosis Summary
─────────────────
PHP handler detected       ❌
FastCGI socket present     ✔
fastcgi_pass mismatch      ✔
Writable permissions       ✔
Cache state                ✔
[vps33344]$ php spark runtime:triage

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:57:42 UTC+00:00

Runtime triage artifacts written.
Docs: /home/mymiteam/mymiwallet/site/current/docs/aiops/artifacts/runtime-triage/20260201-185742
Raw: /home/mymiteam/mymiwallet/site/current/writable/aiops/artifacts/runtime-triage/20260201-185742
[vps33344]$ php spark security:csp:audit

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:57:50 UTC+00:00

CSP audit: no inline violations found.
[vps33344]$ php spark security:secrets-audit

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:57:57 UTC+00:00

Secrets audit artifacts written.
Docs: /home/mymiteam/mymiwallet/site/current/docs/aiops/artifacts/security-secrets-audit/20260201-185757
Raw: /home/mymiteam/mymiwallet/site/current/writable/aiops/artifacts/security-secrets-audit/20260201-185757


[vps33344]$ php spark wallets:warm-summary-cache

CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-01 18:59:01 UTC+00:00

This action is destructive. Re-run with --approve.
Warming wallet summary cache for 125 user(s)...
[ErrorException]
Cannot declare class Config\APISettings, because the name is already in use
at APPPATH/Config/APISettings.php:6
