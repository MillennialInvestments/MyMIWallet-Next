# Budget UI Suggestions

## UX Observations
- Reintroduce a compact toolbar title or breadcrumb near the action buttons to reinforce context when users scroll past the chart.
- Consider grouping account setup actions (bank/credit) separately from transaction actions to reduce cognitive load on busy tables.

## Data Clarity Ideas
- Add inline tooltips for subtotal cells describing how running balances incorporate each inflow/outflow.
- Surface the investment split explanation near the monthly totals so users know why a portion of surplus is earmarked.

## Performance Notes
- Review DataTables initialization to ensure only one instance per table; a guard for duplicate binds can prevent unnecessary redraws on Ajax navigation.
- Consolidate budget summary fetches into a single service call when possible to avoid repeated queries when rendering dashboard widgets alongside the table.

## Future Refactor Plan
1. Extract shared table rendering logic (mobile/browser/active) into reusable partials with configurable column templates.
2. Replace inline PHP helpers with dedicated presenter classes to handle formatting and sorting metadata.
3. Introduce API endpoints for budget records so the DataTables view can be hydrated asynchronously, reducing initial payload size.
4. Adopt a state store (e.g., Alpine.js or Vue component) to coordinate selection, bulk actions, and live totals across responsive layouts.