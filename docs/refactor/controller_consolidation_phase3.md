# Controller Consolidation Phase 3

## Canonical Input
- `app/Config/Routes.php` (route references used as primary keep/remove signal)

## Consolidation Actions

### Controllers Removed from Active Tree
- `app/Modules/Support/Controllers/Support.php`

### Controllers Merged / Rehomed
- Legacy support controller was rehomed to deprecated namespace/file for archival safety:
  - `app/Deprecated/Controllers/LegacySupportController.php`
- Active support routing remains handled by `SupportController`/`AccountSupportController` under `App\Modules\Support\Controllers`.

## Safety Verification
- No active route handlers in `Routes.php` reference `App\Modules\Support\Controllers\Support`.
- No controller deletion performed; archival move used instead of hard delete.

## Controller Counts (This Pass)
- Active controllers (app/Controllers + app/Modules/*/Controllers): **183**
- Deprecated controllers (app/Deprecated/Controllers): **1**
- Net active reduction this pass: **1**

## Notes
- This is an incremental pass. Additional domain consolidations (Wallets, Investments, Support API overlap) should continue in later phases while preserving route compatibility.
