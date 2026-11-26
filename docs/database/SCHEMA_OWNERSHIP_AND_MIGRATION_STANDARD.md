# TBI Schema Ownership and Migration Standard

**Document ID:** `DOC-DB-001`  
**Governing Task:** `MYMI-GTM-059`  
**Classification:** Authoritative Technical Standard  
**Revision:** 1.0.0 (2026-11-24)  
**Applies To:** `tbisolutions/mymiwallet-next`, `gq-ai01` staging, and Teddy's DreamHost VPS production  

---

## 1. Architectural Principles & Ownership

MyMI Wallet's relational database layer governs critical fintech, budgeting, investment, and identity workflows. Because customer financial assets, audit chains, and regulatory compliance records reside in this database, schema mutations are subject to strict architectural ownership and operational controls.

### 1.1 Product Domain Ownership Matrix

Every table and migration in the MyMI Wallet schema belongs to an explicit domain owner:

| Domain | Core Tables | Primary Migration Series | Domain Owner | Authority Level |
|---|---|---|---|---|
| **Auth & Identity** | `bf_users`, `users` (view), `auth_logins`, `auth_tokens`, `auth_reset_attempts`, `auth_groups_users`, `bf_users_2fa`, `bf_user_ip_history`, `bf_user_consent` | `2026-10-26-000200`, `2026-11-15-000100`, `2026-11-23-000500` | Security & Auth Owner | Critical (Gate G1, G8) |
| **Wallets & Financial Ledgers** | `bf_users_wallet`, `bf_users_wallet_transactions`, `bf_user_wallets`, `bf_secure_transfer_requests`, `bf_secure_transfer_audit`, `bf_solana_fee_receipts`, `bf_solana_pay_requests` | `2026-11-16-000100`, `2026-11-21-000100`, `2026-11-23-000100-000400` | FinTech & Ledgers Owner | Add-only / Hash-chained (Gate G7) |
| **Memberships & Subscriptions** | `bf_users_memberships`, `bf_membership_subscriptions`, `bf_users_subscribers`, `bf_users_referral_program` | `2026-10-04-000100`, `2026-11-15-000200`, `2026-11-18-000100`, `2026-11-19-000100` | Billing & Monetization Owner | High (Gate G6) |
| **Investment & Market Data** | `bf_investment_trade_alerts`, `bf_stock_fundamentals`, `bf_investment_forecast_accuracy`, `bf_options_*`, `bf_predictions_*` | `2026-03-10-000100`, `2026-03-12-000100`, `2026-06-01-000100`, `2026-10-26-000100` | Quant & Market Feed Owner | High |
| **Auctions & Real-World Assets** | `bf_auctions`, `bf_auction_items`, `bf_auction_lots`, `bf_auction_bids`, `bf_auction_balances`, `bf_auction_settlements`, `bf_auction_payments` | `2026-11-14-000200` | Exchange & Asset Owner | High |
| **MDIT & Project Funds** | `bf_mdit_wallets`, `bf_mdit_token_ledger`, `bf_mdit_nav_snapshots`, `bf_projects`, `bf_project_tokens`, `bf_tokens`, `bf_tbi_project_coins` | `2026-03-26-000100-000140`, `2026-05-27-000100`, `2026-07-16-000000` | Fund Operations Owner | Critical |
| **AIOps & Observability** | `bf_aiops_*`, `bf_ops_jobs`, `bf_ops_job_runs`, `bf_runtime_config`, `bf_route_error_heatmap`, `bf_frontend_incidents`, `bf_form_test_runs` | `2026-01-01-000001`, `2026-02-21-000300`, `2026-03-15-000100`, `2026-06-20-000100` | AIOps & Reliability Owner | Standard |

---

## 2. Table Prefix Policy Across Environments

CodeIgniter 4 uses `$db->DBPrefix` to automatically prefix table names in query builder calls when configured.

- **SQLite Testing (`tests/_support/Config/Database.php`):**
  - `DBPrefix` is configured as `'bf_'`.
  - When a model or migration specifies `$table = 'bf_something'`, CI4 queries `bf_bf_something` if `DBPrefix` is active.
- **Production MySQL (`/apps/TBI/www/mymiwallet/current`):**
  - `DBPrefix` is **empty** (`""`).
  - Tables in MySQL literally start with `bf_` (e.g. `bf_users`, `bf_users_wallet`), matching table names directly.
- **Engineering Standard:**
  1. Models and migrations should use `resolveTableName(...)` or `$this->db->prefixTable('something')` when handling cross-environment logic.
  2. Migrations must declare their explicit table identifier (e.g., `'bf_user_consent'`) with existence checks.
  3. Raw SQL queries must never hardcode double prefixes (`bf_bf_...`).

