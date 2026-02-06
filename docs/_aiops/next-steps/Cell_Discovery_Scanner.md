# Cell Discovery Scanner

## How it works
- `php spark aiops:scan:cells` starts a resumable scanner backed by MySQL state tables.
- The scanner discovers view files under `app/Views` and `app/Modules/*/Views`.
- It hashes each file and checks `aiops_review_ledger` so unchanged files are not re-reviewed.
- Queue items are processed in batches from `aiops_work_queue`, artifacts are emitted per run under `docs/_aiops/scans/cell_discovery/run-<timestamp>/`.
- Duplicate block heuristics detect repeated `nk-block`, card/widget, or section chunks and mark candidates.

## How to operate it safely
1. Run migrations first:
   - `php spark migrate`
2. Run a safe single-cycle discovery:
   - `php spark aiops:scan:cells --once=1 --dry-run=1 --batch=5`
3. Run continuous mode when needed (no cron required):
   - `php spark aiops:scan:cells --dry-run=1 --batch=5 --sleep=900`
4. If a worker crashes or VPS reboots, restart the same command; it resumes from DB state.
5. Use `--reset=1` only when you intentionally want to clear queue/state and start over.

## How to enable Phase 2 PR creation
- Phase 1 (default): recommendations only.
- Phase 2 (opt-in):
  - `php spark aiops:scan:cells --dry-run=0 --write-pr=1 --batch=5 --max-prs=1`
- If GitHub automation is unavailable, the scanner writes PR draft instructions under:
  - `docs/_aiops/pr/<branch>.md`

## Thresholds to tweak
- `--batch=<n>`: work items processed each cycle.
- `--sleep=<seconds>`: pause between cycles in continuous mode.
- `--max-prs=<n>`: cap PR creation per cycle.
- In service logic (`CellDiscoveryScanner`):
  - minimum block length (`strlen >= 120`)
  - wrapper patterns (`nk-block`, `card`, `widget`, `<section>`)
  - duplication threshold (`same block hash in >=2 files`)

## Teddy Notes (Manual)

Leave this section untouched in future runs (AIOps must not overwrite it).
