# GT-002 MyMI Wallet Functional Gap Tracker

## Purpose

Track MyMI Wallet user-facing feature certification, confirmed defects, Golden Tasks, fix PRs, production smoke results, and remaining gaps.

This is the GT-002 source of truth for TBI AIOps and TBI Ollama.

## Rules

- Test behavior before creating fixes.
- Create Golden Tasks only for confirmed defects.
- Do not mutate production without explicit approval.
- Do not rollback production.
- Do not delete files.
- Use feature worktrees, PRs, validation, smoke evidence, and post-deploy reconciliation.
- GreenQube is infrastructure/private cloud hosting.
- Service brands are TBI AIOps and TBI Ollama.

## Status legend

- NOT_STARTED
- IN_PROGRESS
- PASS
- FAIL_CONFIRMED
- BLOCKED
- NEEDS_AUTH_SESSION
- FIX_PR_OPEN
- FIX_MERGED
- POST_DEPLOY_PASS
- DEFERRED_OWNER_DECISION

## Master certification table

| GT ID | Feature area | Current status | Evidence | Confirmed gaps | Golden Task | Fix PR | Production smoke |
|---|---|---|---|---|---|---|---|
| GT-002-01 | Public homepage and public pages | POST_DEPLOY_PASS | docs/gt-002/GT-002-HOMEPAGE-CLOSEOUT.md | Earlier GET/HEAD 500 fixed | GT-002-01 / 01B / 01C | #580 #581 #582 #583 #585 | GET/HEAD 200 |
| GT-002-02 | Registration / login / logout / password reset | NOT_STARTED |  | Possible AUTH_FAIL exceptions need controlled test |  |  |  |
| GT-002-03 | User dashboard | NOT_STARTED |  | Needs authenticated session test |  |  |  |
| GT-002-04 | Wallets | NOT_STARTED |  | Needs authenticated session test |  |  |  |
| GT-002-05 | Alerts | NOT_STARTED |  |  |  |  |  |
| GT-002-06 | Budgeting | NOT_STARTED |  | Guest API 401 likely expected; needs auth test |  |  |  |
| GT-002-07 | Investments / predictions | NOT_STARTED |  | Guest entitlement 403 likely expected; mixed API behavior needs review |  |  |  |
| GT-002-08 | Referrals | NOT_STARTED |  |  |  |  |  |
| GT-002-09 | Support / contact / tickets | NOT_STARTED |  | Contact route variants need confirmation |  |  |  |
| GT-002-10 | Blog / knowledgebase / docs | NOT_STARTED |  | BlogModel table missing warning needs confirmation |  |  |  |
| GT-002-11 | Management/admin controls supporting user workflows | NOT_STARTED |  | Needs admin auth/session test only where user workflows depend on it |  |  |  |
| GT-002-12 | UI-dependent APIs | NOT_STARTED |  | Budget and investments UI APIs need authenticated vs guest expected-status matrix |  |  |  |

## Current evidence-based observations

- Homepage GET and HEAD are passing after PRs #580-#583.
- `system_errors` table is still missing, but error ingestion now skips safely.
- Login view renders.
- Some login attempts show AUTH_FAIL exceptions and migrated hash compatibility warnings; controlled auth testing is required.
- Budget UI APIs return 401 for unauthenticated requests; this may be correct.
- Investments analytics APIs return 403 for guest entitlement checks; this may be correct.
- Forecast highlights API has returned 200.
- BlogModel table missing warnings require GT-002-10 verification.
- Repeated 404_ROUTE entries should be triaged after primary feature flows.

## Testing standard per feature

Each feature lane must produce:

- route inventory evidence
- controller/view evidence
- guest HTTP smoke where applicable
- authenticated HTTP smoke where applicable
- expected status matrix
- confirmed defect list
- Golden Task files for confirmed defects only
- PR references for fixes
- post-deploy smoke after fixes

## Next action

Start GT-002-02 Auth functional certification.
