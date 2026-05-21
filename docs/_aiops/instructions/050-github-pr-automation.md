# 050 — GitHub PR Automation (MyMI Wallet)

## Objective
Enable safe PR automation while preserving repository review controls.

## Rules
- No auto-merge.
- Require generated artifacts for command-gap updates.
- Require rollback notes in PR description.
- Require AIOps follow-up status section.

## Operational command hooks
- `aiops:pr:auto`
- `aiops:pr:create`
- `ops:propose-pr`

## Validation
- Confirm branch cleanliness and artifact presence before PR creation.
- Confirm `next-steps.md` reflects unresolved work.
