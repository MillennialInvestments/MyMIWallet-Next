# AIOps Continuation Backlog

## API modules
- Endpoint: `/API/ContentEngine/drafts/{id}`
  - Reason deferred: Contract intentionally returns 501 until draft persistence reader is implemented.
  - Suggested phase: Stabilize

- Endpoint: `/API/Chat/usage`
  - Reason deferred: Requires finalized usage aggregation schema and admin controls.
  - Suggested phase: Harden

## Marketing
- Endpoint: `/API/Marketing/generateKimiPosts`
  - Reason deferred: Planned Q2 2026 AI campaign engine deliverable.
  - Suggested phase: Expand

## Alerts
- Endpoint: `/API/Alerts/predictions/retrain`
  - Reason deferred: Depends on model ops/retraining pipeline and approval workflow.
  - Suggested phase: Harden

## Predictions
- Endpoint: `/API/Predictions/backtest/replay`
  - Reason deferred: Historical replay workload not enabled in production scheduler.
  - Suggested phase: Expand

## Wallets
- Endpoint: `/API/Wallets/reconcile/live`
  - Reason deferred: Requires irreversible action safeguards and staged rollout.
  - Suggested phase: Harden
