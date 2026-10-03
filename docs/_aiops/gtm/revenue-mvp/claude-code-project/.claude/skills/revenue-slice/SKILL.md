---
name: revenue-slice
description: "Define and execute ONE bounded Revenue MVP repair slice (REV-Sxxx) inside the exact AIOps-authorized worktree and scope. Use for each defect on the revenue path."
disable-model-invocation: true
---
# /revenue-slice
Take one defect at a time. Write the slice record before touching code. Required fields:
SLICE_ID, TASK_ID, OBJECTIVE_ID, WORKTREE, BRANCH, BASE_SHA, PROBLEM, REVENUE_IMPACT, EVIDENCE, ALLOWED_PATHS, FORBIDDEN_PATHS, PATCH_INTENT, TARGETED_TESTS, REGRESSION_TESTS, ROLLBACK, PASS_CONDITION, FAIL_RECOVERY, SUCCESSOR, HUMAN_GATE.

Mutation preconditions (all must hold or STOP): worktree is the AIOps-assigned one; branch matches; status clean or expected; objective, recipe, scope, allowlist, rollback present; `ai check` and `ai next` agree this slice is next. Edits only inside ALLOWED_PATHS; anything else becomes a successor slice. Do not mix unrelated fixes. Do not hand-edit AIOps state. Do not commit/merge when `ai finish` owns closeout.
Loop (finite, max 3 attempts per slice): detect -> diagnose -> correct -> /revenue-test -> preserve evidence. Same command failing twice with unchanged evidence: STOP REPEATED_FAILURE. Payments, credentials, DB migrations, pricing and legal are human gates: stop and print the exact approval needed.
