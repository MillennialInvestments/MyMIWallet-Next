## Overview

Supplemental operational documentation entry for this Spark scope.

## Operational Purpose

Provide standardized runbook sections for operators and developers.

## Command Inventory

- See local command tables and linked inventories.

## Command Reference

- Reference command blocks in this file or parent category docs.

## Dependencies

- Use `docs/spark/_spark_command_dependencies.json` for relationship data.

## Execution Workflows

- Run category bootstrap, diagnostics, and validation sequences as applicable.

## Operational Playbooks

- Incident triage: logs, services, routes, and database diagnostics.

## Troubleshooting

- Use `php spark ops:commands:audit`, `php spark ops:commands:missing`, and runtime diagnostics.

## Related Commands

- `ops:commands:audit`
- `ops:commands:missing`
- `spark:commands:graph`

---

# Spark Command Safety Matrix

## 🟢 Safe (read-only)
- alerts:parse-test
- auth:funnel-check
- cache:audit
- discord:list
- discord:wire-check

## 🟡 Write-safe (idempotent or limited side effects)
- aiops:seed
- alerts:audit
- auth:audit
- auth:smoke
- codex:review
- contentengine:smoke
- content:ingest-sample
- db:inventory
- discord:process-queue
- discord:test
- discord:test-liquidity
- forecasts:refresh
- gap:sync
- logs:healthcheck
- logs:summarize
- mail:send
- mail:send-test
- mail:test
- mail:verify
- news:audit
- ops:analyze-commands
- ops:fetch-commands
- ops:work
- revenue:scan
- routes:auth-audit
- email:test
- wallets:warm-summary-cache

## 🔴 Destructive (force-flagged)
- db:apply-docs
