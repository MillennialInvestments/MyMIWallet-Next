+31
-0

# Backfill Email Pipelines

Two new backfill utilities keep alert and marketing inboxes synchronized with the database:

- **Alerts:** `POST /API/Alerts/backfillEmailAlerts` (admin only)
- **Marketing:** `POST /API/Management/backfillMarketingEmails` (admin only)

Cron-friendly endpoints (guarded by `cronKey`) run smaller sweeps:

- `GET /API/Management/runBackfillAlertsEmails` — defaults to 7 days, ~300 emails
- `GET /API/Management/runBackfillMarketingEmails` — defaults to 7 days, ~300 emails

Each backfill:

- Generates/uses `email_identifier` (Message-ID fallback hash)
- Skips duplicates via DB unique index
- Deletes duplicates from the inbox to save storage
- Returns counts for processed, inserted, duplicates, deleted, and errors

Recommended cron entries (adjust paths/keys):

```
*/120 * * * * php /path/to/public/index.php API/Management/runBackfillAlertsEmails cronKey=YOUR_KEY
*/240 * * * * php /path/to/public/index.php API/Management/runBackfillMarketingEmails cronKey=YOUR_KEY
```

Run migrations to apply the `email_identifier` unique indexes before enabling cron:

```
php spark migrate -n App\Database\Migrations
```