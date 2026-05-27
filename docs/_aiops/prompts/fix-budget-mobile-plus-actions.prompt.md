You are patching a CodeIgniter 4 app.

Goal:
Fix the /Budget dashboard mobile/browser table plus icons so they open row-specific action controls.

Requirements:
- Inspect budget views, BudgetController, BudgetService, BudgetModel, browser_table usage, dynamicModalLoader, transactionModal, DataTables responsive/child-row behavior, and Bootstrap 4.6 dropdown/popover behavior.
- The + icon must be clickable on mobile and desktop.
- Clicking + must expose row-specific actions.
- Use existing modal/action attributes where possible.
- Preserve desktop behavior.
- Use delegated JavaScript event handlers so actions survive DataTables redraws.
- Do not duplicate existing action logic.
- Add defensive JS checks for missing row data.
- Produce a unified diff only. No prose.
