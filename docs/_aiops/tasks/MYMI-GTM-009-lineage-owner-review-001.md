---
task_id: MYMI-GTM-009-LINEAGE-REVIEW-001
repo_key: mymiwallet-next
repo_name: MillennialInvestments/MyMIWallet-Next
source_agent: TBI AIOps GTM-009
target_agent: TBI AIOps
source_branch: feature/mymi-gtm-009-reconcile-open-pull-request-and-stacked-branch-lineage
source_pr: 647
base_branch: main
risk_level: high
priority: P0
status: queued_owner_review
model_preference: TBI Ollama
requires_human_approval: true
---

# GTM-009 atomic owner-gated PR lineage follow-up

## Objective
Certify outstanding live PR and stacked-branch relationships using exact-head evidence. Do not mark GTM-009 completed or merge/close/deploy anything from this handoff alone.

## Background
PR #647 implements the GTM-009 inventory and offline tests. Its evidence report is marked OWNER REVIEW REQUIRED. An exact-head code review identified that unfinished work must have a structured AIOps handoff under docs/_aiops/tasks/, as required by AGENTS.md.

## Current State
Source: docs/_aiops/gtm/scripts/mymi_gtm_009_pr_lineage.py. Tests: docs/_aiops/gtm/tests/test_mymi_gtm_009_pr_lineage.py. Report: docs/_aiops/gtm/evidence/MYMI-GTM-009_PR_LINEAGE_RECONCILIATION.md. Previously merged PRs #630, #632, #634, and #637 do not by themselves certify Golden Tasks. Open #623, #629, #631 and #633 need owner disposition. PR #647 has exact-head review and merge gates.

## What Needs To Change
1. Refresh the read-only open-PR inventory and compare current patches/commit identities before claiming overlap or supersession.
2. Check non-main stack parents against branch AND repository identity, including fork collisions.
3. Present exact evidence and owner decision options for #623, #629, #631, #633; no automated close, merge or deployment.
4. Reconcile corresponding Golden Task IDs, acceptance, negative/failure cases and dependencies. Preserve outstanding items and create atomic successors rather than claiming unsupported completion.
5. Record owner-gated decisions, risks, rollback and accepted evidence before closing this handoff.

## Files To Inspect
- AGENTS.md and docs/_aiops/task-schema.md
- docs/_aiops/gtm/tasks.csv
- docs/_aiops/gtm/scripts/mymi_gtm_009_pr_lineage.py
- docs/_aiops/gtm/tests/test_mymi_gtm_009_pr_lineage.py
- docs/_aiops/gtm/evidence/MYMI-GTM-009_PR_LINEAGE_RECONCILIATION.md
- GitHub PRs #623, #629, #630, #631, #632, #633, #634, #637 and #647.

## Files To Avoid
Production /apps/TBI/www/mymiwallet/current; secrets, .env, credentials, vendor/, writable/ history, unrelated worktrees and existing historical evidence.

## Commands To Run
- gh pr checks 647 --repo MillennialInvestments/MyMIWallet-Next
- gh pr view 647 --repo MillennialInvestments/MyMIWallet-Next --json number,url,state,headRefOid,mergeStateStatus
- python3 -m unittest discover -s docs/_aiops/gtm/tests -p test_mymi_gtm_009_pr_lineage.py -v
- python3 docs/_aiops/gtm/scripts/mymi_gtm_009_pr_lineage.py --repo-root .
- git diff --check

## Acceptance Criteria
- Positive: current exact-head evidence supports every PR disposition and stack parent.
- Negative: stale PR heads, absent patch proof, or fork branch collisions cannot generate false findings.
- Authorization: each PR close/merge and any production change needs its own owner approval.
- Failure: GitHub unavailability or changed source heads prevents task certification without erasing evidence.
- Owner decides disposition of unresolved PRs; each Golden Task gets independent acceptance proof and its own lifecycle.

## Risks
GitHub branches/PRs change; a merged patch is not whole-task certification. Avoid speculative supersession and duplicate controllers.

## Rollback Notes
Additive nonproduction handoff only. A separately approved corrective commit can reverse this document; preserve mission, CI and review history. Never rollback production.

## Final Report Requirements
List exact task IDs, PR heads, evidence links, tests, owner gates, corrective PRs, accepted decisions, outstanding successors, risk and rollback. Keep this task queued until owner-verifiable evidence is complete.
