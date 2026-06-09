# Phase 02E — Repaired SQL Check Schema Verification

Generated UTC: 2026-06-09T08:31:15Z
Branch: fix/mymi-alert-aiops-sqlcheck-ci47
Commit: a271c0ae0 Register TBI CoinVault smoke command (#518)

## Objective

Use the repaired aiops:sql:check command to validate MyMI Alert GTM schema and model readiness.

## Git Status

```text
 M app/Commands/AIOps/SqlCheck.php
?? docs/01_Systematic_Standup/
?? docs/_aiops/mymi_alerts/
```

## Table Checks

```text
===== TABLE: investment_scraper =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:11 UTC+00:00

Provide one of --model, --table, or --query.

===== TABLE: investment_trade_alerts =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:11 UTC+00:00

Provide one of --model, --table, or --query.

===== TABLE: investment_tickers =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:12 UTC+00:00

Provide one of --model, --table, or --query.

===== TABLE: investment_alert_history =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:12 UTC+00:00

Provide one of --model, --table, or --query.

===== TABLE: bf_investment_scraper =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:12 UTC+00:00

Provide one of --model, --table, or --query.

===== TABLE: bf_investment_trade_alerts =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:12 UTC+00:00

Provide one of --model, --table, or --query.

===== TABLE: bf_investment_tickers =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:12 UTC+00:00

Provide one of --model, --table, or --query.

===== TABLE: bf_investment_alert_history =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:12 UTC+00:00

Provide one of --model, --table, or --query.

===== TABLE: bf_trade_alert_scanner_meta =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:13 UTC+00:00

Provide one of --model, --table, or --query.

===== TABLE: bf_aiops_alert_jobs =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:13 UTC+00:00

Provide one of --model, --table, or --query.

===== TABLE: bf_marketing_temp_scraper =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:13 UTC+00:00

Provide one of --model, --table, or --query.

===== TABLE: bf_marketing_generated_content =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:13 UTC+00:00

Provide one of --model, --table, or --query.

===== TABLE: bf_marketing_distribution_targets =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:13 UTC+00:00

Provide one of --model, --table, or --query.

===== TABLE: bf_marketing_publish_queue =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:14 UTC+00:00

Provide one of --model, --table, or --query.

```

## Model Checks

```text
===== MODEL: AlertsModel =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:14 UTC+00:00

Provide one of --model, --table, or --query.

===== MODEL: AlertJobModel =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:14 UTC+00:00

Provide one of --model, --table, or --query.

===== MODEL: TradeAlertScannerMetaModel =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:14 UTC+00:00

Provide one of --model, --table, or --query.

===== MODEL: MarketingModel =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:14 UTC+00:00

Provide one of --model, --table, or --query.

===== MODEL: MarketingDistributionTargetModel =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:15 UTC+00:00

Provide one of --model, --table, or --query.

===== MODEL: MarketingNewsletterModel =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:15 UTC+00:00

Provide one of --model, --table, or --query.

```

## Alert Health

```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:31:15 UTC+00:00

Failed queue count: 0
Health check passed.
```

## Migration Status

```text
| App                  | 2006-04-18-000001 | CreateFinancialNewsTable                            | default | 2026-04-18 17:35:48 | 22    |
| App                  | 2025-09-09-000040 | CreatePredictionsTrades                             | default | 2026-02-01 14:29:40 | 4     |
| App                  | 2026-01-17-000001 | CreateInvestmentSignalsTables                       | default | 2026-02-01 18:04:02 | 5     |
| App                  | 2026-03-10-000100 | CreateInvestmentForecastingTables                   | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-10-000200 | CreateInvestmentForecastAccuracyTable               | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-12-000100 | CreateInvestmentForecastAccuracy                    | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-19-000100 | CreateMarketingVideoStudioTables                    | default | 2026-03-31 12:42:06 | 11    |
| App                  | 2026-03-20-000110 | CreateScannerTaxonomy                               | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-20-000120 | CreateTradeAlertScannerMeta                         | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-21-000100 | EnsureInvestmentScraperEmailDedupe                  | default | 2026-03-31 12:42:07 | 11    |
| App                  | 2026-03-30-000400 | AddTickerToProjects                                 | default | 2026-04-01 00:21:49 | 12    |
| App                  | 2026-04-01-000001 | CreateScannerTables                                 | default | 2026-02-23 00:27:05 | 9     |
| App                  | 2026-04-01-000200 | EnsureInvestmentScraperRawEmailColumns              | default | 2026-04-09 10:44:15 | 13    |
| App                  | 2026-04-05-000100 | CreateMarketingNotificationPipelineTables           | default | 2026-04-09 10:53:47 | 14    |
| App                  | 2026-04-09-120000 | EnhanceMarketingGenerationPipeline                  | default | 2026-04-09 10:55:40 | 15    |
| App                  | 2026-04-09-130000 | HardenMarketingNewsPipelineSchema                   | default | 2026-04-11 18:23:44 | 17    |
| App                  | 2026-04-12-120050 | CreateMarketingDistributionTargets                  | default | 2026-04-14 01:31:39 | 19    |
| App                  | 2026-04-12-221500 | AddExternalFieldsToMarketingDistributionTargets     | default | 2026-04-14 11:26:24 | 21    |
| App                  | 2026-04-13-090000 | AddDiscordCategoryFieldsToMarketingGeneratedContent | default | 2026-04-14 11:26:24 | 21    |
| App                  | 2026-04-13-120000 | CreateDiscordOpsTables                              | default | 2026-04-14 11:26:24 | 21    |
| App                  | 2026-04-14-120000 | RenameDiscordManualMessageRecipientFields           | default | 2026-04-14 11:26:24 | 21    |
| App                  | 2026-04-19-000001 | CreateMarketingPageSeoTable                         | default | 2026-05-14 02:08:34 | 23    |
| App                  | 2026-04-23-090000 | HardenMarketingDistributionTargetsForReliability    | default | 2026-05-14 02:08:34 | 23    |
| App                  | 2026-06-15-000100 | AddScannerSourceToTradeAlerts                       | default | 2026-03-08 14:32:48 | 10    |
```

## GTM Command Discovery

```text
  aiops:alerts-clean                          Delete completed aiops alert queue rows older
  aiops:api:schema                            Validate API endpoints return JSON (optionally
  aiops:alerts-check                          Fetch emails and queue them for processing
  aiops:alerts-health                         Run health checks on aiops alert queue and notify
  aiops:alerts-worker                         Process queued alert emails
  aiops:sql:check                             Validate model/table/query SQL compatibility
  aiops:email-scan                            Scan alerts mailbox for new emails and record
  alerts:fetch-raw-emails                     Fetch raw trade alert emails into
  marketing:distribution:assert-sql           Runs SQL-level anomaly assertions for marketing
  marketing:distribution:failure-inject-test  Dev-safe failure injection checks for
  marketing:news:debug                        Diagnose marketing IMAP connectivity, folder
  marketing:news:generate                     Generates clustered story records from pending
  marketing:news:imap-test                    Smoke test for marketing/news IMAP connectivity.
  marketing:news:scrape                       Ingests alert/news emails (or OCR/raw text) into
  marketing:news:seed-test                    Insert synthetic rows into
  marketing:promotions:audit                  Audit promotion source data and campaign
  marketing:promotions:generate               Generate promotion campaign rows from finalized
  marketing:promotions:test                   Run a chained smoke test for promotions audit and
  marketing:regression:smoke                  Runs full marketing pipeline smoke checks and
  news:audit                                  Audit recent marketing news ingestion,
  research:intelligence:signals               Generate trade-signal intelligence from research
  research:news:collect                       
  scanning:run                                Run MyMI liquidity + momentum scanner
```

## SQLCheck Patch Diff

```diff
diff --git a/app/Commands/AIOps/SqlCheck.php b/app/Commands/AIOps/SqlCheck.php
index 1cc7a5af8..cd8234db3 100644
--- a/app/Commands/AIOps/SqlCheck.php
+++ b/app/Commands/AIOps/SqlCheck.php
@@ -136,4 +136,22 @@ class SqlCheck extends SafeBaseCommand
             'error_message' => $error,
         ]);
     }
+    /**
+     * CI4.7 compatibility helper.
+     *
+     * Older AIOps commands used $this->opt(). CI4 BaseCommand does not
+     * provide that helper, so this command keeps the behavior local and
+     * delegates to the supported CLI option reader.
+     *
+     * @param string $name
+     * @param mixed $default
+     * @return mixed
+     */
+    private function opt(string $name, $default = null)
+    {
+        $value = \CodeIgniter\CLI\CLI::getOption($name);
+
+        return $value === null ? $default : $value;
+    }
+
 }
```
