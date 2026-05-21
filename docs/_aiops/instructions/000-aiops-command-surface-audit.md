# 000 — AIOps Command Surface Audit (MyMI Wallet)

## Scope
- Repository: **MyMI Wallet** (`mymiwallet`).
- Runtime: CodeIgniter 4 + PHP 8.2.
- Objective: establish a repeatable local instruction pack for command-surface governance and cross-repo parity tracking against `timothyburks.com`.

## Inputs used
1. Runtime command inventory from `php spark list --no-ansi`.
2. Existing command implementation tree under `app/Commands/`.
3. Current centralized endpoint contract docs (`docs/ops/aiops-remote-health-contract.md`).

## Findings summary
- MyMI Wallet already has a broad Spark surface, including AIOps orchestration, command linting, platform control, ops governance, and reporting commands.
- Command namespace overlap with central control-plane appears **high** for core ops areas (`aiops:*`, `ops:*`, `platform:*`, `auth:*`, `logs:*`, `routes:*`).
- A dedicated, machine-readable gap matrix was generated at:
  - `docs/_aiops/reports/aiops-command-gap-matrix.json`
  - `docs/_aiops/reports/aiops-command-gap-matrix.md`

## Required recurring audit cadence
- Weekly: run command inventory + gap matrix refresh.
- Before release: run command lint/doctor commands and update reporting artifacts.
- After central baseline changes: reclassify gaps (direct add vs shim vs not-applicable).

## Standard operating commands
```bash
php spark list --no-ansi
php spark ops:commands:inventory
php spark ops:commands:lint
php spark spark:doctor
php spark aiops:status
```
