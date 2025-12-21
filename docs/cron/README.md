# Cron DB (Runbook Index)

The **Cron DB** is a lightweight runbook registry stored in the repo. Every cron-style task must have:
1) A runbook markdown file under `docs/cron/jobs/`.
2) A line in `docs/cron/index.csv` describing the schedule and entrypoint.

## Naming convention
- File name: `jobs/<job_slug>.md` where `job_slug` is kebab-case (e.g., `health_check`).
- The same slug is used in `index.csv`.

## Required sections for each job file
- Purpose
- Schedule
- Entrypoint
- Inputs
- Outputs
- Failure modes
- Logging locations
- Rollback
- Manual run command (SSH-safe)
- Security notes

## Enforcement note
If a new cron job is added without a runbook entry and index line, the PR should fail Docs Enforcement.
