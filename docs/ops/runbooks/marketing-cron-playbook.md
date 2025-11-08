# Marketing Cron Playbook

## Purpose
Guide manual verification of marketing, alerts, and distribution CRON endpoints.

## Prereqs
- SSH access to the VPS with ability to run `crontab -l` for the deployment user.
- Access to `/home/mymiteam/cron_logs/` for log inspection.
- API tokens or cron shared key for calling management endpoints.

## Steps (CLI)
1. Log in and capture the current crontab: `crontab -l > ~/cron-backup-$(date +%Y%m%d%H%M).txt`.
2. Confirm scheduled entries exist for:
   - `Run-CRON-Tasks` (15-minute cadence).
   - `cronFetchAndGenerateNews` / `cronFetchInbox` windows (6:00-18:00 ET).
   - `processAllTradeAlerts` (every 15 minutes) and `sendAllDiscordAlerts` (hourly or manual trigger).
3. Manually trigger key endpoints with the cron key:
   - `curl -s "https://www.mymiwallet.com/API/Management/cronFetchAndGenerateNews?cronKey=$CRON_SHARED_KEY"`.
   - `curl -s "https://www.mymiwallet.com/API/Management/processAllTradeAlerts?cronKey=$CRON_SHARED_KEY"`.
   - `curl -s "https://www.mymiwallet.com/API/Management/sendAllDiscordAlerts?cronKey=$CRON_SHARED_KEY"`.
4. Tail logs (`tail -n 100 ~/cron_logs/*.log`) to verify success messages.
5. Record results in `/home/mymiteam/logs/marketing-cron-$(date +%F).md` and attach any failures for follow-up.

## Validation
- Each endpoint returns JSON `status: success`.
- Discord/Zapier webhooks confirm receipt (check external dashboards).
- `writable/logs` or cron logs contain timestamps for the manual run.

## Rollback
- Restore previous crontab backup with `crontab ~/cron-backup-YYYYMMDDHHMM.txt` if edits fail.
- Re-run manual curl calls to ensure system returns to normal cadence.
- Notify marketing stakeholders of any missed runs and schedule reruns.
