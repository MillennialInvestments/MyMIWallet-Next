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

# Spark Command Roadmap

Each entry captures a proposed command, the problem it solves, priority, dependencies, and estimated complexity.

| Command | Problem it solves | Priority | Dependencies | Estimated complexity |
| --- | --- | --- | --- | --- |
| spark:audit:psr4 | Detect PSR-4 namespace drift and missing class mappings. | P1 | Composer autoload, filesystem scan | Medium |
| spark:security:headers | Validate security headers (CSP, HSTS, XFO) across public routes. | P1 | HTTP client, env baseURL | Medium |
| spark:users:detect-spam | Flag suspicious signups or abnormal login activity. | P1 | bf_user_events, users tables | Medium |
| spark:cache:verify | Validate cache health, stale keys, and TTL correctness. | P2 | Cache driver, SafeCache helpers | Medium |
| spark:alerts:reconcile | Reconcile alert ingestion vs notification dispatch status. | P2 | Alerts tables, Discord/email queues | High |
| spark:marketing:backfill | Backfill missing summaries/posts for marketing content. | P2 | Marketing content tables | High |
| spark:forecasting:rebuild | Recompute forecasts for historical alerts for model drift checks. | P2 | Forecast tables, market data provider | High |
| spark:aiops:health-check | Validate AI Ops caps/usage tables and run guardrails. | P1 | bf_ai_ops_caps, bf_ai_ops_usage | Medium |
| spark:system:permissions-audit | Audit filesystem and storage permissions for security hardening. | P1 | Filesystem access, server paths | Medium |
