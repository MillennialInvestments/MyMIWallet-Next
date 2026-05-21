# 010 — Command Gap Implementation Plan (MyMI Wallet)

## Decision framework
When a central baseline command exists but MyMI Wallet differs:

1. **Add directly** when the behavior is domain-critical to fintech workflows.
2. **Add a shim** when MyMI Wallet only needs compatibility/event forwarding.
3. **Mark not applicable** when command assumptions are control-plane-only.
4. **Extract shared module/service** when same logic will be reused by multiple repositories.

## Initial implementation priorities
- Priority A: telemetry/reporting compatibility commands needed for central visibility.
- Priority B: shim wrappers for control-plane command names that map to existing local equivalents.
- Priority C: shared service abstraction for command inventory + gap export (JSON/Markdown emitter).

## Required outputs per iteration
- Update `docs/_aiops/reports/aiops-command-gap-matrix.*`.
- Queue deferred work in `docs/_aiops/tasks/`.
- Update `docs/_aiops/instructions/next-steps.md` with any unfinished items.
