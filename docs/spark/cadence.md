# Spark Command Cadence

| Frequency | Commands |
| --- | --- |
| Hourly | auth:funnel-check, discord:process-queue, mail:send |
| Daily | logs:summarize, logs:healthcheck, auth:smoke, forecasts:refresh, wallets:warm-summary-cache |
| Weekly | auth:audit, alerts:audit, news:audit, routes:auth-audit |
| Monthly | db:inventory, revenue:scan |
| On-Demand | aiops:seed, alerts:parse-test, cache:audit, codex:review, contentengine:smoke, content:ingest-sample, db:apply-docs, discord:test, discord:test-liquidity, discord:list, discord:wire-check, mail:send-test, mail:test, mail:verify, ops:fetch-commands, ops:analyze-commands, ops:work, gap:sync |
