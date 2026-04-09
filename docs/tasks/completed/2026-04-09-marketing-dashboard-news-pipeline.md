# Marketing dashboard news pipeline integration (2026-04-09)

## summary
Enhanced management marketing dashboard with pipeline KPIs for pending scraped alerts, pending generation, latest stories, pending review, and distribution history.

## files changed
- `app/Modules/Management/Controllers/MarketingAdminController.php`
- `app/Modules/Management/Views/Marketing/index.php`

## migrations added
- None.

## commands added
- None.

## routes added
- None.

## manual test steps
1. Open Management → Marketing dashboard.
2. Confirm KPI cards render even with empty tables.
3. Confirm latest stories/distribution lists update after running pipeline commands.

## known follow-ups
- Add drill-down links from each KPI card into filtered data tables.
