# UI Error & Support Regression

## Purpose
Guide manual validation of public/dashboard error pages and Support navigation after front-end changes.

## Prereqs
- Access to staging environment with feature branch deployed.
- Ability to tail PHP logs (`tail -f writable/logs/*.log`).
- Test account with dashboard access.

## Steps (CLI)
1. `php spark serve --port 8080` (or hit staging URL) and ensure CSP headers match expected nonce output.
2. Trigger simulated 403 by visiting a restricted dashboard route while logged out; confirm redirect timing and absence of PHP warnings.
3. Manually request `/non-existent-slug` to load 404 page; verify Support email is not sent repeatedly (check logs) and breadcrumbs render.
4. Run `curl -I https://<host>/Support` to confirm HTTP 200 and correct route handler.
5. Execute `curl -I https://<host>/Support/kb` ensuring namespace routes load without double `/Support` prefix.

## Validation
- Navbar toggler visible on mobile viewport (inspect via browser dev tools or `responsive` mode).
- Error pages share consistent styling and countdown where applicable.
- Support routes return 200 with expected HTML payload.
- No new entries in PHP logs indicating missing views or mail warnings.

## Rollback
- Revert offending front-end commits (`git revert <sha>`), redeploy previous build, and flush CDN caches if applicable.
- Restore original routes from backup (`git checkout HEAD^ app/Config/Routes.php`).
