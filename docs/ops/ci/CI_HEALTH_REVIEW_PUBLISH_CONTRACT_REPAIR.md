# CI Health + Review Publish Contract Repair

## Scope

- Restore shared `ciSummary()` behavior for CI-safe Spark commands.
- Make `codex:review:publish` consume the structured filesystem lint report.
- Publish the CI artifact expected by the Spark Filesystem Guard workflow.
- Preserve existing filesystem debt for a later regression-baseline phase.

## Functional Contract

```text
PurgeFastCGI CI mode
  -> writes writable/ci/spark-purge-fastcgi-summary.json

ops:filesystem:lint
  -> writes docs/_ops/filesystem-lint.json

codex:review:publish
  -> reads docs/_ops/filesystem-lint.json
  -> writes docs/_codex/reviews/review-publish.json
  -> writes writable/aiops/artifacts/review-publish/latest.json

Spark Filesystem Guard
  -> reads writable/aiops/artifacts/review-publish/latest.json
Safety
No Solana transaction execution enabled.
No Solana broadcast enabled.
No mainnet minting enabled.
No private-key submission enabled.
No auth or CSRF bypass.
Expected Validation
PurgeFastCGI CI summary exists
Filesystem lint structured JSON is valid
Review publish latest.json is valid
Existing filesystem blocking errors are reported deterministically
Solana Phase 16, Phase 15, and permanent guardrail smoke tests have zero failures

