# CI Regression Baselines

## Scope

This baseline preserves known CI debt while preventing new regressions.

## Baselines

- PSR-4: existing violation count is tracked in `docs/ops/ci/baselines/psr4-baseline.txt`.
- Model Limit: existing unsafe-query signatures are tracked in `docs/ops/ci/baselines/model-limit-baseline.txt`.
- Filesystem: existing filesystem lint signatures are tracked in `docs/ops/ci/baselines/filesystem-baseline.txt`.

## Gate Behavior

CI fails only when a PR introduces new signatures beyond the reviewed baseline.

Existing debt remains visible and must be cleaned in later dedicated phases.
