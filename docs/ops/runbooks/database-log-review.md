# Database Log Review

## Purpose
Outline manual inspection of database-backed logging tables (`bf_error_logs`, alert history, marketing scrapers).

## Prereqs
- MySQL access credentials with read-only permissions.
- Knowledge of table prefixes (`bf_`) used across MyMI Wallet.
- Access to recent incident timelines for correlation.

## Steps (CLI)
1. Connect to MySQL: `mysql -u mymiteam -p mymi_wallet`.
2. Review error logs from the past 48 hours:
   - `SELECT * FROM bf_error_logs WHERE created_at >= NOW() - INTERVAL 2 DAY ORDER BY created_at DESC LIMIT 200;`
3. Inspect alert history consistency:
   - `SELECT ticker, COUNT(*) AS cnt FROM bf_investment_alert_history WHERE alerted_on >= CURDATE() - INTERVAL 7 DAY GROUP BY ticker ORDER BY cnt DESC;`
4. Check marketing scraper staging table health:
   - `SELECT status, COUNT(*) FROM bf_marketing_temp_scraper GROUP BY status;`
5. Export findings to `/home/mymiteam/logs/db-review-$(date +%F).txt` and share anomalies with engineering.

## Validation
- Counts align with expected cron volume (e.g., trade alerts processed each 15 minutes).
- No unbounded growth in staging tables; statuses show majority `ready` or `processed`.
- Error logs correlate with known incidents or are triaged.

## Rollback
- If queries were run in transaction mode, `ROLLBACK;` before exiting.
- Revoke MySQL session with `EXIT;` and rotate credentials if suspicious activity detected.
