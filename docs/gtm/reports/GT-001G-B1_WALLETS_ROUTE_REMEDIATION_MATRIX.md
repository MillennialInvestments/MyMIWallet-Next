# GT-001G-B1 Wallets Route Remediation Matrix

Status: report-only.
Route mutation: none.
Database mutation: none.
External API calls: none.

Wallets route rows reviewed: 122
Explicitly guarded route rows: 2
Unguarded owner-review route rows: 120
Mutation-review route rows: 99
Asset or chain review route rows: 122

Initial remediation decision:
- Do not blanket-add apiToken to Wallets routes.
- Keep login, permission, and token-protected routes unchanged.
- Separate read-only Wallets routes from asset mutation routes.
- Defer chain, wallet, transfer, deposit, redeem, mint, and sync routes.

Next gate: GT-001G-B2 Wallets owner decision pass.
