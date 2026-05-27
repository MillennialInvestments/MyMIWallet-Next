# Fix /Budget Mobile Plus Action Dropdowns

Fix the `/Budget` dashboard mobile/browser table plus controls.

The `+` icons in the budget table should open row-specific actions using the existing MyMI Wallet modal/action patterns.

Inspect:
- browser_table
- Budget views
- BudgetController
- BudgetService
- BudgetModel
- dynamicModalLoader
- transactionModal
- DataTables responsive or child-row logic
- Bootstrap 4.6 dropdown/popover behavior

Requirements:
1. The plus icon must be clickable on mobile and desktop.
2. Clicking plus must expose row-specific actions.
3. Use existing modal/action attributes where possible.
4. Preserve existing desktop table behavior.
5. Use delegated JavaScript events so handlers survive DataTables redraws.
6. Do not duplicate existing action logic.
7. Add defensive JS checks for missing row data.
8. Add validation notes to docs/_aiops/validation/fix-budget-mobile-plus-actions.md.

Branch:
fix/budget-mobile-plus-actions

Commit message:
Fix Budget mobile plus row actions
