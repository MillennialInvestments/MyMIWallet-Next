# AIOPS Manual — Full CI4 Application & Subsystem Command Expansion

- **Scope:** MyMI Wallet (CodeIgniter 4.7.x)
- **Audience:** AIOPS Worker + PR Factory
- **Authority:** This document is directive. AIOPS **MUST** act on it.

## 🎯 Objective

AIOPS must continuously review the entire CodeIgniter 4 application and all subsystems and propose, generate, and maintain Spark commands that:

- Improve operability
- Increase observability
- Reduce mean-time-to-repair
- Enforce runtime safety contracts
- Replace manual workflows with auditable Spark automation
- Align with DreamHost / no-sudo constraints
- Integrate cleanly with GitHub PR automation

This process is ongoing, state-aware, and PR-driven.

## 🧠 Source of Truth

AIOPS MUST treat the following as canonical inputs:

### Current Spark Command Inventory

- Output of `php spark list`
- Parsed via `ops:commands:inventory`

### Documentation

- `/docs`
- `/docs/_aiops`
- `/docs/api`
- `/docs/mysql`
- `/docs/marketing`
- `/docs/security`
- `/docs/runtime`

### Runtime Signals

- `writable/logs`
- `logs:summarize`
- `logs:healthcheck`
- `runtime:*` diagnostics

### Subsystems

- AIOPS
- Chat
- Alerts
- Marketing
- Content Engine
- Forecasts
- Wallets
- Discord
- Auth
- Database
- Runtime / Infrastructure

## 🧩 Required AIOPS Behavior

### 1. Perform a Full CI4 Capability Gap Analysis

AIOPS MUST:

- Compare existing Spark commands against:
  - Operational needs
  - Subsystem responsibilities
  - Failure modes seen in logs
  - Manual recovery steps documented anywhere
- Identify missing command categories, including but not limited to:
  - Doctor / Diagnose
  - Audit
  - Repair
  - Status
  - Warm / Preload
  - Verify
  - Snapshot
  - Drift Detection

**Output:**

- `docs/_aiops/reports/command-gap-analysis.md`

### 2. Enforce a Standard Spark Command Taxonomy

All new commands MUST follow one of these patterns:

| Category     | Purpose                         |
|--------------|----------------------------------|
| `*:audit`    | Read-only verification           |
| `*:doctor`   | Human-readable triage            |
| `*:status`   | Snapshot current state           |
| `*:repair`   | Guarded, reversible fixes        |
| `*:lint`     | Static or structural validation  |
| `*:warm`     | Cache / runtime priming          |
| `*:verify`   | External dependency validation   |
| `*:snapshot` | Persisted state capture          |

If a domain lacks coverage, AIOPS MUST propose it.

### 3. Generate New Spark Commands When Any Are Missing

AIOPS MUST generate Spark commands (via PRs) when it finds:

- Manual operational steps in docs
- Repeated error patterns in logs
- Subsystems without:
  - `audit`
  - `doctor`
  - `status`
- Runtime checks that exist only in code comments
- Safety rules not enforceable via CLI

Each command MUST include:

- Proper namespace
- `$group`, `$name`, `$description`, `$usage`
- Dry-run support where applicable
- Structured JSON output option
- Logging hooks
- CI-safe execution

### 4. PR Creation Rules (Mandatory)

All new or modified commands MUST be delivered via GitHub PRs.

Each PR MUST include:

- ✅ Command implementation
- ✅ Tests or smoke validation
- ✅ Documentation update
- ✅ Entry in command inventory
- ✅ Risk classification

PR bundle location:

- `docs/_aiops/pr-outbox/`

PR metadata file:

- `docs/_aiops/pr-outbox/<timestamp>-spark-expansion.json`

### 5. Continuous Review Loop

AIOPS MUST re-run this process when any of the following change:

- New Spark command added
- New subsystem introduced
- New error class appears
- New docs added under `/docs`
- CI4 version upgrade
- Runtime topology changes

This is **NOT** a one-time task.

## 🛡️ Guardrails

AIOPS MUST NOT:

- Execute destructive actions without a dry-run path
- Require `sudo`
- Assume `systemctl` access
- Modify production data silently
- Bypass Spark safety standards

All fixes must be:

- Explicit
- Logged
- Reversible
- Reviewable

## 📦 Expected Outputs

AIOPS MUST continuously maintain:

```text
docs/_aiops/reports/
  ├─ command-gap-analysis.md
  ├─ subsystem-command-coverage.md
  ├─ spark-health-score.md
  └─ next-command-priorities.md
```

And generate PRs until no actionable gaps remain.

## 🧭 Success Criteria

This instruction set is complete when:

- Every subsystem has a full command lifecycle
- No manual ops tasks exist without a Spark equivalent
- AIOPS can diagnose, audit, and repair without human guesswork
- Spark becomes the primary operational interface for the platform

## 🔁 Execution Trigger

This manual MUST be consumed by:

- `aiops:manual-run`
- `aiops:auto-run`
- `ops:next-steps:sync-manual`

If you want next, Teddy, I can:

- Generate the first “missing commands” PR plan immediately
- Draft a Spark Command Style Guide to lock standards
- Add a Management Dashboard tile showing command coverage %
- Wire this into `aiops:watch` so it never regresses
