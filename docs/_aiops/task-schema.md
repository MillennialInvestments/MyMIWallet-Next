# AIOps Task Schema

Use this schema for task files that Codex leaves for Teddy's centralized AIOps worker under `docs/_aiops/tasks/`.

```yaml
---
task_id:
repo_key:
repo_name:
source_agent:
target_agent:
source_branch:
source_pr:
base_branch:
risk_level:
priority:
status:
model_preference:
requires_human_approval:
---
```

# Title

A short human-readable task title.

# Objective

Describe the outcome AIOps should complete.

# Background

Summarize why the task exists, including the originating request and any relevant constraints.

# Current State

Describe what Codex observed and what has already been completed.

# What Needs To Change

List the remaining changes AIOps should make or validate.

# Files To Inspect

List files and directories that AIOps should review before making changes.

# Files To Avoid

List files and directories AIOps should not modify unless explicitly required.

# Commands To Run

List validation, lint, test, or inspection commands AIOps should run.

# Acceptance Criteria

Define the conditions that must be true before AIOps marks the task complete.

# Risks

Call out runtime, data, security, deployment, or user-experience risks.

# Rollback Notes

Explain how to revert the task safely if it causes issues.

# Final Report Requirements

State what AIOps must include in its final report or pull request body, including tests run, risks, rollback notes, and follow-up status.
