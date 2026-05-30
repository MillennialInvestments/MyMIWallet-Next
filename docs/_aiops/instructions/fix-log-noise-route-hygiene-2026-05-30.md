# Fix Log Noise, 404 Route Hygiene, and Security Probe Classification

## Task
Fix MyMI Wallet production log noise and misleading `[404_ROUTE]` errors found in the 2026-05-29 and 2026-05-30 logs.

## Context
Current logs show repeated `HEAD /` requests being logged as `ERROR [404_ROUTE]`, noisy debug output, missing/legacy routes, security probes, optional view fallback warning spam, and one slow `/How-It-Works/alerts` request.

## Constraints
- CodeIgniter 4 compatible.
- DreamHost-safe.
- PHP 8.2 compatible.
- No sudo.
- Do not break existing routes.
- Do not hide real production errors.
- Do not create fake controller methods.
- Prefer redirects/aliases only when target routes/controllers exist.
- Keep changes focused.

## Required Work
1. Locate emitters for `[404_ROUTE]`, `[TRACE]`, `Optional view path missing`, `[VIEW_RESOLUTION]`, `[AUTH_RENDER]`, `MyMICoin initialized ONCE`, `BudgetService ::setUserId`, and `MyMIUser L52`.
2. Stop `HEAD /` and `HEAD /index.php` from logging as application errors.
3. Replace duplicate generic `[404_ROUTE]` logs with one structured log per request.
4. Classify 404s as `health_probe`, `security_probe`, `legacy_redirect_missing`, `app_route_missing`, or `unknown_404`.
5. Review/fix legitimate missing routes:
   - `/Investments/Trade-Tracker`
   - `/User/Alerts`
   - `/docs/discord/where_to_share_what.md`
   - `/Exchange/NASDAQ`
   - `/Management/Alerts/share-template`
   - `/Premium-Features/Advanced-Trade-Tracker`
   - `/Features/Advanced-Investment-Portfoio-Manager`
   - `/Premium_Features/Brokerage-Integrations`
6. Classify security probes such as `/.git/*`, `/wp-*`, `/wp-content/*`, and suspicious root PHP probe files.
7. Gate noisy debug logs behind non-production environment or `AIOPS_VERBOSE_LOGGING`.
8. Reduce optional view fallback warning spam.
9. Review `/How-It-Works/alerts` slow path and cache/optimize safely.
10. Improve `logs:summarize` to group 404s by method, path, and classification.

## Validation
Run:
```bash
php spark routes | grep -Ei "Trade-Tracker|User/Alerts|share-template|Exchange|Brokerage|Advanced-Investment|HEAD|Management/Alerts" || true
php spark logs:summarize --date=2026-05-29 || php spark logs:summarize
php spark routes > docs/_aiops/validation/routes-after-log-noise-route-hygiene-2026-05-30.txt
php spark logs:summarize > docs/_aiops/validation/log-summary-after-log-noise-route-hygiene-2026-05-30.txt
php spark cache:clear || true
git status --short
Desired Outcome
HEAD / no longer creates ERROR [404_ROUTE].
Security probes are classified separately.
Legitimate missing app routes are redirected or mapped correctly.
Optional view fallback warning spam is reduced.
Production debug noise is gated.
/How-It-Works/alerts slow path is documented and improved if safe.
logs:summarize becomes more actionable.
Validation docs are created.
