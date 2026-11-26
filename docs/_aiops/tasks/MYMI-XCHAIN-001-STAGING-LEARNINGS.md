# AIOps Learning Task: MYMI-XCHAIN-001 Staging Deployment Invariants

**Task Key:** `MYMI-XCHAIN-001-STAGING-LEARNINGS`  
**Domain:** `operations / staging deployment / migrations / permissions`  
**Incident Date:** 2026-11-25  
**Governing Skill:** `tbi-incident-learning` (WF-LEARN-001)

---

## 1. Incident Analysis & Root Causes

### A. Migration Runner Filename Discrepancy
- **Trigger:** Operator executed `scripts/ops/db/run-migrations.php CreateCryptoPayRequests ...` on staging.
- **Symptom:** `NOT FOUND: CreateCryptoPayRequests`.
- **Root Cause:** `run-migrations.php` checked `APPPATH . 'Database/Migrations/' . $name . '.php'` which expects the timestamp prefix (`2026-11-25-000100_CreateCryptoPayRequests`).
- **Remediation:**
  1. Updated `scripts/ops/db/run-migrations.php` with a fallback `glob()` matcher (`*_{$name}.php`) to gracefully resolve short class names.
  2. Updated deployment instructions to always specify full timestamped migration filenames.

### B. FileLocatorCache Ownership & Invalidation
- **Trigger:** Operator executed `rm -f writable/cache/FileLocatorCache` as user `timoteo2392`.
- **Symptom:** `FileLocatorCache` was not removed; `php spark list` continued serving cached command list, reporting missing commands.
- **Root Cause:** `FileLocatorCache` was created by `www-data` during staging builds with mode `0664`. Non-root shell users cannot unlink files in directories with sticky bits or without write access.
- **Remediation:** Invariant codified: always use `sudo rm -f shared/writable/cache/FileLocatorCache`.

### C. Release Runtime Dependencies (`--no-dev`)
- **Trigger:** Smoke script invoked `vendor/bin/phpunit` inside release directory.
- **Symptom:** Script stopped early because `phpunit` binary is omitted from production/staging builds.
- **Root Cause:** Staging deployment builds via `composer install --no-dev`.
- **Remediation:** Smoke script was patched to detect if `vendor/bin/phpunit` is absent and automatically fall back to native Spark CLI command: `sudo -u www-data php spark aiops:form:test --scan-all`.

---

## 2. Codified Invariants in AGENTS.md

The following permanent invariants have been committed to `AGENTS.md`:
1. `scripts/ops/db/run-migrations.php` expects full timestamped migration filenames.
2. Releases built with `--no-dev` must use native Spark CLI commands for smoke verification.
3. Cache invalidation on staging must run under `sudo` to override `www-data` file ownership.

---

## 3. Pull Request Lineage
- **Feature Branch:** `feature/mymi-xchain-001-w11-closeout`
- **Draft PR:** [#788](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/788)
- **Integration Branch:** `integration/mymi-xchain-001`
