# Spark Command Inventory (Control-Plane Contract)

This inventory is the canonical contract for the AIOps control plane. Each command must comply with the Spark standards and guardrails.

| Command | Domain | Mutates | Requires --approve | CI-Only | Allowed Envs | Artifacts |
| --- | --- | --- | --- | --- | --- | --- |
| ops:commands:audit | ops | No | No | No | local, ci, cron, prod | docs/aiops/artifacts/ops-commands-audit/<timestamp>/ |
| ops:commands:autofix | ops | Yes | Yes | No | local, cron, prod (allowlist) | docs/aiops/artifacts/ops-commands-autofix/<timestamp>/ |
| runtime:spark-doctor | runtime | No | No | No | local, ci, cron, prod | docs/aiops/artifacts/runtime-spark-doctor/<timestamp>/ |
| ops:spark-reset | ops | Yes | Yes | No | local, cron, prod (allowlist) | docs/aiops/artifacts/ops-spark-reset/<timestamp>/ |
| spark:diagnose-503 | spark | No | No | No | local, ci, cron, prod | docs/aiops/artifacts/spark-diagnose-503/<timestamp>/ |
| spark:purge-fastcgi | spark | Yes | Yes | No | local, cron, prod (allowlist) | docs/aiops/artifacts/spark-purge-fastcgi/<timestamp>/ |
| spark:restart-safe | spark | Yes | Yes | No | local, cron, prod (allowlist) | docs/aiops/artifacts/spark-restart-safe/<timestamp>/ |
| spark:traffic-spike-guard | spark | Yes | Yes | No | local, cron, prod (allowlist) | docs/aiops/artifacts/spark-traffic-spike-guard/<timestamp>/ |
| runtime:triage | runtime | No | No | No | local, ci, cron, prod | docs/aiops/artifacts/runtime-triage/<timestamp>/ |
| runtime:cache-boot | runtime | Yes | Yes | No | local, cron, prod (allowlist) | docs/aiops/artifacts/runtime-cache-boot/<timestamp>/ |
| config:drift | audit | No | No | No | local, ci, cron, prod | docs/aiops/artifacts/config-drift/<timestamp>/ |
| ops:commands:inventory | ops | No | No | No | local, ci, cron, prod | docs/aiops/artifacts/ops-commands-inventory/<timestamp>/ |
| db:drift | db | No | No | No | local, ci, cron, prod | docs/aiops/artifacts/db-drift/<timestamp>/ |
| security:secrets-audit | security | No | No | No | local, ci, cron, prod | docs/aiops/artifacts/security-secrets-audit/<timestamp>/ |
| marketing:automation-audit | marketing | No | No | No | local, ci, cron, prod | docs/aiops/artifacts/marketing-automation-audit/<timestamp>/ |
| growth:retention-watch | audit | No | No | No | local, ci, cron, prod | docs/aiops/artifacts/growth-retention-watch/<timestamp>/ |
| ux:journey-audit | audit | No | No | No | local, ci, cron, prod | docs/aiops/artifacts/ux-journey-audit/<timestamp>/ |
| revenue:cost-forecast | audit | No | No | No | local, ci, cron, prod | docs/aiops/artifacts/revenue-cost-forecast/<timestamp>/ |
| ops:next-steps:sync | ops | No | No | No | local, ci, cron, prod | docs/aiops/artifacts/ops-next-steps-sync/<timestamp>/ |

## Notes

- Commands using non-canonical prefixes (`config:*`, `growth:*`, `ux:*`, `revenue:*`) must be renamed to approved taxonomy before implementation.
- Artifact paths shown above must be paired with raw outputs in `writable/aiops/artifacts/<command>/<timestamp>/`.
