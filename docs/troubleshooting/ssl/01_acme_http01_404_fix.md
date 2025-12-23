# ACME http-01 404 / Unauthorized Fix

## Title + Scope
Resolve acme.sh http-01 challenges returning 404 or unauthorized for MyMI Wallet on DreamHost with user-space NGINX.

## Symptoms
- `Invalid response from http://example.com/.well-known/acme-challenge/...` (404 or unauthorized)
- acme.sh renewal fails with http-01 challenge
- Validation succeeds for `/index.php` routes but fails for `/.well-known/acme-challenge/*`

## Root cause (most likely)
Let’s Encrypt validates via the public edge on ports 80/443. The challenge path is not mapped to the correct webroot or is intercepted by another server/proxy.

## Safety notes
- Do not stop production services.
- Keep tests read-only; no sudo.
- Use `-k` with curl if the cert is expired during testing.

## Command Set (copy/paste blocks)
```bash
BASE_DOMAIN="www.mymiwallet.com"
WEBROOT="$HOME/mymiwallet/site/current/public"

# 1) Create a probe file in the expected webroot
mkdir -p "$WEBROOT/.well-known/acme-challenge"
echo "ping-ok" > "$WEBROOT/.well-known/acme-challenge/ping.txt"

# 2) Test over http and https
echo "HTTP test:"; curl -i "http://$BASE_DOMAIN/.well-known/acme-challenge/ping.txt"
echo "HTTPS test (ignoring cert errors if expired):"; curl -ik "https://$BASE_DOMAIN/.well-known/acme-challenge/ping.txt"

# 3) Check redirect chain for the challenge path
curl -IkL "http://$BASE_DOMAIN/.well-known/acme-challenge/ping.txt"

# 4) Confirm edge is hitting the intended webroot
ls -l "$WEBROOT/.well-known/acme-challenge"

# 5) If using user-space nginx, ensure the alias exists inside the server block
cat <<'NGINX_SNIPPET'
location ^~ /.well-known/acme-challenge/ {
    alias $HOME/mymiwallet/site/current/public/.well-known/acme-challenge/;
    try_files $uri =404;
}
NGINX_SNIPPET
```

## Expected Output
- `curl` returns `200` for `ping.txt` over http and https (with `-k` if needed).
- Redirect chain, if any, still lands on the same content and status 200.
- The challenge file is visible in the expected webroot.

## If output differs → Branch A/B/C steps
- **Branch A: HTTP 404** → Ensure the alias/try_files block exists in the edge server (Apache/Nginx) that actually terminates port 80.
- **Branch B: HTTPS 404 but HTTP 200** → SSL vhost may differ; add the same alias to the SSL server block.
- **Branch C: Edge not pointing to user-space nginx** → Create the alias on the public edge (Apache) or proxy the path to the user-space nginx location.

## Fix steps
1. Add an alias/try_files block for `/.well-known/acme-challenge/` on the edge vhost that handles ports 80/443.
2. Reload the edge server (or request DreamHost panel reload) after `nginx -t`/`apachectl -t` passes.
3. Re-run the curl tests for `ping.txt` until you receive 200.
4. Retry `~/.acme.sh/acme.sh --renew -d $BASE_DOMAIN --debug --log /tmp/acme_renew.log`.
5. If webroot mapping is impossible, switch to DNS-01 with acme.sh DNS provider.

## Verification steps
- `curl -Ik http://$BASE_DOMAIN/.well-known/acme-challenge/ping.txt` returns 200.
- acme.sh renewal completes without 404/unauthorized.

## Rollback steps
- Remove temporary `ping.txt` if not needed.
- Revert vhost changes if they introduce new routing issues.

## Notes / Follow-ups
- Always remember: Let’s Encrypt hits the public edge on 80/443; user-space ports must be bridged via the edge.
- Consider adding a persistent health probe at `.well-known/acme-challenge/ok.txt` for future checks.
- Keep DNS-01 documented as fallback when HTTP-01 paths are blocked.
