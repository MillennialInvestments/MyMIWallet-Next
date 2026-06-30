# GT-001B Route Guard Classification Matrix

## Status

Documentation-only stacked Golden Task built from GT-001 evidence.

## Business Objective

Classify every discovered MyMI Wallet route into an explicit launch access class before any auth implementation changes.

## Source Evidence

- GT-001 audit PR branch: `feature/mymi-gt001-identity-access-readiness-audit`
- Parsed route source: `/tmp/mymi-gt001-evidence/routes.parsed.csv`
- GT-001 summary: `docs/gtm/mymi/evidence/gt001/routes.summary.v3.md`

## Safety Boundary

- No production mutation.
- No route behavior changes.
- No controller/filter/config changes.
- Documentation-only.
- Raw runtime JSON remains excluded.

## Route Class Model

| Class | Meaning |
|---|---|
| PUBLIC | Safe public page, asset, health endpoint, legal page, marketing page, or login/register lifecycle route. |
| USER_AUTH | Authenticated web-user route requiring login/authcheck/auth. |
| ADMIN_AUTH | Admin or privileged route requiring permission or role guard. |
| API_TOKEN | API route requiring API token or equivalent service authentication. |
| INTERNAL | Cron, internal, worker, ops, or service route requiring cron key/internal token or network-level restriction. |
| STATEFUL_PUBLIC | Public lifecycle route that changes state and requires CSRF/explicit owner approval. |
| DEPRECATED_OR_DISABLED | Debug, dev, test, unreachable, disabled, or non-launch route requiring removal/disablement or owner approval. |

## Classification Counts

| Class | Count |
|---|---:|
| PUBLIC | 103 |
| USER_AUTH | 756 |
| ADMIN_AUTH | 59 |
| API_TOKEN | 555 |
| INTERNAL | 202 |
| STATEFUL_PUBLIC | 16 |
| DEPRECATED_OR_DISABLED | 44 |

## Classification Status Counts

| Status | Count |
|---|---:|
| OK | 984 |
| MISSING_GUARD | 663 |
| REVIEW_REQUIRED | 88 |

## Recommended GT-001C Action Counts

| Action | Count |
|---|---:|
| add_or_confirm_api_token_guard | 547 |
| add_or_confirm_csrf_for_public_lifecycle_route | 6 |
| add_or_confirm_internal_token_or_cron_guard | 64 |
| add_or_confirm_login_authcheck_guard | 46 |
| none | 984 |
| owner_review_before_launch | 88 |

## Launch Interpretation

Routes marked `OK` have an explicit classification and recognized guard posture.

Routes marked `MISSING_GUARD` are the GT-001C implementation candidates. They require code review and likely route/filter changes before launch.

Routes marked `REVIEW_REQUIRED` need owner review before deciding whether to make them public, protect them, disable them, or move them behind internal guards.

## Generated Evidence

- `docs/gtm/mymi/evidence/gt001b/route-guard-classification.csv`
- `docs/gtm/mymi/evidence/gt001b/classification-counts.csv`
- `docs/gtm/mymi/evidence/gt001b/domain-classification-counts.csv`
- `docs/gtm/mymi/evidence/gt001b/public-allowlist.md`
- `docs/gtm/mymi/evidence/gt001b/user-auth-routes.md`
- `docs/gtm/mymi/evidence/gt001b/admin-auth-routes.md`
- `docs/gtm/mymi/evidence/gt001b/api-token-routes.md`
- `docs/gtm/mymi/evidence/gt001b/internal-routes.md`
- `docs/gtm/mymi/evidence/gt001b/stateful-public-review.md`
- `docs/gtm/mymi/evidence/gt001b/deprecated-or-disabled-review.md`
- `docs/gtm/mymi/evidence/gt001b/gt001c-implementation-backlog.md`

## Recommended Next Golden Task

**GT-001C: Implement Route Guard Corrections**

## GT-001C Objective

Implement the smallest safe guard corrections from the GT-001B backlog, starting with the highest-risk MISSING_GUARD routes by domain.

## GT-001C Sequencing

1. Confirm public allowlist.
2. Confirm deprecated/disabled route list.
3. Fix malformed/doubled handler routes.
4. Add or confirm guards for state-changing routes.
5. Add or confirm API token/internal token guards.
6. Add or confirm user/admin guards.
7. Run route smoke tests and auth regression tests.

## Validation Commands

```bash
git status --short
git diff --check
test -s docs/gtm/mymi/GT001B_ROUTE_GUARD_CLASSIFICATION_MATRIX.md
test -s docs/gtm/mymi/evidence/gt001b/route-guard-classification.csv
test -s docs/gtm/mymi/evidence/gt001b/gt001c-implementation-backlog.md
grep -n "PUBLIC\|USER_AUTH\|ADMIN_AUTH\|API_TOKEN\|INTERNAL\|STATEFUL_PUBLIC\|DEPRECATED_OR_DISABLED" docs/gtm/mymi/GT001B_ROUTE_GUARD_CLASSIFICATION_MATRIX.md
Rollback Notes

No production rollback applies. This is documentation-only. If classification is wrong, amend the branch before merge or revert the documentation PR after merge.
