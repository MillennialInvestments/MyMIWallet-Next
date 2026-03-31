# AIOps Repair Report

## Execution Loop
1. Run `php spark logs:errors`.
2. Parse `docs/_aiops/_error_summary.md`.
3. Generate structured `ACTION` blocks.
4. Insert `ACTION` blocks into `docs/_aiops/repair-report.md`.
5. Run `php spark aiops:all`.
6. Generate patches from actions.
7. Apply patches cautiously (non-destructive).
8. Log all changes into `docs/_aiops/_execution_log.md`.
9. Repeat until no new errors exist.
10. When complete, output: `AIOps cycle complete`.
