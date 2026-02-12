# PR Draft (Batch 1)

## Candidate blocks
- app/Modules/User/Views/Budget/Add-New.php => Shared26f4a029Cell
- app/Modules/User/Views/Budget/Add.php => SharedEbd77005Cell

## Suggested insertion spots
- app/Modules/User/Views/Budget/Add-New.php: `<?= view_cell('App\Cells\Shared26f4a029Cell::render') ?>`
- app/Modules/User/Views/Budget/Add.php: `<?= view_cell('App\Cells\SharedEbd77005Cell::render') ?>`

## Risk notes
- Validate rendered output after extraction.
- Keep complex PHP logic in source views.
