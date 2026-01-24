# Spark Automation Merge Report

## Commands added
- logs:healthcheck
- logs:summarize
- auth:audit
- auth:funnel-check
- auth:smoke
- db:inventory
- db:apply-docs

## Files touched
- app/Commands/Logs/Healthcheck.php
- app/Commands/Logs/Summarize.php
- app/Commands/Auth/Audit.php
- app/Commands/Auth/FunnelCheck.php
- app/Commands/Auth/Smoke.php
- app/Commands/Database/Inventory.php
- app/Commands/Database/ApplyDocs.php
- app/Services/Spark/LogHealthcheckService.php
- app/Services/Spark/LogSummarizeService.php
- app/Services/Spark/AuthAuditRunner.php
- app/Services/Spark/AuthFunnelCheckService.php
- app/Services/Spark/DbInventoryService.php
- app/Services/Spark/DbApplyDocsService.php
- docs/spark/categories/logs/logs-healthcheck.md
- docs/spark/categories/logs/logs-summarize.md
- docs/spark/categories/auth/auth-audit.md
- docs/spark/categories/auth/auth-funnel-check.md
- docs/spark/categories/auth/auth-smoke.md
- docs/spark/categories/database/db-apply-docs.md
- docs/spark/categories/database/db-inventory.md
- docs/spark/inventory.md

## Services created
- App\Services\Spark\LogHealthcheckService
- App\Services\Spark\LogSummarizeService
- App\Services\Spark\AuthAuditRunner
- App\Services\Spark\AuthFunnelCheckService
- App\Services\Spark\DbInventoryService
- App\Services\Spark\DbApplyDocsService

## Risks
- Auth audits and smoke tests create/update test users; use `--force` in low-traffic windows.
- db:apply-docs can execute schema changes; requires `--force` and manual review.
- logs:summarize writes summary/state files; use dry-run to preview when needed.

## CRON suitability
### Safe for CRON
- logs:healthcheck
- logs:summarize
- auth:audit (weekly, low-traffic window)
- auth:funnel-check
- auth:smoke
- db:inventory

### Manual execution only
- db:apply-docs
