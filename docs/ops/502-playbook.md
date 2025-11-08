# 502 Bad Gateway Recovery Playbook

## Symptoms
- Users report `502 Bad Gateway` for both static assets and dynamic PHP routes.
- Browser developer tools show 502 responses for `/` and `/index.php`.
- Health checks such as `/healthz` or `/api/health` return 502.
- Nginx logs contain `upstream` errors or `connection refused` to `127.0.0.1:9072`.

## Primary Suspects
1. PHP upstream (built-in server) not running or listening on port `9072`.
2. Nginx reverse proxy misconfigured (wrong port, missing keepalive, HEAD request mismatch).
3. Long-running PHP request causing upstream timeout (API calls, scraping jobs, heavy reports).
4. Vite dev client accidentally enabled in production, leading to proxying to non-existent `/@vite/client`.
5. CodeIgniter 4 front controller or routing misconfiguration preventing `index.php` from handling requests.

## Quick Checks
Use the helper scripts in `scripts/stack/`:

```bash
bash scripts/stack/check_stack.sh
```

This script verifies listening ports, performs local health checks, and tails the latest Nginx and CI logs.

Additional one-liners:

```bash
ss -ltnp | awk '/:9001|:9072/ {print $0}'
curl -I http://127.0.0.1:9001/healthz
curl -I http://127.0.0.1:9072/
tail -n 100 ~/nginx/logs/error.log
```

## Recovery Steps
1. Start or restart the PHP built-in server:
   ```bash
   bash scripts/stack/start_php_devserver.sh 9072
   ```
2. Reload user-space Nginx:
   ```bash
   bash scripts/stack/restart_nginx.sh
   ```
3. Run stack checks again to confirm the fix:
   ```bash
   bash scripts/stack/check_stack.sh
   ```

## Preventing Recurrence
- Ensure `.env` has `CI_ENVIRONMENT=production` and Vite dev server flags disabled.
- Keep Nginx config synced with `nginx/sites-available/mymiwallet.conf` in repo.
- Use the smoke test script after each deploy: `bash scripts/tests/smoke.sh`.
- Long-running operations should be moved to queues or CRON jobs.
- Update `deploy/RELEASE_TAG` during deploys for quick rollback.

## Rollback Procedure
1. Set `deploy/RELEASE_TAG` to last known-good tag or SHA.
2. Execute the rollback script:
   ```bash
   bash scripts/deploy/rollback_to_release.sh
   ```
3. Run the quick fix script if needed:
   ```bash
   bash scripts/stack/quick_fix_502.sh
   ```
4. Confirm with `bash scripts/tests/smoke.sh`.
