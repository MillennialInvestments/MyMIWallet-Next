
## Adding Controller Methods
1. Create the public method in the appropriate controller under `App\Modules\APIs\Controllers` or the web module.
2. Prefer JSON responses for `/API/...` routes; surface new endpoints inside a single group per prefix (e.g., `/API/Management`).
3. Keep parameters explicit: use `(:num)` for numeric IDs and `(:segment)` for slug/ticker strings. Match the method signature order.
4. Add authentication/filters at the group level when possible (e.g., `['filter' => 'cronKey']`).

## Grouping Rules
- Exactly one group per prefix: `/API/Management`, `/API/Alerts`, `/API/Marketing`, `/API/Investments`, `/Blog`.
- Avoid duplicating `get()` declarations for the same URI; prefer a single canonical path.
- Web content routes should not live under `/API/...` and should stay human readable.

## Naming Rules
- Use CamelCase in controller methods, but kebab/slug URIs for web pages; keep API paths concise (`fetch`, `generate`, `update`).
- Avoid embedding controller namespaces in the URI (e.g., do not mix `/API/Alerts/AlertsController/...`).

## Route Hygiene Checklist
- When adding a route, also update `docs/routes/routes_audit.md` and `docs/routes/controller_method_inventory.md`.
- Verify that every public controller method you add has a matching route (or mark it as intentionally internal in the inventory doc).
- Remove or rewrite routes pointing to missing methods; do not leave dead paths.

## Optional CLI Stub
A future `spark routes:audit` command can:
- Scan controllers for public methods.
- Compare against `Routes.php` definitions.
- Report missing routes, dead routes, and duplicates.
- Emit a JSON or table summary to aid CI checks.