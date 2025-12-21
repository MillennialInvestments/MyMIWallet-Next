# ops_analyze_commands

## Purpose
Convert parsed inbox entries into AI summaries and JSON execution plans.

## Schedule
Every 20 minutes (after `ops_fetch_commands`).

## Entrypoint
`php spark ops:analyze-commands`

## Inputs
- `OPENAI_API_KEY`
- `OPENAI_MODEL` (optional; defaults to provider default)

## Outputs
- Updates `bf_ops_command_inbox.ai_summary`, `ai_plan_json`, `status` (`Ready`/`Failed`/`Blocked`).
- CLI JSON log per processed item.

## Failure modes
- Missing OpenAI key -> status `Blocked`.
- HTTP/parse errors -> status `Failed` with reason in meta.

## Logging locations
- `bf_error_logs` for failures (redacted).
- stdout for cron capture.

## Rollback
Re-run command after fixing API issues; existing records will be retried if still `Parsed`/`Failed`.

## Manual run command (SSH-safe)
```bash
php spark ops:analyze-commands
```

## Security notes
- Never includes secrets in prompts or logs; security flags remain attached to inbox entries.
