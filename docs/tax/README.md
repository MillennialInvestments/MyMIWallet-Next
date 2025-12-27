# Tax Modules (User + Admin)

This repository includes two CodeIgniter modules to manage local sales/use tax filings:

- **User/Tax (nested under the User module)**: end-user filing, return preparation, recalculation logic, exports.
- **Management/TaxAdmin (nested under the Management module)**: admin console for jurisdictions, rates, templates, audit logging.

## Setup

1. Run the new migration to create schema:

   ```bash
   php spark migrate -n App
   ```

   The migration creates configuration tables, user return storage, and `bf_tax_audit_log`.

2. Seed Bossier Parish starter data if desired:

   ```bash
   mysql -u <user> -p <database> < docs/sql/tax_seed_bossier_parish.sql
   ```

3. Ensure the writable export directory exists:

   ```
   writable/exports/tax
   ```

   Export endpoints write JSON/CSV previews here.

## Routes

- User module (`/Tax`): list, create, edit, view, preview, AJAX save/recalc, JSON/CSV export.
- Admin module (`/Admin/Tax`): dashboard plus templates, jurisdictions, and rates management (under Management).

Both route groups are protected by the existing `login` filter. The admin module additionally enforces either the `admin` role or the `Tax.Admin.Manage` permission in the controller.

## Calculations

- Line 11 = sum(lines 2..10)
- Line 12 = line1 - line11
- Jurisdiction tax due = `taxable_amount * (rate_total / 100)` using the effective rate for the filing due date.
- Line 26 = sum of jurisdiction tax due; stored as `total_remitted`.

## Database Artifacts

- Schema DDL: `docs/sql/tax_module_schema.sql`
- Bossier Parish seed: `docs/sql/tax_seed_bossier_parish.sql`

## Export Endpoints

- `/Tax/export/json/{id}`
- `/Tax/export/csv/{id}`

Exports include the header (period dates, status), lines 1–12 and 26, jurisdiction allocations A–G with tax due, and total remitted. Files are written to `writable/exports/tax`.
