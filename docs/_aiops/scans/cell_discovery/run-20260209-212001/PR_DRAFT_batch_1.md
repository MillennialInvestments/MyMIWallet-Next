# PR Draft (Batch 1)

## Candidate blocks
- app/Modules/User/Views/Budget/Account_Overview/expense_breakdown.php => Shared2d6a295dCell
- app/Modules/User/Views/Budget/Account_Overview/history_overview.php => SharedD7147586Cell

## Suggested insertion spots
- app/Modules/User/Views/Budget/Account_Overview/expense_breakdown.php: `<?= view_cell('App\Cells\Shared2d6a295dCell::render') ?>`
- app/Modules/User/Views/Budget/Account_Overview/history_overview.php: `<?= view_cell('App\Cells\SharedD7147586Cell::render') ?>`

## Risk notes
- Validate rendered output after extraction.
- Keep complex PHP logic in source views.
