# AIOps Next Steps

## 2026-02-07 Codex Append

### Newly discovered gaps
- `routes:list` is still referenced by AI-Ops Spark checks but unresolved in this pass.

### Deferred risks
- Route-audit command compatibility requires a human decision on expected output contract before implementation.

### Suggested future scans
- Keep `app:healthcheck` in spark validation and track pass/fail trend.
- Add a focused scan for command whitelist drift (`ops:commands:audit`) after each command add/remove.