---

## 3. Production Migration Protocol & Safety Guards

### 3.1 Hard Rule: No Plain `php spark migrate` in Production

> [!CAUTION]
> **NEVER run plain `php spark migrate` on production.**
> `ShieldIdentityBackfill` (`2026-10-26-180000_ShieldIdentityBackfill.php`) is intentionally unapplied while legacy Myth/Auth password hashes coexist with Shield identities. Running an indiscriminate migration command would execute unverified backfills and disrupt user authentication.

### 3.2 Canonical Release & Migration Workflow

Production migrations are executed strictly on a named, approved basis:

1. **Staging Validation Gate:**
   - Deploy code ref to staging: `sudo bash scripts/ops/staging/mymi-staging.sh deploy <commit-sha>`.
   - Run staging form smoke & route tests: `sudo bash scripts/ops/staging/mymi-staging.sh form-test`.
   - Ensure `FAIL 0` before proceeding to release.

2. **Named Migration Execution:**
   - Execute named migrations via `scripts/ops/db/run-migrations.php`:
     ```bash
     # Dry-run preview (checks already-applied status, prints pending targets)
     php scripts/ops/db/run-migrations.php --dry-run 2026-11-23-000100_CreateSecureTransferAuditTables

     # Execute named migration
     php scripts/ops/db/run-migrations.php 2026-11-23-000100_CreateSecureTransferAuditTables
     ```
   - Alternatively, pass the migration list during release activation:
     ```bash
     MIGRATE='2026-11-23-000100_CreateSecureTransferAuditTables 2026-11-23-000200_CreateSolanaFeeReceipts' \
     bash /home/timoteo2392/mymi-release.sh activate <exact release name>
     ```

3. **Pre-flight Backup Requirement:**
   - `scripts/ops/db/restore-lost-tables.sh` and `mymi-release.sh` enforce that a verified database backup newer than 2 hours exists in `/var/backups/mymiwallet/mysql` before mutating production state.

---

## 4. Migration Authoring Standards & Defensive Patterns

All migrations in `app/Database/Migrations/` must conform to the following standards:

### 4.1 Filename and Class Naming

- Filename pattern: `YYYY-MM-DD-HHMMSS_ClassName.php`
- Class name inside file: `class ClassName extends Migration`
- Namespace: `namespace App\Database\Migrations;`

### 4.2 Idempotent Table Creation

Migrations creating a table must be safe to run against an existing schema:

```php
public function up(): void
{
    if (! $this->db->tableExists('bf_my_new_table')) {
        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            // ... fields ...
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bf_my_new_table', true); // ifNotExists = true
    } else {
        // Additive schema reconciliation if table pre-existed
        $fields = $this->db->getFieldNames('bf_my_new_table');
        // conditionally add missing columns...
    }
}
```

### 4.3 Idempotent Column Additions & Modifications

Columns must only be added if they do not already exist, preventing `Duplicate column name` MySQL fatal errors:

```php
if ($this->db->tableExists('bf_users')) {
    $existing = $this->db->getFieldNames('bf_users');
    if (! in_array('my_column', $existing, true)) {
        $this->forge->addColumn('bf_users', [
            'my_column' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
        ]);
    }
}
```

### 4.4 Non-Destructive Down() Migrations

- Financial ledgers (`bf_users_wallet*`, `bf_secure_transfer_*`, `bf_solana_*`), legal consent (`bf_user_consent`), and audit trails (`bf_audit_logs`) must **NEVER** drop user financial records or immutable logs in `down()`.
- Drops must always be guarded with `if ($this->db->tableExists(...))` and column checks.

---

## 5. Automated Verification & Quality Assurance

### 5.1 Static Migration & Model Linting

Run the migration completeness auditor locally or in CI:

```bash
php scripts/ops/db/schema-migration-lint.php
# Or for machine-readable JSON:
php scripts/ops/db/schema-migration-lint.php --json
```

**Validation Checks Performed:**
1. 100% of migration files match `<timestamp>_<ClassName>.php`.
2. 100% of migration classes implement `up()` and `down()`.
3. 100% of table creations use `tableExists` guards or `createTable(..., true)`.
4. 100% of column alterations use field existence guards.
5. 100% of concrete models define their `$table` property, allowed fields, and primary key.

### 5.2 Test Suite

Automated test suite: `tests/unit/Database/SchemaOwnershipMigrationsTest.php` validates:
- Migration naming and class declaration integrity.
- Migration guard enforcement across all 113 migration files.
- Additive conflict resolution for overlapping migrations (`2026-03-10` and `2026-03-12`).
- Dry-run CLI contract of `scripts/ops/db/run-migrations.php`.
- Model mapping coverage across all repository models.
