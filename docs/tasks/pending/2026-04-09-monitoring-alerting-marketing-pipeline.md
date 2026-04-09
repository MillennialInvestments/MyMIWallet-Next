# Pending: Monitoring and alerting for marketing pipeline

## remaining work
- Add pipeline health metrics (ingestion lag, generation lag, failure rate).
- Add threshold-based alerts for cron failures and stuck queue states.

## blockers
- No centralized metrics sink selected for this pipeline.

## dependencies
- Daily audit and cron logs should emit structured metric tags.

## recommended next implementation order
1. Emit structured logs/metrics.
2. Add dashboard panels.
3. Wire alert channels with runbook links.
