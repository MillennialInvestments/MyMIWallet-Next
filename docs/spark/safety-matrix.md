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
