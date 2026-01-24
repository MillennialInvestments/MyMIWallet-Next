# spark:wallets:warm-summary-cache

## Purpose
Pre-warm the `/API/Wallets/summary` cache for active users to reduce dashboard load time.

## Usage
php spark wallets:warm-summary-cache [--user 123]

## Arguments
- --user (int) – Optional user ID to warm a single user.

## What It Touches
- Database tables: `users`, `bf_investment_trade_alerts`, wallets/accounts tables accessed by `WalletSummaryService`
- Files/directories: None
- Cache: SafeCache user key `wallets:summary`
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (writes cache)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes
- Suggested schedule: Daily or hourly depending on usage.

## Related Commands
- spark:auth:smoke

## Failure Modes
- Cache driver unavailable.
- Missing wallet/account tables.

## Status
- Existing
