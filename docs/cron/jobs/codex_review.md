# codex_review

## Purpose
Generate automated Codex code review artifacts and prompt payloads for recent changes.

## Schedule
Recommended nightly at 02:00 local or weekly on Sunday at 02:00.

## Entrypoint
`php spark codex:review`

## Inputs
- Optional `REVIEW_LOOKBACK_COMMITS` (default 10)
- Optional `REVIEW_OUTPUT_DIR` (default `docs/codex/reviews`)

## Outputs
- `docs/codex/reviews/review-YYYY-MM-DD.md` (human-friendly summary)
- `docs/codex/reviews/review-prompt-YYYY-MM-DD.md` (payload for Codex)

## Failure modes
- Git unavailable or repo dirty in unexpected ways.
- Unable to write to docs directory (permissions).

## Logging locations
- stdout; failures logged via `log_message('error', ...)`.

## Rollback
Fix permissions or git availability and rerun. Files overwrite safely with latest run.

## Manual run command (SSH-safe)
```bash
php spark codex:review
```

## Security notes
- Contains no secrets; only summarizes git metadata and docs drift.
