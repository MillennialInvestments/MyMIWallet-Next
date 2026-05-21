# 060 — Ollama AIOps Worker Readiness (MyMI Wallet)

## Readiness checklist
- Command inventory export available.
- Gap matrix JSON schema stable.
- Docs + reports path conventions stable.
- Task queue path (`docs/_aiops/tasks/`) writable and documented.

## Worker expectations
- Worker reads instruction stack in numeric order.
- Worker appends deferred tasks with explicit owners + acceptance criteria.
- Worker avoids destructive runtime edits without explicit approval.

## Minimum artifact contract
- Updated command-gap matrix.
- Updated current-state report.
- Updated `next-steps.md` if any work was deferred.
