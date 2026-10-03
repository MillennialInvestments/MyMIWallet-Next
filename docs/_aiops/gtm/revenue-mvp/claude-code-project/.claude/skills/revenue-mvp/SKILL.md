---
name: revenue-mvp
description: "Master workflow for the MyMI Revenue MVP. Reconciles AIOps state, selects the MVP, builds bounded repair slices, drives them via /revenue-slice and /revenue-test, then hands off or certifies. Use when asked to progress, resume, or report on the revenue MVP."
---
# /revenue-mvp (master)
Do not blindly edit source. TBI AIOps decides mutation authorization. Stay inside the discovery budget in CLAUDE.md.

1. Identify location: `git rev-parse --show-toplevel`, branch, HEAD; `git fetch origin main`; `git status --short`; `ai check`; `ai next`. Classify: canonical read-only | authorized worktree | production (STOP) | unknown. Print the compact session report from CLAUDE.md.
2. If `ai check/next` does not list the Revenue MVP objective: STOP with BLOCKED_OBJECTIVE_UNREGISTERED and run /revenue-handoff (registration is an AIOps action, not a hand edit).
3. If docs/_aiops/gtm/revenue-mvp/README.md has no REVENUE_MVP_SELECTED, run /revenue-discover (it uses the revenue-discovery agent). Otherwise reuse the recorded selection unless origin/main changed the relevant files.
4. Reconcile with the GTM catalog (docs/_aiops/gtm/tasks.csv: GTM-039/041/042/043/055/057) and live AIOps state. Completed -> verify evidence, do not redo. Partial -> smallest successor delta. Do not make the whole platform a prerequisite.
5. Build bounded slices REV-S001.. (fields in /revenue-slice). One defect per slice.
6. For the current slice run /revenue-slice then /revenue-test. Record evidence. Continue to the next authorized slice while scope permits.
7. Stop only at a genuine human gate (see CLAUDE.md) and print the exact token/action.
8. When Normal ChatGPT must take over, run /revenue-handoff. After implementation and tests pass, run /revenue-certify.
Never claim a readiness state the evidence does not support.
