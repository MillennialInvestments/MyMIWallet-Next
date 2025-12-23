# 00 Master Checklist

Step-by-step actions Teddy should run from top to bottom. Each step links to a detailed runbook if deeper triage is needed.

1. **Baseline health**
   - Run [Daily Ops Quick Checks](../runbooks/00_daily_ops.md).
2. **NGINX status**
   - If reload/start fails or PID missing, follow [User-Space NGINX Start/Reload/PID](../nginx/01_user_space_nginx_start_reload_pid.md).
3. **NGINX config errors**
   - If you see `location directive is not allowed here`, follow [Location Directive Fix](../nginx/02_location_directive_not_allowed_here.md).
4. **Routing problems**
   - If `/Dashboard` fails but `/index.php/Dashboard` works, follow [CI4 Routing Runbook](../ci4-routing/01_index_php_vs_clean_urls.md).
5. **SSL/ACME issues**
   - For http-01 404/unauthorized, follow [ACME http-01 404 Fix](../ssl/01_acme_http01_404_fix.md).
   - For expired cert test failures, follow [Testing with Expired Cert](../ssl/02_testing_with_expired_cert.md).
   - For `Value is too large` crashes, follow [acme.sh Crash Mitigation](../ssl/03_acmesh_value_too_large_terminal_crash.md).
6. **App smoke + lint**
   - Run [Smoke Routes Script](../scripts/01_smoke_routes_usage.md) then [Lint Route Tokens](../scripts/02_lint_no_route_tokens_usage.md).
7. **Incident capture**
   - If this was an outage, log details using the [Incident Template](../templates/incident_template.md).
