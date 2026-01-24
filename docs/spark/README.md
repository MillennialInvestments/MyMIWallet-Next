# Spark Command System (MyMI Wallet)

This directory is the **source of truth** for all MyMI Wallet Spark commands, including standards, inventories, safety classifications, and future automation roadmap. It is intentionally designed as a living handoff layer so operational responsibilities can be shared and delegated safely.

## What lives here
- **inventory.md** – canonical list of all Spark commands and their risk/cron status.
- **standards.md** – required coding and operational conventions for Spark commands.
- **safety-matrix.md** – read/write/destructive classification across commands.
- **cadence.md** – suggested run frequencies.
- **roadmap.md** – backlog of proposed commands and automation gaps.
- **categories/** – per-command documentation grouped by operational domain.

## Continuous Discovery Rule
Any time a manual workflow, repeated task, audit, cleanup, analysis, or debugging process is discovered during development:
1. Propose a Spark command.
2. Add it to `roadmap.md`.
3. Cross-reference related existing commands.
4. Prefer automation over documentation alone.

## How to use this documentation
1. Start with `inventory.md` to locate a command.
2. Open the corresponding file in `categories/<category>/` for full specs, usage, and safety notes.
3. Validate the command against `standards.md` and `safety-matrix.md` before running in production.
