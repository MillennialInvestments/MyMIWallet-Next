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

# Spark Command Cadence

| Frequency | Commands |
| --- | --- |
| Hourly | auth:funnel-check, discord:process-queue, mail:send |
| Daily | logs:summarize, logs:healthcheck, auth:smoke, forecasts:refresh, wallets:warm-summary-cache |
| Weekly | auth:audit, alerts:audit, news:audit, routes:auth-audit |
| Monthly | db:inventory, revenue:scan |
| On-Demand | aiops:seed, alerts:parse-test, cache:audit, codex:review, contentengine:smoke, content:ingest-sample, db:apply-docs, discord:test, discord:test-liquidity, discord:list, discord:wire-check, mail:send-test, mail:test, mail:verify, ops:fetch-commands, ops:analyze-commands, ops:work, gap:sync |
