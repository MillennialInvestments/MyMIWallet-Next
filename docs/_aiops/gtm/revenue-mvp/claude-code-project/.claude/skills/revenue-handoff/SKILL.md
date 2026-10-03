---
name: revenue-handoff
description: "Generate or refresh docs/_aiops/gtm/revenue-mvp/NORMAL_CHATGPT_REVENUE_HANDOFF.md so Normal ChatGPT can continue through TBI AIOps without asking Claude to repeat discovery."
allowed-tools: Read, Grep, Glob, Bash(git:*), Bash(ai check:*), Bash(ai next:*), Write, Edit
---
# /revenue-handoff
Fill every field from live state, never memory: CURRENT_SHA, ORIGIN_MAIN_SHA, TASK_ID, OBJECTIVE_ID, WORKTREE, BRANCH, REVENUE_MVP, WHY_SELECTED, CURRENT_STATUS, REPAIR_SLICES, COMPLETED_SLICES, CURRENT_SLICE, ALLOWED_PATHS, VALIDATIONS, FAILURES, RECOVERY_STATE, AI_CHECK_STATE, AI_NEXT_STATE, NEXT_COMMAND, HUMAN_GATE, TEST_COMMANDS, DEMO_FIXTURES, DOCUMENTATION_PATHS, GTM_STATUS, ROLLBACK, NEXT_EXACT_ACTION.
Use UNKNOWN for anything not observable and say what command resolves it. Include the instruction: current source-controlled TBI AIOps state is authoritative; run `ai check` and `ai next`; continue deterministic safe same-scope work automatically; return to Teddy only for APPROVE, credentials/provider, DB mutation, pricing/owner decision, legal/compliance, production/deployment, or irreconcilable scope/control-plane conflict. Keep it self-contained.
