# 070 — Security + Alerting Governance (MyMI Wallet)

## Security guardrails
- Never include secrets in generated reports.
- Redact hostnames/paths only when they expose sensitive internals.
- Preserve auditability with timestamps + commit references.

## Alerting triggers
- Command drift from expected baseline.
- Missing critical command classes for operations or security.
- Repeated report delivery failures to central endpoints.

## Recommended enforcement
```bash
php spark security:secrets-audit
php spark aiops:alerts-health
php spark ops:commands:audit
```
