# Dashboard Template

## How to use
1. Copy `app/Views/Dashboard/dashboard_template.php` into a new view file.
2. Replace KPI placeholders with real values (`$kpiOne`, `$kpiTwo`, `$kpiThree`).
3. Inject custom content into `$mainRowContent`, `$sidebarContent`, and the secondary row slots.
4. Render the view from a controller via `renderTheme()` or standard view rendering.

## Expected variables
- `kpiOne`, `kpiTwo`, `kpiThree` (string/number)
- `kpiOneLabel`, `kpiTwoLabel`, `kpiThreeLabel` (string)
- `mainRowSummary`, `mainRowContent` (string / HTML)
- `sidebarSummary`, `sidebarContent` (string / HTML)
- `secondaryRowSummary`, `secondaryRowContent` (string / HTML)
- `secondaryRowAltSummary`, `secondaryRowAltContent` (string / HTML)

## When to use vs legacy dashboards
- **Use the template** for new dashboards and refreshed layouts that follow the standard KPI → main row → secondary row structure.
- **Use legacy dashboards** when maintaining existing bespoke layouts that rely on custom includes or have complex, pre-wired scripts.
