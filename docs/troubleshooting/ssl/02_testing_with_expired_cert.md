# Testing with an Expired Certificate

## Title + Scope
Safely test endpoints when the public certificate is expired and curl/browser block the connection.

## Symptoms
- `curl: (60) SSL certificate problem: certificate has expired`
- Browser shows expired cert warnings but site still reachable with override

## Root cause (most likely)
Certificate NotAfter date passed, or local clock mismatch.

## Safety notes
- Use `curl -k` only for testing; do not rely on it for production automation.
- Do not change system time.

## Command Set (copy/paste blocks)
```bash
BASE="https://www.mymiwallet.com"

# 1) Test with insecure flag for quick reachability
curl -Ik "$BASE" -k

# 2) Inspect certificate dates
openssl s_client -servername "${BASE#https://}" -connect "${BASE#https://}:443" </dev/null 2>/dev/null | openssl x509 -noout -dates -subject

# 3) Check local clock
date -u
```

## Expected Output
- Curl with `-k` returns 200/301/302.
- `notBefore` and `notAfter` dates show the certificate timeline.
- Local UTC time is accurate.

## If output differs → Branch A/B/C steps
- **Branch A: `openssl s_client` fails to connect** → Network or TLS termination issue; verify edge server is listening.
- **Branch B: Local clock incorrect** → Fix VPS time sync before renewing.
- **Branch C: Certificate expired** → Renew via acme.sh or upload a fresh cert.

## Fix steps
1. Confirm reachability with `curl -k`.
2. Use acme.sh or your cert manager to renew the certificate.
3. Deploy the renewed cert to the edge and reload the web server.

## Verification steps
- `curl -I $BASE` (without `-k`) succeeds.
- `openssl s_client ... | openssl x509 -noout -dates` shows a future `notAfter`.

## Rollback steps
- If renewal fails, revert to the previous working certificate while investigating (if still valid). Otherwise keep `-k` for temporary testing only.

## Notes / Follow-ups
- Automate renewal reminders and run [check_cert_expiry.sh](../../scripts/check_cert_expiry.sh) daily.
