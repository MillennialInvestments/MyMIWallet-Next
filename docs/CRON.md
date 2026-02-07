# CRON Jobs

## Discord Queue Processor

Add the following entries to your DreamHost user crontab to keep the Discord queue flowing. Update `CRON_KEY` with your shared secret.

```
*/2  8-16 * * 1-5 curl -fsS -H "X-CRON-Key: ${CRON_KEY}" "https://www.mymiwallet.com/API/Discord/process-queue" >/dev/null
*/10 * * * 0,6 curl -fsS -H "X-CRON-Key: ${CRON_KEY}" "https://www.mymiwallet.com/API/Discord/process-queue" >/dev/null
```

The weekday job runs every two minutes during market hours (America/Chicago). Weekends are throttled to once every ten minutes to keep rate limits healthy.

## Spark Doctor (Nightly)

Run the Spark command audit nightly to keep command discovery healthy.

```
0 3 * * * cd /home/mymiteam/mymiwallet/site/current && php spark spark:doctor
```

## AIOps Nightly Log Summarize (CST)

Run the daily log summarizer at 11:59 AM America/Chicago time. This job writes summary artifacts and optional PR bundles when actionable issues are detected.

```
59 11 * * * TZ=America/Chicago cd /home/mymiteam/mymiwallet/site/current \
  && php spark logs:summarize --pr=1 --dry-run=0 \
  >> /home/mymiteam/mymiwallet/site/current/writable/aiops/logs/audit/logs-summarize-cron.log 2>&1
```
