# MyMI Wallet GTM: human gate register (2026-11-15)

How the remaining GTM work is split:

- **Agent work.** Code, tests, docs and PRs. Claude prepares these for
  review without asking. Per `AGENTS.md`, agents never auto-merge or deploy:
  a PR is merged only when Tim asks for it in the thread, and only Tim deploys.
- **Human gate.** Anything that changes production, touches secrets or
  customer data, needs an outside account, or is a legal or business call.
  Each gate below names one owner and one concrete ask. Nothing behind a gate
  happens until that owner says so in the thread.

Status of the 70 tasks in `tasks.csv`: 9 done, 9 in review, 13 in
progress, 39 proposed (after this change).

## Open gates

| # | Gate | Owner | Tasks | The ask |
| --- | --- | --- | --- | --- |
| G1 | Deploy the current main | Tim | 069 | Run the deploy block in the thread, then paste the health output |
| G2 | Options webhook secret | Tim | 027 | Check whether `OPTIONS_WEBHOOK_SECRET` is set in `shared/.env` (the check prints set or unset only). If TradingView alerts are used, set a new random value there and in each TradingView alert |
| G3 | Browser journey check | Tim | 016-019, 036 | Hard-refresh `/Dashboard` (no overlay, no console 403/404), then sign up, activate and reset with `healthcheck+signup1@mymiwallet.com` and confirm the emails are branded |
| G4 | Approve ADR 0002 (keep legacy login, not Shield) | Teddy | 013, 015 | Approve or reject. Approval closes 015 as "not needed" |
| G5 | Launch scope | Tim + Teddy | 021, 038, 046-053, 065, 066 | Pick which product domains ship at launch. Out-of-scope domains get hidden behind feature flags instead of certified |
| G6 | Plaintext private keys (3 accounts) | Tim + Teddy | 045, 047, 048 | Choose: encrypt in place and notify the 3 users, or delete and notify |
| G7 | Duplicate-email accounts (4 groups) | Tim | 059 | Choose per group: merge, disable the extra, or leave |
| G8 | Legal and financial compliance | Teddy / counsel | 057, 051 | Sign off Terms, Privacy Policy, investment and tax disclaimers |
| G9 | Provider sandboxes | Tim | 021, 035, 038, 046-048, 053 | For each in-scope provider (Plaid, SnapTrade, payments, exchanges), create sandbox keys and put them in `shared/.env`; never paste them in chat |
| G10 | Staging | Tim + Teddy | 068 | Choose: build an isolated staging host, or accept prod releases with the scripted backup and rollback as the release gate |
| G11 | Restore drill | Tim | 060 | Run the restore-check once by hand and paste the RESULT line |
| G12 | Postmark approval and DMARC | Tim | 017, 018 | Postmark account approval, one bounce-webhook test send, and the 2026-12-05 DMARC move to `p=quarantine` |
| G13 | Load test window | Tim | 067 | Pick a low-traffic window for a short load test against prod, or skip until staging exists |

## Agent work queue (no gate needed)

1. 027/028: move the 17 in-controller checks onto route filters; CSRF method audit for GET routes that mutate.
2. 022-026: shrink `tests/baseline/route-handler-gaps.txt` (188 routes whose handler is missing).
3. 030: add nonces to inline scripts so CSP can leave report-only mode.
4. 029: RBAC test for every `admin/*` and `Management/*` route.
5. 032-044: write the journey tests per domain (wallet ledger first).
6. 008 / 009: triage the Dependabot and older AIOps PRs.
7. 061-063: risk-based coverage, cron inventory, SLO signals.
