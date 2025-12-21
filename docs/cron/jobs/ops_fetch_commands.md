# ops_fetch_commands

## Purpose
Poll the ops mailbox and store validated commands into `bf_ops_command_inbox`.

## Schedule
Every 10 minutes.

## Entrypoint
`php spark ops:fetch-commands`

## Inputs
- `MYMI_OPS_IMAP_HOST`, `MYMI_OPS_IMAP_USER`, `MYMI_OPS_IMAP_PASS`
- `MYMI_OPS_ALLOWED_SENDERS` (comma-separated)
- `MYMI_OPS_EMAIL_TOKEN` (shared secret in body)

## Outputs
- JSON per message indicating insert result and status.

## Failure modes
- IMAP connection errors.
- Sender not allowlisted.
- Missing or invalid token.
- YAML parse failures flagged as security events.

## Logging locations
- `bf_error_logs` (summaries only, no secrets).
- stdout for cron capture.

## Rollback
Re-run command after correcting env; unread emails remain in inbox until successfully inserted.

## Manual run command (SSH-safe)
```bash
php spark ops:fetch-commands
```

## Security notes
- Strips HTML, avoids logging secrets, and only marks emails read on successful insert.
