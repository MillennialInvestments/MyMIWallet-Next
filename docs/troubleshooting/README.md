# MyMI Wallet Troubleshooting Knowledgebase

## Start Here
Use this troubleshooting collection whenever you need a reproducible, no-sudo recovery path on the DreamHost VPS. Begin with the master checklist and work downward until you reach the scenario that matches your symptoms.

## Run Order (Top-to-Bottom)
1. [00 Master Checklist](checklists/00_master_checklist.md)
2. [00 Daily Ops Quick Checks](runbooks/00_daily_ops.md)
3. [User-Space NGINX Start/Reload/PID Runbook](nginx/01_user_space_nginx_start_reload_pid.md)
4. [NGINX "location directive is not allowed here" Fix](nginx/02_location_directive_not_allowed_here.md)
5. [CI4 Routing: index.php vs Clean URLs](ci4-routing/01_index_php_vs_clean_urls.md)
6. [ACME/SSL http-01 404 or Unauthorized](ssl/01_acme_http01_404_fix.md)
7. [Testing with an Expired Certificate](ssl/02_testing_with_expired_cert.md)
8. [acme.sh "Value is too large" Crash Mitigation](ssl/03_acmesh_value_too_large_terminal_crash.md)
9. [Smoke Routes Script Usage](scripts/01_smoke_routes_usage.md)
10. [Lint Route Tokens Script Usage](scripts/02_lint_no_route_tokens_usage.md)

## When to Use This (Symptom → Doc)
- NGINX reload fails or PID missing → [User-Space NGINX Start/Reload/PID](nginx/01_user_space_nginx_start_reload_pid.md)
- NGINX reports `location` not allowed → [Location Directive Fix](nginx/02_location_directive_not_allowed_here.md)
- `/Dashboard` fails but `/index.php/Dashboard` works → [CI4 Routing Runbook](ci4-routing/01_index_php_vs_clean_urls.md)
- acme.sh reports http-01 unauthorized/404 → [ACME http-01 404 Fix](ssl/01_acme_http01_404_fix.md)
- curl fails with certificate expired (60) → [Testing with Expired Cert](ssl/02_testing_with_expired_cert.md)
- acme.sh crashes with "Value is too large" → [acme.sh Crash Mitigation](ssl/03_acmesh_value_too_large_terminal_crash.md)
- Need smoke test routes quickly → [Smoke Routes Usage](scripts/01_smoke_routes_usage.md)
- Need to lint route tokens outside Routes.php → [Lint Route Tokens Usage](scripts/02_lint_no_route_tokens_usage.md)

## Notes
- All commands are designed for a user-space NGINX and CI4 stack on DreamHost VPS with no sudo.
- Paths default to `$HOME/nginx` and `$HOME/mymiwallet/site/current/public` unless otherwise specified.
- Keep this index updated as new troubleshooting documents are added.
