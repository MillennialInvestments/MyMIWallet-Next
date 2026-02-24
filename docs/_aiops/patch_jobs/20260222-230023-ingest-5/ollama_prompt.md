# AIOPS INGEST JOB #5

## Goal
Analyze the instruction and produce minimal CI4-compatible code changes.

## Governance Context
- Risk Level: LOW
- Governance Score: 0
- Manual Review Required: NO

## Targeting Hints (best-effort)
- app/Services/Scanning/ScannerAlertBridge.php
- app/Controllers/
- app/Services/


## Output Contract (STRICT)
Write outputs into:
- docs/_aiops/pr_ready/5/
Include:
- pr.md (title, summary, rationale, rollback, tests)
- patch/ (full replacement files OR unified diffs per file)
- risks.md
- tests.md

## Instruction
ADD-ON TASK: Integrate Scanner with Existing Alerts System Context: We have built ScannerController + SignalEngine. We must now integrate scanner-generated signals directly into: - AlertsAdminController - AlertsAPIController - ManagementAlerts Dashboard - User/AlertsController Dashboard Goal: Scanner signals should create or update trade alerts using the existing bf_investment_trade_alerts and bf_investment_alert_history tables. Steps: 1) Create ScannerAlertBridge service: app/Services/Scanning/ScannerAlertBridge.php Responsibilities: - Accept ScannerResult DTO - Map signal types to trade alert types: SHIFT → Momentum