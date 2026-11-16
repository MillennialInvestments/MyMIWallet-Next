# Dependabot triage and duplicate-email plan (2026-11-15)

Nothing here has been merged or run. Package upgrades need their own go-ahead,
and each one should go to staging first (`mymi-staging.sh deploy <sha>`, then
`form-test`) before live.

## Dependabot PRs (16 open)

The CI on these ran on 2026-11-14, before #703 to #716 landed, so each needs a
rebase (`@dependabot rebase`) and a fresh CI run before merging.

### Safe now: patch or minor, used code paths unchanged
| PR | Change | Where | Note |
|---|---|---|---|
| #692 | compression 1.8.1 to 1.8.2 | chat | patch |
| #690 | mysql2 3.16.0 to 3.24.6 | chat | minor; restart chat service after deploy |
| #686 | codeigniter4/settings 2.3.0 to 2.4.0 | PHP | minor, CI green |
| #685 | predis/predis 3.4.1 to 3.7.1 | PHP | minor; Redis cache + RedisService |
| #689 | codeigniter4/shield 1.3.0 to 1.4.1 | PHP | minor; Shield is installed but login still uses Myth, so low risk. Run auth-smoke. |

### Majors that need a code check first
| PR | Change | Risk |
|---|---|---|
| #702 | guzzlehttp/guzzle 7 to 8 | 29 files use Guzzle directly; major API changes. Hold until a branch runs the full suite and the Plaid, Postmark and AI calls on staging. |
| #684 | chillerlan/php-qrcode 5 to 6 | Used only by TwoFactorService (2FA QR). Check the QROptions API on staging; 2FA enrolment breaks if wrong. |
| #687 | express-rate-limit 7 to 8 | chat server uses rateLimit(); v8 changes how IPv6 clients are keyed. Check the options on staging, then merge. |
| #691 | dotenv 16 to 18 | chat; dotenv.config() still works, but v17+ prints a log line on load. Low risk. |

### GitHub Actions majors
| PR | Change | Note |
|---|---|---|
| #681 | actions/checkout 4 to 7 | used in 16 workflows; check runner Node version, then merge |
| #682 | actions/upload-artifact 4 to 7 | artifact names must be unique per run in v4+ (already true) |
| #683 | actions/create-github-app-token 1 to 3 | aiops-pr-factory only; check its inputs against the v3 README before merge. |

### Mobile app (mobile/, Expo 51): close, do not merge one by one
#695 expo-router 3 to 58 (sic), #694 react-native-safe-area-context 4 to 5,
#693 typescript 5 to 7, #688 react-native 0.74 to 0.88. These only work as one
Expo SDK upgrade done together (`npx expo install --fix`). Close them and add
an `ignore` for `mobile/` majors in `.github/dependabot.yml` until the app is
in scope.

Suggested order: rebase and merge #692, #690, #686, #685, #689 as one batch;
then #687 and #691 with the small chat fix; then the Actions bumps; Guzzle and
QR code last, each with its own staging pass.

## Duplicate-email accounts (blocks ShieldIdentityBackfill)

`ShieldIdentityBackfill` stops if two `bf_users` rows share an email after
lower-casing and trimming. It counts soft-deleted rows too, so the 1,845 spam
accounts deleted on 2026-11-14 still count. At last check there were 4 visible
duplicate groups.

1. **Report (read-only).** `mysql <db> < scripts/ops/db/duplicate-emails-report.sql`
   prints the group count, then one line per group with a masked email and
   each account as `id:deleted:active:last_login`.
2. **Pick a keeper per group.** The visible, active account with the latest
   `last_login` wins. Spam rows (deleted=1) can never be keepers.
3. **Move what the others own.** Before retiring a duplicate, check for rows
   pointing at it (wallets, budgets, trades, referrals, subscriptions). If any
   exist, move them to the keeper in one transaction.
4. **Retire the duplicates.** Rewrite their email to
   `dup+<id>@retired.invalid`, keep `deleted=1`, and log old and new values in a
   CSV kept off the repo. This frees the address and loses nothing.
5. **Do it on staging first**, then run `ShieldIdentityBackfill` on staging
   only. Moving prod login to Shield is a separate decision. The ADR from #703
   keeps the legacy login for now.

Steps 3 and 4 are production data changes. They need Tim's go-ahead after he
sees the step 1 report.
