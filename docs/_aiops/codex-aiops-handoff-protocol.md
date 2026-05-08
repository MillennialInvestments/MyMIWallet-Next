# Codex ⇄ AIOps Handoff Protocol

MyMI Wallet participates in Teddy's centralized Codex ⇄ AIOps workflow at `https://aiops.timothyburks.com`. This protocol keeps Codex, AIOps, Ollama, and Teddy aligned while preserving existing application behavior.

## Standard Workflow

1. Teddy creates a task.
2. Codex works first when available.
3. Codex completes what it safely can on a feature branch.
4. Codex creates or updates a pull request for Teddy to review.
5. Codex writes AIOps task files in `docs/_aiops/tasks/` for incomplete work.
6. AIOps ingests the handoff task from `docs/_aiops/tasks/`.
7. AIOps builds repository context from the handoff, source branch, changed files, and relevant documentation.
8. AIOps uses Ollama to generate or review patches when that can safely fill the documented gap.
9. AIOps applies safe changes on its own branch.
10. AIOps runs the requested tests and checks.
11. AIOps creates a GitHub pull request with tests, risks, rollback notes, and follow-up status.
12. Teddy reviews and approves. Agents must not auto-merge or deploy.

## Handoff Triggers

Codex must create or update an AIOps handoff task when any of the following apply:

- Codex hits usage or time limits.
- Codex cannot run required commands.
- The task is too large for one pull request.
- Testing remains incomplete.
- Migrations need local validation.
- Logs need local server context.
- Follow-up work is identified.
- AIOps/Ollama can fill a clear gap.

## Handoff File Location

Queue all AIOps follow-up tasks in:

```text
docs/_aiops/tasks/
```

Use timestamped filenames so the central worker can process tasks deterministically:

```text
docs/_aiops/tasks/YYYYMMDD-HHMMSS-mymiwallet-short-task-name.md
```

## Required Handoff File Format

```markdown
---
task_id: YYYYMMDD-HHMMSS-short-task-name
repo_key: mymiwallet
repo_name: MyMI Wallet
source_agent: codex
target_agent: aiops
source_branch: CURRENT_CODEX_BRANCH
source_pr: PR_URL_OR_EMPTY
base_branch: main
risk_level: low|medium|high
priority: low|normal|high|urgent
status: queued
model_preference: qwen2.5-coder:3b
requires_human_approval: true
---

# Title

Short title for AIOps.

# Objective

What AIOps needs to complete.

# Background

Relevant context from Teddy's request and Codex's work.

# What Codex Completed

- List completed items.

# What Remains

- List remaining work.

# Files Codex Modified

- List files.

# Files AIOps Should Inspect

- List files/directories.

# Commands AIOps Should Run

```bash
php spark cache:clear
php spark routes
php spark list
git diff --name-only -- '*.php' | xargs -r -n1 php -l
```

# Acceptance Criteria

- List completion criteria.

# Risks

- List risks.

# Rollback Notes

- Describe rollback steps.

# Final Report Requirements

- Include tests run, risks, rollback notes, and AIOps follow-up status.
```

## Safety Rules

- Do not auto-merge.
- Do not deploy.
- Do not commit secrets.
- Do not delete working functionality without explicit approval.
- Preserve existing CodeIgniter routes, controllers, views, models, services, migrations, seeders, auth, dashboards, and frontend layouts unless the task explicitly requires a change.
