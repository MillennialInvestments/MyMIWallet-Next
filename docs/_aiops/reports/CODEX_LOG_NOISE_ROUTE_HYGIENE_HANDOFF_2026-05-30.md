# Codex Handoff — Fix MyMI Wallet Log Noise and Route Hygiene

## Repository
MyMI Wallet production repo worktree.

## Branch
fix/log-noise-route-hygiene-2026-05-30

## Worktree
/home/mymiteam/Apps/Worktrees/mymiwallet-log-hygiene

## Task
Fix production log noise, misleading `[404_ROUTE]` errors, security probe classification, route hygiene, and noisy debug logging.

## Baseline Findings
The baseline scan identified these target files:

- `app/Config/Routes.php`
  - Contains `[404_ROUTE]` logging around line 69.
  - Current logger appears to choose `notice` for hostile probes and `error` otherwise.
  - Needs structured classification and `HEAD /` handling.

- `app/Controllers/BaseController.php`
  - Around line 199: `[TRACE]`
  - Around line 1195: `Optional view path missing; using default path`
  - Around line 1223: `[VIEW_RESOLUTION] Render configuration`

- `app/Controllers/AuthController.php`
  - Around line 2188: `[AUTH_RENDER] Final render config`

- `app/Legacy/Auth/Controllers/AuthController.php`
  - Around line 1796: `[AUTH_RENDER] Final render config`

- `app/Libraries/MyMICoin.php`
  - Around line 39: `MyMICoin initialized ONCE`

- `app/Libraries/MyMIUser.php`
  - Around line 55: `MyMIUser L52 - initialized (first log).`

## Required Fixes

### 1. Fix `HEAD /` false 404s
Do not log `HEAD /` or `HEAD /index.php` as application errors.

Preferred:
- Add explicit lightweight `HEAD /` and `HEAD /index.php` handling if compatible with the current route structure.

Acceptable:
- In the 404 logger, classify `HEAD /` and `HEAD /index.php` as `health_probe` and log as `debug` or `notice`.

### 2. Replace generic duplicate `[404_ROUTE]`
Change generic `[404_ROUTE]` logging into one structured event per request:

`[404_ROUTE] method={METHOD} path={PATH} ip={IP} ua={UA} classification={CLASSIFICATION} referer={REFERER}`

Classifications:
- `health_probe`
- `security_probe`
- `legacy_redirect_missing`
- `app_route_missing`
- `unknown_404`

Severity:
- `health_probe`: debug or notice
- `security_probe`: notice or warning
- `legacy_redirect_missing`: warning
- `app_route_missing`: error
- `unknown_404`: notice or warning

### 3. Classify security probes
Classify these as `security_probe`:
- `/.git/*`
- `/wp-*`
- `/wp-content/*`
- `/adminfuns.php`
- `/sx_pms.php`
- `/wp-info.php`
- `/wp-test.php`
- `/like.php`
- `/we.php`
- `/wp.php`
- `/wp-indx.php`
- `/zoo.php`

### 4. Review missing/legacy routes
Inspect existing controllers and add only safe redirects/routes for:
- `/Investments/Trade-Tracker`
- `/User/Alerts`
- `/docs/discord/where_to_share_what.md`
- `/Exchange/NASDAQ`
- `/Management/Alerts/share-template`
- `/Premium-Features/Advanced-Trade-Tracker`
- `/Features/Advanced-Investment-Portfoio-Manager`
- `/Premium_Features/Brokerage-Integrations`

Do not invent controller methods.

### 5. Gate noisy debug logs
Wrap normal operational debug logs behind:

```php
if (ENVIRONMENT !== 'production' || filter_var(env('AIOPS_VERBOSE_LOGGING', false), FILTER_VALIDATE_BOOLEAN)) {
    log_message('debug', '...');
}
Target log lines:

[TRACE]
[VIEW_RESOLUTION] Render configuration
[AUTH_RENDER] Final render config
MyMICoin initialized ONCE
MyMIUser L52 - initialized (first log).
BudgetService ::setUserId
6. Reduce optional view warning spam

For Optional view path missing; using default path:

If fallback is expected, log only under verbose mode.
If fallback is unexpected, log once per request with missing path and fallback path.
Avoid duplicate warnings.
7. Improve /How-It-Works/alerts

Investigate App\Modules\Blog\Controllers\HowItWorksController::show.

The logs showed one request around duration_ms=5,709.74.

Cache or avoid public guest page service loading where safe.

Validation Commands

Run from the worktree:

cd /home/mymiteam/Apps/Worktrees/mymiwallet-log-hygiene

php spark routes > docs/_aiops/validation/routes-after-log-noise-route-hygiene-2026-05-30.txt 2>&1 || true

php spark logs:summarize --date=2026-05-29 > docs/_aiops/validation/log-summary-after-log-noise-route-hygiene-2026-05-30.txt 2>&1 || true

grep -RIn --exclude-dir=vendor \
  "\[404_ROUTE\]\|Optional view path missing\|\[TRACE\]\|MyMICoin initialized ONCE\|BudgetService ::setUserId\|MyMIUser L52\|\[VIEW_RESOLUTION\]\|\[AUTH_RENDER\]" \
  app/ public/ 2>/dev/null \
  > docs/_aiops/validation/post-patch-noise-grep-2026-05-30.txt || true

php spark cache:clear || true

git diff -- app/ public/ docs/
git status --short
Expected Outcome
HEAD / no longer logs as ERROR [404_ROUTE].
Security probes are classified separately.
Real missing app routes are still visible.
Debug noise is gated.
Optional view fallback warning spam is reduced.
Validation docs are updated.
