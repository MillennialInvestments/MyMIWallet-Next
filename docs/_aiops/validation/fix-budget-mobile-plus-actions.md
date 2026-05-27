# Fix Budget Mobile Plus Row Actions Validation

## Root Cause
The `/Budget` browser table rendered plus controls through DataTables child-row behavior, but the click behavior was too narrowly bound to `.dt-control .toggle`. This can fail when the user taps the cell, when DataTables redraws the table, or when browser/mobile layout changes the actual event target.

## Fix Applied
Updated `app/Modules/User/Views/Budget/index/browser_table.php` to use a delegated action handler for:
- `.dt-control`
- `.dt-control .toggle`
- `.budget-row-actions-toggle`

The handler:
- Survives DataTables redraws.
- Prevents event bubbling conflicts.
- Opens/closes row child action panels.
- Updates plus/minus icon state.
- Adds defensive checks for missing rows or unavailable DataTables state.
- Prevents modal/action links from being swallowed by row click handlers.

## Manual Browser Test Checklist
- Open `/Budget` on desktop browser.
- Click the plus icon in the browser table.
- Click the plus cell around the icon.
- Confirm row actions open.
- Confirm the plus icon changes to minus.
- Confirm clicking again closes the child row.
- Confirm Edit, Copy, Delete, Paid, Add, and Manage actions still work.
- Test after searching/filtering the table.
- Test after sorting by date.
- Test on mobile viewport.

## Validation Commands
```bash
php -l app/Modules/User/Views/Budget/index/browser_table.php
git diff --check
git diff --stat
git status --short

```
