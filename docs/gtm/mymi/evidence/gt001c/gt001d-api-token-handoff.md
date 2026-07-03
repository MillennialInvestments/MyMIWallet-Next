# GT-001D API Token Guard Handoff

## Source

GT-001C-O closes the internal guard subtrack and hands off the remaining non-internal backlog.

## Starting Point

- Residual `INTERNAL,MISSING_GUARD`: `0`
- Residual `API_TOKEN,MISSING_GUARD`: `547`
- Residual non-internal/non-api-token missing-guard rows: `52`

## Recommended GT-001D Track

Start GT-001D as a separate API-token/auth-policy program. Do not mix API-token routes with internal cron/operator routes.

Recommended first GT-001D discovery domains by size:

1. Marketing
2. Broker
3. Alerts
4. Budget
5. Wallets
6. Investments
7. Solana
8. Email
9. Discord
10. Predictions

## Safety Boundary

- Begin GT-001D with read-only discovery.
- Do not apply blanket API token filters without route ownership review.
- Keep public, webhook, owner-review, and stateful user-auth routes separate.
- Preserve feature branches, worktrees, draft PRs, validation, and smoke evidence.
