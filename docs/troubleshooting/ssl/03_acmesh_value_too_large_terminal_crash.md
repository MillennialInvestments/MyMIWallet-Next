# acme.sh "Value is too large" / Terminal Crash Mitigation

## Title + Scope
Handle noisy acme.sh renewals that overwhelm the terminal with `Value is too large` or similar messages, causing session instability.

## Symptoms
- acme.sh renewal floods terminal and crashes session
- Error message: `Value is too large` during renewal output
- Difficult to capture full logs for support

## Root cause (most likely)
Terminal buffer overflow or uncontrolled verbose output during renewal, possibly combined with large DNS responses or debug noise.

## Safety notes
- Use logging to files instead of stdout.
- Keep renewals read-only until verification; do not delete existing certs.

## Command Set (copy/paste blocks)
```bash
DOMAIN="www.mymiwallet.com"
LOGFILE="/tmp/acme_renew.log"

# 1) Run renewal with debug + log file
~/.acme.sh/acme.sh --renew -d "$DOMAIN" --debug 2 --log "$LOGFILE"

# 2) Capture full session with script to avoid terminal crashes
script -q /tmp/acme_renew.capture --command "~/.acme.sh/acme.sh --renew -d $DOMAIN --debug 2 --log $LOGFILE"

# 3) If output is still too large, redirect stdout/stderr
~/.acme.sh/acme.sh --renew -d "$DOMAIN" --debug 2 --log "$LOGFILE" > /tmp/acme_stdout.log 2>&1

# 4) Tail logs in a controlled way
tail -n 40 "$LOGFILE"
```

## Expected Output
- Renew command writes to `$LOGFILE` and exits cleanly.
- Capture file `/tmp/acme_renew.capture` stores the full transcript.

## If output differs → Branch A/B/C steps
- **Branch A: Log file not created** → Check permissions for `/tmp` and the `.acme.sh` directory.
- **Branch B: Renewal still noisy** → Lower debug level (omit `--debug`) and keep stdout redirected to a file.
- **Branch C: Renewal fails with validation errors** → Switch to the appropriate troubleshooting runbook (e.g., http-01 404 fix).

## Fix steps
1. Always run renewals with `--log` to avoid terminal overrun.
2. Use `script` to capture and replay when debugging is required.
3. Retry with reduced verbosity if the terminal remains unstable.

## Verification steps
- Check `$LOGFILE` for a successful `Cert success` message.
- Confirm cert files under `~/.acme.sh/$DOMAIN/` have updated timestamps.

## Rollback steps
- Delete temporary log files if they consume space.
- Revert to the previous cert deployment if a new cert is unusable.

## Notes / Follow-ups
- Consider using DNS-01 if HTTP-01 repeatedly fails; see [ACME http-01 404 Fix](01_acme_http01_404_fix.md).
- Keep renewals in cron with logging enabled to avoid interactive crashes.
