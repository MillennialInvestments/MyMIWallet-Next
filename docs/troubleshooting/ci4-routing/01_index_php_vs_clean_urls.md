# CI4 Routing: index.php vs Clean URLs

## Title + Scope
Fix situations where `/Dashboard` fails but `/index.php/Dashboard` works on the MyMI Wallet (CodeIgniter 4) stack behind user-space NGINX.

## Symptoms
- `/Dashboard` returns 404/500 while `/index.php/Dashboard` succeeds.
- Only routes prefixed with `/index.php/` work.
- Clean URLs stop working after NGINX or proxy changes.

## Root cause (most likely)
- Missing or incorrect `try_files` / rewrite rules in NGINX for the app’s document root.
- Reverse-proxy mismatch where the edge server does not forward URI/query string correctly.

## Safety notes
- Validate NGINX config with `nginx -t` before reloads.
- Ensure the document root points to `$HOME/mymiwallet/site/current/public`.
- Commands are read-only except for the config edit.

## Command Set (copy/paste blocks)
```bash
# 1) Confirm document root and existing location block
rg "root .*mymiwallet/site/current/public" "$HOME/nginx/conf" -n || true

# 2) Apply/verify the clean URL location block (inside the server block)
cat <<'NGINX_BLOCK'
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
NGINX_BLOCK

# 3) Config test
"$HOME/nginx/sbin/nginx" -p "$HOME/nginx" -c conf/nginx.conf -t

# 4) Curl checks (replace BASE as needed)
BASE="https://www.mymiwallet.com"
curl -I "$BASE/Dashboard" -k
curl -I "$BASE/index.php/Dashboard" -k
```

## Expected Output
- `nginx -t` succeeds.
- `curl -I .../Dashboard` returns `200`, `301`, or `302` (depending on auth/redirects).
- `curl -I .../index.php/Dashboard` returns similar status; both should be consistent.

## If output differs → Branch A/B/C steps
- **Branch A: `/Dashboard` 404 but `/index.php/Dashboard` works** → Ensure `try_files $uri $uri/ /index.php?$query_string;` exists inside the correct `server` block.
- **Branch B: Both fail** → Check document root and upstream PHP-FPM/fastcgi parameters.
- **Branch C: Clean URL hits wrong app** → Verify reverse proxy upstream target and Host header forwarding.

## Fix steps
1. Place the `location / { try_files $uri $uri/ /index.php?$query_string; }` block inside the app’s `server` block.
2. Confirm the root points to `$HOME/mymiwallet/site/current/public`.
3. Run `nginx -t`, then reload with the user-space binary.

## Verification steps
- Re-run the curl checks for both `/Dashboard` and `/index.php/Dashboard`.
- Load the dashboard in a browser; confirm assets and redirects function.

## Rollback steps
- If the new block causes issues, restore the previous server block and rerun `nginx -t`.

## Notes / Follow-ups
- Keep `indexPage` empty in CI4’s `app/Config/App.php` when relying on clean URLs.
- Use [Smoke Routes](../scripts/01_smoke_routes_usage.md) for quick regression checks after changes.
