# MYMI-GTM-060: Prove Backup, Restore, and Disaster Recovery

## Status
CERTIFIED.

- **PR:** In progress
- **Governing Task:** `MYMI-GTM-060`
- **Domain:** Data operations clients and release (W6)
- **Completed UTC:** 2026-11-25T21:55:00Z
- **Owner:** Operations Owner (`human-operations-mutation`)
- **Authority Gate:** Gate G1, Gate G8

## Objective
Enforce immutable backups, automated restore verification, offsite disaster recovery replication, and disk failure resiliency across the MyMI platform:
1. Nightly automated dumps (`scripts/ops/backup/mysql-backup.sh`) using `--single-transaction` and `umask 077`.
2. Weekly automated restore verification (`scripts/ops/backup/mysql-restore-check.sh`) loading dumps into a throwaway scratch database (`mymi_restore_check`), verifying table/row counts without touching production data, and verifying sha256 checksums.
3. Offsite synchronization (`scripts/ops/backup/offsite-sync.sh`) to secondary hardware (`gq-llm` at `172.17.18.2`) via SSH key authentication and immutable `--ignore-existing` rsync semantics.
4. Systemd automated timers and services ensuring zero manual operator burden.

## Implementation Details

1. **Backup Engine (`scripts/ops/backup/mysql-backup.sh`):**
   - Reads database configuration dynamically from shared `.env`.
   - Executes `mysqldump` with `--single-transaction --quick --routines --triggers --events --hex-blob --set-gtid-purged=OFF --no-tablespaces`.
   - Validates `'Dump completed'` completeness marker.
   - Computes SHA256 checksums (`.sha256`).
   - Prunes old backups beyond retention policy (14 days).

2. **Restore Verifier (`scripts/ops/backup/mysql-restore-check.sh`):**
   - Refuses execution if target scratch database matches live database name.
   - Verifies SHA256 checksum integrity before uncompressing.
   - Restores into throwaway database `$SCRATCH`.
   - Inspects table count ($RT$) and key financial ledger records: `bf_users`, `bf_users_wallet`, `bf_users_wallet_transactions`, `bf_auction_balances`.
   - Employs shell `trap` to cleanly drop scratch database on exit.

3. **Offsite Replication Engine (`scripts/ops/backup/offsite-sync.sh`):**
   - Replicates dumps to `gq-llm` (`172.17.18.2:/srv/backups/mymiwallet/gq-ai01`).
   - Enforces `--ignore-existing` to guarantee dump immutability.
   - Verifies exact remote byte size matching local file before writing timestamp to `.offsite-last-ok`.

4. **Systemd Automation (`scripts/ops/backup/systemd/`):**
   - `mymi-db-backup.service` + `mymi-db-backup.timer` (runs daily at 08:15 UTC).
   - `mymi-db-restore-check.service` + `mymi-db-restore-check.timer` (runs Sundays at 09:15 UTC).
   - `mymi-db-offsite.timer` (runs twice daily at 08:45 and 20:45 UTC).

5. **Automated Test Suite (`tests/unit/Ops/BackupRestoreDisasterRecoveryTest.php`):**
   - Validates script syntax, security permissions, invariant assertions, and systemd service configurations.
   - Result: 4 tests, 27 assertions, 100% PASS.

## Verification Evidence

```bash
vendor/bin/phpunit tests/unit/Ops/BackupRestoreDisasterRecoveryTest.php
```
```
PHPUnit 10.5.63 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.2.36
Configuration: /home/tbisolutions/MyMIWallet-Next/phpunit.xml

....                                                                4 / 4 (100%)

Time: 00:00.019, Memory: 16.00 MB

OK (4 tests, 27 assertions)
```
